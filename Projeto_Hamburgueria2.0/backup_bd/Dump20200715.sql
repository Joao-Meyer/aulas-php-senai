-- MySQL dump 10.13  Distrib 8.0.16, for Win64 (x86_64)
--
-- Host: localhost    Database: dbhonkerburger
-- ------------------------------------------------------
-- Server version	8.0.16

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
 SET NAMES utf8 ;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `tblconteudo`
--

DROP TABLE IF EXISTS `tblconteudo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `tblconteudo` (
  `idConteudo` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(200) DEFAULT NULL,
  `imagem` varchar(200) DEFAULT NULL,
  `texto` text NOT NULL,
  `visibilidade` tinyint(1) NOT NULL,
  `destino` char(1) NOT NULL,
  PRIMARY KEY (`idConteudo`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblconteudo`
--

LOCK TABLES `tblconteudo` WRITE;
/*!40000 ALTER TABLE `tblconteudo` DISABLE KEYS */;
INSERT INTO `tblconteudo` VALUES (18,'O que somos','4a66d4621c7a2d4a25e21794992e2c1c.jpg','O Animalchef é uma marca baseada na produção de alimentos livres de ingredientes de origem animal. Prezamos muito pelo sabor e qualidade do que fazemos, pensamos a comida vegana para veganos e não-veganos. Estamos aqui pra quebrar paradigmas, mostrando que comida vegana não precisa ter soja, ser cara, sem graça, ou fitness. Ela pode ser Junk e deliciosa.',1,'s'),(21,'Compromisso','','Firmamos o compromisso com nossos clientes e com o planeta sobre nunca vender produtos de origem animal. Buscaremos sempre ingredientes de qualidade, evitar sempre que possível, conservantes e ingredientes industrializados. ',1,'s'),(22,'Pq Hambúrguer?','c2688fc2d9f1fe1444d11433ec3fe957.jpg','O hambúrguer é uma das comidas mais populares da terra, ele está ligado à várias memórias afetivas de muitos de nós, ele é prático, rápido e delicioso.',1,'s'),(23,'O nosso Hambúrguer','','Feito de arroz 7 grãos, lentilha vermelha, cenoura, beterraba, farinha de mandioca, especiarias e sal rosa. No arroz 7 grãos, existe grão de trigo, portanto há uma pequena quantidade de glúten. Temos hambúrguer de 150g e 75g.',1,'s'),(24,'A Hamburgueria','','Hamburgueria com preço justo, cardápio simples, maioria dos ingredientes artesanais. Na rua Augusta 1036, são cinco opções de lanches fixos e um da semana, dois tipos de limonada da casa (green e pink lemonade), batata rústica chicana (opção de cheddar de mandioquinha e bacon defumado de cenoura), refrigerantes orgânicos. De sobremesa temos trufas e mousse.',1,'s'),(25,'Curiosidade','ffed298a05b66fa40dbc55d34dbe539f.jpg','Mussum Ipsum, cacilds vidis litro abertis. Admodum accumsan disputationi eu sit. Vide electram sadipscing et per. Per aumento de cachacis, eu reclamis. Paisis, filhis, espiritis santis. Cevadis im ampola pa arma uma pindureta.',1,'c'),(26,'Curiosidade','89da983c49b46fa339705d2de5856de7.jpg','Mussum Ipsum, cacilds vidis litro abertis. Admodum accumsan disputationi eu sit. Vide electram sadipscing et per. Per aumento de cachacis, eu reclamis. Paisis, filhis, espiritis santis. Cevadis im ampola pa arma uma pindureta.',1,'c');
/*!40000 ALTER TABLE `tblconteudo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblfaleconosco`
--

DROP TABLE IF EXISTS `tblfaleconosco`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `tblfaleconosco` (
  `idFaleConosco` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(200) NOT NULL,
  `telefone` varchar(24) NOT NULL,
  `celular` varchar(24) NOT NULL,
  `email` varchar(200) NOT NULL,
  `homePage` varchar(200) DEFAULT NULL,
  `linkFacebook` varchar(200) DEFAULT NULL,
  `profissao` varchar(100) DEFAULT NULL,
  `intuito` char(1) NOT NULL,
  `mensagem` text NOT NULL,
  `genero` char(1) NOT NULL,
  PRIMARY KEY (`idFaleConosco`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblfaleconosco`
--

LOCK TABLES `tblfaleconosco` WRITE;
/*!40000 ALTER TABLE `tblfaleconosco` DISABLE KEYS */;
INSERT INTO `tblfaleconosco` VALUES (3,'Didi','11 4002-8922','11 91234-5678','didi@trapalhoes.com.br','https://trapalhoes.com.br','https://face.com/trapalhoes','Humorista','c','Não Gostei','x'),(12,'Testevaldo','11 1111-1111','11 91111-1111','testevaldo@teste.com','testevaldo.blog.com','face.com/Testevaldo_Silva','Tecnico de Informatica','s','Vocês poderiam adicionar recursos de acessibilidade.','m'),(14,'Henrique','11 98586-0888','11 98586-0888','hsmeyer1@gmail.com','https://henrique@pagina.com.br','https://henrique@pagina.com.br','Professor','s','Lanche com uma pitada de pimenta.','m');
/*!40000 ALTER TABLE `tblfaleconosco` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblloja`
--

DROP TABLE IF EXISTS `tblloja`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `tblloja` (
  `idLoja` int(11) NOT NULL AUTO_INCREMENT,
  `nomeLoja` varchar(200) NOT NULL,
  `enderecoLoja` varchar(200) NOT NULL,
  `fotoLoja` varchar(200) NOT NULL,
  `textoLoja` text NOT NULL,
  `visibilidade` tinyint(1) NOT NULL,
  PRIMARY KEY (`idLoja`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblloja`
--

LOCK TABLES `tblloja` WRITE;
/*!40000 ALTER TABLE `tblloja` DISABLE KEYS */;
INSERT INTO `tblloja` VALUES (6,'Honker Burguer','Rua Daora, 123, SP','e509b6fc34f05acde31c9fb5e1400437.jpg','Mussum Ipsum, cacilds vidis litro abertis. Admodum accumsan disputationi eu sit. Vide electram sadipscing et per. Per aumento de cachacis, eu reclamis. Paisis, filhis, espiritis santis. Cevadis im ampola pa arma uma pindureta. Mussum Ipsum, cacilds vidis litro abertis. Admodum accumsan disputationi eu sit. Vide electram sadipscing et per. Per aumento de cachacis, eu reclamis. Paisis, filhis, espiritis santis. Cevadis im ampola pa arma uma pindureta. ',1),(7,'Honker Burguer 2','Rua Daora, 321, SP','f935937932b63222e2a45c2af2cfe338.jpg','Mussum Ipsum, cacilds vidis litro abertis. Admodum accumsan disputationi eu sit. Vide electram sadipscing et per. Per aumento de cachacis, eu reclamis. Paisis, filhis, espiritis santis. Cevadis im ampola pa arma uma pindureta. Mussum Ipsum, cacilds vidis litro abertis. Admodum accumsan disputationi eu sit. Vide electram sadipscing et per. Per aumento de cachacis, eu reclamis. Paisis, filhis, espiritis santis. Cevadis im ampola pa arma uma pindureta. ',1);
/*!40000 ALTER TABLE `tblloja` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblnivelacesso`
--

DROP TABLE IF EXISTS `tblnivelacesso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `tblnivelacesso` (
  `idNivelAcesso` int(11) NOT NULL AUTO_INCREMENT,
  `nomeNivel` varchar(200) NOT NULL,
  `acessoConteudo` tinyint(1) NOT NULL,
  `acessoFaleConosco` tinyint(1) NOT NULL,
  `acessoProduto` tinyint(1) NOT NULL,
  `acessoUsuarios` tinyint(1) NOT NULL,
  PRIMARY KEY (`idNivelAcesso`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblnivelacesso`
--

LOCK TABLES `tblnivelacesso` WRITE;
/*!40000 ALTER TABLE `tblnivelacesso` DISABLE KEYS */;
INSERT INTO `tblnivelacesso` VALUES (2,'Nivel aluno',1,0,0,0),(3,'Nivel de teste',1,1,1,1),(9,'Testinho',0,1,1,0),(10,'Testinho2',0,0,1,1),(11,'Testinho3',0,1,0,1),(12,'TEste5000',1,1,0,0),(16,'Admin',1,1,1,1);
/*!40000 ALTER TABLE `tblnivelacesso` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblusuario`
--

DROP TABLE IF EXISTS `tblusuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `tblusuario` (
  `idUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(200) NOT NULL,
  `login` varchar(200) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `idNivelAcesso` int(11) NOT NULL,
  PRIMARY KEY (`idUsuario`),
  KEY `FK_idNivelAcesso_tblUsuario` (`idNivelAcesso`),
  CONSTRAINT `FK_idNivelAcesso_tblUsuario` FOREIGN KEY (`idNivelAcesso`) REFERENCES `tblnivelacesso` (`idNivelAcesso`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblusuario`
--

LOCK TABLES `tblusuario` WRITE;
/*!40000 ALTER TABLE `tblusuario` DISABLE KEYS */;
INSERT INTO `tblusuario` VALUES (8,'Convidados32','aluno','123',2),(9,'Ludoviro','lulu','543',10),(11,'Admin','admin','admin',16);
/*!40000 ALTER TABLE `tblusuario` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-07-15  8:39:30
