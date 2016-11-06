<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\operations;

/**
 * operationsSearch represents the model behind the search form about `frontend\models\operations`.
 */
class operationsSearch extends operations
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'by_admin'], 'integer'],
            [['from_user', 'to_user'], 'safe'],
            [['amount'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params, $user_email = 0)
    {
        if($user_email)
        {            
            $query = operations::find()
                ->where("from_user = '$user_email' or to_user = '$user_email'");
        }
        else
            $query = operations::find();


        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'amount' => $this->amount,
            'by_admin' => $this->by_admin,
        ]);

        $query->andFilterWhere(['like', 'from_user', $this->from_user])
                ->andFilterWhere(['like', 'to_user', $this->to_user]);

        // if($user_email != 0)
        // {
        //     $query->andFilterWhere([
        //         'or',
        //         ['like', 'from_user', $user_email],
        //         ['like', 'to_user', $user_email],
        //     ]);

        // }
        // else
        // {
        //     $query->andFilterWhere(['like', 'from_user', $this->from_user])
        //         ->andFilterWhere(['like', 'to_user', $this->to_user]);
        // }
        // print_r($dataProvider);

        return $dataProvider;
    }
}
