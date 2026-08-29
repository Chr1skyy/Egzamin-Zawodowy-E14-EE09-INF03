var pacjenci = {
    "id": "1",
    "imie": "Agnieszka",
    "nazwisko": "Nowak",
    "wystawca": "lek. Marian Kowal",
    "numer": "4387203",
    "recepty": [
        { "id": "0", "data": "8.03.2025", "kod": "1220", "lek1": "Witamina C", "lek2": "Potas", "lek3": "Syrop prawoślazowy" },
        { "id": "1", "data": "23.04.2025", "kod": "4634", "lek1": "APAP", "lek2": "Witamina B", "lek3": "" },
        { "id": "2", "data": "13.05.2025", "kod": "2913", "lek1": "Melatonina", "lek2": "", "lek3": "" },
        { "id": "3", "data": "30.10.2025", "kod": "1105", "lek1": "Witamina C", "lek2": "Calcium", "lek3": "Sinupret" }
    ]
};

const sekcjaPrawy2 = document.getElementById('prawy2');

pacjenci.recepty.forEach(recepta => {
    let leki = '';
    if (recepta.lek1 != "") leki += `<li>${recepta.lek1}</li>`;
    if (recepta.lek2 != "") leki += `<li>${recepta.lek2}</li>`;
    if (recepta.lek3 != "") leki += `<li>${recepta.lek3}</li>`;

    sekcjaPrawy2.innerHTML += `
        <div class="recepty">
            <p>Data wystawienia: ${recepta.data}</p>
            <ol>${leki}</ol>
            <h4>kod: ${recepta.kod}</h4>
        </div>
    `;
});