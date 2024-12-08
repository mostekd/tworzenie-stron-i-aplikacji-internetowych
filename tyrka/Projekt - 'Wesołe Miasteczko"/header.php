<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wesołe Miasteczko</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="<?php echo isset($_COOKIE['dark_mode']) ? 'dark-mode' : ''; ?>">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="index.php">Wesołe Miasteczko</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link" href="atrakcje.php">Atrakcje</a></li>
                <li class="nav-item"><a class="nav-link" href="bilety.php">Bilety</a></li>
                <li class="nav-item"><a class="nav-link" href="wydarzenia.php">Wydarzenia</a></li>
                <li class="nav-item"><a class="nav-link" href="sklep.php">Sklep</a></li>
                <?php if(isset($_SESSION['user_id'])): ?>
                    <li class="nav-item"><a class="nav-link" href="profil.php">Mój Profil</a></li>
                    <li class="nav-item"><a class="nav-link" href="logout.php">Wyloguj</a></li>
                <?php else: ?>
                    <li class="nav-item"><a class="nav-link" href="login.php">Logowanie</a></li>
                    <li class="nav-item"><a class="nav-link" href="register.php">Rejestracja</a></li>
                <?php endif; ?>
            </ul>
        </div>
        <button id="darkModeToggle" class="btn btn-light">Tryb Nocny</button>
    </div>
</nav>
