<?php
include_once("db_connection.php");

class db_climbing extends db_connection {
    public function selectRoutes() {
        $query = "SELECT * FROM routes";
        $result = $this->connect->query($query);
        return $result;
    }

    public function selectRoutesByDifficulty($difficulty_id) {
        $query = "SELECT * FROM routes WHERE difficulty_id = ?";
        $stmt = $this->connect->prepare($query);
        $stmt->bind_param("i", $difficulty_id);
        $stmt->execute();
        return $stmt->get_result();
    }

    public function selectDifficulties() {
        $query = "SELECT * FROM difficulties";
        $result = $this->connect->query($query);
        return $result;
    }

    public function insertRoute($name, $difficulty_id, $description, $latitude, $longitude) {
        $query = "INSERT INTO routes (name, difficulty_id, description, latitude, longitude) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->connect->prepare($query);
        $stmt->bind_param("sisdd", $name, $difficulty_id, $description, $latitude, $longitude);
        $stmt->execute();
        $stmt->close();
        header('Location: ../FO/index.html');
    }
}
?>
