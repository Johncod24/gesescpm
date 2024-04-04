<?php
// Conexão com o banco de dados (substitua pelas suas credenciais)
$servername = "localhost";
$username = "seu_usuario";
$password = "sua_senha";
$dbname = "seu_banco_de_dados";

// Obtém os dados do formulário
$id = $_POST['id'];
$nome = $_POST['nome'];
$matricula = $_POST['matricula'];
$nascimento = $_POST['nascimento'];
$endereco = $_POST['endereco'];

// Cria a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Atualiza os dados na tabela alunos
$sql = "UPDATE alunos SET nome='$nome', matricula='$matricula', nascimento='$nascimento', endereco='$endereco' WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    echo "Registro de aluno atualizado com sucesso!";
} else {
    echo "Erro: " . $sql . "<br>" . $conn->error;
}

// Fecha a conexão
$conn->close();
?>
