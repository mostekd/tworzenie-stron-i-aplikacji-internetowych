<?php
require_once 'config.php';
require_once 'header.php';

// Prepare the query
$query = "SELECT 
            imie, 
            nazwisko, 
            stanowisko, 
            DATE_FORMAT(data_zatrudnienia, '%d-%m-%Y') as data_zatrudnienia
          FROM pracownicy 
          ORDER BY data_zatrudnienia DESC";

// Execute the query
$result = $conn->query($query);

// Check if the query was successful
if (!$result) {
    die("Query failed: " . $conn->error);
}
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Lista Pracowników</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            max-width: 800px;
            margin: 20px auto;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        .container {
            padding: 20px;
        }
        .no-employees {
            text-align: center;
            color: #666;
            padding: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Lista Pracowników Wesołego Miasteczka</h1>
        
        <?php if ($result->num_rows > 0): ?>
            <table>
                <thead>
                    <tr>
                        <th>Imię</th>
                        <th>Nazwisko</th>
                        <th>Stanowisko</th>
                        <th>Data Zatrudnienia</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($employee = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?= htmlspecialchars(ucfirst($employee['imie'])) ?></td>
                            <td><?= htmlspecialchars(ucfirst($employee['nazwisko'])) ?></td>
                            <td><?= htmlspecialchars(ucfirst($employee['stanowisko'])) ?></td>
                            <td><?= htmlspecialchars($employee['data_zatrudnienia']) ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p class="no-employees">Brak pracowników w bazie danych.</p>
        <?php endif; ?>
    </div>

    <?php
    // Close the result set
    $result->close();
    // Close the connection
    $conn->close();
    ?>
</body>
</html>
