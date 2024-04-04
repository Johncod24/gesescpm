<?php
// Conexão com o banco de dados (substitua pelas suas credenciais)
$servername = "localhost";
$username = "seu_usuario";
$password = "sua_senha";
$dbname = "seu_banco_de_dados";

// Obtém os dados do formulário
$id = $_POST['id'];
$nome = $_POST['nome'];
$disciplinas = $_POST['disciplinas'];

// Cria a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Atualiza os dados na tabela professores
$sql = "UPDATE professores SET nome='$nome', disciplinas='$disciplinas' WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    echo "Registro de professor atualizado com sucesso!";
} else {
    echo "Erro ao atualizar registro de professor: " . $conn->error;
}

// Fecha a conexão
$conn->close();
?>
