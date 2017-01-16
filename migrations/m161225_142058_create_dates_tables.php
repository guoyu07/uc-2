<?php

use yii\db\Migration;

class m161225_142058_create_dates_tables extends Migration
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
        if (!in_array('dates', $tables))  {
            if ($dbType == "mysql") {
                $this->createTable('{{%dates}}', [
                    'id' => 'INT(11) NOT NULL AUTO_INCREMENT',
                    0 => 'PRIMARY KEY (`id`)',
                    'date' => 'DATETIME NOT NULL',
                    'seminar_id' => 'INT(11) NOT NULL',
                ], $tableOptions_mysql);
            }
        }

        /* MYSQL */
        if (!in_array('dates_type', $tables))  {
            if ($dbType == "mysql") {
                $this->createTable('{{%dates_type}}', [
                    'id' => 'INT(11) NOT NULL AUTO_INCREMENT',
                    0 => 'PRIMARY KEY (`id`)',
                    'name' => 'VARCHAR(45) NOT NULL',
                ], $tableOptions_mysql);
            }
        }

        $this->addColumn('{{%seminars}}', 'dates_type_id', $this->integer());

        $this->createIndex('idx_dates_type_id_5191_00','seminars','dates_type_id',0);

        $this->execute('SET foreign_key_checks = 0');
        $this->addForeignKey('fk_dates_type_5188_00','{{%seminars}}', 'dates_type_id', '{{%dates_type}}', 'id', 'NO ACTION', 'NO ACTION' );
        $this->execute('SET foreign_key_checks = 1;');

        $this->execute('SET foreign_key_checks = 0');
        $this->insert('{{%dates_type}}',['id'=>'1','name'=>'диапазон']);
        $this->insert('{{%dates_type}}',['id'=>'2','name'=>'день']);
        $this->insert('{{%dates_type}}',['id'=>'3','name'=>'месяц']);
        $this->execute('SET foreign_key_checks = 1;');
    }

    public function down()
    {
        $this->execute('SET foreign_key_checks = 0');
        $this->execute('DROP TABLE IF EXISTS `dates`');
        $this->execute('SET foreign_key_checks = 1;');
        $this->execute('SET foreign_key_checks = 0');
        $this->execute('DROP TABLE IF EXISTS `dates_type`');
        $this->execute('SET foreign_key_checks = 1;');
        $this->execute('SET foreign_key_checks = 0');
        $this->dropColumn('{{%seminars}}', 'dates_type_id');
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
