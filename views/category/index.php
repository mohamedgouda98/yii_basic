<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
?>
<h1>category/index</h1>
<a href="index.php?r=category/create" class="btn btn-primary">Create New</a>
<br><br>
<ul class="list-group">
    <?php
    foreach ($categories as $category): ?>
        <li class="list-group-item"><a href="index.php?r=jobs&category=<?=$category->id ?>"> <?= $category->name?> </a></li>

    <?php endforeach; ?>
</ul>
