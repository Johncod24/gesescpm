<?php
include("connect.php");

$sql = "SELECT Alunos.nome, Alunos.matricula, Alunos.nascimento, Alunos.endereco FROM Alunos JOIN Matriculas ON Alunos.id = Matriculas.id_aluno WHERE Matriculas.id_curso='".$_POST["id_curso"]."'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    echo "Nome: " . $row["nome"]. " - Matrícula: " . $row["matricula"]. " - Data de Nascimento: " . $row["nascimento"]. " - Endereço: " . $row["endereco"]. "<br>";
  }
} else {
  echo "Nenhum resultado encontrado.";
}

$conn->close();
?>
