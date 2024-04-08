<?php
include("connect.php");

$sql = "INSERT INTO Matriculas_Turmas (id_matricula, id_turma)
VALUES ('".$_POST["id_matricula"]."', '".$_POST["id_turma"]."')";

if ($conn->query($sql) === TRUE) {
  echo "Matrícula em turma cadastrada com sucesso!";
} else {
  echo "Desculpe, houve um erro ao tentar cadastrar a matrícula em turma. Por favor, tente novamente.";
}

$conn->close();
?>
