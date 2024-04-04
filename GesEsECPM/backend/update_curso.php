<?php
// Conexão com o banco de dados (substitua pelas suas credenciais)
$servername = "localhost";
$username = "seu_usuario";
$password = "sua_senha";
$dbname = "seu_banco_de_dados";

// Obtém os dados do formulário
$id = $_POST['id'];
$nome = $_POST['nome'];
$codigo = $_POST['codigo'];
$carga_horaria = $_POST['carga_horaria'];

// Cria a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Atualiza os dados na tabela cursos
$sql = "UPDATE cursos SET nome='$nome', codigo='$codigo', carga_horaria='$carga_horaria' WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    echo "Registro de curso atualizado com sucesso!";
} else {
    echo "Erro ao atualizar registro de curso: " . $conn->error;
}

// Fecha a conexão
$conn->close();
?>
