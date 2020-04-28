ALTER TABLE `users` ADD `username` VARCHAR(20) NOT NULL AFTER `last_name`;
ALTER TABLE `users` ADD `password` VARCHAR(20) NOT NULL AFTER `username`;
ALTER TABLE `users` ADD `email` VARCHAR(50) NOT NULL AFTER `password`;


UPDATE `users` SET `username` = 'johnd', `password` = 'john' WHERE `users`.`id` = 1
UPDATE `users` SET `username` = 'jane_smith', `password` = 'janes' WHERE `users`.`id` = 2
UPDATE `users` SET `username` = 'peterp', `password` = 'parker' WHERE `users`.`id` = 6
UPDATE `users` SET `username` = 'waghs', `password` = 'waghs' WHERE `users`.`id` = 7
UPDATE `users` SET `username` = 'john_smith', `password` = 'smithj' WHERE `users`.`id` = 8
UPDATE `users` SET `username` = 'jj', `password` = 'janejo' WHERE `users`.`id` = 9
UPDATE `users` SET `username` = 'mjones', `password` = 'mjones' WHERE `users`.`id` = 10

CREATE TABLE `phpci`.`images` ( `id` INT(5) NOT NULL AUTO_INCREMENT , `name` VARCHAR(20) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;

CREATE TABLE `phpci`.`user_registraion` ( `id` INT(5) NOT NULL AUTO_INCREMENT , `name` VARCHAR(30) NOT NULL , `email` VARCHAR(50) NOT NULL , `password` VARCHAR(50) NOT NULL , `verification_key` VARCHAR(50) NOT NULL , `is_email_verified` ENUM('yes','no') NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;
