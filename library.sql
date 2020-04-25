SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

DROP TABLE IF EXISTS `books`;
CREATE TABLE `books` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `isbn` varchar(17) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`),
  KEY `isbn` (`isbn`),
  CONSTRAINT `books_fk_1` FOREIGN KEY (`isbn`) REFERENCES `books_info` (`isbn`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `books_info`;
CREATE TABLE `books_info` (
  `isbn` varchar(17) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `title` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `category` int(10) NOT NULL AUTO_INCREMENT,
  `author` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `publisher` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `cover` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `intro` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `total` int(10) NOT NULL,
  `available` int(10) NOT NULL,
  `location` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`isbn`),
  KEY `isbn` (`isbn`),
  KEY `category` (`category`),
  CONSTRAINT `books_info_fk_1` FOREIGN KEY (`category`) REFERENCES `categories` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `lent`;
CREATE TABLE `lent` (
  `uid` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `bid` int(10) NOT NULL AUTO_INCREMENT,
  `lent_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `due_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`uid`,`bid`),
  KEY `bid` (`bid`),
  KEY `uid` (`uid`),
  CONSTRAINT `lent_fk_1` FOREIGN KEY (`uid`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `lent_fk_2` FOREIGN KEY (`bid`) REFERENCES `books` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `returned`;
CREATE TABLE `returned` (
  `uid` varchar(15) NOT NULL,
  `bid` int(10) NOT NULL AUTO_INCREMENT,
  `lent_at` timestamp NULL DEFAULT NULL,
  `returned_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`uid`,`bid`),
  KEY `bid` (`bid`),
  KEY `uid` (`uid`),
  CONSTRAINT `returned_fk_1` FOREIGN KEY (`uid`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `returned_fk_2` FOREIGN KEY (`bid`) REFERENCES `books` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `name` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `phone` varchar(11) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `debt` decimal(10,2) NOT NULL DEFAULT '0.00',
  `authority` tinyint(1) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`),
  KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP VIEW IF EXISTS `view_books`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_books` AS
select `books_info`.`isbn` AS `isbn`,`books_info`.`title` AS `title`,`categories`.`name` AS `category`,`books_info`.`total` AS `total`,`books_info`.`available` AS `available`
from (`books_info` join `categories`)
where (`books_info`.`category` = `categories`.`id`);

DROP VIEW IF EXISTS `view_overdue`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_overdue` AS
select `users`.`id` AS `id`,`users`.`name` AS `name`,`books_info`.`title` AS `title`,`lent`.`lent_at` AS `borrow_at`,`lent`.`due_at` AS `due_at`
from (((`users` join `books_info`) join `books`) join `lent`)
where ((`users`.`id` = `lent`.`uid`) and (`books_info`.`isbn` = `books`.`isbn`) and (`books`.`id` = `lent`.`bid`) and (`lent`.`due_at` < now()));

DROP PROCEDURE IF EXISTS `query_records`;
delimiter $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `query_records`(IN rid VARCHAR(15))
BEGIN
  SELECT books_info.isbn, books_info.title, lent_at AS borrow_at, due_at AS due_at
  FROM users, books, books_info, lent
  WHERE users.id = rid AND users.id = lent.uid AND books.id = lent.bid AND books.isbn = books_info.isbn;
  SELECT books_info.isbn, books_info.title, lent_at AS borrow_at, returned_at AS return_at
  FROM users, books, books_info, returned
  WHERE users.id = rid AND users.id = returned.uid AND books.id = returned.bid AND books.isbn = books_info.isbn;
END$$
delimiter ;

DROP PROCEDURE IF EXISTS `update_debt`;
delimiter $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `update_debt`()
BEGIN
  DECLARE done INT DEFAULT 0;
  DECLARE uid VARCHAR(15);
  DECLARE cur CURSOR FOR SELECT view_overdue.id FROM view_overdue;
  DECLARE CONTINUE HANDLER FOR SQLSTATE '02000' SET done = 1;
  OPEN cur;
  REPEAT
    FETCH cur INTO uid;
    if done != 1 THEN
      UPDATE users SET debt = debt + 0.5 WHERE users.id = uid;
    END IF;
  UNTIL done END REPEAT;
  CLOSE cur;
END$$
delimiter ;

SET FOREIGN_KEY_CHECKS = 1;