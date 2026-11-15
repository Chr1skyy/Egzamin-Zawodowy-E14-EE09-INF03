let gracz = "kolko";

function zaznaczPole(pole) {
    if (pole.src.includes("nic.png")) {
        if (gracz == "kolko") {
            pole.src = "img/o.png";
            document.getElementById("lewa").style.visibility = "hidden";
            document.getElementById("prawa").style.visibility = "visible";
            gracz = "krzyzyk";
        } else {
            pole.src = "img/x.png";
            document.getElementById("lewa").style.visibility = "visible";
            document.getElementById("prawa").style.visibility = "hidden";
            gracz = "kolko";
        }
    }
}
