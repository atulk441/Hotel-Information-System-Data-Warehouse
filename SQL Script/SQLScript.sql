-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2024 at 11:33 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `akama resorts`
--
CREATE DATABASE IF NOT EXISTS `akama resorts` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `akama resorts`;

-- --------------------------------------------------------

--
-- Table structure for table `guest`
--

CREATE TABLE `guest` (
  `GuestID` int(11) NOT NULL,
  `Name` text NOT NULL,
  `Email` varchar(150) NOT NULL,
  `Phone` varchar(999) NOT NULL,
  `Address` varchar(150) NOT NULL,
  `Nationality` text NOT NULL,
  `AmountPaid` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `guest`
--

INSERT INTO `guest` (`GuestID`, `Name`, `Email`, `Phone`, `Address`, `Nationality`, `AmountPaid`) VALUES
(103, 'Ethan Brown', 'brownethan@gmail.com', '11264826473', '789 Oak Lane, Montreal, Quebec, L9C 3R9, Canada', 'Canada', 600),
(104, 'Emma Tremblay', 'emma12@gmail.com', '11326482635', '101 Pine Road, Calgary, Alberta, T2P 0H4, Canada', 'United States of America', 750),
(106, 'Shane Williamson', 'swill@gogo.ca', '1-674-328-8010', '499 Princess st, Kingston ON K7L 1C3, Canada', 'Mexico', 350),
(107, 'Brady Anderson', 'brady.anderson@yy.edu', '1-616-325-3939', '1260 Chemin Remembrance, Montreal QC H3H 1A2', 'Germany', 500),
(108, 'Chris Taylor', 'ctlr07@gmail.com', '1-437-492-7778', '777 Pacific Blvd, Vancouver BC  V6B 4Y8, Canada', 'Russia', 300);

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `GuestID` int(11) NOT NULL,
  `RoomNo` int(11) NOT NULL,
  `Checkin` date NOT NULL,
  `Checkout` date NOT NULL,
  `NumberOfGuests` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`GuestID`, `RoomNo`, `Checkin`, `Checkout`, `NumberOfGuests`) VALUES
(103, 401, '2024-03-22', '2024-03-26', 4),
(104, 101, '2024-04-02', '2024-04-17', 1),
(106, 102, '2024-04-09', '2024-04-16', 1),
(107, 201, '2024-04-10', '2024-04-15', 2),
(108, 202, '2024-04-02', '2024-04-05', 2);

-- --------------------------------------------------------

--
-- Table structure for table `roomdetails`
--

