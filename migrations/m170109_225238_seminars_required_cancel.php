<?php

use yii\db\Migration;

class m170109_225238_seminars_required_cancel extends Migration
{
    public function up()
    {
        $this->alterColumn('{{%seminars}}', 'start', $this->dateTime()->null());
        $this->alterColumn('{{%seminars}}', 'onlyMonth', $this->integer()->null());
    }

    public function down()
    {
        echo "m170109_225238_seminars_required_cancel cannot be reverted.\n";

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
