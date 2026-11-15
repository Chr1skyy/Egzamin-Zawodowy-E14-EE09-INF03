function zaznaczWykonane(przycisk) {
    przycisk.parentElement.style.textDecoration = "line-through";
}

function dodajZadanie() {
    let tekst = document.getElementById("zadanie").value;
    let nowyElement = document.createElement("li");
    nowyElement.innerHTML = tekst + "<button type='button' onclick='zaznaczWykonane(this)'>Wykonane</button>";
    document.querySelector("ul").appendChild(nowyElement);
}
