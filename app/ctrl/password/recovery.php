<?php if (!defined('SITE_NAME')) die();

class Recovery extends Controller{

    function __construct(){
        parent::__construct();

    }

    function index($argv = array()){
        $post = $this->lib->extern->post->getAll();
        $error = array();

        if ( count($post) > 0 ){
            $user = false;

            if ( strlen($post['email']) == 0 ){
                $error['email'] = 'Please insert your email';
            } else {
                $user = $this->mod->user->getWhere(array('email' => $post['email']));
            }

            if ( $user == false ){
                $error['email'] = 'There is no account linked to this email';
            }

            if ( count($error) == 0 ){
                $this->mod->user->resetPassword($user['id']);
                $this->mod->master->setNotification('You will receive an email', 'success');

                header("Location: /");
                exit(0);
            }
        }


        $this->loadView('login/recovery-password', array(
            'title' => '',
            'error' => $error,
            'post' => $post,
        ));
        return;
    }



}