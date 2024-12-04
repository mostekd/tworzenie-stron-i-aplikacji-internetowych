<?php 
// a/b
$a = 10;
$b = 2;
if ($b != 0) {
    $x = $a / $b;
    echo "Wynik x = $x\n <br>";
} else {
    echo "Nie można dzielić przez 0\n <br>";
}

// a/b + c/d
$c = 4;
$d = 2;
if ($b != 0 && $d != 0) {
    $x = $a / $b + $c / $d;
    echo "Wynik x = $x\n <br>";
} else {
    echo "Nie można dzielić przez 0\n <br>";
}

// (a+6) / (b-4)
if ($b != 4) {
    $x = ($a + 6) / ($b - 4);
    echo "Wynik x = $x\n <br>";
} else {
    echo "Błąd: dzielenie przez 0\n <br>";
}

// Check if a number is even
$number = 6;
if ($number % 2 == 0) {
    echo "Liczba jest parzysta\n <br>";
} else {
    echo "Liczba jest nieparzysta\n <br>";
}

// Check divisibility
$first = 10;
$second = 2;
if ($first % $second == 0) {
    echo "$first jest podzielna przez $second\n <br>";
} else {
    echo "$first nie jest podzielna przez $second\n <br>";
}

// Positive, negative or zero
$number = -5;
if ($number > 0) {
    echo "Liczba jest dodatnia\n <br>";
} elseif ($number < 0) {
    echo "Liczba jest ujemna\n <br>";
} else {
    echo "Liczba jest równa 0\n <br>";
}

// Largest of three numbers
$a = 5;
$b = 3;
$c = 7;
echo "Największa liczba to: " . max($a, $b, $c) . "\n <br>";

// Sort three numbers
$numbers = [$a, $b, $c];
sort($numbers);
echo "Liczby w kolejności rosnącej: " . implode(", ", $numbers) . "\n <br>";

// Check adulthood
$birth_date = "2000-12-01";
$current_date = "2024-12-01";
$age = date_diff(date_create($birth_date), date_create($current_date))->y;
if ($age >= 18) {
    echo "Osoba jest pełnoletnia\n <br>";
} else {
    echo "Osoba nie jest pełnoletnia\n <br>";
}

// Character type check
$char = 'A';
if (ctype_upper($char)) {
    echo "Jest to wielka litera\n <br>";
} elseif (ctype_lower($char)) {
    echo "Jest to mała litera\n <br>";
} elseif (ctype_digit($char)) {
    echo "Jest to cyfra\n <br>";
} else {
    echo "Jest to inny znak\n <br>";
}

// Palindrome check
$number = 121;
$number_str = (string)$number;
if ($number_str == strrev($number_str)) {
    echo "$number jest palindromem\n <br>";
} else {
    echo "$number nie jest palindromem\n <br>";
}

// Check digits of a number
$number = 42;
$digits = str_split($number);
if ((intval($digits[0]) % 2 == 0) && (intval($digits[1]) % 2 == 0 || array_sum($digits) == 4)) {
    echo "$number spełnia warunki\n <br>";
} else {
    echo "$number nie spełnia warunków\n <br>";
}

// Grading system
$points = 85;
if ($points >= 90) {
    echo "Ocena: Celująca\n <br>";
} elseif ($points >= 75) {
    echo "Ocena: Bardzo dobra\n <br>";
} elseif ($points >= 60) {
    echo "Ocena: Dobra\n <br>";
} elseif ($points >= 30) {
    echo "Ocena: Dopuszczająca\n <br>";
} else {
    echo "Ocena: Niedostateczna\n <br>";
}
?>