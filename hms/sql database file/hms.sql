-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 12, 2022 at 10:29 AM
-- Server version: 8.0.27
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hms`
--

DELIMITER $$
--
-- Procedures
--
DROP PROCEDURE IF EXISTS `display_reservationbyorder`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `display_reservationbyorder` ()  BEGIN
SELECT * FROM reservation ORDER BY RESERVE_DATE;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `ID` int DEFAULT NULL,
  `USERNAME` varchar(10) DEFAULT NULL,
  `PASSWD` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ID`, `USERNAME`, `PASSWD`) VALUES
(0, 'ABCD', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `CUST_ID` int NOT NULL AUTO_INCREMENT,
  `CUST_NAME` varchar(225) NOT NULL,
  `CUST_ADDRESS` varchar(255) NOT NULL,
  `CUST_EMAIL` varchar(255) NOT NULL,
  `CUST_PHONE` int NOT NULL,
  PRIMARY KEY (`CUST_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=1020 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`CUST_ID`, `CUST_NAME`, `CUST_ADDRESS`, `CUST_EMAIL`, `CUST_PHONE`) VALUES
(1010, 'TINA', 'BANGALORE', 'tina@gmail.com', 987576654),
(1011, 'REEMA', 'MADURAI', 'reema@gmail.com', 978766765),
(1012, 'JOHN', 'DELHI', 'john@gmail.com', 987870959),
(1013, 'RAMESH', 'MUMBAI', 'ramesh@gmail.com', 987854545),
(1014, 'MEERA', 'KOLKATA', 'meera@gmail.com', 980900767),
(1015, 'SURESH', 'PUNE', 'suresh@gmail.com', 932352121),
(1016, 'RAVI', 'MYSORE', 'ravi@gmail.com', 909088554),
(1017, 'ANJALI', 'HASSAN', 'anjali@gmail.com', 985776543),
(1018, 'RAHUL', 'GULBARGA', 'rahul@gmail.com', 901134323),
(1019, 'NISHA', 'CHENNAI', 'nisha@gmail.com', 989765543);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

DROP TABLE IF EXISTS `employee`;
CREATE TABLE IF NOT EXISTS `employee` (
  `EMP_ID` int NOT NULL,
  `EMP_NAME` varchar(30) NOT NULL,
  `JOB_DEPT` varchar(30) NOT NULL,
  `CONTACT_NUM` int NOT NULL,
  `SALARY` int NOT NULL,
  PRIMARY KEY (`EMP_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`EMP_ID`, `EMP_NAME`, `JOB_DEPT`, `CONTACT_NUM`, `SALARY`) VALUES
(120, 'SIVANI', 'CEO', 987345942, 60000),
(121, 'STHUTHI', 'CFO', 945659300, 60000),
(134, 'VAISHNAVI', 'MANAGER', 970943671, 30000),
(135, 'SATHYALAKSHMI', 'RECEPTIONIST', 911398776, 25000),
(150, 'SHREYAS ', 'COOK', 987887997, 20000),
(152, 'SHARAN', 'COOK', 923453395, 20000),
(165, 'SAMPRITH', 'ROOM SERVICE', 989734432, 15000),
(166, 'VARUN', 'ROOM SERCIVE', 987834932, 15000),
(167, 'SUHAS', 'HOUSE KEEPING', 987834932, 10000),
(168, 'SAATVIK', 'HOUSE KEEPING', 987895432, 10000);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

DROP TABLE IF EXISTS `payment`;
CREATE TABLE IF NOT EXISTS `payment` (
  `PAY_ID` int NOT NULL AUTO_INCREMENT,
  `CUST_ID` int NOT NULL,
  `PAY_DATE` date NOT NULL,
  `PAY_AMT` int NOT NULL,
  `PAY_TYPE` text NOT NULL,
  PRIMARY KEY (`PAY_ID`),
  KEY `CUST_ID` (`CUST_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4213 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`PAY_ID`, `CUST_ID`, `PAY_DATE`, `PAY_AMT`, `PAY_TYPE`) VALUES
(142, 1018, '2022-01-16', 2625, 'card'),
(1024, 1016, '2022-01-22', 3150, 'Gpay'),
(1042, 1011, '2022-02-12', 5775, 'Gpay'),
(1142, 1014, '2021-12-28', 3675, 'Cash'),
(1204, 1010, '2022-02-03', 2100, 'Online'),
(1424, 1012, '2022-01-11', 4725, 'card'),
(1452, 1015, '2022-01-03', 3675, 'card'),
(2412, 1010, '2022-01-04', 5250, 'Cash'),
(4012, 1013, '2022-01-20', 4200, 'Online'),
(4212, 1017, '2022-02-13', 2625, 'Cash');

--
-- Triggers `payment`
--
DROP TRIGGER IF EXISTS `bef_insertpayamtGST`;
DELIMITER $$
CREATE TRIGGER `bef_insertpayamtGST` BEFORE INSERT ON `payment` FOR EACH ROW BEGIN
SET NEW.PAY_AMT = NEW.PAY_AMT+(0.05*NEW.PAY_AMT);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

DROP TABLE IF EXISTS `reservation`;
CREATE TABLE IF NOT EXISTS `reservation` (
  `RESERVE_ID` int NOT NULL AUTO_INCREMENT,
  `CUST_ID` int NOT NULL,
  `ROOM_ID` int NOT NULL,
  `RESERVE_DATE` date DEFAULT NULL,
  `CHECK_IN` date DEFAULT NULL,
  `CHECK_OUT` date DEFAULT NULL,
  `DAYS_RANGE` int NOT NULL,
  PRIMARY KEY (`RESERVE_ID`),
  KEY `CUST_ID` (`CUST_ID`),
  KEY `ROOM_ID` (`ROOM_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=9022 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`RESERVE_ID`, `CUST_ID`, `ROOM_ID`, `RESERVE_DATE`, `CHECK_IN`, `CHECK_OUT`, `DAYS_RANGE`) VALUES
(1010, 1019, 402, '2022-01-06', '2022-01-31', '2022-02-03', 4),
(1210, 1010, 201, '2022-01-04', '2022-01-06', '2022-01-10', 5),
(2201, 1011, 205, '2022-02-12', '2022-02-13', '2022-02-14', 1),
(3201, 1012, 305, '2022-01-11', '2022-01-27', '2022-01-30', 3),
(4120, 1013, 406, '2022-01-20', '2022-03-17', '2022-03-19', 2),
(5201, 1014, 301, '2021-12-28', '2022-02-14', '2022-01-20', 6),
(6120, 1015, 203, '2022-01-03', '2022-04-01', '2022-04-02', 1),
(7021, 1016, 406, '2022-01-22', '2022-02-21', '2022-02-23', 2),
(8120, 1017, 203, '2022-02-13', '2022-04-11', '2022-04-13', 2),
(9021, 1018, 301, '2022-01-16', '2022-03-08', '2022-03-11', 3);

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

DROP TABLE IF EXISTS `room`;
CREATE TABLE IF NOT EXISTS `room` (
  `ROOM_ID` int NOT NULL,
  `ROOM_TYPE` varchar(30) NOT NULL,
  `ROOM_BED` text NOT NULL,
  `ROOM_MEAL` text NOT NULL,
  `RPRICE` int NOT NULL,
  PRIMARY KEY (`ROOM_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`ROOM_ID`, `ROOM_TYPE`, `ROOM_BED`, `ROOM_MEAL`, `RPRICE`) VALUES
(201, 'SUPERIOR', 'DOUBLE', 'FULL BOARD', 5000),
(203, 'Superior', 'Single', 'Room Only', 3500),
(205, 'GUEST', 'SINGLE', 'ROOM ONLY', 2000),
(207, 'DELUXE', 'DOUBLE', 'FULL BOARD', 4500),
(301, 'GUEST', 'SINGLE', 'HALF BOARD', 2500),
(302, 'DELUXE', 'TRIPLE', 'BREAKFAST', 4000),
(303, 'REGULAR', 'DOUBLE', 'BREAKFAST', 3000),
(305, 'SUPERIOR', 'TRIPLE', 'FULL BOARD', 5500),
(402, 'REGULAR', 'DOUBLE', 'ROOM ONLY', 2500),
(406, 'DELUXE', 'DOUBLE', ' ROOM ONLY', 3500);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

DROP TABLE IF EXISTS `transactions`;
CREATE TABLE IF NOT EXISTS `transactions` (
  `TRANSACTION_ID` int NOT NULL AUTO_INCREMENT,
  `TRANSACTION_NAME` varchar(30) NOT NULL,
  `CUST_ID` int NOT NULL,
  `RESERVE_ID` int NOT NULL,
  `EMP_ID` int NOT NULL,
  `TRANSACTION_DATE` date NOT NULL,
  PRIMARY KEY (`TRANSACTION_ID`),
  KEY `CUST_ID` (`CUST_ID`),
  KEY `RESERVE_ID` (`RESERVE_ID`),
  KEY `EMP_ID` (`EMP_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`TRANSACTION_ID`, `TRANSACTION_NAME`, `CUST_ID`, `RESERVE_ID`, `EMP_ID`, `TRANSACTION_DATE`) VALUES
(25, 'Cash', 1010, 1210, 166, '2022-01-04'),
(26, 'Gpay', 1011, 2201, 165, '2022-02-12'),
(27, 'card', 1012, 3201, 120, '2022-01-11'),
(28, 'Online', 1013, 4120, 166, '2022-01-20'),
(29, 'Cash', 1014, 5201, 150, '2021-12-28'),
(30, 'Gpay', 1015, 6120, 135, '2022-01-03'),
(31, 'Gpay', 1016, 7021, 152, '2022-01-22'),
(32, 'Cash', 1017, 8120, 168, '2022-02-13'),
(33, 'card', 1018, 9021, 134, '2022-01-16'),
(34, 'Online', 1019, 1010, 152, '2022-02-03');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`CUST_ID`) REFERENCES `customer` (`CUST_ID`) ON DELETE CASCADE;

--
-- Constraints for table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`CUST_ID`) REFERENCES `customer` (`CUST_ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`ROOM_ID`) REFERENCES `room` (`ROOM_ID`) ON DELETE CASCADE;

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_ibfk_1` FOREIGN KEY (`CUST_ID`) REFERENCES `customer` (`CUST_ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `transactions_ibfk_2` FOREIGN KEY (`RESERVE_ID`) REFERENCES `reservation` (`RESERVE_ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `transactions_ibfk_3` FOREIGN KEY (`EMP_ID`) REFERENCES `employee` (`EMP_ID`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
