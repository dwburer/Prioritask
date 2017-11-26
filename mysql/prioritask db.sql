-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema prioritask
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema prioritask
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `prioritask` DEFAULT CHARACTER SET latin1 ;
USE `prioritask` ;

-- -----------------------------------------------------
-- Table `prioritask`.`users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `prioritask`.`users` (
  `userid` INT(11) NOT NULL AUTO_INCREMENT,
  `email` VARCHAR(45) NOT NULL,
  `password` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`userid`))
ENGINE = InnoDB
AUTO_INCREMENT = 21
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `prioritask`.`sessions`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `prioritask`.`sessions` (
  `sid` VARCHAR(255) NOT NULL,
  `timestamp` INT(255) NULL DEFAULT NULL,
  `userid` INT(11) NOT NULL,
  INDEX `uswer_idx` (`userid` ASC),
  CONSTRAINT `uswer`
    FOREIGN KEY (`userid`)
    REFERENCES `prioritask`.`users` (`userid`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `prioritask`.`task`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `prioritask`.`task` (
  `taskid` INT(11) NOT NULL AUTO_INCREMENT,
  `userid` INT(11) NOT NULL,
  `task_name` VARCHAR(45) CHARACTER SET 'big5' NOT NULL,
  `when_due` DATETIME NOT NULL,
  `time_to_complete` TIME NOT NULL COMMENT 'expected time to complete',
  `notes` TEXT NOT NULL,
  `location` VARCHAR(45) NOT NULL,
  `completed` INT(1) NULL DEFAULT '0',
  `dc` INT(11) NULL DEFAULT NULL,
  `hc` INT(11) NULL DEFAULT NULL,
  `mc` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`taskid`),
  INDEX `userid` (`userid` ASC),
  CONSTRAINT `user`
    FOREIGN KEY (`userid`)
    REFERENCES `prioritask`.`users` (`userid`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
AUTO_INCREMENT = 45
DEFAULT CHARACTER SET = latin1;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
