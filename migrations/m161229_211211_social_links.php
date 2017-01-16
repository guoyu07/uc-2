<?php

use yii\db\Migration;

class m161229_211211_social_links extends Migration
{
    public function up()
    {
        $this->insert('{{%settings}}',['id'=>'5','key'=>'socialVK','value'=>'https://vk.com/dop_obrazovanie_spb']);
        $this->insert('{{%settings}}',['id'=>'6','key'=>'socialFB','value'=>'https://ru-ru.facebook.com/people/%D0%A3%D1%87%D0%B5%D0%B1%D0%BD%D1%8B%D0%B9-%D0%A6%D0%B5%D0%BD%D1%82%D1%80/100013041187254']);
        $this->insert('{{%settings}}',['id'=>'7','key'=>'socialTW','value'=>'https://twitter.com/Gorzilobmen']);
    }

    public function down()
    {
        echo "m161229_211211_social_links cannot be reverted.\n";

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
