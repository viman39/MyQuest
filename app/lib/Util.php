<?php if (!defined('SITE_NAME') ) die();

/**
 * Class Lib_Util_String
 */
class Lib_Util_String{
    function isEmail($text){
        if(filter_var($text, FILTER_VALIDATE_EMAIL) === false){
            return false;
        }

        return true;
    }
}

/**
 * Class Lib_Util
 */
class Lib_Util{
    private $data = array();

    function __construct(){
        $this->data['string'] = new Lib_Util_String();
    }

    function __get($key){
        if (array_key_exists($key, $this->data)) return $this->data[$key];
        return null;
    }
}
