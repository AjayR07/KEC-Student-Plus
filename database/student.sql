-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 23, 2020 at 09:36 AM
-- Server version: 10.4.13-MariaDB-log
-- PHP Version: 7.3.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `student`
--

-- --------------------------------------------------------

--
-- Table structure for table `eventinfo`
--

CREATE TABLE `eventinfo` (
  `eventid` varchar(15) NOT NULL,
  `name` varchar(30) NOT NULL,
  `staff` varchar(30) NOT NULL,
  `staffid` varchar(15) NOT NULL,
  `date` date NOT NULL,
  `description` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `eventinfo`
--

INSERT INTO `eventinfo` (`eventid`, `name`, `staff`, `staffid`, `date`, `description`) VALUES
('ER1506341', '', '', '', '2020-06-22', ''),
('ER1506361', '䅭', '', '', '2020-06-27', ''),
('ER1506551', '䉬', '', '', '2020-06-18', ''),
('ER1506746', '', 'L', '', '2020-06-23', ''),
('ER1506965', '卷', '', '', '2020-06-16', ''),
('ER1606871', '', '', '', '2020-06-17', '卡');

-- --------------------------------------------------------

--
-- Table structure for table `noncertinfo`
--

CREATE TABLE `noncertinfo` (
  `appno` varchar(16) NOT NULL,
  `day` int(11) NOT NULL,
  `hrs` varchar(20) NOT NULL,
  `reason` varchar(50) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `noncertinfo`
--

INSERT INTO `noncertinfo` (`appno`, `day`, `hrs`, `reason`, `total`) VALUES
('NC0CSE000030721', 1, '1,2,3,4', 'Comment', 4),
('NC0CSE000070739', 1, '1,2,5,6,7', 'Sample', 5),
('NC18CSE007290689', 1, '2,3,5,6', 'hjklkk', 4);

-- --------------------------------------------------------

--
-- Table structure for table `noncertod`
--

CREATE TABLE `noncertod` (
  `appno` varchar(16) NOT NULL,
  `regno` varchar(8) NOT NULL,
  `appdate` date NOT NULL,
  `need` varchar(100) NOT NULL,
  `appfacty` varchar(30) NOT NULL,
  `activity` varchar(25) NOT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL,
  `nodays` int(11) NOT NULL,
  `advisor` varchar(20) NOT NULL DEFAULT 'Pending',
  `yearin` varchar(20) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `noncertod`
--

INSERT INTO `noncertod` (`appno`, `regno`, `appdate`, `need`, `appfacty`, `activity`, `start`, `end`, `nodays`, `advisor`, `yearin`) VALUES
('NC0CSE000030721', '20CSR000', '2020-07-03', 'NA', 'Latha - CSE', 'Youth Red Cross', '2020-07-04', '2020-07-04', 1, 'Pending', 'Pending'),
('NC0CSE000070739', '20CSR000', '2020-07-07', 'NA', 'Suganthe', 'Self Development Club', '2020-07-08', '2020-07-08', 1, 'Pending', 'Pending'),
('NC18CSE007290689', '18CSR007', '2020-06-29', 'NA', 'hcbdnf', 'Pasumai Vanam', '2020-06-30', '2020-06-30', 1, 'Approved', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `oddetails`
--

CREATE TABLE `oddetails` (
  `appno` varchar(25) NOT NULL,
  `regno` varchar(8) NOT NULL,
  `appdate` date NOT NULL,
  `odtype` varchar(25) NOT NULL,
  `title` varchar(25) NOT NULL,
  `odfrom` date NOT NULL,
  `odto` date NOT NULL,
  `hrs` varchar(8) NOT NULL,
  `college` varchar(40) NOT NULL,
  `state` varchar(25) NOT NULL,
  `purpose` varchar(80) NOT NULL,
  `status` varchar(15) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `oddetails`
--

INSERT INTO `oddetails` (`appno`, `regno`, `appdate`, `odtype`, `title`, `odfrom`, `odto`, `hrs`, `college`, `state`, `purpose`, `status`) VALUES
('00CSE000230643', '20CSR000', '2020-06-23', 'PAPER', 'Big Data', '2020-07-07', '2020-07-09', 'full', 'Kumaraguru College of Tech', 'TAMILNADU', 'NIL', 'Pending'),
('0CSE000070798', '20CSR000', '2020-07-07', 'PAPER', 'Big Data', '2020-07-07', '2020-07-07', 'full', 'Kongu Engineering College (Autonomous)', 'TAMILNADU', 'NIL', 'Pending'),
('0CSE000230697', '20CSR000', '2020-06-23', 'SPORT', 'Yoga', '2020-07-07', '2020-07-09', 'full', 'KEC', 'TAMILNADU', 'NIL', 'Pending'),
('18CSE002210654', '18CSR002', '2020-06-21', 'SPORT', 'Yoga Competition', '2020-07-07', '2020-07-09', 'full', 'KEC', 'TAMILNADU', 'NIL', 'Pending'),
('18CSE007290619', '18CSR007', '2020-06-29', 'HACKATHON', 'Talent show', '2020-07-07', '2020-07-09', 'full', 'University college of Engineering', 'OTHERSTATE', 'NIL', 'Pending'),
('18CSE007290649', '18CSR007', '2020-06-29', 'PROJECT', 'GMS', '2020-07-07', '2020-07-09', 'full', 'University college of Engineering', 'TAMILNADU', 'NIL', 'Pending'),
('18CSE007290665', '18CSR007', '2020-06-29', 'HACKATHON', 'BasketBall', '2020-07-07', '2020-07-09', 'full', 'University college of Engineering', 'TAMILNADU', 'NIL', 'Pending'),
('18CSE007290674', '18CSR007', '2020-06-29', 'Singing', 'Karnatic', '2020-07-07', '2020-07-09', '2 hours', 'University college of Engineering', 'TAMILNADU', 'NIL', 'Pending'),
('18CSE007290681', '18CSR007', '2020-06-29', 'Workshop', 'GMS', '2020-07-07', '2020-07-09', 'half', 'Anna university', 'TAMILNADU', 'NIL', 'Pending'),
('18CSE008290650', '18CSR008', '2020-06-29', 'HACKATHON', 'SAMPLE_FORMAT_WEBSITE', '2020-07-07', '2020-07-09', 'full', 'Kongu Engineering College (Autonomous)', 'TAMILNADU', 'NIL', 'Approved'),
('18CSE008290659', '18CSR008', '2020-06-29', 'HACKATHON', 'SAMPLE_FORMAT_WEBSITE', '2020-07-07', '2020-07-09', 'full', 'University college of Engineering', 'TAMILNADU', 'NIL', 'Pending'),
('18CSE014290626', '18CSR014', '2020-06-29', 'PAPER', 'Sample', '2020-07-07', '2020-07-09', 'full', 'Kongu Engineering College (Autonomous)', 'TAMILNADU', 'NIL', 'Approved'),
('18CSE014290639', '18CSR014', '2020-06-29', 'PROJECT', 'Samp', '2020-07-07', '2020-07-09', 'full', 'Kongu Engineering College (Autonomous)', 'TAMILNADU', 'NIL', 'Pending'),
('18CSE030070732', '18CSR030', '2020-07-07', 'HACKATHON', 'Hackathon', '2020-07-07', '2020-07-09', 'full', 'Anna university', 'TAMILNADU', 'NIL', 'Pending'),
('18CSE030290652', '18CSR030', '2020-06-29', 'SPORT', 'Basketball ', '2020-07-07', '2020-07-09', 'full', 'Anna university', 'TAMILNADU', 'NIL', 'Declined'),
('18CSE030290697', '18CSR030', '2020-06-29', 'SPORT', 'Basketball ', '2020-07-07', '2020-07-09', 'full', 'Anna university', 'TAMILNADU', 'NIL', 'Pending'),
('18CSE033290665', '18CSR033', '2020-06-29', 'PROJECT', 'Incentive techbin', '2020-07-07', '2020-07-09', 'full', 'Kongu Engineering College (Autonomous)', 'TAMILNADU', 'NIL', 'Approved'),
('18CSE050290639', '18CSR050', '2020-06-29', 'PAPER', 'Digital Jwellery', '2020-07-07', '2020-07-09', 'full', 'Kongu Engineering College (Autonomous)', 'TAMILNADU', 'NIL', 'Pending'),
('18CSE050290696', '18CSR050', '2020-06-29', 'PAPER', 'Digital Jwellery', '2020-07-07', '2020-07-09', 'full', 'Coimbatore Institute of Technology', 'TAMILNADU', 'NIL', 'Approved'),
('18CSE061210627', '18CSR061', '2020-06-21', 'PAPER', 'Big Data', '2020-07-07', '2020-07-09', 'full', 'Kongu Engineering College', 'TAMILNADU', 'NIL', 'Pending'),
('18CSE078290669', '18CSR078', '2020-06-29', 'CODING', 'big data', '2020-07-07', '2020-07-09', 'full', 'Ariyalur Engineering college', 'TAMILNADU', 'NIL', 'Approved'),
('18CSE085290649', '18CSR085', '2020-06-29', 'PAPER', 'Edge', '2020-07-07', '2020-07-09', 'full', 'Kongu Engineering College (Autonomous)', 'TAMILNADU', 'NIL', 'Pending'),
('18CSE085290689', '18CSR085', '2020-06-29', 'HACKATHON', 'Hackathon', '2020-07-07', '2020-07-09', 'full', 'Kongu Engineering College (Autonomous)', 'TAMILNADU', 'NIL', 'Approved'),
('18CSE120290619', '18CSR120', '2020-06-29', 'PAPER', 'Paper', '2020-07-07', '2020-07-09', 'full', 'Mec Engineering College', 'OTHERSTATE', 'NIL', 'Pending'),
('19CSE002290684', '19CSR002', '2020-06-29', 'PROJECT', '1styear', '2020-07-07', '2020-07-09', 'full', 'Kongu Engineering College (Autonomous)', 'TAMILNADU', 'NIL', 'Approved'),
('19CSE019290654', '19CSR019', '2020-06-29', 'PAPER', 'Nana tech', '2020-07-07', '2020-07-09', 'full', 'University college of Engineering', 'TAMILNADU', 'NIL', 'Approved'),
('19CSE047290639', '19CSR047', '2020-06-29', 'SPORT', 'Table Tennis', '2020-07-07', '2020-07-09', 'full', 'Apollo Engineering College', 'TAMILNADU', 'NIL', 'Approved'),
('19CSE055290678', '19CSR055', '2020-06-29', 'Workshop', 'Big Data', '2020-07-07', '2020-07-09', 'full', 'Anna university', 'TAMILNADU', 'NIL', 'Approved');

-- --------------------------------------------------------

--
-- Table structure for table `othercert`
--

CREATE TABLE `othercert` (
  `appno` varchar(25) NOT NULL,
  `regno` varchar(8) NOT NULL,
  `appdate` date NOT NULL,
  `type` varchar(25) NOT NULL,
  `title` varchar(25) NOT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL,
  `days` varchar(8) NOT NULL,
  `cname` varchar(40) NOT NULL,
  `state` varchar(25) NOT NULL,
  `purpose` varchar(80) NOT NULL,
  `file` varchar(50) NOT NULL,
  `status` varchar(15) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `othercert`
--

INSERT INTO `othercert` (`appno`, `regno`, `appdate`, `type`, `title`, `start`, `end`, `days`, `cname`, `state`, `purpose`, `file`, `status`) VALUES
('CR18CSE030070739', '18CSR030', '2020-07-07', 'WORKSHOP', 'ML', '2020-07-07', '2020-07-07', '1', 'KEC', 'Inside Tamilnadu', 'To bloom  in the field of ML', 'CR18CSR030_WORKSHOP_07JUL_1269.pdf', 'Pending'),
('CR18CSE092290631', '18CSR092', '2020-06-29', 'WORKSHOP', 'ML', '2020-06-29', '2020-06-29', '1', 'Kongu Engineering College', 'Inside Tamilnadu', 'To get better knowledge in ML', 'CR18CSR092_WORKSHOP_29JUN_4384.pdf', 'Approved'),
('CR18CSE102290626', '18CSR102', '2020-06-29', 'WORKSHOP', 'Iot', '2020-06-29', '2020-06-29', '1', 'Kongu', 'Inside Tamilnadu', 'Summa', 'CR18CSR102_WORKSHOP_29JUN_1033.pdf', 'Approved'),
('CR18CSE120290624', '18CSR120', '2020-06-29', 'INTERNSHIP', 'test', '2020-06-17', '2020-06-18', '2', 'Test', 'Inside Tamilnadu', 'test', 'CR18CSR120_INTERNSHIP_29JUN_0386.pdf', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `postod`
--

CREATE TABLE `postod` (
  `appno` varchar(25) NOT NULL,
  `prize` varchar(20) DEFAULT NULL,
  `certificate` varchar(30) DEFAULT NULL,
  `status` varchar(15) DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `postod`
--

INSERT INTO `postod` (`appno`, `prize`, `certificate`, `status`) VALUES
('18CSE008290650', 'PARTICIPATION', '18CSR008__29JUN_3691.pdf', 'Approved'),
('18CSE014290626', 'CONSOLATION', '18CSR014__29JUN_2153.pdf', 'Approved'),
('18CSE030290652', 'PARTICIPATION', '18CSR030__29JUN_4153.pdf', 'Declined'),
('18CSE033290665', 'PARTICIPATION', '18CSR033__29JUN_1237.pdf', 'Approved'),
('18CSE050290696', 'PARTICIPATION', '18CSR050__29JUN_3999.pdf', 'Approved'),
('18CSE078290669', 'PARTICIPATION', '18CSR078__29JUN_2797.pdf', 'Approved'),
('18CSE085290689', 'FIRST', '18CSR085__29JUN_1443.pdf', 'Approved'),
('19CSE002290684', 'SECOND', '19CSR002__29JUN_2043.pdf', 'Approved'),
('19CSE019290654', 'PARTICIPATION', '19CSR019__29JUN_2196.pdf', 'Approved'),
('19CSE047290639', 'PARTICIPATION', '19CSR047__29JUN_2683.pdf', 'Approved'),
('19CSE055290678', 'FIRST', '19CSR055__29JUN_1019.pdf', 'Approved');

-- --------------------------------------------------------

--
-- Table structure for table `preod`
--

CREATE TABLE `preod` (
  `appno` varchar(25) NOT NULL,
  `staff1` varchar(20) DEFAULT NULL,
  `comments1` varchar(50) DEFAULT NULL,
  `status1` varchar(10) DEFAULT NULL,
  `staff2` varchar(20) DEFAULT NULL,
  `comments2` varchar(50) DEFAULT NULL,
  `status2` varchar(10) DEFAULT NULL,
  `staff3` varchar(20) DEFAULT NULL,
  `comments3` varchar(50) DEFAULT NULL,
  `status3` varchar(10) DEFAULT NULL,
  `advisor` varchar(15) NOT NULL DEFAULT 'Pending',
  `yearin` varchar(15) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `preod`
--

INSERT INTO `preod` (`appno`, `staff1`, `comments1`, `status1`, `staff2`, `comments2`, `status2`, `staff3`, `comments3`, `status3`, `advisor`, `yearin`) VALUES
('00CSE000230643', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Approved', 'Approved'),
('0CSE000070798', 'Dr.N.Shanthi', 'Nice', 'Approved', NULL, NULL, NULL, NULL, NULL, NULL, 'Pending', 'Pending'),
('0CSE000230697', 'NA', 'NA', 'Approved', 'NA', 'NA', 'Approved', 'NA', 'NA', 'Approved', 'Approved', 'Approved'),
('18CSE002210654', 'NA', 'NA', 'Approved', 'NA', 'NA', 'Approved', 'NA', 'NA', 'Approved', 'Approved', 'Approved'),
('18CSE007290619', 'NA', 'NA', 'Approved', 'NA', 'NA', 'Approved', 'NA', 'NA', 'Approved', 'Approved', 'Approved'),
('18CSE007290649', 'Dr.R.S.Latha', 'Give ur best', 'Approved', NULL, NULL, NULL, NULL, NULL, NULL, 'Approved', 'Approved'),
('18CSE007290665', 'NA', 'NA', 'Approved', 'NA', 'NA', 'Approved', 'NA', 'NA', 'Approved', 'Approved', 'Approved'),
('18CSE007290674', 'NA', 'NA', 'Approved', 'NA', 'NA', 'Approved', 'NA', 'NA', 'Approved', 'Approved', 'Approved'),
('18CSE007290681', 'NA', 'NA', 'Approved', 'NA', 'NA', 'Approved', 'NA', 'NA', 'Approved', 'Approved', 'Approved'),
('18CSE008290650', 'NA', 'NA', 'Approved', 'NA', 'NA', 'Approved', 'NA', 'NA', 'Approved', 'Approved', 'Approved'),
('18CSE008290659', 'NA', 'NA', 'Approved', 'NA', 'NA', 'Approved', 'NA', 'NA', 'Approved', 'Approved', 'Approved'),
('18CSE014290626', 'Dr.R.S.Latha', 'Good', 'Approved', 'Dr.R.S.Latha', 'nice', 'Approved', 'Dr.R.S.Latha', 'good', 'Approved', 'Approved', 'Approved'),
('18CSE014290639', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Approved', 'Approved'),
('18CSE030070732', 'NA', 'NA', 'Approved', 'NA', 'NA', 'Approved', 'NA', 'NA', 'Approved', 'Approved', 'Approved'),
('18CSE030290652', 'NA', 'NA', 'Approved', 'NA', 'NA', 'Approved', 'NA', 'NA', 'Approved', 'Approved', 'Approved'),
('18CSE030290697', 'NA', 'NA', 'Approved', 'NA', 'NA', 'Approved', 'NA', 'NA', 'Approved', 'Approved', 'Approved'),
('18CSE033290665', 'Dr.R.S.Latha', 'Good', 'Approved', 'Dr.R.S.Latha', 'nice', 'Approved', NULL, NULL, 'Approved', 'Approved', 'Approved'),
('18CSE050290639', NULL, NULL, 'Approved', NULL, NULL, 'Declined', NULL, NULL, NULL, 'Approved', 'Approved'),
('18CSE050290696', NULL, NULL, 'Approved', NULL, NULL, 'Approved', NULL, NULL, 'Approved', 'Approved', 'Approved'),
('18CSE061210627', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Approved', 'Approved'),
('18CSE078290669', 'NA', 'NA', 'Approved', 'NA', 'NA', 'Approved', 'NA', 'NA', 'Approved', 'Approved', 'Approved'),
('18CSE085290649', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Approved', 'Approved'),
('18CSE085290689', 'NA', 'NA', 'Approved', 'NA', 'NA', 'Approved', 'NA', 'NA', 'Approved', 'Approved', 'Approved'),
('18CSE120290619', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Approved', 'Approved'),
('19CSE002290684', NULL, NULL, 'Approved', NULL, NULL, 'Approved', NULL, NULL, 'Approved', 'Approved', 'Approved'),
('19CSE019290654', NULL, NULL, 'Approved', 'Dr.R.S.Latha', 'nice', 'Approved', NULL, 'Approved', 'Approved', 'Approved', 'Approved'),
('19CSE047290639', 'NA', 'NA', 'Approved', 'NA', 'NA', 'Approved', 'NA', 'NA', 'Approved', 'Approved', 'Approved'),
('19CSE055290678', 'NA', 'NA', 'Approved', 'NA', 'NA', 'Approved', 'NA', 'NA', 'Approved', 'Approved', 'Approved');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `regno` varchar(8) NOT NULL,
  `name` varchar(40) NOT NULL,
  `batch` int(11) NOT NULL,
  `dept` varchar(4) NOT NULL,
  `sec` varchar(1) NOT NULL,
  `gender` varchar(7) NOT NULL DEFAULT 'male',
  `mail` varchar(50) NOT NULL,
  `phone` bigint(10) NOT NULL,
  `residence` varchar(13) DEFAULT NULL,
  `pass` varchar(255) DEFAULT NULL,
  `status` varchar(13) NOT NULL DEFAULT 'Not Verified'
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`regno`, `name`, `batch`, `dept`, `sec`, `gender`, `mail`, `phone`, `residence`, `pass`, `status`) VALUES
('16CSR046', 'Dharan Kumar M', 2017, 'CSE', 'A', 'Male', 'dharankumarm.16cse@kongu.edu', 9952376764, NULL, NULL, 'Not Verified'),
('17CSL239', 'Efshiba  V', 2017, 'CSE', 'A', 'Female', 'efshibav.17cse@kongu.edu', 9486671075, NULL, NULL, 'Not Verified'),
('17CSL240', 'Ezhil  Bharathi  P', 2017, 'CSE', 'A', 'Male', 'ezhilbharathip.17cse@kongu.edu', 9095385903, NULL, NULL, 'Not Verified'),
('17CSL241', 'Gowthami  Priya   P', 2017, 'CSE', 'A', 'Female', 'gowthamipriyap.17cse@kongu.edu', 7373007555, NULL, NULL, 'Not Verified'),
('17CSL242', 'Guruprasath   A', 2017, 'CSE', 'A', 'Male', 'guruprasatha.17cse@kongu.edu', 9976902307, NULL, NULL, 'Not Verified'),
('17CSL243', 'Krishnakumar E', 2017, 'CSE', 'B', 'Male', 'Krishnakumare.17cse@kongu.edu', 7540014460, NULL, NULL, 'Not Verified'),
('17CSL244', 'Maniprasanth K', 2017, 'CSE', 'B', 'Male', 'maniprasanthk.17cse@kongu.edu', 9566637969, NULL, NULL, 'Not Verified'),
('17CSL245', 'Mohamed Musamil S', 2017, 'CSE', 'B', 'Male', 'mohamedmusamils.17cse@kongu.edu ', 6379164322, NULL, NULL, 'Not Verified'),
('17CSL246', 'Mohanraj S', 2017, 'CSE', 'B', 'Male', 'mohanrajs.17cse@kongu.edu', 8754286356, NULL, NULL, 'Not Verified'),
('17CSL247', 'Nandhini L', 2017, 'CSE', 'C', 'Female', 'nandhinil.17cse@kongu.edu', 6380930497, NULL, NULL, 'Not Verified'),
('17CSL248', 'Narendran K', 2017, 'CSE', 'C', 'Male', 'narendrank.17cse@kongu.edu', 8883998540, NULL, NULL, 'Not Verified'),
('17CSL249', 'Rahul P', 2017, 'CSE', 'C', 'Male', 'rahulp.17cse@kongu.edu', 9384446788, NULL, NULL, 'Not Verified'),
('17CSL250', 'Saran Raam S', 2017, 'CSE', 'C', 'Male', 'saranraams.17cse@kongu.edu', 9566400099, NULL, NULL, 'Not Verified'),
('17CSL251', 'Sindhu D', 2017, 'CSE', 'C', 'Female', 'sindhud.17cse@kongu.edu', 9488905137, NULL, NULL, 'Not Verified'),
('17CSL252', 'Srimathi C', 2017, 'CSE', 'C', 'Female', 'srimathic.17cse@kongu.edu', 8903817131, NULL, NULL, 'Not Verified'),
('17CSL253', 'Vignesh Raaja M S', 2017, 'CSE', 'D', 'MALE', 'vigneshraajams.17cse@kongu.edu', 9442209694, NULL, NULL, 'Not Verified'),
('17CSL254', 'Vignesh Balaji N', 2017, 'CSE', 'D', 'MALE', 'vigneshbalajin.17cse@kongu.edu', 9344395445, NULL, NULL, 'Not Verified'),
('17CSL255', 'Vikash M', 2017, 'CSE', 'D', 'MALE', 'vikashm.17cse@kongu.edu', 9788336050, NULL, NULL, 'Not Verified'),
('17CSR001', 'Aakash  B', 2017, 'CSE', 'A', 'Male', 'aakashb.17cse@kongu.edu', 9500550135, NULL, NULL, 'Not Verified'),
('17CSR002', 'Abhilash  S', 2017, 'CSE', 'A', 'Male', 'abhilashs.17cse@kongu.edu', 9791900844, NULL, NULL, 'Not Verified'),
('17CSR003', 'Abilash  R', 2017, 'CSE', 'A', 'Male', 'rabilash.17cse@kongu.edu', 9655192873, NULL, NULL, 'Not Verified'),
('17CSR004', 'Abiramee  T', 2017, 'CSE', 'A', 'Female', 'abirameet.17cse@kongu.edu', 9842757308, NULL, NULL, 'Not Verified'),
('17CSR005', 'Abitha  Lakshmi  M', 2017, 'CSE', 'A', 'Female', 'abithalakshmim.17cse@kongu.edu', 9842755503, NULL, NULL, 'Not Verified'),
('17CSR006', 'Aishvarya  B', 2017, 'CSE', 'A', 'Female', 'aishvaryab.17cse@kongu.edu', 9842691067, NULL, NULL, 'Not Verified'),
('17CSR007', 'Ajai  Prakash  V', 2017, 'CSE', 'A', 'Male', 'ajaiprakashv.17cse@kongu.edu', 9655650406, NULL, NULL, 'Not Verified'),
('17CSR008', 'Ajith  V', 2017, 'CSE', 'A', 'Male', 'ajithv.17cse@kongu.edu', 9443315530, NULL, NULL, 'Not Verified'),
('17CSR009', 'Akash  M', 2017, 'CSE', 'A', 'Male', 'makash.17cse@kongu.edu', 9442983647, NULL, NULL, 'Not Verified'),
('17CSR010', 'Anish  Vishakh  R', 2017, 'CSE', 'A', 'Male', 'anishvishakhr.17cse@kongu.edu', 9345733966, NULL, NULL, 'Not Verified'),
('17CSR011', 'Arun  Kumar  P  S', 2017, 'CSE', 'A', 'Male', 'arunkumarps.17cse@kongu.edu', 9944966266, NULL, NULL, 'Not Verified'),
('17CSR012', 'Ashwini  S', 2017, 'CSE', 'A', 'Female', 'ashwinis.17cse@kongu.edu', 9150384258, NULL, NULL, 'Not Verified'),
('17CSR013', 'Avinash  S', 2017, 'CSE', 'A', 'Male', 'avinashs.17cse@kongu.edu', 9443710100, NULL, NULL, 'Not Verified'),
('17CSR014', 'Balaji  S', 2017, 'CSE', 'A', 'Male', 'balaji99.17cse@kongu.edu', 9360664641, NULL, NULL, 'Not Verified'),
('17CSR015', 'Balaji  S', 2017, 'CSE', 'A', 'Male', 'balajis.17cse@kongu.edu', 9715019440, NULL, NULL, 'Not Verified'),
('17CSR016', 'Barath  Srinaath  U  S', 2017, 'CSE', 'A', 'Male', 'barathsrinaathus.17cse@kongu.edu', 9894645522, NULL, NULL, 'Not Verified'),
('17CSR017', 'Bharathi  K', 2017, 'CSE', 'A', 'Female', 'bharathik.17cse@kongu.edu', 9486237717, NULL, NULL, 'Not Verified'),
('17CSR018', 'Bhuvana  Preetha  V', 2017, 'CSE', 'A', 'Female', 'bhuvanapreethav.17cse@kongu.edu', 9698483522, NULL, NULL, 'Not Verified'),
('17CSR019', 'Bibin  K', 2017, 'CSE', 'A', 'Male', 'bibink.17cse@kongu.edu', 9447868384, NULL, NULL, 'Not Verified'),
('17CSR020', 'Boopalan  M', 2017, 'CSE', 'A', 'Male', 'boopalanm.17cse@kongu.edu', 9965455034, NULL, NULL, 'Not Verified'),
('17CSR021', 'Brindha  M', 2017, 'CSE', 'A', 'Female', 'brindham.17cse@kongu.edu', 9842936947, NULL, NULL, 'Not Verified'),
('17CSR022', 'Darshana  R', 2017, 'CSE', 'A', 'Female', 'darshanar.17cse@kongu.edu', 9944771738, NULL, NULL, 'Not Verified'),
('17CSR023', 'Deepak  C  S', 2017, 'CSE', 'A', 'Male', 'deepakcs.17cse@kongu.edu', 9442794888, NULL, NULL, 'Not Verified'),
('17CSR024', 'Deepak  Raj  R  S', 2017, 'CSE', 'A', 'Male', 'deepakrajrs.17cse@kongu.edu', 9894408224, NULL, NULL, 'Not Verified'),
('17CSR025', 'Deepakkumar  S', 2017, 'CSE', 'A', 'Male', 'deepakkumars.17cse@kongu.edu', 9442337892, NULL, NULL, 'Not Verified'),
('17CSR027', 'Deepika  M', 2017, 'CSE', 'A', 'Female', 'deepikam.17cse@kongu.edu', 9677518062, NULL, NULL, 'Not Verified'),
('17CSR028', 'Dharanesh  K', 2017, 'CSE', 'A', 'Male', 'dharaneshk.17cse@kongu.edu', 9500586699, NULL, NULL, 'Not Verified'),
('17CSR029', 'Dhivakar  K  S', 2017, 'CSE', 'A', 'Male', 'dhivakarks.17cse@kongu.edu', 9443543945, NULL, NULL, 'Not Verified'),
('17CSR030', 'Dinesh  S', 2017, 'CSE', 'A', 'Male', 'dineshs.17cse@kongu.edu', 9865794312, NULL, NULL, 'Not Verified'),
('17CSR031', 'Dinesh  Kumar  M', 2017, 'CSE', 'A', 'Male', 'dineshkumarm.17cse@kongu.edu', 9487281619, NULL, NULL, 'Not Verified'),
('17CSR033', 'Ebenezarkanmani  C', 2017, 'CSE', 'A', 'Female', 'ebenezarkanmanic.17cse@kongu.edu', 9865193147, NULL, NULL, 'Not Verified'),
('17CSR034', 'Elanchiyam  A', 2017, 'CSE', 'A', 'Female', 'elanchiyama.17cse@kongu.edu', 9500470928, NULL, NULL, 'Not Verified'),
('17CSR035', 'Elango  R', 2017, 'CSE', 'A', 'Male', 'elangor.17cse@kongu.edu', 9488688721, NULL, NULL, 'Not Verified'),
('17CSR036', 'Gayathri  K', 2017, 'CSE', 'A', 'Female', 'gayathrik.17cse@kongu.edu', 9363074744, NULL, NULL, 'Not Verified'),
('17CSR037', 'Gayathri  D', 2017, 'CSE', 'A', 'Female', 'gayathrid.17cse@kongu.edu', 9842198852, NULL, NULL, 'Not Verified'),
('17CSR038', 'Gayathri  G', 2017, 'CSE', 'A', 'Female', 'gayathrig.17cse@kongu.edu', 7373170012, NULL, NULL, 'Not Verified'),
('17CSR039', 'Gayathridevi  S', 2017, 'CSE', 'A', 'Female', 'gayathridevis.17cse@kongu.edu', 9942585729, NULL, NULL, 'Not Verified'),
('17CSR040', 'Gibson  L', 2017, 'CSE', 'A', 'Male', 'gibsonl.17cse@kongu.edu', 9787623634, NULL, NULL, 'Not Verified'),
('17CSR041', 'Giruba  K  R', 2017, 'CSE', 'A', 'Male', 'girubakr.17cse@kongu.edu', 9788282466, NULL, NULL, 'Not Verified'),
('17CSR042', 'Gokul  Anandh  V  S', 2017, 'CSE', 'A', 'Male', 'gokulanandhvs.17cse@kongu.edu', 9865320315, NULL, NULL, 'Not Verified'),
('17CSR043', 'Gokulnath  P', 2017, 'CSE', 'A', 'Male', 'gokulnathp.17cse@kongu.edu', 8608043694, NULL, NULL, 'Not Verified'),
('17CSR044', 'Gowrishankar  U  V', 2017, 'CSE', 'A', 'Male', 'gowrishankaruv.17cse@kongu.edu', 9487322554, NULL, NULL, 'Not Verified'),
('17CSR045', 'Gowshika  G', 2017, 'CSE', 'A', 'Female', 'gowshikag.17cse@kongu.edu', 9443944666, NULL, NULL, 'Not Verified'),
('17CSR046', 'Gowtham  K', 2017, 'CSE', 'A', 'Male', 'gowthamk.17cse@kongu.edu', 9842668414, NULL, NULL, 'Not Verified'),
('17CSR047', 'Gowtham  S', 2017, 'CSE', 'A', 'Male', 'sgowtham99.17cse@kongu.edu', 9600508061, NULL, NULL, 'Not Verified'),
('17CSR048', 'Gowthaman  S  S', 2017, 'CSE', 'A', 'Male', 'gowthamanss.17cse@kongu.edu', 9443356613, NULL, NULL, 'Not Verified'),
('17CSR049', 'Gowthaman  T', 2017, 'CSE', 'A', 'Male', 'gowthamant.17cse@kongu.edu', 9842046231, NULL, NULL, 'Not Verified'),
('17CSR050', 'Hari  Prasath  S', 2017, 'CSE', 'A', 'Male', 'hariprasaths.17cse@kongu.edu', 9843720555, NULL, NULL, 'Not Verified'),
('17CSR051', 'Hari  Priyanga  B', 2017, 'CSE', 'A', 'Female', 'haripriyangab.17cse@kongu.edu', 9940941246, NULL, NULL, 'Not Verified'),
('17CSR052', 'Hariharasudhan  M', 2017, 'CSE', 'A', 'Male', 'hariharasudhanm.17cse@kongu.edu', 9443551793, NULL, NULL, 'Not Verified'),
('17CSR053', 'Harini  E  S', 2017, 'CSE', 'A', 'Female', 'harinies.17cse@kongu.edu', 9786972271, NULL, NULL, 'Not Verified'),
('17CSR054', 'Harinitha  P', 2017, 'CSE', 'A', 'Female', 'harinithap.17cse@kongu.edu', 8883958889, NULL, NULL, 'Not Verified'),
('17CSR055', 'Hariprakash  K', 2017, 'CSE', 'A', 'Male', 'hariprakashk.17cse@kongu.edu', 9443567899, NULL, NULL, 'Not Verified'),
('17CSR056', 'Harish  S', 2017, 'CSE', 'A', 'Male', 'harishs.17cse@kongu.edu', 9994499807, NULL, NULL, 'Not Verified'),
('17CSR057', 'Haritha  K  J', 2017, 'CSE', 'A', 'Female', 'harithakj.17cse@kongu.edu', 9865102131, NULL, NULL, 'Not Verified'),
('17CSR058', 'Harsavardan  B', 2017, 'CSE', 'A', 'Male', 'harsavardanb.17cse@kongu.edu', 9965525838, NULL, NULL, 'Not Verified'),
('17CSR059', 'Harsha  Vardhini  P', 2017, 'CSE', 'A', 'Female', 'harshavardhinip.17cse@kongu.edu', 9789495226, NULL, NULL, 'Not Verified'),
('17CSR060', 'Hema V B', 2017, 'CSE', 'B', 'Female', 'hemavb.17cse@kongu.edu', 8300970669, NULL, NULL, 'Not Verified'),
('17CSR062', 'Inbaraj B', 2017, 'CSE', 'B', 'Male', 'inbarajb.17cse@kongu.edu', 8489753476, NULL, NULL, 'Not Verified'),
('17CSR063', 'Indhiraprakash P', 2017, 'CSE', 'B', 'Male', 'indhiraprakashp.17cse@kongu.edu', 8825952252, NULL, NULL, 'Not Verified'),
('17CSR064', 'Indhumathi P', 2017, 'CSE', 'B', 'Female', 'indhumathip.17cse@kongu.edu', 8754360824, NULL, NULL, 'Not Verified'),
('17CSR065', 'Ishwarya S', 2017, 'CSE', 'B', 'Female', 'ishwaryas.17cse@kongu.edu', 9047693022, NULL, NULL, 'Not Verified'),
('17CSR066', 'Jaiabhinaya K R', 2017, 'CSE', 'B', 'Female', 'jaiabhinayakr.17cse@kongu.edu', 9443248874, NULL, NULL, 'Not Verified'),
('17CSR067', 'Jananivarthini R', 2017, 'CSE', 'B', 'Female', 'jananivarthinir.17cse@kongu.edu', 8825939642, NULL, NULL, 'Not Verified'),
('17CSR068', 'Janani A', 2017, 'CSE', 'B', 'Female', 'janania.17cse@kongu.edu', 7358826216, NULL, NULL, 'Not Verified'),
('17CSR070', 'Jaya Harini R', 2017, 'CSE', 'B', 'Female', 'jayaharinir.17cse@kongu.edu', 9442751696, NULL, NULL, 'Not Verified'),
('17CSR071', 'Jayashree S', 2017, 'CSE', 'B', 'Female', 'jayashrees.17cse@kongu.edu', 6383500661, NULL, NULL, 'Not Verified'),
('17CSR072', 'Jeeva G', 2017, 'CSE', 'B', 'Female', 'jeevag.17cse@kongu.edu', 9080555721, NULL, NULL, 'Not Verified'),
('17CSR073', 'Jeevan Siddharth J I', 2017, 'CSE', 'B', 'Male', 'jeevansiddharthji.17cse@kongu.edu', 9585998822, NULL, NULL, 'Not Verified'),
('17CSR074', 'Jeevanantham V', 2017, 'CSE', 'B', 'Male', 'jeevananthamv.17cse@kongu.edu', 9360867415, NULL, NULL, 'Not Verified'),
('17CSR075', 'Jehannath P', 2017, 'CSE', 'B', 'Male', 'jehannathp.17cse@kongu.edu', 8883765370, NULL, NULL, 'Not Verified'),
('17CSR076', 'Kamal R', 2017, 'CSE', 'B', 'Male', 'kamalr.17cse@kongu.edu', 9894711702, NULL, NULL, 'Not Verified'),
('17CSR077', 'Kanivel S', 2017, 'CSE', 'B', 'Male', 'kanivels.17cse@kongu.edu', 7548801998, NULL, NULL, 'Not Verified'),
('17CSR078', 'Karthick R', 2017, 'CSE', 'B', 'Male', 'karthickr. 17cse@kongu.edu', 9629307025, NULL, NULL, 'Not Verified'),
('17CSR079', 'Karthick S', 2017, 'CSE', 'B', 'Male', 'karthicks.17cse@kongu.edu', 7373562244, NULL, NULL, 'Not Verified'),
('17CSR080', 'Karthika M', 2017, 'CSE', 'B', 'Female', 'karthikam.17cse@kongu.edu', 9080582794, NULL, NULL, 'Not Verified'),
('17CSR081', 'Karthika R', 2017, 'CSE', 'B', 'Female', 'karthikar.17cse@kongu.edu', 8072581454, NULL, NULL, 'Not Verified'),
('17CSR082', 'Karthikaa P', 2017, 'CSE', 'B', 'Female', 'karthikaap.17cse@kongu.edu ', 7708513960, NULL, NULL, 'Not Verified'),
('17CSR083', 'Karthikeyan B', 2017, 'CSE', 'B', 'Male', 'karthikeyanb.17cse@kongu.edu', 9500503024, NULL, NULL, 'Not Verified'),
('17CSR084', 'Karthikeyan S', 2017, 'CSE', 'B', 'Male', 'karthikeyans.17cse@kongu.edu', 8825925217, NULL, NULL, 'Not Verified'),
('17CSR085', 'Karvendhan N', 2017, 'CSE', 'B', 'Male', 'Nkarvendhan.17cse@kongu.edu ', 9943898306, NULL, NULL, 'Not Verified'),
('17CSR086', 'Kavibharath K', 2017, 'CSE', 'B', 'Male', 'kavibharathk.17cse@kongu.edu', 7397155905, NULL, NULL, 'Not Verified'),
('17CSR087', 'Kavin Kumar G', 2017, 'CSE', 'B', 'Male', 'gkavinkumar.17cse@kongu.edu', 9944451691, NULL, NULL, 'Not Verified'),
('17CSR088', 'Kavin Mukil E', 2017, 'CSE', 'B', 'Male', 'kavinmukile.17cse@kongu.edu', 9787819198, NULL, NULL, 'Not Verified'),
('17CSR089', 'Kavin Raj A G', 2017, 'CSE', 'B', 'Male', 'gkavinraja.17cse@kongu.edu', 9566647724, NULL, NULL, 'Not Verified'),
('17CSR090', 'Kavin M', 2017, 'CSE', 'B', 'Male', 'mkavin.17cse@kongu.edu', 9080046076, NULL, NULL, 'Not Verified'),
('17CSR091', 'Kavin P', 2017, 'CSE', 'B', 'Male', 'kavinp.17cse@kongu.edu', 9952189765, NULL, NULL, 'Not Verified'),
('17CSR092', 'Kavinesh S', 2017, 'CSE', 'B', 'Male', 'kavineshs.17cse@kongu.edu', 9677442941, NULL, NULL, 'Not Verified'),
('17CSR093', 'Kavitha.E', 2017, 'CSE', 'B', 'Female', 'kavithae.17cse@kongu.edu', 8072064317, NULL, NULL, 'Not Verified'),
('17CSR094', 'Kaviya A', 2017, 'CSE', 'B', 'Female', 'kaviyaa.17cse@kongu.edu ', 9940862775, NULL, NULL, 'Not Verified'),
('17CSR095', 'Kavya T', 2017, 'CSE', 'B', 'Female', 'kavyat.17cse@kongu.edu', 8903504701, NULL, NULL, 'Not Verified'),
('17CSR096', 'Keerthana S', 2017, 'CSE', 'B', 'Female', 'keerthanas.17cse@kongu.edu', 9489193449, NULL, NULL, 'Not Verified'),
('17CSR097', 'Keerthi Kumar S', 2017, 'CSE', 'B', 'Male', 'keerthikumars.17cse@kongu.edu', 9087123435, NULL, NULL, 'Not Verified'),
('17CSR098', 'Kiruthika K', 2017, 'CSE', 'B', 'Female', 'kkiruthika.17cse@kongu.edu', 9994930960, NULL, NULL, 'Not Verified'),
('17CSR099', 'Kokilavane M', 2017, 'CSE', 'B', 'Female', 'kokilavanem.17cse@kongu.edu', 8610503012, NULL, NULL, 'Not Verified'),
('17CSR100', 'Kousalya M', 2017, 'CSE', 'B', 'Female', 'kousalyam.17cse@kongu.edu', 9842810244, NULL, NULL, 'Not Verified'),
('17CSR101', 'Koushik Kumar V', 2017, 'CSE', 'B', 'Male', 'koushikkumarv.17cse@kongu.edu', 9080652650, NULL, NULL, 'Not Verified'),
('17CSR102', 'Loghapriya T', 2017, 'CSE', 'B', 'Female', 'loghapriyat.17cse@kongu.edu', 9788321966, NULL, NULL, 'Not Verified'),
('17CSR103', 'Madhumitha S', 2017, 'CSE', 'B', 'Female', 'madhumithas.17cse@kongu.edu', 6381209789, NULL, NULL, 'Not Verified'),
('17CSR104', 'Malini M', 2017, 'CSE', 'B', 'Female', 'malinim.17cse@kongu.edu', 8668063753, NULL, NULL, 'Not Verified'),
('17CSR105', 'Manickam S', 2017, 'CSE', 'B', 'Male', 'manickams.17cse@kongu.edu', 9159743899, NULL, NULL, 'Not Verified'),
('17CSR106', 'Manisha Kokila M', 2017, 'CSE', 'B', 'Female', 'manishakokilam.17cse@kongu.edu', 7550300970, NULL, NULL, 'Not Verified'),
('17CSR107', 'Manojj M', 2017, 'CSE', 'B', 'Male', 'manojjncp.17cse@kongu.edu', 9965673346, NULL, NULL, 'Not Verified'),
('17CSR108', 'Manoj Kumar S', 2017, 'CSE', 'B', 'Male', 'manojkumars.17cse@kongu.edu', 7539926147, NULL, NULL, 'Not Verified'),
('17CSR109', 'Mehul Gupta', 2017, 'CSE', 'B', 'Male', 'mehulguptan.17cse@kongu.edu', 9805902038, NULL, NULL, 'Not Verified'),
('17CSR110', 'Mohamed Hanif P', 2017, 'CSE', 'B', 'Male', 'mohamedhanifp.17cse@kongu.edu', 9791536404, NULL, NULL, 'Not Verified'),
('17CSR111', 'Mohamed Kamal Shareek S', 2017, 'CSE', 'B', 'Male', 'mohamedkamalshareeks.17cse@kongu.edu', 9080208688, NULL, NULL, 'Not Verified'),
('17CSR112', 'Mohamed Riyaz S', 2017, 'CSE', 'B', 'Male', 'mohamedriyaz.17cse@kongu.edu', 8637432140, NULL, NULL, 'Not Verified'),
('17CSR113', 'Mohamed Shihab Aaqil E S R', 2017, 'CSE', 'B', 'Male', 'mohamedshihabaaqilesr.17cse@kongu.edu', 9677963834, NULL, NULL, 'Not Verified'),
('17CSR114', 'Mohammed Shajith K', 2017, 'CSE', 'B', 'Male', 'mohammedshajithk.17cse@kongu.edu', 7868018305, NULL, NULL, 'Not Verified'),
('17CSR115', 'Mohan Babu S R', 2017, 'CSE', 'B', 'Male', 'mohanbabusr.17cse@kongu.edu', 9566624995, NULL, NULL, 'Not Verified'),
('17CSR116', 'Mohanach Selvan D E', 2017, 'CSE', 'B', 'Male', 'mohanachselvande.17cse@kongu.edu', 9080472701, NULL, NULL, 'Not Verified'),
('17CSR117', 'Mohana Priya S T P', 2017, 'CSE', 'B', 'Female', 'mohanapriyastp.17cse@kongu.edu', 9443561465, NULL, NULL, 'Not Verified'),
('17CSR118', 'Monisha M', 2017, 'CSE', 'B', 'Female', 'mmonisha.17cse@kongu.edu', 9791696719, NULL, NULL, 'Not Verified'),
('17CSR119', 'Monisha R', 2017, 'CSE', 'B', 'Female', 'monishar.17cse@kongu.edu', 9498443301, NULL, NULL, 'Not Verified'),
('17CSR120', 'Monisha.S', 2018, 'CSE', 'D', 'Female', 'monishas.17cse@kongu.edu', 9384900588, NULL, NULL, 'Not Verified'),
('17CSR121', 'Monizha L', 2017, 'CSE', 'C', 'Female', 'monizhal.17cse@kongu.edu', 9965103937, NULL, NULL, 'Not Verified'),
('17CSR122', 'Motti Kumar B', 2017, 'CSE', 'C', 'Male', 'mottikumarb.17cse@kongu.edu', 9442157750, NULL, NULL, 'Not Verified'),
('17CSR123', 'Mouliesh V J', 2017, 'CSE', 'C', 'Male', 'moulieshvj.17cse@kongu.edu', 7010536181, NULL, NULL, 'Not Verified'),
('17CSR124', 'Mounika K', 2017, 'CSE', 'C', 'Female', 'mounikak.17cse@kongu.edu', 8838053764, NULL, NULL, 'Not Verified'),
('17CSR126', 'Mukesh Kumar B', 2017, 'CSE', 'C', 'Male', 'mukeshkumarb.17cse@kongu.edu', 8825615838, NULL, NULL, 'Not Verified'),
('17CSR128', 'Namritha M', 2017, 'CSE', 'C', 'Female', 'namritham.17cse@kongu.edu', 9385300978, NULL, NULL, 'Not Verified'),
('17CSR129', 'Nandhak Kumaar R', 2017, 'CSE', 'C', 'Male', 'nandhakkumaarr.17cse@kongu.edu', 8978234748, NULL, NULL, 'Not Verified'),
('17CSR130', 'Nandhini R', 2017, 'CSE', 'C', 'Female', 'nandhinir.17cse@kongu.edu', 6369211841, NULL, NULL, 'Not Verified'),
('17CSR131', 'Nandhini M', 2017, 'CSE', 'C', 'Female', 'nandhinim.17cse@kongu.edu', 9524576162, NULL, NULL, 'Not Verified'),
('17CSR132', 'Nanthini S', 2017, 'CSE', 'C', 'Female', 'nanthinis.17cse@kongu.edu', 9786702172, NULL, NULL, 'Not Verified'),
('17CSR133', 'Naveen Kumar S', 2017, 'CSE', 'C', 'Male', 'naveenkumar.17cse@kongu.edu', 9080321772, NULL, NULL, 'Not Verified'),
('17CSR134', 'Naveenkumar N', 2017, 'CSE', 'C', 'Male', 'naveenkumarn.17cse@kongu.edu', 9442248197, NULL, NULL, 'Not Verified'),
('17CSR135', 'Naveenprasad P', 2017, 'CSE', 'C', 'Male', 'naveenprasadp.17cse@kongu.edu', 8489263442, NULL, NULL, 'Not Verified'),
('17CSR136', 'Nikhyla R', 2017, 'CSE', 'C', 'Female', 'nikhylar.17cse@kongu.edu', 8248872747, NULL, NULL, 'Not Verified'),
('17CSR137', 'Nishanth T', 2017, 'CSE', 'C', 'Male', 'nishantht.17cse@kongu.edu', 9976738856, NULL, NULL, 'Not Verified'),
('17CSR138', 'Nithyalaxmi P', 2017, 'CSE', 'C', 'Female', 'nithyalaxmip.17cse@kongu.edu', 6382733601, NULL, NULL, 'Not Verified'),
('17CSR139', 'Nivedhashri S', 2017, 'CSE', 'C', 'Female', 'nivedhashris.17cse@kongu.edu', 9942098450, NULL, NULL, 'Not Verified'),
('17CSR140', 'Niveetha S K', 2017, 'CSE', 'C', 'Female', 'niveethask.17cse@kongu.edu', 7904687914, NULL, NULL, 'Not Verified'),
('17CSR141', 'Nivethika R', 2017, 'CSE', 'C', 'Female', 'nivethikar.17cse@kongu.edu', 9790521126, NULL, NULL, 'Not Verified'),
('17CSR142', 'Nivethitha V', 2017, 'CSE', 'C', 'Female', 'nivethithav.17cse@kongu.edu', 9952356377, NULL, NULL, 'Not Verified'),
('17CSR143', 'Nivitha G', 2017, 'CSE', 'C', 'Female', 'nivithag.17cse@kongu.edu', 9514766826, NULL, NULL, 'Not Verified'),
('17CSR144', 'Pavithra K', 2017, 'CSE', 'C', 'Female', 'pavithrak.17cse@kongu.edu', 8610600477, NULL, NULL, 'Not Verified'),
('17CSR145', 'Pavithraa R R', 2017, 'CSE', 'C', 'Female', 'pavithraarr.17cse@kongu.edu', 9965766799, NULL, NULL, 'Not Verified'),
('17CSR146', 'Pavitraa Jaisree R A', 2017, 'CSE', 'C', 'Female', 'pavitraajaisreera.17cse@kongu.edu', 9514401844, NULL, NULL, 'Not Verified'),
('17CSR147', 'Prabha R', 2017, 'CSE', 'C', 'Female', 'prabhar.17cse@kongu.edu', 8220844666, NULL, NULL, 'Not Verified'),
('17CSR148', 'Pradeep T', 2017, 'CSE', 'C', 'Male', 'pradeept.17cse@kongu.edu', 9488177992, NULL, NULL, 'Not Verified'),
('17CSR149', 'Pradeep M', 2017, 'CSE', 'C', 'Male', 'pradeepm.17cse@kongu.edu', 8870685394, NULL, NULL, 'Not Verified'),
('17CSR150', 'Pradheep M', 2017, 'CSE', 'C', 'Male', 'pradheepm.17cse@kongu.edu', 9994667870, NULL, NULL, 'Not Verified'),
('17CSR151', 'Pranesh K', 2017, 'CSE', 'C', 'Male', 'praneshk.17cse@kongu.edu', 8012334545, NULL, NULL, 'Not Verified'),
('17CSR152', 'Prasanna S', 2017, 'CSE', 'C', 'Male', 'prasannas.17cse@kongu.edu', 8098009028, NULL, NULL, 'Not Verified'),
('17CSR153', 'Prasida S', 2017, 'CSE', 'C', 'Female', 'prasidas.17cse@kongu.edu', 8012527779, NULL, NULL, 'Not Verified'),
('17CSR154', 'Praveen S R', 2017, 'CSE', 'C', 'Male', 'praveensr.17cse@kongu.edu', 9715515934, NULL, NULL, 'Not Verified'),
('17CSR155', 'Preethi A', 2017, 'CSE', 'C', 'Female', 'preethia.17cse@kongu.edu', 6379016568, NULL, NULL, 'Not Verified'),
('17CSR156', 'Pritha V', 2017, 'CSE', 'C', 'Female', 'prithav.17cse@kongu.edu', 9566349527, NULL, NULL, 'Not Verified'),
('17CSR157', 'Priya R', 2017, 'CSE', 'C', 'Female', 'priyar.17cse@kongu.edu', 8072810558, NULL, NULL, 'Not Verified'),
('17CSR158', 'Priyadarsini P S', 2017, 'CSE', 'C', 'Female', 'priyadarsinips.17cse@kongu.edu', 9500532246, NULL, NULL, 'Not Verified'),
('17CSR159', 'Priyadharshini N', 2017, 'CSE', 'C', 'Female', 'priyadharshinin.17cse@kongu.edu', 6385274052, NULL, NULL, 'Not Verified'),
('17CSR160', 'Ragavi A', 2017, 'CSE', 'C', 'Female', 'ragavia.17cse@kongu.edu', 9080721105, NULL, NULL, 'Not Verified'),
('17CSR161', 'Raghunath R R', 2017, 'CSE', 'C', 'Male', 'raghunathrr.17cse@kongu.edu', 8870304744, NULL, NULL, 'Not Verified'),
('17CSR162', 'Raj Kumar S', 2017, 'CSE', 'C', 'Male', 'rajkumars.17cse@kongu.edu', 7397150889, NULL, NULL, 'Not Verified'),
('17CSR163', 'Rajesh Kannan K V', 2017, 'CSE', 'C', 'Male', 'rajeshkannankv.17cse@kongu.edu', 9597234618, NULL, NULL, 'Not Verified'),
('17CSR164', 'Rajkumar L N', 2017, 'CSE', 'C', 'Male', 'rajkumarln.17cse@kongu.edu', 7538865594, NULL, NULL, 'Not Verified'),
('17CSR165', 'Rakshana M', 2017, 'CSE', 'C', 'Female', 'rakshanam.17cse@kongu.edu', 6380053364, NULL, NULL, 'Not Verified'),
('17CSR166', 'Ramkumar R', 2017, 'CSE', 'C', 'Male', 'ramkumarr.17cse@kongu.edu', 7540098992, NULL, NULL, 'Not Verified'),
('17CSR167', 'Ramya C', 2017, 'CSE', 'C', 'Female', 'ramyac.17cse@kongu.edu', 9566664148, NULL, NULL, 'Not Verified'),
('17CSR168', 'Ramya P', 2017, 'CSE', 'C', 'Female', 'ramyap.17cse@kongu.edu', 9080259309, NULL, NULL, 'Not Verified'),
('17CSR169', 'Ranjani T', 2017, 'CSE', 'C', 'Female', 'ranjanit.17cse@kongu.edu', 9677440122, NULL, NULL, 'Not Verified'),
('17CSR170', 'Ranjith G', 2017, 'CSE', 'C', 'Male', 'ranjithg.17cse@kongu.edu', 9080694147, NULL, NULL, 'Not Verified'),
('17CSR171', 'Raviprasath J M', 2017, 'CSE', 'C', 'Male', 'raviprasathjm.17cse@kongu.edu', 8754706790, NULL, NULL, 'Not Verified'),
('17CSR172', 'Reena J', 2017, 'CSE', 'C', 'Female', 'reenaj.17cse@kongu.edu', 8870681107, NULL, NULL, 'Not Verified'),
('17CSR173', 'Revanth R', 2017, 'CSE', 'C', 'Male', 'revanthr.17cse@kongu.edu', 9488729592, NULL, NULL, 'Not Verified'),
('17CSR174', 'Revathi J', 2017, 'CSE', 'C', 'Female', 'revathij.17cse@kongu.edu', 6380744687, NULL, NULL, 'Not Verified'),
('17CSR175', 'Ruvitha K', 2017, 'CSE', 'C', 'Female', 'ruvithak.17cse@kongu.edu', 9597204112, NULL, NULL, 'Not Verified'),
('17CSR176', 'Sabarishni K', 2017, 'CSE', 'C', 'Female', 'sabarishnik.17cse@kongu.edu', 9498457741, NULL, NULL, 'Not Verified'),
('17CSR177', 'Sadana R M', 2017, 'CSE', 'C', 'Female', 'sadanarm.17cse@kongu.edu', 7598487737, NULL, NULL, 'Not Verified'),
('17CSR178', 'Sakthivel R', 2017, 'CSE', 'C', 'Male', 'rsakthivel.17cse@kongu.edu', 8248456022, NULL, NULL, 'Not Verified'),
('17CSR179', 'Sakti  S', 2017, 'CSE', 'D', 'MALE', 'saktis.17cse@kongu.edu', 9894106641, NULL, NULL, 'Not Verified'),
('17CSR180', 'Sanjay Kumar.D', 2017, 'CSE', 'D', 'MALE', 'sanjaykumard.17cse@kongu.edu', 9442003150, NULL, NULL, 'Not Verified'),
('17CSR181', 'Sanjeeviraja  S K', 2017, 'CSE', 'D', 'MALE', 'sanjeevirajask.17cse@kongu.edu', 9488154844, NULL, NULL, 'Not Verified'),
('17CSR182', 'Sankaranarayanan.G.S', 2017, 'CSE', 'D', 'MALE', 'sankaranarayanangs.17cse@kongu.edu', 9786385450, NULL, NULL, 'Not Verified'),
('17CSR183', 'Saranya.R', 2017, 'CSE', 'D', 'FEMALE', 'saranyar.17cse@kongu.edu', 9047434647, NULL, NULL, 'Not Verified'),
('17CSR184', 'Sarneshwar.S', 2017, 'CSE', 'D', 'MALE', 'sarneshwars.17cse@kongu.edu', 9442660759, NULL, NULL, 'Not Verified'),
('17CSR185', 'Sasi  S', 2017, 'CSE', 'D', 'MALE', 'sasis.17cse@kongu.edu', 9994334700, NULL, NULL, 'Not Verified'),
('17CSR186', 'Sastimalar  K', 2017, 'CSE', 'D', 'FEMALE', 'sastimalark.17cse@kongu.edu', 9865940456, NULL, NULL, 'Not Verified'),
('17CSR187', 'Savithri.E.S', 2017, 'CSE', 'D', 'FEMALE', 'savithries.17cse@kongu.edu', 9842284488, NULL, NULL, 'Not Verified'),
('17CSR188', 'Shabarishwari.S.S', 2017, 'CSE', 'D', 'FEMALE', 'shabarishwariss.17cse@kongu.edu', 8903665479, NULL, NULL, 'Not Verified'),
('17CSR189', 'Shobana  P', 2017, 'CSE', 'D', 'FEMALE', 'shobanap.17cse@kongu.edu', 9442625289, NULL, NULL, 'Not Verified'),
('17CSR190', 'Sindhumathi.P', 2017, 'CSE', 'D', 'FEMALE', 'sindhumathip.17cse@kongu.edu', 9659313109, NULL, NULL, 'Not Verified'),
('17CSR192', 'Snehaa S', 2017, 'CSE', 'D', 'FEMALE', 'snehaas.17cse@kongu.edu', 9944268168, NULL, NULL, 'Not Verified'),
('17CSR193', 'Sonasri  K', 2017, 'CSE', 'D', 'FEMALE', 'sonasrik.17cse@kongu.edu', 9443311303, NULL, NULL, 'Not Verified'),
('17CSR194', 'Soundarya  M', 2017, 'CSE', 'D', 'FEMALE', 'soundaryam.17cse@kongu.edu', 9443305070, NULL, NULL, 'Not Verified'),
('17CSR195', 'Soundhara Rajan.P', 2017, 'CSE', 'D', 'MALE', 'soundhararajanp.17cse@kongu.edu', 9443301486, NULL, NULL, 'Not Verified'),
('17CSR196', 'Sowmiya Bharathi.M', 2017, 'CSE', 'D', 'FEMALE', 'sowmiyabharathim.17cse@kongu.edu', 8870984883, NULL, NULL, 'Not Verified'),
('17CSR197', 'Sowmiya.G', 2017, 'CSE', 'D', 'FEMALE', 'sowmiyag.17cse@kongu.edu', 9842440556, NULL, NULL, 'Not Verified'),
('17CSR199', 'Srinithi.P.G', 2017, 'CSE', 'D', 'FEMALE', 'srinithipg.17cse@kongu.edu', 9487596028, NULL, NULL, 'Not Verified'),
('17CSR200', 'Subhathra.D', 2017, 'CSE', 'D', 'FEMALE', 'subhathrad.17cse@kongu.edu', 9486247357, NULL, NULL, 'Not Verified'),
('17CSR201', 'Suganth  V', 2017, 'CSE', 'D', 'MALE', 'suganthv.17cse@kongu.edu', 9442226455, NULL, NULL, 'Not Verified'),
('17CSR202', 'Suganthi.P', 2017, 'CSE', 'D', 'FEMALE', 'suganthip.17cse@kongu.edu', 9842787973, NULL, NULL, 'Not Verified'),
('17CSR203', 'Suja  S', 2017, 'CSE', 'D', 'FEMALE', 'sujas.17cse@kongu.edu', 9488544501, NULL, NULL, 'Not Verified'),
('17CSR204', 'Sumithra.P', 2017, 'CSE', 'D', 'FEMALE', 'sumithrap.17cse@kongu.edu', 9843408865, NULL, NULL, 'Not Verified'),
('17CSR205', 'Suruthi.T', 2017, 'CSE', 'D', 'FEMALE', 'suruthit.17cse@kongu.edu', 9500910436, NULL, NULL, 'Not Verified'),
('17CSR206', 'Surya.A', 2017, 'CSE', 'D', 'MALE', 'suryaa.17cse@kongu.edu', 9486013398, NULL, NULL, 'Not Verified'),
('17CSR208', 'Suwathi.V', 2017, 'CSE', 'D', 'FEMALE', 'suwathiv.17cse@kongu.edu', 9486523005, NULL, NULL, 'Not Verified'),
('17CSR209', 'Swathi  B', 2017, 'CSE', 'D', 'FEMALE', 'swathib.17cse@kongu.edu', 9500400722, NULL, NULL, 'Not Verified'),
('17CSR210', 'Swathi.N', 2017, 'CSE', 'D', 'FEMALE', 'swathin.17cse@kongu.edu', 9952865750, NULL, NULL, 'Not Verified'),
('17CSR211', 'Swathy.V', 2017, 'CSE', 'D', 'FEMALE', 'swathyv.17cse@kongu.edu', 8778049370, NULL, NULL, 'Not Verified'),
('17CSR212', 'Sweda.P', 2017, 'CSE', 'D', 'FEMALE', 'swedap.17cse@kongu.edu', 9443943414, NULL, NULL, 'Not Verified'),
('17CSR213', 'Swetha  P', 2017, 'CSE', 'D', 'FEMALE', 'swethap.17cse@kongu.edu', 9894115333, NULL, NULL, 'Not Verified'),
('17CSR214', 'Tanushree  B L', 2017, 'CSE', 'D', 'FEMALE', 'tanushreebl.17cse@kongu.edu', 9865247067, NULL, NULL, 'Not Verified'),
('17CSR215', 'Tilak Sudharsan.S.K', 2017, 'CSE', 'D', 'MALE', 'tilaksudharsansk.17cse@kongu.edu', 9944414353, NULL, NULL, 'Not Verified'),
('17CSR216', 'Vaishnavi.S', 2017, 'CSE', 'D', 'FEMALE', 'svaishnavi.17cse@kongu.edu', 9788238303, NULL, NULL, 'Not Verified'),
('17CSR217', 'Vaishnavi.S', 2017, 'CSE', 'D', 'FEMALE', 'vaishnavis.17cse@kongu.edu', 9965143988, NULL, NULL, 'Not Verified'),
('17CSR218', 'Varshini.M', 2017, 'CSE', 'D', 'FEMALE', 'varshinim.17cse@kongu.edu', 9842040552, NULL, NULL, 'Not Verified'),
('17CSR219', 'Varun  T', 2017, 'CSE', 'D', 'MALE', 'varunt.17cse@kongu.edu', 9442823528, NULL, NULL, 'Not Verified'),
('17CSR220', 'Venkatesh.V', 2017, 'CSE', 'D', 'MALE', 'venkateshv.17cse@kongu.edu', 8610614184, NULL, NULL, 'Not Verified'),
('17CSR221', 'Vidhya.P', 2017, 'CSE', 'D', 'FEMALE', 'vidhyap.17cse@kongu.edu', 9865810613, NULL, NULL, 'Not Verified'),
('17CSR222', 'Vidyalakshimi P', 2017, 'CSE', 'D', 'FEMALE', 'vidyalakshimip.17cse@kongu.edu', 9442899461, NULL, NULL, 'Not Verified'),
('17CSR223', 'Vignesh  R', 2017, 'CSE', 'D', 'MALE', 'vignesh99.17cse@kongu.edu', 9894838157, NULL, NULL, 'Not Verified'),
('17CSR224', 'Vignesh.C', 2017, 'CSE', 'D', 'MALE', 'vigneshc.17cse@kongu.edu', 9843344014, NULL, NULL, 'Not Verified'),
('17CSR225', 'Vignesh.M', 2017, 'CSE', 'D', 'MALE', 'mvignesh.17cse@kongu.edu', 7411588941, NULL, NULL, 'Not Verified'),
('17CSR226', 'Vignesh.S', 2017, 'CSE', 'D', 'MALE', 'vignesh.17cse@kongu.edu', 9944052181, NULL, NULL, 'Not Verified'),
('17CSR227', 'Vignesh.S', 2017, 'CSE', 'D', 'MALE', 'vigneshs24.17cse@kongu.edu', 9787281400, NULL, NULL, 'Not Verified'),
('17CSR228', 'Vijay P', 2017, 'CSE', 'D', 'MALE', 'vijayp.17cse@kongu.edu', 9976767058, NULL, NULL, 'Not Verified'),
('17CSR229', 'Vijaya Kumar.N', 2017, 'CSE', 'D', 'MALE', 'vijayakumarn.17cse@kongu.edu', 9952290498, NULL, NULL, 'Not Verified'),
('17CSR230', 'Vijaya Ram.R.S', 2017, 'CSE', 'D', 'MALE', 'vijayaramrs.17cse@kongu.edu', 9442093291, NULL, NULL, 'Not Verified'),
('17CSR231', 'Viruthiran.S', 2017, 'CSE', 'D', 'MALE', 'viruthirans.17cse@kongu.edu', 9894835658, NULL, NULL, 'Not Verified'),
('17CSR232', 'Vishaal  G', 2017, 'CSE', 'D', 'MALE', 'vishaalg.17cse@kongu.edu', 9944014144, NULL, NULL, 'Not Verified'),
('17CSR233', 'Vishal  S R', 2017, 'CSE', 'D', 'MALE', 'vishalsr.17cse@kongu.edu', 9952686422, NULL, NULL, 'Not Verified'),
('17CSR234', 'Vishnu Kumar  H', 2017, 'CSE', 'D', 'MALE', 'vishnukumarh.17cse@kongu.edu', 8012722353, NULL, NULL, 'Not Verified'),
('17CSR235', 'Vishnuhari  R', 2017, 'CSE', 'D', 'MALE', 'vishnuharir.17cse@kongu.edu', 9442841553, NULL, NULL, 'Not Verified'),
('17CSR236', 'Yeswinkumaar  N', 2017, 'CSE', 'D', 'MALE', 'yeswinkumaarn.17cse@kongu.edu', 8883354767, NULL, NULL, 'Not Verified'),
('17CSR237', 'Yokesh  K', 2017, 'CSE', 'D', 'MALE', 'yokeshk.17cse@kongu.edu', 9710418588, NULL, NULL, 'Not Verified'),
('17CSR238', 'Yuvasri.P', 2017, 'CSE', 'D', 'FEMALE', 'yuvasrip.17cse@kongu.edu', 9442921562, NULL, NULL, 'Not Verified'),
('17CST256', 'Abishek  D', 2017, 'CSE', 'D', 'MALE', 'abishekd.17cse@kongu.edu', 9442292829, NULL, NULL, 'Not Verified'),
('17CST257', 'Gowtham  P  S', 2017, 'CSE', 'D', 'MALE', 'gowthamps.17cse@kongu.edu', 9843052776, NULL, NULL, 'Not Verified'),
('17CST258', 'Aswath  A  S', 2017, 'CSE', 'D', 'MALE', 'aswathas.17cse@kongu.edu', 9865936363, NULL, NULL, 'Not Verified'),
('18CSL239', 'Akila S', 2018, 'CSE', 'A', 'Female', 'akilas.18cse@kongu.edu', 9895413616, NULL, NULL, 'Not Verified'),
('18CSL240', 'Ashwin R', 2018, 'CSE', 'A', 'Male', 'ashwinr.18cse@kongu.edu', 6383394481, NULL, NULL, 'Not Verified'),
('18CSL241', 'Giri Prasanth S', 2018, 'CSE', 'A', 'Male', 'giriprasanths.18cse@kongu.edu', 7639266305, NULL, NULL, 'Not Verified'),
('18CSL242', 'Gokulnath V', 2018, 'CSE', 'A', 'Male', 'gokulnathv.18cse@kongu.edu', 9944076044, NULL, NULL, 'Not Verified'),
('18CSL243', 'Gowtham R', 2018, 'CSE', 'A', 'Male', 'gowthamr.18cse@kongu.edu', 9360878533, NULL, NULL, 'Not Verified'),
('18CSL244', 'Khalid Ali Khan K', 2018, 'CSE', 'B', 'MALE', 'khalidalikhan.18cse@kongu.edu', 8825560182, NULL, NULL, 'Not Verified'),
('18CSL245', 'Mithul Pranav T', 2018, 'CSE', 'B', 'MALE', 'mithulpranavt.18cse@kongu.edu', 9487165011, NULL, NULL, 'Not Verified'),
('18CSL246', 'Mohammed Nafeez Mufeeth', 2018, 'CSE', 'B', 'MALE', 'mohammednafeezmufeeth.18cse@kongu.edu', 9543013608, NULL, NULL, 'Not Verified'),
('18CSL247', 'Mohan P', 2018, 'CSE', 'B', 'MALE', 'mohanp.18cse@kongu.edu', 6380142113, NULL, NULL, 'Not Verified'),
('18CSL248', 'Monisha S', 2018, 'CSE', 'B', 'FEMALE', 'monishas.18cse@kongu.edu', 7868804855, NULL, NULL, 'Not Verified'),
('18CSL249', 'Nandhini N', 2018, 'CSE', 'C', 'FEMALE', 'nandhinin.18cse@kongu.edu', 9344013146, NULL, NULL, 'Not Verified'),
('18CSL250', 'Nandini N', 2018, 'CSE', 'C', 'FEMALE', 'nandinin.18cse@kongu.edu', 6385353293, NULL, NULL, 'Not Verified'),
('18CSL251', 'Nithya  G', 2018, 'CSE', 'C', 'FEMALE', 'nithyag.18cse@kongu.edu', 9600833026, NULL, NULL, 'Not Verified'),
('18CSL252', 'Prabhuram J', 2018, 'CSE', 'C', 'MALE', 'prabhuramj.18cse@kongu.edu', 8610717246, NULL, NULL, 'Not Verified'),
('18CSL253', 'Pranesh S', 2018, 'CSE', 'C', 'MALE', 'praneshs.18cse@kongu.edu', 8682807087, NULL, NULL, 'Not Verified'),
('18CSL254', 'Praveen E', 2018, 'CSE', 'C', 'MALE', 'praveene.18cse@kongu.edu', 9360285114, NULL, NULL, 'Not Verified'),
('18CSL256', 'Vasanth.T', 2018, 'CSE', 'D', 'Male', 'vasantht.18cse@kongu.edu', 6383549924, NULL, NULL, 'Not Verified'),
('18CSL257', 'Vasantha Kumar.K', 2018, 'CSE', 'D', 'Male', 'vasanthakumark.18cse@kongu.edu ', 6385273838, NULL, NULL, 'Not Verified'),
('18CSL258', 'Vigneshwar.T', 2018, 'CSE', 'D', 'Male', 'Bigneshwart18cse@kongu.edu', 8667314256, NULL, NULL, 'Not Verified'),
('18CSR001', 'Aarthy S', 2018, 'CSE', 'A', 'Female', 'aarthys.18cse@kongu.edu', 8270881074, NULL, NULL, 'Not Verified'),
('18CSR002', 'Abinash S', 2018, 'CSE', 'A', 'Male', 'abinashs.18cse@kongu.edu', 8807973185, NULL, '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Verified'),
('18CSR003', 'Abirami S P', 2018, 'CSE', 'A', 'Female', 'abiramisp.18cse@kongu.edu', 7598137901, NULL, NULL, 'Not Verified'),
('18CSR004', 'Adhithiya G J', 2018, 'CSE', 'A', 'Male', 'adhithiyagj.18cse@kongu.edu', 7871502525, 'Day Scholar', '1dcbdfa86d78579d717a194feadb92aabc12689b', 'Not Verified'),
('18CSR005', 'Ajay Krishnaa M', 2018, 'CSE', 'A', 'Female', 'ajaykrishnaam.18cse@kongu.edu', 9789345803, NULL, NULL, 'Not Verified'),
('18CSR006', 'Ajay Kumar K B', 2018, 'CSE', 'A', 'Female', 'ajaykumarkb.18cse@kongu.edu', 9843964484, NULL, NULL, 'Not Verified'),
('18CSR007', 'Ajay R', 2018, 'CSE', 'A', 'Male', 'ajayr.18cse@kongu.edu', 9944790344, NULL, '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Verified'),
('18CSR008', 'Ajith Kumar K', 2018, 'CSE', 'A', 'Male', 'ajithkumark.18cse@kongu.edu', 8110859406, 'Day Scholar', '5ca803e597cb7529e70ff9ffca3f2d751559a88a', 'Not Verified'),
('18CSR009', 'Akash V', 2018, 'CSE', 'A', 'Male', 'akashv.18cse@kongu.edu', 9487992268, NULL, NULL, 'Not Verified'),
('18CSR010', 'Akshykumar Bhiva Mote B', 2018, 'CSE', 'A', 'Male', 'akshykumarbhivamoteb.18cse@kongu.edu', 6379516967, NULL, NULL, 'Not Verified'),
('18CSR011', 'Ananya M', 2018, 'CSE', 'A', 'Female', 'ananyam.18cse@kongu.edu', 6379645099, NULL, NULL, 'Not Verified'),
('18CSR012', 'Anju R', 2018, 'CSE', 'A', 'Female', 'anjur.18cse@kongu.edu', 9843137133, NULL, NULL, 'Not Verified'),
('18CSR013', 'Anuradha R', 2018, 'CSE', 'A', 'Female', 'anuradhar.18cse@kongu.edu', 9159795583, NULL, NULL, 'Not Verified'),
('18CSR014', 'Anusruti D', 2018, 'CSE', 'A', 'Female', 'anusrutid.18cse@kongu.edu', 9442122591, 'Hosteller', '317ba15e1acbe156158afc76db0008a353625bf4', 'Not Verified'),
('18CSR015', 'Arul Prasath V', 2018, 'CSE', 'A', 'Male', 'arulprasathv.18cse@kongu.edu', 9994198353, NULL, '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Verified'),
('18CSR016', 'Arvindkumar P', 2018, 'CSE', 'A', 'Male', 'arvindkumarp.18cse@kongu.edu', 9489231654, NULL, NULL, 'Not Verified'),
('18CSR017', 'Arwin Prakadis R S', 2018, 'CSE', 'A', 'Male', 'arwinprakadisrs.18cse@kongu.edu', 6383348013, NULL, NULL, 'Not Verified'),
('18CSR018', 'Ashwath G S', 2018, 'CSE', 'A', 'Male', 'ashwathgs.18cse@kongu.edu', 9361144460, 'Hosteller', 'e8f3b7bc7847ea509f79676aa98495b5133ed368', 'Not Verified'),
('18CSR019', 'Ashwin M', 2018, 'CSE', 'A', 'Male', 'ashwinm.18cse@kongu.edu', 8248382213, NULL, NULL, 'Not Verified'),
('18CSR020', 'Aswin Siranjeevi T', 2018, 'CSE', 'A', 'Male', 'aswinsiranjeevit.18cse@kongu.edu', 7402036773, NULL, NULL, 'Not Verified'),
('18CSR021', 'Aswin Surya K', 2018, 'CSE', 'A', 'Male', 'aswinsuryak.18cse@kongu.edu', 8754956004, NULL, NULL, 'Not Verified'),
('18CSR022', 'Azhaguvel S', 2018, 'CSE', 'A', 'Male', 'azhaguvels.18cse@kongu.edu', 7339155932, NULL, NULL, 'Not Verified'),
('18CSR023', 'Balaji M', 2018, 'CSE', 'A', 'Male', 'balajim.18cse@kongu.edu', 7538840076, NULL, NULL, 'Not Verified'),
('18CSR024', 'Balaji S', 2018, 'CSE', 'A', 'Male', 'balajis.18cse@kongu.edu', 7010006578, NULL, NULL, 'Not Verified'),
('18CSR025', 'Bharath S', 2018, 'CSE', 'A', 'Male', 'bharaths.18cse@kongu.edu', 6379884168, NULL, NULL, 'Not Verified'),
('18CSR026', 'Bhuvanesh S', 2018, 'CSE', 'A', 'Male', 'bhuvaneshs.18cse@kongu.edu', 6369238009, NULL, NULL, 'Not Verified'),
('18CSR027', 'Boomika S', 2018, 'CSE', 'A', 'Female', 'boomikas.18cse@kongu.edu', 6379148944, NULL, NULL, 'Not Verified'),
('18CSR028', 'Deepak Prasath G', 2018, 'CSE', 'A', 'Male', 'deepakprasathg.18cse@kongu.edu', 9095716066, NULL, NULL, 'Not Verified'),
('18CSR029', 'Deepika K', 2018, 'CSE', 'A', 'Female', 'deepikak.18cse@kongu.edu', 8248175585, NULL, NULL, 'Not Verified'),
('18CSR030', 'Deepti R', 2018, 'CSE', 'A', 'Female', 'deeptir. 18cse@kongu.edu', 6369375535, 'Hosteller', '473249bb2db7b4a221f2a094cceb500b07608d76', 'Verified'),
('18CSR031', 'Devisowbarnikaa M', 2018, 'CSE', 'A', 'Female', 'devisowbarnikaam.18cse@kongu.edu', 9360796900, NULL, NULL, 'Not Verified'),
('18CSR032', 'Dhanush S', 2018, 'CSE', 'A', 'Male', 'dhanushs.18cse@kongu.edu', 9942447470, NULL, NULL, 'Not Verified'),
('18CSR033', 'Dhanvarsha S', 2018, 'CSE', 'A', 'Female', 'dhanvarshas.18cse@kongu.edu', 9486193793, 'Day Scholar', 'd2e672a7e57da5d3092e5d037d091bf0adf24679', 'Not Verified'),
('18CSR034', 'Dharani Priya T', 2018, 'CSE', 'A', 'Female', 'dharanipriyat.18cse@kongu.edu', 7010161962, NULL, NULL, 'Not Verified'),
('18CSR035', 'Dharati N', 2018, 'CSE', 'A', 'Female', 'dharatin.18cse@kongu.edu', 8667052110, NULL, NULL, 'Not Verified'),
('18CSR036', 'Dhineshkumar B', 2018, 'CSE', 'A', 'Male', 'dhineshkumarb.18cse@kongu.edu', 8531988989, NULL, NULL, 'Not Verified'),
('18CSR037', 'Dineshkumar L', 2018, 'CSE', 'A', 'Male', 'dineshkumarl.18cse@kongu.edu', 7540076137, NULL, NULL, 'Not Verified'),
('18CSR038', 'Divakar S S', 2018, 'CSE', 'A', 'Male', 'divakarss.18cse@kongu.edu', 6385228090, NULL, NULL, 'Not Verified'),
('18CSR039', 'Divya R', 2018, 'CSE', 'A', 'Female', 'divyar.18cse@kongu.edu', 9360769976, NULL, NULL, 'Not Verified'),
('18CSR040', 'Eraja Ganapathy M', 2018, 'CSE', 'A', 'Male', 'erajaganapathym.18cse@kongu.edu', 8870575283, NULL, NULL, 'Not Verified'),
('18CSR041', 'Esakki Selvaraj R', 2018, 'CSE', 'A', 'Male', 'esakkiselvarajr.18cse@kongu.edu', 6382443358, NULL, NULL, 'Not Verified'),
('18CSR042', 'Ganga Sri R', 2018, 'CSE', 'A', 'Female', 'gangasrir.18cse@kongu.edu', 7092736883, NULL, NULL, 'Not Verified'),
('18CSR043', 'Ghokul Kanth K V', 2018, 'CSE', 'A', 'Male', 'ghokulkanthkv.18cse@kongu.edu', 9788664488, NULL, NULL, 'Not Verified'),
('18CSR044', 'Gokilavani G', 2018, 'CSE', 'A', 'Female', 'gokilavanig.18cse@kongu.edu', 6369137740, NULL, NULL, 'Not Verified'),
('18CSR045', 'Gokul M', 2018, 'CSE', 'A', 'Male', 'gokulm.18cse@kongu.edu', 7373909866, NULL, NULL, 'Not Verified'),
('18CSR046', 'Gokul S', 2018, 'CSE', 'A', 'Male', 'gokuls.18cse@kongu.edu', 6382672456, NULL, NULL, 'Not Verified'),
('18CSR047', 'Gokul Prasshanth V', 2018, 'CSE', 'A', 'Male', 'gokulprasshanthv.18cse@kongu.edu', 9655084944, NULL, NULL, 'Not Verified'),
('18CSR048', 'Gokul R', 2018, 'CSE', 'A', 'Male', 'gokulr.18cse@kongu.edu', 6382101110, NULL, NULL, 'Not Verified'),
('18CSR049', 'Gowtham U', 2018, 'CSE', 'A', 'Male', 'gowthamu.18cse@kongu.edu', 9597780059, NULL, NULL, 'Not Verified'),
('18CSR050', 'Gowthamkrishnan S', 2018, 'CSE', 'A', 'Male', 'gowthamkrishnans.18cse@kongu.edu', 6379286927, 'Day Scholar', '9227d37b041df94154563feb9babca1a91007cbb', 'Not Verified'),
('18CSR051', 'Harini K R', 2018, 'CSE', 'A', 'Female', 'harinikr.18cse@kongu.edu', 9442782277, NULL, NULL, 'Not Verified'),
('18CSR052', 'Harini S', 2018, 'CSE', 'A', 'Female', 'harinis.18cse@kongu.edu', 9585666583, NULL, NULL, 'Not Verified'),
('18CSR053', 'Hariprakash K', 2018, 'CSE', 'A', 'Male', 'hariprakashk.18cse@kongu.edu', 9487977460, NULL, NULL, 'Not Verified'),
('18CSR054', 'Hariprasath M', 2018, 'CSE', 'A', 'Male', 'hariprasathm.18cse@kongu.edu', 9600324514, NULL, NULL, 'Not Verified'),
('18CSR055', 'Hari Prasath V K', 2018, 'CSE', 'A', 'Male', 'hariprasathvk.18cse@kongu.edu', 9025194496, NULL, NULL, 'Not Verified'),
('18CSR056', 'Haripriya J', 2018, 'CSE', 'A', 'Female', 'haripriyaj.18cse@kongu.edu', 9842291941, NULL, NULL, 'Not Verified'),
('18CSR057', 'Haritha S', 2018, 'CSE', 'A', 'Female', 'harithas.18cse@kongu.edu', 8754610299, NULL, NULL, 'Not Verified'),
('18CSR058', 'Harseta S', 2018, 'CSE', 'A', 'Female', 'harsetas.18cse@kongu.edu', 7373173158, NULL, NULL, 'Not Verified'),
('18CSR059', 'Hemanandhini K', 2018, 'CSE', 'A', 'Female', 'hemanandhinik.18cse@kongu.edu', 7373118616, NULL, NULL, 'Not Verified'),
('18CSR060', 'Hemavathy N', 2018, 'CSE', 'A', 'Female', 'hemavathyn.18cse@kongu.edu', 9894476738, NULL, NULL, 'Not Verified'),
('18CSR061', 'Indiraa K K', 2018, 'CSE', 'B', 'FEMALE', 'Indiraakk.18cse@kongu.edu', 9842355705, NULL, '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Verified'),
('18CSR062', 'Induja N', 2018, 'CSE', 'B', 'FEMALE', 'indujan.18cse@kongu.edu', 9384309568, NULL, NULL, 'Not Verified'),
('18CSR063', 'Jayapriya J', 2018, 'CSE', 'B', 'FEMALE', 'jayapriyaj.18cse@kongu.edu', 6383786620, NULL, NULL, 'Not Verified'),
('18CSR064', 'Jayasri P V', 2018, 'CSE', 'B', 'FEMALE ', 'jayasripv.18cse@kongu.edu', 7558143665, NULL, NULL, 'Not Verified'),
('18CSR065', 'Jeeva S', 2018, 'CSE', 'B', 'MALE', 'jeevas.18cse@kongu.edu', 8098144814, NULL, NULL, 'Not Verified'),
('18CSR066', 'Jeevapriya S', 2018, 'CSE', 'B', 'FEMALE', 'jeevapriyas.18cse@kongu.edu', 7708157148, NULL, NULL, 'Not Verified'),
('18CSR067', 'Jeevigha Shri P', 2018, 'CSE', 'B', 'FEMALE', 'jeevighashrip.18cse@kongu.edu', 9677545430, NULL, NULL, 'Not Verified'),
('18CSR068', 'Jhohith K G', 2018, 'CSE', 'B', 'MALE', 'jhohithkg.18cse@kongu.edu', 9965866999, NULL, NULL, 'Not Verified'),
('18CSR069', 'Jithendiran E K', 2018, 'CSE', 'B', 'MALE', 'jithendiranek.18cse@kongu.edu', 9994986888, NULL, NULL, 'Not Verified'),
('18CSR070', 'John Praveen A', 2018, 'CSE', 'B', 'MALE', 'johnpraveena.18cse@kongu.edu', 9940610415, NULL, NULL, 'Not Verified'),
('18CSR071', 'Kaaviyaa A', 2018, 'CSE', 'B', 'FEMALE', 'kaaviyaaa.18cse@kongu.edu', 6369176261, NULL, NULL, 'Not Verified'),
('18CSR072', 'Kabinesh K', 2018, 'CSE', 'B', 'MALE', 'kabineshk.18cse@kongu.edu', 7598048391, NULL, NULL, 'Not Verified'),
('18CSR073', 'Kadhambari S', 2018, 'CSE', 'B', 'FEMALE', 'kadhambaris.18cse@kongu.edu', 9942760304, NULL, NULL, 'Not Verified'),
('18CSR074', 'Kalaivani S P', 2018, 'CSE', 'B', 'FEMALE', 'kalaivanisp.18cse@kongu.edu', 9790586539, NULL, NULL, 'Not Verified'),
('18CSR076', 'Kamalesh K', 2018, 'CSE', 'B', 'MALE', 'kaMALEshk.18cse@kongu.edu', 6385730235, NULL, NULL, 'Not Verified'),
('18CSR077', 'Kamali R', 2018, 'CSE', 'B', 'FEMALE', 'kamalir.18cse@kongu.edu', 6379129950, NULL, NULL, 'Not Verified'),
('18CSR078', 'Kanishk R C', 2018, 'CSE', 'B', 'MALE', 'kanishkrc.18cse@kongu.edu', 7373485899, NULL, '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Verified'),
('18CSR079', 'Kannan B', 2018, 'CSE', 'B', 'MALE', 'kannanb.18cse@kongu.edu', 7339255840, NULL, NULL, 'Not Verified'),
('18CSR080', 'Karthi S', 2018, 'CSE', 'B', 'MALE', 'karthis.18cse@kongu.edu', 6374943844, NULL, NULL, 'Not Verified'),
('18CSR081', 'Karthik T', 2018, 'CSE', 'B', 'MALE', 'karthikt.18cse@kongu.edu', 6379796297, NULL, NULL, 'Not Verified'),
('18CSR082', 'Karthika P', 2018, 'CSE', 'B', 'FEMALE', 'karthikap.18cse@kongu.edu', 9445323249, NULL, NULL, 'Not Verified'),
('18CSR083', 'Karthika V', 2018, 'CSE', 'B', 'FEMALE', 'karthikav.18cse@kongu.edu', 9994021587, NULL, NULL, 'Not Verified'),
('18CSR084', 'Karthikraja R', 2018, 'CSE', 'B', 'MALE', 'karthikrajar.18cse@kongu.edu', 9750167588, NULL, NULL, 'Not Verified'),
('18CSR085', 'Karunakaran R', 2018, 'CSE', 'B', 'MALE', 'karunakaranr.18cse@kongu.edu', 7868879132, NULL, '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Verified'),
('18CSR086', 'Keerthivasan M', 2018, 'CSE', 'B', 'MALE', 'keerthivasanm.18cse@kongu.edu', 8428196719, NULL, NULL, 'Not Verified'),
('18CSR087', 'Kevin Ruban D', 2018, 'CSE', 'B', 'MALE', 'kevinruband.18cse@kongu.edu', 9789388977, NULL, NULL, 'Not Verified'),
('18CSR088', 'Kiranbharath K', 2018, 'CSE', 'B', 'MALE', 'kiranbharathk.18cse@kongu.edu', 9677681068, NULL, NULL, 'Not Verified'),
('18CSR089', 'Kishore N', 2018, 'CSE', 'B', 'MALE', 'kishoren.18cse@kongu.edu', 9790443260, NULL, NULL, 'Not Verified'),
('18CSR090', 'Krithika S', 2018, 'CSE', 'B', 'FEMALE', 'krithikas.18cse@kongu.edu', 8220220667, NULL, NULL, 'Not Verified'),
('18CSR091', 'Kumaresan R', 2018, 'CSE', 'B', 'MALE', 'kumaresanr.18cse@kongu.edu', 6379047974, NULL, NULL, 'Not Verified'),
('18CSR092', 'Lavanya G', 2018, 'CSE', 'B', 'FEMALE', 'lavanyag.18cse@kongu.edu', 7395895096, NULL, '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Verified'),
('18CSR093', 'Lawvanya Priya T', 2018, 'CSE', 'B', 'FEMALE', 'lawvanyapriyat.18cse@kongu.edu', 9487600539, NULL, NULL, 'Not Verified'),
('18CSR094', 'Lekshmi S L', 2018, 'CSE', 'B', 'FEMALE', 'lekshmisl.18cse@kongu.edu', 8903267912, NULL, NULL, 'Not Verified'),
('18CSR095', 'Logesh T', 2018, 'CSE', 'B', 'MALE ', 'logesht.18cse@kongu.edu', 7305746782, NULL, NULL, 'Not Verified'),
('18CSR096', 'Lohappriya D', 2018, 'CSE', 'B', 'FEMALE', 'lohappriyad.18cse@kongu.edu', 6369348762, NULL, NULL, 'Not Verified'),
('18CSR097', 'Lokesh Ranganathan Velumani', 2018, 'CSE', 'B', 'MALE', 'lokeshranganathanvelumani.18cse@kongu.edu', 7397774929, NULL, NULL, 'Not Verified'),
('18CSR098', 'Madhuvanan S', 2018, 'CSE', 'B', 'MALE', 'madhuvanans.18cse@kongu.edu', 9600441156, NULL, NULL, 'Not Verified'),
('18CSR099', 'Maghathani S', 2018, 'CSE', 'B', 'FEMALE', 'maghathanis.18cse@kongu.edu', 9790464858, NULL, NULL, 'Not Verified'),
('18CSR100', 'Mailvizhi S', 2018, 'CSE', 'B', 'FEMALE', 'mailvizhis.18cse@kongu.edu', 9677410433, NULL, NULL, 'Not Verified'),
('18CSR101', 'Mangala Prasath M', 2018, 'CSE', 'B', 'MALE', 'mangalaprasathm.18cse@kongu.edu', 6382504685, NULL, NULL, 'Not Verified'),
('18CSR102', 'Manjunath R', 2018, 'CSE', 'B', 'MALE', 'manjunathr.18cse@kongu.edu', 6383323050, NULL, '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Verified'),
('18CSR103', 'Manoj Prabakaran R', 2018, 'CSE', 'B', 'MALE', 'manojprabakaranr.18cse@kongu.edu', 9487302686, NULL, NULL, 'Not Verified'),
('18CSR104', 'Manoowranjith A J', 2018, 'CSE', 'B', 'MALE', 'manoowranjithaj.18cse@kongu.edu', 7339162631, NULL, NULL, 'Not Verified'),
('18CSR105', 'Meiarasu K', 2018, 'CSE', 'B', 'MALE', 'meiarasuk.18cse@kongu.edu', 8300070410, NULL, NULL, 'Not Verified'),
('18CSR106', 'Mithilesh Krishna S', 2018, 'CSE', 'B', 'MALE', 'mithileshkrishnas.18cse@kongu.edu', 6382987780, NULL, NULL, 'Not Verified'),
('18CSR107', 'Mithinesh P', 2018, 'CSE', 'B', 'MALE', 'mithineshp.18cse@kongu.edu', 9489021251, NULL, NULL, 'Not Verified'),
('18CSR108', 'Mithun Vishnu M', 2018, 'CSE', 'B', 'MALE', 'mithunvishnum.18cse@kongu.edu', 8760037370, NULL, NULL, 'Not Verified'),
('18CSR109', 'Mohamed Sameer A', 2018, 'CSE', 'B', 'MALE', 'mohamedsameera.18cse@kongu.edu', 8667009711, NULL, NULL, 'Not Verified'),
('18CSR110', 'Mohan Kumar D', 2018, 'CSE', 'B', 'MALE', 'mohankumard.18cse@kongu.edu', 7358996861, NULL, NULL, 'Not Verified'),
('18CSR111', 'Mukhilvannan B', 2018, 'CSE', 'B', 'MALE', 'mukhilvannanb.18cse@kongu.edu', 6382823766, NULL, NULL, 'Not Verified'),
('18CSR112', 'Muthu Balaji P', 2018, 'CSE', 'B', 'MALE', 'muthubalajip.18cse@kongu.edu', 8124820044, NULL, NULL, 'Not Verified'),
('18CSR113', 'Mythilippriya S G', 2018, 'CSE', 'B', 'FEMALE ', 'mythilippriyasg.18cse@kongu.edu', 8056394170, NULL, NULL, 'Not Verified'),
('18CSR114', 'Mythily S', 2018, 'CSE', 'B', 'FEMALE', 'mythilys.18cse@kongu.edu', 6379209952, NULL, NULL, 'Not Verified'),
('18CSR115', 'Nagammai S', 2018, 'CSE', 'B', 'FEMALE', 'nagammais.18cse@kongu.edu', 6379594539, NULL, NULL, 'Not Verified'),
('18CSR116', 'Nandha Kumar S', 2018, 'CSE', 'B', 'MALE', 'nandhakumars.18cse@kongu.edu', 6383449908, NULL, NULL, 'Not Verified'),
('18CSR117', 'Nanthini K', 2018, 'CSE', 'B', 'FEMALE', 'nanthinik.18cse@kongu.edu', 6383691630, NULL, NULL, 'Not Verified'),
('18CSR118', 'Narmatha B R', 2018, 'CSE', 'B', 'FEMALE', 'narmathabr.18cse@kongu.edu', 7548872474, NULL, NULL, 'Not Verified'),
('18CSR119', 'Naveen Kumar N', 2018, 'CSE', 'B', 'MALE', 'naveenkumarn.18cse@kongu.edu', 7548872229, NULL, NULL, 'Not Verified'),
('18CSR120', 'Naveen Prasad T', 2018, 'CSE', 'B', 'MALE', 'naveenprasadt.18cse@kongu.edu', 9789142781, NULL, '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Verified'),
('18CSR121', 'Navin A E', 2018, 'CSE', 'C', 'MALE', 'navinae.18cse@kongu.edu', 9944995714, NULL, NULL, 'Not Verified'),
('18CSR122', 'Ninisa B A', 2018, 'CSE', 'C', 'FEMALE', 'ninisaba.18cse@kongu.edu', 6369048217, NULL, NULL, 'Not Verified'),
('18CSR123', 'Nivashini K', 2018, 'CSE', 'C', 'FEMALE', 'nivashinik.18cse@kongu.edu', 9894335846, NULL, NULL, 'Not Verified'),
('18CSR124', 'Nowneesh T', 2018, 'CSE', 'C', 'MALE', 'nowneesht.18cse@kongu.edu', 9965552513, NULL, NULL, 'Not Verified'),
('18CSR125', 'Obuli Sai Naren', 2018, 'CSE', 'C', 'MALE', 'obulisainaren.18cse@kongu.edu', 9003743543, NULL, NULL, 'Not Verified'),
('18CSR126', 'Om Surya Prakash A', 2018, 'CSE', 'C', 'MALE', 'omsuryaprakasha.18cse@kongu.edu', 9965081177, NULL, NULL, 'Not Verified');
INSERT INTO `registration` (`regno`, `name`, `batch`, `dept`, `sec`, `gender`, `mail`, `phone`, `residence`, `pass`, `status`) VALUES
('18CSR127', 'Palani Kumar M', 2018, 'CSE', 'C', 'MALE', 'palanikumarm.18cse@kongu.edu', 7708429288, NULL, NULL, 'Not Verified'),
('18CSR128', 'Poongundran M', 2018, 'CSE', 'C', 'MALE', 'poongundranm.18cse@kongu.edu', 9080067899, NULL, NULL, 'Not Verified'),
('18CSR129', 'Praanesh P S', 2018, 'CSE', 'C', 'MALE', 'praaneshps.18cse@kongu.edu', 7604868661, NULL, NULL, 'Not Verified'),
('18CSR130', 'Prabu B', 2018, 'CSE', 'C', 'MALE', 'prabub.18cse@kongu.edu', 6382710300, NULL, NULL, 'Not Verified'),
('18CSR131', 'Pradeep C', 2018, 'CSE', 'C', 'MALE', 'pradeepc.18cse@kongu.edu', 9787136466, NULL, NULL, 'Not Verified'),
('18CSR132', 'Pradeep A', 2018, 'CSE', 'C', 'MALE', 'pradeepa.18cse@kongu.edu', 9597980415, NULL, NULL, 'Not Verified'),
('18CSR133', 'Pradhosh Ss', 2018, 'CSE', 'C', 'MALE', 'pradhoshss.18cse@kongu.edu', 8870601585, NULL, NULL, 'Not Verified'),
('18CSR134', 'Prakalya M', 2018, 'CSE', 'C', 'FEMALE', 'prakalyam.18cse@kongu.edu', 9488274092, NULL, NULL, 'Not Verified'),
('18CSR135', 'Prakash Aa', 2018, 'CSE', 'C', 'MALE', 'prakashaa.18cse@kongu.edu', 6379867010, NULL, NULL, 'Not Verified'),
('18CSR136', 'Pramod A N', 2018, 'CSE', 'C', 'MALE', 'pramodan.18cse@kongu.edu', 9095723501, NULL, NULL, 'Not Verified'),
('18CSR137', 'Pranesh Kumar M', 2018, 'CSE', 'C', 'MALE', 'praneshkumarm.18cse@kongu.edu', 9865625458, NULL, NULL, 'Not Verified'),
('18CSR138', 'Prasanth S', 2018, 'CSE', 'C', 'MALE', 'prasanths.18cse@kongu.edu', 9952717393, NULL, NULL, 'Not Verified'),
('18CSR139', 'Prasath M', 2018, 'CSE', 'C', 'MALE', 'prasathm.18cse@kongu.edu', 7339049041, NULL, NULL, 'Not Verified'),
('18CSR140', 'Pratheksha K', 2018, 'CSE', 'C', 'FEMALE', 'prathekshak.18cse@kongu.edu', 7397150110, NULL, NULL, 'Not Verified'),
('18CSR141', 'Praveen C', 2018, 'CSE', 'C', 'MALE', 'praveenc.18cse@kongu.edu', 9543834393, NULL, NULL, 'Not Verified'),
('18CSR142', 'Praveen M', 2018, 'CSE', 'C', 'MALE', 'praveenm.18cse@kongu.edu', 7358428562, NULL, NULL, 'Not Verified'),
('18CSR143', 'Praveena N', 2018, 'CSE', 'C', 'FEMALE', 'praveenan.18cse@kongu.edu', 8778522997, NULL, NULL, 'Not Verified'),
('18CSR144', 'Praveenkumar M', 2018, 'CSE', 'C', 'MALE', 'Praveenkumarm.18cse@kongu.edu', 7339287365, NULL, NULL, 'Not Verified'),
('18CSR145', 'Pravin Kumar S', 2018, 'CSE', 'C', 'MALE', 'pravinkumars.18cse@kongu.edu', 8248347362, NULL, NULL, 'Not Verified'),
('18CSR146', 'Pravin Raj A', 2018, 'CSE', 'C', 'MALE', 'pravinraja.18cse@kongu.edu', 9786246432, NULL, NULL, 'Not Verified'),
('18CSR147', 'Preethees S', 2018, 'CSE', 'C', 'FEMALE', 'preetheess.18cse@kongu.edu', 9025021106, NULL, NULL, 'Not Verified'),
('18CSR148', 'Premkumar K', 2018, 'CSE', 'C', 'MALE', 'premkumark.18cse@kongu.edu', 9952585818, NULL, NULL, 'Not Verified'),
('18CSR149', 'Raghul S', 2018, 'CSE', 'C', 'MALE', 'raghuls.18cse@kongu.edu', 6382627750, NULL, NULL, 'Not Verified'),
('18CSR150', 'Raghupriyanth R', 2018, 'CSE', 'C', 'MALE', 'raghupriyanthr.18cse@kongu.edu', 6369349614, NULL, NULL, 'Not Verified'),
('18CSR151', 'Ragunanthan', 2018, 'CSE', 'C', 'MALE', 'ragunanthans.18cse@kongu.edu', 7548826844, NULL, NULL, 'Not Verified'),
('18CSR152', 'Rajaraman B', 2018, 'CSE', 'C', 'MALE', 'rajaramanb.18cse@kongu.edu', 8903624976, NULL, NULL, 'Not Verified'),
('18CSR153', 'Rajharini R', 2018, 'CSE', 'C', 'FEMALE', 'rajharinir.18cse@kongu.edu', 7358971780, NULL, NULL, 'Not Verified'),
('18CSR154', 'Rakesh Roshan M', 2018, 'CSE', 'C', 'MALE', 'rakeshroshanm.18cse@kongu.edu', 8608439070, NULL, NULL, 'Not Verified'),
('18CSR155', 'Rakshitha R', 2018, 'CSE', 'C', 'FEMALE', 'rakshithar.18cse@kongu.edu', 6369353310, NULL, NULL, 'Not Verified'),
('18CSR156', 'Rangaraaj V', 2018, 'CSE', 'C', 'MALE', 'rangaraajv.18cse@kongu.edu', 8667631594, NULL, NULL, 'Not Verified'),
('18CSR157', 'Rankish K', 2018, 'CSE', 'C', 'MALE', 'rankishk.18cse@kongu.edu', 7397118248, NULL, NULL, 'Not Verified'),
('18CSR158', 'Raviraam  Vs', 2018, 'CSE', 'C', 'MALE', 'raviraamvs.18cse@kongu.edu', 7708756119, NULL, NULL, 'Not Verified'),
('18CSR159', 'Razeen I', 2018, 'CSE', 'C', 'MALE', 'razeeni.18cse@kongu.edu', 9487312098, NULL, NULL, 'Not Verified'),
('18CSR160', 'Rima P', 2018, 'CSE', 'C', 'FEMALE', 'rimap.18cse@kongu.edu', 9442388838, NULL, NULL, 'Not Verified'),
('18CSR161', 'Rithik M', 2018, 'CSE', 'C', 'MALE', 'rithikm.18cse@kongu.edu', 8903460952, NULL, NULL, 'Not Verified'),
('18CSR162', 'Rohinth T', 2018, 'CSE', 'C', 'MALE', 'rohintht.18cse@kongu.edu', 7871833242, NULL, NULL, 'Not Verified'),
('18CSR163', 'Rubashree V', 2018, 'CSE', 'C', 'FEMALE', 'rubashreev.18cse@kongu.edu', 9865473725, NULL, NULL, 'Not Verified'),
('18CSR164', 'Sai Haritha S', 2018, 'CSE', 'C', 'FEMALE', 'saiharithas.18cse@kongu.edu', 9500455005, NULL, NULL, 'Not Verified'),
('18CSR165', 'Sakthi Murugavel B', 2018, 'CSE', 'C', 'MALE', 'sakthimurugavelb.18cse@kongu.edu', 9500733113, NULL, NULL, 'Not Verified'),
('18CSR166', 'Sakthi Prasanna S', 2018, 'CSE', 'C', 'MALE', 'sakthiprasannas.18cse@kongu.edu', 9566683697, NULL, NULL, 'Not Verified'),
('18CSR167', 'Sakthi Sri S V ', 2018, 'CSE', 'C', 'FEMALE', 'sakthisrisv.18cse@kongu.edu', 9952173183, NULL, NULL, 'Not Verified'),
('18CSR168', 'Sakthi S', 2018, 'CSE', 'C', 'FEMALE', 'sakthis.18cse@kongu.edu', 9384760207, NULL, NULL, 'Not Verified'),
('18CSR169', 'Samiksha M', 2018, 'CSE', 'C', 'FEMALE', 'samiksham.18cse@kongu.edu', 6369092497, NULL, NULL, 'Not Verified'),
('18CSR170', 'Sanjana Shuruthy K', 2018, 'CSE', 'C', 'FEMALE', 'sanjanashuruthyk.18cse@kongu.edu', 6374380455, NULL, NULL, 'Not Verified'),
('18CSR171', 'Sanjay Nithish K S', 2018, 'CSE', 'C', 'MALE', 'sanjay.18cse@kongu.edu', 6383186709, NULL, NULL, 'Not Verified'),
('18CSR172', 'Sanjay Kumar D', 2018, 'CSE', 'C', 'MALE', 'sanjaykumard.18cse@kongu.edu', 6382073694, NULL, NULL, 'Not Verified'),
('18CSR173', 'Sanjay S', 2018, 'CSE', 'C', 'MALE', 'sanjays.18cse@kongu.edu', 9585810366, NULL, NULL, 'Not Verified'),
('18CSR174', 'Sanjayan S', 2018, 'CSE', 'C', 'MALE', 'sanjayans.18cse@kongu.edu', 7373054972, NULL, NULL, 'Not Verified'),
('18CSR175', 'Sanjeeth S', 2018, 'CSE', 'C', 'MALE', 'sanjeeths.18cse@kongu.edu', 6369028658, NULL, NULL, 'Not Verified'),
('18CSR176', 'Sanjutha S S', 2018, 'CSE', 'C', 'FEMALE', 'sanjuthass.18cse@kongu.edu', 6369376373, NULL, NULL, 'Not Verified'),
('18CSR177', 'Sanmuhapriya S', 2018, 'CSE', 'C', 'FEMALE', 'sanmuhapriyas.18cse@kongu.edu', 6385701666, NULL, NULL, 'Not Verified'),
('18CSR178', 'Sarath Kumar S', 2018, 'CSE', 'C', 'MALE', 'sarathkumars.18cse@kongu.edu', 9361424511, NULL, NULL, 'Not Verified'),
('18CSR179', 'Sarveshwaran M', 2018, 'CSE', 'C', 'MALE', 'sarveshwaranm.18cse@kongu.edu', 7373061755, NULL, NULL, 'Not Verified'),
('18CSR180', 'Sathyapriya S', 2018, 'CSE', 'D', 'Female', 'sathyapriyas.18cse@kongu.edu', 8220060515, NULL, NULL, 'Not Verified'),
('18CSR181', 'Selvendhiran S', 2018, 'CSE', 'D', 'Male', 'selvendhirans.18cse@kongu.edu', 6383767644, NULL, NULL, 'Not Verified'),
('18CSR182', 'Shakil Ahamed R', 2018, 'CSE', 'D', 'Male', 'shakilahamedr.18cse@kongu.edu', 9080549204, NULL, NULL, 'Not Verified'),
('18CSR183', 'Shanmathi .B', 2018, 'CSE', 'D', 'Female', 'shanmathib.18cse@kongu.edu', 8610778146, NULL, NULL, 'Not Verified'),
('18CSR184', 'Shanmathi C', 2018, 'CSE', 'D', 'Female', 'shanmathic.18cse@kongu.edu', 9865987177, NULL, NULL, 'Not Verified'),
('18CSR185', 'Sherlip Evelin.A', 2018, 'CSE', 'D', 'Female', 'sherlipevelina.18cse@kongu.edu', 8248728223, NULL, NULL, 'Not Verified'),
('18CSR186', 'Shree Raagav S', 2018, 'CSE', 'D', 'Male', 'shreeraagavs.18cse@kongu.edu', 9629458933, NULL, NULL, 'Not Verified'),
('18CSR187', 'Shrinidhi V', 2018, 'CSE', 'D', 'Female', 'Shrinidhi.18cse@kongu.edu', 8903411389, NULL, NULL, 'Not Verified'),
('18CSR188', 'Shwetha.K', 2018, 'CSE', 'D', 'Female', 'Shwetha.18cse@kongu.edu', 9600548274, NULL, NULL, 'Not Verified'),
('18CSR189', 'Sivakesh C R', 2018, 'CSE', 'D', 'Male', 'sivakeshcr.18cse@kongu.edu', 9597587544, NULL, NULL, 'Not Verified'),
('18CSR190', 'Sivakumar P', 2018, 'CSE', 'D', 'Male', 'sivakumarp.18cse@kongu.edu', 9944860449, NULL, NULL, 'Not Verified'),
('18CSR191', 'Sneha. K', 2018, 'CSE', 'D', 'Female', 'snehak.18cse@kongu.edu', 8270525228, NULL, NULL, 'Not Verified'),
('18CSR192', 'Snekha S', 2018, 'CSE', 'D', 'Female', 'snekhas.18cse@kongu.edu ', 7598968766, NULL, NULL, 'Not Verified'),
('18CSR193', 'Sobika. S', 2018, 'CSE', 'D', 'Female', 'sobikas.18cse@kongu.edu ', 9629455990, NULL, NULL, 'Not Verified'),
('18CSR194', 'Soundhar K K', 2018, 'CSE', 'D', 'Male', 'soundharkk.18cse@kongu.edu', 9361004012, NULL, NULL, 'Not Verified'),
('18CSR195', 'Sri Yazhini Devi M', 2018, 'CSE', 'D', 'Female', 'sriyazhinidevim.18cse@kongu.edu', 8754715901, NULL, NULL, 'Not Verified'),
('18CSR196', 'Sridhar S', 2018, 'CSE', 'D', 'Male', 'sridhars.18cse@kongu.edu', 9790559866, NULL, NULL, 'Not Verified'),
('18CSR197', 'Sridharan S', 2018, 'CSE', 'D', 'Male', 'sridharans.18cse@kongu.edu', 7358975673, NULL, NULL, 'Not Verified'),
('18CSR198', 'Srinath A', 2018, 'CSE', 'D', 'Male', 'srinatha.18cse@kongu.edu', 8610282810, NULL, NULL, 'Not Verified'),
('18CSR199', 'Srinath P', 2018, 'CSE', 'D', 'Male', 'srinathp.18cse@kongu.edu', 6383008829, NULL, NULL, 'Not Verified'),
('18CSR200', 'Subaharini C', 2018, 'CSE', 'D', 'Female', 'subaharinic.18cse@kongu.edu', 9361551428, NULL, NULL, 'Not Verified'),
('18CSR201', 'Subash.B.S', 2018, 'CSE', 'D', 'Male', 'subashbs.18cse@kongu.edu', 9843824700, NULL, NULL, 'Not Verified'),
('18CSR203', 'Suganth C', 2018, 'CSE', 'D', 'Male', 'suganthc.18cse@kongu.edu', 9842492289, NULL, NULL, 'Not Verified'),
('18CSR204', 'Sugantha Kumar G', 2018, 'CSE', 'D', 'Male', 'suganthakumarg.18cse@kongu.edu', 9842974188, NULL, NULL, 'Not Verified'),
('18CSR205', 'Sulochana M', 2018, 'CSE', 'D', 'Female', 'sulochanam.18cse@kongu.edu', 8754368482, NULL, NULL, 'Not Verified'),
('18CSR206', 'Sundareshwar V A', 2018, 'CSE', 'D', 'Male', 'sundareshwarva.18cse@kongu.edu ', 6369352583, NULL, NULL, 'Not Verified'),
('18CSR207', 'Surendar V', 2018, 'CSE', 'D', 'Male', 'surendarv.18cse@kongu.edu', 9789409299, NULL, NULL, 'Not Verified'),
('18CSR208', 'Suriya N.U', 2018, 'CSE', 'D', 'Male', 'suriyanu.18cse@kongu.edu', 8300706425, NULL, NULL, 'Not Verified'),
('18CSR209', 'Suriya Prakash V ', 2018, 'CSE', 'D', 'Male', 'suriyaprakashv.18cse@kongu.edu', 7010461983, NULL, NULL, 'Not Verified'),
('18CSR210', 'Surya Narayanan N R', 2018, 'CSE', 'D', 'Male', 'suryanarayanannr.18cse@kongu.edu', 8098633652, NULL, NULL, 'Not Verified'),
('18CSR211', 'Surya Prakash V', 2018, 'CSE', 'D', 'Male', 'suryaprakashv.18cse@kongu.edu', 6383575515, NULL, NULL, 'Not Verified'),
('18CSR212', 'Surya Rahul K', 2018, 'CSE', 'D', 'Male', 'suryarahulk.18cse@kongu.edu', 9843382449, NULL, NULL, 'Not Verified'),
('18CSR213', 'Swarna Suruthi B S', 2018, 'CSE', 'D', 'Female', 'swarnasuruthibs.18cse@kongu.edu', 6374959295, NULL, NULL, 'Not Verified'),
('18CSR214', 'Swathi.M ', 2018, 'CSE', 'D', 'Female', 'swathim.18cse@kongu.edu ', 9486181372, NULL, NULL, 'Not Verified'),
('18CSR215', 'Syed Jamal Harris R ', 2018, 'CSE', 'D', 'Male', 'syedjamalharrisr18cse@kongu.edu ', 8220457544, NULL, NULL, 'Not Verified'),
('18CSR216', 'Tamil Elakkiya K', 2018, 'CSE', 'D', 'Female', 'tamilelakkiyak.18cse@kongu.edu', 9677767234, NULL, NULL, 'Not Verified'),
('18CSR217', 'Tamilkumar R', 2018, 'CSE', 'D', 'Male', 'tamilkumarr.18cse@kongu.edu', 6382601560, NULL, NULL, 'Not Verified'),
('18CSR218', 'Taqmeel Zubeir', 2018, 'CSE', 'D', 'Male', 'taqmeelzubeir.18cse@kongu.edu', 7845383792, NULL, NULL, 'Not Verified'),
('18CSR219', 'Thaarini S', 2018, 'CSE', 'D', 'Female', 'thaarinis.18cse@kongu.edu', 9976469329, NULL, NULL, 'Not Verified'),
('18CSR220', 'Thanigachalam.A', 2018, 'CSE', 'D', 'Male', 'thanigachalama.18cse@kongu.edu', 9500759283, NULL, NULL, 'Not Verified'),
('18CSR221', 'Thejesvika S S', 2018, 'CSE', 'D', 'Female', 'thejesvikass.18cse@kongu.edu ', 8807134994, NULL, NULL, 'Not Verified'),
('18CSR222', 'Thennavan K V', 2018, 'CSE', 'D', 'Male', 'thennavankv.18cse@kongu.edu', 6369266503, NULL, NULL, 'Not Verified'),
('18CSR223', 'Udhayanidhi C', 2018, 'CSE', 'D', 'Male', 'Udhayanidhic.18cse@kongu.edu', 9361794714, NULL, NULL, 'Not Verified'),
('18CSR224', 'Vaibhav.R', 2018, 'CSE', 'D', 'Male', 'vaibhavr.18cse@kongu.edu', 9597451851, NULL, NULL, 'Not Verified'),
('18CSR225', 'Vaishnavi S', 2018, 'CSE', 'D', 'Female', 'vaishnavis.18cse@kongu.edu', 9500977257, NULL, NULL, 'Not Verified'),
('18CSR226', ' Varun Madesh R', 2018, 'CSE', 'D', 'Male', 'varunmadeshr.18cse@kongu.edu', 8098150199, NULL, NULL, 'Not Verified'),
('18CSR227', 'Vasanth Kumar T', 2018, 'CSE', 'D', 'Male', 'vasanthkumart.18cse@kongu.edu', 9698040311, NULL, NULL, 'Not Verified'),
('18CSR228', 'Veeramanikandan P', 2018, 'CSE', 'D', 'Male', 'veeramanikandanp.18cse@kongu.edu', 6383155163, NULL, NULL, 'Not Verified'),
('18CSR229', 'Vignesh V', 2018, 'CSE', 'D', 'Male', 'vigneshv.18cse@kongu.edu', 8110090266, NULL, NULL, 'Not Verified'),
('18CSR230', 'Vikash Raj T K', 2018, 'CSE', 'D', 'Male', 'vikashrajtk.18cse@kongu.edu', 8220406806, NULL, NULL, 'Not Verified'),
('18CSR231', 'Vimal Prakash N K K', 2018, 'CSE', 'D', 'Male', 'vimalprakashnkk.18cse@kongu.edu', 8838869910, NULL, NULL, 'Not Verified'),
('18CSR232', 'Vimalraj S', 2018, 'CSE', 'D', 'Male', 'vimalrajs.18cse@kongu.edu ', 8098904180, NULL, NULL, 'Not Verified'),
('18CSR233', 'Yamuna. C', 2018, 'CSE', 'D', 'Female', 'yamunac. 18cse@kongu.edu', 9600972233, NULL, NULL, 'Not Verified'),
('18CSR234', 'Yashwanth K', 2018, 'CSE', 'D', 'Male', 'yashwanthk.18cse@kongu.edu', 9994935539, NULL, NULL, 'Not Verified'),
('18CSR235', 'Yaswanth R', 2018, 'CSE', 'D', 'Male', 'yaswanthr.18cse@kongu.edu', 9842231810, NULL, NULL, 'Not Verified'),
('18CSR236', 'Yoga Priya.P', 2018, 'CSE', 'D', 'Female', 'yogapriyap.18cse@kongu.edu ', 6383756038, NULL, NULL, 'Not Verified'),
('18CSR237', 'Yokesh P', 2018, 'CSE', 'D', 'Male', 'yokeshp.18cse@kongu.edu', 7695946628, NULL, NULL, 'Not Verified'),
('18CSR238', 'Yuvan Prasad.S', 2018, 'CSE', 'D', 'Male', 'yuvanprasads.18cse@kongu.edu', 7845516789, NULL, NULL, 'Not Verified'),
('19CSR001', 'Aathish R', 2019, 'CSE', 'A', 'Male', 'aathishr.19cse@kongu.edu', 9677993475, NULL, NULL, 'Not Verified'),
('19CSR002', 'Abinaya.C ', 2019, 'CSE', 'A', 'Female', 'abinayac.19cse@kongu.edu ', 9361117693, NULL, '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Verified'),
('19CSR003', 'Abishankari S', 2019, 'CSE', 'A', 'Female', 'abishankaris.19cse@kongu.edu ', 9344361382, NULL, NULL, 'Not Verified'),
('19CSR004', 'Abishek.A', 2019, 'CSE', 'A', 'Male', 'abisheka.19cse@kongu.edu', 8098618013, NULL, NULL, 'Not Verified'),
('19CSR005', 'Aishwarya.K', 2019, 'CSE', 'A', 'Female', 'aishwaryak.19cse@kongu.edu', 8072283853, NULL, NULL, 'Not Verified'),
('19CSR006', 'Akash.M', 2019, 'CSE', 'A', 'Male', 'akashm.19cse@kongu.edu', 9976607000, NULL, NULL, 'Not Verified'),
('19CSR007', 'Akshay Prabu V S', 2019, 'CSE', 'A', 'Male', 'akshayprabuvs.19cse@kongu.edu', 9095404633, NULL, NULL, 'Not Verified'),
('19CSR008', 'Amal Hadeez F', 2019, 'CSE', 'A', 'Male', 'amalhadeezf.19cse@kongu.edu', 8608612481, NULL, NULL, 'Not Verified'),
('19CSR009', 'Aravindh.T', 2019, 'CSE', 'A', 'Male', 'aravindht.19cse@kongu.edu', 9159738732, NULL, NULL, 'Not Verified'),
('19CSR010', 'Archana S', 2019, 'CSE', 'A', 'Female', 'archanas.19cse@kongu.edu', 9384257033, NULL, NULL, 'Not Verified'),
('19CSR011', 'Arun G', 2019, 'CSE', 'A', 'Male', 'arung.19cse@kongu.edu', 8680998175, NULL, NULL, 'Not Verified'),
('19CSR012', 'Arun Prabu.A.S.', 2019, 'CSE', 'A', 'Male', 'arunprabuas.19cse@kongu.edu', 6385439495, NULL, NULL, 'Not Verified'),
('19CSR013', 'Ashok R', 2019, 'CSE', 'A', 'Male', 'ashokr.19cse@kongu.edu', 6381678198, NULL, NULL, 'Not Verified'),
('19CSR014', 'Ashwanth V Praveen', 2019, 'CSE', 'A', 'Male', 'ashwanthvpraveen.19cse@kongu.edu', 7200831840, NULL, NULL, 'Not Verified'),
('19CSR015', 'Bharani S', 2019, 'CSE', 'A', 'Male', 'bharanis.19cse@kongu.edu', 7339483047, NULL, NULL, 'Not Verified'),
('19CSR016', 'Bharathi S', 2019, 'CSE', 'A', 'Female', 'bharathis.19cse@kongu.edu', 6383054118, NULL, NULL, 'Not Verified'),
('19CSR017', 'Boomika Ebb', 2019, 'CSE', 'A', 'Female', 'boomikaebb.19cse@kongu.edu', 9443054049, NULL, NULL, 'Not Verified'),
('19CSR018', 'Boomika R B', 2019, 'CSE', 'A', 'Female', 'boomikarb.19cse@kongu.edu', 6385221033, NULL, NULL, 'Not Verified'),
('19CSR019', 'Brindha.G', 2019, 'CSE', 'A', 'Female', 'brindhag.19cse@kongu.edu', 9150748656, NULL, '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Verified'),
('19CSR020', 'Chandeep G', 2019, 'CSE', 'A', 'Male', 'chandeepg.19cse@kongu.edu', 6374061856, NULL, NULL, 'Not Verified'),
('19CSR021', 'Charanraj.T', 2019, 'CSE', 'A', 'Male', 'charanrajt.19cse@kongu.edu', 8825850137, NULL, NULL, 'Not Verified'),
('19CSR022', 'Cibikumar M V', 2019, 'CSE', 'A', 'Male', 'cibikumarmv.19cse@kongu.edu', 8667216323, NULL, NULL, 'Not Verified'),
('19CSR023', 'Danushraj K S', 2019, 'CSE', 'A', 'Male', 'danushrajks.19cse@kongu.edu', 8220460501, NULL, NULL, 'Not Verified'),
('19CSR024', 'Deepadharshini S', 2019, 'CSE', 'A', 'Female', 'deepadharshinis.19cse@kongu.edu', 9500287578, NULL, NULL, 'Not Verified'),
('19CSR025', 'Deepika P ', 2019, 'CSE', 'A', 'Female', 'deepikap.19cse@kongu.edu ', 6379118959, NULL, NULL, 'Not Verified'),
('19CSR026', 'Deepthi.N', 2019, 'CSE', 'A', 'Female', 'deepthin.19cse@kongu.edu', 7010740233, NULL, NULL, 'Not Verified'),
('19CSR027', 'Deva P', 2019, 'CSE', 'A', 'Male', 'devap.19cse@kongu.edu', 8940427673, NULL, NULL, 'Not Verified'),
('19CSR028', 'Dhana Sre M', 2019, 'CSE', 'A', 'Female', 'dhanasrem.19cse@kongu.edu ', 9629836189, NULL, NULL, 'Not Verified'),
('19CSR029', 'Dhana Sree. R', 2019, 'CSE', 'A', 'Female', 'dhanasreer.19cse@kongu.edu', 9150947286, NULL, NULL, 'Not Verified'),
('19CSR030', 'Dhanush P', 2019, 'CSE', 'A', 'Male', 'dhanushp.19cse@kongu.edu', 8778970040, NULL, NULL, 'Not Verified'),
('19CSR031', 'Dhanvarsini P', 2019, 'CSE', 'A', 'Female', 'dhanvarsinip.19cse@kongu.edu', 7904410108, NULL, NULL, 'Not Verified'),
('19CSR032', 'Dharaaneshwaran S', 2019, 'CSE', 'A', 'Male', 'dharaaneshwarans.19cse@kongu.edu', 9360066055, NULL, NULL, 'Not Verified'),
('19CSR033', 'Dharaneesh K T', 2019, 'CSE', 'A', 'Male', 'dharaneeshkt.19cse@kongu.edu', 9360066055, NULL, NULL, 'Not Verified'),
('19CSR034', 'Dharanesh S', 2019, 'CSE', 'A', 'Male', 'dharaneshs.19cse@kongu.edu', 9791769565, NULL, NULL, 'Not Verified'),
('19CSR035', 'Dharani.R', 2019, 'CSE', 'A', 'Female', 'dharanir.19cse@kongu.edu', 9894899690, NULL, NULL, 'Not Verified'),
('19CSR036', 'Dharani G', 2019, 'CSE', 'A', 'Female', 'dharanig.19cse@kongu.edu', 9361481422, NULL, NULL, 'Not Verified'),
('19CSR037', 'Dharanidharan. R', 2019, 'CSE', 'A', 'Male', 'dharanidharanr. 19cse@kongu.edu', 9360327356, NULL, NULL, 'Not Verified'),
('19CSR038', 'Dharshini R ', 2019, 'CSE', 'A', 'Female', 'dharshinir.19cse@kongu.edu', 6379718903, NULL, NULL, 'Not Verified'),
('19CSR039', 'Dhivya A', 2019, 'CSE', 'A', 'Female', 'dhivyaa.19cse@kongu.edu', 8056800137, NULL, NULL, 'Not Verified'),
('19CSR040', 'Dhivya.S', 2019, 'CSE', 'A', 'Female', 'dhivyas.19cse@kongu.edu', 8778080866, NULL, NULL, 'Not Verified'),
('19CSR041', 'Divya.S', 2019, 'CSE', 'A', 'Female', 'divyas.19cse@kongu.edu', 8438541339, NULL, NULL, 'Not Verified'),
('19CSR042', 'Ganeshkumar.S', 2019, 'CSE', 'A', 'Male', 'ganeshkumars.19cse@kongu.edu', 8072964215, NULL, NULL, 'Not Verified'),
('19CSR043', 'Goghul. S', 2019, 'CSE', 'A', 'Male', 'goghuls.19cse@kongu.edu', 9360472728, NULL, NULL, 'Not Verified'),
('19CSR044', 'Gokula Kannan G', 2019, 'CSE', 'A', 'Male', 'gokulakannang.19cse@kongu.edu', 9043322155, NULL, NULL, 'Not Verified'),
('19CSR045', 'Gomanishwaran S', 2019, 'CSE', 'A', 'Male', 'gomanishwarans.19cse@kongu.edu', 6369758058, NULL, NULL, 'Not Verified'),
('19CSR046', 'Gowri. P', 2019, 'CSE', 'A', 'Female', 'gowrip.19cse@kongu.edu', 6381207610, NULL, NULL, 'Not Verified'),
('19CSR047', 'Gowtham.V', 2019, 'CSE', 'A', 'Male', 'gowthamv.19cse@kongu.edu', 8825806427, NULL, '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Verified'),
('19CSR048', 'Gurudeepa. R', 2019, 'CSE', 'A', 'Female', 'gurudeepar.19cse@kongu.edu ', 7358976245, NULL, NULL, 'Not Verified'),
('19CSR049', 'Hareesh Raj. R', 2019, 'CSE', 'A', 'Male', 'hareeshrajr.19cse@kongu.edu', 8667330395, NULL, NULL, 'Not Verified'),
('19CSR050', 'Hari Prasath. P', 2019, 'CSE', 'A', 'Male', 'hariprasathp. 19cse@kongu.edu', 9360687365, NULL, NULL, 'Not Verified'),
('19CSR051', 'Hari Vignesh K G ', 2019, 'CSE', 'A', 'Male', 'harivigneshkg.19cse@kongu.edu ', 9952598419, NULL, NULL, 'Not Verified'),
('19CSR052', 'Hariharan G', 2019, 'CSE', 'A', 'Male', 'hariharang.19cse@kongu.edu', 9965277280, NULL, NULL, 'Not Verified'),
('19CSR053', 'Hariharan T', 2019, 'CSE', 'A', 'Male', 'hariharant.19cse@kongu.edu', 9360709021, NULL, NULL, 'Not Verified'),
('19CSR054', 'Haris S ', 2019, 'CSE', 'A', 'Male', 'hariss19cse@kongu.edu', 8825763513, NULL, NULL, 'Not Verified'),
('19CSR055', 'Harish M ', 2019, 'CSE', 'A', 'Male', 'harishm.19cse@kongu.edu', 9597052229, NULL, '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Verified'),
('19CSR056', 'Harish K P', 2019, 'CSE', 'A', 'Male', 'harishkp.19cse@kongu.edu', 6383215551, NULL, NULL, 'Not Verified'),
('19CSR057', 'Harishraaj.S', 2019, 'CSE', 'A', 'Male', 'harishraajs.19cse@kongu.edu', 9003673507, NULL, NULL, 'Not Verified'),
('19CSR058', 'Harisudhan S ', 2019, 'CSE', 'A', 'Male', 'harisudhans.19cse@kongu.edu ', 7339462599, NULL, NULL, 'Not Verified'),
('19CSR059', 'Haritha.S', 2019, 'CSE', 'A', 'Female', 'harithas.19cse@kongu.edu', 9488178166, NULL, NULL, 'Not Verified'),
('19CSR061', 'Harshiny.A', 2019, 'CSE', 'B', 'Female', 'harshinya.19cse@kongu.edu', 9080575075, NULL, NULL, 'Not Verified'),
('19CSR062', 'Harshit.R', 2019, 'CSE', 'B', 'Male', 'harshitr.19cse@kongu.edu', 8248926087, NULL, NULL, 'Not Verified'),
('19CSR063', 'Hemalatha. P', 2019, 'CSE', 'B', 'Female', 'hemalathap.19cse@kongu.edu', 9786159741, NULL, NULL, 'Not Verified'),
('19CSR064', 'Indhu Prakash K V', 2019, 'CSE', 'B', 'Male', 'indhuprakashkv.19cse@kongu.edu', 9698727835, NULL, NULL, 'Not Verified'),
('19CSR065', 'Indrajith M', 2019, 'CSE', 'B', 'Male', 'indrajithm.19cse@kongu.edu', 7373586833, NULL, NULL, 'Not Verified'),
('19CSR066', 'Ishwarya.S', 2019, 'CSE', 'B', 'Female', 'ishwaryas.19cse@kongu.edu', 9361147299, NULL, NULL, 'Not Verified'),
('19CSR067', 'Jagadeesh  S', 2019, 'CSE', 'B', 'Male', 'jagadeeshs.19cse@kongu.edu', 6383538951, NULL, NULL, 'Not Verified'),
('19CSR068', 'Jagadeeswaran.V.V', 2019, 'CSE', 'B', 'Male', 'jagadeeswaranvv.19cse@kongu.edu', 9360397259, NULL, NULL, 'Not Verified'),
('19CSR069', 'Janani .N', 2019, 'CSE', 'B', 'Female', 'jananin.19cse@kongu.edu', 9361578848, NULL, NULL, 'Not Verified'),
('19CSR070', 'Jayachandran P', 2019, 'CSE', 'B', 'Male', 'jayachandranp.19cse@kongu.edu', 9600599745, NULL, NULL, 'Not Verified'),
('19CSR071', 'Jayaram S', 2019, 'CSE', 'B', 'Male', 'jayarams.19cse@kongu.edu', 9360968846, NULL, NULL, 'Not Verified'),
('19CSR072', 'Jayesh Krishna K ', 2019, 'CSE', 'B', 'Male', 'jayeshkrishnak.19cse@kongu.edu ', 9360115856, NULL, NULL, 'Not Verified'),
('19CSR073', 'Jeevika P S', 2019, 'CSE', 'B', 'Female', 'jeevikaps.19cse@kongu.edu', 9361337742, NULL, NULL, 'Not Verified'),
('19CSR074', 'Kalanjiya Vishnu J', 2019, 'CSE', 'B', 'Male', 'kalanjiyavishnuj.19cse@kongu.edu', 6385204639, NULL, NULL, 'Not Verified'),
('19CSR075', 'Kaneeshka.S', 2019, 'CSE', 'B', 'Female', 'Kaneeshkas.19cse@kongu.edu ', 9787414040, NULL, NULL, 'Not Verified'),
('19CSR076', 'Karan.N.S', 2019, 'CSE', 'B', 'Male', 'karanns.19cse@kongu.edu', 9360675159, NULL, NULL, 'Not Verified'),
('19CSR077', 'Karmukil. D', 2019, 'CSE', 'B', 'Male', 'karmukild.19cse@kongu.edu', 8825544194, NULL, NULL, 'Not Verified'),
('19CSR078', 'Karthick R', 2019, 'CSE', 'B', 'Male', 'Karthickr.19cse@kongu.edu', 9080962267, NULL, NULL, 'Not Verified'),
('19CSR079', 'Kasthuri Rangan.S', 2019, 'CSE', 'B', 'Male', 'Kasthurirangans.19cse@kongu.edu', 8220061567, NULL, NULL, 'Not Verified'),
('19CSR080', 'Kavibharathi B', 2019, 'CSE', 'B', 'Female', 'Kavibharathib.19cse@kongu.edu', 9361588801, NULL, NULL, 'Not Verified'),
('19CSR081', 'Kavin. M', 2019, 'CSE', 'B', 'Male', 'Kavinm.19cse@kongu.edu', 7339080548, NULL, NULL, 'Not Verified'),
('19CSR082', 'Kavin Bharathi K C', 2019, 'CSE', 'B', 'Male', 'kavinbharathikc.19cse@kongu.edu', 8892242456, NULL, NULL, 'Not Verified'),
('19CSR083', 'Kavin T', 2019, 'CSE', 'B', 'Male', 'kavint.19cse@kongu.edu', 8940989582, NULL, NULL, 'Not Verified'),
('19CSR084', 'Kavinbharathi A', 2019, 'CSE', 'B', 'Male', 'kavinbharathia.19cse@kongu.edu', 9384592406, NULL, NULL, 'Not Verified'),
('19CSR085', 'Kavinsri. K', 2019, 'CSE', 'B', 'Male', 'kavinsrik.19cse@kongu.edu', 9688225518, NULL, NULL, 'Not Verified'),
('19CSR086', 'Kaviraj. N. N', 2019, 'CSE', 'B', 'Male', 'kavirajnn.19cse@kongu.edu', 9789617949, NULL, NULL, 'Not Verified'),
('19CSR087', 'Kavyapriya J.G', 2019, 'CSE', 'B', 'Female', 'kavyapriyajg.19cse@kongu.edu', 9361595795, NULL, NULL, 'Not Verified'),
('19CSR088', 'Keerthana R', 2019, 'CSE', 'B', 'Female', 'keerthanar.19cse@kongu.edu', 9360365185, NULL, NULL, 'Not Verified'),
('19CSR089', 'Kirthiknimalan.S.K', 2019, 'CSE', 'B', 'Male', 'kirthiknimalansk.19cse@kongu.edu', 9489500448, NULL, NULL, 'Not Verified'),
('19CSR090', 'Kousalya R.V', 2019, 'CSE', 'B', 'Female', 'kousalyarv.19cse@kongu.edu ', 9360706008, NULL, NULL, 'Not Verified'),
('19CSR091', 'Kowsalya.S', 2019, 'CSE', 'B', 'Female', 'kowsalyas.19cse@kongu.edu', 6385465675, NULL, NULL, 'Not Verified'),
('19CSR092', 'Kowsika C', 2019, 'CSE', 'B', 'Female', 'kowsikac.19cse@kongu.edu', 9677862271, NULL, NULL, 'Not Verified'),
('19CSR093', 'Krithika Tharani A.S', 2019, 'CSE', 'B', 'Female', 'krithikatharanias.19cse@kongu.edu', 9361422286, NULL, NULL, 'Not Verified'),
('19CSR094', 'Lalith Mohan  S', 2019, 'CSE', 'B', 'Male', 'lalithmohans.19cse@kongu.edu', 9150498848, NULL, NULL, 'Not Verified'),
('19CSR095', 'Logesh R', 2019, 'CSE', 'B', 'Male', 'logeshr.19cse@kongu.edu', 7358820898, NULL, NULL, 'Not Verified'),
('19CSR096', 'Maamathi K', 2019, 'CSE', 'B', 'Female', 'maamathik.19cse@kongu.edu', 9442621737, NULL, NULL, 'Not Verified'),
('19CSR097', 'Madhan.S', 2019, 'CSE', 'B', 'Male', 'madhans.19cse@kongu.edu', 9080768897, NULL, NULL, 'Not Verified'),
('19CSR098', 'Madhesan G', 2019, 'CSE', 'B', 'Male', 'madhesang.19cse@kongu.edu', 9843950193, NULL, NULL, 'Not Verified'),
('19CSR099', 'Madhumitha.E', 2019, 'CSE', 'B', 'Female', 'madhumithae.19cse@kongu.edu', 9345307191, NULL, NULL, 'Not Verified'),
('19CSR100', 'Maheshvar.A', 2019, 'CSE', 'B', 'Male', 'maheshvara.19cse@kongu.edu', 9487508199, NULL, NULL, 'Not Verified'),
('19CSR101', 'Manodharshini S', 2019, 'CSE', 'B', 'Female', 'manodharshinis.19cse@kongu.edu', 9943740109, NULL, NULL, 'Not Verified'),
('19CSR102', 'Manoj. S', 2019, 'CSE', 'B', 'Male', 'manojs.19cse@kongu.edu ', 9080311563, NULL, NULL, 'Not Verified'),
('19CSR103', 'Manoj Kumar P', 2019, 'CSE', 'B', 'Male', 'manojkumarp.19cse@kongu.edu', 9487665722, NULL, NULL, 'Not Verified'),
('19CSR104', 'Marimuthu.P', 2019, 'CSE', 'B', 'Male', 'marimuthup.19cse@kongu.edu', 9445642303, NULL, NULL, 'Not Verified'),
('19CSR105', 'Mathiarasi N', 2019, 'CSE', 'B', 'Female', 'mathiarasin.19cse@kongu.edu', 9629784033, NULL, NULL, 'Not Verified'),
('19CSR106', 'Mithun K V', 2019, 'CSE', 'B', 'Male', 'mithunkv.19cse@kongu.edu', 9361089696, NULL, NULL, 'Not Verified'),
('19CSR107', 'Mithun P', 2019, 'CSE', 'B', 'Male', 'mithunp.19cse@kongu.edu', 9360857162, NULL, NULL, 'Not Verified'),
('19CSR108', 'Mohamedroshan .M', 2019, 'CSE', 'B', 'Male', 'mohamedroshanm.19cse@kongu.edu', 9080036319, NULL, NULL, 'Not Verified'),
('19CSR110', 'Monisha A', 2019, 'CSE', 'B', 'Female', 'monishaa. 19cse@kongu.edu', 8903824139, NULL, NULL, 'Not Verified'),
('19CSR111', 'Mugilan.M', 2019, 'CSE', 'B', 'Male', 'mugilanm.19cse@kongu.edu', 9361302471, NULL, NULL, 'Not Verified'),
('19CSR112', 'Muthupriyanka R', 2019, 'CSE', 'B', 'Female', 'muthupriyankar.19cse@kongu.edu', 6382847452, NULL, NULL, 'Not Verified'),
('19CSR113', 'Mythili. E', 2019, 'CSE', 'B', 'Female', 'mythilie.19cse@kongu.edu', 9361005335, NULL, NULL, 'Not Verified'),
('19CSR114', 'Naishad M', 2019, 'CSE', 'B', 'Male', 'naishadm.19cse@kongu.edu ', 9080418894, NULL, NULL, 'Not Verified'),
('19CSR115', 'Nandha Kishore K.C', 2019, 'CSE', 'B', 'Male', 'nandhakishorekc.19cse@kongu.edu', 9943964868, NULL, NULL, 'Not Verified'),
('19CSR116', 'Nanda Kishore M A', 2019, 'CSE', 'B', 'Male', 'nandhakishorema.19cse@kongu.edu', 9786777733, NULL, NULL, 'Not Verified'),
('19CSR117', 'Nandhakumar R G', 2019, 'CSE', 'C', 'Male', 'nandhakumarrg.19cse@kongu.edu', 9159786550, NULL, NULL, 'Not Verified'),
('19CSR118', 'Nandhidha G C', 2019, 'CSE', 'C', 'Female', 'nandhidhagc.19cse@kongu.edu', 9629364600, NULL, NULL, 'Not Verified'),
('19CSR119', 'Nandhinidevi.S', 2019, 'CSE', 'C', 'Female', 'nandhinidevis.19cse@kongu.edu', 9361540601, NULL, NULL, 'Not Verified'),
('19CSR120', 'Nanthini Pl', 2019, 'CSE', 'C', 'Female', 'nanthinipl.19cse@kongu.edu', 6381718842, NULL, NULL, 'Not Verified'),
('19CSR121', 'Nanthini R', 2019, 'CSE', 'C', 'Female', 'nanthinir.19cse@kongu.edu', 8428131821, NULL, NULL, 'Not Verified'),
('19CSR122', 'Nikhalyaa S', 2019, 'CSE', 'C', 'Female', 'nikhalyaas. 19cse@kongu.edu', 9360779112, NULL, NULL, 'Not Verified'),
('19CSR123', 'Nisanth S', 2019, 'CSE', 'C', 'Male', 'nisanths.19cse@kongu.edu', 8344730505, NULL, NULL, 'Not Verified'),
('19CSR124', 'Nishanth S', 2019, 'CSE', 'C', 'Male', 'Nishanths.19cse@kongu.edu', 8825924127, NULL, NULL, 'Not Verified'),
('19CSR125', 'Nithiesh B', 2019, 'CSE', 'C', 'Male', 'nithieshb.19cse@kongu.edu', 9786435067, NULL, NULL, 'Not Verified'),
('19CSR126', 'Nivanjitha. K', 2019, 'CSE', 'C', 'Female', 'nivanjithak.19cse@kongu.edu ', 6383222900, NULL, NULL, 'Not Verified'),
('19CSR127', 'Nivas.S', 2019, 'CSE', 'C', 'Male', 'nivass.19cse@kongu.edu', 8870438384, NULL, NULL, 'Not Verified'),
('19CSR128', 'Nivveydhaa.S.P', 2019, 'CSE', 'C', 'Female', 'nivveydhaasp.19cse@kongu.edu', 6384688561, NULL, NULL, 'Not Verified'),
('19CSR129', 'Noor Arfin A', 2019, 'CSE', 'C', 'Male', 'noorarfina.19cse@kongu.edu', 8489300593, NULL, NULL, 'Not Verified'),
('19CSR130', 'Oviya.D ', 2019, 'CSE', 'C', 'Female', 'oviyad.19cse@kongu.edu ', 6379895536, NULL, NULL, 'Not Verified'),
('19CSR131', 'Parkavi.M', 2019, 'CSE', 'C', 'Female', 'parakavim.19cse@kongu.edu', 9384325910, NULL, NULL, 'Not Verified'),
('19CSR132', 'Pavithran. M', 2019, 'CSE', 'C', 'Male', 'pavithranm.19cse@kongu.edu', 9578158550, NULL, NULL, 'Not Verified'),
('19CSR133', 'Ponmathi K', 2019, 'CSE', 'C', 'Female', 'ponmathik.19cse@kongu.edu', 9150692375, NULL, NULL, 'Not Verified'),
('19CSR134', 'Poorva Kowshik V S', 2019, 'CSE', 'C', 'Male', 'poorvakowshikvs.19cse@kongu.edu', 9360197366, NULL, NULL, 'Not Verified'),
('19CSR135', 'Pragati Shantaram Jadhav', 2019, 'CSE', 'C', 'Female', 'pragatishantaramjadhav.19cse@kongu.edu', 9360201733, NULL, NULL, 'Not Verified'),
('19CSR136', 'Prajeeth.M', 2019, 'CSE', 'C', 'Male', 'prajeethm.19cse@kongu.edu', 9047634447, NULL, NULL, 'Not Verified'),
('19CSR137', 'Pranesh.T', 2019, 'CSE', 'C', 'Male', 'pranesht.19cse@kongu.edu', 6379444252, NULL, NULL, 'Not Verified'),
('19CSR138', 'Pranesh.V.R', 2019, 'CSE', 'C', 'Male', 'praneshvr.19cse@kongu.edu', 9944088876, NULL, NULL, 'Not Verified'),
('19CSR140', 'Praveen B', 2019, 'CSE', 'C', 'Male', 'praveenb.19cse@kongu.edu', 6379477657, NULL, NULL, 'Not Verified'),
('19CSR141', 'Praveen Raja. C. K', 2019, 'CSE', 'C', 'Male', 'praveenrajack.19cse@kongu.edu', 9360423155, NULL, NULL, 'Not Verified'),
('19CSR142', 'Pravin B', 2019, 'CSE', 'C', 'Male', 'pravinb.19cse@kongu.edu', 7092372245, NULL, NULL, 'Not Verified'),
('19CSR143', 'Pravinkumar P', 2019, 'CSE', 'C', 'Male', 'pravinkumarp.19cse@kongu.edu', 8072529746, NULL, NULL, 'Not Verified'),
('19CSR144', 'Pravin Kumar.S', 2019, 'CSE', 'C', 'Male', 'pravinkumars.19cse@kongu.edu', 9345685601, NULL, NULL, 'Not Verified'),
('19CSR145', 'Preethi.S ', 2019, 'CSE', 'C', 'Female', 'Preethis.19cse@kongu.edu ', 6385581841, NULL, NULL, 'Not Verified'),
('19CSR146', 'Preethika S', 2019, 'CSE', 'C', 'Female', 'preethikas.19cse@kongu.edu', 7708739283, NULL, NULL, 'Not Verified'),
('19CSR147', 'Prema M', 2019, 'CSE', 'C', 'Female', 'premam.19cse@kongu.edu', 8428256327, NULL, NULL, 'Not Verified'),
('19CSR148', 'Premnath S', 2019, 'CSE', 'C', 'Male', 'premnaths.19cse@kongu.edu', 6379378194, NULL, NULL, 'Not Verified'),
('19CSR149', 'Priyadharshini S', 2019, 'CSE', 'C', 'Female', 'priyadharshinis.19cse@kongu.edu', 8925672661, NULL, NULL, 'Not Verified'),
('19CSR150', 'Raguram G P', 2019, 'CSE', 'C', 'Male', 'raguramgp.19cse@kongu.edu', 6374392765, NULL, NULL, 'Not Verified'),
('19CSR151', 'Rahul S', 2019, 'CSE', 'C', 'Male', 'rahuls.19cse@kongu.edu', 9361305824, NULL, NULL, 'Not Verified'),
('19CSR152', 'Ranjith C', 2019, 'CSE', 'C', 'Male', 'ranjithc.19cse@kongu.edu', 9488723320, NULL, NULL, 'Not Verified'),
('19CSR153', 'Ranjith K.S ', 2019, 'CSE', 'C', 'Male', 'ranjithks.19cse@kongu.edu', 9360698915, NULL, NULL, 'Not Verified'),
('19CSR154', 'Raveen.A', 2019, 'CSE', 'C', 'Male', 'raveena.19cse@kongu.edu', 8056750411, NULL, NULL, 'Not Verified'),
('19CSR155', 'Ravichandran B', 2019, 'CSE', 'C', 'Male', 'ravichandranb.19cse@kongu.edu', 6383344764, NULL, NULL, 'Not Verified'),
('19CSR156', 'Reshma. S', 2019, 'CSE', 'C', 'Female', 'reshmas.19cse@kongu.edu', 9360814012, NULL, NULL, 'Not Verified'),
('19CSR157', 'Richard Joyal G', 2019, 'CSE', 'C', 'Male', 'richardjoyalg.19cse@kongu.edu', 9360449264, NULL, NULL, 'Not Verified'),
('19CSR158', 'Rinisha K', 2019, 'CSE', 'C', 'Female', 'rinishak.19cse@kongu.edu', 9597797104, NULL, NULL, 'Not Verified'),
('19CSR159', 'Rishi.B', 2019, 'CSE', 'C', 'Male', 'rishib.19cse@kongu.edu', 9360400350, NULL, NULL, 'Not Verified'),
('19CSR160', 'Rishika.M', 2019, 'CSE', 'C', 'Female', 'rishikam.19cse@kongu.edu', 6380556986, NULL, NULL, 'Not Verified'),
('19CSR161', 'Rithane.K.S', 2019, 'CSE', 'C', 'Female', 'rithaneks.19cse@kongu.edu', 9361157797, NULL, NULL, 'Not Verified'),
('19CSR162', 'Rithani A M', 2019, 'CSE', 'C', 'Female', 'rithaniam.19cse@kongu.edu', 6379541301, NULL, NULL, 'Not Verified'),
('19CSR163', 'Robin J', 2019, 'CSE', 'C', 'Male', 'robinj.19cse@kongu.edu', 9788079110, NULL, NULL, 'Not Verified'),
('19CSR164', 'Rohit M', 2019, 'CSE', 'C', 'Male', 'rohitm.19cse@kongu.edu', 6380486757, NULL, NULL, 'Not Verified'),
('19CSR165', 'Rohith Vignesh E', 2019, 'CSE', 'C', 'Male', 'rohithvigneshe.19cse@kongu.edu', 9385865677, NULL, NULL, 'Not Verified'),
('19CSR166', 'Sakthivishnu B ', 2019, 'CSE', 'C', 'Male', 'sakthivishnub.19cse@kongu.edu', 8610408854, NULL, NULL, 'Not Verified'),
('19CSR167', 'Samithraj K', 2019, 'CSE', 'C', 'Male', 'samithrajk.19cse@kongu.edu ', 8825636642, NULL, NULL, 'Not Verified'),
('19CSR168', 'Sandeep R', 2019, 'CSE', 'C', 'Male', 'sandeepr.19cse@kongu.edu', 9500264191, NULL, NULL, 'Not Verified'),
('19CSR169', 'Sandhiya D', 2019, 'CSE', 'C', 'Female', 'sandhiyad. 19cse@kongu.edu', 6374826785, NULL, NULL, 'Not Verified'),
('19CSR170', 'Sandhiya.K', 2019, 'CSE', 'C', 'Female', 'sandhiyak.19cse@kongu.edu', 9994256122, NULL, NULL, 'Not Verified'),
('19CSR171', 'Sanjeev S', 2019, 'CSE', 'C', 'Male', 'sanjeevs.19cse@kongu.edu', 9488230970, NULL, NULL, 'Not Verified'),
('19CSR172', 'Sanjeevkumar R', 2019, 'CSE', 'C', 'Male', 'sanjeevkumarr.19cse@kongu.edu', 9894779266, NULL, NULL, 'Not Verified'),
('19CSR173', 'Sanjith.M', 2019, 'CSE', 'C', 'Male', 'sanjithm.19cse@kongu.edu', 8220286613, NULL, NULL, 'Not Verified'),
('19CSR174', 'Santhiya. R', 2019, 'CSE', 'C', 'Female', 'santhiyar.19cse@kongu.edu', 9025561464, NULL, NULL, 'Not Verified'),
('19CSR175', 'Santhosh G', 2019, 'CSE', 'D', 'Male', 'santhoshg.19cse@kongu.edu', 9442618801, NULL, NULL, 'Not Verified'),
('19CSR176', 'Santhosh Kumar C', 2019, 'CSE', 'D', 'Male', 'santhoshkumarc.19cse@kongu.edu', 6383211260, NULL, NULL, 'Not Verified'),
('19CSR177', 'Saran E', 2019, 'CSE', 'D', 'Male', 'sarane.19cse@kongu.edu', 8072108814, NULL, NULL, 'Not Verified'),
('19CSR178', 'Saran Kumar S', 2019, 'CSE', 'D', 'Male', 'sarankumars.19cse@kongu.edu', 8825915295, NULL, NULL, 'Not Verified'),
('19CSR179', 'Saran S', 2019, 'CSE', 'D', 'Male', 'sarans.19cse@kongu.edu', 9500568922, NULL, NULL, 'Not Verified'),
('19CSR180', 'Saranya A', 2019, 'CSE', 'D', 'Female', 'saranyaa.19cse@kongu.edu', 8220016840, NULL, NULL, 'Not Verified'),
('19CSR182', 'Sathana V', 2019, 'CSE', 'D', 'Female', 'sathanav.19cse@kongu.edu', 7708093402, NULL, NULL, 'Not Verified'),
('19CSR183', 'Sathiya Shri N', 2019, 'CSE', 'D', 'Female', 'sathiyashrin.19cse@kongu.edu', 8072325643, NULL, NULL, 'Not Verified'),
('19CSR184', 'Sathya K', 2019, 'CSE', 'D', 'Female', 'sathyak.19cse@kongu.edu', 6369423906, NULL, NULL, 'Not Verified'),
('19CSR185', 'Shanmuga Priya S', 2019, 'CSE', 'D', 'Female', 'shanmugapriyas.19cse@kongu.edu', 9025669924, NULL, NULL, 'Not Verified'),
('19CSR186', 'Shekkylar K', 2019, 'CSE', 'D', 'Male', 'shekkylark.19cse@kongu.edu', 9361472502, NULL, NULL, 'Not Verified'),
('19CSR187', 'Sivakumar P', 2019, 'CSE', 'D', 'Male', 'sivakumarp.19cse@kongu.edu', 9788105369, NULL, NULL, 'Not Verified'),
('19CSR188', 'Sowbarnika P S', 2019, 'CSE', 'D', 'Female', 'sowbarnikaps.19cse@kongu.edu', 6385536690, NULL, NULL, 'Not Verified'),
('19CSR189', 'Sowbhakian E S', 2019, 'CSE', 'D', 'Male', 'sowbhakianes.19cse@kongu.edu', 9488120036, NULL, NULL, 'Not Verified'),
('19CSR190', 'Sri Balaji M', 2019, 'CSE', 'D', 'Male', 'sribalajim.19cse@kongu.edu', 6374794516, NULL, NULL, 'Not Verified'),
('19CSR191', 'Sri Rakesh K', 2019, 'CSE', 'D', 'Male', 'srirakeshk.19cse@kongu.edu', 9443012147, NULL, NULL, 'Not Verified'),
('19CSR192', 'Srimathi S', 2019, 'CSE', 'D', 'Female', 'srimathis.19cse@kongu.edu', 9360269926, NULL, NULL, 'Not Verified'),
('19CSR193', 'Sriraam R V', 2019, 'CSE', 'D', 'Male', 'sriraamrv.19cse@kongu.edu', 9787840048, NULL, NULL, 'Not Verified'),
('19CSR194', 'Srivarshan T', 2019, 'CSE', 'D', 'Male', 'srivarshant.19cse@kongu.edu', 9344976481, NULL, NULL, 'Not Verified'),
('19CSR195', 'Sruthi R', 2019, 'CSE', 'D', 'Female', 'sruthir.19cse@kongu.edu', 9150110300, NULL, NULL, 'Not Verified'),
('19CSR196', 'Subaharini V', 2019, 'CSE', 'D', 'Female', 'subahariniv.19cse@kongu.edu', 6374173544, NULL, NULL, 'Not Verified'),
('19CSR197', 'Subalakshmi G', 2019, 'CSE', 'D', 'Female', 'subalakshmig.19cse@kongu.edu', 6385547674, NULL, NULL, 'Not Verified'),
('19CSR198', 'Subhiksha S', 2019, 'CSE', 'D', 'Female', 'subhikshas.19cse@kongu.edu', 9361433780, NULL, NULL, 'Not Verified'),
('19CSR199', 'Sudharsan N', 2019, 'CSE', 'D', 'Male', 'sudharsann.19cse@kongu.edu', 9787149328, NULL, NULL, 'Not Verified'),
('19CSR200', 'Sudharshini B', 2019, 'CSE', 'D', 'Female', 'sudharshinib.19cse@kongu.edu', 9047725408, NULL, NULL, 'Not Verified'),
('19CSR201', 'Suja S', 2019, 'CSE', 'D', 'Female', 'sujas.19cse@kongu.edu', 7708427197, NULL, NULL, 'Not Verified'),
('19CSR202', 'Sujitha K', 2019, 'CSE', 'D', 'Female', 'sujithak.19cse@kongu.edu', 9442557048, NULL, NULL, 'Not Verified'),
('19CSR203', 'Suruthi Shri P', 2019, 'CSE', 'D', 'Female', 'suruthishrip.19cse@kongu.edu', 6382894476, NULL, NULL, 'Not Verified'),
('19CSR204', 'Swathy G', 2019, 'CSE', 'D', 'Female', 'swathyg.19cse@kongu.edu', 9360271211, NULL, NULL, 'Not Verified'),
('19CSR205', 'Swethika Ramesh', 2019, 'CSE', 'D', 'Female', 'swethikaramesh.19cse@kongu.edu', 9500306267, NULL, NULL, 'Not Verified'),
('19CSR206', 'Tanuj Kumar M', 2019, 'CSE', 'D', 'Male', 'tanujkumarm.19cse@kongu.edu', 9123591659, NULL, NULL, 'Not Verified'),
('19CSR207', 'Thaarani S', 2019, 'CSE', 'D', 'Female', 'thaaranis.19cse@kongu.edu', 6385427037, NULL, NULL, 'Not Verified'),
('19CSR208', 'Tharunprasad A', 2019, 'CSE', 'D', 'Male', 'tharunprasada.19cse@kongu.edu', 9894346399, NULL, NULL, 'Not Verified'),
('19CSR210', 'Udhaiprakash S M', 2019, 'CSE', 'D', 'Male', 'udhaiprakashsm.19cse@kongu.edu', 6382606253, NULL, NULL, 'Not Verified'),
('19CSR211', 'Ushanandhini R ', 2019, 'CSE', 'D', 'Female', 'ushanandhinir.19cse@kongu.edu', 9361300525, NULL, NULL, 'Not Verified'),
('19CSR212', 'Uvetha V ', 2019, 'CSE', 'D', 'Female', 'uvethav.19cse@kongu.edu', 9360659667, NULL, NULL, 'Not Verified'),
('19CSR213', 'Vaishanya M ', 2019, 'CSE', 'D', 'Female', 'vaishanua.19cse@kongu.edu', 7868839508, NULL, NULL, 'Not Verified'),
('19CSR214', 'Varalakshmi E', 2019, 'CSE', 'D', 'Female', 'varalakshmie.19cse@kongu.edu', 6382826770, NULL, NULL, 'Not Verified'),
('19CSR215', 'Varshini K S', 2019, 'CSE', 'D', 'Female', 'varshiniks.19cse@kongu.edu', 8667719711, NULL, NULL, 'Not Verified'),
('19CSR216', 'Vasanth Babu J', 2019, 'CSE', 'D', 'Male', 'vasanthbabuj.19cse@kongu.edu', 9791680877, NULL, NULL, 'Not Verified'),
('19CSR217', 'Vedhapriyaa S', 2019, 'CSE', 'D', 'Female', 'vedhapriyaas.19cse@kongu.edu', 9092346655, NULL, NULL, 'Not Verified'),
('19CSR218', 'Vidyakeerthi Su', 2019, 'CSE', 'D', 'Female', 'vidyakeerthisu.19cse@kongu.edu', 8300364297, NULL, NULL, 'Not Verified'),
('19CSR219', 'Vignesh S', 2019, 'CSE', 'D', 'Male', 'vigneshs.19cse@kongu.edu', 9843635363, NULL, NULL, 'Not Verified'),
('19CSR220', 'Vignesh L', 2019, 'CSE', 'D', 'Male', 'vigneshl.19cse@kongu.edu', 9360147958, NULL, NULL, 'Not Verified'),
('19CSR221', 'Vigneshwaran V', 2019, 'CSE', 'D', 'Male', 'vigneshwaranv.19cse@kongu.edu', 9597324611, NULL, NULL, 'Not Verified'),
('19CSR222', 'Vijai K S', 2019, 'CSE', 'D', 'Male', 'vijaiks.19cse@kongu.edu', 9786664633, NULL, NULL, 'Not Verified'),
('19CSR223', 'Vishal Rupak V R', 2019, 'CSE', 'D', 'Male', 'vishalrupakvr.19cse@kongu.edu', 9360165553, NULL, NULL, 'Not Verified'),
('19CSR224', 'Vishnu Kiran M', 2019, 'CSE', 'D', 'Male', 'vishnukiranm.19cse@kongu.edu', 9490736405, NULL, NULL, 'Not Verified'),
('19CSR225', 'Vishnu M K', 2019, 'CSE', 'D', 'Male', 'vishnumk.19cse@kongu.edu', 9790371910, NULL, NULL, 'Not Verified'),
('19CSR226', 'Vishnu T', 2019, 'CSE', 'D', 'Male', 'vishnut.19cse@kongu.edu', 9488527790, NULL, NULL, 'Not Verified'),
('19CSR227', 'Vishwa Harish D S', 2019, 'CSE', 'D', 'Male', 'vishwaharishds.19cse@kongu.edu', 7010632994, NULL, NULL, 'Not Verified'),
('19CSR228', 'Vivekanandhan D', 2019, 'CSE', 'D', 'Male', 'vivekanandhand.19cse@kongu.edu', 6383174874, NULL, NULL, 'Not Verified'),
('19CSR229', 'Yogapriya S', 2019, 'CSE', 'D', 'Female', 'yogapriyas.19cse@kongu.edu', 6379846198, NULL, NULL, 'Not Verified'),
('19CSR230', 'Yogeshwaran R', 2019, 'CSE', 'D', 'Male', 'yogeshwaranr.19cse@kongu.edu', 6382207515, NULL, NULL, 'Not Verified'),
('19CSR231', 'Amritpreet Singh', 2019, 'CSE', 'D', 'Male', 'amritpreetsingh.19cse@kongu.edu', 7889879208, NULL, NULL, 'Not Verified'),
('19CSR232', 'Inder Pal Singh', 2019, 'CSE', 'D', 'Male', 'inderpalsingh.19cse@kongu.edu', 7051259395, NULL, NULL, 'Not Verified'),
('20CSR000', 'Test', 2000, 'CSE', 'T', 'Male', 's.abinash333@gmail.com', 9876543210, NULL, '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Verified');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staffid` varchar(12) NOT NULL,
  `name` varchar(30) NOT NULL,
  `userid` varchar(30) NOT NULL,
  `pass` varchar(255) DEFAULT NULL,
  `mail` varchar(45) NOT NULL,
  `dept` varchar(5) NOT NULL,
  `batch` varchar(4) DEFAULT NULL,
  `sec` varchar(2) DEFAULT NULL,
  `designation` varchar(25) DEFAULT NULL,
  `status` varchar(12) NOT NULL DEFAULT 'Not Changed'
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staffid`, `name`, `userid`, `pass`, `mail`, `dept`, `batch`, `sec`, `designation`, `status`) VALUES
('CSE001SF', 'Dr.N.Shanthi', 'shanthi', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'shanthi.cse@kongu.edu', 'CSE', NULL, NULL, 'HOD', 'Changed'),
('CSE002SF', 'Dr.R.R.Rajalaxmi', 'rrr', 'dd7ca98ab81ec122dc2f0c809b438201cb32aeae', 'rrr.cse@kongu.edu', 'CSE', NULL, NULL, NULL, 'Not Changed'),
('CSE003SF', 'Dr.K.Kousalya', 'kouse', 'c8be9a810a9156f3042ad0447d49b50f111c010a', 'kouse.cse@kongu.edu', 'CSE', NULL, NULL, NULL, 'Not Changed'),
('CSE004SF', 'Dr.S.Malliga', 'mallisenthil', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'mallisenthil.cse@kongu.edu', 'CSE', '2018', NULL, 'Year in Charge', 'Changed'),
('CSE005SF', 'Dr.R.C.Suganthe', 'suganthe_rc', '8bfcbc26ee80586b32a33934ffbfa1a5bad3ee06', 'suganthe_rc.cse@kongu.edu', 'CSE', NULL, NULL, NULL, 'Not Changed'),
('CSE006SF', 'Dr.P.Natesan', 'natesanp', 'a65152f5adc31a90dcd4d4130f69f9a98c424d0c', 'natesanp.cse@kongu.edu', 'CSE', NULL, NULL, NULL, 'Not Changed'),
('CSE007SF', 'Dr.C.S.Kanimozhi Selvi', 'kanimozhi', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'kanimozhi.cse@kongu.edu', 'CSE', '2019', NULL, 'Year in Charge', 'Changed'),
('CSE008SF', 'Dr.E.Gothai', 'egothai', 'ab2a1808f6efbae0bbf812bd1b951255c0f14057', 'egothai.cse@kongu.edu', 'CSE', NULL, NULL, NULL, 'Not Changed'),
('CSE009SF', 'Dr.P.Jayanthi', 'jayanthime', '9a54585f1231c973d2dda47e691985123524f125', 'jayanthime.cse@kongu.edu', 'CSE', NULL, NULL, NULL, 'Not Changed'),
('CSE010SF', 'Dr.S.Shanthi', 'shanthis', '09b2c7022d2250d7da5b8a4d87be6f03b25978de', 'shanthis.cse@kongu.edu', 'CSE', NULL, NULL, NULL, 'Not Changed'),
('CSE011SF', 'Mr.N.P.Saravanan', 'npsaravanan', 'd6fc7991f7679ab1b36074c59860069778ab593a', 'npsaravanan.cse@kongu.edu', 'CSE', NULL, NULL, NULL, 'Not Changed'),
('CSE012SF', 'Dr.K.Nirmala Devi', 'k_nirmal', 'ca601d26bb1078ff401d39e885b750ec35a2f8f7', 'k_nirmal.cse@kongu.edu', 'CSE', NULL, NULL, NULL, 'Not Changed'),
('CSE013SF', 'Ms.PCD.Kalaivaani', 'kalairupa', '6185b6dc968a9507570a4bcf063dd40be8d62989', 'kalairupa.cse@kongu.edu', 'CSE', NULL, NULL, NULL, 'Not Changed'),
('CSE014SF', 'Dr.R.S.Latha', 'latha', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'latha.cse@kongu.edu', 'CSE', '2018', 'A', 'Advisor', 'Changed'),
('CSE015SF', 'Dr.N.Krishnamoorthy', 'nmoorthy', '2f70e239c7a5d80384275be451075e4cb7125e9e', 'nmoorthy.cse@kongu.edu', 'CSE', NULL, NULL, NULL, 'Not Changed'),
('CSE016SF', 'Dr.K.Sangeetha', 'sangeetha_k', '0570074901196255d91e99fd49c2b21193868d74', 'sangeetha_k.cse@kongu.edu', 'CSE', '2018', 'B', 'Advisor', 'Not Changed'),
('CSE017SF', 'Dr.S.V.Kogilavani', 'kogilavani', '7bd56dbda41d30f8e7340e8934f18724b57f6350', 'kogilavani.cse@kongu.edu', 'CSE', NULL, NULL, NULL, 'Not Changed'),
('CSE018SF', 'Dr.P.Vishnu Raja', 'pvishnu', '867ef638be6118edc08bca8383c2e296d90905c6', 'pvishnu.cse@kongu.edu', 'CSE', NULL, NULL, NULL, 'Not Changed'),
('CSE019SF', 'Dr.P.Keerthika', 'keerthika', '90ec36d0dc282be87c670075e0b5cfc79c7328ab', 'keerthika.cse@kongu.edu', 'CSE', NULL, NULL, NULL, 'Not Changed'),
('CSE01TSF', 'Test Staff', 'test', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'test.cse@kongu.edu', 'CSE', '2000', 'T', 'Advisor', 'Changed'),
('CSE020SF', 'Dr.S.K.Nivetha', 'nivetha', 'd81d94c63c94e24b2228b7b422ed4ef43d4413b6', 'nivetha.cse@kongu.edu', 'CSE', NULL, NULL, NULL, 'Not Changed'),
('CSE021SF', 'Dr.R.S.Mohana', 'mohanapragash', '01e42ae96b86995418054197a131c84b4a874cb5', 'mohanapragash.cse@kongu.edu', 'CSE', NULL, NULL, NULL, 'Not Changed'),
('CSE022SF', 'Ms.M.Geetha', 'geetha', '8355f9ab1b4480e690dfc98edf6f4716e53e1593', 'geetha.cse@kongu.edu', 'CSE', NULL, NULL, NULL, 'Not Changed'),
('CSE023SF', 'Dr.R.Manjula Devi', 'manjuladevi', '9d480592bc6b0b50103cb3b505c0f3647f87c2e8', 'manjuladevi.cse@kongu.edu', 'CSE', NULL, NULL, NULL, 'Not Changed'),
('CSE024SF', 'Mr.T.Kumaravel', 'tkumar', '41b06b1eb84052687588b4ce1abd3df9f534ea0e', 'tkumar.cse@kongu.edu', 'CSE', '2018', 'C', 'Advisor', 'Not Changed'),
('CSE025SF', 'Ms.S.Ramya', 'sramya', 'bb986bbeb15d91025728b12f033501a4894cb481', 'sramya.cse@kongu.edu', 'CSE', '2019', 'B', 'Advisor', 'Not Changed'),
('CSE026SF', 'Mr.K.Devendran', 'skdeva', '60fe82d4c44b3bb12ea6eb40867c38b9edc37cb4', 'skdeva.cse@kongu.edu', 'CSE', '2018', 'D', 'Advisor', 'Not Changed'),
('CSE027SF', 'Ms.N.Sasipriyaa', 'sasipriya', 'd7e94e1f1485e03015d366e46ad19ce7e0857d3a', 'sasipriya.cse@kongu.edu', 'CSE', '2018', 'A', 'Advisor', 'Not Changed'),
('CSE028SF', 'Mr.B.Bizu', 'bizu', '59f1d794faeb57b7b54da51760c2d9207536cfa6', 'bizu.cse@kongu.edu', 'CSE', NULL, NULL, NULL, 'Not Changed'),
('CSE029SF', 'Mr.R.Sureshkumar', 'sureshkec', '9d93f8113d6ac60e97d0769efd6f167a812f620b', 'sureshkec.eie@kongu.edu', 'CSE', NULL, NULL, NULL, 'Not Changed'),
('CSE030SF', 'Ms.D.Deepa', 'deepa', 'a14e3f68eb8ecb63144f7dd61010f1fa8f518841', 'deepa.cse@kongu.edu', 'CSE', NULL, NULL, NULL, 'Not Changed'),
('CSE031SF', 'Mr.S.Selvaraj', 'selvarajs', '1fa14e37789fc5b5f6b5fa1fbfd0fe94eaec21ba', 'selvarajs.cse@kongu.edu', 'CSE', NULL, NULL, NULL, 'Not Changed'),
('CSE032SF', 'Ms.M.Sangeetha', 'sangeetham', '8805e457c02d39baf4a62a143900af272868451e', 'sangeetham.cse@kongu.edu', 'CSE', '2018', 'D', 'Advisor', 'Not Changed'),
('CSE033SF', 'Ms.O.R.Deepa', 'ord', '0c9bc17fff9b24104038a0b93419944f4dd0d7ee', 'ord.cse@kongu.edu', 'CSE', NULL, NULL, NULL, 'Not Changed'),
('CSE034SF', 'Mr.P.S.Prakash', 'psprakash', 'c09617edc7ff700faf66ec71a7646b2506e20035', 'psprakash.cse@kongu.edu', 'CSE', '2019', 'B', 'Advisor', 'Not Changed'),
('CSE035SF', 'Ms.K.S.Kalaivani', 'kalaivani', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'kalaivani.cse@kongu.edu', 'CSE', '2018', 'B', 'Advisor', 'Changed'),
('CSE036SF', 'Mr.S.Santhoshkumar', 'sanvins', '017f521f42d04b1e00374e9cd9ffd2cf0408d372', 'sanvins.cse@kongu.edu', 'CSE', '2019', 'D', 'Advisor', 'Not Changed'),
('CSE037SF', 'Ms.C.Sagana', 'sagana', '8518d9dccfb1a70c5b53f3b4031afbea286df0ec', 'sagana.c.cse@kongu.edu', 'CSE', NULL, NULL, NULL, 'Not Changed'),
('CSE038SF', 'Mr.B.Krishnakumar', 'krishnakumar', '53a6593ea063a3cda52a0e5ef1ec89326dd75176', 'krishnakumar.cse@kongu.edu', 'CSE', NULL, NULL, NULL, 'Not Changed'),
('CSE039SF', 'Ms.S.Mohana Saranya', 'mohanasaranya', '8479315e5f0a64098994c2cc3e28e3d18ff94a3a', 'mohanasaranya.cse@kongu.edu', 'CSE', '2019', 'A', 'Advisor', 'Not Changed'),
('CSE040SF', 'Ms.S.Mohanapriya', 'mohanapriyas', '33d6357cfaaf0f72991b0ecd8c56da066613c089', 'mohanapriyas.cse@kongu.edu', 'CSE', '2019', 'C', 'Advisor', 'Not Changed'),
('CSE041SF', 'Ms.P.S.Nandhini', 'nandhini', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'nandhini.cse@kongu.edu', 'CSE', '2019', 'A', 'Advisor', 'Changed'),
('CSE042SF', 'Ms.K.Tamil Selvi', 'tamilselvik', 'c3077f350f9aff932e72261a46ce6a250b1e85f4', 'tamilselvik.cse@kongu.edu', 'CSE', NULL, NULL, NULL, 'Not Changed'),
('CSE043SF', 'Ms.M.K.Dharani', 'dharani', 'eaeea4d6fc9e54f0ff16c4f4591ee7652580aaa3', 'dharani.cse@kongu.edu', 'CSE', '2019', 'D', 'Advisor', 'Not Changed'),
('CSE044SF', 'Ms.Vani Rajasekar', 'vanikecit', '9aa209a1a53da2ba816c7b911235e5fac2a2a6a2', 'vanikecit.cse@kongu.edu', 'CSE', '2018', 'C', 'Advisor', 'Not Changed'),
('CSE045SF', 'Ms.K.Venu', 'venu', '8deda5a8117c871c8fb9861137dd50db46b71568', 'venu.cse@kongu.edu', 'CSE', NULL, NULL, NULL, 'Not Changed'),
('CSE046SF', 'Dr.K.Dinesh', 'dinesh', 'f23818deaf9b13ec78570b1013e87860cbcc6066', 'dinesh.cse@kongu.edu', 'CSE', '2019', 'C', 'Advisor', 'Not Changed');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `eventinfo`
--
ALTER TABLE `eventinfo`
  ADD PRIMARY KEY (`eventid`);

--
-- Indexes for table `noncertinfo`
--
ALTER TABLE `noncertinfo`
  ADD PRIMARY KEY (`appno`,`day`);

--
-- Indexes for table `noncertod`
--
ALTER TABLE `noncertod`
  ADD PRIMARY KEY (`appno`),
  ADD KEY `Foreign` (`regno`);

--
-- Indexes for table `oddetails`
--
ALTER TABLE `oddetails`
  ADD PRIMARY KEY (`appno`),
  ADD KEY `regno constraint` (`regno`);

--
-- Indexes for table `othercert`
--
ALTER TABLE `othercert`
  ADD PRIMARY KEY (`appno`),
  ADD KEY `regno` (`regno`);

--
-- Indexes for table `postod`
--
ALTER TABLE `postod`
  ADD PRIMARY KEY (`appno`),
  ADD UNIQUE KEY `certificate` (`certificate`);

--
-- Indexes for table `preod`
--
ALTER TABLE `preod`
  ADD PRIMARY KEY (`appno`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`regno`),
  ADD UNIQUE KEY `mail` (`mail`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staffid`) USING BTREE,
  ADD UNIQUE KEY `mail` (`mail`),
  ADD UNIQUE KEY `staffid` (`userid`) USING BTREE;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `noncertinfo`
--
ALTER TABLE `noncertinfo`
  ADD CONSTRAINT `nonappno constraint` FOREIGN KEY (`appno`) REFERENCES `noncertod` (`appno`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `noncertod`
--
ALTER TABLE `noncertod`
  ADD CONSTRAINT `Foreign` FOREIGN KEY (`regno`) REFERENCES `registration` (`regno`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `oddetails`
--
ALTER TABLE `oddetails`
  ADD CONSTRAINT `regno constraint` FOREIGN KEY (`regno`) REFERENCES `registration` (`regno`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `othercert`
--
ALTER TABLE `othercert`
  ADD CONSTRAINT `regno` FOREIGN KEY (`regno`) REFERENCES `registration` (`regno`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `postod`
--
ALTER TABLE `postod`
  ADD CONSTRAINT `appno contraint` FOREIGN KEY (`appno`) REFERENCES `oddetails` (`appno`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `preod`
--
ALTER TABLE `preod`
  ADD CONSTRAINT `appno` FOREIGN KEY (`appno`) REFERENCES `oddetails` (`appno`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
