<?php 

namespace app\models\drivers;

use mysqli;

class connectionDB{
    private $connection = null;

    public function __construct()
    {
        $this->connection = new mysqli('localhost','root','','proyecto_2_db');
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    }

    public function execSQL($sql){
        return $this->connection->query($sql);
    }

    public function close(){
        $this->connection->close();
    }
}