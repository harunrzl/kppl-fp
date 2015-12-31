-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 31, 2015 at 02:02 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `psikolog`
--

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE IF NOT EXISTS `chat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `epochtime` int(11) NOT NULL,
  `toid` int(11) NOT NULL,
  `isi` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`id`, `uid`, `epochtime`, `toid`, `isi`) VALUES
(1, 2, 1450332091, 1, 'halo'),
(2, 1, 1450839694, 2, 'ya?'),
(3, 1, 1450866062, 2, 'testing'),
(4, 2, 1451284019, 4, 'lalala'),
(5, 2, 1451284022, 4, 'hei bas'),
(6, 2, 1451284082, 4, 'lalala'),
(7, 2, 1451284111, 3, 'hei tatang'),
(8, 2, 1451355942, 4, 'bas bas'),
(9, 2, 1451355945, 4, 'dimana?'),
(10, 4, 1451356232, 2, 'iya sal kenapa?'),
(11, 2, 1451363670, 5, 'testing'),
(12, 6, 1451463925, 4, 'halo bas'),
(13, 6, 1451463927, 4, 'woii'),
(14, 6, 1451463931, 4, 'cekkk email');

-- --------------------------------------------------------

--
-- Table structure for table `front_news`
--

CREATE TABLE IF NOT EXISTS `front_news` (
  `id_news` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `article` text NOT NULL,
  `url_image` varchar(100) NOT NULL,
  PRIMARY KEY (`id_news`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `front_news`
--

INSERT INTO `front_news` (`id_news`, `title`, `article`, `url_image`) VALUES
(1, 'haha', 'wkhslofghoishgo shdog soehg osihe ohis igeohsoehgoisheog shoe guisheighso egh sieogh soi ehgoihsoeig hsoih egiohs egih o h', '../images/lala.png'),
(2, 'The good life is a process, not a state of being. It is a direction, not a destination', 'Kehidupan yang baik adalah sebuah proses, bukan suatu keadaan yang ada dengan sendirinya. Kehidupan itu sendiri adalah arah, bukan tujuan', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `session_time` int(11) NOT NULL,
  `session_value` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `pass`, `session_time`, `session_value`) VALUES
(1, 'Harun', 'kosongin aja', 0, 0),
(2, 'Faisal', 'kosongin aja', 1451502354, 0),
(3, 'Bintang', 'kosongin aja', 0, 0),
(4, 'Basalamah', 'kosongin aja', 0, 0),
(5, 'Jundy', 'kosongin aja', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_login`
--

CREATE TABLE IF NOT EXISTS `user_login` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_login`
--

INSERT INTO `user_login` (`id`, `username`, `password`) VALUES
(1, 'faisal', 'a6addb9ffb18bd870b260590177a30e43a3d218d'),
(2, 'isol', '5d251d260a7b214fba41cce12e8d4ac00aaaa107');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

