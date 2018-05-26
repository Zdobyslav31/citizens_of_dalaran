-- MySQL dump 10.13  Distrib 5.7.20, for Linux (x86_64)
--
-- Host: 127.0.0.1    Database: 15_kubala
-- ------------------------------------------------------
-- Server version	5.7.22

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
-- Table structure for table `application`
--

DROP TABLE IF EXISTS `application`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `application` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `events_id` int(11) DEFAULT NULL,
  `users_id` int(11) DEFAULT NULL,
  `role` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `transport` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `accommodtion_remarks` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `organization_remarks` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `costume_needs` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `weapon_needs` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lore_needs` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lore_knowledge` int(11) DEFAULT NULL,
  `interaction_preferences` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `character_name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `character_race` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `character_class` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `character_title` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `character_age` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `faction` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `faction_2` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `commandment_preferences` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `character_militancy` int(11) DEFAULT NULL,
  `character_cunning` int(11) DEFAULT NULL,
  `character_story` mediumtext COLLATE utf8_unicode_ci,
  `character_nature` varchar(5000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `character_connections` varchar(5000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `rumours` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `larping_preferences` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `additional_remarks` varchar(5000) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_users_has_events_events1_idx` (`events_id`),
  KEY `fk_users_has_events_users1_idx` (`users_id`),
  CONSTRAINT `FK_A45BDDC167B3B43D` FOREIGN KEY (`users_id`) REFERENCES `user` (`id`),
  CONSTRAINT `FK_A45BDDC19D6A1065` FOREIGN KEY (`events_id`) REFERENCES `event` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `application`
--

