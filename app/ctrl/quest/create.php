<?php if (!defined('SITE_NAME')) die();

class Create extends Controller{

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

    function index($argv = array()){
        $post = $this->lib->extern->post->getAll();
        $error = array();

        if ( count($post) > 0 ){
            if ( strlen($post['name']) == 0 ){
                $error['name'] = "Mandatory";
            }

            if ( count($error) == 0 ){
                $quest['general'] = $post;

                $this->lib->extern->session->set('quest', $quest);
                header("Location: /quest/create/questionnaire");
                exit(0);
            }
        } else {
            if ( isset($this->lib->extern->session->quest['general']) ){
                $post = $this->lib->extern->session->quest['general'];
            }
        }

        $this->loadView('quest/create/general', array(
            'menu' => 'quest',
            'post' => $post,
            'error' => $error,
        ));
        return;
    }

    function questionnaire($argv = array()){
        $post = $this->lib->extern->post->getAll();
        $error = array();
        $questions = array();
        if ( isset($this->lib->extern->session->questions) ){
            $questions = $this->lib->extern->session->questions;
        }

        if ( count($post) > 0 and $post['submitPost'] == 'questionnaire' ){
            if ( count($questions) == 0 ){
                $error['questions'] = "Please add a question first";
            }

            if ( count($error) == 0 ){
                $quest = $this->lib->extern->session->quest;
                $quest['questions'] = $questions;
                $this->lib->extern->session->set('quest', $quest);

                header("Location: /quest/create/finish");
                exit(0);
            }
        }

        $this->loadView('quest/create/questionnaire', array(
            'menu' => 'quest',
            'post' => $post,
            'error' => $error,
            'questions' => $questions
        ));
        return;
    }

    function finish($argv = array()){
        if ( !isset($this->lib->extern->session->quest['general']) or count($this->lib->extern->session->quest['general']) == 0 ){
            header("Location: /quest/create");
            exit(0);
        }

        $quest = $this->lib->extern->session->quest;
        $post = $this->lib->extern->post->getAll();
        $error = array();

        if ( count($post) > 0 and $post['submitPost'] == 'finish' ){
            if ( count($error) == 0 ){
                $quest = $this->lib->extern->session->quest;
                if ( !isset($quest['general']['country']) ){
                    $quest['general']['country'] = '';
                } else {
                    $quest['general']['country'] = json_encode($quest['general']['country']);
                }
                if ( !isset($quest['general']['industry']) ){
                    $quest['general']['industry'] = '';
                } else {
                    $quest['general']['industry'] = json_encode($quest['general']['industry']);
                }
                if ( !isset($quest['general']['salary']) ){
                    $quest['general']['salary'] = '';
                } else {
                    $quest['general']['salary'] = json_encode($quest['general']['salary']);
                }

                $this->mod->quest->create($quest);

                $this->lib->extern->session->set('quest', array());
                $this->lib->extern->session->set('questions', array());
                header("Location: /quest");
                exit(0);
            }
        }

        $this->loadView('quest/create/finish', array(
            'menu' => 'quest',
            'post' => $post,
            'error' => $error,
            'quest' => $quest,
        ));
        return;
    }

    function cancel($argv = array()){
        $this->lib->extern->session->set('quest', array());
        $this->lib->extern->session->set('questions', array());

        header("Location: /quest");
        exit(0);
    }

}