<?php
$products = $productObj->getList();
?>
<table class="table">
<tr>
    <th>#</th>
    <th>Part number</th>
    <th>Description></th>
    <th>Category</th>
    <th>Sub category</th>
    <th>Status</th>
    <th>Created</th>
</tr>

<?php 
$i = 0;
foreach($products as $prod): 
$subCategory = $categoryObj->getCategory($prod['categoryId']);
if (!is_null($subCategory->parentId) && $subCategory->parentId>0) {
    $parentCategory = $categoryObj->getCategory($subCategory->parentId);
}
?>
<tr>
    <td><?=++$i;?></td>
    <td><a href="/product/<?=$prod['id']?>"><?php echo $prod['part_number'];?></a></td>
    <td><?php echo $prod['description']; ?></td>
    <td><a href="/category/<?=$parentCategory->id?>"><?php echo $parentCategory->name;?></a></td>
    <td><a href="/category/<?=$subCategory->id?>"><?php echo $subCategory->name;?></a></td>
    <td><?php echo $status[$prod['status']]; ?></td>
    <td><?php echo $prod['created_at'];?></td>
</tr>
<?php endforeach; ?>

</table>