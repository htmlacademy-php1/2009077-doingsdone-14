CREATE DATABASE doingsdone 
    DEFAULT CHARACTER SET UTF8
    DEFAULT COLLATE utf8_general_ci;

USE doingsdone;

CREATE TABLE projects (
  	id INT AUTO_INCREMENT PRIMARY KEY,	
  	name VARCHAR(128) NOT NULL,
    user_id INT
);

CREATE TABLE tasks (
  	id INT AUTO_INCREMENT PRIMARY KEY,
    created_at TIMESTAMP,
    done DEFAULT NULL,
    name VARCHAR(128) NOT NULL,
    file VARCHAR(500),
    end_date TIMESTAMP,
    user_id INT,
    project_id INT
);

CREATE TABLE user (
  	id INT AUTO_INCREMENT PRIMARY KEY,
    created_at TIMESTAMP,
    email VARCHAR(128) NOT NULL UNIQUE,
    name VARCHAR(128) NOT NULL,
    password NOT NULL
);





