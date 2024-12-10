<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once 'config.php';
require_once 'header.php';

// Pobierz atrakcje
$sql = "SELECT * FROM Atrakcje";
$result = $conn->query($sql);
$atrakcje = $result->fetch_all(MYSQLI_ASSOC);

// Pobierz nadchodzące wydarzenia
$sql = "SELECT * FROM Wydarzenia WHERE data_wydarzenia > NOW() ORDER BY data_wydarzenia LIMIT 3";
$result = $conn->query($sql);
$wydarzenia = $result->fetch_all(MYSQLI_ASSOC);
?>

<div class="container mt-4">
    <div class="jumbotron">
        <h1>Witaj w Wesołym Miasteczku!</h1>
        <p class="lead">Odkryj świat niezapomnianych przygód i rozrywki dla całej rodziny.</p>
    </div>

    <section class="atrakcje mt-4">
        <h2>Nasze Atrakcje</h2>
        <div class="row">
            <?php foreach ($atrakcje as $atrakcja): ?>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo htmlspecialchars($atrakcja['nazwa']); ?></h5>
                            <p class="card-text"><?php echo htmlspecialchars($atrakcja['opis']); ?></p>
                            <p>Minimalny wiek: <?php echo $atrakcja['minimalny_wiek']; ?> lat</p>
                            <p>Czas trwania: <?php echo $atrakcja['czas_trwania']; ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </section>

    <section class="wydarzenia mt-4">
        <h2>Nadchodzące Wydarzenia</h2>
        <div class="row">
            <?php foreach ($wydarzenia as $wydarzenie): ?>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo htmlspecialchars($wydarzenie['nazwa']); ?></h5>
                            <p class="card-text"><?php echo htmlspecialchars($wydarzenie['opis']); ?></p>
                            <p>Data: <?php echo date('d.m.Y H:i', strtotime($wydarzenie['data_wydarzenia'])); ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </section>
</div>

<?php require_once 'footer.php'; ?>
