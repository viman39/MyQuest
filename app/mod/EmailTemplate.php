<?php if (!defined('SITE_NAME')) die();

class Mod_EmailTemplate extends Controller{

    function __construct(){
        parent::__construct();
    }

    function getTemplate($template){
        $subject = '';
        $body = '';

        if ( $template == 'addUser' ){
            $subject = "Register Confirmation";
            $body = "
                Hello __USERNAME__, \n
            Thank you for registering we hope you find what you aspire for! \n
            Yours, MyQuest Team";
        } else if ( $template == 'recoverPassword' ){
            $subject = "RecoverPassword";
            $body = "
                Hi __USERNAME__, \n
                Here is your password reset link: \n
                http://__PASSWORD_LINK__
            ";
        }

        if ( $subject == '' ){
            return array();
        }

        return array(
            'subject' => $subject,
            'body' => $body
        );
    }

}
