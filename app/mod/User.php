<?php if (!defined('SITE_NAME')) die();

class Mod_User extends Controller{

    function __construct(){
        parent::__construct();
    }

    function getAll(){
        $query = "SELECT * FROM `user` ";

        $results = $this->lib->db->main->query($query)->fetchAll();

        if ( $results == null ){
            return array();
        }

        return $results;
    }

    function getAllWhere($data){
        $query = "SELECT * FROM `user` WHERE ";

        if ( count($data) != 0 ){
            foreach ( $data as $key => $value ){
                $query .= '`' . $key . '` = \'' . $value . '\' AND ';
            }
        }

        $query .= " `deleted` = 'n'";

        $result = $this->lib->db->main->query($query);

        if ( $result == false ){
            return array();
        }

        return $result->fetchAll();
    }

    function getWhere($data){
        $query = "SELECT * FROM `user` WHERE ";

        if ( count($data) != 0 ){
            foreach ( $data as $key => $value ){
                $query .= '`' . $key . '` = \'' . $value . '\' AND ';
            }
        }

        $query .= " `deleted` = 'n'";

        $result = $this->lib->db->main->query($query);

        if ( $result == false ){
            return array();
        }

        return $result->fetch();
    }

    function getById($id){
        $id = intval($id);

        $query = " SELECT * FROM `user` WHERE `id` = '".$id."' LIMIT 1 ";
        $result = $this->lib->db->main->query($query)->fetch();
        if ( !$result ){
            return false;
        }

        return $result;
    }

    function create($data){
        if ( count($data) == 0 ){
            return false;
        }

        $query = "INSERT INTO `user` SET ";

        $values = array();

        foreach ( $data as $key => $value ){
            $values[] = "\t`".$key."` = '".$value."' \n";
        }

        if ( !isset($data['password']) or $data['password'] == '' ){
            $values[] = "\t`password` = '".md5("V!ctor1998")."' \n";
        }

        $query .= implode(", ", $values);

        $result = $this->lib->db->main->query($query);

        $idUser = $result->insertId();

        $this->mod->log->addLog('userLog', array(
            'idUser' => @$this->lib->extern->session->user['id'],
            'idRef' => $idUser,
            'action' => 'create',
            'description' => serialize($data),
            'date' => date('Y-m-d H:i:s')
        ));

        $this->mod->email->sendEmail($data['email'], 'addUser', array(
            'username' => $data['username'],
        ));

        return $this->getById($idUser);
    }

    function update($idUser, $data){
        $idUser = intval($idUser);

        if ( $idUser == 0 ){
            return false;
        }

        $user = $this->getById($idUser);

        if ( $user == false ){
            return false;
        }

        if ( count($data) == 0 ){
            return false;
        }

        $query = "UPDATE `user` SET ";

        $values = array();

        foreach ( $data as $key => $value ){
            $values[] = "\t`".$key."` = '".$value."' \n";
        }

        $query .= implode(", ", $values);

        $query .= " WHERE `id` = '".$idUser."' LIMIT 1 ";

        $result = $this->lib->db->main->query($query);

        $this->mod->log->addLog('userLog', array(
            'idUser' => @$this->lib->extern->session->user['id'],
            'idRef' => $idUser,
            'action' => 'update',
            'description' => serialize($data),
            'date' => date('Y-m-d H:i:s')
        ));

        return $this->getById($idUser);
    }

    function delete($idUser){
        $idUser = intval($idUser);

        $query = "UPDATE `user` SET `deleted` = 'y' WHERE `id` = '".$idUser."' LIMIT 1;";

        $this->mod->log->addLog('userLog', array(
            'idUser' => @$this->lib->extern->session->user['id'],
            'idRef' => $idUser,
            'action' => 'delete',
            'date' => date('Y-m-d H:i:s')
        ));
        return $this->lib->db->main->query($query);
    }

    function getNameById($idUser){
        $user = $this->getById($idUser);

        if ( $user == false ){
            return "";
        }

        return $user['firstName'] . ' ' . $user['lastName'];
    }

    function emailIsUsed($email){
        $query = "SELECT * FROM `user` WHERE `email` = '".$email."'";

        $result = $this->lib->db->main->query($query);

        if ( $result == false ){
            return false;
        }

        if ( count($result->fetchAll()) > 0 ){
            return true;
        }

        return false;
    }

    function getUserByUsername($username){
        $query = "SELECT * FROM `user` WHERE `username` = '".$username."'";

        $result = $this->lib->db->main->query($query);

        if ( $result == false ){
            return false;
        }

        return $result->fetch();
    }

    function settingsSet(){
        $idUser = intval($this->lib->extern->session->user['id']);

        $user = $this->getById($idUser);

        if ( $user == false ){
            return false;
        }

        if ( $user['firstName'] == '' or $user['lastName'] == '' or $user['birthdate'] == '' ){
            return false;
        }

        return true;
    }

    function resetPassword($idUser){
        $idUser = intval($idUser);
        $user = $this->getById($idUser);

        if ( $user == false ){
            return false;
        }

        $code = uniqid(time());

        $password = $this->mod->password->create(array(
            'idUser' => $idUser,
            'date' => date('Y-m-d'),
            'code' => $code,
            'used' => 'n',
        ));

        $passwordLink = SITE_NAME . '/password/reset/' . $code;

        $this->mod->email->sendEmail($user['email'], 'recoverPassword', array(
            'username' => $user['username'],
            'passwordLink' => $passwordLink,
        ));

        return $password;
    }
}
