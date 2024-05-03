<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Usuário</title>
</head>
<body>
    <h2>Cadastro de Usuário</h2>
    <form action="http://localhost/api/usuarios/cadastrar" method="POST">
        <label for="login">Login:</label>
        <input type="text" id="login" name="login" required minlength="5" maxlength="15" pattern="[a-zA-Z0-9]+" title="Apenas caracteres alfanuméricos (mínimo de 5 e máximo de 15 caracteres)"><br><br>
        
        <label for="senha">Senha:</label>
        <input type="password" id="senha" name="senha" required minlength="6" maxlength="20" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^\da-zA-Z]).{6,20}$" title="Mínimo de 6 caracteres, incluindo pelo menos uma letra maiúscula, um número e um caractere especial"><br><br>
        
        <input type="submit" value="Cadastrar">
    </form>
</body>
</html>