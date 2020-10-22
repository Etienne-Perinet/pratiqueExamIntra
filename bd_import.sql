CREATE DATABASE  IF NOT EXISTS `db_revision_intra` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;
USE `db_revision_intra`;



DROP TABLE IF EXISTS `tbl_evaluation_result`;
DROP TABLE IF EXISTS `tbl_student`;

CREATE TABLE `tbl_student` (
    `id_student` INT(11) NOT NULL AUTO_INCREMENT,
    `last_name` VARCHAR(45) COLLATE UTF8_UNICODE_CI DEFAULT NULL,
    `first_name` VARCHAR(45) COLLATE UTF8_UNICODE_CI DEFAULT NULL,
    PRIMARY KEY (`id_student`)
)  ENGINE=INNODB AUTO_INCREMENT=1 DEFAULT CHARSET=UTF8 COLLATE = UTF8_UNICODE_CI;

CREATE TABLE `tbl_evaluation_result` (
    `id_evaluation_result` INT(11) NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(45) COLLATE UTF8_UNICODE_CI DEFAULT NULL,
    `score` INT(11) NOT NULL,
    `id_student` INT(11) NOT NULL,
    PRIMARY KEY (`id_evaluation_result`),
    INDEX (`id_student`),
    FOREIGN KEY (`id_student`)
        REFERENCES tbl_student (`id_student`)
)  ENGINE=INNODB AUTO_INCREMENT=1 DEFAULT CHARSET=UTF8 COLLATE = UTF8_UNICODE_CI;

DROP procedure IF EXISTS `get_all_students`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `get_all_students`()
BEGIN
	SELECT `id_student`, `first_name`, `last_name`
  FROM `tbl_student`;
END ;;
DELIMITER ;

DROP procedure IF EXISTS `add_evaluation_result`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `add_evaluation_result`(
    `name` VARCHAR(45),
    `score` INT(11),
    `id_student` INT(11)
)
BEGIN
	insert into tbl_evaluation_result(`name`, `score`, `id_student`) 
			values (name, `score`, `id_student`);
END ;;
DELIMITER ;

DROP PROCEDURE IF EXISTS `get_evaluation_result_for_student`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `get_evaluation_result_for_student`(
	IN filter_id_student INT(11)
)
BEGIN
	SELECT id_evaluation_result,
    name,
    score,
    id_student
  FROM tbl_evaluation_result WHERE id_student = filter_id_student ;
END ;;
DELIMITER ;


INSERT INTO `tbl_student`(first_name,last_name) 
  VALUES  ('Lachance','Jean'),
          ('Mercier','Roger'),
          ('Lepetit','Frank');

INSERT INTO `tbl_evaluation_result`(name, score, id_student) 
  VALUES  ('Examen1',75,1),
          ('Travail1',100,1),
          ('Test1',65,1);





