-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 01, 2016 at 03:58 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bus`
--

-- --------------------------------------------------------

--
-- Table structure for table `assistantsalary`
--

CREATE TABLE IF NOT EXISTS `assistantsalary` (
  `date` int(11) NOT NULL,
  `assistantName` text NOT NULL,
  `Salary` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assistantsalary`
--

INSERT INTO `assistantsalary` (`date`, `assistantName`, `Salary`) VALUES
(0, 'Tun Tun', 18000),
(2013, 'Lin Htun', 3000),
(2013, 'Lin Htun', 3000),
(1970, '', 0),
(2016, 'Tun', 4500),
(2016, 'Mg Hla', 7500),
(2016, 'Tun', 9000),
(2016, 'Mg Mg', 6000);

-- --------------------------------------------------------

--
-- Table structure for table `bus`
--

CREATE TABLE IF NOT EXISTS `bus` (
  `No` int(11) NOT NULL AUTO_INCREMENT,
  `busID` varchar(10) NOT NULL DEFAULT '',
  `busColor` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`No`,`busID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `bus`
--

INSERT INTO `bus` (`No`, `busID`, `busColor`) VALUES
(2, '4D-5115', 'Yellow'),
(5, '3D-5634', 'Yellow'),
(6, '4A-2412', 'Blue'),
(7, '5B-5335', 'yellow'),
(8, '2A-3412', 'Yellow'),
(9, '4A-1234', 'yellow'),
(10, '6A-1234', 'yellow');

-- --------------------------------------------------------

--
-- Table structure for table `complain`
--

CREATE TABLE IF NOT EXISTS `complain` (
  `complainID` int(100) NOT NULL AUTO_INCREMENT,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `easyToRide` int(5) NOT NULL,
  `cleanAndNeat` int(5) NOT NULL,
  `facility` int(5) NOT NULL,
  `comment` longtext NOT NULL,
  PRIMARY KEY (`complainID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `complain`
--

INSERT INTO `complain` (`complainID`, `date`, `easyToRide`, `cleanAndNeat`, `facility`, `comment`) VALUES
(16, '2016-07-27 17:52:34', 2, 1, 3, ''),
(17, '2016-07-27 17:52:41', 2, 2, 2, ''),
(18, '2016-07-27 17:53:58', 4, 3, 3, 'Not Bad'),
(19, '2016-07-31 10:53:26', 2, 1, 2, 'Your bus is little dirty and driver assistant has really bad mouth. \r\n'),
(20, '2016-08-01 08:55:10', 4, 3, 4, 'Charges cannot get'),
(21, '2016-08-01 09:17:46', 2, 1, 2, 'fffff'),
(22, '2016-08-01 10:20:18', 1, 1, 1, 'good'),
(23, '2016-08-01 11:10:58', 0, 0, 0, '<script>alert("XSS")</script>'),
(24, '2016-08-01 12:06:04', 2, 2, 2, 'good'),
(25, '2016-08-01 12:07:47', 2, 2, 2, 'good'),
(26, '2016-08-01 13:40:29', 5, 0, 0, ''),
(27, '2016-08-01 13:40:48', 5, 5, 5, '');

-- --------------------------------------------------------

--
-- Table structure for table `driver`
--

CREATE TABLE IF NOT EXISTS `driver` (
  `driverId` varchar(50) NOT NULL DEFAULT '',
  `busId` varchar(20) NOT NULL DEFAULT '',
  `driverName` varchar(30) DEFAULT NULL,
  `nrcNumber` varchar(30) NOT NULL DEFAULT '',
  `phNumber` bigint(30) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`driverId`,`busId`,`nrcNumber`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `driver`
--

INSERT INTO `driver` (`driverId`, `busId`, `driverName`, `nrcNumber`, `phNumber`, `address`) VALUES
('A/00123/14', '4D-5115', 'Tin Tun', '12/ASN(N)145632', 959511234, 'Yangon'),
('A/00234/12', '3D-5634', 'Htun Aung', '12/MIM(N)411235', 959421474836, 'Taung Gyi'),
('A/00235/13', '', 'Htun Htun', '10/MIN(N)123453', 9425301233, 'Yangon'),
('A/00237/13', '', 'san', '10/MIN(N)1234568', 9425301233, 'vv'),
('A/00243/12', '2A-3412', 'Mg Mg', '12/ASN(N)415622', 95172546, 'Yangon'),
('B/12345/14', '', 'John', '10/MIN(N)1234567', 9425301233, 'Latha');

-- --------------------------------------------------------

--
-- Table structure for table `driversalary`
--

CREATE TABLE IF NOT EXISTS `driversalary` (
  `date` int(11) NOT NULL,
  `DriverName` text NOT NULL,
  `Salary` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `driversalary`
--

INSERT INTO `driversalary` (`date`, `DriverName`, `Salary`) VALUES
(0, 'Tun Tun', 3000),
(0, 'Hla Myaing', 8750),
(2016, 'Tun Tun', 12500),
(2016, 'Tun Tun', 12500),
(2016, 'Tun Tun', 12500),
(2016, 'Tin Tun', 12500),
(2016, 'Mg Hla', 5000),
(2016, 'Mg Hla', 7500),
(2016, 'Mg Hla', 7500),
(2016, 'Tun', 7500),
(2016, 'Mg Hla', 7500),
(2016, 'Mg Hla', 7500),
(2016, 'Mg Hla', 7500),
(2016, 'Mg Hla', 10000),
(2016, 'Tun', 15000),
(2016, 'kjh', 15000),
(1970, 'Mg Hla', 15000),
(2016, 'Mg Hla', 7500),
(2016, 'Tun', 7500),
(2016, 'Mg Mg', 10000),
(2016, 'Mg Hla', 10000);

-- --------------------------------------------------------

--
-- Table structure for table `fixingrecord`
--

CREATE TABLE IF NOT EXISTS `fixingrecord` (
  `fixingRecordID` int(11) NOT NULL AUTO_INCREMENT,
  `fixingDate` date NOT NULL,
  `busID` varchar(20) NOT NULL DEFAULT '',
  `driverID` varchar(20) NOT NULL DEFAULT '',
  `fixingParts` char(50) DEFAULT NULL,
  `totalCost` int(11) DEFAULT NULL,
  `fixingCount` int(50) NOT NULL,
  PRIMARY KEY (`fixingRecordID`),
  KEY `busID` (`busID`),
  KEY `driverID` (`driverID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `fixingrecord`
--

INSERT INTO `fixingrecord` (`fixingRecordID`, `fixingDate`, `busID`, `driverID`, `fixingParts`, `totalCost`, `fixingCount`) VALUES
(15, '2016-06-20', '4D-5115', 'A/00211/12', 'Engine', 30000, 1),
(16, '2016-07-01', '3D-5634', 'A/00234/12', 'Wheels', 400000, 1),
(18, '2016-06-29', '2A-3412', 'A/00234/12', 'Wheels', 30000, 1),
(19, '2016-06-23', '2A-3412', 'A/00234/12', 'Engine', 250000, 2);

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE IF NOT EXISTS `service` (
  `serviceID` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `servicenotice` varchar(100) NOT NULL,
  PRIMARY KEY (`serviceID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`serviceID`, `date`, `servicenotice`) VALUES
(1, '2016-07-04', 'Today one of Yellow Line Bus is broken.So we are sorry for late bus.'),
(2, '2016-07-05', 'Today is holiday and we face a little traffic.');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE IF NOT EXISTS `staff` (
  `employeeId` int(11) NOT NULL AUTO_INCREMENT,
  `password` varchar(20) NOT NULL,
  `confirmPassword` varchar(20) NOT NULL,
  `Name` text NOT NULL,
  `nrc` varchar(20) NOT NULL,
  `phone` int(11) NOT NULL,
  `address` text NOT NULL,
  `gender` text NOT NULL,
  PRIMARY KEY (`employeeId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`employeeId`, `password`, `confirmPassword`, `Name`, `nrc`, `phone`, `address`, `gender`) VALUES
(1, '12345678', '12345678', 'Mg Hla', '12/LFE(N)0452463', 95113456, 'no.22A mingalar taung nyaunt', 'Male'),
(22, 'eeehahahee', 'eeehahahee', 'hello', '12/asn(naing)343434', 91234567, 'fdgfdg', 'Male');

-- --------------------------------------------------------

--
-- Table structure for table `yellow`
--

CREATE TABLE IF NOT EXISTS `yellow` (
  `Schedule_ID` int(11) NOT NULL AUTO_INCREMENT,
  `departure` varchar(50) NOT NULL,
  `arrival` varchar(50) NOT NULL,
  `duration` time NOT NULL,
  `price` int(10) NOT NULL,
  `road` varchar(50) NOT NULL,
  PRIMARY KEY (`Schedule_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `yellow`
--

INSERT INTO `yellow` (`Schedule_ID`, `departure`, `arrival`, `duration`, `price`, `road`) VALUES
(1, 'Nyaung Pin', 'Myint Zu', '00:10:00', 200, 'Parami Road'),
(2, 'Myint Zu', 'Chaw Twin Kone', '00:09:00', 200, 'Parami Road'),
(3, 'Chaw Twin Kone', 'Kabaraye Pagoda', '00:13:00', 200, 'Kabaraye Pagoda Road'),
(4, 'Kabaraye Pagoda', 'Sar Tite', '00:09:00', 200, 'Kabaraye Pagoda Road'),
(5, 'Sar Tite', 'Nawaday', '00:12:00', 200, 'Kabaraye Pagoda Road'),
(6, 'Nawaday', 'Myine Hay Wun Park', '00:14:00', 200, 'Kabaraye Pagoda Road'),
(7, 'Myine Hay Wun Park', '7 Mile', '00:13:00', 200, 'Pyay Road'),
(8, '7 Mile', 'AD', '00:15:00', 200, 'Pyay Road'),
(9, 'AD', 'Kyaung Kway', '00:16:00', 200, 'Pyay Road'),
(10, 'Kyaung Kway', '6 Mile Kwal', '00:13:00', 200, 'Pyay Road'),
(11, '6 Mile Kwal', 'Ta Tar Phyu', '00:14:00', 200, 'Pyay Road'),
(12, 'Ta Tar Phyu', 'Malar', '00:10:00', 200, 'Pyay Road'),
(13, 'Malar', 'Hlae Dan', '00:13:00', 200, 'Pyay Road');
