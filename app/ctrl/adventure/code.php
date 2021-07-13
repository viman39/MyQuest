<?php if (!defined('SITE_NAME')) die();

class Code extends Controller{

    function __construct(){
        parent::__construct();
    }

    function index($argv = array()){
        $post = $this->lib->extern->post->getAll();
        $error = array();

        if ( count($post) > 0 ){
            $quest = false;
            $code = $post['code'];
            if ( isset($post['code']) and $post['code'] != '' ){
                $quest = $this->mod->quest->getBy(array('deleted' => 'n', 'code' => $code, 'status' => 'enabled'));

                if ( $quest == false ){
                    $error['generalError'] = 'Wrong code';
                }
            } else {
                $error['generalError'] = 'Code is mandatory';
            }

            if ( count($error) == 0 ){
                $this->lib->extern->session->set('startAdventure', time());
                $this->lib->extern->session->set('identifier', $post['identifier']);

                header('Location: /adventure/start/'.$code);
                exit(0);
            }
        }

        $this->loadView('/adventure/code', array(
            'post' => $post,
            'error' => $error
        ));
    }
}