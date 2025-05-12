<?php

namespace app\models\entities;

use app\models\drivers\conexDB;

class table extends entity
{
    protected $idTable = null;
    protected $name = "";

    public function all(){
        $sql = "select * from restaurant_tables";
        $conecction = new conexDB();
        $resultDB = $conecction->execSQL($sql);
        $tables = [];
        if ($resultDB->num_rows > 0) {
            while ($rowDB = $resultDB->fetch_assoc()) {
                $table = new Table();
                $table->set('id', $rowDB['id']);
                $table->set('name', $rowDB['name']);
                array_push($tables,$table);
            }
        }
        $conecction->close();
        return $tables;
    }

    public function save(){
        $sql = "insert into restaurant_tables (name) values ";
        $sql .= "('" . $this->name . "')";
        $conecction = new conexDB();
        $resultDB = $conecction->execSQL($sql);
        $conecction->close();
        return $resultDB;
    }

    public function update(){
        $sql = "update restaurant_tables set ";
        $sql .= "name='" . $this->name . "'";
        $sql .= " where id=" . $this->idTable;
        $conecction = new conexDB();
        $resultDB = $conecction->execSQL($sql);
        $conecction->close();
        return $resultDB;
    }

    public function delete(){
        $sql = "DELETE FROM restaurant_tables WHERE id=" . $this->idTable;
        $connection = new conexDB();
        $result = $connection->execSQL($sql);
        $connection->close();
        return $result;
    }
}