<?php

namespace app\models\drivers;

use mysqli;

class ConexDB {
    private $conn;
    
    public function getConnection()
    {
        return $this->conn;
    }

    public function __construct() {
        $this->conn = new mysqli("localhost", "root", "", "taller_restaurante");
        if ($this->conn->connect_error) {
            die("Error de conexión: " . $this->conn->connect_error);
        }
    }

    public function execSQL($sql) {
        return $this->conn->query($sql);
    }

    public function close() {
        $this->conn->close();
    }
}
