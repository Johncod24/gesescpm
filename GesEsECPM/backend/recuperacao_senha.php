<?php
$servername = "testes";
$username = "johntest";
$password = "YWAjfT3j]SNV/VyE";
$dbname = "johntest";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM Usuarios WHERE email='".$_POST["email"]."'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // Aqui você pode adicionar o código para enviar um email para o usuário com instruções para redefinir a senha
  echo "Um email foi enviado para você com instruções para redefinir sua senha.";
} else {
  echo "Desculpe, não encontramos uma conta com esse email.";
}

$conn->close();
?>
