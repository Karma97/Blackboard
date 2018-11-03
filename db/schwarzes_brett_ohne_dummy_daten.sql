-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 03. Nov 2018 um 16:50
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
  `ortID` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `anzeigenbilder`
--

CREATE TABLE `anzeigenbilder` (
  `bID` int(11) NOT NULL,
  `aNR` int(11) NOT NULL,
  `bildpfad` varchar(500) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `besucherzahlen`
--

CREATE TABLE `besucherzahlen` (
  `iNR` int(11) NOT NULL,
  `besucherzahl` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `bewertungen`
--

CREATE TABLE `bewertungen` (
  `bNR` int(11) NOT NULL,
  `ist_für` int(11) NOT NULL,
  `kommt_von` int(11) NOT NULL,
  `betreff` varchar(120) NOT NULL,
  `beschreibung` varchar(2000) NOT NULL,
  `bewertung` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `inserent`
--

CREATE TABLE `inserent` (
  `iNR` int(11) NOT NULL,
  `vorname` varchar(100) NOT NULL,
  `nachname` varchar(100) NOT NULL,
  `passwort` varchar(500) NOT NULL,
  `email` varchar(120) NOT NULL,
  `gebdatum` date NOT NULL,
  `newsletter` tinyint(1) NOT NULL,
  `profilbildpfad` varchar(10000) DEFAULT NULL,
  `kundennummer` varchar(15) NOT NULL,
  `identifier_token` varchar(700) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `nachrichten`
--

CREATE TABLE `nachrichten` (
  `naID` int(11) NOT NULL,
  `kommt_von` int(11) NOT NULL,
  `ist_für` int(11) NOT NULL,
  `betreff` varchar(300) NOT NULL,
  `beschreibung` text NOT NULL,
  `gelesen` tinyint(1) NOT NULL,
  `gelöscht` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `news`
--

CREATE TABLE `news` (
  `nID` int(11) NOT NULL,
  `titel` varchar(150) NOT NULL,
  `beschreibung` text NOT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `newsbilder`
--

CREATE TABLE `newsbilder` (
  `bID` int(11) NOT NULL,
  `nID` int(11) NOT NULL,
  `bildpfad` varchar(400) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `orte`
--

CREATE TABLE `orte` (
  `ortID` int(11) NOT NULL,
  `Bezeichnung` varchar(300) DEFAULT NULL,
  `laenge` varchar(20) DEFAULT NULL,
  `breite` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  ADD KEY `PLZ` (`ortID`),
  ADD KEY `iNR` (`iNR`);

--
-- Indizes für die Tabelle `anzeigenbilder`
--
ALTER TABLE `anzeigenbilder`
  ADD PRIMARY KEY (`bID`),
  ADD KEY `aNR` (`aNR`);

--
-- Indizes für die Tabelle `besucherzahlen`
--
ALTER TABLE `besucherzahlen`
  ADD PRIMARY KEY (`iNR`),
  ADD KEY `iNR` (`iNR`);

--
-- Indizes für die Tabelle `bewertungen`
--
ALTER TABLE `bewertungen`
  ADD PRIMARY KEY (`bNR`),
  ADD KEY `ist_für` (`ist_für`,`kommt_von`),
  ADD KEY `kommt_von` (`kommt_von`);

--
-- Indizes für die Tabelle `inserent`
--
ALTER TABLE `inserent`
  ADD PRIMARY KEY (`iNR`,`kundennummer`,`identifier_token`);

--
-- Indizes für die Tabelle `nachrichten`
--
ALTER TABLE `nachrichten`
  ADD PRIMARY KEY (`naID`),
  ADD KEY `kommt_von` (`kommt_von`,`ist_für`),
  ADD KEY `ist_für` (`ist_für`);

--
-- Indizes für die Tabelle `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`nID`);

--
-- Indizes für die Tabelle `newsbilder`
--
ALTER TABLE `newsbilder`
  ADD PRIMARY KEY (`bID`),
  ADD KEY `nID` (`nID`);

--
-- Indizes für die Tabelle `orte`
--
ALTER TABLE `orte`
  ADD PRIMARY KEY (`ortID`);

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
-- AUTO_INCREMENT für Tabelle `anzeigenbilder`
--
ALTER TABLE `anzeigenbilder`
  MODIFY `bID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `bewertungen`
--
ALTER TABLE `bewertungen`
  MODIFY `bNR` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `inserent`
--
ALTER TABLE `inserent`
  MODIFY `iNR` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `nachrichten`
--
ALTER TABLE `nachrichten`
  MODIFY `naID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `news`
--
ALTER TABLE `news`
  MODIFY `nID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `newsbilder`
--
ALTER TABLE `newsbilder`
  MODIFY `bID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `orte`
--
ALTER TABLE `orte`
  MODIFY `ortID` int(11) NOT NULL AUTO_INCREMENT;

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
  ADD CONSTRAINT `anzeigen_ibfk_2` FOREIGN KEY (`iNR`) REFERENCES `inserent` (`iNR`);

--
-- Constraints der Tabelle `anzeigenbilder`
--
ALTER TABLE `anzeigenbilder`
  ADD CONSTRAINT `anzeigenbilder_ibfk_1` FOREIGN KEY (`aNR`) REFERENCES `anzeigen` (`aNR`);

--
-- Constraints der Tabelle `besucherzahlen`
--
ALTER TABLE `besucherzahlen`
  ADD CONSTRAINT `besucherzahlen_ibfk_1` FOREIGN KEY (`iNR`) REFERENCES `inserent` (`iNR`);

--
-- Constraints der Tabelle `bewertungen`
--
ALTER TABLE `bewertungen`
  ADD CONSTRAINT `bewertungen_ibfk_1` FOREIGN KEY (`ist_für`) REFERENCES `inserent` (`iNR`),
  ADD CONSTRAINT `bewertungen_ibfk_2` FOREIGN KEY (`kommt_von`) REFERENCES `inserent` (`iNR`);

--
-- Constraints der Tabelle `nachrichten`
--
ALTER TABLE `nachrichten`
  ADD CONSTRAINT `nachrichten_ibfk_1` FOREIGN KEY (`kommt_von`) REFERENCES `inserent` (`iNR`),
  ADD CONSTRAINT `nachrichten_ibfk_2` FOREIGN KEY (`ist_für`) REFERENCES `inserent` (`iNR`);

--
-- Constraints der Tabelle `newsbilder`
--
ALTER TABLE `newsbilder`
  ADD CONSTRAINT `newsbilder_ibfk_1` FOREIGN KEY (`nID`) REFERENCES `news` (`nID`);

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
