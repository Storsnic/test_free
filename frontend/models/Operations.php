<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\db\ActiveRecord;


class Operations extends ActiveRecord
{

    public static function tableName()
    {
        return 'operations';
    }

    // public $from_user;
    // public $to_user;
    // public $amount;

    public function rules()
    {
        return [
            ['from_user', 'trim'],
            ['from_user', 'required'],

            ['to_user', 'trim'],
            ['to_user', 'required'],
            ['to_user', 'exist', 'targetClass' => '\frontend\models\Users', 'targetAttribute' => 'email'],
            ['to_user', 'email'],
            ['to_user','compare','compareAttribute'=>'from_user','operator'=>'!=','message'=>'Invalid username'],
            
            ['amount', 'required'],
            ['amount', 'number'],
            ['amount','compare','compareValue'=>'0','operator'=>'>','message'=>'Amount must be greater than 0'],
        ];
    }

}
