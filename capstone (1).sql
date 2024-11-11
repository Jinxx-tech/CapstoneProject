-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 11, 2024 at 10:50 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `capstone`
--

-- --------------------------------------------------------

--
-- Table structure for table `budgets`
--

CREATE TABLE `budgets` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `month` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` int(11) NOT NULL,
  `category` varchar(50) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `description` text NOT NULL,
  `expense_data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_history`
--

CREATE TABLE `password_history` (
  `history_id` int(99) NOT NULL,
  `user_id` int(99) NOT NULL,
  `old_password` varchar(255) NOT NULL,
  `changed_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `survey_responses`
--

CREATE TABLE `survey_responses` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `question1` varchar(255) DEFAULT NULL,
  `question2` varchar(255) DEFAULT NULL,
  `question3` varchar(255) DEFAULT NULL,
  `question4` varchar(255) DEFAULT NULL,
  `question5` varchar(255) DEFAULT NULL,
  `question6` varchar(255) DEFAULT NULL,
  `question7` varchar(255) DEFAULT NULL,
  `question8` varchar(255) DEFAULT NULL,
  `question9` varchar(255) DEFAULT NULL,
  `question10` varchar(255) DEFAULT NULL,
  `question11` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `survey_responses`
--

INSERT INTO `survey_responses` (`id`, `user_id`, `question1`, `question2`, `question3`, `question4`, `question5`, `question6`, `question7`, `question8`, `question9`, `question10`, `question11`) VALUES
(7, 3, 'Stressed - I want to hide', 'Myself', 'I own', 'Yes', 'I don\'t have debt', 'Rideshare (Moveit,Maxim,Angkas,etc.)', 'Bills', 'Music', 'Annual credit card fees', 'Emergency fund', 'Dining out'),
(8, 3, 'Stressed - I want to hide', 'Kids', 'I rent', 'Yes', 'Student Loans', 'Walk, Public Transit', 'Bills', 'Academic Subscription', 'Taxes or other fees', 'Investments', 'Gift'),
(9, 123, 'Stable - No fires to put out', 'Family', 'I own', 'Yes', 'Student Loans', 'Wheelchair', 'Internet', 'Online Course', 'Annual credit card fees', 'Emergency fund', 'Dining out'),
(10, 0, 'Stressed - I want to hide', 'Myself', 'I own', 'No, my house is paid off', 'Credit Card', 'Public Transit', 'Bills, Groceries, Internet, Personal Care, Clothing', 'Meal Delivery, Meal Delivery, Online Course', 'Medical expenses', 'Baby', 'Charity'),
(11, 0, 'Unsure - Not much direction', 'Myself, Partner, Family', 'I rent', 'Yes', 'Credit Card, Auto Loans', 'Car, Public Transit', 'Bills, Groceries, Internet', 'TV Streaming', 'Medical expenses, Auto registration', 'Emergency fund, Investments, Vacation', 'Dining out, Celebrations'),
(12, 0, 'Unsure - Not much direction', 'Myself, Partner, Family', 'I rent', 'Yes', 'Credit Card, Auto Loans', 'Car, Public Transit', 'Bills, Groceries, Internet', 'TV Streaming', 'Medical expenses, Auto registration', 'Emergency fund, Investments, Vacation', 'Dining out, Celebrations'),
(13, 0, 'Unsure - Not much direction', 'Partner', 'I own', 'Yes', 'Personal Loans', 'Wheelchair', 'Internet', 'TV Streaming', 'Annual credit card fees', 'New Home or Car', 'Dining out'),
(14, 0, 'Confident - Ready to shine!', 'Partner', 'I rent', 'Yes', 'Auto Loans', 'Rideshare (Moveit,Maxim,Angkas,etc.)', 'Groceries', 'Music', 'Medical expenses', 'Emergency fund', 'Gift'),
(15, 0, 'Confident - Ready to shine!', 'Partner', 'I rent', 'Yes', 'Auto Loans', 'Rideshare (Moveit,Maxim,Angkas,etc.)', 'Groceries', 'Music', 'Medical expenses', 'Emergency fund', 'Gift'),
(16, 0, 'Stressed - I want to hide', 'Myself', 'I rent', 'Yes', 'Student Loans', 'Public Transit, Rideshare (Moveit,Maxim,Angkas,etc.)', 'Groceries, Internet', 'TV Streaming, Meal Delivery', 'Annual credit card fees', 'Emergency fund', 'Dining out'),
(17, 0, 'Stressed - I want to hide', 'Myself', 'I rent', 'Yes', 'Student Loans', 'Public Transit, Rideshare (Moveit,Maxim,Angkas,etc.)', 'Groceries, Internet', 'TV Streaming, Meal Delivery', 'Annual credit card fees', 'Emergency fund', 'Dining out'),
(18, 0, 'Unsure - Not much direction', 'Partner', 'I own', 'Yes', 'Auto Loans', 'Bike', 'Internet', 'Academic Subscription', 'Medical expenses', 'Vacation', 'Dining out'),
(19, 0, 'Unsure - Not much direction', 'Partner', 'I own', 'Yes', 'Auto Loans', 'Bike', 'Internet', 'Academic Subscription', 'Medical expenses', 'Vacation', 'Dining out'),
(20, 0, 'Unsure - Not much direction', 'Partner', 'I own', 'Yes', 'Auto Loans', 'Bike', 'Internet', 'Academic Subscription', 'Medical expenses', 'Vacation', 'Dining out'),
(21, 0, 'Unsure - Not much direction', 'Partner', 'I own', 'Yes', 'Auto Loans', 'Bike', 'Internet', 'Academic Subscription', 'Medical expenses', 'Vacation', 'Dining out'),
(22, 0, 'Stable - No fires to put out', 'Pets', 'I rent', 'No, my house is paid off', 'Auto Loans', 'Public Transit', 'Personal Care', 'Online Course', 'Taxes or other fees', 'New Home or Car', 'Hobbies'),
(23, 0, 'Stressed - I want to hide', 'Myself', 'I own', 'No, my house is paid off', 'Auto Loans', 'Bike', 'Internet', 'Meal Delivery', 'Taxes or other fees', 'Emergency fund', 'Dining out'),
(24, 0, 'Stable - No fires to put out', 'Pets', 'I rent', 'Yes', '', '', '', '', '', '', ''),
(25, 0, 'Stressed - I want to hide', 'Myself', 'I own', 'Yes', '', '', '', '', '', '', ''),
(26, 0, 'Stressed - I want to hide', '', 'I own', 'Yes', '', '', '', '', '', '', ''),
(27, 0, 'Stressed - I want to hide', 'Pets', 'I own', 'Yes', '', '', '', '', '', '', ''),
(28, 0, 'Stressed - I want to hide', 'Myself, Partner, Kids', 'I own', 'Yes', '', '', '', '', '', '', ''),
(29, 0, 'Stressed - I want to hide', 'Myself, Pets', 'I own', 'Yes', '', '', '', '', '', '', ''),
(30, 0, 'Stressed - I want to hide', 'Partner', 'I own', 'Yes', '', '', '', '', '', '', ''),
(31, 0, 'Confident - Ready to shine!', 'Myself', 'I own', 'Yes', '', '', '', '', '', '', ''),
(32, 0, 'Stressed - I want to hide', 'Myself', 'I own', 'Yes', '', '', '', '', '', '', ''),
(33, 0, 'Stressed - I want to hide', '', 'I own', 'Yes', '', '', '', '', '', '', ''),
(34, 0, 'Stressed - I want to hide', '', 'I own', 'Yes', '', '', '', '', '', '', ''),
(35, 0, 'Stressed - I want to hide', 'Pets', 'I own', 'Yes', '', '', '', '', '', '', ''),
(36, 0, 'Stressed - I want to hide', '', 'I own', 'Yes', '', '', '', '', '', '', ''),
(37, 0, 'Stressed - I want to hide', 'Myself', 'I own', 'Yes', '', '', '', '', '', '', ''),
(38, 0, 'Stressed - I want to hide', 'Myself', 'I own', 'Yes', '', '', '', '', '', '', ''),
(39, 0, 'Stressed - I want to hide', '', 'I own', 'Yes', '', '', '', '', '', '', ''),
(40, 0, 'Stressed - I want to hide', 'Myself', 'I own', 'Yes', '', '', '', '', '', '', ''),
(41, 0, 'Stressed - I want to hide', 'Myself', 'I own', 'Yes', '', '', '', '', '', '', ''),
(42, 0, 'Stressed - I want to hide', 'Myself', 'I own', 'Yes', '', '', '', '', '', '', ''),
(43, 0, 'Stressed - I want to hide', 'Myself', 'I own', 'No, my house is paid off', 'Student Loans', 'Rideshare (Moveit,Maxim,Angkas,etc.)', 'Clothing', 'Online Course', 'Taxes or other fees', 'New Home or Car', 'Dining out'),
(44, 0, 'Stressed - I want to hide', 'Pets', 'I rent', 'Yes', 'Credit Card', 'Wheelchair', 'Internet', 'Fitness', 'Taxes or other fees', 'Vacation', 'Gift'),
(45, 123, 'Stressed - I want to hide', '', 'I own', 'Yes', '', '', '', '', '', '', ''),
(46, 123, 'Stressed - I want to hide', 'Pets', 'I rent', 'Yes', 'I don\'t have debt', 'Walk', 'Clothing', 'TV Streaming', 'Auto registration', 'Baby', 'Charity'),
(47, 123, 'Stressed - I want to hide', 'Myself', 'I own', 'Yes', 'Credit Card', 'Car', 'Bills', 'Music', 'Annual credit card fees', 'Emergency fund', 'Dining out'),
(48, 123, 'Stressed - I want to hide', 'Myself', 'I own', 'Yes', 'Credit Card', 'Car', 'Bills', 'Music', 'Annual credit card fees', 'Emergency fund', 'Dining out');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `category` varchar(255) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `date` date NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `category`, `amount`, `date`, `user_id`) VALUES
(1, 'Bills', 1900.00, '2024-10-30', 0),
(2, 'Bills', 1900.00, '2024-10-30', 0),
(3, 'Vacation', 5000.00, '2024-12-25', 123),
(4, 'Vacation', 5000.00, '2024-12-25', 123),
(5, 'Investment', 112.00, '2024-11-05', 0),
(6, 'Investment', 112.00, '2024-11-05', 0),
(7, 'Investment', 112.00, '2024-11-05', 0),
(8, 'Snacks', 5000.00, '0000-00-00', 0),
(9, 'allowance', 10000.00, '2024-12-01', 0),
(10, 'allowance', 10000.00, '2024-12-01', 0),
(11, 'allowance', 10000.00, '2024-11-20', 0),
(12, 'allowance', 10000.00, '2024-11-20', 0),
(13, 'Picnic', 2500.00, '2024-12-25', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `Firstname` varchar(255) DEFAULT NULL,
  `Lastname` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `Firstname`, `Lastname`) VALUES
