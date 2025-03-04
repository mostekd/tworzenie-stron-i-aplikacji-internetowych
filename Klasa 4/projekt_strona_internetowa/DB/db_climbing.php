<?php
include_once("db_connection.php");

class db_climbing extends db_connection {
    public function selectRoutes() {
        $query = "SELECT * FROM routes JOIN difficulties ON routes.difficulty_id = difficulties.difficulty_id";
        return $this->query($query);
    }

    public function selectRoutesByDifficulty($difficulty_id) {
        $query = "SELECT * FROM routes JOIN difficulties ON routes.difficulty_id = difficulties.difficulty_id WHERE routes.difficulty_id = ?";
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
        $stmt->bind_param("sis", $name, $difficulty_id, $description);
        if (!$stmt->execute()) {
            throw new Exception("SQL Error: " . $stmt->error);
        }
        $stmt->close();
        header('Location: ../FO/index.html');
    }

    public function deleteRoute($route_id) {
        $query = "DELETE FROM routes WHERE id = ?";
        $stmt = $this->prepare($query);
        $stmt->bind_param("i", $route_id);
        if (!$stmt->execute()) {
            throw new Exception("SQL Error: " . $stmt->error);
        }
        $stmt->close();
    }
}
?>
