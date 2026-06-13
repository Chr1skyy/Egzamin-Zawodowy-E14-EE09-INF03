const drzewa = ["buk", "lipa", "wierzba", "brzoza", "dab", "kasztanowiec", "jarzebina", "klon", "magnolia"]

// wygenerowane opisy
const opisy = [
    "Buk to drzewo o gładkiej, jasnoszarej korze i jajowatych liściach.",
    "Lipa słynie z pachnących kwiatów, które przyciągają pszczoły i są używane do naparów.",
    "Wierzba często rośnie nad wodą, ma wiotkie gałęzie i charakterystyczne bazie wiosną.",
    "Brzoza jest łatwo rozpoznawalna dzięki swojej białej, łuszczącej się korze.",
    "Dąb to długowieczne drzewo o twardym drewnie i charakterystycznych liściach oraz żołędziach.",
    "Kasztanowiec rodzi kolczaste owoce, wewnątrz których znajdują się brązowe kasztany.",
    "Jarzębina znana jest z czerwonych, kulistych owoców zebranych w baldaszki.",
    "Klon charakteryzuje się dłoniastymi liśćmi, które jesienią przybierają jaskrawe barwy.",
    "Magnolia to drzewo lub krzew o przepięknych, dużych kwiatach, które pojawiają się wczesną wiosną."
]

function wybierz(indeks) {
    const blokGlowny = document.querySelector('main')
    blokGlowny.innerHTML = ''
    const elementH2 = document.createElement('h2')
    elementH2.textContent = drzewa[indeks]
    const paragraf = document.createElement('p')
    paragraf.classList.add('opis')
    paragraf.innerHTML = opisy[indeks]
    blokGlowny.appendChild(elementH2)
    blokGlowny.appendChild(paragraf)
}

function szukaj() {
    const szukaneDrzewo = document.querySelector('#wyszukajDrzewo').value
    const blokGlowny = document.querySelector('main')
    if (drzewa.includes(szukaneDrzewo)) {
        wybierz(drzewa.indexOf(szukaneDrzewo))
    } else {
        blokGlowny.innerHTML = "<p>Drzewa, o którym chcesz znaleźć informacje, nie ma w naszym Atlasie drzew.</p>";
    }
}