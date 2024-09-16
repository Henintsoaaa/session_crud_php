-- MySQL dump 10.13  Distrib 8.0.39, for Linux (x86_64)
--
-- Host: localhost    Database: ecole
-- ------------------------------------------------------
-- Server version	8.0.39-0ubuntu0.24.04.2

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `parcours`
--

DROP TABLE IF EXISTS `parcours`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `parcours` (
  `id` int NOT NULL AUTO_INCREMENT,
  `parcours` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `parcours`
--

LOCK TABLES `parcours` WRITE;
/*!40000 ALTER TABLE `parcours` DISABLE KEYS */;
INSERT INTO `parcours` VALUES (1,'Informatique'),(2,'Mathematique'),(3,'Physique'),(4,'Chimie');
/*!40000 ALTER TABLE `parcours` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_resets` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `expires_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
INSERT INTO `password_resets` VALUES (1,'andriamifidyhenintsoa@gmail.com','37204b64e4a901546fc54aac5805be1a60ff51506c887f9f9c0fd3525123c80362fcfda668531b85809874cafd23c0c2d8f1','2024-09-15 17:44:07'),(2,'andriamifidyhenintsoa@gmail.com','843aa091912395f98dcc274e48804108d99228cc7b7ca6dafba0c28882c621baa53cdd476254ab488f9582f08815301df935','2024-09-15 17:57:24'),(3,'andriamifidyhenintsoa@gmail.com','fc0e565d10e5ecddcac0b5903f339ee2ea612619bd7338433dc58a6f7d7ec6d8ddb1070d42cf99109e0dfc1c7b97617e5f57','2024-09-15 18:04:33'),(4,'andriamifidyhenintsoa@gmail.com','dac1d2d2eda2ba19a7dc2e0381c7103a5c0e37162dc14ee5d7eed8f8150a4f05889e8c9e0f64d9f30efaab8caec75918e9a5','2024-09-15 18:05:34'),(5,'andriamifidyhenintsoa@gmail.com','19c5e9b19aeb7ea02cc3e8bb44451e9b6d55c4796130155c2b520ab1805077688cb0feddc01c04d4ee68fb8e4f2fc6727f67','2024-09-15 18:06:51'),(6,'andriamifidyhenintsoa@gmail.com','73addbe5b177f1050f2e664f972c5843beb5d1efafa2f7b31997af588e55c19c54f2879ad04e1c350b54bddb04e9132decc4','2024-09-15 18:20:19'),(7,'andriamifidyhenintsoa@gmail.com','3ed99774b5d759838478e4a66dc660009f0f2238d3e3a15ac48228c91c811180fa4a3499ed1e0713ea7cd9e362da437d7aab','2024-09-15 18:24:23'),(8,'andriamifidyhenintsoa@gmail.com','e629f60c530531387c5c0664a23061171310dc77a5ad851728a509d5b3fec66efafa5352dbc991a84ab0ceb72b671319b9a8','2024-09-15 18:29:14'),(9,'andriamifidyhenintsoa@gmail.com','cb28aae742529a08e247936add34097b6be4f2c1bcb10bb037f5bd6c5d1a73af31f203f540e58e061da114d5167296a1155b','2024-09-15 19:05:23'),(10,'test@gmail.com','22ed1a7086c5f89ad006340b5bdc7f178185ecb1bb51c047d189aa5ecf4ef94625dc503564456dce8595d123880030672e86','2024-09-16 13:27:43'),(11,'test@gmail.com','a0e19b01a6dd4639d0c34f24750b06b10e0dd449d5c35ed84266a4943aa56817f1c4c5f4690eb947daf63e3a464cc52347c8','2024-09-16 13:31:02');
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `students` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `parcours` varchar(255) DEFAULT NULL,
  `sexe` enum('Homme','Femme') DEFAULT NULL,
  `date_naissance` date DEFAULT NULL,
  `adresse` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `students`
--

LOCK TABLES `students` WRITE;
/*!40000 ALTER TABLE `students` DISABLE KEYS */;
INSERT INTO `students` VALUES (11,'Mins','Henintsoa','Mathematique','Femme','2024-09-25','II A Soavimbahoaka'),(14,'hents','mino','Physique','Femme','2024-09-11','II A Soavimbahoaka'),(15,'Charline','Joe','Informatique','Homme','2024-09-02','antananarivo');
/*!40000 ALTER TABLE `students` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `pass` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (4,'henintsoa','azert','test@gmail.com');
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

-- Dump completed on 2024-09-16 15:34:50
