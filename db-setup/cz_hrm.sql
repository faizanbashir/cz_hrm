-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 17, 2016 at 05:44 AM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cz_hrm`
--

-- --------------------------------------------------------

--
-- Table structure for table `advance_pay_requests`
--

CREATE TABLE `advance_pay_requests` (
  `id` int(10) UNSIGNED NOT NULL,
  `employee_id` int(11) NOT NULL,
  `request_description` text NOT NULL,
  `amount_requested` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_updated_by` int(11) DEFAULT NULL,
  `last_updated_at` timestamp NULL DEFAULT NULL,
  `status` enum('active','approved','rejected','deleted') NOT NULL DEFAULT 'active',
  `approved_by` int(11) DEFAULT NULL,
  `rejected_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `advance_pay_requests`
--

INSERT INTO `advance_pay_requests` (`id`, `employee_id`, `request_description`, `amount_requested`, `created_by`, `created_at`, `last_updated_by`, `last_updated_at`, `status`, `approved_by`, `rejected_by`) VALUES
(1, 12, 'This is a Test Description, for the advance pay.', 5000, 2, '2016-03-16 09:00:47', 1, '2016-04-15 16:36:31', 'approved', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `company_details`
--

CREATE TABLE `company_details` (
  `id` int(11) NOT NULL,
  `company_name` varchar(32) DEFAULT NULL,
  `tag_line` varchar(64) DEFAULT NULL,
  `logo` varchar(32) DEFAULT 'logo.png',
  `website_url` varchar(64) DEFAULT NULL,
  `about_company` varchar(512) DEFAULT NULL,
  `email` varchar(64) DEFAULT NULL,
  `contact_no` varchar(16) DEFAULT NULL,
  `fax_no` varchar(16) DEFAULT NULL,
  `country` varchar(32) DEFAULT NULL,
  `state` varchar(32) DEFAULT NULL,
  `city` varchar(32) DEFAULT NULL,
  `address` varchar(128) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_updated_by` int(11) DEFAULT NULL,
  `last_updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company_details`
--

INSERT INTO `company_details` (`id`, `company_name`, `tag_line`, `logo`, `website_url`, `about_company`, `email`, `contact_no`, `fax_no`, `country`, `state`, `city`, `address`, `created_by`, `created_at`, `last_updated_by`, `last_updated_at`) VALUES
(1, 'Insights Communications', 'We Provide Business Solutions', 'avatar_1.png', 'http://www.insightsdubai.com', 'This is a solution provider company.', 'contactinsightsdubai.com', '1234567890', '1231321231', 'Antigua and Barbuda', 'Saint George', 'Dubai', 'Ist Floor, Acdt. Complex', NULL, '2016-03-04 10:19:18', 1, '2016-05-28 14:34:19');

-- --------------------------------------------------------

--
-- Table structure for table `company_holidays`
--

