-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 05, 2022 at 10:14 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spk`
--

-- --------------------------------------------------------

--
-- Table structure for table `hasil`
--

CREATE TABLE `hasil` (
  `hasil_id` int(8) NOT NULL,
  `user_id` int(8) NOT NULL,
  `hasil` varchar(10) NOT NULL DEFAULT 'Waiting',
  `Vi` float NOT NULL,
  `array_jawaban` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`array_jawaban`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hasil`
--

INSERT INTO `hasil` (`hasil_id`, `user_id`, `hasil`, `Vi`, `array_jawaban`) VALUES
(3, 1, 'Waiting', 0, '[\"3\",\"4\",\"4\",\"5\",\"4\",\"4\",\"5\",\"4\",\"5\"]'),
(5, 11, 'Waiting', 0, '[\"2\",\"3\",\"4\",\"5\",\"2\",\"4\",\"3\",\"4\",\"5\"]');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(8) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `tanggal_lahir` varchar(15) NOT NULL,
  `no_telp` varchar(13) NOT NULL,
  `alamat` text NOT NULL,
  `NIK` int(20) NOT NULL,
  `credential` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `email`, `password`, `nama`, `tanggal_lahir`, `no_telp`, `alamat`, `NIK`, `credential`) VALUES
(1, 'rizkir42@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'rizki', '2022-01-04', '9832919032', '', 2147483647, 1),
(5, 'goti1212@yahoo.com', 'e10adc3949ba59abbe56e057f20f883e', '', '2022-01-05', '085711963083', 'Kecamatan Beji, Kota Depok, Jawa Barat', 2132193921, 0),
(10, 'alsy123@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'alsy', '', '9321932913', 'jdsaksjdkjdwiajsd', 312323213, 0),
(11, 'rr123@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'rr', '2022-01-04', '2832918231', 'jdsadjsajdsa', 1238384721, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hasil`
--
ALTER TABLE `hasil`
  ADD PRIMARY KEY (`hasil_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `NIK` (`NIK`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hasil`
--
ALTER TABLE `hasil`
  MODIFY `hasil_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
