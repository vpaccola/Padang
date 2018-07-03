-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema padang
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema padang
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `padang` DEFAULT CHARACTER SET utf8 ;
USE `padang` ;

-- -----------------------------------------------------
-- Table `padang`.`usuarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `padang`.`usuarios` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NULL,
  `email` VARCHAR(45) NULL,
  `senha` VARCHAR(45) NULL,
  `admin` ENUM('1', '0') NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `padang`.`galerias`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `padang`.`galerias` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `padang`.`fotos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `padang`.`fotos` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `galeria_id` INT NOT NULL,
  `path` VARCHAR(45) NULL,
  `thumb` VARCHAR(45) NULL,
  PRIMARY KEY (`id`, `galeria_id`),
  INDEX `fk_fotos_galerias_idx` (`galeria_id` ASC),
  CONSTRAINT `fk_fotos_galerias`
    FOREIGN KEY (`galeria_id`)
    REFERENCES `padang`.`galerias` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
