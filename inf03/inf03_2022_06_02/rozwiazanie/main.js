function oblicz() {
    const rodzajPaliwa = +document.getElementById("rodzaj").value
    const iloscLitrow = +document.getElementById("ilosc").value
    const wynik = document.getElementById("wynik")
    if (rodzajPaliwa == 1) cena = 4
	else if (rodzajPaliwa == 2) cena = 3.5
	else cena = 0
    wynik.innerHTML = "koszt paliwa: " + cena * iloscLitrow + " zł"
}