<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\operations */

$this->title = 'Create Operations';
$this->params['breadcrumbs'][] = ['label' => 'Operations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="operations-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
