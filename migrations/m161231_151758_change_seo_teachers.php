<?php

use yii\db\Migration;

class m161231_151758_change_seo_teachers extends Migration
{
    public function up()
    {
        $this->update('{{%seo}}', [ 'h1' => 'Наши преподаватели'], " title = 'Преподаватели' " );
    }

    public function down()
    {
        echo "m161231_151758_change_seo_teachers cannot be reverted.\n";

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
