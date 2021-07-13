<?php if (!defined('SITE_NAME')) die();

class Mod_Master extends Controller{

    private $user = null;

    private $modules = null;

    public $lang = null;
    public $text = null;

    function __construct(){
        parent::__construct();

        if(!isset($this->lib->extern->session->user)){
            $this->lib->extern->session->set('user', array());
        }

        $this->user = $this->lib->extern->session->user;

        if ( count($this->user) == 0 ){
            return;
        }

        // generating modules
        $modules = array();
        foreach ( $this->mod->menu->getMenu($this->user['id']) as $record ){
            if ( strlen($record['module']) > 0 ){
                if ( !isset($modules[$record['module']]) ){
                    $modules[$record['module']] = array();
                }
            }
        }
        $this->modules = $modules;
    }

    function status($user = true){
        if ( $user === false ){
            return;
        }

        if ( count($this->lib->extern->session->user) == 0 ){
            header('Location: /login');
            exit(0);
        }

        $user = $this->mod->user->getById($this->lib->extern->session->user['id']);
        if ( $user == false ){
            header('Location: /logout');
            exit(0);
        }
        if ( $user['deleted'] == 'y' ){
            header('Location: /logout');
            exit(0);
        }

        return true;
    }

    function module($name){
        if(is_null($this->modules)){
            return false;
        }

        if(!isset($this->modules[$name])){
            return false;
        }

        return true;
    }

    function setNotification($message = 'default' , $type = 'success'){
		$this->destroyNotification();

		if( $message == 'default' ){
			$message = "Your data has been successfully saved";
		}
		$this->lib->extern->session->set('notification', array(
			'notificationText' => $message,
			'notificationType' => $type,
		));
    }
    
    function destroyNotification(){
		$this->lib->extern->session->set('notification', array());
    }
    
    // dbFormat => displayFormat
    function gsDateFormat($value){
        if(is_null($value) || strlen($value) == 0){
            return '';
        }

        return date('m/d/Y', strtotime($value));
    }

    function gsDateFormatWithTime($value){
        if(is_null($value) || strlen($value) == 0){
            return '';
        }

        $values = explode(" ", $value);

        $formatedDate = date('m/d/Y', strtotime($values[0]));

        if ( $formatedDate == false ){
            $formatedDate = $values[0];
        }

        return $formatedDate . ' ' . $values[1];
    }

    // displayFormat => dbFormat
    function gsDateFormatParse($value, $format = ''){
        if(is_null($value) || strlen($value) == 0){
            return '';
        }

        $parts = explode('/', $value);

        return @$parts[2].'-'.@$parts[0].'-'.@$parts[1];
    }
}