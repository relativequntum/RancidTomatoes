CREATE DATABASE movie;
USE movie;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `movie`
--

-- --------------------------------------------------------

--
-- Table structure for table `Movies`
--

CREATE TABLE `Movies` (
  `movieId`  bigint not null auto_increment primary key,
  `title` varchar(100) NOT NULL,
  `director` varchar(100) NOT NULL,
  `year` int(11) NOT NULL,
  `rating` char(4) NOT NULL,
  `length` int(11) NOT NULL,
  `boxOffice` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



-- --------------------------------------------------------

--
-- Table structure for table `Reviewers`
--

CREATE TABLE `Reviewers` (
  `reviewerId` bigint not null auto_increment primary key,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Reviews`
--

CREATE TABLE `Reviews` (
  `reviewId` bigint not null auto_increment primary key,
  `movieTitle` varchar(100) NOT NULL,
  `reviewerName` varchar(100) NOT NULL,
  `movieId` int(11) NOT NULL,
  `rate` float NOT NULL,
  `review` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



