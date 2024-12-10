const block1 = document.getElementById("blok-1")
const block2 = document.getElementById("blok-2")
const block3 = document.getElementById("blok-3")

const buttonReferences = [
  {
    buttonId: "klient-button",
    blockId: "blok-1",
  },
  {
    buttonId: "adres-button",
    blockId: "blok-2",
  },
  {
    buttonId: "kontakt-button",
    blockId: "blok-3",
  },
]

const klientButton = document.getElementById("klient-button")
const adresButton = document.getElementById("adres-button")
const kontaktButton = document.getElementById("kontakt-button")
const confirmButton = document.getElementById("confirm-button")

const progressBar = document.querySelector("#progress > *")
let percentage = 4

const inputs = document.querySelectorAll("input")

function activate(reference) {
  //   const button = document.getElementById(reference.buttonId)
  const block = document.getElementById(reference.blockId)
  const allBlocks = document.querySelectorAll("main > div")

  allBlocks.forEach((block) => {
    block.classList.remove("active-block")
  })

  block.classList.add("active-block")
}

klientButton.onclick = () => {
  activate(buttonReferences[0])
}

adresButton.onclick = () => {
  activate(buttonReferences[1])
}

kontaktButton.onclick = () => {
  activate(buttonReferences[2])
}

function changeProgress() {
  if (percentage < 100) {
    percentage += 12
    progressBar.style.width = `${percentage}%`
  }
}

inputs.forEach((input) => {
  input.addEventListener("focusout", () => {
    changeProgress()
  })
})

function confirm() {
  inputs.forEach((input) => {
    console.log({
      input,
      value: input.type == "checkbox" ? input.checked : input.value,
    })
  })
}

confirmButton.onclick = (e) => {
  e.preventDefault()
  confirm()
}
