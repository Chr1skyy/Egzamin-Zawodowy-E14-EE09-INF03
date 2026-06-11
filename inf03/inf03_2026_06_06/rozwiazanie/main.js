const recepty = [
    {
        "data": "23.04.2025",
        "lek1": "APAP",
        "lek2": "Witamina B",
        "lek3": "",
        "kod": "4634"
    },
    {
        "data": "13.05.2025",
        "lek1": "Melatonina",
        "lek2": "",
        "lek3": "",
        "kod": "2913"
    }
];
const sekcjaPrawy2 = document.getElementById('prawy2');

recepty.forEach(recepta => {
    const blok = document.createElement('div');
    blok.className = 'recepty';

    const paragrafData = document.createElement('p');
    paragrafData.innerHTML = `Data wystawienia: ${recepta.data}`;
    blok.appendChild(paragrafData);

    const lista = document.createElement('ol');
    if (recepta.lek1.trim() != "") {
        const li = document.createElement('li');
        li.innerHTML = recepta.lek1;
        lista.appendChild(li);
    }
    if (recepta.lek2.trim() != "") {
        const li = document.createElement('li');
        li.innerHTML = recepta.lek2;
        lista.appendChild(li);
    }
    if (recepta.lek3.trim() != "") {
        const li = document.createElement('li');
        li.innerHTML = recepta.lek3;
        lista.appendChild(li);
    }
    blok.appendChild(lista);

    const kod = document.createElement('h4');
    kod.innerHTML = `Kod: ${recepta.kod}`;
    blok.appendChild(kod);
    sekcjaPrawy2.appendChild(blok);
});