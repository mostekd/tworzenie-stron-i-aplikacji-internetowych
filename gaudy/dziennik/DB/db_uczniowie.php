<?php
include('./db_connection.php');
    class db_uczniowie extends db_connection{
        function selectUczenWhereKlasa3TI(){
            $query = "SELECT * FROM `uczen` ORDER BY ASC WHERE id_klasa = 10";
            $data = mysqli_query($this->connect, $query);
            if (mysqli_num_rows($data) > 0){
            return $data;
            }
        }
    }
?>