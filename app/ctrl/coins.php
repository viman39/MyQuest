<?php if (!defined('SITE_NAME')) die();

class Coins extends Controller{

    function __construct(){
        parent::__construct();

        $this->mod->master->status();
        if ( !$this->mod->master->module('coins') ){
            $this->loadView('no-access', array(
                'menu' => 'coins'
            ));
            exit(0);
        }
    }

    function index($argv = array()){
        $user = $this->lib->extern->session->user;

        if ( $user['role'] == 'user' ){
            $this->loadUser($argv);
            return;
        } else if ( $user['role'] == 'client' ){
            $this->loadClient($argv);
            return;
        }

        header("Location: /");
        exit(0);
    }

    private function loadUser($argv = array()){
        $userId = $this->lib->extern->session->user['id'];
        $user = $this->mod->user->getById($userId);

        $this->loadView('coins/user/index', array(
            'menu' => 'coins',
            'user' => $user
        ));
    }

    private function loadClient($argv = array()){
        $userId = $this->lib->extern->session->user['id'];
        $user = $this->mod->user->getById($userId);

        $this->loadView('coins/client/index', array(
            'menu' => 'coins',
            'user' => $user
        ));
    }

}