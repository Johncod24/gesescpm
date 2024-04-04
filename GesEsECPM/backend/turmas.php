<?php
$servername = "testes";
$username = "johntest";
$password = "YWAjfT3j]SNV/VyE";
$dbname = "johntest";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO Turmas (id_disciplina, id_professor, horario, sala_de_aula)
VALUES ('".$_POST["id_disciplina"]."', '".$_POST["id_professor"]."', '".$_POST["horario"]."', '".$_POST["sala_de_aula"]."')";

if ($conn->query($sql) === TRUE) {
  echo "Turma cadastrada com sucesso!";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
