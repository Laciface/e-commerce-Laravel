CREATE DATABASE IF NOT EXISTS `shopping`;

USE `shopping`;

SET FOREIGN_KEY_CHECKS = FALSE;

DROP TABLE IF EXISTS `products`;
CREATE TABLE `products`
(
    `id`                INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
    `name`              VARCHAR(100),
    `description`       TEXT NOT NULL,
    `image`             TEXT NOT NULL,
    `type`              TEXT NOT NULL,
    `price`             INT(11) NOT NULL,
    `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`)
);


SET FOREIGN_KEY_CHECKS = TRUE;
