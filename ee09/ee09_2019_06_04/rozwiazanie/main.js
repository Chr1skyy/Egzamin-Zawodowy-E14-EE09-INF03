function dodawanie() {
    let a = Number(document.getElementById("a").value);
    let b = Number(document.getElementById("b").value);
    let wynik = document.getElementById("wynik");
    wynik.innerHTML = "Wynik: " + (a + b);
}

function odejmowanie() {
    let a = Number(document.getElementById("a").value);
    let b = Number(document.getElementById("b").value);
    let wynik = document.getElementById("wynik");
    wynik.innerHTML = "Wynik: " + (a - b);
}

function mnozenie() {
    let a = Number(document.getElementById("a").value);
    let b = Number(document.getElementById("b").value);
    let wynik = document.getElementById("wynik");
    wynik.innerHTML = "Wynik: " + a * b;
}

function dzielenie() {
    let a = Number(document.getElementById("a").value);
    let b = Number(document.getElementById("b").value);
    let wynik = document.getElementById("wynik");
    wynik.innerHTML = "Wynik: " + a / b;
}

function potegowanie() {
    let a = Number(document.getElementById("a").value);
    let b = Number(document.getElementById("b").value);
    let wynik = document.getElementById("wynik");
    wynik.innerHTML = "Wynik: " + Math.pow(a, b);
}
