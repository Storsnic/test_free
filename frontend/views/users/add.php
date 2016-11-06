<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Users */

if($type == 1)
	$this->title = 'Send money to another user';
else
	$this->title = 'Add money to current user';
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="users-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_addMoneyForm', [
        'model' => $model,
        'operations_model' => $operations_model,
        'type' => $type,
    ]) ?>

</div>
