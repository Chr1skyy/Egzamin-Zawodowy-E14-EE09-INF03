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