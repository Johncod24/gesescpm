<?php
// Verifica se os dados foram enviados via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica se todos os campos foram preenchidos
    if (isset($_POST['id'], $_POST['nome'], $_POST['endereco'], $_POST['complemento'], $_POST['cep'], $_POST['bairro'], $_POST['cidade'], $_POST['estado'], $_POST['telefone'], $_POST['formacao'], $_POST['titulacao'], $_POST['disciplinas'])) {
        // Obtém os dados do formulário
        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $endereco = $_POST['endereco'];
        $complemento = $_POST['complemento'];
        $cep = $_POST['cep'];
        $bairro = $_POST['bairro'];
        $cidade = $_POST['cidade'];
        $estado = $_POST['estado'];
        $telefone = $_POST['telefone'];
        $formacao = $_POST['formacao'];
        $titulacao = $_POST['titulacao'];
        $disciplinas = $_POST['disciplinas'];

        include("connect.php");

        // Atualiza os dados na tabela professores utilizando instruções preparadas
        $sql = "UPDATE professores SET nome=?, endereco=?, complemento=?, cep=?, bairro=?, cidade=?, estado=?, telefone=?, formacao=?, titulacao=?, disciplinas=? WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssssssssi", $nome, $endereco, $complemento, $cep, $bairro, $cidade, $estado, $telefone, $formacao, $titulacao, $disciplinas, $id);

        if ($stmt->execute()) {
            echo "Registro de professor atualizado com sucesso!";
        } else {
            echo "Erro ao atualizar registro de professor: " . $stmt->error;
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