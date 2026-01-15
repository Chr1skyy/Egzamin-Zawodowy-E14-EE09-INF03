function changeSection(sectionId) {
    const sekcjaKolor = document.getElementById('sekcjaKolor')
    const sekcjaKsztalt = document.getElementById('sekcjaKsztalt')
    const sekcjaWzor = document.getElementById('sekcjaWzor')
    const przyciskKolor = document.getElementById('przyciskKolor')
    const przyciskKsztalt = document.getElementById('przyciskKsztalt')
    const przyciskWzor = document.getElementById('przyciskWzor')
    if (sectionId === 'sekcjaKolor') {
        sekcjaKolor.style.display = 'block'
        sekcjaKsztalt.style.display = 'none'
        sekcjaWzor.style.display = 'none'
        przyciskKolor.style.backgroundColor = 'salmon'
        przyciskKsztalt.style.backgroundColor = 'crimson'
        przyciskWzor.style.backgroundColor = 'crimson'
    }
    if (sectionId === 'sekcjaKsztalt') {
        sekcjaKolor.style.display = 'none'
        sekcjaKsztalt.style.display = 'block'
        sekcjaWzor.style.display = 'none'
        przyciskKolor.style.backgroundColor = 'crimson'
        przyciskKsztalt.style.backgroundColor = 'salmon'
        przyciskWzor.style.backgroundColor = 'crimson'
    }
    if (sectionId === 'sekcjaWzor') {
        sekcjaKolor.style.display = 'none'
        sekcjaKsztalt.style.display = 'none'
        sekcjaWzor.style.display = 'block'
        przyciskKolor.style.backgroundColor = 'crimson'
        przyciskKsztalt.style.backgroundColor = 'crimson'
        przyciskWzor.style.backgroundColor = 'salmon'
    }
}