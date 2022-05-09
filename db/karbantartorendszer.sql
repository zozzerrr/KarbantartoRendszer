-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Szerver verzió:               10.4.19-MariaDB - mariadb.org binary distribution
-- Szerver OS:                   Win64
-- HeidiSQL Verzió:              10.3.0.5771
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Adatbázis struktúra mentése a karbantartorendszer.
DROP DATABASE IF EXISTS `karbantartorendszer`;
CREATE DATABASE IF NOT EXISTS `karbantartorendszer` /*!40100 DEFAULT CHARACTER SET utf32 COLLATE utf32_hungarian_ci */;
USE `karbantartorendszer`;

-- Struktúra mentése tábla karbantartorendszer. eszkoz
DROP TABLE IF EXISTS `eszkoz`;
CREATE TABLE IF NOT EXISTS `eszkoz` (
  `id` varchar(50) COLLATE utf32_hungarian_ci NOT NULL,
  `kategoriaid` int(11) NOT NULL,
  `nev` varchar(255) COLLATE utf32_hungarian_ci NOT NULL,
  `leiras` text COLLATE utf32_hungarian_ci NOT NULL,
  `elhelyezkedes` varchar(255) COLLATE utf32_hungarian_ci NOT NULL,
  `kovetkezokarbantartas` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_hungarian_ci;

-- Az adatok exportálása nem lett kiválasztva.

-- Struktúra mentése tábla karbantartorendszer. feladat
DROP TABLE IF EXISTS `feladat`;
CREATE TABLE IF NOT EXISTS `feladat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `karbantartasid` int(11) NOT NULL,
  `szakemberid` int(11) NOT NULL,
  `idopont` datetime NOT NULL,
  `elfogadtaE` tinyint(1) DEFAULT NULL,
  `indoklas` text COLLATE utf32_hungarian_ci DEFAULT NULL,
  `kezdesIdopont` datetime DEFAULT NULL,
  `vegzesIdopont` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf32 COLLATE=utf32_hungarian_ci;

-- Az adatok exportálása nem lett kiválasztva.

-- Struktúra mentése tábla karbantartorendszer. karbantartas
DROP TABLE IF EXISTS `karbantartas`;
CREATE TABLE IF NOT EXISTS `karbantartas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `eszkozid` varchar(30) COLLATE utf32_hungarian_ci NOT NULL,
  `hibaE` tinyint(1) NOT NULL,
  `sulyossag` tinyint(4) NOT NULL,
  `idopont` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `allapot` varchar(20) COLLATE utf32_hungarian_ci NOT NULL,
  `leiras` text COLLATE utf32_hungarian_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf32 COLLATE=utf32_hungarian_ci;

-- Az adatok exportálása nem lett kiválasztva.

-- Struktúra mentése tábla karbantartorendszer. kategoria
DROP TABLE IF EXISTS `kategoria`;
CREATE TABLE IF NOT EXISTS `kategoria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `szuloid` int(11) NOT NULL,
  `nev` varchar(50) COLLATE utf32_hungarian_ci NOT NULL,
  `intervallum` int(11) NOT NULL,
  `normaido` time NOT NULL,
  `karbantartasInstrukcio` text COLLATE utf32_hungarian_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf32 COLLATE=utf32_hungarian_ci;

-- Az adatok exportálása nem lett kiválasztva.

-- Struktúra mentése tábla karbantartorendszer. kepesites
DROP TABLE IF EXISTS `kepesites`;
CREATE TABLE IF NOT EXISTS `kepesites` (
  `dolgozoid` int(11) NOT NULL,
  `vegzettsegid` int(11) NOT NULL,
  PRIMARY KEY (`dolgozoid`,`vegzettsegid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_hungarian_ci;

-- Az adatok exportálása nem lett kiválasztva.

-- Struktúra mentése tábla karbantartorendszer. munkaido
DROP TABLE IF EXISTS `munkaido`;
CREATE TABLE IF NOT EXISTS `munkaido` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `szakemberid` int(11) NOT NULL,
  `nap` varchar(10) COLLATE utf32_hungarian_ci NOT NULL,
  `kezdes` time NOT NULL,
  `vegzes` time NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_hungarian_ci;

-- Az adatok exportálása nem lett kiválasztva.

-- Struktúra mentése tábla karbantartorendszer. szakember
DROP TABLE IF EXISTS `szakember`;
CREATE TABLE IF NOT EXISTS `szakember` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `szerepkorID` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf32_hungarian_ci NOT NULL,
  `nev` varchar(255) COLLATE utf32_hungarian_ci NOT NULL,
  `jelszo` varchar(255) COLLATE utf32_hungarian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf32 COLLATE=utf32_hungarian_ci;

-- Az adatok exportálása nem lett kiválasztva.

-- Struktúra mentése tábla karbantartorendszer. szerepkor
DROP TABLE IF EXISTS `szerepkor`;
CREATE TABLE IF NOT EXISTS `szerepkor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nev` varchar(255) COLLATE utf32_hungarian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf32 COLLATE=utf32_hungarian_ci;

-- Az adatok exportálása nem lett kiválasztva.

-- Struktúra mentése tábla karbantartorendszer. vegoria
DROP TABLE IF EXISTS `vegoria`;
CREATE TABLE IF NOT EXISTS `vegoria` (
  `vegzettseg_id` int(11) NOT NULL,
  `kategoria_id` int(11) NOT NULL,
  PRIMARY KEY (`vegzettseg_id`,`kategoria_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_hungarian_ci;

-- Az adatok exportálása nem lett kiválasztva.

-- Struktúra mentése tábla karbantartorendszer. vegzettseg
DROP TABLE IF EXISTS `vegzettseg`;
CREATE TABLE IF NOT EXISTS `vegzettseg` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kepesites` varchar(255) COLLATE utf32_hungarian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf32 COLLATE=utf32_hungarian_ci;

-- Az adatok exportálása nem lett kiválasztva.

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
