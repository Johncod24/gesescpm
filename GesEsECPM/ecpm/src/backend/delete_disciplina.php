<?php
include("connect.php");

// Obtém o ID da disciplina a ser excluída
$id = $_POST['id'];

// Exclui o registro da tabela disciplinas
$sql = "DELETE FROM disciplinas WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    echo "Registro de disciplina excluído com sucesso!";
} else {
    echo "Erro ao excluir registro de disciplina: " . $conn->error;
}

// Fecha a conexão
$conn->close();
?>
