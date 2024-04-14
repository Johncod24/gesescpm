<?php
include("connect.php");

// Obtém o ID do curso do formulário
$id_curso = $_POST['id_curso'];

// Consulta os alunos matriculados no curso
$sql = "SELECT id, nome, matricula, nascimento, endereco FROM alunos WHERE id_curso = $id_curso";
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
    echo "Nenhum aluno encontrado para este curso.";
}

// Fecha a conexão
$conn->close();
?>
