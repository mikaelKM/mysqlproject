-- MySQL dump 10.17  Distrib 10.3.20-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: EMD
-- ------------------------------------------------------
-- Server version	10.3.20-MariaDB-1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Temporary table structure for view `all_empl_bio`
--

DROP TABLE IF EXISTS `all_empl_bio`;
/*!50001 DROP VIEW IF EXISTS `all_empl_bio`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `all_empl_bio` (
  `emp_id` tinyint NOT NULL,
  `empl_title` tinyint NOT NULL,
  `empl_fname` tinyint NOT NULL,
  `empl_lname` tinyint NOT NULL,
  `empl_dob` tinyint NOT NULL,
  `empl_doj` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `all_empl_bio_changes`
--

DROP TABLE IF EXISTS `all_empl_bio_changes`;
/*!50001 DROP VIEW IF EXISTS `all_empl_bio_changes`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `all_empl_bio_changes` (
  `empl_id` tinyint NOT NULL,
  `Activity` tinyint NOT NULL,
  `empl_title` tinyint NOT NULL,
  `empl_fname` tinyint NOT NULL,
  `empl_lname` tinyint NOT NULL,
  `empl_dob` tinyint NOT NULL,
  `empl_doj` tinyint NOT NULL,
  `DoneBy` tinyint NOT NULL,
  `DoneAt` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `backup_test`
--

DROP TABLE IF EXISTS `backup_test`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `backup_test` (
  `name` varchar(20) DEFAULT NULL,
  `AGE` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `backup_test`
--

LOCK TABLES `backup_test` WRITE;
/*!40000 ALTER TABLE `backup_test` DISABLE KEYS */;
/*!40000 ALTER TABLE `backup_test` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `department`
--

DROP TABLE IF EXISTS `department`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `department` (
  `dpt_id` int(11) NOT NULL,
  `dpt_name` varchar(100) DEFAULT NULL,
  `no_empls` int(11) DEFAULT NULL,
  PRIMARY KEY (`dpt_id`),
  UNIQUE KEY `dpt_name` (`dpt_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `department`
--

LOCK TABLES `department` WRITE;
/*!40000 ALTER TABLE `department` DISABLE KEYS */;
INSERT INTO `department` VALUES (1,'computer',1),(2,'English',3);
/*!40000 ALTER TABLE `department` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `empl_bio_changes`
--

DROP TABLE IF EXISTS `empl_bio_changes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `empl_bio_changes` (
  `empl_id` int(11) DEFAULT NULL,
  `Activity` varchar(50) DEFAULT NULL,
  `empl_title` varchar(50) DEFAULT NULL,
  `empl_fname` varchar(50) DEFAULT NULL,
  `empl_lname` varchar(50) DEFAULT NULL,
  `empl_dob` date DEFAULT NULL,
  `empl_doj` date DEFAULT NULL,
  `DoneBy` varchar(50) DEFAULT NULL,
  `DoneAt` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `empl_bio_changes`
--

LOCK TABLES `empl_bio_changes` WRITE;
/*!40000 ALTER TABLE `empl_bio_changes` DISABLE KEYS */;
INSERT INTO `empl_bio_changes` VALUES (123,'DELETE','kingd','mikee','kasikew','2000-02-12','2012-12-12','joginder@localhost','2019-11-11'),(1,'UPDATE','manager','kasike','mike','2009-11-11','2019-11-12','joginder@localhost','2019-11-19'),(1,'UPDATE','manager','kasike','mike','2009-11-11','2019-11-12','joginder@localhost','2019-11-21'),(4,'UPDATE','HR','JOKINDA','esau','2019-11-16','2019-11-14','joginder@localhost','2019-11-21'),(122,'DELETE','hsu','snsn','joginder','2019-11-20','2019-11-21','joginder@localhost','2019-11-22'),(12,'UPDATE','king','mike','kasike','2000-02-10','2010-04-12','joginder@localhost','2019-11-24');
/*!40000 ALTER TABLE `empl_bio_changes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `empl_grade_details`
--

DROP TABLE IF EXISTS `empl_grade_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `empl_grade_details` (
  `empl_id` int(11) NOT NULL,
  `dpt_id` int(11) DEFAULT NULL,
  `grade_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`empl_id`),
  KEY `grade_id` (`grade_id`),
  CONSTRAINT `empl_grade_details_ibfk_1` FOREIGN KEY (`empl_id`) REFERENCES `employee_bio` (`emp_id`),
  CONSTRAINT `empl_grade_details_ibfk_2` FOREIGN KEY (`grade_id`) REFERENCES `grade_details` (`grade_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `empl_grade_details`
--

LOCK TABLES `empl_grade_details` WRITE;
/*!40000 ALTER TABLE `empl_grade_details` DISABLE KEYS */;
INSERT INTO `empl_grade_details` VALUES (1,1,5),(2,2,4),(12,1,4);
/*!40000 ALTER TABLE `empl_grade_details` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`joginder`@`localhost`*/ /*!50003 TRIGGER cal_salary
AFTER INSERT
ON empl_grade_details FOR EACH ROW
BEGIN
	
	DECLARE empl_id INT;
	DECLARE empl_grade_id INT;
	DECLARE grade_basic INT;
	DECLARE grade_HA INT;
	DECLARE grade_TA INT;
	DECLARE grade_MA INT;
	DECLARE grade_bonus INT;
	DECLARE grade_tas INT;
	DECLARE empl_month_salary INT;
	DECLARE empl_year_salary INT;
	DECLARE empl_basic INT;
	DECLARE empl_AL INT;
	DECLARE empl_deductions INT;

SET empl_id = NEW.empl_id;
SET empl_grade_id = NEW.grade_id;
/*
SELECT grade_basic, grade_HA, grade_TA, grade_MA, grade_bonus, grade_tas INTO grade_basic, grade_HA, grade_TA, grade_MA, grade_bonus, grade_tas FROM grade_details WHERE grade_id = empl_grade_id;
*/
#SET grade_basic = (SELECT dpt_id FROM empl_grade_details WHERE grade_id = 1);
SET grade_basic = (SELECT grade_details.grade_basic FROM EMD.grade_details WHERE grade_details.grade_id = empl_grade_id);
SET grade_HA = (SELECT grade_details.grade_HA FROM EMD.grade_details WHERE grade_details.grade_id = empl_grade_id);
SET grade_TA = (SELECT grade_details.grade_TA FROM EMD.grade_details WHERE grade_details.grade_id = empl_grade_id);
SET grade_MA = (SELECT grade_details.grade_MA FROM EMD.grade_details WHERE grade_details.grade_id = empl_grade_id);
SET grade_bonus = (SELECT grade_details.grade_bonus FROM EMD.grade_details WHERE grade_details.grade_id = empl_grade_id);
SET grade_tas = (SELECT grade_details.grade_tas FROM EMD.grade_details WHERE grade_details.grade_id = empl_grade_id);


