<?php
include("connect.php");

// Verifica se os dados foram enviados via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica se todos os campos foram preenchidos
    if (isset($_POST['cpf'], $_POST['nome'], $_POST['matricula'], $_POST['nascimento'], $_POST['endereco'], $_POST['complemento'], $_POST['cep'], $_POST['bairro'], $_POST['cidade'], $_POST['estado'], $_POST['telefone'])) {
        // Obtém os dados do formulário
        $cpf = $_POST['cpf'];
        $nome = $_POST['nome'];
        $matricula = $_POST['matricula'];
        $nascimento = $_POST['nascimento'];
        $endereco = $_POST['endereco'];
        $complemento = $_POST['complemento'];
        $cep = $_POST['cep'];
        $bairro = $_POST['bairro'];
        $cidade = $_POST['cidade'];
        $estado = $_POST['estado'];
        $telefone = $_POST['telefone'];

        // Atualiza os dados na tabela alunos
        $sql = "UPDATE alunos SET nome=?, matricula=?, nascimento=?, endereco=?, complemento=?, cep=?, bairro=?, cidade=?, estado=?, telefone=? WHERE cpf=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssssssss", $nome, $matricula, $nascimento, $endereco, $complemento, $cep, $bairro, $cidade, $estado, $telefone, $cpf);

        if ($stmt->execute()) {
            echo "Registro de aluno atualizado com sucesso!";
        } else {
            echo "Erro ao atualizar registro de aluno: " . $stmt->error;
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
