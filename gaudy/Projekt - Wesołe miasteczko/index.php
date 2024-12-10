<?php 
include 'connection.php';
include 'header.php';

$query = "SELECT * FROM atrakcje LIMIT 3";
$result = mysqli_query($conn, $query);
?>

<main>
    <section class="hero">
        <h1>Witaj w Wesołym Miasteczku!</h1>
        <p>Odkryj świat niezapomnianych przygód i radości</p>
        <a href="attractions.php" class="cta-button">Zobacz atrakcje</a>
    </section>

    <section class="featured-attractions">
        <h2>Popularne Atrakcje</h2>
        <div class="attractions-grid">
            <?php while($row = mysqli_fetch_assoc($result)): ?>
                <div class="attraction-card">
                    <h3><?php echo htmlspecialchars($row['nazwa']); ?></h3>
                    <p><?php echo htmlspecialchars($row['opis']); ?></p>
                    <p>Cena: <?php echo number_format($row['cena_wejscia'], 2); ?> zł</p>
                    <?php if($row['ograniczenie_wiekowe']): ?>
                        <p>Wiek: <?php echo $row['ograniczenie_wiekowe']; ?>+</p>
                    <?php endif; ?>
                </div>
            <?php endwhile; ?>
        </div>
    </section>
</main>

<?php 
mysqli_close($conn);
include 'footer.php'; 
?>