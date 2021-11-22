DROP DATABASE IF EXISTS stuliday;
CREATE DATABASE stuliday CHARACTER SET utf8;
USE stuliday;

CREATE TABLE stuliday.user (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    lastname VARCHAR (25) NOT NULL,
    firstname VARCHAR (50) NOT NULL,
    adress VARCHAR (255) NOT NULL,
    email VARCHAR (200) NOT  NULL,
    username VARCHAR (25) NOT NULL,
    password VARCHAR (512) NOT NULL
);

CREATE TABLE stuliday.location (
    location_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    type VARCHAR (255) NOT NULL,
    capacity INT NOT NULL,
    location_adress VARCHAR (255),
    country VARCHAR (255) NOT NULL,
    description TEXT,
    price FLOAT NOT NULL,
    image VARCHAR (512),
    availablity DATE NOT NULL
);

ALTER TABLE stuliday.user ADD UNIQUE(`username`);


