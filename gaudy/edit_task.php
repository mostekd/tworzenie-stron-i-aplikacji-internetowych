<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Task</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/1deffa5961.js" crossorigin="anonymous"></script>
</head>
<body>
<div class="todo-app">
    <h1>Todo App Edit Task</h1>

    <?php
    include 'db_connection.php';
    if (isset($_GET['task_id'])) {
        $task_id = $_GET['task_id'];
        $result = mysqli_query($connection, "SELECT * FROM todo_tasks WHERE id_todo = $task_id");
        $task_data = mysqli_fetch_assoc($result);
    }

    if (isset($_POST['update_task'])) {
        $task = $_POST['todo'];
        $deadline = $_POST['deadline'];
        $task_id = $_POST['task_id'];

        mysqli_query($connection, "UPDATE todo_tasks SET task = '$task', task_deadline = '$deadline' WHERE id_todo = $task_id");
        header("Location: index.php");
    }
    ?>

    <form method="POST" action="edit_task.php">
        <p>Treść zadania:</p>
        <input type="text" name="todo" placeholder="Edit your todo" value="<?php echo $task_data['task']; ?>" required>
        <p>Do kiedy:</p>
        <input type="datetime-local" name="deadline" value="<?php echo date('Y-m-d\TH:i', strtotime($task_data['task_deadline'])); ?>" required>
        <input type="hidden" name="task_id" value="<?php echo $task_id; ?>">
        <button type="submit" name="update_task">Zmień wpis</button>
    </form>
</div>
</body>
</html>
