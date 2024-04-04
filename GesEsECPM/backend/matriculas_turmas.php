<?php
$servername = "testes";
$username = "johntest";
$password = "YWAjfT3j]SNV/VyE";
$dbname = "johntest";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO Matriculas_Turmas (id_matricula, id_turma)
VALUES ('".$_POST["id_matricula"]."', '".$_POST["id_turma"]."')";

if ($conn->query($sql) === TRUE) {
  echo "Matrícula em turma cadastrada com sucesso!";
} else {
  echo "Desculpe, houve um erro ao tentar cadastrar a matrícula em turma. Por favor, tente novamente.";
}

$conn->close();
?>
