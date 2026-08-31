function aktualizujPole() {
    const suwak = document.querySelector("input[type='range']")
    const poleEdycyjne = document.querySelector("input[type='number']")
    poleEdycyjne.value = suwak.value
}

function obliczRozmiarRamy() {
    const wzrost = parseInt(document.querySelector("input[type='number']").value)
    let wspolczynnik = 0.26
    const wybranyRodzaj = document.querySelector("input[name='rodzajRoweru']:checked");
    if (wybranyRodzaj.value == "gorski") wspolczynnik = 0.26;
    if (wybranyRodzaj.value == "szosa") wspolczynnik = 0.3;
    if (wybranyRodzaj.value == "trekking") wspolczynnik = 0.28;
    let rozmiar = Math.round((wzrost * wspolczynnik) / 2.54)

    const paragrafWyniku = document.querySelector("#wynik")
    paragrafWyniku.innerHTML = `Zalecany rozmiar ramy to: ${rozmiar} cali`
}

function aktualnaData() {
    const dzis = new Date()
    let dzien = dzis.getDate()
    if (dzien < 10) dzien = `0${dzien}`
    let miesiac = dzis.getMonth() + 1
    if (miesiac < 10) miesiac = `0${miesiac}`
    let rok = dzis.getFullYear()

    let sformatowanaData = `${dzien}.${miesiac}.${rok}`;

    const komorkaDaty = document.querySelector("#komorkaDaty")
    komorkaDaty.innerHTML = sformatowanaData
}
aktualnaData()