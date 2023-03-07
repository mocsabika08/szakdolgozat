SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

CREATE DATABASE IF NOT EXISTS `arkanoid` DEFAULT CHARACTER SET utf8 COLLATE utf8_hungarian_ci;
USE `arkanoid`;

CREATE TABLE `classic` (
  `username` varchar(30) COLLATE utf8_hungarian_ci NOT NULL,
  `level` tinyint(2) NOT NULL,
  `lives` tinyint(1) NOT NULL,
  `score` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

CREATE TABLE `player` (
  `username` varchar(30) COLLATE utf8_hungarian_ci NOT NULL,
  `password` varchar(30) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

CREATE TABLE `time` (
  `username` varchar(30) COLLATE utf8_hungarian_ci NOT NULL,
  `level` tinyint(2) NOT NULL,
  `lives` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

ALTER TABLE `classic`
  ADD PRIMARY KEY (`username`);
ALTER TABLE `player`
  ADD PRIMARY KEY (`username`);
ALTER TABLE `time`
  ADD PRIMARY KEY (`username`);
COMMIT;