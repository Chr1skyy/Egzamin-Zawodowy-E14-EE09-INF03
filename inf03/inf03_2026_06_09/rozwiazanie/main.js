function dodajDoZamowienia(potrawa) {
    const lista = document.querySelector("ul")
    const nowyElement = document.createElement("li")
    nowyElement.innerHTML = potrawa
    lista.append(nowyElement)
}

function wyczyscZamowienie() {
    const lista = document.querySelector("ul")
    lista.innerHTML = ""
}

function zatwierdzZamowienie() {
    const lista = document.querySelector("ul")
    alert("Zamówienie zostało przekazane do realizacji")
    lista.innerHTML = ""
}