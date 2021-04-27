-- MySQL dump 10.13  Distrib 8.0.24, for Win64 (x86_64)
--
-- Host: localhost    Database: carapp
-- ------------------------------------------------------
-- Server version	8.0.24

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
-- Table structure for table `korisnik`
--

DROP TABLE IF EXISTS `korisnik`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `korisnik` (
  `idKorisnik` int NOT NULL AUTO_INCREMENT,
  `Ime` varchar(45) NOT NULL,
  `Prezime` varchar(45) NOT NULL,
  `Email` varchar(45) NOT NULL,
  `Korisnicko_ime` varchar(45) NOT NULL,
  `Lozinka` varchar(45) NOT NULL,
  `Telefon` varchar(45) NOT NULL,
  `Tip` enum('Obican','Vip','Admin') NOT NULL,
  `Datum_od` date NOT NULL,
  `Datum_do` date NOT NULL,
  PRIMARY KEY (`idKorisnik`),
  UNIQUE KEY `Korisnicko_ime_UNIQUE` (`Korisnicko_ime`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `korisnik`
--

LOCK TABLES `korisnik` WRITE;
/*!40000 ALTER TABLE `korisnik` DISABLE KEYS */;
/*!40000 ALTER TABLE `korisnik` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oglas`
--

DROP TABLE IF EXISTS `oglas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `oglas` (
  `idOglas` int NOT NULL AUTO_INCREMENT,
  `Marka` varchar(45) NOT NULL,
  `Model` varchar(45) NOT NULL,
  `Godiste` int NOT NULL,
  `Mesto` varchar(45) NOT NULL,
  `Cena` int NOT NULL,
  `Kilometraza` int NOT NULL,
  `Gorivo` varchar(45) NOT NULL,
  `Menjac` enum('Automatski','Manuelni','Poluautomatski') NOT NULL,
  `Snaga` varchar(45) NOT NULL,
  `Opis` varchar(225) NOT NULL,
  `CenaJeFiksna` tinyint(1) DEFAULT NULL,
  `Rate` tinyint(1) DEFAULT NULL,
  `Garancija` tinyint(1) DEFAULT NULL,
  `Zamena` tinyint(1) DEFAULT NULL,
  `Panorama` tinyint(1) DEFAULT NULL,
  `ElPodizaci` tinyint(1) DEFAULT NULL,
  `AluFelne` tinyint(1) DEFAULT NULL,
  `Xenon` tinyint(1) DEFAULT NULL,
  `LedFarovi` tinyint(1) DEFAULT NULL,
  `Tempomat` tinyint(1) DEFAULT NULL,
  `Navigacija` tinyint(1) DEFAULT NULL,
  `VazdVesanje` tinyint(1) DEFAULT NULL,
  `MultifunVolan` tinyint(1) DEFAULT NULL,
  `idKorisnik` int NOT NULL,
  PRIMARY KEY (`idOglas`),
  KEY `idKorisnik_idx` (`idKorisnik`),
  CONSTRAINT `idKorisnik` FOREIGN KEY (`idKorisnik`) REFERENCES `korisnik` (`idKorisnik`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oglas`
--

LOCK TABLES `oglas` WRITE;
/*!40000 ALTER TABLE `oglas` DISABLE KEYS */;
/*!40000 ALTER TABLE `oglas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oznaceni`
--

DROP TABLE IF EXISTS `oznaceni`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `oznaceni` (
  `idKorisnik` int NOT NULL,
  `idOglas` int NOT NULL,
  PRIMARY KEY (`idKorisnik`,`idOglas`),
  KEY `idOglasOznaceni_idx` (`idOglas`),
  CONSTRAINT `idKorisnikOznaceni` FOREIGN KEY (`idKorisnik`) REFERENCES `korisnik` (`idKorisnik`) ON UPDATE CASCADE,
  CONSTRAINT `idOglasOznaceni` FOREIGN KEY (`idOglas`) REFERENCES `oglas` (`idOglas`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oznaceni`
--

LOCK TABLES `oznaceni` WRITE;
/*!40000 ALTER TABLE `oznaceni` DISABLE KEYS */;
/*!40000 ALTER TABLE `oznaceni` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `recenzija`
--

DROP TABLE IF EXISTS `recenzija`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `recenzija` (
  `idRecenzija` int NOT NULL AUTO_INCREMENT,
  `Sadrzaj` varchar(225) NOT NULL,
  `Ocena` int NOT NULL,
  `idKorisnik` int NOT NULL,
  `idOglas` int NOT NULL,
  PRIMARY KEY (`idRecenzija`),
  KEY `idKorisnikRecenzija_idx` (`idKorisnik`),
  KEY `idOglasRecenzija_idx` (`idOglas`),
  CONSTRAINT `idKorisnikRecenzija` FOREIGN KEY (`idKorisnik`) REFERENCES `korisnik` (`idKorisnik`) ON UPDATE CASCADE,
  CONSTRAINT `idOglasRecenzija` FOREIGN KEY (`idOglas`) REFERENCES `oglas` (`idOglas`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `recenzija`
--

LOCK TABLES `recenzija` WRITE;
/*!40000 ALTER TABLE `recenzija` DISABLE KEYS */;
/*!40000 ALTER TABLE `recenzija` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sacuvani`
--

DROP TABLE IF EXISTS `sacuvani`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sacuvani` (
  `idKorisnik` int NOT NULL,
  `idOglas` int NOT NULL,
  PRIMARY KEY (`idKorisnik`,`idOglas`),
  KEY `idOglas_idx` (`idOglas`),
  CONSTRAINT `idKorisnikSacuvani` FOREIGN KEY (`idKorisnik`) REFERENCES `korisnik` (`idKorisnik`),
  CONSTRAINT `idOglasSacuvani` FOREIGN KEY (`idOglas`) REFERENCES `oglas` (`idOglas`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sacuvani`
--

LOCK TABLES `sacuvani` WRITE;
/*!40000 ALTER TABLE `sacuvani` DISABLE KEYS */;
/*!40000 ALTER TABLE `sacuvani` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-04-27 17:58:52
