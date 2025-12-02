function tlo(kolor) {
    document.getElementById('prawy').style.backgroundColor = kolor;
}

function zmienKolor(kolor) {
    document.getElementById('prawy').style.color = kolor;
}

function zmienRozmiar(rozmiar) {
    document.getElementById('prawy').style.fontSize = rozmiar;
}

function zmienRamke(stan) {
    if (stan == true) {
        document.getElementById('obraz').style.border = "1px solid #ccc";
    }
    else {
        document.getElementById('obraz').style.border = "none";
    }
}

function zmienPunktor(punktor) {
    document.getElementById('lista').style.listStyleType = punktor;
}