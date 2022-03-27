-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2022. Már 26. 20:30
-- Kiszolgáló verziója: 10.4.11-MariaDB
-- PHP verzió: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `karbantartorendszer`
--
CREATE DATABASE IF NOT EXISTS `karbantartorendszer` DEFAULT CHARACTER SET utf32 COLLATE utf32_hungarian_ci;
USE `karbantartorendszer`;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `eszkoz`
--

CREATE TABLE `eszkoz` (
  `id` int(11) NOT NULL,
  `kategoriaid` int(11) NOT NULL,
  `nev` varchar(255) COLLATE utf32_hungarian_ci NOT NULL,
  `leiras` text COLLATE utf32_hungarian_ci NOT NULL,
  `elhelyezkedes` varchar(255) COLLATE utf32_hungarian_ci NOT NULL,
  `kovetkezokarbantartas` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `feladat`
--

CREATE TABLE `feladat` (
  `karbantartasid` int(11) NOT NULL,
  `szakemberid` int(11) NOT NULL,
  `idopont` date NOT NULL,
  `elfogadtaE` tinyint(1) NOT NULL,
  `indoklas` text COLLATE utf32_hungarian_ci NOT NULL,
  `kezdesIdopont` datetime NOT NULL,
  `vegzesIdopont` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `karbantartas`
--

CREATE TABLE `karbantartas` (
  `id` int(11) NOT NULL,
  `eszkozid` int(11) NOT NULL,
  `hibaE` tinyint(1) NOT NULL,
  `sulyossag` tinyint(4) NOT NULL,
  `idopont` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `szuksegesvegzettsegid` int(11) NOT NULL,
  `allapot` varchar(20) COLLATE utf32_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `kategoria`
--

CREATE TABLE `kategoria` (
  `id` int(11) NOT NULL,
  `szuloid` int(11) NOT NULL,
  `nev` varchar(50) COLLATE utf32_hungarian_ci NOT NULL,
  `intervallum` int(11) NOT NULL,
  `normaido` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `kepesites`
--

CREATE TABLE `kepesites` (
  `dolgozoid` int(11) NOT NULL,
  `vegzettsegid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `munkaido`
--

CREATE TABLE `munkaido` (
  `id` int(11) NOT NULL,
  `szakemberid` int(11) NOT NULL,
  `nap` varchar(10) COLLATE utf32_hungarian_ci NOT NULL,
  `kezdes` time NOT NULL,
  `vegzes` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `szakember`
--

CREATE TABLE `szakember` (
  `id` int(11) NOT NULL,
  `szerepkorID` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf32_hungarian_ci NOT NULL,
  `nev` varchar(255) COLLATE utf32_hungarian_ci NOT NULL,
  `jelszo` varchar(255) COLLATE utf32_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `szerepkor`
--

CREATE TABLE `szerepkor` (
  `id` int(11) NOT NULL,
  `nev` varchar(255) COLLATE utf32_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `vegzettseg`
--

CREATE TABLE `vegzettseg` (
  `id` int(11) NOT NULL,
  `vegzettseg` varchar(255) COLLATE utf32_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_hungarian_ci;

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `eszkoz`
--
ALTER TABLE `eszkoz`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `feladat`
--
ALTER TABLE `feladat`
  ADD PRIMARY KEY (`karbantartasid`,`szakemberid`);

--
-- A tábla indexei `karbantartas`
--
ALTER TABLE `karbantartas`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `kategoria`
--
ALTER TABLE `kategoria`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `kepesites`
--
ALTER TABLE `kepesites`
  ADD PRIMARY KEY (`dolgozoid`,`vegzettsegid`);

--
-- A tábla indexei `munkaido`
--
ALTER TABLE `munkaido`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `szakember`
--
ALTER TABLE `szakember`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `szerepkor`
--
ALTER TABLE `szerepkor`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `vegzettseg`
--
ALTER TABLE `vegzettseg`
  ADD PRIMARY KEY (`id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `eszkoz`
--
ALTER TABLE `eszkoz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `karbantartas`
--
ALTER TABLE `karbantartas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `kategoria`
--
ALTER TABLE `kategoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `munkaido`
--
ALTER TABLE `munkaido`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `szakember`
--
ALTER TABLE `szakember`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `szerepkor`
--
ALTER TABLE `szerepkor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `vegzettseg`
--
ALTER TABLE `vegzettseg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

-- ADMIN USER
INSERT INTO szakember VALUES (NULL,1,'admin@gmail.com','ADMIN','$2y$10$LYt.Gf6earh66hs65Fbyre0Jv0YgJOIF5GoxvapcooCWP38P4tRuu');
COMMIT;
	

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
