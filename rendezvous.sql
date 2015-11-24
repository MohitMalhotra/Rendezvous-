-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 09, 2015 at 09:45 PM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rendezvous`
--
CREATE DATABASE IF NOT EXISTS `rendezvous` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `rendezvous`;
-- --------------------------------------------------------

--
-- Table structure for table `meetupsearchresult`
--

CREATE TABLE IF NOT EXISTS `meetupsearchresult` (
  `meetupSearchId` varchar(15) NOT NULL,
  `userId` varchar(15) NOT NULL,
  `firstAddress` varchar(100) NOT NULL,
  `secondAddress` varchar(100) NOT NULL,
  `rating` int(10) NOT NULL,
  `radius` int(10) NOT NULL,
  `timestamp` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6),
  `displayName` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE IF NOT EXISTS `review` (
  `reviewId` varchar(15) NOT NULL,
  `review` varchar(500) NOT NULL,
  `foreignReviewId` varchar(15) NOT NULL,
  `reviewRating` int(10) NOT NULL,
  `reviewRatingImgURL` varchar(20) NOT NULL,
  `reviewTimeCreated` datetime(6) NOT NULL,
  `reviewUserName` varchar(20) NOT NULL,
  `reviewRatingLargeURL` varchar(50) NOT NULL,
  `venueId` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `savesearchresult`
--

CREATE TABLE IF NOT EXISTS `savesearchresult` (
  `singleSearchId` varchar(20) NOT NULL,
  `userId` varchar(15) NOT NULL,
  `venueName` varchar(30) NOT NULL,
  `city` varchar(20) NOT NULL,
  `zipcode` int(10) NOT NULL,
  `latitide` varchar(10) NOT NULL,
  `longitude` varchar(10) NOT NULL,
  `rating` int(10) NOT NULL,
  `radius` int(10) NOT NULL,
  `timestamp` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6),
  `displayName` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `userId` varchar(15) NOT NULL,
  `firstName` varchar(100) NOT NULL,
  `lastName` varchar(100) NOT NULL,
  `address` varchar(225) NOT NULL,
  `city` varchar(20) NOT NULL,
  `state` varchar(20) NOT NULL,
  `zipcode` int(10) NOT NULL,
  `phone` int(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(15) NOT NULL,
  `securityQuestion1` varchar(30) NOT NULL,
  `securityQuestion2` varchar(30) NOT NULL,
  `answerQuestion1` varchar(20) NOT NULL,
  `answerQuestion2` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `venue`
--

CREATE TABLE IF NOT EXISTS `venue` (
  `venueID` varchar(15) NOT NULL,
  `venueForeignId` varchar(15) NOT NULL,
  `venueName` varchar(30) NOT NULL,
  `venueLatitude` int(10) NOT NULL,
  `venueLongitude` int(10) NOT NULL,
  `venueAddress` varchar(100) NOT NULL,
  `rating` int(10) NOT NULL,
  `zipcode` int(10) NOT NULL,
  `city` varchar(20) NOT NULL,
  `state` varchar(20) NOT NULL,
  `phone` int(15) NOT NULL,
  `foreignSource` int(15) NOT NULL,
  `menuURL` varchar(20) NOT NULL,
  `venuePhotoURL` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `meetupsearchresult`
--
ALTER TABLE `meetupsearchresult`
  ADD PRIMARY KEY (`meetupSearchId`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`reviewId`);

--
-- Indexes for table `savesearchresult`
--
ALTER TABLE `savesearchresult`
  ADD PRIMARY KEY (`singleSearchId`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userId`);

--
-- Indexes for table `venue`
--
ALTER TABLE `venue`
  ADD PRIMARY KEY (`venueID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
