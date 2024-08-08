-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 11, 2023 at 12:14 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mysocialdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `email`) VALUES
(1, 'admin', 'admin', 'admin@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `post_id` int(11) NOT NULL,
  `content_comment` varchar(255) CHARACTER SET latin1 NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `post_id`, `content_comment`, `date_created`) VALUES
(1, 'Legend', 62, 'Hello', '2023-01-28 17:35:28'),
(2, 'Legend', 64, 'bfb', '2023-01-29 11:43:55'),
(3, 'Legend', 52, 'yes', '2023-01-29 11:44:32'),
(4, 'Legend', 64, 'gh', '2023-01-29 17:02:26'),
(5, 'Legend', 64, '', '2023-01-30 11:17:00'),
(6, 'Legend', 64, 'k', '2023-01-30 11:19:45'),
(7, 'Legend', 64, 'jh', '2023-01-30 11:24:06'),
(8, 'Legend', 64, 'hhh', '2023-01-30 11:24:28'),
(9, 'Legend', 64, 'jjs', '2023-01-30 11:27:44'),
(10, 'Legend', 64, 'jjs', '2023-01-30 11:27:44'),
(11, 'Legend', 64, 'jjs', '2023-01-30 11:27:45'),
(12, 'Legend', 64, 'jjs', '2023-01-30 11:27:45'),
(13, 'Legend', 64, 'jjs', '2023-01-30 11:27:45'),
(14, 'Legend', 64, 'jjs', '2023-01-30 11:27:45'),
(15, 'Legend', 64, 'd', '2023-01-30 11:29:30'),
(16, 'Legend', 64, 'hhc', '2023-02-06 17:34:34'),
(17, 'Legend', 64, 'hhc', '2023-02-06 17:34:36'),
(18, 'Legend', 64, 'hhc', '2023-02-06 17:34:36'),
(19, 'Legend', 64, 'hhc', '2023-02-06 17:34:36'),
(20, 'Legend', 64, 'hhc', '2023-02-06 17:34:51'),
(21, 'Legend', 64, 'hhc', '2023-02-06 17:34:52'),
(22, 'Legend', 64, 'hhc', '2023-02-06 17:34:52'),
(23, 'Legend', 64, 'hhc', '2023-02-06 17:34:53'),
(24, 'Legend', 64, 'hhc', '2023-02-06 17:34:53'),
(25, 'Legend', 64, 'hhc', '2023-02-06 17:34:54'),
(26, 'Legend', 64, 'hhc', '2023-02-06 17:34:54'),
(27, 'Legend', 64, 'hhc', '2023-02-06 17:34:54'),
(28, 'Legend', 64, 'hhc', '2023-02-06 17:34:54'),
(29, 'Legend', 64, 'hhc', '2023-02-06 17:34:55'),
(30, 'Legend', 64, 'hhc', '2023-02-06 17:34:55'),
(31, 'Legend', 64, 'hhc', '2023-02-06 17:34:58'),
(32, 'Legend', 64, 'n', '2023-02-06 17:35:52'),
(33, 'Legend', 64, 'jj', '2023-02-06 17:37:11'),
(34, 'Legend', 0, '', '2023-02-06 17:46:05'),
(35, 'Legend', 0, '', '2023-02-06 17:46:13'),
(36, 'Legend', 0, '', '2023-02-06 17:46:14'),
(37, 'Legend', 0, '', '2023-02-06 17:46:14'),
(38, 'Legend', 0, '', '2023-02-06 17:46:14'),
(39, 'Legend', 0, '', '2023-02-06 17:46:14'),
(40, 'Legend', 0, '', '2023-02-06 17:46:15'),
(41, 'Legend', 64, 'mm', '2023-02-06 17:47:01'),
(42, 'Abdullahi', 64, 'nj', '2023-02-06 17:48:32'),
(43, 'Abdullahi', 64, 'nn', '2023-02-06 17:51:22'),
(44, 'Abdullahi', 64, '', '2023-02-06 17:54:55'),
(45, 'Abdullahi', 64, 'n', '2023-02-06 17:57:00'),
(46, 'Abdullahi', 64, '', '2023-02-06 17:57:08'),
(47, 'Abdullahi', 64, '', '2023-02-06 17:57:10'),
(48, 'Abdullahi', 64, '', '2023-02-06 17:57:22'),
(49, 'Abdullahi', 64, '', '2023-02-06 17:57:23'),
(50, 'Abdullahi', 64, '', '2023-02-06 17:57:27'),
(51, 'Abdullahi', 64, '', '2023-02-06 17:57:27'),
(52, 'Abdullahi', 64, '', '2023-02-06 17:57:27'),
(53, 'Abdullahi', 64, '', '2023-02-06 17:57:28'),
(54, 'Abdullahi', 64, '', '2023-02-06 17:57:28'),
(55, 'Abdullahi', 64, 'n', '2023-02-06 18:07:33'),
(56, 'Abdullahi', 0, 'b', '2023-02-06 18:10:06'),
(57, 'Abdullahi', 0, 'b', '2023-02-06 18:10:08'),
(58, 'Abdullahi', 0, 'j', '2023-02-06 18:17:10'),
(59, 'Abdullahi', 0, '', '2023-02-06 18:17:18'),
(60, 'Abdullahi', 0, '', '2023-02-06 18:17:26'),
(61, 'Abdullahi', 0, '', '2023-02-06 20:28:37'),
(62, 'Abdullahi', 0, '', '2023-02-06 20:28:39'),
(63, 'Abdullahi', 0, 'nj', '2023-02-06 20:28:45'),
(64, 'Abdullahi', 0, 'nj', '2023-02-06 20:28:46'),
(65, 'Abdullahi', 0, 'nj', '2023-02-06 20:28:47'),
(66, 'Abdullahi', 64, 'j', '2023-02-06 20:29:39'),
(67, 'Abdullahi', 0, '', '2023-02-06 20:35:51'),
(68, 'Abdullahi', 0, '', '2023-02-06 20:35:52'),
(69, 'Abdullahi', 0, '', '2023-02-06 20:35:53'),
(70, 'Abdullahi', 0, '', '2023-02-06 20:35:53'),
(71, 'Abdullahi', 0, '', '2023-02-06 20:35:56'),
(72, 'Legend', 64, 'gd', '2023-02-15 19:17:38'),
(73, 'Legend', 64, 'hhvf', '2023-02-15 19:33:32');

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `id` int(11) NOT NULL,
  `Name` varchar(50) CHARACTER SET latin1 NOT NULL,
  `Email` varchar(50) CHARACTER SET latin1 NOT NULL,
  `Subject` varchar(50) CHARACTER SET latin1 NOT NULL,
  `Message` varchar(255) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`id`, `Name`, `Email`, `Subject`, `Message`) VALUES
