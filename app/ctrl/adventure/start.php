<?php if (!defined('SITE_NAME')) die();

class Start extends Controller{

    function __construct(){
        parent::__construct();
    }

    function index($argv = array()){
        $code = @$argv[0];
        $quest = $this->mod->quest->getBy(array('deleted' => 'n', 'code' => $code));
        if ( $quest == false ){
            header('Location: /adventure/code');
            exit(0);
        }

        $startTime = @$this->lib->extern->session->startAdventure;
        if ( $startTime == '' ){
            header('Location: /adventure/code');
            exit(0);
        }

        $post = $this->lib->extern->post->getAll();
        $error = array();

        $questions = json_decode($quest['questions'], true);

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
                    'idUser' => 0,
                    'identifier' => $this->lib->extern->session->identifier,
                    'idQuest' => $quest['id'],
                    'answer' => json_encode($post),
                    'startTimestamp' => $startTime,
                    'endTimestamp' => $endTime,
                    'questStatus' => $quest['status']
                ));

                $solvingTime = $endTime - $startTime;
                $this->mod->quest->updateAverageSolvingTime($quest['id'], $solvingTime);

                $this->lib->extern->session->set('startAdventure', '');
                $this->lib->extern->session->set('identifier', '');

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

        $this->loadView('/adventure/start', array(
            'post' => $post,
            'error' => $error,
            'questions' => $questions,
            'quest' => $quest,
        ));
    }
}