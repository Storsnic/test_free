<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Users */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="users-form">

    <?php $form = ActiveForm::begin(); ?>


	<div style="float:left; width: 300px">
	<?php if($type == '1'):?>
	    <?=$form->field($operations_model, 'from_user')->hiddenInput(['value' => $model->email])->label('');?>
		<?= $form->field($operations_model, 'to_user')->textInput(['maxlength' => true]) ?>
	<?php endif ?>

	<?php if($type == '2'):?>		
		<?=$form->field($operations_model, 'from_user')->hiddenInput(['value' => 'admin'])->label('');?>
		<?=$form->field($operations_model, 'to_user')->hiddenInput(['value' => $model->email])->label('');?>
	<?php endif ?>

	<?= $form->field($operations_model, 'amount')->textInput(['maxlength' => true]) ?>
    

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Send money', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
</div>
    <?php ActiveForm::end(); ?>

</div>
