// Trudny poziom
function checkDistance() {
    const x1 = parseInt(document.getElementById("num1").value);
    const y1 = parseInt(document.getElementById("num2").value);
    const x2 = parseInt(document.getElementById("num3").value);
    const y2 = parseInt(document.getElementById("num4").value);
    const output = document.getElementById("output");
    if (isNaN(x1) || isNaN(y1) || isNaN(x2) || isNaN(y2)) {
        output.textContent = "Wprowadź współrzędne dwóch punktów!";
    } else {
        const distance = Math.sqrt((x2 - x1) ** 2 + (y2 - y1) ** 2);
        if (distance < 10) {
            output.textContent = "Odległość między punktami (" + x1 + ", " + y1 + ") i (" + x2 + ", " + y2 + ") jest mniejsza niż 10.";
        } else {
            output.textContent = "Odległość między punktami (" + x1 + ", " + y1 + ") i (" + x2 + ", " + y2 + ") nie jest mniejsza niż 10.";
        }
    }
}

function isPalindrome() {
    const text = document.getElementById("text").value.toLowerCase().replace(/\s/g, "");
    const output = document.getElementById("output");
    const reversedText = text.split("").reverse().join("");
    if (text === reversedText) {
        output.textContent = "Tekst \"" + text + "\" jest palindromem.";
    } else {
        output.textContent = "Tekst \"" + text + "\" nie jest palindromem.";
    }
}

function dayPart() {
    const hour = parseInt(document.getElementById("hour").value);
    const output = document.getElementById("output");
    if (isNaN(hour) || hour < 0 || hour > 23) {
        output.textContent = "Wprowadź poprawną godzinę!";
    } else if (hour >= 6 && hour < 12) {
        output.textContent = "Jest rano.";
    } else if (hour >= 12 && hour < 18) {
        output.textContent = "Jest popołudnie.";
    } else {
        output.textContent = "Jest wieczór.";
    }
}

function isTriangle() {
    const a = parseInt(document.getElementById("num1").value);
    const b = parseInt(document.getElementById("num2").value);
    const c = parseInt(document.getElementById("num3").value);
    const output = document.getElementById("output");
    if (isNaN(a) || isNaN(b) || isNaN(c)) {
        output.textContent = "Wprowadź trzy liczby!";
    } else if (a + b > c && a + c > b && b + c > a) {
        output.textContent = "Liczby " + a + ", " + b + ", " + c + " mogą być bokami trójkąta.";
    } else {
        output.textContent = "Liczby " + a + ", " + b + ", " + c + " nie mogą być bokami trójkąta.";
    }
}

function calculateFactorial() {
    const n = parseInt(document.getElementById("factorial").value);
    const output = document.getElementById("output");
    if (isNaN(n) || n < 0) {
        output.textContent = "Wprowadź liczbę nieujemną!";
    } else {
        let factorial = 1;
        for (let i = 1; i <= n; i++) {
            factorial *= i;
        }
        output.textContent = "Silnia z " + n + " wynosi " + factorial + ".";
    }
}

function gcd(a, b) {
    if (b === 0) {
        return a;
    }
    return gcd(b, a % b);
}

function gcdUI() {
    const a = parseInt(document.getElementById("num1").value);
    const b = parseInt(document.getElementById("num2").value);
    const output = document.getElementById("output");
    if (isNaN(a) || isNaN(b)) {
        output.textContent = "Wprowadź dwie liczby!";
    } else {
        const result = gcd(a, b);
        output.textContent = "Największy wspólny dzielnik liczb " + a + " i " + b + " to " + result + ".";
    }
}

function isArmstrongNumber(num) {
    const digits = num.toString().split("").map(Number);
    const sum = digits.reduce((acc, digit) => acc + digit ** digits.length, 0);
    return sum === num;
}

function printArmstrongNumbers() {
    const output = document.getElementById("output");
    let result = "";
    for (let i = 1; i <= 1000; i++) {
        if (isArmstrongNumber(i)) {
            result += i + " ";
        }
    }
    output.textContent = "Liczby Armstronga od 1 do 1000: " + result;
}

