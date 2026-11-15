function generujPalete() {
    let h = document.getElementById("x").value;
    document.getElementById("d1").style.backgroundColor = "hsl(" + h + ", 100%, 50%)";
    document.getElementById("d2").style.backgroundColor = "hsl(" + h + ", 80%, 50%)";
    document.getElementById("d3").style.backgroundColor = "hsl(" + h + ", 60%, 50%)";
    document.getElementById("d4").style.backgroundColor = "hsl(" + h + ", 40%, 50%)";
    document.getElementById("d5").style.backgroundColor = "hsl(" + h + ", 20%, 50%)";
}
