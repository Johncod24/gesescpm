<?php
include("connect.php");

// Verifica se os dados foram enviados via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica se o campo cpf foi preenchido
    if (isset($_POST['cpf'])) {
        // Obtém o CPF do formulário
        $cpf = $_POST['cpf'];

        // Exclui o registro da tabela alunos
        $sql = "DELETE FROM alunos WHERE cpf=?";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $cpf);

        if ($stmt->execute()) {
            echo "Registro de aluno excluído com sucesso!";
        } else {
            echo "Erro ao excluir registro de aluno: " . $stmt->error;
        }

        // Fecha a conexão
        $conn->close();
    } else {
        // Se o campo cpf estiver faltando, exibe uma mensagem de erro
        echo "Por favor, preencha o CPF do aluno a ser removido.";
    }
} else {
    // Se não for enviado via POST, redireciona para a página de erro
    header("Location: erro.php");
}
?>
