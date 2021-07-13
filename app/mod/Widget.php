<?php if (!defined('SITE_NAME')) die();

class Mod_Widget extends Controller{

    function __construct(){
        parent::__construct();
    }

    function getAnswersPerDayByUser($idUser){
        $userCreate = $this->mod->log->getUserCreate($idUser);
        if ( $userCreate == false ){
            return array();
        }
        $date = explode(' ', $userCreate['date'])[0];
        $userQuests = $this->mod->quest->getAllByUser($idUser);

        if ( count($userQuests) == 0 ){
            return array();
        }

        $quests = array();
        foreach ( $userQuests as $quest ){
            $quests[] = $quest['id'];
        }
        $quests = implode(' , ', $quests);

        $answers = array();
        while ( strtotime($date) < time() ){
            $answersInDay = $this->getAnswersByDateByQuests($date, $quests);
            $answers[$date] = count($answersInDay);
            $date = date('Y-m-d', strtotime(' +1 day', strtotime($date)));
        }

        return $answers;
    }

    function getAnswersByDateByQuests($date, $quests){
        $query = "SELECT * FROM `answer` WHERE `date` LIKE '".$date."%' AND `idQuest` IN (".$quests.")";
        $result = $this->lib->db->main->query($query);

        if ( $result == false ){
            return array();
        }

        return $result->fetchAll();
    }

    function getAnswersPerQuestByUser($idUser){
        $query = "
            SELECT *, (
                SELECT count(`id`) FROM `answer` WHERE `answer`.`idQuest` = `quest`.`id`
            ) counter FROM `quest` WHERE `quest`.`idUser` = '".$idUser."' AND `deleted` = 'n'
            ORDER BY `counter` DESC 
        ";

        $results = $this->lib->db->main->query($query);

        if ( $results == false ){
            return $results;
        }

        return $results->fetchAll();
    }

    function getAnsweredQuestsPerDay($idUser){
        $userCreate = $this->mod->log->getUserCreate($idUser);

        if ( $userCreate == false ){
            return array(
                'data' => array(),
                'label' => array()
            );
        }
        $date = explode(' ', $userCreate['date'])[0];

        $data = array();
        $label = array();
        while ( strtotime($date) < time() ){
            $answersInDay = $this->getAnswersByDateByUser($date, $idUser);
            $label[] = $date;
            $data[] = count($answersInDay);
            $date = date('Y-m-d', strtotime(' +1 day', strtotime($date)));
        }

        return array(
            'data' => $data,
            'label' => $label
        );
    }

    function getAnswersByDateByUser($date, $idUser){
        $query = "SELECT * FROM `answer` WHERE `date` LIKE '".$date."%' AND `idUser` = '".$idUser."' ";
        $result = $this->lib->db->main->query($query);

        if ( $result == false ){
            return array();
        }

        return $result->fetchAll();
    }

    function getSuggestedQuest($idUser){
        $user = $this->mod->user->getById($idUser);

        $quests = $this->mod->quest->getQuestsForClient($idUser);

        if ( count($quests) == 0 ){
            return false;
        }

        foreach ( $quests as $key => $quest ){
            $answers = $this->mod->answer->getAllByQuest($quest['id']);
            $answersCount = count($answers);
            $daysSinceCreate = ceil((time() - strtotime($quest['date'])) / ( 60 * 60 * 24 ));
            $reward = $quest['reward'];

            if ( $answersCount == 0 ){
                $quests[$key]['score'] = 100;
                $quests[$key]['score'] += ($reward+1) * $daysSinceCreate;
            } else {
                $averageAnswerPerDay = ceil($daysSinceCreate/$answersCount);
                $quests[$key]['score'] = ($reward+5)*$averageAnswerPerDay;
            }
        }

        usort($quests, function($a, $b){return intval($a['score'])-$b['score'];});

        return array_values($quests)[0];
    }
}