-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 01. Nov 2018 um 00:54
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

--
-- Daten für Tabelle `anzeigen`
--

INSERT INTO `anzeigen` (`aNR`, `iNR`, `betreff`, `beschreibung`, `ortID`, `updated_at`, `created_at`) VALUES
(53, 3, 'Rasenmäher', 'Ich verkaufe meinen Rasenmäher ab 200€ Verhandlungsbasis. Es ist ein Aufsitzmäher und Benziner.', 576, '2018-10-29 22:00:09', '2018-10-29 22:00:09'),
(54, 3, 'Verkaufe mein Mario Bros für die Wii', 'Verkaufe altes Mario Bros. Konsole ist die Wii.', 1416, '2018-10-29 22:05:49', '2018-10-29 22:05:49');

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

--
-- Daten für Tabelle `anzeigenbilder`
--

INSERT INTO `anzeigenbilder` (`bID`, `aNR`, `bildpfad`, `created_at`, `updated_at`) VALUES
(44, 53, 'anzeigenbilder/53/90097091_21192373.jpg', '2018-10-29 22:00:09', '2018-10-29 22:00:09'),
(45, 53, 'anzeigenbilder/53/90097100_21192374.jpg', '2018-10-29 22:00:09', '2018-10-29 22:00:09'),
(46, 53, 'anzeigenbilder/53/90097127_21192377.jpg', '2018-10-29 22:00:09', '2018-10-29 22:00:09'),
(47, 54, 'anzeigenbilder/54/81Zbmc8jhLS._SY445_.jpg', '2018-10-29 22:05:49', '2018-10-29 22:05:49'),
(48, 54, 'anzeigenbilder/54/here-8217-s-how-new-super-mario-bros-wii-handles-motion-controls-on-nvidia-shield-ss2_Lj_WKz0-1038x576.jpg', '2018-10-29 22:05:49', '2018-10-29 22:05:49'),
(49, 54, 'anzeigenbilder/54/Newer-Super-Mario-Bros.-Wii-Screenshot-1.jpg', '2018-10-29 22:05:49', '2018-10-29 22:05:49');

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

--
-- Daten für Tabelle `besucherzahlen`
--

INSERT INTO `besucherzahlen` (`iNR`, `besucherzahl`, `created_at`, `updated_at`) VALUES
(1, 0, '2018-10-27 19:57:45', '2018-10-29 22:11:35'),
(2, 13, '2018-10-28 01:25:17', '2018-10-31 23:08:32'),
(3, 6, '2018-10-28 01:25:17', '2018-10-31 23:51:12'),
(5, 2, '2018-10-27 20:33:00', '2018-10-31 23:46:20');

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

--
-- Daten für Tabelle `bewertungen`
--

INSERT INTO `bewertungen` (`bNR`, `ist_für`, `kommt_von`, `betreff`, `beschreibung`, `bewertung`, `created_at`, `updated_at`) VALUES
(1, 1, 5, 'sehr Faires trading', '- gutes Trading\r\n- Fairer Preis\r\n- Schnelle Abwicklung', 4, '2018-10-27 23:59:19', '2018-10-28 01:26:43'),
(3, 5, 1, 'Tolle arbeit', '- gutes Trading\r\n- Fairer Preis\r\n- Schnelle Abwicklung', 4, '2018-10-28 01:12:06', '2018-10-28 01:12:06'),
(4, 1, 3, 'Sehr gutes und Faires Traiding', 'Der Tauschhandel verlief fair und ich habe den Rasenmäher für einen sehr Fairen Preis bekommen. Bin auch sehr zufrieden mit meinem neuen Rasenmäher.', 5, '2018-10-28 01:32:03', '2018-10-28 01:32:03'),
(5, 3, 1, 'Faires Traiding', 'Habe die besagten Kaffeebohnen für einen fairen Preis erhalten. Der Tausch verlief schnell und ordentlich und ist mit dieser Person definitiv vertraulich.', 5, '2018-10-28 22:14:46', '2018-10-28 22:14:46'),
(6, 2, 1, 'Guter Inserent', 'Fairer Preis und sehr netter Empfang.\r\nTauschobjekt ist 1a.', 5, '2018-10-31 17:29:25', '2018-10-31 17:29:25');

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

--
-- Daten für Tabelle `inserent`
--

INSERT INTO `inserent` (`iNR`, `vorname`, `nachname`, `passwort`, `email`, `gebdatum`, `newsletter`, `profilbildpfad`, `kundennummer`, `identifier_token`, `updated_at`, `created_at`) VALUES
(1, 'S_B', 'Admin', '$2y$10$IMZgfoODrIo9eKEcl3Ijbuik75swhM2O7qnjTTnxLoBByu1GR49iW', 's_b_admin@example.com', '9999-09-09', 1, 'profil.png', 'SB#1234567889', 'rOxrNwMC6TDKXf86QRILJ1R=vUKRTfDsGrJ&CEt1hl3Yv5G9mtbDgEJcFWkxL5An81JJF#Vu5ACK3VyrW&K=JXrzehQDSn=D0XEHY6aE5RKtxe0mvtLLd~JcwJ82Hdzrdjc1b5oT#8=K5XhnyQV1MgFgrIXDhMzQtvO5eB7RWa%4NgJOR0G1yNlwvC4nXkEgCgx9UV3xZP8ShpalLfHejvWzEBD8KbzNxViW%tU5XLpSq~67O7Rh0%NAPcHyrQ3zLdm87ikdi7WCOFr#haw6NwnCosFWEZRNSqX4NMVK554%=C%xUMeIXsQdqMVco2Txfq95=THNdpuvvlR=4pXwQ85Mzycic4C9xK03tJnL5SR=Q8myP2O&Ev6p6pb2xi%KkBXNEVcd#849Iie&EGwvm9%F~Q9JD3BuUMzMW7EHBW3xPgjM1k7MYmdKxe6Haq&ZjlO6gtypuYqT1Wp2HSAigMkWg%t2peTtiSF50XZRB8TGfBPUMWhK', '2018-10-28 00:36:38', '2018-10-06 20:39:42'),
(2, 'Eike', 'Hüls', '$2y$10$OX0GCC8dlF/0OjT2sREp0.GzrkMVo/9RMcVWlNvyPmppXfM.6CG7q', 'eike.huels@gmx.de', '1997-12-20', 1, 'spacey.jpg', 'SB#1824395773', 'Tp1mv4sln2lQsS#1Q8tcYPzU#34TC6szYm2Epf1oS2GCNfw%H%7A&jcBEBy6wpz75nVcwXxudQx5HPyrqjWzZiBw%QiL=M%W3H1F4G7Kfj&be=eKHbSpjOAPHkK8OB38u2OtFuz8~jsVZPFoE9tM4o0wryox4dVag=WX&WbpO86WK%~YqBFv4mMWJaUKDmbduUiQtHJ6ljEx~OHLmd=AUU6Z0H1~2w005LPKfAnMigkUwe3l4z9tjSa=rfYNY4oTvR17P4kSfAvBsmrEhU3XZZSMq=yeiVLG=xLIpKOg7lMEc5hypAo#6AfKuOaCHSrSj&~d47qYg9AxBfwCy5=4sL4~qC6JcMXbI&HuVOtTV4McgVTpNWrvKNRtyl35NISI=Nq8HtWG=MsWERbExm1YHbuzPO4Bzd1WB%dyi5=BNxlXnKuucuv#~V2Wcqpqj1DUg=4sbaBc=3%6KXSkRyN2te0Q#vW3uTe&5mdRegOejsBYfV&vh~HX', '2018-10-28 00:36:58', '2018-10-08 16:27:42'),
(3, 'Nichlas', 'Schipper', '$2y$10$dPrTJ2OGfuNWYZ/ltQ0qlusZBZiLKbAu.M7H5jH4P/G8kK3UgAz2y', 'Nichlas12323@gmail.com', '2001-05-19', 1, 'vigil.png', 'SB#2448566136', 'dXGo=9jxVdihiv4QEgtZUIuiLFZlP1foKCEZ7cVirfKZXurrwcqLdh0ZT#MOC#29lwlC%izraTKW5xuNtkt=LOWZuse7cCc#xHT90&5I6LAhdDNZmHUdq~2jYKkTKh6JQY7IlkaLCB#2L19V8ENagewhzJI3RnId5liIe&TSFAteJTC5b3#qc4YTmwzUc2h#gi6X&W~C%sW6cfSPE4V%tMPJ5fn&~WWi5xmiAmxV7uUEs56mPc2lX~hYnxZ3yVQ%ZngHj9O813QLyW9QgzhO%K%VQ9~ODc6mIdxSFAzUOuZNhvVB=vSDYGYE&kcU01HowA3SH1U%rFoSsBTwEiZes98liTV6YwBzy4NRy&NQsRteP3zp=gmZ8go26HTTkmh4dvNtkuWaiyS7#JsJcX3B~Wwp1vfBp=933yoD%#JfwLqbwagq7k2AQIT%fUde~uPkTj%=CnVDYv8yyO~ZVt4L4c#y7AGP108Bd6LBnN6MS~sMdUUKHeyT', '2018-10-28 03:03:37', '2018-10-15 12:38:21'),
(5, 'testvorname2', 'testnachname2', '$2y$10$u0YM58dQETxgv3FOk70p5u72ZZU9nI5WbD9ml6pybqXyPxHZVeXHq', 'test2@web.de', '2018-10-10', 1, NULL, 'SB#9971533154', '208U~svF7xKhrHRl5azavOWH8qerNIB79V2LR9o=oeyNltRWmG1AXf3z3ZeWA5yMzR4lta11eysY4tswsKz=&n#k3hL7i4Z&#eY7V#K5DVyTI#a39=O8xYRhiLF8uuOYE&TTQhEToL8ASvydm8Yxwv8WnWj9IKOMjfLhI4gUEhueW2gLBNY1OW%fo%L6Jjad#i1PTKqd1ViqALmfXgGqE0P#duj3pnaR7T9Gso0uWGeYM3P2UUUdsOd#tjviTT0pi4##RlgmglnVibyrTmWd85UcM%bpS008b4nyZbAJTKuLuv#RfTDXla=f4#R&ggr00AE%PXSw2tBu8F79m8b6TqbVurjWBK0ZVUGwiLy8lI%wBJakHrA6KmzYBbnIPL35fKFJN9Zf7e~#17B=bJ8UHkSyFvsoc1M7%UP#ZOJbDmb3mCH4D5ih4nurGlJQBsJgZzWPC3oJUje8tsSf89=9eL4#ZLUl%bx8KcH7TRSxPqEpUdFxMmt%', '2018-10-31 16:47:16', '2018-10-27 20:33:00');

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

--
-- Daten für Tabelle `nachrichten`
--

