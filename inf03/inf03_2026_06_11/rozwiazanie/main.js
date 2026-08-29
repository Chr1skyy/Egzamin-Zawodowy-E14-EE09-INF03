const drzewa = ["buk", "lipa", "wierzba", "brzoza", "dąb", "kasztanowiec", "jarzębina", "klon", "magnolia"]

const opisy = [
    "Duże drzewo liściaste z gładką, szarą korą i gęstą, rozłożystą koroną. Ma błyszczące, ciemnozielone liście, które jesienią przebarwiają się na złociste lub czerwonawe odcienie. Buk kwitnie wiosną, a jego owoce to jadalne orzeszki zwane bukwią, zamknięte w kolczastej okrywie. Rośnie na żyznych, przepuszczalnych glebach w klimacie umiarkowanym i jest ważnym elementem lasów liściastych. Drewno buka jest twarde i wytrzymałe, wykorzystywane w meblarstwie i stolarstwie.",
    "drzewo liściaste o szerokiej, gęstej koronie i gładkiej, szarobrązowej korze, która z wiekiem staje się spękana. Ma duże, sercowate liście o piłkowanych brzegach. Kwiaty lipy są małe, żółtawobiałe, zebrane w wonne, zwisające baldachy, które kwitną na przełomie czerwca i lipca. Owoce to niewielkie orzeszki z trwałymi skrzydełkami. Lipa preferuje żyzne, wilgotne gleby i rośnie w klimacie umiarkowanym. Jest ceniona za drewno używane w rzeźbiarstwie oraz kwiaty stosowane w ziołolecznictwie, szczególnie w formie naparów na przeziębienia.",
    "Drzewo liściaste z długimi, zwisającymi gałęziami i elastycznymi pędami. Ma wąskie, lancetowate liście, które są zazwyczaj zielone na górnej stronie i srebrzyste lub niebieskawe na spodzie. Wierzba kwitnie wczesną wiosną, a jej kwiaty tworzą kotki. Rośnie na wilgotnych, często podmokłych terenach, w pobliżu rzek, jezior i innych zbiorników wodnych. Drewno wierzby jest lekkie i elastyczne, używane do produkcji koszy, mebli oraz w wikliniarstwie. Wierzba jest także ceniona w medycynie ludowej, a kora wierzby białej jest źródłem salicyny, stosowanej jako naturalny środek przeciwbólowy i przeciwgorączkowy.",
    "Drzewo liściaste o charakterystycznej białej, łuszczącej się korze. Ma delikatne, jasnozielone liście o trójkątnym lub romboidalnym kształcie, z piłkowanymi brzegami. Brzoza kwitnie wiosną, a jej kwiaty tworzą zwisające, żółtawe kotki. Owoce to drobne orzeszki z cienkimi skrzydełkami. Drzewo to rośnie na różnych typach gleb, często w lasach mieszanych i na obrzeżach pól, dobrze znosi chłodny klimat. Drewno brzozy jest twarde, ale łatwe w obróbce, używane w stolarstwie, do wyrobu mebli i sklejki. Brzoza jest również ceniona za sok brzozowy, który ma zastosowanie w ziołolecznictwie i kosmetyce.",
    "Majestatyczne drzewo liściaste o szerokiej, rozłożystej koronie i grubej, spękanej korze. Ma duże, klapowane liście, które jesienią przebarwiają się na złote i brązowe odcienie. Dąb kwitnie wiosną, a jego kwiaty są niepozorne, zebrane w kotki. Owoce dębu to żołędzie, które są ważnym źródłem pożywienia dla wielu zwierząt. Dąb rośnie na żyznych, dobrze przepuszczalnych glebach i jest długowieczny, mogąc żyć nawet kilkaset lat. Drewno dębu jest twarde, wytrzymałe i cenione w meblarstwie, stolarstwie oraz do produkcji beczek. Dąb symbolizuje siłę, wytrzymałość i długowieczność.",
    "Drzewo o dużych, skrętoległych liściach złożonych z pięciu do siedmiu lancetowatych lub eliptycznych listków. Kwiaty kasztanowca są okazałe, zebrane w stożkowate kłosy i występują zazwyczaj w kolorach białym, różowym lub czerwonym. Owoce kasztanowca to duże, skorupiaste torebki zawierające jadalne orzechy, które są popularne w kuchni i ozdobnych zastosowaniach. Kasztanowiec rośnie w umiarkowanym klimacie na żyznych, dobrze przepuszczalnych glebach.",
    "Drzewo lub krzew z rodziny różowatych (Rosaceae). Charakteryzuje się złożonymi liśćmi składającymi się z 9-15 lancetowatych listków o piłkowanych brzegach. Kwiaty są białe lub kremowe, zebrane w baldachy lub wiechy, pojawiające się wiosną lub wczesnym latem. Owoce jarzębiny to czerwone lub pomarańczowe jagody, które są atrakcyjne dla ptaków i czasem używane do wyrobu dżemów i napojów. Jarzębina rośnie na różnych typach gleb i jest popularna jako roślina ozdobna ze względu na swoje piękne kwiaty i owoce.",
    "Charakteryzuje się dłoniastymi liśćmi o pięciu łatkach, często z wyraźnymi wcięciami. Kwiaty klonu są zazwyczaj niepozorne, zebrane w baldachy lub grona, pojawiające się przed rozwojem liści wczesną wiosną. Owoce klonu to skrzydlaki, czyli nasiona zamknięte w długich, błoniastych osnówkach ułatwiających rozprzestrzenianie przez wiatr. Klony są szeroko rozpowszechnione na całym świecie i są cenione zarówno jako rośliny ozdobne, jak i źródło drewna.",
    "Magnolia to drzewo lub krzew o dużych, skórzastych liściach i pięknych, często pachnących kwiatach. Kwiaty magnolii mogą być białe, różowe lub fioletowe, czasem pełne, a czasem w baldachach. Owoce to czerwone lub różowe jagody. Magnolie są cenione za swój estetyczny wygląd i aromatyczne kwiaty, często stosowane w ogrodach i jako rośliny ozdobne."
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