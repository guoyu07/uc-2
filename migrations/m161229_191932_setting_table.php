<?php

use yii\db\Migration;

class m161229_191932_setting_table extends Migration
{
    public function up()
    {
        $tables = Yii::$app->db->schema->getTableNames();
        $dbType = $this->db->driverName;
        $tableOptions_mysql = "CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB";
        $tableOptions_mssql = "";
        $tableOptions_pgsql = "";
        $tableOptions_sqlite = "";
        /* MYSQL */
        if (!in_array('settings', $tables))  {
            if ($dbType == "mysql") {
                $this->createTable('{{%settings}}', [
                    'id' => 'INT(11) NOT NULL AUTO_INCREMENT',
                    0 => 'PRIMARY KEY (`id`)',
                    'key' => 'VARCHAR(45) NOT NULL',
                    'value' => 'VARCHAR(450) NOT NULL',
                ], $tableOptions_mysql);
            }
        }


        $this->createIndex('idx_UNIQUE_key_3886_00','settings','key',1);

        $this->execute('SET foreign_key_checks = 0');
        $this->insert('{{%settings}}',['id'=>'1','key'=>'siteBrand','value'=>'Учебный центр СПб ГБУ «Горжилобмен»']);
        $this->insert('{{%settings}}',['id'=>'2','key'=>'siteBrandLid','value'=>'Семинары и Курсы повышения квалификации']);
        $this->insert('{{%settings}}',['id'=>'3','key'=>'siteEmail','value'=>'info@obmencity.ru']);
        $this->insert('{{%settings}}',['id'=>'4','key'=>'info@obmencity.ru','value'=>'7(812) 576-00-00']);
        $this->execute('SET foreign_key_checks = 1;');
    }

    public function down()
    {
        $this->execute('SET foreign_key_checks = 0');
        $this->execute('DROP TABLE IF EXISTS `settings`');
        $this->execute('SET foreign_key_checks = 1;');
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
