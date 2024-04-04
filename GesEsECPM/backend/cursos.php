<?php
$servername = "testes";
$username = "johntest";
$password = "YWAjfT3j]SNV/VyE";
$dbname = "johntest";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO Cursos (nome, codigo, carga_horaria)
VALUES ('".$_POST["nome"]."', '".$_POST["codigo"]."', '".$_POST["carga_horaria"]."')";

if ($conn->query($sql) === TRUE) {
  echo "Curso cadastrado com sucesso!";
} else {
  echo "Desculpe, houve um erro ao tentar cadastrar o curso. Por favor, tente novamente.";
}

$conn->close();
?>

