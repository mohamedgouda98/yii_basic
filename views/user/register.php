<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $user app\models\User */
/* @var $form ActiveForm */
?>
<div class="user-register">

    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($user, 'username') ?>
    <?= $form->field($user, 'password')->passwordInput() ?>
    <?= $form->field($user, 'password_repeat')->passwordInput() ?>

    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- user-register -->
