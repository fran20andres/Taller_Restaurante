<?php

namespace app\models\entities;

require_once 'entity.php';

class restaurant_tables extends Entity
{
    protected $table = 'restaurant_tables';
    protected $attributes = [
        'id' => null,
        'name' => null
    ];

    public function all()
    {
        $sql = "SELECT * FROM {$this->table}";
        $stmt = $this->conn->query($sql);
        $results = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        $tables = [];
        foreach ($results as $row) {
            $table = new self();
            $table->set('id', $row['id']);
            $table->set('name', $row['name']);
            $tables[] = $table;
        }
        return $tables;
    }

    public function save()
    {
        $sql = "INSERT INTO {$this->table} (name) VALUES (:name)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute(['name' => $this->get('name')]);
    }

    public function update()
    {
        $sql = "UPDATE {$this->table} SET name = :name WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([
            'name' => $this->get('name'),
            'id' => $this->get('id')
        ]);
    }

    public function delete()
    {
        $sql = "DELETE FROM {$this->table} WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute(['id' => $this->get('id')]);
    }
}