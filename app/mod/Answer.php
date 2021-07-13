<?php if (!defined('SITE_NAME')) die();

class Mod_Answer extends Controller{

    function __construct(){
        parent::__construct();
    }

    function getAllByUser($idUser){
        $idUser = intval($idUser);

        $query = "SELECT * FROM `answer` WHERE `idUser` = '".$idUser."' AND `deleted` = 'n'";

        $results = $this->lib->db->main->query($query);

        if ( $results == false ){
            return array();
        }

        return $results->fetchAll();
    }

    function getAllByQuest($idQuest){
        $idQuest = intval($idQuest);

        $query = "SELECT * FROM `answer` WHERE `idQuest` = '".$idQuest."' AND `deleted` = 'n'";

        $results = $this->lib->db->main->query($query);

        if ( $results == false ){
            return array();
        }

        return $results->fetchAll();
    }

    function create($data){
        if ( count($data) == 0 ){
            return false;
        }

        $query = "INSERT INTO `answer` SET ";

        $values = array();

        foreach ( $data as $key => $value ){
            $values[] = "\t`".$key."` = '".$value."' \n";
        }

        $query .= implode(", ", $values);

        return $this->lib->db->main->query($query);
    }
}
