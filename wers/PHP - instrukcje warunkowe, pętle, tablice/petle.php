<?php
// 10 consecutive numbers starting from 1
for ($i = 1; $i <= 10; $i++) {
    echo "$i\n";
}

// 10 consecutive numbers starting from 10, descending
for ($i = 10; $i >= 1; $i--) {
    echo "$i\n";
}

// Sum of first 10 numbers
$sum = 0;
for ($i = 1; $i <= 10; $i++) {
    $sum += $i;
}
echo "Suma pierwszych 10 liczb: $sum\n <br>";

// 10 even numbers starting from 2
for ($i = 2; $i <= 20; $i += 2) {
    echo "$i\n";
}

// Worker savings with interest
$months = 12;
$monthly_savings = 100;
$total_savings = 0;
for ($i = 1; $i <= $months; $i++) {
    $total_savings += $monthly_savings;
    $total_savings += $total_savings * 0.08;
}
echo "Zgromadzona kwota: $total_savings\n <br>";

// Arithmetic sequence sum (100 terms, starting at 5, increment by 10)
$first_term = 5;
$common_difference = 10;
$sum = 0;
for ($i = 0; $i < 100; $i++) {
    $sum += $first_term + $i * $common_difference;
}
echo "Suma ciągu arytmetycznego: $sum\n <br>";

// Number of bricks in a pyramid
$base = 10;
$bricks = 0;
for ($i = $base; $i > 0; $i--) {
    $bricks += $i * $i;
}
echo "Liczba cegieł w piramidzie: $bricks\n <br>";

// Bricks in wall calculation
$X = 10; // Base length
$Y = 10; // Height
$Z = 1; // Decrease per row
$total_bricks = 0;
for ($i = 0; $i < $Y; $i++) {
    $total_bricks += ($X - $i * $Z);
}
echo "Liczba cegieł w ścianie: $total_bricks\n <br>";

// Weight of wall
$K = 1; // Weight of one brick
$total_weight = $total_bricks * $K;
echo "Waga ściany: $total_weight kg\n <br>";

// Simple calculator simulation
while (true) {
    $a = (int)readline("Podaj pierwszą liczbę: ");
    $b = (int)readline("Podaj drugą liczbę: ");
    $operation = readline("Podaj operację (+, -, *, /): ");
    
    if ($operation == '+') {
        echo "Wynik: " . ($a + $b) . "\n";
    } elseif ($operation == '-') {
        echo "Wynik: " . ($a - $b) . "\n";
    } elseif ($operation == '*') {
        echo "Wynik: " . ($a * $b) . "\n";
    } elseif ($operation == '/') {
        if ($b != 0) {
            echo "Wynik: " . ($a / $b) . "\n";
        } else {
            echo "Błąd: Dzielenie przez 0\n <br>";
        }
    }
    
    if ($a == 0 && $b == 0) break;
}

// Factorial calculation
$num = 5;
$factorial = 1;
for ($i = 1; $i <= $num; $i++) {
    $factorial *= $i;
}
echo "Silnia z $num to: $factorial\n <br>";

// Sequence of squares
$start = 2;
for ($i = 0; $i < 10; $i++) {
    echo pow($start, 2) . "\n <br>";
    $start = pow($start, 2);
}

// Sum and average of 10 random numbers between 50 and 100
$sum = 0;
for ($i = 0; $i < 10; $i++) {
    $num = rand(50, 100);
    $sum += $num;
}
$average = $sum / 10;
echo "Suma: $sum, Średnia: $average\n <br>";
?>