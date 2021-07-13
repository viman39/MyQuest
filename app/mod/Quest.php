<?php if (!defined('SITE_NAME')) die();

class Mod_Quest extends Controller{

    function __construct(){
        parent::__construct();
    }

    function getAll(){
        $query = "SELECT * FROM `quest` WHERE `status` = 'enabled' AND  `deleted` = 'n'";

        $results = $this->lib->db->main->query($query);

        if ( $results == false ){
            return array();
        }

        return $results->fetchAll();
    }

    function getById($idQuest){
        $idQuest = intval($idQuest);

        $query = "SELECT * FROM `quest` WHERE `id` = '".$idQuest."' AND `deleted` = 'n'";

        $result = $this->lib->db->main->query($query);

        if ( $result == false ){
            return false;
        }

        return $result->fetch();
    }

    function getAllByUser($idUser){
        $idUser = intval($idUser);

        $query = "SELECT * FROM `quest` WHERE `idUser` = '".$idUser."' AND `deleted` = 'n'";

        $results = $this->lib->db->main->query($query);

        if ( $results == false ){
            return array();
        }

        return $results->fetchAll();
    }

    function getByUserAndQuest($idUser, $idQuest){
        $idUser = intval($idUser);
        $idQuest = intval($idQuest);

        $query = "SELECT * FROM `quest` WHERE `idUser` = '".$idUser."' AND `id` = '".$idQuest."' AND `deleted` = 'n' LIMIT 1";

        $result = $this->lib->db->main->query($query);

        if ( $result == false ){
            return false;
        }

        return $result->fetch();
    }

    function getBy($data){
        $query = "SELECT * FROM `quest` WHERE ";

        $values = array();
        foreach ( $data as $key => $value ){
            $values[] = "\t`".$key."` = '".$value."' \n";
        }

        $query .= implode(" AND ", $values);

        $result = $this->lib->db->main->query($query);

        if ( $result == false ){
            return false;
        }

        return $result->fetch();
    }

    function getQuestsForClient($idUser){
        $idUser = intval($idUser);
        $user = $this->mod->user->getById($idUser);

        if ( $user['country'] == '' ) $user['country'] = 'aaaa';
        if ( $user['industry'] == '' ) $user['country'] = 'aaaa';
        if ( $user['salary'] == '' ) $user['country'] = 'aaaa';

        $query = "
            SELECT * FROM `quest` WHERE 
            `quest`.`code` = '' AND
            (
                `countryFilter` = '' OR `countryFilter` LIKE '%".$user['country']."%'
            ) AND
            (
                `activityFilter` = '' OR `activityFilter` LIKE '%".$user['industry']."%'
            ) AND
            (
                `incomeFilter` = '' OR `incomeFilter` LIKE '%".$user['salary']."%'
            ) AND
            NOT EXISTS (
                SELECT * FROM `answer` WHERE `answer`.`idQuest` = `quest`.`id` AND `answer`.`idUser` = '".$idUser."'
            ) AND
            `deleted` = 'n' AND
            `status` = 'enabled'
        ";

        $results = $this->lib->db->main->query($query);

        if ( $results == false ){
            return array();
        }

        return $results->fetchAll();
    }

    function create($quest){
        $query = "
            INSERT INTO `quest` SET 
                `idUser` = '".$this->lib->extern->session->user['id']."',
                `name` = '".$quest['general']['name']."',
                `description` = '".$quest['general']['details']."',
                `shuffle` = '".$quest['general']['shuffle']."',
                `countryFilter` = '".$quest['general']['country']."',
                `activityFilter` = '".$quest['general']['industry']."',
                `incomeFilter` = '".$quest['general']['salary']."',
                `availability` = '".$quest['general']['availability']."',
                `reward` = '".$quest['general']['reward']."',
                `code` = '".$quest['general']['code']."',
                `deleted` = 'n'
        ";

        $result = $this->lib->db->main->query($query);

        $idQuest = $result->insertId();

        foreach ( $quest['questions'] as $key => $question ){
            if ( $question['imageBase64'] != '' ){
                $idPhoto = $this->mod->photo->create(array(
                    'idQuest' => $idQuest,
                    'questionKey' => $key,
                    'photo' => $question['imageBase64']
                ));

                $quest['questions'][$key]['imageBase64'] = $idPhoto;
            }
        }

        $this->update($idQuest, array('questions' => json_encode($quest['questions'])));

        return true;
    }

