<?php

use yii\db\Migration;

class m161225_111255_insert_test_data extends Migration
{
    public function up()
    {
        $this->execute('SET foreign_key_checks = 0');
        $this->insert('{{%seminars}}',['id'=>'1','name'=>'Тестовый семинар','start'=>'2016-12-01 00:00:00','onlyMonth'=>'0','end'=>'','price'=>'1200.00','created_at'=>'2016-12-25 13:56:12','updated_at'=>'2016-12-25 13:56:12','speakers'=>'<p>Докладчики</p>
','description'=>'<p>Подробное описание</p>
','subscription'=>'<p>Подпись</p>
','file'=>'']);
        $this->insert('{{%reviews}}',['id'=>'1','name'=>'Иван Алексеевич','agency'=>'Тест','email'=>'','phone'=>'','status_id'=>'','seminar_id'=>'1','text'=>'Тестовый отзыв','created_at'=>'2016-12-25 13:56:50','updated_at'=>'2016-12-25 13:56:50']);
        $this->execute('SET foreign_key_checks = 1;');
    }

    public function down()
    {
        echo "m161225_111255_insert_test_data cannot be reverted.\n";

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
