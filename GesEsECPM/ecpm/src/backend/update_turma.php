<?php
// Verifica se os dados foram enviados via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica se todos os campos foram preenchidos
    if (isset($_POST['id'], $_POST['id_disciplina'], $_POST['id_professor'], $_POST['horario'], $_POST['sala_de_aula'])) {
        // Obtém os dados do formulário
        $id = $_POST['id'];
        $id_disciplina = $_POST['id_disciplina'];
        $id_professor = $_POST['id_professor'];
        $horario = $_POST['horario'];
        $sala_de_aula = $_POST['sala_de_aula'];

      include("connect.php");

        // Atualiza os dados na tabela turmas utilizando instruções preparadas
        $sql = "UPDATE turmas SET id_disciplina=?, id_professor=?, horario=?, sala_de_aula=? WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("iissi", $id_disciplina, $id_professor, $horario, $sala_de_aula, $id);

        if ($stmt->execute()) {
            echo "Registro de turma atualizado com sucesso!";
        } else {
            echo "Erro ao atualizar registro de turma: " . $stmt->error;
        }

        // Fecha a conexão
        $conn->close();
    } else {
        // Se algum campo estiver faltando, exibe uma mensagem de erro
        echo "Por favor, preencha todos os campos.";
    }
} else {
    // Se não for enviado via POST, redireciona para a página de erro
    header("Location: erro.php");
}
?>
