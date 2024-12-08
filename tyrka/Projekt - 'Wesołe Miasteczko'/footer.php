<footer class="bg-dark text-light mt-5 py-3">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h5>Kontakt</h5>
                <p>Email: kontakt@wesolemiasteczko.pl</p>
                <p>Tel: +48 123 456 789</p>
            </div>
            <div class="col-md-4">
                <h5>Godziny otwarcia</h5>
                <p>Pon-Pt: 10:00 - 20:00</p>
                <p>Sob-Nd: 9:00 - 22:00</p>
            </div>
            <div class="col-md-4">
                <h5>Social Media</h5>
                <a href="#" class="text-light me-2">Facebook</a>
                <a href="#" class="text-light me-2">Instagram</a>
                <a href="#" class="text-light">Twitter</a>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col text-center">
                <p>&copy; 2024 Wesołe Miasteczko. Wszelkie prawa zastrzeżone.</p>
            </div>
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
document.getElementById('darkModeToggle').addEventListener('click', function() {
    document.body.classList.toggle('dark-mode');
    if (document.body.classList.contains('dark-mode')) {
        document.cookie = "dark_mode=1; path=/";
    } else {
        document.cookie = "dark_mode=0; path=/";
    }
});
</script>
</body>
</html>
