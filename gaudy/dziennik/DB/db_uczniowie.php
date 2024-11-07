<?php
include('../DB/db_connection.php');
    class db_uczniowie extends db_connection{
        function selectUczenWhereKlasa3TI(){
            $query = "SELECT * FROM `uczen` WHERE id_klasa = 10 ORDER BY nazwisko ASC";
            $data = mysqli_query($this->connect, $query);
            if (mysqli_num_rows($data) > 0){
            return $data;
            }
        }

        function selectNauczycielByDataUrodzenia(){
            $query  = "SELECT * FROM nauczyciel ORDER BY data_urodzenia DESC";
            $data = mysqli_query($this->connect, $query);
            if (mysqli_num_rows($data) > 0){
            return $data;
        }
    }
?>