-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 22. Sep 2018 um 16:31
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
-- Datenbank: `schwarzes_brett`
--
CREATE DATABASE IF NOT EXISTS `schwarzes_brett` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `schwarzes_brett`;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `anzeigen`
--

CREATE TABLE `anzeigen` (
  `aNR` int(11) NOT NULL,
  `iNR` int(11) NOT NULL,
  `betreff` varchar(100) NOT NULL,
  `beschreibung` text NOT NULL,
  `PLZ` varchar(5) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `bilder`
--

CREATE TABLE `bilder` (
  `bID` int(11) NOT NULL,
  `aNR` int(11) NOT NULL,
  `bild` mediumblob,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `inserent`
--

CREATE TABLE `inserent` (
  `iNR` int(11) NOT NULL,
  `nachname` varchar(100) NOT NULL,
  `vorname` varchar(100) NOT NULL,
  `passwort` varchar(500) NOT NULL,
  `email` varchar(120) NOT NULL,
  `gebdatum` date NOT NULL,
  `newsletter` tinyint(1) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `orte`
--

CREATE TABLE `orte` (
  `PLZ` varchar(5) NOT NULL,
  `Bezeichnung` varchar(100) DEFAULT NULL,
  `Lon` double DEFAULT NULL,
  `LAT` double DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `rubriken`
--

CREATE TABLE `rubriken` (
  `rNR` int(11) NOT NULL,
  `bezeichnung` varchar(75) NOT NULL,
  `beschreibung` text NOT NULL,
  `icon` varchar(100) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `r_besitzt_a`
--

CREATE TABLE `r_besitzt_a` (
  `rNR` int(11) NOT NULL,
  `aNR` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `anzeigen`
--
ALTER TABLE `anzeigen`
  ADD PRIMARY KEY (`aNR`),
  ADD KEY `PLZ` (`PLZ`),
  ADD KEY `iNR` (`iNR`);

--
-- Indizes für die Tabelle `bilder`
--
ALTER TABLE `bilder`
  ADD PRIMARY KEY (`bID`),
  ADD KEY `aNR` (`aNR`);

--
-- Indizes für die Tabelle `inserent`
--
ALTER TABLE `inserent`
  ADD PRIMARY KEY (`iNR`);

--
-- Indizes für die Tabelle `orte`
--
ALTER TABLE `orte`
  ADD PRIMARY KEY (`PLZ`);

--
-- Indizes für die Tabelle `rubriken`
--
ALTER TABLE `rubriken`
  ADD PRIMARY KEY (`rNR`);

--
-- Indizes für die Tabelle `r_besitzt_a`
--
ALTER TABLE `r_besitzt_a`
  ADD PRIMARY KEY (`rNR`,`aNR`),
  ADD KEY `rNR` (`rNR`,`aNR`),
  ADD KEY `aNR` (`aNR`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `anzeigen`
--
ALTER TABLE `anzeigen`
  MODIFY `aNR` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `bilder`
--
ALTER TABLE `bilder`
  MODIFY `bID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `inserent`
--
ALTER TABLE `inserent`
  MODIFY `iNR` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `rubriken`
--
ALTER TABLE `rubriken`
  MODIFY `rNR` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `anzeigen`
--
ALTER TABLE `anzeigen`
  ADD CONSTRAINT `anzeigen_ibfk_1` FOREIGN KEY (`PLZ`) REFERENCES `orte` (`PLZ`),
  ADD CONSTRAINT `anzeigen_ibfk_2` FOREIGN KEY (`iNR`) REFERENCES `inserent` (`iNR`);

--
-- Constraints der Tabelle `bilder`
--
ALTER TABLE `bilder`
  ADD CONSTRAINT `bilder_ibfk_1` FOREIGN KEY (`aNR`) REFERENCES `anzeigen` (`aNR`);

--
-- Constraints der Tabelle `r_besitzt_a`
--
ALTER TABLE `r_besitzt_a`
  ADD CONSTRAINT `r_besitzt_a_ibfk_1` FOREIGN KEY (`aNR`) REFERENCES `anzeigen` (`aNR`),
  ADD CONSTRAINT `r_besitzt_a_ibfk_2` FOREIGN KEY (`rNR`) REFERENCES `rubriken` (`rNR`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
