<?php
$servername = "testes";
$username = "johntest";
$password = "YWAjfT3j]SNV/VyE";
$dbname = "johntest";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM Disciplinas WHERE id_curso='".$_POST["id_curso"]."'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    echo "Nome: " . $row["nome"]. " - Código: " . $row["codigo"]. " - Carga Horária: " . $row["carga_horaria"]. " - Pré-requisitos: " . $row["pre_requisitos"]. "<br>";
  }
} else {
  echo "Nenhum resultado encontrado.";
}

$conn->close();
?>
