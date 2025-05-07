<?php

namespace app\models\entities;

use app\models\drivers\ConexDB;

class restaurant_tables extends Entity
{
    protected $id = null;
    protected $name = "";

    public function all()
    {
        $sql = "SELECT * FROM tables";
        $conex = new ConexDB();
        $conn = $conex->getConnection();
        $resultDb = $conn->query($sql);

        $tables = [];
        if ($resultDb && $resultDb->num_rows > 0) {
            while ($rowDb = $resultDb->fetch_assoc()) {
                $table = new restaurant_tables();
                $table->set('id', $rowDb['id']);
                $table->set('name', $rowDb['name']);
                $tables[] = $table;
            }
        }

        $conex->close();
        return $tables;
    }

    public function save()
    {
        $sql = "INSERT INTO tables (name) VALUES (?)";
        $conex = new ConexDB();
        $conn = $conex->getConnection();

        $stmt = $conn->prepare($sql);
        if (!$stmt) return false;

        $stmt->bind_param("s", $this->name);
        $result = $stmt->execute();

        $stmt->close();
        $conex->close();

        return $result;
    }

    public function update()
    {
        $sql = "UPDATE tables SET name = ? WHERE id = ?";
        $conex = new ConexDB();
        $conn = $conex->getConnection();

        $stmt = $conn->prepare($sql);
        if (!$stmt) return false;

        $stmt->bind_param("si", $this->name, $this->id);
        $result = $stmt->execute();

        $stmt->close();
        $conex->close();

        return $result;
    }

    public function delete()
    {
        $conex = new ConexDB();
        $conn = $conex->getConnection();

        // Verificar si hay órdenes asociadas
        $sqlCheck = "SELECT COUNT(*) as count FROM orders WHERE table_id = ?";
        $stmtCheck = $conn->prepare($sqlCheck);
        if (!$stmtCheck) return false;

        $stmtCheck->bind_param("i", $this->id);
        $stmtCheck->execute();
        $resultCheck = $stmtCheck->get_result();
        $rowCheck = $resultCheck->fetch_assoc();

        if ($rowCheck['count'] > 0) {
            $stmtCheck->close();
            $conex->close();
            return false; // No eliminar si hay pedidos asociados
        }

        $stmtCheck->close();

        // Eliminar la mesa
        $sqlDelete = "DELETE FROM tables WHERE id = ?";
        $stmt = $conn->prepare($sqlDelete);
        if (!$stmt) return false;

        $stmt->bind_param("i", $this->id);
        $result = $stmt->execute();

        $stmt->close();
        $conex->close();

        return $result;
    }
}