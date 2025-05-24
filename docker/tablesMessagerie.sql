/* Script to create tables in the database
 */

/*  user accounts table */

CREATE TABLE `messagerie`.`comptes` ( 
    `AccountId` INT NOT NULL AUTO_INCREMENT,  
    `DomainId` INT NOT NULL,  
    `password` VARCHAR(300) NOT NULL,  
    `Email` VARCHAR(100) NOT NULL,  
    PRIMARY KEY (`AccountId`),  
    UNIQUE KEY `Email` (`Email`),  
    FOREIGN KEY (DomainId) REFERENCES domaines(DomainId) ON DELETE CASCADE 
) ENGINE = InnoDB;

/* domains table  */

CREATE TABLE `messagerie`.`domaines` ( 
    `DomainId` INT NOT NULL AUTO_INCREMENT , 
    `DomainName` VARCHAR(50) NOT NULL , PRIMARY KEY (`DomainId`)
) ENGINE = InnoDB;

/* alias table  */

CREATE TABLE `messagerie`.`alias` (
    `AliasId` INT NOT NULL AUTO_INCREMENT, 
    `DomainId` INT NOT NULL, 
    `Source` varchar(100) NOT NULL, 
    `Destination` varchar(100) NOT NULL, 
    PRIMARY KEY (`AliasId`), 
    FOREIGN KEY (DomainId) REFERENCES domaines(DomainId) ON DELETE CASCADE
) ENGINE = InnoDB;
