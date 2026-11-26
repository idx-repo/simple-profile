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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `directors`;
CREATE TABLE IF NOT EXISTS `directors` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `comp_id` INT NOT NULL,
  `name` varchar(100) NOT NULL,
  `job_desc` VARCHAR(40) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `comp_id` (`comp_id`),
  CONSTRAINT `fk_directors` FOREIGN KEY (`comp_id`) REFERENCES `companies` (`id`)
    ON UPDATE CASCADE ON DELETE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(50) NOT NULL,
  `password_hash` VARCHAR(255) NOT NULL,
  `auth_key` VARCHAR(32) NOT NULL,
  `access_token` VARCHAR(100) DEFAULT NULL,
  `email` VARCHAR(100) DEFAULT NULL,
  `status` SMALLINT NOT NULL DEFAULT 10,
  `created_at` INT NOT NULL,
  `updated_at` INT NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `idx_users_username` (`username`),
  UNIQUE KEY `idx_users_email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=1 ;

-- Seed default users: admin (password: admin) and demo (password: demo)
INSERT INTO `users` (`id`, `username`, `password_hash`, `auth_key`, `access_token`, `email`, `status`, `created_at`, `updated_at`) VALUES
(1, 'admin', '$2y$10$XMm4v0hSNsFMfzmrjbguL.pyyYuaY4wfGoPbBGhKx4xcqdq5VgiUW', 'fU9xM82yZ_N5K0a9G1r3mB4qW6eT7yUi', 'token-admin-1234567890', 'admin@example.com', 10, 1700000000, 1700000000),
(2, 'demo', '$2y$10$G8VZJJAq.1pwJekufKnjK.99OtZyMihtvO5LuZt5Sy..pgxR76rVu', 'eA4mP91xR_T7L2b8V0k5nC3vY8wE2xOp', 'token-demo-1234567890', 'demo@example.com', 10, 1700000000, 1700000000);