function calculateFibonacci() {
    const n = parseInt(document.getElementById("fibonacci").value);
    const output = document.getElementById("output");
    if (isNaN(n) || n < 0) {
        output.textContent = "Wprowadź liczbę nieujemną!";
    } else {
        let a = 0, b = 1, c;
        for (let i = 0; i < n; i++) {
            c = a + b;
            a = b;
            b = c;
        }
        output.textContent = "Wartość ciągu Fibonacciego dla " + n + " wynosi " + a + ".";
    }
}

function drawTree() {
    const height = parseInt(document.getElementById("treeHeight").value);
    const output = document.getElementById("output");
    if (isNaN(height) || height < 1) {
        output.textContent = "Wprowadź poprawną wysokość!";
    } else {
        let tree = "";
        for (let i = 1; i <= height; i++) {
            const spaces = " ".repeat(height - i);
            const stars = "*".repeat(2 * i - 1);
            tree += spaces + stars + "\n";
        }
        output.textContent = tree;
    }
}

function isPerfectNumber(num) {
    let sum = 0;
    for (let i = 1; i <= num / 2; i++) {
        if (num % i === 0) {
            sum += i;
        }
    }
    return sum === num;
}

function printPerfectNumbers() {
    const output = document.getElementById("output");
    let result = "";
    for (let i = 1; i <= 10000; i++) {
        if (isPerfectNumber(i)) {
            result += i + " ";
        }
    }
    output.textContent = "Liczby doskonałe od 1 do 10000: " + result;
}

// Zdarzenia
const quotes = [
    "Sukces to umiejętność przejścia z porażki do porażki bez utraty entuzjazmu. - Winston Churchill",
    "Wyobraźnia jest ważniejsza od wiedzy. - Albert Einstein",
    "Nie bój się popełniać błędów. Bój się tylko tego, że nie będziesz się z nich uczyć. - Epiktet",
    "Jeśli nie możesz wytłumaczyć czegoś w prosty sposób, to nie rozumiesz tego wystarczająco dobrze. - Albert Einstein",
    "Nie ma nic niemożliwego dla tego, kto będzie próbował. - Alexander Wielki"
];

const quoteElement = document.getElementById("quote");
const changeQuoteBtn = document.getElementById("changeQuoteBtn");

function displayRandomQuote() {
    const randomIndex = Math.floor(Math.random() * quotes.length);
    quoteElement.textContent = quotes[randomIndex];
}

changeQuoteBtn.addEventListener("click", displayRandomQuote);

const redBtn = document.getElementById("redBtn");
const greenBtn = document.getElementById("greenBtn");
const blueBtn = document.getElementById("blueBtn");

redBtn.addEventListener("click", function() {
    document.body.style.backgroundColor = "red";
});

greenBtn.addEventListener("click", function() {
    document.body.style.backgroundColor = "green";
});

blueBtn.addEventListener("click", function() {
    document.body.style.backgroundColor = "blue";
});

const textOutput = document.getElementById("textOutput");
const enterBtn = document.getElementById("enterBtn");

enterBtn.addEventListener("click", function() {
    const text = document.getElementById("text").value;
    textOutput.value = text;
});

const image = document.getElementById("image");
let isDragging = false;
let currentX;
let currentY;
let initialX;
let initialY;
let xOffset = 0;
let yOffset = 0;

image.addEventListener("dragstart", dragStart);
image.addEventListener("dragend", dragEnd);
image.addEventListener("drag", drag);

function dragStart(e) {
    initialX = e.clientX - xOffset;
    initialY = e.clientY - yOffset;

    if (e.target === image) {
        isDragging = true;
    }
}

function dragEnd(e) {
    initialX = currentX;
    initialY = currentY;

    isDragging = false;
}

function drag(e) {
    if (isDragging) {
        e.preventDefault();

        currentX = e.clientX - initialX;
        currentY = e.clientY - initialY;

        xOffset = currentX;
        yOffset = currentY;

        setTranslate(currentX, currentY, image);
    }
}

function setTranslate(xPos, yPos, el) {
    el.style.transform = `translate3d(${xPos}px, ${yPos}px, 0)`;
}

const fontSizeSlider = document.getElementById("fontSizeSlider");
const fontSizeText = document.getElementById("fontSizeText");

fontSizeSlider.addEventListener("input", function() {
    const fontSize = this.value;
    fontSizeText.style.fontSize = `${fontSize}px`;
    fontSizeText.textContent = `Rozmiar czcionki: ${fontSize}`;
});
