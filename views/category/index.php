<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
?>
<h1>category/index</h1>

<ul>
<?php
foreach ($categories as $category): ?>
            <li><?= $category->name; ?></li>

<?php endforeach; ?>
</ul>
