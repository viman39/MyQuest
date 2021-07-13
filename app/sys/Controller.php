<?php

/* make sure request came from index.php */
if (!defined('SITE_NAME')) die();

class Controller_Library{

    //private $data = array();

    function __get($name){
        $className = 'Lib_'.ucfirst($name);
        if(isset($GLOBALS[$className])){
            return $GLOBALS[$className];
        }
        $classSource = SITE_APP.'lib/'.ucfirst($name).'.php';
        if(!file_exists($classSource)){
            __sys_console('Library "'.basename($classSource).'" file not found in "lib"');
            return null;
        }
        require_once($classSource);
        if(!class_exists($className)){
            __sys_console('Library "'.$className.'" class not found in "lib/'.basename($classSource).'"');
            return null;
        }
        $GLOBALS[$className] = new $className();
        return $GLOBALS[$className];
    }
}

class Controller_Model{
    function __get($name){
        $className = 'Mod_'.ucfirst($name);
        if(isset($GLOBALS[$className])){
            return $GLOBALS[$className];
        }
        $classSource = SITE_APP.'mod/'.ucfirst($name).'.php';
        if(!file_exists($classSource)){
            __sys_console('Model "'.basename($classSource).'" file not found in "lib"');
            return null;
        }
        require_once($classSource);
        if(!class_exists($className)){
            __sys_console('Model "'.$className.'" class not found in "lib/'.basename($classSource).'"');
            return null;
        }
        $GLOBALS[$className] = new $className();
        return $GLOBALS[$className];
    }
}

/**
 * Class Controller
 * Base class
 */
class Controller{

    /**
     * @var array loaded libraries container
     */
    public $lib = null;

    /**
     * @var array loaded models container
     */
    public $mod = array();

    /**
     * controller constructor
     */
    function __construct(){
        $this->lib = new Controller_Library();
        $this->mod = new Controller_Model();
    }

    /**
     * load a view file
     *
     * @param string $name
     * @param array $argv
     * @return bool
     */
    public function loadView($name = '', $argv = array()){
        if (strlen($name) == 0){
            __sys_console( 'Empty view name.' );
            return false;
        }
        $viewSource = SITE_APP.'view/'.$name.'.php';
        if (file_exists( $viewSource )){
            require($viewSource);
        } else {
            __sys_console( 'View "'.$name.'.php" view file not found in "view"' );
            return false;
        }
        return true;
    }
}
