-- MySQL dump 10.16  Distrib 10.1.37-MariaDB, for Win32 (AMD64)
--
-- Host: localhost    Database: cgt456_project01
-- ------------------------------------------------------
-- Server version	10.1.37-MariaDB

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
-- Table structure for table `advisor_students`
--

DROP TABLE IF EXISTS `advisor_students`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `advisor_students` (
  `advisor_id` int(11) DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL,
  KEY `advisor_students_user_id_fk` (`advisor_id`),
  KEY `advisor_students_user_id_fk_2` (`student_id`),
  CONSTRAINT `advisor_students_user_id_fk` FOREIGN KEY (`advisor_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `advisor_students_user_id_fk_2` FOREIGN KEY (`student_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `advisor_students`
--

LOCK TABLES `advisor_students` WRITE;
/*!40000 ALTER TABLE `advisor_students` DISABLE KEYS */;
/*!40000 ALTER TABLE `advisor_students` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cgt_field`
--

DROP TABLE IF EXISTS `cgt_field`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cgt_field` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cgt_field_name_uindex` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cgt_field`
--

LOCK TABLES `cgt_field` WRITE;
/*!40000 ALTER TABLE `cgt_field` DISABLE KEYS */;
/*!40000 ALTER TABLE `cgt_field` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `employer`
--

DROP TABLE IF EXISTS `employer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `employer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  `address` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employer`
--

LOCK TABLES `employer` WRITE;
/*!40000 ALTER TABLE `employer` DISABLE KEYS */;
/*!40000 ALTER TABLE `employer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `employer_cgt_fields`
--

DROP TABLE IF EXISTS `employer_cgt_fields`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `employer_cgt_fields` (
  `employer_id` int(11) DEFAULT NULL,
  `cgt_field_id` int(11) DEFAULT NULL,
  KEY `employer_cgt_fields_cgt_field_id_fk` (`cgt_field_id`),
  KEY `employer_cgt_fields_employer_id_fk` (`employer_id`),
  CONSTRAINT `employer_cgt_fields_cgt_field_id_fk` FOREIGN KEY (`cgt_field_id`) REFERENCES `cgt_field` (`id`),
  CONSTRAINT `employer_cgt_fields_employer_id_fk` FOREIGN KEY (`employer_id`) REFERENCES `employer` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employer_cgt_fields`
--

LOCK TABLES `employer_cgt_fields` WRITE;
/*!40000 ALTER TABLE `employer_cgt_fields` DISABLE KEYS */;
/*!40000 ALTER TABLE `employer_cgt_fields` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `financial_asst`
--

DROP TABLE IF EXISTS `financial_asst`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `financial_asst` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `description` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `financial_asst`
--

LOCK TABLES `financial_asst` WRITE;
/*!40000 ALTER TABLE `financial_asst` DISABLE KEYS */;
/*!40000 ALTER TABLE `financial_asst` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `form_student`
--

DROP TABLE IF EXISTS `form_student`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `form_student` (
  `work_session_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `rating` tinyint(4) DEFAULT NULL,
  `form_relevant_work` text,
  `form_difficulties` text,
  `form_related_to_major` text,
  `form_wanted_to_learn` text,
  `form_cgt_changed_mind` text,
  `form_provided_contacts` text,
  KEY `form_student_work_session_id_fk` (`work_session_id`),
  KEY `form_student_user_id_fk` (`student_id`),
  CONSTRAINT `form_student_user_id_fk` FOREIGN KEY (`student_id`) REFERENCES `user` (`id`),
  CONSTRAINT `form_student_work_session_id_fk` FOREIGN KEY (`work_session_id`) REFERENCES `work_session` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `form_student`
--

LOCK TABLES `form_student` WRITE;
/*!40000 ALTER TABLE `form_student` DISABLE KEYS */;
/*!40000 ALTER TABLE `form_student` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `form_supervisor`
--

DROP TABLE IF EXISTS `form_supervisor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `form_supervisor` (
  `work_session_id` int(11) NOT NULL,
  `supervisor_id` int(11) DEFAULT NULL,
  `rate_dependable` tinyint(4) DEFAULT NULL,
  `rate_cooperative` tinyint(4) DEFAULT NULL,
  `rate_interested` tinyint(4) DEFAULT NULL,
  `rate_fast_learner` tinyint(4) DEFAULT NULL,
  `rate_initiative` tinyint(4) DEFAULT NULL,
  `rate_work_quality` tinyint(4) DEFAULT NULL,
  `rate_responsibility` tinyint(4) DEFAULT NULL,
  `rate_criticism` tinyint(4) DEFAULT NULL,
  `rate_organization` tinyint(4) DEFAULT NULL,
  `rate_tech_knowledge` tinyint(4) DEFAULT NULL,
  `rate_judgement` tinyint(4) DEFAULT NULL,
  `rate_creativity` tinyint(4) DEFAULT NULL,
  `rate_problem_analysis` tinyint(4) DEFAULT NULL,
  `rate_self_reliance` tinyint(4) DEFAULT NULL,
  `rate_communication` tinyint(4) DEFAULT NULL,
  `rate_writing` tinyint(4) DEFAULT NULL,
  `rate_prof_attitude` tinyint(4) DEFAULT NULL,
  `rate_prof_appearance` tinyint(4) DEFAULT NULL,
  `rate_punctual` tinyint(4) DEFAULT NULL,
  `rate_time_effective` tinyint(4) DEFAULT NULL,
  KEY `form_supervisor_user_id_fk` (`supervisor_id`),
  KEY `form_supervisor_work_session_id_fk` (`work_session_id`),
  CONSTRAINT `form_supervisor_user_id_fk` FOREIGN KEY (`supervisor_id`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  CONSTRAINT `form_supervisor_work_session_id_fk` FOREIGN KEY (`work_session_id`) REFERENCES `work_session` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `form_supervisor`
--

LOCK TABLES `form_supervisor` WRITE;
/*!40000 ALTER TABLE `form_supervisor` DISABLE KEYS */;
/*!40000 ALTER TABLE `form_supervisor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permissions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `user_register` tinyint(1) NOT NULL DEFAULT '0',
  `user_select_all` tinyint(1) NOT NULL DEFAULT '0',
  `user_modify` tinyint(1) NOT NULL DEFAULT '0',
  `user_delete` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_uindex` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` VALUES (1,'admin',0,1,1,1),(2,'advisor',0,1,1,1),(3,'supervisor',1,0,0,0),(4,'student',1,0,0,0);
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `permissions_id` int(11) NOT NULL,
  `login` varchar(64) NOT NULL,
  `passwd_hash` char(32) NOT NULL,
  `passwd_salt` char(32) NOT NULL,
  `first_name` varchar(64) NOT NULL,
  `last_name` varchar(64) NOT NULL,
  `email` varchar(64) DEFAULT NULL,
  `phone` varchar(14) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_login_uindex` (`login`),
  KEY `user_account_type_id_fk` (`permissions_id`),
  CONSTRAINT `user_permissions_id_fk` FOREIGN KEY (`permissions_id`) REFERENCES `permissions` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,1,'admin','39bc331e9bb538f97ae1922a7d09389e','912ec803b2ce49e4a541068d495ab570','Jon','Snow','jtarg@purdue.edu',''),(2,2,'advisor','5e2008403083b7c85611663153c38b60','59fc1676564a7567ae0a27a51f498db9','Tyrion','Lannister','tlann@purdue.edu',''),(3,3,'supervisor','7cfe47ac64a044f62755b27c48332c0b','555ed43d9f04757aeb97d3080eb7fa37','Brienne','Tarth','btart@purdue.edu',''),(4,4,'student','73ee9f49c3dae732c1dfd9a303777491','355f75ab61d4256da6ec45d6e3e52de1','Arya','Stark','astar@purdue.edu','');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `work_session`
--

DROP TABLE IF EXISTS `work_session`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `work_session` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `employer_id` int(11) NOT NULL,
  `job_title` varchar(64) NOT NULL,
  `address` varchar(64) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `offsite` tinyint(1) DEFAULT '0',
  `total_hours` int(11) DEFAULT NULL,
  `pay_rate` float DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `work_session_employer_id_fk` (`employer_id`),
  KEY `work_session_user_id_fk` (`student_id`),
  CONSTRAINT `work_session_employer_id_fk` FOREIGN KEY (`employer_id`) REFERENCES `employer` (`id`),
  CONSTRAINT `work_session_user_id_fk` FOREIGN KEY (`student_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `work_session`
--

LOCK TABLES `work_session` WRITE;
/*!40000 ALTER TABLE `work_session` DISABLE KEYS */;
/*!40000 ALTER TABLE `work_session` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `work_session_finanacial_assts`
--

DROP TABLE IF EXISTS `work_session_finanacial_assts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `work_session_finanacial_assts` (
  `work_session_id` int(11) DEFAULT NULL,
  `financial_asst_id` int(11) DEFAULT NULL,
  KEY `work_session_finanacial_assts_financial_asst_id_fk` (`financial_asst_id`),
  KEY `work_session_finanacial_assts_work_session_id_fk` (`work_session_id`),
  CONSTRAINT `work_session_finanacial_assts_financial_asst_id_fk` FOREIGN KEY (`financial_asst_id`) REFERENCES `financial_asst` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `work_session_finanacial_assts_work_session_id_fk` FOREIGN KEY (`work_session_id`) REFERENCES `work_session` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `work_session_finanacial_assts`
--

LOCK TABLES `work_session_finanacial_assts` WRITE;
/*!40000 ALTER TABLE `work_session_finanacial_assts` DISABLE KEYS */;
/*!40000 ALTER TABLE `work_session_finanacial_assts` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-01-17 14:31:22
