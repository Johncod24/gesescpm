<?php
// Verifica se os dados foram enviados via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica se os IDs do aluno e do curso foram enviados
    if (isset($_POST['id_aluno'], $_POST['id_curso'])) {
include("connect.php");

        // Prepara e executa a consulta SQL para inserir a matrícula
        $sql = "INSERT INTO Matriculas (id_aluno, id_curso) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ii", $_POST["id_aluno"], $_POST["id_curso"]);

        if ($stmt->execute()) {
            echo "Matrícula cadastrada com sucesso!";
        } else {
            echo "Desculpe, houve um erro ao tentar cadastrar a matrícula. Por favor, tente novamente.";
        }

        // Fecha a conexão
        $conn->close();
    } else {
        // Se algum ID estiver faltando, exibe uma mensagem de erro
        echo "ID do aluno ou do curso não fornecido.";
    }
} else {
    // Se não for enviado via POST, redireciona para a página de erro
    header("Location: erro.php");
}
?>
