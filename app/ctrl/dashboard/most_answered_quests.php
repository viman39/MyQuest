<?php if (!defined('SITE_NAME')) die();

class Most_answered_quests extends Controller{

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

        $quests = $this->mod->widget->getAnswersPerQuestByUser($userId);

        $labels = array();
        $data = array();
        $backgroundColors = array();
        $backgroundColorsToUse = ['#FCF6BD', '#D0F4DE', '#A9DEF9', '#FF98C8', '#E4C1F9'];

        foreach ( $quests as $key => $quest ){
            if ( $key < 4 ){
                $labels[$key] = $quest['name'];
                $data[$key] = $quest['counter'];
                $backgroundColors[$key] = $backgroundColorsToUse[$key];
            } else {
                if ( isset($data[4]) ){
                    $data[4] += $quest['counter'];
                } else {
                    $labels[4] = 'Other';
                    $data[4] = $quest['counter'];
                    $backgroundColors[$key] = $backgroundColorsToUse[4];
                }
            }
        }

        $this->loadView('dashboard/widget-results/most-answered-quests', array(
            'quests' => $quests,
            'data' => $data,
            'labels' => $labels,
            'backgroundColors' => $backgroundColors,
        ));
        return;
    }
}