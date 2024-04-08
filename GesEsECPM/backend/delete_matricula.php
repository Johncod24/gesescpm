<?php
include("connect.php");

// Obtém o ID da matrícula a ser excluída
$id = $_POST['id'];

// Exclui o registro da tabela matriculas
$sql = "DELETE FROM matriculas WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    echo "Registro de matrícula excluído com sucesso!";
} else {
    echo "Erro ao excluir registro de matrícula: " . $conn->error;
}

// Fecha a conexão
$conn->close();
?>
