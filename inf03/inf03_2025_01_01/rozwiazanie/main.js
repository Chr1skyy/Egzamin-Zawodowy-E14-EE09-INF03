function oblicz() {
    let cena = 0;
    let ile_rat = +document.getElementById("raty").value;
    let miasto = document.getElementById("miasto").value;
    const checkBoxReact = document.getElementById("react");
    const checkBoxJavaScript = document.getElementById("javascript");
    const wynik = document.getElementById("wynik");
    if (checkBoxJavaScript.checked) {
        cena += 3000;
    }
    if (checkBoxReact.checked) {
        cena += 5000;
    }
    let rata = parseInt(cena / ile_rat);
    wynik.innerHTML = `Kurs odbędzie się w ${miasto}. Koszt całkowity: ${cena} zł. Płacisz ${ile_rat} rat po ${rata} zł`;
}
