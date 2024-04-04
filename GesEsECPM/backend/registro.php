<?php
$servername = "testes";
$username = "johntest";
$password = "YWAjfT3j]SNV/VyE";
$dbname = "johntest";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Hashing da senha
$senha_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);

$sql = "INSERT INTO Usuarios (username, password)
VALUES ('".$_POST["username"]."', '".$_POST["password"]."')";

if ($conn->query($sql) === TRUE) {
  echo "Registro bem-sucedido!";
} else {
  echo "Error: " . $sql . "<br>" . $conn->connect_error;
}

$conn->close();
?>
