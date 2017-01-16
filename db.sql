CREATE DATABASE  IF NOT EXISTS `uc` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_bin */;
USE `uc`;
-- MySQL dump 10.13  Distrib 5.7.9, for Win64 (x86_64)
--
-- Host: localhost    Database: uc
-- ------------------------------------------------------
-- Server version	5.7.16-0ubuntu0.16.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `business_type`
--

DROP TABLE IF EXISTS `business_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `business_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `business_type`
--

LOCK TABLES `business_type` WRITE;
/*!40000 ALTER TABLE `business_type` DISABLE KEYS */;
INSERT INTO `business_type` VALUES (1,'частное лицо'),(2,'юридическое лицо');
/*!40000 ALTER TABLE `business_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dates`
--

DROP TABLE IF EXISTS `dates`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dates` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL,
  `seminar_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `seminars_dates` (`seminar_id`),
  CONSTRAINT `seminars_dates` FOREIGN KEY (`seminar_id`) REFERENCES `seminars` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dates`
--

LOCK TABLES `dates` WRITE;
/*!40000 ALTER TABLE `dates` DISABLE KEYS */;
INSERT INTO `dates` VALUES (16,'2017-01-31 00:00:00',4),(17,'2017-01-31 00:00:00',2),(18,'2017-01-02 00:00:00',1),(19,'2017-01-06 00:00:00',1),(20,'2017-01-10 00:00:00',1),(21,'2017-01-11 00:00:00',1),(22,'2017-01-27 00:00:00',1);
/*!40000 ALTER TABLE `dates` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dates_type`
--

DROP TABLE IF EXISTS `dates_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dates_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dates_type`
--

LOCK TABLES `dates_type` WRITE;
/*!40000 ALTER TABLE `dates_type` DISABLE KEYS */;
INSERT INTO `dates_type` VALUES (1,'диапазон'),(2,'день'),(3,'месяц');
/*!40000 ALTER TABLE `dates_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menu`
--

DROP TABLE IF EXISTS `menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `seo_id` int(11) NOT NULL,
  `enabled` int(11) DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `idx_seo_id_9624_00` (`seo_id`),
  CONSTRAINT `fk_seo_9621_00` FOREIGN KEY (`seo_id`) REFERENCES `seo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menu`
--

LOCK TABLES `menu` WRITE;
/*!40000 ALTER TABLE `menu` DISABLE KEYS */;
INSERT INTO `menu` VALUES (1,1,0),(2,2,1),(3,3,1),(4,4,1),(5,5,1),(6,6,1);
/*!40000 ALTER TABLE `menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migration`
--

DROP TABLE IF EXISTS `migration`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migration` (
  `version` varchar(180) COLLATE utf8_bin NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migration`
--

LOCK TABLES `migration` WRITE;
/*!40000 ALTER TABLE `migration` DISABLE KEYS */;
INSERT INTO `migration` VALUES ('m000000_000000_base',1482624040),('m161224_230247_create_all_tables',1482624045),('m161225_000418_create_review_status',1482624472),('m161225_111255_insert_test_data',1482664468),('m161225_142058_create_dates_tables',1482677270),('m161227_173840_alter_teachers_image_column',1482860629),('m161227_191500_update_menu_values',1482866701),('m161228_160833_news_rename_column',1482941847),('m161229_191932_setting_table',1483040027),('m161229_192153_news_fields',1483040027),('m161229_192854_update_tables',1483040028),('m161229_201140_setting_error',1483043038),('m161229_201509_settings_values',1483043038),('m161229_202108_settings_new_values',1483043038),('m161229_211211_social_links',1483046279),('m161231_144842_change_menu_item',1483196185),('m161231_151758_change_seo_teachers',1483197558),('m170105_195207_slider_table',1483648281),('m170105_223426_address_param',1483655780),('m170109_225238_seminars_required_cancel',1484002729),('m170110_132839_foreign_dates_seminars',1484058950),('m170110_201331_question_order_types',1484079365);
/*!40000 ALTER TABLE `migration` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `text` longtext COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `lid` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `enabled` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `news`
--

LOCK TABLES `news` WRITE;
/*!40000 ALTER TABLE `news` DISABLE KEYS */;
INSERT INTO `news` VALUES (1,'В образовательном центре СПб ГБУ «Горжилобмен» завершился учебный год','<p>Учебно-методический центр СПб ГБУ &laquo;Горжилобмен&raquo; завершил учебный 2016 год серией обучающих семинаров для специалистов рынка недвижимости города.</p>\r\n\r\n<ul>\r\n	<li>8 декабря состоялся семинар: &laquo;Новый порядок участия в программе &laquo;Расселение коммунальных квартир&raquo;. Порядок реализации социальных выплат&raquo;. Во время занятия были рассмотрены особенности участия в Программе, в том числе: виды государственного содействия, правила участия, нормативная база и другая важная информация, а также новый порядок реализации социальных выплат (в соответствии с изменениями, вступившими в силу с 1 июля 2016 года).</li>\r\n	<li>15 декабря состоялся семинар: &laquo;Земельные правоотношения&raquo;. В ходе семинара были освещены общие положения о праве собственности на землю: участники, объекты земельных отношений, земельный участок как объект права собственности. Во время занятия слушатели узнали правила землепользования и застройки, виды и состав территориальных зон, ознакомились с градостроительным регламентом, видами разрешенного использования земельных участков и объектов капитального строительства.</li>\r\n</ul>\r\n\r\n<p>В обучающих семинарах&nbsp; приняли участие 58 представителей различных риэлторских агентств города: руководители агентств недвижимости, риелторы, брокеры, специалисты и менеджеры риэлторских фирм.</p>\r\n\r\n<p>Всего с начала 2016 года в Учебном центре СПб ГБУ &laquo;Горжилобмен&raquo; прошли обучение, и повысили уровень профессиональной подготовки более 600 специалистов рынка недвижимости Санкт-Петербурга, специалистов муниципальных образований и жилищных отделов администраций районов города. Среди них, успешно прошли курс дополнительного профессионального образования &laquo;Жилищные программы Санкт-Петербурга&raquo;, получили удостоверение о повышении квалификации 67 человек.</p>\r\n\r\n<p><a href=\"http://obmencity.ru/state/202/\"><strong>Учебно-методический центр СПб ГБУ &laquo;Горжилобмен&raquo;</strong></a>&nbsp;&ndash; это современная образовательная площадка по подготовке специалистов рынка недвижимости с минимальным опытом работы и повышению квалификации действующих специалистов.&nbsp;</p>\r\n\r\n<p>Основной задачей Учебно-методического центра является информирование и обмен опытом между представителями риэлторских компаний и представителями органов государственной власти по различным формам работы с недвижимостью.</p>\r\n\r\n<p>Учебно-методический центр СПб ГБУ &laquo;Горжилобмен&raquo; предлагает следующие формы обучения:</p>\r\n\r\n<p><a href=\"http://obmencity.ru/state/203/\">1) Обучающие занятия (ориентированы на специалистов разного уровня подготовленности):</a></p>\r\n\r\n<ul>\r\n	<li>Однодневные семинары, направленные на получение новых знаний и навыков по интересующей специалиста рынка недвижимости теме и получить рекомендации от экспертов отрасли;</li>\r\n	<li>специализированные курсы, включающие в себя несколько дней обучения и позволяющие специалистам рынка недвижимости подробнее изучить вопросы реализации жилищных программ города;</li>\r\n	<li>корпоративное обучение для отдельных агентств недвижимости (по мере набора группы). Данный формат обучения подойдет агентствам недвижимости, стремящимся к постоянному профессиональному развитию и желающим быть в курсе последних изменений в жилищном законодательстве, в жилищных программах.</li>\r\n</ul>\r\n\r\n<p><a href=\"http://obmencity.ru/state/203/\">2) Дополнительное профессиональное образование</a>&nbsp;&ndash; форма обучения специалистов, способствующая повышению уровня их квалификации, освоению актуальных методов решения профессиональных задач и дающая право работать в новой сфере деятельности.</p>\r\n\r\n<p>По всем вопросам, связанным с обучением, вы можете обратиться в Учебный центр СПб ГБУ &laquo;Горжилобмен&raquo; по телефону: 576-06-42.<img alt=\"\" src=\"http://res.cloudinary.com/uc-obmencity/image/upload/v1483644581/ckeditor/-tS18QaDj0YlWraD8bIZWcxvr9qL7pPG.jpg\" style=\"float:right; height:141px; margin:5px; width:250px\" /></p>\r\n\r\n<p>Адрес Учебного центра: ст. м. Технологический институт, ул. Бронницкая, д. 32, 1 этаж, каб. 101.</p>\r\n\r\n<p>В преддверии Нового года благодарим всех слушателей за оказанное доверие и желаем дальнейшего профессионального совершенствования, успешных сделок! Приглашаем на обучение в новом, 2017 году!</p>\r\n\r\n<p><em>С уважением, коллектив Учебно-методического центра СПб ГБУ &laquo;Горжилобмен&raquo;.</em></p>\r\n','news/_iaQcFiWkcpem3YKsw5pqQewpsARFfIM','2016-12-28 17:53:02','2017-01-05 22:29:56','Учебно-методический центр СПб ГБУ «Горжилобмен» завершил учебный 2016 год серией обучающих семинаров для специалистов рынка недвижимости города',1);
/*!40000 ALTER TABLE `news` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(450) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `agency` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `question` text COLLATE utf8_unicode_ci,
  `seminar_id` int(11) NOT NULL,
  `enable` int(11) DEFAULT '1',
  `orders_type_id` int(11) NOT NULL,
  `passport` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(450) COLLATE utf8_unicode_ci DEFAULT NULL,
  `business_type_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_orders_type_id_9691_01` (`orders_type_id`),
  KEY `idx_business_type_id_9691_02` (`business_type_id`),
  KEY `idx_seminar_id_9691_03` (`seminar_id`),
  CONSTRAINT `fk_business_type_9687_01` FOREIGN KEY (`business_type_id`) REFERENCES `business_type` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_orders_type_9688_02` FOREIGN KEY (`orders_type_id`) REFERENCES `orders_type` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_seminars_9688_03` FOREIGN KEY (`seminar_id`) REFERENCES `seminars` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (17,'Илларионов Евгений Анатольевич','illa@mail.ru','+79342321211','Аркада','',1,1,1,'4512 456789','СПб., Измайловски пр., 12-11',1,'2017-01-11 12:10:09','2017-01-11 12:10:09'),(18,'Феофано Ильдар','feo@mail.ru','000','','Какого образца сертификат?',2,1,2,NULL,NULL,NULL,'2017-01-11 12:11:13','2017-01-11 12:11:13');
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders_type`
--

DROP TABLE IF EXISTS `orders_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders_type`
--

LOCK TABLES `orders_type` WRITE;
/*!40000 ALTER TABLE `orders_type` DISABLE KEYS */;
INSERT INTO `orders_type` VALUES (1,'Заявка на семинар'),(2,'Вопрос по семинару');
/*!40000 ALTER TABLE `orders_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reviews`
--

DROP TABLE IF EXISTS `reviews`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reviews` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(450) COLLATE utf8_unicode_ci NOT NULL,
  `agency` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status_id` int(11) DEFAULT NULL,
  `seminar_id` int(11) NOT NULL,
  `text` text COLLATE utf8_unicode_ci,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_seminar_id_9734_04` (`seminar_id`),
  KEY `idx_status_id_9734_05` (`status_id`),
  CONSTRAINT `fk_reviews_status_9731_04` FOREIGN KEY (`status_id`) REFERENCES `reviews_status` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_seminars_9731_05` FOREIGN KEY (`seminar_id`) REFERENCES `seminars` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reviews`
--

LOCK TABLES `reviews` WRITE;
/*!40000 ALTER TABLE `reviews` DISABLE KEYS */;
INSERT INTO `reviews` VALUES (5,'Плеханов Михаил, специалист по недвижимости','','','',3,3,'Очень доволен организацией семинара. Вся новая полученная информация пригодиться мне в работе.','2017-01-10 12:48:17','2017-01-10 12:48:17'),(6,'Саморохова Ольга, агент по недвижимости','','','',3,3,'Очень понравился докладчик - Рубцова Любовь Борисовна. Чувствуется что это специалист своего дела, смогла осветить тему семинара простым и интересным языком. Я получила ответы на все вопросы по теме мероприятия и довольна встречей.','2017-01-10 12:48:46','2017-01-10 12:49:33'),(7,'Пьянов Николай, агент по недвижимости','','','',3,3,'Профессионально построенный семинар, представляющий много полезной и важной информации. Семинар прошел очень насыщенно, интересно. Подготовка лектора соответствует заявленной теме семинара. Все вопросы были подробно рассмотрены и найдены пути решения различных ситуаций. Спасибо Вам!','2017-01-10 12:49:12','2017-01-10 12:49:12'),(8,'Ольга Дашевская, специалист по недвижимости','','','',3,4,'Тема семинара весьма актуальная, особенно для города Санкт-Петербурга, где расселение коммунальных квартир – одна из насущных проблем. По ходу семинара возникает много вопросов, которые можно адресовать специалисту в данной области и как итог – мы максимально информированы. Хочется так же отметить, что спикер очень понравился, поскольку Виктория Владимировна хорошо разбирается в вопросах программы расселения. Если оценивать семинар по 5-ти бальной шкале, то я бы поставила самую высокую оценку!','2017-01-10 12:50:10','2017-01-10 12:50:10'),(9,'Елена Николаевна, специалист агенства \"ПРАЙМ\"','','','',3,5,'Получила приглашение на семинар по электронной почте. Понравилось все!Семинар был очень содержательным, я получила ответы на все интересующие вопросы! Спасибо СПб ГБУ \"ГОРЖИЛОБМЕН\" за организацию и проведение семинаров для специалистов в области недвижимости.','2017-01-10 12:51:03','2017-01-10 12:51:03'),(10,'123','','','',NULL,1,'234','2017-01-10 22:27:25','2017-01-10 22:27:25');
/*!40000 ALTER TABLE `reviews` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reviews_status`
--

DROP TABLE IF EXISTS `reviews_status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reviews_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(450) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reviews_status`
--

LOCK TABLES `reviews_status` WRITE;
/*!40000 ALTER TABLE `reviews_status` DISABLE KEYS */;
INSERT INTO `reviews_status` VALUES (1,'обработка'),(2,'отклонено'),(3,'публикация');
/*!40000 ALTER TABLE `reviews_status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `seminars`
--

DROP TABLE IF EXISTS `seminars`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `seminars` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `start` datetime DEFAULT NULL,
  `onlyMonth` int(11) DEFAULT NULL,
  `end` datetime DEFAULT NULL,
  `price` decimal(7,2) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `speakers` longtext COLLATE utf8_unicode_ci,
  `description` longtext COLLATE utf8_unicode_ci,
  `subscription` longtext COLLATE utf8_unicode_ci,
  `file` varchar(450) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dates_type_id` int(11) DEFAULT NULL,
  `enabled` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_dates_type_id_5191_00` (`dates_type_id`),
  CONSTRAINT `fk_dates_type_5188_00` FOREIGN KEY (`dates_type_id`) REFERENCES `dates_type` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `seminars`
--

LOCK TABLES `seminars` WRITE;
/*!40000 ALTER TABLE `seminars` DISABLE KEYS */;
INSERT INTO `seminars` VALUES (1,'Актуальные вопросы в сфере земельных правоотношений','2017-01-02 00:00:00',0,'2017-01-27 00:00:00',6000.00,'2016-12-25 13:56:12','2017-01-10 17:33:13','<p><strong><span style=\"background-color:#ccffcc\"><strong><span style=\"font-family:PTSansRegular\"><span style=\"font-size:13px\">ИДЕТ НАБОР ГРУППЫ</span></span></strong></span></strong>&nbsp;<br />\r\n<br />\r\n<strong>Докладчик:&nbsp;</strong><span style=\"font-size:13px\"><span style=\"color:#000000\"><span style=\"font-family:PTSansRegular\">Шаталов Петр Михайлович</span></span></span></p>\r\n\r\n<p><span style=\"font-size:13px\"><span style=\"color:#000000\"><span style=\"font-family:PTSansRegular\"><span style=\"font-size:12px\"><span style=\"font-family:Arial,Verdana,sans-serif\">Юрист. Партнер юридической фирмы Гражданское дело с 2011 года. В 2011 году окончил &laquo;Северо-Западную академию государственной службы&raquo; по специальности юрист (специализация - гражданское право) и стал представлять интересы клиентов в судах. Преподает в НОУ &laquo;Институт Недвижимости&raquo; с 2014 года.&nbsp;</span></span></span></span></span></p>\r\n\r\n<p><span style=\"font-size:13px\"><span style=\"color:#000000\"><span style=\"font-family:PTSansRegular\"><strong>Время проведения:</strong>&nbsp;10.30 &ndash; 12.15 (2 академических часа)</span></span></span></p>\r\n\r\n<p><span style=\"font-size:13px\"><span style=\"color:#000000\"><span style=\"font-family:PTSansRegular\">&nbsp;</span></span></span></p>\r\n\r\n<p><span style=\"font-size:13px\"><span style=\"color:#000000\"><span style=\"font-family:PTSansRegular\"><strong>Место проведения:</strong>&nbsp;Санкт-Петербург, ул. Бронницкая, д. 32, конференц-зал, 5 этаж, ст.м. Технологический институт</span></span></span></p>\r\n','<p><strong>Программа семинара:</strong><br />\r\n<br />\r\n1. Понятие. Источники. Виды правоотношений. Субъекты и объекты прав.</p>\r\n\r\n<p>2. Личное подсобное, дачное хозяйство, огородничество, садоводство, индивидуальное гаражное или индивидуальное жилищное строительство. Общая характеристика. Особенности предоставления земельных участков и государственной регистрации права собственности.</p>\r\n\r\n<p>3. Регистрация граждан по месту жительства в принадлежащих им на праве собственности жилых строениях, в том числе в СНТ.</p>\r\n\r\n<p>4. Межевание. Споры о границах земельных участков.</p>\r\n\r\n<p>5. Постановка земельного участка на кадастровый учет.</p>\r\n\r\n<p>6. Оформление в упрощенном порядке прав граждан на отдельные объекты недвижимого имущества (&laquo;дачная амнистия&raquo;).</p>\r\n\r\n<p>7. Раздел (выдел доли) земельного участка в натуре.</p>\r\n\r\n<p>8. Особенности налогообложения.</p>\r\n','<p>Для участия в семинаре необходимо заполнить форму &laquo;Подать заявку&raquo; либо записаться по телефону учебно-методического центра (812) 576-06-42, либо отправить письмо с указанием Ваших контактных данных на почту: umc@obmencity.ru</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>После получения заявки участнику семинара на почту будет направлена квитанция на оплату</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Предварительная запись и оплата участия в семинаре обязательна!</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Присылайте заранее вопросы, заполнив форму &laquo;Задать вопрос&raquo; либо отправив его на почту umc@obmencity.ru</p>\r\n',NULL,2,1),(2,'Курсы повышения квалификации по программе \"жилищные программы санкт-петербурга\"','2017-01-31 00:00:00',1,'2017-01-31 00:00:00',0.00,'2016-12-27 22:57:11','2017-01-10 17:32:44','<p><strong>ИДЕТ НАБОР ГРУППЫ</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Продолжительность курса:</strong>&nbsp;17 академических часов (три дня)</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Форма обучения:&nbsp;</strong>&nbsp;очная</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Место проведения:</strong>&nbsp;Санкт-Петербург, ул. Бронницкая, д. 32, конференц-зал, 5 этаж, ст.м. Технологический институт</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Выдаваемый документ:&nbsp;</strong><strong>Удостоверение о повышении квалификации</strong>&nbsp;(Лицензия на ведение образовательной деятельности)</p>\r\n','<p><strong>ПРОГРАММА КУРСА</strong></p>\r\n\r\n<p><strong>&nbsp;</strong></p>\r\n\r\n<p><strong>ПЕРВЫЙ ДЕНЬ (с 10.00 до 15.15, перерыв с 13.00 до 13.45)</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>1. Правовые основы и порядок постановки на жилищный учет в Санкт-Петербурге.</strong></p>\r\n\r\n<p>Янус Наталья Юрьевна - начальник жилищного отдела администрации Калининского района.</p>\r\n\r\n<p><strong>&nbsp;</strong></p>\r\n\r\n<p><strong>2. Безвозмездная субсидия - как одна из форм частичного государственного содействия гражданам в приобретении или строительстве жилых помещений.</strong></p>\r\n\r\n<p>Бойцова Людмила Германовна - ведущий специалист сектора реализации безвозмездных субсидий отдела содействия гражданам льготных категорий в улучшении жилищных условий Жилищного комитета.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>ВТОРОЙ ДЕНЬ (с 11.00 до 16.15, перерыв с 14.00 до 14.45)</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>1. Виды государственной поддержки и условия их реализации в рамках целевой программы Санкт-Петербурга &laquo;Молодежи - доступное жилье&raquo;.</strong></p>\r\n\r\n<p>Лащев Александр Михайлович - начальник отдела администрирования АО &laquo;Санкт-Петербургский центр доступного жилья&raquo;</p>\r\n\r\n<p><strong>2. Условия реализации целевой программы Санкт-Петербурга &laquo;Развитие долгосрочного жилищного кредитования в Санкт-Петербурге&raquo;.</strong></p>\r\n\r\n<p>Лащев Александр Михайлович - начальник отдела администрирования АО &laquo;Санкт-Петербургский центр доступного жилья&raquo;</p>\r\n\r\n<p><strong>3. Реализация целевой программы Санкт-Петербурга &laquo;Жилье работникам бюджетной сферы&raquo;.</strong></p>\r\n\r\n<p>Сухова Светлана Анатольевна - начальник отдела продаж жилых помещений СПб ГБУ &laquo;Горжилобмен&raquo;<br />\r\n<strong>4. Предоставление жилых помещений фонда коммерческого использования по договору найма</strong><br />\r\nДаниленко Дмитрий Леонидович &ndash; начальник отдела найма СПб ГБУ &laquo;Горжилобмен&raquo;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>ТРЕТИЙ ДЕНЬ (с 10.00 до 14.00, перерыв с 13.00 до 13.15)</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>1. Участие в программе &laquo;Расселение коммунальных квартир&raquo;.</strong></p>\r\n\r\n<p>Алексеева Галина Владимировна - заместитель начальника отдела расселения коммунальных квартир СПб ГБУ &laquo;Горжилобмен&raquo;</p>\r\n\r\n<p>Скоропупова Фаина Викторовна &ndash; инспектор отдела расселения коммунальных квартир СПб ГБУ &laquo;Горжилобмен&raquo;</p>\r\n\r\n<p><strong>2. Порядок реализации социальных выплат.</strong></p>\r\n\r\n<p>Кришталь Виктория Владимировна - начальник отдела по обеспечению социальных выплат СПб ГБУ &laquo;Горжилобмен&raquo;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>3. Итоговая аттестация.</strong></p>\r\n\r\n<p>Итоговая аттестация проводится путем письменного тестирования слушателей.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Всем участникам КУРСА высылается презентация, выдается пакет информационно-методических материалов, нормативные документы.</p>\r\n\r\n<p>Вы можете посетить одну (или несколько тем) из курса и получить СВИДЕТЕЛЬСТВО об участии в семинаре по этой теме.</p>\r\n','<p>Внимание!&nbsp;Курсы повышения квалификации могут пройти слушатели, соответствующие требованиям пункта 3 статьи 76 Федерального закона от 29.12.2012 № 273-ФЗ &laquo;Об образовании в Российской Федерации&raquo; (имеющие документ о высшем или среднем профессиональном образовании, либо справку об обучении, если лицо только получает высшее или среднее профессиональное образование).</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Для участия необходимо заполнить форму &laquo;Подать заявку&raquo; либо записаться по телефону учебно-методического центра (812) 576-06-42, либо отправить письмо с указанием Ваших контактных данных на почту: umc@obmencity.ru</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>После получения заявки участнику на почту будет направлена квитанция на оплату</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Предварительная запись и оплата участия КУРСА обязательна!</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Присылайте заранее вопросы, заполнив форму &laquo;Задать вопрос&raquo; либо отправив его на почту umc@obmencity.ru</p>\r\n','seminars/Учебный_план_по_курсу_Жилищные_программы_СПБ_22-24.11.2016.docx',3,1),(3,'Практикум о способах и совмещениях целевых жилищных программ при расселении квартиры коммунального заселения',NULL,0,NULL,0.00,'2017-01-10 12:44:40','2017-01-10 17:32:31','','','',NULL,2,0),(4,'Участие в программе \"Расселение коммунальных квартир\" и порядок реализации социальных выплат','2017-01-31 00:00:00',1,'2017-01-31 00:00:00',0.00,'2017-01-10 12:45:07','2017-01-10 17:32:20','','','',NULL,3,0),(5,'Виды государственной поддержки и условия их реализации в рамках целевой программы Санкт-Петербурга «Молодежи - доступное жилье».',NULL,0,NULL,0.00,'2017-01-10 12:45:23','2017-01-10 12:45:23','','','',NULL,2,NULL),(6,'Правовые основы и порядок постановки на жилищный учет в Санкт-Петербурге',NULL,0,NULL,0.00,'2017-01-10 12:46:07','2017-01-10 12:46:07','','','',NULL,2,NULL),(7,'Оптимизация налогообложения сделок с недвижимостью. Законные способы минимизации налогообложения при сделках с недвижимостью.',NULL,0,NULL,0.00,'2017-01-10 12:46:22','2017-01-10 12:46:22','','','',NULL,2,NULL);
/*!40000 ALTER TABLE `seminars` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `seo`
--

DROP TABLE IF EXISTS `seo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `seo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `route` varchar(450) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(450) COLLATE utf8_unicode_ci NOT NULL,
  `menu` varchar(450) COLLATE utf8_unicode_ci DEFAULT NULL,
  `breadcrumbs` varchar(450) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(450) COLLATE utf8_unicode_ci DEFAULT NULL,
  `keywords` varchar(450) COLLATE utf8_unicode_ci DEFAULT NULL,
  `enabled` int(11) DEFAULT '1',
  `h1` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `seo`
--

LOCK TABLES `seo` WRITE;
/*!40000 ALTER TABLE `seo` DISABLE KEYS */;
INSERT INTO `seo` VALUES (1,'static/about','О учебном центре','Об учебном центре СПб ГБУ Горжилобмен','О учебном центре','О учебном центре','О учебном центре',1,'Об учебном центре СПб ГБУ Горжилобмен'),(2,'site/seminars','Семинары','План семинаров и курсов повышения квалификации','Семинары','Семинары','Семинары',1,'План семинаров и курсов повышения квалификации'),(3,'static/contact','Куда обращаться','Куда обращаться','Куда обращаться','Куда обращаться','Куда обращаться',1,'Куда обращаться'),(4,'site/reviews','Отзывы','Отзывы о семинарах и курсах повышения квалификации','Отзывы','Отзывы','Отзывы',1,'Отзывы о семинарах и курсах повышения квалификации'),(5,'site/teachers','Преподаватели','Наши преподаватели','Преподаватели','Преподаватели','Преподаватели',1,'Наши преподаватели'),(6,'site/news','Новости','Новости','Новости','Новости','Новости',1,'Новости'),(7,'site/news/view/1','В образовательном центре СПб ГБУ «Горжилобмен» завершился учебный год',NULL,NULL,'В образовательном центре СПб ГБУ «Горжилобмен» завершился учебный год','В образовательном центре СПб ГБУ «Горжилобмен» завершился учебный год',1,NULL);
/*!40000 ALTER TABLE `seo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `key` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `value` varchar(450) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `idx_UNIQUE_key_3886_00` (`key`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `settings`
--

LOCK TABLES `settings` WRITE;
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;
INSERT INTO `settings` VALUES (1,'siteBrand','Учебный центр <span>СПб ГБУ «Горжилобмен»</span>'),(2,'siteBrandLid','Семинары и Курсы повышения квалификации'),(3,'siteEmail','umc@obmencity.ru'),(4,'sitePhone','+7 (812) 576-06-42'),(5,'socialVK','https://vk.com/dop_obrazovanie_spb'),(6,'socialFB','https://ru-ru.facebook.com/people/%D0%A3%D1%87%D0%B5%D0%B1%D0%BD%D1%8B%D0%B9-%D0%A6%D0%B5%D0%BD%D1%82%D1%80/100013041187254'),(7,'socialTW','https://twitter.com/Gorzilobmen'),(8,'siteAddress','Россия, Санкт-Петербург, ул. Бронницкая, д. 32, каб. 101'),(9,'venyoo','<!-- venyoo --><script type=\"text/javascript\" src=\"//api.venyoo.ru/wnew.js?wc=venyoo/default/science&widget_id=5529775945547776\"></script>');
/*!40000 ALTER TABLE `settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `slider`
--

DROP TABLE IF EXISTS `slider`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `slider` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` varchar(450) COLLATE utf8_unicode_ci NOT NULL,
  `interval` int(11) NOT NULL DEFAULT '300',
  `caption` varchar(450) COLLATE utf8_unicode_ci DEFAULT NULL,
  `enabled` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `slider`
--

LOCK TABLES `slider` WRITE;
/*!40000 ALTER TABLE `slider` DISABLE KEYS */;
INSERT INTO `slider` VALUES (1,'slider/uqKIUzr247X-i4MT2FNZM30Q_VygQTln',300,'',1),(2,'slider/vSMVAe6WpQUw-5bN5HxEMQOXnqcknqXE',300,'',1),(3,'slider/tRLXETzXKz7CbCa2i-pyP1PLiHOjKbGp',300,'',1);
/*!40000 ALTER TABLE `slider` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `static_page`
--

DROP TABLE IF EXISTS `static_page`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `static_page` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `route` varchar(450) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(450) COLLATE utf8_unicode_ci NOT NULL,
  `html` longtext COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `static_page`
--

LOCK TABLES `static_page` WRITE;
/*!40000 ALTER TABLE `static_page` DISABLE KEYS */;
INSERT INTO `static_page` VALUES (1,'about','О учебном центре','<p><img alt=\"\" src=\"http://res.cloudinary.com/uc-obmencity/image/upload/v1483631798/ckeditor/XicV0minF9UXeMrMrBUv9A8T9dMVyF3Q.jpg\" style=\"float:left; height:200px; margin:5px; width:300px\" />Учебно-методический центр СПб ГБУ &laquo;Горжилобмен&raquo; ведет свою деятельность в соответствии с лицензией на осуществление образовательной деятельности № 1527 от 15.10.2015 г. Лицензия дает право оказывать образовательные услуги по реализации образовательных программ по дополнительному профессиональному образованию. Настоящая Лицензия предоставлена Комитетом по образованию Правительства Санкт-Петербурга бессрочно распоряжением от 15.10.2015 г. № 5010-р. СПб ГБУ &quot;Горжилобмен&quot; разрабатывает ряд образовательных программ для представителей сферы ЖКХ.</p>\r\n\r\n<p>Занятия в Учебно-методическом центре проводят эксперты: представители законодательной и исполнительной власти, с большим опытом практической работы.</p>\r\n\r\n<p>Программа мероприятий постоянно дополняется и корректируется в соответствии со всеми поправками, внесенными в жилищное законодательство, а также с учетом пожеланий слушателей. Ознакомиться с планом проведения курсов можно в разделе &quot;План занятий&quot;. &nbsp;</p>\r\n\r\n<p>Требования к участникам программ повышения квалификации:</p>\r\n\r\n<p>&bull; документ о высшем или среднем профессиональном образовании либо копия указанного документа.</p>\r\n\r\n<p>&bull; справка об обучении, если лицо только получает высшее или среднее профессиональное образование;</p>\r\n\r\n<p>&bull; документ о смене фамилии, в случае, когда фамилия в дипломе и паспорте не совпадает.</p>\r\n\r\n<p>В соответствии с пунктом 3 статьи 76 Федерального закона от &nbsp;29.12.2012 № 273-ФЗ &laquo;Об образовании в Российской Федерации&raquo;</p>\r\n\r\n<p>Консультационно-методическая помощь - удобная форма решения задач, неизменно и регулярно встающих перед участниками рынка недвижимости.<br />\r\nС целью повышения квалификации и информирования специалистов в области недвижимости на базе Санкт-Петербургского государственного бюджетного &nbsp;учреждения &laquo;Горжилобмен&raquo; проходят обучающие семинары по различным формам работы с недвижимостью.<br />\r\nУчреждение является подведомственной структурой Жилищного комитета и уполномочено от города осуществлять жилищную политику Санкт-Петербурга.<br />\r\nСПб ГБУ &laquo;Горжилобмен&raquo; является старейшим учреждением в жилищной сфере и имеет многолетний опыт в работе с государственным и частным жилищным фондом.<br />\r\nЗанятия в Учебном центре проводят высококвалифицированные специалисты &nbsp;с большим опытом практической работы, а также представители &nbsp;Законодательных органов и Общественных объединений.<br />\r\nПрограммы семинаров тщательно отработаны по соотношению теории и практики (как правило, 50% и более общего времени на занятиях отводится отработке практических навыков, необходимых при дальнейшей работе и позволяющих минимизировать временные и денежные &nbsp;затраты).&nbsp;<br />\r\nВ ходе занятий применяются самые передовые методы обучения. &nbsp;Обучающие мероприятия ориентированы на следующих участников: руководителей агентств недвижимости, риэлторов, специалистов &nbsp;и менеджеров риэлторских фирм. Специализированные практические семинары и тренинги, будут интересны &nbsp;не только агентам с опытом, желающим получить новые профессиональные знания, &nbsp;умения и повысить &nbsp;свое мастерство в сфере недвижимости, но и новичкам, только начинающим свое знакомство с особенностями работы на рынке недвижимости. Также приглашаются &nbsp;представители &nbsp; СМИ, &nbsp; для которых будет интересен &nbsp; регулярный информационный обмен, носящий &nbsp;разъяснительный &nbsp;характер возникающих проблем, пути их решений, а также комментарии к &nbsp;изменениям в Жилищном законодательстве.&nbsp;<br />\r\nВсем участникам семинаров выдается пакет информационно-методических материалов, необходимые брошюры, буклеты, нормативные документы. Каждый слушатель семинаров получает свидетельсво об участии.</p>\r\n','2016-12-19 23:35:20','2017-01-05 18:56:50'),(2,'contact','Куда обращаться','<p>Ст. метро &laquo;Технологический институт&raquo;, Бронницкая ул., д. 32, каб. 101<br />\r\nтелефон/ факс: (812) 576-06-42<br />\r\nм.т.: +7 (952) 278-77-08<br />\r\ne-mail:&nbsp;<a href=\"mailto:umc@obmencity.ru\">umc@obmencity.ru</a>&nbsp;</p>\r\n','2016-12-19 23:35:20','2017-01-10 15:25:41');
/*!40000 ALTER TABLE `static_page` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `teachers`
--

DROP TABLE IF EXISTS `teachers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `teachers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(450) COLLATE utf8_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `position` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `seminars_text` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `teachers`
--

LOCK TABLES `teachers` WRITE;
/*!40000 ALTER TABLE `teachers` DISABLE KEYS */;
INSERT INTO `teachers` VALUES (1,'Рубцова Любовь Борисовна','teachers/tcBx_lnChuCxgslba8sPYQ_JqOgir_cp','Первый заместитель директора СПб ГБУ Горжилобмен','Способы расселения коммунальных квартир и совмещение различных целевых программ при расселении квартир коммунального заселения','2016-12-27 17:25:44','2017-01-05 22:16:54'),(3,'Кришталь Виктория Владимировна','teachers/EWZ0_l4eJrB4vdMH7uIRpoCRjrGUgMOL','Начальник отдела по обеспечению социальных выплат','Порядок реализации социальных выплат и безвозмездных субсидий для приобретения или строительства жилых помещений за счет средств бюджета Санкт-Петербурга для граждан, получивших социальную выплату после 1 июля 2016 года','2016-12-27 19:06:16','2016-12-27 19:06:16');
/*!40000 ALTER TABLE `teachers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'uc'
--

--
-- Dumping routines for database 'uc'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-01-11 13:32:22
