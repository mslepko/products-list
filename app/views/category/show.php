<?php
$categoryId = $env = filter_input(INPUT_GET, 'category', FILTER_SANITIZE_STRING);
$category = $categoryObj->getCategory($categoryId);
$hasParent = (!is_null($category->parentId) && $category->parentId>0) ? true : false;
if ($hasParent) {
    $parent = $categoryObj->getCategory($category->parentId);
}
?>
<div class="col-lg-12">

<form method="post" action="/category/<?=$categoryId;?>">
    <input type="hidden" name="id" value="<?=$categoryId;?>"/>

    <div class="row top-25">
        <div class="input-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="name" value="<?=$category->name;?>">
        </div>
    </div>
    
    <div class="row top-25">
        <div class="input-group">
            <label>Status:</label>
            <div class="input-group">
            <label class="radio-inline"><input type="radio" name="status" <?php echo $category->status == 1 ? 'checked' : '';?> value="1">Active</label>
            <label class="radio-inline"><input type="radio" name="status" <?php echo $category->status != 1 ? 'checked' : '';?> value="0">Disabled</label>
            </div>
        </div>
    </div>

    <?php if ($hasParent): ?>
        <div class="row top-25">
            <div class="input-group">
                <p><strong>Parent: </strong></p>
                <a href="/category/<?=$parent->id;?>" class="pull-left"><?php echo $parent->name;?></a>
            </div>
        </div>
    <?php endif; ?>

    <div class="row top-25">
        <div class="input-group">
            <label for="name">Created:</label>
            <input type="text" class="form-control" id="name" name="name" value="<?=$category->created_at;?>">
        </div>
    </div>

    <div class="row top-25">
        <div class="input-group">
            <label for="name">Updated:</label>
            <input type="text" class="form-control" id="name" name="name" value="<?=$category->updated_at;?>">
        </div>
    </div>

    <div class="row top-25">
        <input type="submit" value="Save" class="btn btn-primary" disabled/>
    </div>

</form>
</div>