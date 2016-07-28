-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 28, 2016 at 10:16 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.5.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `criminaldb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`) VALUES
(1, '', 'admin@mail.com', '81dc9bdb52d04dc20036dbd8313ed055	'),
(2, 'admin2', 'admin@admin.com', '21232f297a57a5a743894a0e4a801fc3'),
(3, 'admin2', 'admin@admin.com', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `crimetable`
--

CREATE TABLE `crimetable` (
  `crime_id` int(11) NOT NULL,
  `crime_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `crimetable`
--

INSERT INTO `crimetable` (`crime_id`, `crime_type`) VALUES
(1, 'robbary'),
(2, 'sabotage');

-- --------------------------------------------------------

--
-- Table structure for table `criminaltable`
--

CREATE TABLE `criminaltable` (
  `c_t_id` int(11) NOT NULL,
  `c_t_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `criminaltable`
--

INSERT INTO `criminaltable` (`c_t_id`, `c_t_type`) VALUES
(1, 'most wanted');

-- --------------------------------------------------------

--
-- Table structure for table `criminal_info`
--

CREATE TABLE `criminal_info` (
  `c_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `crime_type` varchar(255) NOT NULL,
  `c_t_type` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `height` varchar(20) NOT NULL,
  `description` varchar(255) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `address` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `criminal_info`
--

INSERT INTO `criminal_info` (`c_id`, `name`, `crime_type`, `c_t_type`, `age`, `height`, `description`, `gender`, `address`, `image`) VALUES
(1, 'Hamid', 'robbery,sabotage', 'most wanted', 22, '22', 'asfsdf', 'Male', 'adfsf', 'afsadf'),
(2, 'Nowshad', 'robbary,sabotage', 'most wanted', 0, '', 'asdfsadf', 'Male', '', 'dedsec11.png'),
(3, 'rony', 'robbary', 'most wanted', 22, '2', 'afasf', 'Male', 'asdfsaf', 'asfsadf'),
(4, 'rony', 'robbary', 'most wanted', 22, '2', 'afasf', 'Male', 'asdfsaf', 'asfsadf'),
(5, 'jkhkjllk', 'robbary,sabotage', 'most wanted', 12, '2', 'asdfsadf', 'Male', 'asdfsf', 'dedsec11.png'),
(6, 'jkhkjllk', 'robbary,sabotage', 'most wanted', 12, '2', 'asdfsadf', 'Male', 'asdfsf', 'dedsec11.png');

-- --------------------------------------------------------

--
-- Table structure for table `missingtable`
--

CREATE TABLE `missingtable` (
  `missing_id` int(11) NOT NULL,
  `missing_name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `height` varchar(20) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `image` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `status` varchar(255) NOT NULL,
  `added_by` varchar(255) NOT NULL,
  `updated_by` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `missingtable`
--

INSERT INTO `missingtable` (`missing_id`, `missing_name`, `description`, `age`, `height`, `gender`, `image`, `address`, `date`, `status`, `added_by`, `updated_by`) VALUES
(3, 'Rony', 'Sera', 25, '5', 'Male', 'terms.png', 'hathazari', '2016-07-05', 'Still Missing', '', ''),
(4, 'Abul', 'Sera', 25, '5', 'Male', 'terms.png', 'hathazari', '2016-07-05', 'Still Missing', '', ''),
(5, 'Abul', 'Sera', 25, '5', 'Male', 'terms.png', 'hathazari', '2016-07-05', 'Still Missing', '', ''),
(6, 'Abul', 'Sera', 25, '5', 'Male', '1469444431terms.png', 'hathazari', '2016-07-05', 'Still Missing', '', ''),
(7, 'Abul', 'Sera', 25, '5', 'Male', '1469444527terms.png', 'hathazari', '2016-07-05', 'Still Missing', '', ''),
(8, 'Abul', 'Sera', 25, '5', 'Male', '1469444582terms.png', 'hathazari', '2016-07-05', 'Still Missing', '', ''),
(9, 'Abul', 'Sera', 25, '5', 'Male', '1469444663terms.png', 'hathazari', '2016-07-05', 'Still Missing', '', ''),
(10, 'Abul', 'Sera', 25, '5', 'Male', '1469444716terms.png', 'hathazari', '2016-07-05', 'Still Missing', '', ''),
(11, 'Abul', 'Sera', 25, '5', 'Male', '1469444780terms.png', 'hathazari', '2016-07-05', 'Still Missing', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `police_info`
--

CREATE TABLE `police_info` (
  `p_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `police_code` varchar(255) NOT NULL,
  `nid` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `police_info`
--

INSERT INTO `police_info` (`p_id`, `name`, `email`, `password`, `police_code`, `nid`) VALUES
(3, 'Hamid', 'a@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'nadf', '34343434'),
(4, 'Hamid', 'a@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'nadf', '34343434'),
(5, 'Hamid', 'a@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'nadf', '34343434'),
(6, 'Hamid', 'a@gmail.com', 'b59c67bf196a4758191e42f76670ceba', 'nadf', '34343434');

-- --------------------------------------------------------

--
-- Table structure for table `police_profile`
--

CREATE TABLE `police_profile` (
  `id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `designation` varchar(20) NOT NULL,
  `thana` varchar(20) NOT NULL,
  `city` varchar(20) NOT NULL,
  `address` varchar(255) NOT NULL,
  `postal` varchar(20) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `phone` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `police_profile`
--

INSERT INTO `police_profile` (`id`, `p_id`, `designation`, `thana`, `city`, `address`, `postal`, `gender`, `phone`, `image`) VALUES
(3, 6, '', '', '', '', '', '', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nid` int(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`user_id`, `name`, `email`, `nid`, `password`) VALUES
(1, 'rony', 'a@gsf.com', 34324234, 'f29deaae8f77d04e811cea289e60fedd'),
(2, 'demouser', 'user@mail.com', 11212, 'ee11cbb19052e40b07aac0ca060c23ee'),
(3, 'k', 'k@mail.com', 1111, '81dc9bdb52d04dc20036dbd8313ed055'),
(4, 'hello', 'h@gmail.com', 2323232, 'b59c67bf196a4758191e42f76670ceba'),
(5, 'hello', 'h@gmail.com', 2323232, 'b59c67bf196a4758191e42f76670ceba'),
(6, 'hello', 'h@gmail.com', 2323232, '81dc9bdb52d04dc20036dbd8313ed055');

-- --------------------------------------------------------

--
-- Table structure for table `user_profile`
--

CREATE TABLE `user_profile` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `address` varchar(500) NOT NULL,
  `city` varchar(20) NOT NULL,
  `thana` varchar(20) NOT NULL,
  `postal` int(20) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `phone` int(20) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_profile`
--

INSERT INTO `user_profile` (`id`, `user_id`, `address`, `city`, `thana`, `postal`, `gender`, `phone`, `image`) VALUES
(1, 1, 'sdfsdfdsf', 'Dhaka', 'Double Muring', 99, 'Female', 2147483647, 'ttt.jpg'),
(2, 6, '', '', '', 0, '', 0, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `crimetable`
--
ALTER TABLE `crimetable`
  ADD PRIMARY KEY (`crime_id`);

--
-- Indexes for table `criminaltable`
--
ALTER TABLE `criminaltable`
  ADD PRIMARY KEY (`c_t_id`);

--
-- Indexes for table `criminal_info`
--
ALTER TABLE `criminal_info`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `missingtable`
--
ALTER TABLE `missingtable`
  ADD PRIMARY KEY (`missing_id`);

--
-- Indexes for table `police_info`
--
ALTER TABLE `police_info`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `police_profile`
--
ALTER TABLE `police_profile`
  ADD PRIMARY KEY (`id`),
  ADD KEY `p_id` (`p_id`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_profile`
--
ALTER TABLE `user_profile`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `crimetable`
--
ALTER TABLE `crimetable`
  MODIFY `crime_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `criminaltable`
--
ALTER TABLE `criminaltable`
  MODIFY `c_t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `criminal_info`
--
ALTER TABLE `criminal_info`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `missingtable`
--
ALTER TABLE `missingtable`
  MODIFY `missing_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `police_info`
--
ALTER TABLE `police_info`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `police_profile`
--
ALTER TABLE `police_profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `user_profile`
--
ALTER TABLE `user_profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `police_profile`
--
ALTER TABLE `police_profile`
  ADD CONSTRAINT `police_profile_ibfk_1` FOREIGN KEY (`p_id`) REFERENCES `police_info` (`p_id`);

--
-- Constraints for table `user_profile`
--
ALTER TABLE `user_profile`
  ADD CONSTRAINT `user_profile_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_info` (`user_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
