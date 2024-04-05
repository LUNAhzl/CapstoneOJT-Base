-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 05, 2024 at 07:13 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ojtime`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `course_handled` varchar(255) NOT NULL,
  `ad_id` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`id`, `name`, `course_handled`, `ad_id`, `email`, `password`) VALUES
(1, 'Hazel Mae Luna', 'Bachelor of Science in Tourism Management', 'BSTM', 'hala.luna.ui@phinmaed.com', 'Hazel@156'),
(2, 'Eunice Tricxie Paulino', 'Bachelor of Science in Hospitality Management', 'BSHM', 'eues.paulino.ui@phinmaed.com', 'Eunice@2002');

-- --------------------------------------------------------

--
-- Table structure for table `create_profile`
--

CREATE TABLE `create_profile` (
  `id` int(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `mname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `age` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `sc_id` varchar(255) NOT NULL,
  `section` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `sc_email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `dept` varchar(255) NOT NULL,
  `course` varchar(255) NOT NULL,
  `coordinator` varchar(255) NOT NULL,
  `coor_contact` varchar(255) NOT NULL,
  `coor_email` varchar(255) NOT NULL,
  `e_name` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `company` varchar(255) NOT NULL,
  `e_contact` varchar(255) NOT NULL,
  `e_email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `create_profile`
--

