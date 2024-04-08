<?php
// Inclui o arquivo de conexão com o banco de dados
include("connect.php");

// Obtém o ID da turma do formulário
$id_turma = $_POST['id_turma'];

// Consulta os alunos matriculados na turma
$sql = "SELECT alunos.id, alunos.nome, alunos.matricula, alunos.nascimento, alunos.endereco FROM alunos INNER JOIN matriculas_turmas ON alunos.id = matriculas_turmas.id_aluno WHERE matriculas_turmas.id_turma = $id_turma";
$result = $conn->query($sql);

// Verifica se há resultados
if ($result->num_rows > 0) {
    // Exibe os resultados em uma tabela
    echo "<table><tr><th>ID</th><th>Nome</th><th>Matrícula</th><th>Data de Nascimento</th><th>Endereço</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["id"] . "</td><td>" . $row["nome"] . "</td><td>" . $row["matricula"] . "</td><td>" . $row["nascimento"] . "</td><td>" . $row["endereco"] . "</td></tr>";
    }
    echo "</table>";
} else {
    echo "Nenhum aluno encontrado para esta turma.";
}

// Fecha a conexão
$conn->close();
?>
