<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $question1 = $_POST['question1'];
    $question2 = $_POST['question2'];
    $question3 = isset($_POST['question3']) ? implode(', ', $_POST['question3']) : 'Brak wyboru';

    echo "<h2>Wyniki ankiety</h2>";
    echo "<p>Pytanie 1: $question1</p>";
    echo "<p>Pytanie 2: $question2</p>";
    echo "<p>Pytanie 3: $question3</p>";
}
?>
