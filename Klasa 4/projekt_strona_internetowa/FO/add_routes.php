<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Route</title>
</head>
<body>
    <input type="text" name="name" placeholder="Name">
    <select name="difficulty_id">
        <?php
            include_once("../DB/db_climbing.php");
            $db = new db_climbing();
            $data = $db->selectDifficulties();
            while($row = mysqli_fetch_assoc($data))
            {
                echo "<option value='".$row['id']."'>".$row['name']."</option>";
            }
        ?>
    </select> 
    <input type="text" name="description" placeholder="Description">
</body>
</html>