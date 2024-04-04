<?php
// Conexão com o banco de dados (substitua pelas suas credenciais)
$servername = "localhost";
$username = "seu_usuario";
$password = "sua_senha";
$dbname = "seu_banco_de_dados";

// Obtém os dados do formulário
$id = $_POST['id'];
$id_matricula = $_POST['id_matricula'];
$id_turma = $_POST['id_turma'];

// Cria a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Atualiza os dados na tabela matriculas_turmas
$sql = "UPDATE matriculas_turmas SET id_matricula='$id_matricula', id_turma='$id_turma' WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    echo "Registro de matrícula em turma atualizado com sucesso!";
} else {
    echo "Erro ao atualizar registro de matrícula em turma: " . $conn->error;
}

// Fecha a conexão
$conn->close();
?>
