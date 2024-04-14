<?php
// Verifica se todos os campos foram preenchidos
if (isset($_POST['id'], $_POST['id_matricula'], $_POST['id_turma'])) {
    // Obtém os dados do formulário
    $id = $_POST['id'];
    $id_matricula = $_POST['id_matricula'];
    $id_turma = $_POST['id_turma'];

    include("connect.php");

    // Atualiza os dados na tabela matriculas_turmas utilizando instruções preparadas
    $sql = "UPDATE matriculas_turmas SET id_matricula=?, id_turma=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iii", $id_matricula, $id_turma, $id);

    if ($stmt->execute()) {
        echo "Registro de matrícula em turma atualizado com sucesso!";
    } else {
        echo "Erro ao atualizar registro de matrícula em turma: " . $stmt->error;
    }

    // Fecha a conexão
    $stmt->close(); // Esta linha estava faltando
    $conn->close();
} else {
    // Se algum campo estiver faltando, exibe uma mensagem de erro
    echo "Por favor, preencha todos os campos.";
}
?>
