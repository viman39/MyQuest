<?php if (!defined('SITE_NAME')) die();

class Begin extends Controller{

    function __construct(){
        parent::__construct();

        $this->mod->master->status();
        if ( !$this->mod->master->module('quests') ){
            $this->loadView('no-access', array(
                'menu' => 'quests'
            ));
            exit(0);
        }
    }

    function index($argv = array()){
        $idQuest = $argv[0];
        $idUser = $this->lib->extern->session->user['id'];
        $user = $this->mod->user->getById($idUser);

        if ( $user == false ){
            header("Location: /quests");
            exit(0);
        }

        if ( $this->mod->quest->canAccess($idUser, $idQuest) == false ){
            header("Location: /quests");
            exit(0);
        }

        $post = $this->lib->extern->post->getAll();
        $error = array();
        $startTime = @$this->lib->extern->session->timeStart;

        if ( isset($startTime) and $startTime != '' and count($post) > 0 ){
            $startTime = $this->lib->extern->session->timeStart;
        } else {
            $this->lib->extern->session->set('timeStart', time());
        }

        $quest = $this->mod->quest->getById($idQuest);
        $questions = json_decode($quest['questions'], true);

        if ( $quest['shuffle'] == 'yes' ){
            uksort($questions, function() { return rand() > rand(); });
        }

        if ( count($post) > 0 ){
            foreach ( $questions as $key => $question ){
                if ( in_array($question['questionType'], ['text', 'number', 'date']) ){
                    if ( $question['questionMandatory'] == 'true' and strlen(@$post[$key]) == 0 ){
                        $error[$key] = 'Mandatory';
                    }
                } else if ( $question['questionType'] == 'longtext' ){
                    if ( $question['questionMandatory'] == 'true' and strlen($post[$key]) == 0 ){
                        $error[$key] = 'Mandatory';
                    }
                    if ( isset($question['minCharacters']) and $question['minCharacters'] != '' and strlen($post[$key]) < $question['minCharacters'] ){
                        $error[$key] = 'Answer too short';
                    }
                    if ( isset($question['maxCharacters']) and $question['maxCharacters'] != '' and strlen($post[$key]) < $question['maxCharacters'] ){
                        $error[$key] = 'Answer too long';
                    }
                } else if ( $question['questionType'] == 'select' ){
                    if ( $question['questionMandatory'] == 'true' and empty($post[$key]) ){
                        $error[$key] = 'Mandatory'; 
                    }
                } else if ( in_array($question['questionType'], ['radio', 'checkbox']) ){
                    if ( $question['questionMandatory'] == 'true' and !isset($post[$key]) ){
                        $error[$key] = 'Mandatory';
                    }

                    if ( $question['questionMandatory'] != 'true' and !isset($post[$key]) ){
                        $post[$key] = '-';
                    }
                }
            }

            if ( count($error) == 0 ){
                $endTime = time();

                $this->mod->answer->create(array(
                    'idUser' => $idUser,
                    'idQuest' => $idQuest,
                    'answer' => json_encode($post),
                    'startTimestamp' => $startTime,
                    'endTimestamp' => $endTime,
                    'questStatus' => $quest['status']
                ));

                $solvingTime = $endTime - $startTime;
                $this->mod->quest->updateAverageSolvingTime($quest['id'], $solvingTime);

                $wizard = $this->mod->user->getById($quest['idUser']);
                $wizardCoins = $wizard['coins'] - $quest['reward'];

                $this->mod->user->update($user['id'], array('coins' => $user['coins'] + $quest['reward']));
                $this->mod->user->update($wizard['id'], array('coins' => $wizardCoins));

                if ( $wizardCoins < $quest['reward'] ){
                    $this->mod->quest->update($quest['id'], array('status' => 'disabled'));
                }

                $this->lib->extern->session->set('timeStart', '');

                header("Location: /quests");
                exit(0);
            }
        }

        foreach ( $questions as $key => $question ){
            if ( isset($question['imageBase64']) and $question['imageBase64'] != '' ){
                $photo = $this->mod->photo->getById($question['imageBase64']);

                if ( $photo == false or $photo['idQuest'] != $quest['id'] or $photo['questionKey'] != $key ){
                    $questions[$key]['imageBase64'] = '';
                } else {
                    $questions[$key]['imageBase64'] = $photo['photo'];
                }
            }
        }

        $this->loadView('quests/adventure', array(
            'menu' => 'quests',
            'quest' => $quest,
            'questions' => $questions,
            'post' => $post,
            'error' => $error,
        ));
        return;
    }

}