<?php
include 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $task_id = $_POST['task_id'];
    $query = "DELETE FROM todo_tasks WHERE id_todo = $task_id";
    mysqli_query($connection, $query);
    header('Location: index.php');
}
?>
