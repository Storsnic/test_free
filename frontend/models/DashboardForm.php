<?php

namespace frontend\models;

use yii\base\Model;
use common\models\User;

class DashboardForm extends Model
{
    public function rules()
    {
        return [
            [['email'], 'required'],
            ['email', 'email'],            
        ];
    }
}