(1, 'Aliyu Ishaq Abdullahi', 'aliyuishaq102@gmail.com', 'Suggestion', 'fg gcv vxybh');

-- --------------------------------------------------------

--
-- Table structure for table `friends`
--

CREATE TABLE `friends` (
  `id` int(11) NOT NULL,
  `my_id` varchar(100) NOT NULL,
  `friend_id` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `friends`
--

INSERT INTO `friends` (`id`, `my_id`, `friend_id`) VALUES
(1, 'Legend', 'Abdullahi'),
(3, 'Aisha', 'Abdullahi'),
(4, 'Aisha', 'Legend');

-- --------------------------------------------------------

--
-- Table structure for table `friend_request`
--

CREATE TABLE `friend_request` (
  `id` int(11) NOT NULL,
  `sender` varchar(255) NOT NULL,
  `reciever` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `friend_request`
--

INSERT INTO `friend_request` (`id`, `sender`, `reciever`) VALUES
(5, 'Legend', 'Abdullahi');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `post_id` int(30) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `user_id`, `post_id`, `date_created`) VALUES
(3, 'Abdullahi', 62, '2022-05-06 22:08:58'),
(4, 'Legend', 53, '2022-05-28 17:38:38'),
(12, 'Legend', 0, '2023-01-13 20:08:40'),
(17, 'Legend', 65, '2023-01-13 20:39:12'),
(18, 'Legend', 65, '2023-01-13 20:39:21'),
(19, 'Legend', 65, '2023-01-13 20:39:22'),
(20, 'Legend', 65, '2023-01-13 20:39:23'),
(21, 'Legend', 65, '2023-01-13 20:39:23'),
(25, 'Legend', 65, '2023-01-13 21:03:07'),
(26, 'Legend', 65, '2023-01-13 21:03:11'),
(27, 'Legend', 65, '2023-01-13 21:03:33'),
(28, 'Legend', 65, '2023-01-13 21:05:38'),
(34, 'Legend', 6, '2023-01-13 21:07:08'),
(93, 'Legend', 54, '2023-01-14 16:28:23'),
(198, 'Legend', 57, '2023-01-15 10:46:56'),
(439, 'Legend', 0, '2023-01-29 20:46:26'),
(440, 'Legend', 0, '2023-01-29 20:46:28'),
(505, 'Abdullahi', 64, '2023-04-30 13:56:02'),
(508, 'Legend', 64, '2023-05-23 12:48:35');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `sender_id` varchar(100) NOT NULL,
  `reciever_id` varchar(100) NOT NULL,
  `content` varchar(255) CHARACTER SET latin1 NOT NULL,
  `message_pic` varchar(255) CHARACTER SET latin1 NOT NULL,
  `photo` varchar(100) NOT NULL,
  `date_sended` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `sender_id`, `reciever_id`, `content`, `message_pic`, `photo`, `date_sended`) VALUES
