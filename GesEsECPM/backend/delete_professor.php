<?php
include("connect.php");

// Obtém o ID do professor a ser excluído
$id = $_POST['id'];

// Exclui o registro da tabela professores
$sql = "DELETE FROM professores WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    echo "Registro de professor excluído com sucesso!";
} else {
    echo "Erro ao excluir registro de professor: " . $conn->error;
}

// Fecha a conexão
$conn->close();
?>
