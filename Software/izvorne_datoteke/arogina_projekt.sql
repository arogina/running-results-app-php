-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema WebDiP2021x092
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema WebDiP2021x092
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `WebDiP2021x092` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ;
USE `WebDiP2021x092` ;

-- -----------------------------------------------------
-- Table `WebDiP2021x092`.`tip_korisnika`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `WebDiP2021x092`.`tip_korisnika` (
  `tip_korisnika_id` INT NOT NULL AUTO_INCREMENT,
  `naziv` VARCHAR(20) NOT NULL,
  PRIMARY KEY (`tip_korisnika_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `WebDiP2021x092`.`korisnik`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `WebDiP2021x092`.`korisnik` (
  `korisnik_id` INT NOT NULL AUTO_INCREMENT,
  `ime` VARCHAR(20) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL,
  `prezime` VARCHAR(30) NOT NULL,
  `korisnicko_ime` VARCHAR(25) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `lozinka` VARCHAR(20) NOT NULL,
  `lozinka_sha256` CHAR(100) NOT NULL,
  `sol` VARCHAR(10) NOT NULL,
  `broj_neuspjesnih_prijava` INT NOT NULL DEFAULT 0,
  `datum_registracije` DATETIME NOT NULL,
  `aktiviran` TINYINT NOT NULL DEFAULT 0,
  `blokiran` TINYINT NOT NULL DEFAULT 0,
  `uvjeti_koristenja` TINYINT NOT NULL,
  `aktivacijski_kod` VARCHAR(10) NOT NULL,
  `tip_korisnika_tip_korisnika_id` INT NOT NULL DEFAULT 1,
  PRIMARY KEY (`korisnik_id`),
  UNIQUE INDEX `lozinka_sha256_UNIQUE` (`lozinka_sha256` ASC),
  UNIQUE INDEX `lozinka_UNIQUE` (`lozinka` ASC),
  INDEX `fk_korisnik_tip_korisnika_idx` (`tip_korisnika_tip_korisnika_id` ASC),
  CONSTRAINT `fk_korisnik_tip_korisnika`
    FOREIGN KEY (`tip_korisnika_tip_korisnika_id`)
    REFERENCES `WebDiP2021x092`.`tip_korisnika` (`tip_korisnika_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `WebDiP2021x092`.`drzava`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `WebDiP2021x092`.`drzava` (
  `drzava_id` INT NOT NULL AUTO_INCREMENT,
  `naziv` VARCHAR(45) NOT NULL,
  `oznaka` CHAR(3) NOT NULL,
  `kontinent` VARCHAR(15) NOT NULL,
  PRIMARY KEY (`drzava_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `WebDiP2021x092`.`tip_utrke`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `WebDiP2021x092`.`tip_utrke` (
  `tip_utrke_id` INT NOT NULL AUTO_INCREMENT,
  `naziv` VARCHAR(20) NOT NULL,
  `kratica` CHAR(5) NOT NULL,
  PRIMARY KEY (`tip_utrke_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `WebDiP2021x092`.`moderira`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `WebDiP2021x092`.`moderira` (
  `korisnik_korisnik_id` INT NOT NULL,
  `drzava_drzava_id` INT NOT NULL,
  PRIMARY KEY (`korisnik_korisnik_id`, `drzava_drzava_id`),
  INDEX `fk_korisnik_has_drzava_drzava1_idx` (`drzava_drzava_id` ASC),
  INDEX `fk_korisnik_has_drzava_korisnik1_idx` (`korisnik_korisnik_id` ASC),
  CONSTRAINT `fk_korisnik_has_drzava_korisnik1`
    FOREIGN KEY (`korisnik_korisnik_id`)
    REFERENCES `WebDiP2021x092`.`korisnik` (`korisnik_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_korisnik_has_drzava_drzava1`
    FOREIGN KEY (`drzava_drzava_id`)
    REFERENCES `WebDiP2021x092`.`drzava` (`drzava_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `WebDiP2021x092`.`utrka`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `WebDiP2021x092`.`utrka` (
  `utrka_id` INT NOT NULL AUTO_INCREMENT,
  `naziv` VARCHAR(45) NOT NULL,
  `rok_prijave` DATE NOT NULL,
  `zavrsena` TINYINT NOT NULL,
  `tip_utrke_tip_utrke_id` INT NOT NULL,
  `drzava_drzava_id` INT NOT NULL,
  PRIMARY KEY (`utrka_id`),
  INDEX `fk_utrka_tip_utrke1_idx` (`tip_utrke_tip_utrke_id` ASC),
  INDEX `fk_utrka_drzava1_idx` (`drzava_drzava_id` ASC),
  CONSTRAINT `fk_utrka_tip_utrke1`
    FOREIGN KEY (`tip_utrke_tip_utrke_id`)
    REFERENCES `WebDiP2021x092`.`tip_utrke` (`tip_utrke_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_utrka_drzava1`
    FOREIGN KEY (`drzava_drzava_id`)
    REFERENCES `WebDiP2021x092`.`drzava` (`drzava_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `WebDiP2021x092`.`prijavio`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `WebDiP2021x092`.`prijavio` (
  `korisnik_korisnik_id` INT NOT NULL,
  `utrka_utrka_id` INT NOT NULL,
  `datum_prijave` DATE NOT NULL,
  `godina_rodenja` INT NOT NULL,
  `slika` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`korisnik_korisnik_id`, `utrka_utrka_id`),
  INDEX `fk_korisnik_has_utrka_utrka1_idx` (`utrka_utrka_id` ASC),
  INDEX `fk_korisnik_has_utrka_korisnik1_idx` (`korisnik_korisnik_id` ASC),
  CONSTRAINT `fk_korisnik_has_utrka_korisnik1`
    FOREIGN KEY (`korisnik_korisnik_id`)
    REFERENCES `WebDiP2021x092`.`korisnik` (`korisnik_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_korisnik_has_utrka_utrka1`
    FOREIGN KEY (`utrka_utrka_id`)
    REFERENCES `WebDiP2021x092`.`utrka` (`utrka_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `WebDiP2021x092`.`etapa`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `WebDiP2021x092`.`etapa` (
  `etapa_id` INT NOT NULL AUTO_INCREMENT,
  `naziv` VARCHAR(25) NOT NULL,
  `vrijeme_pocetka` DATETIME NOT NULL,
  `zavrsena` TINYINT NOT NULL,
  `utrka_utrka_id` INT NOT NULL,
  PRIMARY KEY (`etapa_id`),
  INDEX `fk_etapa_utrka1_idx` (`utrka_utrka_id` ASC),
  CONSTRAINT `fk_etapa_utrka1`
    FOREIGN KEY (`utrka_utrka_id`)
    REFERENCES `WebDiP2021x092`.`utrka` (`utrka_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `WebDiP2021x092`.`rezultat`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `WebDiP2021x092`.`rezultat` (
  `korisnik_korisnik_id` INT NOT NULL,
  `etapa_etapa_id` INT NOT NULL,
  `vrijeme` TIME NOT NULL,
  `bodovi` INT NOT NULL DEFAULT 0,
  `zavrsio` TINYINT NOT NULL DEFAULT 0,
  `pobjednik` TINYINT NOT NULL DEFAULT 0,
  PRIMARY KEY (`korisnik_korisnik_id`, `etapa_etapa_id`),
  INDEX `fk_korisnik_has_etapa_etapa1_idx` (`etapa_etapa_id` ASC),
  INDEX `fk_korisnik_has_etapa_korisnik1_idx` (`korisnik_korisnik_id` ASC),
  CONSTRAINT `fk_korisnik_has_etapa_korisnik1`
    FOREIGN KEY (`korisnik_korisnik_id`)
    REFERENCES `WebDiP2021x092`.`korisnik` (`korisnik_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_korisnik_has_etapa_etapa1`
    FOREIGN KEY (`etapa_etapa_id`)
    REFERENCES `WebDiP2021x092`.`etapa` (`etapa_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `WebDiP2021x092`.`aktivnost`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `WebDiP2021x092`.`aktivnost` (
  `aktivnost_id` INT NOT NULL AUTO_INCREMENT,
  `naziv` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`aktivnost_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `WebDiP2021x092`.`dnevnik_rada`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `WebDiP2021x092`.`dnevnik_rada` (
  `aktivnost_aktivnost_id` INT NOT NULL,
  `korisnik_korisnik_id` INT NOT NULL,
  `vrijeme` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `opis` VARCHAR(80) NOT NULL,
  PRIMARY KEY (`aktivnost_aktivnost_id`, `korisnik_korisnik_id`),
  INDEX `fk_aktivnost_has_korisnik_korisnik1_idx` (`korisnik_korisnik_id` ASC),
  INDEX `fk_aktivnost_has_korisnik_aktivnost1_idx` (`aktivnost_aktivnost_id` ASC),
  CONSTRAINT `fk_aktivnost_has_korisnik_aktivnost1`
    FOREIGN KEY (`aktivnost_aktivnost_id`)
    REFERENCES `WebDiP2021x092`.`aktivnost` (`aktivnost_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_aktivnost_has_korisnik_korisnik1`
    FOREIGN KEY (`korisnik_korisnik_id`)
    REFERENCES `WebDiP2021x092`.`korisnik` (`korisnik_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
