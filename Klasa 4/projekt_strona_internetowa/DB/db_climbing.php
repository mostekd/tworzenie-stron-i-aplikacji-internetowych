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
    }
?>
