<?php
/**
 * MVC engine and utilities
 */

/* make sure request came from index.php */
if (!defined('SITE_NAME')) die();

/* set error reporting for developing purpose */
error_reporting(E_ALL ^ E_DEPRECATED);
ini_set("display_errors", "On");
define('SITE_DEV', true);


/**
 * website path
 * @access public
 * @example /var/www/vhosts/example.com/public_html/
 */
define('SITE_PATH', realpath(dirname(__FILE__).'\..\..').'\\');
/**
 * website path
 * @access public
 * @example /var/www/vhosts/example.com/files/
 */
define('SITE_FILES', realpath(dirname(__FILE__).'\..\..\..\files').'\\');


/**
 * where application file source are located
 * @access public
 * @example /var/www/vhosts/example.com/public_html/app/
 */
define('SITE_APP', SITE_PATH.'app\\');

/* load config variables */
$_GLOBALS['config'] = @require(realpath(SITE_PATH.'config.php'));

/**
 * Print to stdout a message
 *
 * @param string $what
 * @return bool
 */
function __sys_console(){
    $source = debug_backtrace();

    if(!isset($source[0])) return false;
    if(count($source[0]['args']) == 0) return false;

    echo '<pre style="background:#FFFFFF;color:#000000;border:1px solid red;padding:5px;font-size: 8pt;">';
    foreach ($source[0]['args'] as $obj){
        print_r ($obj);
        echo "\n";
    }
    echo '</pre>';

    return true;
}

function __sys_replace($str){
    $str = str_replace( '.', '_', $str);
    $str = str_replace( '-', '_', $str);
    $str = str_replace( '+', '_', $str);
    return $str;
}

/**
 * Start the MVC
 */
function __sys_run(){
    $defaultController = 'index';
    $defaultControllerMethod = 'index';

    $params = $_SERVER['QUERY_STRING'];
    if (strstr($params, '/index/')) $params = str_replace('/index/', '', $params);
    if (strstr( $params, '/index')) $params = str_replace('/index', '', $params);
    parse_str(parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY), $_GET);

    /* remove $_GET */
    if(strstr($params, '?') !== false){
        $params = str_replace(strchr($params, '?'), '', $params);
    }

    /* remove empty params */
    $params = explode('/', $params);
    $newParams = array();
    foreach($params as $val){
        if(strlen($val) == 0) continue;
        $newParams[] .= htmlspecialchars($val, ENT_QUOTES);
    }
    $params = $newParams;

    $ctrls = array();
    if(count($params) >= 2){
        // folder subcontroller
        $tmpFolder = __sys_replace(@$params[0]);
        $tmpFile = __sys_replace(@$params[1]);
        $ctrls['folder'] = array(
            'src' => SITE_APP.'ctrl\\'.$tmpFolder.'\\'.$tmpFile.'.php',
            'class' => ucfirst($tmpFile), 
            'method' => $defaultControllerMethod
        );
    }
    if(count($params) >= 1){
        // file controller
        $tmpFile = __sys_replace(@$params[0]);
        $ctrls['file'] = array(
            'src' => SITE_APP.'ctrl\\'.$tmpFile.'.php',
            'class' => ucfirst($tmpFile), 
            'method' => $defaultControllerMethod
        );
    }
    // default controller
    $ctrls['default'] = array(
        'src' => SITE_APP.'ctrl\\'.$defaultController.'.php',
        'class' => ucfirst($defaultController),
        'method' => $defaultControllerMethod
    );

    foreach($ctrls as $type => $ctrl){
        $break = false;
        // __sys_console($type, $ctrl);
        if(!file_exists($ctrl['src'])){
            // __sys_console($type.' error: file "'.$ctrl['src'].'" not found');
            continue;
        }

        require_once($ctrl['src']);
        if(!class_exists($ctrl['class'])){
//             __sys_console($type.' error: class "'.$ctrl['class'].'" not defined');
            continue;
        }

        if($type == 'folder'){
            $newParams = array_slice($params, 2);
            if(isset($newParams[0])){
                $tmp = __sys_replace($newParams[0]);
                if($tmp[0] != '_' && method_exists($ctrl['class'], $tmp)){
                    $ctrl['method'] = $tmp;
                    $newParams = array_slice($newParams, 1);
                }
            }
            // __sys_console($ctrl, $newParams);
            $ctrlClassName = $ctrl['class'];
            $ctrlClassMethod = $ctrl['method'];
            $ctrlObject = new $ctrlClassName();
            $ctrlObject->$ctrlClassMethod(count($newParams) > 0 ? $newParams : array());
            break;
        }

        if($type == 'file'){
            $newParams = array_slice($params, 1);
            if(isset($newParams[0])){
                $tmp = __sys_replace($newParams[0]);
                if($tmp[0] != '_' && method_exists($ctrl['class'], $tmp)){
                    $ctrl['method'] = $tmp;
                    $newParams = array_slice($newParams, 1);
                }
            }
            // __sys_console($ctrl, $newParams);
            $ctrlClassName = $ctrl['class'];
            $ctrlClassMethod = $ctrl['method'];
            $ctrlObject = new $ctrlClassName();
            $ctrlObject->$ctrlClassMethod(count($newParams) > 0 ? $newParams : array());
            break;
        }

        if($type == 'default'){
            $newParams = $params;
            if(isset($newParams[0])){
                $tmp = __sys_replace($newParams[0]);
                if($tmp[0] != '_' && method_exists($ctrl['class'], $tmp)){
                    $ctrl['method'] = $tmp;
                    $newParams = array_slice($newParams, 1);
                }
            }
            // __sys_console($ctrl, $newParams);
            $ctrlClassName = $ctrl['class'];
            $ctrlClassMethod = $ctrl['method'];
            $ctrlObject = new $ctrlClassName();
            $ctrlObject->$ctrlClassMethod(count($newParams) > 0 ? $newParams : array());
            break;
        }
    }
}

/* load main controller which will be extended by other controllers */
require_once(SITE_APP.'sys\\Controller.php');
