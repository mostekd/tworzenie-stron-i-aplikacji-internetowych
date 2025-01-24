const div = document.querySelector(".box"); //zmienna div  szukająca elementu div
 
div.style.backgroundColor = "blue"; //ustawienie stylu koloru tła diva na niebieski
div.style.boxShadow = "0 0 10px black"; // ustawienie stylu na box-shadow
div.style.color = "white";
 
// div.textContent = "Hello, World!";
// div.innerHTML = "<h1>Hello, World!</h1>";
 
let counter = 0;
let active = false; // ustawienie zmiennej active na false
div.addEventListener("click", () => { //ustawienie nasłuchiwania na kliknięcie na element div
  active = !active;
  if (active) {
    div.style.backgroundColor = "red";
    div.textContent = "Włączony";
  } else {
    div.style.backgroundColor = "blue";
    div.textContent = "Wyłączony";
  }
 
  const ul = document.querySelector("ul"); //ustawienie zmiennej ul na element ul
  const li = document.createElement("li"); // ustawienie zmiennej li na stworzenie elementu li
  li.textContent = `Element nr ${++counter}`; //ustawienie tekstu w li
  ul.append(li); //ustawienie wyświetlania li w ul
});