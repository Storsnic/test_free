<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\db\ActiveRecord;
use frontend\models\Users;


class Money extends ActiveRecord
{

    public static function tableName()
    {
        return 'money';
    }

    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

}
