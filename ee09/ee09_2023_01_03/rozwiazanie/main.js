function pokaz(id) {
    let artykul = document.getElementById(id)
    let artykul_1 = document.getElementById('artykul_1')
    let artykul_2 = document.getElementById('artykul_2')
    let artykul_3 = document.getElementById('artykul_3')
    let artykul_4 = document.getElementById('artykul_4')
    artykul_1.style.display = 'none'
    artykul_2.style.display = 'none'
    artykul_3.style.display = 'none'
    artykul_4.style.display = 'none'
    artykul.style.display = 'block'

}