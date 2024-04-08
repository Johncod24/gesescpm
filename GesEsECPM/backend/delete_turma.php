<?php
include("connect.php");

// Obtém o ID da turma a ser excluída
$id = $_POST['id'];

// Exclui o registro da tabela turmas
$sql = "DELETE FROM turmas WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    echo "Registro de turma excluído com sucesso!";
} else {
    echo "Erro ao excluir registro de turma: " . $conn->error;
}

// Fecha a conexão
$conn->close();
?>
