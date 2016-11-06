<?php

use yii\db\Schema;
use yii\db\Migration;

class m161106_193600_moneyDataInsert extends Migration
{

    public function init()
    {
        $this->db = 'db';
        parent::init();
    }

    public function safeUp()
    {
        $this->batchInsert('{{%money}}',
                           ["id", "user_id", "amount"],
                            [
    [
        'id' => 22,
        'user_id' => 71,
        'amount' => '0.00',
    ],
    [
        'id' => 25,
        'user_id' => 73,
        'amount' => '0.00',
    ],
    [
        'id' => 29,
        'user_id' => 75,
        'amount' => '0.00',
    ],
    [
        'id' => 28,
        'user_id' => 74,
        'amount' => '0.00',
    ],
    [
        'id' => 20,
        'user_id' => 69,
        'amount' => '100.00',
    ],
    [
        'id' => 30,
        'user_id' => 76,
        'amount' => '50.00',
    ],
    [
        'id' => 14,
        'user_id' => 63,
        'amount' => '0.00',
    ],
    [
        'id' => 19,
        'user_id' => 68,
        'amount' => '480.00',
    ],
    [
        'id' => 23,
        'user_id' => 72,
        'amount' => '370.00',
    ],
    [
        'id' => 21,
        'user_id' => 70,
        'amount' => '0.00',
    ],
]
        );
    }

    public function safeDown()
    {
        //$this->truncateTable('{{%money}} CASCADE');
    }
}