INSERT INTO `nachrichten` (`naID`, `kommt_von`, `ist_für`, `betreff`, `beschreibung`, `gelesen`, `gelöscht`, `created_at`, `updated_at`) VALUES
(4, 3, 1, 'Hallo', 'Ich bin nur so heir', 1, 0, '2018-11-01 11:41:05', '2018-10-31 23:44:18'),
(5, 2, 1, 'Moin', 'Wie gehts dir so?', 1, 0, '2018-11-01 11:41:05', '2018-10-31 23:44:22'),
(6, 5, 1, 'Na', 'Schon den Rasenmäher gekauft?', 0, 0, '2018-11-01 11:42:58', '2018-11-01 11:42:58'),
(7, 3, 1, 'Hey hab vllt. ein Angebot', 'Habe einen Rasenmäher reingestellt. Habe gehört du suchst nach einem. Kannst ja einfach mal nachschauen ob er dir gefällt. :)', 0, 0, '2018-11-01 11:42:58', '2018-11-01 11:42:58');

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

--
-- Daten für Tabelle `news`
--

INSERT INTO `news` (`nID`, `titel`, `beschreibung`, `updated_at`, `created_at`) VALUES
(1, 'Endlich neue Rubriken', 'Wir freuen uns euch mitteilen zu dürfen, dass wir neue Rubriken eingeführt haben, die sie bei Ihren anzeigen benutzen können.', '2018-09-22 19:00:00', '2018-09-22 18:26:12'),
(2, 'Die Webseite ist da', 'Die neue Webseite ist endlich da. Nach mehreren Jahren ist es uns nun endlich gelungen die Webseite zu führen. Wir freuen uns auf erfolgreiche Jahre. Falls Sie Verbesserungsmöglichkeiten sehen, dann zögern Sie nicht diese uns mitzuteilen. Wir sind gerne für Vorschläge offen.', '2018-10-01 23:55:34', '2018-09-22 18:59:38'),
(3, 'Accounts', 'Endlich ist es da. Sie können nun endlich einen kostenlosen Account erstellen und so die Dienste unserer Tausch- und Schenkbörse kostenlos benutzen. Dazu müssen sie nur zum Registrierformular gehen und sich registrieren.', '2018-10-01 23:20:47', '2018-10-01 23:20:47'),
(4, 'Neue Rubriken', 'Es gibt endlich wieder mehr Vielfalt. Jetzt können Sie sich zwischen Zwei neuen Rubriken mehr entscheiden. Die Spielzeug und die Autorubrik sind auf häufiger Nachfrage erstellt und eingeweiht worden.\r\nMehrere Rubriken sind in Arbeit und werden zukünftig auch ins Team der vorhandenen Rubriken aufgenommen. Falls Sie Ideen für Rubriken haben, dann kontaktieren Sie uns gerne.', '2018-10-02 00:39:10', '2018-10-02 00:39:10'),
(24, 'test2', 'test2', '2018-10-28 17:16:25', '2018-10-28 17:16:25');

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

--
-- Daten für Tabelle `orte`
--

