
class Taller {
    constructor() {
        this._operarios = [];
        this._tareas = [];
        this._asignacion = new Map();
    }
    get asignaciones() {
        return this._asignacion;
    }

    insertaOperario(operario) {
        this._operarios.push(operario);
    }

    insertaTarea(tarea) {
        this._tareas.push(tarea);
    }

    asignaTarea(idOperario) {
        for (var i = 0; i < this._operarios.length; i++) {
            if (this._operarios[i].id === idOperario) {
                let tarea = this._tareas.pop();
                this._asignacion.set(idOperario, tarea);
                return idOperario;
            }
        }
        return -1;
    }

    finalizaTarea(idOperario) {
        this._asignacion.delete(idOperario);
    }

    toString() {
        return this._asignacion;
    }
}