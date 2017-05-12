-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 12. Mai 2017 um 10:53
-- Server-Version: 10.1.21-MariaDB
-- PHP-Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `spiel101`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `spielstand`
--

CREATE TABLE `spielstand` (
  `id` int(11) NOT NULL,
  `spielerID` int(11) DEFAULT NULL,
  `zugAnzahl` int(11) DEFAULT NULL,
  `punkteS1` int(11) DEFAULT NULL,
  `punkteS2` int(11) DEFAULT NULL,
  `amZug` tinyint(1) DEFAULT NULL,
  `sieger` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `user101`
--

CREATE TABLE `user101` (
  `id` int(11) NOT NULL,
  `email` text NOT NULL,
  `passwort` text NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `spielstand`
--
ALTER TABLE `spielstand`
  ADD PRIMARY KEY (`id`),
  ADD KEY `spielerID` (`spielerID`);

--
-- Indizes für die Tabelle `user101`
--
ALTER TABLE `user101`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `spielstand`
--
ALTER TABLE `spielstand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;
--
-- AUTO_INCREMENT für Tabelle `user101`
--
ALTER TABLE `user101`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `spielstand`
--
ALTER TABLE `spielstand`
  ADD CONSTRAINT `spielstand_ibfk_1` FOREIGN KEY (`spielerID`) REFERENCES `user101` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