SET empl_month_salary = ((grade_basic + grade_HA + grade_TA + grade_MA + grade_bonus ) - grade_tas);
SET empl_year_salary = (((grade_basic + grade_HA + grade_TA + grade_MA + grade_bonus ) - grade_tas)*12);
SET empl_basic = grade_basic;
SET empl_AL = (grade_HA + grade_TA + grade_MA);
SET empl_deductions = grade_tas;

/*
SELECT ((grade_basic + grade_HA + grade_TA + grade_MA + grade_bonus ) - grade_tas) INTO empl_month_salary;
SELECT (((grade_basic + grade_HA + grade_TA + grade_MA + grade_bonus ) - grade_tas)*12) INTO empl_year_salary;
SELECT grade_basic INTO empl_basic;
SELECT (grade_HA + grade_TA + grade_MA) INTO empl_AL;
SELECT grade_tas INTO empl_deductions;
*/
INSERT INTO empl_salary(empl_id, empl_month_salary, empl_year_pay, empl_grade_id, empl_basic, empl_AL, empl_deductions) VALUES (empl_id, empl_month_salary, empl_year_salary, empl_grade_id, empl_basic, empl_AL, empl_deductions);
	END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER cal_salary_on_update
AFTER UPDATE
ON empl_grade_details FOR EACH ROW
BEGIN
	
	DECLARE empl_id INT;
	DECLARE empl_grade_id INT;
	DECLARE grade_basic INT;
	DECLARE grade_HA INT;
	DECLARE grade_TA INT;
	DECLARE grade_MA INT;
	DECLARE grade_bonus INT;
	DECLARE grade_tas INT;
	DECLARE empl_month_salary INT;
	DECLARE empl_year_salary INT;
	DECLARE empl_basic INT;
	DECLARE empl_AL INT;
	DECLARE empl_deductions INT;


