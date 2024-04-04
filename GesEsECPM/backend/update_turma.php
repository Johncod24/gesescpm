<?php
// Conexão com o banco de dados (substitua pelas suas credenciais)
$servername = "localhost";
$username = "seu_usuario";
$password = "sua_senha";
$dbname = "seu_banco_de_dados";

// Obtém os dados do formulário
$id = $_POST['id'];
$id_disciplina = $_POST['id_disciplina'];
$id_professor = $_POST['id_professor'];
$horario = $_POST['horario'];
$sala_de_aula = $_POST['sala_de_aula'];

// Cria a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Atualiza os dados na tabela turmas
$sql = "UPDATE turmas SET id_disciplina='$id_disciplina', id_professor='$id_professor', horario='$horario', sala_de_aula='$sala_de_aula' WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    echo "Registro de turma atualizado com sucesso!";
} else {
    echo "Erro ao atualizar registro de turma: " . $conn->error;
}

// Fecha a conexão
$conn->close();
?>
