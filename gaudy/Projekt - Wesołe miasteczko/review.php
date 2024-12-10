<?php
include 'connection.php';
include 'header.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION['user_id'])) {
    $atrakcja_id = mysqli_real_escape_string($conn, $_POST['atrakcja_id']);
    $ocena = mysqli_real_escape_string($conn, $_POST['ocena']);
    $komentarz = mysqli_real_escape_string($conn, $_POST['komentarz']);
    $klient_id = $_SESSION['user_id'];

    $query = "INSERT INTO recenzje (id_klienta, id_atrakcji, ocena, komentarz) 
              VALUES ('$klient_id', '$atrakcja_id', '$ocena', '$komentarz')";
    mysqli_query($conn, $query);
}

$query = "SELECT a.nazwa, r.ocena, r.komentarz, k.imie, r.data_dodania 
          FROM recenzje r 
          JOIN klienci k ON r.id_klienta = k.id_klienta 
          JOIN atrakcje a ON r.id_atrakcji = a.id_atrakcji 
          ORDER BY r.data_dodania DESC";
$result = mysqli_query($conn, $query);
?>

<main class="reviews-container">
    <?php if(isset($_SESSION['user_id'])): ?>
        <section class="add-review">
            <h2>Dodaj recenzję</h2>
            <form method="POST" action="">
                <div class="form-group">
                    <label for="atrakcja_id">Wybierz atrakcję:</label>
                    <select name="atrakcja_id" required>
                        <?php
                        $atrakcje = mysqli_query($conn, "SELECT * FROM atrakcje");
                        while($atrakcja = mysqli_fetch_assoc($atrakcje)) {
                            echo "<option value='" . $atrakcja['id_atrakcji'] . "'>" . 
                                 htmlspecialchars($atrakcja['nazwa']) . "</option>";
                        }
                        ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="ocena">Ocena:</label>
                    <select name="ocena" required>
                        <option value="5">5 - Świetne</option>
                        <option value="4">4 - Bardzo dobre</option>
                        <option value="3">3 - Dobre</option>
                        <option value="2">2 - Słabe</option>
                        <option value="1">1 - Bardzo słabe</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="komentarz">Komentarz:</label>
                    <textarea name="komentarz" required></textarea>
                </div>

                <button type="submit">Dodaj recenzję</button>
            </form>
        </section>
    <?php endif; ?>

    <section class="reviews-list">
        <h2>Recenzje</h2>
        <?php while($row = mysqli_fetch_assoc($result)): ?>
            <div class="review-card">
                <h3><?php echo htmlspecialchars($row['nazwa']); ?></h3>
                <div class="review-meta">
                    <span class="author"><?php echo htmlspecialchars($row['imie']); ?></span>
                    <span class="date"><?php echo date('d.m.Y', strtotime($row['data_dodania'])); ?></span>
                </div>
                <div class="rating">
                    <?php
                    for($i = 1; $i <= 5; $i++) {
                        echo $i <= $row['ocena'] ? "★" : "☆";
                    }
                    ?>
                </div>
                <p class="comment"><?php echo htmlspecialchars($row['komentarz']); ?></p>
            </div>
        <?php endwhile; ?>
    </section>
</main>

<?php 
mysqli_close($conn);
include 'footer.php'; 
?>