CREATE DATABASE IF NOT EXISTS register;

CREATE TABLE IF NOT EXISTS users (
    id int (11) NOT NULL AUTO_INCREMENT,
    firstname varchar(255) NOT NULL,
    lastname varchar(255) NOT NULL,
    email int(15) NOT NULL,
    phonenumber varchar(50) NOT NULL,
    other int(255) NOT NULL,
    upload varchar(100) NOT NULL,
    PRIMARY KEY (id)
);