CREATE TABLE `roomdetails` (
  `RoomSize` varchar(100) NOT NULL,
  `MaximumNumberOfGuests` int(11) NOT NULL,
  `Availability` enum('Yes','No') NOT NULL,
  `Price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roomdetails`
--

INSERT INTO `roomdetails` (`RoomSize`, `MaximumNumberOfGuests`, `Availability`, `Price`) VALUES
('Personal Room', 1, 'Yes', 50),
('Premium Room', 2, 'Yes', 100),
('Suite Room', 4, 'Yes', 150);

-- --------------------------------------------------------

--
-- Table structure for table `roominfo`
--

CREATE TABLE `roominfo` (
  `RoomNo` int(11) NOT NULL,
  `RoomSize` enum('Personal Room','Premium Room','Suite Room') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roominfo`
--

INSERT INTO `roominfo` (`RoomNo`, `RoomSize`) VALUES
(101, 'Personal Room'),
(102, 'Personal Room'),
(103, 'Personal Room'),
(104, 'Personal Room'),
(201, 'Premium Room'),
(202, 'Premium Room'),
(203, 'Premium Room'),
(401, 'Suite Room'),
(402, 'Suite Room'),
(403, 'Suite Room');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `guest`
--
ALTER TABLE `guest`
  ADD PRIMARY KEY (`GuestID`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`GuestID`,`RoomNo`);

--
-- Indexes for table `roomdetails`
--
ALTER TABLE `roomdetails`
  ADD PRIMARY KEY (`RoomSize`);

--
-- Indexes for table `roominfo`
--
ALTER TABLE `roominfo`
  ADD PRIMARY KEY (`RoomNo`);
--
-- Database: `akamasdb1`
--
CREATE DATABASE IF NOT EXISTS `akamasdb1` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `akamasdb1`;

-- --------------------------------------------------------

--
-- Table structure for table `guest`
--

CREATE TABLE `guest` (
  `GuestID` int(255) NOT NULL,
  `Name` varchar(999) NOT NULL,
  `Email` varchar(999) NOT NULL,
  `Phone` varchar(999) NOT NULL,
  `Address` varchar(999) NOT NULL,
  `Nation` varchar(999) NOT NULL,
  `Amount` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `guest`
--

INSERT INTO `guest` (`GuestID`, `Name`, `Email`, `Phone`, `Address`, `Nation`, `Amount`) VALUES
(1, 'Mitchell Stark', 'mitchell12@gmail.com', '1-249-563-6868', '2388 Cambie St, Vancouver, BC V5Z 2T8, Canada', 'Canada', 7938.15),
(2, 'David Leahy', 'david.leahy@algonquin.ca', '1-249-525-5964', '1509 Key Peninsula Highway NW, Home WA 98349,USA', 'America', 800),
(5, 'Ethan Brown', 'brownethan@gmail.com', '1-126-482-6473', '789 Oak Lane, Montreal, L9C 3R9, Quebec, Canada', 'Canada', 5950),
(6, 'Mark Smith', 'mark.smith@newcomer.ca', '1-437-240-1057', '481 8th Ave, New York NY 10001,USA', 'America', 5525),
(7, 'Kane Watson', 'wkane@gmail.com', '1-674-328-8010', '100 Queens Park, TORONTO ON M5S 2C6, Canada', 'Sweden', 1683.85);

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `GuestID` int(255) NOT NULL,
  `RoomID` int(255) NOT NULL,
  `Check_in` date NOT NULL,
  `Check_out` date NOT NULL,
  `NumberOfGuests` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`GuestID`, `RoomID`, `Check_in`, `Check_out`, `NumberOfGuests`) VALUES
(1, 3304, '2024-03-01', '2024-04-03', 1),
(2, 3307, '2024-04-01', '2024-04-02', 3),
(5, 3305, '2024-04-02', '2024-04-16', 2),
(6, 3303, '2024-04-01', '2024-04-14', 2),
(7, 3301, '2024-04-03', '2024-04-10', 1);

-- --------------------------------------------------------

--
-- Table structure for table `roomdetails`
--

CREATE TABLE `roomdetails` (
  `RoomType` varchar(100) NOT NULL,
  `Occupancy` int(11) NOT NULL,
  `Availability` enum('Yes','No') NOT NULL,
  `PricePerNight` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roomdetails`
--

INSERT INTO `roomdetails` (`RoomType`, `Occupancy`, `Availability`, `PricePerNight`) VALUES
('Deluxe', 4, 'Yes', 800),
('Double', 2, 'Yes', 425),
('Single', 1, 'Yes', 240.55);

-- --------------------------------------------------------

--
-- Table structure for table `roominfo`
--

CREATE TABLE `roominfo` (
  `RoomID` int(255) NOT NULL,
  `RoomType` enum('Single','Double','Deluxe','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roominfo`
--

INSERT INTO `roominfo` (`RoomID`, `RoomType`) VALUES
(3301, 'Single'),
(3302, 'Single'),
(3303, 'Double'),
(3304, 'Single'),
(3305, 'Double'),
(3306, 'Deluxe'),
(3307, 'Deluxe'),
(3308, 'Double'),
(3309, 'Single'),
(3310, 'Deluxe');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `guest`
--
ALTER TABLE `guest`
  ADD PRIMARY KEY (`GuestID`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`GuestID`,`RoomID`);

--
-- Indexes for table `roomdetails`
--
ALTER TABLE `roomdetails`
  ADD PRIMARY KEY (`RoomType`);
--
-- Database: `datawarehouse`
--
CREATE DATABASE IF NOT EXISTS `datawarehouse` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `datawarehouse`;

-- --------------------------------------------------------

--
-- Table structure for table `dim_branch`
--

CREATE TABLE `dim_branch` (
  `BranchID` varchar(11) NOT NULL,
  `Name` varchar(999) NOT NULL,
  `Location` varchar(999) NOT NULL,
  `Number_Of_Rooms` int(11) NOT NULL,
  `Contact` varchar(999) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dim_branch`
--

INSERT INTO `dim_branch` (`BranchID`, `Name`, `Location`, `Number_Of_Rooms`, `Contact`) VALUES
('Akama_1', 'Fairmont Resorts', '525 Bay Street Toronto, Ontario, Canada, M5G 2L2', 60, '1-416-597-9200'),
('Akama_2', 'Four Seasons Resorts', '430 Ouellette Avenue Windsor, Ontario, Canada, N9A 1B2', 58, '1-519-256-4656');

-- --------------------------------------------------------

--
-- Table structure for table `dim_date`
--

CREATE TABLE `dim_date` (
  `DATE` date NOT NULL,
  `Day` int(11) NOT NULL,
  `Month` int(11) NOT NULL,
  `Year` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dim_date`
--

INSERT INTO `dim_date` (`DATE`, `Day`, `Month`, `Year`) VALUES
('2024-02-02', 2, 2, 2024),
('2024-02-12', 12, 2, 2024),
('2024-02-28', 28, 2, 2024),
('2024-03-01', 1, 3, 2024),
('2024-03-06', 6, 3, 2024),
('2024-03-07', 7, 3, 2024),
('2024-03-13', 13, 3, 2024),
('2024-03-22', 22, 3, 2024),
('2024-04-01', 1, 4, 2024),
('2024-04-02', 2, 4, 2024),
('2024-04-03', 3, 4, 2024),
('2024-04-09', 9, 4, 2024),
('2024-04-10', 10, 4, 2024);

-- --------------------------------------------------------

--
-- Table structure for table `dim_guest`
--

CREATE TABLE `dim_guest` (
  `GuestID` int(11) NOT NULL,
  `Name` varchar(999) NOT NULL,
  `Phone` varchar(999) NOT NULL,
  `Email` varchar(999) NOT NULL,
  `Address` varchar(999) NOT NULL,
  `Nation` varchar(999) NOT NULL,
  `Exit_Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dim_guest`
--

INSERT INTO `dim_guest` (`GuestID`, `Name`, `Phone`, `Email`, `Address`, `Nation`, `Exit_Date`) VALUES
(1, 'Mitchell Stark', '1-249-563-6868', 'mitchell12@gmail.com', ' 2388 Cambie St, Vancouver, BC V5Z 2T8, Canada', ' Canada', '2024-04-03'),
(2, 'David Leahy', '1-249-525-5964', 'david.leahy@algonquin.ca', ' 1509 Key Peninsula Highway NW, Home WA 98349,USA', ' America', '2024-04-02'),
(3, 'Aniket Chowdhary', '1-416-233-7699', 'aniket943@gmail.com', ' 1380 Rue Sherbrooke W, Montreal QC H3G 1J5, Canada', ' Canada', '2024-03-20'),
(4, 'John Buttler', '1-437-233-7695', 'john.buttler@gmail.com', ' 384 Division St, Kingston ON K7K4A5, Canada', ' Canada', '2024-03-20'),
(5, 'Ethan Brown', '1-126-482-6473', 'brownethan@gmail.com', ' 789 Oak Lane, Montreal, L9C 3R9, Quebec, Canada', ' Canada', '2024-04-11'),
(6, 'Mark Smith', '1-437-240-1057', 'mark.smith@newcomer.ca', '481 8th Ave, New York NY 10001,USA', 'America', '2024-04-14'),
(7, 'Kane Watson', '1-674-328-8010', 'wkane@gmail.com', '100 Queens Park, TORONTO ON M5S 2C6, Canada', 'Sweden', '2024-04-10'),
(101, 'Liam Smith', '11016482734', 'smithlia@gmail.com', ' 123 Maple Street, Toronto, Ontario, M5V 2T6, Canada', ' Argentina', '2024-02-04'),
(102, 'Olivia Johnson', '11135285639', 'olijohnson@gmail.com', ' 456 Elm Avenue, Vancouver, British Columbia, V6B 6G1, Canada', ' India', '2024-03-12'),
(103, 'Ethan Brown', '11264826473', 'brownethan@gmail.com', ' 789 Oak Lane, Montreal, Quebec, L9C 3R9, Canada', ' Canada', '2024-03-24'),
(104, 'Emma Tremblay', '11326482635', 'emma12@gmail.com', ' 101 Pine Road, Calgary, Alberta, T2P 0H4, Canada', ' United States of America', '2024-04-24'),
(105, 'Noah Chen', '11324573528', 'chennoah15@gmail.com', ' 246 Birch Boulevard, Ottawa, Ontario, H2Y 1C6, Canada', ' Russia', '2024-02-15'),
(106, 'Shane Williamson', '1-674-328-8010', 'swill@gogo.ca', '499 Princess st, Kingston ON K7L 1C3, Canada', 'Mexico', '2024-04-16'),
(107, 'Brady Anderson', '1-616-325-3939', 'brady.anderson@yy.edu', '1260 Chemin Remembrance, Montreal QC H3H 1A2', 'Germany', '2024-04-15'),
(108, 'Chris Taylor', '1-437-492-7778', 'ctlr07@gmail.com', '777 Pacific Blvd, Vancouver BC  V6B 4Y8, Canada', 'Russia', '2024-04-05');

-- --------------------------------------------------------

--
-- Table structure for table `dim_room`
--

CREATE TABLE `dim_room` (
  `RoomID` int(11) NOT NULL,
  `RoomType` varchar(999) NOT NULL,
  `Occupancy` int(11) NOT NULL,
  `Price_Per_Night` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dim_room`
--

INSERT INTO `dim_room` (`RoomID`, `RoomType`, `Occupancy`, `Price_Per_Night`) VALUES
(101, 'Personal Room', 1, 50),
(102, 'Personal Room', 1, 50),
(103, 'Personal Room', 1, 50),
(201, 'Personal Room', 1, 50),
(202, 'Premium Room', 2, 100),
(203, 'Premium Room', 2, 100),
(401, 'Suite Room', 4, 150),
(3301, 'Single', 1, 240.55),
(3303, 'Single', 1, 240.55),
(3304, 'Single', 1, 240.55),
(3305, 'Double', 2, 425),
(3307, 'Deluxe', 4, 800),
(3308, 'Double', 2, 425);

-- --------------------------------------------------------

--
-- Table structure for table `facttable`
--

CREATE TABLE `facttable` (
  `GuestID` int(255) NOT NULL,
  `RoomID` int(255) NOT NULL,
  `BranchID` varchar(999) NOT NULL,
  `Date` date NOT NULL,
  `Total_Amount` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `facttable`
--

INSERT INTO `facttable` (`GuestID`, `RoomID`, `BranchID`, `Date`, `Total_Amount`) VALUES
(1, 3304, 'Akama_1', '2024-03-01', 7938.15),
(2, 3307, 'Akama_1', '2024-04-01', 800),
(3, 3308, 'Akama_1', '2024-03-06', 5950),
(4, 3304, 'Akama_1', '2024-03-13', 1683.85),
(5, 3305, 'Akama_1', '2024-04-02', 3825),
(6, 3303, 'Akama_1', '2024-04-01', 5525),
(7, 3301, 'Akama_1', '2024-04-03', 1683.85),
(101, 103, 'Akama_2', '2024-02-02', 100),
(102, 202, 'Akama_2', '2024-03-07', 500),
(103, 401, 'Akama_2', '2024-03-22', 300),
(104, 101, 'Akama_2', '2024-04-16', 250),
(105, 102, 'Akama_2', '2024-04-11', 100),
(106, 102, 'Akama_2', '2024-04-09', 350),
(107, 201, 'Akama_2', '2024-04-10', 500),
(108, 202, 'Akama_2', '2024-04-02', 300);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dim_branch`
--
ALTER TABLE `dim_branch`
  ADD PRIMARY KEY (`BranchID`);

--
-- Indexes for table `dim_date`
--
ALTER TABLE `dim_date`
  ADD PRIMARY KEY (`DATE`);

--
-- Indexes for table `dim_guest`
--
ALTER TABLE `dim_guest`
  ADD PRIMARY KEY (`GuestID`);

--
-- Indexes for table `dim_room`
--
ALTER TABLE `dim_room`
  ADD PRIMARY KEY (`RoomID`);

--
-- Indexes for table `facttable`
--
ALTER TABLE `facttable`
  ADD PRIMARY KEY (`GuestID`,`RoomID`);
--
-- Database: `userpass`
--
CREATE DATABASE IF NOT EXISTS `userpass` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `userpass`;

-- --------------------------------------------------------

--
-- Table structure for table `logindetails`
--

CREATE TABLE `logindetails` (
  `Name` varchar(999) NOT NULL,
  `EmailID` varchar(999) NOT NULL,
  `Password` varchar(999) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `logindetails`
--

INSERT INTO `logindetails` (`Name`, `EmailID`, `Password`) VALUES
('Atul Kumar', 'atulkum@uwindsor.ca', 'atul91'),
('Dr. Cool', 'drcool@hello.ca', 'cool91');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
