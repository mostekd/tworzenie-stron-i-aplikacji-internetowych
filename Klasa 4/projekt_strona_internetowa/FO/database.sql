CREATE DATABASE IF NOT EXISTS climbing_gym;

USE climbing_gym;

CREATE TABLE IF NOT EXISTS difficulties (
    difficulty_id INT AUTO_INCREMENT PRIMARY KEY,
    level VARCHAR(50) NOT NULL
);

CREATE TABLE IF NOT EXISTS routes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    difficulty_id INT NOT NULL,
    description TEXT,
    location VARCHAR(255) NOT NULL,
    latitude FLOAT NOT NULL,
    longitude FLOAT NOT NULL,
    FOREIGN KEY (difficulty_id) REFERENCES difficulties(difficulty_id)
);

INSERT INTO difficulties (level) VALUES
('1-'), ('1'), ('1+'), ('2-'), ('2'), ('2+'), ('3-'), ('3'), ('3+'), ('4-'), ('4'), ('4+'), ('5-'), ('5'), ('5+'), ('6-'), ('6'), ('6+'), ('6.1-'), ('6.1'), ('6.1+'), ('6.2-'), ('6.2'), ('6.2+'), ('6.3-'), ('6.3'), ('6.3+'), ('6.4-'), ('6.4'), ('6.4+'), ('6.5-'), ('6.5'), ('6.5+'), ('6.6-'), ('6.6'), ('6.6+'), ('6.7-'), ('6.7'), ('6.7+'), ('6.8-'), ('6.8'), ('6.8+');
