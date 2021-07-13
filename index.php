<?php
/**
 * Main site entry
 * All request to site enter in this file
 */

/**
 * application name
 * @access public
 * @example examplecom
 */
define('SITE_NAME', $_SERVER['SERVER_NAME']);
/* load some misc functions and start the application handlers, etc. */
require_once(dirname(__FILE__).'/app/sys/System.php');
//echo SITE_APP;die();
/* start the MVC */
__sys_run();
