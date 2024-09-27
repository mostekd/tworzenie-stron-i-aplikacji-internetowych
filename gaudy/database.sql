create database if not exists todo;
use todo;

create table todo_tasks (
    id_todo int primary key auto_increment,
    task_name varchar(255) not null,
    task_description text not null,
    task_deadline datetime
);