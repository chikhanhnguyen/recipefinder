-- MySQL Script generated by MySQL Workbench
-- Tue May 11 11:17:55 2021
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema RecipeFinderMCD
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema RecipeFinderMCD
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `RecipeFinderMCD` DEFAULT CHARACTER SET utf8 ;
USE `RecipeFinderMCD` ;

-- -----------------------------------------------------
-- Table `RecipeFinderMCD`.`client`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `RecipeFinderMCD`.`client` (
  `idclient` INT(11) NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(45) NOT NULL,
  `prenom` VARCHAR(45) NOT NULL,
  `telephone` CHAR(10) NOT NULL,
  `mail` VARCHAR(45) NOT NULL,
  `mdp` VARCHAR(45) NOT NULL,
  `adresse` VARCHAR(45) NOT NULL,
  `cp` VARCHAR(45) NOT NULL,
  `ville` VARCHAR(45) NOT NULL,
  `role` ENUM('Cuisinier', 'Client') NOT NULL,
  PRIMARY KEY (`idclient`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `RecipeFinderMCD`.`facture`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `RecipeFinderMCD`.`facture` (
  `idfacture` INT NOT NULL AUTO_INCREMENT,
  `date_facture` DATE NULL,
  `methode_paiement` VARCHAR(45) NULL,
  `total_facture` INT(11) NULL,
  PRIMARY KEY (`idfacture`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `RecipeFinderMCD`.`commande`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `RecipeFinderMCD`.`commande` (
  `idcommande` INT(11) NOT NULL AUTO_INCREMENT,
  `idclient` INT(11) NULL,
  `date_commande` DATE NULL,
  `idfacture` INT(11) NULL,
  `total_commande` INT(11) NULL,
  PRIMARY KEY (`idcommande`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `RecipeFinderMCD`.`produit`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `RecipeFinderMCD`.`produit` (
  `idproduit` INT(11) NOT NULL AUTO_INCREMENT,
  `description` VARCHAR(45) NULL,
  `stock_dispo` INT(11) NULL,
  `prix` INT(11) NULL,
  `photo` VARCHAR(45) NULL,
  PRIMARY KEY (`idproduit`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `RecipeFinderMCD`.`lignes_commande`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `RecipeFinderMCD`.`lignes_commande` (
  `idlignes_commande` INT(11) NOT NULL AUTO_INCREMENT,
  `idcommande` INT(11) NULL,
  `idproduit` INT(11) NULL,
  `quantite` INT(11) NULL,
  `prix` DECIMAL(6,2) NULL,
  PRIMARY KEY (`idlignes_commande`),
  CONSTRAINT `fk_idcommande`
    FOREIGN KEY (`idcommande`)
    REFERENCES `RecipeFinderMCD`.`commande` (`idcommande`),
  CONSTRAINT `fk_idproduit`
    FOREIGN KEY (`idproduit`)
    REFERENCES `RecipeFinderMCD`.`produit` (`idproduit`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `RecipeFinderMCD`.`recette`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `RecipeFinderMCD`.`recette` (
  `idrecette` INT(11) NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(255) NULL,
  `photo` LONGBLOB NULL,
  `description` VARCHAR(255) NULL,
  `type` VARCHAR(255) NULL,
  PRIMARY KEY (`idrecette`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `RecipeFinderMCD`.`contenir`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `RecipeFinderMCD`.`contenir` (
  `idcontenir` INT(11) NOT NULL AUTO_INCREMENT,
  `idrecette` INT(11) NULL,
  `idproduit` INT(11) NULL,
  PRIMARY KEY (`idcontenir`),
  INDEX `idrecette_idx` (`idrecette` ASC) ,
  INDEX `idproduit_idx` (`idproduit` ASC) ,
  CONSTRAINT `fk_idrecette`
    FOREIGN KEY (`idrecette`)
    REFERENCES `RecipeFinderMCD`.`recette` (`idrecette`),
  CONSTRAINT `fk1_idproduit`
    FOREIGN KEY (`idproduit`)
    REFERENCES `RecipeFinderMCD`.`produit` (`idproduit`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `RecipeFinderMCD`.`avis`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `RecipeFinderMCD`.`avis` (
  `idavis` INT(11) NOT NULL AUTO_INCREMENT,
  `idclient` INT(11) NULL,
  `idrecette` INT(11) NULL,
  `avis` ENUM('Like', 'Dislike') NULL,
  PRIMARY KEY (`idavis`),
  INDEX `idclient_idx` (`idclient` ASC) ,
  INDEX `idrecette_idx` (`idrecette` ASC) ,
  CONSTRAINT `fk1_idclient`
    FOREIGN KEY (`idclient`)
    REFERENCES `RecipeFinderMCD`.`client` (`idclient`),
  CONSTRAINT `fk1_idrecette`
    FOREIGN KEY (`idrecette`)
    REFERENCES `RecipeFinderMCD`.`recette` (`idrecette`))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
