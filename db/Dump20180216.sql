-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: us-cdbr-iron-east-05.cleardb.net    Database: heroku_e347d42b789f20a
-- ------------------------------------------------------
-- Server version	5.6.36-log

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
-- Table structure for table `department_master`
--

DROP TABLE IF EXISTS `department_master`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `department_master` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `department_name` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `department_master`
--

LOCK TABLES `department_master` WRITE;
/*!40000 ALTER TABLE `department_master` DISABLE KEYS */;
INSERT INTO `department_master` VALUES (1,'call-center'),(2,'levy'),(3,'secreteriat'),(11,'financial department'),(21,'financial'),(31,'lulu');
/*!40000 ALTER TABLE `department_master` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `how_many_customers_were_called`
--

DROP TABLE IF EXISTS `how_many_customers_were_called`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `how_many_customers_were_called` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `staff_id` int(11) NOT NULL,
  `cust_called_no` int(11) NOT NULL,
  `note` varchar(1000) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=91 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `how_many_customers_were_called`
--

LOCK TABLES `how_many_customers_were_called` WRITE;
/*!40000 ALTER TABLE `how_many_customers_were_called` DISABLE KEYS */;
INSERT INTO `how_many_customers_were_called` VALUES (1,5,25,'good work..','2018-02-13 01:09:42'),(11,31,30,'called 30 clients without any problem','2018-02-13 06:00:15'),(21,31,25,'25 kiÅŸi aradÄ±m','2018-02-14 12:56:06'),(31,31,12,'N/A','2018-02-14 01:39:07'),(41,31,25,'25 kiÅŸi aradÄ±m','2018-02-14 07:58:55'),(51,31,2,'break time','2018-02-15 11:15:18'),(61,31,12,'ararÄ±m sorarÄ±m seni heryerde','2018-02-16 04:09:15'),(71,31,1,'1e1 \n1.kalite\nuuuuuu','2018-02-16 04:18:55'),(81,31,30,'full performans Ã§alÄ±ÅŸtÄ±m.','2018-02-16 07:43:24');
/*!40000 ALTER TABLE `how_many_customers_were_called` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `institution_master`
--

DROP TABLE IF EXISTS `institution_master`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `institution_master` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `institution_name` varchar(250) NOT NULL,
  `institution_number` varchar(100) NOT NULL,
  `note` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `institution_master`
--

LOCK TABLES `institution_master` WRITE;
/*!40000 ALTER TABLE `institution_master` DISABLE KEYS */;
INSERT INTO `institution_master` VALUES (1,'avea','111/7899','not easy to access'),(11,'telsim','123456','no worries');
/*!40000 ALTER TABLE `institution_master` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `payment_master`
--

DROP TABLE IF EXISTS `payment_master`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `payment_master` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `institution_id` varchar(100) NOT NULL,
  `total_payment` int(10) NOT NULL,
  `money_received` int(10) NOT NULL,
  `payment_deadline` datetime NOT NULL,
  `institution_doc_status` varchar(25) NOT NULL,
  `date` datetime NOT NULL,
  `note` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=91 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payment_master`
--

LOCK TABLES `payment_master` WRITE;
/*!40000 ALTER TABLE `payment_master` DISABLE KEYS */;
INSERT INTO `payment_master` VALUES (1,31,'1111/2222',500,0,'0000-00-00 00:00:00','1','2018-02-14 00:00:00','not yok'),(11,31,'4578/9874',100,100,'0000-00-00 00:00:00','2','2018-02-14 00:00:00','roget that'),(21,31,'111',10,9,'0000-00-00 00:00:00','1','2018-02-14 00:00:00','endiÅŸe yok'),(51,31,'1',1,1,'0000-00-00 00:00:00','1','2018-02-15 00:00:00','1'),(61,31,'123456',100,99,'2018-02-16 00:00:00','1','2018-02-16 00:00:00','no note'),(71,31,'123',12,2,'2018-02-16 00:00:00','1','2018-02-16 00:00:00','6'),(81,31,'123456',500,60,'2018-02-28 00:00:00','1','2018-02-16 02:14:38','2 haftaya ara Ã¶deyecek');
/*!40000 ALTER TABLE `payment_master` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `report_master`
--

DROP TABLE IF EXISTS `report_master`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `report_master` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `staff_id` int(11) NOT NULL,
  `note` varchar(1000) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=441 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `report_master`
--

LOCK TABLES `report_master` WRITE;
/*!40000 ALTER TABLE `report_master` DISABLE KEYS */;
INSERT INTO `report_master` VALUES (1,11,'start to work at 9 am','2018-02-13 01:02:03'),(11,11,'start to work at 9 am 1','2018-02-13 01:02:19'),(21,11,'start to work at 9 am	2','2018-02-13 01:02:22'),(31,11,'start to work at 9 am	3','2018-02-13 01:02:25'),(41,11,'start to work at 9 am	5','2018-02-13 01:02:28'),(51,11,'start to work at 9 am	6','2018-02-13 01:02:32'),(61,11,'start to work at 9 am	7','2018-02-13 01:02:36'),(71,11,'milliyet','2018-02-13 01:17:47'),(81,21,'bugÃ¼n Ã§oook Ã§alÄ±ÅŸtÄ±m','2018-02-13 05:03:08'),(91,31,'i got 2 hours siesta ','2018-02-13 06:01:12'),(101,21,'iki kelime','2018-02-14 12:53:59'),(111,21,'Ã¼Ã§ satÄ±rlÄ±k yazÄ±','2018-02-14 12:54:24'),(121,31,'call center daily report','2018-02-14 12:56:51'),(131,21,'balÄ±k ... !!!','2018-02-14 07:56:28'),(141,31,'gÃ¼nlÃ¼k not','2018-02-14 07:59:22'),(151,11,' ayhann  ayhann  ayhann  ayhann  ayhann  ayhann  ayhann  ayhann  ayhann  ayhann  ayhann  ayhann  ayhann  ayhann  ayhann  ayhann  ayhann  ayhann  ayhann  ayhann  ayhann  ayhann  ayhann  ayhann  ayhann  ayhann  ayhann  ayhann  ayhann  ayhann  ayhann  ayhann  ayhann  ayhann  ayhann  ayhann       ayhann ','2018-02-14 08:01:21'),(161,31,'16 subat raporum ','2018-02-16 03:52:18'),(171,31,'february 16 reporter...','2018-02-16 03:53:02'),(181,11,'hu hu ','2018-02-16 04:11:11'),(191,11,'report 1 ','2018-02-16 04:49:57'),(201,11,'report 1 ','2018-02-16 04:50:00'),(211,11,'report 1 ','2018-02-16 04:50:01'),(221,11,'report 1 ','2018-02-16 04:50:04'),(231,11,'report 1 ','2018-02-16 04:50:12'),(241,11,'report 1 ','2018-02-16 04:50:18'),(251,11,'report 1 ','2018-02-16 04:50:20'),(261,11,'report 1  report 1  report 1 report 1 report 1 report 1 report 1 ','2018-02-16 04:50:26'),(271,11,'report 1 ','2018-02-16 04:50:36'),(281,11,'report 1 report 1 report 1 report 1 report 1 ','2018-02-16 04:50:41'),(291,11,'report 1 report 1 report 1 report 1 report 1 report 1 ','2018-02-16 04:50:52'),(301,21,'report ','2018-02-16 04:51:13'),(311,21,'department name','2018-02-16 04:51:20'),(321,21,'department name','2018-02-16 04:51:36'),(331,21,'department namedepartment namedepartment namedepartment namedepartment name','2018-02-16 04:51:40'),(341,31,'department name','2018-02-16 04:52:51'),(351,21,'department name','2018-02-16 04:53:14'),(361,21,'department name','2018-02-16 04:54:06'),(371,11,'moda di galdone','2018-02-16 06:40:39'),(381,11,'moda di galdone','2018-02-16 06:44:23'),(391,11,'milliyet','2018-02-16 06:44:28'),(401,11,'moda di galdone','2018-02-16 06:44:30'),(411,11,'nutuk','2018-02-16 06:44:46'),(421,11,'mukuk','2018-02-16 06:44:55'),(431,31,'oki doki Moto YILMAZ','2018-02-16 07:44:04');
/*!40000 ALTER TABLE `report_master` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `staff_master`
--

DROP TABLE IF EXISTS `staff_master`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `staff_master` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `department_id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `surname` varchar(250) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(100) NOT NULL,
  `mobile` bigint(10) NOT NULL,
  `status` varchar(50) NOT NULL,
  `employment_date` date NOT NULL,
  `termination_date` date NOT NULL,
  `note` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `staff_master`
--

LOCK TABLES `staff_master` WRITE;
/*!40000 ALTER TABLE `staff_master` DISABLE KEYS */;
INSERT INTO `staff_master` VALUES (8,1,'adminn','admin','admin@gmail.com','admin',9865742569,'admin','2018-02-07','2018-02-23','wjnxdszn'),(11,3,'marcus','greer','marcus@gmail.com','marcus',5363540556,'active','2018-02-13','1970-01-01','not yet'),(21,2,'icra','dairesi','icra@gmail.com','icra',5363540556,'active','2018-02-13','1970-01-01','nothing'),(31,1,'luna','kulman','luna@gmail.com','luna',5366547889,'active','2018-02-13','1970-01-01',''),(41,3,'Bora','Nero','bora@gmail.com','bora',5324569888,'active','2018-02-16','1970-01-01','');
/*!40000 ALTER TABLE `staff_master` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-02-16 20:41:41
