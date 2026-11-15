function dodajDoZamowienia(potrawa) {
    let nowyElement = document.createElement("li");
    nowyElement.innerHTML = potrawa;
    document.querySelector("ul").appendChild(nowyElement);
}

function wyczyscZamowienie() {
    document.querySelector("ul").innerHTML = "";
}

function zatwierdzZamowienie() {
    alert("Zamówienie zostało przekazane do realizacji");
    document.querySelector("ul").innerHTML = "";
}