INSERT INTO `orte` (`ortID`, `Bezeichnung`, `laenge`, `breite`) VALUES
(6, 'Abensberg', '48.817', '11.850'),
(12, 'Achslach', '48.967', '12.933'),
(18, 'Adelmannsfelden', '48.950', '10.000'),
(24, 'Adenau', '50.383', '6.933'),
(30, 'Adorf', '50.755', '12.880'),
(36, 'Aham', '48.533', '12.467'),
(42, 'Ahlerstedt', '53.400', '9.450'),
(48, 'Aholming', '48.733', '12.917'),
(54, 'Ahrensbök', '54.017', '10.567'),
(60, 'Aichstetten', '47.883', '10.050'),
(66, 'Aiglsbach', '48.700', '11.717'),
(72, 'Aitrang', '47.817', '10.533'),
(78, 'Albertshofen', '49.767', '10.167'),
(84, 'Aldingen', '48.100', '8.700'),
(90, 'Alfeld (leine)', '51.983', '9.833'),
(96, 'Allendorf (lumda)', '50.683', '8.817'),
(102, 'Allmersbach im tal', '48.917', '9.467'),
(108, 'Alsdorf', '50.783', '7.883'),
(114, 'Alt duvenstedt', '54.367', '9.650'),
(120, 'Altdöbern', '51.654', '14.041'),
(126, 'Altenberg', '50.761', '13.768'),
(132, 'Altenfeld', '50.564', '10.963'),
(138, 'Altenkrempe', '54.133', '10.833'),
(144, 'Altenstadt', '47.817', '10.867'),
(150, 'Altentreptow', '53.697', '13.254'),
(156, 'Altheim (alb)', '48.583', '10.033'),
(162, 'Altmannstein', '48.900', '11.650'),
(168, 'Altusried', '47.800', '10.217'),
(174, 'Amelinghausen', '53.133', '10.217'),
(180, 'Amorbach', '49.650', '9.217'),
(186, 'Andernach', '50.433', '7.417'),
(192, 'Anklam', '53.856', '13.692'),
(198, 'Anröchte', '51.567', '8.333'),
(204, 'Apen', '53.217', '7.817'),
(210, 'Appenweier', '48.533', '7.983'),
(216, 'Arnbruck', '49.133', '13.000'),
(222, 'Arnstadt', '50.833', '10.955'),
(228, 'Artlenburg', '53.383', '10.483'),
(234, 'Asbach-bäumenheim', '48.683', '10.817'),
(240, 'Ascheberg (holstein)', '54.150', '10.350'),
(246, 'Asperg', '48.900', '9.133'),
(252, 'Attenweiler', '48.133', '9.700'),
(258, 'Audenhain', '51.498', '12.842'),
(264, 'Auerbach in der oberpfalz', '49.700', '11.633'),
(270, 'Augustdorf', '51.917', '8.750'),
(276, 'Auma', '50.702', '11.899'),
(282, 'Ausleben', '52.092', '11.112'),
(288, 'Baalberge', '51.764', '11.801'),
(294, 'Bach an der donau', '49.017', '12.300'),
(300, 'Bad alexandersbad', '50.017', '12.017'),
(306, 'Bad berneck', '50.050', '11.683'),
(312, 'Bad brambach', '50.229', '12.315'),
(318, 'Bad doberan', '54.108', '11.914'),
(324, 'Bad eilsen', '52.250', '9.100'),
(330, 'Bad frankenhausen', '51.358', '11.093'),
(336, 'Bad grund', '51.817', '10.233'),
(342, 'Bad honnef', '50.650', '7.233'),
(348, 'Bad klosterlausnitz', '50.915', '11.866'),
(354, 'Bad kösen', '51.138', '11.714'),
(360, 'Bad lauterberg im harz', '51.633', '10.467'),
(366, 'Bad mergentheim', '49.500', '9.767'),
(372, 'Bad neuenahr - ahrweiler', '50.550', '7.117'),
(378, 'Bad pyrmont', '51.983', '9.267'),
(384, 'Bad sachsa', '51.600', '10.550'),
(390, 'Bad schandau', '50.924', '14.156'),
(396, 'Bad segeberg', '53.933', '10.317'),
(402, 'Bad sülze', '54.110', '12.664'),
(408, 'Bad wiessee', '47.717', '11.717'),
(414, 'Bad wörishofen', '48.000', '10.600'),
(420, 'Badem', '50.000', '6.600'),
(426, 'Bahlingen', '48.117', '7.733'),
(432, 'Baiern', '47.967', '11.917'),
(438, 'Balge', '52.717', '9.183'),
(444, 'Balve', '51.333', '7.867'),
(450, 'Bannewitz', '50.998', '13.721'),
(456, 'Barenburg', '52.617', '8.800'),
(462, 'Barmstedt', '53.783', '9.767'),
(468, 'Barsinghausen', '52.300', '9.467'),
(474, 'Baruth', '51.229', '14.603'),
(480, 'Bastheim', '50.400', '10.200'),
(486, 'Bawinkel', '52.600', '7.417'),
(492, 'Bayrischzell', '47.683', '12.017'),
(498, 'Bechtheim', '49.733', '8.300'),
(504, 'Bedburg', '51.000', '6.567'),
(510, 'Beesenlaublingen', '51.716', '11.692'),
(516, 'Beiersdorf', '51.073', '14.548'),
(522, 'Belgern', '51.482', '13.121'),
(528, 'Beltheim', '50.100', '7.467'),
(534, 'Benediktbeuren', '47.700', '11.417'),
(540, 'Benshausen', '50.647', '10.594'),
(546, 'Berg', '47.967', '11.350'),
(552, 'Bergatreute', '47.850', '9.750'),
(558, 'Bergen (dumme)', '52.900', '10.967'),
(564, 'Bergisch gladbach', '50.983', '7.133'),
(570, 'Bergrheinfeld', '50.017', '10.183'),
(576, 'Berlin (ost)', '52.523', '13.413'),
(582, 'Bernau am chiemsee', '47.817', '12.383'),
(588, 'Bernkastel-kues', '49.917', '7.067'),
(594, 'Bernstadt', '48.500', '10.017'),
(600, 'Berthelsdorf', '51.050', '14.228'),
(606, 'Bessenbach', '49.967', '9.250'),
(612, 'Betzenstein', '49.683', '11.417'),
(618, 'Beuron', '48.083', '9.033'),
(624, 'Biberach', '48.333', '8.033'),
(630, 'Bickenbach', '49.750', '8.617'),
(636, 'Biebesheim am rhein', '49.783', '8.467'),
(642, 'Bielen', '51.489', '10.843'),
(648, 'Bietigheim', '48.917', '8.250'),
(654, 'Binau', '49.367', '9.050'),
(660, 'Binzen', '47.633', '7.633'),
(666, 'Birkenfeld', '48.867', '8.633'),
(672, 'Birnbach', '48.450', '13.100'),
(678, 'Bischoffen', '50.700', '8.450'),
(684, 'Bischofswiesen', '47.650', '12.967'),
(690, 'Bissingen', '48.717', '10.617'),
(696, 'Blaichach', '47.533', '10.250'),
(702, 'Blankenheim', '51.507', '11.433'),
(708, 'Blekendorf', '54.283', '10.683'),
(714, 'Blomberg', '53.583', '7.567'),
(720, 'Bocholt', '51.833', '6.617'),
(726, 'Bockhorn', '48.317', '11.983'),
(732, 'Bodenmais', '49.067', '13.100'),
(738, 'Bodolz', '47.567', '9.667'),
(744, 'Bokholt-hanredder', '53.783', '9.717'),
(750, 'Bomlitz', '52.900', '9.667'),
(756, 'Bopfingen', '48.850', '10.350'),
(762, 'Borgholzhausen', '52.100', '8.300'),
(768, 'Borna', '51.128', '12.507'),
(774, 'Bornstedt', '51.479', '11.485'),
(780, 'Bothel', '53.067', '9.500'),
(786, 'Boxdorf', '51.119', '13.699'),
(792, 'Brakel', '51.717', '9.183'),
(798, 'Brandis', '51.330', '12.609'),
(804, 'Braunlage', '51.733', '10.617'),
(810, 'Breckerfeld', '51.267', '7.467'),
(816, 'Breisach am rhein', '48.033', '7.583'),
(822, 'Breitenbrunn', '48.133', '10.400'),
(828, 'Breitenworbis', '51.411', '10.431'),
(834, 'Bremen', '53.083', '8.817'),
(840, 'Bretten', '49.033', '8.717'),
(846, 'Briedel', '50.017', '7.150'),
(852, 'Brigachtal', '48.017', '8.467'),
(858, 'Brokstedt', '54.000', '9.817'),
(864, 'Bruchköbel', '50.183', '8.917'),
(870, 'Bruckmühl', '47.883', '11.917'),
(876, 'Bräunlingen', '47.933', '8.450'),
(882, 'Brüel', '53.741', '11.712'),
(888, 'Bubenreuth', '49.633', '11.017'),
(894, 'Buchdorf', '48.783', '10.833'),
(900, 'Buchholz in der nordheide', '53.333', '9.883'),
(906, 'Bullay', '50.050', '7.133'),
(912, 'Burg', '52.273', '11.854'),
(918, 'Burgbernheim', '49.450', '10.333'),
(924, 'Burghaslach', '49.733', '10.600'),
(930, 'Burglauer', '50.283', '10.183'),
(936, 'Burgsinn', '50.150', '9.650'),
(942, 'Burgwindheim', '49.833', '10.600'),
(948, 'Burladingen', '48.300', '9.117'),
(954, 'Butjadingen', '53.550', '8.350'),
(960, 'Buxheim', '48.800', '11.300'),
(966, 'Böblingen', '48.683', '9.017'),
(972, 'Bönebüttel', '54.067', '10.050'),
(978, 'Börnichen', '50.750', '13.145'),
(984, 'Bösel', '53.000', '7.950'),
(990, 'Büchen', '53.483', '10.617'),
(996, 'Büdelsdorf', '54.317', '9.667'),
(1002, 'Bülkau', '53.750', '8.983'),
(1008, 'Büsingen', '47.700', '8.683'),
(1014, 'Cadolzburg', '49.467', '10.850'),
(1020, 'Calvörde', '52.399', '11.299'),
(1026, 'Carlow', '53.757', '10.935'),
(1032, 'Chemnitz', '50.830', '12.917'),
(1038, 'Clausthal-zellerfeld', '51.800', '10.333'),
(1044, 'Coesfeld', '51.933', '7.167'),
(1050, 'Conradsdorf', '50.950', '13.377'),
(1056, 'Coswig', '51.888', '12.442'),
(1062, 'Creglingen', '49.467', '10.033'),
(1068, 'Crivitz', '53.580', '11.646'),
(1074, 'Cunewalde', '51.099', '14.529'),
(1080, 'Dachsbach', '49.650', '10.700'),
(1086, 'Dahlewitz', '52.326', '13.443'),
(1092, 'Dammbach', '49.867', '9.333'),
(1098, 'Darmstadt', '49.867', '8.650'),
(1104, 'Dattenberg', '50.550', '7.300'),
(1110, 'Dedeleben', '52.037', '10.888'),
(1116, 'Deidesheim', '49.400', '8.183'),
(1122, 'Deisslingen', '48.067', '8.600'),
(1128, 'Delmenhorst', '53.050', '8.633'),
(1134, 'Denklingen', '47.917', '10.850'),
(1140, 'Dernau', '50.533', '7.050'),
(1146, 'Detmold', '51.933', '8.883'),
(1152, 'Dettingen an der iller', '48.117', '10.117'),
(1158, 'Deutscheinsiedel', '50.633', '13.493'),
(1164, 'Diekholzen', '52.100', '9.933'),
(1170, 'Diepholz', '52.600', '8.367'),
(1176, 'Dietenheim', '48.217', '10.067'),
(1182, 'Dietmannsried', '47.817', '10.283'),
(1188, 'Dillingen an der donau', '48.583', '10.500'),
(1194, 'Dinkelsbühl', '49.067', '10.317'),
(1200, 'Dirlewang', '48.000', '10.500'),
(1206, 'Dittelbrunn', '50.083', '10.217'),
(1212, 'Ditzingen', '48.833', '9.067'),
(1218, 'Dollart', '53.283', '7.233'),
(1224, 'Donaueschingen', '47.950', '8.500'),
(1230, 'Dorfchemnitz', '50.670', '12.841'),
(1236, 'Dornburg', '50.500', '8.017'),
(1242, 'Dornumersiel', '53.683', '7.483'),
(1248, 'Drachselsried', '49.100', '13.017'),
(1254, 'Drebber', '52.650', '8.417'),
(1260, 'Dresden', '51.050', '13.739'),
(1266, 'Dudeldorf', '49.967', '6.633'),
(1272, 'Dunningen', '48.217', '8.500'),
(1278, 'Dusslingen', '48.450', '9.050'),
(1284, 'Döllnitz', '51.408', '12.025'),
(1290, 'Dörpen', '52.967', '7.317'),
(1296, 'Dünsen', '52.917', '8.633'),
(1302, 'Dürrlauingen', '48.467', '10.433'),
(1308, 'Ebenhausen', '48.683', '11.467'),
(1314, 'Ebermannsdorf', '49.400', '11.950'),
(1320, 'Ebersbach', '51.243', '13.658'),
(1326, 'Ebersdorf', '51.080', '14.699'),
(1332, 'Ebnath', '49.950', '11.933'),
(1338, 'Eching', '48.500', '12.067'),
(1344, 'Eckersdorf', '49.933', '11.500'),
(1350, 'Edermünde', '51.217', '9.450'),
(1356, 'Effeltrich', '49.667', '11.100'),
(1362, 'Egestorf', '53.200', '10.067'),
(1368, 'Eggersdorf', '52.539', '13.822'),
(1374, 'Eging am see', '48.717', '13.267'),
(1380, 'Ehingen', '49.083', '10.550'),
(1386, 'Ehrenburg', '52.750', '8.700'),
(1392, 'Eibenstock', '50.495', '12.601'),
(1398, 'Eichenzell', '50.500', '9.683'),
(1404, 'Eigeltingen', '47.867', '8.900'),
(1410, 'Eimen', '51.883', '9.783'),
(1416, 'Eiselfing', '48.050', '12.233'),
(1422, 'Eisenhüttenstadt', '52.151', '14.634'),
(1428, 'Eitelborn', '50.383', '7.717'),
(1434, 'Elbingerode', '51.773', '10.802'),
(1440, 'Elfershausen', '50.150', '9.967'),
(1446, 'Ellerbek', '53.667', '9.867'),
(1452, 'Ellzee', '48.333', '10.317'),
(1458, 'Elsdorf', '53.250', '9.350'),
(1464, 'Elsterberg', '50.610', '12.167'),
(1470, 'Eltville am rhein', '50.033', '8.133'),
(1476, 'Embsen', '53.183', '10.350'),
(1482, 'Emmerich', '51.833', '6.250'),
(1488, 'Emsbüren', '52.400', '7.283'),
(1494, 'Endingen', '48.150', '7.700'),
(1500, 'Engelskirchen', '50.983', '7.417'),
(1506, 'Enkenbach-alsenborn', '49.483', '7.900'),
(1512, 'Enzklösterle', '48.667', '8.467'),
(1518, 'Eppendorf', '50.800', '13.228'),
(1524, 'Erbach', '49.667', '9.000'),
(1530, 'Erdweg', '48.333', '11.300'),
(1536, 'Ergersheim', '49.517', '10.333'),
(1542, 'Erkenbrechtsweiler', '48.567', '9.433'),
(1548, 'Erlangen', '49.600', '11.000'),
(1554, 'Erlenbach bei marktheidenfeld', '49.817', '9.633'),
(1560, 'Ernsgaden', '48.733', '11.567'),
(1566, 'Erzhausen', '49.950', '8.633'),
(1572, 'Escheburg', '53.467', '10.317'),
(1578, 'Eschenlohe', '47.600', '11.183'),
(1584, 'Esgrus', '54.733', '9.783'),
(1590, 'Essen', '51.467', '7.017'),
(1596, 'Esslingen am neckar', '48.750', '9.300'),
(1602, 'Ettal', '47.567', '11.100'),
(1608, 'Etzenricht', '49.633', '12.100'),
(1614, 'Euskirchen', '50.667', '6.783'),
(1620, 'Extertal', '52.100', '9.117'),
(1626, 'Fahrenkrug', '53.950', '10.250'),
(1632, 'Falkenhain', '51.397', '12.871'),
(1638, 'Farchant', '47.533', '11.117'),
(1644, 'Feilbingert', '49.783', '7.800'),
(1650, 'Felde', '54.300', '9.933'),
(1656, 'Felm', '54.417', '10.067'),
(1662, 'Feuchtwangen', '49.167', '10.333'),
(1668, 'Finnentrop', '51.167', '7.967'),
(1674, 'Finsterwalde', '51.633', '13.713'),
(1680, 'Fischbachtal', '49.767', '8.817'),
(1686, 'Flein', '49.100', '9.217'),
(1692, 'Flonheim', '49.783', '8.033'),
(1698, 'Flörsbachtal', '50.133', '9.483'),
(1704, 'Forchheim', '48.167', '7.700'),
(1710, 'Forstinning', '48.167', '11.917'),
(1716, 'Frankenberg (eder)', '51.067', '8.800'),
(1722, 'Frankleben', '51.310', '11.931'),
(1728, 'Fraunberg', '48.367', '12.000'),
(1734, 'Fredersdorf', '52.523', '13.754'),
(1740, 'Freiburg im breisgau', '48.000', '7.850'),
(1746, 'Freilassing', '47.850', '12.983'),
(1752, 'Frellstedt', '52.200', '10.917'),
(1758, 'Freudenberg', '50.900', '7.883'),
(1764, 'Freystadt', '49.200', '11.333'),
(1770, 'Fridolfing', '48.000', '12.833'),
(1776, 'Friedenweiler', '47.917', '8.250'),
(1782, 'Friedland', '53.672', '13.554'),
(1788, 'Friedrichskoog', '54.017', '8.900'),
(1794, 'Friesenhagen', '50.900', '7.800'),
(1800, 'Fritzlar', '51.133', '9.283'),
(1806, 'Frose', '51.798', '11.373'),
(1812, 'Fuldabrück', '51.267', '9.500'),
(1818, 'Förderstedt', '51.894', '11.630'),
(1824, 'Fürstenfeldbruck', '48.183', '11.267'),
(1830, 'Fürthen', '50.783', '7.667'),
(1836, 'Gaggenau', '48.800', '8.317'),
(1842, 'Gaissach', '47.750', '11.583'),
(1848, 'Gangkofen', '48.433', '12.567'),
(1854, 'Garmisch-partenkirchen', '47.500', '11.100'),
(1860, 'Gaschwitz', '51.252', '12.377'),
(1866, 'Gauernitz', '51.115', '13.563'),
(1872, 'Gebsattel', '49.350', '10.200'),
(1878, 'Gefrees', '50.100', '11.733'),
(1884, 'Geiselbach', '50.117', '9.200'),
(1890, 'Geisingen', '47.917', '8.650'),
(1896, 'Gelenau', '50.713', '12.978'),
(1902, 'Gemmrigheim', '49.033', '9.150'),
(1908, 'Genderkingen', '48.700', '10.883'),
(1914, 'Georgenthal', '50.828', '10.656'),
(1920, 'Gerbrunn', '49.783', '9.983'),
(1926, 'Gerlingen', '48.800', '9.067'),
(1932, 'Gernsheim', '49.750', '8.483'),
(1938, 'Gersdorf', '50.759', '12.710'),
(1944, 'Gerstetten', '48.617', '10.017'),
(1950, 'Geschwenda', '50.734', '10.825'),
(1956, 'Gevelsberg', '51.317', '7.333'),
(1962, 'Gielow', '53.693', '12.750'),
(1968, 'Gilching', '48.117', '11.283'),
(1974, 'Gingen an der fils', '48.667', '9.783'),
(1980, 'Glan-münchweiler', '49.467', '7.450'),
(1986, 'Glaubitz', '51.326', '13.379'),
(1992, 'Glonn', '47.983', '11.867'),
(1998, 'Gmund am tegernsee', '47.750', '11.733'),
(2004, 'Goldbach', '50.000', '9.183'),
(2010, 'Golmbach', '51.900', '9.550'),
(2016, 'Gompitz', '51.044', '13.643'),
(2022, 'Goseck', '51.197', '11.866'),
(2028, 'Gotteszell', '48.967', '12.967'),
(2034, 'Grabenstätt', '47.850', '12.550'),
(2040, 'Grafenhausen', '47.767', '8.267'),
(2046, 'Grafrath', '48.117', '11.167'),
(2052, 'Granschütz', '51.186', '12.054'),
(2058, 'Grassau', '47.783', '12.450'),
(2064, 'Greding', '49.050', '11.350'),
(2070, 'Greiz', '50.656', '12.203'),
(2076, 'Greussen', '51.229', '10.951'),
(2082, 'Griesheim', '49.867', '8.550'),
(2088, 'Gronau (westfalen)', '52.200', '7.033'),
(2094, 'Gross kölzig', '51.638', '14.599'),
(2100, 'Gross rosenburg', '51.915', '11.880'),
(2106, 'Gross ziethen', '52.397', '13.443'),
(2112, 'Gross-zimmern', '49.883', '8.817'),
(2118, 'Grossbottwar', '49.000', '9.283'),
(2124, 'Grossenaspe', '53.983', '9.967'),
(2130, 'Grossensee', '53.617', '10.350'),
(2136, 'Grossfurra', '51.401', '10.806'),
(2142, 'Grossheide', '53.600', '7.350'),
(2148, 'Grosskmehlen', '51.376', '13.724'),
(2154, 'Grossmehring', '48.767', '11.533'),
(2160, 'Grosspostwitz', '51.119', '14.452'),
(2166, 'Grossschirma', '50.963', '13.308'),
(2172, 'Grosswallstadt', '49.883', '9.167'),
(2178, 'Grumbach', '50.548', '13.109'),
(2184, 'Gräfenhainichen', '51.732', '12.449'),
(2190, 'Gröben', '51.126', '12.047'),
(2196, 'Grömitz', '54.150', '10.950'),
(2202, 'Grünberg', '50.600', '8.967'),
(2208, 'Grünhainichen', '50.768', '13.156'),
(2214, 'Gschwend', '48.933', '9.750'),
(2220, 'Gundelfingen', '48.050', '7.867'),
(2226, 'Guntersblum', '49.800', '8.350'),
(2232, 'Gutach im breisgau', '48.117', '7.983'),
(2238, 'Gäufelden', '48.550', '8.817'),
(2244, 'Görlitz', '51.156', '14.993'),
(2250, 'Gössnitz', '50.892', '12.435'),
(2256, 'Günzburg', '48.450', '10.283'),
(2262, 'Gütersloh', '51.900', '8.383'),
(2268, 'Haarbach', '48.500', '13.150'),
(2274, 'Hafenlohr', '49.867', '9.600'),
(2280, 'Hagenbach', '49.017', '8.250'),
(2286, 'Hahnheim', '49.867', '8.233'),
(2292, 'Haigerloch', '48.367', '8.800'),
(2298, 'Hainichen', '50.972', '13.120'),
(2304, 'Haldensleben', '52.296', '11.414'),
(2310, 'Halle', '51.479', '11.978'),
(2316, 'Hallstadt', '49.933', '10.883'),
(2322, 'Hamberge', '53.833', '10.583'),
(2328, 'Hameln', '52.100', '9.350'),
(2334, 'Hammelburg', '50.117', '9.883'),
(2340, 'Handewitt', '54.767', '9.317'),
(2346, 'Hannover', '52.383', '9.733'),
(2352, 'Hardt', '48.183', '8.417'),
(2358, 'Harsefeld', '53.450', '9.500'),
(2364, 'Hartha', '51.101', '12.974'),
(2370, 'Hasbergen', '52.250', '7.950'),
(2376, 'Haslach im kinzigtal', '48.283', '8.083'),
(2382, 'Hasselroth', '50.167', '9.100'),
(2388, 'Hatten', '53.017', '8.350'),
(2394, 'Hattorf am harz', '51.650', '10.233'),
(2400, 'Hauneck', '50.833', '9.717'),
(2406, 'Hausen', '48.867', '12.000'),
(2412, 'Hausham', '47.750', '11.833'),
(2418, 'Hebertsfelden', '48.400', '12.817'),
(2424, 'Hedersleben', '51.858', '11.250'),
(2430, 'Hehlen', '51.983', '9.467'),
(2436, 'Heidenau', '53.317', '9.650'),
(2442, 'Heidgraben', '53.700', '9.683'),
(2448, 'Heiligenhaus', '51.333', '6.967'),
(2454, 'Heilsbronn', '49.333', '10.800'),
(2460, 'Heimsheim', '48.800', '8.867'),
(2466, 'Heist', '53.650', '9.650'),
(2472, 'Hellenhahn-schellenberg', '50.617', '8.033'),
(2478, 'Helpsen', '52.317', '9.133'),
(2484, 'Hemhofen', '49.683', '10.933'),
(2490, 'Hemsbünde', '53.100', '9.467'),
(2496, 'Hennigsdorf', '52.649', '13.212'),
(2502, 'Herbertingen', '48.067', '9.433'),
(2508, 'Herdecke', '51.400', '7.433'),
(2514, 'Hergisdorf', '51.537', '11.485'),
(2520, 'Hermaringen', '48.600', '10.267'),
(2526, 'Herne', '51.550', '7.217'),
(2532, 'Herrischried', '47.667', '8.000'),
(2538, 'Herten', '51.600', '7.133'),
(2544, 'Herzfelde', '52.484', '13.848'),
(2550, 'Hespe', '52.333', '9.117'),
(2556, 'Hessisch-oldendorf', '52.167', '9.250'),
(2562, 'Hettstedt', '51.647', '11.514'),
(2568, 'Heuchelheim bei frankenthal', '49.567', '8.300'),
(2574, 'Heyerode', '51.167', '10.319'),
(2580, 'Hilden', '51.167', '6.933'),
(2586, 'Hille', '52.333', '8.750'),
(2592, 'Hilter am teutoburger wald', '52.133', '8.150'),
(2598, 'Himmelstadt', '49.917', '9.800'),
(2604, 'Hipstedt', '53.483', '8.967'),
(2610, 'Hirschberg an der bergstrasse', '49.500', '8.650'),
(2616, 'Hitzacker', '53.150', '11.050'),
(2622, 'Hochheim am main', '50.017', '8.350'),
(2628, 'Hockenheim', '49.317', '8.550'),
(2634, 'Hofgeismar', '51.500', '9.383'),
(2640, 'Hohberg', '48.417', '7.917'),
(2646, 'Hohenbrunn', '48.050', '11.700'),
(2652, 'Hohenfurch', '47.850', '10.900'),
(2658, 'Hohenlockstedt', '53.967', '9.633'),
(2664, 'Hohenstein', '48.333', '9.300'),
(2670, 'Hohenthurm', '51.525', '12.098'),
(2676, 'Hohne', '52.583', '10.367'),
(2682, 'Holle', '52.083', '10.167'),
(2688, 'Hollstadt', '50.350', '10.283'),
(2694, 'Holzdorf', '51.780', '13.133'),
(2700, 'Holzmaden', '48.633', '9.517'),
(2706, 'Homburg', '49.317', '7.333'),
(2712, 'Horgenzell', '47.800', '9.500'),
(2718, 'Hornberg', '48.217', '8.233'),
(2724, 'Hosena', '51.459', '14.029'),
(2730, 'Huisheim', '48.817', '10.700'),
(2736, 'Hurlach', '48.117', '10.817'),
(2742, 'Häusern', '47.750', '8.167'),
(2748, 'Höchstädt an der donau', '48.617', '10.567'),
(2754, 'Höhn', '50.617', '7.983'),
(2760, 'Hördt', '49.167', '8.333'),
(2766, 'Hötensleben', '52.122', '11.022'),
(2772, 'Hüffenhardt', '49.300', '9.083'),
(2778, 'Hünfeld', '50.667', '9.767'),
(2784, 'Hürup', '54.750', '9.533'),
(2790, 'Ibbenbüren', '52.283', '7.717'),
(2796, 'Iffeldorf', '47.767', '11.317'),
(2802, 'Iggingen', '48.833', '9.883'),
(2808, 'Ilberstedt', '51.803', '11.663'),
(2814, 'Illingen', '48.950', '8.917'),
(2820, 'Ilsede', '52.267', '10.217'),
(2826, 'Immenhausen', '51.433', '9.483'),
(2832, 'Ingelfingen', '49.300', '9.650'),
(2838, 'Inning am ammersee', '48.083', '11.150'),
(2844, 'Ippesheim', '49.600', '10.233'),
(2850, 'Irsee', '47.917', '10.583'),
(2856, 'Isny im allgäu', '47.700', '10.033'),
(2862, 'Ittlingen', '49.200', '8.933'),
(2868, 'Jagstzell', '49.033', '10.100'),
(2874, 'Jarmen', '53.924', '13.340'),
(2880, 'Jengen', '48.000', '10.733'),
(2886, 'Jessen', '51.791', '12.958'),
(2892, 'Jetzendorf', '48.433', '11.417'),
(2898, 'Johanngeorgenstadt', '50.438', '12.714'),
(2904, 'Julbach', '48.267', '12.967'),
(2910, 'Jüchen', '51.100', '6.500'),
(2916, 'Kahl am main', '50.067', '9.017'),
(2922, 'Kalbach', '50.417', '9.683'),
(2928, 'Kallmünz', '49.167', '11.950'),
(2934, 'Kamenz', '51.278', '14.107'),
(2940, 'Kampen (sylt)', '54.950', '8.350'),
(2946, 'Kappelrodeck', '48.600', '8.117'),
(2952, 'Karlshuld', '48.683', '11.283'),
(2958, 'Karstädt', '53.161', '11.735'),
(2964, 'Kastellaun', '50.067', '7.450'),
(2970, 'Katzhütte', '50.553', '11.052'),
(2976, 'Kaufungen', '51.283', '9.633'),
(2982, 'Kelheim', '48.917', '11.867'),
(2988, 'Kelsterbach', '50.067', '8.533'),
(2994, 'Kempen', '51.367', '6.417'),
(3000, 'Kerken', '51.450', '6.367'),
(3006, 'Kettershausen', '48.183', '10.267'),
(3012, 'Kiefersfelden', '47.617', '12.183'),
(3018, 'Kindelbrück', '51.261', '11.090'),
(3024, 'Kirchanschöring', '47.950', '12.833'),
(3030, 'Kirchberg an der jagst', '49.200', '9.983'),
(3036, 'Kirchdorf an der amper', '48.467', '11.650'),
(3042, 'Kirchenpingarten', '49.917', '11.783'),
(3048, 'Kirchham', '48.350', '13.267'),
(3054, 'Kirchheim an der weinstrasse', '49.533', '8.183'),
(3060, 'Kirchlauter', '50.050', '10.717'),
(3066, 'Kirchweidach', '48.083', '12.650'),
(3072, 'Kirschau', '51.089', '14.438'),
(3078, 'Kisslegg', '47.783', '9.883'),
(3084, 'Klausdorf', '52.156', '13.413'),
(3090, 'Klein-winternheim', '49.933', '8.217'),
(3096, 'Kleinmachnow', '52.413', '13.223'),
(3102, 'Klettgau', '47.650', '8.417'),
(3108, 'Klipphausen', '51.076', '13.529'),
(3114, 'Kluse', '52.933', '7.350'),
(3120, 'Knetzgau', '50.000', '10.550'),
(3126, 'Kodersdorf', '51.245', '14.897'),
(3132, 'Kolitzheim', '49.917', '10.233'),
(3138, 'Konstanz', '47.667', '9.183'),
(3144, 'Korntal-münchingen', '48.833', '9.117'),
(3150, 'Kottweiler-schwanden', '49.467', '7.533'),
(3156, 'Kranenburg', '51.783', '6.017'),
(3162, 'Kreba-neudorf', '51.349', '14.688'),
(3168, 'Krempe', '53.833', '9.483'),
(3174, 'Kreuzau', '50.750', '6.483'),
(3180, 'Kriegsfeld', '49.717', '7.917'),
(3186, 'Kronberg im taunus', '50.183', '8.517'),
(3192, 'Kroppenstedt', '51.945', '11.306'),
(3198, 'Krummennaab', '49.833', '12.100'),
(3204, 'Kröning', '48.550', '12.367'),
(3210, 'Kuckau', '51.239', '14.210'),
(3216, 'Kummerfeld', '53.700', '9.800'),
(3222, 'Kurort seiffen', '50.649', '13.449'),
(3228, 'Kyritz', '52.947', '12.396'),
(3234, 'Kölleda', '51.190', '11.246'),
(3240, 'Königsbach-stein', '48.967', '8.617'),
(3246, 'Königsee', '50.663', '11.097'),
(3252, 'Königsmoos', '48.667', '11.217'),
(3258, 'Königswinter', '50.683', '7.200'),
(3264, 'Körperich', '49.933', '6.267'),
(3270, 'Kühbach', '48.500', '11.183'),
(3276, 'Künzell', '50.550', '9.717'),
(3282, 'Kürten', '51.050', '7.267'),
(3288, 'Laatzen', '52.317', '9.783'),
(3294, 'Ladelund', '54.850', '9.033'),
(3300, 'Lahntal', '50.867', '8.700'),
(3306, 'Lambrecht (pfalz)', '49.367', '8.067'),
(3312, 'Lamstedt', '53.633', '9.100'),
(3318, 'Landsberg', '51.525', '12.152'),
(3324, 'Langdorf', '49.017', '13.150'),
(3330, 'Langenaltheim', '48.900', '10.933'),
(3336, 'Langenbernsdorf', '50.757', '12.322'),
(3342, 'Langenenslingen', '48.150', '9.383'),
(3348, 'Langenhorn', '54.683', '8.933'),
(3354, 'Langenorla', '50.748', '11.580'),
(3360, 'Langenwetzendorf', '50.679', '12.098'),
(3366, 'Langerwisch', '52.314', '13.068'),
(3372, 'Langsur', '49.733', '6.500'),
(3378, 'Lastrup', '52.800', '7.867'),
(3384, 'Lauchhammer', '51.493', '13.757'),
(3390, 'Lauenau', '52.283', '9.367'),
(3396, 'Lauf', '48.650', '8.133'),
(3402, 'Laugna', '48.533', '10.700'),
(3408, 'Lautenbach', '48.517', '8.117'),
(3414, 'Lauterstein', '48.700', '9.883'),
(3420, 'Lechbruck', '47.700', '10.800'),
(3426, 'Leezen', '53.867', '10.250'),
(3432, 'Lehnin', '52.326', '12.750'),
(3438, 'Leiblfing', '48.767', '12.517'),
(3444, 'Leimen', '49.350', '8.683'),
(3450, 'Leingarten', '49.150', '9.117'),
(3456, 'Leisnig', '51.161', '12.930'),
(3462, 'Lemgo', '52.033', '8.900'),
(3468, 'Lengenwang', '47.700', '10.600'),
(3474, 'Lensahn', '54.217', '10.883'),
(3480, 'Leonberg', '49.950', '12.283'),
(3486, 'Leubsdorf', '50.550', '7.283'),
(3492, 'Leupoldsgrün', '50.300', '11.800'),
(3498, 'Leutkirch im allgäu', '47.833', '10.017'),
(3504, 'Lichtenau', '51.617', '8.900'),
(3510, 'Lichtenhain', '50.947', '14.246'),
(3516, 'Liebenau', '51.500', '9.283'),
(3522, 'Liegau', '51.138', '13.882'),
(3528, 'Limburg an der lahn', '50.383', '8.067'),
(3534, 'Linden', '49.350', '7.650'),
(3540, 'Lindenthal', '51.392', '12.333'),
(3546, 'Lindwedel', '52.617', '9.683'),
(3552, 'Linsengericht', '50.167', '9.217'),
(3558, 'List', '55.017', '8.433'),
(3564, 'Lohberg', '49.167', '13.100'),
(3570, 'Lohne (oldenburg)', '52.667', '8.233'),
(3576, 'Lollar', '50.650', '8.700'),
(3582, 'Lorch', '50.050', '7.800'),
(3588, 'Lottstetten', '47.633', '8.567'),
(3594, 'Luckenwalde', '52.089', '13.174'),
(3600, 'Ludwigslust', '53.326', '11.500'),
(3606, 'Lunden', '54.333', '9.017'),
(3612, 'Lutter am barenberge', '51.983', '10.267'),
(3618, 'Löbejün', '51.640', '11.899'),
(3624, 'Löhnberg', '50.517', '8.283'),
(3630, 'Löwenstein', '49.100', '9.383'),
(3636, 'Lübz', '53.466', '12.027'),
(3642, 'Lüdinghausen', '51.767', '7.433'),
(3648, 'Lütjensee', '53.650', '10.367'),
(3654, 'Magdeburg', '52.122', '11.619'),
(3660, 'Maikammer', '49.300', '8.133'),
(3666, 'Mainleus', '50.100', '11.383'),
(3672, 'Malborn', '49.717', '6.983'),
(3678, 'Malsburg-marzell', '47.767', '7.733'),
(3684, 'Mamming', '48.650', '12.600'),
(3690, 'Mansfeld', '51.592', '11.455'),
(3696, 'Margetshöchheim', '49.833', '9.867'),
(3702, 'Marienmünster', '51.833', '9.217'),
(3708, 'Markgröningen', '48.900', '9.083'),
(3714, 'Markt berolzheim', '49.000', '10.850'),
(3720, 'Markt rettenbach', '47.950', '10.400'),
(3726, 'Marktheidenfeld', '49.850', '9.600'),
(3732, 'Marktredwitz', '50.000', '12.083'),
(3738, 'Marl', '51.667', '7.100'),
(3744, 'Marpingen', '49.450', '7.050'),
(3750, 'Martinshöhe', '49.367', '7.483'),
(3756, 'Massen', '51.644', '13.735'),
(3762, 'Mauerstetten', '47.883', '10.667'),
(3768, 'Mayen', '50.333', '7.217'),
(3774, 'Meddersheim', '49.783', '7.617'),
(3780, 'Meerbusch', '51.267', '6.683'),
(3786, 'Mehring', '48.183', '12.783'),
(3792, 'Meinerzhagen', '51.100', '7.633'),
(3798, 'Meissner', '51.217', '9.933'),
(3804, 'Mellensee', '52.183', '13.451'),
(3810, 'Melsungen', '51.133', '9.550'),
(3816, 'Mengen', '48.050', '9.333'),
(3822, 'Meppen', '52.700', '7.300'),
(3828, 'Merkendorf', '49.200', '10.700'),
(3834, 'Mertingen', '48.667', '10.800'),
(3840, 'Merzhausen', '47.967', '7.833'),
(3846, 'Messkirch', '48.000', '9.117'),
(3852, 'Mettlach', '49.500', '6.583'),
(3858, 'Meyenburg', '53.314', '12.242'),
(3864, 'Michelstadt', '49.683', '9.000'),
(3870, 'Mieste', '52.482', '11.205'),
(3876, 'Miltenberg', '49.700', '9.267'),
(3882, 'Minfeld', '49.067', '8.150'),
(3888, 'Mittelbach', '50.800', '12.804'),
(3894, 'Mittenwald', '47.450', '11.267'),
(3900, 'Mitwitz', '50.250', '11.217'),
(3906, 'Mogendorf', '50.500', '7.767'),
(3912, 'Molfsee', '54.267', '10.067'),
(3918, 'Montabaur', '50.433', '7.833'),
(3924, 'Moorrege', '53.667', '9.667'),
(3930, 'Moosinning', '48.283', '11.850'),
(3936, 'Morschen', '51.067', '9.617'),
(3942, 'Motten', '50.400', '9.767'),
(3948, 'Mulda', '50.805', '13.424'),
(3954, 'Munster', '52.983', '10.083'),
(3960, 'Muschwitz', '51.195', '12.112'),
(3966, 'Mögglingen', '48.817', '9.967'),
(3972, 'Mölkau', '51.321', '12.453'),
(3978, 'Mönchsdeggingen', '48.767', '10.583'),
(3984, 'Mörlenbach', '49.600', '8.733'),
(3990, 'Mücheln', '51.298', '11.808'),
(3996, 'Mühlau', '50.908', '12.768'),
(4002, 'Mühlhausen', '49.250', '8.733'),
(4008, 'Mühlingen', '47.917', '9.017'),
(4014, 'Mülsen st. Niclas', '50.722', '12.596'),
(4020, 'Münchsmünster', '48.767', '11.683'),
(4026, 'Münsing', '47.900', '11.367'),
(4032, 'Münsterhausen', '48.317', '10.450'),
(4038, 'Nachrodt-wiblingwerde', '51.333', '7.650'),
(4044, 'Naila', '50.333', '11.717'),
(4050, 'Nassau', '50.766', '13.547'),
(4056, 'Naumburg', '51.154', '11.812'),
(4062, 'Nauort', '50.467', '7.633'),
(4068, 'Neckarsulm', '49.200', '9.233'),
(4074, 'Nehren', '48.433', '9.067'),
(4080, 'Nellingen', '48.550', '9.800'),
(4086, 'Nersingen', '48.433', '10.117'),
(4092, 'Nettetal', '51.300', '6.283'),
(4098, 'Neu-eichenberg', '51.400', '9.917'),
(4104, 'Neubeuern', '47.783', '12.133'),
(4110, 'Neuburg am inn', '48.500', '13.450'),
(4116, 'Neudenau', '49.300', '9.267'),
(4122, 'Neuendettelsau', '49.283', '10.783'),
(4128, 'Neuenkirchen', '53.033', '9.700'),
(4134, 'Neuenstadt am kocher', '49.233', '9.333'),
(4140, 'Neufahrn in niederbayern', '48.733', '12.183'),
(4146, 'Neuhaus (oste)', '53.800', '9.033'),
(4152, 'Neuhausen', '50.697', '13.467'),
(4158, 'Neuh*usel', '50.383', '7.717'),
(4164, 'Neukirchen', '48.983', '12.767'),
(4170, 'Neukirchen beim heiligen blut', '49.267', '12.967'),
(4176, 'Neulingen', '48.967', '8.700'),
(4182, 'Neumünster', '54.067', '9.983'),
(4188, 'Neunkirchen am brand', '49.617', '11.133'),
(4194, 'Neuried', '48.100', '11.467'),
(4200, 'Neusitz', '49.367', '10.217'),
(4206, 'Neustadt', '52.865', '12.422'),
(4212, 'Neustadt an der aisch', '49.583', '10.600'),
(4218, 'Neustadt-glewe', '53.383', '11.581'),
(4224, 'Neuweiler', '48.633', '8.583'),
(4230, 'Nickenich', '50.417', '7.333'),
(4236, 'Niedenstein', '51.233', '9.317'),
(4242, 'Niederbergkirchen', '48.317', '12.500'),
(4248, 'Niederelbert', '50.400', '7.817'),
(4254, 'Niedergörsdorf', '51.984', '12.992'),
(4260, 'Niederlauer', '50.300', '10.183'),
(4266, 'Niederndodeleben', '52.138', '11.500'),
(4272, 'Niederorschel', '51.376', '10.424'),
(4278, 'Niedertaufkirchen', '48.333', '12.550'),
(4284, 'Niederwörresbach', '49.767', '7.333'),
(4290, 'Niemetal', '51.517', '9.717'),
(4296, 'Niesky', '51.294', '14.827'),
(4302, 'Nittenau', '49.200', '12.283'),
(4308, 'Nonnweiler', '49.600', '6.967'),
(4314, 'Nordgermersleben', '52.213', '11.343'),
(4320, 'Nordholz', '53.783', '8.600'),
(4326, 'Nordstrand', '54.483', '8.850'),
(4332, 'Nortrup', '52.617', '7.867'),
(4338, 'Nussdorf', '47.900', '12.600'),
(4344, 'Nöschenrode', '51.830', '10.795'),
(4350, 'Nürnberg', '49.450', '11.083'),
(4356, 'Oberammergau', '47.600', '11.067'),
(4362, 'Oberbergkirchen', '48.300', '12.383'),
(4368, 'Oberding', '48.317', '11.850'),
(4374, 'Obergünzburg', '47.850', '10.433'),
(4380, 'Oberhausen', '51.483', '6.867'),
(4386, 'Oberleichtersbach', '50.283', '9.800'),
(4392, 'Obermeitingen', '48.150', '10.817'),
(4398, 'Oberndorf am lech', '48.667', '10.867'),
(4404, 'Obernzenn', '49.450', '10.467'),
(4410, 'Oberried', '47.933', '7.950'),
(4416, 'Oberschleissheim', '48.250', '11.567'),
(4422, 'Obersontheim', '49.050', '9.900'),
(4428, 'Obersulm', '49.133', '9.350'),
(4434, 'Obertrubach', '49.700', '11.350'),
(4440, 'Oberweser', '51.600', '9.550'),
(4446, 'Obrigheim (pfalz)', '49.567', '8.200'),
(4452, 'Odelzhausen', '48.317', '11.200'),
(4458, 'Oederquart', '53.800', '9.233'),
(4464, 'Oelsnitz', '50.729', '12.710'),
(4470, 'Oettingen in bayern', '48.950', '10.600'),
(4476, 'Östringen', '49.217', '8.717'),
(4482, 'Offstein', '49.600', '8.233'),
(4488, 'Ohmden', '48.650', '9.533'),
(4494, 'Olching', '48.217', '11.333'),
(4500, 'Olfen', '51.717', '7.383'),
(4506, 'Oppenau', '48.483', '8.167'),
(4512, 'Ornbau', '49.183', '10.667'),
(4518, 'Ortrand', '51.376', '13.757'),
(4524, 'Osloss', '52.467', '10.683'),
(4530, 'Osten', '53.700', '9.183'),
(4536, 'Osterholz-scharmbeck', '53.233', '8.783'),
(4542, 'Osterweddingen', '52.044', '11.578'),
(4548, 'Ostrau', '51.206', '13.162'),
(4554, 'Ostseebad graal', '54.250', '12.234'),
(4560, 'Ostseebad zingst', '54.436', '12.684'),
(4566, 'Ottenhofen', '48.217', '11.883'),
(4572, 'Otterberg', '49.500', '7.767'),
(4578, 'Ottersweier', '48.667', '8.117'),
(4584, 'Otzing', '48.767', '12.817'),
(4590, 'Oy-mittelberg', '47.633', '10.433'),
(4596, 'Palling', '48.000', '12.633'),
(4602, 'Pappenheim', '50.800', '10.482'),
(4608, 'Parsberg', '49.167', '11.717'),
(4614, 'Pattensen', '52.267', '9.767'),
(4620, 'Peissenberg', '47.800', '11.083'),
(4626, 'Pentling', '48.983', '12.067'),
(4632, 'Perl', '49.467', '6.383'),
(4638, 'Petershagen', '52.383', '8.967'),
(4644, 'Pfaffenhausen', '48.117', '10.450'),
(4650, 'Pfaffing', '48.050', '12.117'),
(4656, 'Pfatter', '48.967', '12.383'),
(4662, 'Pforzheim', '48.883', '8.700'),
(4668, 'Pfungstadt', '49.800', '8.600'),
(4674, 'Piesport', '49.883', '6.917'),
(4680, 'Pirmasens', '49.200', '7.600'),
(4686, 'Plattling', '48.783', '12.867'),
(4692, 'Pleiskirchen', '48.317', '12.600'),
(4698, 'Pliezhausen', '48.567', '9.200'),
(4704, 'Plüderhausen', '48.800', '9.600'),
(4710, 'Polch', '50.300', '7.317'),
(4716, 'Pollhagen', '52.383', '9.183'),
(4722, 'Ponitz', '50.860', '12.424'),
(4728, 'Postau', '48.650', '12.333'),
(4734, 'Prackenbach', '49.100', '12.833'),
(4740, 'Presseck', '50.233', '11.550'),
(4746, 'Preussisch oldendorf', '52.300', '8.500'),
(4752, 'Prittriching', '48.200', '10.933'),
(4758, 'Prutting', '47.900', '12.200'),
(4764, 'Pullach im isartal', '48.050', '11.517'),
(4770, 'Putbus', '54.351', '13.473'),
(4776, 'Pöcking', '47.967', '11.300'),
(4782, 'Püchersreuth', '49.750', '12.233'),
(4788, 'Queidersbach', '49.367', '7.633'),
(4794, 'Rabenau', '50.966', '13.645'),
(4800, 'Radevormwald', '51.200', '7.350'),
(4806, 'Rain', '48.683', '10.917'),
(4812, 'Ramberg', '49.267', '8.017'),
(4818, 'Ramsin', '51.612', '12.232'),
(4824, 'Rannungen', '50.167', '10.200'),
(4830, 'Rastatt', '48.867', '8.200'),
(4836, 'Rattelsdorf', '50.017', '10.883'),
(4842, 'Raubling', '47.800', '12.117'),
(4848, 'Ravensburg', '47.783', '9.617'),
(4854, 'Rechtmehring', '48.117', '12.167'),
(4860, 'Redwitz an der rodach', '50.183', '11.200'),
(4866, 'Regis-breitingen', '51.092', '12.442'),
(4872, 'Rehfelde', '52.528', '13.902'),
(4878, 'Reichelsheim (odenwald)', '49.717', '8.833'),
(4884, 'Reichenbach', '51.142', '14.809'),
(4890, 'Reichersbeuren', '47.767', '11.633'),
(4896, 'Reichstädt', '50.878', '13.634'),
(4902, 'Reinhardtsdorf', '50.897', '14.199'),
(4908, 'Reinstorf', '53.233', '10.567'),
(4914, 'Rellingen', '53.650', '9.833'),
(4920, 'Remseck am neckar', '48.867', '9.283'),
(4926, 'Rennerod', '50.617', '8.067'),
(4932, 'Rettenbach', '48.450', '10.350'),
(4938, 'Reut', '48.317', '12.950'),
(4944, 'Rhaunen', '49.867', '7.350'),
(4950, 'Rheinbach', '50.633', '6.950'),
(4956, 'Rheinfelden (baden)', '47.567', '7.783'),
(4962, 'Rhens', '50.283', '7.617'),
(4968, 'Ribnitz-damgarten', '54.243', '12.438'),
(4974, 'Riede', '52.967', '8.950'),
(4980, 'Rieder', '51.734', '11.168'),
(4986, 'Riegelsberg', '49.317', '6.950'),
(4992, 'Rieschweiler-mühlbach', '49.250', '7.517'),
(4998, 'Rietschen', '51.392', '14.790'),
(5004, 'Ringe', '52.600', '6.917'),
(5010, 'Rippien', '50.982', '13.739'),
(5016, 'Rockenhausen', '49.633', '7.817'),
(5022, 'Rodewald', '52.667', '9.483'),
(5028, 'Roggendorf', '53.693', '11.019'),
(5034, 'Rohrdorf', '47.800', '12.167'),
(5040, 'Romrod', '50.717', '9.217'),
(5046, 'Rosbach vor der höhe', '50.300', '8.717'),
(5052, 'Rosenfeld', '48.283', '8.733'),
(5058, 'Rositz', '51.021', '12.370'),
(5064, 'Rosshaupten', '47.650', '10.717'),
(5070, 'Rostock', '54.089', '12.125'),
(5076, 'Roth', '50.767', '7.700'),
(5082, 'Rothenfels', '49.900', '9.583'),
(5088, 'Rottenburg am neckar', '48.483', '8.933'),
(5094, 'Rudelzhausen', '48.583', '11.767'),
(5100, 'Ruhla', '50.894', '10.366'),
(5106, 'Runding', '49.217', '12.767'),
(5112, 'Ruppertshofen', '48.883', '9.817'),
(5118, 'Röbel', '53.378', '12.612'),
(5124, 'Rödersheim-gronau', '49.433', '8.267'),
(5130, 'Römerberg', '49.283', '8.400'),
(5136, 'Rötha', '51.200', '12.409'),
(5142, 'Röttingen', '49.517', '9.967'),
(5148, 'Rüdersdorf', '52.482', '13.773'),
(5154, 'Rülzheim', '49.150', '8.283'),
(5160, 'Saal an der saale', '50.317', '10.350'),
(5166, 'Saarlouis', '49.317', '6.750'),
(5172, 'Saerbeck', '52.167', '7.633'),
(5178, 'Salching', '48.817', '12.567'),
(5184, 'Salz', '50.317', '10.200'),
(5190, 'Salzkotten', '51.667', '8.600'),
(5196, 'Sand am main', '49.983', '10.583'),
(5202, 'Sandstedt', '53.367', '8.517'),
(5208, 'Sankt blasien', '47.767', '8.133'),
(5214, 'Sankt johann', '48.483', '9.317'),
(5220, 'Sankt märgen', '48.000', '8.100'),
(5226, 'Sankt wolfgang', '48.217', '12.133'),
(5232, 'Sassenberg', '51.983', '8.050'),
(5238, 'Satteldorf', '49.167', '10.083'),
(5244, 'Saulheim', '49.867', '8.150'),
(5250, 'Schafstädt', '51.381', '11.772'),
(5256, 'Scharfenberg', '51.119', '13.518'),
(5262, 'Schaufling', '48.850', '13.067'),
(5268, 'Schefflenz', '49.400', '9.283'),
(5274, 'Schellhorn', '54.233', '10.300'),
(5280, 'Schermbeck', '51.700', '6.867'),
(5286, 'Schieder-schwalenberg', '51.883', '9.183'),
(5292, 'Schildow', '52.642', '13.375'),
(5298, 'Schirgiswalde', '51.076', '14.438'),
(5304, 'Schlaitdorf', '48.600', '9.217'),
(5310, 'Schlegel', '50.975', '14.901'),
(5316, 'Schlettau', '50.564', '12.953'),
(5322, 'Schliersee', '47.733', '11.867'),
(5328, 'Schlüchtern', '50.350', '9.533'),
(5334, 'Schmidgaden', '49.417', '12.100'),
(5340, 'Schnaittenbach', '49.550', '12.000'),
(5346, 'Schnelldorf', '49.200', '10.183'),
(5352, 'Schonach im schwarzwald', '48.150', '8.200'),
(5358, 'Schopfloch', '48.467', '8.550'),
(5364, 'Schortens', '53.533', '7.950'),
(5370, 'Schrozberg', '49.250', '9.967'),
(5376, 'Schwabach', '49.333', '11.017'),
(5382, 'Schwaförden', '52.733', '8.817'),
(5388, 'Schwalmstadt', '50.917', '9.217'),
(5394, 'Schwanebeck', '52.628', '13.549'),
(5400, 'Schwarmstedt', '52.683', '9.617'),
(5406, 'Schwarze pumpe', '51.528', '14.338'),
(5412, 'Schwarzenbruck', '49.350', '11.250'),
(5418, 'Schwedt', '53.060', '14.287'),
(5424, 'Schweitenkirchen', '48.500', '11.600'),
(5430, 'Schwerin', '53.628', '11.412'),
(5436, 'Schwäbisch hall', '49.117', '9.733'),
(5442, 'Schöllkrippen', '50.083', '9.250'),
(5448, 'Schönanger', '48.867', '13.467'),
(5454, 'Schönau im schwarzwald', '47.783', '7.900'),
(5460, 'Schönbrunn', '49.417', '8.933'),
(5466, 'Schönecken', '50.150', '6.467'),
(5472, 'Schöningen', '52.133', '10.967'),
(5478, 'Schönthal', '49.350', '12.600'),
(5484, 'Schönwalde am bungsberg', '54.183', '10.750'),
(5490, 'Seckach', '49.450', '9.333'),
(5496, 'Seeburg', '51.567', '10.150'),
(5502, 'Seehausen am staffelsee', '47.700', '11.183'),
(5508, 'Seesen', '51.900', '10.183'),
(5514, 'Sehma', '50.541', '13.000'),
(5520, 'Seitingen-oberflacht', '48.017', '8.733'),
(5526, 'Selm', '51.700', '7.483'),
(5532, 'Senden', '48.317', '10.050'),
(5538, 'Sensbachtal', '49.517', '9.017'),
(5544, 'Seubersdorf in der oberpfalz', '49.167', '11.633'),
(5550, 'Siebenlehn', '51.032', '13.305'),
(5556, 'Siegenburg', '48.750', '11.850'),
(5562, 'Siersleben', '51.606', '11.543'),
(5568, 'Simbach', '48.567', '12.733'),
(5574, 'Simmersfeld', '48.650', '8.533'),
(5580, 'Singen (hohentwiel)', '47.767', '8.833'),
(5586, 'Sinzig', '50.550', '7.250'),
(5592, 'Soderstorf', '53.150', '10.150'),
(5598, 'Solms', '50.533', '8.417'),
(5604, 'Sommerkahl', '50.067', '9.267'),
(5610, 'Sonnen', '48.683', '13.717'),
(5616, 'Sontra', '51.067', '9.933'),
(5622, 'Spaichingen', '48.067', '8.733'),
(5628, 'Speicher', '49.933', '6.633'),
(5634, 'Spiegelau', '48.917', '13.367'),
(5640, 'Spraitbach', '48.883', '9.767'),
(5646, 'Sprockhövel', '51.350', '7.250'),
(5652, 'Stadelhofen', '50.000', '11.200'),
(5658, 'Stadtilm', '50.778', '11.082'),
(5664, 'Stadtprozelten', '49.783', '9.417'),
(5670, 'Staig', '48.300', '10.000'),
(5676, 'Starnberg', '48.000', '11.333'),
(5682, 'Staufenberg', '51.350', '9.633'),
(5688, 'Steimbke', '52.650', '9.383'),
(5694, 'Steinau', '53.683', '8.883'),
(5700, 'Steinbach-hallenberg', '50.706', '10.572'),
(5706, 'Steinen', '47.650', '7.733'),
(5712, 'Steingaden', '47.700', '10.867'),
(5718, 'Steinheim an der murr', '48.967', '9.283'),
(5724, 'Steinmauern', '48.900', '8.200'),
(5730, 'Steisslingen', '47.800', '8.933'),
(5736, 'Stephansposching', '48.817', '12.800'),
(5742, 'Stettfeld', '49.967', '10.717'),
(5748, 'Stockheim', '50.317', '11.283'),
(5754, 'Stollberg', '50.713', '12.786'),
(5760, 'Straelen', '51.450', '6.267'),
(5766, 'Strassenhaus', '50.533', '7.517'),
(5772, 'Strauchitz', '51.248', '13.213'),
(5778, 'Strullendorf', '49.850', '10.967'),
(5784, 'Stutensee', '49.083', '8.483'),
(5790, 'Stöttwang', '47.883', '10.717'),
(5796, 'Sugenheim', '49.600', '10.433'),
(5802, 'Sulzbach am main', '49.917', '9.150'),
(5808, 'Sulzburg', '47.833', '7.717'),
(5814, 'Sundern (sauerland)', '51.333', '8.000'),
(5820, 'Syke', '52.917', '8.817'),
(5826, 'Söhrewald', '51.233', '9.567'),
(5832, 'Süderstapel', '54.350', '9.217'),
(5838, 'Süstedt', '52.867', '8.917'),
(5844, 'Tandern', '48.433', '11.300'),
(5850, 'Tann (rhön)', '50.650', '10.017'),
(5856, 'Tarmstedt', '53.233', '9.083'),
(5862, 'Taufkirchen', '48.150', '12.450'),
(5868, 'Tegernheim', '49.017', '12.183'),
(5874, 'Telgte', '51.983', '7.783'),
(5880, 'Tennebronn', '48.183', '8.350'),
(5886, 'Tettenweis', '48.450', '13.267'),
(5892, 'Teuschnitz', '50.400', '11.383'),
(5898, 'Thalheim', '51.654', '12.221'),
(5904, 'Theilheim', '49.750', '10.033'),
(5910, 'Thierstein', '50.117', '12.100'),
(5916, 'Thurm', '50.766', '12.554'),
(5922, 'Thür', '50.367', '7.283'),
(5928, 'Timmendorfer strand', '54.000', '10.783'),
(5934, 'Titz', '51.000', '6.433'),
(5940, 'Torgau', '51.557', '12.993'),
(5946, 'Train', '48.733', '11.833'),
(5952, 'Trausnitz', '49.517', '12.267'),
(5958, 'Trebnitz', '51.099', '12.069'),
(5964, 'Treffurt', '51.138', '10.236'),
(5970, 'Treuenbrietzen', '52.096', '12.871'),
(5976, 'Trierweiler', '49.767', '6.567'),
(5982, 'Trochtelfingen', '48.300', '9.250'),
(5988, 'Trunkelsberg', '48.000', '10.217'),
(5994, 'Tuningen', '48.033', '8.600'),
(6000, 'Twist', '52.633', '7.067'),
(6006, 'Tönning', '54.317', '8.933'),
(6012, 'Tüssling', '48.217', '12.600'),
(6018, 'Uedem', '51.667', '6.267'),
(6024, 'Uetze', '52.467', '10.200'),
(6030, 'Ühlfeld', '49.667', '10.717'),
(6036, 'Ulrichstein', '50.583', '9.200'),
(6042, 'Unlingen', '48.167', '9.517'),
(6048, 'Unteregg', '47.967', '10.467'),
(6054, 'Unterhaching', '48.067', '11.617'),
(6060, 'Untermünkheim', '49.150', '9.733'),
(6066, 'Unterschleissheim', '48.283', '11.567'),
(6072, 'Unterwössen', '47.733', '12.467'),
(6078, 'Urbach', '48.817', '9.583'),
(6084, 'Usingen', '50.333', '8.533'),
(6090, 'Vaale', '54.000', '9.383'),
(6096, 'Varel', '53.400', '8.133'),
(6102, 'Veilsdorf', '50.411', '10.813'),
(6108, 'Velden', '49.617', '11.517'),
(6114, 'Verden (aller)', '52.917', '9.233'),
(6120, 'Vettelschoss', '50.617', '7.350'),
(6126, 'Viereth-trunstadt', '49.933', '10.783'),
(6132, 'Villenbach', '48.517', '10.617'),
(6138, 'Vilsheim', '48.450', '12.100'),
(6144, 'Vlotho', '52.167', '8.867'),
(6150, 'Vohburg an der donau', '48.767', '11.617'),
(6156, 'Volkstedt', '51.560', '11.558'),
(6162, 'Vögelsen', '53.283', '10.350'),
(6168, 'Völpke', '52.142', '11.097'),
(6174, 'Wabern', '51.100', '9.350'),
(6180, 'Wacken', '54.017', '9.200'),
(6186, 'Wadersloh', '51.733', '8.250'),
(6192, 'Wahlsburg', '51.617', '9.550'),
(6198, 'Waidhofen', '48.583', '11.333'),
(6204, 'Wald', '49.150', '12.333'),
(6210, 'Waldbronn', '48.917', '8.483'),
(6216, 'Waldböckelheim', '49.817', '7.717'),
(6222, 'Waldems', '50.233', '8.317'),
(6228, 'Waldesch', '50.283', '7.550'),
(6234, 'Waldkirchen', '48.733', '13.600'),
(6240, 'Waldsassen', '50.000', '12.300'),
(6246, 'Walheim', '49.017', '9.150'),
(6252, 'Wallenfels', '50.267', '11.467'),
(6258, 'Wallgau', '47.517', '11.283'),
(6264, 'Walluf', '50.033', '8.150'),
(6270, 'Waltersdorf', '50.874', '14.670'),
(6276, 'Wanderup', '54.683', '9.333'),
(6282, 'Wangen im allgäu', '47.683', '9.833'),
(6288, 'Wanzleben', '52.062', '11.440'),
(6294, 'Warin', '53.803', '11.712'),
(6300, 'Wartenberg', '50.633', '9.450'),
(6306, 'Wassenberg', '51.100', '6.167'),
(6312, 'Wassertrüdingen', '49.033', '10.600'),
(6318, 'Webau', '51.177', '12.080'),
(6324, 'Wedemark', '52.550', '9.733'),
(6330, 'Wegberg', '51.150', '6.283'),
(6336, 'Wehretal', '51.150', '10.000'),
(6342, 'Weibersbrunn', '49.933', '9.367'),
(6348, 'Weidenberg', '49.950', '11.733'),
(6354, 'Weigmannsdorf', '50.844', '13.409'),
(6360, 'Weil', '48.117', '10.933'),
(6366, 'Weiler bei bingen', '49.950', '7.867'),
(6372, 'Weilheim an der teck', '48.617', '9.533'),
(6378, 'Weimar', '50.989', '11.325'),
(6384, 'Weinheim', '49.550', '8.667'),
(6390, 'Weisendorf', '49.617', '10.817'),
(6396, 'Weissach im tal', '48.917', '9.483'),
(6402, 'Weissenbrunn', '50.200', '11.350'),
(6408, 'Weissenthurm', '50.417', '7.467'),
(6414, 'Weisweil', '48.200', '7.683'),
(6420, 'Weixdorf', '51.149', '13.805'),
(6426, 'Welschbillig', '49.850', '6.567'),
(6432, 'Wendeburg', '52.333', '10.400'),
(6438, 'Wenningstedt (sylt)', '54.933', '8.333'),
(6444, 'Werder', '52.381', '12.939'),
(6450, 'Wernau (neckar)', '48.700', '9.417'),
(6456, 'Wernigerode', '51.842', '10.791'),
(6462, 'Werther (westfalen)', '52.083', '8.417'),
(6468, 'Wesselburen', '54.217', '8.917'),
(6474, 'Westendorf', '48.583', '10.833'),
(6480, 'Westerheim', '48.517', '9.633'),
(6486, 'Westerstede', '53.267', '7.933'),
(6492, 'Westheim (pfalz)', '49.250', '8.317'),
(6498, 'Wetter (ruhr)', '51.383', '7.400'),
(6504, 'Weyarn', '47.867', '11.800'),
(6510, 'Widdern', '49.317', '9.417'),
(6516, 'Wiehl', '50.950', '7.550'),
(6522, 'Wiernsheim', '48.900', '8.850'),
(6528, 'Wiesenbach', '49.367', '8.800'),
(6534, 'Wiesenthal', '50.033', '9.433'),
(6540, 'Wiesloch', '49.300', '8.700'),
(6546, 'Wiggensbach', '47.750', '10.233'),
(6552, 'Wildemann', '51.833', '10.283'),
(6558, 'Wildpoldsried', '47.767', '10.400'),
(6564, 'Wilhelmshaven', '53.517', '8.117'),
(6570, 'Willebadessen', '51.633', '9.033'),
(6576, 'Wilmsheim', '48.850', '8.833'),
(6582, 'Wilthen', '51.096', '14.408'),
(6588, 'Winden im elztal', '48.150', '8.050'),
(6594, 'Windsbach', '49.233', '10.833'),
(6600, 'Winningen', '50.317', '7.517'),
(6606, 'Winterhausen', '49.700', '10.017'),
(6612, 'Wipfeld', '49.917', '10.183'),
(6618, 'Wirsberg', '50.100', '11.617'),
(6624, 'Witten', '51.433', '7.333'),
(6630, 'Wittibreut', '48.333', '12.983'),
(6636, 'Wittmar', '52.133', '10.633'),
(6642, 'Witzschdorf', '50.775', '13.076'),
(6648, 'Wolfen', '51.667', '12.272'),
(6654, 'Wolframs-eschenbach', '49.233', '10.733'),
(6660, 'Wolgast', '54.050', '13.773'),
(6666, 'Wolpertswende', '47.900', '9.617'),
(6672, 'Wonsees', '49.983', '11.300'),
(6678, 'Wrestedt', '52.900', '10.567'),
(6684, 'Wulfsen', '53.317', '10.150'),
(6690, 'Wurmannsquick', '48.350', '12.783'),
(6696, 'Wusterhausen', '52.892', '12.459'),
(6702, 'Wyk auf föhr', '54.700', '8.567'),
(6708, 'Wölfis', '50.812', '10.784'),
(6714, 'Wört', '49.033', '10.267'),
(6720, 'Wörthsee', '48.067', '11.200'),
(6726, 'Würselen', '50.817', '6.133'),
(6732, 'Zachenberg', '48.967', '13.000'),
(6738, 'Zarpen', '53.867', '10.517'),
(6744, 'Zeilarn', '48.300', '12.850'),
(6750, 'Zell', '50.133', '11.817'),
(6756, 'Zella-mehlis', '50.658', '10.674'),
(6762, 'Zepernick', '52.654', '13.542'),
(6768, 'Zethau', '50.778', '13.384'),
(6774, 'Ziemetshausen', '48.300', '10.533'),
(6780, 'Zinna', '51.571', '12.952'),
(6786, 'Zorneding', '48.083', '11.833'),
(6792, 'Zschopau', '50.745', '13.069'),
(6798, 'Zuzenhausen', '49.300', '8.833'),
(6804, 'Zwickau', '50.720', '12.500'),
(6810, 'Zöblitz', '50.658', '13.236');

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

