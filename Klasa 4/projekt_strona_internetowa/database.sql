CREATE DATABASE IF NOT EXISTS climbing_gym;

USE climbing_gym;

CREATE TABLE IF NOT EXISTS routes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    difficulty VARCHAR(50) NOT NULL,
    description TEXT
);
