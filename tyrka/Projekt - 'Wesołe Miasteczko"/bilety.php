<?php
require_once 'config.php';
require_once 'header.php';

// Move the purchase functionality inside this condition
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!isset($_SESSION['user_id'])) {
        header('Location: login.php');
        exit();
    }
    // ... rest of the purchase code ...
}

// Show tickets to everyone
$sql = "SELECT * FROM Bilety ORDER BY czas_zakupu DESC LIMIT 5";
$result = $conn->query($sql);
?>

<div class="container mt-4">
    <h2>Bilety</h2>
    
    <?php if (isset($_SESSION['user_id'])): ?>
        <!-- Show purchase form only to logged users -->
        <form method="POST" action="bilety.php">
            <!-- ... form content ... -->
        </form>
    <?php else: ?>
        <div class="alert alert-info">
            Aby kupić bilet, musisz się <a href="login.php">zalogować</a> lub <a href="register.php">zarejestrować</a>.
        </div>
    <?php endif; ?>

    <h3 class="mt-4">Dostępne bilety</h3>
    <div class="row">
        <div class="col-md-4 mb-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Bilet dzienny</h5>
                    <p class="card-text">Cena: 50 zł</p>
                </div>
            </div>
        </div>
        <!-- Add more ticket types -->
    </div>
</div>

<?php require_once 'footer.php'; ?>
