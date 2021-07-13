<?php if (!defined('SITE_NAME')) die();

class Index extends Controller{

    function __construct(){
        parent::__construct();
    }

    function index($argv = array()){
        $this->mod->master->status();

        header('Location: /dashboard');
        exit(0);
    }

    function check_for_notification($argv = array()){
        $result = array();

        if (!isset($this->lib->extern->session->notification)){
            $result = 'false';
        } else {
            if (count($this->lib->extern->session->notification) == 0){
                $result = 'false';
            } else {
                $result = array(
                    'notificationType' => $this->lib->extern->session->notification['notificationType'],
                    'notificationText' => $this->lib->extern->session->notification['notificationText'],
                );
            }
        }
        $this->mod->master->destroyNotification();

        echo json_encode($result);
    }

    function login($argv = array()){
        $this->mod->master->status(false);

        $post = $this->lib->extern->post->getAll();

        // language change
        $error = array();

        if ( count($post) > 0 ){
            
            if ( strlen($post['username']) == 0 ){
                $error['username'] = 'Mandatory';
            }
            if ( strlen($post['password']) == 0 ){
                $error['password'] = 'Mandatory';
            }

            if ( count($error) == 0 ){
                $user = $this->mod->user->getUserByUsername($post['username']);
                if ( $user == false ){
                    $error['generalError'] = 'Wrong Username and/or Password';
                    $error['username'] = '';
                    $error['password'] = '';
                }else{
                    if ( $user['password'] != md5($post['password']) ){
                        $error['generalError'] = 'Wrong Username and/or Password';
                        $error['username'] = '';
                        $error['password'] = '';
                    }else{
                        $this->lib->extern->session->set('user', $user);

                        header('Location: /');
                        exit(0);
                    }
                }
            }
        }

        $this->loadView('login/login', array(
            'title' => '',
            'error' => $error,
            'post' => $post,
        ));
        return;
    }

    // done
    function logout($argv = array()){
        $this->lib->extern->session->set('user', array());
        $this->lib->extern->session->set('quest', array());

        header('Location: /');
        exit(0);
    }

}