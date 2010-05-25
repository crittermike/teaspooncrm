--
-- MySQL 5.0.67
-- Thu, 08 Oct 2009 21:20:51 +0000
--

CREATE TABLE `ci_sessions` (
   `session_id` varchar(40),
   `ip_address` varchar(16),
   `user_agent` varchar(150),
   `last_activity` int(10) unsigned,
   `user_data` text,
   PRIMARY KEY (`session_id`)
) ENGINE=InnoDB DEFAULT CHARSET utf8;

CREATE TABLE `contacts` (
   `id` tinyint(4) NOT NULL AUTO_INCREMENT,
   `name` varchar(256),
   `email` varchar(256),
   `phone` varchar(256),
   `address` text,
   `notes` text,
   PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET latin1;

CREATE TABLE `login_attempts` (
   `id` int(11),
   `ip_address` varchar(40),
   `login` varchar(50),
   `time` timestamp,
   PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET utf8;

CREATE TABLE `settings` (
   `theme` varchar(64)
) ENGINE=MyISAM DEFAULT CHARSET latin1;

CREATE TABLE `user_autologin` (
   `key_id` char(32),
   `user_id` int(11),
   `user_agent` varchar(150),
   `last_ip` varchar(40),
   `last_login` timestamp,
   PRIMARY KEY (`key_id`,`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET utf8;

CREATE TABLE `user_profiles` (
   `id` int(11),
   `user_id` int(11),
   `country` varchar(20),
   `website` varchar(255),
   PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET utf8;

CREATE TABLE `users` (
   `id` int(11),
   `username` varchar(50),
   `password` varchar(255),
   `email` varchar(100),
   `activated` tinyint(1),
   `banned` tinyint(1),
   `ban_reason` varchar(255),
   `new_password_key` varchar(50),
   `new_password_requested` datetime,
   `new_email` varchar(100),
   `new_email_key` varchar(50),
   `last_ip` varchar(40),
   `last_login` datetime,
   `created` datetime,
   `modified` timestamp,
   PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET utf8;

