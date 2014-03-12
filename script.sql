SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

DROP SCHEMA IF EXISTS `mydb` ;
CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
SHOW WARNINGS;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `Utilisateur`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Utilisateur` ;

SHOW WARNINGS;
CREATE TABLE IF NOT EXISTS `Utilisateur` (
  `nom` VARCHAR(45) NOT NULL,
  `pass` VARCHAR(45) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `rang` INT NOT NULL,
  PRIMARY KEY (`nom`))
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `Categorie`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Categorie` ;

SHOW WARNINGS;
CREATE TABLE IF NOT EXISTS `Categorie` (
  `nom` VARCHAR(45) NOT NULL,
  `description` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`nom`))
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `Image`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Image` ;

SHOW WARNINGS;
CREATE TABLE IF NOT EXISTS `Image` (
  `url` VARCHAR(100) NOT NULL,
  `url_icone` VARCHAR(100) NOT NULL,
  `description` VARCHAR(500) NOT NULL,
  `titre` VARCHAR(100) NOT NULL,
  `taille` VARCHAR(100) NOT NULL,
  `taille_icone` VARCHAR(100) NOT NULL,
  `note` INT NOT NULL,
  `commentaire` VARCHAR(500) NOT NULL,
  `Utilisateur_nom` VARCHAR(45) NOT NULL,
  `Categorie_nom` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`url`, `Utilisateur_nom`, `Categorie_nom`))
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `Commentaire`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Commentaire` ;

SHOW WARNINGS;
CREATE TABLE IF NOT EXISTS `Commentaire` (
  `id` INT NOT NULL,
  `contenu` VARCHAR(500) NOT NULL,
  `Image_url` VARCHAR(100) NOT NULL,
  `Image_Utilisateur_nom` VARCHAR(45) NOT NULL,
  `Image_Categorie_nom` VARCHAR(45) NOT NULL,
  `Utilisateur_nom` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`, `Image_url`, `Image_Utilisateur_nom`, `Image_Categorie_nom`, `Utilisateur_nom`))
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `Note`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Note` ;

SHOW WARNINGS;
CREATE TABLE IF NOT EXISTS `Note` (
  `valeur` INT NOT NULL,
  `Image_url` VARCHAR(100) NOT NULL,
  `Image_Utilisateur_nom` VARCHAR(45) NOT NULL,
  `Image_Categorie_nom` VARCHAR(45) NOT NULL,
  `Utilisateur_nom` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`Image_url`, `Image_Utilisateur_nom`, `Image_Categorie_nom`, `Utilisateur_nom`))
ENGINE = InnoDB;

SHOW WARNINGS;

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
