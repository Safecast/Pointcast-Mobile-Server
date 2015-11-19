-- MySQL dump 10.13  Distrib 5.6.26, for osx10.10 (x86_64)
--
-- Host: localhost    Database: pointcast
-- ------------------------------------------------------
-- Server version	5.6.26

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `m_sensor_main`
--

LOCK TABLES `m_sensor_main` WRITE;
/*!40000 ALTER TABLE `m_sensor_main` DISABLE KEYS */;
INSERT INTO `m_sensor_main` VALUES (1,'Japan, Chiba, Ichikawa City, JAM','市川',100,0,0,0,0,0,0,0,0,10,1,NULL,NULL),(2,'Japan, Fukushima, Aizu Wakamatsu, Eyes Japan','会津若松',101,0,0,0,0,0,0,0,0,20,1,NULL,NULL),(3,'Japan, Fukushima, Iwaki','いわき',41,0,0,0,0,0,0,0,0,30,1,NULL,NULL),(4,'Japan, Fukushima, Iwaki 1','いわき 1',100101,100102,0,0,0,0,0,0,0,40,1,NULL,NULL),(5,'Japan, Fukushima, Matsukawa, Seirinji','松川',100011,100012,0,0,0,0,0,0,0,50,1,NULL,NULL),(6,'Japan, Fukushima, Minami Soma','南相馬',40,0,0,0,0,0,0,0,0,60,1,NULL,NULL),(7,'Japan, Fukushima, Minami-Soma , Odaka Worker\\\'s Base','南相馬 1',100081,0,0,0,0,0,0,0,0,70,1,NULL,NULL),(8,'Japan, Fukushima, Tomioka 1','富岡 1',100091,100092,0,0,0,0,0,0,0,80,1,NULL,NULL),(9,'Japan, Kanto, Tokyo, Dutch Embassy','東京',100141,100142,0,0,0,0,0,0,0,90,1,NULL,NULL),(10,'Japan, Shiga, Hikone, YR-Design Main','滋賀',126,0,0,0,0,0,0,0,0,100,1,NULL,NULL),(11,'Japan, Tokyo, Embasy of the Netherlands','東京',49,0,0,0,0,0,0,0,0,110,1,NULL,NULL),(12,'Japan, Tokyo, Minato-ku, Roppongi District','東京都港区六本木',100021,100022,0,0,0,0,0,0,0,120,1,NULL,NULL),(13,'Japan, Tokyo, Shibuya, Safecast Office','東京 safecast office',62,62,0,0,0,0,0,0,0,130,1,NULL,NULL),(14,'Swiss, Lausanne, Robin  54','スイス',54,0,0,0,0,0,0,0,0,140,1,NULL,NULL),(15,'Taiwan, Taipei, Fabcafe','台北 Fabcafe',75,0,0,0,0,0,0,0,0,150,1,NULL,NULL),(16,'United States, DC, Washington, NRDC','ワシントン',201011,201012,0,0,0,0,0,0,0,160,1,NULL,NULL),(17,'United States, NDRC','アメリカ NDRC',201001,0,0,0,0,0,0,0,0,170,1,NULL,NULL),(18,'USA, CA, Los Angeles, Griffith Park 61','アメリカ ロスアンゼルス',61,0,0,0,0,0,0,0,0,180,1,NULL,NULL),(19,'USA, California, Bodega Head','アメリカ カリフォルニア',78,0,0,0,0,0,0,0,0,190,1,NULL,NULL),(20,'USA, California, Palo Alto, Triple El','アメリカ パロアルト',106,107,0,0,0,0,0,0,0,200,1,NULL,NULL),(21,'USA, HI, Haiku, Hawaii','アメリカ ハワイ',79,0,0,0,0,0,0,0,0,210,1,NULL,NULL),(22,'USA, MA, Manchester','アメリカ マンチェスター',71,0,0,0,0,0,0,0,0,220,1,NULL,NULL),(23,'USA, MA, Newburyport, C-10 Office','アメリカ ニューバイポート',99,0,0,0,0,0,0,0,0,230,1,NULL,NULL),(24,'USA, Massachusetts, Cambridge','アメリカ マサチューセッツ',73,0,0,0,0,0,0,0,0,240,1,NULL,NULL),(25,'USA, USA, Massachusetts, Cambridge, MIT','アメリカ MIT',59,0,0,0,0,0,0,0,0,250,1,NULL,NULL),(26,'USA, MD, Silver Spring, NRDC office 5','アメリカ シルバースプリング',200051,200052,0,0,0,0,0,0,0,260,1,NULL,NULL),(27,'USA, VA , Alexandria, NRDC office','アメリカ アレクサンドラ',200011,200012,0,0,0,0,0,0,0,270,1,NULL,NULL),(28,'USA, Washington, NRDC','アメリカ NRDC',58,0,0,0,0,0,0,0,0,280,1,NULL,NULL),(29,'USA, Washington, Seattle','アメリカ シアトル',72,0,0,0,0,0,0,0,0,290,1,NULL,NULL),(30,'Japan, Fukushima, Iwaki 1','いわき 1',100102,100102,0,0,0,0,0,0,0,41,1,NULL,NULL),(31,'Japan, Fukushima, Matsukawa, Seirinji','松川',100012,100012,0,0,0,0,0,0,0,51,1,NULL,NULL),(32,'Japan, Fukushima, Tomioka 1','富岡 1',100092,100092,0,0,0,0,0,0,0,81,NULL,NULL,NULL),(33,'Japan, Tokyo, Minato-ku, Roppongi District','東京都港区六本木',100022,100022,0,0,0,0,0,0,0,120,NULL,NULL,NULL),(34,'United States, DC, Washington, NRDC','ワシントン',201012,201012,0,0,0,0,0,0,0,161,NULL,NULL,NULL),(35,'USA, California, Palo Alto, Triple El','アメリカ パロアルト',107,107,0,0,0,0,0,0,0,201,NULL,NULL,NULL),(36,'USA, MD, Silver Spring, NRDC office 5','アメリカ シルバースプリング',200052,200052,0,0,0,0,0,0,0,261,NULL,NULL,NULL);
/*!40000 ALTER TABLE `m_sensor_main` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-11-19 13:48:59
