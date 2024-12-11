<?php
require_once 'connect.php';
include 'header.php';

$query = "SELECT * FROM atrakcje";
$result = mysqli_query($conn, $query);

$filter_age = isset($_GET['age']) ? (int)$_GET['age'] : 0;
if ($filter_age > 0) {
    $query .= " WHERE ograniczenie_wiekowe <= $filter_age";
}
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atrakcje - Wesołe Miasteczko</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Nasze Atrakcje</h1>

        <div class="filter-container">
            <button class="filter-btn active" data-age="0">Wszystkie</button>
            <button class="filter-btn" data-age="7">7+</button>
            <button class="filter-btn" data-age="12">12+</button>
            <button class="filter-btn" data-age="16">16+</button>
        </div>

        <div class="attractions-grid">
            <?php while($attraction = mysqli_fetch_assoc($result)): ?>
                <div class="card attraction-card">
                    <img src="images/attractions/<?php echo $attraction['id_atrakcji']; ?>.jpg" 
                         alt="<?php echo $attraction['nazwa']; ?>">
                    <h3><?php echo $attraction['nazwa']; ?></h3>
                    <p><?php echo $attraction['opis']; ?></p>
                    <?php if($attraction['ograniczenie_wiekowe']): ?>
                        <p class="age-restriction">Wiek: <?php echo $attraction['ograniczenie_wiekowe']; ?>+</p>
                    <?php endif; ?>
                    <p class="price">Cena: <?php echo $attraction['cena_wejscia']; ?> zł</p>
                    <?php if(isset($_SESSION['user_id'])): ?>
                        <button class="btn btn-primary book-attraction" 
                                data-id="<?php echo $attraction['id_atrakcji']; ?>">
                            Zarezerwuj
                        </button>
                    <?php endif; ?>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
    <script src="script.js"></script>
</body>
</html>
