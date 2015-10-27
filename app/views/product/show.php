<?php
$productId = $env = filter_input(INPUT_GET, 'product', FILTER_SANITIZE_STRING);
$product = $productObj->getById($productId);
$category = $categoryObj->getCategory($product->categoryId);
?>

<div class="col-lg-12">

<form method="post" action="/product/<?=$productId;?>">
    <input type="hidden" name="id" value="<?=$productId;?>"/>

    <div class="row top-25">
        <div class="input-group">
            <label for="name">Part number:</label>
            <input type="text" class="form-control" id="name" name="name" value="<?=$product->part_number;?>">
        </div>
    </div>

    <div class="row top-25">
        <div class="input-group">
            <label for="name">Description:</label>
            <input type="text" class="form-control" id="name" name="name" value="<?=$product->description;?>">
        </div>
    </div>

    <div class="row top-25">
        <div class="input-group">
            <label>Status:</label>
            <div class="input-group">
            <label class="radio-inline"><input type="radio" name="status" <?php echo $product->status == 1 ? 'checked' : '';?> value="1">Active</label>
            <label class="radio-inline"><input type="radio" name="status" <?php echo $product->status != 1 ? 'checked' : '';?> value="0">Disabled</label>
            </div>
        </div>
    </div>

    <div class="row top-25">
        <div class="input-group">
            <div class="input-group">
                <p><strong>Category: </strong></p>
                <a href="/category/<?=$category->id;?>" class="pull-left"><?php echo $category->name;?></a>
            </div>
        </div>
    </div>


    <div class="row top-25">
        <div class="input-group">
            <label for="name">Created:</label>
            <input type="text" class="form-control" id="name" name="name" value="<?=$product->created_at;?>">
        </div>
    </div>

    <div class="row top-25">
        <div class="input-group">
            <label for="name">Updated:</label>
            <input type="text" class="form-control" id="name" name="name" value="<?=$product->updated_at;?>">
        </div>
    </div>

    <div class="row top-25">
        <input type="submit" value="Save" class="btn btn-primary" disabled/>
    </div>

</form>
</div>