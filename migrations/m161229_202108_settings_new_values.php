<?php

use yii\db\Migration;

class m161229_202108_settings_new_values extends Migration
{
    public function up()
    {
        $this->update('{{%settings}}', [ 'value' => '+7 (812) 576-06-42'], " `key` = 'sitePhone' " );
        $this->update('{{%settings}}', [ 'value' => 'umc@obmencity.ru'], " `key` = 'siteEmail' " );
    }

    public function down()
    {
        echo "m161229_202108_settings_new_values cannot be reverted.\n";

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
