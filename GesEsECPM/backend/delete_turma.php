<?php
// Conexão com o banco de dados (substitua pelas suas credenciais)
$servername = "localhost";
$username = "seu_usuario";
$password = "sua_senha";
$dbname = "seu_banco_de_dados";

// Obtém o ID da turma a ser excluída
$id = $_POST['id'];

// Cria a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

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
