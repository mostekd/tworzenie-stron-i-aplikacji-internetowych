<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Routes</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script src="script.js"></script>
</head>
<body>
    <?php
        include_once("../DB/db_climbing.php");
        $db = new db_climbing();
        $data = $db->selectRoutes();
        while($row = mysqli_fetch_assoc($data))
        {
            echo "<div>";
            echo "<h1>".$row['name']."</h1>";
            echo "<p>".$row['description']."</p>";
            echo "<div id='map".$row['id']."' style='height: 400px; width: 100%;'></div>";
            echo "</div>";
        }
    ?>
</body>
</html>