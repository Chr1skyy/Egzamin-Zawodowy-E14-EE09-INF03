function zaznaczWykonane(clickedButton) {
    const elementListy = clickedButton.parentElement
    elementListy.style = "text-decoration: line-through"
}
function dodajZadanie() {
    const lista = document.querySelector("ul")
    const zadanie = document.querySelector("input")
    let nowyElementListy = document.createElement("li")
    nowyElementListy.innerHTML = `${zadanie.value}<button type='button' onclick='zaznaczWykonane(this)'>Wykonane</button>`
    lista.appendChild(nowyElementListy)
}