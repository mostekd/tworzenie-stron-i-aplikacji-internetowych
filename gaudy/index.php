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
            <button type="submit"><i class="fa-solid fa-plus"></i></button>
        </form>

        <ul class="todo-list">
            <li>
                <span>Buy a new gaming laptop</span>
                <button class="edit_btn"><i class="fa-solid fa-pencil"></i></button>
                <button class="delete-btn"><i class="fa-solid fa-trash"></i></button>
            </li>

        </ul>

        <p>You have 4 pending tasks</p>
        <button class="clear-btn">Clear All<i class="fa-solid fa-trash-can"></i></button>
    </div>
</body>
</html>