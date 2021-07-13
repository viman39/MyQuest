<?php if (!defined('SITE_NAME')) die();

class Client extends Controller{

    function __construct(){
        parent::__construct();

        $this->mod->master->status();

        if ( !$this->mod->master->module('client') ){
            $this->loadView('no-access', array(
                'menu' => 'client'
            ));
            exit(0);
        }
    }

    function index($argv = array()){
        $clients = $this->mod->user->getAllWhere(array('role' => 'client'));

        $this->loadView('client/index', array(
            'menu' => 'client',
            'clients' => $clients
        ));
        return;
    }



}