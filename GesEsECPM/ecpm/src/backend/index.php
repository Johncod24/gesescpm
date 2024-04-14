<!DOCTYPE html>
<html>
<head>
    <title>GesEsECPM - Sistema de Gestão Acadêmica</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <h1>Bem-vindo ao GesEsECPM!</h1>
    <p>Este é um sistema de gestão acadêmica. Por favor, faça login para continuar.</p>
    <form action="login.php" method="post">
        <label for="username">Usuário:</label><br>
        <input type="text" id="username" name="username"><br>
        <label for="password">Senha:</label><br>
        <input type="password" id="password" name="password"><br>
        <input type="submit" value="Entrar">
    </form>
    <p>Não tem uma conta? <a href="registro.html">Registre-se</a></p>
</body>
</html>
