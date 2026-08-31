function podmienObraz(nowyObraz) {
    const obrazGlowny = document.querySelector(".obraz")
    obrazGlowny.src = `img/${nowyObraz}`
}

function otworzOkno() {
    const obrazGlowny = document.querySelector(".obraz")
    const okno = document.querySelector(".okno")
    const obrazOkno = document.querySelector(".obrazOkno")
    okno.style.display = "block"
    obrazOkno.src = obrazGlowny.src
}

function zamknijOkno() {
    const okno = document.querySelector(".okno")
    okno.style.display = "none"
}