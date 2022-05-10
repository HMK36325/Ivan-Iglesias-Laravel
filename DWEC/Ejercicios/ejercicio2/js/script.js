window.onload = function () {
    document.getElementById('btnSubir').addEventListener('click', subirImagen)
}

function subirImagen() {
    var imageSelector = document.getElementById("image-selecter")
    var file = imageSelector.files[0];
    if (!file)
        return alert("Selecciona un fichero");
    // creamos un objeto FormData para enviarlo con AJAX
    var formData = new FormData();
    formData.append("image", file);

    fetch('upload.php', {
        method: 'POST',
        body: formData
    })
        .then(function (res) {
            console.log(res)
            return res.json();
        }).then(function (res){
            document.getElementById('preview').src=res.url;
        })
    .catch(error => console.error('Error:', error));
}