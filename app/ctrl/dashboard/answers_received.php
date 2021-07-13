<?php if (!defined('SITE_NAME')) die();

class Answers_received extends Controller{

    function __construct(){
        parent::__construct();
    }

    function index($argv = array()){
        $this->mod->master->status();
        $userRole = @$this->lib->extern->session->user['role'];
        $userId = @$this->lib->extern->session->user['id'];

        if ( $userRole != 'user' ){
            echo "";
            die();
        }

        $answers = $this->mod->widget->getAnswersPerDayByUser($userId);

        $this->loadView('dashboard/widget-results/answers-received', array(
            'answers' => $answers
        ));
        return;
    }
}