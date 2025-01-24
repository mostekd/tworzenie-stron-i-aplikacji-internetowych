//1
const num1_1 = parseFloat(prompt("Wprowadź pierwszą liczbę:"));
const num2_1 = parseFloat(prompt("Wprowadź drugą liczbę:"));
const num3_1 = parseFloat(prompt("Wprowadź trzecią liczbę:"));

const sum_1 = num1_1 + num2_1 + num3_1;
document.getElementById('output').innerHTML += `<p>Zadanie 1: </p><p>Suma trzech liczb to: ${sum_1}</p>`;

//2
const num1_2 = parseFloat(prompt("Wprowadź pierwszą liczbę:"));
const num2_2 = parseFloat(prompt("Wprowadź drugą liczbę:"));
const num3_2 = parseFloat(prompt("Wprowadź trzecią liczbę:"));

const average = (num1_2 + num2_2 + num3_2) / 3;
document.getElementById('output').innerHTML += `<p>Zadanie 2: </p><p>Średnia trzech liczb to: ${average}</p>`;

//3
const num1_3 = parseFloat(prompt("Wprowadź pierwszą liczbę:"));
const num2_3 = parseFloat(prompt("Wprowadź drugą liczbę:"));

const sum_3 = num1_3 + num2_3;
const difference_3 = num1_3 - num2_3;
const product_3 = num1_3 * num2_3;

document.getElementById('output').innerHTML += `<p>Zadanie 3: </p><p>Suma: ${sum_3}</p>`;
document.getElementById('output').innerHTML += `<p>Różnica: ${difference_3}</p>`;
document.getElementById('output').innerHTML += `<p>Iloczyn: ${product_3}`;

//4
const num_4 = parseFloat(prompt("Wprowadź liczbę:"));

const sqrt_4 = Math.sqrt(num_4);
document.getElementById('output').innerHTML += `<p>Zadanie 4: </p><p>Pierwiastek kwadratowy z ${num_4} to: ${sqrt_4}`;

//5
const side_5 = parseFloat(prompt("Wprowadź długość boku kwadratu:"));

const area_5 = side_5 ** 2;
document.getElementById('output').innerHTML += `<p>Zadanie 5: </p><p>Pole kwadratu o boku ${side_5} to: ${area_5}`;

//6
const length = parseFloat(prompt("Wprowadź długość:"));
const width = parseFloat(prompt("Wprowadź szerokość:"));
const height = parseFloat(prompt("Wprowadź wysokość:"));

const volume = length * width * height;
document.getElementById('output').innerHTML += `<p>Zadanie 6: </p><p>Pole prostopadłościanu o wymiarach ${length} x ${width} x ${height} to: ${volume}`;


//7
const radius = parseFloat(prompt("Wprowadź promień koła:"));

const area = Math.PI * radius ** 2;
const circumference = 2 * Math.PI * radius;

document.getElementById('output').innerHTML += `<p>Zadanie 7: </p><p>Pole koła o promieniu ${radius} to: ${area}`;
document.getElementById('output').innerHTML += `<p>Obwód koła o promieniu ${radius} to: ${circumference}`;

//8
const fuelPrice_8 = parseFloat(prompt("Wprowadź aktualną cenę benzyny:"));

const distance_8 = 360; // km
const fuelConsumption_8 = 8; // l/100km

const fuelRequired_8 = (distance_8 / 100) * fuelConsumption_8;
const cost_8 = fuelRequired_8 * fuelPrice_8;

document.getElementById('output').innerHTML += `<p>Zadanie 8: </p><p>Koszt przejazdu z Gdańska do Szczecina (360 km) przy spalaniu 8 l/100km i cenie benzyny ${fuelPrice} zł/l to: ${cost.toFixed(2)} zł`;

//9
const fuelPrice = parseFloat(prompt("Wprowadź cenę benzyny:"));
const distance = parseFloat(prompt("Wprowadź długość trasy (w km):"));
const fuelConsumption = parseFloat(prompt("Wprowadź spalanie samochodu (w l/100km):"));

const fuelRequired = (distance / 100) * fuelConsumption;
const cost = fuelRequired * fuelPrice;

document.getElementById('output').innerHTML += `<p>Zadanie 9: </p><p>Koszt przejazdu na trasie ${distance} km przy spalaniu ${fuelConsumption} l/100km i cenie benzyny ${fuelPrice} zł/l to: ${cost.toFixed(2)} zł`;

//10
const amount = parseFloat(prompt("Wprowadź kwotę lokaty:"));

const interestRate = 0.08; // 8% rocznie
const taxRate = 0.19; // "podatek Belki" 19%

const interest = amount * interestRate;
const tax = interest * taxRate;
const profit = interest - tax;

document.getElementById('output').innerHTML += `<p>Zadanie 10: </p><p>Zysk z lokaty ${amount} zł przy oprocentowaniu 8% rocznie i "podatku Belki" 19% to: ${profit.toFixed(2)} zł`;