(1, 'Legend', 'Abdullahi', 'Hello, Hw Are U?', '', '', '2022-06-13 13:45:45'),
(3, 'Abdullahi', 'Legend', 'Am doing fine', '', '', '2022-06-13 13:47:12'),
(5, 'Aisha', 'Legend', 'Hello', '', '', '2022-06-16 18:05:43'),
(6, 'Legend', 'Aisha', 'Hy..', '', '', '2022-06-18 12:42:30'),
(19, 'Legend', 'Aisha', 'Hello', '', '', '2023-03-12 19:27:35'),
(20, 'Legend', 'Abdullahi', '', '', 'upload/message_images/1a.jpg', '2023-03-12 19:28:04'),
(21, 'Abdullahi', 'Legend', '', '', 'upload/message_images/bitdegree-certificate-764277_1.jpg', '2023-03-15 09:52:47');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `post_id` int(100) NOT NULL,
  `user_id` varchar(100) CHARACTER SET latin1 NOT NULL,
  `post_image` varchar(100) CHARACTER SET latin1 NOT NULL,
  `content` varchar(100) CHARACTER SET latin1 NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `likes` int(11) NOT NULL,
  `type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `user_id`, `post_image`, `content`, `created`, `likes`, `type`) VALUES
(6, 'Abdullahi', 'upload/257c835b-f225-4f55-bd43-00baa7ecc74a.jpg', 'Hello World', '0000-00-00 00:00:00', 1, 0),
(54, 'Abdullahi', 'upload/Capture2.PNG', 'Good Day', '2022-04-10 13:33:19', 1, 0),
(57, 'Legend', 'upload/92a15fdb-fbec-40f6-a7cc-3ff32a22de54.jpg', 'Hello World', '2022-04-20 16:18:00', 1, 0),
(62, 'Legend', '', 'Hello Everyone.', '2022-04-25 16:34:26', 0, 0),
(64, 'Aisha', '', 'Hello', '2022-07-21 12:27:20', 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `post_update`
--

CREATE TABLE `post_update` (
  `id` int(11) NOT NULL,
  `Name` varchar(100) CHARACTER SET latin1 NOT NULL,
  `Email` varchar(100) CHARACTER SET latin1 NOT NULL,
  `Content` varchar(255) CHARACTER SET latin1 NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post_update`
--

INSERT INTO `post_update` (`id`, `Name`, `Email`, `Content`, `date_created`) VALUES
(1, 'Admin', 'admin@gmail.com', 'All 400 level Computer Science students are expected to submit thier final year project deadline Monday, 29th May, 2023.', '2022-06-21 20:39:12'),
(2, 'admin', 'admin@gmail.com', 'This is to inform all level 400 computer science student that CSC 4306 Test is rescheduled for Monday 9am - 10am.', '2023-02-20 16:44:39');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `f_name` varchar(100) CHARACTER SET latin1 NOT NULL,
  `oname` varchar(100) CHARACTER SET latin1 NOT NULL,
  `username` varchar(100) CHARACTER SET latin1 NOT NULL,
  `password` varchar(100) CHARACTER SET latin1 NOT NULL,
  `number` varchar(100) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `email` varchar(100) CHARACTER SET latin1 NOT NULL,
  `gender` varchar(100) CHARACTER SET latin1 NOT NULL,
  `dob` varchar(100) CHARACTER SET latin1 NOT NULL,
  `address` varchar(100) CHARACTER SET latin1 NOT NULL,
  `Religious` varchar(100) CHARACTER SET latin1 NOT NULL,
  `Status` varchar(100) CHARACTER SET latin1 NOT NULL,
  `Profile_pic` varchar(255) CHARACTER SET latin1 NOT NULL,
  `Cover_pic` varchar(255) CHARACTER SET latin1 NOT NULL,
  `regnumber` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `f_name`, `oname`, `username`, `password`, `number`, `email`, `gender`, `dob`, `address`, `Religious`, `Status`, `Profile_pic`, `Cover_pic`, `regnumber`) VALUES
