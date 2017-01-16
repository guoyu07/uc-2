<?php

use yii\db\Migration;

class m170105_195207_slider_table extends Migration
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
        if (!in_array('slider', $tables))  {
            if ($dbType == "mysql") {
                $this->createTable('{{%slider}}', [
                    'id' => 'INT(11) NOT NULL AUTO_INCREMENT',
                    0 => 'PRIMARY KEY (`id`)',
                    'content' => 'VARCHAR(450) NOT NULL',
                    'interval' => 'INT(11) NOT NULL DEFAULT \'300\'',
                    'caption' => 'VARCHAR(450) NULL',
                    'enabled' => 'INT(11) NULL',
                ], $tableOptions_mysql);
            }
        }

    }

    public function down()
    {

        $this->execute('SET foreign_key_checks = 0');
        $this->execute('DROP TABLE IF EXISTS `slider`');
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
