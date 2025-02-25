<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Route</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script src="script.js"></script>
</head>
<body>
    <form action="save_route.php" method="post">
        <input type="text" name="name" placeholder="Name">
        <select name="difficulty_id">
            <?php
                include_once("../DB/db_climbing.php");
                $db = new db_climbing();
                $data = $db->selectDifficulties();
                while($row = mysqli_fetch_assoc($data))
                {
                    echo "<option value='".$row['id']."'>".$row['level']."</option>";
                }
            ?>
        </select> 
        <input type="text" name="description" placeholder="Description">
        <div id="map" style="height: 400px; width: 100%;"></div>
        <input type="hidden" name="latitude" id="latitude">
        <input type="hidden" name="longitude" id="longitude">
        <button type="submit">Add Route</button>
    </form>
</body>
</html>