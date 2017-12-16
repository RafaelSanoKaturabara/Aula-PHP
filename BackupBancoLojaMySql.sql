CREATE DATABASE  IF NOT EXISTS `loja` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `loja`;
-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: localhost    Database: loja
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.28-MariaDB

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
-- Table structure for table `categoria`
--

DROP TABLE IF EXISTS `categoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categoria` (
  `idcategoria` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `descricao` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idcategoria`),
  UNIQUE KEY `idcategoria` (`idcategoria`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categoria`
--

LOCK TABLES `categoria` WRITE;
/*!40000 ALTER TABLE `categoria` DISABLE KEYS */;
INSERT INTO `categoria` VALUES (1,'Destaques');
/*!40000 ALTER TABLE `categoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cliente`
--

DROP TABLE IF EXISTS `cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cliente` (
  `idcliente` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) DEFAULT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `senha` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idcliente`),
  UNIQUE KEY `idcliente` (`idcliente`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cliente`
--

LOCK TABLES `cliente` WRITE;
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `compra`
--

DROP TABLE IF EXISTS `compra`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `compra` (
  `idcompra` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `idcliente` bigint(20) DEFAULT NULL,
  `datacompra` datetime DEFAULT NULL,
  `nomecomprador` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idcompra`),
  UNIQUE KEY `idcompra` (`idcompra`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `compra`
--

LOCK TABLES `compra` WRITE;
/*!40000 ALTER TABLE `compra` DISABLE KEYS */;
INSERT INTO `compra` VALUES (1,NULL,NULL,'rafae@'),(4,NULL,NULL,'rafael@'),(14,NULL,NULL,'Rafael'),(15,NULL,NULL,'rafael.katurabara@fatec.sp.gov.br'),(16,NULL,NULL,'Thais');
/*!40000 ALTER TABLE `compra` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `itemcompra`
--

DROP TABLE IF EXISTS `itemcompra`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `itemcompra` (
  `iditemcompra` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `quantidade` int(11) DEFAULT NULL,
  `idproduto` bigint(20) DEFAULT NULL,
  `idcompra` bigint(20) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`iditemcompra`),
  UNIQUE KEY `iditemcompra` (`iditemcompra`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `itemcompra`
--

LOCK TABLES `itemcompra` WRITE;
/*!40000 ALTER TABLE `itemcompra` DISABLE KEYS */;
INSERT INTO `itemcompra` VALUES (1,1,3,4,0),(2,1,4,4,0),(3,1,7,4,0),(4,1,4,4,0),(5,1,4,4,0),(6,1,4,4,1),(7,1,4,4,1),(8,1,3,4,1),(9,1,3,4,1),(10,1,3,4,1),(11,1,3,4,1),(12,1,3,4,1),(13,1,1,4,1),(14,1,4,4,1),(15,1,21,15,1),(16,1,2,4,1),(17,1,5,15,1),(18,1,13,16,1),(19,1,18,16,1),(20,1,16,4,1),(21,1,6,16,1);
/*!40000 ALTER TABLE `itemcompra` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `produto`
--

DROP TABLE IF EXISTS `produto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `produto` (
  `idproduto` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) DEFAULT NULL,
  `preco` decimal(10,2) DEFAULT NULL,
  `nomeimagem` varchar(255) DEFAULT NULL,
  `idcategoria` bigint(20) DEFAULT NULL,
  `categoriadescricao` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idproduto`),
  UNIQUE KEY `idproduto` (`idproduto`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `produto`
--

LOCK TABLES `produto` WRITE;
/*!40000 ALTER TABLE `produto` DISABLE KEYS */;
INSERT INTO `produto` VALUES (1,'Mesa de Som',754.45,'img/1.jpg',1,'Destaque'),(2,'CÃ¢mera FotogrÃ¡fica Sony',3450.00,'img/2.jpg',1,'Destaque'),(3,'Embalagens De Limpeza Diversas',5.66,'img/3.jpg',1,'Destaque'),(4,'Bebidas',7.85,'img/4.jpg',1,'Destaque'),(5,'Celular Xiaomi Mi 5',925.00,'img/mi5.jpg',1,'Destaque'),(6,'TÃ©cnica de Estudo',1000.00,'img/6.jpg',1,'Destaque'),(7,'Cif',3.25,'img/7.jpg',1,'Destaque'),(8,'Cristal ',35.60,'img/8.jpg',1,'Destaque'),(9,'Esgotado',6.55,'img/9.jpg',1,'Destaque'),(10,'Mr. Muscle',6.55,'img/10.jpg',1,'Destaque'),(11,'Kit Caneta Bic',6.77,'img/kitcaneta.jpg',1,'Destaque'),(12,'Notebook',3500.00,'img/notebook.jpg',1,'Destaque'),(13,'Copo de plastico',5.66,'img/copoplastico.jpg',1,'Destaque'),(14,'Mentos',5.66,'img/mentos.jpg',NULL,'Destaque'),(15,'Mentos Chiclete',5.66,'img/mentoschiclete.jpg',NULL,'Destaque'),(16,'Capacete Shoei',7056.90,'img/capacete.jpg',NULL,'Destaque'),(17,'Seringa',2.75,'img/seringa.jpg',NULL,'Destaque'),(18,'Pastel de Flango',7.50,'img/pastel.jpg',NULL,'Destaque'),(19,'Escova Colgate',5.45,'img/escova.jpg',NULL,'Destaque'),(20,'Carteira De couro',75.00,'img/carteira.jpg',NULL,'Destaque'),(21,'Escova de Cabelo Oval',21.70,'img/escovacabelo.jpg',NULL,'Escova de Cabelo'),(22,'Chaveiros Sortidos',5.55,'img/chaveiro.jpg',NULL,'Destaque'),(23,'Carteira de couro',75.00,'img/carteira2.jpg',NULL,'Destaque');
/*!40000 ALTER TABLE `produto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'loja'
--

--
-- Dumping routines for database 'loja'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-11-23 18:43:54
