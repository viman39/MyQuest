<?php if (!defined('SITE_NAME')) die();

class Dashboard extends Controller{

    function __construct(){
        parent::__construct();
    }

    function index($argv = array()){
        $this->mod->master->status();

        $this->loadView('dashboard/index', array(
            'menu' => 'dashboard',
        ));
        return;
    }

}