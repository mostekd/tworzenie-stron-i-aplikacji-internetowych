<?php require_once 'connect.php';
include 'header.php'; ?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQ - Wesołe Miasteczko</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Często zadawane pytania</h1>
        
        <div class="accordion">
            <div class="accordion-item">
                <div class="accordion-header">Jakie są godziny otwarcia parku?</div>
                <div class="accordion-content">
                    Park jest otwarty codziennie od 10:00 do 22:00 w sezonie letnim (czerwiec-sierpień) 
                    i od 10:00 do 20:00 w pozostałych miesiącach.
                </div>
            </div>

            <div class="accordion-item">
                <div class="accordion-header">Czy mogę wnieść własne jedzenie i napoje?</div>
                <div class="accordion-content">
                    Tak, można wnieść własne jedzenie i napoje bezalkoholowe. Na terenie parku znajdują się 
                    również liczne punkty gastronomiczne.
                </div>
            </div>

            <div class="accordion-item">
                <div class="accordion-header">Jakie są ograniczenia wiekowe i wzrostowe?</div>
                <div class="accordion-content">
                    Ograniczenia różnią się w zależności od atrakcji. Szczegółowe informacje znajdują się 
                    przy każdej atrakcji oraz w sekcji atrakcji na naszej stronie.
                </div>
            </div>

            <!-- Add more FAQ items as needed -->
        </div>
    </div>
    <script src="script.js"></script>
</body>
</html>
