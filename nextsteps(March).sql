-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 24, 2025 at 01:00 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nextsteps`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(255) NOT NULL,
  `adminName` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `adminName`, `password`) VALUES
(1, 'newAdmin', '$2y$10$gNlXu5bJr/E9G6ntJHh/peEqkTwa/ElCO9SprsmLbEJQWlXjrCZKC');

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `id` int(255) NOT NULL,
  `uniID` int(255) NOT NULL,
  `userEmail` varchar(255) NOT NULL,
  `createdOn` timestamp NOT NULL DEFAULT current_timestamp(),
  `appStatus` varchar(255) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`id`, `uniID`, `userEmail`, `createdOn`, `appStatus`) VALUES
(1, 2, 'abdullahalmasrur8@gmail.com', '2024-07-02 15:48:18', 'pending'),
(2, 4, 'abdullahalmasrur8@gmail.com', '2024-07-02 15:48:18', 'pending'),
(3, 4, 'abdullahalmasrur8@gmail.com', '2024-07-02 15:48:18', 'Declined'),
(4, 12, 'abdullahalmasrur8@gmail.com', '2024-07-02 15:49:20', 'pending'),
(5, 2, 'abdullahalmasrur8@gmail.com', '2024-07-02 15:57:57', 'Success'),
(6, 3, 'abdullahalmasrur8@gmail.com', '2024-07-02 15:58:00', 'pending'),
(7, 9, 'abdullahalmasrur8@gmail.com', '2024-07-02 15:58:04', 'pending'),
(8, 9, 'abdullahalmasrur8@gmail.com', '2024-07-02 15:58:13', 'pending'),
(9, 2, 'abdullahalmasrur8@gmail.com', '2024-07-02 15:59:51', 'Success'),
(10, 282, 'abdullahalmasrur8@gmail.com', '2024-07-02 16:51:49', 'Pending'),
(11, 2, 'abdullahalmasrur8@gmail.com', '2024-07-02 16:51:54', 'Pending'),
(12, 15, 'abdullahalmasrur8@gmail.com', '2024-07-02 16:53:04', 'Pending'),
(13, 5, 'abdullahalmasrur8@gmail.com', '2024-07-02 16:54:32', 'Pending'),
(14, 5, 'abdullahalmasrur8@gmail.com', '2024-07-02 16:56:29', 'Pending'),
(15, 2, 'abdullahalmasrur8@gmail.com', '2024-07-02 16:56:32', 'Pending'),
(16, 70, 'abdullahalmasrur8@gmail.com', '2024-07-08 10:21:50', 'Pending'),
(17, 2, 'abdullahalmasrur8@gmail.com', '2024-07-13 15:49:36', 'Pending'),
(18, 2, 'abdullahalmasrur8@gmail.com', '2024-12-21 13:57:59', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `auth`
--

CREATE TABLE `auth` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phoneNumber` varchar(255) NOT NULL,
  `verifyStatus` int(11) NOT NULL,
  `verifyToken` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `auth`
--

INSERT INTO `auth` (`id`, `email`, `password`, `phoneNumber`, `verifyStatus`, `verifyToken`) VALUES
(3, 'abdullahalmasrur8@gmail.com', '123!Abd', '01721090782', 1, '91c3f073e8a12c0254d42d7bbd20abc3'),
(6, 'masrurabdullah43@gmail.com', '123Abd', '01747641363', 1, '60487cd6ddb825b016c536786df3ed6d');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(255) NOT NULL,
  `universityId` int(255) NOT NULL,
  `courseName` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `universityId`, `courseName`, `url`) VALUES
(1, 1, 'Computer Science', 'https://harvard.edu/cs'),
(2, 2, 'Data Science', 'https://ox.ac.uk/ds'),
(3, 3, 'Software Engineering', 'https://utoronto.ca/se'),
(4, 4, 'Cyber Security', 'https://unimelb.edu.au/cyber'),
(5, 5, 'Artificial Intelligence', 'https://tum.de/ai');

-- --------------------------------------------------------

--
-- Table structure for table `course_country`
--

