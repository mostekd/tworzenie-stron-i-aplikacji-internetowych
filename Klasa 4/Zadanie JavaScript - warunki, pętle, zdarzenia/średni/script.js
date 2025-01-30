// Średni poziom
function checkDivisibleBy3And5() {
    const num = parseInt(document.getElementById("num1").value);
    const output = document.getElementById("output");
    if (isNaN(num)) {
        output.textContent = "Wprowadź liczbę!";
    } else if (num % 3 === 0 && num % 5 === 0) {
        output.textContent = "Liczba " + num + " jest podzielna przez 3 i 5.";
    } else {
        output.textContent = "Liczba " + num + " nie jest podzielna przez 3 i 5.";
    }
}

function gradeMessage() {
    const grade = parseInt(document.getElementById("grade").value);
    const output = document.getElementById("output");
    if (isNaN(grade)) {
        output.textContent = "Wprowadź ocenę!";
    } else if (grade === 5) {
        output.textContent = "Bardzo dobry";
    } else if (grade === 4) {
        output.textContent = "Dobry";
    } else if (grade === 3) {
        output.textContent = "Dostateczny";
    } else if (grade === 2) {
        output.textContent = "Dopuszczający";
    } else {
        output.textContent = "Niedostateczny";
    }
}

function isLeapYear() {
    const year = parseInt(document.getElementById("year").value);
    const output = document.getElementById("output");
    if (isNaN(year)) {
        output.textContent = "Wprowadź rok!";
    } else if ((year % 4 === 0 && year % 100 !== 0) || year % 400 === 0) {
        output.textContent = "Rok " + year + " jest rokiem przestępnym.";
    } else {
        output.textContent = "Rok " + year + " nie jest rokiem przestępnym.";
    }
}

function daysInMonth() {
    const month = parseInt(document.getElementById("month").value);
    const output = document.getElementById("output");
    if (isNaN(month) || month < 1 || month > 12) {
        output.textContent = "Wprowadź poprawny numer miesiąca!";
    } else {
        const daysInMonths = [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];
        const days = daysInMonths[month - 1];
        output.textContent = "Miesiąc " + month + " ma " + days + " dni.";
    }
}

function isRightTriangle() {
    const a = parseInt(document.getElementById("num1").value);
    const b = parseInt(document.getElementById("num2").value);
    const c = parseInt(document.getElementById("num3").value);
    const output = document.getElementById("output");
    if (isNaN(a) || isNaN(b) || isNaN(c)) {
        output.textContent = "Wprowadź trzy liczby!";
    } else if (a ** 2 + b ** 2 === c ** 2 || a ** 2 + c ** 2 === b ** 2 || b ** 2 + c ** 2 === a ** 2) {
        output.textContent = "Trójkąt o bokach " + a + ", " + b + ", " + c + " jest prostokątny.";
    } else {
        output.textContent = "Trójkąt o bokach " + a + ", " + b + ", " + c + " nie jest prostokątny.";
    }
}

function multiplicationTable() {
    const output = document.getElementById("output");
    let result = "";
    for (let i = 1; i <= 10; i++) {
        for (let j = 1; j <= 10; j++) {
            result += `${j} x ${i} = ${j * i}\t`;
        }
        result += "\n";
    }
    output.textContent = result;
}

function printPrimes() {
    const output = document.getElementById("output");
    let result = "";
    for (let i = 2; i <= 100; i++) {
        let isPrime = true;
        for (let j = 2; j <= Math.sqrt(i); j++) {
            if (i % j === 0) {
                isPrime = false;
                break;
            }
        }
        if (isPrime) {
            result += i + " ";
        }
    }
    output.textContent = "Liczby pierwsze od 1 do 100: " + result;
}

function reverseText() {
    const text = document.getElementById("text").value;
    const output = document.getElementById("output");
    let reversedText = "";
    for (let i = text.length - 1; i >= 0; i--) {
        reversedText += text[i];
    }
    output.textContent = "Odwrócony tekst: " + reversedText;
}

