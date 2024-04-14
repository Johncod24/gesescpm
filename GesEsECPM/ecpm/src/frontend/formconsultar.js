// Função para exibir os resultados da consulta de alunos em um curso
export function consultarAlunosCurso() {
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
export function consultarAlunosTurma() {
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