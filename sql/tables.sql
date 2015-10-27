CREATE TABLE IF NOT EXISTS `Category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1 - active, 0 - disabled',
  `parentId` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;


CREATE TABLE IF NOT EXISTS `Product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `part_number` varchar(255) NOT NULL,
  `description` varchar(260) CHARACTER SET ucs2 NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1 - active, 0 - disabled',
  `categoryId` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `category` (`categoryId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;


ALTER TABLE `Product` ADD CONSTRAINT `category` FOREIGN KEY (`categoryId`) REFERENCES `Category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;