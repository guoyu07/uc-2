<?php

use yii\db\Migration;

class m161229_201140_setting_error extends Migration
{
    public function up()
    {
        $this->update('{{%settings}}', [ 'key' => 'sitePhone'], " `key` = 'info@obmencity.ru' " );
    }

    public function down()
    {
        echo "m161229_201140_setting_error cannot be reverted.\n";

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
