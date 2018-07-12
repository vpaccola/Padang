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
-- -----------------------------------------------------
-- Schema padang
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema padang
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `padang` DEFAULT CHARACTER SET utf8mb4 ;
USE `padang` ;

-- -----------------------------------------------------
-- Table `padang`.`usuarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `padang`.`usuarios` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) CHARACTER SET 'utf8mb4' COLLATE 'utf8mb4_unicode_ci' NULL DEFAULT NULL,
  `email` VARCHAR(45) CHARACTER SET 'utf8mb4' COLLATE 'utf8mb4_unicode_ci' NULL DEFAULT NULL,
  `senha` VARCHAR(45) CHARACTER SET 'utf8mb4' COLLATE 'utf8mb4_unicode_ci' NULL DEFAULT NULL,
  `admin` ENUM('1', '0') CHARACTER SET 'utf8mb4' COLLATE 'utf8mb4_unicode_ci' NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `padang`.`eventos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `padang`.`eventos` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(100) NULL,
  `data` DATE NULL,
  `hora` TIME NULL,
  `endereco` VARCHAR(45) NULL,
  `usuario_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`, `usuario_id`),
  INDEX `fk_evento_usuarios_idx` (`usuario_id` ASC),
  CONSTRAINT `fk_evento_usuarios`
    FOREIGN KEY (`usuario_id`)
    REFERENCES `padang`.`usuarios` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `padang`.`sessoes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `padang`.`sessoes` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `data` DATE NULL,
  `hora` TIME NULL,
  `usuario_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`, `usuario_id`),
  INDEX `fk_sessoes_usuarios1_idx` (`usuario_id` ASC),
  CONSTRAINT `fk_sessoes_usuarios1`
    FOREIGN KEY (`usuario_id`)
    REFERENCES `padang`.`usuarios` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

USE `padang` ;

-- -----------------------------------------------------
-- Table `padang`.`galerias`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `padang`.`galerias` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) CHARACTER SET 'utf8mb4' COLLATE 'utf8mb4_unicode_ci' NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 8
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `padang`.`fotos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `padang`.`fotos` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `galeria_id` INT(11) NOT NULL,
  `path` VARCHAR(45) CHARACTER SET 'utf8mb4' COLLATE 'utf8mb4_unicode_ci' NULL DEFAULT NULL,
  `thumb` VARCHAR(45) CHARACTER SET 'utf8mb4' COLLATE 'utf8mb4_unicode_ci' NULL DEFAULT NULL,
  PRIMARY KEY (`id`, `galeria_id`),
  INDEX `fk_fotos_galerias_idx` (`galeria_id` ASC),
  CONSTRAINT `fk_fotos_galerias`
    FOREIGN KEY (`galeria_id`)
    REFERENCES `padang`.`galerias` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 10
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
