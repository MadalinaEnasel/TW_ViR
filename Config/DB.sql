-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 25, 2022 at 11:02 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: `users`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id_comment` int(30) NOT NULL,
  `post_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_user` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `comment` text COLLATE utf8_unicode_ci NOT NULL,
  `id_video` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id_comment`, `post_time`, `id_user`, `comment`, `id_video`) VALUES
(6, '2022-06-25 18:40:21', 'DailyViR', 'We highly reccomend this!', '722602885'),
(7, '2022-06-25 20:44:01', 'Razvan', 'I love this movie', '715841302'),
(8, '2022-06-25 20:44:16', 'Andreea', 'I hate it!', '715841302');

-- --------------------------------------------------------

--
-- Table structure for table `favourites`
--

CREATE TABLE `favourites` (
  `id_user` text COLLATE utf8_unicode_ci NOT NULL,
  `id_video` text COLLATE utf8_unicode_ci NOT NULL,
  `title` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `favourites`
--

INSERT INTO `favourites` (`id_user`, `id_video`, `title`) VALUES
('razvan', '690017366', '690017366'),
('razvan', '722597163', 'Dupa ce promovezi la TW'),
('DailyViR', '722602885', 'The Tunnel'),
('Razvan', '715841302', 'The Rabbit Hole');

-- --------------------------------------------------------

--
-- Table structure for table `statistcs`
--

CREATE TABLE `statistcs` (
  `id_video` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `views` int(11) NOT NULL,
  `male_views` int(11) NOT NULL,
  `female_views` int(11) NOT NULL,
  `binary_views` int(11) NOT NULL,
  `others_views` int(11) NOT NULL,
  `today_views` int(11) NOT NULL,
  `dateToday` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `statistcs`
--

INSERT INTO `statistcs` (`id_video`, `views`, `male_views`, `female_views`, `binary_views`, `others_views`, `today_views`, `dateToday`) VALUES
('722602885', 4, 1, 0, 0, 1, 0, '2022-06-25'),
('715841302', 12, 6, 0, 0, 0, 0, '2022-06-25');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `fav_cat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `gender`, `email`, `password`, `country`, `fav_cat`) VALUES
('admin', 'Male', 'DailyVirAdmin@gmail.com', 'parolaadmin1', 'Romania', 1),
('Andreea', 'Female', 'andreea@gmail.com', 'parola', 'Austria', 0),
('andrei', 'Male', 'andrei@email.com', 'parola', 'America', 1),
('Catalina', 'Female', 'Catalina@email.com', 'parola1', 'Romania', 0),
('DailyViR', 'Other', 'DailyViR@gmail.com', 'parola1', 'Romania', 0),
('razvan', 'Male', 'razvan@email.com', 'aaaaa', 'Romania', 1);

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE `video` (
  `id_video` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `comment_count` int(11) NOT NULL,
  `views` int(11) NOT NULL,
  `category` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `upload_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `tags` text COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `id_user` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `video`
--

INSERT INTO `video` (`id_video`, `comment_count`, `views`, `category`, `upload_date`, `tags`, `title`, `description`, `id_user`) VALUES
('715841302', 2, 9, 'Movie', '2022-06-25 20:44:29', 'video', 'The Rabbit Hole', 'Two sisters are faced with the grim reality of what it takes to make their dream come true. (*This is a film depicting the realities of trafficking. Viewer discretion is advised.) ', 'Razvan'),
('722602885', 1, 62, 'Movie', '2022-06-25 20:43:09', 'video', 'The Tunnel', 'Three refugees run the race of their lives from Calais to Dover through the Euro Tunnel, trying to beat the trains and overcome their terror in a bid to reach freedom and start new lives in the UK. Based on true accounts.', 'DailyViR');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id_comment`);

--
-- Indexes for table `statistcs`
--
ALTER TABLE `statistcs`
  ADD KEY `id_video_statistics` (`id_video`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`id_video`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id_comment` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `statistcs`
--
ALTER TABLE `statistcs`
  ADD CONSTRAINT `id_video_statistics` FOREIGN KEY (`id_video`) REFERENCES `video` (`id_video`);
COMMIT;