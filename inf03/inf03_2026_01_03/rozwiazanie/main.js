function choiceImg(imgSrc) {
    let img = document.getElementById("choiceImg");
    if (imgSrc == "1m.bmp") {
        img.src = "1d.bmp";
    } else {
        img.src = "2d.bmp";
    }
}

function calculate() {
    let valueA = document.getElementById("valueA").value;
    let valueB = document.getElementById("valueB").value;
    let img = document.getElementById("choiceImg");
    let result = document.getElementById("result");
    let pole;
    if (img.src.includes("1d.bmp")) {
        pole = (valueA * valueB) / 2;
    } else {
        pole = valueA * valueB;
    }
    result.innerHTML = pole;
}