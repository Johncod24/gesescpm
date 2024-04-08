<?php
$servername = "gesescpm";
$username = "root";
$password = "YWAjfT3j]SNV/VyE";
$dbname = "johntest";
// Cria uma conexão com o banco de dados
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error.mysqli_connect_errno());
}else {
  echo "Connection successful!";
}
?>
