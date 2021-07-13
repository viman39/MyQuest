<?php if (!defined('SITE_NAME')) die();

class Buy extends Controller{

    function __construct(){
        parent::__construct();

        $this->mod->master->status();
        if ( !$this->mod->master->module('coins') ){
            $this->loadView('no-access', array(
                'menu' => 'coins'
            ));
            exit(0);
        }
    }

    function index($argv = array()){
        $user = $this->lib->extern->session->user;

        if ( $user['role'] == 'client' ){
            header("Location: /");
            exit(0);
        }

        $post = $this->lib->extern->post->getAll();

        if ( count($post) > 0 ){
            $this->mod->coins->buy($post['value'], $post['coinsToBuy']);
            header("Location: /coins");
            exit(0);
        }

        $this->loadView('/coins/buy');
    }

}