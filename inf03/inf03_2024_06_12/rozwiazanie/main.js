function zastosujEfekt() {
    const zdjecie = document.querySelector("img[src='pszczola.jpg']")
    const efekty = document.querySelectorAll("input[name='efekt']")
    efekty.forEach(e => {
        if (e.checked) {
            switch (e.value) {
                case 'blur':
                    zdjecie.style.filter = 'blur(6px)';
                    break;
                case 'sepia':
                    zdjecie.style.filter = 'sepia(100%)';
                    break;
                case 'negative':
                    zdjecie.style.filter = 'invert(100%)';
                    break;
                default:
                    zdjecie.style.filter = 'none';
            }
        }
    });
}

function kolor() {
    const zdjecie = document.querySelector("img[src='pomarancza.jpg']")
    zdjecie.style.filter = "none"
}

function czarnoBialy() {
    const zdjecie = document.querySelector("img[src='pomarancza.jpg']")
    zdjecie.style.filter = "grayscale(100%)"
}

function zastosujPrzezroczystosc() {
    const zdjecie = document.querySelector("img[src='owoce.jpg']")
    const wartosc = document.getElementById("przezroczystosc")
    zdjecie.style.filter = "opacity(" + wartosc.value + "%)"
}

function zastosujJasnosc() {
    const zdjecie = document.querySelector("img[src='zolw.jpg']")
    const wartosc = document.getElementById("jasnosc")
    zdjecie.style.filter = "brightness(" + wartosc.value + "%)"
}
