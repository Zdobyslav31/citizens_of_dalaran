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
  `creator_id` int(11) DEFAULT NULL,
  `modifier_id` int(11) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `modified_date` date DEFAULT NULL,
  `created_date` date NOT NULL,
  `summary` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `content` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `img` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_news_users1_idx` (`creator_id`),
  KEY `fk_news_users2_idx` (`modifier_id`),
  CONSTRAINT `FK_1DD3995061220EA6` FOREIGN KEY (`creator_id`) REFERENCES `user` (`id`),
  CONSTRAINT `FK_1DD39950D079F553` FOREIGN KEY (`modifier_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `news`
--

LOCK TABLES `news` WRITE;
/*!40000 ALTER TABLE `news` DISABLE KEYS */;
INSERT INTO `news` VALUES (8,1,2,'Jedziemy na Pyrkon','2018-03-26','2018-01-19','<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum ligula ipsum, luctus quis ante eget, suscipit pharetra urna. Phasellus facilisis eget ante id dictum. Sed sodales aliquam ante fringilla tincidunt. Nullam hendrerit interdum sem sit amet condimentum. Sed aliquam suscipit dolor. Proin rhoncus, tellus feugiat tincidunt accumsan, massa nunc viverra libero, vel feugiat justo tortor ac mauris. Pellentesque non congue nunc. Aenean posuere erat ex, sed ornare lectus varius eget. Aenean eleifend consectetur sem sed condimentum. Nulla et neque ornare, congue ipsum in, imperdiet nulla. Sed vel lacinia sem. Pellentesque vel tempus est. Nullam eget rutrum velit, in blandit dolor. Nullam quis est libero. Etiam sagittis nulla in ipsum luctus, sit amet sagittis dui consectetur.</p>','<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum ligula ipsum, luctus quis ante eget, suscipit pharetra urna. Phasellus facilisis eget ante id dictum. Sed sodales aliquam ante fringilla tincidunt. Nullam hendrerit interdum sem sit amet condimentum. Sed aliquam suscipit dolor. Proin rhoncus, tellus feugiat tincidunt accumsan, massa nunc viverra libero, vel feugiat justo tortor ac mauris. Pellentesque non congue nunc. Aenean posuere erat ex, sed ornare lectus varius eget. Aenean eleifend consectetur sem sed condimentum. Nulla et neque ornare, congue ipsum in, imperdiet nulla. Sed vel lacinia sem. Pellentesque vel tempus est. Nullam eget rutrum velit, in blandit dolor. Nullam quis est libero. Etiam sagittis nulla in ipsum luctus, sit amet sagittis dui consectetur.</p><p>Vestibulum porta ligula vitae aliquam pharetra. Nam in est ut eros mollis aliquam. Fusce sit amet sapien pulvinar, dapibus turpis nec, imperdiet nibh. Ut et lacus sed velit condimentum tincidunt. Vivamus in turpis suscipit, euismod quam quis, porta sem. Integer lectus elit, sodales id sagittis ut, consequat a nisl. Nullam ut orci id lacus vestibulum cursus. Maecenas consequat ac nulla quis euismod. Nullam lacinia, justo sed venenatis scelerisque, nibh magna lobortis tellus, a luctus quam est eget mauris. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p><p>Pellentesque libero justo, dignissim sit amet nulla luctus, maximus venenatis felis. Quisque sollicitudin dolor eu arcu vehicula ullamcorper. Fusce aliquet facilisis hendrerit. Sed mattis auctor leo, et volutpat augue. Duis pharetra eros ut tortor porta, in dictum metus lobortis. Nulla est arcu, rhoncus ac lobortis sed, ultrices ac neque. Aenean blandit mi ut malesuada venenatis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris ac ultricies neque, vitae condimentum sem. Suspendisse sed lorem in est sagittis elementum venenatis id quam. In cursus arcu eu lacus varius, ut mollis nisi auctor. Suspendisse tincidunt mattis diam ac pulvinar. Quisque dui arcu, dapibus a commodo sed, aliquet et diam.</p><p>Pellentesque rutrum rhoncus ligula, ac dictum justo facilisis id. Suspendisse fermentum euismod ex in porttitor. Nulla pulvinar risus ac rhoncus bibendum. Phasellus at luctus ante. Vivamus id libero maximus, sagittis velit nec, interdum nulla. Nulla tincidunt, magna eget condimentum rhoncus, ipsum arcu faucibus nibh, sed tincidunt enim odio non metus. Phasellus justo elit, faucibus sit amet dictum in, laoreet vitae risus. Duis sem nibh, rutrum ut lorem vestibulum, posuere laoreet nisi. Quisque at elit pharetra, tempor enim sit amet, aliquam tellus.</p><p>Sed accumsan quam ornare congue convallis. Mauris eget velit elementum, tempor ipsum vel, scelerisque arcu. Phasellus eget eleifend sapien, ut lobortis magna. Nam posuere lorem sit amet erat hendrerit accumsan. Morbi viverra rutrum nulla. Suspendisse pharetra viverra velit. Pellentesque lobortis nulla vitae ante eleifend dapibus quis eget metus. In nisi neque, consectetur eget mollis a, convallis sit amet leo.</p>','https://strefasingla.pl/uploads/events/0fb0/0fb0fa5250866d8e9c27fb68bcdcbcfb14d3f5c5.jpg'),(9,2,1,'Crafting u Rzepy','2018-04-26','2018-02-19','<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum ligula ipsum, luctus quis ante eget, suscipit pharetra urna. Phasellus facilisis eget ante id dictum. Sed sodales aliquam ante fringilla tincidunt. Nullam hendrerit interdum sem sit amet condimentum. Sed aliquam suscipit dolor. Proin rhoncus, tellus feugiat tincidunt accumsan, massa nunc viverra libero, vel feugiat justo tortor ac mauris. Pellentesque non congue nunc. Aenean posuere erat ex, sed ornare lectus varius eget. Aenean eleifend consectetur sem sed condimentum. Nulla et neque ornare, congue ipsum in, imperdiet nulla. Sed vel lacinia sem. Pellentesque vel tempus est. Nullam eget rutrum velit, in blandit dolor. Nullam quis est libero. Etiam sagittis nulla in ipsum luctus, sit amet sagittis dui consectetur.</p>','<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum ligula ipsum, luctus quis ante eget, suscipit pharetra urna. Phasellus facilisis eget ante id dictum. Sed sodales aliquam ante fringilla tincidunt. Nullam hendrerit interdum sem sit amet condimentum. Sed aliquam suscipit dolor. Proin rhoncus, tellus feugiat tincidunt accumsan, massa nunc viverra libero, vel feugiat justo tortor ac mauris. Pellentesque non congue nunc. Aenean posuere erat ex, sed ornare lectus varius eget. Aenean eleifend consectetur sem sed condimentum. Nulla et neque ornare, congue ipsum in, imperdiet nulla. Sed vel lacinia sem. Pellentesque vel tempus est. Nullam eget rutrum velit, in blandit dolor. Nullam quis est libero. Etiam sagittis nulla in ipsum luctus, sit amet sagittis dui consectetur.</p><p>Vestibulum porta ligula vitae aliquam pharetra. Nam in est ut eros mollis aliquam. Fusce sit amet sapien pulvinar, dapibus turpis nec, imperdiet nibh. Ut et lacus sed velit condimentum tincidunt. Vivamus in turpis suscipit, euismod quam quis, porta sem. Integer lectus elit, sodales id sagittis ut, consequat a nisl. Nullam ut orci id lacus vestibulum cursus. Maecenas consequat ac nulla quis euismod. Nullam lacinia, justo sed venenatis scelerisque, nibh magna lobortis tellus, a luctus quam est eget mauris. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p><p>Pellentesque libero justo, dignissim sit amet nulla luctus, maximus venenatis felis. Quisque sollicitudin dolor eu arcu vehicula ullamcorper. Fusce aliquet facilisis hendrerit. Sed mattis auctor leo, et volutpat augue. Duis pharetra eros ut tortor porta, in dictum metus lobortis. Nulla est arcu, rhoncus ac lobortis sed, ultrices ac neque. Aenean blandit mi ut malesuada venenatis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris ac ultricies neque, vitae condimentum sem. Suspendisse sed lorem in est sagittis elementum venenatis id quam. In cursus arcu eu lacus varius, ut mollis nisi auctor. Suspendisse tincidunt mattis diam ac pulvinar. Quisque dui arcu, dapibus a commodo sed, aliquet et diam.</p><p>Pellentesque rutrum rhoncus ligula, ac dictum justo facilisis id. Suspendisse fermentum euismod ex in porttitor. Nulla pulvinar risus ac rhoncus bibendum. Phasellus at luctus ante. Vivamus id libero maximus, sagittis velit nec, interdum nulla. Nulla tincidunt, magna eget condimentum rhoncus, ipsum arcu faucibus nibh, sed tincidunt enim odio non metus. Phasellus justo elit, faucibus sit amet dictum in, laoreet vitae risus. Duis sem nibh, rutrum ut lorem vestibulum, posuere laoreet nisi. Quisque at elit pharetra, tempor enim sit amet, aliquam tellus.</p><p>Sed accumsan quam ornare congue convallis. Mauris eget velit elementum, tempor ipsum vel, scelerisque arcu. Phasellus eget eleifend sapien, ut lobortis magna. Nam posuere lorem sit amet erat hendrerit accumsan. Morbi viverra rutrum nulla. Suspendisse pharetra viverra velit. Pellentesque lobortis nulla vitae ante eleifend dapibus quis eget metus. In nisi neque, consectetur eget mollis a, convallis sit amet leo.</p>','http://forge.pinecove.com/wp-content/uploads/2016/07/forge-video-anvil-hammer-640x427.jpg'),(10,1,NULL,'Zgłoszenia na Szepty Nawiedzonych Krain dobiegają końca',NULL,'2018-04-24','<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum ligula ipsum, luctus quis ante eget, suscipit pharetra urna. Phasellus facilisis eget ante id dictum. Sed sodales aliquam ante fringilla tincidunt. Nullam hendrerit interdum sem sit amet condimentum. Sed aliquam suscipit dolor. Proin rhoncus, tellus feugiat tincidunt accumsan, massa nunc viverra libero, vel feugiat justo tortor ac mauris. Pellentesque non congue nunc. Aenean posuere erat ex, sed ornare lectus varius eget. Aenean eleifend consectetur sem sed condimentum. Nulla et neque ornare, congue ipsum in, imperdiet nulla. Sed vel lacinia sem. Pellentesque vel tempus est. Nullam eget rutrum velit, in blandit dolor. Nullam quis est libero. Etiam sagittis nulla in ipsum luctus, sit amet sagittis dui consectetur.</p>','<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum ligula ipsum, luctus quis ante eget, suscipit pharetra urna. Phasellus facilisis eget ante id dictum. Sed sodales aliquam ante fringilla tincidunt. Nullam hendrerit interdum sem sit amet condimentum. Sed aliquam suscipit dolor. Proin rhoncus, tellus feugiat tincidunt accumsan, massa nunc viverra libero, vel feugiat justo tortor ac mauris. Pellentesque non congue nunc. Aenean posuere erat ex, sed ornare lectus varius eget. Aenean eleifend consectetur sem sed condimentum. Nulla et neque ornare, congue ipsum in, imperdiet nulla. Sed vel lacinia sem. Pellentesque vel tempus est. Nullam eget rutrum velit, in blandit dolor. Nullam quis est libero. Etiam sagittis nulla in ipsum luctus, sit amet sagittis dui consectetur.</p><p>Vestibulum porta ligula vitae aliquam pharetra. Nam in est ut eros mollis aliquam. Fusce sit amet sapien pulvinar, dapibus turpis nec, imperdiet nibh. Ut et lacus sed velit condimentum tincidunt. Vivamus in turpis suscipit, euismod quam quis, porta sem. Integer lectus elit, sodales id sagittis ut, consequat a nisl. Nullam ut orci id lacus vestibulum cursus. Maecenas consequat ac nulla quis euismod. Nullam lacinia, justo sed venenatis scelerisque, nibh magna lobortis tellus, a luctus quam est eget mauris. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p><p>Pellentesque libero justo, dignissim sit amet nulla luctus, maximus venenatis felis. Quisque sollicitudin dolor eu arcu vehicula ullamcorper. Fusce aliquet facilisis hendrerit. Sed mattis auctor leo, et volutpat augue. Duis pharetra eros ut tortor porta, in dictum metus lobortis. Nulla est arcu, rhoncus ac lobortis sed, ultrices ac neque. Aenean blandit mi ut malesuada venenatis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris ac ultricies neque, vitae condimentum sem. Suspendisse sed lorem in est sagittis elementum venenatis id quam. In cursus arcu eu lacus varius, ut mollis nisi auctor. Suspendisse tincidunt mattis diam ac pulvinar. Quisque dui arcu, dapibus a commodo sed, aliquet et diam.</p><p>Pellentesque rutrum rhoncus ligula, ac dictum justo facilisis id. Suspendisse fermentum euismod ex in porttitor. Nulla pulvinar risus ac rhoncus bibendum. Phasellus at luctus ante. Vivamus id libero maximus, sagittis velit nec, interdum nulla. Nulla tincidunt, magna eget condimentum rhoncus, ipsum arcu faucibus nibh, sed tincidunt enim odio non metus. Phasellus justo elit, faucibus sit amet dictum in, laoreet vitae risus. Duis sem nibh, rutrum ut lorem vestibulum, posuere laoreet nisi. Quisque at elit pharetra, tempor enim sit amet, aliquam tellus.</p><p>Sed accumsan quam ornare congue convallis. Mauris eget velit elementum, tempor ipsum vel, scelerisque arcu. Phasellus eget eleifend sapien, ut lobortis magna. Nam posuere lorem sit amet erat hendrerit accumsan. Morbi viverra rutrum nulla. Suspendisse pharetra viverra velit. Pellentesque lobortis nulla vitae ante eleifend dapibus quis eget metus. In nisi neque, consectetur eget mollis a, convallis sit amet leo.</p>','http://3.bp.blogspot.com/-7GR39dxC2Bw/U_NFa7EsnlI/AAAAAAAABT8/Ue_3CY4BvT0/s1600/WoWScrnShot_081114_183432.jpg');
/*!40000 ALTER TABLE `news` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `news_has_tags`
--

DROP TABLE IF EXISTS `news_has_tags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `news_has_tags` (
  `tag_id` int(10) unsigned NOT NULL,
  `news_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`tag_id`,`news_id`),
  KEY `IDX_7BDEEC28BAD26311` (`tag_id`),
  KEY `IDX_7BDEEC28B5A459A0` (`news_id`),
  CONSTRAINT `FK_7BDEEC28B5A459A0` FOREIGN KEY (`news_id`) REFERENCES `news` (`id`),
  CONSTRAINT `FK_7BDEEC28BAD26311` FOREIGN KEY (`tag_id`) REFERENCES `tag` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `news_has_tags`
--

LOCK TABLES `news_has_tags` WRITE;
/*!40000 ALTER TABLE `news_has_tags` DISABLE KEYS */;
INSERT INTO `news_has_tags` VALUES (1,8),(3,8),(4,9),(5,9),(7,9),(7,10),(8,10),(9,10);
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
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tag`
--

LOCK TABLES `tag` WRITE;
/*!40000 ALTER TABLE `tag` DISABLE KEYS */;
INSERT INTO `tag` VALUES (1,'Pyrkon'),(2,'Warcraft'),(3,'photo'),(4,'crafting'),(5,'stroje'),(7,'larp'),(8,'zgłoszenia'),(9,'ankiety'),(10,'kadra'),(11,'wykład'),(12,'lore'),(13,'opowiadanie'),(14,'artykuł'),(16,'dinksowie'),(17,'tenteg'),(18,'dziabąg'),(19,'tenteges');
/*!40000 ALTER TABLE `tag` ENABLE KEYS */;
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

-- Dump completed on 2018-05-02 22:03:13
