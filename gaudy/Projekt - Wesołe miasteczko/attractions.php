<?php
include 'connection.php';
include 'header.php';

$age_filter = isset($_GET['age']) ? (int)$_GET['age'] : 0;
$sort = isset($_GET['sort']) ? $_GET['sort'] : 'nazwa';

$query = "SELECT * FROM atrakcje";
if ($age_filter > 0) {
    $query .= " WHERE ograniczenie_wiekowe <= $age_filter";
}
$query .= " ORDER BY $sort";

$result = mysqli_query($conn, $query);
?>

<main class="attractions-page">
    <section class="filters">
        <h2>Filtry</h2>
        <form method="GET" action="">
            <div class="filter-group">
                <label for="age">Wiek:</label>
                <select name="age" id="age">
                    <option value="0">Wszystkie</option>
                    <option value="7">7+</option>
                    <option value="12">12+</option>
                    <option value="16">16+</option>
                </select>
            </div>

            <div class="filter-group">
                <label for="sort">Sortuj według:</label>
                <select name="sort" id="sort">
                    <option value="nazwa">Nazwy</option>
                    <option value="cena_wejscia">Ceny</option>
                </select>
            </div>

            <button type="submit">Zastosuj filtry</button>
        </form>
    </section>

    <section class="attractions-list">
        <?php while($row = mysqli_fetch_assoc($result)): ?>
            <div class="attraction-card">
                <h3><?php echo htmlspecialchars($row['nazwa']); ?></h3>
                <p><?php echo htmlspecialchars($row['opis']); ?></p>
                <div class="attraction-details">
                    <p>Cena: <?php echo number_format($row['cena_wejscia'], 2); ?> zł</p>
                    <?php if($row['ograniczenie_wiekowe']): ?>
                        <p>Ograniczenie wiekowe: <?php echo $row['ograniczenie_wiekowe']; ?>+</p>
                    <?php endif; ?>
                </div>
                <?php if(isset($_SESSION['user_id'])): ?>
                    <button class="book-btn" onclick="location.href='booking.php?id=<?php echo $row['id_atrakcji']; ?>'">
                        Zarezerwuj
                    </button>
                <?php endif; ?>
            </div>
        <?php endwhile; ?>
    </section>
</main>

<?php 
mysqli_close($conn);
include 'footer.php'; 
?>