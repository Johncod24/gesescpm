<?php
session_start();

// Verifica se o usuário está logado
if(isset($_SESSION['username'])) {
    // Se estiver logado, exibe uma mensagem de boas-vindas
    echo "Bem-vindo, " . $_SESSION['username'] . "!";
} else {
    // Se não estiver logado, redireciona para a página de login
    header("Location: login.html");
    exit(); // Encerra o script para evitar que o restante do código seja executado
}
?>
