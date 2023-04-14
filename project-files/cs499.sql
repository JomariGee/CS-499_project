-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2023 at 04:47 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cs499`
--

-- --------------------------------------------------------

/*cost: 
0 = none
1 = $
2 = $$
3 = $$$
4 = $$$$ */

/*impact:
0 = "low"
1 = "medium"
2 = "high" */


/*complexity:
0 = "low"
1 = "medium"
2 = "high" */

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `categoryID` int(11) NOT NULL,
  `category_desc` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`categoryID`, `category_desc`) VALUES
(1, 'Account Security'),
(2, 'Data Security'),
(3, 'Device Security'),
(4, 'Governance and Training'),
(5, 'Other'),
(6, 'Response and Recovery'),
(7, 'Supply Chain / Third Party'),
(8, 'Vulnerability Management');

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `fileID` int(11) NOT NULL,
  `fileLocation` varchar(255) DEFAULT NULL,
  `goalID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `goal`
--

CREATE TABLE `goal` (
  `goalID` int(11) NOT NULL,
  `goalTitle` varchar(255) DEFAULT NULL,
  `status_updateID` int(11) DEFAULT NULL,
  `cost` int(11) DEFAULT NULL,
  `impact` int(11) DEFAULT NULL,
  `complexity` int(11) DEFAULT NULL,
  `categoryID` int(11) DEFAULT NULL,
  `csf` varchar(255) DEFAULT NULL,
  `assessment_date` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `goal`
--

INSERT INTO `goal` (`goalID`, `goalTitle`, `status_updateID`, `cost`, `impact`, `complexity`, `categoryID`, `csf`, `assessment_date`) VALUES
(1, ' Incident Reporting', 1, 1, 2, 0, 6, 'RS.CO-2, RS.CO-4', 'N/A'),
(2, 'Asset Inventory', 1, 2, 2, 1, 1, 'ID.AM-1', 'N/A'),
(3, 'Basic Cybersecurity Training', 1, 1, 2, 0, 3, 'PR.AT-1', 'N/A'),
(4, 'Changing Default Passwords', 1, 1, 1, 1, 0, 'PR.AC-1', 'N/A'),
(5, 'Deploy Security.txt Files', 1, 1, 2, 0, 4, 'RS.AN-5', 'N/A'),
(6, 'Detecting Relevant Threats and TTPs', 1, 3, 1, 2, 7, 'ID.RA-3, DE.CM-1', 'N/A'),
(7, 'Detection of Unsuccessful (Automated) Login Attempts', 1, 1, 1, 0, 0, 'PR.AC-7', 'N/A'),
(8, 'Disable Macros by Default', 1, 1, 1, 0, 1, 'PR.IP-1, PR.IP-3', 'N/A'),
(9, 'Document Device Configurations', 1, 2, 2, 1, 1, 'PR.IP-1', 'N/A'),
(10, 'Document Network Topology', 1, 2, 1, 1, 6, 'PR.IP-1', 'N/A'),
(11, 'Email Security', 1, 1, 1, 0, 7, 'PR.DS-1, PR.DS-2, PR.DS-5', 'N/A'),
(12, 'Hardware and Software Approval Process', 1, 2, 2, 1, 1, 'PR.IP-3', 'N/A'),
(13, 'Improving IT and OT Cybersecurity Relationships', 1, 1, 1, 0, 3, 'ID.GV-2', 'N/A'),
(14, 'Incident Response (IR) Plans', 1, 1, 2, 0, 6, 'PR.IP-9, PR.IP-10', 'N/A'),
(15, 'Limit OT Connections to Public Internet', 1, 3, 1, 1, 4, 'PR.PT-4', 'N/A'),
(16, 'Log Collection', 1, 2, 2, 1, 2, 'PR.PT-1', 'N/A'),
(17, 'Minimum Password Strength', 1, 1, 2, 0, 0, 'PR.AC-1', 'N/A'),
(18, 'Mitigating Known Vulnerabilities', 1, 1, 2, 1, 4, 'PR.IP-12, ID.RA-1, DE.CM-8, RS.MI-3', 'N/A'),
(19, 'Multi-Factor Authentication (MFA)', 1, 2, 2, 1, 0, 'PR.AC-7', 'N/A'),
(20, 'Network Segmentation', 1, 3, 2, 2, 7, 'PR.AC-5, PR.PT-4, DE.CM-1', 'N/A'),
(21, 'No Exploitable Services on the Internet', 1, 1, 2, 0, 4, 'PR.PT-4', 'N/A'),
(22, 'Organizational Cybersecurity Leadership', 1, 1, 2, 0, 3, 'ID.GV-1, ID.GV-2', 'N/A'),
(23, 'OT Cybersecurity Leadership', 1, 1, 2, 0, 3, 'ID.GV-1, ID.GV-2', 'N/A'),
(24, 'OT Cybersecurity Training', 1, 1, 2, 0, 3, 'PR.AT-2, PR.AT-3, PR.AT-5', 'N/A'),
(25, 'Prohibit Connection of Unauthorized Devices', 1, 3, 2, 2, 1, 'PR.PT-2', 'N/A'),
(26, 'Revoking Credentials for Departing Employees', 1, 1, 1, 0, 0, 'PR.AC-1', 'N/A'),
(27, 'Secure Log Storage', 1, 3, 2, 0, 2, 'PR.PT-1', 'N/A'),
(28, 'Secure Sensitive Data', 1, 2, 2, 1, 2, 'PR.DS-1, PR.DS-2, PR.DS-5', 'N/A'),
(29, 'Separating User and Privileged Accounts', 1, 1, 2, 0, 0, 'PR.AC-4', 'N/A'),
(30, 'Strong and Agile Encryption', 1, 2, 2, 1, 2, 'PR.DS-1, PR.DS-2', 'N/A'),
(31, 'Supply Chain Incident Reporting', 1, 1, 2, 0, 5, 'ID.SC-1, ID.SC-3', 'N/A'),
(32, 'Supply Chain Vulnerability Disclosure', 1, 1, 2, 0, 5, 'ID.SC-1, ID.SC-3', 'N/A'),
(33, 'System Back Ups', 1, 2, 2, 1, 6, 'PR.IP-4', 'N/A'),
(34, 'Third-Party Validation of Cybersecurity Control Effectiveness', 1, 3, 2, 2, 4, 'ID.RA-1, ID.RA-3', 'N/A'),
(35, 'Unique Credentials', 1, 2, 1, 1, 0, 'PR.AC-1', 'N/A'),
(36, 'Vendor/Supplier Cybersecurity Requirements', 1, 1, 2, 0, 5, 'ID.SC-3', 'N/A'),
(37, 'Vulnerability Disclosure/Reporting', 1, 3, 0, 2, 4, 'RS.AN-5', 'N/A');

-- --------------------------------------------------------

--
-- Table structure for table `goal_risk`
--

CREATE TABLE `goal_risk` (
  `goalRiskID` int(10) NOT NULL,
  `riskID` int(10) DEFAULT NULL,
  `goalID` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `goal_risk`
--

INSERT INTO `goal_risk` (`goalRiskID`, `riskID`, `goalID`) VALUES
(1, 0, 0),
(2, 1, 0),
(3, 2, 0),
(4, 3, 0),
(5, 5, 1),
(6, 6, 1),
(7, 4, 2),
(8, 8, 2),
(9, 9, 2),
(10, 6, 2),
(11, 10, 2),
(12, 0, 3),
(13, 1, 3),
(14, 2, 3),
(15, 3, 3),
(16, 7, 4),
(17, 7, 5),
(18, 0, 5),
(19, 7, 6),
(20, 11, 7),
(21, 12, 7),
(22, 13, 7),
(23, 14, 7),
(24, 15, 8),
(25, 16, 8),
(26, 12, 9),
(27, 16, 9),
(28, 12, 10),
(29, 17, 10),
(30, 18, 10),
(31, 12, 11),
(32, 19, 11),
(33, 20, 12),
(34, 0, 13);

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `noteID` int(11) NOT NULL,
  `note_desc` varchar(255) DEFAULT NULL,
  `goalID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `recommendedaction`
--

CREATE TABLE `recommendedaction` (
  `recActionID` int(11) NOT NULL,
  `recAction_desc` varchar(255) DEFAULT NULL,
  `IT_desc` varchar(255) DEFAULT NULL,
  `OT_desc` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ref`
--

CREATE TABLE `ref` (
  `referencesID` int(11) NOT NULL,
  `ref_Title` varchar(255) DEFAULT NULL,
  `ref_purpose` varchar(255) DEFAULT NULL,
  `ref_link` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `risk`
--

CREATE TABLE `risk` (
  `riskID` int(11) NOT NULL,
  `risk_desc` varchar(255) DEFAULT NULL,
  `risk_link` varchar(255) DEFAULT NULL,
  `goalID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `statusID` int(11) NOT NULL,
  `status_desc` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`statusID`, `status_desc`) VALUES
(1, 'Not Started'),
(2, 'Scoped'),
(3, 'In Progress'),
(4, 'Implemented');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`categoryID`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`fileID`);

--
-- Indexes for table `goal`
--
ALTER TABLE `goal`
  ADD PRIMARY KEY (`goalID`);

--
-- Indexes for table `goal_risk`
--
ALTER TABLE `goal_risk`
  ADD PRIMARY KEY (`goalRiskID`);

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`noteID`);

--
-- Indexes for table `recommendedaction`
--
ALTER TABLE `recommendedaction`
  ADD PRIMARY KEY (`recActionID`);

--
-- Indexes for table `ref`
--
ALTER TABLE `ref`
  ADD PRIMARY KEY (`referencesID`);

--
-- Indexes for table `risk`
--
ALTER TABLE `risk`
  ADD PRIMARY KEY (`riskID`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`statusID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
