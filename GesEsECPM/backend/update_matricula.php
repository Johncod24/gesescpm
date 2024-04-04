<?php
// Conexão com o banco de dados (substitua pelas suas credenciais)
$servername = "localhost";
$username = "seu_usuario";
$password = "sua_senha";
$dbname = "seu_banco_de_dados";

// Obtém os dados do formulário
$id = $_POST['id'];
$id_aluno = $_POST['id_aluno'];
$id_curso = $_POST['id_curso'];

// Cria a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Atualiza os dados na tabela matriculas
$sql = "UPDATE matriculas SET id_aluno='$id_aluno', id_curso='$id_curso' WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    echo "Registro de matrícula atualizado com sucesso!";
} else {
    echo "Erro ao atualizar registro de matrícula: " . $conn->error;
}

// Fecha a conexão
$conn->close();
?>
