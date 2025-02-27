<?php
include_once("db_connection.php");

class db_climbing extends db_connection {
    public function selectRoutes() {
        $query = "SELECT * FROM routes";
        return $this->query($query);
    }

    public function selectRoutesByDifficulty($difficulty_id) {
        $query = "SELECT * FROM routes WHERE difficulty_id = ?";
        $stmt = $this->prepare($query);
        $stmt->bind_param("i", $difficulty_id);
        $stmt->execute();
        return $stmt->get_result();
    }

    public function selectDifficulties() {
        $query = "SELECT * FROM difficulties";
        return $this->query($query);
    }

    public function insertRoute($name, $difficulty_id, $description) {
        $query = "INSERT INTO routes (name, difficulty_id, description) VALUES (?, ?, ?)";
        $stmt = $this->prepare($query);
        $stmt->bind_param("sisdds", $name, $difficulty_id, $description, $latitude, $longitude, $location);
        if (!$stmt->execute()) {
            throw new Exception("SQL Error: " . $stmt->error);
        }
        $stmt->close();
        header('Location: ../FO/index.html');
    }
}
?>
