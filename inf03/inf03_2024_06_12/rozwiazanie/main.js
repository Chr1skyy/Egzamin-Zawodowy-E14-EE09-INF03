function zastosujEfekt() {
    const zdjecie = document.querySelector("img[src='img/pszczola.jpg']")
    const efekty = document.querySelectorAll("input[name='efekt']")
    efekty.forEach((e) => {
        if (e.checked) {
			zdjecie.style.filter = e.value
        }
    });
}

function kolor() {
    const zdjecie = document.querySelector("img[src='img/pomarancza.jpg']")
    zdjecie.style.filter = "none"
}

function czarnoBialy() {
    const zdjecie = document.querySelector("img[src='img/pomarancza.jpg']")
    zdjecie.style.filter = "grayscale(100%)"
}

function zastosujPrzezroczystosc() {
    const zdjecie = document.querySelector("img[src='img/owoce.jpg']")
    const wartosc = document.getElementById("przezroczystosc")
    zdjecie.style.filter = "opacity(" + wartosc.value + "%)"
}

function zastosujJasnosc() {
    const zdjecie = document.querySelector("img[src='img/zolw.jpg']")
    const wartosc = document.getElementById("jasnosc")
    zdjecie.style.filter = "brightness(" + wartosc.value + "%)"
}
