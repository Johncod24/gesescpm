<?php
$servername = "testes";
$username = "johntest";
$password = "YWAjfT3j]SNV/VyE";
$dbname = "johntest";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO Disciplinas (nome, codigo, carga_horaria, pre_requisitos, id_curso)
VALUES ('".$_POST["nome"]."', '".$_POST["codigo"]."', '".$_POST["carga_horaria"]."', '".$_POST["pre_requisitos"]."', '".$_POST["id_curso"]."')";

if ($conn->query($sql) === TRUE) {
  echo "Disciplina cadastrada com sucesso!";
} else {
  echo "Desculpe, houve um erro ao tentar cadastrar a disciplina. Por favor, tente novamente.";
}

$conn->close();
?>