--
-- Daten für Tabelle `rubriken`
--

INSERT INTO `rubriken` (`rNR`, `bezeichnung`, `beschreibung`, `icon`, `updated_at`, `created_at`) VALUES
(1, 'Dienstleistungen', 'Falls Sie mal jemanden brauchen, der Ihnen den Rasen mäht oder Ihnen beim Umzug hilft', 'fas fa-people-carry', '2018-09-22 17:37:21', '2018-09-21 22:44:38'),
(2, 'Bücher', '', 'fas fa-book', '2018-09-22 17:48:04', '2018-09-22 17:48:04'),
(3, 'Filme', '', 'fas fa-film', '2018-09-22 17:48:04', '2018-09-22 17:48:04'),
(4, 'Kleidung', '', 'fas fa-tshirt', '2018-09-22 17:48:04', '2018-09-22 17:48:04'),
(5, 'Musik', '', 'fas fa-music', '2018-09-22 17:48:04', '2018-09-22 17:48:04'),
(6, 'Sport', '', 'fas fa-futbol', '2018-09-22 17:48:04', '2018-09-22 17:48:04'),
(7, 'Elektronik', '', 'fas fa-tv', '2018-09-22 17:48:04', '2018-09-22 17:48:04'),
(8, 'Computer', '', 'fas fa-laptop', '2018-09-22 17:48:04', '2018-09-22 17:48:04'),
(9, 'Videospiele', '', 'fas fa-gamepad', '2018-09-22 17:48:04', '2018-09-22 17:48:04'),
(10, 'Dekoration', '', 'fas fa-air-freshener', '2018-09-22 17:48:04', '2018-09-22 17:48:04'),
(11, 'Spielzeuge', 'Spielzeuge für jedermann!', 'fas fa-space-shuttle', '2018-10-08 16:20:00', '2018-09-26 20:06:56'),
(12, 'Autos', 'Gebrauchte Autos für jeden Autoliebhaber', 'fas fa-car', '2018-10-03 00:29:00', '2018-09-26 20:15:09'),
(13, 'Lebensmittel', 'Für jeden Lebensmittel- und Essensliebhaber', 'fas fa-cookie-bite', '2018-10-03 00:29:02', '2018-10-02 17:44:18'),
(14, 'Transaktionen', 'Für Tauschaktionen per Transaktion. Ganz Einfach das Geld überweisen lassen.', 'fab fa-paypal', '2018-10-13 15:12:47', '2018-10-03 01:12:11');

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
-- Daten für Tabelle `r_besitzt_a`
--

