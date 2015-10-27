<?php namespace App;

class BaseController 
{
    protected $model;
    
    public function getList()
    {
        return $this->model->get();
    }

    public function getById($id)
    {
        return $this->model->get($id);
    }
}