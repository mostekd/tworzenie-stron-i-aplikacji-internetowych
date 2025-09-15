document.addEventListener('DOMContentLoaded', function() {
    const blok1 = document.getElementById('blok1');
    const blok2 = document.getElementById('blok2');
    const blok3 = document.getElementById('blok3');
    const przycisk1 = document.getElementById('przycisk1');
    const przycisk2 = document.getElementById('przycisk2');
    const przycisk3 = document.getElementById('przycisk3');
    
    przycisk1.addEventListener('click', function() {
        blok1.classList.add('ukryty');
        blok2.classList.remove('ukryty');
        
    });
    
    przycisk2.addEventListener('click', function() {
        blok2.classList.add('ukryty');
        blok3.classList.remove('ukryty');
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