window.onload= function () {
    document.getElementById('nombre').addEventListener('keyup', mostrar)
}

function mostrar(e) {
    let p=e.target.value;
    fetch('servidor_texto.php?nombre='+p, {
            method: 'GET',
        }).then(res => res.json())
            .then(function (res) { 
                console.log(res.length)
                document.getElementById('sugerencia').innerHTML=""
                for (let i = 0; i < res.length; i++) {
                    document.getElementById('sugerencia').innerHTML+=res[i].nombre+" ";
                    
                }
            })
            .catch(error => console.error('Error:', error));
}