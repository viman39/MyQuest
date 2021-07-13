<?php if (!defined('SITE_NAME')) die();

class Delete extends Controller{

    function __construct(){
        parent::__construct();

        $this->mod->master->status();
        if ( !$this->mod->master->module('client') ){
            $this->loadView('no-access',array(
                'menu' => 'user',
            ));
            return;
        }
    }

    function index($argv = array()){
        $client= false;

        if ( isset($argv[0]) ){
            $client = $this->mod->user->getById($argv[0]);
        }

        if ( $client == false ){
            header("Location: /client");
            exit(0);
        }

        $this->mod->user->delete($client['id']);

        header("Location: /client");
        exit(0);
    }
}