INSERT INTO `r_besitzt_a` (`rNR`, `aNR`, `updated_at`, `created_at`) VALUES
(7, 53, '2018-10-29 22:00:09', '2018-10-29 22:00:09'),
(7, 54, '2018-10-29 22:05:49', '2018-10-29 22:05:49'),
(8, 54, '2018-10-29 22:05:49', '2018-10-29 22:05:49'),
(9, 54, '2018-10-29 22:05:49', '2018-10-29 22:05:49'),
(12, 53, '2018-10-29 22:00:09', '2018-10-29 22:00:09');

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
  MODIFY `aNR` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT für Tabelle `anzeigenbilder`
--
ALTER TABLE `anzeigenbilder`
  MODIFY `bID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT für Tabelle `bewertungen`
--
ALTER TABLE `bewertungen`
  MODIFY `bNR` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT für Tabelle `inserent`
--
ALTER TABLE `inserent`
  MODIFY `iNR` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT für Tabelle `nachrichten`
--
ALTER TABLE `nachrichten`
  MODIFY `naID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT für Tabelle `news`
--
ALTER TABLE `news`
  MODIFY `nID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT für Tabelle `newsbilder`
--
ALTER TABLE `newsbilder`
  MODIFY `bID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `orte`
--
ALTER TABLE `orte`
  MODIFY `ortID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6811;

--
-- AUTO_INCREMENT für Tabelle `rubriken`
--
ALTER TABLE `rubriken`
  MODIFY `rNR` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `anzeigen`
--
ALTER TABLE `anzeigen`
  ADD CONSTRAINT `anzeigen_ibfk_2` FOREIGN KEY (`iNR`) REFERENCES `inserent` (`iNR`),
  ADD CONSTRAINT `anzeigen_ibfk_3` FOREIGN KEY (`ortID`) REFERENCES `orte` (`ortID`);

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