SET empl_grade_id = NEW.grade_id;
SET empl_id = NEW.empl_id;

#SET empl_id = (SELECT empl_grade_details.empl_id FROM EMD.empl_grade_details WHERE grade_id = NEW.grade_id);

SET grade_basic = (SELECT grade_details.grade_basic FROM EMD.grade_details WHERE grade_details.grade_id = empl_grade_id);
SET grade_HA = (SELECT grade_details.grade_HA FROM EMD.grade_details WHERE grade_details.grade_id = empl_grade_id);
SET grade_TA = (SELECT grade_details.grade_TA FROM EMD.grade_details WHERE grade_details.grade_id = empl_grade_id);
SET grade_MA = (SELECT grade_details.grade_MA FROM EMD.grade_details WHERE grade_details.grade_id = empl_grade_id);
SET grade_bonus = (SELECT grade_details.grade_bonus FROM EMD.grade_details WHERE grade_details.grade_id = empl_grade_id);
SET grade_tas = (SELECT grade_details.grade_tas FROM EMD.grade_details WHERE grade_details.grade_id = empl_grade_id);


SET empl_month_salary = ((grade_basic + grade_HA + grade_TA + grade_MA + grade_bonus ) - grade_tas);
SET empl_year_salary = (((grade_basic + grade_HA + grade_TA + grade_MA + grade_bonus ) - grade_tas)*12);
SET empl_basic = grade_basic;
SET empl_AL = (grade_HA + grade_TA + grade_MA);
SET empl_deductions = grade_tas;


UPDATE empl_salary SET  
	empl_month_salary = empl_month_salary, 
	empl_year_pay = empl_year_salary, 
	empl_grade_id = empl_grade_id, 
	empl_basic  = empl_basic, 
	empl_AL = empl_AL, 
	empl_deductions =  empl_deductions
WHERE 
	empl_id = empl_id;
	END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `empl_salary`
--

