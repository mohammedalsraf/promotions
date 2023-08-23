-- MySQL dump 10.13  Distrib 8.0.34, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: test
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.28-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Dumping events for database 'test'
--

--
-- Dumping routines for database 'test'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-08-23 19:55:44
-- MySQL dump 10.13  Distrib 8.0.34, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: promotion
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.28-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `alert`
--

DROP TABLE IF EXISTS `alert`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `alert` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `alertDay` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=77 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alert`
--

LOCK TABLES `alert` WRITE;
/*!40000 ALTER TABLE `alert` DISABLE KEYS */;
INSERT INTO `alert` VALUES (28,30),(29,30),(30,30),(31,400),(32,1000),(33,1),(34,30),(35,30),(36,400),(37,900),(38,1000),(39,2000),(40,1100),(41,1200),(42,1500),(43,1400),(44,1450),(45,1420),(46,1430),(47,1440),(48,1450),(49,1445),(50,1444),(51,1445),(52,1445),(53,30),(54,90),(55,30),(56,10),(57,30),(58,30),(59,29),(60,29),(61,29),(62,29),(63,31),(64,32),(65,33),(66,25),(67,29),(68,28),(69,30),(70,30),(71,30),(72,30),(73,30),(74,30),(75,30),(76,30);
/*!40000 ALTER TABLE `alert` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ct`
--

DROP TABLE IF EXISTS `ct`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ct` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `ct` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ct`
--

