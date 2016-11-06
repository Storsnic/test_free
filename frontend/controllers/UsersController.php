<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Users;
use frontend\models\Money;
use frontend\models\Operations;
use frontend\models\operationsSearch;
use frontend\models\UsersSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * UsersController implements the CRUD actions for Users model.
 */
class UsersController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Users models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UsersSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->pagination->pageSize=10;

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,            
        ]);
    }

    /**
     * Displays a single Users model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Users model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Users();
        $money_model = new Money();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            
            $model->setPassword($_POST['Users']['password_hash']);
            $model->generateAuthKey();
            $model->save();

            $money_model->user_id = $model->id;
            $money_model->amount = 0;
            $money_model->save();

            return $this->redirect(['index', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Users model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) ) {
            $model->setPassword($_POST['Users']['password_hash']);
            $model->save();
            return $this->redirect(['index', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    public function actionAdd($id, $type)
    {
        $operations_model = new Operations();
        $model = $this->findModel($id);
        $money_model = Money::find()
            ->where(['user_id' => $id])
            ->one();

        if ($operations_model->load(Yii::$app->request->post()) && $operations_model->validate()) {
             
             
            $to_user = Users::find()
                ->where(['email' => $operations_model->to_user])
                ->one();
            $to_user_money = Money::find()
                ->where(['user_id' => $to_user->id])
                ->one();

            if($type == 1)
            {
                $from_amount = $money_model->amount - $operations_model->amount;
                if($from_amount < 0 ) 
                    return $this->render('add', [
                        'model' => $model,
                        'operations_model' => $operations_model,
                        'type' => $type,
                    ]);

                $money_model->amount -= $operations_model->amount;
                $money_model->save();
            }

            $to_user_money->amount += $operations_model->amount;
            $to_user_money->save();

            
            $operations_model->by_admin = 1;
            $operations_model->from_user_left = $money_model->amount;
            if($type == 2) $operations_model->from_user_left = 0;
            $operations_model->to_user_left = $to_user_money->amount;
            $operations_model->save();

            $operations_model = new Operations();
            
            return $this->redirect(['index', 'id' => $model->id]);
        } else {
            return $this->render('add', [
                'model' => $model,
                'operations_model' => $operations_model,
                'type' => $type,
            ]);
        }
    }

    public function actionUseroperations($id)
    {
        $user_model = Users::find()
            ->where(['id' => $id])
            ->one();
        $searchModel = new operationsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, $user_model->email);

        return $this->render('user_operations', [
                'user_model' => $user_model,
                'dataProvider' => $dataProvider,
                'searchModel' => $searchModel,
            ]);
    }

    /**
     * Deletes an existing Users model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        $money_model = Money::find()
            ->where(['user_id' => $id])
            ->one();
        $money_model->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Users model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Users the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Users::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
