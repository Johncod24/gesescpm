<?php
include("connect.php");

// Obtém o ID do curso a ser excluído
$id = $_POST['id'];


// Exclui o registro da tabela cursos
$sql = "DELETE FROM cursos WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    echo "Registro de curso excluído com sucesso!";
} else {
    echo "Erro ao excluir registro de curso: " . $conn->error;
}

// Fecha a conexão
$conn->close();
?>
