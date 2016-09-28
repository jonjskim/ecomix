CREATE DATABASE  IF NOT EXISTS `ecomixdb` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `ecomixdb`;
-- MySQL dump 10.13  Distrib 5.7.9, for osx10.9 (x86_64)
--
-- Host: 127.0.0.1    Database: ecomixdb
-- ------------------------------------------------------
-- Server version	5.5.42

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
-- Table structure for table `addresses`
--

DROP TABLE IF EXISTS `addresses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `addresses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `street_number` varchar(255) DEFAULT NULL,
  `apt` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `zipcode` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_addresses_users1_idx` (`user_id`),
  CONSTRAINT `fk_addresses_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `addresses`
--

LOCK TABLES `addresses` WRITE;
/*!40000 ALTER TABLE `addresses` DISABLE KEYS */;
/*!40000 ALTER TABLE `addresses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `books`
--

DROP TABLE IF EXISTS `books`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `books` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `author` varchar(255) DEFAULT NULL,
  `price` float DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `books`
--

LOCK TABLES `books` WRITE;
/*!40000 ALTER TABLE `books` DISABLE KEYS */;
INSERT INTO `books` VALUES (1,'Civil War','Mark Millar',5.99),(2,'Monkey King','Wei Dong Chen',0.99),(3,'Demon Beast Invasion','Dave Cooper',99.99),(4,'Khoa Tried to Go To America','Jonathan Kim',999.99),(5,'Spider Man Memes','Memes',9.99),(6,'Iron Man','Kierron',15.99),(7,'I Wish Daddy Didn\'t Drink So Much','Judith Vigna',4.99),(8,'Do You Want To Play With My Balls?','Cifaldi Brothers',3.99),(9,'My Big Sister Takes Drugs','Judith Vigna',5.99),(10,'The Night Dad Want To Jail','Mellissa Higgins',8.99),(11,'All My Friends Are Dead','Avery Monsen',4.99),(12,'Games You Can Play with Your Pussy: And Lots of Other Stuff','Ira Alterman',9.99),(13,'Dancing with Jesus: Featuring a Host of Miraculous Moves','Sam Stall',10.19),(14,'Death of Superman','Dan Jurgens',9.99),(15,'Batman: The Killing Joke','Alan Moore',9.99),(16,'Dragon Ball','Akira Toriyama',8.99),(17,'Dragons Love Tacos','Adam Rubin',12.99),(18,'Night of the Living Dummy','R.L. Stine',4.99),(19,'The 13th Floor: A Ghost Story','Sid Fleschman',19.99),(20,'Kim Jong-Un: SuperHuman','Eduardo Baik',69.96);
/*!40000 ALTER TABLE `books` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `paids`
--

DROP TABLE IF EXISTS `paids`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `paids` (
  `user_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `paids`
--

LOCK TABLES `paids` WRITE;
/*!40000 ALTER TABLE `paids` DISABLE KEYS */;
/*!40000 ALTER TABLE `paids` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reviews`
--

DROP TABLE IF EXISTS `reviews`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reviews` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` text,
  `rating` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `book_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_reviews_users1_idx` (`user_id`),
  KEY `fk_reviews_books1_idx` (`book_id`),
  CONSTRAINT `fk_reviews_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reviews`
--

LOCK TABLES `reviews` WRITE;
/*!40000 ALTER TABLE `reviews` DISABLE KEYS */;
INSERT INTO `reviews` VALUES (11,'Nice book, didn\'t expect the end. Highly recomend',4,1,1,'2016-05-26 01:55:02'),(12,'I wrote this book and I highly approve of this! This is a story of a boy who had big dreams to come to America... But failed as you can see in the cover photo. He fell into the ocean and was never found again...',5,5,4,'2016-05-26 01:58:32'),(13,'What was I thinking...? Eduardo Baik is the worst author ever!',1,5,20,'2016-05-26 01:59:24'),(14,'Recommended by a weird friend. He has really weird taste...',1,5,3,'2016-05-26 01:59:48'),(15,'I LOVE DANCING AND I LOVE JESUS! PERFECT COMBINATION OF GOSPEL AND DANCING!',5,5,13,'2016-05-26 02:00:20'),(16,'This book got me through some tough times... Luckily my pussy was there to cheer me up!',5,5,12,'2016-05-26 02:00:49'),(17,'This book kept me rooting for Khoa...all the way until the end. Then I got tired of him not making it.  It was almost as if the author was aiming to fustrate the hell out of the reader.',4,6,4,'2016-05-26 02:03:45'),(18,'Absolutely ground breaking! It\'s the \"Coming to America\" of our generation.',5,7,4,'2016-05-26 02:05:53'),(19,'I love tacos, Dragons love tacos. This book understands my feelings.',5,7,17,'2016-05-26 02:07:11'),(20,'Absolutely disgusting. This author should stick to coding.',1,7,20,'2016-05-26 02:08:02'),(21,'Jesus has the moves like Jagger!',5,7,13,'2016-05-26 02:08:34'),(22,'Classic!',1,7,3,'2016-05-26 02:09:08'),(23,'Best comic book of all time.. The feels!',5,7,14,'2016-05-26 02:09:37'),(24,'Mr. Akira Toriyama\'s absolute masterpiece!',5,7,16,'2016-05-26 02:10:26'),(25,'Could have scored higher if it wasn\'t too scary!',3,7,18,'2016-05-26 02:11:15'),(26,'I LIKE PLAYING WITH MY BALLS. SO I ASK GIRLS TO PLAY WITH THEM TOO!!',5,8,8,'2016-05-26 02:15:46'),(27,'GREAT BOOK!! EVEN THOUGH HE DIED AT THE END WHEN HE FELL OFF THE PLANE AND A AFRICAN TRIBE CAME IN AND ATE HIM! EVEN THOUGH THEY ALL GOT SICK AND DIED FROM A HEART ATTACK,  BECAUSE THERE WAS TOO MUCH FAT ON THE BODY!',5,8,4,'2016-05-26 02:18:47'),(28,'HAVING YOUR BIG SISTER DO DRUGS IS THE BEST. BECAUSE THEN SHE CAN FIND YOU THE BEST HOOKUP!',5,8,9,'2016-05-26 02:20:06'),(29,'GOOD COMIC AND AWESOME MOVIE!',5,8,1,'2016-05-26 02:20:42'),(30,'BATMAN IS A JOKE! THATS WHY MARVEL ALWAYS HAS TO COME IN AND SAVE THE DAY!',1,8,15,'2016-05-26 02:21:33'),(31,'This book gave me a boner.  I love KIM!!!!',5,9,20,'2016-05-26 02:26:50'),(32,'this was a terrible movie.  where the hell is Thor?!',1,10,1,'2016-05-26 03:06:58'),(33,'Nce book',3,1,2,'2016-05-26 18:38:44');
/*!40000 ALTER TABLE `reviews` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_buy_book`
--

DROP TABLE IF EXISTS `user_buy_book`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_buy_book` (
  `user_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_buy_book`
--

LOCK TABLES `user_buy_book` WRITE;
/*!40000 ALTER TABLE `user_buy_book` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_buy_book` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Khoa','Nguyen','khoanguyenanp@yahoo.com','9c871e735c527fd5dd9d36ad0f185f0e'),(2,'Jonathan','Kim','jkim@kardasian.xxx','25d55ad283aa400af464c76d713c07ad'),(3,'Jesus','Gonzales','jesus@christ.com','25d55ad283aa400af464c76d713c07ad'),(4,'Jarred','Smith','mrsmith@xxx.com','25d55ad283aa400af464c76d713c07ad'),(5,'Jonathan','Kim','jon@kim.com','5f4dcc3b5aa765d61d8327deb882cf99'),(6,'phil','lee','philip@lee.com','8ce87b8ec346ff4c80635f667d1592ae'),(7,'Jesus','Gonzalez','chuyelregio5@yahoo.com','6f35270b2924be444cbb4f714af4734d'),(8,'Jarred','Smith','jreddysmith@yahoo.com','429bdc8b5839eace4c0daa2b5a1a55ac'),(9,'Roger','Tafoya','pickle@pickle.com','5efc94b9ecd57013241abbab2321df33'),(10,'Daniel','Kim','sundo47@gmail.com','482c811da5d5b4bc6d497ffa98491e38'),(11,'Brian','Nguyen','brian@gmail.com','25d55ad283aa400af464c76d713c07ad');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-05-26 12:16:14
