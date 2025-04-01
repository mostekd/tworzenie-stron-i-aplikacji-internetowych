function oblicz(operacja) {
    const a = parseInt(document.getElementById('liczbaA').value);
    const b = parseInt(document.getElementById('liczbaB').value);
    let wynik;
    
    switch(operacja) {
        case '+':
            wynik = a + b;
            break;
        case '-':
            wynik = a - b;
            break;
        case '*':
            wynik = a * b;
            break;
        case '/':
            wynik = a / b;
            break;
        case '^':
            wynik = Math.pow(a, b);
            break;
        default:
            wynik = 'Nieznana operacja';
    }
    
    document.getElementById('wynik').innerHTML = `Wynik: ${wynik}`;
}