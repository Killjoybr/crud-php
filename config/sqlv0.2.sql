-- MySQL Script generated by MySQL Workbench
-- Tue Jun 17 15:54:47 2025
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------

create database if not exists desenvolvimento;

use desenvolvimento;

-- -----------------------------------------------------
-- Table `usuario_tipo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `usuario_tipo` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `descricao` VARCHAR(30) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `usuario` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  `senha` VARCHAR(255) NOT NULL,
  `endereco_id` INT NULL,
  `usuario_tipo` INT NULL,
  `cpf` VARCHAR(11) NOT NULL,
  `telefone` VARCHAR(14) NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `usuario_tipo`
    FOREIGN KEY (`usuario_tipo`)
    REFERENCES `usuario_tipo` (`id`)
)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `contrato`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `contrato` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `data_inicio` DATETIME NOT NULL,
  `data_fim` DATETIME NOT NULL,
  `cliente_id` INT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `cliente_id`
    FOREIGN KEY (`cliente_id`)
    REFERENCES `usuario` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `endereco`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `endereco` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `rua` VARCHAR(45) NULL,
  `logradouro` VARCHAR(45) NULL,
  `cep` VARCHAR(45) NOT NULL,
  `quadra` VARCHAR(45) NOT NULL,
  `lote` VARCHAR(45) NULL,
  `casa` VARCHAR(45) NULL,
  `apartamento` VARCHAR(45) NULL,
  `usuario_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `usuario_id`
    FOREIGN KEY (`usuario_id`)
    REFERENCES `usuario` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ponto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ponto` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `hora_inicio` DATETIME,
  `hora_fim` DATETIME,
  `usuario_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `ponto_usuario_id`
    FOREIGN KEY (`usuario_id`)
    REFERENCES `usuario` (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `paciente_cuidador`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `paciente_cuidador` (
  `id_paciente` INT NOT NULL,
  `id_cuidador` INT NOT NULL,
  CONSTRAINT `id_paciente`
    FOREIGN KEY (`id_paciente`)
    REFERENCES `usuario` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `id_cuidador`
    FOREIGN KEY (`id_cuidador`)
    REFERENCES `usuario` (`id`)
    )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `usuario_contato_emergencia`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `usuario_contato_emergencia` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `relacionamento` VARCHAR(30) NOT NULL,
  `telefone` VARCHAR(11) NOT NULL,
  `id_usuario` INT NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `id_usuario`
    FOREIGN KEY (`id_usuario`)
    REFERENCES `usuario` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
