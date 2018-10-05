-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 05. Okt 2018 um 02:27
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
  `PLZ` int(5) NOT NULL,
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

--
-- Daten für Tabelle `inserent`
--

INSERT INTO `inserent` (`iNR`, `nachname`, `vorname`, `passwort`, `email`, `gebdatum`, `newsletter`, `updated_at`, `created_at`) VALUES
(1, 'Admin', 'S_B', '$2y$10$FQN5WR/GJ3TmiG72pyDSDOcfsiurDIy57V5zzSJd4I5eddhUOzfTy', 's_b_admin@example.com', '9999-12-31', 1, '2018-10-05 00:22:36', '2018-10-05 00:21:42');

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
(4, 'Neue Rubriken', 'Es gibt endlich wieder mehr Vielfalt. Jetzt können Sie sich zwischen Zwei neuen Rubriken mehr entscheiden. Die Spielzeug und die Autorubrik sind auf häufiger Nachfrage erstellt und eingeweiht worden.\r\nMehrere Rubriken sind in Arbeit und werden zukünftig auch ins Team der vorhandenen Rubriken aufgenommen. Falls Sie Ideen für Rubriken haben, dann kontaktieren Sie uns gerne.', '2018-10-02 00:39:10', '2018-10-02 00:39:10');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `orte`
--

