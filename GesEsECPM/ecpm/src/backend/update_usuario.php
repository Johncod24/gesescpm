<?php
// Verifica se os dados foram enviados via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica se todos os campos foram preenchidos
    if (isset($_POST['id'], $_POST['username'], $_POST['password'], $_POST['role'])) {
        // Obtém os dados do formulário
        $id = $_POST['id'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $role = $_POST['role'];

      include("connect.php");

        // Atualiza os dados na tabela usuarios utilizando instruções preparadas
        $sql = "UPDATE usuarios SET username=?, password=?, role=? WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssi", $username, $password, $role, $id);

        if ($stmt->execute()) {
            echo "Registro de usuário atualizado com sucesso!";
        } else {
            echo "Erro ao atualizar registro de usuário: " . $stmt->error;
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
