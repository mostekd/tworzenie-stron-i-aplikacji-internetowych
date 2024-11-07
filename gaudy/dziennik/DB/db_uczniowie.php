<?php
include('../DB/db_connection.php');
class db_uczniowie extends db_connection {
    function selectUczenWhereKlasa3TI() {
        $query = "SELECT * FROM `uczen` WHERE id_klasa = 10 ORDER BY nazwisko ASC";
        $data = mysqli_query($this->connect, $query);
        if (mysqli_num_rows($data) > 0) {
            return $data;
        }
    }

    function selectNauczycielByDataUrodzenia() {
        $query = "SELECT * FROM nauczyciel ORDER BY data_urodzenia DESC";
        $data = mysqli_query($this->connect, $query);
        if (mysqli_num_rows($data) > 0) {
            return $data;
        }
    }

    function selectImionaZANaKoncu() {
        $queryUczniowie = "SELECT COUNT(*) as count FROM `uczen` WHERE imie LIKE '%a'";
        $dataUczniowie = mysqli_query($this->connect, $queryUczniowie);
        $countUczniowie = mysqli_fetch_assoc($dataUczniowie)['count'];

        $queryNauczyciele = "SELECT COUNT(*) as count FROM `nauczyciel` WHERE imie LIKE '%a'";
        $dataNauczyciele = mysqli_query($this->connect, $queryNauczyciele);
        $countNauczyciele = mysqli_fetch_assoc($dataNauczyciele)['count'];

        $totalCount = $countUczniowie + $countNauczyciele;

        if ($totalCount > 0) {
            return [
                'uczniowie' => $countUczniowie,
                'nauczyciele' => $countNauczyciele,
                'total' => $totalCount
            ];    
        }
    }

    function zwiekszOceny() {
        $query = "UPDATE `ocena` SET `ocena` = `ocena` + 1";
        $data = mysqli_query($this->connect, $query);
    
        if ($data && mysqli_affected_rows($this->connect) > 0) {
            return true;
        }
        return false;
    }
    
    function usunNauczycieliPrzed1950() {
        $queryCount = "SELECT COUNT(*) as count FROM `nauczyciel` WHERE `data_urodzenia` < '1950-01-01'";
        $resultCount = mysqli_query($this->connect, $queryCount);
        $count = mysqli_fetch_assoc($resultCount)['count'];
    
        if ($count > 0) {
            $queryDeleteOceny = "DELETE FROM `ocena` WHERE `id_nauczyciel` IN (SELECT `id` FROM `nauczyciel` WHERE `data_urodzenia` < '1950-01-01')";
            $resultDeleteOceny = mysqli_query($this->connect, $queryDeleteOceny);
    
            if ($resultDeleteOceny) {
                $queryDelete = "DELETE FROM `nauczyciel` WHERE `data_urodzenia` < '1950-01-01'";
                $resultDelete = mysqli_query($this->connect, $queryDelete);
    
                if ($resultDelete) {
                    return $count; 
                } else {
                    return false; 
                }
            } else {
                return false;
            }
        } else {
            return 0;
        }
    }
}   
?>
