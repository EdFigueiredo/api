<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login na Tela de Rotas</title>
</head>
<body>
    <h2>Login na Tela de Rotas</h2>
    <form action="http://localhost/api/usuarios/login" method="POST">
        <label for="login">Login:</label>
        <input type="text" id="login" name="login" required><br><br>
        
        <label for="senha">Senha:</label>
        <input type="password" id="senha" name="senha" required><br><br>
        
        <input type="submit" value="Login">
    </form>
</body>
</html>