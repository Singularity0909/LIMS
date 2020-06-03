SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for books
-- ----------------------------
DROP TABLE IF EXISTS `books`;
CREATE TABLE `books` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `isbn` varchar(13) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `id` (`id`),
  KEY `isbn` (`isbn`),
  CONSTRAINT `books_fk_1` FOREIGN KEY (`isbn`) REFERENCES `books_info` (`isbn`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=89 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for books_info
-- ----------------------------
DROP TABLE IF EXISTS `books_info`;
CREATE TABLE `books_info` (
  `isbn` varchar(13) NOT NULL,
  `title` varchar(50) NOT NULL,
  `category` int(10) NOT NULL AUTO_INCREMENT,
  `author` varchar(50) NOT NULL,
  `publisher` varchar(50) NOT NULL,
  `cover` varchar(255) DEFAULT NULL,
  `intro` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `total` int(10) NOT NULL,
  `available` int(10) NOT NULL,
  `location` varchar(50) NOT NULL,
  PRIMARY KEY (`isbn`),
  KEY `isbn` (`isbn`),
  KEY `category` (`category`),
  CONSTRAINT `books_info_fk_1` FOREIGN KEY (`category`) REFERENCES `categories` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for categories
-- ----------------------------
DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for lent
-- ----------------------------
DROP TABLE IF EXISTS `lent`;
CREATE TABLE `lent` (
  `uid` varchar(15) NOT NULL,
  `bid` int(10) NOT NULL AUTO_INCREMENT,
  `lent_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `due_at` timestamp NULL DEFAULT NULL,
  `renewed` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`bid`,`lent_at`) USING BTREE,
  KEY `bid` (`bid`),
  KEY `uid` (`uid`),
  CONSTRAINT `lent_fk_1` FOREIGN KEY (`uid`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `lent_fk_2` FOREIGN KEY (`bid`) REFERENCES `books` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=82 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  KEY `password_resets_email_index` (`email`(191)) USING BTREE,
  KEY `password_resets_token_index` (`token`(191)) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Table structure for returned
-- ----------------------------
DROP TABLE IF EXISTS `returned`;
CREATE TABLE `returned` (
  `uid` varchar(15) NOT NULL,
  `bid` int(10) NOT NULL AUTO_INCREMENT,
  `lent_at` timestamp NULL DEFAULT NULL,
  `returned_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`bid`,`returned_at`) USING BTREE,
  KEY `bid` (`bid`),
  KEY `uid` (`uid`),
  CONSTRAINT `returned_fk_1` FOREIGN KEY (`uid`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `returned_fk_2` FOREIGN KEY (`bid`) REFERENCES `books` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` varchar(15) NOT NULL,
  `name` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `debt` decimal(10,2) NOT NULL DEFAULT '0.00',
  `authority` tinyint(1) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`),
  KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- View structure for view_books
-- ----------------------------
DROP VIEW IF EXISTS `view_books`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_books` AS select `books_info`.`isbn` AS `isbn`,`books_info`.`title` AS `title`,`categories`.`name` AS `category`,`books_info`.`total` AS `total`,`books_info`.`available` AS `available` from (`books_info` join `categories`) where (`books_info`.`category` = `categories`.`id`);

-- ----------------------------
-- View structure for view_overdue
-- ----------------------------
DROP VIEW IF EXISTS `view_overdue`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_overdue` AS select `users`.`id` AS `id`,`users`.`name` AS `name`,`books_info`.`title` AS `title`,`lent`.`lent_at` AS `borrow_at`,`lent`.`due_at` AS `due_at` from (((`users` join `books_info`) join `books`) join `lent`) where ((`users`.`id` = `lent`.`uid`) and (`books_info`.`isbn` = `books`.`isbn`) and (`books`.`id` = `lent`.`bid`) and (`lent`.`due_at` < now()));

-- ----------------------------
-- Procedure structure for query_records
-- ----------------------------
DROP PROCEDURE IF EXISTS `query_records`;
delimiter $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `query_records`(IN uid VARCHAR(15))
BEGIN
  SELECT books.id AS bid, books_info.isbn AS isbn, title, lent_at, due_at
  FROM users, books, books_info, lent
  WHERE users.id = uid AND users.id = lent.uid AND books.id = lent.bid AND books.isbn = books_info.isbn;

  SELECT books.id AS bid, books_info.isbn AS isbn, title, lent_at, returned_at
  FROM users, books, books_info, returned
  WHERE users.id = uid AND users.id = returned.uid AND books.id = returned.bid AND books.isbn = books_info.isbn;
END$$
delimiter ;

-- ----------------------------
-- Procedure structure for update_debt
-- ----------------------------
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
