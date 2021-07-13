<?php if (!defined('SITE_NAME')) die();

@session_start();

/**
 * Class Lib_Extern_Session
 */
class Lib_Extern_Session{

    private $sessionId = '';
    private $data = array ();

    function __construct(){
        $this->sessionId = session_id();
        $this->reload();
    }

    function __set($key, $value){
        $_SESSION[SITE_NAME][$key] = $value;
        $this->reload();
    }

    function __isset($key){
        if (array_key_exists($key, $this->data)) return true;
        return false;
    }

    function __get($key){
        if (array_key_exists($key, $this->data)) return $this->data[$key];
        return null;
    }

    function set($key, $value){
        $_SESSION[SITE_NAME][$key] = $value;
        $this->reload();
    }

    public function sessionId(){
        return $this->sessionId;
    }

    public function destroy($key = ''){
        if ($key == ''){
            unset($_SESSION[SITE_NAME]);
        } else {
            unset($_SESSION[SITE_NAME][$key]);
        }
        $this->reload();
    }

    private function reload(){
        if (!isset($_SESSION[SITE_NAME])) $_SESSION[SITE_NAME] = array ();
        $this->data = $_SESSION[SITE_NAME];
    }
}

/**
 * Class Lib_Extern_Post
 */
class Lib_Extern_Post{

    private $data = array ();

    function __construct(){
        $this->reload();
    }

    function __get($key){
        if (array_key_exists( $key, $this->data)){
            if (is_array($this->data[$key])) return $this->data[$key];
            //return htmlspecialchars_decode($this->data[$key], ENT_QUOTES);
            return $this->data[$key];
        }
        return null;
    }

    function __unset($key){
        unset($_POST[$key]);
        unset($this->data[$key]);
    }

    public function getAll(){
        return $this->data;
    }

    public function reload(){
        if (isset($_POST)){
            foreach ($_POST as $key => $value){
                if (is_array($value)){
                    $this->data[$key] = $this->parseArray($value);
                } else {
                    $this->data[$key] = htmlspecialchars(trim($value), ENT_QUOTES);
                }
            }
        } else {
            $this->data = array();
        }
    }

    public function erase(){
        unset($_POST);
        $this->reload();
    }

    private function parseArray($value){
        $newValue = array();
        foreach($value as $key => $value){
            if (is_array($value)){
                $newValue[$key] = $this->parseArray($value);
            } else {
                $newValue[$key] =  htmlspecialchars(trim($value), ENT_QUOTES);
            }
        }
        return $newValue;
    }

}

/**
 * Class Lib_Extern_Get
 */
class Lib_Extern_Get{

    private $data = array ();

    function __construct(){
        $this->reload();
    }

    function __get($key){
        if (array_key_exists( $key, $this->data)){
            if (is_array($this->data[$key])) return $this->data[$key];
            //return htmlspecialchars_decode($this->data[$key], ENT_QUOTES);
            return $this->data[$key];
        }
        return null;
    }

    function __unset($key){
        unset($_GET[$key]);
        unset($this->data[$key]);
    }

    public function getAll(){
        return $this->data;
    }

    public function reload(){
        if (isset($_GET)){
            foreach ($_GET as $key => $value){
                if (is_array( $value)){
                    $newValue = array();
                    foreach($value as $key2 => $value2){
                        $value2 = htmlspecialchars(trim($value2), ENT_QUOTES);
                        $newValue[$key2] = $value2;
                    }
                    $this->data[$key] = $newValue;
                } else {
                    $this->data[$key] = htmlspecialchars(trim($value), ENT_QUOTES);
                }
            }
        } else {
            $this->data = array();
        }
    }

    public function erase(){
        unset($_GET);
        $this->reload();
    }

}

/**
 * Class Lib_Extern_Mail
 */
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require dirname(__FILE__) . '/PHPMailer/src/Exception.php';
require dirname(__FILE__) . '/PHPMailer/src/PHPMailer.php';
require dirname(__FILE__) . '/PHPMailer/src/SMTP.php';
class Lib_Extern_Mail{

    function sendmail($toEmail, $toName, $subject, $body, $fromEmail='', $fromName=''){
        global $_GLOBALS;

        $mail = new PHPMailer();

        try {
            //Server settings
            $mail->SMTPDebug = \PHPMailer\PHPMailer\SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = @$_GLOBALS['config']['extern']['mail']['host'];                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = @$_GLOBALS['config']['extern']['mail']['user'];                     //SMTP username
            $mail->Password   = @$_GLOBALS['config']['extern']['mail']['pass'];                               //SMTP password
            $mail->SMTPSecure = $mail::ENCRYPTION_STARTSSL;         //Enable SSL encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port       = @$_GLOBALS['config']['extern']['mail']['port'];                                  //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

            //Recipients
            if ( $fromEmail == '' ){
                $mail->setFrom(@$_GLOBALS['config']['extern']['mail']['user'], 'MyQuest');
            } else {
                $mail->setFrom($fromEmail, $fromName);
            }
            $mail->addAddress($toEmail, $toName);     //Add a recipient
            $mail->addReplyTo(@$_GLOBALS['config']['extern']['mail']['user'], 'MyQuest');
//
//            //Content
//            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = $subject;
            $mail->Body    = $body;
//            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
//            echo 'Message has been sent';
        } catch (Exception $e) {
//            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }

        return true;
    }
}

/**
 * Class Lib_Extern_Cookie
 */
class Lib_Extern_Cookie{

    function get($key){
        if(isset($_COOKIE[$key])){
            return $_COOKIE[$key];
        }
        return null;
    }

    public function set($name, $value, $expire = 0){
        return @setcookie($name, $value, $expire, "/");

    }

    public function remove($name){
        @setcookie($name, "", time()-3600);
        return true;
    }

}

/**
 * Class Lib_Extern
 */
class Lib_Extern{

    private $data = array();

    function __construct(){
        $this->data['session'] = new Lib_Extern_Session();
        $this->data['post'] = new Lib_Extern_Post();
        $this->data['get'] = new Lib_Extern_Get();
        $this->data['mail'] = new Lib_Extern_Mail();
        $this->data['cookie'] = new Lib_Extern_Cookie();
    }

    function __get($key){
        if (array_key_exists($key, $this->data)) return $this->data[$key];
        return null;
    }

}