CREATE TABLE `course_country` (
  `id` int(11) NOT NULL,
  `countryName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course_country`
--

INSERT INTO `course_country` (`id`, `countryName`) VALUES
(1, 'United States'),
(2, 'United Kingdom'),
(3, 'Canada'),
(4, 'Australia'),
(5, 'Germany');

-- --------------------------------------------------------

--
-- Table structure for table `course_university`
--

CREATE TABLE `course_university` (
  `id` int(255) NOT NULL,
  `countryId` int(255) NOT NULL,
  `universityName` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course_university`
--

INSERT INTO `course_university` (`id`, `countryId`, `universityName`, `location`) VALUES
(1, 1, 'Harvard University', 'Cambridge, MA, USA'),
(2, 2, 'University of Oxford', 'Oxford, England'),
(3, 3, 'University of Toronto', 'Toronto, Canada'),
(4, 4, 'University of Melbourne', 'Melbourne, Australia'),
(5, 5, 'Technical University of Munich', 'Munich, Germany');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(255) NOT NULL,
  `adminMsg` longtext NOT NULL,
  `userMsg` longtext NOT NULL,
  `appId` int(255) NOT NULL,
  `msgOn` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `adminMsg`, `userMsg`, `appId`, `msgOn`) VALUES
(1, 'Hello, Sir. How may I help you?', '', 18, '0000-00-00 00:00:00'),
(2, '', 'Fine. Need help.', 18, '0000-00-00 00:00:00'),
(3, 'Tell me how can I help you?', '', 18, '2024-12-22 15:39:07'),
(4, '', 'Need university. Life-changing advice is needed no matter what mate.', 18, '2024-12-22 16:00:40'),
(5, '<p>Sure. What university do you have in mind?</p>', '', 18, '2024-12-22 16:17:41'),
(6, '<p>Hello. How may I help you?</p>', '', 4, '2024-12-22 16:20:36'),
(7, '<p><i><strong>Can you see the messages?</strong></i></p>', '', 4, '2024-12-22 16:25:55'),
(8, '<p>&nbsp;</p><h2>Test</h2><h3>Test</h3><h4>Test</h4>', '', 4, '2024-12-22 16:27:09'),
(9, '<p>Any university in mind?</p>', '', 18, '2024-12-23 14:57:52'),
(10, '<p>Testing</p>', '', 18, '2024-12-27 17:14:07');

-- --------------------------------------------------------

--
-- Table structure for table `user_education`
--

CREATE TABLE `user_education` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `institution_name` varchar(255) NOT NULL,
  `study_country` varchar(100) NOT NULL,
  `cgpa` decimal(3,2) DEFAULT NULL CHECK (`cgpa` between 0 and 4.00),
  `qualification` enum('Diploma','Bachelor','Master','PhD') NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL CHECK (`end_date` > `start_date`),
  `language` varchar(50) NOT NULL,
  `edu_address` text NOT NULL,
  `mode_of_study` enum('Full-time','Part-time','Online') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_personal`
--

CREATE TABLE `user_personal` (
  `id` int(11) NOT NULL,
  `auth_id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `dob` date NOT NULL,
  `marital` enum('Single','Married','Divorced','Widowed') NOT NULL,
  `nation` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `postcode` varchar(20) NOT NULL,
  `passportnum` varchar(20) NOT NULL,
  `issuecountry` varchar(100) NOT NULL,
  `issuedate` date NOT NULL,
  `expirydate` date NOT NULL CHECK (`expirydate` > `issuedate`),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth`
--
ALTER TABLE `auth`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `universityId` (`universityId`);

--
-- Indexes for table `course_country`
--
ALTER TABLE `course_country`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_university`
--
ALTER TABLE `course_university`
  ADD PRIMARY KEY (`id`),
  ADD KEY `countryId` (`countryId`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_education`
--
ALTER TABLE `user_education`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user_personal`
--
ALTER TABLE `user_personal`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `auth_id` (`auth_id`),
  ADD UNIQUE KEY `passportnum` (`passportnum`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `auth`
--
ALTER TABLE `auth`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `course_country`
--
ALTER TABLE `course_country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `course_university`
--
ALTER TABLE `course_university`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user_education`
--
ALTER TABLE `user_education`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_personal`
--
ALTER TABLE `user_personal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `courses_ibfk_1` FOREIGN KEY (`universityId`) REFERENCES `course_university` (`id`);

--
-- Constraints for table `course_university`
--
ALTER TABLE `course_university`
  ADD CONSTRAINT `course_university_ibfk_1` FOREIGN KEY (`countryId`) REFERENCES `course_country` (`id`);

--
-- Constraints for table `user_education`
--
ALTER TABLE `user_education`
  ADD CONSTRAINT `user_education_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_personal` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_personal`
--
ALTER TABLE `user_personal`
  ADD CONSTRAINT `user_personal_ibfk_1` FOREIGN KEY (`auth_id`) REFERENCES `auth` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
