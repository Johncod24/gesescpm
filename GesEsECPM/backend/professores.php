<?php
$servername = "testes";
$username = "johntest";
$password = "YWAjfT3j]SNV/VyE";
$dbname = "johntest";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO Professores (nome, disciplinas)
VALUES ('".$_POST["nome"]."', '".$_POST["disciplinas"]."')";

if ($conn->query($sql) === TRUE) {
  echo "Professor cadastrado com sucesso!";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
