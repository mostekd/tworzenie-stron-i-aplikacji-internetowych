<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $imie = $_POST['imie'] ?? '';
    $nazwisko = $_POST['nazwisko'] ?? '';
    $telefon = $_POST['telefon'] ?? '';

    $pref = 'ogólne';

    if (isset($_POST['sportowe'])) {
        $pref = 'sportowy';
    } elseif (isset($_POST['do_chodzenia'])) {
        $pref = 'chodliwy';
    } elseif (isset($_POST['relaksujace'])) {
        $pref = 'relaksujący';
    }

    if ($imie == '' || $nazwisko == '' || $telefon == '') {
        echo "Proszę uzupełnić wszystkie pola.";
    } else {
        echo "<h2>Podsumowanie Twoich danych</h2>";
        echo "<p>Twoje imię: <strong>$imie</strong></p>";
        echo "<p>Twoje nazwisko: <strong>$nazwisko</strong></p>";
        echo "<p>Twój telefon: <strong>$telefon</strong></p>";
        echo "<p>Twoje preferencje: <strong>$pref</strong></p>";
        echo "<p>Skontaktujemy się z Tobą!</p>";
    }
} else {
    echo "Formularz nie został poprawnie przesłany.";
}
?>
