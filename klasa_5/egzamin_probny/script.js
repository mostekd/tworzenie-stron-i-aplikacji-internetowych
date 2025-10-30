var przeslij = document.getElementById('przeslij');

przeslij.addEventListener('click', function(event) {
    event.preventDefault();
    
    const imie = document.querySelector('input[name="imie"]');
    const nazwisko = document.querySelector('input[name="nazwisko"]');
    const telefon = document.querySelector('input[name="telefon"]');
    
    if (imie.value === "" || imie.value === "Wpisz imię:" ||
        nazwisko.value === "" || nazwisko.value === "Wpisz nazwisko:" ||
        telefon.value === "" || telefon.value === "Wpisz telefon") {
        return;
    }
    
    const infobox = document.getElementById('infobox');
    infobox.style.display = 'block';
    
    document.getElementById('spanimie').textContent = imie.value;
    document.getElementById('spannazwisko').textContent = nazwisko.value;
    document.getElementById('spantelefon').textContent = telefon.value;
    
    const selectedRadio = document.querySelector('input[type="radio"]:checked');
    document.getElementById('spanpref').textContent = selectedRadio ? selectedRadio.value : '';
});

document.querySelector('#infobox button').addEventListener('click', function() {
    document.getElementById('infobox').style.display = 'none';
});