function drawTriangle() {
    const height = parseInt(document.getElementById("num1").value);
    const output = document.getElementById("output");
    if (isNaN(height) || height < 1) {
        output.textContent = "Wprowadź poprawną wysokość!";
    } else {
        let triangle = "";
        for (let i = 1; i <= height; i++) {
            for (let j = 1; j <= i; j++) {
                triangle += "*";
            }
            triangle += "\n";
        }
        output.textContent = triangle;
    }
}

function sumUntil100() {
    const output = document.getElementById("output");
    let sum = 0;
    let numbers = "";
    while (sum < 100) {
        const num = parseInt(prompt("Wprowadź liczbę:"));
        if (!isNaN(num)) {
            sum += num;
            numbers += num + " ";
        } else {
            output.textContent = "Wprowadź poprawne liczby!";
            return;
        }
    }
    output.textContent = "Suma liczb " + numbers + "wynosi " + sum + ".";
}

// Zdarzenia
const counter = document.getElementById("counter");
const incrementBtn = document.getElementById("incrementBtn");
const decrementBtn = document.getElementById("decrementBtn");

let count = 0;
incrementBtn.addEventListener("click", function() {
    count++;
    counter.textContent = count;
});

decrementBtn.addEventListener("click", function() {
    count--;
    counter.textContent = count;
});

const calcNum1 = document.getElementById("calcNum1");
const calcNum2 = document.getElementById("calcNum2");
const addBtn = document.getElementById("addBtn");
const subtractBtn = document.getElementById("subtractBtn");
const multiplyBtn = document.getElementById("multiplyBtn");
const divideBtn = document.getElementById("divideBtn");
const output = document.getElementById("output");

addBtn.addEventListener("click", function() {
    const num1 = parseFloat(calcNum1.value);
    const num2 = parseFloat(calcNum2.value);
    if (isNaN(num1) || isNaN(num2)) {
        output.textContent = "Wprowadź dwie liczby!";
    } else {
        output.textContent = num1 + " + " + num2 + " = " + (num1 + num2);
    }
});

subtractBtn.addEventListener("click", function() {
    const num1 = parseFloat(calcNum1.value);
    const num2 = parseFloat(calcNum2.value);
    if (isNaN(num1) || isNaN(num2)) {
        output.textContent = "Wprowadź dwie liczby!";
    } else {
        output.textContent = num1 + " - " + num2 + " = " + (num1 - num2);
    }
});

multiplyBtn.addEventListener("click", function() {
    const num1 = parseFloat(calcNum1.value);
    const num2 = parseFloat(calcNum2.value);
    if (isNaN(num1) || isNaN(num2)) {
        output.textContent = "Wprowadź dwie liczby!";
    } else {
        output.textContent = num1 + " * " + num2 + " = " + (num1 * num2);
    }
});

divideBtn.addEventListener("click", function() {
    const num1 = parseFloat(calcNum1.value);
    const num2 = parseFloat(calcNum2.value);
    if (isNaN(num1) || isNaN(num2) || num2 === 0) {
        output.textContent = "Wprowadź dwie liczby, druga różna od zera!";
    } else {
        output.textContent = num1 + " / " + num2 + " = " + (num1 / num2);
    }
});

const textInput = document.getElementById("textInput");
textInput.addEventListener("keyup", function(event) {
    if (event.key === "Enter") {
        textInput.value = textInput.value.toUpperCase();
    }
});

const clickCounter = document.getElementById("clickCounter");
const clickBtn = document.getElementById("clickBtn");
let clicks = 0;
clickBtn.addEventListener("click", function() {
    clicks++;
    clickCounter.textContent = clicks;
    if (clicks % 5 === 0) {
        clickCounter.style.color = getRandomColor();
    }
});

function getRandomColor() {
    const letters = "0123456789ABCDEF";
    let color = "#";
    for (let i = 0; i < 6; i++) {
        color += letters[Math.floor(Math.random() * 16)];
    }
    return color;
}

const contextMenu = document.getElementById("contextMenu");
document.addEventListener("contextmenu", function(event) {
    event.preventDefault();
    contextMenu.style.display = "block";
    contextMenu.style.left = event.clientX + "px";
    contextMenu.style.top = event.clientY + "px";
});

document.addEventListener("click", function(event) {
    if (!event.target.matches("#contextMenu *")) {
        contextMenu.style.display = "none";
    }
});
