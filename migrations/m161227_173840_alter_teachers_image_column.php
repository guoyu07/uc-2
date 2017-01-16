<?php

use yii\db\Migration;

class m161227_173840_alter_teachers_image_column extends Migration
{
    public function up()
    {
        $this->alterColumn('{{%teachers}}', 'photo', $this->string()->null());
    }

    public function down()
    {
        echo "m161227_173840_alter_teachers_image_column cannot be reverted.\n";

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
