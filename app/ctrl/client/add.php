<?php if (!defined('SITE_NAME')) die();

class Add extends Controller{

    function __construct(){
        parent::__construct();

        $this->mod->master->status();
        if ( !$this->mod->master->module('client') ){
            $this->loadView('no-access',array(
                'menu' => 'client',
            ));
            return;
        }
    }

    function index($argv = array()){
        $post = $this->lib->extern->post->getAll();
        $error = array();

        if ( count($post) > 0 ){
            if ( strlen($post['firstName']) == 0 ){
                $error['firstName'] = "Mandatory";
            }

            if ( strlen($post['lastName']) == 0 ){
                $error['lastName'] = "Mandatory";
            }

            if ( strlen($post['email']) == 0 ){
                $error['email'] = "Mandatory";
            } else {
                if ( $this->lib->util->string->isEmail($post['email']) == false ) {
                    $error['email'] = 'Not valid';
                }

                if ( $this->mod->user->emailIsUsed($post['email']) == true ){
                    $error['email'] = 'Email already used';
                }
            }

            if ( strlen($post['username']) == 0 ){
                $error['username'] = "Mandatory";
            } else if ( $this->mod->user->getUserByUsername($post['username']) != false ){
                $error['username'] = "Username already used";
            }

            if ( count($error) == 0 ){
                $user = $this->mod->user->create(array(
                    'firstName' => $post['firstName'],
                    'lastName' => $post['lastName'],
                    'username' => $post['username'],
                    'email' => $post['email'],
                    'phone' => $post['phone'],
                    'role' => "client",
                ));

                if ( $user != false ){
                    $this->mod->master->setNotification("Client added",'success','fa fa-check');
                } else {
                    $this->mod->master->setNotification("Something went wrong!",'error','fa fa-times');
                }

                header("Location: /client");
                exit(0);
            }
        }

        $this->loadView('client/add', array(
            'menu' => 'client',
            'post' => $post,
            'error' => $error
        ));
        return;
    }
}