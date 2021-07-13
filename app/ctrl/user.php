<?php if (!defined('SITE_NAME')) die();

class User extends Controller{

    function __construct(){
        parent::__construct();

        $this->mod->master->status();

        if ( !$this->mod->master->module('user') ){
            $this->loadView('no-access', array(
                'menu' => 'user'
            ));
            exit(0);
        }
    }

    function index($argv = array()){
        $users = array();

        $users = $this->mod->user->getAllWhere(array('role' => 'user'));

        $this->loadView('user/index', array(
            'menu' => 'user',
            'users' => $users
        ));
        return;
    }



}