<?php if (!defined('SITE_NAME')) die();

class Sell extends Controller{

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
        $idUser = $this->lib->extern->session->user['id'];
        $user = $this->mod->user->getById($idUser);

        if ( $user['role'] == 'user' ){
            header("Location: /");
            exit(0);
        }

        $post = $this->lib->extern->post->getAll();

        if ( count($post) > 0 ){
            if ( $user['coins'] - $post['coinsToSell'] < 0 ){
                header("Location: /coins");
                exit(0);
            }

            $this->mod->coins->sell($post['value'], $post['coinsToSell']);
            header("Location: /coins");
            exit(0);
        }

        $this->loadView('/coins/sell', array(
            'user' => $user
        ));
    }

}