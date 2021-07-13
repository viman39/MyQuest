<?php if (!defined('SITE_NAME')) die();

class Download extends Controller{

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
        $questId = intval($argv[1]);
        $downloadType = $argv[0];
        $userId = $this->lib->extern->session->user['id'];
        $quest = $this->mod->quest->getByUserAndQuest($userId, $questId);

        if ( $quest == false ){  // check quest is created by user
            return false;
        }

        if ( !in_array($downloadType, ['excel', 'csv']) ){
            return false;
        }

        $export = $this->mod->quest->export($questId);

        if ( $downloadType == 'excel' ){
            $this->lib->export->spreadsheet($export);
        } else if ( $downloadType == 'csv' ){
            $this->lib->export->csv($export);
        }

        exit(0);
    }
}
