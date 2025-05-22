/* Script de création des tables de la base de données de messagerie 
by rich.com this 06-09-2022 at 03:52 pm */

/*  creation de la table des comptes utilisateurs */

CREATE TABLE `messagerie`.`comptes` ( 
    `AccountId` INT NOT NULL AUTO_INCREMENT,  
    `DomainId` INT NOT NULL,  
    `password` VARCHAR(300) NOT NULL,  
    `Email` VARCHAR(100) NOT NULL,  
    PRIMARY KEY (`AccountId`),  
    UNIQUE KEY `Email` (`Email`),  
    FOREIGN KEY (DomainId) REFERENCES domaines(DomainId) ON DELETE CASCADE 
) ENGINE = InnoDB;

/* Création de la table des domaines  */

CREATE TABLE `messagerie`.`domaines` ( 
    `DomainId` INT NOT NULL AUTO_INCREMENT , 
    `DomainName` VARCHAR(50) NOT NULL , PRIMARY KEY (`DomainId`)
) ENGINE = InnoDB;

/* creation de la table des alias  */

CREATE TABLE `messagerie`.`alias` (
    `AliasId` INT NOT NULL AUTO_INCREMENT, 
    `DomainId` INT NOT NULL, 
    `Source` varchar(100) NOT NULL, 
    `Destination` varchar(100) NOT NULL, 
    PRIMARY KEY (`AliasId`), 
    FOREIGN KEY (DomainId) REFERENCES domaines(DomainId) ON DELETE CASCADE
) ENGINE = InnoDB;
