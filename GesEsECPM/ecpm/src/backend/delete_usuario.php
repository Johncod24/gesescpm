<?php
include("connect.php");

// Obtém o ID do usuário a ser excluído
$id = $_POST['id'];

// Exclui o registro da tabela usuarios
$sql = "DELETE FROM usuarios WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    echo "Registro de usuário excluído com sucesso!";
} else {
    echo "Erro ao excluir registro de usuário: " . $conn->error;
}

// Fecha a conexão
$conn->close();
?>
