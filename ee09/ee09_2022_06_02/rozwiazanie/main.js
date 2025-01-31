const d1 = document.getElementById('d1'),
	d2 = document.getElementById('d2'),
	d3 = document.getElementById('d3'),
	d4 = document.getElementById('d4'),
	d5 = document.getElementById('d5')

function skrypt() {
	const x = parseInt(document.getElementById('x').value)
	d1.style = 'background-color: hsl(' + x + ', 100%, 50%)'
	d2.style = 'background-color: hsl(' + x + ', 80%, 50%)'
	d3.style = 'background-color: hsl(' + x + ', 60%, 50%)'
	d4.style = 'background-color: hsl(' + x + ', 40%, 50%)'
	d5.style = 'background-color: hsl(' + x + ', 20%, 50%)'
}