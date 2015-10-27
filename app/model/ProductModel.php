<?php namespace App\Model;


class ProductModel extends BaseModel
{
    public $id;
    public $part_number;
    public $description;
    public $status;
    public $categoryId;
    public $created_at;
    public $updated_at;

    protected $table = 'Product';
    protected $primaryKey = 'id';

}
