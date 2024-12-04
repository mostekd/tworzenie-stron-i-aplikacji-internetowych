<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = $_POST['login'];
    $password = sha1($_POST['password']);
    $remember = isset($_POST['remember']) ? "Tak" : "Nie";

    echo "<h2>Witaj, $login!</h2>";
    echo "<p>Zakodowane hasło: $password</p>";
    echo "<p>Zapamiętaj mnie: $remember</p>";
}
?>
