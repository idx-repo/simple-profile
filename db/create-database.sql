CREATE DATABASE IF NOT EXISTS `simple_profile`;
USE `simple_profile`;

DROP TABLE IF EXISTS `companies`;
CREATE TABLE IF NOT EXISTS `companies` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `code` char(4) NOT NULL,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `code` (`code`),
  KEY `name` (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `profiles`;
CREATE TABLE IF NOT EXISTS `profiles` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `comp_id` INT NOT NULL,
  `hq_address` TEXT NOT NULL,
  `hq_phone` varchar(40) NOT NULL,
  `hq_fax` varchar(40) NOT NULL,
  `website` varchar(100) NOT NULL,
  `started_operation` CHAR(4) NOT NULL,
  `associated_companies` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `comp_id` (`comp_id`),
  CONSTRAINT `fk_profiles` FOREIGN KEY (`comp_id`) REFERENCES `companies` (`id`)
    ON UPDATE CASCADE ON DELETE RESTRICT
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `shareholders`;
CREATE TABLE IF NOT EXISTS `shareholders` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `comp_id` INT NOT NULL,
  `name` varchar(100) NOT NULL,
  `shares` DECIMAL(5,2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `comp_id` (`comp_id`),
  CONSTRAINT `fk_shareholders` FOREIGN KEY (`comp_id`) REFERENCES `companies` (`id`)
    ON UPDATE CASCADE ON DELETE RESTRICT
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `commisioners`;
CREATE TABLE IF NOT EXISTS `commisioners` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `comp_id` INT NOT NULL,
  `name` varchar(100) NOT NULL,
  `job_desc` VARCHAR(30) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `comp_id` (`comp_id`),
  CONSTRAINT `fk_commisioners` FOREIGN KEY (`comp_id`) REFERENCES `companies` (`id`)
    ON UPDATE CASCADE ON DELETE RESTRICT
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `directors`;
CREATE TABLE IF NOT EXISTS `directors` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `comp_id` INT NOT NULL,
  `name` varchar(100) NOT NULL,
  `job_desc` VARCHAR(30) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `comp_id` (`comp_id`),
  CONSTRAINT `fk_directors` FOREIGN KEY (`comp_id`) REFERENCES `companies` (`id`)
    ON UPDATE CASCADE ON DELETE RESTRICT
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

