-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 22, 2014 at 11:28 AM
-- Server version: 5.5.24-log
-- PHP Version: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bhr`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE IF NOT EXISTS `answers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question_id` int(11) DEFAULT NULL,
  `answer` text COLLATE utf8_bin,
  `points` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `question_id_idx` (`question_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=69 ;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`id`, `question_id`, `answer`, `points`) VALUES
(62, 46, '1', 1),
(63, 46, 'Da', 10),
(65, 56, '30', 30),
(66, 56, '20', 20),
(68, 57, 'otg2', 2);

-- --------------------------------------------------------

--
-- Table structure for table `general_questions`
--

CREATE TABLE IF NOT EXISTS `general_questions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `has_parent` int(1) DEFAULT NULL,
  `question_type` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `points` int(11) DEFAULT NULL,
  `position_id` int(11) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `question` text COLLATE utf8_bin,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=58 ;

--
-- Dumping data for table `general_questions`
--

INSERT INTO `general_questions` (`id`, `has_parent`, `question_type`, `points`, `position_id`, `parent_id`, `question`) VALUES
(46, 0, 'closed', NULL, 8, NULL, ' asfdsasdasdas'),
(56, 0, 'closed', NULL, 0, NULL, 'vapros'),
(57, 0, 'closed', NULL, 8, NULL, 'VAPROSSSSSAT!');

-- --------------------------------------------------------

--
-- Table structure for table `positions`
--

CREATE TABLE IF NOT EXISTS `positions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `introduction` text COLLATE utf8_bin,
  `requirements` text COLLATE utf8_bin,
  `requirements_title` text COLLATE utf8_bin,
  `benefits` text COLLATE utf8_bin,
  `benefits_title` text COLLATE utf8_bin,
  `image_url` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `available` int(1) DEFAULT NULL,
  `duties_title` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `duties` text COLLATE utf8_bin,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=9 ;

--
-- Dumping data for table `positions`
--

INSERT INTO `positions` (`id`, `name`, `title`, `introduction`, `requirements`, `requirements_title`, `benefits`, `benefits_title`, `image_url`, `available`, `duties_title`, `duties`) VALUES
(6, 'Барман', 'Бла бла бла Бла бла бла Бла бла бла Бла бла бла Барман', 'Бла бла бла Бла бла бла Бла бла бла Бла бла бла Бла бла бла Бла бла бла Бла бла бла ', 'Няма ли да дойде тока?', 'Бла бла бла Бла бла бла Бла бла бла ', 'Бла бла бла Бла бла бла Бла бла бла Бла бла бла Бла бла бла Бла бла бла ', 'Бла бла бла Бла бла бла Бла бла бла ', 'bartender_44.jpg', 1, '', 'Бла бла бла Бла бла бла Бла бла бла Бла бла бла Бла бла бла '),
(7, 'Сервитьор', 'Сервитьор Сервитьор Сервитьор Сервитьор Сервитьор Сервитьор', 'СервитьорСервитьорСервитьорСервитьорСервитьор СервитьорСервитьор СервитьорСервитьорС ервитьорСервитьорСерв итьорСервитьорСервитьор СервитьорСервитьорСервитьорСервитьор', 'СервитьорСервитьорСервитьорСервитьорСервитьор', 'СервитьорСервитьорСервитьор', 'СервитьорСервитьорСервитьорСервитьорСервитьорСервитьор', 'СервитьорСервитьорСервитьор', 'wg_blurred_backgrounds_3.jpg', 0, 'СервитьорСервитьор', 'СервитьорСервитьорСервитьорСервитьорСервитьор'),
(8, 'pic test 1', 'Бла бла бла', '', '', '', '', '', 'wg_blurred_backgrounds_63.jpg', 1, '', 'Да прави ибахти коктейлите....:P');

-- --------------------------------------------------------

--
-- Table structure for table `text_content`
--

CREATE TABLE IF NOT EXISTS `text_content` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `meta_name` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `text` text COLLATE utf8_bin,
  `page_name` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=4 ;

--
-- Dumping data for table `text_content`
--

INSERT INTO `text_content` (`id`, `meta_name`, `text`, `page_name`) VALUES
(1, 'first_page_slogan', 'Продължи своята кариера с усмивка.', 'landing_page'),
(2, 'first_page_text', 'Lorem ipsum е един от най-често използваните в печатарството и графичния дизайн заготовъчни текстове [1], служещи да запълват със съдържание онези графични елементи на документ или графична презентация, които трябва да бъдат представени със собствен шрифт, типография, запълвайки ги със стандартен, неотвличащ вниманието (незначещ) текст.', 'landing_page'),
(3, 'first_page_go_button', 'Кандидатсвай сега', 'landing_page');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `name` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `surname` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `email_notification` int(11) DEFAULT NULL,
  `role` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `name`, `surname`, `password`, `email_notification`, `role`) VALUES
(1, 'emonidi', 'emonidi@gmail.com', 'Emilian', 'Gospodinov', 'NNEqJXo0GGMMzLZtXkgh4AodPuNbKnwwdtcuCBQIPJb6cbte2CU+igs4ih6d0hI1aQ+us3wIHimaj0lfKv56ww==', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `venues`
--

CREATE TABLE IF NOT EXISTS `venues` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `description` text COLLATE utf8_bin,
  `img_url` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=9 ;

--
-- Dumping data for table `venues`
--

INSERT INTO `venues` (`id`, `name`, `description`, `img_url`) VALUES
(4, 'Blender Club', '', 'blender.jpg'),
(5, 'Party Center 4km', '', '4lm.jpg'),
(7, 'Memento Cafee', '', '393970_10150454109871116_1391158676_n.jpg'),
(8, 'Test Venue', '', 'wg_blurred_backgrounds_12.jpg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
