CREATE TABLE `movies` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`title` VARCHAR(50) NOT NULL,
	`year` YEAR NOT NULL,
	`format` CHAR(50) NOT NULL,
	`actors` VARCHAR(100) NOT NULL,
	PRIMARY KEY (`id`)
)
COLLATE='utf8_general_ci'
ENGINE=InnoDB;
ALTER TABLE `movies`
	ADD FULLTEXT INDEX `title_actors` (`title`, `actors`);