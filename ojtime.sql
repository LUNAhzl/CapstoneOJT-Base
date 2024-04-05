-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 20, 2024 at 02:19 PM
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
  `sc_id` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`id`, `name`, `sc_id`, `email`, `password`) VALUES
(1, 'Hazel Mae Luna', 'CITE01-2023', 'hazel156@gmail.com', 'Hazel@156'),
(2, 'Eunice Tricxie Paulino', 'COM02-2023', 'eunice2002@gmail.com', 'Eunize@2002'),
(3, 'Ma. Quennie Lozada', 'COE03-2023', 'quennie_lozada@gmail.com', 'Quennie@2003');

-- --------------------------------------------------------

--
-- Table structure for table `create_profile`
--

CREATE TABLE `create_profile` (
  `id` int(255) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `mname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `age` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `school_id` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `fb` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `dept` varchar(255) NOT NULL,
  `course` varchar(255) NOT NULL,
  `major` varchar(255) NOT NULL,
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

INSERT INTO `create_profile` (`id`, `picture`, `fname`, `mname`, `lname`, `age`, `gender`, `school_id`, `contact`, `fb`, `address`, `dept`, `course`, `major`, `coordinator`, `coor_contact`, `coor_email`, `e_name`, `position`, `company`, `e_contact`, `e_email`) VALUES
(1, 'e1-modified', 'Eunice Tricxie', 'Espedes', 'Paulino', '21', 'Female', '04-2122-033804', '09977280618', 'https://www.facebook.com/eunicetricxie.paulino.26', 'Cabatuan, Iloilo', 'College of Information Technology Education', 'Bachelor of Science in Information Technology', 'Major in Web Development', 'Ma. Quennie Lozada', '09070078225', 'maquennie_lozada@gmail.com', 'Jose Arroyo', 'IT Consultant Manager', 'Richmonde Hotel Iloilo', '09973892045', 'richmonde.it.consult@gmail.com'),
(2, '2-modified', 'Hazel Mae', 'Lavilla', 'Luna', '21', 'Female', '04-2122-032560', '09103624579', 'https://www.facebook.com/jozel.km.21/', 'Pavia, Iloilo', 'College of Information Technology Education', 'Bachelor of Science in Information Technology', 'Major in Web Development', 'Eunice Tricxie Paulino', '09977280618', 'eunice.paulino@gmail.com', 'Kristina San Jose ', 'IT Specialist', 'Injap Tower Hotel', '09956542656', 'injap.it.repot@gmail.com'),
(3, 'm1-modified.png', 'Ma. Quennie', 'Alipat', 'Lozada', '20', 'Female', '04-2122-034075', '09070078225', 'https://www.facebook.com/maquennie.lozada.5', 'Oton, Iloilo', 'College of Information Technology Education', 'Bachelor of Science in Information Technology', 'Major in Web Development', 'Hazel Mae Luna', '09103624579', 'hazelmae.luna0506@gmail.com', 'Trishia Navarro', 'Web Designer', 'Grand Xing Imperial Hotel', '09736902517', 'grandxing.webdesgn@gmail.com'),
(4, 'admin.png', 'Ana Liza', 'Forteza', 'Smith', '21', 'Female', '04-2122-039530', '09103358940', 'https://www.facebook.com/analiza.babe21', 'Lapaz, Iloilo', 'College of Allied Health Sciences', 'Bachelor of Science in Nursing', '...', 'Eunice Tricxie Paulino', '09977280618', 'eunice.paulino@gmail.com', 'Dra. Feliz Grace Cruz', 'Head Chief of Pediatric Ward', 'Iloilo Mission Hospital', '09975543470', 'drafeliz.pedia@gmail.com'),
(5, 'c9db074b35077728367ab2482c30c6c1.jpg', 'Marie', 'Rosales', 'Reyes', '21', 'Female', '04-1819-049240', '09758453530', 'https://www.facebook.com/marie.reyes', 'Molo, Iloilo', 'College of Management', 'Bachelor of Science in Hospitality Management', '...', 'Eunice Tricxie Paulino', '09977280618', 'eunice.paulino@gmail.com', 'William Hanz Villanueva', 'Manager', 'Richmonde Hotel Iloilo', '09942829015', 'rhi.mngr_villanueva@gmail.com'),
(6, '1688406212457.png', 'James Mathew', 'Marasigan', 'Santos', '22', 'Male', '04-1819-043942', '09242350136', 'https://www.facebook.com/mathew22', 'Lapaz, Iloilo', 'College of Education', 'Bachelor of Secondary Education', 'Major in General Subjects', 'Eunice Tricxie Paulino', '09977280618', 'eunice.paulino@gmail.com', 'Vivien Rose Lumagday', 'Head of Science Department', 'Iloilo City National High School', '09905389021', 'mamvivien.icnhs@gmail.com'),
(7, '1688406440392.png', 'David Emmanuel', 'Santiago', 'Chua', '21', 'Male', '04-2122-037802', '09678420961', 'https://www.facebook.com/davidchua', 'Mandurriao, Iloilo', 'College of Engineering', 'Bachelor of Science in Civil Engineering', '...', 'Ma. Quennie Lozada', '09070078225', 'maquennie.lozada@gmail.com', 'Cathy Garcia', 'Project Engineer', 'SCR Construction', '09784290452', 'garcia.projengr@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `sc_id` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `name`, `sc_id`, `email`, `password`) VALUES
(1, 'Ma. Quennie Lozada', '04-2122-034075', 'maquennie_lozada@gmail.com', 'Quennie101*'),
(2, 'Hazel Mae Luna', '04-2122-032560', 'hazelmae.luna0506@gmail.com', 'Hazel21*'),
(3, 'Eunice Tricxie Paulino', '04-2122-033804', 'eunice.paulino@gmail.com', 'Eunice123*'),
(4, 'Ana Liza Smith', '04-2122-039530', 'analiza21@gmail.com', 'Anana21*'),
(5, 'James Mathew Santos', '04-1819-043942', 'jama.santos.ui@phinmaed.com', 'James22*'),
(6, 'David Emannuel Chua', '04-2122-037802', 'dasa.chua.ui@phinmaed.com', 'David@123');

-- --------------------------------------------------------

--
-- Table structure for table `taskadd`
--

CREATE TABLE `taskadd` (
  `id` int(255) NOT NULL,
  `upload` varchar(255) NOT NULL,
  `task_name` varchar(255) NOT NULL,
  `task_description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int(255) NOT NULL,
  `school_id` varchar(255) NOT NULL,
  `dept` varchar(255) NOT NULL,
  `task_code` varchar(255) NOT NULL,
  `task_name` varchar(255) NOT NULL,
  `files` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `school_id`, `dept`, `task_code`, `task_name`, `files`, `status`) VALUES
