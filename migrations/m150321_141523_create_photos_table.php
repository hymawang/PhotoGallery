<?php

use yii\db\Schema;
use yii\db\Migration;

class m150321_141523_create_photos_table extends Migration
{
    public function up()
    {
         $this->createTable('photos', [
            'id' => Schema::TYPE_PK,
            'file_path' => Schema::TYPE_STRING . ' NOT NULL',
            'description' => Schema::TYPE_TEXT,
            'rating' => Schema::TYPE_FLOAT
        ]);
    }

    public function down()
    {
         $this->dropTable('photos');
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
