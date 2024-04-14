<?php
include("connect.php");

$id = $_POST['id'];
$nome = $_POST['nome'];
$codigo = $_POST['codigo'];
$carga_horaria = $_POST['carga_horaria'];
$duracao = $_POST['duracao'];
$coordenador = $_POST['coordenador'];
$nivel = $_POST['nivel'];
$complemento = $_POST['complemento'];

$sql = "UPDATE cursos SET nome=?, codigo=?, carga_horaria=?, duracao=?, coordenador=?, nivel=?, complemento=? WHERE id=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssissis", $nome, $codigo, $carga_horaria, $duracao, $coordenador, $nivel, $complemento, $id);

if ($stmt->execute()) {
    echo "Registro de curso atualizado com sucesso!";
} else {
    echo "Erro ao atualizar registro de curso: " . $stmt->error;
}

$conn->close();
?>
