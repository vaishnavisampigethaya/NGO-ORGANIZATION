REATE TABLE `ngo`.`donar` ( `email` VARCHAR(100) NOT NULL , `username` VARCHAR(200) NOT NULL , `address` VARCHAR(600) NOT NULL , `password` VARCHAR(100) NOT NULL , `photo` BLOB NOT NULL , `id_proof` BLOB NOT NULL , PRIMARY KEY (`email`(100))) ENGINE = InnoDB;




CREATE TABLE `ngo`.`donee` ( `email` VARCHAR(100) NOT NULL , `username` VARCHAR(200) NOT NULL , `address` VARCHAR(600) NOT NULL , `password` VARCHAR(100) NOT NULL , `photo` BLOB NOT NULL , `id_proof` BLOB NOT NULL , PRIMARY KEY (`email`(100))) ENGINE = InnoDB;


CREATE TABLE `ngo`.`donated_item` ( `email` VARCHAR(100) NOT NULL , `username` VARCHAR(200) NOT NULL , `address` VARCHAR(600) NOT NULL , `phone` BIGINT(10) NOT NULL , `date` DATE NOT NULL , `prod_photo` BLOB NOT NULL , `product_desc` VARCHAR(800) NOT NULL , PRIMARY KEY (`email`(100))) ENGINE = InnoDB;


ALTER TABLE `donar` ADD `phone` BIGINT(10) NOT NULL AFTER `password`;


ALTER TABLE `donee` ADD `phone` BIGINT(10) NOT NULL AFTER `password`;

CREATE TABLE `ngo`.`available` ( `email` VARCHAR(100) NOT NULL , `username` VARCHAR(200) NOT NULL , `address` VARCHAR(600) NOT NULL , `phone` BIGINT(10) NOT NULL , `date` DATE NOT NULL , `prod_photo` BLOB NOT NULL , `product_desc` VARCHAR(800) NOT NULL , PRIMARY KEY (`email`(100))) ENGINE = InnoDB;




CREATE TABLE `ngo`.`requested_item` ( `email` VARCHAR(100) NOT NULL , `username` VARCHAR(200) NOT NULL , `address` VARCHAR(600) NOT NULL , `phone` BIGINT(10) NOT NULL , `date` DATE NOT NULL , `prod_desc` VARCHAR(800) NOT NULL , PRIMARY KEY (`email`(100))) ENGINE = InnoDB;


ALTER TABLE `available` CHANGE `date` `date` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP;

ALTER TABLE `requested_item` CHANGE `date` `date` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP;

ALTER TABLE `requested_item` ADD `qnty` INT NOT NULL AFTER `date`;


ALTER TABLE `available` ADD `qnty` INT NOT NULL AFTER `date`;

CREATE TABLE `ngo`. ( `type` VARCHAR(100) NOT NULL ) ENGINE = InnoDB;



INSERT INTO `types` (`type`) VALUES ( 'electronic'), ( 'books');

INSERT INTO `types` ( `type`) VALUES ('food'), ( 'dress');

ALTER TABLE `requested_item` ADD `type` VARCHAR(100) NOT NULL AFTER `qnty`;

ALTER TABLE `available` ADD `type` VARCHAR(100) NOT NULL AFTER `qnty`;
ALTER TABLE `types` ADD PRIMARY KEY(`type`);


ALTER TABLE `donated_item` ADD `qnty` INT NOT NULL AFTER `date`, ADD `type` VARCHAR(100) NOT NULL AFTER `qnty`;
ALTER TABLE `available` DROP PRIMARY KEY;

ALTER TABLE `available` ADD `id` INT NOT NULL AUTO_INCREMENT FIRST, ADD PRIMARY KEY (`id`);

ALTER TABLE `available` ADD CONSTRAINT `f1` FOREIGN KEY (`email`) REFERENCES `donar`(`email`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `available` DROP `username`;
ALTER TABLE `available` DROP `address`;
ALTER TABLE `available` DROP `phone`;
ALTER TABLE `requested_item` DROP PRIMARY KEY;

ALTER TABLE `requested_item` ADD `id` INT NOT NULL AUTO_INCREMENT FIRST, ADD PRIMARY KEY (`id`);

ALTER TABLE `requested_item` ADD CONSTRAINT `f1` FOREIGN KEY (`email`) REFERENCES `donee`(`email`) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE `donated_item` DROP PRIMARY KEY;

ALTER TABLE `donated_item` ADD `id` INT NOT NULL AUTO_INCREMENT FIRST, ADD PRIMARY KEY (`id`);

ALTER TABLE `available` CHANGE `prod_photo` `prod_photo` VARCHAR(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL;

ALTER TABLE `available` CHANGE `date` `date` DATETIME NOT NULL;
ALTER TABLE `available` CHANGE `prod_photo` `photo` VARCHAR(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL;
ALTER TABLE `donated_item` ADD `donar_name` VARCHAR(250) NOT NULL AFTER `product_desc`;

ALTER TABLE `donated_item` CHANGE `prod_photo` `prod_photo` VARCHAR(256) NOT NULL;
ALTER TABLE `donee` CHANGE `photo` `photo` VARCHAR(256) NOT NULL;
ALTER TABLE `donee` CHANGE `id_proof` `id_proof` VARCHAR(256) NOT NULL;
ALTER TABLE `donar` CHANGE `photo` `photo` VARCHAR(256) NOT NULL, CHANGE `id_proof` `id_proof` VARCHAR(256) NOT NULL;
ALTER TABLE `requested_item` CHANGE `date` `date` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP;
ALTER TABLE `donated_item` CHANGE `date` `date` DATETIME NOT NULL;
ALTER TABLE `requested_item` CHANGE `date` `date` DATETIME NOT NULL;







