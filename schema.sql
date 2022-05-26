CREATE DATABASE doingsdone 
    DEFAULT CHARACTER SET UTF8
    DEFAULT COLLATE utf8_general_ci;

USE doingsdone;

CREATE TABLE users (
  	id INT AUTO_INCREMENT PRIMARY KEY,
    created_at TIMESTAMP,
    email VARCHAR(128) NOT NULL UNIQUE,
    name VARCHAR(128) NOT NULL,
    password VARCHAR(20) NOT NULL
);

CREATE TABLE projects (
  	id INT AUTO_INCREMENT PRIMARY KEY,	
  	name VARCHAR(128) NOT NULL,
    user_id INT NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(id)
);

CREATE TABLE tasks (
  	id INT AUTO_INCREMENT PRIMARY KEY,
    created_at TIMESTAMP,
    done TINYINT DEFAULT 0,
    name VARCHAR(128) NOT NULL,
    file VARCHAR(500),
    end_date TIMESTAMP, null
    user_id INT NOT NULL,
    project_id INT NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (project_id) REFERENCES projects(id)
);





