let numerCytatu = 1;

function zmienCytat() {
    document.getElementById("cytat" + numerCytatu).style.display = "none";
    numerCytatu++;
    if (numerCytatu > 3) {
        numerCytatu = 1;
    }
    document.getElementById("cytat" + numerCytatu).style.display = "block";
}
