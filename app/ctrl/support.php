<?php if (!defined('SITE_NAME')) die();

class Support extends Controller{

    function __construct(){
        parent::__construct();

    }

    function index($argv = array()){
        $this->mod->master->status();

        $post = $this->lib->extern->post->getAll();
        $error = array();

        if ( count($post) > 0 ){
            if ( strlen($post['subject']) == 0 ){
                $error['subject'] = 'Mandatory';
            }

            if ( strlen($post['body']) == 0 ){
                $error['body'] = 'Mandatory';
            }

            if ( count($error) == 0 ){
                $email = $this->mod->email->sendSupport($post['subject'], $post['body']);

                if ( $email ){
                    $this->mod->master->setNotification('Email Sent','success');
                } else {
                    $this->mod->master->setNotification('Email did not sent','danger');
                }

                header("Location: /dashboard");
                exit(0);
            }
        }

        $this->loadView('support/index', array(
            'menu' => 'dashboard',
            'post' => $post,
            'error' => $error
        ));
        return;
    }



}