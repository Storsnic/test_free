<?php

use yii\db\Schema;
use yii\db\Migration;

class m161106_192914_Mass extends Migration
{

    public function init()
    {
        $this->db = 'db';
        parent::init();
    }

    public function safeUp()
    {
        $tableOptions = 'ENGINE=InnoDB';
        $transaction=$this->db->beginTransaction();
        try{
             $this->createTable('{{%money}}',[
               'id'=> $this->primaryKey(),
               'user_id'=> $this->integer(32)->notNull(),
               'amount'=> $this->decimal(255, 2)->null()->defaultValue(null),
            ], $tableOptions);
             $this->createTable('{{%operations}}',[
               'id'=> $this->primaryKey(),
               'from_user'=> $this->string(255)->notNull(),
               'to_user'=> $this->string(255)->notNull(),
               'amount'=> $this->decimal(255, 2)->notNull(),
               'by_admin'=> $this->smallInteger(16)->null()->defaultValue('0'),
               'from_user_left'=> $this->decimal(255, 2)->null()->defaultValue(null),
               'to_user_left'=> $this->decimal(255, 2)->null()->defaultValue(null),
            ], $tableOptions);
             $this->createTable('{{%user}}',[
               'id'=> $this->primaryKey(),
               'auth_key'=> $this->string(255)->null()->defaultValue(null),
               'password_hash'=> $this->string(255)->null()->defaultValue(null),
               'password_reset_token'=> $this->string(255)->null()->defaultValue(null),
               'email'=> $this->string(255)->null()->defaultValue(null),
               'status'=> $this->string(255)->null()->defaultValue('10'),
               'created_at'=> $this->integer(32)->null()->defaultValue(null),
               'updated_at'=> $this->integer(32)->null()->defaultValue(null),
               'username'=> $this->string(255)->null()->defaultValue(null),
               'admin'=> $this->smallInteger(16)->null()->defaultValue('0'),
            ], $tableOptions);
            $transaction->commit();
        } catch (Exception $e) {
             echo 'Catch Exception '.$e->getMessage().' and rollBack this';
             $transaction->rollBack();
        }
    }

    public function safeDown()
    {
        $transaction=$this->db->beginTransaction();
        try{
            $this->dropTable('{{%money}}');
            $this->dropTable('{{%operations}}');
            $this->dropTable('{{%user}}');
            $transaction->commit();
        } catch (Exception $e) {
            echo 'Catch Exception '.$e->getMessage().' and rollBack this';
            $transaction->rollBack();
        }
    }
}
