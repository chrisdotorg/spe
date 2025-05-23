-- DataBase creation script by rich.com 

-- Database creation in case it's not already there
CREATE DATABASE IF NOT EXISTS messagerie;
USE messagerie;

-- Table for domains

CREATE TABLE IF NOT EXISTS domaines (
    DomainId INT NOT NULL AUTO_INCREMENT,
    DomainName VARCHAR(50) NOT NULL,
    PRIMARY KEY (DomainId)
) ENGINE = InnoDB;

-- Table for user accounts

CREATE TABLE IF NOT EXISTS comptes (
    AccountId INT NOT NULL AUTO_INCREMENT,
    DomainId INT NOT NULL,
    password VARCHAR(300) NOT NULL,
    Email VARCHAR(100) NOT NULL,
    PRIMARY KEY (AccountId),
    UNIQUE KEY Email (Email),
    FOREIGN KEY (DomainId) REFERENCES domaines(DomainId) ON DELETE CASCADE
) ENGINE = InnoDB;

-- Alias table creation

CREATE TABLE IF NOT EXISTS alias (
    AliasId INT NOT NULL AUTO_INCREMENT,
    DomainId INT NOT NULL,
    Source VARCHAR(100) NOT NULL,
    Destination VARCHAR(100) NOT NULL,
    PRIMARY KEY (AliasId),
    FOREIGN KEY (DomainId) REFERENCES domaines(DomainId) ON DELETE CASCADE
) ENGINE = InnoDB;

-- Insertion of three domains 

INSERT INTO domaines (DomainName) VALUES
('rich.com'),
('arlis.org'),
('chris.org');

-- Adding three user account

INSERT INTO comptes (DomainId, password, Email) VALUES
(1, MD5('Rich.2000'),'Admin@rich.com'),
(1, MD5('leila'), 'leila@rich.com'),
(2, MD5('boston'), 'boston@arlis.org'),
(3, MD5('christian'), 'christian@chris.org');
