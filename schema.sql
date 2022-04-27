CREATE DATABASE doingsdone (
    DEFAULT CHARACTER SET UTF8
    DEFAULT COLLATE utf8_general_ci
;)

USE doingsdone;

CREATE TABLE projects (
  	id INT AUTO_INCREMENT PRIMARY KEY,	
  	name VARCHAR(128) NOT NULL
;)

CREATE TABLE projectsuser (
    id INT FOREIGN KEY REFERENCES projects(id),
    name INT FOREIGN KEY REFERENCES user(name),
    PRIMARY KEY (id, name)
;)

CREATE TABLE tasks (
  	id INT AUTO_INCREMENT PRIMARY KEY,
    created_at TIMESTAMP,
    done DEFAULT NULL,
    name VARCHAR(128) NOT NULL,
    file VARCHAR(500),
    end_date TIMESTAMP
;)

CREATE TABLE tasksuser (
    id INT FOREIGN KEY REFERENCES tasks(id),
    name INT FOREIGN KEY REFERENCES user(name),
    PRIMARY KEY (id, name)
;)

CREATE TABLE tasksprojects (
    id INT FOREIGN KEY REFERENCES tasks(id),
    id INT FOREIGN KEY REFERENCES projects(id),
    PRIMARY KEY (id, id)
;)

CREATE TABLE user (
  	id INT AUTO_INCREMENT PRIMARY KEY,
    created_at TIMESTAMP,
    email VARCHAR(128) NOT NULL UNIQUE,
    name VARCHAR(128) NOT NULL,
    password NOT NULL UNIQUE
;)





