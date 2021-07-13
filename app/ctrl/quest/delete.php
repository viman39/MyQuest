<?php if (!defined('SITE_NAME')) die();

class Delete extends Controller{

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
        $questId = intval($argv[0]);
        $userId = $this->lib->extern->session->user['id'];
        $quest = $this->mod->quest->getByUserAndQuest($userId, $questId);

        if ( $quest == false ){
            return false;
        }

        $this->mod->quest->update($questId, array('deleted' => 'y'));

        header("Location: /quest");
        exit(0);
    }
}
