-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 15, 2020 at 10:49 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sdi1600160`
--

-- --------------------------------------------------------

--
-- Table structure for table `buslines`
--

CREATE TABLE `buslines` (
  `id` int(11) NOT NULL,
  `name` text CHARACTER SET utf8 NOT NULL,
  `type` varchar(20) CHARACTER SET utf8 NOT NULL,
  `24` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buslines`
--

INSERT INTO `buslines` (`id`, `name`, `type`, `24`) VALUES
(1, '022 ΠΛΑΤΕΙΑ ΚΑΝΝΙΓΚΟΣ-ΓΚΥΖΗ', 'λεωφορείο', 0),
(3, '140 ΓΛΥΦΑΔΑ - ΠΟΛΥΓΩΝΟ', 'λεωφορείο', 1),
(4, '212 ΚΑΡΕΑΣ - ΒΥΡΩΝΑΣ - ΥΜΗΤΤΟΣ - ΣΤ. ΔΑΦΝΗ', 'λεωφορείο', 0),
(5, '209 ΜΕΤΑΜΟΡΦΩΣΗ - ΣΥΝΤΑΓΜΑ', 'τρόλλευ', 0),
(6, '405 ΧΑΛΑΝΔΡΙ-ΜΕΛΙΣΣΙΑ', 'λεωφορείο', 0),
(7, '500 ΠΕΙΡΑΙΑΣ-ΚΗΦΙΣΙΑ', 'λεωφορείο', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cards`
--

CREATE TABLE `cards` (
  `id` int(11) NOT NULL,
  `number` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cards`
--

INSERT INTO `cards` (`id`, `number`) VALUES
(1, '1111111111111111');

-- --------------------------------------------------------

--
-- Table structure for table `linesregion`
--

CREATE TABLE `linesregion` (
  `id` int(11) NOT NULL,
  `line_id` int(11) NOT NULL,
  `region_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `linesregion`
--

INSERT INTO `linesregion` (`id`, `line_id`, `region_id`) VALUES
(7, 1, 4),
(8, 1, 5),
(2, 3, 1),
(1, 3, 2),
(5, 4, 1),
(6, 4, 3),
(3, 5, 1),
(4, 5, 2),
(9, 6, 6),
(10, 6, 7),
(11, 7, 8),
(12, 7, 9);

-- --------------------------------------------------------

--
-- Table structure for table `regions`
--

CREATE TABLE `regions` (
  `id` int(11) NOT NULL,
  `name` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `regions`
--

INSERT INTO `regions` (`id`, `name`) VALUES
(1, 'Υμηττός'),
(2, 'Βύρωνας'),
(3, 'Καρέας'),
(4, 'Πλατεία Κάννιγκ'),
(5, 'Γκύζη'),
(6, 'Χαλάνδρι'),
(7, 'Μελίσσια'),
(8, 'Πειραιάς'),
(9, 'Κηφισιά');

-- --------------------------------------------------------

--
-- Table structure for table `stationline`
--

CREATE TABLE `stationline` (
  `id` int(11) NOT NULL,
  `station_id` int(11) NOT NULL,
  `line_id` int(11) NOT NULL,
  `position` int(11) NOT NULL,
  `arrive` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stationline`
--

INSERT INTO `stationline` (`id`, `station_id`, `line_id`, `position`, `arrive`) VALUES
(1, 12, 1, 1, 4),
(2, 13, 1, 2, 6),
(3, 14, 1, 3, 8),
(4, 15, 1, 4, 10),
(5, 16, 1, 5, 11),
(6, 17, 1, 6, 13),
(7, 1, 3, 1, 2),
(8, 3, 3, 2, 4),
(9, 2, 3, 3, 6),
(10, 4, 3, 4, 8),
(11, 5, 4, 1, 1),
(12, 2, 4, 2, 3),
(13, 6, 4, 3, 5),
(14, 7, 4, 4, 7),
(15, 8, 5, 1, 2),
(16, 9, 5, 2, 3),
(17, 10, 5, 3, 5),
(18, 6, 5, 4, 6),
(19, 11, 5, 5, 10),
(20, 18, 6, 1, 4),
(21, 19, 6, 2, 7),
(22, 20, 6, 3, 9),
(23, 21, 7, 1, 4),
(24, 22, 7, 2, 6),
(25, 23, 7, 3, 9),
(26, 24, 7, 4, 12),
(27, 25, 7, 5, 14),
(29, 27, 7, 7, 18),
(30, 28, 7, 8, 20),
(31, 28, 1, 7, 15),
(32, 27, 6, 4, 11),
(33, 4, 7, 6, 16);

-- --------------------------------------------------------

--
-- Table structure for table `stations`
--

CREATE TABLE `stations` (
  `id` int(11) NOT NULL,
  `name` varchar(30) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stations`
--

INSERT INTO `stations` (`id`, `name`) VALUES
(1, 'Πλατεία'),
(2, 'Αγορά'),
(3, 'Δημαρχείο'),
(4, 'Σχολεία'),
(5, 'Αφετηρία'),
(6, 'Στροφή'),
(7, 'Τέρμα'),
(8, 'Μεταμόρφωση'),
(9, 'Κούλων'),
(10, 'Τσιρακοπούλου'),
(11, 'Γέφυρα'),
(12, 'Πλατεία Κάννιγκος'),
(13, 'Ναυαρίνου'),
(14, 'Aράχωβης'),
(15, 'Καλλιδρομίου'),
(16, 'Τσιμισκή'),
(17, 'Λασκαρέως'),
(18, 'Χαλάνδρι'),
(19, 'Φερρών'),
(20, 'Σκρα'),
(21, 'Δουκίσσης Πλακεντίας'),
(22, 'Πρωτέως'),
(23, 'Πλατεία Ζλατάνου'),
(24, 'Ζηρίνειο'),
(25, 'Κατ'),
(27, 'Αγγειοπλαστική'),
(28, 'Διασταύρωση Μελισσίων');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `surname` varchar(20) NOT NULL,
  `birth` date NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `phone` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `surname`, `birth`, `email`, `password`, `phone`) VALUES
(33, 'Μάριος', 'Στάης', '1998-05-08', 'marios1268@hotmail.com', '123', '6958201637'),
(34, 'Αλέξανδρος', 'Παπαδόπουλος', '1998-03-20', 'mrmpoutias@gmail.com', '123', '6958201637'),
(35, 'Θοδωρής', 'Πατσατζής', '1970-02-23', 'sdi1600160@di.uoa.gr', '123', '6958201637');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buslines`
--
ALTER TABLE `buslines`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cards`
--
ALTER TABLE `cards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `linesregion`
--
ALTER TABLE `linesregion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `line_id` (`line_id`,`region_id`),
  ADD KEY `region_id` (`region_id`);

--
-- Indexes for table `regions`
--
ALTER TABLE `regions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stationline`
--
ALTER TABLE `stationline`
  ADD PRIMARY KEY (`id`),
  ADD KEY `station_id` (`station_id`,`line_id`),
  ADD KEY `line_id` (`line_id`);

--
-- Indexes for table `stations`
--
ALTER TABLE `stations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buslines`
--
ALTER TABLE `buslines`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `cards`
--
ALTER TABLE `cards`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `linesregion`
--
ALTER TABLE `linesregion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `regions`
--
ALTER TABLE `regions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `stationline`
--
ALTER TABLE `stationline`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `stations`
--
ALTER TABLE `stations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `linesregion`
--
ALTER TABLE `linesregion`
  ADD CONSTRAINT `linesregion_ibfk_1` FOREIGN KEY (`line_id`) REFERENCES `buslines` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `linesregion_ibfk_2` FOREIGN KEY (`region_id`) REFERENCES `regions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `stationline`
--
ALTER TABLE `stationline`
  ADD CONSTRAINT `stationline_ibfk_1` FOREIGN KEY (`station_id`) REFERENCES `stations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `stationline_ibfk_2` FOREIGN KEY (`line_id`) REFERENCES `buslines` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
