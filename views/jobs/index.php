<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
?>
<h1>Jobs/index</h1>
<a href="index.php?r=jobs/create" class="btn btn-primary">Create New</a>
<br><br>

<div class="row">
    <div class="container">
    <?php
    foreach ($jobs as $job): ?>

            <div class="col-md-4">

                <div class="card text-center">
                    <div class="card-header">
                        Job Offer
                    </div>
                    <div class="card-body">
                        <h5 class="card-title"><?= $job->title?></h5>
                        <p class="card-text"><?= $job->description ?></p>
                        <a href="index.php?r=category/" class="btn btn-primary">category link</a>
                    </div>
                    <div class="card-footer text-muted">
                        <?= $job->date ?>
                    </div>
                </div>
            </div>

    <?php endforeach; ?>
    </div>
</div>
