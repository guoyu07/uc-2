<?php

use yii\db\Migration;

class m161224_230247_create_all_tables extends Migration
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
        if (!in_array('business_type', $tables))  {
            if ($dbType == "mysql") {
                $this->createTable('{{%business_type}}', [
                    'id' => 'INT(11) NOT NULL AUTO_INCREMENT',
                    0 => 'PRIMARY KEY (`id`)',
                    'name' => 'VARCHAR(100) NOT NULL',
                ], $tableOptions_mysql);
            }
        }

        /* MYSQL */
        if (!in_array('menu', $tables))  {
            if ($dbType == "mysql") {
                $this->createTable('{{%menu}}', [
                    'id' => 'INT(11) NOT NULL AUTO_INCREMENT',
                    0 => 'PRIMARY KEY (`id`)',
                    'seo_id' => 'INT(11) NOT NULL',
                    'enabled' => 'INT(11) NULL DEFAULT \'1\'',
                ], $tableOptions_mysql);
            }
        }

        /* MYSQL */
        if (!in_array('news', $tables))  {
            if ($dbType == "mysql") {
                $this->createTable('{{%news}}', [
                    'id' => 'INT(11) NOT NULL AUTO_INCREMENT',
                    0 => 'PRIMARY KEY (`id`)',
                    'title' => 'VARCHAR(250) NOT NULL',
                    'text' => 'LONGTEXT NOT NULL',
                    'image' => 'VARCHAR(1000) NULL',
                    'created_at' => 'DATETIME NULL',
                    'uptated_at' => 'DATETIME NULL',
                ], $tableOptions_mysql);
            }
        }

        /* MYSQL */
        if (!in_array('orders', $tables))  {
            if ($dbType == "mysql") {
                $this->createTable('{{%orders}}', [
                    'id' => 'INT(11) NOT NULL AUTO_INCREMENT',
                    0 => 'PRIMARY KEY (`id`)',
                    'name' => 'VARCHAR(450) NOT NULL',
                    'email' => 'VARCHAR(45) NOT NULL',
                    'phone' => 'VARCHAR(45) NOT NULL',
                    'agency' => 'VARCHAR(250) NULL',
                    'question' => 'TEXT NULL',
                    'seminar_id' => 'INT(11) NOT NULL',
                    'enable' => 'INT(11) NULL DEFAULT \'1\'',
                    'orders_type_id' => 'INT(11) NOT NULL',
                    'passport' => 'VARCHAR(45) NULL',
                    'address' => 'VARCHAR(450) NULL',
                    'business_type_id' => 'INT(11) NULL',
                    'created_at' => 'DATETIME NULL',
                    'updated_at' => 'DATETIME NULL',
                ], $tableOptions_mysql);
            }
        }

        /* MYSQL */
        if (!in_array('orders_type', $tables))  {
            if ($dbType == "mysql") {
                $this->createTable('{{%orders_type}}', [
                    'id' => 'INT(11) NOT NULL AUTO_INCREMENT',
                    0 => 'PRIMARY KEY (`id`)',
                    'name' => 'VARCHAR(250) NOT NULL',
                ], $tableOptions_mysql);
            }
        }

        /* MYSQL */
        if (!in_array('reviews', $tables))  {
            if ($dbType == "mysql") {
                $this->createTable('{{%reviews}}', [
                    'id' => 'INT(11) NOT NULL AUTO_INCREMENT',
                    0 => 'PRIMARY KEY (`id`)',
                    'name' => 'VARCHAR(450) NOT NULL',
                    'agency' => 'VARCHAR(250) NULL',
                    'email' => 'VARCHAR(45) NULL',
                    'phone' => 'VARCHAR(45) NULL',
                    'status_id' => 'INT(11) NULL',
                    'seminar_id' => 'INT(11) NOT NULL',
                    'text' => 'TEXT NULL',
                    'created_at' => 'DATETIME NULL',
                    'updated_at' => 'DATETIME NULL',
                ], $tableOptions_mysql);
            }
        }

        /* MYSQL */
        if (!in_array('seminars', $tables))  {
            if ($dbType == "mysql") {
                $this->createTable('{{%seminars}}', [
                    'id' => 'INT(11) NOT NULL AUTO_INCREMENT',
                    0 => 'PRIMARY KEY (`id`)',
                    'name' => 'VARCHAR(250) NOT NULL',
                    'start' => 'DATETIME NOT NULL',
                    'onlyMonth' => 'INT(11) NOT NULL',
                    'end' => 'DATETIME NULL',
                    'price' => 'DECIMAL(7,2) NOT NULL',
                    'created_at' => 'DATETIME NULL',
                    'updated_at' => 'DATETIME NULL',
                    'speakers' => 'LONGTEXT NULL',
                    'description' => 'LONGTEXT NULL',
                    'subscription' => 'LONGTEXT NULL',
                    'file' => 'VARCHAR(450) NULL',
                ], $tableOptions_mysql);
            }
        }

        /* MYSQL */
        if (!in_array('seo', $tables))  {
            if ($dbType == "mysql") {
                $this->createTable('{{%seo}}', [
                    'id' => 'INT(11) NOT NULL AUTO_INCREMENT',
                    0 => 'PRIMARY KEY (`id`)',
                    'route' => 'VARCHAR(450) NOT NULL',
                    'title' => 'VARCHAR(450) NOT NULL',
                    'menu' => 'VARCHAR(450) NULL',
                    'breadcrumbs' => 'VARCHAR(450) NULL',
                    'description' => 'VARCHAR(450) NULL',
                    'keywords' => 'VARCHAR(450) NULL',
                    'enabled' => 'INT(11) NULL DEFAULT \'1\'',
                ], $tableOptions_mysql);
            }
        }

        /* MYSQL */
        if (!in_array('static_page', $tables))  {
            if ($dbType == "mysql") {
                $this->createTable('{{%static_page}}', [
                    'id' => 'INT(11) NOT NULL AUTO_INCREMENT',
                    0 => 'PRIMARY KEY (`id`)',
                    'route' => 'VARCHAR(450) NOT NULL',
                    'title' => 'VARCHAR(450) NOT NULL',
                    'html' => 'LONGTEXT NOT NULL',
                    'created_at' => 'DATETIME NULL',
                    'updated_at' => 'DATETIME NULL',
                ], $tableOptions_mysql);
            }
        }

        /* MYSQL */
        if (!in_array('teachers', $tables))  {
            if ($dbType == "mysql") {
                $this->createTable('{{%teachers}}', [
                    'id' => 'INT(11) NOT NULL AUTO_INCREMENT',
                    0 => 'PRIMARY KEY (`id`)',
                    'name' => 'VARCHAR(450) NOT NULL',
                    'photo' => 'VARCHAR(450) NOT NULL',
                    'position' => 'VARCHAR(250) NOT NULL',
                    'seminars_text' => 'TEXT NOT NULL',
                    'created_at' => 'DATETIME NULL',
                    'updated_at' => 'DATETIME NULL',
                ], $tableOptions_mysql);
            }
        }


        $this->createIndex('idx_seo_id_9624_00','menu','seo_id',0);
        $this->createIndex('idx_orders_type_id_9691_01','orders','orders_type_id',0);
        $this->createIndex('idx_business_type_id_9691_02','orders','business_type_id',0);
        $this->createIndex('idx_seminar_id_9691_03','orders','seminar_id',0);
        $this->createIndex('idx_seminar_id_9734_04','reviews','seminar_id',0);
        $this->createIndex('idx_status_id_9734_05','reviews','status_id',0);

        $this->execute('SET foreign_key_checks = 0');
        $this->addForeignKey('fk_seo_9621_00','{{%menu}}', 'seo_id', '{{%seo}}', 'id', 'NO ACTION', 'NO ACTION' );
        $this->addForeignKey('fk_business_type_9687_01','{{%orders}}', 'business_type_id', '{{%business_type}}', 'id', 'NO ACTION', 'NO ACTION' );
        $this->addForeignKey('fk_orders_type_9688_02','{{%orders}}', 'orders_type_id', '{{%orders_type}}', 'id', 'NO ACTION', 'NO ACTION' );
        $this->addForeignKey('fk_seminars_9688_03','{{%orders}}', 'seminar_id', '{{%seminars}}', 'id', 'NO ACTION', 'NO ACTION' );
        $this->addForeignKey('fk_reviews_status_9731_04','{{%reviews}}', 'status_id', '{{%reviews_status}}', 'id', 'NO ACTION', 'NO ACTION' );
        $this->addForeignKey('fk_seminars_9731_05','{{%reviews}}', 'seminar_id', '{{%seminars}}', 'id', 'NO ACTION', 'NO ACTION' );
        $this->execute('SET foreign_key_checks = 1;');

        $this->execute('SET foreign_key_checks = 0');
        $this->insert('{{%business_type}}',['id'=>'1','name'=>'частное лицо']);
        $this->insert('{{%business_type}}',['id'=>'2','name'=>'юридическое лицо']);
        $this->insert('{{%menu}}',['id'=>'1','seo_id'=>'1','enabled'=>'1']);
        $this->insert('{{%menu}}',['id'=>'2','seo_id'=>'2','enabled'=>'1']);
        $this->insert('{{%menu}}',['id'=>'3','seo_id'=>'3','enabled'=>'1']);
        $this->insert('{{%menu}}',['id'=>'4','seo_id'=>'4','enabled'=>'1']);
        $this->insert('{{%menu}}',['id'=>'5','seo_id'=>'5','enabled'=>'1']);
        $this->insert('{{%menu}}',['id'=>'6','seo_id'=>'6','enabled'=>'1']);
        $this->insert('{{%seo}}',['id'=>'1','route'=>'static/about','title'=>'О учебном центре','menu'=>'О учебном центре','breadcrumbs'=>'О учебном центре','description'=>'О учебном центре','keywords'=>'О учебном центре','enabled'=>'1']);
        $this->insert('{{%seo}}',['id'=>'2','route'=>'site/seminars','title'=>'Семинары','menu'=>'Семинары','breadcrumbs'=>'Семинары','description'=>'Семинары','keywords'=>'Семинары','enabled'=>'1']);
        $this->insert('{{%seo}}',['id'=>'3','route'=>'static/contact','title'=>'Куда обращаться','menu'=>'Куда обращаться','breadcrumbs'=>'Куда обращаться','description'=>'Куда обращаться','keywords'=>'Куда обращаться','enabled'=>'1']);
        $this->insert('{{%seo}}',['id'=>'4','route'=>'site/reviews','title'=>'Отзывы','menu'=>'Отзывы','breadcrumbs'=>'Отзывы','description'=>'Отзывы','keywords'=>'Отзывы','enabled'=>'1']);
        $this->insert('{{%seo}}',['id'=>'5','route'=>'site/teachers','title'=>'Преподаватели','menu'=>'Преподаватели','breadcrumbs'=>'Преподаватели','description'=>'Преподаватели','keywords'=>'Преподаватели','enabled'=>'1']);
        $this->insert('{{%seo}}',['id'=>'6','route'=>'site/news','title'=>'Новости','menu'=>'Новости','breadcrumbs'=>'Новости','description'=>'Новости','keywords'=>'Новости','enabled'=>'1']);
        $this->insert('{{%static_page}}',['id'=>'1','route'=>'about','title'=>'О учебном центре','html'=>'О учебном центре','created_at'=>'2016-12-19 23:35:20','updated_at'=>'2016-12-19 23:35:20']);
        $this->insert('{{%static_page}}',['id'=>'2','route'=>'contact','title'=>'Куда обращаться','html'=>'Куда обращаться','created_at'=>'2016-12-19 23:35:20','updated_at'=>'2016-12-19 23:35:20']);
        $this->execute('SET foreign_key_checks = 1;');
    }

    public function down()
    {
        $this->execute('SET foreign_key_checks = 0');
        $this->execute('DROP TABLE IF EXISTS `business_type`');
        $this->execute('SET foreign_key_checks = 1;');
        $this->execute('SET foreign_key_checks = 0');
        $this->execute('DROP TABLE IF EXISTS `menu`');
        $this->execute('SET foreign_key_checks = 1;');
        $this->execute('SET foreign_key_checks = 0');
        $this->execute('DROP TABLE IF EXISTS `news`');
        $this->execute('SET foreign_key_checks = 1;');
        $this->execute('SET foreign_key_checks = 0');
        $this->execute('DROP TABLE IF EXISTS `orders`');
        $this->execute('SET foreign_key_checks = 1;');
        $this->execute('SET foreign_key_checks = 0');
        $this->execute('DROP TABLE IF EXISTS `orders_type`');
        $this->execute('SET foreign_key_checks = 1;');
        $this->execute('SET foreign_key_checks = 0');
        $this->execute('DROP TABLE IF EXISTS `reviews`');
        $this->execute('SET foreign_key_checks = 1;');
        $this->execute('SET foreign_key_checks = 0');
        $this->execute('DROP TABLE IF EXISTS `seminars`');
        $this->execute('SET foreign_key_checks = 1;');
        $this->execute('SET foreign_key_checks = 0');
        $this->execute('DROP TABLE IF EXISTS `seo`');
        $this->execute('SET foreign_key_checks = 1;');
        $this->execute('SET foreign_key_checks = 0');
        $this->execute('DROP TABLE IF EXISTS `static_page`');
        $this->execute('SET foreign_key_checks = 1;');
        $this->execute('SET foreign_key_checks = 0');
        $this->execute('DROP TABLE IF EXISTS `teachers`');
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
