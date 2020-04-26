-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Generation Time: Jun 23, 2019 at 09:21 PM
-- Server version: 10.3.13-MariaDB-1:10.3.13+maria~bionic
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `rss_sources`
--

CREATE TABLE `rss_sources` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `added_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_data` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `update_attempt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rss_sources`
--

INSERT INTO `rss_sources` (`id`, `name`, `link`, `added_date`, `updated_data`, `status`, `update_attempt`) VALUES
(1, 'Al Jazeera English', 'https://www.aljazeera.com/xml/rss/all.xml', '2019-06-10 21:23:36', '2019-06-23 01:52:05', 0, '2019-06-23 19:59:30'),
(2, 'The New York Times', 'https://www.nytimes.com/svc/collections/v1/publish/https://www.nytimes.com/section/world/rss.xml', '2019-06-10 21:23:36', '2019-06-10 15:45:30', 0, '2019-06-23 19:59:30'),
(3, 'Defence Blog', 'https://defence-blog.com/feed', '2019-06-10 21:23:36', '2019-06-10 15:45:30', 1, '2019-06-23 19:59:30'),
(4, 'The Guardian', 'https://www.theguardian.com/world/rss', '2019-06-11 08:49:53', '0000-00-00 00:00:00', 1, '2019-06-23 19:59:30'),
(5, 'Times of India', 'https://timesofindia.indiatimes.com/rssfeeds/296589292.cms', '2019-06-11 08:51:28', '0000-00-00 00:00:00', 1, '2019-06-23 19:59:30'),
(6, 'CNBC', 'https://www.cnbc.com/id/100727362/device/rss/rss.html', '2019-06-11 08:52:45', '0000-00-00 00:00:00', 1, '2019-06-23 19:59:30'),
(7, 'CBC', 'https://www.cbc.ca/cmlink/rss-world', '2019-06-11 08:53:46', '0000-00-00 00:00:00', 1, '2019-06-23 19:59:30'),
(8, 'ABC News', 'https://abcnews.go.com/abcnews/internationalheadlines', '2019-06-11 08:54:31', '0000-00-00 00:00:00', 1, '2019-06-23 19:59:30'),
(9, 'News24', 'http://feeds.news24.com/articles/news24/World/rss', '2019-06-11 08:55:52', '0000-00-00 00:00:00', 1, '2019-06-23 19:59:30'),
(10, 'Sky News', 'http://feeds.skynews.com/feeds/rss/world.xml', '2019-06-11 08:56:17', '0000-00-00 00:00:00', 1, '2019-06-23 19:59:30'),
(13, 'National Public Radio', 'https://www.npr.org/rss/rss.php', '2019-06-21 23:43:24', '2019-06-23 01:52:45', 1, '2019-06-23 19:59:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `rss_sources`
--
ALTER TABLE `rss_sources`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `rss_sources`
--
ALTER TABLE `rss_sources`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
