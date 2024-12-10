<?php session_start(); ?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wesołe Miasteczko</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="light-mode">
    <header>
        <nav>
            <div class="logo">
                <h1>Wesołe Miasteczko</h1>
            </div>
            <ul class="nav-links">
                <li><a href="index.php">Strona Główna</a></li>
                <li><a href="attractions.php">Atrakcje</a></li>
                <li><a href="review.php">Recenzje</a></li>
                <li><a href="guidetour.php">Przewodnik</a></li>
                <li><a href="faq.php">FAQ</a></li>
                <?php if(isset($_SESSION['user_id'])): ?>
                    <li><a href="logout.php">Wyloguj się</a></li>
                <?php else: ?>
                    <li><a href="login.php">Zaloguj się</a></li>
                    <li><a href="registration.php">Rejestracja</a></li>
                <?php endif; ?>
            </ul>
            <button id="darkModeToggle" class="dark-mode-toggle">
                <i class="fas fa-moon"></i>
            </button>
        </nav>
    </header>