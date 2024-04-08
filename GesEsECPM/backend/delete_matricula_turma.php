<?php
include("connect.php");

// Obtém o ID da matrícula em turma a ser excluída
$id = $_POST['id'];

// Exclui o registro da tabela matriculas_turmas
$sql = "DELETE FROM matriculas_turmas WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    echo "Registro de matrícula em turma excluído com sucesso!";
} else {
    echo "Erro ao excluir registro de matrícula em turma: " . $conn->error;
}

// Fecha a conexão
$conn->close();
?>