CREATE TABLE `company_holidays` (
  `id` int(11) NOT NULL,
  `title` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `date` date NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_updated_by` int(11) DEFAULT NULL,
  `last_updated_at` timestamp NULL DEFAULT NULL,
  `status` enum('active','deleted') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'active'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `company_holidays`
--

INSERT INTO `company_holidays` (`id`, `title`, `description`, `date`, `created_by`, `created_at`, `last_updated_by`, `last_updated_at`, `status`) VALUES
(1, 'rgth', 'gfthbcgn', '2016-05-25', 1, '2016-05-04 09:37:46', 1, '2016-05-06 20:42:06', 'deleted'),
(2, 'TEST12345', 'TESTHOLIDAY', '2016-05-03', 1, '2016-05-04 09:39:03', 1, '2016-05-19 15:33:09', 'active'),
(3, 'GAZETTED HOLIDAY test', 'TEST ', '2016-05-23', 1, '2016-05-06 11:41:53', 1, '2016-05-19 15:32:59', 'active'),
(4, 'TEsT hoLidaY', 'teSt', '2016-05-16', 1, '2016-05-09 04:40:34', 1, '2016-05-09 13:42:03', 'deleted'),
(5, 'test test test', 'test holiday', '2016-05-25', 1, '2016-05-19 06:33:29', 1, '2016-05-19 15:33:41', 'deleted');

-- --------------------------------------------------------

--
-- Table structure for table `company_letters`
--

CREATE TABLE `company_letters` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `recipient` int(11) NOT NULL,
  `letter_subject` varchar(512) NOT NULL,
  `letter_body` text NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_updated_by` int(11) DEFAULT NULL,
  `last_updated_at` timestamp NULL DEFAULT NULL,
  `status` enum('active','deleted') NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company_letters`
--

INSERT INTO `company_letters` (`id`, `category_id`, `recipient`, `letter_subject`, `letter_body`, `created_by`, `created_at`, `last_updated_by`, `last_updated_at`, `status`) VALUES
(1, 1, 15, 'teSt', 'Test', 1, '2016-04-22 19:58:26', NULL, NULL, 'active'),
(2, 1, 15, 'teSt', 'SSSSS', 1, '2016-04-23 17:49:20', NULL, NULL, 'active'),
(3, 1, 12, 'teSt', 'WWEWE', 1, '2016-04-23 17:49:49', NULL, NULL, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `company_products`
--

CREATE TABLE `company_products` (
  `id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `short_description` mediumtext NOT NULL,
  `long_description` text NOT NULL,
  `price` varchar(32) NOT NULL,
  `image` varchar(32) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_updated_by` int(11) DEFAULT NULL,
  `last_updated_at` timestamp NULL DEFAULT NULL,
  `status` enum('active','deleted') NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company_products`
--

INSERT INTO `company_products` (`id`, `name`, `short_description`, `long_description`, `price`, `image`, `created_by`, `created_at`, `last_updated_by`, `last_updated_at`, `status`) VALUES
(1, 'iPhone', 'iPhone iPhone iPhone iPhone iPhone iPhone iPhone iPhone iPhone iPhone iPhone iPhone iPhone iPhone iPhone iPhone iPhone iPhone iPhone iPhone iPhone iPhone iPhone iPhone iPhone', 'iPhone iPhone iPhone iPhone iPhone iPhone iPhone iPhone iPhone iPhone iPhone iPhone iPhone iPhone iPhone iPhone iPhone iPhone iPhone iPhone iPhone iPhone iPhone iPhone iPhone iPhone iPhone iPhone iPhone iPhone iPhone iPhone iPhone iPhone iPhone iPhone iPhone iPhone iPhone iPhone iPhone iPhone iPhone iPhone iPhone iPhone iPhone iPhone iPhone iPhone', '50,000 ', '', 1, '2016-04-27 08:00:00', 1, '2016-05-10 21:10:30', 'active'),
(2, 'perfume', 'perfume perfume perfume perfume perfume perfume perfume perfume perfume perfume perfume perfume perfume perfume perfume perfume perfume perfume', 'perfume perfume perfume perfume perfume perfume perfume perfume perfume perfume perfume perfume perfume perfume perfume perfume perfume perfume perfume perfume perfume perfume perfume perfume perfume perfume perfume perfume perfume perfume perfume perfume perfume perfume perfume perfume perfume perfume perfume perfume perfume perfume perfume perfume perfume perfume perfume perfume perfume', '1223', 'Chrysanthemum.jpg', 1, '2016-04-28 06:42:03', NULL, NULL, 'active'),
(3, 'laptop', 'gvkhlbol;', 'rdtruylhyxcfiuo', '1234', 'Hydrangeas.jpg', 1, '2016-04-28 06:51:22', NULL, NULL, 'active'),
(4, 'necklace', 'ERETRY', 'EWRETREYRYSWDSFDTGszdffgh', '1234', 'Jellyfish.jpg', 1, '2016-04-28 06:51:48', NULL, NULL, 'active'),
(5, 'diamond', 'wr4etyr5y', 'awrwetye5ftydhfj', '1234', 'Penguins.jpg', 1, '2016-04-28 06:52:11', NULL, NULL, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `customized_signatures`
--

CREATE TABLE `customized_signatures` (
  `id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL,
  `designation` varchar(32) NOT NULL,
  `email` varchar(32) NOT NULL,
  `contact` varchar(16) NOT NULL,
  `mobile` varchar(16) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_updated_by` int(11) DEFAULT NULL,
  `last_updated_at` timestamp NULL DEFAULT NULL,
  `status` enum('active','deleted') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customized_signatures`
--

INSERT INTO `customized_signatures` (`id`, `name`, `designation`, `email`, `contact`, `mobile`, `created_by`, `created_at`, `last_updated_by`, `last_updated_at`, `status`) VALUES
(1, 'urfeena', 'developer', 'urfi@gmail.com', '1234567890', '1234567890', 0, '2016-05-09 09:29:39', NULL, NULL, 'active'),
(2, 'xyz', 'artist', 'abc@xyz.com', '1234567890', '9898989765', 0, '2016-05-09 09:41:39', 1, '2016-05-10 03:27:41', 'deleted'),
(3, 'faizan', 'developer', 'faizan@gmail.com', '1234567890', '9898989765', 0, '2016-05-10 04:58:31', 1, '2016-05-16 13:38:32', 'deleted'),
(4, 'esefdg', 'dfdgd', 'contact@insightsdubai.com', '1234567890', '9898989765', 0, '2016-05-10 05:05:33', 1, '2016-05-10 14:05:40', 'deleted'),
(5, 'Hamza Bilal', 'QA and Server Manager', 'hamza@insightsdubai.com', 'bhjghjghj', 'hjyfgtrhgfhy', 0, '2016-05-16 04:36:33', NULL, NULL, 'active'),
(6, '[removed] alert&#40;"hello"&#41;', 'AAA', 'Afifabashir11@gmail.com', '234234342', '13212', 0, '2016-05-16 04:49:01', 1, '2016-05-16 13:57:26', 'deleted'),
(7, '[removed] alert&#40;"hello"&#41;', 'aqdefwfre', 'Afifabashir11@gmail.com', '3434646567567', '3443656678678', 0, '2016-05-16 04:51:20', 1, '2016-05-16 13:54:44', 'deleted'),
(8, '<h1> HI </h1>', 'AAA', 'Afifabashir11@gmail.com', '9797048265', '3443656678678', 0, '2016-05-16 04:55:33', 1, '2016-05-16 13:55:59', 'deleted');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `designation_id` int(11) NOT NULL,
  `designation` varchar(32) NOT NULL,
  `first_name` varchar(32) NOT NULL,
  `last_name` varchar(32) NOT NULL,
  `fathers_name` varchar(32) NOT NULL,
  `dob` date NOT NULL,
  `contact_no` varchar(16) NOT NULL,
  `mobile_no` varchar(16) NOT NULL,
  `user_name` varchar(32) NOT NULL,
  `user_password` varchar(128) NOT NULL,
  `email` varchar(32) NOT NULL,
  `email_password` varchar(32) DEFAULT NULL,
  `avatar` varchar(32) NOT NULL DEFAULT 'avatar.gif',
  `country` varchar(32) NOT NULL,
  `state` varchar(32) NOT NULL,
  `city` varchar(32) NOT NULL,
  `address` varchar(64) NOT NULL,
  `pin` varchar(16) NOT NULL,
  `certifications` varchar(128) NOT NULL,
  `trainings` varchar(128) NOT NULL,
  `doj` date NOT NULL,
  `probation_period` varchar(32) NOT NULL,
  `employee_note` varchar(512) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_updated_by` int(11) DEFAULT NULL,
  `last_updated_at` timestamp NULL DEFAULT NULL,
  `link_value` bigint(20) DEFAULT NULL,
  `status` enum('active','suspended','terminated','link_send','deleted') NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `designation_id`, `designation`, `first_name`, `last_name`, `fathers_name`, `dob`, `contact_no`, `mobile_no`, `user_name`, `user_password`, `email`, `email_password`, `avatar`, `country`, `state`, `city`, `address`, `pin`, `certifications`, `trainings`, `doj`, `probation_period`, `employee_note`, `created_by`, `created_at`, `last_updated_by`, `last_updated_at`, `link_value`, `status`) VALUES
(1, 0, 'Admin', 'Shoaib', 'Mohmad', 'Father', '2010-10-13', '1231231231', '9596545092', 'admin', '202cb962ac59075b964b07152d234b70', 'mohmad.shoaib@gmail.com', 'asd123', 'avatar_1.JPG', 'India', 'Jammu and Kashmir', 'Srinagar', 'Zakura, Hazratbal', '190006', 'Test Certification1', 'Test Training1', '2016-03-01', '3', 'This is Admin of the Application', 0, '2016-03-04 05:28:34', 1, '2016-05-28 15:24:08', NULL, 'active'),
(6, 4, 'Reporting Officer', 'Shoaib', 'Mohmad', 'Father', '2016-03-24', '1231231231', '9596545092', 'shoaib', '202cb962ac59075b964b07152d234b70', 'mohmad.shoaib@gmail.com', 'asd', 'avatar.gif', 'Armenia', 'Lorri', 'Dubai', 'Ist Floor, Acdt. Complex', '123', 'Certifications', 'Trainings', '2016-03-14', '2', 'This is a Test Employee note...', 1, '2016-03-04 12:30:23', 1, '2016-04-06 12:04:31', NULL, 'active'),
(12, 4, 'Reporting Officer', 'Hilal', 'Ahmad', 'Father', '2016-03-15', '1231231231', '9596545091', 'hilal', '202cb962ac59075b964b07152d234b70', 'contact@insightsdubai.com', 'sad', 'avatar.gif', 'Bahrain', 'Madinat ''Isa', 'Dubai', 'Ist Floor, Acdt. Complex', '123123', 'Certifications', 'Trainings', '2016-03-01', '2', 'Asd', 1, '2016-03-05 09:08:10', 1, '2016-04-06 11:42:20', NULL, 'active'),
(13, 2, 'Project Manager', 'Ameera ', 'Ullah', 'Aziz ud Din', '2000-01-05', '1231231231', '971557501653', 'ameer', '202cb962ac59075b964b07152d234b70', 'ameer@gmail.com', '123', 'avatar.gif', 'India', 'Jammu and Kashmir', 'Srinagar', 'Ist Floor Wani Comples', '190001', '', '', '2016-03-01', '', 'This is a Test Project Manager.', 1, '2016-03-18 05:58:51', 1, '2016-04-26 21:08:20', NULL, 'active'),
(14, 1, 'Team Leader', 'Nowsheen', 'yousuf', 'Mr. Yousuf', '1991-09-26', '959653282', '959653282', 'Nowsheen', '202cb962ac59075b964b07152d234b70', 'Nowsheen@insightsdubai.com', '12345', 'avatar.gif', 'India', 'Jammu and Kashmir', 'SRINAGAR', 'JANDK', '190018', 'C#,ASP.NET,AI', '', '2016-01-03', '3', '', 1, '2016-04-21 06:41:11', 1, '2016-04-21 16:12:40', NULL, 'active'),
(15, 2, 'Project Manager', 'Hamza', 'Bilal', 'Mr. Bilal ', '1990-03-08', '9797048265', '9797048265', 'hamza', 'bcbe3365e6ac95ea2c0343a2395834dd', 'hamza@insightsdubai.com', 'hamza12345', 'avatar.gif', 'India', 'Jammu and Kashmir', 'srinagar', 'jandk', '190008', 'java, whm, oracle', '', '2014-01-07', '7', '', 1, '2016-04-21 07:05:15', 15, '2016-04-25 20:55:25', NULL, 'active'),
(16, 4, 'Reporting Officer', 'JUNAiD', 'sHAfi', 'SHAfi', '1970-01-01', '9697123123', '9697123123', 'jUNAids', '202cb962ac59075b964b07152d234b70', 'j1@gmail.com', '123', 'avatar.gif', 'India', 'Jammu and Kashmir', 'sriNAGAr', 'jaNdk', '190018', '', '', '2016-04-19', '6', 'DFhDFd', 1, '2016-04-26 06:41:02', 1, '2016-04-26 15:46:33', NULL, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `employee_assets`
--

CREATE TABLE `employee_assets` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `asset_name` varchar(32) NOT NULL,
  `description` text NOT NULL,
  `issued_on` date DEFAULT NULL,
  `returned_on` date DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `last_updated_by` int(11) DEFAULT NULL,
  `last_updated_at` timestamp NULL DEFAULT NULL,
  `status` enum('issued','returned','deleted') NOT NULL DEFAULT 'issued'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee_assets`
--

INSERT INTO `employee_assets` (`id`, `employee_id`, `asset_name`, `description`, `issued_on`, `returned_on`, `created_by`, `created_at`, `last_updated_by`, `last_updated_at`, `status`) VALUES
(1, 12, 'laptop', 'Dell laptop', '1970-01-01', '2016-03-23', 1, '2016-03-29 07:36:02', 1, '2016-04-25 19:26:32', 'deleted'),
(2, 13, 'iPhone', 'Apple Phones ', '2016-01-26', NULL, 1, '2016-03-29 09:38:40', 1, '2016-04-26 15:43:52', 'issued'),
(3, 12, 'Router', 'D-Link router', '2016-03-01', '1970-01-01', 1, '2016-03-29 10:23:38', 1, '2016-04-26 15:44:58', 'returned'),
(4, 6, 'xzbfx nc', 'dszbfdxhgv', '2016-03-21', NULL, 1, '2016-03-29 10:24:01', 1, '2016-03-29 10:29:18', 'deleted'),
(5, 15, 'modems1233333', 'MODEM123', '1970-01-01', NULL, 1, '2016-04-22 08:35:03', 1, '2016-04-22 17:35:19', 'issued'),
(6, 13, 'Router', 'D-Link', '2015-12-02', NULL, 1, '2016-04-25 10:27:01', 1, '2016-04-26 15:45:34', 'deleted');

-- --------------------------------------------------------

--
-- Table structure for table `employee_designations`
--

CREATE TABLE `employee_designations` (
  `id` int(10) UNSIGNED NOT NULL,
  `designation_title` varchar(128) NOT NULL,
  `designation_description` varchar(512) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_updated_by` int(11) DEFAULT NULL,
  `last_updated_at` timestamp NULL DEFAULT NULL,
  `status` enum('active','deleted') NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee_designations`
--

INSERT INTO `employee_designations` (`id`, `designation_title`, `designation_description`, `created_by`, `created_at`, `last_updated_by`, `last_updated_at`, `status`) VALUES
(1, 'Team Leader', 'Team Leader''s job is to Lead the Team.', 1, '2016-04-06 11:03:08', NULL, NULL, 'active'),
(2, 'Project Manager', 'Project Manager''s Job is to manage the Project.', 1, '2016-04-06 11:05:09', 1, '2016-04-21 17:31:35', 'active'),
(3, 'Line Manager', 'Line Manager''s Job is to view the Performance.', 1, '2016-04-06 11:05:59', 1, '2016-04-06 11:10:02', 'active'),
(4, 'Reporting Officer', 'Reporting Officer''s Job is to manage the Leads.', 1, '2016-04-06 11:06:33', NULL, NULL, 'active'),
(5, 'doctor123', 'doctor doctor doctor', 1, '2016-04-21 08:08:37', 1, '2016-04-21 17:09:14', 'deleted');

-- --------------------------------------------------------

--
-- Table structure for table `employee_evaluation`
--

CREATE TABLE `employee_evaluation` (
  `id` int(10) UNSIGNED NOT NULL,
  `question_id` int(11) NOT NULL,
  `question_description` varchar(512) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `employee_rating` int(11) NOT NULL,
  `concerned_head_ratings` varchar(64) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee_evaluation`
--

INSERT INTO `employee_evaluation` (`id`, `question_id`, `question_description`, `employee_id`, `employee_rating`, `concerned_head_ratings`, `created_at`) VALUES
(1, 1, 'How do you rate your performance?			\r\n			\r\n', 6, 4, '12-8,13-7', '2015-12-31 18:30:00'),
(2, 2, 'You attitude towards work?			\r\n			\r\n', 6, 7, '12-8,13-7', '2015-12-31 18:30:00'),
(3, 3, 'Not been able to do?			\r\n			\r\n', 6, 3, '12-8,13-7', '2015-12-31 18:30:00'),
(4, 4, 'Multi tasking			\r\n			\r\n', 6, 5, '12-8,13-7', '2015-12-31 18:30:00'),
(5, 5, 'Taking Ownership			\r\n			\r\n', 6, 7, '12-8,13-7', '2015-12-31 18:30:00'),
(6, 6, 'Needed to be reminded			\r\n			\r\n', 6, 7, '12-8,13-7', '2015-12-31 18:30:00'),
(7, 7, 'Time management			\r\n			\r\n', 6, 4, '12-8,13-7', '2015-12-31 18:30:00'),
(8, 8, 'Job timely delivery			\r\n			\r\n', 6, 10, '12-8,13-7', '2015-12-31 18:30:00'),
(9, 9, 'Communication			\r\n			\r\n', 6, 6, '12-8,13-7', '2015-12-31 18:30:00'),
(10, 10, 'Skills			\r\n', 6, 7, '12-8,13-7', '2015-12-31 18:30:00'),
(11, 11, 'Speed			\r\n', 6, 6, '12-8,13-7', '2015-12-31 18:30:00'),
(12, 12, 'New skills			\r\n			\r\n', 6, 7, '12-8,13-7', '2015-12-31 18:30:00'),
(13, 13, 'Training Requirement			\r\n			\r\n', 6, 7, '12-8,13-7', '2015-12-31 18:30:00'),
(14, 14, 'Initiative to Learn			\r\n			\r\n', 6, 4, '12-8,13-7', '2015-12-31 18:30:00'),
(15, 15, 'Any Compliments from manager/Colleague?			\r\n			\r\n', 6, 9, '12-8,13-7', '2015-12-31 18:30:00'),
(16, 16, 'Good candidate for future of co			\r\n			\r\n', 6, 8, '12-8,13-7', '2015-12-31 18:30:00'),
(17, 17, 'Any thing we missed to appreciate you for?			\r\n			\r\n', 6, 9, '12-8,13-7', '2015-12-31 18:30:00'),
(18, 18, 'Any value addition to company?			\r\n			\r\n', 6, 10, '12-8,13-7', '2015-12-31 18:30:00'),
(19, 19, 'Where do you want to to see yourself in next 12 months?			\r\n			\r\n', 6, 6, '12-8,13-7', '2015-12-31 18:30:00'),
(20, 20, 'How do you plan to do it?			\r\n			\r\n', 6, 3, '12-8,13-7', '2015-12-31 18:30:00'),
(21, 21, 'How fair is company to you?			\r\n			\r\n', 6, 5, '12-8,13-7', '2015-12-31 18:30:00'),
(22, 22, 'What is one thing you want to change in company (except boss)?			\r\n			\r\n', 6, 8, '12-8,13-7', '2015-12-31 18:30:00'),
(23, 23, 'Attendance			\r\n			\r\n', 6, 7, '12-8,13-7', '2015-12-31 18:30:00'),
(24, 1, 'How do you rate your performance?			\r\n			\r\n', 6, 6, '12-8,13-7', '2016-04-11 10:55:31'),
(25, 2, 'You attitude towards work?			\r\n			\r\n', 6, 8, '12-8,13-7', '2016-04-11 10:55:31'),
(26, 3, 'Not been able to do?			\r\n			\r\n', 6, 7, '12-8,13-7', '2016-04-11 10:55:31'),
(27, 4, 'Multi tasking			\r\n			\r\n', 6, 6, '12-8,13-7', '2016-04-11 10:55:31'),
(28, 5, 'Taking Ownership			\r\n			\r\n', 6, 3, '12-8,13-7', '2016-04-11 10:55:31'),
(29, 6, 'Needed to be reminded			\r\n			\r\n', 6, 5, '12-8,13-7', '2016-04-11 10:55:31'),
(30, 7, 'Time management			\r\n			\r\n', 6, 4, '12-8,13-7', '2016-04-11 10:55:31'),
(31, 8, 'Job timely delivery			\r\n			\r\n', 6, 4, '12-8,13-7', '2016-04-11 10:55:31'),
(32, 9, 'Communication			\r\n			\r\n', 6, 9, '12-8,13-7', '2016-04-11 10:55:31'),
(33, 10, 'Skills			\r\n', 6, 10, '12-8,13-7', '2016-04-11 10:55:31'),
(34, 11, 'Speed			\r\n', 6, 4, '12-8,13-7', '2016-04-11 10:55:31'),
(35, 12, 'New skills			\r\n			\r\n', 6, 5, '12-8,13-7', '2016-04-11 10:55:31'),
(36, 13, 'Training Requirement			\r\n			\r\n', 6, 6, '12-8,13-7', '2016-04-11 10:55:31'),
(37, 14, 'Initiative to Learn			\r\n			\r\n', 6, 5, '12-8,13-7', '2016-04-11 10:55:31'),
(38, 15, 'Any Compliments from manager/Colleague?			\r\n			\r\n', 6, 10, '12-8,13-7', '2016-04-11 10:55:31'),
(39, 16, 'Good candidate for future of co			\r\n			\r\n', 6, 8, '12-8,13-7', '2016-04-11 10:55:31'),
(40, 17, 'Any thing we missed to appreciate you for?			\r\n			\r\n', 6, 6, '12-8,13-7', '2016-04-11 10:55:31'),
(41, 18, 'Any value addition to company?			\r\n			\r\n', 6, 4, '12-8,13-7', '2016-04-11 10:55:31'),
(42, 19, 'Where do you want to to see yourself in next 12 months?			\r\n			\r\n', 6, 10, '12-8,13-7', '2016-04-11 10:55:31'),
(43, 20, 'How do you plan to do it?			\r\n			\r\n', 6, 9, '12-8,13-7', '2016-04-11 10:55:31'),
(44, 21, 'How fair is company to you?			\r\n			\r\n', 6, 8, '12-8,13-7', '2016-04-11 10:55:31'),
(45, 22, 'What is one thing you want to change in company (except boss)?			\r\n			\r\n', 6, 6, '12-8,13-7', '2016-04-11 10:55:31'),
(46, 23, 'Attendance			\r\n			\r\n', 6, 4, '12-8,13-7', '2016-04-11 10:55:31'),
(47, 1, 'How do you rate your performance?			\r\n			\r\n', 12, 5, '13-8', '2016-04-12 15:18:38'),
(48, 2, 'You attitude towards work?			\r\n			\r\n', 12, 6, '13-8', '2016-04-12 15:18:38'),
(49, 3, 'Not been able to do?			\r\n			\r\n', 12, 8, '13-8', '2016-04-12 15:18:38'),
(50, 4, 'Multi tasking			\r\n			\r\n', 12, 7, '13-4', '2016-04-12 15:18:38'),
(51, 5, 'Taking Ownership			\r\n			\r\n', 12, 7, '13-5', '2016-04-12 15:18:38'),
(52, 6, 'Needed to be reminded			\r\n			\r\n', 12, 8, '13-1', '2016-04-12 15:18:38'),
(53, 7, 'Time management			\r\n			\r\n', 12, 8, '13-5', '2016-04-12 15:18:38'),
(54, 8, 'Job timely delivery			\r\n			\r\n', 12, 5, '13-6', '2016-04-12 15:18:38'),
(55, 9, 'Communication			\r\n			\r\n', 12, 7, '13-5', '2016-04-12 15:18:38'),
(56, 10, 'Skills			\r\n', 12, 6, '13-7', '2016-04-12 15:18:38'),
(57, 11, 'Speed			\r\n', 12, 8, '13-8', '2016-04-12 15:18:38'),
(58, 12, 'New skills			\r\n			\r\n', 12, 9, '13-9', '2016-04-12 15:18:38'),
(59, 13, 'Training Requirement			\r\n			\r\n', 12, 7, '13-7', '2016-04-12 15:18:38'),
(60, 14, 'Initiative to Learn			\r\n			\r\n', 12, 7, '13-7', '2016-04-12 15:18:38'),
(61, 15, 'Any Compliments from manager/Colleague?			\r\n			\r\n', 12, 9, '13-3', '2016-04-12 15:18:38'),
(62, 16, 'Good candidate for future of co			\r\n			\r\n', 12, 9, '13-6', '2016-04-12 15:18:38'),
(63, 17, 'Any thing we missed to appreciate you for?			\r\n			\r\n', 12, 7, '13-3', '2016-04-12 15:18:38'),
(64, 18, 'Any value addition to company?			\r\n			\r\n', 12, 8, '13-4', '2016-04-12 15:18:38'),
(65, 19, 'Where do you want to to see yourself in next 12 months?			\r\n			\r\n', 12, 8, '13-5', '2016-04-12 15:18:38'),
(66, 20, 'How do you plan to do it?			\r\n			\r\n', 12, 6, '13-2', '2016-04-12 15:18:38'),
(67, 21, 'How fair is company to you?			\r\n			\r\n', 12, 8, '13-3', '2016-04-12 15:18:38'),
(68, 22, 'What is one thing you want to change in company (except boss)?			\r\n			\r\n', 12, 6, '13-5', '2016-04-12 15:18:38'),
(69, 23, 'Attendance			\r\n			\r\n', 12, 6, '13-6', '2016-04-12 15:18:38');

-- --------------------------------------------------------

--
-- Table structure for table `employee_experience`
--

CREATE TABLE `employee_experience` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `designation` varchar(32) NOT NULL,
  `employer` varchar(128) NOT NULL,
  `duration_from` date NOT NULL,
  `duration_to` date NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_updated_by` int(11) DEFAULT NULL,
  `last_updated_at` timestamp NULL DEFAULT NULL,
  `status` enum('active','deleted') NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee_experience`
--

INSERT INTO `employee_experience` (`id`, `employee_id`, `designation`, `employer`, `duration_from`, `duration_to`, `created_by`, `created_at`, `last_updated_by`, `last_updated_at`, `status`) VALUES
(7, 12, 'Developer', 'ABC', '2016-03-10', '2016-03-12', 1, '2016-03-05 09:08:11', 1, '2016-04-06 11:42:20', 'deleted'),
(8, 12, 'Developer', 'DEF', '2016-03-30', '2016-03-31', 1, '2016-03-05 09:08:11', 1, '2016-04-06 11:42:20', 'deleted'),
(12, 12, 'Developer', 'ABC', '2016-03-10', '2016-03-12', 1, '2016-03-05 10:45:17', 1, '2016-04-06 11:42:20', 'deleted'),
(13, 12, 'Developer', 'ABC', '2016-03-10', '2016-03-12', 1, '2016-03-05 10:46:41', 1, '2016-04-06 11:42:20', 'deleted'),
(14, 12, 'Developer', 'ABC', '2016-03-10', '2016-03-12', 1, '2016-03-05 10:47:14', 1, '2016-04-06 11:42:20', 'deleted'),
(15, 12, 'Sr Developer', 'DEF', '2016-03-30', '2016-03-31', 1, '2016-03-05 10:47:14', 1, '2016-04-06 11:42:20', 'deleted'),
(16, 6, 'Developer', 'SDF', '2016-03-01', '2016-03-10', 1, '2016-03-05 11:15:50', 1, '2016-04-06 12:04:31', 'deleted'),
(17, 12, 'Developer', 'ABC', '2016-03-10', '2016-03-12', 1, '2016-03-07 11:14:11', 1, '2016-04-06 11:42:20', 'deleted'),
(18, 12, 'Sr Developer', 'DEF', '2016-03-30', '2016-03-31', 1, '2016-03-07 11:14:11', 1, '2016-04-06 11:42:20', 'deleted'),
(19, 12, 'Developer', 'ABC', '2016-03-10', '2016-03-12', 1, '2016-03-07 12:27:04', 1, '2016-04-06 11:42:20', 'deleted'),
(20, 12, 'Sr Developer', 'DEF', '2016-03-30', '2016-03-31', 1, '2016-03-07 12:27:04', 1, '2016-04-06 11:42:20', 'deleted'),
(21, 12, 'Developer', 'ABC', '2016-03-10', '2016-03-12', 1, '2016-03-07 12:30:38', 1, '2016-04-06 11:42:20', 'deleted'),
(22, 12, 'Sr Developer', 'DEF', '2016-03-30', '2016-03-31', 1, '2016-03-07 12:30:38', 1, '2016-04-06 11:42:20', 'deleted'),
(23, 12, 'Developer', 'ABC', '2016-03-10', '2016-03-12', 1, '2016-03-08 06:40:25', 1, '2016-04-06 11:42:20', 'deleted'),
(24, 12, 'Sr Developer', 'DEF', '2016-03-30', '2016-03-31', 1, '2016-03-08 06:40:25', 1, '2016-04-06 11:42:20', 'deleted'),
(25, 12, 'Developer', 'ABC', '2016-03-10', '2016-03-12', 1, '2016-03-08 06:41:48', 1, '2016-04-06 11:42:20', 'deleted'),
(26, 12, 'Sr Developer', 'DEF', '2016-03-30', '2016-03-31', 1, '2016-03-08 06:41:48', 1, '2016-04-06 11:42:20', 'deleted'),
(27, 12, 'Developer', 'ABC', '2016-03-10', '2016-03-12', 1, '2016-03-14 07:33:53', 1, '2016-04-06 11:42:20', 'deleted'),
(28, 12, 'Sr Developer', 'DEF', '2016-03-30', '2016-03-31', 1, '2016-03-14 07:33:53', 1, '2016-04-06 11:42:20', 'deleted'),
(29, 12, 'Developer', 'ABC', '2016-03-10', '2016-03-12', 1, '2016-03-14 07:35:19', 1, '2016-04-06 11:42:20', 'deleted'),
(30, 12, 'Sr Developer', 'DEF', '2016-03-30', '2016-03-31', 1, '2016-03-14 07:35:19', 1, '2016-04-06 11:42:20', 'deleted'),
(31, 12, 'Developer', 'ABC', '2016-03-10', '2016-03-12', 1, '2016-03-14 07:35:58', 1, '2016-04-06 11:42:20', 'deleted'),
(32, 12, 'Sr Developer', 'DEF', '2016-03-30', '2016-03-31', 1, '2016-03-14 07:35:58', 1, '2016-04-06 11:42:20', 'deleted'),
(33, 12, 'Developer', 'ABC', '2016-03-10', '2016-03-12', 1, '2016-03-14 07:48:35', 1, '2016-04-06 11:42:20', 'deleted'),
(34, 12, 'Sr Developer', 'DEF', '2016-03-30', '2016-03-31', 1, '2016-03-14 07:48:35', 1, '2016-04-06 11:42:20', 'deleted'),
(35, 12, 'Developer', 'ABC', '2016-03-10', '2016-03-12', 1, '2016-03-14 07:49:51', 1, '2016-04-06 11:42:20', 'deleted'),
(36, 12, 'Sr Developer', 'DEF', '2016-03-30', '2016-03-31', 1, '2016-03-14 07:49:51', 1, '2016-04-06 11:42:20', 'deleted'),
(37, 6, 'Developer', 'SDF', '2016-03-01', '2016-03-10', 1, '2016-03-14 08:04:04', 1, '2016-04-06 12:04:31', 'deleted'),
(38, 12, 'Developer', 'ABC', '2016-03-10', '2016-03-12', 1, '2016-03-16 05:24:15', 1, '2016-04-06 11:42:20', 'deleted'),
(39, 12, 'Sr Developer', 'DEF', '2016-03-30', '2016-03-31', 1, '2016-03-16 05:24:15', 1, '2016-04-06 11:42:20', 'deleted'),
(40, 12, 'Developer', 'ABC', '2016-03-10', '2016-03-12', 1, '2016-04-06 11:42:20', NULL, NULL, 'active'),
(41, 12, 'Sr Developer', 'DEF', '2016-03-30', '2016-03-31', 1, '2016-04-06 11:42:20', NULL, NULL, 'active'),
(42, 6, 'Developer', 'SDF', '2016-03-01', '2016-03-10', 1, '2016-04-06 12:04:31', NULL, NULL, 'active'),
(43, 14, 'SEO ANALYST', 'INSIGHTSDUBAI', '2015-04-21', '1970-01-01', 1, '2016-04-21 06:41:11', 1, '2016-04-21 16:12:40', 'deleted'),
(44, 14, 'SEO ANALYST', 'INSIGHTSDUBAI', '2015-04-21', '1970-01-01', 1, '2016-04-21 06:59:30', 1, '2016-04-21 16:12:40', 'deleted'),
(45, 15, 'Server handler and testing', 'insightsdubai', '2015-08-02', '1970-01-01', 1, '2016-04-21 07:05:15', 1, '2016-04-21 16:21:02', 'deleted'),
(46, 15, '', '', '1970-01-01', '1970-01-01', 1, '2016-04-21 07:05:15', 1, '2016-04-21 16:21:02', 'deleted'),
(47, 14, 'SEO ANALYST', 'INSIGHTSDUBAI', '2015-04-21', '1970-01-01', 1, '2016-04-21 07:12:40', NULL, NULL, 'active'),
(48, 15, 'Server handler and testing', 'insightsdubai', '2015-08-02', '1970-01-01', 1, '2016-04-21 07:21:02', NULL, NULL, 'active'),
(49, 15, '', '', '1970-01-01', '1970-01-01', 1, '2016-04-21 07:21:02', NULL, NULL, 'active'),
(50, 16, 'seO', 'IS', '2016-04-04', '2016-04-20', 1, '2016-04-26 06:41:02', 1, '2016-04-26 15:46:33', 'deleted'),
(51, 16, '', '', '1970-01-01', '1970-01-01', 1, '2016-04-26 06:41:02', 1, '2016-04-26 15:46:33', 'deleted'),
(52, 16, 'seO', 'IS', '2016-04-04', '2016-04-20', 1, '2016-04-26 06:46:33', NULL, NULL, 'active'),
(53, 16, '', '', '1970-01-01', '1970-01-01', 1, '2016-04-26 06:46:33', NULL, NULL, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `employee_files`
--

CREATE TABLE `employee_files` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `file_name_url` varchar(32) NOT NULL,
  `file_name` varchar(64) NOT NULL,
  `file_description` varchar(256) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_updated_by` int(11) DEFAULT NULL,
  `last_updated_at` timestamp NULL DEFAULT NULL,
  `status` enum('active','deleted') NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee_files`
--

INSERT INTO `employee_files` (`id`, `employee_id`, `file_name_url`, `file_name`, `file_description`, `created_by`, `created_at`, `last_updated_by`, `last_updated_at`, `status`) VALUES
(3, 12, '12_1.xlsx', 'Experience Certificate', 'This is the Experience Certificate of Hilal Ahmad', 1, '2016-03-05 09:08:10', NULL, NULL, 'active'),
(4, 12, '12_2.pdf', 'Sde', 'asdasd', 1, '2016-03-05 09:08:11', 1, '2016-03-05 10:33:42', 'active'),
(5, 14, '14_1.docx', 'CV', 'RESUME', 1, '2016-04-21 06:41:11', NULL, NULL, 'active'),
(6, 15, '15_1.docx', 'cv', 'resume', 1, '2016-04-21 07:05:15', NULL, NULL, 'active'),
(7, 16, '16_1.', 'RYtry', 'FyTR', 1, '2016-04-26 06:41:02', NULL, NULL, 'active'),
(8, 16, '16_2.', '', '', 1, '2016-04-26 06:41:02', NULL, NULL, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `employee_leaves`
--

CREATE TABLE `employee_leaves` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `leave_id` int(11) NOT NULL,
  `leave_from` date DEFAULT NULL,
  `leave_to` date DEFAULT NULL,
  `day` date DEFAULT NULL,
  `subject` text NOT NULL,
  `leave_description` text NOT NULL,
  `approved_by` int(11) DEFAULT NULL,
  `rejected_by` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `last_updated_by` int(11) DEFAULT NULL,
  `last_updated_at` timestamp NULL DEFAULT NULL,
  `status` enum('active','approved','rejected','deleted') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee_leaves`
--

INSERT INTO `employee_leaves` (`id`, `employee_id`, `leave_id`, `leave_from`, `leave_to`, `day`, `subject`, `leave_description`, `approved_by`, `rejected_by`, `created_by`, `created_at`, `last_updated_by`, `last_updated_at`, `status`) VALUES
(1, 12, 2, '2016-03-30', '2016-04-01', '2016-03-30', 'Wedding', 'marriage ceremony of my sister', 1, NULL, 1, '2016-03-23 07:01:36', 1, '2016-05-11 07:37:57', 'approved'),
(2, 6, 1, '2016-03-30', '2016-04-10', NULL, 'hello', 'hello', 13, NULL, 1, '2016-03-23 09:23:31', 13, '2016-04-13 17:11:27', 'approved'),
(3, 12, 1, NULL, NULL, '2016-05-11', 'wafesg', 'awfergth', 1, NULL, 1, '2016-03-23 09:25:20', 1, '2016-05-11 07:37:49', 'approved'),
(4, 1, 1, '2016-03-20', '2016-04-25', NULL, 'dSEGrdh', 'qwrgahe', NULL, 1, 1, '2016-03-23 09:29:12', 1, '2016-04-25 08:42:37', 'deleted'),
(5, 1, 3, '2016-03-21', '2016-03-23', NULL, 'This is a Test', 'This is a Test Description.', NULL, NULL, 1, '2016-03-23 09:30:29', 6, '2016-03-28 11:30:08', 'active'),
(6, 1, 2, '2016-03-21', '2016-04-01', NULL, 'new', 'new', NULL, NULL, 1, '2016-03-23 10:20:43', 1, '2016-03-23 11:03:14', 'deleted'),
(7, 6, 3, '2016-04-14', '2016-04-15', NULL, 'Sick Leave Request', 'Please give me the Leave.', 13, NULL, 6, '2016-04-08 07:35:46', 13, '2016-04-13 17:08:35', 'approved'),
(8, 6, 3, '2016-04-14', '2016-04-15', NULL, 'Sick Leave Request', 'Please give me the Leave.', 13, NULL, 6, '2016-04-08 07:35:59', 13, '2016-04-13 16:26:41', 'approved'),
(9, 6, 2, '2016-04-19', '2016-04-20', NULL, 'This is a Test', 'asd', 13, NULL, 6, '2016-04-08 07:39:18', 13, '2016-04-13 16:22:53', 'approved'),
(10, 6, 3, '2016-04-06', '2016-04-07', NULL, 'Subjecy', 'This is a Test', NULL, NULL, 6, '2016-04-15 16:57:17', NULL, NULL, 'active'),
(11, 6, 3, '2016-04-06', '2016-04-07', NULL, 'Subjecy', 'This is a Test', 1, NULL, 6, '2016-04-15 16:58:10', 1, '2016-05-26 21:46:40', 'approved'),
(12, 6, 3, '2016-04-06', '2016-04-07', NULL, 'Subjecy', 'This is a Test', NULL, NULL, 6, '2016-04-15 16:59:59', NULL, NULL, 'active'),
(13, 13, 1, '2016-03-10', '2016-03-21', '2016-05-02', 'fcgjhmbb ', 'hello full day', NULL, NULL, 13, '2016-05-11 06:58:44', 1, '2016-05-11 07:14:35', 'active'),
(14, 13, 6, '2016-05-10', '2016-05-10', '1970-01-01', 'gvdjdskj,', 'wederfrtgrt', 1, NULL, 13, '2016-05-11 10:02:48', 1, '2016-05-11 10:11:40', 'approved'),
(15, 13, 6, '2016-05-02', '2016-05-02', '1970-01-01', 'hbjb,m', 'dcdcfv', 1, NULL, 13, '2016-05-11 10:10:09', 1, '2016-05-11 10:11:07', 'approved'),
(16, 13, 6, '2016-05-01', '2016-05-01', '1970-01-01', 'work', 'test', NULL, 1, 13, '2016-05-19 17:08:41', 1, '2016-05-19 17:11:01', 'deleted'),
(17, 13, 3, '2016-05-02', '2016-05-04', '1970-01-01', 'test', 'test', 1, NULL, 13, '2016-05-19 17:11:51', 1, '2016-05-19 17:12:58', 'deleted'),
(18, 13, 2, '2016-05-16', '2016-05-18', '1970-01-01', 'test', 'test', NULL, NULL, 13, '2016-05-19 17:13:24', NULL, NULL, 'active'),
(19, 13, 2, '2016-05-12', '2016-05-13', '1970-01-01', 'test', 'test', NULL, NULL, 13, '2016-05-19 17:15:14', NULL, NULL, 'active'),
(20, 13, 2, '2016-05-02', '2016-05-03', '1970-01-01', 'test', 'test', NULL, NULL, 13, '2016-05-19 17:16:59', NULL, NULL, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `employee_login`
--

CREATE TABLE `employee_login` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `logged_in_at` time NOT NULL,
  `logged_out_at` time DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `last_updated_by` int(11) DEFAULT NULL,
  `last_updated_at` timestamp NULL DEFAULT NULL,
  `status` enum('active','deleted') NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee_login`
--

INSERT INTO `employee_login` (`id`, `employee_id`, `logged_in_at`, `logged_out_at`, `created_by`, `created_at`, `last_updated_by`, `last_updated_at`, `status`) VALUES
(55, 1, '05:30:00', '07:15:00', 1, '2016-03-23 08:07:13', 6, '2016-03-28 10:19:35', 'active'),
(56, 12, '04:20:00', '09:26:00', 6, '2016-03-22 10:23:22', NULL, NULL, 'active'),
(57, 12, '09:00:00', NULL, 12, '2016-03-22 10:26:10', 1, '2016-03-22 11:07:26', 'active'),
(58, 12, '11:17:58', '05:30:00', 1, '2016-03-23 05:47:58', 6, '2016-03-28 10:23:38', 'active'),
(59, 6, '10:58:16', NULL, 6, '2016-04-07 05:28:16', NULL, NULL, 'active'),
(60, 1, '14:51:28', '14:51:45', 1, '2016-04-07 09:21:28', 1, '2016-04-07 09:21:45', 'active'),
(61, 6, '15:06:56', '15:06:58', 6, '2016-04-07 09:36:56', 6, '2016-04-07 09:36:58', 'active'),
(62, 6, '16:41:00', '16:41:02', 6, '2016-04-07 11:11:00', 6, '2016-04-07 11:11:02', 'active'),
(65, 6, '10:03:00', '15:03:05', 6, '2016-04-08 09:33:00', 6, '2016-04-08 09:33:05', 'active'),
(66, 1, '15:45:11', NULL, 1, '2016-04-09 10:15:11', NULL, NULL, 'active'),
(67, 6, '16:13:12', '16:13:21', 6, '2016-04-09 10:43:12', 6, '2016-04-09 10:43:21', 'active'),
(68, 6, '11:35:14', NULL, 6, '2016-04-11 06:05:14', NULL, NULL, 'active'),
(69, 6, '21:44:20', '21:44:30', 6, '2016-04-15 16:14:20', 6, '2016-04-15 16:14:30', 'active'),
(70, 6, '00:00:00', '00:00:00', 6, '2016-04-22 07:10:12', 1, '2016-04-22 18:03:59', 'active'),
(71, 6, '11:10:12', '13:00:00', 6, '2016-04-22 07:10:12', 1, '2016-04-22 17:52:39', 'active'),
(72, 12, '11:14:27', '11:18:13', 12, '2016-04-22 07:14:27', 12, '2016-04-22 16:18:13', 'active'),
(73, 13, '12:58:17', '12:58:45', 13, '2016-04-22 08:58:17', 1, '2016-04-22 18:00:41', 'active'),
(74, 15, '09:58:00', '10:25:00', 15, '2016-04-23 05:58:00', 1, '2016-04-23 15:00:04', 'active'),
(75, 14, '15:07:06', NULL, 14, '2016-04-23 11:07:06', NULL, NULL, 'active'),
(76, 13, '08:57:09', NULL, 13, '2016-04-26 04:57:09', NULL, NULL, 'active'),
(77, 1, '09:00:00', '18:00:00', 1, '2016-05-02 05:00:00', NULL, NULL, 'active'),
(78, 1, '09:00:00', '18:00:00', 1, '2016-05-02 05:00:00', NULL, NULL, 'active'),
(79, 1, '09:00:00', '18:00:00', 1, '2016-03-10 06:00:00', NULL, NULL, 'active'),
(80, 13, '09:23:09', NULL, 13, '2016-05-09 05:23:09', NULL, NULL, 'active'),
(81, 6, '15:26:07', NULL, 6, '2016-05-26 09:56:07', NULL, NULL, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `employee_performance_reports`
--

CREATE TABLE `employee_performance_reports` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `submitted_by` int(11) NOT NULL,
  `submitted_to` int(11) NOT NULL,
  `submitted_on` date NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_updated_by` int(11) DEFAULT NULL,
  `last_updated_at` timestamp NULL DEFAULT NULL,
  `status` enum('active','deleted') NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee_performance_reports`
--

INSERT INTO `employee_performance_reports` (`id`, `employee_id`, `submitted_by`, `submitted_to`, `submitted_on`, `created_by`, `created_at`, `last_updated_by`, `last_updated_at`, `status`) VALUES
(5, 15, 12, 1, '2016-05-02', 1, '2016-05-06 06:31:02', 1, '2016-05-07 21:51:46', 'deleted'),
(7, 13, 12, 1, '2016-05-02', 1, '2016-05-06 09:12:51', 1, '2016-05-07 07:51:55', 'deleted'),
(9, 13, 15, 1, '2016-05-15', 1, '2016-05-06 10:55:32', 1, '2016-05-07 07:40:53', 'deleted'),
(10, 6, 12, 1, '2016-05-01', 1, '2016-05-06 12:02:12', 1, '2016-05-07 07:48:43', 'deleted'),
(11, 12, 14, 1, '2016-05-01', 1, '2016-05-06 12:03:04', 1, '2016-05-07 07:50:47', 'deleted'),
(14, 14, 15, 1, '2016-05-07', 1, '2016-05-07 08:59:41', 1, '2016-05-07 07:39:27', 'deleted'),
(15, 14, 15, 1, '2016-05-07', 1, '2016-05-07 09:00:46', 1, '2016-05-07 07:39:46', 'deleted'),
(16, 14, 15, 1, '2016-05-07', 1, '2016-05-07 09:01:30', 1, '2016-05-07 07:46:52', 'deleted'),
(18, 16, 14, 1, '2016-05-01', 1, '2016-05-07 12:47:31', 1, '2016-05-09 12:49:36', 'deleted'),
(19, 13, 12, 1, '2016-05-02', 1, '2016-05-07 12:52:47', NULL, NULL, 'active'),
(20, 16, 14, 1, '2016-05-20', 1, '2016-05-09 03:48:01', NULL, NULL, 'active'),
(21, 6, 13, 1, '2016-05-16', 1, '2016-05-09 03:50:20', NULL, NULL, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `employee_qualification`
--

CREATE TABLE `employee_qualification` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `qualification` varchar(64) NOT NULL,
  `authority` varchar(64) NOT NULL,
  `percentage` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `last_updated_by` int(11) DEFAULT NULL,
  `last_updated_at` timestamp NULL DEFAULT NULL,
  `status` enum('active','deleted') NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee_qualification`
--

INSERT INTO `employee_qualification` (`id`, `employee_id`, `qualification`, `authority`, `percentage`, `created_by`, `created_at`, `last_updated_by`, `last_updated_at`, `status`) VALUES
(1, 12, '1', 'JKBOSE', 67, 1, '2016-04-06 11:42:20', 1, '2016-04-06 11:42:20', 'deleted'),
(2, 12, '10th', 'JKBOSE', 67, 1, '2016-04-06 11:42:20', 1, '2016-04-06 11:42:20', 'deleted'),
(3, 12, '12th', 'JKBOSE', 45, 1, '2016-04-06 11:42:20', 1, '2016-04-06 11:42:20', 'deleted'),
(4, 12, '10th', 'JKBOSE', 67, 1, '2016-04-06 11:42:20', 1, '2016-04-06 11:42:20', 'deleted'),
(5, 12, '12th', 'JKBOSE', 45, 1, '2016-04-06 11:42:20', 1, '2016-04-06 11:42:20', 'deleted'),
(6, 12, '10th', 'JKBOSE', 67, 1, '2016-04-06 11:42:20', 1, '2016-04-06 11:42:20', 'deleted'),
(7, 12, '12th', 'JKBOSE', 45, 1, '2016-04-06 11:42:20', 1, '2016-04-06 11:42:20', 'deleted'),
(8, 12, '10th', 'JKBOSE', 67, 1, '2016-04-06 11:42:20', 1, '2016-04-06 11:42:20', 'deleted'),
(9, 12, '12th', 'JKBOSE', 45, 1, '2016-04-06 11:42:20', 1, '2016-04-06 11:42:20', 'deleted'),
(10, 12, '10th', 'JKBOSE', 67, 1, '2016-04-06 11:42:20', 1, '2016-04-06 11:42:20', 'deleted'),
(11, 12, '12th', 'JKBOSE', 45, 1, '2016-04-06 11:42:20', 1, '2016-04-06 11:42:20', 'deleted'),
(12, 12, '10th', 'JKBOSE', 67, 1, '2016-04-06 11:42:20', 1, '2016-04-06 11:42:20', 'deleted'),
(13, 12, '12th', 'JKBOSE', 45, 1, '2016-04-06 11:42:20', 1, '2016-04-06 11:42:20', 'deleted'),
(14, 12, '10th', 'JKBOSE', 67, 1, '2016-04-06 11:42:20', 1, '2016-04-06 11:42:20', 'deleted'),
(15, 12, '12th', 'JKBOSE', 45, 1, '2016-04-06 11:42:20', 1, '2016-04-06 11:42:20', 'deleted'),
(16, 12, '10th', 'JKBOSE', 67, 1, '2016-04-06 11:42:20', 1, '2016-04-06 11:42:20', 'deleted'),
(17, 12, '12th', 'JKBOSE', 45, 1, '2016-04-06 11:42:20', 1, '2016-04-06 11:42:20', 'deleted'),
(18, 12, '10th', 'JKBOSE', 67, 1, '2016-04-06 11:42:20', 1, '2016-04-06 11:42:20', 'deleted'),
(19, 12, '12th', 'JKBOSE', 45, 1, '2016-04-06 11:42:20', 1, '2016-04-06 11:42:20', 'deleted'),
(20, 12, '10th', 'JKBOSE', 67, 1, '2016-04-06 11:42:20', NULL, NULL, 'active'),
(21, 12, '12th', 'JKBOSE', 45, 1, '2016-04-06 11:42:20', NULL, NULL, 'active'),
(22, 14, 'B.TECH', 'IUST', 90, 1, '2016-04-21 07:12:40', 1, '2016-04-21 16:12:40', 'deleted'),
(23, 14, '', '', 0, 1, '2016-04-21 07:12:40', 1, '2016-04-21 16:12:40', 'deleted'),
(24, 14, 'B.TECH', 'IUST', 90, 1, '2016-04-21 07:12:40', 1, '2016-04-21 16:12:40', 'deleted'),
(25, 14, '', '', 0, 1, '2016-04-21 07:12:40', 1, '2016-04-21 16:12:40', 'deleted'),
(26, 15, 'B.TECH', 'IUST', 90, 1, '2016-04-21 07:21:02', 1, '2016-04-21 16:21:02', 'deleted'),
(27, 15, '', '', 0, 1, '2016-04-21 07:21:02', 1, '2016-04-21 16:21:02', 'deleted'),
(28, 14, 'B.TECH', 'IUST', 90, 1, '2016-04-21 07:12:40', NULL, NULL, 'active'),
(29, 14, '', '', 0, 1, '2016-04-21 07:12:40', NULL, NULL, 'active'),
(30, 15, 'B.TECH', 'IUST', 90, 1, '2016-04-21 07:21:02', NULL, NULL, 'active'),
(31, 15, '', '', 0, 1, '2016-04-21 07:21:02', NULL, NULL, 'active'),
(32, 16, 'bcA', 'kU', 70, 1, '2016-04-26 06:46:33', 1, '2016-04-26 15:46:33', 'deleted'),
(33, 16, '', '', 0, 1, '2016-04-26 06:46:33', 1, '2016-04-26 15:46:33', 'deleted'),
(34, 16, 'bcA', 'kU', 70, 1, '2016-04-26 06:46:33', NULL, NULL, 'active'),
(35, 16, '', '', 0, 1, '2016-04-26 06:46:33', NULL, NULL, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `employee_salary`
--

CREATE TABLE `employee_salary` (
  `id` int(10) UNSIGNED NOT NULL,
  `employee_id` int(11) NOT NULL,
  `basic_salary` int(11) NOT NULL,
  `house_allowance` int(11) NOT NULL,
  `travelling_allowance` int(11) NOT NULL,
  `other_allowance` int(11) NOT NULL,
  `salary` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_updated_by` int(11) DEFAULT NULL,
  `last_updated_at` timestamp NULL DEFAULT NULL,
  `status` enum('active','deleted') NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee_salary`
--

INSERT INTO `employee_salary` (`id`, `employee_id`, `basic_salary`, `house_allowance`, `travelling_allowance`, `other_allowance`, `salary`, `created_by`, `created_at`, `last_updated_by`, `last_updated_at`, `status`) VALUES
(1, 12, 2000, 1000, 500, 1000, 4500, 1, '2016-03-14 07:33:53', 1, '2016-03-14 07:49:51', 'deleted'),
(5, 12, 2000, 1000, 500, 1000, 4500, 1, '2016-03-14 07:49:51', 1, '2016-03-14 11:22:21', 'deleted'),
(6, 6, 2000, 2000, 1000, 1000, 6000, 1, '2016-03-14 08:04:04', NULL, NULL, 'active'),
(7, 12, 2000, 1000, 1000, 1000, 5000, 1, '2016-03-14 11:22:21', NULL, NULL, 'active'),
(8, 13, 2000, 1000, 1000, 1000, 5000, 1, '2016-03-19 06:29:15', NULL, NULL, 'active'),
(9, 14, 10, 2000, 3000, 1500, 34000, 1, '2016-04-21 06:41:11', NULL, NULL, 'active'),
(10, 15, 15000, 2000, 2000, 2000, 50, 1, '2016-04-21 07:05:15', NULL, NULL, 'active'),
(11, 16, 56546456, 46456, 546546, 546546, 546546, 1, '2016-04-26 06:41:02', NULL, NULL, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `employee_teams`
--

CREATE TABLE `employee_teams` (
  `id` int(10) UNSIGNED NOT NULL,
  `team_name` varchar(64) NOT NULL,
  `team_leader` int(11) NOT NULL,
  `team_members` varchar(128) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_updated_by` int(11) DEFAULT NULL,
  `last_updated_at` timestamp NULL DEFAULT NULL,
  `status` enum('active','deleted') NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=big5;

--
-- Dumping data for table `employee_teams`
--

INSERT INTO `employee_teams` (`id`, `team_name`, `team_leader`, `team_members`, `created_by`, `created_at`, `last_updated_by`, `last_updated_at`, `status`) VALUES
(1, 'Developers', 6, '13', 74, '2016-05-17 06:46:25', 1, '2016-05-17 08:33:09', 'active'),
(2, 'Designers', 12, '15,14', 1, '2016-05-17 10:03:39', NULL, NULL, 'active'),
(3, 'Programmers', 6, '12,16', 1, '2016-05-19 08:34:37', 1, '2016-05-19 17:57:54', 'deleted');

-- --------------------------------------------------------

--
-- Table structure for table `late_sitting`
--

CREATE TABLE `late_sitting` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `hours` int(11) NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `last_updated_by` int(11) DEFAULT NULL,
  `last_updated_at` timestamp NULL DEFAULT NULL,
  `approved_by` int(11) DEFAULT NULL,
  `rejected_by` int(11) DEFAULT NULL,
  `status` enum('active','rejected','approved','deleted') NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `late_sitting`
--

INSERT INTO `late_sitting` (`id`, `employee_id`, `date`, `hours`, `created_by`, `created_at`, `last_updated_by`, `last_updated_at`, `approved_by`, `rejected_by`, `status`) VALUES
(1, 1, '2016-03-23', 3, 1, '2016-03-25 10:44:22', 6, '2016-03-28 10:43:19', 1, NULL, 'deleted'),
(2, 1, '2016-03-09', 3, 1, '2016-03-25 10:46:42', 1, '2016-03-25 11:36:32', NULL, 1, 'deleted'),
(3, 1, '2016-03-18', 2, 1, '2016-03-25 10:47:59', 1, '2016-04-22 18:14:11', NULL, 1, 'deleted'),
(4, 12, '2016-03-15', 2, 12, '2016-03-25 11:03:49', 1, '2016-03-25 11:36:39', NULL, 1, 'deleted'),
(5, 1, '2016-03-22', 4, 1, '2016-03-25 11:06:05', 1, '2016-03-26 05:24:38', NULL, 1, 'deleted'),
(6, 1, '2016-03-30', 3, 1, '2016-03-25 11:37:18', 1, '2016-03-26 05:24:34', NULL, 1, 'deleted'),
(7, 1, '2016-03-16', 3, 1, '2016-03-26 05:24:23', 6, '2016-03-28 10:43:10', 6, NULL, 'approved'),
(8, 1, '2016-03-01', 7, 1, '2016-03-26 05:43:26', 1, '2016-04-26 15:50:39', NULL, NULL, 'active'),
(9, 6, '2016-03-18', 5, 6, '2016-03-28 10:45:45', 1, '2016-04-22 18:31:15', 1, NULL, 'deleted');

-- --------------------------------------------------------

--
-- Table structure for table `leaves`
--

CREATE TABLE `leaves` (
  `id` int(10) UNSIGNED NOT NULL,
  `leave_type` enum('full_day','half_day') NOT NULL DEFAULT 'full_day',
  `leave_name` varchar(128) NOT NULL,
  `leave_description` varchar(1024) NOT NULL,
  `yearly_leaves` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_updated_by` int(11) DEFAULT NULL,
  `last_updated_at` timestamp NULL DEFAULT NULL,
  `status` enum('active','deleted') NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `leaves`
--

INSERT INTO `leaves` (`id`, `leave_type`, `leave_name`, `leave_description`, `yearly_leaves`, `created_by`, `created_at`, `last_updated_by`, `last_updated_at`, `status`) VALUES
(1, 'full_day', 'Earned Leave or Privilege Leave', 'Employees earn as they work for an organisation for a specified number of days.', 12, 1, '2016-03-16 05:25:36', 1, '2016-03-16 10:38:26', 'active'),
(2, 'full_day', 'Casual Leave', 'Granted for short durations and can ordinarily be taken with prior information to the employer except in cases when informing the employer is not possible.', 10, 1, '2016-03-16 05:25:59', 1, '2016-03-16 05:41:03', 'active'),
(3, 'full_day', 'Sick Leave or Medical Leave', 'An employee can call in sick if he is not in a state to come to office for work.', 8, 1, '2016-03-16 05:31:20', 1, '2016-03-17 05:17:33', 'active'),
(6, 'half_day', 'Half Day', 'This is a half day leave', 6, 1, '2016-05-11 07:55:52', NULL, NULL, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `letter_categories`
--

CREATE TABLE `letter_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_title` varchar(128) NOT NULL,
  `category_description` varchar(1024) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_updated_by` int(11) DEFAULT NULL,
  `last_updated_at` timestamp NULL DEFAULT NULL,
  `status` enum('active','deleted') NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `letter_categories`
--

INSERT INTO `letter_categories` (`id`, `category_title`, `category_description`, `created_by`, `created_at`, `last_updated_by`, `last_updated_at`, `status`) VALUES
(1, 'Appointment Letter', 'This is an Appointment Letter.', 1, '2016-04-19 08:43:42', 1, '2016-04-23 16:39:50', 'active'),
(2, 'Industry tour', 'This is a test message', 1, '2016-04-23 16:40:50', 1, '2016-04-23 16:41:23', 'deleted'),
(3, 'TEST LETTER', 'GFGDRS', 1, '2016-04-23 17:30:23', 1, '2016-04-23 17:47:02', 'deleted'),
(4, 'Offer Letter', 'offer letter offer letter ', 1, '2016-04-26 18:06:38', 1, '2016-04-26 18:06:55', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `loan_requests`
--

CREATE TABLE `loan_requests` (
  `id` int(10) UNSIGNED NOT NULL,
  `employee_id` int(11) NOT NULL,
  `loan_description` text NOT NULL,
  `loan_amount` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_updated_by` int(11) DEFAULT NULL,
  `last_updated_at` timestamp NULL DEFAULT NULL,
  `status` enum('active','approved','rejected','deleted') NOT NULL DEFAULT 'active',
  `approved_by` int(11) DEFAULT NULL,
  `rejected_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loan_requests`
--

INSERT INTO `loan_requests` (`id`, `employee_id`, `loan_description`, `loan_amount`, `created_by`, `created_at`, `last_updated_by`, `last_updated_at`, `status`, `approved_by`, `rejected_by`) VALUES
(1, 12, 'Sanction the Loan ASAP.', 45000, 12, '2016-03-16 10:27:35', 1, '2016-05-23 03:07:15', 'rejected', NULL, 1),
(2, 0, 'SdSwew', 1000000, 6, '2016-04-22 20:01:58', 1, '2016-04-23 18:22:24', 'deleted', NULL, NULL),
(3, 0, 'tesT loan', 50, 13, '2016-05-19 17:25:51', 1, '2016-05-26 22:14:51', 'deleted', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `miss_attendance`
--

CREATE TABLE `miss_attendance` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `missed` enum('time-in','time-out','both') NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `last_updated_by` int(11) DEFAULT NULL,
  `last_updated_at` timestamp NULL DEFAULT NULL,
  `approved_by` int(11) DEFAULT NULL,
  `rejected_by` int(11) DEFAULT NULL,
  `status` enum('active','approved','rejected','deleted') NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `miss_attendance`
--

INSERT INTO `miss_attendance` (`id`, `employee_id`, `date`, `missed`, `created_by`, `created_at`, `last_updated_by`, `last_updated_at`, `approved_by`, `rejected_by`, `status`) VALUES
(1, 12, '2016-03-28', 'time-in', 12, '2016-03-28 10:13:11', 1, '2016-04-22 18:23:49', NULL, 1, 'deleted'),
(2, 1, '2016-03-10', 'both', 1, '2016-03-28 10:28:11', 1, '2016-05-09 13:33:38', 1, NULL, 'approved'),
(3, 1, '2016-03-20', 'time-in', 1, '2016-03-28 10:48:38', 1, '2016-03-28 10:50:13', 1, NULL, 'deleted'),
(4, 1, '2016-03-30', 'time-in', 1, '2016-03-29 05:15:25', 1, '2016-05-09 13:31:26', 13, NULL, 'deleted'),
(5, 1, '2016-05-02', 'both', 1, '2016-05-04 11:17:24', 1, '2016-05-06 20:47:39', 1, NULL, 'deleted');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(10) UNSIGNED NOT NULL,
  `sender_id` int(11) NOT NULL,
  `reciever_id` int(11) NOT NULL,
  `text` varchar(512) NOT NULL,
  `url` varchar(128) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `last_updated_by` int(11) DEFAULT NULL,
  `last_updated_at` timestamp NULL DEFAULT NULL,
  `status` enum('unread','read','deleted') NOT NULL DEFAULT 'unread'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `sender_id`, `reciever_id`, `text`, `url`, `created_at`, `last_updated_by`, `last_updated_at`, `status`) VALUES
(1, 1, 6, 'Your leave has been approved by Shoaib Mohmad.\r\n', 'user/personal/leaves', '2016-04-13 17:08:11', 6, '2016-04-13 17:08:11', 'read'),
(2, 13, 6, 'Your Leave has been approved by Ameer  Ullah', 'user/personal/leaves', '2016-04-15 16:14:13', 6, '2016-04-15 16:14:13', 'read'),
(3, 13, 6, 'Your Leave request has been approved by Ameer  Ullah [Project Manager.', 'user/personal/leaves', '2016-04-13 17:08:51', 6, '2016-04-13 17:08:51', 'read'),
(4, 13, 6, 'Your Leave request has been approved by Ameer  Ullah [Project Manager].', 'user/personal/leaves', '2016-05-26 09:56:01', 6, '2016-05-26 09:56:01', 'read'),
(5, 1, 6, 'Your Extra Hours request has been approved by Shoaib Mohmad [Admin].', 'user/personal/leaves', '2016-04-15 16:18:13', NULL, NULL, 'unread'),
(6, 1, 6, 'Your Extra Hours request has been approved by Shoaib Mohmad [Admin].', 'user/personal/late_sitting', '2016-04-15 16:20:48', 6, '2016-04-15 16:20:48', 'read'),
(7, 1, 6, 'Your Off Day request has been approved by Shoaib Mohmad [Admin].', 'user/personal/off_days', '2016-04-15 16:24:06', NULL, NULL, 'unread'),
(8, 13, 1, 'Your Missing Time request has been approved by Ameer  Ullah [Project Manager].', 'user/personal/missing_time', '2016-04-15 16:27:48', 1, '2016-04-15 16:27:48', 'read'),
(9, 1, 12, 'Your Training request has been approved by Shoaib Mohmad [Admin].', 'user/personal/missing_time', '2016-04-15 16:32:16', 12, '2016-04-15 16:32:16', 'read'),
(10, 1, 12, 'Your Pay request has been approved by Shoaib Mohmad [Admin].', 'user/personal/advance_pay', '2016-04-15 16:36:45', 12, '2016-04-15 16:36:45', 'read'),
(11, 6, 1, 'Leave has been requested by Shoaib Mohmad [Reporting Officer].', 'employees/leaves/employee_leaves', '2016-04-19 06:27:14', 1, '2016-04-19 06:27:14', 'read'),
(12, 6, 13, 'Leave has been requested by Shoaib Mohmad [Reporting Officer].', 'employees/leaves/employee_leaves', '2016-04-15 17:00:00', NULL, NULL, 'unread'),
(13, 1, 1, 'Your Extra Hours request has been deleted by Shoaib Mohmad [Admin].', 'user/personal/late_sitting', '2016-05-10 10:20:47', 1, '2016-05-10 19:20:47', 'read'),
(14, 1, 1, 'Your Off Day request has been deleted by Shoaib Mohmad [Admin].', 'user/personal/off_days', '2016-05-19 10:11:36', 1, '2016-05-19 19:11:36', 'read'),
(15, 1, 12, 'Your Missing Time request has been deleted by Shoaib Mohmad [Admin].', 'user/personal/missing_time', '2016-04-22 09:23:49', NULL, NULL, 'unread'),
(16, 1, 6, 'Your Extra Hours request has been deleted by Shoaib Mohmad [Admin].', 'user/personal/late_sitting', '2016-04-22 09:31:15', NULL, NULL, 'unread'),
(17, 6, 1, 'Loan has been requested by Shoaib Mohmad [Reporting Officer].', 'employees/loan_requests', '2016-05-19 10:11:52', 1, '2016-05-19 19:11:52', 'read'),
(18, 6, 13, 'Loan has been requested by Shoaib Mohmad [Reporting Officer].', 'employees/loan_requests', '2016-04-22 11:01:58', NULL, NULL, 'unread'),
(19, 6, 15, 'Loan has been requested by Shoaib Mohmad [Reporting Officer].', 'employees/loan_requests', '2016-04-22 11:01:58', NULL, NULL, 'unread'),
(20, 1, 1, 'Your Leave request has been approved by Shoaib Mohmad [Admin].', 'user/personal/leaves', '2016-04-22 11:37:19', NULL, NULL, 'unread'),
(21, 1, 1, 'Your Leave request has been approved by Shoaib Mohmad [Admin].', 'user/personal/leaves', '2016-04-22 11:37:41', NULL, NULL, 'unread'),
(22, 1, 0, 'Your Loan request has been deleted by Shoaib Mohmad [Admin].', 'user/personal/loan_requests', '2016-04-23 09:22:24', NULL, NULL, 'unread'),
(23, 1, 6, 'Your Leave request has been reject by Shoaib Mohmad [Admin].', 'user/personal/leaves', '2016-04-25 10:30:18', NULL, NULL, 'unread'),
(24, 1, 6, 'Your Leave request has been reject by Shoaib Mohmad [Admin].', 'user/personal/leaves', '2016-04-25 10:30:35', NULL, NULL, 'unread'),
(25, 1, 6, 'Your Leave request has been reject by Shoaib Mohmad [Admin].', 'user/personal/leaves', '2016-04-26 06:52:47', NULL, NULL, 'unread'),
(26, 1, 6, 'Your Leave request has been reject by Shoaib Mohmad [Admin].', 'user/personal/leaves', '2016-04-26 06:52:59', NULL, NULL, 'unread'),
(27, 1, 6, 'Your Leave request has been reject by Shoaib Mohmad [Admin].', 'user/personal/leaves', '2016-04-26 06:53:23', NULL, NULL, 'unread'),
(28, 1, 1, 'Your Missing Time request has been approved by Shoaib Mohmad [Admin].', 'user/personal/missing_time', '2016-05-04 11:21:46', NULL, NULL, 'unread'),
(29, 1, 1, 'Your Missing Time request has been deleted by Shoaib Mohmad [Admin].', 'user/personal/missing_time', '2016-05-19 10:29:43', 1, '2016-05-19 19:29:43', 'read'),
(30, 1, 1, 'Your Missing Time request has been deleted by Shoaib Mohmad [Admin].', 'user/personal/missing_time', '2016-05-09 04:31:26', NULL, NULL, 'unread'),
(31, 1, 1, 'Your Missing Time request has been approved by Shoaib Mohmad [Admin].', 'user/personal/missing_time', '2016-05-09 04:33:38', NULL, NULL, 'unread'),
(32, 13, 1, 'Leave has been requested by Ameera  Ullah [Project Manager].', 'employees/leaves/employee_leaves', '2016-05-19 08:08:41', NULL, NULL, 'unread'),
(33, 13, 13, 'Leave has been requested by Ameera  Ullah [Project Manager].', 'employees/leaves/employee_leaves', '2016-05-19 08:08:41', NULL, NULL, 'unread'),
(34, 13, 15, 'Leave has been requested by Ameera  Ullah [Project Manager].', 'employees/leaves/employee_leaves', '2016-05-19 08:08:41', NULL, NULL, 'unread'),
(35, 1, 13, 'Your Leave request has been reject by Shoaib Mohmad [Admin].', 'user/personal/leaves', '2016-05-19 08:10:39', NULL, NULL, 'unread'),
(36, 1, 13, 'Your Leave request has been reject by Shoaib Mohmad [Admin].', 'user/personal/leaves', '2016-05-19 08:11:01', NULL, NULL, 'unread'),
(37, 13, 1, 'Leave has been requested by Ameera  Ullah [Project Manager].', 'employees/leaves/employee_leaves', '2016-05-19 08:11:51', NULL, NULL, 'unread'),
(38, 13, 13, 'Leave has been requested by Ameera  Ullah [Project Manager].', 'employees/leaves/employee_leaves', '2016-05-19 08:11:51', NULL, NULL, 'unread'),
(39, 13, 15, 'Leave has been requested by Ameera  Ullah [Project Manager].', 'employees/leaves/employee_leaves', '2016-05-19 08:11:51', NULL, NULL, 'unread'),
(40, 1, 13, 'Your Leave request has been approved by Shoaib Mohmad [Admin].', 'user/personal/leaves', '2016-05-19 08:12:41', NULL, NULL, 'unread'),
(41, 1, 13, 'Your Leave request has been reject by Shoaib Mohmad [Admin].', 'user/personal/leaves', '2016-05-19 08:12:58', NULL, NULL, 'unread'),
(42, 13, 1, 'Leave has been requested by Ameera  Ullah [Project Manager].', 'employees/leaves/employee_leaves', '2016-05-19 08:13:24', NULL, NULL, 'unread'),
(43, 13, 13, 'Leave has been requested by Ameera  Ullah [Project Manager].', 'employees/leaves/employee_leaves', '2016-05-19 08:13:24', NULL, NULL, 'unread'),
(44, 13, 15, 'Leave has been requested by Ameera  Ullah [Project Manager].', 'employees/leaves/employee_leaves', '2016-05-19 08:13:24', NULL, NULL, 'unread'),
(45, 13, 1, 'Leave has been requested by Ameera  Ullah [Project Manager].', 'employees/leaves/employee_leaves', '2016-05-19 08:15:14', NULL, NULL, 'unread'),
(46, 13, 13, 'Leave has been requested by Ameera  Ullah [Project Manager].', 'employees/leaves/employee_leaves', '2016-05-19 08:15:14', NULL, NULL, 'unread'),
(47, 13, 15, 'Leave has been requested by Ameera  Ullah [Project Manager].', 'employees/leaves/employee_leaves', '2016-05-19 08:15:14', NULL, NULL, 'unread'),
(48, 13, 1, 'Leave has been requested by Ameera  Ullah [Project Manager].', 'employees/leaves/employee_leaves', '2016-05-19 08:16:59', NULL, NULL, 'unread'),
(49, 13, 13, 'Leave has been requested by Ameera  Ullah [Project Manager].', 'employees/leaves/employee_leaves', '2016-05-19 08:16:59', NULL, NULL, 'unread'),
(50, 13, 15, 'Leave has been requested by Ameera  Ullah [Project Manager].', 'employees/leaves/employee_leaves', '2016-05-19 08:16:59', NULL, NULL, 'unread'),
(51, 13, 1, 'Loan has been requested by Ameera  Ullah [Project Manager].', 'employees/loan_requests', '2016-05-22 18:07:00', 1, '2016-05-23 03:07:00', 'read'),
(52, 13, 13, 'Loan has been requested by Ameera  Ullah [Project Manager].', 'employees/loan_requests', '2016-05-19 08:25:51', NULL, NULL, 'unread'),
(53, 13, 15, 'Loan has been requested by Ameera  Ullah [Project Manager].', 'employees/loan_requests', '2016-05-19 08:25:51', NULL, NULL, 'unread'),
(54, 1, 12, 'Your Loan request has been rejected by Shoaib Mohmad [Admin].', 'user/personal/loan_requests', '2016-05-22 18:07:15', NULL, NULL, 'unread'),
(55, 1, 6, 'Your Leave request has been approved by Shoaib Mohmad [Admin].', 'user/personal/leaves', '2016-05-26 11:16:40', NULL, NULL, 'unread'),
(56, 1, 0, 'Your Loan request has been deleted by Shoaib Mohmad [Admin].', 'user/personal/loan_requests', '2016-05-26 11:44:51', NULL, NULL, 'unread');

-- --------------------------------------------------------

--
-- Table structure for table `office_settings`
--

CREATE TABLE `office_settings` (
  `id` int(11) NOT NULL,
  `weekends` varchar(64) NOT NULL,
  `timing_from` time NOT NULL,
  `timing_to` time NOT NULL,
  `applicable_from` date NOT NULL,
  `applicable_to` date DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_updated_by` int(11) DEFAULT NULL,
  `last_updated_at` timestamp NULL DEFAULT NULL,
  `status` enum('active','changed','deleted') NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `office_settings`
--

INSERT INTO `office_settings` (`id`, `weekends`, `timing_from`, `timing_to`, `applicable_from`, `applicable_to`, `created_by`, `created_at`, `last_updated_by`, `last_updated_at`, `status`) VALUES
(2, '6,7', '09:00:00', '18:00:00', '2016-03-01', '2016-03-31', 1, '2016-05-16 06:49:33', 1, '2016-05-16 05:43:58', 'changed'),
(9, '6,7', '09:00:00', '18:00:00', '2016-05-01', NULL, 1, '2016-05-16 07:13:58', NULL, NULL, 'active'),
(10, '6,7', '09:15:00', '18:00:00', '2016-04-01', '2016-04-30', 1, '2016-05-16 07:17:04', 1, '2016-05-16 07:18:24', 'changed'),
(11, '6,7', '09:00:00', '18:00:00', '2016-05-01', '2016-04-30', 1, '2016-05-16 08:48:24', 1, '2016-05-19 14:53:42', 'changed'),
(12, '5,6,7', '09:00:00', '18:00:00', '2016-05-01', '2016-04-30', 1, '2016-05-19 05:53:42', 1, '2016-05-19 14:54:13', 'changed'),
(13, '6,7', '09:00:00', '18:00:00', '2016-05-01', '2016-04-30', 1, '2016-05-19 05:54:14', 1, '2016-05-19 14:54:57', 'changed'),
(14, '6,7', '09:00:00', '18:00:00', '2016-05-01', '2016-04-30', 1, '2016-05-19 05:54:57', 1, '2016-05-19 15:10:53', 'changed'),
(15, '6,7', '09:00:00', '18:00:00', '2016-05-01', '2016-04-30', 1, '2016-05-19 06:10:53', 1, '2016-05-19 15:15:25', 'changed'),
(16, '6,7', '09:00:00', '18:00:00', '2016-05-01', '2016-04-30', 1, '2016-05-19 06:15:25', 1, '2016-05-19 15:15:55', 'changed'),
(17, '6,7', '09:00:00', '18:00:00', '2016-05-01', '2016-04-30', 1, '2016-05-19 06:15:55', 1, '2016-05-19 15:16:20', 'changed'),
(18, '6,7', '09:00:00', '18:00:00', '2016-05-01', '2016-04-30', 1, '2016-05-19 06:16:20', 1, '2016-05-19 15:16:44', 'changed'),
(19, '6,7', '09:00:00', '18:00:00', '2016-05-01', '2016-04-30', 1, '2016-05-19 06:16:44', 1, '2016-05-19 15:17:24', 'changed'),
(20, '6,7', '09:00:00', '18:00:00', '2016-05-01', '2016-04-30', 1, '2016-05-19 06:17:24', 1, '2016-05-19 15:17:31', 'changed'),
(21, '6,7', '00:00:00', '18:00:00', '2016-05-01', '2016-04-30', 1, '2016-05-19 06:17:31', 1, '2016-05-19 15:17:49', 'changed'),
(22, '6,7', '09:00:00', '18:00:00', '2016-05-01', '2016-04-30', 1, '2016-05-19 06:17:49', 1, '2016-05-19 15:18:08', 'changed'),
(23, '6,7', '00:00:00', '18:00:00', '2016-05-01', '2016-04-30', 1, '2016-05-19 06:18:08', 1, '2016-05-19 15:18:26', 'changed'),
(24, '6,7', '09:00:00', '18:00:00', '2016-05-01', '2016-04-30', 1, '2016-05-19 06:18:26', 1, '2016-05-19 15:18:33', 'changed'),
(25, '6,7', '00:00:00', '18:00:00', '2016-05-01', '2016-04-30', 1, '2016-05-19 06:18:33', 1, '2016-05-19 15:19:03', 'changed'),
(26, '6,7', '09:20:00', '18:00:00', '2016-05-01', '2016-04-30', 1, '2016-05-19 06:19:03', 1, '2016-05-19 15:19:54', 'changed'),
(27, '6,7', '09:00:00', '18:00:00', '2016-05-01', '2016-04-30', 1, '2016-05-19 06:19:54', 1, '2016-05-19 15:20:00', 'changed'),
(28, '6,7', '09:00:00', '00:00:00', '2016-05-01', '2016-04-30', 1, '2016-05-19 06:20:00', 1, '2016-05-19 15:21:19', 'changed'),
(29, '6,7', '09:00:00', '18:00:00', '2016-05-01', '1969-12-31', 1, '2016-05-19 06:21:19', 1, '2016-05-19 15:21:28', 'changed'),
(30, '6,7', '09:00:00', '18:00:00', '1970-01-01', '2016-04-30', 1, '2016-05-19 06:21:28', 1, '2016-05-19 15:23:24', 'changed'),
(31, '6,7', '09:00:00', '18:00:00', '2016-05-01', '2016-04-30', 1, '2016-05-19 06:23:24', 1, '2016-05-19 15:23:47', 'changed'),
(32, '6,7', '09:00:00', '18:00:00', '2016-05-01', '2016-04-30', 1, '2016-05-19 06:23:48', 1, '2016-05-19 15:24:34', 'changed'),
(33, '6,7', '09:00:00', '18:00:00', '2016-05-01', '2016-05-31', 1, '2016-05-19 06:24:34', 1, '2016-05-19 15:24:41', 'changed'),
(34, '6,7', '09:00:00', '18:00:00', '2016-06-01', '2016-04-30', 1, '2016-05-19 06:24:41', 1, '2016-05-19 15:24:48', 'changed'),
(35, '6,7', '09:00:00', '18:00:00', '2016-05-01', '2016-04-30', 1, '2016-05-19 06:24:48', 1, '2016-05-19 15:24:56', 'changed'),
(36, '6,7', '09:00:00', '18:00:00', '2016-05-01', '1969-12-31', 1, '2016-05-19 06:24:56', 1, '2016-05-19 15:25:34', 'changed'),
(37, '6,7', '09:00:00', '18:00:00', '1970-01-01', '1969-12-31', 1, '2016-05-19 06:25:34', 1, '2016-05-19 15:25:37', 'changed'),
(38, '6,7', '09:00:00', '18:00:00', '1970-01-01', '2016-04-30', 1, '2016-05-19 06:25:37', 1, '2016-05-19 15:25:43', 'changed'),
(39, '6,7', '09:00:00', '18:00:00', '2016-05-01', '2016-04-30', 1, '2016-05-19 06:25:43', 1, '2016-05-19 15:38:58', 'changed'),
(40, '6,7', '09:00:00', '18:00:00', '2016-05-01', '2016-04-30', 1, '2016-05-19 06:38:58', 1, '2016-05-19 18:34:15', 'changed'),
(41, '6,7', '09:00:00', '18:00:00', '2016-05-01', '2016-04-30', 1, '2016-05-19 09:34:15', 1, '2016-05-26 21:56:14', 'changed'),
(42, '6,7', '09:00:00', '18:00:00', '2016-05-01', '2016-04-30', 1, '2016-05-26 11:26:14', 1, '2016-05-26 22:17:32', 'changed'),
(43, '6,7', '09:00:00', '18:00:00', '2016-05-01', '2016-04-30', 1, '2016-05-26 11:47:32', 1, '2016-05-28 14:30:40', 'changed'),
(44, '6,7', '09:00:00', '18:00:00', '2016-05-01', '2016-04-30', 1, '2016-05-28 04:00:40', 1, '2016-05-28 14:31:08', 'changed'),
(45, '6,7', '09:00:00', '18:00:00', '2016-05-01', NULL, 1, '2016-05-28 04:01:08', NULL, NULL, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `off_day`
--

CREATE TABLE `off_day` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `last_updated_by` int(11) DEFAULT NULL,
  `last_updated_at` timestamp NULL DEFAULT NULL,
  `approved_by` int(11) DEFAULT NULL,
  `rejected_by` int(11) DEFAULT NULL,
  `status` enum('active','approved','rejected','deleted') NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `off_day`
--

INSERT INTO `off_day` (`id`, `employee_id`, `date`, `created_by`, `created_at`, `last_updated_by`, `last_updated_at`, `approved_by`, `rejected_by`, `status`) VALUES
(1, 1, '2016-03-30', 1, '2016-03-26 10:37:21', 1, '2016-04-22 18:16:34', 0, 1, 'deleted'),
(2, 1, '2016-03-25', 1, '2016-03-26 10:49:26', 1, '2016-03-26 10:55:25', 1, NULL, 'approved'),
(3, 1, '2016-03-31', 1, '2016-03-26 10:55:43', NULL, NULL, NULL, NULL, 'active'),
(4, 6, '2016-03-22', 6, '2016-03-26 11:12:46', 1, '2016-03-28 07:11:16', NULL, 1, 'rejected'),
(5, 12, '2016-03-29', 12, '2016-03-26 12:13:42', NULL, NULL, NULL, NULL, 'active'),
(6, 6, '2016-03-28', 6, '2016-03-28 10:57:13', 1, '2016-04-15 16:24:06', 1, NULL, 'approved');

-- --------------------------------------------------------

--
-- Table structure for table `questionnaire`
--

CREATE TABLE `questionnaire` (
  `id` int(11) NOT NULL,
  `question` text NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `last_updated_by` int(11) DEFAULT NULL,
  `last_updated_at` timestamp NULL DEFAULT NULL,
  `status` enum('active','deleted') NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questionnaire`
--

INSERT INTO `questionnaire` (`id`, `question`, `created_by`, `created_at`, `last_updated_by`, `last_updated_at`, `status`) VALUES
(1, 'How do you rate your performance?			\r\n			\r\n', 6, '2016-03-18 06:19:53', 1, '2016-03-18 11:52:21', 'active'),
(2, 'You attitude towards work?			\r\n			\r\n', 6, '2016-03-18 06:20:59', NULL, NULL, 'active'),
(3, 'Not been able to do?			\r\n			\r\n', 6, '2016-03-18 06:21:37', NULL, NULL, 'active'),
(4, 'Multi tasking			\r\n			\r\n', 6, '2016-03-18 06:22:06', NULL, NULL, 'active'),
(5, 'Taking Ownership			\r\n			\r\n', 6, '2016-03-18 06:22:33', NULL, NULL, 'active'),
(6, 'Needed to be reminded			\r\n			\r\n', 6, '2016-03-18 06:22:54', NULL, NULL, 'active'),
(7, 'Time management			\r\n			\r\n', 6, '2016-03-18 06:23:19', NULL, NULL, 'active'),
(8, 'Job timely delivery			\r\n			\r\n', 6, '2016-03-18 06:23:38', NULL, NULL, 'active'),
(9, 'Communication			\r\n			\r\n', 6, '2016-03-18 06:23:56', NULL, NULL, 'active'),
(10, 'Skills			\r\n', 6, '2016-03-18 06:24:33', NULL, NULL, 'active'),
(11, 'Speed			\r\n', 6, '2016-03-18 06:24:56', NULL, NULL, 'active'),
(12, 'New skills			\r\n			\r\n', 6, '2016-03-18 06:25:11', NULL, NULL, 'active'),
(13, 'Training Requirement			\r\n			\r\n', 6, '2016-03-18 06:25:30', NULL, NULL, 'active'),
(14, 'Initiative to Learn			\r\n			\r\n', 6, '2016-03-18 06:25:46', NULL, NULL, 'active'),
(15, 'Any Compliments from manager/Colleague?			\r\n			\r\n', 6, '2016-03-18 06:26:12', NULL, NULL, 'active'),
(16, 'Good candidate for future of co			\r\n			\r\n', 6, '2016-03-18 06:26:58', NULL, NULL, 'active'),
(17, 'Any thing we missed to appreciate you for?			\r\n			\r\n', 6, '2016-03-18 06:27:26', NULL, NULL, 'active'),
(18, 'Any value addition to company?			\r\n			\r\n', 6, '2016-03-18 06:28:00', NULL, NULL, 'active'),
(19, 'Where do you want to to see yourself in next 12 months?			\r\n			\r\n', 6, '2016-03-18 06:28:37', NULL, NULL, 'active'),
(20, 'How do you plan to do it?			\r\n			\r\n', 6, '2016-03-18 06:28:59', NULL, NULL, 'active'),
(21, 'How fair is company to you?	\r\n			\r\n', 6, '2016-03-18 06:29:20', 1, '2016-04-22 21:26:58', 'active'),
(22, 'What is one thing you want to change in company (except boss)?			\r\n			\r\n', 6, '2016-03-18 06:29:46', NULL, NULL, 'active'),
(23, 'Attendance			\r\n			\r\n', 6, '2016-03-18 06:30:08', NULL, NULL, 'active'),
(24, 'Rank yourself from 1 to 10?', 1, '2016-04-22 21:15:38', 1, '2016-04-22 21:18:02', 'deleted');

-- --------------------------------------------------------

--
-- Table structure for table `questionnaire_settings`
--

CREATE TABLE `questionnaire_settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `questionnaire_attribute` varchar(64) NOT NULL,
  `attribute_value` varchar(64) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_updated_by` int(11) DEFAULT NULL,
  `last_updated_at` timestamp NULL DEFAULT NULL,
  `status` enum('active','deleted') NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questionnaire_settings`
--

INSERT INTO `questionnaire_settings` (`id`, `questionnaire_attribute`, `attribute_value`, `created_by`, `created_at`, `last_updated_by`, `last_updated_at`, `status`) VALUES
(7, 'evaluation_months', '1,4', 1, '2016-04-07 12:19:01', 1, '2016-04-23 14:02:05', 'active'),
(8, 'evaluation_authority', '2', 1, '2016-04-08 06:24:42', 1, '2016-04-23 14:02:05', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `sent_sms`
--

CREATE TABLE `sent_sms` (
  `id` int(11) UNSIGNED NOT NULL,
  `recipients` varchar(512) NOT NULL,
  `message` varchar(1024) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` enum('active','deleted') NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sent_sms`
--

INSERT INTO `sent_sms` (`id`, `recipients`, `message`, `created_by`, `created_at`, `status`) VALUES
(1, '13', 'asd', 1, '2016-04-19 11:41:49', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `sms_drafts`
--

CREATE TABLE `sms_drafts` (
  `id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `message` varchar(1024) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_updated_by` int(11) DEFAULT NULL,
  `last_updated_at` timestamp NULL DEFAULT NULL,
  `status` enum('active','deleted') NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sms_drafts`
--

INSERT INTO `sms_drafts` (`id`, `message`, `created_by`, `created_at`, `last_updated_by`, `last_updated_at`, `status`) VALUES
(0, 'THIS IS A test DRAFT MESSAGE FROM imc', 1, '2016-04-25 10:25:12', 1, '2016-04-25 19:27:03', 'deleted');

-- --------------------------------------------------------

--
-- Table structure for table `trainings_attended`
--

CREATE TABLE `trainings_attended` (
  `id` int(11) UNSIGNED NOT NULL,
  `training_title` varchar(128) NOT NULL,
  `training_description` text NOT NULL,
  `training_country` varchar(32) NOT NULL,
  `training_state` varchar(32) NOT NULL,
  `training_city` varchar(64) NOT NULL,
  `training_start` date NOT NULL,
  `training_end` date NOT NULL,
  `attended_by` varchar(128) NOT NULL,
  `recommended_requested_by` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_updated_by` int(11) DEFAULT NULL,
  `last_updated_at` timestamp NULL DEFAULT NULL,
  `status` enum('active','deleted') NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trainings_attended`
--

INSERT INTO `trainings_attended` (`id`, `training_title`, `training_description`, `training_country`, `training_state`, `training_city`, `training_start`, `training_end`, `attended_by`, `recommended_requested_by`, `created_by`, `created_at`, `last_updated_by`, `last_updated_at`, `status`) VALUES
(1, 'Oracle', 'Stored Procedures and Cursors', 'India', 'Jammu and Kashmir', 'Srinagar', '2016-03-17', '2016-03-18', '6', 1, 12, '2016-03-16 07:41:44', 1, '2016-03-16 11:18:02', 'active'),
(2, 'Codeigniter', 'Database Manipulation', 'Russia', '', '', '2016-03-23', '2016-03-18', '6', 6, 1, '2016-03-16 11:27:04', NULL, NULL, 'active'),
(3, 'sdgdxh', 'dhdhzjtzdhzh', 'Egypt', '', '', '2016-03-24', '2016-03-25', '12', 1, 1, '2016-03-16 11:33:42', NULL, NULL, 'active'),
(4, 'Web Designing', 'Html, CSS, Javascript', 'Azerbaijan', 'Bilasuvar Rayonu', 'Nishat', '2016-03-01', '2016-03-03', '6,12', 1, 6, '2016-03-17 14:46:57', NULL, NULL, 'active'),
(5, 'Web Designing', 'Html, CSS, Javascript', 'Dominican Republic', 'Maria Trinidad Sanchez', 'Nishat', '2016-03-10', '2016-03-15', '12', 12, 1, '2016-03-17 14:51:27', NULL, NULL, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `trainings_recommended`
--

CREATE TABLE `trainings_recommended` (
  `id` int(10) UNSIGNED NOT NULL,
  `training_title` varchar(128) NOT NULL,
  `training_description` text NOT NULL,
  `training_country` varchar(32) NOT NULL,
  `training_state` varchar(32) NOT NULL,
  `training_city` varchar(64) NOT NULL,
  `training_start` date NOT NULL,
  `training_end` date NOT NULL,
  `recommended_by` int(11) NOT NULL,
  `recommended_for` varchar(128) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_updated_by` int(11) DEFAULT NULL,
  `last_updated_at` timestamp NULL DEFAULT NULL,
  `status` enum('active','approved','rejected','attended','deleted') NOT NULL DEFAULT 'active',
  `approved_by` int(11) DEFAULT NULL,
  `rejected_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trainings_recommended`
--

INSERT INTO `trainings_recommended` (`id`, `training_title`, `training_description`, `training_country`, `training_state`, `training_city`, `training_start`, `training_end`, `recommended_by`, `recommended_for`, `created_by`, `created_at`, `last_updated_by`, `last_updated_at`, `status`, `approved_by`, `rejected_by`) VALUES
(1, 'Web Designing', 'Html, CSS, Javascript', 'Azerbaijan', 'Bilasuvar Rayonu', 'Nishat', '2016-03-01', '2016-03-03', 1, '12,6', 6, '2016-03-16 08:00:38', 1, '2016-04-23 15:17:09', 'approved', 1, 1),
(2, 'SERVER HOSTING', 'HANDLING OF SERVERS.', 'India', 'Jammu and Kashmir', 'JANDK', '2016-03-27', '2016-04-22', 0, '15', 1, '2016-04-23 05:49:17', NULL, NULL, 'active', NULL, NULL),
(3, 'SERVER HOSTING', 'SSSSSS', 'Belgium', 'Brabant Wallon', 'FFF', '2016-04-17', '2016-04-21', 0, '15', 1, '2016-04-23 05:51:57', NULL, NULL, 'active', NULL, NULL),
(4, 'SERVER HOSTING', 'SSSS', 'Afghanistan', 'Baghlan', 'SSSS', '2016-04-27', '2016-05-06', 0, '15', 1, '2016-04-23 05:55:48', NULL, NULL, 'active', NULL, NULL),
(5, 'dsfxgfhcgj', 'xhfgcjhv', 'Afghanistan', 'Badghis', 'gfcjhm,', '2016-01-01', '2016-05-01', 0, '15', 1, '2016-04-25 11:10:27', NULL, NULL, 'active', NULL, NULL),
(6, 'hgvjhkb,', 'cujvkjb', 'Afghanistan', 'Badakhshan', 'dfuyikln', '2015-12-04', '2016-04-30', 0, '13', 1, '2016-04-25 11:17:43', NULL, NULL, 'active', NULL, NULL),
(7, 'fdxhn', 'fdxhnj', 'Afghanistan', 'Baghlan', 'rdtfikug', '2016-04-01', '2016-04-25', 0, '13', 1, '2016-04-25 11:29:54', NULL, NULL, 'active', NULL, NULL),
(8, 'fxhgvj', 'dyuyk', 'Afghanistan', 'Balkh', 'dxhgjvk', '2016-04-01', '2016-04-25', 0, '12', 13, '2016-04-25 11:41:06', NULL, NULL, 'active', NULL, NULL),
(9, 'fchgjhv', 'rdyutjkv', 'Afghanistan', 'Badghis', 'esyjfv', '2016-04-03', '2016-04-09', 0, '13', 1, '2016-04-25 11:59:57', NULL, NULL, 'active', NULL, NULL),
(10, 'gfcmn', 'rdujyhvk', 'Algeria', 'Alger', 'dgchjhv', '2016-04-01', '2016-04-25', 12, '15,12', 1, '2016-04-25 12:05:47', 1, '2016-04-26 14:17:40', 'deleted', NULL, NULL),
(11, 'CCNA', 'Networking', 'Algeria', 'Alger', 'hgjhjbkj', '2015-04-01', '2015-10-31', 13, '15,6', 1, '2016-04-26 05:02:40', 1, '2016-04-26 14:17:24', 'approved', 1, NULL),
(12, 'teSt tRaIN', 'tesT TEST TEst', 'Bahamas', 'Bimini', 'TEST', '2016-04-05', '2016-04-19', 15, '16', 1, '2016-04-26 07:29:34', 1, '2016-05-26 21:50:01', 'approved', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `trainings_requests`
--

CREATE TABLE `trainings_requests` (
  `id` int(10) UNSIGNED NOT NULL,
  `training_title` varchar(128) NOT NULL,
  `training_description` text NOT NULL,
  `training_location` varchar(128) NOT NULL,
  `training_country` varchar(32) NOT NULL,
  `training_state` varchar(32) NOT NULL,
  `training_city` varchar(64) NOT NULL,
  `training_start` date NOT NULL,
  `training_end` date NOT NULL,
  `requested_by` int(11) NOT NULL,
  `requested_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_updated_by` int(11) DEFAULT NULL,
  `last_updated_at` timestamp NULL DEFAULT NULL,
  `status` enum('active','approved','rejected','attended','deleted') NOT NULL DEFAULT 'active',
  `approved_by` int(11) DEFAULT NULL,
  `rejected_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trainings_requests`
--

INSERT INTO `trainings_requests` (`id`, `training_title`, `training_description`, `training_location`, `training_country`, `training_state`, `training_city`, `training_start`, `training_end`, `requested_by`, `requested_at`, `last_updated_by`, `last_updated_at`, `status`, `approved_by`, `rejected_by`) VALUES
(1, 'Web Designing', 'Html, CSS, Javascript', 'Dubai', 'Czeck Republic', 'Kralovehradecky', 'Nishat', '2016-03-10', '2016-03-15', 12, '2016-03-16 08:11:58', 1, '2016-04-15 16:31:57', 'approved', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `travel_plans`
--

CREATE TABLE `travel_plans` (
  `id` int(10) UNSIGNED NOT NULL,
  `employees` varchar(128) NOT NULL,
  `project_manager` int(11) NOT NULL,
  `alternate_support` int(11) DEFAULT NULL,
  `travel_purpose` text NOT NULL,
  `travel_summary` text NOT NULL,
  `travel_from_country` varchar(32) NOT NULL,
  `travel_from_state` varchar(32) NOT NULL,
  `travel_from_city` varchar(64) NOT NULL,
  `travel_to_country` varchar(32) NOT NULL,
  `travel_to_state` varchar(32) NOT NULL,
  `travel_to_city` varchar(64) NOT NULL,
  `travel_from_date` date NOT NULL,
  `travel_to_date` date NOT NULL,
  `travel_through` varchar(32) NOT NULL,
  `travel_allowance` int(11) NOT NULL,
  `food_allowance` int(11) NOT NULL,
  `living_allowance` int(11) NOT NULL,
  `success_rate` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_updated_by` int(11) DEFAULT NULL,
  `last_updated_at` timestamp NULL DEFAULT NULL,
  `status` enum('active','deleted') NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `travel_plans`
--

INSERT INTO `travel_plans` (`id`, `employees`, `project_manager`, `alternate_support`, `travel_purpose`, `travel_summary`, `travel_from_country`, `travel_from_state`, `travel_from_city`, `travel_to_country`, `travel_to_state`, `travel_to_city`, `travel_from_date`, `travel_to_date`, `travel_through`, `travel_allowance`, `food_allowance`, `living_allowance`, `success_rate`, `created_by`, `created_at`, `last_updated_by`, `last_updated_at`, `status`) VALUES
(2, '6,12', 13, 12, 'This is a Test Project Plan, no Purpose at all.', 'Nothing achieved.', 'India', 'Jammu and Kashmir', 'Srinagar', 'Afghanistan', 'Helmand', 'Tora Bora', '2016-03-25', '2016-03-31', 'Flight', 3000, 3000, 6000, 3, 1, '2016-03-18 06:18:07', 1, '2016-03-18 07:10:54', 'deleted'),
(3, '12,6', 13, 12, 'This is a Test Project Plan, no Purpose at all.', 'Nothing achieved. This is a Test Project Plan, no Purpose at all.', 'India', 'Jammu and Kashmir', 'Srinagar', 'Afghanistan', 'Helmand', 'Tora Bora', '2016-03-25', '2016-03-31', 'Flight', 3000, 3000, 6000, 5, 1, '2016-03-18 07:08:06', 1, '2016-05-26 21:47:28', 'active'),
(4, '14,6', 15, 13, ' cxn zx,', ' vcx,m .xdv/', 'American Samoa', 'Eastern', 'fdgshkj', 'Albania', 'Diber (Peshkopi)', 'rdstyku', '2016-03-01', '2016-03-31', 'Flight', 4000, 5000, 8000, 7, 1, '2016-04-26 05:59:16', 1, '2016-04-26 16:04:04', 'active'),
(5, '15,12', 15, 12, 'fAmiLY triP', 'tEsT', 'American Samoa', 'Manu''a', '456546', 'Afghanistan', 'Badakhshan', 'HTHty', '2016-04-19', '2016-04-29', 'Flight', 4654654, 546456, 5464, 3, 1, '2016-04-26 06:57:21', 1, '2016-04-26 15:57:34', 'deleted');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `advance_pay_requests`
--
ALTER TABLE `advance_pay_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company_details`
--
ALTER TABLE `company_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company_holidays`
--
ALTER TABLE `company_holidays`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company_letters`
--
ALTER TABLE `company_letters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company_products`
--
ALTER TABLE `company_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customized_signatures`
--
ALTER TABLE `customized_signatures`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_assets`
--
ALTER TABLE `employee_assets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_designations`
--
ALTER TABLE `employee_designations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_evaluation`
--
ALTER TABLE `employee_evaluation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_experience`
--
ALTER TABLE `employee_experience`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_files`
--
ALTER TABLE `employee_files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_leaves`
--
ALTER TABLE `employee_leaves`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_login`
--
ALTER TABLE `employee_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_performance_reports`
--
ALTER TABLE `employee_performance_reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_qualification`
--
ALTER TABLE `employee_qualification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_salary`
--
ALTER TABLE `employee_salary`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_teams`
--
ALTER TABLE `employee_teams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `late_sitting`
--
ALTER TABLE `late_sitting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leaves`
--
ALTER TABLE `leaves`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `letter_categories`
--
ALTER TABLE `letter_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loan_requests`
--
ALTER TABLE `loan_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `miss_attendance`
--
ALTER TABLE `miss_attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `office_settings`
--
ALTER TABLE `office_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `off_day`
--
ALTER TABLE `off_day`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questionnaire`
--
ALTER TABLE `questionnaire`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questionnaire_settings`
--
ALTER TABLE `questionnaire_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sent_sms`
--
ALTER TABLE `sent_sms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sms_drafts`
--
ALTER TABLE `sms_drafts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trainings_attended`
--
ALTER TABLE `trainings_attended`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trainings_recommended`
--
ALTER TABLE `trainings_recommended`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trainings_requests`
--
ALTER TABLE `trainings_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `travel_plans`
--
ALTER TABLE `travel_plans`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `advance_pay_requests`
--
ALTER TABLE `advance_pay_requests`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `company_details`
--
ALTER TABLE `company_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `company_holidays`
--
ALTER TABLE `company_holidays`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `company_letters`
--
ALTER TABLE `company_letters`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `company_products`
--
ALTER TABLE `company_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `customized_signatures`
--
ALTER TABLE `customized_signatures`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `employee_assets`
--
ALTER TABLE `employee_assets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `employee_designations`
--
ALTER TABLE `employee_designations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `employee_evaluation`
--
ALTER TABLE `employee_evaluation`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;
--
-- AUTO_INCREMENT for table `employee_experience`
--
ALTER TABLE `employee_experience`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
--
-- AUTO_INCREMENT for table `employee_files`
--
ALTER TABLE `employee_files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `employee_leaves`
--
ALTER TABLE `employee_leaves`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `employee_login`
--
ALTER TABLE `employee_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;
--
-- AUTO_INCREMENT for table `employee_performance_reports`
--
ALTER TABLE `employee_performance_reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `employee_qualification`
--
ALTER TABLE `employee_qualification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `employee_salary`
--
ALTER TABLE `employee_salary`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `employee_teams`
--
ALTER TABLE `employee_teams`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `late_sitting`
--
ALTER TABLE `late_sitting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `leaves`
--
ALTER TABLE `leaves`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `letter_categories`
--
ALTER TABLE `letter_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `loan_requests`
--
ALTER TABLE `loan_requests`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `miss_attendance`
--
ALTER TABLE `miss_attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
--
-- AUTO_INCREMENT for table `office_settings`
--
ALTER TABLE `office_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT for table `off_day`
--
ALTER TABLE `off_day`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `questionnaire`
--
ALTER TABLE `questionnaire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `questionnaire_settings`
--
ALTER TABLE `questionnaire_settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `sent_sms`
--
ALTER TABLE `sent_sms`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `trainings_attended`
--
ALTER TABLE `trainings_attended`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `trainings_recommended`
--
ALTER TABLE `trainings_recommended`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `trainings_requests`
--
ALTER TABLE `trainings_requests`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `travel_plans`
--
ALTER TABLE `travel_plans`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
