
function validateCursoForm() {
    var nome = document.getElementById('nome').value;
    var codigo = document.getElementById('codigo').value;
    var carga_horaria = document.getElementById('carga_horaria').value;

    if (nome === "" || codigo === "" || carga_horaria === "") {
        alert("Nome, código e carga horária são obrigatórios.");
        return false;
    }
    return true;
}
