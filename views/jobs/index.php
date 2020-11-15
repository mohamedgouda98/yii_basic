<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
?>
<h1>category/index</h1>
<a href="index.php?r=jobs/create" class="btn btn-primary">Create New</a>
<br><br>
    <?php
    foreach ($jobs as $job): ?>

        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title"><?= $job->title?></h5>
                <h6 class="card-subtitle mb-2 text-muted"><?= $job->date ?></h6>
                <p class="card-text"><?= $job->description ?></p>
                <a href="index.php?r=category/" class="card-link">category link</a>
            </div>
        </div>

    <?php endforeach; ?>