DROP TABLE IF EXISTS `empl_salary`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `empl_salary` (
  `empl_id` int(11) NOT NULL,
  `empl_month_salary` int(11) DEFAULT NULL,
  `empl_year_pay` int(11) DEFAULT NULL,
  `empl_grade_id` int(11) DEFAULT NULL,
  `empl_basic` int(11) DEFAULT NULL,
  `empl_AL` int(11) DEFAULT NULL,
  `empl_deductions` int(11) DEFAULT NULL,
  PRIMARY KEY (`empl_id`),
  CONSTRAINT `empl_salary_ibfk_1` FOREIGN KEY (`empl_id`) REFERENCES `employee_bio` (`emp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `empl_salary`
--

LOCK TABLES `empl_salary` WRITE;
/*!40000 ALTER TABLE `empl_salary` DISABLE KEYS */;
INSERT INTO `empl_salary` VALUES (1,34224,410688,4,34000,202,26),(2,34224,410688,4,34000,202,26),(12,34224,410688,4,34000,202,26);
/*!40000 ALTER TABLE `empl_salary` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `empl_salary_view`
--

DROP TABLE IF EXISTS `empl_salary_view`;
/*!50001 DROP VIEW IF EXISTS `empl_salary_view`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `empl_salary_view` (
  `empl_id` tinyint NOT NULL,
  `empl_month_salary` tinyint NOT NULL,
  `empl_year_pay` tinyint NOT NULL,
  `empl_grade_id` tinyint NOT NULL,
  `empl_basic` tinyint NOT NULL,
  `empl_AL` tinyint NOT NULL,
  `empl_deductions` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `empl_work`
--

DROP TABLE IF EXISTS `empl_work`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `empl_work` (
  `empl_id` int(11) NOT NULL,
  `dep_id` int(11) DEFAULT NULL,
  `emp_title` varchar(50) DEFAULT NULL,
  `empl_from_date` date DEFAULT NULL,
  `empl_to_date` date DEFAULT NULL,
  PRIMARY KEY (`empl_id`),
  KEY `dep_id` (`dep_id`),
  CONSTRAINT `empl_work_ibfk_1` FOREIGN KEY (`empl_id`) REFERENCES `employee_bio` (`emp_id`),
  CONSTRAINT `empl_work_ibfk_2` FOREIGN KEY (`dep_id`) REFERENCES `department` (`dpt_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `empl_work`
--

LOCK TABLES `empl_work` WRITE;
/*!40000 ALTER TABLE `empl_work` DISABLE KEYS */;
INSERT INTO `empl_work` VALUES (1,1,'manager','2019-11-11','2019-11-12'),(2,2,'hr','2019-11-22','2019-11-17'),(4,2,NULL,NULL,NULL),(12,1,'manager','2019-11-20','2019-11-19');
/*!40000 ALTER TABLE `empl_work` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `empl_work_details`
--

DROP TABLE IF EXISTS `empl_work_details`;
/*!50001 DROP VIEW IF EXISTS `empl_work_details`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `empl_work_details` (
  `empl_id` tinyint NOT NULL,
  `emp_title` tinyint NOT NULL,
  `empl_from_date` tinyint NOT NULL,
  `empl_to_date` tinyint NOT NULL,
  `grade_name` tinyint NOT NULL,
  `dpt_name` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `employee_bio`
--

DROP TABLE IF EXISTS `employee_bio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `employee_bio` (
  `emp_id` int(11) NOT NULL,
  `empl_title` varchar(30) DEFAULT NULL,
  `empl_fname` varchar(30) DEFAULT NULL,
  `empl_lname` varchar(30) DEFAULT NULL,
  `empl_dob` date DEFAULT NULL,
  `empl_doj` date DEFAULT NULL,
  PRIMARY KEY (`emp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employee_bio`
--

LOCK TABLES `employee_bio` WRITE;
/*!40000 ALTER TABLE `employee_bio` DISABLE KEYS */;
INSERT INTO `employee_bio` VALUES (1,'manager','kasike','mike','2009-11-11','2019-11-12'),(2,'Manager','JoshKM','edith','2019-11-16','2019-11-20'),(4,'HR','JOKINDA','esau','2019-11-16','2019-11-14'),(11,'kingd','mikee','kasikew','2000-02-12','2012-12-12'),(12,'kingkings','mike','kasike','2000-02-10','2010-04-12'),(56,'kathos','jojjs','futtt','2019-11-15','2019-11-20');
/*!40000 ALTER TABLE `employee_bio` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `empl_bio changes_update`
AFTER UPDATE
ON employee_bio FOR EACH ROW
BEGIN

   DECLARE vUser varchar(50);
  DECLARE Activity VARCHAR(50);

   -- Find username of person performing the DELETE into table
   SELECT USER() INTO vUser;
  SET Activity = 'UPDATE';

   -- Insert record into audit table
   INSERT INTO EMD.empl_bio_changes
   ( empl_id,
     Activity,
     empl_title,
     empl_fname,
     empl_lname,
     empl_dob,
     empl_doj,
     DoneBy,
     DoneAt
     )
   VALUES
   ( OLD.emp_id,
   Activity,
   OLD.empl_title,
   OLD.empl_fname,
   OLD.empl_lname,
   OLD.empl_dob,
   OLD.empl_doj,
   vUser,
     SYSDATE()
     );

END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`joginder`@`localhost`*/ /*!50003 TRIGGER empl_bio_delete
AFTER DELETE
ON employee_bio FOR EACH ROW
BEGIN

   DECLARE vUser varchar(50);
  DECLARE Activity VARCHAR(50);

   -- Find username of person performing the DELETE into table
   SELECT USER() INTO vUser;
  SET Activity = 'DELETE';

   -- Insert record into changes table
   INSERT INTO EMD.empl_bio_changes
   ( empl_id,
     Activity,
     empl_title,
     empl_fname,
     empl_lname,
     empl_dob,
     empl_doj,
     DoneBy,
     DoneAt
     )
   VALUES
   ( OLD.emp_id,
   Activity,
   OLD.empl_title,
   OLD.empl_fname,
   OLD.empl_lname,
   OLD.empl_dob,
   OLD.empl_doj,
   vUser,
     SYSDATE()
     );

END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `employee_contacts`
--

DROP TABLE IF EXISTS `employee_contacts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `employee_contacts` (
  `emp_id` int(11) NOT NULL,
  `phone` int(14) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `adress` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`emp_id`),
  CONSTRAINT `employee_contacts_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `employee_bio` (`emp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employee_contacts`
--

LOCK TABLES `employee_contacts` WRITE;
/*!40000 ALTER TABLE `employee_contacts` DISABLE KEYS */;
INSERT INTO `employee_contacts` VALUES (2,6477,'josh@gamm.sk','PO.BOX 22 home'),(4,34433,'emak@hsj.dl','PO IKK29');
/*!40000 ALTER TABLE `employee_contacts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `grade_details`
--

DROP TABLE IF EXISTS `grade_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `grade_details` (
  `grade_id` int(11) NOT NULL,
  `grade_name` varchar(30) DEFAULT NULL,
  `grade_basic` int(11) DEFAULT NULL,
  `grade_HA` int(11) DEFAULT NULL,
  `grade_TA` int(11) DEFAULT NULL,
  `grade_MA` int(11) DEFAULT NULL,
  `grade_bonus` int(11) DEFAULT NULL,
  `grade_tas` int(11) DEFAULT NULL,
  PRIMARY KEY (`grade_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grade_details`
--

LOCK TABLES `grade_details` WRITE;
/*!40000 ALTER TABLE `grade_details` DISABLE KEYS */;
INSERT INTO `grade_details` VALUES (2,'second_grade',34000,1200,340,5000,349,120),(3,'third grade',48499,63777,387,376,36,36),(4,'fourth_grade',34000,67,90,45,48,26),(5,'fith_grade',2300,345,140,230,23,67),(6,'sixth_grade',6377,78,366,12,376,376);
/*!40000 ALTER TABLE `grade_details` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER grade_details_update_trigger
AFTER UPDATE
ON grade_details FOR EACH ROW
BEGIN
	DECLARE grade_id INT;
	DECLARE old_grade_id INT;

	SET old_grade_id = OLD.grade_id;
	SET grade_id = NEW.grade_id;

UPDATE EMD.empl_grade_details SET grade_id = grade_id WHERE grade_id = old_grade_id;

END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Temporary table structure for view `grade_details_view`
--

DROP TABLE IF EXISTS `grade_details_view`;
/*!50001 DROP VIEW IF EXISTS `grade_details_view`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `grade_details_view` (
  `grade_id` tinyint NOT NULL,
  `grade_name` tinyint NOT NULL,
  `grade_basic` tinyint NOT NULL,
  `grade_HA` tinyint NOT NULL,
  `grade_TA` tinyint NOT NULL,
  `grade_MA` tinyint NOT NULL,
  `grade_bonus` tinyint NOT NULL,
  `grade_tas` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Final view structure for view `all_empl_bio`
--

/*!50001 DROP TABLE IF EXISTS `all_empl_bio`*/;
/*!50001 DROP VIEW IF EXISTS `all_empl_bio`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `all_empl_bio` AS select `employee_bio`.`emp_id` AS `emp_id`,`employee_bio`.`empl_title` AS `empl_title`,`employee_bio`.`empl_fname` AS `empl_fname`,`employee_bio`.`empl_lname` AS `empl_lname`,`employee_bio`.`empl_dob` AS `empl_dob`,`employee_bio`.`empl_doj` AS `empl_doj` from `employee_bio` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `all_empl_bio_changes`
--

/*!50001 DROP TABLE IF EXISTS `all_empl_bio_changes`*/;
/*!50001 DROP VIEW IF EXISTS `all_empl_bio_changes`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `all_empl_bio_changes` AS select `empl_bio_changes`.`empl_id` AS `empl_id`,`empl_bio_changes`.`Activity` AS `Activity`,`empl_bio_changes`.`empl_title` AS `empl_title`,`empl_bio_changes`.`empl_fname` AS `empl_fname`,`empl_bio_changes`.`empl_lname` AS `empl_lname`,`empl_bio_changes`.`empl_dob` AS `empl_dob`,`empl_bio_changes`.`empl_doj` AS `empl_doj`,`empl_bio_changes`.`DoneBy` AS `DoneBy`,`empl_bio_changes`.`DoneAt` AS `DoneAt` from `empl_bio_changes` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `empl_salary_view`
--

/*!50001 DROP TABLE IF EXISTS `empl_salary_view`*/;
/*!50001 DROP VIEW IF EXISTS `empl_salary_view`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`joginder`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `empl_salary_view` AS select `empl_salary`.`empl_id` AS `empl_id`,`empl_salary`.`empl_month_salary` AS `empl_month_salary`,`empl_salary`.`empl_year_pay` AS `empl_year_pay`,`empl_salary`.`empl_grade_id` AS `empl_grade_id`,`empl_salary`.`empl_basic` AS `empl_basic`,`empl_salary`.`empl_AL` AS `empl_AL`,`empl_salary`.`empl_deductions` AS `empl_deductions` from `empl_salary` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `empl_work_details`
--

/*!50001 DROP TABLE IF EXISTS `empl_work_details`*/;
/*!50001 DROP VIEW IF EXISTS `empl_work_details`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `empl_work_details` AS select `empl_work`.`empl_id` AS `empl_id`,`empl_work`.`emp_title` AS `emp_title`,`empl_work`.`empl_from_date` AS `empl_from_date`,`empl_work`.`empl_to_date` AS `empl_to_date`,`grade_details`.`grade_name` AS `grade_name`,`department`.`dpt_name` AS `dpt_name` from (((`empl_work` join `department` on(`empl_work`.`dep_id` = `department`.`dpt_id`)) join `empl_grade_details` on(`empl_work`.`empl_id` = `empl_grade_details`.`empl_id`)) join `grade_details` on(`empl_grade_details`.`grade_id` = `grade_details`.`grade_id`)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `grade_details_view`
--

/*!50001 DROP TABLE IF EXISTS `grade_details_view`*/;
/*!50001 DROP VIEW IF EXISTS `grade_details_view`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`joginder`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `grade_details_view` AS select `grade_details`.`grade_id` AS `grade_id`,`grade_details`.`grade_name` AS `grade_name`,`grade_details`.`grade_basic` AS `grade_basic`,`grade_details`.`grade_HA` AS `grade_HA`,`grade_details`.`grade_TA` AS `grade_TA`,`grade_details`.`grade_MA` AS `grade_MA`,`grade_details`.`grade_bonus` AS `grade_bonus`,`grade_details`.`grade_tas` AS `grade_tas` from `grade_details` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-11-29  8:49:09
