<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Routes</title>
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
            echo "<p>".$row['location']."</p>";
            echo "</div>";
        }
    ?>
</body>
</html>