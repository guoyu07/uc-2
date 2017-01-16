<?php

use yii\db\Migration;

class m161228_160833_news_rename_column extends Migration
{
    public function up()
    {
        $this->renameColumn('{{%news}}', 'uptated_at', 'updated_at');
    }

    public function down()
    {
        echo "m161228_160833_news_rename_column cannot be reverted.\n";

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
