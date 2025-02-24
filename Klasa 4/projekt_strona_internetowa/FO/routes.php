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
            <?php
                include_once("../DB/db_climbing.php");
                $db = new db_climbing();
                $data = $db->selectRoutes();
                while($row = $data->fetch_assoc()) {
                    echo "<div class='route'>";
                    echo "<h3>".$row['name']."</h3>";
                    echo "<p>".$row['description']."</p>";
                    echo "<div id='map".$row['id']."' class='route-map'></div>";
                    echo "<script>initMap(".$row['latitude'].", ".$row['longitude'].", 'map".$row['id']."');</script>";
                    echo "</div>";
                }
            ?>
        </section>
    </main>
    <footer>
        <p>&copy; 2023 Climbing Gym. All rights reserved.</p>
    </footer>
</body>
</html>