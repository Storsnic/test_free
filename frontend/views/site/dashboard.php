<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\grid\GridView;
use frontend\models\Operations;

$this->title = 'Dashboard';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-dashboard">

			<?php $form = ActiveForm::begin(['id' => 'form-dashboard']); ?>

            
			<div style="overflow: hidden;">
				<div style="float:left">
					<label style="font-size: 60px;">
			            <?=Html::encode("{$money_model->amount}"." р.")?>
		            </label>
		        
					<?= $form->field($operations_model, 'from_user')->hiddenInput(['value' => $user_model->email])->label(''); ?>
					<?= $form->field($operations_model, 'to_user')->textInput(['maxlength' => true]) ?>
					<?= $form->field($operations_model, 'amount')->textInput(['maxlength' => true]) ?>
					<?= Html::submitButton('Send money', ['class' => 'btn btn-success']);?>
				</div>
				

				<div style="margin-top: 30%">
					
			    </div>
				
			</div>
            

            <?php ActiveForm::end(); ?>

            <?php $form = ActiveForm::begin(['id' => 'form-operations']); ?>
            <?= GridView::widget([
				        'dataProvider' => $dataProvider,
				        'filterModel' => $searchModel,
				        'columns' => [
				            ['class' => 'yii\grid\SerialColumn'],

				            // 'id',
				            'from_user',
				            'to_user',
				            'amount',
				            [
				                'label' => 'Money left',
				                'value' => function (Operations $data) use ($user_model) {
				                    if($data->from_user == $user_model->email)
				                    	return $data->from_user_left;
				                    if($data->to_user == $user_model->email)
				                    	return $data->to_user_left;
				                },
				                'format' => 'raw',
				            ],
				            // 'from_user_left',
				            // 'to_user_left',
				            'by_admin',

				            // ['class' => 'yii\grid\ActionColumn'],
				        ],
				    ]); ?>
            <?php ActiveForm::end(); ?>

</div>
