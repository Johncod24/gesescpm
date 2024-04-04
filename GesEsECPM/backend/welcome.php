<?php
session_start();

// Verifica se o usuário está logado
if(isset($_SESSION['username'])) {
    echo "Bem-vindo, " . $_SESSION['username'] . "!";
} else {
    header("location: login.html");
    exit();
}
?>
