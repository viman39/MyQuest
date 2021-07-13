<?php if (!defined('SITE_NAME')) die();

class Signup extends Controller{

    function __construct(){
        parent::__construct();
    }

    function index($argv = array()){
        $types = ['wizard', 'adventurer'];
        $role = $argv[0];
        if ( !in_array($role, $types) ){
            header("Location: /");
            exit(0);
        }

        $post = $this->lib->extern->post->getAll();
        $error = array();

        if ( count($post) > 0 ){
            if ( strlen($post['email']) == 0 ){
                $error['generalError'] = "Email mandatory";
            } else {
                if ( $this->lib->util->string->isEmail($post['email']) == false ) {
                    $error['generalError'] = 'Email not valid';
                }

                if ( $this->mod->user->emailIsUsed($post['email']) == true ){
                    $error['generalError'] = 'Email already used';
                }
            }

            if ( strlen($post['username']) == 0 ){
                $error['generalError'] = "Username mandatory";
            } else if ( $this->mod->user->getUserByUsername($post['username']) != false ){
                $error['generalError'] = "Username already used";
            }

            if ( strlen($post['password']) < 5 ){
                $error['generalError'] = "Password too short";
            } else if ( $post['password'] != $post['passwordCheck'] ){
                $error['generalError'] = "Passwords do not match";
            }

            if ( count($error) == 0 ){
                $user = $this->mod->user->create(array(
                    'role' => ($role == 'wizard' ? 'user': 'client'),
                    'email' => $post['email'],
                    'username' => $post['username'],
                    'password' => md5($post['password']),
                ));

                $this->mod->master->setNotification("Account created successfully", 'success');

                $this->lib->extern->session->set('user', $user);

                header("Location: /");
                return;
            }
        }

        $this->loadView('signup/index', array(
            'post' => $post,
            'error' => $error,
            'role' => $role
        ));
        return;
    }



}