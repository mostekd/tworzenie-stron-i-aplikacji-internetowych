<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pseudonim = $_POST['pseudonim'];
    $komentarz = $_POST['komentarz'];

    echo "<p>Pseudonim: $pseudonim</p>";
    echo "<p>Komentarz (HTML): " . nl2br($komentarz) . "</p>";
    echo "<p>Komentarz (czysty tekst): " . htmlspecialchars($komentarz) . "</p>";
}
?>
