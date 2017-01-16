<?php

use yii\db\Migration;

class m170110_132839_foreign_dates_seminars extends Migration
{
    public function up()
    {
        $this->addForeignKey('seminars_dates', '{{%dates}}', 'seminar_id', '{{%seminars}}', 'id');
    }

    public function down()
    {
        echo "m170110_132839_foreign_dates_seminars cannot be reverted.\n";

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
