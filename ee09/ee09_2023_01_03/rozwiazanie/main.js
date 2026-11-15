function pokaz(artykul) {
    document.getElementById("artykul_1").style.display = "none";
    document.getElementById("artykul_2").style.display = "none";
    document.getElementById("artykul_3").style.display = "none";
    document.getElementById("artykul_4").style.display = "none";
    document.getElementById(artykul).style.display = "block";
}
