<?php
// Verifica se os dados foram enviados via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica se todos os campos necessários foram enviados
    if (isset($_POST['username'], $_POST['password'])) {
      include("connect.php");

        // Verifica se o usuário já existe
        $sql_check_user = "SELECT * FROM Usuarios WHERE username=?";
        $stmt_check_user = $conn->prepare($sql_check_user);
        $stmt_check_user->bind_param("s", $_POST['username']);
        $stmt_check_user->execute();
        $result_check_user = $stmt_check_user->get_result();

        if ($result_check_user->num_rows > 0) {
            echo "Usuário já existe.";
        } else {
            // Hashing da senha
            $senha_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);

            // Insere os dados na tabela Usuarios utilizando instruções preparadas
            $sql = "INSERT INTO Usuarios (username, password) VALUES (?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ss", $_POST["username"], $senha_hash);

            if ($stmt->execute()) {
                echo "Registro bem-sucedido!";
            } else {
                echo "Erro ao registrar: " . $stmt->error;
            }
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
