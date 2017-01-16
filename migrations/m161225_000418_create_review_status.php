<?php

use yii\db\Migration;

class m161225_000418_create_review_status extends Migration
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
        if (!in_array('reviews_status', $tables))  {
            if ($dbType == "mysql") {
                $this->createTable('{{%reviews_status}}', [
                    'id' => 'INT(11) NOT NULL AUTO_INCREMENT',
                    0 => 'PRIMARY KEY (`id`)',
                    'name' => 'VARCHAR(450) NOT NULL',
                ], $tableOptions_mysql);
            }
        }


        $this->execute('SET foreign_key_checks = 0');
        $this->insert('{{%reviews_status}}',['id'=>'1','name'=>'обработка']);
        $this->insert('{{%reviews_status}}',['id'=>'2','name'=>'отклонено']);
        $this->insert('{{%reviews_status}}',['id'=>'3','name'=>'публикация']);
        $this->execute('SET foreign_key_checks = 1;');
    }

    public function down()
    {
        $this->execute('SET foreign_key_checks = 0');
        $this->execute('DROP TABLE IF EXISTS `reviews_status`');
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
