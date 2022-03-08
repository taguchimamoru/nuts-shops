-- Adminer 4.8.1 MySQL 5.7.28 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `customer`;
CREATE TABLE `customer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `login` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `login` (`login`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `customer` (`id`, `name`, `address`, `email`, `login`, `password`) VALUES
(1,	'熊木 和夫',	'静岡県静岡市葵区追手町9-6',	'kumanoki@yahoo.ne.jp',	'kumaki',	'BearTree1'),
(13,	'田口守',	'秋田県秋田市河辺三内字野崎5-2',	'mamoru@yahoo.ne.jp',	'Tagu',	'$2y$10$PoBhkVVz3lW/WZNNIFYq/.Cpshqgs8lvvXpKsW/QTbapxlLfVhvdi'),
(19,	'小西',	'福岡県福岡市博多区東公園7-7	',	'atsuro@softbank.ne.jp',	'konisi',	'$2y$10$dNes9IJkkH1KMXjyZwWdvuGoQPDwTtGHSikZ6jOXckubSXLco4Vam');

DROP TABLE IF EXISTS `favorite`;
CREATE TABLE `favorite` (
  `customer_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  PRIMARY KEY (`customer_id`,`product_id`),
  KEY `product_id` (`product_id`),
  CONSTRAINT `favorite_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`),
  CONSTRAINT `favorite_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `favorite` (`customer_id`, `product_id`) VALUES
(1,	1);

DROP TABLE IF EXISTS `product`;
CREATE TABLE `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `price` int(11) NOT NULL,
  `images` blob,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `product` (`id`, `name`, `price`, `images`) VALUES
(1,	'松の実',	700,	NULL),
(2,	'くるみ',	270,	NULL),
(3,	'ひまわりの種',	120,	NULL),
(4,	'アーモンド',	540,	NULL),
(5,	'カシューナッツ',	250,	NULL),
(6,	'ジャイアントコーン',	180,	NULL),
(7,	'ピスタチオ',	310,	NULL),
(8,	'マカダミアナッツ',	600,	NULL),
(9,	'かぼちゃの種',	180,	NULL),
(10,	'ピーナッツ',	150,	NULL),
(11,	'クコの実',	400,	NULL),
(12,	'落花生',	1200,	NULL),
(13,	'甘納豆',	700,	'a:1:{i:0;s:21:\"upload/h_item0128.jpg\";}'),
(14,	'ピスタチオ',	580,	'a:1:{i:0;s:11:\"upload/.jpg\";}');

DROP TABLE IF EXISTS `purchase`;
CREATE TABLE `purchase` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `customer_id` (`customer_id`),
  CONSTRAINT `purchase_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `purchase` (`id`, `customer_id`, `date`) VALUES
(1,	1,	'2022-02-25 02:25:11'),
(2,	19,	'2022-03-01 23:44:33'),
(3,	19,	'2022-03-01 23:45:39'),
(4,	19,	'2022-03-03 01:12:09');

DROP TABLE IF EXISTS `purchase_detail`;
CREATE TABLE `purchase_detail` (
  `purchase_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `count` int(11) NOT NULL,
  PRIMARY KEY (`purchase_id`,`product_id`),
  KEY `product_id` (`product_id`),
  CONSTRAINT `purchase_detail_ibfk_1` FOREIGN KEY (`purchase_id`) REFERENCES `purchase` (`id`),
  CONSTRAINT `purchase_detail_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `purchase_detail` (`purchase_id`, `product_id`, `count`) VALUES
(1,	1,	1),
(2,	1,	1),
(3,	1,	3),
(4,	4,	2),
(4,	5,	1),
(4,	13,	4);

-- 2022-03-07 04:26:48
