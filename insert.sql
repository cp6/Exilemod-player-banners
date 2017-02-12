CREATE DATABASE IF NOT EXISTS `exile` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `exile`;

CREATE TABLE IF NOT EXISTS `banner` (
  `name` text,
  `score` varchar(50) DEFAULT NULL,
  `kills` int(11) DEFAULT NULL,
  `deaths` int(11) DEFAULT NULL,
  `kd` text,
  `tp` text,
  `connects` int(11) DEFAULT NULL,
  `community` text,
  `cname` text,
  `vehicles` int(11) DEFAULT NULL,
  `rank` text,
  `uid` varchar(50) DEFAULT NULL,
  `link` varchar(118) DEFAULT NULL,
  `map` text,
  `ip` text,
  `fc1` text,
  `fc2` text,
  `fc3` text,
  `fc4` text,
  `bg` text,
  `font` text,
  `date` datetime DEFAULT NULL,
  UNIQUE KEY `link` (`link`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;