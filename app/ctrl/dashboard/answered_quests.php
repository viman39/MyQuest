<?php if (!defined('SITE_NAME')) die();

class Answered_quests extends Controller{

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

        $answeredQuests = $this->mod->widget->getAnsweredQuestsPerDay($userId);

        $this->loadView('dashboard/widget-results/answered-quests', array(
            'answeredQuests' => $answeredQuests,
        ));
        return;
    }
}