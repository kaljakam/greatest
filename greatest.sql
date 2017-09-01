-- phpMyAdmin SQL Dump
-- version 4.4.15.9
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 01, 2017 at 04:12 PM
-- Server version: 5.6.35
-- PHP Version: 7.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `greatest`
--

-- --------------------------------------------------------

--
-- Table structure for table `group`
--

CREATE TABLE IF NOT EXISTS `group` (
  `id` int(11) NOT NULL,
  `group_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `group`
--

INSERT INTO `group` (`id`, `group_name`) VALUES
(1, 'SuperUser'),
(2, 'Admin'),
(3, 'Moderator'),
(4, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1504182894),
('m170831_111657_create_group_table', 1504183241),
('m170831_111658_create_user_table', 1504183241),
('m170831_114216_create_test_table', 1504183241),
('m170831_114503_create_test_question_table', 1504183241),
('m170831_114810_create_test_answer_table', 1504183241),
('m170831_115748_create_user_test_table', 1504183242),
('m170831_120442_create_user_test_answers_table', 1504183242),
('m170831_121848_create_group_access_table', 1504183242),
('m170901_125531_add_user_id_column_from_test_table', 1504270543),
('m170901_125703_add_user_id_column_to_test_table', 1504270652);

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE IF NOT EXISTS `test` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`id`, `title`, `description`, `created`, `updated`, `user_id`) VALUES
(1, 'Тест знаний HTML 1', 'Простой тест на знание html', NULL, NULL, NULL),
(2, 'Тест знаний HTML 2', 'Средний тест на знание html', NULL, NULL, NULL),
(3, 'Тест знаний HTML 1', 'Простой тест на знание html', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `test_answer`
--

CREATE TABLE IF NOT EXISTS `test_answer` (
  `id` int(11) NOT NULL,
  `test_question_id` int(11) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `text` text,
  `is_correct` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `test_question`
--

CREATE TABLE IF NOT EXISTS `test_question` (
  `id` int(11) NOT NULL,
  `test_id` int(11) DEFAULT NULL,
  `head` varchar(255) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `description` text,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL,
  `session_id` int(11) DEFAULT NULL,
  `group_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `surname` varchar(255) DEFAULT NULL,
  `patronymic` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `auth_key` varchar(255) DEFAULT NULL,
  `auth_token` varchar(255) DEFAULT NULL,
  `birth` date DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user_test`
--

CREATE TABLE IF NOT EXISTS `user_test` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `test_id` int(11) DEFAULT NULL,
  `test_date` date DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user_test_answers`
--

CREATE TABLE IF NOT EXISTS `user_test_answers` (
  `id` int(11) NOT NULL,
  `user_test_id` int(11) DEFAULT NULL,
  `test_question_id` int(11) DEFAULT NULL,
  `test_answer_id` int(11) DEFAULT NULL,
  `is_correct` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `group`
--
ALTER TABLE `group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx-test-user_id` (`user_id`);

--
-- Indexes for table `test_answer`
--
ALTER TABLE `test_answer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx-test_answer-test_question_id` (`test_question_id`);

--
-- Indexes for table `test_question`
--
ALTER TABLE `test_question`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx-test_question-test_id` (`test_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx-user-group_id` (`group_id`);

--
-- Indexes for table `user_test`
--
ALTER TABLE `user_test`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx-user_test-user_id` (`user_id`),
  ADD KEY `idx-user_test-test_id` (`test_id`);

--
-- Indexes for table `user_test_answers`
--
ALTER TABLE `user_test_answers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx-user_test_answers-user_test_id` (`user_test_id`),
  ADD KEY `idx-user_test_answers-test_question_id` (`test_question_id`),
  ADD KEY `idx-user_test_answers-test_answer_id` (`test_answer_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `group`
--
ALTER TABLE `group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `test_answer`
--
ALTER TABLE `test_answer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `test_question`
--
ALTER TABLE `test_question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user_test`
--
ALTER TABLE `user_test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user_test_answers`
--
ALTER TABLE `user_test_answers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `test`
--
ALTER TABLE `test`
  ADD CONSTRAINT `fk-test-user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `test_answer`
--
ALTER TABLE `test_answer`
  ADD CONSTRAINT `fk-test_answer-test_question_id` FOREIGN KEY (`test_question_id`) REFERENCES `test_question` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `test_question`
--
ALTER TABLE `test_question`
  ADD CONSTRAINT `fk-test_question-test_id` FOREIGN KEY (`test_id`) REFERENCES `test` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk-user-group_id` FOREIGN KEY (`group_id`) REFERENCES `group` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_test`
--
ALTER TABLE `user_test`
  ADD CONSTRAINT `fk-user_test-test_id` FOREIGN KEY (`test_id`) REFERENCES `test` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk-user_test-user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_test_answers`
--
ALTER TABLE `user_test_answers`
  ADD CONSTRAINT `fk-user_test_answers-test_answer_id` FOREIGN KEY (`test_answer_id`) REFERENCES `test_answer` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk-user_test_answers-test_question_id` FOREIGN KEY (`test_question_id`) REFERENCES `test_question` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk-user_test_answers-user_test_id` FOREIGN KEY (`user_test_id`) REFERENCES `user_test` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
