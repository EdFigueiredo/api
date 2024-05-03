<?php
include_once 'classes/db.class.php';

$mensagemErro = '';

// Conectar ao banco de dados usando a classe DB e atribuir a conexão à variável $pdo
try {
    $pdo = DB::connect();
} catch (PDOException $e) {
    // Em caso de erro na conexão, exibir uma mensagem de erro e interromper o script
    echo "Erro ao conectar ao banco de dados: " . $e->getMessage();
    exit;
}

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['login']) && isset($_POST['senha'])) {
    $usuario = $_POST['login'];
    $senha = $_POST['senha'];
    $query= $pdo->prepare("SELECT * FROM usuarios WHERE login = ?");
    $query->execute([$usuario]);
    $usuario = $query->fetch(PDO::FETCH_ASSOC);

    if ($usuario && password_verify($senha, $usuario['senha'])) {
        header("Location: pagina-inicial.php");
        exit;
    } else {
        $mensagemErro = "Login ou senha inválidos. Por favor, tente novamente.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login na Tela de Rotas</title>
</head>
<body>
    <h2>Login na Tela de Rotas</h2>
    <?php if ($mensagemErro !== '') : ?>
        <p style="color: red;"><?php echo $mensagemErro; ?></p>
    <?php endif; ?>
    <form action="login.php" method="POST">
        <label for="login">Login:</label>
        <input type="text" id="login" name="login" required><br><br>
        
        <label for="senha">Senha:</label>
        <input type="password" id="senha" name="senha" required><br><br>
        
        <input type="submit" value="Login">
    </form>
    <p>Não tem uma conta? <a href="cadastro.php">Cadastre-se aqui</a>.</p>
</body>
</html>