<?php if (!defined('SITE_NAME')) die();

class Mod_Password extends Controller{

    function __construct(){
        parent::__construct();
    }

    function getById($idPassword){
        $idPassword = intval($idPassword);

        $query = "SELECT * FROM `password` WHERE `id` = '".$idPassword."'";

        $result = $this->lib->db->main->query($query);

        if ( $result == false ){
            return false;
        }

        return $result->fetch();
    }

    function create($data){
        if ( count($data) == 0 ){
            return false;
        }

        $query = "INSERT INTO `password` SET ";

        $values = array();

        foreach ( $data as $key => $value ){
            $values[] = "\t`".$key."` = '".$value."' \n";
        }

        $query .= implode(", ", $values);

        $result = $this->lib->db->main->query($query);

        $idPassword = $result->insertId();

        return $this->getById($idPassword);
    }

    function update($idPassword, $data){
        if ( count($data) == 0 ){
            return false;
        }

        $query = "UPDATE `password` SET ";

        $values = array();

        foreach ( $data as $key => $value ){
            $values[] = "\t`".$key."` = '".$value."' \n";
        }

        $query .= implode(", ", $values);

        $query .= " WHERE `id` = '".$idPassword."'";

        $this->lib->db->main->query($query);

        return $this->getById($idPassword);
    }

    function getByCode($code){
        $query = "SELECT * FROM `password` WHERE `code` = '".$code."'";

        $result = $this->lib->db->main->query($query);

        if ( $result == false ){
            return false;
        }

        return $result->fetch();
    }

}
