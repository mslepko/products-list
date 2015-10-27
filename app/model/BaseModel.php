<?php namespace App\Model;

use \App\App;

class BaseModel extends App
{

    public function __construct()
    {   
        $this->getConnection();
    }

    private function getById($id) 
    {
        return $this->db->fetchRow($this->table, array('id' => $id));
    }

    private function getAll()
    {
        return $this->db->fetchAll($this->table);
    }

    public function get($id = null) {
        if (is_null($id)) {
            return $this->getAll();
        } else {
            return $this->getById($id);
        }
    }
}