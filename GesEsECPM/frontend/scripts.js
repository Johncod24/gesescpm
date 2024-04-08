function validateForm() {
    var nome = document.getElementById('nome').value;
    var matricula = document.getElementById('matricula').value;

    if (nome.trim() == "" || matricula.trim() == "") {
        alert("Nome e matrícula são obrigatórios.");
        return false;
    }
}
// Função para exibir os resultados da consulta de alunos em um curso
function consultarAlunosCurso() {
    var idCurso = document.getElementById('id_curso').value;
    var request = new XMLHttpRequest();
    request.open('POST', '../backend/alunos_curso.php', true);
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8');
    request.onreadystatechange = function() {
        if (request.readyState === XMLHttpRequest.DONE && request.status === 200) {
            document.getElementById('alunos_curso_resultado').innerHTML = request.responseText;
        }
    };
    request.send('id_curso=' + idCurso);
}

// Função para exibir os resultados da consulta de alunos em uma turma
function consultarAlunosTurma() {
    var idTurma = document.getElementById('id_turma').value;
    var request = new XMLHttpRequest();
    request.open('POST', '../backend/alunos_turma.php', true);
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8');
    request.onreadystatechange = function() {
        if (request.readyState === XMLHttpRequest.DONE && request.status === 200) {
            document.getElementById('alunos_turma_resultado').innerHTML = request.responseText;
        }
    };
    request.send('id_turma=' + idTurma);
}
function validateCursoForm() {
    var nome = document.getElementById('nome').value;
    var codigo = document.getElementById('codigo').value;
    var cargaHoraria = document.getElementById('carga_horaria').value;

    if (nome.trim() === "" || codigo.trim() === "" || cargaHoraria.trim() === "") {
        alert("Nome, código e carga horária são obrigatórios.");
        return false;
    }

    // Adicione mais validações conforme necessário

    return true;
}
function validateProfessorForm() {
    var nome = document.getElementById('nome').value;
    var disciplinas = document.getElementById('disciplinas').value;

    if (nome === "" || disciplinas === "") {
        alert("Nome e disciplinas são obrigatórios.");
        return false;
    }
    return true;
}
function validateRegistrationForm() {
    var username = document.getElementById('username').value;
    var password = document.getElementById('password').value;

    if (username === "" || password === "") {
        alert("Usuário e senha são obrigatórios.");
        return false;
    }
    return true;
}
function validateDisciplineForm() {
    var nome = document.getElementById('nome').value;
    var codigo = document.getElementById('codigo').value;
    var cargaHoraria = document.getElementById('carga_horaria').value;

    if (nome === "" || codigo === "" || cargaHoraria === "") {
        alert("Nome, código e carga horária são obrigatórios.");
        return false;
    }
    return true;
}

function validateLoginForm() {
    var username = document.getElementById('username').value;
    var password = document.getElementById('password').value;

    if (username === "" || password === "") {
        alert("Usuário e senha são obrigatórios.");
        return false;
    }
    return true;
}
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

function validateTurmaForm() {
    var id_disciplina = document.getElementById('id_disciplina').value;
    var id_professor = document.getElementById('id_professor').value;
    var horario = document.getElementById('horario').value;
    var sala_de_aula = document.getElementById('sala_de_aula').value;

    if (id_disciplina === "" || id_professor === "" || horario === "" || sala_de_aula === "") {
        alert("ID da disciplina, ID do professor, horário e sala de aula são obrigatórios.");
        return false;
    }
    return true;
}

function validateAlunoForm() {
    var nome = document.getElementById('nome').value;
    var matricula = document.getElementById('matricula').value;
    var nascimento = document.getElementById('nascimento').value;
    var endereco = document.getElementById('endereco').value;

    if (nome === "" || matricula === "" || nascimento === "" || endereco === "") {
        alert("Nome, matrícula, data de nascimento e endereço são obrigatórios.");
        return false;
    }
    return true;
}

function validateMatriculaForm() {
    var id_aluno = document.getElementById('id_aluno').value;
    var id_curso = document.getElementById('id_curso').value;

    if (id_aluno === "" || id_curso === "") {
        alert("ID do aluno e ID do curso são obrigatórios.");
        return false;
    }
    return true;
}