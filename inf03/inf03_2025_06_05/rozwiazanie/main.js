function addToCart() {
    const file = document.getElementById('file').files[0]
    const numberOfCopy = +document.getElementById('numberOfCopies').value
    const typeOfPaper = document.querySelector('input[type=radio]:checked').value
    let price = 0
    if (typeOfPaper == "błyszczący") {
        price = numberOfCopy * 1.5
    }
    if (typeOfPaper == "matowy") {
        price = numberOfCopy * 2
    }
    const newImg = document.createElement("img")
    newImg.src = file.name
    const newP1 = document.createElement("p")
    newP1.innerHTML = `Liczba kopii: ${numberOfCopy}`
    const newP2 = document.createElement("p")
    newP2.innerHTML = `Cena: ${price}`
    const cart = document.getElementById("cart")
    cart.appendChild(newImg)
    cart.appendChild(newP1)
    cart.appendChild(newP2)
}