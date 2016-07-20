-- MySQL dump 10.14  Distrib 5.5.37-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: pointcast_staging
-- ------------------------------------------------------
-- Server version    5.5.37-MariaDB

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
-- Table structure for table `m_sensor_main`
--

DROP TABLE IF EXISTS `m_sensor_main`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `m_sensor_main` (
  `m_sensor_main_id` int(11) NOT NULL DEFAULT '0',
  `name_en` varchar(255) DEFAULT NULL,
  `name_jp` varchar(255) DEFAULT NULL,
  `m_sensor_information_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT 'm_sensor_information_id',
  `latitude` float(10,3) DEFAULT NULL,
  `longitude` float(10,3) DEFAULT NULL,
  `sensor1_device_id` int(11) DEFAULT '0',
  `sensor2_device_id` int(11) DEFAULT '0',
  `sensor3_device_id` int(11) DEFAULT '0',
  `sensor4_device_id` int(11) DEFAULT '0',
  `sensor5_device_id` int(11) DEFAULT '0',
  `sensor6_device_id` int(11) DEFAULT '0',
  `sensor7_device_id` int(11) DEFAULT '0',
  `sensor8_device_id` int(11) DEFAULT '0',
  `sensor9_device_id` int(11) DEFAULT '0',
  `view_order` int(11) DEFAULT NULL,
  `enable` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`m_sensor_main_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `m_sensor_main`
--

LOCK TABLES `m_sensor_main` WRITE;
/*!40000 ALTER TABLE `m_sensor_main` DISABLE KEYS */;
INSERT INTO `m_sensor_main` VALUES (1,'Japan, Chiba, Ichikawa City, JAM','市川',7,35.746,139.918,100,0,0,0,0,0,0,0,0,10,1,NULL,NULL),(2,'Japan, Fukushima, Aizu Wakamatsu, Eyes Japan','会津若松',7,37.493,139.933,101,0,0,0,0,0,0,0,0,20,0,NULL,NULL),(3,'Japan, Fukushima, Iwaki','いわき',1,37.011,140.925,41,0,0,0,0,0,0,0,0,30,0,NULL,NULL),(4,'Japan, Fukushima, Iwaki 1','いわき 1',4,37.011,140.925,100101,100102,0,0,0,0,0,0,0,40,1,NULL,NULL),(5,'Japan, Fukushima, Matsukawa, Seirinji','松川',6,37.659,140.459,100011,100012,0,0,0,0,0,0,0,50,1,NULL,NULL),(6,'Japan, Fukushima, Minami Soma','南相馬',7,37.563,140.992,40,0,0,0,0,0,0,0,0,60,0,NULL,NULL),(7,'Japan, Fukushima, Minami-Soma , Odaka Worker\\\'s Base','南相馬 1',6,37.563,140.995,100081,0,0,0,0,0,0,0,0,70,1,NULL,NULL),(8,'Japan, Fukushima, Tomioka 1','富岡 1',4,37.329,140.978,100091,100092,0,0,0,0,0,0,0,80,1,NULL,NULL),(9,'Japan, Kanto, Tokyo, Dutch Embassy','東京',8,35.662,139.742,100141,100142,0,0,0,0,0,0,0,90,1,NULL,NULL),(10,'Japan, Shiga, Hikone, YR-Design Main','滋賀',2,35.268,136.249,126,0,0,0,0,0,0,0,0,100,1,NULL,NULL),(11,'Japan, Tokyo, Embasy of the Netherlands','東京',7,35.662,139.745,49,0,0,0,0,0,0,0,0,110,0,NULL,NULL),(12,'Japan, Tokyo, Minato-ku, Roppongi District','東京都港区六本木',2,35.659,139.728,100021,100022,0,0,0,0,0,0,0,120,1,NULL,NULL),(13,'Japan, Tokyo, Shibuya, Safecast Office','東京 safecast office',6,35.656,139.695,62,62,0,0,0,0,0,0,0,130,0,NULL,NULL),(14,'Swiss, Lausanne, Robin  54','スイス',2,46.524,6.631,54,0,0,0,0,0,0,0,0,140,1,NULL,NULL),(15,'Taiwan, Taipei, Fabcafe','台北 Fabcafe',6,25.044,121.529,75,0,0,0,0,0,0,0,0,150,1,NULL,NULL),(16,'United States, DC, Washington, NRDC','ワシントン',5,38.931,-76.983,201011,201012,0,0,0,0,0,0,0,160,1,NULL,NULL),(17,'United States, NDRC','アメリカ NDRC',5,38.905,-77.035,201001,0,0,0,0,0,0,0,0,170,1,NULL,NULL),(18,'USA, CA, Los Angeles, Griffith Park 61','アメリカ ロスアンゼルス',6,34.122,-118.270,61,0,0,0,0,0,0,0,0,180,1,NULL,NULL),(19,'USA, California, Bodega Head','アメリカ カリフォルニア',6,38.315,-123.075,78,0,0,0,0,0,0,0,0,190,1,NULL,NULL),(20,'USA, California, Palo Alto, Triple El','アメリカ パロアルト',3,37.443,-122.128,106,107,0,0,0,0,0,0,0,200,1,NULL,NULL),(21,'USA, HI, Haiku, Hawaii','アメリカ ハワイ',6,20.911,-156.289,79,0,0,0,0,0,0,0,0,210,1,NULL,NULL),(22,'USA, MA, Manchester','アメリカ マンチェスター',6,42.565,-70.784,71,0,0,0,0,0,0,0,0,220,1,NULL,NULL),(23,'USA, MA, Newburyport, C-10 Office','アメリカ ニューバイポート',5,42.812,-70.873,99,0,0,0,0,0,0,0,0,230,1,NULL,NULL),(24,'USA, Massachusetts, Cambridge','アメリカ マサチューセッツ',6,42.381,-71.112,73,0,0,0,0,0,0,0,0,240,1,NULL,NULL),(25,'USA, USA, Massachusetts, Cambridge, MIT','アメリカ MIT',6,42.361,-71.088,59,0,0,0,0,0,0,0,0,250,1,NULL,NULL),(26,'USA, MD, Silver Spring, NRDC office 5','アメリカ シルバースプリング',7,0.000,-102.000,200051,200052,0,0,0,0,0,0,0,260,0,NULL,NULL),(27,'USA, VA , Alexandria, NRDC office','アメリカ アレクサンドラ',6,38.828,-77.113,200011,200012,0,0,0,0,0,0,0,270,1,NULL,NULL),(28,'USA, Washington, NRDC','アメリカ NRDC',6,40.329,-76.830,58,0,0,0,0,0,0,0,0,280,0,NULL,NULL),(29,'USA, Washington, Seattle','アメリカ シアトル',6,-76.830,-122.345,72,0,0,0,0,0,0,0,0,290,1,NULL,NULL),(30,'Japan, Fukushima, Iwaki 1','いわき 1',2,37.011,140.925,100102,100102,0,0,0,0,0,0,0,41,1,NULL,NULL),(31,'Japan, Fukushima, Matsukawa, Seirinji','松川',2,37.011,140.925,100012,100012,0,0,0,0,0,0,0,51,1,NULL,NULL),(32,'Japan, Fukushima, Tomioka 1','富岡 1',3,37.329,140.995,100092,100092,0,0,0,0,0,0,0,81,1,NULL,NULL),(33,'Japan, Tokyo, Minato-ku, Roppongi District','東京都港区六本木',6,35.659,139.728,100022,100022,0,0,0,0,0,0,0,120,1,NULL,NULL),(34,'United States, DC, Washington, NRDC','ワシントン',3,38.931,-76.983,201012,201012,0,0,0,0,0,0,0,161,1,NULL,NULL),(35,'USA, California, Palo Alto, Triple El','アメリカ パロアルト',5,37.443,-122.128,107,107,0,0,0,0,0,0,0,201,1,NULL,NULL),(36,'USA, MD, Silver Spring, NRDC office 5','アメリカ シルバースプリング',2,0.000,-102.000,200052,200052,0,0,0,0,0,0,0,261,0,NULL,NULL);
/*!40000 ALTER TABLE `m_sensor_main` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `m_sensor_information`
--

DROP TABLE IF EXISTS `m_sensor_information`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `m_sensor_information` (
  `m_sensor_information_id` int(11) NOT NULL DEFAULT '0',
  `name` varchar(255) DEFAULT NULL,
  `conversion_rate` int(11) NOT NULL DEFAULT '0',
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`m_sensor_information_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `m_sensor_information`
--

LOCK TABLES `m_sensor_information` WRITE;
/*!40000 ALTER TABLE `m_sensor_information` DISABLE KEYS */;
INSERT INTO `m_sensor_information` VALUES (1,'Hawk7313',334,'2016-01-06 22:30:40','2016-01-06 22:30:40'),(2,'LND712',120,'2016-01-06 22:30:58','2016-01-06 22:30:58'),(3,'LND7128',120,'2016-01-06 22:31:14','2016-01-06 22:31:14'),(4,'LND7138',334,'2016-01-06 22:31:35','2016-01-06 22:31:35'),(5,'LND73126',334,'2016-01-06 22:31:51','2016-01-06 22:31:51'),(6,'LND7317',334,'2016-01-06 22:32:07','2016-01-06 22:32:07'),(7,'LND7318',334,'2016-01-06 22:32:23','2016-01-06 22:32:23'),(8,'Pointcast V1.0',334,'2016-01-06 22:32:38','2016-01-06 22:32:38');
/*!40000 ALTER TABLE `m_sensor_information` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-01-06 22:59:04
