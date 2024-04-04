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
$pre_requisitos = $_POST['pre_requisitos'];
$id_curso = $_POST['id_curso'];

// Cria a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Atualiza os dados na tabela disciplinas
$sql = "UPDATE disciplinas SET nome='$nome', codigo='$codigo', carga_horaria='$carga_horaria', pre_requisitos='$pre_requisitos', id_curso='$id_curso' WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    echo "Registro de disciplina atualizado com sucesso!";
} else {
    echo "Erro ao atualizar registro de disciplina: " . $conn->error;
}

// Fecha a conexão
$conn->close();
?>
