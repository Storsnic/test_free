<?php

use yii\db\Schema;
use yii\db\Migration;

class m161106_193500_userDataInsert extends Migration
{

    public function init()
    {
        $this->db = 'db';
        parent::init();
    }

    public function safeUp()
    {
        $this->batchInsert('{{%user}}',
                           ["id", "auth_key", "password_hash", "password_reset_token", "email", "status", "created_at", "updated_at", "username", "admin"],
                            [
    [
        'id' => 63,
        'auth_key' => '5VKPXGE3eNnN7SX4jnV2yJZvdr8-Zmoz',
        'password_hash' => '$2y$13$2Wx/GdP6iRHsZTM1eWzf8e5LbP5Xsd/TrPjWhbnUkhlwdHEKE2aWO',
        'password_reset_token' => null,
        'email' => 'admin@gmail.com',
        'status' => '10',
        'created_at' => 1478450988,
        'updated_at' => 1478450988,
        'username' => null,
        'admin' => 1,
    ],
    [
        'id' => 68,
        'auth_key' => 'xJEOtllcUO_FV_2uf1v-FwtHa0o5U1D-',
        'password_hash' => '$2y$13$aaEIgTbayqUw4wgPDhBP1eSTBiq4oW2gqItNGH1JqwWiRxtNlBKLe',
        'password_reset_token' => null,
        'email' => 'user1@mail.ru',
        'status' => '10',
        'created_at' => null,
        'updated_at' => null,
        'username' => null,
        'admin' => 0,
    ],
    [
        'id' => 69,
        'auth_key' => 'w0IAzyL5B9anV0-dL5AaGJ5IdIYhHlUB',
        'password_hash' => '$2y$13$OCV0WF045qRnmjIgM7k3je0grzMOYLxv4.cc1uk7w2Apn6OyHMiN.',
        'password_reset_token' => null,
        'email' => 'user2@mail.ru',
        'status' => '10',
        'created_at' => null,
        'updated_at' => null,
        'username' => null,
        'admin' => 0,
    ],
    [
        'id' => 70,
        'auth_key' => 'Pxax8kKwd1NqOxzULu4YQ_F3momtbYcG',
        'password_hash' => '$2y$13$cMRyzXKghDEtcAxg09lcX.b0N0PgOqfU.01RCP64oHjH1CkxnP4du',
        'password_reset_token' => null,
        'email' => 'user3@mail.ru',
        'status' => '10',
        'created_at' => null,
        'updated_at' => null,
        'username' => null,
        'admin' => 0,
    ],
    [
        'id' => 71,
        'auth_key' => 'javnZEFDARTePYHlPGXEBmJQR154uF-O',
        'password_hash' => '$2y$13$J.DVVqi.EUHy9jyxhS8mAeufxlu3a/eagDkmHVaiG1fQX3katobNq',
        'password_reset_token' => null,
        'email' => 'user4@mail.ru',
        'status' => '10',
        'created_at' => null,
        'updated_at' => null,
        'username' => null,
        'admin' => 0,
    ],
    [
        'id' => 72,
        'auth_key' => 'lNh7nL2l5A61uSdSrIyhBPnnqIeeLrlf',
        'password_hash' => '$2y$13$ugl7GWTspvLNAOjuKlstp.6/eUhSIs53Xy9gGjrVLLu17Rml463mu',
        'password_reset_token' => null,
        'email' => 'user5@mail.ru',
        'status' => '10',
        'created_at' => null,
        'updated_at' => null,
        'username' => null,
        'admin' => 0,
    ],
    [
        'id' => 74,
        'auth_key' => '4UmPBBzLMV58oSPsAzR6E-f4dGSgruHX',
        'password_hash' => '$2y$13$6qEAO2ljM5ea5Hq1q/1j0e4rHrRkcjpzRf9IC0QiStJPtNM4YopYa',
        'password_reset_token' => null,
        'email' => 'user7@mail.ru',
        'status' => '10',
        'created_at' => null,
        'updated_at' => null,
        'username' => null,
        'admin' => 0,
    ],
    [
        'id' => 75,
        'auth_key' => 'VzRJnf8RDYZlF29W1Jn1AW8o0i04815W',
        'password_hash' => '$2y$13$PJag9IvcUNQdvBmT3RQXZuMj6mu9gSxMbkUbLaKpbTzhTfYGSvzAK',
        'password_reset_token' => null,
        'email' => 'user8@mail.ru',
        'status' => '10',
        'created_at' => null,
        'updated_at' => null,
        'username' => null,
        'admin' => 0,
    ],
    [
        'id' => 76,
        'auth_key' => '8OKgh5-WH77PYtu3r4PXDfZNjZRZ9CZ2',
        'password_hash' => '$2y$13$ZRvMULT2bnIyfmZkWl4/hOQln3/RNLfwNUO9lm6lZ.GbvAbIha3d.',
        'password_reset_token' => null,
        'email' => 'user9@mail.ru',
        'status' => '10',
        'created_at' => null,
        'updated_at' => null,
        'username' => null,
        'admin' => 0,
    ],
    [
        'id' => 73,
        'auth_key' => 'ZKaKGFyrh7_34DjLNhiqMcTcK7f2e3fi',
        'password_hash' => '$2y$13$dpKloQfFWhrhX7Gntcn6.OQ6FaxSrqCV7RtIBViTQtRrOyKCnLY/e',
        'password_reset_token' => null,
        'email' => 'user6@mail.ru',
        'status' => '10',
        'created_at' => null,
        'updated_at' => null,
        'username' => null,
        'admin' => 0,
    ],
]
        );
    }

    public function safeDown()
    {
        //$this->truncateTable('{{%user}} CASCADE');
    }
}
