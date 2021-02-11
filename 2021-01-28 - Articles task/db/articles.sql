-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 11, 2021 at 11:53 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `articles`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `author` varchar(40) COLLATE utf16_lithuanian_ci NOT NULL,
  `shortContent` varchar(200) COLLATE utf16_lithuanian_ci NOT NULL,
  `content` text COLLATE utf16_lithuanian_ci NOT NULL,
  `publishDate` date NOT NULL,
  `type` varchar(40) COLLATE utf16_lithuanian_ci NOT NULL,
  `title` varchar(100) COLLATE utf16_lithuanian_ci DEFAULT NULL,
  `addDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `preview` varchar(999) COLLATE utf16_lithuanian_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf16_lithuanian_ci DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_lithuanian_ci;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `author`, `shortContent`, `content`, `publishDate`, `type`, `title`, `addDate`, `preview`, `username`, `user_id`) VALUES
(1, 'John Doe', 'Shorty Shorts', 'Very shorty shorts were found', '2020-04-01', 'NewsArticle', 'pirmas title', '2021-02-10 06:32:04', 'https://upload.wikimedia.org/wikipedia/commons/thumb/d/d2/Reddot-small.svg/1200px-Reddot-small.svg.png', 'john', 2),
(2, 'Jonas Jon', 'trumptext', 'ilgesnis tekstukas', '2020-04-02', 'ShortArticle', 'antras title', '2021-02-11 08:45:59', 'https://www.kaspersky.com/content/en-global/images/product-icon-KSOS.png', 'jonas', 5),
(3, 'PetrPetras', 'velgi trumpas', 'tekstas nedidelis', '2020-04-03', 'PhotoArticle', 'trecias title', '2021-02-11 08:46:09', 'https://www.kindpng.com/picc/m/276-2764257_instagram-icon-instagram-logo-small-size-hd-png.png', 'petr', 6),
(4, 'Vardenis su Pavarde', 'nebeturiu ideju', 'ilgiausias straipsnis ilgiausias straipsnis ilgiausias straipsnis ilgiausias straipsnis ilgiausias straipsnis ilgiausias straipsnis ilgiausias straipsnis ', '2020-04-06', 'NewsArticle', 'ketvirtas title', '2021-02-11 08:46:20', 'https://www.logolynx.com/images/logolynx/d5/d5879b5a204d222b526600e93cc01022.jpeg', 'vardenis', 7),
(5, 'Betkas', 'bla', 'blabla', '2020-05-04', 'NewsArticle', 'penktas title', '2021-02-11 08:46:30', 'https://upload.wikimedia.org/wikipedia/commons/thumb/f/f9/Wiktionary_small.svg/350px-Wiktionary_small.svg.png', 'betkas', 8),
(18, 'Veikejas', 'trumpulis', 'Ilgas tekstas', '2020-05-25', 'NewsArticle', 'septintas title', '2021-02-11 08:46:55', 'https://d25rq8gxcq0p71.cloudfront.net/dictionary-images/324/small.jpg', 'veikejas', 10),
(48, 'John Doe', 'naujas', 'kontentas', '2021-02-11', 'NewsArticle', 'Titulinis', '2021-02-10 06:32:13', 'https://upload.wikimedia.org/wikipedia/commons/thumb/d/d2/Reddot-small.svg/1200px-Reddot-small.svg.png', 'john', 2);

-- --------------------------------------------------------

--
-- Table structure for table `article_themes`
--

CREATE TABLE `article_themes` (
  `article_id` int(11) NOT NULL,
  `theme1` varchar(100) DEFAULT NULL,
  `theme2` varchar(100) DEFAULT NULL,
  `theme3` varchar(100) DEFAULT NULL,
  `user_id` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `article_themes`
--

INSERT INTO `article_themes` (`article_id`, `theme1`, `theme2`, `theme3`, `user_id`) VALUES
(1, 'pinigai', 'verslas', 'ekonomika', '2'),
(2, 'pinigai', 'verslas', 'ekonomika', '5'),
(3, 'pinigai', 'verslas', 'ekonomika', '6'),
(4, 'pinigai', 'verslas', 'ekonomika', '7'),
(5, 'pinigai', 'verslas', 'ekonomika', '8'),
(18, 'pinigai', 'verslas', 'ekonomika', '10'),
(48, 'pinigai', 'verslas', 'ekonomika', '2'),
(60, 'pinigai', 'verslas', 'ekonomika', '2');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `comment` varchar(999) DEFAULT NULL,
  `user` varchar(255) DEFAULT NULL,
  `article_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment`, `user`, `article_id`, `user_id`) VALUES
(11, 'mano komentaras', 'john', 18, 2),
(12, 'Cia mano straipsnis', 'john', 51, 2),
(14, 'Mano puikusis straipsnis', 'john', 60, 2),
(15, 'dar vienas komentaras', 'john', 18, 2),
(16, 'my comment', 'john', 10, 2),
(21, 'labas', 'veikejas', 48, 10),
(22, 'puikiai', 'veikejas', 5, 10);

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `straipsnio_id` int(11) NOT NULL,
  `link` varchar(999) NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `straipsnio_id`, `link`, `user_id`) VALUES
(1, 1, 'https://images.unsplash.com/photo-1587502537745-84b86da1204f?ixid=MXwxMjA3fDF8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1050&q=80', 2),
(2, 1, 'https://images.unsplash.com/photo-1500534623283-312aade485b7?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1050&q=80', 2),
(3, 1, 'https://images.unsplash.com/photo-1505765050516-f72dcac9c60e?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1050&q=80', 2),
(4, 2, 'https://images.unsplash.com/photo-1493916665398-143bdeabe500?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1267&q=80', 5),
(5, 2, 'https://images.unsplash.com/photo-1456926631375-92c8ce872def?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80', 5),
(6, 2, 'https://images.unsplash.com/photo-1578326457399-3b34dbbf23b8?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80', 5),
(7, 3, 'https://images.unsplash.com/photo-1493476523860-a6de6ce1b0c3?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80', 6),
(8, 3, 'https://images.unsplash.com/photo-1534777410147-084a460870fc?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80', 6),
(9, 3, 'https://images.unsplash.com/photo-1555883006-0f5a0915a80f?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1256&q=80', 6),
(10, 4, 'https://images.unsplash.com/photo-1500382017468-9049fed747ef?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1489&q=80', 7),
(11, 4, 'https://images.unsplash.com/photo-1503453363464-743ee9ce1584?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1352&q=80', 7),
(12, 4, 'https://images.unsplash.com/photo-1590930180621-fc7027a21559?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1351&q=80', 7),
(13, 5, 'https://images.unsplash.com/photo-1591213595166-82c13a93b1c8?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1267&q=80', 8),
(14, 5, 'https://images.unsplash.com/photo-1610213626785-7cf3f4414081?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1339&q=80', 8),
(15, 5, 'https://images.unsplash.com/photo-1599822990021-7be7e170d4d3?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80', 8),
(19, 18, 'https://images.unsplash.com/photo-1483728642387-6c3bdd6c93e5?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1355&q=80', 10),
(20, 18, 'https://images.unsplash.com/photo-1501785888041-af3ef285b470?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80', 10),
(21, 18, 'https://images.unsplash.com/photo-1458668383970-8ddd3927deed?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1347&q=80', 10),
(30, 48, 'https://images.unsplash.com/photo-1500534623283-312aade485b7?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1050&q=80', 2),
(31, 48, 'https://images.unsplash.com/photo-1505765050516-f72dcac9c60e?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1050&q=80', 2),
(54, 60, 'https://images.unsplash.com/photo-1612873649383-edf91f1cf7fe?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=700&q=80', 2),
(55, 60, 'https://images.unsplash.com/photo-1612864800594-22b1b1c44de8?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=712&q=80', 2),
(56, 60, 'https://images.unsplash.com/photo-1612828918120-dea6933829ac?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=634&q=80', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `usertype` varchar(255) DEFAULT NULL,
  `article_id` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `usertype`, `article_id`) VALUES
(1, 'admin', 'password', 'administrator', NULL),
(2, 'john', 'doe', 'author', 1),
(3, 'user', 'user', 'visitor', NULL),
(5, 'jonas', 'jon', 'author', 2),
(6, 'petr', 'petras', 'author', 3),
(7, 'vardenis', 'pavarde', 'author', 4),
(8, 'betkas', 'betkas', 'author', 5),
(10, 'veikejas', 'veik', 'author', 18);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD KEY `comment_id` (`comment_id`) USING BTREE;

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
