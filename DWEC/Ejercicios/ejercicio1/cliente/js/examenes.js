window.onload = function () {
    document.getElementById('examen').addEventListener('change', call);

}


function call(e) {
    let examen = e.target.value;
    document.getElementById('preguntas').innerHTML = "";
    fetch('http://localhost/DWEC/Ejercicios/ejercicio1/servidor/preguntas.php?examen=' + examen, {
        method: 'GET',
    }).then(res => res.json())
        .then(function (res) {
            console.log(res)
            innerHTML(res);
        })
        .catch(error => console.error('Error:', error));
}

function innerHTML(res) {
    for (let i = 0; i < res.length; i++) {
        console.log(res[i])

        let div = document.createElement('div');
        div.className = 'pregunta';
        div.innerHTML = res[i].texto
        div.id='pregunta'+res[i].idPregunta;

        //div q alamcena las respuestas
        let divRespuesta = document.createElement('div');
        divRespuesta.className = 'respuesta';

        //Creamos los radios recorriendo cuantas respuestas posibles hay
        for (let j = 0; j < res[i].respuestas.length; j++) {
            console.log(res[i].respuestas[j])
            //Creamos el boton
            let radiobox = document.createElement('input');
            radiobox.type = 'radio';
            radiobox.name = res[i].idPregunta;
            radiobox.id = res[i].respuestas[j].idRespuesta;
            radiobox.value = res[i].respuestas[j].idRespuesta;

            //la label para el boton
            let label = document.createElement('label')
            label.htmlFor = res[i].respuestas[j].idRespuesta;

            //La descripcion q va dentro del label
            let description = document.createTextNode(res[i].respuestas[j].texto);
            label.appendChild(description);

            let newline = document.createElement('br');

            //Se lo añadimos al div padre de las respuestas
            divRespuesta.appendChild(radiobox);
            divRespuesta.appendChild(label);
            divRespuesta.appendChild(newline);

        }

        //Creacion boton
        let boton = document.createElement('button');
        boton.className = 'button';
        boton.innerHTML = 'Responder';
        boton.id = res[i].idPregunta;
        boton.addEventListener('click', responder);

        div.appendChild(divRespuesta);
        div.appendChild(boton);

        document.getElementById('preguntas').appendChild(div)

    }


}

function responder(e) {
    let idPregunta = e.target.id;
    let boton = document.getElementById(idPregunta);
    let pregunta=document.getElementById('pregunta'+idPregunta);

    let radio = document.getElementsByName(idPregunta);
    let idRespuesta;
    radio.forEach(r => {
        if (r.checked) {
            idRespuesta = r.value;
        }
    });

    fetch('http://localhost/DWEC/Ejercicios/ejercicio1/servidor/respuesta.php?id-pregunta=' + idPregunta, {
        method: 'GET',
    }).then(res => res.json())
        .then(function (res) {
            let child = document.getElementById(idPregunta);
            let div = document.createElement('div');
            if (idRespuesta == res.idRespuesta) {
                div.className = 'acierto'
                div.textContent = "Pregunta acertada";
                child.parentNode.replaceChild(div, child);
            } else if (idRespuesta != res.idRespuesta && idRespuesta != undefined) {
                div.className = 'fallo'
                div.textContent = "Pregunta fallada";
                child.parentNode.replaceChild(div, child);
            } else {
                div.className = 'no-contestada'
                div.innerHTML = "Pregunta no contestada";
                div.id = 'no-contestada';
                boton.className = 'sugerencia';
                boton.textContent = 'Sugerencia';
                boton.removeEventListener('click', responder);
                boton.addEventListener('click', sugerencia);
                div.appendChild(boton);
                pregunta.appendChild(div);
            }

        })
        .catch(error => console.error('Error:', error));

}


function sugerencia(e) {
    let idPregunta = e.target.id;
    let boton = document.getElementById(idPregunta);
    boton.removeEventListener('click', sugerencia);
    boton.textContent = 'Responder';
    boton.addEventListener('click', responder)
    let div = document.getElementById('no-contestada');

    fetch('http://localhost/DWEC/Ejercicios/ejercicio1/servidor/sugerencia.php?id-pregunta=' + idPregunta, {
        method: 'GET',
    }).then(res => res.json())
        .then(function (res) {
            console.log(res)
            div.textContent = res.sugerencia;
            div.appendChild(boton);

        })
        .catch(error => console.error('Error:', error));
}
