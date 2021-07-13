<?php if (!defined('SITE_NAME')) die();

class Mod_Menu extends Controller{

    function __construct(){
        parent::__construct();
    }

    function getMenu($idUser){
        $idUser = intval($idUser);

        $user = $this->mod->user->getById($idUser);

        if ( $user == 'false' ){
            return array();
        }

        if ( $user['role'] == 'admin' ){
            $arMenu = $this->getAvailableModulesAdmin();
        } else if ( $user['role'] == 'user' ) {
            $arMenu = $this->getAvailableModulesUser();
        } else if ( $user['role'] == 'client' ){
            $arMenu = $this->getAvailableModulesClient();
        }

        return $arMenu;
    }

    private function getAvailableModulesAdmin(){

        $arModules = array();

        $arModules[] = array(
            'name' => 'Users',
            'link' => '/user',
            'module' => 'user',
            'icon' => 'fas fa-users',
        );

        $arModules[] = array(
            'name' => 'Clients',
            'link' => '/client',
            'module' => 'client',
            'icon' => 'fas fa-users',
        );

        return $arModules;
    }

    private function getAvailableModulesUser(){
        $arModules = array();

        $arModules[] = array(
            'name' => 'Quest',
            'link' => '/quest',
            'module' => 'quest',
            'icon' => 'fas fa-magic',
        );

        $arModules[] = array(
            'name' => 'Coins',
            'link' => '/coins',
            'module' => 'coins',
            'icon' => 'fas fa-coins',
        );

        $arModules[] = array(
            'name' => 'Settings',
            'link' => '/settings',
            'module' => 'settings',
            'icon' => 'fas fa-cog',
        );

        return $arModules;
    }

    private function getAvailableModulesClient(){
        $arModules = array();

        $arModules[] = array(
            'name' => 'Quests',
            'link' => '/quests',
            'module' => 'quests',
            'icon' => 'fas fa-dragon',
        );

        $arModules[] = array(
            'name' => 'Coins',
            'link' => '/coins',
            'module' => 'coins',
            'icon' => 'fas fa-coins',
        );

        $arModules[] = array(
            'name' => 'Settings',
            'link' => '/settings',
            'module' => 'settings',
            'icon' => 'fas fa-cogs',
        );

        return $arModules;
    }

}
