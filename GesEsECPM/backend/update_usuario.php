<?php
// Conexão com o banco de dados (substitua pelas suas credenciais)
$servername = "localhost";
$username = "seu_usuario";
$password = "sua_senha";
$dbname = "seu_banco_de_dados";

// Obtém os dados do formulário
$id = $_POST['id'];
$username = $_POST['username'];
$password = $_POST['password'];
$role = $_POST['role'];

// Cria a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Atualiza os dados na tabela usuarios
$sql = "UPDATE usuarios SET username='$username', password='$password', role='$role' WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    echo "Registro de usuário atualizado com sucesso!";
} else {
    echo "Erro ao atualizar registro de usuário: " . $conn->error;
}

// Fecha a conexão
$conn->close();
?>
