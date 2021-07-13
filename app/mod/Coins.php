<?php if (!defined('SITE_NAME')) die();

class Mod_Coins extends Controller{

    function __construct(){
        parent::__construct();
    }

    function buy($eurValue, $coinsValue){
        $idUser = $this->lib->extern->session->user['id'];
        $user = $this->mod->user->getById($idUser);

        if ( $user == false ){
            return false;
        }

        $coins = $user['coins'] + $coinsValue;

        $this->mod->user->update($idUser, array('coins' => $coins));

        return true;
    }

    function sell($eurValue, $coinsValue){
        $idUser = $this->lib->extern->session->user['id'];
        $user = $this->mod->user->getById($idUser);

        if ( $user == false ){
            return false;
        }

        $coins = $user['coins'] - $coinsValue;

        $this->mod->user->update($idUser, array('coins' => $coins));

        return true;
    }

}
