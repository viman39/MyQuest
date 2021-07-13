<?php

/* make sure request came from index.php */
if (!defined('SITE_NAME')) die();

/**
 * Class Lib_Db_Query
 */
class Lib_Db_Query{

    private $mysqli = null;
    private $query = null;
    public $result = null;

    function __construct($mysqli, $query, $result){
        $this->mysqli = $mysqli;
        $this->query = $query;
        $this->result = $result;
    }

    public function insertId(){
        return $this->mysqli->insert_id;
    }

    public function fetch($type = 'array', $skipDecode = false){
        $record = $this->result->fetch_assoc();
        if(is_null($record)) return null;
        if($skipDecode){
            return $record;
        }
        $newRecord = array();
        foreach($record as $key => $value){
            $newRecord[$key] = htmlspecialchars_decode($value, ENT_QUOTES);
        }
        $record = $newRecord;
        if($type == 'array') return $record;
        return (object)$record;
    }

    public function fetchAll($type = 'array', $skipDecode = false){
        $records = array();
        while($record = $this->fetch($type, $skipDecode)){
            /*
            $newRecord = array();
            foreach($record as $key => $value){
                $newRecord[$key] = htmlspecialchars_decode($value, ENT_QUOTES);
            }
            $record = $newRecord;
            */
            array_push($records, $record);
        }
        return $records;
    }

    public function close(){
        if(!is_null($this->result)){
            $this->result->close();
        }
    }

}

/**
 * Class Lib_Db_Handler
 */
class Lib_Db_Handler{

    private $mysqli = null;
    public $base = '';
    private $logShowQuery = true;
    private $logShowQueryTime = 0.5;

    function __construct($host, $user, $pass, $base){
        $this->base = $base;
        $this->mysqli = new mysqli($host, $user, $pass, $base);

        if($this->mysqli->connect_errno != 0){
            __sys_console("db connection error", $this->mysqli->connect_error);
            exit(0);
        }

        $this->mysqli->set_charset('utf8');
    }

    public function query($query){
        if($this->logShowQuery){
            $queryTimeStart = microtime(true);
        }
        $result = $this->mysqli->query($query);
        if($this->logShowQuery && $result !== false){
            $queryTimeStop = microtime(true);
            if($queryTimeStop-$queryTimeStart >= $this->logShowQueryTime){
                $log = array(
                    'time' => date('H:i:s'),
                    'tiokkenenme' => array(
                        'start' => $queryTimeStart,
                        'stop' => $queryTimeStop,
                        'total' => $queryTimeStop-$queryTimeStart
                    ),
                    'query' => $query,
                    'server' => $_SERVER,
                    'post' => $_POST,
                    'get' => $_GET
                );

                $file = SITE_APP.'/var/slowquery/'.date("Y-m-d").'.'.$this->base.'.log';
                $df = @fopen($file, 'a');

                if($df !== false){
                    @fwrite($df, print_r($log, true)."\n");
                    @fflush($df);
                    @fclose($df);
                }
            }
        }
        if($result === false){
            if(SITE_DEV) {
                $backtrace = debug_backtrace();

                __sys_console("db query error", $this->mysqli->errno, $this->mysqli->error, $query, $backtrace);
                exit(0);
            }
            return false;
        }
        return new Lib_Db_Query($this->mysqli, $query, $result);
    }

    public function insertId(){
        return $this->mysqli->insert_id;
    }

}

/**
 * Class Lib_Db
 */
class Lib_Db{

    /**
     * @var null database handler
     */
    private $data = array();

    /**
     * Lib_Db constructor.
     */
    function __construct(){
        global $_GLOBALS;

        $dbMain = @$_GLOBALS['config']['db']['myquest'];
        $this->data['main'] = new Lib_Db_Handler(@$dbMain['host'], @$dbMain['user'], @$dbMain['pass'], @$dbMain['base']);

    }

    function __get($key){
        if (array_key_exists($key, $this->data)) return $this->data[$key];
        return null;
    }
}
