<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Users;

/**
 * UsersSearch represents the model behind the search form about `app\models\Users`.
 */
class UsersSearch extends Users
{
    /**
     * @inheritdoc
     */
    public $moneyf;
    public function rules()
    {
        return [
            [['id', 'created_at', 'updated_at', 'admin'], 'integer'],
            [['auth_key', 'password_hash', 'password_reset_token', 'email', 'status', 'username', 'moneyf'], 'safe'],
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
    public function search($params)
    {
        $query = Users::find()->with('money');

        // add conditions that should always apply here

        $query->joinWith(['money']);
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);


        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $dataProvider->sort->attributes['moneyf'] = [              
              'asc' => ['money.amount' => SORT_ASC],
              'desc' => ['money.amount' => SORT_DESC],
        ];

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'admin' => $this->admin,
            'money.amount' => $this->moneyf,
        ]);

        $query->andFilterWhere(['like', 'auth_key', $this->auth_key])
            ->andFilterWhere(['like', 'password_hash', $this->password_hash])
            ->andFilterWhere(['like', 'password_reset_token', $this->password_reset_token])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'username', $this->username]);

        return $dataProvider;
    }
}
