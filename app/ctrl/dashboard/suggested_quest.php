<?php if (!defined('SITE_NAME')) die();

class Suggested_quest extends Controller{

    function __construct(){
        parent::__construct();
    }

    function index($argv = array()){
        $this->mod->master->status();
        $userRole = @$this->lib->extern->session->user['role'];
        $userId = @$this->lib->extern->session->user['id'];

        if ( $userRole != 'client' ){
            echo "";
            die();
        }

        $suggestedQuest = $this->mod->widget->getSuggestedQuest($userId);

        $this->loadView('dashboard/widget-results/suggested-quest', array(
            'suggestedQuest' => $suggestedQuest,
        ));
        return;
    }
}