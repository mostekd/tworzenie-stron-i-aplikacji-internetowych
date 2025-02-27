<?php
include_once("../DB/db_climbing.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $route_id = $_POST['route_id'];

    $db = new db_climbing();
    try {
        $db->deleteRoute($route_id);
        header('Location: routes.php');
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
