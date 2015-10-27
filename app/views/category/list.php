<?php
$categories = $categoryObj->getCategory(null, 0);

?>
<table class="table">
<tr>
    <th>#</th>
    <th>Name</th>
    <th>Status</th>
    <th>Created</th>
</tr>

<?php 
$i = 0;
foreach($categories as $cat): 
?>
<tr>
    <td><?=++$i;?></td>
    <td>
        <a href="/category/<?=$cat['id']?>"><?php echo $cat['name'];?></a>
        <?php
        $children = $categoryObj->getChildren($cat['id']);

        if (!empty($children)): 
        ?>
        <ul>
            <?php foreach ($children as $child): ?>
                <li><a href="/category/<?=$child['id']?>"><?php echo $child['name'];?></a></li>
            <?php endforeach; ?>
        </ul>

        <?php endif; ?>

    </td>
    <td><?php echo $status[$cat['status']]; ?></td>
    <td><?php echo $cat['created_at'];?></td>
</tr>
<?php endforeach; ?>

</table>