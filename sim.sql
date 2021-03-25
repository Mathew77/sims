-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 25, 2021 at 04:21 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sim`
--

-- --------------------------------------------------------

--
-- Table structure for table `db_role`
--

CREATE TABLE `db_role` (
  `id` int(4) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `db_role_privileges`
--

CREATE TABLE `db_role_privileges` (
  `id` int(4) NOT NULL,
  `role_id` int(4) NOT NULL,
  `privileges` varchar(255) NOT NULL,
  `modules` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `db_token`
--

CREATE TABLE `db_token` (
  `id` int(11) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `jwt_token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `db_token`
--

INSERT INTO `db_token` (`id`, `user_id`, `jwt_token`) VALUES
(1, 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpYXQiOjE1OTM1OTcxMjIsImlzcyI6IlBIUF9NSU5JX1JFU1RfQVBJIiwiZXhwIjoxNTkzNjMxNjIwLCJ1c2VyX2lkIjoiMSJ9.p2BKoS9YE_2YV77KTpfALG7CVuwDkueLakVD3gWfMgY'),
(2, 2, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpYXQiOjE1OTM1OTgyNDQsImlzcyI6IlBIUF9NSU5JX1JFU1RfQVBJIiwiZXhwIjoxNTk0MjAzMDQ0LCJ1c2VyX2lkIjoiMiJ9.zlR7bK3smflGHaRiLULU6jmy5Bt19p1Gqg7dZnupRKc'),
(3, 6, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpYXQiOjE2MTYyMzMyNzUsImlzcyI6IlBIUF9NSU5JX1JFU1RfQVBJIiwiZXhwIjoxNjE2ODM4MDc1LCJ1c2VyX2lkIjoiNiJ9.Tkml018TxmOyNV2ETP3Ws-rDykDsDitXBKcNKUz8jhE'),
(4, 7, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpYXQiOjE2MTYyMzM2MzYsImlzcyI6IlBIUF9NSU5JX1JFU1RfQVBJIiwiZXhwIjoxNjE2ODM4NDM2LCJ1c2VyX2lkIjoiNyJ9.Q03rLcSaBWkGn2BcBzI8uASw8aZUV6XzJgO5e0N5GQI');

-- --------------------------------------------------------

--
-- Table structure for table `db_users`
--

CREATE TABLE `db_users` (
  `id` int(11) NOT NULL,
  `firstName` text NOT NULL,
  `lastName` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `db_users`
--

INSERT INTO `db_users` (`id`, `firstName`, `lastName`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Stephen', 'Ilori', 'stephenilori458@gmail.com', '$2y$10$mM/YuCSVgazrjXO75OR1.u83c7/9m9RFC6W8/AsaNbD4.0l/iodCG', '2020-07-01 09:52:02', '2020-07-01 09:52:02'),
(2, 'Stephen', 'Ilori', 'stephenilori658@gmail.com', '$2y$10$LDX7K7iU7X3FRZvAUVESFOSNEpU8zcWganhsBWx7qN6vZlhFz506S', '2020-07-01 10:10:44', '2020-07-01 10:10:44'),
(3, 'mathew', 'degbite', 'mathewadegbite@gmail.com', '$2y$10$K1SzREqDopSIaFs4BpGQ6OgDTagu2427Nar/SPkncw5aqVyWWWLe6', '2021-03-20 09:16:41', '2021-03-20 09:16:41'),
(4, 'mathew', 'degbite', 'mathewadegbite2@gmail.com', '$2y$10$Olc0r2ZZk3Sfl/DiSZvl/e/h4epzVdq5giDaIUQcL0rXx40EsKUs2', '2021-03-20 09:20:00', '2021-03-20 09:20:00'),
(5, 'mathew', 'degbite', 'mathewadegbite3@gmail.com', '$2y$10$QNyYJRNeAz46i1/1rn9pPuOfiX7BknlD5M7AKAfpk73Oy/ZJ8PkeG', '2021-03-20 09:28:16', '2021-03-20 09:28:16'),
(6, 'mathew', 'degbite', 'mathewadegbite4@gmail.com', '$2y$10$ujr9YAPAzdxMVXzg44qjfOtf9eyivTN59MaFVh9BeiFNHNkWXSBuq', '2021-03-20 09:41:15', '2021-03-20 09:41:15'),
(7, 'mathew', 'degbite', 'mathewadegbite5@gmail.com', '$2y$10$LjhjIXX3.9b3Jx/tpBBBt.tjJJW/FNPHJo2.DwrvnF3yiKUtAMwgi', '2021-03-20 09:47:16', '2021-03-20 09:47:16');

-- --------------------------------------------------------

--
-- Table structure for table `db_user_privileges`
--

CREATE TABLE `db_user_privileges` (
  `id` int(4) NOT NULL,
  `role_id` int(11) NOT NULL,
  `parent_org_id` int(11) NOT NULL,
  `org_id` int(255) NOT NULL,
  `modules` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `db_role`
--
ALTER TABLE `db_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `db_role_privileges`
--
ALTER TABLE `db_role_privileges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `db_token`
--
ALTER TABLE `db_token`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `db_users`
--
ALTER TABLE `db_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `db_user_privileges`
--
ALTER TABLE `db_user_privileges`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `db_role`
--
ALTER TABLE `db_role`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `db_role_privileges`
--
ALTER TABLE `db_role_privileges`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `db_token`
--
ALTER TABLE `db_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `db_users`
--
ALTER TABLE `db_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `db_user_privileges`
--
ALTER TABLE `db_user_privileges`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
