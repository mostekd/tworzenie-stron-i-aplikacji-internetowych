<?php 
$page_title = "Strona główna";
require_once 'connect.php';
include 'header.php';

// Fetch featured attractions
$query = "SELECT * FROM atrakcje ORDER BY RAND() LIMIT 3";
$featured_attractions = mysqli_query($conn, $query);
?>

<main>
    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-content">
            <h1>Witaj w Wesołym Miasteczku!</h1>
            <p>Odkryj świat niezapomnianych przygód i radości</p>
            <a href="tickets.php" class="btn btn-primary">Kup bilet teraz</a>
        </div>
    </section>

    <!-- Featured Attractions -->
    <section class="featured-attractions">
        <div class="container">
            <h2>Popularne Atrakcje</h2>
            <div class="attractions-grid">
                <?php while($attraction = mysqli_fetch_assoc($featured_attractions)): ?>
                    <div class="attraction-card">
                        <img src="images/attractions/<?php echo $attraction['id_atrakcji']; ?>.jpg" 
                             alt="<?php echo htmlspecialchars($attraction['nazwa']); ?>">
                        <div class="card-content">
                            <h3><?php echo htmlspecialchars($attraction['nazwa']); ?></h3>
                            <p><?php echo htmlspecialchars($attraction['opis']); ?></p>
                            <a href="attractions.php?id=<?php echo $attraction['id_atrakcji']; ?>" 
                               class="btn btn-secondary">Dowiedz się więcej</a>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </section>

    <!-- Park Information -->
    <section class="park-info">
        <div class="container">
            <div class="info-grid">
                <div class="info-card">
                    <i class="fas fa-clock"></i>
                    <h3>Godziny otwarcia</h3>
                    <p>Codziennie od 10:00 do 22:00</p>
                </div>
                <div class="info-card">
                    <i class="fas fa-ticket-alt"></i>
                    <h3>Bilety</h3>
                    <p>Już od 30 zł</p>
                </div>
                <div class="info-card">
                    <i class="fas fa-parking"></i>
                    <h3>Parking</h3>
                    <p>Bezpłatny dla gości</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Latest News -->
    <section class="latest-news">
        <div class="container">
            <h2>Aktualności</h2>
            <div class="news-grid">
                <!-- Add your news items here -->
                <div class="news-card">
                    <img src="images/news/news1.jpg" alt="News 1">
                    <div class="news-content">
                        <h3>Nowa atrakcja już wkrótce!</h3>
                        <p>Przygotujcie się na największy roller coaster w Europie!</p>
                        <a href="#" class="btn btn-secondary">Czytaj więcej</a>
                    </div>
                </div>
                <!-- Add more news cards as needed -->
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    <section class="testimonials">
        <div class="container">
            <h2>Opinie naszych gości</h2>
            <div class="testimonials-slider">
                <!-- Add testimonials here -->
                <div class="testimonial-card">
                    <p>"Wspaniałe miejsce dla całej rodziny!"</p>
                    <div class="testimonial-author">
                        <img src="images/testimonials/user1.jpg" alt="User 1">
                        <span>Anna Kowalska</span>
                    </div>
                </div>
                <!-- Add more testimonials as needed -->
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="cta">
        <div class="container">
            <h2>Gotowy na przygodę?</h2>
            <p>Zaplanuj swoją wizytę już dziś!</p>
            <div class="cta-buttons">
                <a href="tickets.php" class="btn btn-primary">Kup bilet</a>
                <a href="guidetour.php" class="btn btn-secondary">Zobacz przewodnik</a>
            </div>
        </div>
    </section>
</main>
<script src="script.js"></script>

<?php include 'footer.php'; ?>
