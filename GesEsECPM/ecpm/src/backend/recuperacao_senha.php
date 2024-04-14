<?php
include("connect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['email'])) {
        $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);

        if ($email) {
            // Consulta SQL para verificar se o e-mail está registrado no banco de dados
            $sql = "SELECT * FROM Usuarios WHERE email=?";
            $stmt = $conn->prepare($sql);

            if ($stmt) {
                // Associa o parâmetro à consulta preparada
                $stmt->bind_param("s", $email);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                    // Aqui você pode adicionar o código para enviar um email para o usuário com instruções para redefinir a senha
                    echo "Um email foi enviado para você com instruções para redefinir sua senha.";
                } else {
                    echo "Desculpe, não encontramos uma conta associada a esse endereço de email.";
                }
            } else {
                echo "Desculpe, ocorreu um erro ao preparar a consulta.";
            }
        } else {
            echo "Por favor, forneça um endereço de email válido.";
        }
    } else {
        echo "Por favor, forneça seu endereço de email.";
    }
} else {
    echo "Método de requisição inválido.";
}

$conn->close();
?>
