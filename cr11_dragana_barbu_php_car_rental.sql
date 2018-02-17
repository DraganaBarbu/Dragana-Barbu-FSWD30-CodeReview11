-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 17. Feb 2018 um 12:15
-- Server-Version: 10.1.30-MariaDB
-- PHP-Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `cr11_dragana_barbu_php_car_rental`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `address`
--

CREATE TABLE `address` (
  `address_id` int(11) NOT NULL,
  `zip` int(11) DEFAULT NULL,
  `city` varchar(40) DEFAULT NULL,
  `country` varchar(40) DEFAULT NULL,
  `area` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `address`
--

INSERT INTO `address` (`address_id`, `zip`, `city`, `country`, `area`) VALUES
(1, 1140, 'Wien', 'Österreich', 'sesamstrasse'),
(2, 8320, 'Linz', 'Österreich', 'alterseestraße 30'),
(3, 6350, 'Salzburg', 'Österreich', 'burggasse 40'),
(4, 7720, 'Graz', 'Österreich', 'Dornbach 13');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `cars`
--

CREATE TABLE `cars` (
  `car_id` int(11) NOT NULL,
  `car_name` varchar(40) DEFAULT NULL,
  `car_type` varchar(40) DEFAULT NULL,
  `status` enum('available','reserved') DEFAULT NULL,
  `fk_office_id` int(11) DEFAULT NULL,
  `module` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `cars`
--

INSERT INTO `cars` (`car_id`, `car_name`, `car_type`, `status`, `fk_office_id`, `module`) VALUES
(1, 'TESLA', 'Sport car', 'available', 1, '2017'),
(2, 'MASDA', 'family car', 'available', 1, '2015'),
(3, 'HUNDAI', 'race car', 'reserved', 2, '2018'),
(4, 'Bentely', 'family car', 'reserved', 1, '2016'),
(5, 'Jaguar', 'Sport car', 'reserved', 1, '2017'),
(6, 'TVR', 'work car', 'available', 2, '2016'),
(7, 'Vauxhall', 'race car', 'reserved', 2, '2013'),
(8, 'Peugeot', 'family car', 'reserved', 2, '2012'),
(9, 'Bugatti', 'family car', 'available', 2, '2018'),
(10, 'Lancia', 'race car', 'reserved', 3, '2017'),
(11, 'Maserati', 'Sport car', 'available', 3, '2018'),
(12, 'Lexus', 'work car', 'available', 3, '2016'),
(13, 'Subaru', 'transport car', 'available', 3, '2012'),
(14, 'Cadlilac', 'family car', 'reserved', 4, '2016'),
(15, 'Hummer', 'family car', 'available', 4, '2011'),
(16, 'Pontiac', 'transport car', 'available', 4, '2016'),
(17, 'Saturn ', 'race car', 'available', 4, '2014'),
(18, 'Jeep', 'transport car', 'reserved', 4, '2017'),
(19, 'Clysler', 'Sport car', 'available', 3, '2014'),
(20, 'KIA', 'Sport car', 'reserved', 1, '2017');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `location` varchar(40) DEFAULT NULL,
  `fk_car_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `customer`
--

INSERT INTO `customer` (`customer_id`, `location`, `fk_car_id`) VALUES
(1, 'Landstrasse-Hauptstrasse  1/1', 20),
(2, 'Landstrasse-Hauptstrasse  1/1', 12),
(3, 'pillgramgasse 17', 10),
(4, 'linzerstraße  63', 7),
(5, 'pillgramgasse 17', 6),
(6, 'Kaertner Ring 1', 18),
(7, 'Kaertner Ring 1', 4),
(8, 'linzerstraße  63', 3),
(9, 'linzerstraße  63', 14);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `php_car_rental_agency`
--

CREATE TABLE `php_car_rental_agency` (
  `id` int(11) NOT NULL,
  `office_name` varchar(40) DEFAULT NULL,
  `fk_address_id` int(11) DEFAULT NULL,
  `fk_user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `php_car_rental_agency`
--

INSERT INTO `php_car_rental_agency` (`id`, `office_name`, `fk_address_id`, `fk_user_id`) VALUES
(1, 'Carsrental', 1, NULL),
(2, 'Goldencar', 2, NULL),
(3, 'zakicar', 3, NULL),
(4, 'Carsrental', 4, NULL);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users` (
  `userId` int(11) NOT NULL,
  `userName` varchar(30) NOT NULL,
  `userEmail` varchar(60) NOT NULL,
  `userPass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`userId`, `userName`, `userEmail`, `userPass`) VALUES
(1, 'dragana', 'dragana@dragana.com', '9814c7148b62ee4d1fa342c04524316bdaf8ca6678459c861b60d4406aa8dcf9');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`address_id`);

--
-- Indizes für die Tabelle `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`car_id`),
  ADD KEY `fk_office_id` (`fk_office_id`);

--
-- Indizes für die Tabelle `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`),
  ADD KEY `fk_car_id` (`fk_car_id`);

--
-- Indizes für die Tabelle `php_car_rental_agency`
--
ALTER TABLE `php_car_rental_agency`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_address_id` (`fk_address_id`);

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
-- AUTO_INCREMENT für Tabelle `address`
--
ALTER TABLE `address`
  MODIFY `address_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT für Tabelle `cars`
--
ALTER TABLE `cars`
  MODIFY `car_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT für Tabelle `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT für Tabelle `php_car_rental_agency`
--
ALTER TABLE `php_car_rental_agency`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `cars`
--
ALTER TABLE `cars`
  ADD CONSTRAINT `cars_ibfk_1` FOREIGN KEY (`fk_office_id`) REFERENCES `php_car_rental_agency` (`id`);

--
-- Constraints der Tabelle `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`fk_car_id`) REFERENCES `cars` (`car_id`);

--
-- Constraints der Tabelle `php_car_rental_agency`
--
ALTER TABLE `php_car_rental_agency`
  ADD CONSTRAINT `php_car_rental_agency_ibfk_1` FOREIGN KEY (`fk_address_id`) REFERENCES `address` (`address_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
