function oblicz() {
    let wynik = document.getElementById("wynik")
    let peeling = document.getElementById("peeling").checked
    let maska = document.getElementById("maska").checked
    let masaz = document.getElementById("masaz").checked
    let makijaz = document.getElementById("makijaz").checked
    let cena = 0
    if (peeling) cena += 45
    if (maska) cena += 30
    if (masaz) cena += 20
    if (makijaz) cena += 50
    wynik.innerHTML = "Cena zabiegów: " + cena
}