-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 28, 2022 at 07:40 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e_exam`
--

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `is_active` int(11) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  `updated_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `name`, `is_active`, `created_at`, `updated_at`) VALUES
(4, 'CSIT', 0, '2021-11-21', '2021-11-21'),
(20, 'BBA', 0, '2022-03-23', '2022-03-23'),
(21, 'BBM', 0, '2022-03-23', '2022-03-23');

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

CREATE TABLE `exam` (
  `id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `exam_date` date NOT NULL,
  `full_marks` int(50) NOT NULL,
  `exam_duration` int(50) NOT NULL,
  `terms_n_conditions` text NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  `updated_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exam`
--

INSERT INTO `exam` (`id`, `course_id`, `name`, `exam_date`, `full_marks`, `exam_duration`, `terms_n_conditions`, `created_at`, `updated_at`) VALUES
(6, 4, 'csit first term', '2021-12-11', 60, 60, 'terms and condition', '2021-12-08', '2021-12-08'),
(16, 20, 'BBA first sem first term', '2022-03-28', 60, 60, 'terms and conditon', '2022-03-23', '2022-03-23'),
(17, 21, 'bbm first sem first term', '2022-03-29', 60, 60, 'terms and conditon', '2022-03-23', '2022-03-23');

-- --------------------------------------------------------

--
-- Table structure for table `exam_subject`
--

CREATE TABLE `exam_subject` (
  `id` int(11) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `subjects_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exam_subject`
--

INSERT INTO `exam_subject` (`id`, `exam_id`, `subjects_id`) VALUES
(1, 6, 1),
(2, 10, 16);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` varchar(25) NOT NULL,
  `address` varchar(25) NOT NULL,
  `city` varchar(20) NOT NULL,
  `pin` int(25) NOT NULL,
  `user_type` varchar(15) NOT NULL,
  `course` varchar(50) NOT NULL,
  `verify` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`, `email`, `mobile`, `address`, `city`, `pin`, `user_type`, `course`, `verify`) VALUES
(4, 'Rajesh', '12345', 'rsingh@gmail.com', '9818335585', 'kalanki', 'kathmandu', 4402, 'admin', '', 1),
(9, 'Suresh', '12345', 'sureshsingh@gmail.com', '9812122398', 'kathamndu ', 'pokhara', 4412, 'student', 'CSIT', 1),
(10, 'Nikesh', '12345', 'nikesh123@gmail.com', '1552258', 'kalanki', 'chitwan', 1112, 'student', 'CSIT', 1),
(33, 'Shyam', '12345', 'shyam@gmail.com', '98154566', 'kalanki', 'w;efl', 4401, 'student', 'CSIT', 1),
(34, 'Srijana', '12345', 'srijna@gmail.com', '9818335585', 'dhanusha', 'kathmandu', 4401, 'student', 'CSIT', 1),
(35, 'Santosh', '12345', 'santosh@gmail.com', '9813046973', 'kalanki', 'kathmandu', 4401, 'student', 'CSIT', 1);

-- --------------------------------------------------------

--
-- Table structure for table `question_list`
--

CREATE TABLE `question_list` (
  `id` int(11) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `subjects_id` int(11) NOT NULL,
  `ques` varchar(200) NOT NULL,
  `opt_a` varchar(50) NOT NULL,
  `opt_b` varchar(50) NOT NULL,
  `opt_c` varchar(50) NOT NULL,
  `opt_d` varchar(50) NOT NULL,
  `correct_opt` varchar(50) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  `updated_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `question_list`
--

INSERT INTO `question_list` (`id`, `exam_id`, `subjects_id`, `ques`, `opt_a`, `opt_b`, `opt_c`, `opt_d`, `correct_opt`, `created_at`, `updated_at`) VALUES
(7, 6, 1, '<p>C programming is&nbsp;</p>\r\n', 'web programming', 'object oriented', 'structured programming', 'both b and c', 'C', '2021-12-08', '2021-12-08'),
(8, 6, 1, '<p>Function declaration in C programming as</p>\r\n', 'function_name return_type(arg1,agg2..argn){};', 'return_type function_name(arg1,arg2){};', 'function_name(arg1,arg2);', 'function(arg1,arg2);', 'B', '2021-12-08', '2021-12-08'),
(9, 6, 1, '<p>In c programming &#39;int&#39; is&nbsp;</p>\r\n', 'variable', 'function', 'datatype', 'keyword', 'D', '2021-12-08', '2021-12-08'),
(10, 6, 1, '<p>int a=&quot;kathford&quot;; gives</p>\r\n', 'syntax error', 'semantic error', 'function  error', 'exception error', 'B', '2021-12-08', '2021-12-08'),
(11, 6, 1, '<p>In c programming &#39;printf()&#39; is&nbsp;&nbsp;</p>\r\n', 'input function', 'output function', 'not a function', 'both A and B', 'B', '2021-12-08', '2021-12-08'),
(16, 10, 16, '<p>Worst case is measured by</p>\r\n', 'Bigoh', 'bigtheta', 'bigomega', 'Both c and D', 'A', '2021-12-21', '2021-12-21'),
(17, 10, 16, '<p>Merge sort&nbsp; based on</p>\r\n', 'Divide and conquer', 'Searching ', 'dynamic algrithnm', 'greedy based', 'A', '2021-12-21', '2021-12-21'),
(18, 6, 17, '<p>The value of pi is</p>\r\n', '3.13', '3.25', '3.14', '2.4', 'C', '2021-12-21', '2021-12-21'),
(19, 6, 1, '<p>Function is for&nbsp;</p>\r\n', 'Code reuseability', 'Specfic task', 'For general operation', 'Both A and B', 'D', '2021-12-23', '2021-12-23'),
(40, 10, 16, '<p>Dsa is&nbsp; im</p>\r\n', 'rajesh', 'suresh', 'singh', 'l;ksjdfl', 'C', '2021-12-23', '2021-12-23'),
(41, 11, 18, '<p>What is maangement?</p>\r\n', 'managed', 'organizing', 'controlling', 'monitoring', 'A', '2022-03-07', '2022-03-07'),
(42, 11, 18, '<p>what is controlling</p>\r\n', 'control', 'to manage', 'to organize', 'monitoring', 'B', '2022-03-07', '2022-03-07'),
(43, 11, 18, '<p>what is organizaation&nbsp;</p>\r\n', 'people', 'manpower', 'group of people', 'single people', 'C', '2022-03-07', '2022-03-07'),
(44, 13, 20, '<p>what is pom?</p>\r\n', 'principle of management', 'xxyy', 'ffff', 'jjjjjj', 'A', '2022-03-14', '2022-03-14'),
(45, 13, 20, '<p>what is management</p>\r\n', 'ryyy', 'kjdf', 'kljdf', 'kjdf', 'B', '2022-03-14', '2022-03-14'),
(46, 14, 22, '<p>What is hotel management?</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'hotel', 'manage', 'call', 'op', 'B', '2022-03-23', '2022-03-23'),
(47, 6, 23, '<p>what is c++ ?</p>\r\n', 'object oriented', 'structured oriented', 'function type', 'genral anguage', 'A', '2022-03-23', '2022-03-23'),
(48, 6, 23, '<p>which are not feature of c++?</p>\r\n', 'inheritance', 'polymorphsim', 'pointer', 'frined function', 'C', '2022-03-23', '2022-03-23'),
(49, 15, 24, '<p>what is hotel management?</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'to manage ', 'to control', 'to guide', 'to overview', 'A', '2022-03-23', '2022-03-23'),
(50, 16, 25, '<p>what is principle of management</p>\r\n', 'to manage', 'to control', 'to overview', 'to guide', 'A', '2022-03-23', '2022-03-23'),
(51, 17, 26, '<p>What is hotel managenemt</p>\r\n', 'to manage ', 'to control', 'to guide', 'to overview', 'B', '2022-03-23', '2022-03-23');

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `id` int(11) NOT NULL,
  `exam_name` varchar(50) NOT NULL,
  `course_name` varchar(25) NOT NULL,
  `subject_name` varchar(35) NOT NULL,
  `student_name` varchar(50) NOT NULL,
  `score` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`id`, `exam_name`, `course_name`, `subject_name`, `student_name`, `score`) VALUES
(2, 'csit first term', 'CSIT', 'c programming', 'Suresh', 5),
(10, 'csit first term', 'CSIT', 'math', 'Suresh', 1),
(21, 'csit first term', 'CSIT', 'c++ programming', 'Nikesh', 2),
(22, 'csit first term', 'CSIT', 'c programming', 'Srijana', 5);

-- --------------------------------------------------------

--
-- Table structure for table `student_exam`
--

CREATE TABLE `student_exam` (
  `id` int(11) NOT NULL,
  `login_id` int(11) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `subjects_id` int(11) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_exam`
--

INSERT INTO `student_exam` (`id`, `login_id`, `exam_id`, `subjects_id`, `created_at`) VALUES
(21, 9, 6, 1, '2021-12-21'),
(29, 15, 10, 16, '2021-12-21'),
(32, 9, 6, 17, '2021-12-23'),
(35, 20, 11, 18, '2022-03-07'),
(37, 10, 6, 17, '2022-03-11'),
(40, 33, 6, 1, '2022-03-23'),
(41, 33, 6, 17, '2022-03-23'),
(42, 10, 6, 1, '2022-03-23'),
(43, 10, 6, 23, '2022-03-23'),
(44, 34, 6, 1, '2022-03-23'),
(45, 35, 6, 1, '2022-03-27');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `description` text NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  `updated_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `course_id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 4, 'c programming', '', '2021-11-21', '2021-11-21'),
(17, 4, 'math', '', '2021-12-21', '2021-12-21'),
(23, 4, 'c++ programming', '', '2022-03-23', '2022-03-23'),
(25, 20, 'POM', '', '2022-03-23', '2022-03-23'),
(26, 21, 'Hotel management', '', '2022-03-23', '2022-03-23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam`
--
ALTER TABLE `exam`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_subject`
--
ALTER TABLE `exam_subject`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `question_list`
--
ALTER TABLE `question_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_exam`
--
ALTER TABLE `student_exam`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `exam`
--
ALTER TABLE `exam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `exam_subject`
--
ALTER TABLE `exam_subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `question_list`
--
ALTER TABLE `question_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `result`
--
ALTER TABLE `result`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `student_exam`
--
ALTER TABLE `student_exam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
