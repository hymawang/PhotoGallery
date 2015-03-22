<?php

use yii\db\Schema;
use yii\db\Migration;

class m150321_143603_create_comments_table extends Migration
{
    public function up()
    {
         $this->createTable('comments', [
            'id' => Schema::TYPE_PK,
            'photo_id' => Schema::TYPE_INTEGER. ' NOT NULL',
            'rating' => Schema::TYPE_SMALLINT . ' NOT NULL',
            'message' => Schema::TYPE_TEXT,
            'user_id' => Schema::TYPE_INTEGER,
            'name' => Schema::TYPE_STRING. ' NOT NULL',
            'email' => Schema::TYPE_STRING. ' NOT NULL',
            'created_at' => Schema::TYPE_INTEGER . ' NOT NULL',
            'updated_at' => Schema::TYPE_INTEGER . ' NOT NULL'
        ]);
    }

    public function down()
    {
         $this->dropTable('comments');
    }
    
    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }
    
    public function safeDown()
    {
    }
    */
}
