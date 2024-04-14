<?php
include("connect.php");
// Verifica se os dados foram enviados via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica se todos os campos foram preenchidos
    if (isset($_POST['nome']) && isset($_POST['codigo']) && isset($_POST['carga_horaria']) && isset($_POST['pre_requisitos']) && isset($_POST['id_curso'])) {
        // Obtém os dados do formulário e realiza a sanitização
        $nome = htmlspecialchars($_POST['nome']);
        $codigo = htmlspecialchars($_POST['codigo']);
        $carga_horaria = htmlspecialchars($_POST['carga_horaria']);
        $pre_requisitos = htmlspecialchars($_POST['pre_requisitos']);
        $id_curso = htmlspecialchars($_POST['id_curso']);

        // Prepara a declaração SQL para evitar injeção de SQL
        $sql = "INSERT INTO Disciplinas (nome, codigo, carga_horaria, pre_requisitos, id_curso) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssss", $nome, $codigo, $carga_horaria, $pre_requisitos, $id_curso);

        // Executa a declaração preparada
        if ($stmt->execute()) {
            echo "Disciplina cadastrada com sucesso!";
        } else {
            echo "Desculpe, houve um erro ao tentar cadastrar a disciplina. Por favor, tente novamente.";
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
