-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Dec 01, 2019 at 02:29 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pay`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `delemp` ()  NO SQL
select fname,dno,doj,phno,email from del_emp$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `admin_details`
--

CREATE TABLE `admin_details` (
  `aid` int(11) NOT NULL,
  `fname` varchar(20) DEFAULT NULL,
  `uname` varchar(20) DEFAULT NULL,
  `email` varchar(20) DEFAULT NULL,
  `PASSWORD` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_details`
--

INSERT INTO `admin_details` (`aid`, `fname`, `uname`, `email`, `PASSWORD`) VALUES
(2, 'ANIMESH MEHTA', 'ANIMESH', 'animeshmehta75@gmail', '1234'),
(3, 'ANIL KUMAR', 'ANIL', 'anil1234@gmail.com', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `del_emp`
--

CREATE TABLE `del_emp` (
  `delid` int(11) NOT NULL,
  `eid` int(11) DEFAULT NULL,
  `fname` varchar(20) DEFAULT NULL,
  `gender` varchar(20) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `doj` date DEFAULT NULL,
  `dno` int(11) DEFAULT NULL,
  `address` varchar(20) DEFAULT NULL,
  `city` varchar(20) DEFAULT NULL,
  `state` varchar(20) DEFAULT NULL,
  `phno` int(11) DEFAULT NULL,
  `email` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `del_emp`
--

INSERT INTO `del_emp` (`delid`, `eid`, `fname`, `gender`, `dob`, `doj`, `dno`, `address`, `city`, `state`, `phno`, `email`) VALUES
(6, 10, 'Prem Sankar Mishra', 'male', '1996-11-06', '2016-08-21', 4, 'Hno:-69', 'Laxmi Nagar', 'Delhi', 2147483647, 'premsankar10@gmail.c');

-- --------------------------------------------------------

--
-- Table structure for table `dept_details`
--

CREATE TABLE `dept_details` (
  `dno` int(11) NOT NULL,
  `gid` int(11) DEFAULT NULL,
  `dname` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dept_details`
--

INSERT INTO `dept_details` (`dno`, `gid`, `dname`) VALUES
(1, 9, 'Accounts'),
(2, 10, 'Production'),
(3, 11, 'Marketing'),
(4, 12, 'Security'),
(5, 13, 'Human Resource');

-- --------------------------------------------------------

--
-- Table structure for table `emp_details`
--

CREATE TABLE `emp_details` (
  `eid` int(20) NOT NULL,
  `fname` varchar(20) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `doj` date DEFAULT NULL,
  `dno` int(11) DEFAULT NULL,
  `address` varchar(30) DEFAULT NULL,
  `city` varchar(30) DEFAULT NULL,
  `state` varchar(30) DEFAULT NULL,
  `phno` bigint(20) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `emp_details`
--

INSERT INTO `emp_details` (`eid`, `fname`, `gender`, `dob`, `doj`, `dno`, `address`, `city`, `state`, `phno`, `email`) VALUES
(7, 'Apoorv choudhary', 'male', '1995-11-06', '2014-02-12', 1, 'Hno:-21', 'Patna', 'Bihar', 7089456123, 'apoorvch18@gmail.com'),
(8, 'Aayush', 'male', '2000-11-14', '2015-02-21', 2, 'Hno:-07', 'Ranchi', 'Jharkhand', 8021354789, 'aayush13@gmail.com'),
(9, 'uttam kumar', 'male', '1995-01-03', '2017-02-12', 3, 'Hno:-11', 'Gaya', 'Bihar', 7032145698, 'uttamk69@gmail.com'),
(11, 'Prem Mishra', 'male', '1996-11-14', '2016-02-21', 4, 'Hno:-69', 'Laxmi Nagar', 'Delhi', 9087451231, 'premsankar10@gmail.com');

--
-- Triggers `emp_details`
--
DELIMITER $$
CREATE TRIGGER `delemp` AFTER DELETE ON `emp_details` FOR EACH ROW insert into del_emp(  eid , fname , gender , dob , doj , dno , address , city , state , phno , email )
values(old.eid , old.fname , old.gender , old.dob ,old.doj , old.dno , old.address , old.city , old.state , old.phno , old.email)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `grade_details`
--

CREATE TABLE `grade_details` (
  `gid` int(11) NOT NULL,
  `gname` varchar(20) DEFAULT NULL,
  `dno` int(11) DEFAULT NULL,
  `basic` int(11) DEFAULT NULL,
  `dear` int(11) DEFAULT NULL,
  `travel` int(11) DEFAULT NULL,
  `hra` int(11) DEFAULT NULL,
  `medical` int(11) DEFAULT NULL,
  `bonus` int(11) DEFAULT NULL,
  `pf` int(11) DEFAULT NULL,
  `ptax` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `grade_details`
--

INSERT INTO `grade_details` (`gid`, `gname`, `dno`, `basic`, `dear`, `travel`, `hra`, `medical`, `bonus`, `pf`, `ptax`) VALUES
(9, 'Acc_grade', 1, 15000, 1500, 1750, 2500, 2000, 1200, 175, 225),
(10, 'prod_grade', 2, 20000, 2100, 1500, 2500, 1200, 4000, 225, 375),
(11, 'mark_grade', 3, 25000, 1200, 1500, 2500, 1750, 2500, 125, 375),
(12, 'secure_grade', 4, 20000, 1750, 2300, 3700, 2200, 3800, 275, 125),
(13, 'HR_grade', 5, 23000, 2300, 1300, 1700, 2700, 1300, 275, 325);

-- --------------------------------------------------------

--
-- Table structure for table `salary_details`
--

CREATE TABLE `salary_details` (
  `tid` int(20) NOT NULL,
  `eid` int(20) DEFAULT NULL,
  `gid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `salary_details`
--

INSERT INTO `salary_details` (`tid`, `eid`, `gid`) VALUES
(1, 7, 9),
(2, 8, 10),
(3, 9, 11);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_details`
--
ALTER TABLE `admin_details`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `del_emp`
--
ALTER TABLE `del_emp`
  ADD PRIMARY KEY (`delid`);

--
-- Indexes for table `dept_details`
--
ALTER TABLE `dept_details`
  ADD PRIMARY KEY (`dno`),
  ADD KEY `dept_details_ibfk_1` (`gid`);

--
-- Indexes for table `emp_details`
--
ALTER TABLE `emp_details`
  ADD PRIMARY KEY (`eid`),
  ADD KEY `dno` (`dno`);

--
-- Indexes for table `grade_details`
--
ALTER TABLE `grade_details`
  ADD PRIMARY KEY (`gid`),
  ADD KEY `dno` (`dno`);

--
-- Indexes for table `salary_details`
--
ALTER TABLE `salary_details`
  ADD PRIMARY KEY (`tid`),
  ADD KEY `eid` (`eid`),
  ADD KEY `salary_details_ibfk_2` (`gid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_details`
--
ALTER TABLE `admin_details`
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `del_emp`
--
ALTER TABLE `del_emp`
  MODIFY `delid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `emp_details`
--
ALTER TABLE `emp_details`
  MODIFY `eid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `grade_details`
--
ALTER TABLE `grade_details`
  MODIFY `gid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dept_details`
--
ALTER TABLE `dept_details`
  ADD CONSTRAINT `gid` FOREIGN KEY (`gid`) REFERENCES `grade_details` (`gid`) ON DELETE CASCADE;

--
-- Constraints for table `emp_details`
--
ALTER TABLE `emp_details`
  ADD CONSTRAINT `emp_details_ibfk_1` FOREIGN KEY (`dno`) REFERENCES `dept_details` (`dno`);

--
-- Constraints for table `grade_details`
--
ALTER TABLE `grade_details`
  ADD CONSTRAINT `grade_details_ibfk_1` FOREIGN KEY (`dno`) REFERENCES `dept_details` (`dno`) ON DELETE CASCADE;

--
-- Constraints for table `salary_details`
--
ALTER TABLE `salary_details`
  ADD CONSTRAINT `fffffff` FOREIGN KEY (`gid`) REFERENCES `grade_details` (`gid`) ON DELETE CASCADE,
  ADD CONSTRAINT `salary_details_ibfk_1` FOREIGN KEY (`eid`) REFERENCES `emp_details` (`eid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
