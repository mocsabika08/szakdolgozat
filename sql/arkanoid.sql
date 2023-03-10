-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2023. Már 10. 10:56
-- Kiszolgáló verziója: 10.4.6-MariaDB
-- PHP verzió: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `arkanoid`
--
CREATE DATABASE IF NOT EXISTS `arkanoid` DEFAULT CHARACTER SET utf8 COLLATE utf8_hungarian_ci;
USE `arkanoid`;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `classic`
--

CREATE TABLE `classic` (
  `username` varchar(30) COLLATE utf8_hungarian_ci NOT NULL,
  `level` tinyint(2) NOT NULL,
  `score` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `classic`
--

INSERT INTO `classic` (`username`, `level`, `score`) VALUES
('Reverie', 5, 8910);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `player`
--

CREATE TABLE `player` (
  `username` varchar(30) COLLATE utf8_hungarian_ci NOT NULL,
  `password` varchar(30) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `time`
--

CREATE TABLE `time` (
  `username` varchar(30) COLLATE utf8_hungarian_ci NOT NULL,
  `level` tinyint(2) NOT NULL,
  `lives` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
