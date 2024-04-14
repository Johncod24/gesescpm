<?php
// Verifica se os dados foram enviados via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica se todos os campos foram preenchidos
    if (isset($_POST['cpf'], $_POST['nome'], $_POST['endereco'], $_POST['complemento'], $_POST['cep'], $_POST['bairro'], $_POST['cidade'], $_POST['estado'], $_POST['telefone'])) {
        // Obtém os dados do formulário
        $cpf = $_POST['cpf'];
        $nome = $_POST['nome'];
        $endereco = $_POST['endereco'];
        $complemento = $_POST['complemento'];
        $cep = $_POST['cep'];
        $bairro = $_POST['bairro'];
        $cidade = $_POST['cidade'];
        $estado = $_POST['estado'];
        $telefone = $_POST['telefone'];

        // Inserir o código para conexão com o banco de dados e inserir os dados na tabela alunos
        include("connect.php");

        $sql = "INSERT INTO alunos (cpf, nome, endereco, complemento, cep, bairro, cidade, estado, telefone) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssssss", $cpf, $nome, $endereco, $complemento, $cep, $bairro, $cidade, $estado, $telefone);

        if ($stmt->execute()) {
            echo "Aluno cadastrado com sucesso!";
        } else {
            echo "Erro ao cadastrar aluno: " . $stmt->error;
        }

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
