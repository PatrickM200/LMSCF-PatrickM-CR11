-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 25. Jul 2020 um 11:35
-- Server-Version: 10.4.13-MariaDB
-- PHP-Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `cr11_patrickm_petadoption`
--
CREATE DATABASE IF NOT EXISTS `cr11_patrickm_petadoption` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `cr11_patrickm_petadoption`;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `pet`
--

CREATE TABLE `pet` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `breed` varchar(255) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `adoptable` date DEFAULT NULL,
  `description` text DEFAULT NULL,
  `hobbies` varchar(255) DEFAULT NULL,
  `web` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `ZIP` varchar(10) DEFAULT NULL,
  `coordLat` varchar(25) DEFAULT NULL,
  `coordLon` varchar(25) DEFAULT NULL,
  `size` enum('little','big') DEFAULT 'little',
  `country` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `pet`
--

INSERT INTO `pet` (`id`, `name`, `photo`, `breed`, `age`, `adoptable`, `description`, `hobbies`, `web`, `location`, `image`, `address`, `city`, `ZIP`, `coordLat`, `coordLon`, `size`, `country`) VALUES
(13, 'NameA', 'https://www.schulz-grafik.de/wp-content/uploads/2018/03/placeholder.png', 'Shepard', 15, '2020-02-22', 'description description description', 'hobby', '', 'location', 'https://via.placeholder.com/150', 'street 15', 'bigcity', '6000', '40.7143528', '-74.0059731', 'little', 'bestcountry'),
(14, 'NameF', 'https://www.schulz-grafik.de/wp-content/uploads/2018/03/placeholder.png', 'Pincher', 2, '2020-02-22', 'description description description', 'hobby', '', 'location', 'https://via.placeholder.com/150', 'street 15', 'bigcity', '6000', '40.7143528', '-74.0059731', 'little', 'bestcountry'),
(15, 'NameB', 'https://www.schulz-grafik.de/wp-content/uploads/2018/03/placeholder.png', 'Samo', 5, '2020-02-22', 'description description description', 'hobby', '', 'location', 'https://via.placeholder.com/150', 'street 15', 'bigcity', '6000', '40.7143528', '-74.0059731', 'little', 'bestcountry'),
(16, 'NameE', 'https://www.schulz-grafik.de/wp-content/uploads/2018/03/placeholder.png', 'Husky', 45, '2020-02-22', 'description description description', 'hobby', '', 'location', 'https://via.placeholder.com/150', 'street 15', 'bigcity', '6000', '40.7143528', '-74.0059731', 'little', 'bestcountry'),
(17, 'NameC', 'https://www.schulz-grafik.de/wp-content/uploads/2018/03/placeholder.png', 'Samo', 8, '2020-02-22', 'description description description', 'hobby', '', 'location', 'https://via.placeholder.com/150', 'street 15', 'bigcity', '6000', '40.7143528', '-74.0059731', 'big', 'bestcountry'),
(18, 'NameD', 'https://www.schulz-grafik.de/wp-content/uploads/2018/03/placeholder.png', 'Husky', 36, '2020-02-22', 'description description description', 'hobby', '', 'location', 'https://via.placeholder.com/150', 'street 15', 'bigcity', '6000', '40.7143528', '-74.0059731', 'big', 'bestcountry'),
(19, 'NameG', 'https://www.schulz-grafik.de/wp-content/uploads/2018/03/placeholder.png', 'Pincher', 36, '2020-02-22', 'description description description', 'hobby', '', 'location', 'https://via.placeholder.com/150', 'street 15', 'bigcity', '6000', '40.7143528', '-74.0059731', 'big', 'bestcountry'),
(20, 'NameH', 'https://www.schulz-grafik.de/wp-content/uploads/2018/03/placeholder.png', 'Shepard', 36, '2020-02-22', 'description description description', 'hobby', '', 'location', 'https://via.placeholder.com/150', 'street 15', 'bigcity', '6000', '40.7143528', '-74.0059731', 'big', 'bestcountry');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users` (
  `userId` int(11) NOT NULL,
  `userName` varchar(30) NOT NULL,
  `status` enum('user','admin') DEFAULT 'user',
  `userEmail` varchar(60) NOT NULL,
  `userPass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`userId`, `userName`, `status`, `userEmail`, `userPass`) VALUES
(6, 'admin', 'admin', 'admin@admin.com', 'ac0e7d037817094e9e0b4441f9bae3209d67b02fa484917065f71b16109a1a78'),
(7, 'user', 'user', 'user@user.com', '90aae915da86d3b3a4da7a996bc264bfbaf50a953cbbe8cd3478a2a6ccc7b900');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `pet`
--
ALTER TABLE `pet`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `pet` ADD FULLTEXT KEY `name` (`name`,`breed`,`city`);

--
-- Indizes für die Tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`),
  ADD UNIQUE KEY `userEmail` (`userEmail`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `pet`
--
ALTER TABLE `pet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
