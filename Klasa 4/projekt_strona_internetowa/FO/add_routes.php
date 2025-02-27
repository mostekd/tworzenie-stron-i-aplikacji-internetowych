<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Route</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <link rel="stylesheet" href="style.css">
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script src="script.js"></script>
</head>
<body>
    <header>
        <h1>Add New Climbing Route</h1>
        <nav>
            <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="routes.php">View Routes</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <section>
            <h2>Route Details</h2>
            <form action="save_route.php" method="post">
                <label for="name">Route Name</label>
                <input type="text" name="name" id="name" placeholder="Name" required>
                
                <label for="difficulty_id">Difficulty Level</label>
                <select name="difficulty_id" id="difficulty_id" required>
                    <?php
                        include_once("../DB/db_climbing.php");
                        $db = new db_climbing();
                        $data = $db->selectDifficulties();
                        while($row = $data->fetch_assoc()) {
                            echo "<option value='".$row['difficulty_id']."'>".$row['level']."</option>";
                        }
                    ?>
                </select>
                
                <label for="description">Description</label>
                <input type="text" name="description" id="description" placeholder="Description" required>
                
                <button type="submit">Add Route</button>
            </form>
        </section>
    </main>
    <footer>
        <p>&copy; 2025 Climbing Gym. All rights reserved.</p>
    </footer>
</body>
</html>