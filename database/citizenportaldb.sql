-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 25, 2022 at 07:36 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `citizenportaldb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminID` int(100) NOT NULL,
  `adminName` varchar(50) NOT NULL,
  `adminEmail` varchar(50) NOT NULL,
  `adminPhone` varchar(11) NOT NULL,
  `adminPassword` varchar(8) NOT NULL,
  `role` varchar(5) NOT NULL,
  `lastLogin` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminID`, `adminName`, `adminEmail`, `adminPhone`, `adminPassword`, `role`, `lastLogin`) VALUES
(1, 'admin', 'Shahril3001.SR@gmail.com', '1234567', '12345678', 'admin', '2022-09-22 10:07:52');

-- --------------------------------------------------------

--
-- Table structure for table `citizen`
--

CREATE TABLE `citizen` (
  `citizenID` int(100) NOT NULL,
  `citizenName` varchar(50) NOT NULL,
  `citizenIC` varchar(11) NOT NULL,
  `citizenEmail` varchar(50) NOT NULL,
  `citizenPhone` varchar(11) NOT NULL,
  `citizenAddress` varchar(100) NOT NULL,
  `citizenPassword` varchar(8) NOT NULL,
  `role` varchar(7) NOT NULL,
  `lastLogin` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `citizen`
--

INSERT INTO `citizen` (`citizenID`, `citizenName`, `citizenIC`, `citizenEmail`, `citizenPhone`, `citizenAddress`, `citizenPassword`, `role`, `lastLogin`) VALUES
(1, 'Shahril Radziman', '01082691', 'Shahril3001.SR@gmail.com', '1234567', 'Kiudang, Tutong, TE1743 Negara Brunei Darussalam', '12345678', 'citizen', '2022-09-25 06:07:36'),
(2, 'Ali', '01081111', 'Ali.Cafe@com', '12345', 'Kampong Mabohai', '1234', 'citizen', '2022-09-11 12:44:58');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedbackID` int(100) NOT NULL,
  `senderF` varchar(100) NOT NULL,
  `subjectF` varchar(100) NOT NULL,
  `emailF` varchar(100) NOT NULL,
  `commentF` varchar(250) NOT NULL,
  `dateF` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedbackID`, `senderF`, `subjectF`, `emailF`, `commentF`, `dateF`) VALUES
(1, 'Shahril', 'Hello World', 'Shahril3001.SR@gmail.com', 'Hello', '2022-09-16 05:09:42'),
(3, 'Shahril', 'Hello World', 'Shahril3001.SR@gmail.com', 'Hello', '2022-09-16 05:12:39');

-- --------------------------------------------------------

--
-- Table structure for table `service_category`
--

CREATE TABLE `service_category` (
  `categoryID` int(11) NOT NULL,
  `categoryName` varchar(100) NOT NULL,
  `categoryDesc` varchar(200) NOT NULL,
  `categoryImg` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `service_category`
--

INSERT INTO `service_category` (`categoryID`, `categoryName`, `categoryDesc`, `categoryImg`) VALUES
(1, 'Business & Finance', 'Starting a business, customs, tax', 'data/img/service/money-bag.png'),
(2, 'Education & Learning', 'Scholarships, government education', 'data/img/service/teaching.png'),
(3, 'Employment & Labour', 'Government vacancies, recruitment of loan, admissions foreign labour, TAP, SCP', 'data/img/service/employee-card.png'),
(4, 'Family & Social Welfare', 'Social cases, marriage, counselling', 'data/img/service/defend-family--v2.png'),
(5, 'Health & Safety', 'Health assessment, Health care Information and Management System((Bruhims), SHEMA', 'data/img/service/health-book.png'),
(6, 'House, Land & Environment', 'Utilities, land development, recycling', 'data/img/service/company.png'),
(7, 'Immigration & Travel', 'Birth certificate, identification card, visa, passport, permits', 'data/img/service/passenger-with-baggage.png'),
(8, 'Law', 'Constitutional documents, Syariah Penal Order', 'data/img/service/law.png'),
(9, 'Religious Affairs', 'Zakat, halal, admission to religious schools', 'data/img/service/external-mosque-religion-flaticons-flat-flat-icons.png'),
(10, 'Transportation', 'Driving license, vehicle license, demerit points system (SIKAP)', 'data/img/service/icons8-transportation-64.png');

-- --------------------------------------------------------

--
-- Table structure for table `service_list`
--

CREATE TABLE `service_list` (
  `listID` int(11) NOT NULL,
  `listTitle` varchar(100) NOT NULL,
  `listCategory` int(11) NOT NULL,
  `listDesc` varchar(5000) NOT NULL,
  `listGuideline` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `service_list`
--

INSERT INTO `service_list` (`listID`, `listTitle`, `listCategory`, `listDesc`, `listGuideline`) VALUES
(1, 'Application for permission to publish Magazines and Newspapers', 1, 'This service is provided by the Ministry of Home Affairs (MOHA).  Publications of Magazines and Newspapers are governed by the local Newspapers Act (Term 105). Aimed at controlling the printing, publication, production and sale of Newspapers in this country. All local Newspapers must be registered to the Registrar of Newspapers i.e. Permanent Secretary of MOHA and all local and foreign Newspapers must first obtain a permit from the Minister of Home Affairs.', 'Form can be obtained at the Counter of Public Entertainment Control Division (Bahagian Pengawalan Hiburan Awam dan Penerbitan) or download here.\r\nInformation on applicants, redaction conferences, authors, managers and others shall be completed.\r\nApplication Form must be completed and submit to Counter of Public Entertainment Control Division (Bahagian Pengawalan Hiburan Awam dan Penerbitan) not less than three (3) months before the date of publication commences.\r\nSample or a dummy Magzines/Newpapers to be published must be included in three (3) copies.\r\nDeposits of $100,000.00 must be paid in cash for local Newspaper publications and $20,000.00 for local magzines.'),
(2, 'Apply, update, renew business licenses (OneBiz)', 1, '​This service, provided by Manpower Policy and Planning Unit, Ministry of Energy, Manpower and Industry is a one stop online portal to ease the starting up of businesses in Brunei Darussalam.\r\n\r\nOneBiz is a simple, usable web-based user interface that allows a businessman to apply for licenses required for his business via online. With OneBiz, a businessman is able to search for licenses that he will be required to apply for his business, track his ongoing license applications as well as make payment for his approved licenses.\r\n\r\nOverall, OneBiz has over 40 online services for applying new, updating, renewing, terminating and enquiring business licenses.', 'Click on “Start”, the service page will open in a new browser window\r\nClick on the desired service link\r\nClick here to view how to use the service\r\nFollow the instructions and enter the required information.'),
(5, 'Admission to Institute of Brunei Technical Education (IBTE)', 2, 'Education (IBTE) is a post-secondary educational institution providing technical and vocational education in Brunei Darussalam.\r\n\r\nThis service allows secondary school leavers to apply at IBTE to further their studies. This is an online service provided via the Technical Vocational Education Central Admission System (TVECAS) by the Ministry of Education.\r\n\r\nIBTE has one main intake (July intake) that covers most of their programmes (as listed under https://ibte.edu.bn/prospectus). Applications for this intake usually opens in February. However, there are also other programmes which will be opened separately depending on industry demands. ', '    Go to www.ibte.edu.bn/tvecas or by clicking on the “Start” button above.\r\n    Click \"Apply Now\" to Register. Note: This link will only appear if there is an admission opening. \r\n    Click \"Apply Now\" to Read the Instruction.\r\n    At the end of the instructions, TICK (✓) the Terms and Conditions box.\r\n    Click \"Submit\" to enter the Online Form.\r\n    Fill in the form.\r\n    Click \"O LEVEL\" to enter your O Level Result (1 - 8).\r\n     Click \"IGCSE\" to enter you IGCSE result (A - E).\r\n    In the \"Other Qualification\" section, select any qualification higher than O Level or IGCSE.\r\n    Select which programmes you are interested in for the first, second and third choices in the \"Eligible Programmes\" section.\r\n     Once you have completed the form, click \"Submit\".\r\n    Click \"OK\" to confirm.\r\n    Your filled-in form will appear on the screen.');

-- --------------------------------------------------------

--
-- Table structure for table `slideshow`
--

CREATE TABLE `slideshow` (
  `slideshowID` int(3) NOT NULL,
  `slideshowImg` varchar(10000) NOT NULL,
  `slideshowCaption` varchar(100) NOT NULL,
  `addedBy` varchar(100) NOT NULL,
  `dateAdded` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `slideshow`
--

INSERT INTO `slideshow` (`slideshowID`, `slideshowImg`, `slideshowCaption`, `addedBy`, `dateAdded`) VALUES
(1, 'data/img/slideshow/img_nature_wide.jpg', 'Caption One', '', '0000-00-00 00:00:00'),
(2, 'data/img/slideshow/img_snow_wide.jpg', 'Caption 2', '', '0000-00-00 00:00:00'),
(3, 'data/img/slideshow/img_mountains_wide.jpg', 'Caption 3', '', '0000-00-00 00:00:00'),
(4, 'data/img/slideshow/img_mountains_wide.jpg', 'Caption One', 'Shahril3001.SR@gmail.com', '2022-09-25 07:05:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminID`);

--
-- Indexes for table `citizen`
--
ALTER TABLE `citizen`
  ADD PRIMARY KEY (`citizenID`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedbackID`);

--
-- Indexes for table `service_category`
--
ALTER TABLE `service_category`
  ADD PRIMARY KEY (`categoryID`);

--
-- Indexes for table `service_list`
--
ALTER TABLE `service_list`
  ADD PRIMARY KEY (`listID`);

--
-- Indexes for table `slideshow`
--
ALTER TABLE `slideshow`
  ADD PRIMARY KEY (`slideshowID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `citizen`
--
ALTER TABLE `citizen`
  MODIFY `citizenID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedbackID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `service_category`
--
ALTER TABLE `service_category`
  MODIFY `categoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `service_list`
--
ALTER TABLE `service_list`
  MODIFY `listID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `slideshow`
--
ALTER TABLE `slideshow`
  MODIFY `slideshowID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
