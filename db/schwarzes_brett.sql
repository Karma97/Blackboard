-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 06. Sep 2018 um 23:08
-- Server-Version: 5.7.17
-- PHP-Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `accounts`
--
CREATE DATABASE IF NOT EXISTS `accounts` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `accounts`;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `nutzer`
--

CREATE TABLE `nutzer` (
  `ID` int(11) NOT NULL,
  `benutzername` varchar(75) NOT NULL,
  `passwort` varchar(500) NOT NULL,
  `email` varchar(100) NOT NULL,
  `gebDatum` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `nutzer`
--
ALTER TABLE `nutzer`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `nutzer`
--
ALTER TABLE `nutzer`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;--
-- Datenbank: `schwarzesbrett`
--
CREATE DATABASE IF NOT EXISTS `schwarzesbrett` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `schwarzesbrett`;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `anzeigen`
--

CREATE TABLE `anzeigen` (
  `AN` int(11) NOT NULL,
  `datum` date NOT NULL,
  `ort` varchar(40) NOT NULL,
  `beschreibung` text NOT NULL,
  `INr` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `anzeigen`
--

INSERT INTO `anzeigen` (`AN`, `datum`, `ort`, `beschreibung`, `INr`) VALUES
(1, '2018-08-14', 'Sande', 'Harry Potter Buchreihe.', 1),
(2, '2018-08-12', 'Wilhelmshaven', 'Alte Wii', 1),
(3, '2018-08-02', 'Varel', 'Schlaghose', 3),
(4, '2018-08-10', 'Jever', 'Super Mario Bros 3', 4),
(5, '2018-08-12', 'Sande', 'Holzstatue', 4);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `besitzt`
--

CREATE TABLE `besitzt` (
  `RN` int(11) NOT NULL,
  `AN` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `besitzt`
--

INSERT INTO `besitzt` (`RN`, `AN`) VALUES
(5, 1),
(6, 2),
(3, 3),
(1, 4),
(4, 5);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `inserent`
--

CREATE TABLE `inserent` (
  `INr` int(11) NOT NULL,
  `nickname` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `inserent`
--

INSERT INTO `inserent` (`INr`, `nickname`, `email`) VALUES
(1, 'Car.Stahl', 'car.stahl@gmx.de'),
(2, 'Klaas Fischer', 'klaas.fisch@web.de'),
(3, 'beetlejuice1998', 'beetlemyjuice@gmx.de'),
(4, 'bloodymary1975', 'mary@gmail.com'),
(5, 'nic.schipper', 'nichlas.schipper@web.de'),
(6, 'chrisHaus12', 'christian.stachelhaus@gmail.com');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `rubriken`
--

CREATE TABLE `rubriken` (
  `RN` int(11) NOT NULL,
  `Bezeichnung` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `rubriken`
--

INSERT INTO `rubriken` (`RN`, `Bezeichnung`) VALUES
(1, 'Videospiele'),
(2, 'Elektronikgeräte'),
(3, 'Kleidung'),
(4, 'Möbel'),
(5, 'Bücher'),
(6, 'Spielekonsolen'),
(7, 'Handyzubehör');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `anzeigen`
--
ALTER TABLE `anzeigen`
  ADD PRIMARY KEY (`AN`),
  ADD KEY `IN` (`INr`);

--
-- Indizes für die Tabelle `besitzt`
--
ALTER TABLE `besitzt`
  ADD PRIMARY KEY (`RN`,`AN`),
  ADD KEY `AN` (`AN`);

--
-- Indizes für die Tabelle `inserent`
--
ALTER TABLE `inserent`
  ADD PRIMARY KEY (`INr`);

--
-- Indizes für die Tabelle `rubriken`
--
ALTER TABLE `rubriken`
  ADD PRIMARY KEY (`RN`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `anzeigen`
--
ALTER TABLE `anzeigen`
  MODIFY `AN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT für Tabelle `inserent`
--
ALTER TABLE `inserent`
  MODIFY `INr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT für Tabelle `rubriken`
--
ALTER TABLE `rubriken`
  MODIFY `RN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `anzeigen`
--
ALTER TABLE `anzeigen`
  ADD CONSTRAINT `anzeigen_ibfk_1` FOREIGN KEY (`INr`) REFERENCES `inserent` (`INr`);

--
-- Constraints der Tabelle `besitzt`
--
ALTER TABLE `besitzt`
  ADD CONSTRAINT `besitzt_ibfk_1` FOREIGN KEY (`RN`) REFERENCES `rubriken` (`RN`),
  ADD CONSTRAINT `besitzt_ibfk_2` FOREIGN KEY (`AN`) REFERENCES `anzeigen` (`AN`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
