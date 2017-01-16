<?php

use yii\db\Migration;

class m170110_201331_question_order_types extends Migration
{
    public function up()
    {
        $this->insert('{{%orders_type}}',['id'=>'1','name'=>'Заявка на семинар']);
        $this->insert('{{%orders_type}}',['id'=>'2','name'=>'Вопрос по семинару']);
    }

    public function down()
    {
        echo "m170110_201331_question_order_types cannot be reverted.\n";

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
