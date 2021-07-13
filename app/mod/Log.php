<?php if (!defined('SITE_NAME')) die();

class Mod_Log extends Controller{

    function __construct(){
        parent::__construct();
    }

    function addLog($tableName, $data){
        if ( count($data) == 0 ){
            return false;
        }

        $query = "INSERT INTO `".$tableName."` SET ";

        $values = array();

        foreach ( $data as $key => $value ){
            $values[] = "\t`".$key."` = '".$value."' \n";
        }

        $query .= implode(", ", $values);

        return $this->lib->db->main->query($query);
    }

    function getUserCreate($idUser){
        $query = "SELECT * FROM `userLog` WHERE `idRef` = '".$idUser."' AND `action` = 'create'";

        $result = $this->lib->db->main->query($query);

        if ( $result == false ){
            return false;
        }

        return $result->fetch();
    }
}
