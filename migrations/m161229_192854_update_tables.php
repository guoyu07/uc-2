<?php

use yii\db\Migration;

class m161229_192854_update_tables extends Migration
{
    public function up()
    {
        $this->update('{{%seo}}', [ 'h1' => 'Об учебном центре СПб ГБУ Горжилобмен'], " title = 'О учебном центре' " );
        $this->update('{{%seo}}', [ 'h1' => 'План семинаров и курсов повышения квалификации'], " title = 'Семинары' " );
        $this->update('{{%seo}}', [ 'h1' => 'Куда обращаться'], " title = 'Куда обращаться' " );
        $this->update('{{%seo}}', [ 'h1' => 'Отзывы о семинарах и курсах повышения квалификации'], " title = 'Отзывы' " );
        $this->update('{{%seo}}', [ 'h1' => 'Новости'], " title = 'Новости' " );

        $this->update('{{%seminars}}', [ 'enabled' => '1'], " name = 'Тестовый семинар' " );

    }

    public function down()
    {
        echo "m161229_192854_update_tables cannot be reverted.\n";

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
