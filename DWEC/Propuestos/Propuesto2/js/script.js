window.onload= function () {
    document.getElementById('nombre').addEventListener('keyup', mostrar)
}

function mostrar(e) {
    let p=e.target.value;
    fetch('servidor_texto.php?nombre='+p, {
            method: 'GET',
        }).then(res => res.text())
            .then(function (res) { 
                document.getElementById('sugerencia').innerText=res;
            })
            .catch(error => console.error('Error:', error));
}