<?php if (!defined('SITE_NAME')) die();

class Mod_Email extends Controller{

    function __construct(){
        parent::__construct();
    }

    function emailTagReplacer($text, $information){
        $text = str_replace(
            array(
                '__USERNAME__',
                '__PASSWORD_LINK__'
            ),
            array(
                @$information['username'],
                @$information['passwordLink']
            ),
            $text
        );

        return $text;
    }

    function sendEmail($toEmail, $template, $information){
        $emailText = $this->mod->emailTemplate->getTemplate($template);
        $subject = $this->emailTagReplacer($emailText['subject'], $information);
        $body = $this->emailTagReplacer($emailText['body'], $information);
        $toName = $information['toName'];

        $email = $this->lib->extern->mail->sendmail($toEmail, $toName, $subject, $body);

        $status = 'success';

        if ( $email != 1 ){
            $status = 'error';
        }

        $this->mod->log->addLog('emailLog', array(
            'idUser' => $this->lib->extern->session->user['id'],
            'emailTemplate' => $template,
            'toEmail' => $toEmail,
            'status' => $status,
            'date' => date('Y-m-d H:i:s')
        ));

        return $email;
    }

    function sendSupport($subject, $body){
        global $_GLOBALS;
        $idUser = $this->lib->extern->session->user['id'];
        $user = $this->mod->user->getById($idUser);

        if ( $user == false ){
            return false;
        }

        $subject = '[' . $user['username'] . ']' . $subject;

        $userName = $this->mod->user->getNameById($user['id']);
        $email = $this->lib->extern->mail->sendmail(@$_GLOBALS['config']['extern']['mail']['user'], '', $subject, $body, $user['email'], $userName);

        return $email;
    }
}