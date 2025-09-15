document.addEventListener('DOMContentLoaded', function() {
    const blok1 = document.getElementById('blok1');
    const blok2 = document.getElementById('blok2');
    const blok3 = document.getElementById('blok3');
    const przycisk1 = document.getElementById('przycisk1');
    const przycisk2 = document.getElementById('przycisk2');
    const przycisk3 = document.getElementById('przycisk3');
    
    przycisk1.addEventListener('click', function() {
        blok1.style.display = 'none';
        blok2.style.display = 'inline-block';
    });
    
    przycisk2.addEventListener('click', function() {
        blok2.style.display = 'none';
        blok3.style.display = 'inline-block';
    });
    
    przycisk3.addEventListener('click', function() {
        const haslo1 = blok3.querySelector('input[type="password"]:nth-of-type(1)').value;
        const haslo2 = blok3.querySelector('input[type="password"]:nth-of-type(2)').value;
        
        if (haslo1 !== haslo2) {
            alert('Podane hasła różnią się');
            return;
        }
        
        const imie = blok1.querySelector('input:nth-of-type(1)').value;
        const nazwisko = blok1.querySelector('input:nth-of-type(2)').value;
        
        console.log('Witaj ' + imie + ' ' + nazwisko);
    });
});