// Wersja 1
let idZamowienia = 0;

function sprawdz() {
    const produkty = ['p1', 'p2', 'p3', 'p4'];
    for (let i = 0; i < produkty.length; i++) {
        const produkt = document.getElementById(produkty[i]);
        const ilosc = parseInt(produkt.innerText);

        if (ilosc === 0) {
            produkt.style.backgroundColor = 'red';
        } else if (ilosc >= 1 && ilosc <= 5) {
            produkt.style.backgroundColor = 'yellow';
        } else if (ilosc > 5) {
            produkt.style.backgroundColor = 'honeydew';
        }
    }
}

function aktualizuj(produktID) {
    const nowaIlosc = prompt('Podaj nową ilość:');
    const produkt = document.getElementById(produktID);
    produkt.innerText = nowaIlosc;
    sprawdz();
}

function zamow(nazwaProduktu) {
    alert('Zamówienie nr: ' + idZamowienia + ' Produkt: ' + nazwaProduktu);
    idZamowienia++;
}

sprawdz();

// Wersja 2
/*
let idZamowienia = 0;

function sprawdzZaawansowane() {
    document.querySelectorAll('.ilosc').forEach((el) => {
        const ilosc = parseInt(el.innerText);
        if (ilosc === 0) {
            el.style.backgroundColor = 'red';
        } else if (ilosc >= 1 && ilosc <= 5) {
            el.style.backgroundColor = 'yellow';
        } else if (ilosc > 5) {
            el.style.backgroundColor = 'honeydew';
        }
    });
}

document.querySelectorAll('.aktualizuj').forEach((przycisk) => {
    przycisk.addEventListener('click', () => {
        const nowaIlosc = prompt('Podaj nową ilość:');
        const komorkaIlosc = przycisk.closest('tr').querySelector('.ilosc');
        komorkaIlosc.innerText = nowaIlosc;
        sprawdzZaawansowane();
    });
});

document.querySelectorAll('.zamow').forEach((przycisk) => {
    przycisk.addEventListener('click', () => {
        const nazwa = przycisk.closest('tr').querySelector('.produkt').innerText;
        alert('Zamówienie nr: ' + idZamowienia + ' Produkt: ' + nazwa);
        idZamowienia++;
    });
});

sprawdzZaawansowane();
*/