    function update($idQuest, $data){
        if ( count(@$data) == 0 ){
            return false;
        }

        $query = "UPDATE `quest` SET ";

        $values = array();
        foreach ( $data as $key => $value ){
            $values[] = "\t`".$key."` = '".$value."' \n";
        }

        $query .= implode(", ", $values);

        $query .= " WHERE `id` = '".$idQuest."' LIMIT 1 ";

        return $this->lib->db->main->query($query);
    }

    function canAccess($idUser, $idQuest){
        return true;
    }

    function export($idQuest){
        $idQuest = intval($idQuest);
        $quest = $this->getById($idQuest);

        $questions = json_decode($quest['questions'], true);

        $answers = $this->mod->answer->getAllByQuest($idQuest);

        foreach ( $answers as $key => $answer ){
            $jsonFixed = preg_replace('/\r|\n|\t/',' ', $answer['answer']);
            $answers[$key]['answer'] = json_decode($jsonFixed, true);
        }

        $labels = array();
        $labels[] = 'Identifier';
        $labels[] = 'Start time';
        $labels[] = 'End time';
        $labels[] = 'Time spent';
        $data = array();

        foreach ( $answers as $answerKey => $answer ){
            if ( $quest['availability'] == 'code' ){
                $identifier = $answer['identifier'];
            } else {
                $identifier = @$this->mod->user->getById($answer['idUser'])['email'];
            }

            $data[$answerKey][] = $identifier;
            $data[$answerKey][] = date('Y-m-d H:i:s', $answer['startTimestamp']);
            $data[$answerKey][] = date('Y-m-d H:i:s', $answer['endTimestamp']);

            $timeSpent = $answer['endTimestamp']-$answer['startTimestamp'];
            if ( $timeSpent < 60 ){
                $data[$answerKey][] = $timeSpent.'s';
            } else {
                $data[$answerKey][] = intval($timeSpent/60).'m';
            }
        }

        foreach ( $questions as $key => $question ){
            $labels[] = str_replace(';', ',', $question['questionText']);

            foreach ( $answers as $answerKey => $answer ){
                if ( in_array($question['questionType'], ['text', 'longtext', 'select', 'date', 'radio']) ){
                    $data[$answerKey][] = str_replace(';', ',', $answer['answer'][$key]);
                } else if ( $question['questionType'] == 'number' ){
                    $data[$answerKey][] = str_replace(';', ', ', $answer['answer'][$key]);
                } else if ( $question['questionType'] == 'checkbox' ){
                    $texts = array();

                    foreach ( $answer['answer'][$key] as $ans ){
                        if ( $ans == 'Other' ){
                            $texts[] = $ans . ': ' . $answer['answer'][$key.'OtherValue'];
                        } else {
                            $texts[] = $ans;
                        }
                    }

                    $data[$answerKey][] = str_replace(';', '-', implode(', ', $texts));
                }
            }
        }

        foreach ( $answers as $answerKey => $answer ){
            if ( isset($answer['questStatus']) and $answer['questStatus'] == 'disabled' ){
                $data[$answerKey]['background'] = 'ff0000';
            }
        }

        return array(
            'label' => $labels,
            'data' => $data,
            'filename' => $quest['name'] . '_' . date('m/d/Y')
        );
    }

    function updateAverageSolvingTime($idQuest, $solvingTime){
        $quest = $this->getById($idQuest);  // Quest information from the database

        if ( $quest['averageSolvingTime'] == 0 ){  // If there are no Answers received yet
            $averageSolvingTime = $solvingTime;
        } else {
            $multiplier = 2/(50+1);  // the multiplier is the weight of the most recent answering time
            $averageSolvingTime = $solvingTime * $multiplier + $quest['averageSolvingTime']*(1-$multiplier);
        }

        //update the average answering time
        return $this->update($idQuest, array('averageSolvingTime' => $averageSolvingTime));
    }

}
