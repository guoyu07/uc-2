<?php

use yii\db\Migration;

class m161227_191500_update_menu_values extends Migration
{
    public function up()
    {
        $this->update('{{%seo}}', [ 'menu' => 'Об учебном центре СПб ГБУ Горжилобмен'], " title = 'О учебном центре' " );
        $this->update('{{%seo}}', [ 'menu' => 'План семинаров и курсов повышения квалификации'], " title = 'Семинары' " );
        $this->update('{{%seo}}', [ 'menu' => 'Отзывы о семинарах и курсах повышения квалификации'], " title = 'Отзывы' " );
        $this->update('{{%seo}}', [ 'menu' => 'Наши преподаватели'], " title = 'Преподаватели' " );
    }

    public function down()
    {
        echo "m161227_191500_update_menu_values cannot be reverted.\n";

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
