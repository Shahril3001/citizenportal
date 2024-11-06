-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 05, 2022 at 05:36 AM
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
(1, 'admin', 'Shahril3001.SR@gmail.com', '1234567', '12345678', 'admin', '2022-11-05 04:59:02');

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
(1, 'Shahril Radziman', '01082691', 'Shahril3001.SR@gmail.com', '1234565', '<p>Kiudang, Tutong Negara Brunei Darussalam</p>\r\n', '12345678', 'citizen', '2022-11-05 05:25:01'),
(6, 'FATIN AMAAL BATRISYIA BTE HJ MOHD HUSSAINI ', '01081111', 'FatinAmaal@gmail.com', '1234567', '<p>Brunei</p>\r\n', '12345678', 'citizen', '2022-11-05 05:06:27');

-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

CREATE TABLE `complaints` (
  `complaintID` int(11) NOT NULL,
  `complaintSubject` varchar(200) NOT NULL,
  `complaintDesc` varchar(1000) NOT NULL,
  `location` varchar(255) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `serviceTitle` varchar(100) NOT NULL,
  `serviceCategory` varchar(50) NOT NULL,
  `complaintImage` varchar(10000) NOT NULL,
  `document` varchar(1000) NOT NULL,
  `citizenIC` varchar(11) NOT NULL,
  `complaintStatus` varchar(10) NOT NULL,
  `complaintDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `complaintsbehalf`
--

CREATE TABLE `complaintsbehalf` (
  `behalfComplaintID` int(10) UNSIGNED NOT NULL,
  `behalfName` varchar(150) NOT NULL,
  `reason` varchar(500) NOT NULL,
  `behalfContact` int(7) NOT NULL,
  `behalfAddress` varchar(500) NOT NULL,
  `relationship` varchar(50) NOT NULL,
  `complaintSubject` varchar(200) NOT NULL,
  `complaintDesc` varchar(1000) NOT NULL,
  `location` varchar(100) NOT NULL,
  `date` datetime NOT NULL,
  `serviceTitle` varchar(100) NOT NULL,
  `serviceCategory` varchar(50) NOT NULL,
  `complaintImage` varchar(255) NOT NULL,
  `document` varchar(255) NOT NULL,
  `citizenIC` varchar(11) NOT NULL,
  `complaintStatus` varchar(10) NOT NULL,
  `complaintDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedbackID` int(100) NOT NULL,
  `citizenName` varchar(100) NOT NULL,
  `citizenIC` varchar(11) NOT NULL,
  `subjectF` varchar(100) NOT NULL,
  `feedbackType` varchar(10) NOT NULL,
  `emailF` varchar(100) NOT NULL,
  `commentF` varchar(250) NOT NULL,
  `dateF` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, 'Business & Finance', '<p>Starting a business, customs, tax</p>\r\n', 'data/img/service/money-bag.png'),
(2, 'Education & Learning', 'Scholarships, government education', 'data/img/service/teaching.png'),
(3, 'Employment & Labour', 'Government vacancies, recruitment of loan, admissions foreign labour, TAP, SCP', 'data/img/service/employee-card.png'),
(4, 'Family & Social Welfare', 'Social cases, marriage, counselling', 'data/img/service/defend-family--v2.png'),
(5, 'Health & Safety', 'Health assessment, Health care Information and Management System((Bruhims), SHEMA', 'data/img/service/health-book.png'),
(6, 'House, Land & Environment', 'Utilities, land development, recycling', 'data/img/service/company.png'),
(7, 'Immigration & Travel', 'Birth certificate, identification card, visa, passport, permits', 'data/img/service/passenger-with-baggage.png'),
(8, 'Law', 'Constitutional documents, Syariah Penal Order', 'data/img/service/law.png'),
(9, 'Religious Affairs', 'Zakat, halal, admission to religious schools', 'data/img/service/external-mosque-religion-flaticons-flat-flat-icons.png'),
(10, 'Transportation', '<p>Driving license, vehicle license, demerit points system (SIKAP)</p>\r\n', 'data/img/service/icons8-transportation-64.png');

-- --------------------------------------------------------

--
-- Table structure for table `service_list`
--

CREATE TABLE `service_list` (
  `listID` int(11) NOT NULL,
  `listTitle` varchar(100) NOT NULL,
  `listCategory` varchar(100) NOT NULL,
  `listDesc` varchar(5000) NOT NULL,
  `listGuideline` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `service_list`
--

INSERT INTO `service_list` (`listID`, `listTitle`, `listCategory`, `listDesc`, `listGuideline`) VALUES
(1, 'Application for permission to publish Magazines and Newspapers', 'Business & Finance', '<p>This service is provided by the Ministry of Home Affairs (MOHA). Publications of Magazines and Newspapers are governed by the local Newspapers Act (Term 105). Aimed at controlling the printing, publication, production and sale of Newspapers in this country. All local Newspapers must be registered to the Registrar of Newspapers i.e. Permanent Secretary of MOHA and all local and foreign Newspapers must first obtain a permit from the Minister of Home Affairs.</p>\r\n', '<p>Form can be obtained at the Counter of Public Entertainment Control Division (Bahagian Pengawalan Hiburan Awam dan Penerbitan) or download here. Information on applicants, redaction conferences, authors, managers and others shall be completed. Application Form must be completed and submit to Counter of Public Entertainment Control Division (Bahagian Pengawalan Hiburan Awam dan Penerbitan) not less than three (3) months before the date of publication commences. Sample or a dummy Magzines/Newpapers to be published must be included in three (3) copies. Deposits of $100,000.00 must be paid in cash for local Newspaper publications and $20,000.00 for local magzines.</p>\r\n'),
(2, 'Apply, update, renew business licenses (OneBiz)', 'Business & Finance', '<p>​This service, provided by Manpower Policy and Planning Unit, Ministry of Energy, Manpower and Industry is a one stop online portal to ease the starting up of businesses in Brunei Darussalam. OneBiz is a simple, usable web-based user interface that allows a businessman to apply for licenses required for his business via online. With OneBiz, a businessman is able to search for licenses that he will be required to apply for his business, track his ongoing license applications as well as make payment for his approved licenses. Overall, OneBiz has over 40 online services for applying new, updating, renewing, terminating and enquiring business licenses.</p>\r\n', '<p>Click on &ldquo;Start&rdquo;, the service page will open in a new browser window Click on the desired service link Click here to view how to use the service Follow the instructions and enter the required information.</p>\r\n'),
(5, 'Admission to Institute of Brunei Technical Education (IBTE)', 'Education & Learning', '<p>Education (IBTE) is a post-secondary educational institution providing technical and vocational education in Brunei Darussalam. This service allows secondary school leavers to apply at IBTE to further their studies. This is an online service provided via the Technical Vocational Education Central Admission System (TVECAS) by the Ministry of Education. IBTE has one main intake (July intake) that covers most of their programmes (as listed under https://ibte.edu.bn/prospectus). Applications for this intake usually opens in February. However, there are also other programmes which will be opened separately depending on industry demands.</p>\r\n', '<p>Go to www.ibte.edu.bn/tvecas or by clicking on the &ldquo;Start&rdquo; button above. Click &quot;Apply Now&quot; to Register. Note: This link will only appear if there is an admission opening. Click &quot;Apply Now&quot; to Read the Instruction. At the end of the instructions, TICK (✓) the Terms and Conditions box. Click &quot;Submit&quot; to enter the Online Form. Fill in the form. Click &quot;O LEVEL&quot; to enter your O Level Result (1 - 8). Click &quot;IGCSE&quot; to enter you IGCSE result (A - E). In the &quot;Other Qualification&quot; section, select any qualification higher than O Level or IGCSE. Select which programmes you are interested in for the first, second and third choices in the &quot;Eligible Programmes&quot; section. Once you have completed the form, click &quot;Submit&quot;. Click &quot;OK&quot; to confirm. Your filled-in form will appear on the screen.</p>\r\n'),
(6, 'Application for permission to use Logo or Emblem', 'Business & Finance', '<p>This service is provided by the Ministry of Home Affairs (MOHA). The use of Logos and Emblem is under the Act of Emblem and Names (Prevention of Improper Use), 1967. All applications are processed with the cooperation of the Attorney General, Police Commissioner and Yang Di-Pertua Adat Istiadat Negara. Authority to give permission for the use of the Logo/Emblem is MOHA under the Act of the Names/Emblem (Prevention of Misuse) 1967.</p>\r\n', '<p>Click on &ldquo;Start&rdquo;, the service page will open in a new browser window</p>\r\n'),
(8, 'Pre-Employment Health Assessment - Local', 'Health & Safety', '<p>​This Form is provided by&nbsp;the Ministry of Health.</p>\r\n', '<p>​This Form is provided by&nbsp;the Ministry of Health.</p>\r\n'),
(9, 'Registration for Brunei Healthcare Information Management System (BruHIMS)', 'Health & Safety', '<p>This service is provided by Ministry of Health for applicants who wish to register their BruHIMS online or over the counter.</p>\r\n\r\n<p><strong>General Prerequisite / Criteria</strong></p>\r\n\r\n<p><span style=\"background-color:#ffffff\">Open for all applicants (Brunei Citizens, Permanent Residents and&nbsp;Foreigners). No age group.</span></p>\r\n\r\n<p><strong><span style=\"background-color:#ffffff\">Online Prerequisite/ Criteria</span></strong></p>\r\n\r\n<div>\r\n<ul>\r\n	<li>Register online&nbsp;</li>\r\n	<li>Upload copy of&nbsp;&nbsp;<span style=\"background-color:#ffffff\">Brunei issued Smart Identity Card</span>&nbsp;(IC)</li>\r\n	<li>Upload copy of&nbsp;Passport &nbsp;( for Foreign Workers)</li>\r\n</ul>\r\n</div>\r\n', ''),
(10, 'National Health Screening Programme (NHSP)', 'Health & Safety', '<p>The National Health Screening Programme (NHSP) is a nationwide health screening programme, organised by the Ministry of Health Brunei Darussalam, to detect and prevent noncommunicable diseases such as high blood pressure, diabetes mellitus, high cholesterol and cancer, and hence to allow for early and effective management of these diseases.</p>\r\n', ''),
(11, 'Food Import Registration (FIR)', 'Health & Safety', '<p>This service is&nbsp;provided by E-Government National Centre and managed by Food Safety &amp; Quality Control Division, Public Health Services under&nbsp;Ministry of Health which allows the importer to register their food products at any time without having to submit their application physically to the Office.</p>\r\n', ''),
(12, 'Pre-Employment Health Assessment - Foreign', 'Health & Safety', '<p>This Form is provided by&nbsp;the Ministry of Health.</p>\r\n', ''),
(13, 'Application for Builders License, Contractor and Supplier Registration', 'House, Land & Environment', '<p>This service is provided by the AUthority for Building Control Construction (ABCI)&nbsp;under the Ministry of Development.&nbsp;</p>\r\n', ''),
(14, 'Application For Land Ownership Transfer', 'House, Land & Environment', '<p>This Form is provided by&nbsp;the Lands Department, Ministry of Development.</p>\r\n', ''),
(15, 'Application form for the Use of Football Field and Futsal Court', 'House, Land & Environment', '<p>This Form is provided by&nbsp;the Department of Environment, Parks&nbsp;&amp; Recreation ,Ministry of Development.</p>\r\n', ''),
(16, 'Housing Loan Repayment ', 'House, Land & Environment', '<p>This service is provided by Housing Development Department&nbsp;under the Ministry of Development.</p>\r\n', ''),
(17, 'Map Purchase', 'House, Land & Environment', '<p>This service is provided by&nbsp; Survey Department under the Ministry of Development.<br />\r\nSurvey department offers products/services such as:-</p>\r\n\r\n<ul>\r\n	<li>&nbsp;&nbsp;&nbsp; RSO Digital</li>\r\n	<li>&nbsp;&nbsp;&nbsp; Certified Plan</li>\r\n	<li>&nbsp;&nbsp;&nbsp; Gazette Plan</li>\r\n	<li>&nbsp;&nbsp;&nbsp; Temporarily Occupied Land (TOL) Plan</li>\r\n	<li>&nbsp;&nbsp;&nbsp; Strata Plan</li>\r\n	<li>&nbsp;&nbsp;&nbsp; Topography Plan</li>\r\n	<li>&nbsp;&nbsp;&nbsp; Mukim and Kampung Boundary Books</li>\r\n	<li>&nbsp;&nbsp;&nbsp; Survey Info</li>\r\n	<li>&nbsp;&nbsp;&nbsp; Coordinate</li>\r\n	<li>&nbsp;&nbsp;&nbsp; Field Book</li>\r\n	<li>&nbsp;&nbsp;&nbsp; Map Series</li>\r\n</ul>\r\n', ''),
(18, 'Application for the tree marking in logging area', 'House, Land & Environment', '<p>This service is provided by Forestry Department&nbsp;under the Ministry of Primary Resources and Tourism.</p>\r\n', ''),
(19, 'Written Notification', 'House, Land & Environment', '<p><span style=\"background-color:#ffffff\"><span style=\"background-color:#ffffff\">This service is provided by&nbsp;</span><span style=\"background-color:#ffffff\">Department of Environment, Parks and Recr</span><span style=\"background-color:#ffffff\">eation</span><span style=\"background-color:#ffffff\">&nbsp;under the Ministry of Development.&nbsp;</span></span></p>\r\n\r\n<p><span style=\"background-color:#ffffff\"><span style=\"background-color:#ffffff\">A</span>s per stipulated in the Environmental Protection and Management Order (EPMO) , 2016, it shall be the duty of every person, who intends to carry out the prescribed activity set out in the First Schedule, to submit a Written Notification to the Authority before he undertakes such activity.&nbsp;.</span>&nbsp;</p>\r\n', ''),
(20, 'Application for Billboards, Signage, Banners or Advertisements', 'House, Land & Environment', '<p>This service is&nbsp;provided by Authority of Building Control and Industrial Development (ABCi) under the Ministry of Development.&nbsp;All advertisements, billboards and signboards must be obtained prior permission before installing.</p>\r\n', ''),
(21, 'Application for Halal Certificate/Halal Permit', 'Religious Affairs', '<p>Under the <a href=\"http://www.kheu.gov.bn/SiteCollectionDocuments/Pautan%20Pilihan/BKMH/Halal%20Certificate%20and%20Halal%20Label%20Amendment%20Order%202017.pdf\" target=\"_blank\">Halal Certificate and Label Order Amendment 2017</a>, it is now required for all businesses in Brunei producing, supplying and serving food and beverages to obtain Halal certification, either a Halal Permit (Label) or a Halal Certificate. Failure to comply will result in a fine of less than BND8,000 and/or face two years in jail.</p>\r\n\r\n<p>This service is provided by the Halal Food Control Division under the Ministry of Religious Affairs. This service is&nbsp;for businesses&nbsp;who manufacture or produce food products or any item that is orally consumed (including medicine and supplements) for supply and distribution.</p>\r\n', ''),
(22, 'Haj Medical Inspection Form', 'Religious Affairs', '<p>This Form is provided by&nbsp;the Ministry of Religious Affairs.</p>\r\n', ''),
(23, 'Application for Qiblat Direction', 'Religious Affairs', '<p>This service is provided by Survey Department under the&nbsp;Ministry of Development.</p>\r\n', '<p><strong>&nbsp;Public</strong></p>\r\n\r\n<ul>\r\n	<li>&nbsp;&nbsp;&nbsp; Fill in form UKUR073 and submit to the counter at 2nd floor, Survey Department.</li>\r\n	<li>&nbsp;&nbsp;&nbsp; Payment at the counter 2nd floor, Survey Department.</li>\r\n	<li>&nbsp;&nbsp;&nbsp; Application for qiblat direction will be put on queue.</li>\r\n</ul>\r\n\r\n<p><strong>Group</strong></p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp; Fill in form UKUR073 and submit to the counter at 2nd floor, Survey Department.<br />\r\n&nbsp;&nbsp;&nbsp; Payment at the counter 2nd floor, Survey Department.</p>\r\n\r\n<ul>\r\n	<li>&nbsp;&nbsp;&nbsp; Maximum 10 houses per application.</li>\r\n	<li>&nbsp;&nbsp;&nbsp; Must have recommendation from Ketua Kampung / Penghulu.</li>\r\n	<li>&nbsp;&nbsp;&nbsp; Houses must be close in proximity.</li>\r\n</ul>\r\n\r\n<p><strong>Government Agencies / Private Sector</strong></p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp; Government Agencies</p>\r\n\r\n<ul>\r\n	<li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Application via Memorandum and state the Vote Number for payment process.</li>\r\n</ul>\r\n\r\n<p>&nbsp;&nbsp;&nbsp; Private Sector</p>\r\n\r\n<ul>\r\n	<li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Fill in form UKUR073 and submit to the counter at 2nd floor, Survey Department.</li>\r\n	<li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Payment at the counter 2nd floor, Survey Department.</li>\r\n</ul>\r\n\r\n<p><strong>Construction of Mosque, Surau &amp; Balai Ibadat (Phase III)</strong></p>\r\n\r\n<ul>\r\n	<li>&nbsp;&nbsp;&nbsp; Fill in form UKUR080.</li>\r\n	<li>&nbsp;&nbsp;&nbsp; Memorandum which states the Vote Number for payment process.</li>\r\n</ul>\r\n\r\n<p>NOTE : Payment will be exempted for the less fortunate and new converts.</p>\r\n'),
(24, 'Register for the Arabic School Candidate Selection Examination', 'Religious Affairs', '<p>Through the Islamic Studies Department under the Ministry of Religious Affairs,&nbsp; Arabic schools offers students the advantage of receiving religious education in Arabic language together with the national curriculum. The list of Arabic schools can be found here.</p>\r\n\r\n<p>This service is for parents to register their children to sit for the Arabic School Candidate Selection Examination (PCKSA).</p>\r\n', ''),
(25, 'Application of Change of Motor Vehicle Ownership', 'Transportation', '<p>This services is provided by&nbsp;the Land Transport Department under&nbsp;Ministry of Transport and Infocommunications.</p>\r\n', ''),
(26, 'Renewal of Driving License', 'Transportation', '<p>This service is&nbsp;provided by Land Transport Department, Ministry of Transport and Infocommunications.</p>\r\n', ''),
(27, 'Application for Exemption Certificate / Letter of Dispensation / Extension of Certificate / Postpone', 'Transportation', '<p>This Form is provided by Maritime and Port Authority of Brunei Darussalam.</p>\r\n', ''),
(28, 'Renewal of Vehicle License', 'Transportation', '<p>This service is&nbsp;provided by Land Transport Department, Ministry of Transport and Infocommunications.</p>\r\n', ''),
(29, 'Search for Licence and Road Tax', 'Transportation', '<p><span style=\"font-family:montserrat,sans-serif; font-size:14.4px\">This service is&nbsp;provided by Land Transport Department, Ministry of Transport and Infocommunications</span><span style=\"font-family:montserrat,sans-serif; font-size:14.4px\">.</span></p>\r\n', ''),
(30, 'Demerit Points System (SiKAP) Appeal', 'Transportation', '<p>This service, provided by Land Transport Department, Ministry of Transport and Infocommunications.</p>\r\n', ''),
(31, 'Application for a Copy of Birth Certificate', 'Immigration & Travel', '<p>This services is provided by&nbsp;the Immigration and National Registration Department under&nbsp;Ministry of Home Affairs.</p>\r\n', ''),
(32, 'Visa Application', 'Immigration & Travel', '<p>This service is provided by Department of Protocol and COnsular Affairs under&nbsp;&nbsp;the Ministry of Foreign Affairs &nbsp;for &nbsp;the application of&nbsp;Visa.</p>\r\n', ''),
(33, 'Application for Yellow Identity Card', 'Immigration & Travel', '<p>This services is provided by&nbsp;the Immigration and National Registration Department under&nbsp;Ministry of Home Affairs.</p>\r\n', ''),
(34, 'Application of Registration of Death', 'Immigration & Travel', '<p>This service is provided by the Immigration and National Registration Department, Ministry of Home Affairs. (MOHA). Application for Registration of Death Certificate is intended to obtain Death Certificate for Insurance Demand, Distribution of Estate, Marriage and Others.</p>\r\n', ''),
(35, 'Application to obtain student pass', 'Immigration & Travel', '<p>This service is provided by&nbsp;Department of Immigration and National Registration under the&nbsp;Ministry of Home Affairs (MOHA) to enable foreign citizens to apply for student pass.&nbsp;&nbsp;</p>\r\n', ''),
(36, 'Admission to Universiti Teknologi Brunei (UTB)', 'Education & Learning', '<p>Universiti Teknologi Brunei (UTB) is an engineering and technology university in Brunei Darussalam that specializes in the niche areas of engineering, business and computing.</p>\r\n\r\n<p>This service allows prospective students to apply for a place to study in UTB. This is an online service and will only open during admission openings.</p>\r\n', ''),
(37, 'Application for Brunei Darussalam Government Scholarships for Foreign Students', 'Education & Learning', '<p>This service is provided by Administration Department under&nbsp;the Ministry of Foreign Affairs&nbsp;for application of Brunei Government Scholarships for Foreign Students.&nbsp;</p>\r\n', ''),
(38, 'Application for Admission of a Child to a Government / Private School', 'Education & Learning', '<p>This Form is provided by&nbsp;the Ministry of Education.</p>\r\n', ''),
(39, 'Application Form to enter Primary Schools in Brunei Darussalam', 'Education & Learning', '<p>This Form is provided by&nbsp;the Ministry of Education.</p>\r\n', ''),
(40, 'Higher Education Programmes via HECAS Form', 'Education & Learning', '<p>This service, provided by Ministry of Education allows students to apply on-line to the local higher education institutions or the Scholarship Section through any computers with internet access.</p>\r\n', ''),
(41, 'Application for Early Entry of Schools', 'Education & Learning', '<p>This Form is provided by&nbsp;the Ministry of Education.</p>\r\n', ''),
(42, 'Higher Education Programmes via HECAS', 'Education & Learning', '<p>This Form is provided by&nbsp;the Ministry of Education.</p>\r\n', ''),
(43, 'Transfer Between Government Schools', 'Education & Learning', '<p>This Form is provided by&nbsp;the Ministry of Education.</p>\r\n', ''),
(44, 'Registration of New Private Education Institution', 'Education & Learning', '<p><span style=\"background-color:#ffffff\">This service is provided by the Ministry of Education for the S</span>etting up of a Private Education Institution in Negara Brunei Darussalam.&nbsp;</p>\r\n', ''),
(45, 'Government Education Loan Scheme Form', 'Education & Learning', '<p>This Form is provided by&nbsp;the Ministry of Education.</p>\r\n', ''),
(46, 'Application for Accreditation of Courses/Qualifications', 'Education & Learning', '<p>This service is provided by Secretariat of Brunei Darussalam National Accreditation Council under&nbsp;the Ministry of Education for the consideration and evaluation of the status and&nbsp;quality of qualifications awarded by various local and overseas institutions.</p>\r\n', ''),
(47, 'Registration of Board of Governor for Private Institution', 'Education & Learning', '<p>This service is provided by the Ministry of Education for the Setting up of&nbsp;Board of Governors (BOG) in a private educational institution (formal).</p>\r\n', ''),
(48, 'Job Centre Brunei', 'Employment & Labour', '<p>This service,&nbsp;provided by Manpower Policy and Planning Unit (MPPU), Ministry of&nbsp;Energy, Manpower&nbsp;&amp; Industry <span style=\"background-color:#ffffff\">is a&nbsp;web-based platform which&nbsp;provide an online job application experience to jobseekers who wishes to apply for vacancies in the job market.</span></p>\r\n', ''),
(49, 'Apply for job vacancy at Ministry of Foreign Affairs', 'Employment & Labour', '<p>This service is&nbsp;provided by Ministry of Foreign Affairs &nbsp;and it is&nbsp;an online recruitment form for applying job vacancies at&nbsp;MOFA</p>\r\n', ''),
(50, 'TAP Member Forms', 'Employment & Labour', '<p>This service is provided by&nbsp;the Tabung Amanah Pekerja (TAP).</p>\r\n', ''),
(51, 'Application for Old Oge Pension', 'Family & Social Welfare', '<p>This service is&nbsp;provided by Department of Community Development (JAPEM), Ministry of Culture, Youth &amp; Sports.</p>\r\n', ''),
(52, 'Complaints for Social Case', 'Family & Social Welfare', '<p>This service, provided by Department of Community Development (JAPEM), Ministry of Culture, Youth &amp; Sports.</p>\r\n', ''),
(53, 'Ministry of Foreign Affairs Diplomatic/Consular Identity Card Application.', 'Family & Social Welfare', '<p>This service is provided by the Ministry of Foreign Affairs &nbsp;for &nbsp;the application of diplomatic/consular Identity Card.</p>\r\n', ''),
(54, 'Counselling Services', 'Family & Social Welfare', '<p>This service, provided by Department of Community Development (JAPEM), Ministry of Culture, Youth &amp; Sports.</p>\r\n', ''),
(55, 'Application to Rent Hall and Equipments at Tutong District', 'Family & Social Welfare', '<p>This Form is provided by&nbsp;the Immigration and National Registration Department, Ministry of Home Affairs.</p>\r\n', ''),
(56, 'Book venues for sports and leisure facilities', 'Family & Social Welfare', '<p>As a Public Private Partnership with Telekom Brunei Berhad (Telbru), the Treasury Department at the Ministry of Finance and Economy&nbsp;has implemented an online Facilities Rental System (FRS) for the public to book venues for sports and leisure facilities.</p>\r\n\r\n<p>Public and sports facilities such as football fields, netball and badminton courts, conference rooms and halls can now be booked and paid for online.</p>\r\n', ''),
(57, 'Application for donation, sponsorship and advertisement', 'Family & Social Welfare', '<p>This service is provided by the Ministry of Home Affairs (MOHA). The collection of donations involving finance, articles, advertisement and sponsorship are governed by the Term Donation Act 1953 (Terms 91).&nbsp; &nbsp;The authority to give permit is the Ministry of Home Affairs in accordance with Donation Act 1953.</p>\r\n', ''),
(58, 'Notification of the arrival of members of diplomatic staff and their families', 'Family & Social Welfare', '<p>This service is provided by Department of Protocol and Consular Affairs under&nbsp;the Ministry of Foreign Affairs &nbsp;for notifying the arrival of members of diplomatic staff and their families</p>\r\n', ''),
(59, 'Become a member of the public library', 'Family & Social Welfare', '<div>his service is for those who are interested to register as a member of the public library at the Language &amp; Literature Bureau. Registration is free.</div>\r\n\r\n<div>&nbsp;</div>\r\n\r\n<div>As a member, you can borrow books at all branches of the Language &amp; Literature Bureau&#39;s libraries across the four districts. You are also allowed to borrow five (5) books at a time for fourteen (14) days and three (3) days for past year exam papers</div>\r\n', ''),
(60, 'Application for Certification of Products', 'Law', '<p>This service is provided by Fire and Rescue Department&nbsp;under the Ministry of Home Affairs for the&nbsp;registration of import permit of fire safety products such as Fire Alarm Systems, Fire Extinguishers, and Fire Hose Reels.</p>\r\n', ''),
(61, 'e-Filing (Electronic Filing System (EFS))', 'Law', '<p>This service is provided by the State Judiciary under Prime Minister&#39;s Office. The e-Filing Portal is an initiative of the Brunei Judiciary and has been designed to serve as a one-stop portal for the legal community to gain access to all its needs ranging from registration of cases, filing of case documents, retrieval of service document right down to searching of case files and information including case schedules.</p>\r\n\r\n<p><br />\r\nPreviously lawyers have to call the registrar for the status of their case filing. Now the e-Filing portal will send notification of any case filing status to the lawyers&#39; email immediately upon successful registration in the e-Filing System.</p>\r\n', '');

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
(4, 'data/img/slideshow/SPA_WEBSITE_BANNER_NEW-01-01-01-01.jpg', 'Suruhjaya Perkhidmatan Awam', 'Shahril3001.SR@gmail.com', '2022-09-25 07:05:44'),
(6, 'data/img/slideshow/Maulud Nabi.png', 'Maulud Nabi Muhammad SAW', 'Shahril3001.SR@gmail.com', '2022-11-03 06:53:26'),
(9, 'data/img/slideshow/EGuide_BM.jpg.png', 'Brunei Tourism', 'Shahril3001.SR@gmail.com', '2022-11-03 01:32:52'),
(10, 'data/img/slideshow/hpc-healthy-eating-banner.png', 'Healthy Eat Programme', 'Shahril3001.SR@gmail.com', '2022-11-03 01:33:14'),
(11, 'data/img/slideshow/wawasan-brunei-2035.png', 'Wawasan Brunei 2035', 'Shahril3001.SR@gmail.com', '2022-11-03 01:33:32');

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
-- Indexes for table `complaints`
--
ALTER TABLE `complaints`
  ADD PRIMARY KEY (`complaintID`);

--
-- Indexes for table `complaintsbehalf`
--
ALTER TABLE `complaintsbehalf`
  ADD PRIMARY KEY (`behalfComplaintID`);

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
  MODIFY `citizenID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `complaints`
--
ALTER TABLE `complaints`
  MODIFY `complaintID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `complaintsbehalf`
--
ALTER TABLE `complaintsbehalf`
  MODIFY `behalfComplaintID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedbackID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `service_category`
--
ALTER TABLE `service_category`
  MODIFY `categoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `service_list`
--
ALTER TABLE `service_list`
  MODIFY `listID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `slideshow`
--
ALTER TABLE `slideshow`
  MODIFY `slideshowID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
