<?php

use yii\db\Schema;
use yii\db\Migration;

class m161106_193600_operationsDataInsert extends Migration
{

    public function init()
    {
        $this->db = 'db';
        parent::init();
    }

    public function safeUp()
    {
        $this->batchInsert('{{%operations}}',
                           ["id", "from_user", "to_user", "amount", "by_admin", "from_user_left", "to_user_left"],
                            [
    [
        'id' => 56,
        'from_user' => 'admin',
        'to_user' => 'user1@mail.ru',
        'amount' => '1000.00',
        'by_admin' => 1,
        'from_user_left' => '0.00',
        'to_user_left' => '1000.00',
    ],
    [
        'id' => 57,
        'from_user' => 'user1@mail.ru',
        'to_user' => 'user2@mail.ru',
        'amount' => '200.00',
        'by_admin' => 1,
        'from_user_left' => '800.00',
        'to_user_left' => '200.00',
    ],
    [
        'id' => 58,
        'from_user' => 'user1@mail.ru',
        'to_user' => 'user5@mail.ru',
        'amount' => '300.00',
        'by_admin' => 1,
        'from_user_left' => '500.00',
        'to_user_left' => '300.00',
    ],
    [
        'id' => 59,
        'from_user' => 'user2@mail.ru',
        'to_user' => 'user9@mail.ru',
        'amount' => '100.00',
        'by_admin' => 1,
        'from_user_left' => '100.00',
        'to_user_left' => '100.00',
    ],
    [
        'id' => 60,
        'from_user' => 'user9@mail.ru',
        'to_user' => 'user1@mail.ru',
        'amount' => '50.00',
        'by_admin' => 1,
        'from_user_left' => '50.00',
        'to_user_left' => '550.00',
    ],
    [
        'id' => 61,
        'from_user' => 'user5@mail.ru',
        'to_user' => 'user1@mail.ru',
        'amount' => '30.00',
        'by_admin' => 1,
        'from_user_left' => '270.00',
        'to_user_left' => '580.00',
    ],
    [
        'id' => 62,
        'from_user' => 'user1@mail.ru',
        'to_user' => 'user5@mail.ru',
        'amount' => '100.00',
        'by_admin' => 0,
        'from_user_left' => '480.00',
        'to_user_left' => '370.00',
    ],
]
        );
    }

    public function safeDown()
    {
        //$this->truncateTable('{{%operations}} CASCADE');
    }
}
