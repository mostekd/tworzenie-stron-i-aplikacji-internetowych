<?php
include 'db_connection.php';

if (isset($_GET['task_id'])) {
    $task_id = $_GET['task_id'];
    $result = mysqli_query($connection, "SELECT * FROM todo_tasks WHERE id_todo = $task_id");
    $task = mysqli_fetch_assoc($result);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $updated_task = $_POST['task'];
        $updated_deadline = $_POST['deadline'];

        $query = "UPDATE todo_tasks SET task = '$updated_task', task_deadline = '$updated_deadline' WHERE id_todo = $task_id";
        mysqli_query($connection, $query);
        header('Location: index.php');
    }
}
?>

<form method="POST">
    <input type="text" name="task" value="<?php echo $task['task']; ?>" required>
    <input type="datetime-local" name="deadline" value="<?php echo date('Y-m-d\TH:i', strtotime($task['task_deadline'])); ?>" required>
    <button type="submit">Update Task</button>
</form>
