<?php
include("connect.php");

// Verifica se o método de requisição é POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica se todos os campos necessários foram enviados
    if (isset($_POST['id_disciplina'], $_POST['id_professor'], $_POST['horario'], $_POST['sala_de_aula'])) {
        // Filtra e valida os dados recebidos
        $id_disciplina = $_POST['id_disciplina'];
        $id_professor = $_POST['id_professor'];
        $horario = $_POST['horario'];
        $sala_de_aula = $_POST['sala_de_aula'];

        // Prepara a declaração SQL para evitar ataques de injeção de SQL
        $sql = "INSERT INTO Turmas (id_disciplina, id_professor, horario, sala_de_aula) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);

        // Verifica se a preparação da declaração foi bem-sucedida
        if ($stmt) {
            // Associa os parâmetros à declaração preparada
            $stmt->bind_param("ssss", $id_disciplina, $id_professor, $horario, $sala_de_aula);

            // Executa a declaração preparada
            if ($stmt->execute()) {
                echo "Turma cadastrada com sucesso!";
            } else {
                echo "Erro ao cadastrar a turma: " . $stmt->error;
            }

            // Fecha a declaração preparada
            $stmt->close();
        } else {
            echo "Erro ao preparar a declaração SQL: " . $conn->error;
        }
    } else {
        echo "Por favor, preencha todos os campos.";
    }
} else {
    echo "Método de requisição inválido.";
}

// Fecha a conexão com o banco de dados
$conn->close();
?>
