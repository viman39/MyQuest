<?php if (!defined('SITE_NAME')) die();

class Ajax extends Controller{
    private $availableQuestionTypes = ['text', 'longtext', 'number', 'checkbox', 'radio', 'select', 'date'];

    function __construct(){
        parent::__construct();
        $this->mod->master->status();

        if ( !$this->mod->master->module('quest') ){
            $this->loadView('no-access', array(
                'menu' => 'quest'
            ));
            exit(0);
        }
    }

    function get_question_settings($argv = array()){
        $post = $this->lib->extern->post->getAll();

        if ( in_array(@$post['questionType'], $this->availableQuestionTypes) ){
            $this->loadView('quest/question-settings/'.$post['questionType'], array(
                'post' => $post
            ));
            return;
        }
        return;
    }

    function add_question($argv = array()){
        $post = $this->lib->extern->post->getAll();

        if ( !isset($this->lib->extern->session->questions) ){
            $this->lib->extern->session->set('questions', array());
        }

        $questSession = $this->lib->extern->session->questions;

        if ( isset($post['questionType']) and isset($post['questionText']) and strlen($post['questionText']) != 0 and $post['questionType'] != 0 ){
            $key = count($questSession) . '-' . $post['questionType'];

            if ( isset($post['checkboxTexts']) and strlen($post['checkboxTexts']) ){
                $post['checkboxTexts'] = explode("\n", $post['checkboxTexts']);
            }

            if ( isset($post['radioTexts']) and strlen($post['radioTexts']) ){
                $post['radioTexts'] = explode("\n", $post['radioTexts']);
            }

            if ( isset($post['selectTexts']) and strlen($post['selectTexts']) ){
                $post['selectTexts'] = explode("\n", $post['selectTexts']);
            }

            $questSession[$key] = $post;
            $this->lib->extern->session->set('questions', $questSession);
        }

        $this->loadView('/quest/quest', array(
            'post' => $post,
            'questions' => $questSession
        ));
    }

    function get_question_snippet($argv = array()){
        $post = $this->lib->extern->post->getAll();

        if ( isset($post['checkboxTexts']) and strlen($post['checkboxTexts']) ){
            $post['checkboxTexts'] = explode("\n", $post['checkboxTexts']);
        }

        if ( isset($post['radioTexts']) and strlen($post['radioTexts']) ){
            $post['radioTexts'] = explode("\n", $post['radioTexts']);
        }

        if ( isset($post['selectTexts']) and strlen($post['selectTexts']) ){
            $post['selectTexts'] = explode("\n", $post['selectTexts']);
        }

        if ( in_array(@$post['questionType'], $this->availableQuestionTypes) ){
            $this->loadView('quest/question/'.$post['questionType'], array(
                'key' => "test",
                'iterator' => false,
                'question' => $post
            ));
            return;
        }

        return;
    }

    function get_quest_modal($argv = array()){
        $questId = intval($argv[0]);
        $userId = $this->lib->extern->session->user['id'];
        $quest = $this->mod->quest->getByUserAndQuest($userId, $questId);

        if ( $quest == false ){  // check quest is created by user
            echo "";
            return;
        }

        $questions = json_decode($quest['questions'], true);
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

        $this->loadView('quest/quest', array('questions' => $questions));
        return;
    }

    function delete_question($argv = array()){
        $post = $this->lib->extern->post->getAll();
        $questions = $this->lib->extern->session->questions;

        unset($questions[$post['questionId']]);

        $this->lib->extern->session->set('questions', $questions);

        $this->loadView('/quest/quest', array(
            'post' => $post,
            'questions' => $questions
        ));
    }

}