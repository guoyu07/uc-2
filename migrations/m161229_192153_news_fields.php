<?php

use yii\db\Migration;

class m161229_192153_news_fields extends Migration
{
    public function up()
    {
        $this->addColumn('{{%news}}', 'lid', $this->string()->null());
        $this->addColumn('{{%news}}', 'enabled', $this->boolean()->null());
        $this->addColumn('{{%seminars}}', 'enabled', $this->boolean()->null());
        $this->addColumn('{{%seo}}', 'h1', $this->string()->null());
    }

    public function down()
    {
        echo "m161229_192153_news_fields cannot be reverted.\n";

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
