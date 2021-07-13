<?php if (!defined('SITE_NAME')) die();

class Cancel extends Controller{

    function __construct(){
        parent::__construct();

        $this->mod->master->status();

        if ( !$this->mod->master->module('quest') ){
            $this->loadView('no-access', array(
                'menu' => 'quest'
            ));
            exit(0);
        }
    }

    function index($argv = array()){
        $this->lib->extern->session->set('quest', array());

        header("Location: /quest");
        exit(0);
    }
}
