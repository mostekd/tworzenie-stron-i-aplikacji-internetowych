<?php
    include_once("db_connection.php");
    class db_climbing extends db_connection {
        function selectRoutes()
        {
            $query = "SELECT * FROM routes";
            $data = mysqli_query($this->connect, $query);
            if (mysqli_num_rows($data) > 0)
            {
                return $data;
            }
        }

        function selectRoutesByDifficulty($difficulty_id)
        {
            $query = "SELECT * FROM routes WHERE difficulty = '".$difficulty_id."';";
            $data = mysqli_query($this->connect, $query);
            if (mysqli_num_rows($data) > 0)
            {
                return $data;
            }
        }

        function selectDifficulties()
        {
            $query = "SELECT * FROM difficulties";
            $data = mysqli_query($this->connect, $query);
            if (mysqli_num_rows($data) > 0)
            {
                return $data;
            }
        }

        function insertRoute($name, $difficulty_id, $description, $location){
            $query = "INSERT INTO `routes`(`name`, `difficulty_id`, `description`, `location`) VALUES ('".$name."','".$difficulty_id."','".$description."','".$location."');";
            $data = mysqli_query($this->connect, $query);
            header('location: ../BO/admin_about_company.php'); 
            $this->close();
        }

    }
?>
