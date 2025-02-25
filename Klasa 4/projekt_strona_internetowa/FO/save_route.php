<?php
include_once("../DB/db_climbing.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $difficulty_id = $_POST['difficulty_id'];
    $description = $_POST['description'];
    $latitude = $_POST['latitude'];
    $longitude = $_POST['longitude'];
    $location = $_POST['location']; // Add location field

    $db = new db_climbing();
    try {
        $db->insertRoute($name, $difficulty_id, $description, $latitude, $longitude, $location);
        header('Location: ../FO/index.html');
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