(1, '04-2122-033804', 'College of Information Technology Education', '345', 'mhghj', 'e1-modified.png', ''),
(2, '04-2122-032560', 'College of Information Technology Education', '288', 'barbie', '2-modified.png', ''),
(3, '04-2122-034075', 'College of Information Technology Education', '067', 'asdd', '382.docx', ''),
(4, '04-2122-032560', 'College of Information Technology Education', '050', 'ssssss', '314 Reviewer PRELIM.docx', ''),
(5, '04-1819-049240', 'College of Management', '157', 'gdgdgd', 'c9db074b35077728367ab2482c30c6c1.jpg', ''),
(6, '04-2122-037802', 'College of Engineering', '232', 'hazel', 'IMG_5038.jpg', ''),
(7, '04-2122-032560', 'College of Information Technology Education', '101', 'Certificate', 'COC1 Certificate.pdf', ''),
(8, '04-1819-043942', 'College of Education', '202', 'Mechanics', '8_TECHNO-QUIZ-MECHANICS.pdf', ''),
(9, '04-2122-032560', 'College of Information Technology Education', '302', 'Reviewer', '302-Cybersecurity.docx', '');

-- --------------------------------------------------------

--
-- Table structure for table `time_checked`
--

CREATE TABLE `time_checked` (
  `id` int(255) NOT NULL,
  `school_id` varchar(255) NOT NULL,
  `dept` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `time` time(2) NOT NULL,
  `log` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `time_checked`
--

INSERT INTO `time_checked` (`id`, `school_id`, `dept`, `date`, `time`, `log`) VALUES
(1, '04-2122-032560', 'College of Information Technology Education', '2024-01-30', '07:30:06.00', 'IN'),
(2, '04-2122-032560', 'College of Information Technology Education', '2024-01-30', '19:30:11.00', 'OUT'),
(3, '04-1819-043942', 'College of Education', '2024-01-29', '09:43:00.00', 'IN'),
(4, '04-1819-043942', 'College of Education', '2024-01-29', '20:35:00.00', 'OUT'),
(5, '04-1819-043942', 'College of Education', '2024-01-30', '07:38:00.00', 'IN'),
(6, '04-2122-039530', 'College of Allied Health Sciences', '2024-01-19', '06:31:00.00', 'IN'),
(7, '04-2122-039530', 'College of Allied Health Sciences', '2024-01-19', '21:45:00.00', 'OUT'),
(8, '04-1819-043942', 'College of Education', '2024-01-30', '22:31:00.00', 'OUT');

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
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `time_checked`
--
ALTER TABLE `time_checked`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `create_profile`
--
ALTER TABLE `create_profile`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `taskadd`
--
ALTER TABLE `taskadd`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `time_checked`
--
ALTER TABLE `time_checked`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