(1, 'jess', '$2y$10$EivEZE.XJGMdRo9Qikb/YeQJw07qsTyscseDjrjizJzoljYlsGzLm', 'shinty@gmail.com', NULL, NULL),
(3, 'Abdul', '$2y$10$AUi48EoUcKe6.npUN5LtGO0gqe7Lvl.bnYHpyYHFtngIG4XldmrVO', 'ab@gmail.com', NULL, NULL),
(4, 'Jess', 'b7d972843d119ced2ee712e8de05b5e7', 'jv@gmail.com', 'Jess', 'Lariosa'),
(11, 'jess', 'b7d972843d119ced2ee712e8de05b5e7', 'jinxx@gmail.com', 'Jess', 'Lariosa'),
(12, 'Alii', '4d18affb8bf2f83c32ef0baa0ee0859e', 'alhkm@email.com', 'Al', 'Hakim'),
(13, 'Jb', 'd2f3cd27843789638753a03de81d7f1f', 'j@gmail.com', 'Jay', 'Balvin'),
(14, 'workplace', '8b353d5cc07e13577608711f4602fc', 'wp', 'work', 'place'),
(15, 'enen', 'e909f8ffbd5ec062e722a88d6e1fd54d', 'new@gmail', 'new', 'name'),
(16, 'Alii', '$2y$10$yTVUS1m/urGWliS5hIzOf.GD5lefjn1vndB7WXGjrYJAT28CGckQq', '', NULL, NULL),
(22, 'try', '58723627fcebc230ab0d53ddf5f16e34', 'trial', 'try', 'again'),
(34, 'jonny', '527bd5b5d689e2c32ae974c6229ff785', 'jdoe@gmail.com', 'John', 'Doe'),
(35, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `budgets`
--
ALTER TABLE `budgets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_history`
--
ALTER TABLE `password_history`
  ADD PRIMARY KEY (`history_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `survey_responses`
--
ALTER TABLE `survey_responses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `budgets`
--
ALTER TABLE `budgets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `password_history`
--
ALTER TABLE `password_history`
  MODIFY `history_id` int(99) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `survey_responses`
--
ALTER TABLE `survey_responses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `budgets`
--
ALTER TABLE `budgets`
  ADD CONSTRAINT `budgets_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `password_history`
--
ALTER TABLE `password_history`
  ADD CONSTRAINT `password_history_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
