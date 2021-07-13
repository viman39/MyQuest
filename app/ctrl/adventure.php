<?php if (!defined('SITE_NAME')) die();

class Adventure extends Controller{

    function __construct(){
        parent::__construct();
    }

    function index($argv = array()){
        $this->loadView('/adventure/code');
    }
}