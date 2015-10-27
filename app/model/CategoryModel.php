<?php namespace App\Model;


class CategoryModel extends BaseModel
{
    public $id;
    public $name;
    public $status;
    public $parentId;
    public $created_at;
    public $updated_at;

    protected $table = 'Category';
    protected $primaryKey = 'id';

    public function getByParentId($parentId)
    {   
        $parentId = (is_null($parentId) || $parentId === 0) ? 'IS NULL' : $parentId;
        return $this->db->fetchAll($this->table, array('parentId' => $parentId));
    }
}
