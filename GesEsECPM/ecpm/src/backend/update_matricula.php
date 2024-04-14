<?php
// Verifica se os dados foram enviados via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica se todos os campos foram preenchidos
    if (isset($_POST['id'], $_POST['id_aluno'], $_POST['id_curso'])) {
        // Obtém os dados do formulário
        $id = $_POST['id'];
        $id_aluno = $_POST['id_aluno'];
        $id_curso = $_POST['id_curso'];

      include("connect.php");

        // Atualiza os dados na tabela matriculas utilizando instruções preparadas
        $sql = "UPDATE matriculas SET id_aluno=?, id_curso=? WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("iii", $id_aluno, $id_curso, $id);

        if ($stmt->execute()) {
            echo "Registro de matrícula atualizado com sucesso!";
        } else {
            echo "Erro ao atualizar registro de matrícula: " . $stmt->error;
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
