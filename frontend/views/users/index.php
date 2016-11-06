<?php

use yii\helpers\Html;
use yii\grid\GridView;
use frontend\models\Money;
use frontend\models\Users;
use yii\helpers\Url;


/* @var $this yii\web\View */
/* @var $searchModel app\models\UsersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
$moneyModel = Money::find()->all();
?>
<div class="users-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Add user', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?=     
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            // 'auth_key',
            // 'password_hash',
            // 'password_reset_token',
            'email',
            // 'status',
            // 'created_at',
            // 'updated_at',
            // 'username',
            // 'admin',

            [
                'label' => 'Money',
                'attribute' => 'moneyf',
                'value' => 'money.amount'
            ],

            [
                'value' => function (Users $data) {
                    return Html::a(Html::encode('Send money'), Url::to(['add', 'id' => $data->id, 'type' => '1']));
                },
                'format' => 'raw',
            ],

            [
                'value' => function (Users $data) {
                    return Html::a(Html::encode('Add money'), Url::to(['add', 'id' => $data->id, 'type' => '2']));
                },
                'format' => 'raw',
            ],

            [
                'value' => function (Users $data) {
                    return Html::a(Html::encode('Operations'), Url::to(['useroperations', 'id' => $data->id]));
                },
                'format' => 'raw',
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
