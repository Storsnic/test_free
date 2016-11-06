<?php

use yii\helpers\Html;
use yii\grid\GridView;
use frontend\models\Operations;

/* @var $this yii\web\View */
/* @var $model app\models\Users */

// $this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="operations-view">

    <h1><?= Html::encode($this->title) ?></h1>
    

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

</div>
