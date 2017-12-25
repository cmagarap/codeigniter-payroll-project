-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 24, 2017 at 09:14 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `payroll_ci`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(11) UNSIGNED NOT NULL,
  `username` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `time_in` time NOT NULL,
  `time_out` time DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `username`, `lastname`, `firstname`, `emp_id`, `time_in`, `time_out`, `status`, `date`) VALUES
(1700000029, 'alexa', 'Bliss', 'Alexa', 20170000, '12:59:44', '13:03:22', 'Late', '2017-11-15'),
(1700000030, 'kervin', 'Rolan', 'Kervin', 20170005, '06:19:42', NULL, 'On time', '2017-11-15'),
(1700000033, 'alexa', 'Kaufman', 'Alexis', 20170000, '16:59:47', '21:03:55', 'Late', '2017-11-16'),
(1700000037, 'kervin', 'Rolan', 'Kervin', 20170005, '21:20:52', '21:20:58', 'Late', '2017-11-16'),
(1700000038, 'kervin', 'Rolan', 'Kervin', 20170005, '00:42:26', '09:09:59', 'On time', '2017-11-17'),
(1700000040, 'alexa', 'Kaufman', 'Alexis', 20170000, '11:27:50', '19:20:02', 'Late', '2017-11-17'),
(1700000042, 'andrew', 'Leona', 'Andrew Cyle', 20170011, '20:38:11', '21:06:07', 'Late', '2017-11-17'),
(1700000043, 'alexa', 'Kaufman', 'Alexis', 20170000, '06:40:01', '16:56:15', 'On time', '2017-11-18'),
(1700000044, 'kervine', 'Rolan', 'Kervin', 20170005, '06:40:29', NULL, 'On time', '2017-11-18'),
(1700000046, 'andrew', 'Leona', 'Andrew Cyle', 20170011, '06:44:56', '20:17:24', 'Overtime', '2017-11-18'),
(1700000047, 'alexa', 'Kaufman', 'Alexis', 20170000, '06:44:48', '22:41:09', 'Overtime', '2017-11-19'),
(1700000048, 'andrew', 'Leona', 'Andrew Cyle', 20170011, '06:46:54', '22:53:40', 'Overtime', '2017-11-19'),
(1700000049, 'kervine', 'Rolan', 'Kervin', 20170005, '11:03:57', '22:53:15', 'Late', '2017-11-19'),
(1700000050, 'kervine', 'Rolan', 'Kervin', 20170005, '06:41:52', '20:47:30', 'Overtime', '2017-11-21'),
(1700000051, 'alexa', 'Kaufman', 'Alexis', 20170000, '06:44:17', NULL, 'On time', '2017-11-21'),
(1700000052, 'andrew', 'Leona', 'Andrew Cyle', 20170011, '08:45:05', NULL, 'Late', '2017-11-21'),
(1700000072, 'enzo', 'Amore', 'Enzo', 20170014, '01:21:18', '01:21:42', 'On time', '2017-11-22'),
(1700000073, 'alexa', 'Kaufman', 'Alexis', 20170000, '01:22:51', '12:12:40', 'On time', '2017-11-22'),
(1700000074, 'kervine', 'Rolan', 'Kervin', 20170005, '12:12:31', NULL, 'Late', '2017-11-22'),
(1700000075, 'andrew', 'Leona', 'Andrew Cyle', 20170011, '12:13:20', '19:35:07', 'Late', '2017-11-22'),
(1700000076, 'alexa', 'Kaufman', 'Alexis', 20170000, '02:14:00', '09:55:18', 'On time', '2017-11-23'),
(1700000077, 'romanr', 'Reigns', 'Roman', 20170015, '18:57:31', NULL, 'Late', '2017-11-22'),
(1700000078, 'kyrie', 'Irving', 'Kyrie', 20170018, '18:57:43', NULL, 'Late', '2017-11-22'),
(1700000079, 'jaylen', 'Brown', 'Jaylen', 20170019, '18:58:04', NULL, 'Late', '2017-11-22'),
(1700000080, 'conorm', 'Mcgregor', 'Conor', 20170016, '18:58:18', NULL, 'Late', '2017-11-22'),
(1700000081, 'joshua', 'Joshua', 'Anthony', 20170020, '18:58:27', NULL, 'Late', '2017-11-22'),
(1700000082, 'kervine', 'Rolan', 'Kervin', 20170005, '10:05:17', NULL, 'Late', '2017-11-23'),
(1700000083, 'romanr', 'Reigns', 'Roman', 20170015, '10:19:05', '10:19:07', 'Late', '2017-11-23'),
(1700000084, 'enzo', 'Amore', 'Enzo', 20170014, '10:30:46', '10:31:04', 'Late', '2017-11-23'),
(1700000085, 'alexa', 'Kaufman', 'Alexis', 20170000, '12:02:35', NULL, 'Late', '2017-11-24');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `emp_id` int(11) UNSIGNED NOT NULL,
  `emp_username` varchar(50) NOT NULL,
  `emp_password` varchar(100) NOT NULL,
  `emp_lastname` varchar(50) NOT NULL,
  `emp_firstname` varchar(50) NOT NULL,
  `emp_middlename` varchar(50) DEFAULT NULL,
  `emp_email` varchar(25) NOT NULL,
  `emp_contact` varchar(11) NOT NULL,
  `tin_num` varchar(50) NOT NULL,
  `sss_num` varchar(50) NOT NULL,
  `pagibig_num` varchar(50) NOT NULL,
  `philhealth_num` varchar(50) NOT NULL,
  `status` varchar(20) NOT NULL,
  `gross_salary` int(5) NOT NULL,
  `position` varchar(50) NOT NULL,
  `department` varchar(50) NOT NULL,
  `emp_sys_status` tinyint(1) NOT NULL,
  `emp_image_path` varchar(100) NOT NULL,
  `emp_hash` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`emp_id`, `emp_username`, `emp_password`, `emp_lastname`, `emp_firstname`, `emp_middlename`, `emp_email`, `emp_contact`, `tin_num`, `sss_num`, `pagibig_num`, `philhealth_num`, `status`, `gross_salary`, `position`, `department`, `emp_sys_status`, `emp_image_path`, `emp_hash`) VALUES
(20170000, 'alexa', '$2y$10$9r9R9Q5HbZysat1BBbJeU.bQwjXbsH0RoaXWU4s6.hC/5NenzOAjm', 'Kaufman', 'Alexis', 'Kaufman', 'chrisjohn.seej@gmail.com', '09505959054', '209-132-130', '30-1378461-1', '1410-6788-2195', '02-138281921-15', 'Single', 75000, 'CEO', 'WWE', 1, 'Alexa_Bliss_as_Raw_Womens_Champion.jpg', 'RwjO5tqbUMPn8Gh'),
(20170005, 'kervine', '$2y$10$5i6ytMiiZGtcARk1kUxEQuc8VF9YW9nOlHq.12ywN3SIrEJGoRu92', 'Rollan', 'Kervin', 'Peres', 'objxiii25@gmail.com', '09596668788', '545-123-123', '55-5557888-5', '1234-9875-5554', '1255-1235-9656', 'Widowed', 18000, 'Cruiserweight Champion', '205 Live', 1, 'rolan.jpg', '2m9skEr4DAzFMjR'),
(20170011, 'andrew', '$2y$10$UEssBg7fA.m.rmnppCI5XemjNS3RO6NJP1f0omJGFU83yBkHgY/E2', 'Leona', 'Andrew Cyle', 'Talan', 'andrewleona04@gmail.com', '09756659998', '123-548-599', '23-5588754-1', '1255-5557-3352', '5487-2355-1598-1', 'Single', 20000, 'Student', 'Feutech', 1, 'aleona6-22-17_1498113071.jpg', '6Gtphfzw1gkORna'),
(20170014, 'enzo', '$2y$10$1ewULKt1VQ7.ZxeGCExKseFCk9nrhcg4PH.Q5pjUh/J/tfkvd1qN2', 'Amore', 'Enzo', 'Arndt', 'objxiii25@gmail.com', '09186544887', '123-555-788', '11-4587777-2', '5454-7855-4578', '4444-5484-5455-32', 'Single', 50000, 'Staff', 'CCS', 1, 'enzo1.jpg', 'gCL63GNryTM9YXa'),
(20170015, 'romanr', '$2y$10$IFLPWes.0d5fHixkLeUg.O7cT6DzvAHCHD7YZRh/6f5uZb7CscHli', 'Reigns', 'Roman', 'Empire', 'kervin_rollan@yahoo.com', '09175816750', '123-123-123', '22-777777-1', '2219-2219-2219', '2219-2219-2219-22', 'Married', 50000, 'Janitor', 'WWE', 1, 'romanreigns.png', 'rmIVKhFAYWX5REn'),
(20170016, 'conorm', '$2y$10$D2D3u57JO9pIDL67QNABQO88cYtS871CN1T64xEvUTJ0GkAMDoNF6', 'Mcgregor', 'Conor', 'Notorious', 'gailybb@yahoo.com', '09950278099', '123-123-123', '12-1234567-8', '1223-1223-1223', '1223-1223-1223-22', 'Married', 89000, 'Senior Manager', 'UFC', 1, '205-McGREGOR_CONOR.png', 'UJZ5VQYx7KlB0Tz'),
(20170017, 'andersons', '$2y$10$HN4KPkN.CR4bIox024qiMu10kD1PWu/g9sCUky20yyiTTJ8vJYYay', 'Silva', 'Anderson', 'Spider', 'andrewleona@yahoo.com', '09175816759', '898-856-589', '12-9876543-1', '9876-9876-9876', '9876-9876-9876-12', 'Single', 12500, 'Staff', 'UFC', 1, 'SILVA_ANDERSON.png', 'p31UsJMyhg7tzXx'),
(20170018, 'kyrie', '$2y$10$JwTM.yI0gIeOBPEQW8JLz.sAmf9Wtmt2rzmzQd8aNoYvqoyg7adnK', 'Irving', 'Kyrie', 'Boston', 'jcpleona@gmail.com', '09982217842', '658-498-159', '98-4973591-8', '4679-4919-6987', '1937-2846-5915-35', 'Single', 28500, 'Manager', 'NBA', 1, 'kyrie.png', '1dhl8DqIjFAcSiO'),
(20170019, 'jaylen', '$2y$10$s43.xAPeMik6TPmYFWWlZuJK/ygj42vocTWTO3qRiIe89To1aD3G.', 'Brown', 'Jaylen', 'Boston', 'krnprzrlln@gmail.com', '09986458142', '411-425-321', '94-4324494-1', '9846-1237-4212', '9812-4712-9123-12', 'Married', 34000, 'Manager', 'NBA', 1, 'i.png', 'pouD3WeI4tlAnaN'),
(20170020, 'joshua', '$2y$10$F4gL/aOHxPDq6lkJCJJMje4lt0yJd84Mj5wpGL.nFYRuLxjPGIW9.', 'Joshua', 'Anthony', 'M', 'annedanao6799@gmail.com', '09267832921', '942-512-512', '41-9145121-4', '9147-1421-9123', '5161-9124-1231-11', 'Married', 46000, 'Manager', 'Boxing', 1, 'anthony.png', 'OaTGrRNUiFLskH7');

