<?php
$servername = "testes";
$username = "johntest";
$password = "YWAjfT3j]SNV/VyE";
$dbname = "johntest";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO Alunos (nome, matricula, nascimento, endereco)
VALUES ('".$_POST["nome"]."', '".$_POST["matricula"]."', '".$_POST["nascimento"]."', '".$_POST["endereco"]."')";

if ($conn->query($sql) === TRUE) {
  echo "Aluno cadastrado com sucesso!";
} else {
  echo "Desculpe, houve um erro ao tentar cadastrar o aluno. Por favor, tente novamente.";
}

$conn->close();
?>
