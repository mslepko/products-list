<?php namespace App;

use \App\Model\ProductModel;

class Product extends BaseController
{
    public function __construct()
    {
        $this->model = new ProductModel();
    }

}