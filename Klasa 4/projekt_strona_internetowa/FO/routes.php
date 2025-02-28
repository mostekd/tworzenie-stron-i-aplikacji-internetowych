<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Routes</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <link rel="stylesheet" href="style.css">
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script src="script.js"></script>
</head>
<body>
    <header>
        <h1>Climbing Routes</h1>
        <nav>
            <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="add_routes.php">Add Route</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <section>
            <h2>Available Routes</h2>
            <form method="get" action="routes.php">
                <label for="difficulty_id">Filter by Difficulty Level:</label>
                <select name="difficulty_id" id="difficulty_id">
                    <option value="">All</option>
                    <?php
                        include_once("../DB/db_climbing.php");
                        $db = new db_climbing();
                        $difficulties = $db->selectDifficulties();
                        while($row = $difficulties->fetch_assoc()) {
                            $selected = isset($_GET['difficulty_id']) && $_GET['difficulty_id'] == $row['difficulty_id'] ? 'selected' : '';
                            echo "<option value='".$row['difficulty_id']."' $selected>".$row['level']."</option>";
                        }
                    ?>
                </select>
                <button type="submit">Filter</button>
            </form>
            <?php
                $difficulty_id = isset($_GET['difficulty_id']) ? $_GET['difficulty_id'] : '';
                if ($difficulty_id) {
                    $data = $db->selectRoutesByDifficulty($difficulty_id);
                } else {
                    $data = $db->selectRoutes();
                }
                while($row = $data->fetch_assoc()) {
                    echo "<div class='route'>";
                    echo "<h3>Nazwa: ".$row['name']."</h3>";
                    echo "<p>Trudność: ".$row['level']."</p>";
                    echo "<p>Opis: ".$row['description']."</p>";
                    echo "<form action='delete_route.php' method='post' onsubmit='return confirm(\"Are you sure you want to delete this route?\");'>";
                    echo "<input type='hidden' name='route_id' value='".$row['id']."'>";
                    echo "<button type='submit' class='delete-button'>Delete</button>";
                    echo "</form>";
                    echo "</div>";
                }
            ?>
        </section>
    </main>
    <footer>
        <p>&copy; 2025 Climbing Gym. All rights reserved.</p>
    </footer>
</body>
</html>