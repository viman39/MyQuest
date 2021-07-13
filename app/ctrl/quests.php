<?php if (!defined('SITE_NAME')) die();

class Quests extends Controller{

    function __construct(){
        parent::__construct();

        $this->mod->master->status();
        if ( !$this->mod->master->module('quests') ){
            $this->loadView('no-access', array(
                'menu' => 'quests'
            ));
            exit(0);
        }
    }

    function index($argv = array()){
        $idUser = $this->lib->extern->session->user['id'];
        $quests = $this->mod->quest->getQuestsForClient($idUser);

        if ( $this->mod->user->settingsSet() == true ){
            if ( count($quests) > 0 ){
                $this->mod->master->setNotification('You have <strong>'.count($quests).'</strong> Quests available. <br> Let\'s go on an adventure!', 'success');
            } else {
                $this->mod->master->setNotification('There are no Quests available yet, maybe try again later!', 'info');
            }
        }

        $this->loadView('quests/index', array(
            'menu' => 'quests',
            'quests' => $quests,
        ));
        return;
    }

}