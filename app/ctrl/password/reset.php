<?php if (!defined('SITE_NAME')) die();

class Reset extends Controller{

    function __construct(){
        parent::__construct();
    }

    function index($argv = array()){
        $post = $this->lib->extern->post->getAll();
        $error = array();

        $code = $argv[0];
        $password = $this->mod->password->getByCode($code);

        if ( $password == false ){
            $this->mod->master->setNotification("Code not valid", "error");
            header("Location: /");
            exit(0);
        }

        if ( $password['used'] == 'y' ){
            $this->mod->master->setNotification("Code already used", "error");
            header("Location: /");
            exit(0);
        }

        if ( count($post) > 0 ){
            if ( strlen($post['password']) < 5 ){
                $error['generalError'] = 'Password too short';
            }

            if ( $post['password'] != $post['passwordRepeat'] ){
                $error['generalError'] = 'Passwords do not match';
            }

            if ( count($error) == 0 ){
                $this->mod->user->update($password['idUser'], array(
                    'password' => md5($post['password'])
                ));

                $this->mod->password->update($password['id'], array(
                    'used' => 'y'
                ));

                $this->mod->master->setNotification("Password updated successfully", 'success');

                $this->lib->extern->session->set('user', $this->mod->user->getById($password['idUser']));

                header("Location: /");
                exit(0);
            }

        }


        $this->loadView('password/reset', array(
            'title' => '',
            'error' => $error,
            'post' => $post,
            'password' => $password,
        ));
        return;
    }



}