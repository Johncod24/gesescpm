<?php
// Verifica se os dados foram enviados via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica se todos os campos foram preenchidos
    if (isset($_POST['id'], $_POST['nome'], $_POST['codigo'], $_POST['carga_horaria'], $_POST['id_curso'])) {
        // Obtém os dados do formulário
        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $codigo = $_POST['codigo'];
        $carga_horaria = $_POST['carga_horaria'];
        $pre_requisitos = $_POST['pre_requisitos'];
        $id_curso = $_POST['id_curso'];

       include("connect.php");

        // Atualiza os dados na tabela disciplinas utilizando instruções preparadas
        $sql = "UPDATE disciplinas SET nome=?, codigo=?, carga_horaria=?, pre_requisitos=?, id_curso=? WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssisi", $nome, $codigo, $carga_horaria, $pre_requisitos, $id_curso, $id);

        if ($stmt->execute()) {
            echo "Registro de disciplina atualizado com sucesso!";
        } else {
            echo "Erro ao atualizar registro de disciplina: " . $stmt->error;
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
