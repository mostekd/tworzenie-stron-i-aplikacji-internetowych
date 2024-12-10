<?php
require_once 'config.php';
require_once 'header.php';

// Get all attractions
$sql = "SELECT * FROM Atrakcje WHERE status = 'aktywna' ORDER BY nazwa";
$result = $conn->query($sql);
?>

<div class="container mt-4">
    <h2 class="text-center mb-4">Nasze Atrakcje</h2>

    <div class="row">
        <div class="col-md-3 mb-4">
            <div class="card attraction-filter">
                <div class="card-body">
                    <h5 class="card-title">Filtruj atrakcje</h5>
                    <div class="mb-3">
                        <label for="wiek" class="form-label">Minimalny wiek</label>
                        <input type="range" class="form-range" id="wiek" min="0" max="18" value="0">
                        <span id="wiekValue">0 lat</span>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Typ atrakcji</label>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="rodzinne" id="rodzinne">
                            <label class="form-check-label" for="rodzinne">Rodzinne</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="ekstremalne" id="ekstremalne">
                            <label class="form-check-label" for="ekstremalne">Ekstremalne</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-9">
            <div class="row">
                <?php if($result && $result->num_rows > 0): ?>
                    <?php while($atrakcja = $result->fetch_assoc()): ?>
                        <div class="col-md-6 mb-4">
                            <div class="card h-100">
                                <img src="images/attractions/<?php echo strtolower(str_replace(' ', '-', $atrakcja['nazwa'])); ?>.png" 
                                     class="card-img-top" 
                                     alt="<?php echo htmlspecialchars($atrakcja['nazwa']); ?>"
                                     onerror="this.src='images/placeholder.jpg'">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo htmlspecialchars($atrakcja['nazwa']); ?></h5>
                                    <p class="card-text"><?php echo htmlspecialchars($atrakcja['opis']); ?></p>
                                    <ul class="list-unstyled">
                                        <li><i class="fas fa-child"></i> Minimalny wiek: <?php echo $atrakcja['minimalny_wiek']; ?> lat</li>
                                        <li><i class="fas fa-clock"></i> Czas trwania: <?php echo $atrakcja['czas_trwania']; ?></li>
                                        <li><i class="fas fa-tag"></i> Typ: <?php echo $atrakcja['typ']; ?></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php else: ?>
                    <div class="col">
                        <div class="alert alert-info">
                            Aktualnie brak dostępnych atrakcji.
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<script>
document.getElementById('wiek').addEventListener('input', function() {
    document.getElementById('wiekValue').textContent = this.value + ' lat';
});
</script>

<?php require_once 'footer.php'; ?>
