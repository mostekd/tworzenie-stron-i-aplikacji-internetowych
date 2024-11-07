<?php
include('../DB/db_uczniowie.php');
$baza = new db_uczniowie();

echo $baza->zwiekszOceny();
?>
