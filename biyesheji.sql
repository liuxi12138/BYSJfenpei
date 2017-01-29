-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2017-01-29 23:05:57
-- 服务器版本: 5.5.46-0ubuntu0.14.04.2
-- PHP 版本: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `biyesheji`
--

-- --------------------------------------------------------

--
-- 表的结构 `delete`
--

CREATE TABLE IF NOT EXISTS `delete` (
  `id` int(3) NOT NULL,
  `realid` int(3) DEFAULT NULL,
  `topic` varchar(26) DEFAULT NULL,
  `teacher` varchar(3) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `topic`
--

CREATE TABLE IF NOT EXISTS `topic` (
  `id` int(3) NOT NULL,
  `realid` int(3) DEFAULT NULL,
  `topic` varchar(26) DEFAULT NULL,
  `teacher` varchar(3) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `topic_content`
--

CREATE TABLE IF NOT EXISTS `topic_content` (
  `id` int(3) NOT NULL,
  `realid` int(3) DEFAULT NULL,
  `topic` varchar(26) DEFAULT NULL,
  `teacher` varchar(3) DEFAULT NULL,
  `content` varchar(225) DEFAULT NULL,
  `x` varchar(13) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(3) NOT NULL,
  `classid` int(2) DEFAULT NULL,
  `schoolid` bigint(11) DEFAULT NULL,
  `name` varchar(10) DEFAULT NULL,
  `class` varchar(10) DEFAULT NULL,
  `topicid` int(3) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
