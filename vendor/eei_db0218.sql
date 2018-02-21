-- phpMyAdmin SQL Dump
-- version 4.7.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 17, 2018 at 05:40 PM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eei_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_log_t`
--

CREATE TABLE `activity_log_t` (
  `activity_log_id` int(5) NOT NULL,
  `ticket_id` int(3) UNSIGNED ZEROFILL NOT NULL,
  `activity_log_details` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `logger` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activity_log_t`
--

INSERT INTO `activity_log_t` (`activity_log_id`, `ticket_id`, `activity_log_details`, `timestamp`, `logger`) VALUES
(1, 030, 'hi', '2018-02-09 08:21:46', 18),
(2, 030, 'hi', '2018-02-09 08:22:43', 18),
(3, 030, 'hi', '2018-02-09 08:25:26', 18),
(4, 030, 'a', '2018-02-09 08:25:30', 18);

-- --------------------------------------------------------

--
-- Table structure for table `notification_t`
--

CREATE TABLE `notification_t` (
  `notification_id` int(4) NOT NULL,
  `ticket_id` int(3) UNSIGNED ZEROFILL DEFAULT NULL,
  `user_id` int(5) NOT NULL,
  `notification_description` varchar(100) NOT NULL,
  `isRead` tinyint(1) NOT NULL DEFAULT '0',
  `isSeen` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notification_t`
--

INSERT INTO `notification_t` (`notification_id`, `ticket_id`, `user_id`, `notification_description`, `isRead`, `isSeen`) VALUES
(7, 029, 23, 'Ticket No. : 2018029 needs your review', 0, 1),
(9, 029, 19, 'Ticket No. : 2018029 has been approved', 1, 1),
(10, 029, 18, '2018029 has been assigned to you', 1, 1),
(11, 029, 18, '2018029 has been assigned to you', 1, 1),
(13, 030, 23, 'New ticket 2018030 for approval', 0, 1),
(14, 030, 23, 'New ticket 2018030 for approval', 0, 1),
(15, 030, 19, 'Ticket No. : 2018030 has been approved', 0, 1),
(16, 034, 19, 'Ticket No. : 2018034 needs your review', 0, 1),
(17, 034, 20, '2018034 has been assigned to you', 0, 1),
(18, 035, 19, 'Ticket No. : 2018035 needs your review', 1, 1),
(19, 035, 21, '2018035 has been assigned to you', 0, 1),
(20, 035, 25, '2018035 has been assigned to you', 0, 1),
(21, 036, 19, 'Ticket No. : 2018036 needs your review', 1, 1),
(22, 036, 20, '2018036 has been assigned to you', 0, 1),
(32, 036, 20, '2018036 has been assigned to you', 0, 1),
(33, 036, 20, '2018036 has been assigned to you', 0, 1),
(34, 036, 20, '2018036 has been assigned to you', 0, 1),
(35, 034, 20, '2018034 has been assigned to you', 0, 1),
(36, 034, 20, '2018034 has been assigned to you', 0, 1),
(37, 034, 20, '2018034 has been assigned to you', 0, 1),
(38, 030, 18, '2018030 has been assigned to you', 1, 1),
(42, 040, 22, 'Ticket No. : 2018040 needs your review', 0, 1),
(43, 041, 22, 'Ticket No. : 2018041 needs your review', 0, 1),
(44, 042, 22, 'Ticket No. : 2018042 needs your review', 0, 1),
(45, 043, 22, 'Ticket No. : 2018043 needs your review', 0, 1),
(46, 044, 22, 'Ticket No. : 2018044 needs your review', 0, 1),
(47, 045, 22, 'Ticket No. : 2018045 needs your review', 1, 1),
(49, 046, 23, 'New ticket 2018046 for approval', 1, 1),
(50, 046, 19, 'Ticket No. : 2018046 has been approved', 1, 1),
(51, 046, 18, '2018046 has been assigned to you', 1, 1),
(52, 046, 22, 'Your ticket 2018046 has been resolved', 1, 1),
(53, 047, 22, 'Ticket No. : 2018047 needs your review', 1, 1),
(54, 047, 23, 'New ticket 2018047 for approval', 1, 1),
(55, 047, 19, 'Ticket No. : 2018047 has been approved', 1, 1),
(56, 047, 18, '2018047 has been assigned to you', 1, 1),
(57, 047, 35, 'Your ticket 2018047 has been resolved', 1, 1),
(58, 048, 22, 'Ticket No. : 2018048 needs your review', 1, 1),
(59, 048, 35, 'New ticket 2018048 for approval', 1, 1),
(60, 048, 35, 'New ticket 2018048 for approval', 1, 1),
(61, 048, 19, 'Ticket No. : 2018048 has been approved', 1, 1),
(62, 048, 19, 'Ticket No. : 2018048 has been approved', 0, 1),
(63, 048, 18, '2018048 has been assigned to you', 1, 1),
(64, 048, 23, 'Your ticket 2018048 has been resolved', 1, 1),
(65, 048, 23, 'Your ticket 2018048 has been resolved', 1, 1),
(66, 048, 18, '2018048 has been assigned to you', 1, 1),
(67, 048, 18, '2018048 has been assigned to you', 1, 1),
(68, 048, 18, '2018048 has been assigned to you', 0, 1),
(69, 048, 18, '2018048 has been assigned to you', 0, 1),
(70, 048, 23, 'Your ticket 2018048 has been resolved', 1, 1),
(71, 047, 35, 'Your ticket 2018047 has been resolved', 1, 1),
(72, 047, 35, 'Your ticket 2018047 has been resolved', 0, 1),
(73, 049, 19, 'Ticket No. : 2018049 needs your review', 1, 1),
(74, 049, 20, '2018049 has been assigned to you', 1, 1),
(75, 049, 23, 'Your ticket 2018049 has been resolved', 1, 1),
(76, 050, 19, 'Ticket No. : 2018050 needs your review', 0, 1),
(77, 051, 19, 'Ticket No. : 2018051 needs your review', 0, 1),
(78, 052, 19, 'Ticket No. : 2018052 needs your review', 0, 1),
(79, 053, 19, 'Ticket No. : 2018053 needs your review', 0, 1),
(80, 054, 19, 'Ticket No. : 2018054 needs your review', 0, 1),
(81, 055, 19, 'Ticket No. : 2018055 needs your review', 0, 1),
(82, 056, 19, 'Ticket No. : 2018056 needs your review', 0, 1),
(83, 057, 19, 'Ticket No. : 2018057 needs your review', 1, 1),
(84, 057, 20, '2018057 has been assigned to you', 0, 1),
(85, 057, 35, 'Your ticket 2018057 has been resolved', 1, 1),
(86, 058, 39, 'Ticket No. : 2018058 needs your review', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `service_ticket_t`
--

CREATE TABLE `service_ticket_t` (
  `ticket_id` int(3) UNSIGNED ZEROFILL NOT NULL,
  `findings` varchar(250) DEFAULT NULL,
  `request_details` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `service_ticket_t`
--

INSERT INTO `service_ticket_t` (`ticket_id`, `findings`, `request_details`) VALUES
(034, NULL, 'F A K not working'),
(035, NULL, 'Can open websites but it takes a long time'),
(036, NULL, 'Left click is fine but right click won\'t work'),
(049, NULL, 'asdfjk not working'),
(050, NULL, 'hi'),
(051, NULL, 'd'),
(052, NULL, 'hi'),
(053, NULL, 'a'),
(054, NULL, 'a'),
(055, NULL, 'a'),
(056, NULL, 'a'),
(057, NULL, 'a');

-- --------------------------------------------------------

--
-- Table structure for table `sla_t`
--

CREATE TABLE `sla_t` (
  `id` int(3) NOT NULL,
  `severity_level` varchar(4) NOT NULL,
  `description` varchar(30) NOT NULL,
  `resolution_time` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sla_t`
--

INSERT INTO `sla_t` (`id`, `severity_level`, `description`, `resolution_time`) VALUES
(1, 'SEV1', 'Critical', 4),
(2, 'SEV2', 'Important', 6),
(3, 'SEV3', 'Normal', 8),
(4, 'SEV4', 'Low', 24),
(5, 'SEV5', 'Very Low', 48);

-- --------------------------------------------------------

--
-- Table structure for table `ticket_status_t`
--

CREATE TABLE `ticket_status_t` (
  `status_id` int(1) NOT NULL,
  `ticket_status` varchar(15) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ticket_status_t`
--

INSERT INTO `ticket_status_t` (`status_id`, `ticket_status`, `description`) VALUES
(1, 'New', NULL),
(2, 'Checked', NULL),
(3, 'Approved', NULL),
(4, 'Rejected', NULL),
(5, 'Pending', NULL),
(6, 'In Progress', NULL),
(7, 'Resolved', NULL),
(8, 'Closed', NULL),
(9, 'Cancelled', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ticket_t`
--

CREATE TABLE `ticket_t` (
  `ticket_id` int(3) UNSIGNED ZEROFILL NOT NULL,
  `ticket_number` int(11) NOT NULL,
  `ticket_title` varchar(40) NOT NULL,
  `date_prepared` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ticket_type` enum('Service','User Access') DEFAULT NULL,
  `ticket_category` enum('Technicals','Access','Network') DEFAULT NULL,
  `severity_level` int(1) DEFAULT NULL,
  `ticket_status` int(1) DEFAULT NULL,
  `date_assigned` datetime NOT NULL,
  `date_required` datetime DEFAULT NULL,
  `remarks` varchar(250) DEFAULT NULL,
  `resolution_date` date DEFAULT NULL,
  `user_id` int(5) NOT NULL,
  `ticket_agent_id` int(5) DEFAULT NULL,
  `it_group_manager_id` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ticket_t`
--

INSERT INTO `ticket_t` (`ticket_id`, `ticket_number`, `ticket_title`, `date_prepared`, `ticket_type`, `ticket_category`, `severity_level`, `ticket_status`, `date_assigned`, `date_required`, `remarks`, `resolution_date`, `user_id`, `ticket_agent_id`, `it_group_manager_id`) VALUES
(029, 2018029, 'k', '2018-02-07 06:02:17', 'User Access', 'Access', 1, 1, '0000-00-00 00:00:00', '2018-02-07 07:17:44', NULL, NULL, 22, NULL, 18),
(030, 2018030, 'AutoCad Access', '2018-02-08 06:18:58', 'User Access', 'Access', 5, 5, '2018-02-08 14:18:58', '2018-02-10 14:18:58', NULL, NULL, 22, NULL, 18),
(034, 2018034, 'Keyboard Broken', '2018-02-12 04:33:54', 'Service', 'Technicals', 1, 5, '2018-02-08 01:00:30', '2018-02-08 09:00:30', NULL, NULL, 22, 24, 20),
(035, 2018035, 'Wifi is slow', '2018-02-07 06:46:28', 'Service', 'Network', 3, 6, '0000-00-00 00:00:00', '2018-02-07 22:35:55', NULL, NULL, 23, 25, 21),
(036, 2018036, 'Mouse not working', '2018-02-07 16:44:34', 'Service', 'Technicals', 2, 5, '2018-02-08 00:44:34', NULL, NULL, NULL, 23, 24, 20),
(046, 2018046, 'Sims 4 Access', '2018-02-09 01:30:01', 'User Access', 'Access', 1, 8, '2018-02-08 14:48:16', '2018-02-08 18:48:16', NULL, NULL, 22, NULL, 18),
(047, 2018047, 'Sims 4 Access', '2018-02-09 04:45:47', 'User Access', 'Access', 1, 8, '2018-02-09 11:53:30', '2018-02-09 15:53:30', NULL, NULL, 35, NULL, 18),
(048, 2018048, 'HAHA Access', '2018-02-09 04:20:14', 'User Access', 'Access', 1, 8, '2018-02-09 12:18:52', '2018-02-09 16:18:52', NULL, NULL, 23, NULL, 18),
(049, 2018049, 'Keyboard Broken', '2018-02-17 15:05:14', 'Service', 'Technicals', 2, 8, '2018-02-09 12:48:06', '2018-02-09 18:48:06', NULL, NULL, 23, NULL, 20),
(050, 2018050, 'Hi', '2018-02-09 08:21:57', 'Service', NULL, NULL, 1, '0000-00-00 00:00:00', NULL, NULL, NULL, 18, NULL, NULL),
(051, 2018051, 'd', '2018-02-09 08:27:02', 'Service', NULL, NULL, 1, '0000-00-00 00:00:00', NULL, NULL, NULL, 35, NULL, NULL),
(052, 2018052, 'hi', '2018-02-09 08:30:58', 'Service', NULL, NULL, 1, '0000-00-00 00:00:00', NULL, NULL, NULL, 35, NULL, NULL),
(053, 2018053, 'a', '2018-02-09 08:31:23', 'Service', NULL, NULL, 1, '0000-00-00 00:00:00', NULL, NULL, NULL, 35, NULL, NULL),
(054, 2018054, 'A', '2018-02-09 08:32:22', 'Service', NULL, NULL, 1, '0000-00-00 00:00:00', NULL, NULL, NULL, 35, NULL, NULL),
(055, 2018055, 'a', '2018-02-09 08:32:33', 'Service', NULL, NULL, 1, '0000-00-00 00:00:00', NULL, NULL, NULL, 35, NULL, NULL),
(056, 2018056, 'a', '2018-02-09 08:34:32', 'Service', NULL, NULL, 1, '0000-00-00 00:00:00', NULL, NULL, NULL, 35, NULL, NULL),
(057, 2018057, 'a', '2018-02-09 09:26:00', 'Service', '', 1, 8, '2018-02-09 17:25:25', '2018-02-09 21:25:25', NULL, NULL, 35, NULL, 20),
(058, 2018058, 'k', '2018-02-16 15:46:58', 'User Access', NULL, NULL, 1, '0000-00-00 00:00:00', NULL, NULL, NULL, 22, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `token_t`
--

CREATE TABLE `token_t` (
  `email_address` varchar(50) NOT NULL,
  `token` varchar(40) NOT NULL,
  `is_used` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `token_t`
--

INSERT INTO `token_t` (`email_address`, `token`, `is_used`) VALUES
('dondumaliang@gmail.com', 'BPX47Q1DU7', 0),
('dondumaliang@gmail.com', 'Y9BRXYENQF', 1),
('dondumaliang@gmail.com', 'Z38QVS6ZAR', 1),
('dondumaliang@gmail.com', '8LXY8RT613', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_ticket_t`
--

CREATE TABLE `user_access_ticket_t` (
  `ticket_id` int(3) UNSIGNED ZEROFILL NOT NULL,
  `company` varchar(45) NOT NULL,
  `dept_proj` char(20) NOT NULL,
  `rc_no` int(5) NOT NULL,
  `name` text NOT NULL,
  `access_type` char(40) NOT NULL,
  `application_name` varchar(40) DEFAULT NULL,
  `expiry_date` date DEFAULT NULL,
  `approver` int(11) DEFAULT NULL,
  `isApproved` tinyint(1) DEFAULT NULL,
  `checker` int(11) DEFAULT NULL,
  `isChecked` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_access_ticket_t`
--

INSERT INTO `user_access_ticket_t` (`ticket_id`, `company`, `dept_proj`, `rc_no`, `name`, `access_type`, `application_name`, `expiry_date`, `approver`, `isApproved`, `checker`, `isChecked`) VALUES
(030, 'EEI', 'MRT 7', 0, 'Lennon Villanueva', 'AutoCad', NULL, NULL, 23, 1, 26, 1),
(046, 'EEI', 'Panglao Airport', 7, 'Lennon Villanueva', 'Sims 4', NULL, NULL, 23, 1, 26, 1),
(047, 'EEI', 'One Residences', 122, 'Brad Pitt', 'Sims 4', NULL, NULL, 23, 1, 22, 1),
(048, 'EEI', 'MRT 7', 0, 'Elisha Dumaliang', 'HAHA', NULL, NULL, 35, 1, 22, 1),
(058, 'k', 'k', 1, 'Lennon Villanueva', 'k', NULL, NULL, 35, NULL, 39, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_t`
--

CREATE TABLE `user_t` (
  `user_id` int(5) NOT NULL,
  `first_name` char(30) NOT NULL,
  `last_name` char(20) NOT NULL,
  `userid` char(20) NOT NULL,
  `password` varchar(100) NOT NULL DEFAULT 'usr@EEI1',
  `email_address` varchar(50) NOT NULL,
  `user_type` enum('Administrator','Requestor','Technicals Group Manager','Access Group Manager','Network Group Manager','Technician','Network Engineer') NOT NULL,
  `is_firstlogin` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_t`
--

INSERT INTO `user_t` (`user_id`, `first_name`, `last_name`, `userid`, `password`, `email_address`, `user_type`, `is_firstlogin`) VALUES
(18, 'Donna', 'Dumaliang', 'ddumaliang', '21232f297a57a5a743894a0e4a801fc3', 'dondumaliang@gmail.com', 'Access Group Manager', 1),
(19, 'April', 'Angelo', 'ahangelo', '21232f297a57a5a743894a0e4a801fc3', 'dondumaliang@gmail.com', 'Administrator', 1),
(20, 'Christiana', 'Tan', 'cetan', '21232f297a57a5a743894a0e4a801fc3', 'dondumaliang@gmail.com', 'Technicals Group Manager', 1),
(21, 'Jerico', 'Lopez', 'jlopez', '21232f297a57a5a743894a0e4a801fc3', 'dondumaliang@gmail.com', 'Network Group Manager', 1),
(22, 'Lennon', 'Villanueva', 'lvillanueva', '21232f297a57a5a743894a0e4a801fc3', 'dondumaliang@gmail.com', 'Requestor', 1),
(23, 'Elisha', 'Dumaliang', 'edumaliang', '21232f297a57a5a743894a0e4a801fc3', 'dondumaliang@gmail.com', 'Requestor', 1),
(24, 'Chandler', 'Bing', 'cbing', '21232f297a57a5a743894a0e4a801fc3', 'dondumaliang@gmail.com', 'Technician', 1),
(25, 'Joey', 'Tribbiani', 'jtribbiani', '21232f297a57a5a743894a0e4a801fc3', 'dondumaliang@gmail.com', 'Network Engineer', 1),
(34, 'Ross', 'Geller', 'rgeller', '21232f297a57a5a743894a0e4a801fc3', 'dondumaliang@gmail.com', 'Requestor', NULL),
(35, 'Brad', 'Pitt', 'bpitt', '21232f297a57a5a743894a0e4a801fc3', 'dondumaliang@gmail.com', 'Requestor', 1),
(36, 'Joselito', 'Olpoc', 'jolpoc', '21232f297a57a5a743894a0e4a801fc3', 'dondumaliang@gmail.com', 'Requestor', NULL),
(37, 'Sandra', 'Lovenia', 'slovenia', '21232f297a57a5a743894a0e4a801fc3', 'dondumaliang@gmail.com', 'Requestor', NULL),
(39, 'Fallon', 'Carrington', 'fcarrington', '21232f297a57a5a743894a0e4a801fc3', 'dondumaliang@gmail.com', 'Requestor', NULL),
(41, 'Ben', 'Dumaliang', 'bdumaliang', '21232f297a57a5a743894a0e4a801fc3', 'dondumaliang@gmail.com', 'Requestor', NULL),
(71, 'Barney', 'Stinson', 'bstinson', '21232f297a57a5a743894a0e4a801fc3', 'dondumaliang@gmail.com', 'Requestor', NULL),
(72, 'Robin', 'Scherbatsky', 'rscherbatsky', '21232f297a57a5a743894a0e4a801fc3', 'dondumaliang@gmail.com', 'Requestor', NULL),
(73, 'Ted', 'Mosby', 'tmosby', '21232f297a57a5a743894a0e4a801fc3', 'dondumaliang@gmail.com', 'Requestor', NULL),
(74, 'Lily', 'Aldrin', 'laldrin', '21232f297a57a5a743894a0e4a801fc3', 'dondumaliang@gmail.com', 'Requestor', NULL),
(75, 'Marshall', 'Eriksen', 'meriksen', '21232f297a57a5a743894a0e4a801fc3', 'dondumaliang@gmail.com', 'Requestor', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_log_t`
--
ALTER TABLE `activity_log_t`
  ADD PRIMARY KEY (`activity_log_id`),
  ADD KEY `ticket_id` (`ticket_id`);

--
-- Indexes for table `notification_t`
--
ALTER TABLE `notification_t`
  ADD PRIMARY KEY (`notification_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `ticket_id` (`ticket_id`);

--
-- Indexes for table `service_ticket_t`
--
ALTER TABLE `service_ticket_t`
  ADD KEY `service_ticket_t_ibfk_1` (`ticket_id`);

--
-- Indexes for table `sla_t`
--
ALTER TABLE `sla_t`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ticket_status_t`
--
ALTER TABLE `ticket_status_t`
  ADD PRIMARY KEY (`status_id`);

--
-- Indexes for table `ticket_t`
--
ALTER TABLE `ticket_t`
  ADD PRIMARY KEY (`ticket_id`),
  ADD KEY `requestor_id` (`user_id`),
  ADD KEY `ticket_number` (`ticket_number`),
  ADD KEY `severity_level` (`severity_level`),
  ADD KEY `ticket_status` (`ticket_status`);

--
-- Indexes for table `user_access_ticket_t`
--
ALTER TABLE `user_access_ticket_t`
  ADD UNIQUE KEY `ticket_id_2` (`ticket_id`),
  ADD KEY `ticket_id` (`ticket_id`);

--
-- Indexes for table `user_t`
--
ALTER TABLE `user_t`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_log_t`
--
ALTER TABLE `activity_log_t`
  MODIFY `activity_log_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `notification_t`
--
ALTER TABLE `notification_t`
  MODIFY `notification_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `sla_t`
--
ALTER TABLE `sla_t`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ticket_status_t`
--
ALTER TABLE `ticket_status_t`
  MODIFY `status_id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `ticket_t`
--
ALTER TABLE `ticket_t`
  MODIFY `ticket_id` int(3) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `user_t`
--
ALTER TABLE `user_t`
  MODIFY `user_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=171;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `activity_log_t`
--
ALTER TABLE `activity_log_t`
  ADD CONSTRAINT `activity_log_t_ibfk_1` FOREIGN KEY (`ticket_id`) REFERENCES `ticket_t` (`ticket_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `notification_t`
--
ALTER TABLE `notification_t`
  ADD CONSTRAINT `notification_t_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_t` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `service_ticket_t`
--
ALTER TABLE `service_ticket_t`
  ADD CONSTRAINT `service_ticket_t_ibfk_1` FOREIGN KEY (`ticket_id`) REFERENCES `ticket_t` (`ticket_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ticket_t`
--
ALTER TABLE `ticket_t`
  ADD CONSTRAINT `ticket_t_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_t` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ticket_t_ibfk_3` FOREIGN KEY (`severity_level`) REFERENCES `sla_t` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ticket_t_ibfk_4` FOREIGN KEY (`ticket_status`) REFERENCES `ticket_status_t` (`status_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_access_ticket_t`
--
ALTER TABLE `user_access_ticket_t`
  ADD CONSTRAINT `user_access_ticket_t_ibfk_1` FOREIGN KEY (`ticket_id`) REFERENCES `ticket_t` (`ticket_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
