<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\operations */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="operations-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'from_user')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'to_user')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'amount')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
