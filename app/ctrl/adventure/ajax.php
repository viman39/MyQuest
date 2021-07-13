<?php if (!defined('SITE_NAME')) die();

class Ajax extends Controller{

    function __construct(){
        parent::__construct();
    }

    function leave($argv = array()){
        $this->lib->extern->session->set('startAdventure', '');
    }
}