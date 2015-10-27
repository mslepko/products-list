<?php namespace App;

use \App\Model\CategoryModel;

class Category extends BaseController
{
    public function __construct()
    {
        $this->model = new CategoryModel();
    }
    public function getCategory($id = null, $parentId = null)
    {
        if (!is_null($id)) {
            return $this->getById($id);
        }

        if (!is_null($parentId)) {
            return $this->getCategoryByParent($parentId);
        }
    }

    public function getCategoryByParent($parentId)
    {
        return $this->model->getByParentId($parentId);
    }

    public function getChildren($parentId)
    {
        return $this->getCategoryByParent($parentId);
    }
}