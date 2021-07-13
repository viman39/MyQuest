<?php if (!defined('SITE_NAME')) die();

class Settings extends Controller{

    function __construct(){
        parent::__construct();

        $this->mod->master->status();
        if ( !$this->mod->master->module('settings') ){
            $this->loadView('no-access',array(
                'menu' => 'settings',
            ));
            return;
        }
    }

    function index($argv = array()){
        $userId = $this->lib->extern->session->user['id'];
        $user = $this->mod->user->getById($userId);

        if ( $user == false ){
            header("Location: /");
            exit(0);
        }

        $post = $this->lib->extern->post->getAll();
        $error = array();

        if ( count($post) > 0 ){
            if ( strlen($post['firstName']) == 0 ){
                $error['firstName'] = 'Mandatory';
            }

            if ( strlen($post['lastName']) == 0 ){
                $error['lastName'] = 'Mandatory';
            }

            if ( strlen($post['birthdate']) == 0 ){
                $error['birthdate'] = 'Mandatory';
            }

            if ( count($error) == 0 ){
                $this->mod->user->update($userId, array(
                    'firstName' => $post['firstName'],
                    'lastName' => $post['lastName'],
                    'birthdate' => $this->mod->master->gsDateformatParse($post['birthdate']),
                    'phone' => $post['phone'],
                    'country' => $post['country'],
                    'industry' => $post['industry'],
                    'salary' => $post['salary'],
                ));

                $this->mod->master->setNotification('Your general information was updated', 'success');

                header("Location: /");
                exit(0);
            }
        } else {
            $user['birthdate'] = $this->mod->master->gsDateFormat($user['birthdate']);
            $post = $user;
        }

        $this->loadView('/settings/index', array(
            'menu' => 'settings',
            'user' => $user,
            'post' => $post,
            'error' => $error,
        ));
    }
}