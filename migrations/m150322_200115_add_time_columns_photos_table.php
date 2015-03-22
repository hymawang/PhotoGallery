<?php

use yii\db\Schema;
use yii\db\Migration;

class m150322_200115_add_time_columns_photos_table extends Migration
{
    public function up()
    {                     
         $this->addColumn('photos', 'created_at', Schema::TYPE_INTEGER . ' NOT NULL');
         $this->addColumn('photos', 'updated_at', Schema::TYPE_INTEGER . " NOT NULL");
    }

    public function down()
    {
        $this->dropColumn('photos', 'created_at');
        $this->dropColumn('photos', 'updated_at');
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
