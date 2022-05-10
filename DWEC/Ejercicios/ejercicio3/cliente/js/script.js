var taller = new Taller();

window.onload = function () {
    cargaOperarios();
    cargaTareas();
}

function cargaOperarios() {
    fetch('http://localhost/DWEC/Ejercicios/ejercicio3/servidor/empleados.php', {
        method: 'GET',
    })
        .then(function (res) {
            return res.json();
        }).then(function (res) {
            console.log(res)
            insertarOperarios(res);
        })
        .catch(error => console.error('Error:', error));
}

function cargaTareas() {
    fetch('http://localhost/DWEC/Ejercicios/ejercicio3/servidor/tareas.php', {
        method: 'GET',
    })
        .then(function (res) {
            return res.json();
        }).then(function (res) {
            console.log(res)
            insertarTareas(res);
        })
        .catch(error => console.error('Error:', error));

}


function insertarOperarios(operarios) {
    let div = document.createElement('div');
    div.id='operarios';
    div.className = 'operarios';
    for (let i = 0; i < operarios.length; i++) {
        if (operarios[i].tipo == 'operario') {
            taller.insertaOperario(new Operario(operarios[i].id, operarios[i].nombre, operarios[i].foto, operarios[i].tipo));

            let div2 = document.createElement('div');
            div2.className = 'operario';

            let name = document.createElement('span');
            name.innerText = operarios[i].nombre;
            div2.appendChild(name)

            let img = document.createElement('img');
            img.src = 'imagenes/' + operarios[i].foto;
            div2.appendChild(img);

            let boton = document.createElement('button');
            boton.innerText = 'Pedir tarea';
            boton.id = operarios[i].id + 'botonP';
            boton.style = "margin:1em;"
            boton.addEventListener('click', asignarTarea);
            div2.appendChild(boton);

            let boton2 = document.createElement('button');
            boton2.innerText = 'Finalizar tarea';
            boton2.id = operarios[i].id + 'botonF';
            boton2.setAttribute("disabled", true);
            boton2.addEventListener('click', finalizarTarea);
            div2.appendChild(boton2);

            let tarea = document.createElement('div');
            let span = document.createElement('span');
            span.textContent = 'Tareas:';
            let nombreTarea = document.createElement('p');
            nombreTarea.id = 'tareas' + operarios[i].id;
            nombreTarea.textContent = 'Sin tarea';
            tarea.appendChild(span);
            tarea.appendChild(nombreTarea);
            div2.appendChild(tarea)

            div.appendChild(div2);
        }
    }
    document.body.appendChild(div)
}

function insertarTareas(tareas) {
    console.log(tareas)
    let div = document.createElement('div');
    div.id='tareas';
    div.className = 'tareas';

    for (let i = 0; i < tareas.length; i++) {
        taller.insertaTarea(new Tarea(tareas[i].id, tareas[i].titulo, tareas[i].fecha, tareas[i].descripcion))

        let div2 = document.createElement('div');
        div2.id = 'tarea' + tareas[i].id
        div2.className = 'tarea';

        let titulo = document.createElement('p');
        titulo.style = "font-weight: bold;"
        titulo.textContent = tareas[i].titulo
        div2.appendChild(titulo)

        let descripcion = document.createElement('p');
        descripcion.textContent = tareas[i].descripcion
        div2.appendChild(descripcion)

        let fecha = document.createElement('p');
        fecha.textContent = tareas[i].fecha
        div2.appendChild(fecha)

        div.appendChild(div2)
    }
    document.body.appendChild(div)
}

function asignarTarea(e) {
    let idOperario = e.target.id.charAt(0);
    taller.asignaTarea(idOperario);
    let tarea = taller.asignaciones.get(idOperario);
    let div=document.getElementById('tarea'+tarea.id);
    document.getElementById('tareas').removeChild(div);
    document.getElementById('tareas' + idOperario).textContent = tarea.titulo;
    document.getElementById(idOperario + 'botonP').disabled = true;
    document.getElementById(idOperario + 'botonF').disabled = false;


}

function finalizarTarea(e) {
    let idOperario = e.target.id.charAt(0);
    taller.finalizaTarea(idOperario)
    document.getElementById('tareas' + idOperario).textContent = 'Sin tarea';
    document.getElementById(idOperario + 'botonP').disabled = false;
    document.getElementById(idOperario + 'botonF').disabled = true;
}