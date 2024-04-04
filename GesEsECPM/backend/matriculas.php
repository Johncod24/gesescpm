<?php
$servername = "testes";
$username = "johntest";
$password = "YWAjfT3j]SNV/VyE";
$dbname = "johntest";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO Matriculas (id_aluno, id_curso)
VALUES ('".$_POST["id_aluno"]."', '".$_POST["id_curso"]."')";

if ($conn->query($sql) === TRUE) {
  echo "Matrícula cadastrada com sucesso!";
} else {
  echo "Desculpe, houve um erro ao tentar cadastrar a matrícula. Por favor, tente novamente.";
}

$conn->close();
?>
