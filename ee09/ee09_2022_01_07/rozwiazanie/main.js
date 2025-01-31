function zmienImg(img) {
    const obraz = document.getElementById('zmiana')
    obraz.src = img
}

let zmiana = 0
function polubZmien() {
    zmiana++
    const polub = document.getElementById("polub")
    if (zmiana % 2 == 0) {
        polub.src = "icon-off.png"
    } else {
        polub.src = "icon-on.png"
    }
}