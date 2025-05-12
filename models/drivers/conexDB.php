<?php

namespace app\models\drivers;

use mysqli;

class conexDB {
    private $conn;
    
    public function getConnection()
    {
        return $this->conn;
    }

    public function __construct() {
        $this->conn = new mysqli("localhost", "root", "", "taller_restaurante");
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    }

    public function execSQL($sql) {
        return $this->conn->query($sql);
    }

    public function close() {
        $this->conn->close();
    }
}
