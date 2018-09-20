-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 20. Sep 2018 um 19:57
-- Server-Version: 10.1.35-MariaDB
-- PHP-Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `schwarzesbrett`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `rubriken`
--

CREATE TABLE `rubriken` (
  `RN` int(11) NOT NULL,
  `Bezeichnung` varchar(50) NOT NULL,
  `iclass` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `rubriken`
--

INSERT INTO `rubriken` (`RN`, `Bezeichnung`, `iclass`) VALUES
(1, 'Bücher', 'fas fa-book'),
(2, 'Filme', 'fas fa-film'),
(3, 'Kleidung', 'fas fa-tshirt'),
(4, 'Musik', 'fas fa-music'),
(5, 'Sport', 'fas fa-futbol'),
(6, 'Elektronik', 'fas fa-tv'),
(7, 'Computer', 'fas fa-laptop'),
(8, 'Videospiele', 'fas fa-gamepad'),
(9, 'Dekoration', 'fas fa-air-freshener'),
(10, 'Dienstleistungen', 'fas fa-people-carry');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `rubriken`
--
ALTER TABLE `rubriken`
  ADD PRIMARY KEY (`RN`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `rubriken`
--
ALTER TABLE `rubriken`
  MODIFY `RN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
