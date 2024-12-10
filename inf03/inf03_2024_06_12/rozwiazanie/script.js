function transformImage1() {
  const img = document.querySelector("#blok1 img")
  const inputs = document.getElementsByName("img1-transform")

  inputs.forEach((input) => {
    if (input.checked) {
      img.style.filter = input.value
    }
  })
}

function transformImage2(filter) {
  const img = document.querySelector("#blok2 img")
  img.style.filter = filter
}

function transformImage3() {
  const img = document.querySelector("#blok3 img")
  const inp = document.querySelector("#blok3 input[type='range']")
  img.style.filter = `opacity(${inp.value}%)`
}

function transformImage4() {
  const img = document.querySelector("#blok4 img")
  const inp = document.querySelector("#blok4 input[type='range']")
  img.style.filter = `brightness(${inp.value}%)`
}

document.querySelector("#blok1 button").onclick = () => {
  transformImage1()
}

document.querySelector("#img2-color").onclick = () => {
  transformImage2("grayscale(0)")
}

document.querySelector("#img2-black-white").onclick = () => {
  transformImage2("grayscale(100%)")
}

document.querySelector("#blok3 button").onclick = () => {
  transformImage3()
}

document.querySelector("#blok4 button").onclick = () => {
  transformImage4()
}
