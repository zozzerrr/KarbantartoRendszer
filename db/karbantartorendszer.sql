-- --------------------------------------------------------
-- Hoszt:                        127.0.0.1
-- Szerver verzió:               10.4.24-MariaDB - mariadb.org binary distribution
-- Szerver OS:                   Win64
-- HeidiSQL Verzió:              12.0.0.6468
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


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

-- Tábla adatainak mentése karbantartorendszer.eszkoz: ~1 rows (hozzávetőleg)
INSERT IGNORE INTO `eszkoz` (`id`, `kategoriaid`, `nev`, `leiras`, `elhelyezkedes`, `kovetkezokarbantartas`) VALUES
	('fa3dqdw2', 1, 'Tűz jelző', 'jelzi a vizet', 'padló', '2022-03-08');

-- Struktúra mentése tábla karbantartorendszer. feladat
DROP TABLE IF EXISTS `feladat`;
CREATE TABLE IF NOT EXISTS `feladat` (
  `karbantartasid` int(11) NOT NULL,
  `szakemberid` int(11) NOT NULL,
  `idopont` date NOT NULL,
  `elfogadtaE` tinyint(1) NOT NULL,
  `indoklas` text COLLATE utf32_hungarian_ci NOT NULL,
  `kezdesIdopont` datetime NOT NULL,
  `vegzesIdopont` datetime NOT NULL,
  PRIMARY KEY (`karbantartasid`,`szakemberid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_hungarian_ci;

-- Tábla adatainak mentése karbantartorendszer.feladat: ~0 rows (hozzávetőleg)

-- Struktúra mentése tábla karbantartorendszer. karbantartas
DROP TABLE IF EXISTS `karbantartas`;
CREATE TABLE IF NOT EXISTS `karbantartas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `eszkozid` varchar(30) COLLATE utf32_hungarian_ci NOT NULL,
  `hibaE` tinyint(1) NOT NULL,
  `sulyossag` tinyint(4) NOT NULL,
  `idopont` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `allapot` varchar(20) COLLATE utf32_hungarian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf32 COLLATE=utf32_hungarian_ci;

-- Tábla adatainak mentése karbantartorendszer.karbantartas: ~2 rows (hozzávetőleg)
INSERT IGNORE INTO `karbantartas` (`id`, `eszkozid`, `hibaE`, `sulyossag`, `idopont`, `allapot`) VALUES
	(1, 'fa3dqdw2', 1, 5, '2022-04-23 22:00:00', 'utemezve'),
	(2, 'fa3dqdw2', 1, 10, '2022-04-25 22:00:00', 'utemezve');

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf32 COLLATE=utf32_hungarian_ci;

-- Tábla adatainak mentése karbantartorendszer.kategoria: ~2 rows (hozzávetőleg)
INSERT IGNORE INTO `kategoria` (`id`, `szuloid`, `nev`, `intervallum`, `normaido`, `karbantartasInstrukcio`) VALUES
	(1, 0, 'Tűzjelző', 20, '27:06:27', NULL),
	(2, 1, 'Számítógépek', 312, '13:09:59', NULL);

-- Struktúra mentése tábla karbantartorendszer. kepesites
DROP TABLE IF EXISTS `kepesites`;
CREATE TABLE IF NOT EXISTS `kepesites` (
  `dolgozoid` int(11) NOT NULL,
  `vegzettsegid` int(11) NOT NULL,
  PRIMARY KEY (`dolgozoid`,`vegzettsegid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_hungarian_ci;

-- Tábla adatainak mentése karbantartorendszer.kepesites: ~2 rows (hozzávetőleg)
INSERT IGNORE INTO `kepesites` (`dolgozoid`, `vegzettsegid`) VALUES
	(10, 1),
	(10, 2);

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

-- Tábla adatainak mentése karbantartorendszer.munkaido: ~0 rows (hozzávetőleg)

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

-- Tábla adatainak mentése karbantartorendszer.szakember: ~3 rows (hozzávetőleg)
INSERT IGNORE INTO `szakember` (`id`, `szerepkorID`, `email`, `nev`, `jelszo`) VALUES
	(8, 1, 'admin@gmail.com', 'ADMIN', '$2y$10$LYt.Gf6earh66hs65Fbyre0Jv0YgJOIF5GoxvapcooCWP38P4tRuu'),
	(9, 3, 'operator@gmail.com', 'Operrator', '$2y$10$SY1RdIe2xqCdN/q3hzovXO8RpTMGyGZNR1Tvxg9DZJnAHuPsRsY8K'),
	(10, 4, 'karbantarto@gmail.com', 'Karrbantarrrto', '$2y$10$Rh.s4VsMo15yTgPK4SSvr.3wRlbBjvzbXkIBTptAv2qhzAQM0HEQq');

-- Struktúra mentése tábla karbantartorendszer. szerepkor
DROP TABLE IF EXISTS `szerepkor`;
CREATE TABLE IF NOT EXISTS `szerepkor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nev` varchar(255) COLLATE utf32_hungarian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf32 COLLATE=utf32_hungarian_ci;

-- Tábla adatainak mentése karbantartorendszer.szerepkor: ~4 rows (hozzávetőleg)
INSERT IGNORE INTO `szerepkor` (`id`, `nev`) VALUES
	(1, 'Adminisztrátor'),
	(2, 'Eszközfelelős'),
	(3, 'Operátor'),
	(4, 'Karbantartó');

-- Struktúra mentése tábla karbantartorendszer. vegoria
DROP TABLE IF EXISTS `vegoria`;
CREATE TABLE IF NOT EXISTS `vegoria` (
  `vegzettseg_id` int(11) NOT NULL,
  `kategoria_id` int(11) NOT NULL,
  PRIMARY KEY (`vegzettseg_id`,`kategoria_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_hungarian_ci;

-- Tábla adatainak mentése karbantartorendszer.vegoria: ~2 rows (hozzávetőleg)
INSERT IGNORE INTO `vegoria` (`vegzettseg_id`, `kategoria_id`) VALUES
	(1, 1),
	(2, 1);

-- Struktúra mentése tábla karbantartorendszer. vegzettseg
DROP TABLE IF EXISTS `vegzettseg`;
CREATE TABLE IF NOT EXISTS `vegzettseg` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kepesites` varchar(255) COLLATE utf32_hungarian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf32 COLLATE=utf32_hungarian_ci;

-- Tábla adatainak mentése karbantartorendszer.vegzettseg: ~2 rows (hozzávetőleg)
INSERT IGNORE INTO `vegzettseg` (`id`, `kepesites`) VALUES
	(1, 'Villamos Mérnök'),
	(2, 'Programtervező informatikus');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
