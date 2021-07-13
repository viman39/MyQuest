<?php if (!defined('SITE_NAME')) die();

class Mod_Photo extends Controller{

    function __construct(){
        parent::__construct();
    }

    function getById($idPhoto){
        $idPhoto = intval($idPhoto);

        $query = "SELECT * FROM `photo` WHERE `id` = '".$idPhoto."'";

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

        $query = "INSERT INTO `photo` SET ";

        $values = array();

        foreach ( $data as $key => $value ){
            $values[] = "\t`".$key."` = '".$value."' \n";
        }

        $query .= implode(", ", $values);

        $result = $this->lib->db->main->query($query);

        return $result->insertId();
    }
}