<?php if (!defined('SITE_NAME')) die();

class Status extends Controller{

    function __construct(){
        parent::__construct();

        $this->mod->master->status();

        if ( !$this->mod->master->module('quest') ){
            $this->loadView('no-access', array(
                'menu' => 'quest'
            ));
            exit(0);
        }
    }

    function index($argv = array()){
        $questId = intval($argv[0]);
        $userId = $this->lib->extern->session->user['id'];
        $quest = $this->mod->quest->getByUserAndQuest($userId, $questId);

        if ( $quest == false ){
            return false;
        }

        $user = $this->mod->user->getById($userId);
        if ( $user['coins'] < $quest['reward'] ){
            $this->mod->quest->update($questId, array('status' => 'disabled'));
            $this->mod->master->setNotification('You don\'t have enough coins!', 'error');
            header("Location: /quest");
            return;
        }

        if ( $quest['status'] == 'disabled' ){
            $status = 'enabled';
        } else {
            $status = 'disabled';
        }

        $this->mod->quest->update($questId, array('status' => $status));

        header("Location: /quest");
        exit(0);
    }
}
