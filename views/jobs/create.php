<?php

use app\models\Categories;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $job app\jobs\Jobs */
/* @var $form ActiveForm */
?>
<div class="jobs-create">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($job, 'title') ?>
        <?= $form->field($job, 'description')->textarea(['rows', '5']) ?>
        <?= $form->field($job, 'date') ?>
        <?= $form->field($job, 'category_id')->dropDownList(
                Categories::find()
                ->select('id', 'name')
                ->column(),['prompt' => 'select Category']
        ); ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div>
<!-- jobs-create -->
