<?php
include 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $query = "DELETE FROM todo_tasks";
    mysqli_query($connection, $query);
    header('Location: index.php');
}
?>
