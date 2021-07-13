<?php if (!defined('SITE_NAME')) die();

class Delete extends Controller{

    function __construct(){
        parent::__construct();

        $this->mod->master->status();
        if ( !$this->mod->master->module('user', 'delete') ){
            $this->loadView('no-access',array(
                'menu' => 'user',
            ));
            return;
        }
    }

    function index($argv = array()){
        $user = false;
        if ( isset($argv[0]) ){
            $user = $this->mod->user->getById($argv[0]);
        }

        if ( $user == false ){
            header("Location: /user");
            exit(0);
        }

        $this->mod->user->delete($argv[0]);

        header("Location: /user");
        exit(0);
    }
}