(18, 'Aliyu', 'Ishaq Abdullahi', 'Legend', '827ccb0eea8a706c4c34a16891f84e7b', '08064378767', 'aliyulegend92@gmail.com', 'Male', '1997-11-21', 'No. 744 Naibawa Tsakiya, ', 'Islam', 'Computer Scientist', 'Admin/user-images/Aliyu.jpg', 'Admin/cover-images/computer.jpg', 'CST/18/COM00182'),
(19, 'Abdullahi', 'Aliyu', 'Abdullahi', '827ccb0eea8a706c4c34a16891f84e7b', '09030910388', 'sarkiabdul750@gmail.com', 'Male', '1996-11-02', 'Court Road, Kano', 'Islam', 'Web Developer', 'Admin/user-images/sarkin basu.jpg', 'Admin/cover-images/73df2171-0730-4406-869d-9af7c4c1363a.jpg', 'CST/18/COM/00215'),
(22, 'Aisha', 'Abdullahi', 'Aisha', '827ccb0eea8a706c4c34a16891f84e7b', '080634627668', 'aisha@gmail.com', 'Female', '2005-07-15', 'No. 744 Naibawa Tsakiya', 'Islam', 'God Fearing', 'Admin/user-images/IMG_20210717_164855.jpg', 'Admin/cover-images/004.jpg', 'CST/18/COM/0000'),
(23, 'Faisal ', 'Kura Umar', 'Kura', '827ccb0eea8a706c4c34a16891f84e7b', '08074358252', 'dogonmata4real@gmail.com', 'Male', '2023-05-03', 'Naibawa Yan Lemo', '', '', 'Admin/user-images/pngtree-businessman-user-avatar-free-vector-png-image_1538405.jpg', 'Admin/cover-images/post-7.jpg', 'CST/18/COM/004'),
(24, 'Hassan ', 'Muhammad Muhammad', 'Manueva', '827ccb0eea8a706c4c34a16891f84e7b', '08011112222', 'muanueva@gmail.com', 'Male', '2023-05-03', 'Sallari', '', '', 'Admin/user-images/images.png', 'Admin/cover-images/IMG_20221025_230916.jpg', 'CST/18/COM/00202');

-- --------------------------------------------------------

--
-- Table structure for table `validate_regnumber`
--

CREATE TABLE `validate_regnumber` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET latin1 NOT NULL,
  `regnumber` varchar(255) CHARACTER SET latin1 NOT NULL,
  `department` varchar(100) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `validate_regnumber`
--

INSERT INTO `validate_regnumber` (`id`, `name`, `regnumber`, `department`) VALUES
(1, 'Aliyu Ishaq Abdullahi', 'CST/18/COM/00182', 'Computer Science'),
(2, 'Faisal Kura Umar', 'CST/18/COM/00209', 'Computer Science'),
(3, 'Abdurrahman Abdullahi Adam', 'CST/18/COM/00215', 'Computer Science'),
(4, 'Hassan Muhammad Muhammad', 'CST/18/COM/00202', 'Computer Science'),
(5, 'Umar Sabiu Zakariyya', 'CST/18/COM/00211', 'Computer Science'),
(6, 'Hamza Yakubu Muhammad', 'CST/18/COM/00201', 'Computer Science'),
(7, 'Aisha Abdullahi', 'CST/18/COM/00001', 'Computer Science\r\n');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `friends`
--
ALTER TABLE `friends`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `friend_request`
--
ALTER TABLE `friend_request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `post_update`
--
ALTER TABLE `post_update`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `validate_regnumber`
--
ALTER TABLE `validate_regnumber`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `friends`
--
ALTER TABLE `friends`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `friend_request`
--
ALTER TABLE `friend_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=509;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `post_update`
--
ALTER TABLE `post_update`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `validate_regnumber`
--
ALTER TABLE `validate_regnumber`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