INSERT INTO `create_profile` (`id`, `fname`, `mname`, `lname`, `age`, `gender`, `sc_id`, `section`, `contact`, `sc_email`, `address`, `dept`, `course`, `coordinator`, `coor_contact`, `coor_email`, `e_name`, `position`, `company`, `e_contact`, `e_email`) VALUES
(6, 'James Mathew', 'Marasigan', 'Santos', '22', 'Male', '04-1819-043942', 'UI-BT1-BSTM4-2', '09242350136', 'jama.santos.ui@phinmaed.com', 'Lapaz, Iloilo', 'College of Management', 'Bachelor of Science in Tourism Management', 'Hazel Mae Luna', '09686548598', 'hala.luna.ui@phinmaed.com', 'Rose Guillermo', 'Airport Manager', 'Iloilo International Airport', '09508420562', 'guillermo.iia@gmail.com'),
(7, 'David Emmanuel', 'Santiago', 'Chua', '21', 'Male', '04-2122-037802', 'UI-FA1-BSHM4-1', '09678420961', 'dasa.chua.ui@phinmaed.com', 'Mandurriao, Iloilo', 'College of Management', 'Bachelor of Science in Hospitality Management', 'Eunice Tricxie Paulino', '09977280618', 'eues.paulino.ui@phinmaed.com', 'Cathy Garcia', 'Manager', 'Richmonde Hotel', '09784290452', 'garcia.richmonde@gmail.com'),
(9, 'Marc Joseph', 'Genovea', 'Ferero', '23', 'Male', '04-2122-035183', 'UI-BT1-BSTM4-2', '09508291047', 'marc.ferero.ui@phinmaed.com', 'Maasin, Iloilo', 'College of Management', 'Bachelor of Science in Tourism Management', 'Hazel Mae Luna', '09686548598', 'hala.luna.ui@phinmaed.com', 'Aliyah dela Cruz', 'Supervisor', 'Iloilo International Airport', '09509921672', 'dlcruz.iia@gmail.com'),
(11, 'Louis Miguel', 'Gan', 'Divinagracia', '22', 'Male', '04-2122-039485', 'UI-FA1-BSHM4-2', '09398501309', 'louis.divinagracia@phinmaed.com', 'Jaro, Iloilo City', 'College of Management', 'Bachelor of Science in Hospitality Management', 'Eunice Tricxie Paulino', '09977280618', 'eues.paulino.ui@phinmaed.com', 'Daniel John Valdez', 'Manager', 'Diversion 21', '09784120502', 'valdez.dvs21@gmail.com'),
(12, 'Jale Danielle', 'Dian', 'Jacques', '21', 'Female', '04-2122-064910', 'UI-BT1-BSTM4-3', '09509435764', 'jale.jacques.ui@phinmaed.com\r\n', 'Lapaz, Iloilo City', 'College of Management', 'Bachelor of Science in Tourism Management', 'Hazel Mae Luna', '09686548598', 'hala.luna.ui@phinmaed.com', 'Rose Guillermo', 'Airport Manager', 'Iloilo International Airport', '09508420562', 'guillermo.iia@gmail.com'),
(13, 'Ana Liza', 'Verde', 'Smith', '22', 'Female', '04-2122-039530', 'UI-BA1-BSTM4-2', '09530329539', 'analiza.smith.ui@phinmaed.com', 'San Miguel, Iloilo', 'College of Management', 'Bachelor of Science in Hospitality Management', 'Eunice Tricxie Paulino', '09977280618', 'eues.paulino.ui@phinmaed.com', 'Rose Guillermo', 'Airport Manager', 'Iloilo International Airport', '09508420562', 'guillermo.iia@gmail.com'),
(14, 'Kyla Abegail', 'Flores', 'Zamora', '22', 'Female', '04-2122-046792', 'UI-FA1-BSHM4-1', '09784023954', 'kyvi.zamora.ui@phinmaed.com', 'Lapaz, Iloilo City', 'College of Management', 'Bachelor of Science in Hospitality Management', 'Eunice Tricxie Paulino', '09977280618', 'eues.paulino.ui@phinmaed.com', 'Cathy Garcia', 'Manager', 'Richmonde Hotel', '09784290452', 'garcia.richmonde@gmail.com'),
(15, 'Hanz Mikael', 'Morgan', 'Legarda', '21', 'Male', '04-2122-045935', 'UI-BT1-BSTM4-2', '09784520336', 'haav.legarda.ui@phinmaed.com', 'Lapuz, Iloilo City', 'College of Management', 'Bachelor of Science in Tourism Management', 'Hazel Mae Luna', '09686548598', 'hala.luna.ui@phinmaed.com', 'Aliyah dela Cruz', 'Supervisor', 'Iloilo International Airport', '09509921672', 'dlcruz.iia@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `give_remarks`
--

CREATE TABLE `give_remarks` (
  `id` int(255) NOT NULL,
  `sc_id` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `mname` varchar(255) NOT NULL,
  `remarks` text NOT NULL,
  `view` varchar(255) NOT NULL,
  `company` varchar(255) NOT NULL,
  `e_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `sc_id` varchar(255) NOT NULL,
  `courseCode` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `name`, `sc_id`, `courseCode`, `email`, `password`) VALUES
(4, 'Ana Liza Smith', '04-2122-039530', 'BSTM', 'analiza.smith.ui@phinmaed.com', 'Anana21*'),
(5, 'James Mathew Santos', '04-1819-043942', 'BSTM', 'jama.santos.ui@phinmaed.com', 'James22*'),
(6, 'David Emannuel Chua', '04-2122-037802', 'BSHM', 'dasa.chua.ui@phinmaed.com', 'David@123'),
(7, 'Jale Danielle Jacques', '04-2122-064910', 'BSTM', 'jale.jacques.ui@phinmaed.com', 'Jacques@22'),
(9, 'Marc Joseph Ferero', '04-2122-035183', 'BSTM', 'marc.ferero.ui@phinmaed.com', 'Ferero@21'),
(10, 'Louis Miguel Divinagracia', '04-2122-039485', 'BSHM', 'louis.divinagracia@phinmaed.com', 'Divinagracia@22'),
(11, 'Kyla Abegail Zamora', '04-2122-046792', 'BSHM', 'kyvi.zamora.ui@phinmaed.com', 'Zamora@22*'),
(12, 'Hanz Mikael Legarda', '04-2122-045935', 'BSTM', 'haav.legarda.ui@phinmaed.com', 'Legarda@22');

-- --------------------------------------------------------

--
-- Table structure for table `reg_employer`
--

CREATE TABLE `reg_employer` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `cp_id` varchar(255) NOT NULL,
  `company` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reg_employer`
--

INSERT INTO `reg_employer` (`id`, `name`, `cp_id`, `company`, `email`, `password`) VALUES
(1, 'Cathy Garcia', 'RH2023', 'Richmonde Hotel', 'garcia.richmonde@gmail.com', 'Garcia@48');

-- --------------------------------------------------------

--
-- Table structure for table `student_logs`
--

CREATE TABLE `student_logs` (
  `id` int(11) NOT NULL,
  `sc_id` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `action` enum('IN','OUT') DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  `rendered_hours` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_logs`
--

INSERT INTO `student_logs` (`id`, `sc_id`, `timestamp`, `action`, `status`, `rendered_hours`) VALUES
(112, '04-2122-037802', '2024-03-22 23:42:14', 'IN', 'PENDING', NULL),
(117, '04-2122-064910', '2024-03-22 23:42:14', 'IN', 'PENDING', NULL),
(119, '04-2122-039530', '2024-03-22 23:42:14', 'IN', 'PENDING', NULL),
(169, '04-2122-039485', '2024-03-22 23:42:14', '', 'RESET', NULL),
(170, '04-2122-039485', '2024-03-22 23:42:14', 'IN', 'PENDING', NULL),
(215, '04-1819-043942', '2024-03-22 23:42:14', 'IN', 'PENDING', NULL),
(217, '04-2122-064910', '2024-03-22 23:42:14', '', 'RESET', NULL),
(218, '04-2122-064910', '2024-03-22 23:42:14', 'IN', 'PENDING', NULL),
(221, '04-2122-039530', '2024-03-22 23:42:14', 'IN', 'PENDING', NULL),
(222, '04-2122-037802', '2024-03-22 23:42:14', 'OUT', 'COMPLETED', NULL),
(230, '04-1819-043942', '2024-03-23 08:30:32', 'OUT', 'COMPLETED', NULL),
(231, '04-2122-046792', '2024-03-23 08:31:16', '', 'RESET', NULL),
(232, '04-2122-046792', '2024-03-23 08:31:35', 'IN', 'PENDING', NULL),
(233, '04-2122-046792', '2024-03-23 08:32:17', '', 'RESET', NULL),
(235, '04-2122-039530', '2024-03-23 08:54:49', 'OUT', 'COMPLETED', NULL),
(236, '04-2122-045935', '2024-03-23 09:34:02', '', 'RESET', NULL),
(237, '04-2122-045935', '2024-03-23 09:34:02', 'IN', 'PENDING', NULL),
(238, '04-2122-045935', '2024-03-23 09:34:08', '', 'RESET', NULL),
(239, '04-2122-045935', '2024-03-23 09:35:29', '', 'RESET', NULL),
(240, '04-2122-045935', '2024-03-23 09:35:50', '', 'RESET', NULL),
(241, '04-2122-045935', '2024-04-01 15:28:22', '', 'RESET', NULL),
(242, '04-2122-045935', '2024-04-01 15:28:22', 'IN', 'PENDING', NULL),
(243, '04-2122-037802', '2024-04-01 17:56:42', '', 'RESET', NULL),
(244, '04-2122-037802', '2024-04-01 17:56:42', 'IN', 'PENDING', NULL),
(246, '04-2122-045935', '2024-04-01 18:19:22', 'IN', 'PENDING', NULL),
(247, '04-2122-045935', '2024-04-01 18:21:19', '', 'RESET', NULL),
(248, '04-2122-046792', '2024-04-01 18:23:15', '', 'RESET', NULL),
(249, '04-2122-046792', '2024-04-01 18:23:15', 'IN', 'PENDING', NULL),
(250, '04-2122-046792', '2024-04-01 18:23:28', '', 'RESET', NULL),
(251, '04-2122-046792', '2024-04-01 18:24:54', 'OUT', 'COMPLETED', NULL),
(252, '04-2122-045935', '2024-04-02 06:26:02', 'OUT', 'COMPLETED', NULL),
(253, '04-2122-037802', '2024-04-02 06:36:00', '', 'RESET', NULL),
(254, '04-2122-039530', '2024-04-02 06:42:09', '', 'RESET', NULL),
(255, '04-2122-039530', '2024-04-02 06:42:09', 'IN', 'PENDING', NULL),
(256, '04-2122-039485', '2024-04-02 06:47:56', '', 'RESET', NULL),
(257, '04-2122-039485', '2024-04-02 06:47:56', 'IN', 'PENDING', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `taskadd`
--

CREATE TABLE `taskadd` (
  `id` int(255) NOT NULL,
  `task_code` varchar(255) NOT NULL,
  `task_name` varchar(255) NOT NULL,
  `deadline` date NOT NULL,
  `task_action` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `taskadd`
--

INSERT INTO `taskadd` (`id`, `task_code`, `task_name`, `deadline`, `task_action`) VALUES
(1, '156', 'Report', '2024-04-05', 'Pending'),
(3, '310', 'Bio-data', '2024-04-15', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `mname` varchar(255) NOT NULL,
  `sc_id` varchar(255) NOT NULL,
  `section` varchar(255) NOT NULL,
  `course` varchar(255) NOT NULL,
  `task_code` varchar(255) NOT NULL,
  `task_name` varchar(255) NOT NULL,
  `files` varchar(255) NOT NULL,
  `status` varchar(50) DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `lname`, `fname`, `mname`, `sc_id`, `section`, `course`, `task_code`, `task_name`, `files`, `status`) VALUES
(18, 'Chua', 'David Emmanuel', 'Santiago', '04-2122-037802', 'UI-FA1-BSHM4-1', 'Bachelor of Science in Hospitality Management', '156', 'Report', 'blah.docx', 'Approved'),
(19, 'Zamora', 'Kyla Abegail', 'Flores', '04-2122-046792', 'UI-FA1-BSHM4-1', 'Bachelor of Science in Hospitality Management', '156', 'Report', 'Doc1.pdf', 'Pending'),
(20, 'Legarda', 'Hanz Mikael', 'Morgan', '04-2122-045935', 'UI-BT1-BSTM4-2', 'Bachelor of Science in Tourism Management', '310', 'Bio-data', 'LUNA-Organization_s Members Data.pdf', 'Pending'),
(21, 'Divinagracia', 'Louis Miguel', 'Gan', '04-2122-039485', 'UI-FA1-BSHM4-2', 'Bachelor of Science in Hospitality Management', '310', 'Bio-data', 'FIrst page notes.pdf', 'Pending');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `create_profile`
--
ALTER TABLE `create_profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `give_remarks`
--
ALTER TABLE `give_remarks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_sc_id` (`sc_id`);

--
-- Indexes for table `reg_employer`
--
ALTER TABLE `reg_employer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_logs`
--
ALTER TABLE `student_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sc_id` (`sc_id`);

--
-- Indexes for table `taskadd`
--
ALTER TABLE `taskadd`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `create_profile`
--
ALTER TABLE `create_profile`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `give_remarks`
--
ALTER TABLE `give_remarks`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `reg_employer`
--
ALTER TABLE `reg_employer`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `student_logs`
--
ALTER TABLE `student_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=258;

--
-- AUTO_INCREMENT for table `taskadd`
--
ALTER TABLE `taskadd`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `student_logs`
--
ALTER TABLE `student_logs`
  ADD CONSTRAINT `student_logs_ibfk_1` FOREIGN KEY (`sc_id`) REFERENCES `registration` (`sc_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
