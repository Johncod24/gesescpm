<?php
// Verifica se os dados foram enviados via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica se o ID do professor foi enviado
    if (isset($_POST['id_professor'])) {
include("connect.php");

        // Consulta o banco de dados para o professor com o ID fornecido
        $sql = "SELECT * FROM Professores WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $_POST['id_professor']);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // Exibe os resultados da consulta
            while ($row = $result->fetch_assoc()) {
                echo "Nome: " . $row["nome"]. " - Disciplinas: " . $row["disciplinas"]. "<br>";
            }
        } else {
            echo "Nenhum resultado encontrado.";
        }

        // Fecha a conexão
        $conn->close();
    } else {
        // Se o ID do professor não foi enviado, exibe uma mensagem de erro
        echo "ID do professor não fornecido.";
    }
} else {
    // Se não for enviado via POST, redireciona para a página de erro
    header("Location: erro.php");
}
?>
