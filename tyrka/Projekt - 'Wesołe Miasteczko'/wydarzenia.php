<?php
require_once 'config.php';
require_once 'header.php';

// Get upcoming events
$sql = "SELECT * FROM Wydarzenia WHERE data_wydarzenia >= CURDATE() AND status = 'planowane' ORDER BY data_wydarzenia";
$result = $conn->query($sql);
?>

<div class="container mt-4">
    <h2 class="text-center mb-4">Wydarzenia</h2>

    <div class="row">
        <?php if($result && $result->num_rows > 0): ?>
            <?php while($wydarzenie = $result->fetch_assoc()): ?>
                <div class="col-md-6 mb-4">
                    <div class="card event-card">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo htmlspecialchars($wydarzenie['nazwa']); ?></h5>
                            <p class="card-text"><?php echo htmlspecialchars($wydarzenie['opis']); ?></p>
                            <ul class="list-unstyled">
                                <li><i class="fas fa-calendar"></i> Data: <?php echo date('d.m.Y', strtotime($wydarzenie['data_wydarzenia'])); ?></li>
                                <li><i class="fas fa-clock"></i> Godzina: <?php echo date('H:i', strtotime($wydarzenie['data_wydarzenia'])); ?></li>
                                <li><i class="fas fa-hourglass-half"></i> Czas trwania: <?php echo $wydarzenie['czas_trwania']; ?></li>
                                <li><i class="fas fa-users"></i> Maksymalna liczba uczestników: <?php echo $wydarzenie['max_uczestnikow']; ?></li>
                            </ul>
                            <?php if(isset($_SESSION['user_id'])): ?>
                                <form method="POST" action="zapisy.php">
                                    <input type="hidden" name="wydarzenie_id" value="<?php echo $wydarzenie['id_wydarzenia']; ?>">
                                    <button type="submit" class="btn btn-primary">Zapisz się</button>
                                </form>
                            <?php else: ?>
                                <a href="login.php" class="btn btn-outline-primary">Zaloguj się aby się zapisać</a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <div class="col">
                <div class="alert alert-info">
                    Aktualnie brak zaplanowanych wydarzeń.
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>

<?php require_once 'footer.php'; ?>
