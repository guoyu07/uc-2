<?php

use yii\db\Migration;

class m161231_144842_change_menu_item extends Migration
{
    public function up()
    {
        $this->update('{{%menu}}', [ 'enabled' => 0], " id = 1 " );
    }

    public function down()
    {
        echo "m161231_144842_change_menu_item cannot be reverted.\n";

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
