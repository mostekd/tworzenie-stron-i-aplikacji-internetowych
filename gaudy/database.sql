CREATE DATABASE IF NOT EXISTS todo;
USE todo;

CREATE TABLE IF NOT EXISTS todo_tasks (
    id_todo INT PRIMARY KEY AUTO_INCREMENT,
    task TEXT NOT NULL, 
    task_deadline DATETIME,
    completed TINYINT(1) DEFAULT 0
);
