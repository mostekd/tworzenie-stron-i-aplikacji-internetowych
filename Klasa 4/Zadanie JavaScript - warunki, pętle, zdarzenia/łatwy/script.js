// Łatwy poziom
function checkEvenOdd() {
    const num = parseInt(document.getElementById("num1").value);
    const output = document.getElementById("output");
    if (isNaN(num)) {
        output.textContent = "Wprowadź liczbę!";
    } else if (num % 2 === 0) {
        output.textContent = "Liczba " + num + " jest parzysta.";
    } else {
        output.textContent = "Liczba " + num + " jest nieparzysta.";
    }
}

function greaterThan10() {
    const num = parseInt(document.getElementById("num1").value);
    const output = document.getElementById("output");
    if (isNaN(num)) {
        output.textContent = "Wprowadź liczbę!";
    } else if (num > 10) {
        output.textContent = "Liczba " + num + " jest większa od 10.";
    } else {
        output.textContent = "Liczba " + num + " nie jest większa od 10.";
    }
}

function compareNumbers() {
    const num1 = parseInt(document.getElementById("num1").value);
    const num2 = parseInt(document.getElementById("num2").value);
    const output = document.getElementById("output");
    if (isNaN(num1) || isNaN(num2)) {
        output.textContent = "Wprowadź dwie liczby!";
    } else if (num1 > num2) {
        output.textContent = "Większa liczba to " + num1 + ".";
    } else {
        output.textContent = "Większa liczba to " + num2 + ".";
    }
}

function checkSign() {
    const num = parseInt(document.getElementById("num1").value);
    const output = document.getElementById("output");
    if (isNaN(num)) {
        output.textContent = "Wprowadź liczbę!";
    } else if (num > 0) {
        output.textContent = "Liczba " + num + " jest dodatnia.";
    } else if (num < 0) {
        output.textContent = "Liczba " + num + " jest ujemna.";
    } else {
        output.textContent = "Liczba " + num + " jest równa zero.";
    }
}

function checkAge() {
    const age = parseInt(document.getElementById("num1").value);
    const output = document.getElementById("output");
    if (isNaN(age)) {
        output.textContent = "Wprowadź wiek!";
    } else if (age >= 18) {
        output.textContent = "Jesteś pełnoletni.";
    } else {
        output.textContent = "Nie jesteś pełnoletni.";
    }
}

function loop1to10() {
    const output = document.getElementById("output");
    let result = "";
    for (let i = 1; i <= 10; i++) {
        result += i + " ";
    }
    output.textContent = result;
}

function printHello() {
    const output = document.getElementById("output");
    let result = "";
    for (let i = 0; i < 5; i++) {
        result += "Cześć! ";
    }
    output.textContent = result;
}

function sumNumbers() {
    const output = document.getElementById("output");
    let sum = 0;
    for (let i = 1; i <= 100; i++) {
        sum += i;
    }
    output.textContent = "Suma liczb od 1 do 100 to " + sum + ".";
}

function printEvenNumbers() {
    const output = document.getElementById("output");
    let result = "";
    for (let i = 1; i <= 20; i++) {
        if (i % 2 === 0) {
            result += i + " ";
        }
    }
    output.textContent = "Liczby parzyste od 1 do 20: " + result;
}

function sumUserNumbers() {
    const output = document.getElementById("output");
    let sum = 0;
    for (let i = 0; i < 5; i++) {
        const num = parseInt(prompt("Wprowadź liczbę " + (i + 1) + ":"));
        if (!isNaN(num)) {
            sum += num;
        } else {
            output.textContent = "Wprowadź poprawne liczby!";
            return;
        }
    }
    output.textContent = "Suma wprowadzonych liczb to " + sum + ".";
}

// Zdarzenia
const clickButton = document.getElementById("clickButton");
clickButton.addEventListener("click", function() {
    document.getElementById("output").textContent = "Kliknięto przycisk!";
});

const enterButton = document.getElementById("enterButton");
enterButton.addEventListener("keydown", function(event) {
    if (event.key === "Enter") {
        document.getElementById("output").textContent = "Wprowadzono tekst!";
    }
});

const changeBackgroundColor = document.getElementById("changeBackgroundColor");
changeBackgroundColor.addEventListener("click", function() {
    document.body.style.backgroundColor = "red";
});

function clearInput() {
    document.getElementById("clearInput").value = "";
}

const hoverText = document.getElementById("hoverText");
hoverText.addEventListener("mouseover", function() {
    this.textContent = "Najechano!";
});
hoverText.addEventListener("mouseout", function() {
    this.textContent = "Najedź na mnie";
});
