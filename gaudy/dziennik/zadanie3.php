<?php
include 'database.php';

$sql_teachers = "SELECT COUNT(*) AS count FROM nauczyciel WHERE imie LIKE '%a'";
$sql_students = "SELECT COUNT(*) AS count FROM uczen WHERE imie LIKE '%a'";

$result_teachers = $conn->query($sql_teachers);
$result_students = $conn->query($sql_students);

$count_teachers = $result_teachers->fetch_assoc()['count'];
$count_students = $result_students->fetch_assoc()['count'];
$total_count = $count_teachers + $count_students;

echo "<p>Liczba osób z imieniem kończącym się na 'a': $total_count</p>";

$conn->close();
?>
