<?php
// Create and manipulate arrays
$tab1 = [7, 3, 1, 6, 9, 5, 4, 10, 2, 2];
echo "5. komórka tablicy: " . $tab1[4] . "\n <br>"; // 5th element
$tab1[6] = 12; // Change 7th element
$tab2 = $tab1; // Copy tab1 to tab2

// Sum of corresponding elements
$tab3 = [];
foreach ($tab1 as $key => $value) {
    $tab3[$key] = $value + $tab2[$key];
}

// Reverse copy
$tab2 = array_reverse($tab1);

// Find min, max, and average
$tab = [4, 7, 1, 9, 5];
echo "Min: " . min($tab) . ", Max: " . max($tab) . "\n <br>";
echo "Średnia: " . (array_sum($tab) / count($tab)) . "\n <br>";

// Count occurrences of 3
echo "Liczba 3 występuje " . array_count_values($tab)[3] . " razy.\n <br>";

// Sorting array
sort($tab);
echo "Posortowana tablica: " . implode(", ", $tab) . "\n <br>";

// Find median
sort($tab);
$middle = count($tab) / 2;
$median = $tab[$middle];
echo "Mediana: $median\n <br>";

// Three smallest and largest elements
echo "Trzy najmniejsze: " . implode(", ", array_slice($tab, 0, 3)) . "\n <br>";
echo "Trzy największe: " . implode(", ", array_slice($tab, -3)) . "\n <br>";

// Square each element
$tab = array_map(function($x) { return $x * $x; }, $tab);

// Even and odd count
$even = count(array_filter($tab, fn($x) => $x % 2 == 0));
$odd = count($tab) - $even;
echo "Parzystych: $even, Nieparzystych: $odd\n <br>";

// Numbers divisible by 3
$div_by_3 = count(array_filter($tab, fn($x) => $x % 3 == 0));
echo "Liczb podzielnych przez 3: $div_by_3\n <br>";

// Array with letters
$letters = str_split('abcdefghij');
echo "Zamienione litery: " . implode(", ", array_map('strtoupper', $letters)) . "\n <br>";
?>