LOCK TABLES `ct` WRITE;
/*!40000 ALTER TABLE `ct` DISABLE KEYS */;
INSERT INTO `ct` VALUES (3,'ابتدائية'),(4,'متوسطة'),(5,'اعدادية'),(6,'بكلوريوس'),(7,'ماجستير'),(15,'دكتوراه');
/*!40000 ALTER TABLE `ct` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `definealawat`
--

DROP TABLE IF EXISTS `definealawat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `definealawat` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `degree` int(10) NOT NULL,
  `amount` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `definealawat`
--

LOCK TABLES `definealawat` WRITE;
/*!40000 ALTER TABLE `definealawat` DISABLE KEYS */;
INSERT INTO `definealawat` VALUES (8,1,3000),(9,2,3000),(10,8,3000);
/*!40000 ALTER TABLE `definealawat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `emp`
--

DROP TABLE IF EXISTS `emp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `emp` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `archNumber` int(15) NOT NULL,
  `recordNumber` int(15) NOT NULL,
  `empName` varchar(255) NOT NULL,
  `gander` varchar(255) NOT NULL,
  `service` varchar(255) NOT NULL,
  `jd` varchar(255) NOT NULL,
  `ct` varchar(255) NOT NULL,
  `empJopPos` varchar(255) NOT NULL,
  `degree` int(10) NOT NULL,
  `stage` int(10) NOT NULL,
  `currentSalary` int(10) NOT NULL,
  `lastAlawaDate` date NOT NULL,
  `thanksDetails` varchar(1000) NOT NULL,
  `oqobatDetails` varchar(1000) NOT NULL,
  `thanks` int(10) NOT NULL,
  `oqobat` int(10) NOT NULL,
  `newAlawa` varchar(255) NOT NULL,
  `lastTarfee` date NOT NULL,
  `asgria` int(10) NOT NULL,
  `thanksT` int(10) NOT NULL,
  `oqobatT` int(10) NOT NULL,
  `newTarfee` date NOT NULL,
  `newSalary` int(15) NOT NULL,
  `startDate` date NOT NULL,
  `towld` date NOT NULL,
  `taqadDate` date NOT NULL,
  `notes` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `emp`
--

LOCK TABLES `emp` WRITE;
/*!40000 ALTER TABLE `emp` DISABLE KEYS */;
INSERT INTO `emp` VALUES (24,1232,23213213,'محمد علي حسين','ذكر','1','م.مبرمج','ابتدائية','المصب العام',5,1,428000,'2022-09-19','dsf',' dsfdf                                             ',3,3,'2023-09-19','2023-08-04',4,3,3,'2027-08-04',434000,'2023-08-05','2023-08-16','2086-08-16','                                              '),(26,1237,4324234,'على محمد','ذكر','1','م.مبرمج','متوسطة','4',6,3,374000,'2022-09-30','asdsad',' dfgfdg               ',4,2,'2023-09-28','2023-08-19',4,324,324,'2027-08-19',380000,'2023-08-18','2023-08-05','2086-08-05','                '),(27,1422,14456,'كاظم علي كاظم','ذكر','1','م.مبرمج','ابتدائية','المصب العام',6,3,374000,'2023-08-20','كتاب مرقم 13433في 2023',' لايوجد ',30,0,'2024-07-21','2023-05-09',4,30,0,'2027-04-09',380000,'2023-08-13','1991-03-19','2054-03-19','  '),(28,14667,124457,'علي محمد جواد حسين','ذكر','1','م.مبرمج','ماجستير','وزارة الصحة',6,3,374000,'2023-08-20','كتاب شكر دائرة المرقم 32324 تاريخ 2023',' لايوجد    ',60,0,'2024-06-21','2023-07-31',4,30,0,'2027-07-01',380000,'2023-08-07','1996-02-20','2059-02-20','     ');
/*!40000 ALTER TABLE `emp` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jd`
--

DROP TABLE IF EXISTS `jd`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jd` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `jd` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jd`
--

LOCK TABLES `jd` WRITE;
/*!40000 ALTER TABLE `jd` DISABLE KEYS */;
INSERT INTO `jd` VALUES (8,'م.مبرمج'),(9,'م.مهندس'),(11,'ر.ملاحظين'),(19,'باحث');
/*!40000 ALTER TABLE `jd` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `salary`
--

DROP TABLE IF EXISTS `salary`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `salary` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `degree` int(10) NOT NULL,
  `stage` int(10) NOT NULL,
  `salary` int(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=70 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `salary`
--

LOCK TABLES `salary` WRITE;
/*!40000 ALTER TABLE `salary` DISABLE KEYS */;
INSERT INTO `salary` VALUES (4,10,1,170000),(5,10,2,173000),(6,10,3,176000),(7,10,4,179000),(8,10,5,182000),(9,10,6,185000),(10,10,7,188000),(11,10,8,191000),(12,10,9,194000),(13,10,10,197000),(14,9,1,210000),(15,9,2,213000),(16,9,3,216000),(17,9,4,219000),(18,9,5,222000),(19,9,6,225000),(20,9,7,228000),(21,9,8,231000),(22,9,9,234000),(23,9,10,237000),(24,8,1,260000),(25,8,2,263000),(26,8,3,266000),(27,8,4,269000),(28,8,5,272000),(29,8,6,275000),(30,8,7,278000),(31,8,8,281000),(32,8,9,284000),(33,8,10,287000),(34,7,1,296000),(35,7,2,302000),(36,7,3,308000),(37,7,4,314000),(38,7,5,320000),(39,7,6,326000),(40,7,7,332000),(41,7,8,338000),(42,7,9,344000),(43,7,10,350000),(44,6,1,362000),(45,6,2,368000),(46,6,3,374000),(47,6,4,380000),(48,6,5,386000),(49,6,6,392000),(50,6,7,398000),(51,6,8,404000),(52,6,9,410000),(53,6,10,416000),(54,5,1,428000),(55,5,2,434000),(56,5,3,440000),(57,5,4,446000),(58,5,5,452000),(59,5,6,458000),(60,5,7,464000),(61,5,8,470000),(62,5,9,476000),(64,5,10,482000);
/*!40000 ALTER TABLE `salary` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (7,'1','1');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'promotion'
--

--
-- Dumping routines for database 'promotion'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-08-23 19:55:44
