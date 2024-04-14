<?php
include("connect.php");

$sql = "INSERT INTO Cursos (nome, codigo, carga_horaria)
VALUES ('".$_POST["nome"]."', '".$_POST["codigo"]."', '".$_POST["carga_horaria"]."')";

if ($conn->query($sql) === TRUE) {
  echo "Curso cadastrado com sucesso!";
} else {
  echo "Desculpe, houve um erro ao tentar cadastrar o curso. Por favor, tente novamente.";
}

$conn->close();
?>
