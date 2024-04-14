<?php
$servername = "localhost";
$username = "root";
$password = "YWAjfT3j]SNV/VyE";
$dbname = "johntest";
$port= "3308";
// Cria uma conexão com o banco de dados
$conn = new mysqli($servername, $username, $password, $dbname, $port);

// Verifica a conexão
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error.mysqli_connect_errno());
}else {
  echo "Connection successful!";
}
?>
