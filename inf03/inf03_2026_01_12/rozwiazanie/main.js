function addPattern() {
    const patternFile = document.getElementById('patternFile');
    const color = document.getElementById('color').value;
    const price = document.getElementById('price').value;

    let filename = patternFile.value.split('\\').pop();

    alert(`Wzór: ${filename}, kolor ${color} w cenie ${price} zł`);

    const img = document.createElement('img');
    img.src = filename;
    img.alt = filename;
    img.className = 'miniatury';

    document.getElementById('gallery').appendChild(img);
}   