-- --------------------------------------------------------

--
-- Table structure for table `pagibigcontribution`
--

CREATE TABLE `pagibigcontribution` (
  `ID` int(11) NOT NULL,
  `transaction_id` varchar(100) NOT NULL,
  `range_from` varchar(100) NOT NULL,
  `range_to` varchar(100) NOT NULL,
  `employee_share` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pagibigcontribution`
--

INSERT INTO `pagibigcontribution` (`ID`, `transaction_id`, `range_from`, `range_to`, `employee_share`) VALUES
(1, '101', '1', '1499', ''),
(2, '102', '1500', '4999', ''),
(3, '103', '5000', '9999999', '100');

-- --------------------------------------------------------

--
-- Table structure for table `philhealthcontribution`
--

CREATE TABLE `philhealthcontribution` (
  `ID` int(11) NOT NULL,
  `philhealth_id` varchar(100) DEFAULT NULL,
  `transaction_id` varchar(100) DEFAULT NULL,
  `range_from` varchar(100) NOT NULL,
  `range_to` varchar(100) NOT NULL,
  `employee_share` varchar(100) NOT NULL,
  `employer_share` varchar(100) DEFAULT NULL,
  `total_share` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `philhealthcontribution`
--

INSERT INTO `philhealthcontribution` (`ID`, `philhealth_id`, `transaction_id`, `range_from`, `range_to`, `employee_share`, `employer_share`, `total_share`) VALUES
(1, NULL, NULL, '1', '8999', '100.00', NULL, NULL),
(2, NULL, NULL, '9000', '9999', '112.50', NULL, NULL),
(3, NULL, NULL, '10000', '10999', '125.00', NULL, NULL),
(4, NULL, NULL, '11000', '11999', '137.50', NULL, NULL),
(5, NULL, NULL, '12000', '12999', '150.00', NULL, NULL),
(6, NULL, NULL, '13000', '13999', '162.50', NULL, NULL),
(7, NULL, NULL, '14000', '14999', '175.00', NULL, NULL),
(8, NULL, NULL, '15000', '15999', '187.50', NULL, NULL),
(9, NULL, NULL, '16000', '16999', '200.00', NULL, NULL),
(10, NULL, NULL, '17000', '17999', '212.50', NULL, NULL),
(11, NULL, NULL, '18000', '18999', '225.00', NULL, NULL),
(12, NULL, NULL, '19000', '19999', '237.50', NULL, NULL),
(13, NULL, NULL, '20000', '20999', '250.00', NULL, NULL),
(14, NULL, NULL, '21000', '21999', '262.50', NULL, NULL),
(15, NULL, NULL, '22000', '22999', '275.00', NULL, NULL),
(16, NULL, NULL, '23000', '23999', '287.50', NULL, NULL),
(17, NULL, NULL, '24000', '24999', '300.00', NULL, NULL),
(18, NULL, NULL, '25000', '25999', '312.50', NULL, NULL),
(19, NULL, NULL, '26000', '26999', '325.00', NULL, NULL),
(20, NULL, NULL, '27000', '27999', '337.50', NULL, NULL),
(21, NULL, NULL, '28000', '28999', '350.00', NULL, NULL),
(22, NULL, NULL, '29000', '29999', '362.50', NULL, NULL),
(23, NULL, NULL, '30000', '30999', '375.00', NULL, NULL),
(24, NULL, NULL, '31000', '31999', '387.50', NULL, NULL),
(25, NULL, NULL, '32000', '32999', '400.00', NULL, NULL),
(26, NULL, NULL, '33000', '33999', '412.50', NULL, NULL),
(27, NULL, NULL, '34000', '34999', '425.00', NULL, NULL),
(28, NULL, NULL, '35000', '9999999', '437.50', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ssscontribution`
--

CREATE TABLE `ssscontribution` (
  `ID` int(11) NOT NULL,
  `transaction_id` varchar(100) DEFAULT NULL,
  `salary_range_from` varchar(100) NOT NULL,
  `salary_range_to` varchar(100) NOT NULL,
  `salary_base` varchar(100) DEFAULT NULL,
  `monthly_salary_credit` varchar(100) DEFAULT NULL,
  `employee_share` varchar(100) NOT NULL,
  `employer_share` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ssscontribution`
--

INSERT INTO `ssscontribution` (`ID`, `transaction_id`, `salary_range_from`, `salary_range_to`, `salary_base`, `monthly_salary_credit`, `employee_share`, `employer_share`) VALUES
(1, NULL, '1000', '1249', NULL, NULL, '36.30', NULL),
(2, NULL, '1250', '1749', NULL, NULL, '54.50', NULL),
(4, NULL, '1750', '2249', NULL, NULL, '72.70', NULL),
(5, NULL, '2250', '2749', NULL, NULL, '90.80', NULL),
(6, NULL, '2750', '3249', NULL, NULL, '109.00', NULL),
(7, NULL, '3250', '3749', NULL, NULL, '127.20', NULL),
(8, NULL, '3750', '4249', NULL, NULL, '145.30', NULL),
(9, NULL, '4250', '4749', NULL, NULL, '163.50', NULL),
(10, NULL, '4750', '5249', NULL, NULL, '181.70', NULL),
(11, NULL, '5250', '5749', NULL, NULL, '199.80', NULL),
(12, NULL, '5750', '6249', NULL, NULL, '218.00', NULL),
(13, NULL, '6250', '6749', NULL, NULL, '236.20', NULL),
(14, NULL, '6750', '7249', NULL, NULL, '254.30', NULL),
(15, NULL, '7250', '7749', NULL, NULL, '272.50', NULL),
(16, NULL, '7750', '8249', NULL, NULL, '290.70', NULL),
(17, NULL, '8250', '8749', NULL, NULL, '308.80', NULL),
(18, NULL, '8750', '9249', NULL, NULL, '327.00', NULL),
(19, NULL, '9250', '9749', NULL, NULL, '345.20', NULL),
(20, NULL, '9750', '10249', NULL, NULL, '363.30', NULL),
(21, NULL, '10250', '10749', NULL, NULL, '381.50', NULL),
(22, NULL, '10750', '11249', NULL, NULL, '399.70', NULL),
(23, NULL, '11250', '11749', NULL, NULL, '417.80', NULL),
(24, NULL, '11750', '12249', NULL, NULL, '436.00', NULL),
(25, NULL, '12250', '12749', NULL, NULL, '454.20', NULL),
(26, NULL, '12750', '13249', NULL, NULL, '472.30', NULL),
(27, NULL, '13250', '13749', NULL, NULL, '490.50', NULL),
(28, NULL, '13250', '13749', NULL, NULL, '490.50', NULL),
(29, NULL, '13750', '14249', NULL, NULL, '508.70', NULL),
(30, NULL, '13250', '13749', NULL, NULL, '490.50', NULL),
(31, NULL, '13750', '14249', NULL, NULL, '508.70', NULL),
(34, NULL, '14250', '14749', NULL, NULL, '528.80', NULL),
(35, NULL, '14750', '15249', NULL, NULL, '545.00', NULL),
(36, NULL, '15250', '15749', NULL, NULL, '563.20', NULL),
(37, NULL, '15750', '9999999', NULL, NULL, '581.30', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sub_admin`
--

CREATE TABLE `sub_admin` (
  `admin_id` int(11) UNSIGNED NOT NULL,
  `admin_username` varchar(25) NOT NULL,
  `admin_password` varchar(100) NOT NULL,
  `admin_lastname` varchar(50) NOT NULL,
  `admin_firstname` varchar(50) NOT NULL,
  `admin_status` tinyint(1) NOT NULL,
  `admin_contact` varchar(11) NOT NULL,
  `admin_email` varchar(30) NOT NULL,
  `admin_image_path` varchar(100) NOT NULL,
  `admin_hash` varchar(100) NOT NULL,
  `admin_thumb` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_admin`
--

INSERT INTO `sub_admin` (`admin_id`, `admin_username`, `admin_password`, `admin_lastname`, `admin_firstname`, `admin_status`, `admin_contact`, `admin_email`, `admin_image_path`, `admin_hash`, `admin_thumb`) VALUES
(2170000, 'punk', '$2y$10$aHDcpDR9Q6jJoUlI8.Fg8ewx1Xy7PHLm/b29OWWgwkO5LIKeg3bPm', 'Brooks', 'Phil', 1, '09505959054', 'cmpunk@ufc.com', 'cmpunk1.jpg', 'WkaFxniSJvDcUfO', NULL),
(2170001, 'joe', '$2y$10$SuA9ltJGTAHRhXteqU50Be7gBx68xL7QWM0XAzSeRWHQSj2XAi3xC', 'Joe', 'Samoa', 1, '09125569946', 'joe@wwe.com', 'Joe6-22-17_1498128130.jpg', 'TpQc6RaMyI4PCKG', NULL),
(2170003, 'rko', '$2y$10$yYEb50DtIBM4tWpThC3VT.rjWsKBWuuoLdzcGl7GDQ/I5akUtEKx2', 'Orton', 'Randal Keith', 1, '01755636622', 'rko@wwe.com', 'rko.png', 'mtI4SQUKvNR5T7p', NULL),
(2170006, 'uge', '$2y$10$QYqHcyTm4MKH6BlyFoKUfOyg4OAXbwrkUJ5W4/SitubW0i5zZ416O', 'Ingente', 'Eugene', 1, '09495567787', 'eoingente@fit.edu.ph', 'Eugene6-22-17_1498127652.jpg', 'oh3gR8d0YCrGcPA', NULL),
(2170007, 'rex', '$2y$10$PLZvSUGvwjEb0CAN8I/NbOjU7cw8wb4Mu1mGP7VyTZvfKeCcXwKB6', 'Baldonado', 'Rex Christian', 1, '09123326564', 'rbbaldonado@fit.edu.ph', 'Rex6-22-17_1498127781.jpg', 'NtDwKW95curesqp', NULL),
(2170010, 'atleona', '$2y$10$LWCUPNB9jjaidleG2TZafO6oXUnkGxPC5.TNd.kYgJXZvbIZNaurS', 'Leona', 'Andrew', 1, '09553507882', 'andrewleona04@gmail.com', 'default-user.png', 'APX9rk7egcRpdxD', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `super_admin`
--

CREATE TABLE `super_admin` (
  `s_admin_id` int(5) UNSIGNED NOT NULL,
  `s_admin_username` varchar(25) NOT NULL,
  `s_admin_password` varchar(100) NOT NULL,
  `s_admin_lastname` varchar(50) NOT NULL,
  `s_admin_firstname` varchar(50) NOT NULL,
  `s_admin_status` tinyint(1) NOT NULL,
  `s_admin_contact` varchar(11) NOT NULL,
  `s_admin_email` varchar(30) NOT NULL,
  `s_admin_image_path` varchar(100) NOT NULL,
  `s_admin_hash` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `super_admin`
--

INSERT INTO `super_admin` (`s_admin_id`, `s_admin_username`, `s_admin_password`, `s_admin_lastname`, `s_admin_firstname`, `s_admin_status`, `s_admin_contact`, `s_admin_email`, `s_admin_image_path`, `s_admin_hash`) VALUES
(1700, 'seej', '$2y$10$omNfIR/NGk62rQ/Yi1PF0usdoNJBBV/IZdt1Q8ScrNgZaShfsHOI6', 'Agarap ', 'Chris John', 1, '09173673233', 'cmagarap@fit.edu.ph', '06liza.jpg', 'Z1BLmIYkOgwQXGl');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payroll`
--

CREATE TABLE `tbl_payroll` (
  `id` int(10) UNSIGNED NOT NULL,
  `emp_username` varchar(50) NOT NULL,
  `gross_salary` float(9,2) NOT NULL,
  `sss` float(9,2) NOT NULL,
  `philhealth` float(9,2) NOT NULL,
  `pagibig` float(9,2) NOT NULL,
  `wtax` float(9,2) NOT NULL,
  `other_deduction` float(9,2) DEFAULT NULL,
  `net_pay` float(9,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_payroll`
--

INSERT INTO `tbl_payroll` (`id`, `emp_username`, `gross_salary`, `sss`, `philhealth`, `pagibig`, `wtax`, `other_deduction`, `net_pay`) VALUES
(2, 'enzo', 50000.00, 581.30, 437.50, 100.00, 11750.11, 0.00, 37131.09),
(3, 'romanr', 50000.00, 581.30, 437.50, 100.00, 11750.11, 0.00, 37131.09),
(4, 'conorm', 89000.00, 581.30, 437.50, 100.00, 24230.11, 200.00, 63451.09),
(5, 'andersons', 12500.00, 454.20, 150.00, 100.00, 1208.33, NULL, 10587.47),
(6, 'kyrie', 28500.00, 581.30, 350.00, 100.00, 5216.67, 200.00, 22052.03),
(7, 'jaylen', 34000.00, 581.30, 425.00, 100.00, 6866.67, 200.00, 25827.03),
(8, 'joshua', 46000.00, 581.30, 437.50, 100.00, 10470.11, 200.00, 34211.09);

-- --------------------------------------------------------

--
-- Table structure for table `user_log`
--

CREATE TABLE `user_log` (
  `userlog_id` int(12) UNSIGNED NOT NULL,
  `username` varchar(50) NOT NULL,
  `action` varchar(50) NOT NULL,
  `user_type` varchar(20) NOT NULL,
  `time_and_date` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_log`
--

INSERT INTO `user_log` (`userlog_id`, `username`, `action`, `user_type`, `time_and_date`) VALUES
(1700000236, 'rko', 'Checked employees'' attendance', 'Administrator', 1510881681),
(1700000237, 'rko', 'Checked employees'' attendance', 'Administrator', 1510881691),
(1700000238, 'kervin', 'Checked his/her attendance', 'Employee', 1510881889),
(1700000239, 'kervin', 'Logout', 'Employee', 1510881891),
(1700000240, 'seej', 'Login', 'Super Administrator', 1510881906),
(1700000241, 'seej', 'Checked employees'' attendance', 'Super Administrator', 1510882525),
(1700000242, 'rko', 'Checked employees'' attendance', 'Administrator', 1510882532),
(1700000243, 'seej', 'Checked employees'' attendance', 'Super Administrator', 1510882661),
(1700000244, 'seej', 'Checked employees'' attendance', 'Super Administrator', 1510882674),
(1700000245, 'seej', 'Checked employees'' attendance', 'Super Administrator', 1510882700),
(1700000246, 'seej', 'Checked employees'' attendance', 'Super Administrator', 1510882701),
(1700000247, 'seej', 'Checked employees'' attendance', 'Super Administrator', 1510882765),
(1700000248, 'seej', 'Checked employees'' attendance', 'Super Administrator', 1510882830),
(1700000249, 'seej', 'Checked employees'' attendance', 'Super Administrator', 1510882862),
(1700000250, 'seej', 'Checked employees'' attendance', 'Super Administrator', 1510882863),
(1700000251, 'seej', 'Checked employees'' attendance', 'Super Administrator', 1510882863),
(1700000252, 'seej', 'Checked employees'' attendance', 'Super Administrator', 1510882865),
(1700000253, 'seej', 'Checked employees'' attendance', 'Super Administrator', 1510882880),
(1700000254, 'rko', 'Checked employees'' attendance', 'Administrator', 1510882889),
(1700000255, 'seej', 'Checked employees'' attendance', 'Super Administrator', 1510883040),
(1700000256, 'seej', 'Checked employees'' attendance', 'Super Administrator', 1510883045),
(1700000257, 'rko', 'Checked employees'' attendance', 'Administrator', 1510883087),
(1700000258, 'rko', 'Checked employees'' attendance', 'Administrator', 1510883090),
(1700000259, 'rko', 'Checked employees'' attendance', 'Administrator', 1510883096),
(1700000260, 'rko', 'Checked employees'' attendance', 'Administrator', 1510883099),
(1700000261, 'seej', 'View an admin', 'Super Administrator', 1510883142),
(1700000262, 'seej', 'View active employees', 'Super Administrator', 1510883153),
(1700000263, 'rko', 'Checked employees'' attendance', 'Administrator', 1510883487),
(1700000264, 'seej', 'Logout', 'Super Administrator', 1510884258),
(1700000265, 'kervin', 'Login', 'Employee', 1510884270),
(1700000266, 'kervin', 'Checked his/her attendance', 'Employee', 1510884276),
(1700000267, 'kervin', 'Checked his/her attendance', 'Employee', 1510884548),
(1700000268, 'kervin', 'Checked his/her attendance', 'Employee', 1510884640),
(1700000269, 'rko', 'Checked employees'' attendance', 'Administrator', 1510884651),
(1700000270, 'rko', 'Checked employees'' attendance', 'Administrator', 1510884664),
(1700000271, 'rko', 'Checked employees'' attendance', 'Administrator', 1510884666),
(1700000272, 'kervin', 'Checked his/her attendance', 'Employee', 1510884668),
(1700000273, 'kervin', 'Checked his/her attendance', 'Employee', 1510884669),
(1700000274, 'rko', 'Checked employees'' attendance', 'Administrator', 1510884677),
(1700000275, 'kervin', 'Checked his/her attendance', 'Employee', 1510884680),
(1700000276, 'kervin', 'Checked his/her attendance', 'Employee', 1510886624),
(1700000277, 'rko', 'Checked employees'' attendance', 'Administrator', 1510886630),
(1700000278, 'rko', 'Logout', 'Administrator', 1510886634),
(1700000279, 'seej', 'Login', 'Super Administrator', 1510886641),
(1700000280, 'kervin', 'Logout', 'Employee', 1510886749),
(1700000281, 'joe', 'Login', 'Administrator', 1510886758),
(1700000282, 'joe', 'Logout', 'Administrator', 1510886784),
(1700000283, 'alexa', 'Login', 'Employee', 1510886794),
(1700000284, 'alexa', 'Checked his/her attendance', 'Employee', 1510886796),
(1700000285, 'alexa', 'Logout', 'Employee', 1510887086),
(1700000286, 'rko', 'Login', 'Administrator', 1510887090),
(1700000287, 'rko', 'Logout', 'Administrator', 1510887376),
(1700000288, 'alexa', 'Login', 'Employee', 1510887383),
(1700000289, 'seej', 'Logout', 'Super Administrator', 1510887465),
(1700000290, 'seej', 'Login', 'Super Administrator', 1510887470),
(1700000291, 'alexa', 'Logout', 'Employee', 1510888035),
(1700000292, 'punk', 'Login', 'Administrator', 1510888040),
(1700000293, 'punk', 'Logout', 'Administrator', 1510888052),
(1700000294, 'rexxx', 'Login', 'Employee', 1510888064),
(1700000295, 'rexxx', 'Check in', 'Employee', 1510888066),
(1700000296, 'rexxx', 'Checked his/her attendance', 'Employee', 1510888069),
(1700000297, 'rexxx', 'Logout', 'Employee', 1510888079),
(1700000298, 'punk', 'Login', 'Administrator', 1510888084),
(1700000299, 'seej', 'Logout', 'Super Administrator', 1510888164),
(1700000300, 'kervin', 'Login', 'Employee', 1510888173),
(1700000301, 'kervin', 'Update Employee Profile', 'Employee', 1510888178),
(1700000302, 'kervin', 'Checked his/her attendance', 'Employee', 1510888181),
(1700000303, 'kervin', 'Checked his/her attendance', 'Employee', 1510888456),
(1700000304, 'punk', 'Checked employees'' attendance', 'Administrator', 1510888461),
(1700000305, 'kervin', 'Checked his/her attendance', 'Employee', 1510888480),
(1700000306, 'kervin', 'Checked his/her attendance', 'Employee', 1510888485),
(1700000307, 'kervin', 'Logout', 'Employee', 1510888552),
(1700000308, 'seej', 'Login', 'Super Administrator', 1510888558),
(1700000309, 'seej', 'View active employees', 'Super Administrator', 1510888567),
(1700000310, 'seej', 'Delete/Deactivate an admin', 'Super Administrator', 1510888587),
(1700000311, 'seej', 'Edit admin data -- corbin', 'Super Administrator', 1510888715),
(1700000312, 'punk', 'Logout', 'Administrator', 1510889263),
(1700000313, 'alexa', 'Login', 'Employee', 1510889268),
(1700000314, 'alexa', 'Check in', 'Employee', 1510889270),
(1700000315, 'seej', 'Checked employees'' attendance', 'Super Administrator', 1510889420),
(1700000316, 'seej', 'Checked employees'' attendance', 'Super Administrator', 1510889422),
(1700000317, 'seej', 'Add an admin -- ', 'Super Administrator', 1510890567),
(1700000318, 'seej', 'Add an admin -- uge', 'Super Administrator', 1510891114),
(1700000319, 'seej', 'Add an admin -- rex', 'Super Administrator', 1510891226),
(1700000320, 'seej', 'View an admin', 'Super Administrator', 1510891238),
(1700000321, 'seej', 'View active employees', 'Super Administrator', 1510891276),
(1700000322, 'seej', 'Logout', 'Super Administrator', 1510891563),
(1700000323, 'seej', 'Login', 'Super Administrator', 1510891581),
(1700000324, 'seej', 'Logout', 'Super Administrator', 1510891604),
(1700000325, 'seej', 'Login', 'Super Administrator', 1510891609),
(1700000326, 'seej', 'Logout', 'Super Administrator', 1510891615),
(1700000327, 'seej', 'Login', 'Super Administrator', 1510892452),
(1700000328, 'seej', 'Checked employees'' attendance', 'Super Administrator', 1510892505),
(1700000329, 'seej', 'Checked employees'' attendance', 'Super Administrator', 1510894355),
(1700000330, 'seej', 'Login', 'Super Administrator', 1510917335),
(1700000331, 'seej', 'Checked employees'' attendance', 'Super Administrator', 1510917374),
(1700000332, 'alexa', 'Login', 'Employee', 1510917494),
(1700000333, 'alexa', 'Check out', 'Employee', 1510917602),
(1700000334, 'alexa', 'Checked his/her attendance', 'Employee', 1510917606),
(1700000335, 'seej', 'Checked employees'' attendance', 'Super Administrator', 1510917637),
(1700000336, 'seej', 'Delete/Deactivate an admin', 'Super Administrator', 1510918267),
(1700000337, 'seej', 'Delete/Deactivate an admin', 'Super Administrator', 1510918701),
(1700000338, 'seej', 'Restore an admin', 'Super Administrator', 1510918869),
(1700000339, 'seej', 'Restore an admin', 'Super Administrator', 1510919067),
(1700000340, 'seej', 'View active employees', 'Super Administrator', 1510919103),
(1700000341, 'seej', 'View active employees', 'Super Administrator', 1510919206),
(1700000342, 'seej', 'Delete/Deactivate an employee', 'Super Administrator', 1510919224),
(1700000343, 'seej', 'View inactive employees', 'Super Administrator', 1510919225),
(1700000344, 'seej', 'Restore an employee', 'Super Administrator', 1510919227),
(1700000345, 'seej', 'View active employees', 'Super Administrator', 1510919229),
(1700000346, 'alexa', 'Logout', 'Employee', 1510919443),
(1700000347, 'seej', 'Checked employees'' attendance', 'Super Administrator', 1510919454),
(1700000348, 'seej', 'Add an employee -- lol', 'Super Administrator', 1510921134),
(1700000349, 'lol', 'Login', 'Employee', 1510921225),
(1700000350, 'lol', 'Check in', 'Employee', 1510921237),
(1700000351, 'lol', 'Logout', 'Employee', 1510921247),
(1700000352, 'seej', 'Add an employee -- pop', 'Super Administrator', 1510921379),
(1700000353, 'seej', 'View active employees', 'Super Administrator', 1510921398),
(1700000354, 'seej', 'View active employees', 'Super Administrator', 1510921406),
(1700000355, 'seej', 'Add an employee -- koko', 'Super Administrator', 1510921730),
(1700000356, 'seej', 'Add an employee -- mom', 'Super Administrator', 1510921882),
(1700000357, 'seej', 'Add an employee -- klk', 'Super Administrator', 1510921969),
(1700000358, 'seej', 'View active employees', 'Super Administrator', 1510922038),
(1700000359, 'seej', 'View active employees', 'Super Administrator', 1510922057),
(1700000360, 'seej', 'Add an employee -- andrew', 'Super Administrator', 1510922249),
(1700000361, 'seej', 'View active employees', 'Super Administrator', 1510922269),
(1700000362, 'seej', 'View an employee', 'Super Administrator', 1510922271),
(1700000363, 'seej', 'View active employees', 'Super Administrator', 1510922281),
(1700000364, 'andrew', 'Login', 'Employee', 1510922287),
(1700000365, 'andrew', 'Check in', 'Employee', 1510922291),
(1700000366, 'andrew', 'Checked his/her attendance', 'Employee', 1510922294),
(1700000367, 'andrew', 'Check out', 'Employee', 1510923967),
(1700000368, 'andrew', 'Logout', 'Employee', 1510924043),
(1700000369, 'seej', 'Login', 'Super Administrator', 1510958059),
(1700000370, 'seej', 'Add an employee -- se', 'Super Administrator', 1510958152),
(1700000371, 'seej', 'Add an employee -- qwe', 'Super Administrator', 1510958274),
(1700000372, 'seej', 'Logout', 'Super Administrator', 1510958389),
(1700000373, 'alexa', 'Login', 'Employee', 1510958396),
(1700000374, 'alexa', 'Check in', 'Employee', 1510958401),
(1700000375, 'alexa', 'Checked his/her attendance', 'Employee', 1510958404),
(1700000376, 'alexa', 'Logout', 'Employee', 1510958407),
(1700000377, 'kervine', 'Login', 'Employee', 1510958427),
(1700000378, 'kervine', 'Check in', 'Employee', 1510958429),
(1700000379, 'kervine', 'Checked his/her attendance', 'Employee', 1510958430),
(1700000380, 'kervine', 'Checked his/her attendance', 'Employee', 1510958467),
(1700000381, 'kervine', 'Logout', 'Employee', 1510958477),
(1700000382, 'andrew', 'Login', 'Employee', 1510958483),
(1700000383, 'andrew', 'Checked his/her attendance', 'Employee', 1510958485),
(1700000384, 'andrew', 'Check in', 'Employee', 1510958489),
(1700000385, 'andrew', 'Checked his/her attendance', 'Employee', 1510958491),
(1700000386, 'andrew', 'Logout', 'Employee', 1510958494),
(1700000387, 'seej', 'Login', 'Super Administrator', 1510958505),
(1700000388, 'andrew', 'Login', 'Employee', 1510958690),
(1700000389, 'andrew', 'Check in (On Time)', 'Employee', 1510958696),
(1700000390, 'andrew', 'Checked his/her attendance', 'Employee', 1510958698),
(1700000391, 'andrew', 'Checked his/her attendance', 'Employee', 1510958741),
(1700000392, 'andrew', 'Checked his/her attendance', 'Employee', 1510958802),
(1700000393, 'andrew', 'Checked his/her attendance', 'Employee', 1510958875),
(1700000394, 'andrew', 'Check out (Overtime)', 'Employee', 1510959285),
(1700000395, 'andrew', 'Checked his/her attendance', 'Employee', 1510959287),
(1700000396, 'andrew', 'Checked his/her attendance', 'Employee', 1510959327),
(1700000397, 'andrew', 'Logout', 'Employee', 1510959376),
(1700000398, 'seej', 'Login', 'Super Administrator', 1510960873),
(1700000399, 'seej', 'Logout', 'Super Administrator', 1510960941),
(1700000400, 'punk', 'Login', 'Administrator', 1510960945),
(1700000401, 'punk', 'Logout', 'Administrator', 1510961016),
(1700000402, 'alexa', 'Login', 'Employee', 1510961024),
(1700000403, 'alexa', 'Logout', 'Employee', 1510961032),
(1700000404, 'alexa', 'Request for password reset', 'Employee', 1510961659),
(1700000405, 'seej', 'Add an admin -- sd', 'Super Administrator', 1510964100),
(1700000406, 'sd', 'Login', 'Administrator', 1510964158),
(1700000407, 'sd', 'Checked employees'' attendance', 'Administrator', 1510964170),
(1700000408, 'sd', 'Logout', 'Administrator', 1510964175),
(1700000409, 'alexa', 'Login', 'Employee', 1510965170),
(1700000410, 'alexa', 'Logout', 'Employee', 1510965240),
(1700000411, 'alexa', 'Login', 'Employee', 1510965259),
(1700000412, 'alexa', 'Logout', 'Employee', 1510965261),
(1700000413, 'alexa', 'Login', 'Employee', 1510965949),
(1700000414, 'alexa', 'Logout', 'Employee', 1510965952),
(1700000415, 'alexa', 'Login', 'Employee', 1510966000),
(1700000416, 'alexa', 'Logout', 'Employee', 1510966006),
(1700000417, 'alexa', 'Login', 'Employee', 1510966017),
(1700000418, 'alexa', 'Logout', 'Employee', 1510966033),
(1700000419, 'alexa', 'Login', 'Employee', 1510966392),
(1700000420, 'alexa', 'Logout', 'Employee', 1510966402),
(1700000421, 'seej', 'Login', 'Super Administrator', 1510966713),
(1700000422, 'seej', 'Logout', 'Super Administrator', 1510966722),
(1700000423, 'alexa', 'Login', 'Employee', 1510966818),
(1700000424, 'alexa', 'Logout', 'Employee', 1510966821),
(1700000425, 'alexa', 'Password reset', 'Employee', 1510967327),
(1700000426, 'alexa', 'Login', 'Employee', 1510967341),
(1700000427, 'alexa', 'Checked his/her attendance', 'Employee', 1510967345),
(1700000428, 'alexa', 'Checked his/her attendance', 'Employee', 1510967349),
(1700000429, 'alexa', 'Logout', 'Employee', 1510967351),
(1700000430, 'alexa', 'Password reset', 'Employee', 1510967907),
(1700000431, 'alexa', 'Login', 'Employee', 1510967922),
(1700000432, 'alexa', 'Logout', 'Employee', 1510967932),
(1700000433, 'alexa', 'Password reset', 'Employee', 1510967960),
(1700000434, 'alexa', 'Login', 'Employee', 1510967972),
(1700000435, 'alexa', 'Logout', 'Employee', 1510967982),
(1700000436, 'seej', 'Login', 'Super Administrator', 1510991665),
(1700000437, 'seej', 'View active employees', 'Super Administrator', 1510992049),
(1700000438, 'seej', 'Logout', 'Super Administrator', 1510992059),
(1700000439, 'alexa', 'Login', 'Employee', 1510995369),
(1700000440, 'alexa', 'Check out ()', 'Employee', 1510995376),
(1700000441, 'alexa', 'Checked his/her attendance', 'Employee', 1510995378),
(1700000442, 'seej', 'Login', 'Super Administrator', 1510995404),
(1700000443, 'alexa', 'Logout', 'Employee', 1510995865),
(1700000444, 'seej', 'Checked employees'' attendance', 'Super Administrator', 1510996561),
(1700000445, 'seej', 'Logout', 'Super Administrator', 1511006907),
(1700000446, 'seej', 'Login', 'Super Administrator', 1511006915),
(1700000447, 'alexa', 'Login', 'Employee', 1511007399),
(1700000448, 'alexa', 'Logout', 'Employee', 1511007438),
(1700000449, 'andrew', 'Login', 'Employee', 1511007442),
(1700000450, 'andrew', 'Check out', 'Employee', 1511007444),
(1700000451, 'andrew', 'Checked his/her attendance', 'Employee', 1511007445),
(1700000452, 'seej', 'Checked employees'' attendance', 'Super Administrator', 1511007457),
(1700000453, 'andrew', 'Logout', 'Employee', 1511007596),
(1700000454, 'punk', 'Login', 'Administrator', 1511007601),
(1700000455, 'punk', 'Logout', 'Administrator', 1511007805),
(1700000456, 'punk', 'Login', 'Administrator', 1511007808),
(1700000457, 'seej', 'Change password', 'Super Administrator', 1511008066),
(1700000458, 'seej', 'Logout', 'Super Administrator', 1511008074),
(1700000459, 'seej', 'Login', 'Super Administrator', 1511008078),
(1700000460, 'punk', 'Change password', 'Administrator', 1511008190),
(1700000461, 'punk', 'Change password', 'Administrator', 1511008211),
(1700000462, 'punk', 'Logout', 'Administrator', 1511008505),
(1700000463, 'punk', 'Login', 'Administrator', 1511008509),
(1700000464, 'punk', 'Logout', 'Administrator', 1511008511),
(1700000465, 'kervine', 'Login', 'Employee', 1511008540),
(1700000466, 'kervine', 'Logout', 'Employee', 1511009095),
(1700000467, 'kervine', 'Login', 'Employee', 1511009118),
(1700000468, 'kervine', 'Change password', 'Employee', 1511009258),
(1700000469, 'kervine', 'Logout', 'Employee', 1511009274),
(1700000470, 'kervine', 'Login', 'Employee', 1511009278),
(1700000471, 'kervine', 'Change password', 'Employee', 1511009301),
(1700000472, 'kervine', 'Logout', 'Employee', 1511009303),
(1700000473, 'kervine', 'Login', 'Employee', 1511009310),
(1700000474, 'kervine', 'Logout', 'Employee', 1511009329),
(1700000475, 'seej', 'Logout', 'Super Administrator', 1511009374),
(1700000476, 'seej', 'Login', 'Super Administrator', 1511020655),
(1700000477, 'seej', 'Login', 'Super Administrator', 1511022862),
(1700000478, 'seej', 'Logout', 'Super Administrator', 1511023118),
(1700000479, 'seej', 'Login', 'Super Administrator', 1511023132),
(1700000480, 'seej', 'Change password', 'Super Administrator', 1511023231),
(1700000481, 'seej', 'Logout', 'Super Administrator', 1511023235),
(1700000482, 'seej', 'Login', 'Super Administrator', 1511023239),
(1700000483, 'seej', 'Change password', 'Super Administrator', 1511023250),
(1700000484, 'seej', 'Update Profile', 'Super Administrator', 1511024168),
(1700000485, 'seej', 'Update Profile', 'Super Administrator', 1511024283),
(1700000486, 'seej', 'Update Profile', 'Super Administrator', 1511024302),
(1700000487, 'seej', 'Update Profile', 'Super Administrator', 1511024347),
(1700000488, 'seej', 'Update Profile', 'Super Administrator', 1511024353),
(1700000489, 'seej', 'Update Profile', 'Super Administrator', 1511024464),
(1700000490, 'seej', 'Update Profile', 'Super Administrator', 1511024624),
(1700000491, 'seej', 'Update Profile', 'Super Administrator', 1511024843),
(1700000492, 'seej', 'Update Profile', 'Super Administrator', 1511025245),
(1700000493, 'seej', 'Logout', 'Super Administrator', 1511025272),
(1700000494, 'seej', 'Login', 'Super Administrator', 1511025277),
(1700000495, 'seej', 'Logout', 'Super Administrator', 1511025281),
(1700000496, 'seej', 'Login', 'Super Administrator', 1511059226),
(1700000497, 'seej', 'Update Profile', 'Super Administrator', 1511059275),
(1700000498, 'seej', 'Update Profile', 'Super Administrator', 1511059296),
(1700000499, 'seej', 'Checked employees'' attendance', 'Super Administrator', 1511059393),
(1700000500, 'seej', 'Checked employees'' attendance', 'Super Administrator', 1511059418),
(1700000501, 'alexa', 'Login', 'Employee', 1511059480),
(1700000502, 'alexa', 'Check in (Late)', 'Employee', 1511059488),
(1700000503, 'alexa', 'Checked his/her attendance', 'Employee', 1511059490),
(1700000504, 'seej', 'Checked employees'' attendance', 'Super Administrator', 1511059499),
(1700000505, 'seej', 'Checked employees'' attendance', 'Super Administrator', 1511059524),
(1700000506, 'seej', 'Checked employees'' attendance', 'Super Administrator', 1511059526),
(1700000507, 'seej', 'Checked employees'' attendance', 'Super Administrator', 1511059529),
(1700000508, 'seej', 'Checked employees'' attendance', 'Super Administrator', 1511059537),
(1700000509, 'seej', 'Checked employees'' attendance', 'Super Administrator', 1511059554),
(1700000510, 'seej', 'Checked employees'' attendance', 'Super Administrator', 1511059584),
(1700000511, 'alexa', 'Checked his/her attendance', 'Employee', 1511059600),
(1700000512, 'alexa', 'Logout', 'Employee', 1511059602),
(1700000513, 'andrew', 'Login', 'Employee', 1511059607),
(1700000514, 'andrew', 'Check in (Late)', 'Employee', 1511059614),
(1700000515, 'seej', 'Checked employees'' attendance', 'Super Administrator', 1511059630),
(1700000516, 'seej', 'Logout', 'Super Administrator', 1511059732),
(1700000517, 'seej', 'Login', 'Super Administrator', 1511060039),
(1700000518, 'andrew', 'Logout', 'Employee', 1511060605),
(1700000519, 'kervine', 'Login', 'Employee', 1511060612),
(1700000520, 'kervine', 'Check in (Late)', 'Employee', 1511060637),
(1700000521, 'kervine', 'Logout', 'Employee', 1511061128),
(1700000522, 'seej', 'Logout', 'Super Administrator', 1511061152),
(1700000523, 'seej', 'Login', 'Super Administrator', 1511102351),
(1700000524, 'alexa', 'Login', 'Employee', 1511102460),
(1700000525, 'alexa', 'Check out', 'Employee', 1511102469),
(1700000526, 'alexa', 'Checked his/her attendance', 'Employee', 1511102471),
(1700000527, 'alexa', 'Update Employee Profile', 'Employee', 1511102875),
(1700000528, 'alexa', 'Update Employee Profile', 'Employee', 1511102906),
(1700000529, 'alexa', 'Update Employee Profile', 'Employee', 1511102933),
(1700000530, 'alexa', 'Update Employee Profile', 'Employee', 1511103139),
(1700000531, 'seej', 'Checked employees'' attendance', 'Super Administrator', 1511103179),
(1700000532, 'alexa', 'Logout', 'Employee', 1511103184),
(1700000533, 'kervine', 'Login', 'Employee', 1511103192),
(1700000534, 'kervine', 'Check out', 'Employee', 1511103195),
(1700000535, 'seej', 'Checked employees'' attendance', 'Super Administrator', 1511103196),
(1700000536, 'seej', 'Checked employees'' attendance', 'Super Administrator', 1511103202),
(1700000537, 'seej', 'Checked employees'' attendance', 'Super Administrator', 1511103203),
(1700000538, 'kervine', 'Logout', 'Employee', 1511103208),
(1700000539, 'andrew', 'Login', 'Employee', 1511103219),
(1700000540, 'andrew', 'Check out', 'Employee', 1511103221),
(1700000541, 'andrew', 'Logout', 'Employee', 1511103222),
(1700000542, 'punk', 'Login', 'Administrator', 1511103237),
(1700000543, 'punk', 'Update Profile', 'Administrator', 1511103528),
(1700000544, 'punk', 'Update Profile', 'Administrator', 1511103559),
(1700000545, 'punk', 'Update Profile', 'Administrator', 1511103710),
(1700000546, 'punk', 'Update Profile', 'Administrator', 1511103739),
(1700000547, 'punk', 'Update Profile', 'Administrator', 1511103765),
(1700000548, 'kervine', 'Login', 'Employee', 1511268073),
(1700000549, 'kervine', 'Check in (Late)', 'Employee', 1511268112),
(1700000550, 'kervine', 'Update Employee Profile', 'Employee', 1511268186),
(1700000551, 'seej', 'Login', 'Super Administrator', 1511268211),
(1700000552, 'kervine', 'Logout', 'Employee', 1511268230),
(1700000553, 'seej', 'Checked employees'' attendance', 'Super Administrator', 1511268233),
(1700000554, 'alexa', 'Login', 'Employee', 1511268254),
(1700000555, 'alexa', 'Check in (Late)', 'Employee', 1511268257),
(1700000556, 'alexa', 'Logout', 'Employee', 1511268281),
(1700000557, 'andrew', 'Login', 'Employee', 1511268302),
(1700000558, 'andrew', 'Check in (Late)', 'Employee', 1511268305),
(1700000559, 'andrew', 'Logout', 'Employee', 1511268311),
(1700000560, 'seej', 'Checked employees'' attendance', 'Super Administrator', 1511268315),
(1700000561, 'kervine', 'Login', 'Employee', 1511268327),
(1700000562, 'kervine', 'Check out', 'Employee', 1511268329),
(1700000563, 'seej', 'Checked employees'' attendance', 'Super Administrator', 1511268333),
(1700000564, 'kervine', 'Check out', 'Employee', 1511268451),
(1700000565, 'seej', 'Checked employees'' attendance', 'Super Administrator', 1511268453),
(1700000566, 'seej', 'Checked employees'' attendance', 'Super Administrator', 1511268485),
(1700000567, 'seej', 'Add an employee', 'Super Administrator', 1511277614),
(1700000568, 'seej', 'Add an employee', 'Super Administrator', 1511277839),
(1700000569, 'seej', 'View active employees', 'Super Administrator', 1511278213),
(1700000570, 'seej', 'View active employees', 'Super Administrator', 1511278440),
(1700000571, 'seej', 'Add an employee -- enzo', 'Super Administrator', 1511278639),
(1700000572, 'seej', 'Checked employees'' attendance', 'Super Administrator', 1511278696),
(1700000573, 'kervine', 'Logout', 'Employee', 1511279113),
(1700000574, 'enzo', 'Login', 'Employee', 1511279128),
(1700000575, 'enzo', 'Check in (Late)', 'Employee', 1511279144),
(1700000576, 'enzo', 'Checked his/her attendance', 'Employee', 1511279146),
(1700000577, 'seej', 'Checked employees'' attendance', 'Super Administrator', 1511279168),
(1700000578, 'enzo', 'Checked his/her attendance', 'Employee', 1511279275),
(1700000579, 'seej', 'Checked employees'' attendance', 'Super Administrator', 1511279279),
(1700000580, 'enzo', 'Check out', 'Employee', 1511279287),
(1700000581, 'enzo', 'Checked his/her attendance', 'Employee', 1511279288),
(1700000582, 'seej', 'Checked employees'' attendance', 'Super Administrator', 1511279290),
(1700000583, 'enzo', 'Checked his/her attendance', 'Employee', 1511279574),
(1700000584, 'enzo', 'Checked his/her attendance', 'Employee', 1511279986),
(1700000585, 'enzo', 'Check in (On time)', 'Employee', 1511280595),
(1700000586, 'enzo', 'Checked his/her attendance', 'Employee', 1511280599),
(1700000587, 'enzo', 'Check in (On time)', 'Employee', 1511280977),
(1700000588, 'enzo', 'Check in (On time)', 'Employee', 1511281073),
(1700000589, 'enzo', 'Check in (On time)', 'Employee', 1511282420),
(1700000590, 'enzo', 'Check in (On time)', 'Employee', 1511282721),
(1700000591, 'enzo', 'Check in (On time)', 'Employee', 1511282901),
(1700000592, 'enzo', 'Check in (On time)', 'Employee', 1511283111),
(1700000593, 'enzo', 'Check in (On time)', 'Employee', 1511283222),
(1700000594, 'enzo', 'Check out', 'Employee', 1511283253),
(1700000595, 'enzo', 'Check in (On time)', 'Employee', 1511283264),
(1700000596, 'enzo', 'Check in (On time)', 'Employee', 1511283288),
(1700000597, 'enzo', 'Check out', 'Employee', 1511283580),
(1700000598, 'enzo', 'Check in (On time)', 'Employee', 1511283591),
(1700000599, 'enzo', 'Check in (On time)', 'Employee', 1511283622),
(1700000600, 'enzo', 'Check in (On time)', 'Employee', 1511283710),
(1700000601, 'enzo', 'Check in (On time)', 'Employee', 1511284086),
(1700000602, 'enzo', 'Check in (On time)', 'Employee', 1511284116),
(1700000603, 'enzo', 'Check in (On time)', 'Employee', 1511284199),
(1700000604, 'enzo', 'Check out', 'Employee', 1511284318),
(1700000605, 'seej', 'Checked employees'' attendance', 'Super Administrator', 1511284356),
(1700000606, 'enzo', 'Check in (On time)', 'Employee', 1511284447),
(1700000607, 'enzo', 'Check out', 'Employee', 1511284453),
(1700000608, 'enzo', 'Check in (On time)', 'Employee', 1511284542),
(1700000609, 'enzo', 'Check out', 'Employee', 1511284552),
(1700000610, 'enzo', 'Check in (On time)', 'Employee', 1511284878),
(1700000611, 'enzo', 'Check out', 'Employee', 1511284902),
(1700000612, 'enzo', 'Logout', 'Employee', 1511284962),
(1700000613, 'alexa', 'Login', 'Employee', 1511284969),
(1700000614, 'alexa', 'Check in (On time)', 'Employee', 1511284971),
(1700000615, 'alexa', 'Checked his/her attendance', 'Employee', 1511285111),
(1700000616, 'alexa', 'Logout', 'Employee', 1511285117),
(1700000617, 'enzo', 'Login', 'Employee', 1511285123),
(1700000618, 'enzo', 'Checked his/her attendance', 'Employee', 1511285124),
(1700000619, 'seej', 'Logout', 'Super Administrator', 1511285133),
(1700000620, 'punk', 'Login', 'Administrator', 1511285137),
(1700000621, 'punk', 'Logout', 'Administrator', 1511285149),
(1700000622, 'seej', 'Login', 'Super Administrator', 1511285160),
(1700000623, 'enzo', 'Edit payroll info', 'Employee', 1511285449),
(1700000624, 'enzo', 'Edit payroll info', 'Employee', 1511285476),
(1700000625, 'enzo', 'Update Employee Profile', 'Employee', 1511285908),
(1700000626, 'enzo', 'Logout', 'Employee', 1511285923),
(1700000627, 'enzo', 'Login', 'Employee', 1511285928),
(1700000628, 'seej', 'Add an admin -- jbjb', 'Super Administrator', 1511286037),
(1700000629, 'seej', 'Checked employees'' attendance', 'Super Administrator', 1511286067),
(1700000630, 'seej', 'Add an employee -- kjbjk', 'Super Administrator', 1511286340),
(1700000631, 'seej', 'View active employees', 'Super Administrator', 1511286343),
(1700000632, 'seej', 'Add an employee -- nbvm,', 'Super Administrator', 1511286397),
(1700000633, 'seej', 'View active employees', 'Super Administrator', 1511286403),
(1700000634, 'seej', 'Logout', 'Super Administrator', 1511291758),
(1700000635, 'seej', 'Login', 'Super Administrator', 1511291856),
(1700000636, 'seej', 'Logout', 'Super Administrator', 1511291865),
(1700000637, 'seej', 'Login', 'Super Administrator', 1511291921),
(1700000638, 'enzo', 'Logout', 'Employee', 1511293242),
(1700000639, 'seej', 'Add an admin -- jkbkj', 'Super Administrator', 1511293846),
(1700000640, 'seej', 'Login', 'Super Administrator', 1511323170),
(1700000641, 'seej', 'View active employees', 'Super Administrator', 1511323206),
(1700000642, 'seej', 'Checked employees'' attendance', 'Super Administrator', 1511323212),
(1700000643, 'seej', 'Checked employees'' attendance', 'Super Administrator', 1511323882),
(1700000644, 'punk', 'Login', 'Administrator', 1511323921),
(1700000645, 'punk', 'Logout', 'Administrator', 1511323924),
(1700000646, 'alexa', 'Login', 'Employee', 1511323929),
(1700000647, 'alexa', 'Logout', 'Employee', 1511323943),
(1700000648, 'kervine', 'Login', 'Employee', 1511323950),
(1700000649, 'kervine', 'Check in (Late)', 'Employee', 1511323951),
(1700000650, 'kervine', 'Logout', 'Employee', 1511323953),
(1700000651, 'alexa', 'Login', 'Employee', 1511323958),
(1700000652, 'alexa', 'Check out', 'Employee', 1511323960),
(1700000653, 'seej', 'Checked employees'' attendance', 'Super Administrator', 1511323962),
(1700000654, 'alexa', 'Logout', 'Employee', 1511323970),
(1700000655, 'seej', 'View active employees', 'Super Administrator', 1511323976),
(1700000656, 'seej', 'Checked employees'' attendance', 'Super Administrator', 1511323981),
(1700000657, 'andrew', 'Login', 'Employee', 1511323999),
(1700000658, 'andrew', 'Check in (Late)', 'Employee', 1511324000),
(1700000659, 'seej', 'Checked employees'' attendance', 'Super Administrator', 1511324004),
(1700000660, 'seej', 'View an employee', 'Super Administrator', 1511324053),
(1700000661, 'seej', 'Checked employees'' attendance', 'Super Administrator', 1511324116),
(1700000662, 'seej', 'Checked employees'' attendance', 'Super Administrator', 1511324123),
(1700000663, 'seej', 'Checked employees'' attendance', 'Super Administrator', 1511324127),
(1700000664, 'seej', 'Checked employees'' attendance', 'Super Administrator', 1511324130),
(1700000665, 'seej', 'Checked employees'' attendance', 'Super Administrator', 1511324284),
(1700000666, 'seej', 'Checked employees'' attendance', 'Super Administrator', 1511324288),
(1700000667, 'seej', 'Checked employees'' attendance', 'Super Administrator', 1511324300),
(1700000668, 'seej', 'Checked employees'' attendance', 'Super Administrator', 1511324301),
(1700000669, 'seej', 'Checked employees'' attendance', 'Super Administrator', 1511324304),
(1700000670, 'seej', 'Checked employees'' attendance', 'Super Administrator', 1511324349),
(1700000671, 'seej', 'Checked employees'' attendance', 'Super Administrator', 1511324353),
(1700000672, 'seej', 'Checked employees'' attendance', 'Super Administrator', 1511324356),
(1700000673, 'seej', 'Checked employees'' attendance', 'Super Administrator', 1511324365),
(1700000674, 'seej', 'Checked employees'' attendance', 'Super Administrator', 1511324371),
(1700000675, 'seej', 'Checked employees'' attendance', 'Super Administrator', 1511324372),
(1700000676, 'seej', 'View active employees', 'Super Administrator', 1511324393),
(1700000677, 'seej', 'View an employee', 'Super Administrator', 1511324396),
(1700000678, 'joe', 'Add an employee -- romanr', 'Administrator', 1511333868),
(1700000679, 'joe', 'View active employees', 'Administrator', 1511333871),
(1700000680, 'joe', 'View active employees', 'Administrator', 1511333916),
(1700000681, 'joe', 'Add an employee -- conorm', 'Administrator', 1511334013),
(1700000682, 'joe', 'View active employees', 'Administrator', 1511334054),
(1700000683, 'joe', 'View active employees', 'Administrator', 1511334077),
(1700000684, 'joe', 'View active employees', 'Administrator', 1511334081),
(1700000685, 'joe', 'Add an employee -- andersons', 'Administrator', 1511334241),
(1700000686, 'joe', 'Add an employee -- kyrie', 'Administrator', 1511334424),
(1700000687, 'joe', 'View active employees', 'Administrator', 1511334427),
(1700000688, 'joe', 'Add an employee -- jaylen', 'Administrator', 1511334596),
(1700000689, 'joe', 'View active employees', 'Administrator', 1511334730),
(1700000690, 'joe', 'Add an employee -- joshua', 'Administrator', 1511334917),
(1700000691, 'joe', 'View active employees', 'Administrator', 1511334922),
(1700000692, 'joe', 'Checked employees'' attendance', 'Administrator', 1511335013),
(1700000693, 'joe', 'View active employees', 'Administrator', 1511335021),
(1700000694, 'joe', 'View an employee', 'Administrator', 1511335026),
(1700000695, 'joe', 'View active employees', 'Administrator', 1511335031),
(1700000696, 'joe', 'View an employee', 'Administrator', 1511335034),
(1700000697, 'joe', 'Logout', 'Administrator', 1511335126),
(1700000698, 'romanr', 'Login', 'Employee', 1511335188),
(1700000699, 'romanr', 'Login', 'Employee', 1511335188),
(1700000700, 'romanr', 'Logout', 'Employee', 1511335194),
(1700000701, 'romanr', 'Login', 'Employee', 1511335782),
(1700000702, 'romanr', 'Logout', 'Employee', 1511345318),
(1700000703, 'romanr', 'Login', 'Employee', 1511345591),
(1700000704, 'seej', 'Logout', 'Super Administrator', 1511348027),
(1700000705, 'seej', 'Login', 'Super Administrator', 1511348033),
(1700000706, 'punk', 'Logout', 'Administrator', 1511348092),
(1700000707, 'romanr', 'Login', 'Employee', 1511348097),
(1700000708, 'romanr', 'Check in (Late)', 'Employee', 1511348251),
(1700000709, 'romanr', 'Logout', 'Employee', 1511348256),
(1700000710, 'kyrie', 'Login', 'Employee', 1511348261),
(1700000711, 'kyrie', 'Check in (Late)', 'Employee', 1511348263),
(1700000712, 'kyrie', 'Logout', 'Employee', 1511348265),
(1700000713, 'jaylen', 'Login', 'Employee', 1511348281),
(1700000714, 'jaylen', 'Check in (Late)', 'Employee', 1511348284),
(1700000715, 'jaylen', 'Logout', 'Employee', 1511348286),
(1700000716, 'conorm', 'Login', 'Employee', 1511348296),
(1700000717, 'conorm', 'Check in (Late)', 'Employee', 1511348298),
(1700000718, 'conorm', 'Logout', 'Employee', 1511348299),
(1700000719, 'joshua', 'Login', 'Employee', 1511348305),
(1700000720, 'joshua', 'Check in (Late)', 'Employee', 1511348307),
(1700000721, 'joshua', 'Logout', 'Employee', 1511348319),
(1700000722, 'andersons', 'Login', 'Employee', 1511348356),
(1700000723, 'andersons', 'Logout', 'Employee', 1511348388),
(1700000724, 'seej', 'View active employees', 'Super Administrator', 1511348510),
(1700000725, 'seej', 'Search for employee data', 'Super Administrator', 1511348521),
(1700000726, 'seej', 'Search for employee data', 'Super Administrator', 1511348528),
(1700000727, 'seej', 'View active employees', 'Super Administrator', 1511348537),
(1700000728, 'kervine', 'Request for password reset', 'Employee', 1511348681),
(1700000729, 'seej', 'Login', 'Super Administrator', 1511349369),
(1700000730, 'seej', 'Add an admin -- atleona', 'Super Administrator', 1511349918),
(1700000731, 'seej', 'View an admin', 'Super Administrator', 1511349990),
(1700000732, 'seej', 'View an admin', 'Super Administrator', 1511349991),
(1700000733, 'seej', 'View an admin', 'Super Administrator', 1511349992),
(1700000734, 'seej', 'View an admin', 'Super Administrator', 1511349993),
(1700000735, 'seej', 'View an admin', 'Super Administrator', 1511349994),
(1700000736, 'seej', 'View an admin', 'Super Administrator', 1511349996),
(1700000737, 'seej', 'View active employees', 'Super Administrator', 1511350013),
(1700000738, 'seej', 'View an employee', 'Super Administrator', 1511350016),
(1700000739, 'seej', 'View an employee', 'Super Administrator', 1511350017),
(1700000740, 'seej', 'View an employee', 'Super Administrator', 1511350018),
(1700000741, 'seej', 'View an employee', 'Super Administrator', 1511350019),
(1700000742, 'seej', 'Logout', 'Super Administrator', 1511350302),
(1700000743, 'andrew', 'Request for password reset', 'Employee', 1511350345),
(1700000744, 'seej', 'View active employees', 'Super Administrator', 1511350445),
(1700000745, 'andrew', 'Login', 'Employee', 1511350464),
(1700000746, 'andrew', 'Update Employee Profile', 'Employee', 1511350468),
(1700000747, 'andrew', 'Update Employee Profile', 'Employee', 1511350483),
(1700000748, 'andrew', 'Update Employee Profile', 'Employee', 1511350488),
(1700000749, 'andrew', 'Check out', 'Employee', 1511350507),
(1700000750, 'andrew', 'Update Employee Profile', 'Employee', 1511350511),
(1700000751, 'andrew', 'Logout', 'Employee', 1511350513),
(1700000752, 'enzo', 'Login', 'Employee', 1511350518),
(1700000753, 'enzo', 'Update Employee Profile', 'Employee', 1511350521),
(1700000754, 'enzo', 'Logout', 'Employee', 1511350580),
(1700000755, 'punk', 'Login', 'Administrator', 1511350584),
(1700000756, 'punk', 'Logout', 'Administrator', 1511350589),
(1700000757, 'seej', 'Login', 'Super Administrator', 1511360547),
(1700000758, 'seej', 'Logout', 'Super Administrator', 1511360804),
(1700000759, 'alexa', 'Login', 'Employee', 1511401964),
(1700000760, 'alexa', 'Update Employee Profile', 'Employee', 1511402079),
(1700000761, 'alexa', 'Update Employee Profile', 'Employee', 1511402094),
(1700000762, 'alexa', 'Check out', 'Employee', 1511402118),
(1700000763, 'alexa', 'Checked his/her attendance', 'Employee', 1511402120),
(1700000764, 'alexa', 'Logout', 'Employee', 1511402273),
(1700000765, 'punk', 'Login', 'Administrator', 1511402278),
(1700000766, 'punk', 'Update Profile', 'Administrator', 1511402309),
(1700000767, 'punk', 'Update Profile', 'Administrator', 1511402320),
(1700000768, 'seej', 'Login', 'Super Administrator', 1511402537),
(1700000769, 'punk', 'View active employees', 'Administrator', 1511402620),
(1700000770, 'punk', 'View active employees', 'Administrator', 1511402654),
(1700000771, 'punk', 'Search for employee data', 'Administrator', 1511402658),
(1700000772, 'punk', 'View active employees', 'Administrator', 1511402664),
(1700000773, 'punk', 'Delete/Deactivate an employee', 'Administrator', 1511402668),
(1700000774, 'punk', 'View inactive employees', 'Administrator', 1511402669),
(1700000775, 'punk', 'Edit employee data -- ', 'Administrator', 1511402675),
(1700000776, 'punk', 'View active employees', 'Administrator', 1511402677),
(1700000777, 'seej', 'View active employees', 'Super Administrator', 1511402690),
(1700000778, 'seej', 'Checked employees'' attendance', 'Super Administrator', 1511402696),
(1700000779, 'punk', 'Logout', 'Administrator', 1511402702),
(1700000780, 'kervine', 'Login', 'Employee', 1511402714),
(1700000781, 'kervine', 'Check in (Late)', 'Employee', 1511402717),
(1700000782, 'kervine', 'Checked his/her attendance', 'Employee', 1511402724),
(1700000783, 'seej', 'View active employees', 'Super Administrator', 1511402749),
(1700000784, 'kervine', 'Logout', 'Employee', 1511402767),
(1700000785, 'seej', 'View active employees', 'Super Administrator', 1511402959),
(1700000786, 'seej', 'Logout', 'Super Administrator', 1511402984),
(1700000787, '', 'Request for password reset', 'Employee', 1511403132),
(1700000788, 'alexa', 'Login', 'Employee', 1511403303),
(1700000789, 'alexa', 'Update Employee Profile', 'Employee', 1511403329),
(1700000790, 'alexa', 'Update Employee Profile', 'Employee', 1511403380),
(1700000791, 'alexa', 'Update Employee Profile', 'Employee', 1511403388),
(1700000792, 'alexa', 'Update Employee Profile', 'Employee', 1511403394),
(1700000793, 'seej', 'Login', 'Super Administrator', 1511403406),
(1700000794, 'seej', 'View active employees', 'Super Administrator', 1511403431),
(1700000795, 'seej', 'Edit employee data -- ', 'Super Administrator', 1511403438),
(1700000796, 'seej', 'View active employees', 'Super Administrator', 1511403448),
(1700000797, 'seej', 'Search for employee data', 'Super Administrator', 1511403454),
(1700000798, 'seej', 'Edit employee data -- ', 'Super Administrator', 1511403462),
(1700000799, 'seej', 'View active employees', 'Super Administrator', 1511403464),
(1700000800, 'seej', 'View an employee', 'Super Administrator', 1511403465),
(1700000801, 'seej', 'Logout', 'Super Administrator', 1511403518),
(1700000802, 'romanr', 'Login', 'Employee', 1511403541),
(1700000803, 'romanr', 'Check in (Late)', 'Employee', 1511403546),
(1700000804, 'romanr', 'Check out', 'Employee', 1511403547),
(1700000805, 'romanr', 'Logout', 'Employee', 1511403555),
(1700000806, 'joe', 'Login', 'Administrator', 1511403562),
(1700000807, 'alexa', 'Logout', 'Employee', 1511403580),
(1700000808, 'seej', 'Login', 'Super Administrator', 1511403585),
(1700000809, 'seej', 'Logout', 'Super Administrator', 1511403599),
(1700000810, 'joe', 'Logout', 'Administrator', 1511403600),
(1700000811, 'seej', 'Login', 'Super Administrator', 1511403745),
(1700000812, 'seej', 'Logout', 'Super Administrator', 1511403796),
(1700000813, 'alexa', 'Password reset', 'Employee', 1511403809),
(1700000814, 'seej', 'Login', 'Super Administrator', 1511403818),
(1700000815, 'alexa', 'Login', 'Employee', 1511403824),
(1700000816, 'alexa', 'Logout', 'Employee', 1511403834),
(1700000817, 'seej', 'Login', 'Super Administrator', 1511403845),
(1700000818, 'seej', 'Logout', 'Super Administrator', 1511403860),
(1700000819, 'alexa', 'Request for password reset', 'Employee', 1511403871),
(1700000820, 'seej', 'Login', 'Super Administrator', 1511403878),
(1700000821, 'seej', 'Logout', 'Super Administrator', 1511403916),
(1700000822, 'alexa', 'Password reset', 'Employee', 1511403949),
(1700000823, 'alexa', 'Login', 'Employee', 1511403957),
(1700000824, 'alexa', 'Logout', 'Employee', 1511403962),
(1700000825, 'enzo', 'Login', 'Employee', 1511404197),
(1700000826, 'enzo', 'Checked his/her attendance', 'Employee', 1511404240),
(1700000827, 'enzo', 'Check in (Late)', 'Employee', 1511404246),
(1700000828, 'enzo', 'Checked his/her attendance', 'Employee', 1511404247),
(1700000829, 'enzo', 'Check out', 'Employee', 1511404264),
(1700000830, 'enzo', 'Logout', 'Employee', 1511404294),
(1700000831, 'romanr', 'Login', 'Employee', 1511404302),
(1700000832, 'romanr', 'Logout', 'Employee', 1511404314),
(1700000833, 'seej', 'Login', 'Super Administrator', 1511426838),
(1700000834, 'seej', 'View active employees', 'Super Administrator', 1511426863),
(1700000835, 'seej', 'Delete/Deactivate an employee', 'Super Administrator', 1511426867),
(1700000836, 'seej', 'View inactive employees', 'Super Administrator', 1511426868),
(1700000837, 'seej', 'Restore an employee', 'Super Administrator', 1511426870),
(1700000838, 'kervine', 'Login', 'Employee', 1511426969),
(1700000839, 'seej', 'View active employees', 'Super Administrator', 1511427529),
(1700000840, 'kervine', 'Update Employee Profile', 'Employee', 1511427566),
(1700000841, 'kervine', 'Logout', 'Employee', 1511427765),
(1700000842, 'seej', 'Logout', 'Super Administrator', 1511427782),
(1700000843, 'alexa', 'Login', 'Employee', 1511496150),
(1700000844, 'alexa', 'Check in (Late)', 'Employee', 1511496155),
(1700000845, 'alexa', 'Edit payroll info', 'Employee', 1511496165),
(1700000846, 'alexa', 'Edit payroll info', 'Employee', 1511496172),
(1700000847, 'alexa', 'Checked his/her attendance', 'Employee', 1511496203),
(1700000848, 'alexa', 'Logout', 'Employee', 1511496211),
(1700000849, 'seej', 'Login', 'Super Administrator', 1511511072),
(1700000850, 'seej', 'Update Profile', 'Super Administrator', 1511511086),
(1700000851, 'seej', 'Update Profile', 'Super Administrator', 1511511089),
(1700000852, 'seej', 'View active employees', 'Super Administrator', 1511511151),
(1700000853, 'seej', 'Edit employee data', 'Super Administrator', 1511511158),
(1700000854, 'seej', 'View active employees', 'Super Administrator', 1511511160),
(1700000855, 'seej', 'Edit employee data', 'Super Administrator', 1511511166),
(1700000856, 'seej', 'View active employees', 'Super Administrator', 1511511168),
(1700000857, 'seej', 'View an employee', 'Super Administrator', 1511511173),
(1700000858, 'seej', 'Logout', 'Super Administrator', 1511511185);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`emp_id`),
  ADD UNIQUE KEY `emp_username` (`emp_username`);

--
-- Indexes for table `pagibigcontribution`
--
ALTER TABLE `pagibigcontribution`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `philhealthcontribution`
--
ALTER TABLE `philhealthcontribution`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `ssscontribution`
--
ALTER TABLE `ssscontribution`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `sub_admin`
--
ALTER TABLE `sub_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `super_admin`
--
ALTER TABLE `super_admin`
  ADD PRIMARY KEY (`s_admin_id`),
  ADD UNIQUE KEY `admin_username` (`s_admin_username`);

--
-- Indexes for table `tbl_payroll`
--
ALTER TABLE `tbl_payroll`
  ADD PRIMARY KEY (`id`),
  ADD KEY `emp_username` (`emp_username`);

--
-- Indexes for table `user_log`
--
ALTER TABLE `user_log`
  ADD PRIMARY KEY (`userlog_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1700000086;
--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `emp_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20170021;
--
-- AUTO_INCREMENT for table `pagibigcontribution`
--
ALTER TABLE `pagibigcontribution`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `philhealthcontribution`
--
ALTER TABLE `philhealthcontribution`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `ssscontribution`
--
ALTER TABLE `ssscontribution`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `sub_admin`
--
ALTER TABLE `sub_admin`
  MODIFY `admin_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2170011;
--
-- AUTO_INCREMENT for table `super_admin`
--
ALTER TABLE `super_admin`
  MODIFY `s_admin_id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1701;
--
-- AUTO_INCREMENT for table `tbl_payroll`
--
ALTER TABLE `tbl_payroll`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `user_log`
--
ALTER TABLE `user_log`
  MODIFY `userlog_id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1700000859;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_payroll`
--
ALTER TABLE `tbl_payroll`
  ADD CONSTRAINT `tbl_payroll_fk_1` FOREIGN KEY (`emp_username`) REFERENCES `employees` (`emp_username`),
  ADD CONSTRAINT `tbl_payroll_ibfk_1` FOREIGN KEY (`emp_username`) REFERENCES `employees` (`emp_username`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
