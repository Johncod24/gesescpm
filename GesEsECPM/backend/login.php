<?php
session_start();

// Conexão com o banco de dados (substitua pelas suas credenciais)
$servername = "localhost";
$username = "seu_usuario";
$password = "sua_senha";
$dbname = "seu_banco_de_dados";

// Obtém os dados do formulário
$username = $_POST['username'];
$password = $_POST['password'];

// Cria a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Consulta o banco de dados para o usuário
$sql = "SELECT * FROM usuarios WHERE username='$username' AND password='$password'";
$result = $conn->query($sql);

// Verifica se o usuário existe e tem permissão
if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    $_SESSION['username'] = $row['username'];
    $_SESSION['role'] = $row['role'];
    echo "Login bem-sucedido!";
} else {
    echo "Usuário ou senha inválidos.";
}

// Fecha a conexão
$conn->close();
?>
