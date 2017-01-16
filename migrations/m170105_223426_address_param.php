<?php

use yii\db\Migration;

class m170105_223426_address_param extends Migration
{
    public function up()
    {
        $this->insert('{{%settings}}',['id'=>'8','key'=>'siteAddress','value'=>'Россия, Санкт-Петербург, ул. Бронницкая, д. 32, каб. 101']);
    }

    public function down()
    {
        echo "m170105_223426_address_param cannot be reverted.\n";

        return false;
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
