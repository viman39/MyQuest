<?php if (!defined('SITE_NAME')) die();

class Quest extends Controller{

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
        $this->loadView('quest/index', array(
            'menu' => 'quest',
            'quests' => $this->mod->quest->getAllByUser($this->lib->extern->session->user['id']),
        ));
        return;
    }

}