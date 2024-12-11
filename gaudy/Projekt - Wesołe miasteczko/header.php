<?php 
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wesołe Miasteczko - <?php echo isset($page_title) ? $page_title : 'Strona główna'; ?></title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <nav class="navbar">
        <div class="nav-container">
            <div class="logo">
                <a href="index.php">
                    <img src="images/logo.png" alt="Wesołe Miasteczko Logo">
                </a>
            </div>
            <div class="nav-links">
                <a href="index.php">Strona główna</a>
                <a href="attractions.php">Atrakcje</a>
                <a href="tickets.php">Bilety</a>
                <a href="guidetour.php">Przewodnik</a>
                <a href="faq.php">FAQ</a>
                <?php if(isset($_SESSION['user_id'])): ?>
                    <div class="user-menu">
                        <span>Witaj, <?php echo htmlspecialchars($_SESSION['user_name']); ?></span>
                        <?php if(isset($_SESSION['is_admin']) && $_SESSION['is_admin']): ?>
                            <a href="admin/dashboard.php">Panel Admin</a>
                        <?php endif; ?>
                        <a href="logout.php">Wyloguj się</a>
                    </div>
                <?php else: ?>
                    <a href="login.php">Zaloguj się</a>
                    <a href="register.php" class="btn btn-primary">Zarejestruj się</a>
                <?php endif; ?>
            </div>
            <button class="theme-toggle">
                <i class="fas fa-moon"></i>
            </button>
            <button class="mobile-menu-toggle">
                <i class="fas fa-bars"></i>
            </button>
        </div>
    </nav>
    <div class="content-wrapper">
