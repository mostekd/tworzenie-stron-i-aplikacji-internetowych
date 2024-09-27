<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To Do</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/1deffa5961.js" crossorigin="anonymous"></script>
</head>
<body>
<div class="todo-app">
    <h1>Todo App</h1>
    <form method="POST" action="index.php">
        <input type="text" name="todo" placeholder="Add your new todo" required>
        <input type="datetime-local" name="deadline" required>
        <button type="submit"><i class="fa-solid fa-plus"></i></button>
    </form>

    <ul class="todo-list">
        <?php
        include 'db_connection.php';

        // Dodawanie nowego zadania do bazy danych
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && !isset($_POST['mark_completed'])) {
            $task = $_POST['todo'];
            $deadline = $_POST['deadline'];
            $query = "INSERT INTO todo_tasks (task, task_deadline) VALUES ('$task', '$deadline')";
            mysqli_query($connection, $query);
        }

        // Pobieranie istniejących zadań z bazy danych
        $result = mysqli_query($connection, "SELECT * FROM todo_tasks");

        // Wyświetlanie zadań w HTML
        while ($row = mysqli_fetch_assoc($result)) {
            $completed_class = isset($row['completed']) && $row['completed'] ? 'completed' : '';

            echo "<li class='$completed_class'>";
            echo "<div><strong>Zadanie:</strong><br>" . $row['task'] . "</div>";
            echo "<div><strong>Do kiedy:</strong><br>" . $row['task_deadline'] . "</div>";
            
            // Przycisk oznaczenia ukończonego zadania
            if (!$row['completed']) {
                echo "<form method='POST' action='mark_completed.php' style='display:inline;'>
                        <input type='hidden' name='task_id' value='" . $row['id_todo'] . "'>
                        <button class='complete-btn'><i class='fa-solid fa-check'></i></button>
                      </form>";
            }

            // Przycisk edycji zadania (jeśli nie jest oznaczone jako ukończone)
            if (!$row['completed']) {
                echo "<form method='GET' action='edit_task.php' style='display:inline;'>
                        <input type='hidden' name='task_id' value='" . $row['id_todo'] . "'>
                        <button class='edit_btn'><i class='fa-solid fa-pencil'></i></button>
                      </form>";
            }

            // Przycisk usuwania zadania
            echo "<form method='POST' action='delete_task.php' style='display:inline;'>
                    <input type='hidden' name='task_id' value='" . $row['id_todo'] . "'>
                    <button class='delete-btn'><i class='fa-solid fa-trash'></i></button>
                  </form>";
            echo "</li>";
        }
        ?>
    </ul>

    <form method="POST" action="clear_all.php">
        <button class="clear-btn">Clear All <i class="fa-solid fa-trash-can"></i></button>
    </form>
</div>
</body>
</html>
