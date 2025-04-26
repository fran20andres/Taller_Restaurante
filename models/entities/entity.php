<?php

namespace app\models\entities;  // Asegúrate de que este namespace sea correcto

abstract class Entity
{
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

