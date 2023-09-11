-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 11, 2023 at 02:15 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `malhub`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
                           `id` int(11) NOT NULL,
                           `name` varchar(500) NOT NULL,
                           `created_at` datetime NOT NULL,
                           `last_updated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
                             `id` int(11) NOT NULL,
                             `name` varchar(255) NOT NULL,
                             `phone` varchar(11) NOT NULL,
                             `email` varchar(50) NOT NULL,
                             `last_updated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `facilitators`
--

CREATE TABLE `facilitators` (
                                `id` int(11) NOT NULL,
                                `first_name` varchar(20) NOT NULL,
                                `last_name` varchar(20) NOT NULL,
                                `phone` varchar(11) NOT NULL,
                                `email` varchar(50) NOT NULL,
                                `password` varchar(100) NOT NULL,
                                `course_id` int(11) NOT NULL,
                                `session_id` int(11) NOT NULL,
                                `status` tinyint(1) NOT NULL DEFAULT 1,
                                `created_at` date NOT NULL,
                                `last_updated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
                            `id` int(11) NOT NULL,
                            `student_id` int(11) DEFAULT NULL,
                            `course_id` int(11) DEFAULT NULL,
                            `session_id` int(11) DEFAULT NULL,
                            `amount` decimal(10,2) NOT NULL,
                            `mode` enum('cash','transfer','pos') NOT NULL,
                            `workspace_id` int(11) DEFAULT NULL,
                            `customer_id` int(11) DEFAULT NULL,
                            `datetime` datetime NOT NULL,
                            `last_updated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
                            `id` int(11) NOT NULL,
                            `name` varchar(255) NOT NULL,
                            `start_date` date NOT NULL,
                            `end_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
                            `id` int(11) NOT NULL,
                            `first_name` varchar(20) NOT NULL,
                            `last_name` varchar(20) NOT NULL,
                            `phone` varchar(11) NOT NULL,
                            `email` varchar(50) NOT NULL,
                            `gender` enum('male','female') NOT NULL,
                            `address` varchar(225) NOT NULL,
                            `course_id` int(11) NOT NULL,
                            `session_id` int(11) NOT NULL,
                            `reg_date` date NOT NULL,
                            `last_updated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
                        `id` int(11) NOT NULL,
                        `name` varchar(255) NOT NULL,
                        `phone` varchar(11) NOT NULL,
                        `email` varchar(255) NOT NULL,
                        `password` varchar(100) NOT NULL,
                        `gender` enum('male','female') NOT NULL,
                        `created_at` date NOT NULL,
                        `last_updated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
                         `id` int(11) NOT NULL,
                         `name` varchar(255) NOT NULL,
                         `phone` varchar(11) NOT NULL,
                         `email` varchar(255) NOT NULL,
                         `password` varchar(100) NOT NULL,
                         `gender` enum('male','female') NOT NULL,
                         `created_at` date NOT NULL,
                         `last_updated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `phone`, `email`, `password`, `gender`, `created_at`, `last_updated`) VALUES
                                                                                                             (1, 'JAMIU OLANREWAJU', '08136437952', 'muhjamie@gmail.com', 'Pass1234', 'male', '2023-09-11', '2023-09-11 12:11:25'),
                                                                                                             (2, 'Sara', '08799882285', 'sara@gmail.com', 'Pass1234', 'female', '2023-09-11', '2023-09-11 12:13:22'),
                                                                                                             (3, 'Rachael', '08744444455', 'rachael@gmail.com', 'Pass1234', 'female', '2023-09-11', '2023-09-11 12:14:15');

-- --------------------------------------------------------

--
-- Table structure for table `workspaces`
--

CREATE TABLE `workspaces` (
                              `id` int(11) NOT NULL,
                              `name` varchar(255) NOT NULL,
                              `type` enum('public','private','group') NOT NULL,
                              `cost` decimal(10,2) NOT NULL,
                              `status` tinyint(1) NOT NULL DEFAULT 1,
                              `last_updated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
    ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
    ADD PRIMARY KEY (`id`);

--
-- Indexes for table `facilitators`
--
ALTER TABLE `facilitators`
    ADD PRIMARY KEY (`id`),
    ADD KEY `course_id` (`course_id`),
    ADD KEY `session_id` (`session_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
    ADD KEY `workspace_id` (`workspace_id`),
    ADD KEY `student_id` (`student_id`),
    ADD KEY `course_id` (`course_id`),
    ADD KEY `session_id` (`session_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
    ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
    ADD PRIMARY KEY (`id`),
    ADD KEY `course_id` (`course_id`),
    ADD KEY `session_id` (`session_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
    ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
    ADD PRIMARY KEY (`id`);

--
-- Indexes for table `workspaces`
--
ALTER TABLE `workspaces`
    ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `facilitators`
--
ALTER TABLE `facilitators`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sessions`
--
ALTER TABLE `sessions`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `workspaces`
--
ALTER TABLE `workspaces`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