CREATE TABLE `orte` (
  `PLZ` int(5) NOT NULL,
  `Bezeichnung` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `orte`
--

INSERT INTO `orte` (`PLZ`, `Bezeichnung`) VALUES
(1067, 'Dresden'),
(1445, 'Meißen'),
(1454, 'Bautzen'),
(1705, 'Sächsische Schweiz-Osterzgebirge'),
(1945, 'Oberspreewald-Lausitz'),
(2708, 'Görlitz'),
(3042, 'Cottbus'),
(3058, 'Spree-Neiße'),
(3238, 'Elbe-Elster'),
(4103, 'Leipzig'),
(4425, 'Nordsachsen'),
(4600, 'Altenburger Land'),
(4703, 'Mittelsachsen'),
(6108, 'Halle Saale'),
(6179, 'Saalekreis'),
(6295, 'Mansfeld-Südharz'),
(6366, 'Anhalt-Bitterfeld'),
(6406, 'Salzlandkreis'),
(6458, 'Harz'),
(6556, 'Kyffhäuserkreis'),
(6618, 'Burgenlandkreis'),
(6772, 'Wittenberg'),
(6842, 'Dessau-Roßlau'),
(7318, 'Saalfeld-Rudolstadt'),
(7343, 'Saale-Orla-Kreis'),
(7545, 'Gera'),
(7554, 'Greiz'),
(7607, 'Saale-Holzland-Kreis'),
(7743, 'Jena'),
(8056, 'Zwickau'),
(8209, 'Vogtlandkreis'),
(8280, 'Erzgebirgskreis'),
(9111, 'Chemnitz'),
(10115, 'Berlin'),
(14467, 'Potsdam'),
(14476, 'Potsdam-Mittelmark'),
(14612, 'Havelland'),
(14770, 'Brandenburg an der Havel'),
(14913, 'Teltow-Fläming'),
(15230, 'Frankfurt Oder'),
(15295, 'Oder-Spree'),
(15306, 'Märkisch-Oderland'),
(15537, 'Dahme-Spreewald'),
(16225, 'Barnim'),
(16278, 'Uckermark'),
(16515, 'Oberhavel'),
(16816, 'Ostprignitz-Ruppin'),
(16928, 'Prignitz'),
(17033, 'Mecklenburgische Seenplatte'),
(17121, 'Vorpommern-Greifswald'),
(17166, 'Rostock'),
(18311, 'Vorpommern-Rügen'),
(19053, 'Schwerin'),
(19065, 'Ludwigslust-Parchim'),
(19069, 'Nordwestmecklenburg'),
(20095, 'Hamburg'),
(21217, 'Harburg'),
(21335, 'Lüneburg'),
(21465, 'Herzogtum Lauenburg'),
(21509, 'Stormarn'),
(21614, 'Stade'),
(21745, 'Cuxhaven'),
(22844, 'Segeberg'),
(22869, 'Pinneberg'),
(23552, 'Lübeck'),
(23611, 'Ostholstein'),
(24103, 'Kiel'),
(24119, 'Rendsburg-Eckernförde'),
(24211, 'Plön'),
(24376, 'Schleswig-Flensburg'),
(24534, 'Neumünster'),
(24937, 'Flensburg'),
(25348, 'Steinburg'),
(25541, 'Dithmarschen'),
(25813, 'Nordfriesland'),
(26121, 'Oldenburg'),
(26160, 'Ammerland'),
(26169, 'Cloppenburg'),
(26316, 'Friesland'),
(26349, 'Wesermarsch'),
(26382, 'Wilhelmshaven'),
(26409, 'Wittmund'),
(26506, 'Aurich'),
(26670, 'Leer'),
(26721, 'Emden'),
(26871, 'Emsland'),
(27211, 'Diepholz'),
(27283, 'Verden'),
(27318, 'Nienburg_Weser'),
(27336, 'Heidekreis'),
(27356, 'Rotenburg Wümme'),
(27568, 'Bremerhaven'),
(27711, 'Osterholz'),
(27749, 'Delmenhorst'),
(28195, 'Bremen'),
(29221, 'Celle'),
(29365, 'Gifhorn'),
(29389, 'Uelzen'),
(29410, 'Altmarkkreis Salzwedel'),
(29439, 'Lüchow-Dannenberg'),
(30159, 'Hannover'),
(31008, 'Hildesheim'),
(31020, 'Hameln-Pyrmont'),
(31073, 'Holzminden'),
(31224, 'Peine'),
(31542, 'Schaumburg'),
(32049, 'Herford'),
(32105, 'Lippe'),
(32312, 'Minden-Lübbecke'),
(32839, 'Höxter'),
(33098, 'Paderborn'),
(33330, 'Gütersloh'),
(33602, 'Bielefeld'),
(34117, 'Kassel'),
(34212, 'Schwalm-Eder-Kreis'),
(34346, 'Göttingen'),
(34431, 'Hochsauerlandkreis'),
(34454, 'Waldeck-Frankenberg'),
(35037, 'Marburg-Biedenkopf'),
(35305, 'Gießen'),
(35315, 'Vogelsbergkreis'),
(35510, 'Wetteraukreis'),
(35576, 'Lahn-Dill-Kreis'),
(35781, 'Limburg-Weilburg'),
(36037, 'Fulda'),
(36166, 'Hersfeld-Rotenburg'),
(36205, 'Werra-Meißner-Kreis'),
(36381, 'Main-Kinzig-Kreis'),
(36404, 'Wartburgkreis'),
(37154, 'Northeim'),
(37197, 'Osterode am Harz'),
(37308, 'Eichsfeld'),
(37444, 'Goslar'),
(38100, 'Braunschweig'),
(38154, 'Helmstedt'),
(38162, 'Wolfenbüttel'),
(38226, 'Salzgitter'),
(38440, 'Wolfsburg'),
(39104, 'Magdeburg'),
(39164, 'Börde'),
(39175, 'Jerichower Land'),
(39539, 'Stendal'),
(40210, 'Düsseldorf'),
(40667, 'Rhein-Kreis Neuss'),
(40699, 'Mettmann'),
(41061, 'Mönchengladbach'),
(41334, 'Viersen'),
(41812, 'Heinsberg'),
(42103, 'Wuppertal'),
(42477, 'Oberbergischer Kreis'),
(42651, 'Solingen'),
(42799, 'Rheinisch-Bergischer Kreis'),
(42853, 'Remscheid'),
(44135, 'Dortmund'),
(44532, 'Unna'),
(44575, 'Recklinghausen'),
(44623, 'Herne'),
(44787, 'Bochum'),
(45127, 'Essen'),
(45468, 'Mülheim an der Ruhr'),
(45525, 'Ennepe-Ruhr-Kreis'),
(45879, 'Gelsenkirchen'),
(46045, 'Oberhausen'),
(46236, 'Bottrop'),
(46325, 'Borken'),
(46446, 'Kleve'),
(46483, 'Wesel'),
(47051, 'Duisburg'),
(47798, 'Krefeld'),
(48143, 'Münster'),
(48231, 'Warendorf'),
(48249, 'Coesfeld'),
(48268, 'Steinfurt'),
(48455, 'Grafschaft Bentheim'),
(49074, 'Osnabrück'),
(49377, 'Vechta'),
(50126, 'Rhein-Erft-Kreis'),
(50667, 'Köln'),
(51371, 'Leverkusen'),
(51570, 'Rhein-Sieg-Kreis'),
(51598, 'Altenkirchen'),
(52062, 'Aachen'),
(52349, 'Düren'),
(53111, 'Bonn'),
(53424, 'Ahrweiler'),
(53539, 'Vulkaneifel'),
(53545, 'Neuwied'),
(53879, 'Euskirchen'),
(54290, 'Trier'),
(54298, 'Eifelkreis Bitburg-Prüm'),
(54306, 'Trier-Saarburg'),
(54347, 'Bernkastel-Wittlich'),
(54422, 'Birkenfeld'),
(55116, 'Mainz'),
(55218, 'Mainz-Bingen'),
(55232, 'Alzey-Worms'),
(55246, 'Wiesbaden'),
(55430, 'Rhein-Hunsrück-Kreis'),
(55442, 'Bad Kreuznach'),
(56068, 'Koblenz'),
(56112, 'Rhein-Lahn-Kreis'),
(56170, 'Mayen-Koblenz'),
(56203, 'Westerwaldkreis'),
(56253, 'Cochem-Zell'),
(57072, 'Siegen-Wittgenstein'),
(57368, 'Olpe'),
(58089, 'Hagen'),
(58507, 'Märkischer Kreis'),
(58739, 'Soest'),
(59063, 'Hamm'),
(60306, 'Frankfurt am Main'),
(61250, 'Hochtaunuskreis'),
(63065, 'Offenbach am Main'),
(63110, 'Offenbach'),
(63739, 'Aschaffenburg'),
(63785, 'Miltenberg'),
(64283, 'Darmstadt'),
(64319, 'Darmstadt-Dieburg'),
(64385, 'Odenwaldkreis'),
(64521, 'Groß-Gerau'),
(64625, 'Bergstraße'),
(65232, 'Rheingau-Taunus-Kreis'),
(65239, 'Main-Taunus-Kreis'),
(66111, 'Saarbrücken'),
(66359, 'Saarlouis'),
(66386, 'Saarpfalz-Kreis'),
(66482, 'Zweibrücken'),
(66484, 'Südwestpfalz'),
(66538, 'Neunkirchen'),
(66606, 'Sankt Wendel'),
(66663, 'Merzig-Wadern'),
(66849, 'Kaiserslautern'),
(66869, 'Kusel'),
(66953, 'Pirmasens'),
(67059, 'Ludwigshafen am Rhein'),
(67098, 'Bad Dürkheim'),
(67122, 'Rhein-Pfalz-Kreis'),
(67227, 'Frankenthal Pfalz'),
(67292, 'Donnersbergkreis'),
(67346, 'Speyer'),
(67360, 'Germersheim'),
(67377, 'Südliche Weinstraße'),
(67433, 'Neustadt an der Weinstraße'),
(67547, 'Worms'),
(68159, 'Mannheim'),
(68526, 'Rhein-Neckar-Kreis'),
(68753, 'Karlsruhe'),
(69115, 'Heidelberg'),
(69427, 'Neckar-Odenwald-Kreis'),
(70173, 'Stuttgart'),
(70734, 'Rems-Murr-Kreis'),
(70771, 'Esslingen'),
(70806, 'Ludwigsburg'),
(71032, 'Böblingen'),
(71292, 'Enzkreis'),
(71543, 'Heilbronn'),
(72070, 'Tübingen'),
(72124, 'Reutlingen'),
(72160, 'Freudenstadt'),
(72172, 'Rottweil'),
(72202, 'Calw'),
(72336, 'Zollernalbkreis'),
(72419, 'Sigmaringen'),
(72535, 'Alb-Donau-Kreis'),
(73033, 'Göppingen'),
(73430, 'Ostalbkreis'),
(74214, 'Hohenlohekreis'),
(74405, 'Schwäbisch Hall'),
(74744, 'Main-Tauber-Kreis'),
(75172, 'Pforzheim'),
(76437, 'Rastatt'),
(76530, 'Baden-Baden'),
(76829, 'Landau in der Pfalz'),
(77652, 'Ortenaukreis'),
(78048, 'Schwarzwald-Baar-Kreis'),
(78187, 'Tuttlingen'),
(78224, 'Konstanz'),
(78354, 'Bodenseekreis'),
(79098, 'Freiburg im Breisgau'),
(79183, 'Emmendingen'),
(79189, 'Breisgau-Hochschwarzwald'),
(79400, 'Lörrach'),
(79664, 'Waldshut'),
(80331, 'München'),
(82057, 'Bad Tölz-Wolfratshausen'),
(82110, 'Fürstenfeldbruck'),
(82131, 'Starnberg'),
(82269, 'Landsberg am Lech'),
(82297, 'Aichach-Friedberg'),
(82347, 'Weilheim-Schongau'),
(82418, 'Garmisch-Partenkirchen'),
(83022, 'Rosenheim'),
(83119, 'Traunstein'),
(83317, 'Berchtesgadener Land'),
(83527, 'Mühldorf am Inn'),
(83550, 'Ebersberg'),
(83607, 'Miesbach'),
(84028, 'Landshut'),
(84048, 'Kelheim'),
(84066, 'Straubing-Bogen'),
(84069, 'Regensburg'),
(84072, 'Freising'),
(84130, 'Dingolfing-Landau'),
(84140, 'Rottal-Inn'),
(84405, 'Erding'),
(84489, 'Altötting'),
(85049, 'Ingolstadt'),
(85072, 'Eichstätt'),
(85077, 'Pfaffenhofen an der Ilm'),
(85123, 'Neuburg-Schrobenhausen'),
(85221, 'Dachau'),
(86150, 'Augsburg'),
(86381, 'Günzburg'),
(86498, 'Unterallgäu'),
(86502, 'Dillingen an der Donau'),
(86609, 'Donau-Ries'),
(86807, 'Ostallgäu'),
(87435, 'Kempten Allgäu'),
(87448, 'Oberallgäu'),
(87600, 'Kaufbeuren'),
(87700, 'Memmingen'),
(88131, 'Lindau Bodensee'),
(88147, 'Ravensburg'),
(88348, 'Biberach'),
(89073, 'Ulm'),
(89168, 'Heidenheim'),
(89231, 'Neu-Ulm'),
(90402, 'Nürnberg'),
(90513, 'Fürth'),
(90518, 'Nürnberger Land'),
(90530, 'Roth'),
(90542, 'Erlangen-Höchstadt'),
(90599, 'Ansbach'),
(90602, 'Neumarkt in der Oberpfalz'),
(90616, 'Neustadt an der Aisch-Bad Windsheim'),
(91052, 'Erlangen'),
(91077, 'Forchheim'),
(91126, 'Schwabach'),
(91249, 'Amberg-Sulzbach'),
(91257, 'Bayreuth'),
(91281, 'Neustadt an der Waldnaab'),
(91332, 'Bamberg'),
(91710, 'Weißenburg-Gunzenhausen'),
(92224, 'Amberg'),
(92269, 'Schwandorf'),
(92444, 'Cham'),
(92637, 'Weiden in der Oberpfalz'),
(92681, 'Tirschenreuth'),
(93471, 'Regen'),
(94032, 'Passau'),
(94065, 'Freyung-Grafenau'),
(94315, 'Straubing'),
(94447, 'Deggendorf'),
(95028, 'Hof'),
(95100, 'Wunsiedel im Fichtelgebirge'),
(95326, 'Kulmbach'),
(96106, 'Haßberge'),
(96145, 'Coburg'),
(96160, 'Kitzingen'),
(96215, 'Lichtenfels'),
(96268, 'Kronach'),
(96515, 'Sonneberg'),
(97070, 'Würzburg'),
(97225, 'Main-Spessart'),
(97421, 'Schweinfurt'),
(97517, 'Bad Kissingen'),
(97528, 'Rhön-Grabfeld'),
(98527, 'Suhl'),
(98530, 'Hildburghausen'),
(98544, 'Schmalkalden-Meiningen'),
(98559, 'Ilm-Kreis'),
(99084, 'Erfurt'),
(99100, 'Gotha'),
(99189, 'Sömmerda'),
(99423, 'Weimar'),
(99428, 'Weimarer Land'),
(99734, 'Nordhausen'),
(99817, 'Eisenach'),
(99947, 'Unstrut-Hainich-Kreis');

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
(11, 'Spielzeuge', 'Spielzeuge für jedermann!', 'fas fa-space-shuttle', '2018-10-03 00:28:58', '2018-09-26 20:06:56'),
(12, 'Autos', 'Gebrauchte Autos für jeden Autoliebhaber', 'fas fa-car', '2018-10-03 00:29:00', '2018-09-26 20:15:09'),
(13, 'Lebensmittel', 'Für jeden Lebensmittel- und Essensliebhaber', 'fas fa-cookie-bite', '2018-10-03 00:29:02', '2018-10-02 17:44:18'),
(14, 'Transaktionen', 'Für Tauschaktionen per Transaktion. Ganz Einfach das Geld überweisen lassen.', 'fab fa-paypal', '2018-10-03 01:14:22', '2018-10-03 01:12:11');

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
-- Indizes für die Tabelle `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`nID`);

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
  MODIFY `aNR` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT für Tabelle `bilder`
--
ALTER TABLE `bilder`
  MODIFY `bID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT für Tabelle `inserent`
--
ALTER TABLE `inserent`
  MODIFY `iNR` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT für Tabelle `news`
--
ALTER TABLE `news`
  MODIFY `nID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  ADD CONSTRAINT `anzeigen_ibfk_3` FOREIGN KEY (`PLZ`) REFERENCES `orte` (`PLZ`);

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
