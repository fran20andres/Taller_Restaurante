<?php

namespace app\models\entities;

use PDO;
use PDOException;

abstract class Entity
{
    protected $conn;

    public function __construct()
    {
        try {
            $this->conn = new PDO("mysql:host=localhost;dbname=proyecto_2_db", "root", "");
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Error de conexión: " . $e->getMessage());
        }
    }

    abstract function all();
    abstract function save();
    abstract function update();
    abstract function delete();

    public function set($prop, $value)
    {
        $this->{$prop} = $value;
    }

    public function get($prop)
    {
        return $this->{$prop};
    }
}