LOCK TABLES `application` WRITE;
/*!40000 ALTER TABLE `application` DISABLE KEYS */;
/*!40000 ALTER TABLE `application` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `character`
--

DROP TABLE IF EXISTS `character`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `character` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `events_id` int(11) DEFAULT NULL,
  `users_id` int(11) DEFAULT NULL,
  `name` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `race` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `class` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `story` mediumtext COLLATE utf8_unicode_ci,
  `quests` mediumtext COLLATE utf8_unicode_ci,
  `informations` mediumtext COLLATE utf8_unicode_ci,
  `resources` varchar(5000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `official_info` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_events_has_users_users1_idx` (`users_id`),
  KEY `fk_events_has_users_events1_idx` (`events_id`),
  CONSTRAINT `FK_937AB03467B3B43D` FOREIGN KEY (`users_id`) REFERENCES `user` (`id`),
  CONSTRAINT `FK_937AB0349D6A1065` FOREIGN KEY (`events_id`) REFERENCES `event` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `character`
--

LOCK TABLES `character` WRITE;
/*!40000 ALTER TABLE `character` DISABLE KEYS */;
/*!40000 ALTER TABLE `character` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `event`
--

DROP TABLE IF EXISTS `event`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `event` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `template_application_id` int(11) DEFAULT NULL,
  `tags_id` int(10) unsigned DEFAULT NULL,
  `name` varchar(127) COLLATE utf8_unicode_ci NOT NULL,
  `date_start` date NOT NULL,
  `date_end` date NOT NULL,
  `location` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `location_link` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `summary` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `description` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `price` double DEFAULT NULL,
  `img` varchar(127) COLLATE utf8_unicode_ci DEFAULT NULL,
  `displayed_main` tinyint(1) NOT NULL,
  `participants_limit` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_events_tags1_idx` (`tags_id`),
  KEY `fk_events_application1_idx` (`template_application_id`),
  CONSTRAINT `FK_3BAE0AA78D7B4FB4` FOREIGN KEY (`tags_id`) REFERENCES `tag` (`id`),
  CONSTRAINT `FK_3BAE0AA79B12F4D7` FOREIGN KEY (`template_application_id`) REFERENCES `application` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `event`
--

LOCK TABLES `event` WRITE;
/*!40000 ALTER TABLE `event` DISABLE KEYS */;
/*!40000 ALTER TABLE `event` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fos_user`
--

DROP TABLE IF EXISTS `fos_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fos_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `username_canonical` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `email_canonical` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `salt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `confirmation_token` varchar(180) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_requested_at` datetime DEFAULT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  `img` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `phone_number` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `emergency_phone` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `health_issues` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nourishment_issues` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_957A647992FC23A8` (`username_canonical`),
  UNIQUE KEY `UNIQ_957A6479A0D96FBF` (`email_canonical`),
  UNIQUE KEY `UNIQ_957A6479C05FB297` (`confirmation_token`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fos_user`
--

LOCK TABLES `fos_user` WRITE;
/*!40000 ALTER TABLE `fos_user` DISABLE KEYS */;
INSERT INTO `fos_user` VALUES (1,'Hagin','hagin','j.kubala@sponsor.com.pl','j.kubala@sponsor.com.pl',1,NULL,'$2y$13$s27c/ttSOeySt1YoRFcTl.QfPcd6sMbgH22XXhFaievJUX58ZD696','2018-05-26 13:43:13',NULL,NULL,'a:0:{}','http://static1.squarespace.com/static/56a57eac7086d7ad1b2afc0b/56c20929fd2119ce49fa0ec5/56c20978fd2119ce49fa138f/1455556984147/gnome_wizard_colors.jpg?format=original','Behold the absolute power of Hagin Gimbleflux, master mechgineer!','Hagin Gimbleflux','1913-04-15','666777888','888777666',NULL,NULL,'2018-05-26 11:29:15'),(2,'Daquelia','daquelia','daq@lordaeron.com','daq@lordaeron.com',1,NULL,'$2a$04$pFQUqY63iB1qPv5H.I1vZ.3/0NvuQW1xOkXXDagt01ydgCWQQomxW',NULL,NULL,NULL,'a:0:{}',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-05-26 11:29:15'),(3,'Komzurak','komzurak','zurak@zurak.com','zurak@zurak.com',1,NULL,'$2y$13$N8hJjvkve5wcADuCQ89LX.mjHPlbo78MmGY.n37qNFfhNk1CFtRuq','2018-05-26 11:12:23',NULL,NULL,'a:0:{}',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-05-26 11:29:15'),(4,'Greemo','greemo','sparkgrinder@goblinweb.ru','sparkgrinder@goblinweb.ru',1,NULL,'$2y$13$yzz9KFZsRtu6aYj9EqKRwO2N1cZnFVgs91pyqT88haoAp1GIs8/Qa','2018-05-26 14:00:41',NULL,NULL,'a:0:{}',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-05-26 13:45:15');
/*!40000 ALTER TABLE `fos_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `group`
--

DROP TABLE IF EXISTS `group`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `official_description` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `informations` mediumtext COLLATE utf8_unicode_ci,
  `quests` mediumtext COLLATE utf8_unicode_ci,
  `resources` varchar(5000) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `group`
--

LOCK TABLES `group` WRITE;
/*!40000 ALTER TABLE `group` DISABLE KEYS */;
/*!40000 ALTER TABLE `group` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `group_has_character`
--

DROP TABLE IF EXISTS `group_has_character`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `group_has_character` (
  `group_id` int(11) NOT NULL,
  `character_id` int(11) NOT NULL,
  PRIMARY KEY (`group_id`,`character_id`),
  KEY `IDX_ED36EC39FE54D947` (`group_id`),
  KEY `IDX_ED36EC391136BE75` (`character_id`),
  CONSTRAINT `FK_ED36EC391136BE75` FOREIGN KEY (`character_id`) REFERENCES `character` (`id`),
  CONSTRAINT `FK_ED36EC39FE54D947` FOREIGN KEY (`group_id`) REFERENCES `group` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `group_has_character`
--

LOCK TABLES `group_has_character` WRITE;
/*!40000 ALTER TABLE `group_has_character` DISABLE KEYS */;
/*!40000 ALTER TABLE `group_has_character` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `news` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `creator_id` int(10) unsigned DEFAULT NULL,
  `modifier_id` int(10) unsigned DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `modified_date` datetime DEFAULT NULL,
  `created_date` datetime NOT NULL,
  `summary` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `content` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_news_users1_idx` (`creator_id`),
  KEY `fk_news_users2_idx` (`modifier_id`),
  CONSTRAINT `FK_1DD3995061220EA6` FOREIGN KEY (`creator_id`) REFERENCES `fos_user` (`id`),
  CONSTRAINT `FK_1DD39950D079F553` FOREIGN KEY (`modifier_id`) REFERENCES `fos_user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `news`
--

LOCK TABLES `news` WRITE;
/*!40000 ALTER TABLE `news` DISABLE KEYS */;
INSERT INTO `news` VALUES (8,1,4,'Jedziemy na Pyrkon','2018-05-26 20:54:09','2018-01-19 00:00:00','<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum ligula ipsum, luctus quis ante eget, suscipit pharetra urna. Phasellus facilisis eget ante id dictum. Sed sodales aliquam ante fringilla tincidunt. Nullam hendrerit interdum sem sit amet condimentum. Sed aliquam suscipit dolor. Proin rhoncus, tellus feugiat tincidunt accumsan, massa nunc viverra libero, vel feugiat justo tortor ac mauris. Pellentesque non congue nunc. Aenean posuere erat ex, sed ornare lectus varius eget. Aenean eleifend consectetur sem sed condimentum. Nulla et neque ornare, congue ipsum in, imperdiet nulla. Sed vel lacinia sem. Pellentesque vel tempus est. Nullam eget rutrum velit, in blandit dolor. Nullam quis est libero. Etiam sagittis nulla in ipsum luctus, sit amet sagittis dui consectetur.</p>','<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum ligula ipsum, luctus quis ante eget, suscipit pharetra urna. Phasellus facilisis eget ante id dictum. Sed sodales aliquam ante fringilla tincidunt. Nullam hendrerit interdum sem sit amet condimentum. Sed aliquam suscipit dolor. Proin rhoncus, tellus feugiat tincidunt accumsan, massa nunc viverra libero, vel feugiat justo tortor ac mauris. Pellentesque non congue nunc. Aenean posuere erat ex, sed ornare lectus varius eget. Aenean eleifend consectetur sem sed condimentum. Nulla et neque ornare, congue ipsum in, imperdiet nulla. Sed vel lacinia sem. Pellentesque vel tempus est. Nullam eget rutrum velit, in blandit dolor. Nullam quis est libero. Etiam sagittis nulla in ipsum luctus, sit amet sagittis dui consectetur.</p>\r\n<p>Vestibulum porta ligula vitae aliquam pharetra. Nam in est ut eros mollis aliquam. Fusce sit amet sapien pulvinar, dapibus turpis nec, imperdiet nibh. Ut et lacus sed velit condimentum tincidunt. Vivamus in turpis suscipit, euismod quam quis, porta sem. Integer lectus elit, sodales id sagittis ut, consequat a nisl. Nullam ut orci id lacus vestibulum cursus. Maecenas consequat ac nulla quis euismod. Nullam lacinia, justo sed venenatis scelerisque, nibh magna lobortis tellus, a luctus quam est eget mauris. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>\r\n<p>Pellentesque libero justo, dignissim sit amet nulla luctus, maximus venenatis felis. Quisque sollicitudin dolor eu arcu vehicula ullamcorper. Fusce aliquet facilisis hendrerit. Sed mattis auctor leo, et volutpat augue. Duis pharetra eros ut tortor porta, in dictum metus lobortis. Nulla est arcu, rhoncus ac lobortis sed, ultrices ac neque. Aenean blandit mi ut malesuada venenatis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris ac ultricies neque, vitae condimentum sem. Suspendisse sed lorem in est sagittis elementum venenatis id quam. In cursus arcu eu lacus varius, ut mollis nisi auctor. Suspendisse tincidunt mattis diam ac pulvinar. Quisque dui arcu, dapibus a commodo sed, aliquet et diam.</p>\r\n<p>Pellentesque rutrum rhoncus ligula, ac dictum justo facilisis id. Suspendisse fermentum euismod ex in porttitor. Nulla pulvinar risus ac rhoncus bibendum. Phasellus at luctus ante. Vivamus id libero maximus, sagittis velit nec, interdum nulla. Nulla tincidunt, magna eget condimentum rhoncus, ipsum arcu faucibus nibh, sed tincidunt enim odio non metus. Phasellus justo elit, faucibus sit amet dictum in, laoreet vitae risus. Duis sem nibh, rutrum ut lorem vestibulum, posuere laoreet nisi. Quisque at elit pharetra, tempor enim sit amet, aliquam tellus.</p>\r\n<p>Sed accumsan quam ornare congue convallis. Mauris eget velit elementum, tempor ipsum vel, scelerisque arcu. Phasellus eget eleifend sapien, ut lobortis magna. Nam posuere lorem sit amet erat hendrerit accumsan. Morbi viverra rutrum nulla. Suspendisse pharetra viverra velit. Pellentesque lobortis nulla vitae ante eleifend dapibus quis eget metus. In nisi neque, consectetur eget mollis a, convallis sit amet leo.</p>','da282b86db875acd1449e1c71baa0919.jpeg'),(9,2,4,'Crafting u Rzepy','2018-05-26 20:53:41','2018-02-19 00:00:00','<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum ligula ipsum, luctus quis ante eget, suscipit pharetra urna. Phasellus facilisis eget ante id dictum. Sed sodales aliquam ante fringilla tincidunt. Nullam hendrerit interdum sem sit amet condimentum. Sed aliquam suscipit dolor. Proin rhoncus, tellus feugiat tincidunt accumsan, massa nunc viverra libero, vel feugiat justo tortor ac mauris. Pellentesque non congue nunc. Aenean posuere erat ex, sed ornare lectus varius eget. Aenean eleifend consectetur sem sed condimentum. Nulla et neque ornare, congue ipsum in, imperdiet nulla. Sed vel lacinia sem. Pellentesque vel tempus est. Nullam eget rutrum velit, in blandit dolor. Nullam quis est libero. Etiam sagittis nulla in ipsum luctus, sit amet sagittis dui consectetur.</p>','<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum ligula ipsum, luctus quis ante eget, suscipit pharetra urna. Phasellus facilisis eget ante id dictum. Sed sodales aliquam ante fringilla tincidunt. Nullam hendrerit interdum sem sit amet condimentum. Sed aliquam suscipit dolor. Proin rhoncus, tellus feugiat tincidunt accumsan, massa nunc viverra libero, vel feugiat justo tortor ac mauris. Pellentesque non congue nunc. Aenean posuere erat ex, sed ornare lectus varius eget. Aenean eleifend consectetur sem sed condimentum. Nulla et neque ornare, congue ipsum in, imperdiet nulla. Sed vel lacinia sem. Pellentesque vel tempus est. Nullam eget rutrum velit, in blandit dolor. Nullam quis est libero. Etiam sagittis nulla in ipsum luctus, sit amet sagittis dui consectetur.</p>\r\n<p>Vestibulum porta ligula vitae aliquam pharetra. Nam in est ut eros mollis aliquam. Fusce sit amet sapien pulvinar, dapibus turpis nec, imperdiet nibh. Ut et lacus sed velit condimentum tincidunt. Vivamus in turpis suscipit, euismod quam quis, porta sem. Integer lectus elit, sodales id sagittis ut, consequat a nisl. Nullam ut orci id lacus vestibulum cursus. Maecenas consequat ac nulla quis euismod. Nullam lacinia, justo sed venenatis scelerisque, nibh magna lobortis tellus, a luctus quam est eget mauris. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>\r\n<p>Pellentesque libero justo, dignissim sit amet nulla luctus, maximus venenatis felis. Quisque sollicitudin dolor eu arcu vehicula ullamcorper. Fusce aliquet facilisis hendrerit. Sed mattis auctor leo, et volutpat augue. Duis pharetra eros ut tortor porta, in dictum metus lobortis. Nulla est arcu, rhoncus ac lobortis sed, ultrices ac neque. Aenean blandit mi ut malesuada venenatis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris ac ultricies neque, vitae condimentum sem. Suspendisse sed lorem in est sagittis elementum venenatis id quam. In cursus arcu eu lacus varius, ut mollis nisi auctor. Suspendisse tincidunt mattis diam ac pulvinar. Quisque dui arcu, dapibus a commodo sed, aliquet et diam.</p>\r\n<p>Pellentesque rutrum rhoncus ligula, ac dictum justo facilisis id. Suspendisse fermentum euismod ex in porttitor. Nulla pulvinar risus ac rhoncus bibendum. Phasellus at luctus ante. Vivamus id libero maximus, sagittis velit nec, interdum nulla. Nulla tincidunt, magna eget condimentum rhoncus, ipsum arcu faucibus nibh, sed tincidunt enim odio non metus. Phasellus justo elit, faucibus sit amet dictum in, laoreet vitae risus. Duis sem nibh, rutrum ut lorem vestibulum, posuere laoreet nisi. Quisque at elit pharetra, tempor enim sit amet, aliquam tellus.</p>\r\n<p>Sed accumsan quam ornare congue convallis. Mauris eget velit elementum, tempor ipsum vel, scelerisque arcu. Phasellus eget eleifend sapien, ut lobortis magna. Nam posuere lorem sit amet erat hendrerit accumsan. Morbi viverra rutrum nulla. Suspendisse pharetra viverra velit. Pellentesque lobortis nulla vitae ante eleifend dapibus quis eget metus. In nisi neque, consectetur eget mollis a, convallis sit amet leo.</p>','2697541fcaf88b377fa136bc512143f6.jpeg'),(10,1,4,'Zgłoszenia na Szepty Nawiedzonych Krain dobiegają końca','2018-05-26 20:53:16','2018-04-24 00:00:00','<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum ligula ipsum, luctus quis ante eget, suscipit pharetra urna. Phasellus facilisis eget ante id dictum. Sed sodales aliquam ante fringilla tincidunt. Nullam hendrerit interdum sem sit amet condimentum. Sed aliquam suscipit dolor. Proin rhoncus, tellus feugiat tincidunt accumsan, massa nunc viverra libero, vel feugiat justo tortor ac mauris. Pellentesque non congue nunc. Aenean posuere erat ex, sed ornare lectus varius eget. Aenean eleifend consectetur sem sed condimentum. Nulla et neque ornare, congue ipsum in, imperdiet nulla. Sed vel lacinia sem. Pellentesque vel tempus est. Nullam eget rutrum velit, in blandit dolor. Nullam quis est libero. Etiam sagittis nulla in ipsum luctus, sit amet sagittis dui consectetur.</p>','<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum ligula ipsum, luctus quis ante eget, suscipit pharetra urna. Phasellus facilisis eget ante id dictum. Sed sodales aliquam ante fringilla tincidunt. Nullam hendrerit interdum sem sit amet condimentum. Sed aliquam suscipit dolor. Proin rhoncus, tellus feugiat tincidunt accumsan, massa nunc viverra libero, vel feugiat justo tortor ac mauris. Pellentesque non congue nunc. Aenean posuere erat ex, sed ornare lectus varius eget. Aenean eleifend consectetur sem sed condimentum. Nulla et neque ornare, congue ipsum in, imperdiet nulla. Sed vel lacinia sem. Pellentesque vel tempus est. Nullam eget rutrum velit, in blandit dolor. Nullam quis est libero. Etiam sagittis nulla in ipsum luctus, sit amet sagittis dui consectetur.</p>\r\n<p>Vestibulum porta ligula vitae aliquam pharetra. Nam in est ut eros mollis aliquam. Fusce sit amet sapien pulvinar, dapibus turpis nec, imperdiet nibh. Ut et lacus sed velit condimentum tincidunt. Vivamus in turpis suscipit, euismod quam quis, porta sem. Integer lectus elit, sodales id sagittis ut, consequat a nisl. Nullam ut orci id lacus vestibulum cursus. Maecenas consequat ac nulla quis euismod. Nullam lacinia, justo sed venenatis scelerisque, nibh magna lobortis tellus, a luctus quam est eget mauris. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>\r\n<p>Pellentesque libero justo, dignissim sit amet nulla luctus, maximus venenatis felis. Quisque sollicitudin dolor eu arcu vehicula ullamcorper. Fusce aliquet facilisis hendrerit. Sed mattis auctor leo, et volutpat augue. Duis pharetra eros ut tortor porta, in dictum metus lobortis. Nulla est arcu, rhoncus ac lobortis sed, ultrices ac neque. Aenean blandit mi ut malesuada venenatis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris ac ultricies neque, vitae condimentum sem. Suspendisse sed lorem in est sagittis elementum venenatis id quam. In cursus arcu eu lacus varius, ut mollis nisi auctor. Suspendisse tincidunt mattis diam ac pulvinar. Quisque dui arcu, dapibus a commodo sed, aliquet et diam.</p>\r\n<p>Pellentesque rutrum rhoncus ligula, ac dictum justo facilisis id. Suspendisse fermentum euismod ex in porttitor. Nulla pulvinar risus ac rhoncus bibendum. Phasellus at luctus ante. Vivamus id libero maximus, sagittis velit nec, interdum nulla. Nulla tincidunt, magna eget condimentum rhoncus, ipsum arcu faucibus nibh, sed tincidunt enim odio non metus. Phasellus justo elit, faucibus sit amet dictum in, laoreet vitae risus. Duis sem nibh, rutrum ut lorem vestibulum, posuere laoreet nisi. Quisque at elit pharetra, tempor enim sit amet, aliquam tellus.</p>\r\n<p>Sed accumsan quam ornare congue convallis. Mauris eget velit elementum, tempor ipsum vel, scelerisque arcu. Phasellus eget eleifend sapien, ut lobortis magna. Nam posuere lorem sit amet erat hendrerit accumsan. Morbi viverra rutrum nulla. Suspendisse pharetra viverra velit. Pellentesque lobortis nulla vitae ante eleifend dapibus quis eget metus. In nisi neque, consectetur eget mollis a, convallis sit amet leo.</p>','122d662601f0460dae09d342d39423bf.jpeg'),(12,1,NULL,'Przygoda na horyzoncie','2018-05-03 20:36:42','2013-01-01 00:00:00','Bohaterowie Azeroth na przygodzie w górach.','<p style=\"text-align: left;\">W najbliższym tygodniu ekipa z Dalaranu wyruszy na <strong>przygodę</strong>. W g&oacute;rach Beskidu Małego będą polować na <span style=\"text-decoration: line-through;\">hejter&oacute;w</span> trolle i <span style=\"text-decoration: underline;\">uspokjać żywioły.</span></p>\r\n<p>Ty także możesz dołaczyć do bohaterow Azeroth!</p>',''),(17,1,4,'Blacha wyklepany','2018-05-26 20:31:19','2018-05-03 00:00:00','<p>Klepał trup razy kilka, sklepali i trupa</p>','<p>Nie masz, ach nie masz już między nieżywymi Blachy, zwanego Fenrisem. Sklepany został po wsze czasy. Nikomu nie jest smutno z tego powodu.</p>','21fff55e48009b6be4fe3cbdecce58b0.jpeg'),(27,1,NULL,'rtgrtgt','2018-05-07 14:33:55','2018-05-07 14:33:55','<p>sddd</p>','<p>deded</p>',''),(28,1,NULL,'rtgrtgt','2018-05-07 14:39:10','2018-05-07 14:39:10','<p>sddd</p>','<p>deded</p>',''),(29,1,NULL,'rtgrtgt','2018-05-07 17:07:22','2018-05-07 14:48:05','<p>sddd</p>','<p>deded</p>',''),(30,2,NULL,'rtert','2018-05-09 15:11:53','2018-05-09 15:11:53','<p>fujyju</p>','<p>jfuyfj</p>',''),(31,1,NULL,'jtryyu','2018-05-09 15:12:04','2018-05-09 15:12:04','<p>tutyutuyutu</p>','<p>tutyutuyt</p>',''),(32,1,NULL,'ujyujyjuj','2018-05-09 15:12:16','2018-05-09 15:12:16','<p>yujyu</p>','<p>ujyyyyyyyyyyyyyyyy</p>',''),(33,2,3,'safsafalcon','2018-05-26 11:29:38','2018-05-15 20:36:51','<p>&nbsp;sadfasadfasfa</p>','<p>&nbsp;dsafasdfasfa</p>',''),(34,1,3,'asaad','2018-05-26 11:29:15','2018-05-26 00:03:44','<p>asdsadasdfasdasdasf</p>','<p>sadfasdfsadfsafsa</p>',''),(35,4,NULL,'asa','2018-05-26 20:15:02','2018-05-26 20:15:02','<p>sdasdasd</p>','<p>sdasda</p>','c23eb42c164db4f43e35a416c1505d44.jpeg'),(36,4,NULL,'Brazek','2018-05-26 22:09:38','2018-05-26 20:17:16','<p>O! Brazek!</p>','<p>Łololololo</p>','f415743f60a8f6a9cf8dfa337ebb5e45.jpeg'),(37,4,NULL,'Bezbraska','2018-05-26 22:53:27','2018-05-26 20:55:57','<p>dsadsa</p>','<p>sadsadas</p>','1793543c0adc0ef7f7ee02b03a0c29dd.jpeg');
/*!40000 ALTER TABLE `news` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `news_has_tags`
--

DROP TABLE IF EXISTS `news_has_tags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `news_has_tags` (
  `news_id` int(10) unsigned NOT NULL,
  `tag_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`news_id`,`tag_id`),
  KEY `IDX_7BDEEC28B5A459A0` (`news_id`),
  KEY `IDX_7BDEEC28BAD26311` (`tag_id`),
  CONSTRAINT `FK_7BDEEC28B5A459A0` FOREIGN KEY (`news_id`) REFERENCES `news` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_7BDEEC28BAD26311` FOREIGN KEY (`tag_id`) REFERENCES `tag` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `news_has_tags`
--

LOCK TABLES `news_has_tags` WRITE;
/*!40000 ALTER TABLE `news_has_tags` DISABLE KEYS */;
INSERT INTO `news_has_tags` VALUES (8,30),(8,33),(8,34),(9,31),(9,32),(10,26),(10,27),(10,28),(10,30),(10,32),(10,33),(10,34),(12,27),(17,26),(27,27),(27,34),(28,27),(28,34),(29,27),(29,34),(29,37),(33,27),(33,33),(33,43),(33,47),(33,49),(34,48),(34,49),(35,50),(36,51);
/*!40000 ALTER TABLE `news_has_tags` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `relationship`
--

DROP TABLE IF EXISTS `relationship`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `relationship` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `character_1` int(11) DEFAULT NULL,
  `character_2` int(11) DEFAULT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description_to_1` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description_to_2` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `visible_to_1` tinyint(1) NOT NULL,
  `visible_to_2` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_character_has_character_character2_idx` (`character_2`),
  KEY `fk_character_has_character_character1_idx` (`character_1`),
  CONSTRAINT `FK_200444A05D6F805F` FOREIGN KEY (`character_1`) REFERENCES `character` (`id`),
  CONSTRAINT `FK_200444A0C466D1E5` FOREIGN KEY (`character_2`) REFERENCES `character` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `relationship`
--

LOCK TABLES `relationship` WRITE;
/*!40000 ALTER TABLE `relationship` DISABLE KEYS */;
/*!40000 ALTER TABLE `relationship` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'USER'),(2,'ADMIN');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tag`
--

DROP TABLE IF EXISTS `tag`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tag` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tag`
--

LOCK TABLES `tag` WRITE;
/*!40000 ALTER TABLE `tag` DISABLE KEYS */;
INSERT INTO `tag` VALUES (26,'warcraft'),(27,'larp'),(28,'tak'),(29,'opowiadanie'),(30,'zgłoszenia'),(31,'crafting'),(32,'stroje'),(33,'Pyrkon'),(34,'foto'),(36,'zakochani po uszy'),(37,'lorem ipsum'),(38,'aaa'),(39,'c'),(40,'ad'),(41,'a'),(42,'fo'),(43,'frajerwerki'),(44,'Madzia'),(45,'adads'),(46,'sdad'),(47,'pumpernikiel'),(48,'sdsadasd'),(49,'llah'),(50,'sdsada'),(51,'O!');
/*!40000 ALTER TABLE `tag` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `text`
--

DROP TABLE IF EXISTS `text`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `text` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `parent_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `number` double NOT NULL,
  `content` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `img` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `img_description` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `text`
--

LOCK TABLES `text` WRITE;
/*!40000 ALTER TABLE `text` DISABLE KEYS */;
INSERT INTO `text` VALUES (1,'Czym jest larp?','what_is_larp',1,'<p>LARP (z ang. <em>live action role playing</em>&nbsp;– gra w&nbsp;odgrywanie ról na&nbsp;żywo) jest aktywnością, która doczekała się wielu definicji. Ze względu na&nbsp;różnorodność larpu, trudno określić, która z&nbsp;nich najbardziej trafnie go opisuje, dlatego przytoczę ich kilka, powołując się na&nbsp;różne źródła.</p>',NULL,NULL),(2,'Według Wikipedii','what_is_larp',2,'<p>W bodaj najpopularniejszym obecnie źródle internetowym – na&nbsp;Wikipedii – pod&nbsp;hasłem &bdquo;Live action role-playing&rdquo; czytamy:</p>\n<p>&bdquo;Aktywność na&nbsp;pograniczu gry i&nbsp;sztuki, podczas której uczestnicy wspólnie tworzą i&nbsp;przeżywają opowieść, odgrywając role podobnie do&nbsp;improwizowanego teatru. Akcja larpa może być osadzona zarówno w&nbsp;świecie rzeczywistym, jak&nbsp;i&nbsp;fikcyjnym.&rdquo;</p>',NULL,NULL),(3,'Czym larpy mogą się różnić?','types',1,'<p>Czym larpy mogą się od&nbsp;siebie r&oacute;żnić? Rzec by można, że&nbsp;praktycznie wszystkim. Oto przykładowe czynniki mogące być odmienne pomiędzy r&oacute;żnymi larpami:</p>\r\n<ul>\r\n<li>czas trwania &ndash; bywają larpy godzinne czy kilkugodzinne, ale także i&nbsp;wielodniowe,</li>\r\n<li>lokacja &ndash; czyli miejsce odbywania się wydarzenia (jest to określenie powszechnie używane w&nbsp;środowisku larpowym)</li>\r\n<li>ilość graczy &ndash; może ich być od&nbsp;kilku do&nbsp;nawet kilku tysięcy,</li>\r\n<li>świat przedstawiony (setting) &ndash; tu ogranicza nas jedynie wyobraźnia: może to być zar&oacute;wno świat realny (wsp&oacute;łczesny lub&nbsp;historyczny), jak&nbsp;i&nbsp;fantastyczny (wszelkie możliwe odmiany fantastyki),</li>\r\n<li>zasady (mechanika), kt&oacute;rej zagadnienie poruszę obszerniej w&nbsp;dalszej części pracy,</li>\r\n<li>obecność os&oacute;b nie będących graczami &ndash; w&nbsp;niekt&oacute;rych larpach występuje widownia, w&nbsp;niekt&oacute;rych nie,</li>\r\n<li>poziom określoności scenariusza &ndash; istnieją larpy o&nbsp;z&nbsp;g&oacute;ry ustalonym przez tw&oacute;rcę przebiegu części wydarzeń (choć nigdy w&nbsp;stu procentach) oraz takie, gdzie określona jest wyłącznie sytuacja wyjściowa, a&nbsp;dalsza fabuła tworzy się podczas wydarzenia,</li>\r\n<li>uczestnictwo graczy w&nbsp;określaniu świata i&nbsp;postaci &ndash; w&nbsp;niekt&oacute;rych larpach gracze mają np.&nbsp;możliwość wsp&oacute;łtworzenia swoich postaci, w&nbsp;innych otrzymują z&nbsp;g&oacute;ry określony opis swojej roli,</li>\r\n<li>poziom realizmu &ndash; wahający się od&nbsp;tzw. symulacjonizmu (nastawienie na&nbsp;jak&nbsp;najwierniejsze odtworzenie fikcyjnej rzeczywistości<a id=\"ftnt_ref7\" href=\"#ftnt7\"></a>, np.&nbsp;poprzez rozbudowaną scenografię, kostiumy i&nbsp;rekwizyty oraz wykonywanie każdej akcji przez graczy w&nbsp;pełni realistycznie) do&nbsp;symbolizmu (przeciwne podejście &ndash; całkowita umowność w&nbsp;przedstawianiu fikcyjnej rzeczywistości, skupienie raczej na&nbsp;grze aktorskiej)</li>\r\n</ul>\r\n<p>W związku z&nbsp;powyższymi r&oacute;żnicami możemy wyr&oacute;żnić wśr&oacute;d larp&oacute;w pewne kategorie. Nie stanowią one jednakże zbioru zamkniętego, a&nbsp;jedynie pewne rozr&oacute;żnienie stosowane popularnie w&nbsp;literaturze i&nbsp;środowisku larpowym.</p>',NULL,NULL),(4,'Larp terenowy','types',2,'<p>Larp terenowy (tzw. teren&oacute;wka) to wydarzenie odbywające się na&nbsp;otwartej przestrzeni. Zwykle charakteryzuje się dużą liczbą graczy (często od&nbsp;kilkudziesięciu do&nbsp;kilkuset) i&nbsp;sporą dbałością o&nbsp;kostiumy i&nbsp;scenografię. Podczas &bdquo;teren&oacute;wek&rdquo; popularnie używa się atrap broni do&nbsp;odwzorowania walk pomiędzy postaciami. Najczęściej larpy terenowe mają długi czas trwania (od&nbsp;kilkunastu godzin do&nbsp;kilku dni).</p>\r\n<p>Do larp&oacute;w terenowych należą takie imprezy jak&nbsp;OldTown Festival czy Battle Quest.</p>\r\n<h3 id=\"h.8roimf76w22l\">&nbsp;</h3>',NULL,NULL),(6,'Według Oxford Dictionaries','what_is_larp',3,'<p>W słowniku Oxfordu znajdziemy następujące wyjaśnienie hasła &bdquo;larp&rdquo;:</p>\r\n<p>Rodzaj gry w&nbsp;odgrywanie r&oacute;l podczas kt&oacute;rej uczestnicy fizycznie odgrywają scenariusze, zazwyczaj posługując się kostiumami oraz rekwizytami.</p>',NULL,NULL),(7,'Według KoLi','what_is_larp',4,'<p>Og&oacute;lnopolska Konferencja Larpowa &bdquo;KoLa&rdquo; prezentuje następującą definicję:</p>\r\n<p>&bdquo;Gra w&nbsp;larpy polega na&nbsp;wcielaniu się w&nbsp;postaci, podobnie jak&nbsp;w&nbsp;improwizowanym teatrze, oraz wsp&oacute;lnym tworzeniu i&nbsp;przeżywaniu opowieści, w&nbsp;kt&oacute;rej każdy uczestnik ma jakiś cel i&nbsp;rolę do&nbsp;odegrania.&rdquo;</p>',NULL,NULL),(8,'Według Dominika Dembińskiego','what_is_larp',5,'<p>Dominik Dembiński, uznany polski tw&oacute;rca larp&oacute;w z&nbsp;organizacji &bdquo;Liveform&rdquo; podaje własną, tym razem bardzo kr&oacute;tką, definicję:</p>\r\n<p>&bdquo;Wydarzenie społeczne, kt&oacute;rego uczestnicy wcielają się w&nbsp;role.&rdquo;</p>',NULL,NULL),(9,'Według Dogma99','what_is_larp',6,'<p>Jako ostatnią przytoczę definicję proponowaną przez norweski manifest larpowy z&nbsp;1999 roku znany pod&nbsp;nazwą &bdquo;Dogma99&rdquo;:</p>\r\n<p>&bdquo;Larp jest spotkaniem ludzi, kt&oacute;rzy poprzez swoje role odnoszą się do&nbsp;siebie nawzajem w&nbsp;fikcyjnym świecie.&rdquo;</p>',NULL,NULL),(10,'Pisownia','what_is_larp',7,'<p>W tym miejscu pozwolę sobie jeszcze na&nbsp;drobną uwagę dotyczącą pisowni. Jak&nbsp;wyjaśniono na&nbsp;początku niniejszej pracy, akronim LARP pochodzi od&nbsp;angielskiego wyrażenia live acting role playing. Na&nbsp;Konferencji Larpowej w&nbsp;2013 r. we Wrocławiu przyjęto pisownię &bdquo;larp&rdquo; w&nbsp;języku polskim &ndash; z&nbsp;małej litery jako rzeczownik pospolity. W&nbsp;roku 2014 Rada Języka Polskiego zaaprobowała taką pisownię<sup><a id=\"ftnt_ref4\" href=\"http://wierzba.wzks.uj.edu.pl/~15_kubala/licencjat/esej-larp.html#ftnt4\">[4]</a></sup>. W&nbsp;tej formie zdecydowałem się r&oacute;wnież używać pojęcia larpa w&nbsp;niniejszej pracy.</p>',NULL,NULL),(11,'Z czego składa się larp?','what_is_larp',8,'<p>Jak widać z&nbsp;powyższych definicji, larp jest sam w&nbsp;sobie pojęciem niejednorodym. Podsumowując powyższe definicje, możemy stwierdzić, że&nbsp;aby zaistniał larp, muszą pojawić się:</p>\r\n<ul>\r\n<li>gracze &ndash; ludzie istniejący w&nbsp;realnym świecie, biorący udział w&nbsp;larpie</li>\r\n<li>postacie &ndash; role odgrywane przez graczy w&nbsp;ramach świata przedstawionego, przy czym istnieje tożsamość ciała gracza i&nbsp;postaci</li>\r\n<li>zbi&oacute;r zasad</li>\r\n<li>określony początek</li>\r\n<li>brak sztywnego scenariusza</li>\r\n</ul>\r\n<p>Jak widać, mogą pojawić się r&oacute;żnice w&nbsp;takich kwestiach jak&nbsp;np.&nbsp;użycie kostium&oacute;w, rekwizyt&oacute;w, świat przedstawiony i&nbsp;cele do&nbsp;odegrania, istnieje jednak kilka cech jednoczących larpy jako pewnego rodzaju gatunek aktywności tw&oacute;rczej.</p>',NULL,NULL),(12,'Jak wygląda larp?','what_is_larp',9,'<p>Jak to wygląda w&nbsp;praktyce? Prześledźmy przebieg przykładowego larpa, w&nbsp;jakim może wziąć udział zainteresowana osoba.</p>\r\n<ol start=\"1\">\r\n<li>Zgłoszenie się na&nbsp;wydarzenie (organizowane przez określoną osobę lub&nbsp;grupę os&oacute;b) &ndash; nierzadko wiąże się z&nbsp;opłatą wpisowego.</li>\r\n<li>Zapoznanie się z&nbsp;realiami &ndash; np.&nbsp;settingiem czy mechaniką danego larpa (zob. pojęcia w&nbsp;dalszej części pracy).</li>\r\n<li>Otrzymanie karty postaci &ndash; często uczestnik otrzymuje swoją rolę w&nbsp;formie spisanej karty, z&nbsp;opisem np.&nbsp;charakteru postaci, jej cel&oacute;w oraz posiadanych informacji.</li>\r\n<li>Charakteryzacja &ndash; nie we wszystkich larpach, często jednak mamy do&nbsp;czynienia z&nbsp;kostiumami i&nbsp;rekwizytami.</li>\r\n<li>Rozpoczęcie larpa &ndash; gracze &bdquo;zmieniają się&rdquo; z&nbsp;siebie w&nbsp;odgrywane postacie, czyli zaczynają się zachowywać i&nbsp;odnosić do&nbsp;siebie nawzajem na&nbsp;zasadach wynikających ze świata przedstawionego.</li>\r\n<li>Interakcja z&nbsp;innymi graczami odgrywającymi swoje role.</li>\r\n<li>Zakończenie (gracze zn&oacute;w &bdquo;stają się&rdquo; sobą) i&nbsp;om&oacute;wienie larpa</li>\r\n</ol>',NULL,NULL),(13,'Chamber','types',3,'<p>Chamber (zwany także chamberlarp lub&nbsp;pokoj&oacute;wka) jest rodzajem larpa odbywającym się w&nbsp;zamkniętej przestrzeni (zwykle jedno lub&nbsp;kilka pomieszczeń). Charakteryzuje się małą liczbą graczy (średnio kilkunastu) i&nbsp;kr&oacute;tkim (kilka godzin) czasem trwania.</p>\r\n<p>Jest to rodzaj larpa popularny szczeg&oacute;lnie w&nbsp;dużych miastach oraz na&nbsp;konwentach fantastycznych (kilkudniowych spotkaniach fan&oacute;w fantastyki). Zgłoszenia na&nbsp;wydarzenie mogą odbywać się na&nbsp;dłuższy czas przed chamberem lub&nbsp;praktycznie w&nbsp;dzień imprezy. Co za tym idzie, &bdquo;pokoj&oacute;wki&rdquo; rozgrywają się bądź to z&nbsp;bardzo rozbudowaną, bądź zupełnie minimalistyczną scenografią i&nbsp;kostiumami. Postacie i&nbsp;realia są najczęściej ustalone i&nbsp;przygotowane przez tw&oacute;rcę chambera.</p>\r\n<p>Przykładami chamber&oacute;w mogą być larpy odbywające się na&nbsp;konwentach i&nbsp;festiwalach, takich jak&nbsp;np.&nbsp;Pyrkon, Polcon czy Copernicon.</p>',NULL,NULL),(14,'Freeform','types',4,'<p>Chamber (zwany także chamberlarp lub&nbsp;pokoj&oacute;wka) jest rodzajem larpa odbywającym się w&nbsp;zamkniętej przestrzeni (zwykle jedno lub&nbsp;kilka pomieszczeń). Charakteryzuje się małą liczbą graczy (średnio kilkunastu) i&nbsp;kr&oacute;tkim (kilka godzin) czasem trwania.</p>\r\n<p>Jest to rodzaj larpa popularny szczeg&oacute;lnie w&nbsp;dużych miastach oraz na&nbsp;konwentach fantastycznych (kilkudniowych spotkaniach fan&oacute;w fantastyki). Zgłoszenia na&nbsp;wydarzenie mogą odbywać się na&nbsp;dłuższy czas przed chamberem lub&nbsp;praktycznie w&nbsp;dzień imprezy. Co za tym idzie, &bdquo;pokoj&oacute;wki&rdquo; rozgrywają się bądź to z&nbsp;bardzo rozbudowaną, bądź zupełnie minimalistyczną scenografią i&nbsp;kostiumami. Postacie i&nbsp;realia są najczęściej ustalone i&nbsp;przygotowane przez tw&oacute;rcę chambera.</p>\r\n<p>Przykładami chamber&oacute;w mogą być larpy odbywające się na&nbsp;konwentach i&nbsp;festiwalach, takich jak&nbsp;np.&nbsp;Pyrkon, Polcon czy Copernicon.</p>',NULL,NULL),(15,'Jeepform','types',5,'<p>Duński rodzaj freeform&oacute;w nastawiony na&nbsp;łamanie zasad w&nbsp;konstrukcji gier. W&nbsp;jeepformie prowadzący (pełniący jakby funkcję &bdquo;reżysera&rdquo;) wsp&oacute;lnie z&nbsp;uczestnikami (aktorami) opowiada jakąś historię. Ten rodzaj larp&oacute;w nie wymaga żadnych dekoracji i&nbsp;rekwizyt&oacute;w, a&nbsp;nawet unika ich, aby nie krępować wyobraźni uczestnik&oacute;w. Łamie się klasyczne zasady jedności czasu, miejsca i&nbsp;akcji, a&nbsp;pojedyncza postać w&nbsp;r&oacute;żnych scenach może być grana przez r&oacute;żnych graczy.</p>',NULL,NULL),(16,'Larp anglosaski czy nordyckie?','types',6,'<p>Jeszcze jednym rozr&oacute;żnieniem, występującym w&nbsp;larpowej literaturze jest podział na&nbsp;larpy nordyckie (bądź skandynawskie) i&nbsp;anglosaskie. Nazwy te biorą się od&nbsp;region&oacute;w, gdzie te rodzaje larp&oacute;w są najpopularniejsze.</p>\r\n<p>&nbsp;</p>\r\n<p>Larpy anglosaskie nastawione są przede wszystkim na&nbsp;rozrywkę i&nbsp;wsp&oacute;łzawodnictwo między graczami, a&nbsp;fabuła zorientowana jest na&nbsp;osiągnięcie przez graczy swoich indywidualnych cel&oacute;w (najczęściej sprzecznych z&nbsp;innymi graczami) przy użyciu sprytu, zdolności fizycznych czy perswazji. Co za tym idzie, sekrety poszczeg&oacute;lnych postaci są trzymane w&nbsp;sekrecie przed innymi graczami, często występuje też walka atrapami broni. Na&nbsp;larpach anglosaskich najczęściej dozwolone jest odbieganie od&nbsp;fabuły &bdquo;na stronie&rdquo;, czyli chwilowe zaprzestanie odgrywania roli (tzw. offtop).</p>\r\n<p>Larpy nordyckie, w&nbsp;przeciwieństwie do&nbsp;powyższych, kładą nacisk na&nbsp;wartość artystyczną i&nbsp;wczucie w&nbsp;postać. Powoduje to znaczną ich teatralność i&nbsp;emocjonalność oraz dopracowane kostiumy i&nbsp;scenografię.<sup><a id=\"ftnt_ref29\" href=\"http://wierzba.wzks.uj.edu.pl/~15_kubala/licencjat/esej-larp.html#ftnt29\">[29]</a></sup>&nbsp;Walka i&nbsp;mechanika sprowadzają się najczęściej do&nbsp;minimum, a&nbsp;utrzymywanie cel&oacute;w postaci w&nbsp;tajemnicy przed graczami nie jest koniecznością. Na&nbsp;larpach nordyckich przeważnie unika się wychodzenia z&nbsp;roli nawet na&nbsp;chwilę.</p>',NULL,NULL),(17,'Larpowa terminologia','terms',1,'<p>Jako zupełnie odrębna dziedzina aktywności, a&nbsp;także obiekt badań naukowych i&nbsp;ciągłych poszukiwań, larpy wytworzyły pewien zas&oacute;b słownictwa, używany przez środowiska ich pasjonat&oacute;w i&nbsp;badaczy. Poniżej postaram się wyjaśnić najważniejsze z&nbsp;nich.</p>',NULL,NULL),(18,'Gracz a postać','terms',2,'<p>Kluczowym dla zrozumienia idei larpa jest rozr&oacute;żnienie gracza i&nbsp;postaci. Graczem jest realnie istniejący człowiek, biorący udział w&nbsp;wydarzeniu. Pełni on jednocześnie funkcję reżysera, aktora i&nbsp;widza. Postać to rola odgrywana przez gracza. Możemy określić ją jako zbi&oacute;r pewnych cech i&nbsp;informacji, określający spos&oacute;b odnoszenia się gracza do&nbsp;innych graczy w&nbsp;ramach świata przedstawionego<sup>.</sup> Gracz powinien rozr&oacute;żniać cechy i&nbsp;wiedzę, kt&oacute;re posiada on, od&nbsp;tych posiadanych przez jego postać (zwłaszcza jeśli wie rzeczy, kt&oacute;rych jego postać nie ma prawa wiedzieć). z&nbsp;drugiej jednak strony, celem larpa najczęściej jest nie udawanie danej postaci, a&nbsp;faktyczne &bdquo;stawanie się&rdquo; nią, gra w&nbsp;tożsamość, a&nbsp;nie granie r&oacute;l. Z tym zagadnieniem wiąże się ściśle pojęcie immersji.</p>',NULL,NULL),(19,'Immersja','terms',3,'<p>Immersją (z łac. <em>immergo</em>&nbsp;&ndash; zanurzam) nazywa się w&nbsp;larpach stan wczucia się w&nbsp;świat przedstawiony lub&nbsp;utożsamienie z&nbsp;odgrywaną postacią. Im większa immersja, tym silniejsze wrażenie realizmu odgrywanej postaci, świata oraz fabuły. Stan wysokiej immersji jest najczęściej sytuacja bardzo w&nbsp;larpie pożądaną, a&nbsp;niekiedy wręcz jego celem (zwłaszcza w&nbsp;larpach nordyckich). Budowaniu immersji służą kostiumy, rekwizyty i&nbsp;dekoracje, ale także czas, dobra konstrukcja scenariusza, zaangażowanie uczestnika czy poziom jego zmęczenia.</p>',NULL,NULL),(20,'Bleed','terms',4,'<p>Zjawisko bleedu (z ang. krwawienie) jest powiązane z&nbsp;immersją i&nbsp;oznacza sytuację przenikania się cech i&nbsp;emocji postaci i&nbsp;gracza. Występuje, gdy zaciera się granica między graczem a&nbsp;odgrywaną rolą. Wyr&oacute;żniamy:</p>\r\n<ul>\r\n<li>bleed in &ndash; z&nbsp;gracza na&nbsp;postać (np.&nbsp;postać odgrywana przez zaspanego gracza najprawdopodobniej r&oacute;wnież będzie zaspana),</li>\r\n<li>bleed out &ndash; z&nbsp;postaci na&nbsp;gracza (np.&nbsp;jeśli dana postać będzie notorycznie znieważana przez inną, to istnieje ryzyko że&nbsp;gracz odgrywający ją będzie odczuwać negatywne emocje w&nbsp;stosunku do&nbsp;gracza odgrywającego jej antagonistę)</li>\r\n</ul>',NULL,NULL),(21,'Mechanika','terms',5,'<p>Mechaniką nazywamy zbi&oacute;r narzędzi pozwalających graczom uzupełnić świat przedstawiony w&nbsp;larpie o&nbsp;elementy nie dające się odtworzyć w&nbsp;pełni ze względu na&nbsp;prawa fizyki, zasady bezpieczeństwa, prawo, możliwości techniczne lub&nbsp;jakiekolwiek inne ograniczenia.&nbsp;Przykładami takich element&oacute;w mogą być: magia, walka, zaawansowana technologia, seks, skrajne wycieńczenie czy śmierć postaci. Stosowane w&nbsp;takich przypadkach mechaniki mogą obejmować np.&nbsp;walkę atrapami broni, mini-gry (np.&nbsp;w&nbsp;kości lub&nbsp;kamień-papier-nożyce) do&nbsp;rozsądzania spornych sytuacji czy rzucanie zaklęć poprzez krzyczenie ich formuł i&nbsp;odgrywanie gest&oacute;w towarzyszących ich rzuceniu. Nierzadko jednak zamiast rozbudowanej mechaniki stosuje się mechaniki minimalistyczne, np.&nbsp;DKWDDK (z niem. Du Kannst Was Du Darstellen Kannst&nbsp;&ndash; potrafisz to, co potrafisz pokazać) lub&nbsp;DKWDK (z niem. Du Kannst Was Du Kannst&nbsp;&ndash; potrafisz to, co potrafisz), ograniczające umiejętności postaci do&nbsp;umiejętności posiadanych przez gracza, bądź takich, kt&oacute;re gracz potrafi odegrać.</p>\r\n<p>Prawie zawsze nad przebiegiem rozgrywki czuwa osoba tzw. mistrza gry (bądź kilku), kt&oacute;ry rozstrzyga sporne kwestie, decyduje w&nbsp;kwestiach wynikających z&nbsp;mechaniki i&nbsp;odpowiada na&nbsp;ewentualne pozafabularne pytania graczy.</p>\r\n<p>Jeśli mowa o&nbsp;mechanice, warto pokusić się o&nbsp;pewien komentarz. Można natknąć się zar&oacute;wno na&nbsp;larpy o&nbsp;mechanice niezwykle rozbudowanej, jak&nbsp;i&nbsp;takie, gdzie jest ona ograniczona do&nbsp;minimum. Dob&oacute;r mechaniki zależy od&nbsp;tw&oacute;rcy i&nbsp;powinien być podyktowany celem gry. Nie każda gra fabularna jest zorientowana na&nbsp;osiągnięcia tego samego. W&nbsp;1997 roku John H. Kim stworzył teorię zwaną &bdquo;The Threefold Model&rdquo;, według kt&oacute;rej można podzielić je na&nbsp;3 kategorie:</p>\r\n<ul>\r\n<li>&bdquo;Game&rdquo; &ndash; celem gry jest umożliwienie graczom wsp&oacute;łzawodnictwa z&nbsp;innymi poprzez spryt, taktyczne myślenie, umiejętności fizyczne itp.</li>\r\n<li>&bdquo;Drama&rdquo; &ndash; celem gry jest stworzenie jak&nbsp;najciekawszej historii o&nbsp;dobrej fabule i&nbsp;głębokim znaczeniu.</li>\r\n<li>&bdquo;Simulation&rdquo; &ndash; celem gry jest jak&nbsp;najwierniejsze odtworzenie świata przedstawionego, zadbanie o&nbsp;sp&oacute;jność wydarzeń i&nbsp;ich wiarygodność<br />w realiach świata przedstawionego.</li>\r\n</ul>\r\n<p>Jak nietrudno się domyślić, rozbudowana mechanika będzie towarzyszyć grom szczeg&oacute;lnie pierwszego typu.</p>',NULL,NULL),(22,'Bezpieczna broń','terms',6,'<p>W celu zasymulowania walk pomiędzy graczami, na&nbsp;wielu larpach stosuje się atrapy broni. W&nbsp;przypadku broni białej są to tzw. &bdquo;otuliniaki&rdquo;, czyli broń wykonana z&nbsp;tworzywa sztucznego (polipropylen owinięty otuliną bądź lateks). Broń palna zastępowana jest najczęściej przy pomocy ASG (z ang. <em>air soft gun</em>) &ndash; broni wystrzeliwującej plastikowe kulki przy pomocy sprężonego powietrza</p>',NULL,NULL),(23,'Wstążki i słowa bezpieczeństwa','terms',7,'<p>Ważnym elementem mechanik larpowych, stosowanym obecnie w&nbsp;wielu larpach, są tzw. słowa i&nbsp;wstążki bezpieczeństwa, stworzone w&nbsp;celu zagwarantowania graczom komfortu i&nbsp;bezpieczeństwa. Niekiedy w&nbsp;toku interakcji pomiędzy postaciami dochodzi do&nbsp;sytuacji, kt&oacute;re przestają być komfortowe dla odgrywających je graczy (np.&nbsp;przedstawiające przemoc bądź zbliżenie fizyczne). Aby przekazać innemu graczowi komunikat dotyczący swojego komfortu w&nbsp;odgrywanej sytuacji (bez konieczności wychodzenia z&nbsp;granej roli), gracz może użyć jednego ze sł&oacute;w bezpieczeństwa:</p>\r\n<ul>\r\n<li>&bdquo;Red&rdquo; &ndash; jest prośbą o&nbsp;natychmiastowe przerwanie odgrywanej sceny i&nbsp;rozejście się,</li>\r\n<li>&bdquo;Yellow&rdquo; &ndash; jest prośbą o&nbsp;nieco łagodniejsze odgrywanie roli bądź nie zwiększanie zaangażowania,</li>\r\n<li>&bdquo;Green&rdquo; &ndash; jest natomiast prośbą o&nbsp;nie krępowanie się i&nbsp;intensywniejsze odgrywanie sceny</li>\r\n</ul>\r\n<p>Pr&oacute;cz tego, czasami jeszcze przed rozpoczęciem larpa poleca się graczom przypięcie wstążki w&nbsp;określonym kolorze, określającej ich preferencje co&nbsp;do&nbsp;interakcji z&nbsp;innymi graczami. Wstążki oznaczają kolejno:</p>\r\n<ul>\r\n<li>czerwona &ndash; gracz nie życzy sobie jakiegokolwiek dotyku ze strony pozostałych</li>\r\n<li>ż&oacute;łta &ndash; gracz akceptuje tylko takie interakcje, kt&oacute;re nie narażają jego komfortu</li>\r\n<li>zielona &ndash; gracz jest got&oacute;w na&nbsp;wszystkie interakcje</li>\r\n</ul>\r\n<p>Do dobrego tonu należy respektowanie powyższych komunikat&oacute;w bez żądania dodatkowych wyjaśnień.</p>',NULL,NULL),(24,'Setting','terms',8,'<p>Setting jest pojęciem oznaczającym czas i&nbsp;miejsce narracji &ndash; realia świata przedstawionego. Może on być zar&oacute;wno rzeczywisty (wsp&oacute;łczesny lub&nbsp;historyczny) jak&nbsp;i&nbsp;fikcyjny. Właściwie jedynie wyobraźnia tw&oacute;rcy ogranicza możliwości eksperymentowania z&nbsp;rozmaitymi możliwościami osadzenia akcji. Dużym powodzeniem cieszą się settingi inspirowane klasykami fantasy (np.&nbsp;oparte na&nbsp;dziełach J.R.R. Tolkiena lub&nbsp;grach z&nbsp;serii Warhammer). Opr&oacute;cz tego, można spotkać wiele larp&oacute;w w&nbsp;settingach science-fiction lub&nbsp;historycznych. Spotkać można r&oacute;wnież larpy z&nbsp;akcją osadzoną we wsp&oacute;łczesnym, rzeczywistym świecie.</p>',NULL,NULL),(25,'Wstęp do historii','history',1,'<p>W celu przeanalizowania powiązań larp&oacute;w z&nbsp;innymi zjawiskami, pomocne będzie nam prześledzenie historii tego nurtu. Jak&nbsp;się okazuje, trudno określić w&nbsp;niej konkretny początek, ze względu na&nbsp;dość luźne granice tego pojęcia. Larpy bowiem mają swoich przodk&oacute;w w&nbsp;wielu innych zjawiskach kultury.</p>',NULL,NULL),(26,'Larpowa prehistoria','history',2,'<p>Na długo zanim ktokolwiek wymyślił nazwę &bdquo;larp&rdquo;, ludzie bawili się w&nbsp;odgrywanie r&oacute;l. W&nbsp;zasadzie można przyjąć, że&nbsp;dzieje się to od&nbsp;zarania ludzkości &ndash; już prehistoryczne dzieci najprawdopodobniej bawiły się w&nbsp;polowanie, odgrywając role swoich rodzic&oacute;w zdobywających pożywienie.</p>\r\n<p>Spośr&oacute;d r&oacute;żnorakich zjawisk w&nbsp;historii, kt&oacute;re w&nbsp;jakimś sensie wpłynęły na&nbsp;powstanie larp&oacute;w, warto wymienić choć kilka.</p>\r\n<ul>\r\n<li>Naumachia &ndash; inscenizacje bitew morskich w&nbsp;rzymskich amfiteatrach można w&nbsp;jakimś sensie uznać za pierwsze larpy bitewne. Skazańcy, biorący najczęściej udział w&nbsp;takich &bdquo;przedstawieniach&rdquo; wcielali się w&nbsp;role marynarzy wrogich flotylli, zaś przebieg i&nbsp;wynik bitwy nie był z&nbsp;początku znany. Oczywiście, w&nbsp;por&oacute;wnaniu z&nbsp;dzisiejszymi larpami bitewnymi, był to dosyć brutalny rodzaj zabawy &ndash; uczestnicy nie brali w&nbsp;niej udziału dobrowolnie i&nbsp;przeważnie wszyscy ginęli.</li>\r\n<li>Commedia dell&rsquo;arte &ndash; powstała w&nbsp;XVI wieku we Włoszech forma teatralna wprowadzała innowację: improwizację aktor&oacute;w. Podlegała ona pewnym ograniczeniom &ndash; punktem wyjścia był scenariusz. Improwizacja w&nbsp;teatrze na&nbsp;większą skalę powr&oacute;ciła dopiero w&nbsp;XX wieku, stanowiąc część genezy larp&oacute;w<sup>.</sup></li>\r\n<li>Kriegsspiel &ndash; wielokrotnie w&nbsp;historii używano gier z&nbsp;odgrywaniem r&oacute;l w&nbsp;celach edukacyjnych i&nbsp;ćwiczebnych. W&nbsp;1812 roku do&nbsp;szkolenia oficer&oacute;w w&nbsp;armii pruskiej wprowadzono narzędzie nazywane Kriegsspiel, kt&oacute;re możemy uznać za pierwowz&oacute;r wsp&oacute;łczesnych stołowych gier bitewnych. Z&nbsp;początku używano rozbudowanego systemu zasad stworzonego przez Georga von Reiswitza, jednak był on niewygodny, a&nbsp;starcia trwały bardzo długo. Dlatego w&nbsp;1876 roku, gen. Julius von Verdy du Vernois wpadł na&nbsp;pomysł odejścia od&nbsp;sztywnych zasad i&nbsp;powierzenia decyzji o&nbsp;rozstrzygnięciach akcji na&nbsp;planszy w&nbsp;ręce doświadczonego oficera pełniącego funkcję mistrza gry. Pozwoliło to na&nbsp;zmniejszenie liczby zasad i&nbsp;przyspieszenie rozgrywki. Pruskie gry bitewne można więc uznać za gry z&nbsp;wcielaniem się w&nbsp;rolę, gdzie przebieg rozgrywki zależy od&nbsp;decyzji graczy i&nbsp;mistrza gry.</li>\r\n</ul>',NULL,NULL),(27,'Początki larpów w XX wieku','history',3,'<p>Przejdźmy do&nbsp;XX wieku, kt&oacute;ry zapisał się w&nbsp;historii jako wiek narodzin larpa. Od&nbsp;początku stulecia pojawiają się zjawiska, coraz bardziej przypominające larpy znane dziś.</p>\r\n<p>W latach 20. amerykański psychoterapeuta Jacob L. Moreno tworzy metodę zwaną psychodrama. W&nbsp;tej stosowanej do&nbsp;dziś metodzie, uczestnicy odgrywają zaimprowizowane sytuacje, wcielając się w&nbsp;role. Rozegranie w&nbsp;bezpiecznych warunkach sytuacji trudnej i&nbsp;problemowej, pozwala na&nbsp;lepsze zrozumienie siebie i&nbsp;innych oraz poradzenie sobie z&nbsp;trudnościami psychicznymi.<br />W 1941 magazyn Life opisuje klub organizujący spotkania, na&nbsp;kt&oacute;rych gracze wcielają się w&nbsp;role władc&oacute;w fikcyjnej planety Atzor. Choć nie wiadomo, czy klub ten istniał rzeczywiście, według artykułu miał zrzeszać ok. 400 młodych mieszkańc&oacute;w Nebraski, używających do&nbsp;swojego hobby kostium&oacute;w, figurek żołnierzy, waluty, a&nbsp;nawet słownika opisującego język planety Atzor<sup>.</sup></p>\r\n<p>Kolejnym ciekawym z&nbsp;punktu widzenia historii larp&oacute;w wydarzeniem było powstanie w&nbsp;Kalifornii w&nbsp;1966 roku Towarzystwa Kreatywnego Anachronizmu. Grupa student&oacute;w, z&nbsp;początku planująca zorganizować tylko jednorazowy turniej rycerski, częściowo dla zabawy, a&nbsp;częściowo jako rodzaj buntu wobec szarej, wsp&oacute;łczesnej rzeczywistości, przerodziła się w&nbsp;istniejąca do&nbsp;dziś organizację, odgrywającą alternatywną wersję historii średniowiecznej.<br />Kamieniem milowym w&nbsp;historii gier fabularnych było powstanie systemu RPG Dungeons &amp; Dragons w&nbsp;1974 roku, przez wielu uważanego za prekursora gatunku. I choć nieodłączny związek larp&oacute;w z&nbsp;grami RPG (zwłaszcza w&nbsp;Polsce) jest coraz częściej kwestionowany, jednak w&nbsp;skali globalnej trudno nie zauważyć wpływu tego wydarzenia na&nbsp;larpy.</p>',NULL,NULL),(28,'Pierwsze pełnoprawne larpy','history',4,'<p>Wymieniliśmy już wiele zalążk&oacute;w i&nbsp;zjawisk pokrewnych, jednak co można uznać za pierwszy pełnoprawny larp rozegrany na&nbsp;świecie? Cytując książkę Lizzie Stark, poruszającą to zagadnienie:</p>\r\n<p>&bdquo;Nie ma pojedynczego &laquo;larpa-matki&raquo;, kt&oacute;ry rozpocząłby manię; zamiast tego wyrosła, niczym jakaś oddolna kampania polityczna, dzięki ludziom w&nbsp;r&oacute;żnych częściach USA i&nbsp;poza nimi, kt&oacute;rzy spontanicznie postanowili okładać swoich przyjaci&oacute;ł plastikowymi patykami w&nbsp;przydomowych ogr&oacute;dkach.&rdquo;</p>\r\n<p>Jeśli już musielibyśmy określić jedno konkretne wydarzenie, najtrafniejszym wyborem będzie prawdopodobnie gra &bdquo;Hobbit Wars&rdquo; z&nbsp;1977 roku. Brian Wiese zorganizował w&nbsp;stanie Maryland grę typu &bdquo;Capture the flag&rdquo; w&nbsp;strojach i&nbsp;z&nbsp;otulinową bronią. Gra przerodziła się p&oacute;źniej w&nbsp;coroczną grę terenową &bdquo;Dagorhir&rdquo;, rozgrywaną do&nbsp;dziś w&nbsp;USA.<br />W 1981 roku larp zawitał do&nbsp;Europy. Odbył się w&oacute;wczas pierwszy (pomijając r&oacute;żnorakie wcześniejsze eksperymenty) larp w&nbsp;Wielkiej Brytanii: Treasure Trap na&nbsp;zamku Peckforton, oparty na&nbsp;systemie Dungeons &amp; Dragons.</p>\r\n<p>Kolejną wartą odnotowania datą jest rok 1991, kiedy to wydawnictwo White Wolf wydało system RPG &bdquo;Vampire: the Masquerade&rdquo;. System ten stał się bazą do&nbsp;wielu larp&oacute;w, zar&oacute;wno na&nbsp;świecie, jak&nbsp;i&nbsp;w&nbsp;Polsce (tzw. larpy wampirze). Charakteryzowały się one obecnością stroj&oacute;w oraz wieloodcinkową fabułą.</p>\r\n<p>Kamieniem milowym, zwłaszcza jeśli chodzi o&nbsp;larpy nordyckie, stała się konferencja Knutepunkt, pierwszy raz mająca miejsce w&nbsp;1997 roku w&nbsp;Oslo. Skandynawowie przekuli anglosaską młodzieżową zabawę w&nbsp;nowy rodzaj sztuki, poszukiwania emocji i&nbsp;ekspresji. Zapoczątkowali także dyskusję i&nbsp;badania naukowe dotyczące larp&oacute;w. Konferencja Knutepunkt stała się miejscem spotkań środowiska larpowego najpierw ze Skandynawii, a&nbsp;p&oacute;źniej r&oacute;wnież z&nbsp;wielu innych kraj&oacute;w. Do dziś ma ona ważny wpływ na&nbsp;larpy na&nbsp;całym świecie.</p>',NULL,NULL),(29,'Larpy w Polsce','history',5,'<p>W latach 80. Polska zaraziła się od&nbsp;reszty świata fascynacją fantastyką. W&nbsp;1982 roku miał swoją premierę miesięcznik &bdquo;Fantastyka&rdquo;. Zaczynały działać kluby miłośnik&oacute;w gatunku, organizowano pierwsze konwenty, powoli rosło zainteresowanie grami fabularnymi. W&nbsp;1989 roku, podczas konwentu Kontur w&nbsp;Supraślu, miała miejsce gra terenowa (uważana za pierwszego polskiego larpa), zorganizowana przez związanych z&nbsp;konwentem harcerzy.&nbsp;Gra przypominała typowe gry harcerskie, miała liniową fabułę i&nbsp;nie obejmowała interakcji pomiędzy drużynami, za to odbywała się w&nbsp;strojach i&nbsp;z&nbsp;rekwizytami, a&nbsp;gracze odgrywali rolę poszukiwaczy przyg&oacute;d w&nbsp;realiach klasycznego fantasy. W&nbsp;tym samym roku, na&nbsp;konwencie Stalkon w&nbsp;Olsztynie, odbył się chamberlarp inspirowany tw&oacute;rczością S. Lema i&nbsp;J. Natansona.</p>\r\n<p>Kolejne lata przyniosły nowe larpy, a&nbsp;rok 1991 rewolucję, jeśli chodzi o&nbsp;mechanikę i&nbsp;zasady. Gry &bdquo;Smocze jajo&rdquo; na&nbsp;świeżo powstałym konwencie larpowym Orkon oraz &bdquo;Święty Graal&rdquo; na&nbsp;Konturze wprowadzały nieliniowość fabuły oraz interakcje między graczami. W&nbsp;1991 roku na&nbsp;Konturze, a&nbsp;kilka lat p&oacute;źniej na&nbsp;Orkonie&nbsp;wprowadzono bezpieczną broń. W&nbsp;latach 90. odbywało się już w&nbsp;Polsce kilka konwent&oacute;w z&nbsp;larpami. Z&nbsp;każdym rokiem zdobywały one coraz szersze rzesze wielbicieli i&nbsp;uczestnik&oacute;w. Lawina ruszyła.</p>',NULL,NULL),(30,'Gdzie dziś zagrać w larpa?','in_poland',1,'<p>Środowisko larpowe w&nbsp;Polsce wciąż się rozrasta. W&nbsp;większości dużych miast działają grupy organizujące tego rodzaju wydarzenia, cyklicznie odbywają się mniejsze lub&nbsp;większe konwenty fantastyczne. W&nbsp;coraz większej ilości miejsc można wziąć udział w&nbsp;larpie. Przyjrzyjmy się obecnej sytuacji larp&oacute;w w&nbsp;Polsce.</p>\r\n<p>&nbsp;</p>',NULL,NULL),(31,'Grupy larpowe','in_poland',2,'<p>Według mapy stworzonej przez polskie środowisko larpowe, w&nbsp;naszym kraju działa obecnie około 100 grup larpowych.<sup><a id=\"ftnt_ref25\" href=\"http://wierzba.wzks.uj.edu.pl/~15_kubala/licencjat/esej-larp.html#ftnt25\">[25]</a></sup>&nbsp;w&nbsp;większości miast wojew&oacute;dzkich działa przynajmniej jedna grupa. Najwięcej można ich znaleźć na&nbsp;Śląsku.</p>\r\n<p>W Krakowie działają: Larpownia, Creatio ex Nihilo, Czarostoja, Krakowska Sieć Fantastyki, Krąg Mieczy, Fundacja Budzenie Pasji, a&nbsp;także od&nbsp;niedawna grupa Citizens of Dalaran, kt&oacute;rej poświęcony jest serwis związany z&nbsp;niniejszą pracą.</p>',NULL,NULL),(32,'Konwenty fantastyki','in_poland',3,'<p>Konwentami nazywane są zjazdy fan&oacute;w, zwłaszcza fan&oacute;w szeroko rozumianej fantastyki. Na&nbsp;wielu z&nbsp;nich organizowane są larpy (gł&oacute;wnie typu chamber). Najbardziej znane polskie konwenty, na&nbsp;kt&oacute;rych można zagrać larpa, to:</p>\r\n<ul>\r\n<li>Polcon &ndash; najstarszy polski konwent (pierwszy raz w&nbsp;1985 roku), odbywający się co roku w&nbsp;sierpniu, za każdym razem w&nbsp;innym mieście,</li>\r\n<li>Pyrkon &ndash; obecnie największa tego typu impreza w&nbsp;Polsce, odbywa się w&nbsp;kwietniu lub&nbsp;maju w&nbsp;Poznaniu, bierze w&nbsp;nim rokrocznie udział kilkadziesiąt tysięcy uczestnik&oacute;w,</li>\r\n<li>Falkon &ndash; odbywający się w&nbsp;listopadzie w&nbsp;Lublinie,</li>\r\n<li>Copernicon &ndash; organizowany we wrześniu w&nbsp;Toruniu,</li>\r\n<li>Imladris &ndash; odbywa się w&nbsp;październiku w&nbsp;Krakowie,</li>\r\n<li>Niucon &ndash; mający miejsce w&nbsp;październiku we Wrocławiu, jest on gł&oacute;wnie skoncentrowany na&nbsp;fantastyce dalekowschodniej, jednak zdarzają się na&nbsp;nim r&oacute;wnież larpy.</li>\r\n</ul>',NULL,NULL),(33,'Imprezy larpowe','in_poland',4,'<p>W Polsce odbywają się także imprezy typowo larpowe. Są wśr&oacute;d nich m.in. konwenty zorientowane gł&oacute;wnie na&nbsp;larpy, a&nbsp;także duże, kilkudniowe larpy terenowe. Oto najważniejsze z&nbsp;nich:</p>\r\n<ul>\r\n<li>KoLa &ndash; og&oacute;lnopolska konferencja zajmująca się larpami od&nbsp;strony teoretycznej. Co roku odbywa się w&nbsp;innym mieście. Odbywają się na&nbsp;niej zwłaszcza prelekcje, wykłady i&nbsp;panele dyskusyjne, zaś corocznie wydana zostaje publikacja z&nbsp;wieloma artykułami poruszającymi r&oacute;żne zagadnienia związane z&nbsp;tą aktywnością,</li>\r\n<li>Orkon &ndash; najstarszy w&nbsp;Polsce konwent typowo larpowy, odbywający się na&nbsp;terenie Jury Krakowsko-Częstochowskiej. Podczas Orkonu można wziąć udział w&nbsp;wielu r&oacute;żnych larpach terenowych i&nbsp;chamberach,</li>\r\n<li>DreamHaven &ndash; dawniej Hardkon, konwent larpowy odbywający się na&nbsp;Pomorzu, pełen larp&oacute;w wszelkiego rodzaju,</li>\r\n<li>Fornost &ndash; konwent larpowy z&nbsp;gł&oacute;wną dwudniową grą w&nbsp;settingu Władcy Pierścieni,</li>\r\n<li>Flamberg &ndash; konwent zorientowany w&nbsp;znacznej mierze na&nbsp;larpy, odbywający się na&nbsp;terenie Jury Krakowsko-Częstochowskiej,</li>\r\n<li>Fantazjada &ndash; kilkudniowy larp w&nbsp;settingu fantasy, dawniej bitewny larp terenowy, obecnie nastawiony bardziej na&nbsp;symulacyjność</li>\r\n<li>Battle Quest &ndash; czterodniowy larp bitewny w&nbsp;settingu Warhammera, odbywający się w&nbsp;Nysie</li>\r\n<li>OldTown Festival &ndash; tygodniowy larp w&nbsp;klimacie postapokaliptycznym, odbywający się w&nbsp;sierpniu w&nbsp;Stargardzie, na&nbsp;terenie opuszczonego lotniska</li>\r\n</ul>',NULL,NULL);
/*!40000 ALTER TABLE `text` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) DEFAULT NULL,
  `login` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `phone_number` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `emergency_phone` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `health_issues` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nourishment_issues` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_users_roles1_idx` (`role_id`),
  CONSTRAINT `FK_8D93D649D60322AC` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,2,'Hagin','H@6!n',NULL,'Hagin Gimblefllux. Master Engineer',NULL,NULL,NULL,'hagin@gimbleflux.com',NULL,NULL,NULL),(2,1,'Daquelia','Daquelia',NULL,NULL,NULL,NULL,NULL,'daquelia@lordaeron.com',NULL,NULL,NULL);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-05-26 23:00:36
