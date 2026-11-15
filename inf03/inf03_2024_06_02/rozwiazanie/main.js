let odpowiedzi = [
    "Świetnie!",
    "Kto gra główną rolę?",
    "Lubisz filmy Tego reżysera?",
    "Będę 10 minut wcześniej",
    "Może kupimy sobie popcorn?",
    "Ja wolę Colę",
    "Zaproszę jeszcze Grześka",
    "Tydzień temu też byłem w kinie na Diunie",
    "Ja funduję bilety"
];

function wyslijWiadomosc() {
    let pole = document.getElementById("wiadomosc");
    let wypowiedz = document.createElement("div");
    wypowiedz.className = "message jolanta";
    wypowiedz.innerHTML = "<img src='Jolka.jpg' alt='Jolanta Nowak'><p>" + pole.value + "</p>";
    document.getElementById("chat").appendChild(wypowiedz);
    wypowiedz.scrollIntoView();
    pole.value = "";
}

function losujOdpowiedz() {
    let indeks = Math.floor(Math.random() * 9);
    let wypowiedz = document.createElement("div");
    wypowiedz.className = "message krzysztof";
    wypowiedz.innerHTML = "<img src='Krzysiek.jpg' alt='Krzysztof Łukasiński'><p>" + odpowiedzi[indeks] + "</p>";
    document.getElementById("chat").appendChild(wypowiedz);
    wypowiedz.scrollIntoView();
}
