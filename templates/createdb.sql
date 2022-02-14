DROP DATABASE IF EXISTS basiccrud;

CREATE DATABASE basiccrud;

USE basiccrud;

DROP TABLE IF EXISTS student;

CREATE TABLE student (

id INT NOT NULL AUTO_INCREMENT,

firstName VARCHAR(50),

surname VARCHAR(50),

PRIMARY KEY (id)

);

INSERT INTO student(firstName, surname)
VALUES ('qwe', 'asd');