<?php
session_start();

// Verifica se os dados foram enviados via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica se todos os campos foram preenchidos
    if (isset($_POST['username']) && isset($_POST['password'])) {
        // Obtém os dados do formulário
        $username = $_POST['username'];
        $password = $_POST['password'];

 include("connect.php");

        // Consulta o banco de dados para o usuário
        $sql = "SELECT * FROM usuarios WHERE username=? AND password=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        // Verifica se o usuário existe e tem permissão
        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $_SESSION['username'] = $row['username'];
            $_SESSION['role'] = $row['role'];
            echo "Login bem-sucedido!";
        } else {
            echo "Usuário ou senha inválidos.";
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
