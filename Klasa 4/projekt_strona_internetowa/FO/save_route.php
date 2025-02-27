<?php
include_once("../DB/db_climbing.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $difficulty_id = $_POST['difficulty_id'];
    $description = $_POST['description'];

    $db = new db_climbing();
    try {
        $db->insertRoute($name, $difficulty_id, $description);
        header('Location: ../FO/index.html');
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
