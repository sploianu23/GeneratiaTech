-- Adminer 4.8.3 MySQL 8.0.16 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `reviews`;
CREATE TABLE `reviews` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `message` varchar(1000) NOT NULL,
  `movie_id` int(6) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `reviews` (`id`, `name`, `email`, `message`, `movie_id`, `created_at`) VALUES
(1,	'Test2',	'Test2@test.com',	'Test',	1,	'2024-10-05 15:15:58'),
(3,	'Stefan Aurel Ploianu',	'stefan.a.ploianu@gmail.com',	'gfdgfd',	1,	'2024-10-05 15:39:07'),
(4,	'Test',	'Test@test.com',	'fsdfdsfs',	3,	'2024-10-05 15:40:55');

-- 2024-10-05 17:47:09
