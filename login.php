<?php
session_start();
require_once 'conexao.php';

$erro = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $senha = $_POST['senha'];

    if ($email && $senha) {
        $stmt = $conn->prepare("SELECT id, nome, email, senha FROM usuarios WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $resultado = $stmt->get_result();

        if ($resultado->num_rows === 1) {
            $usuario = $resultado->fetch_assoc();
            
            if (password_verify($senha, $usuario['senha'])) {
                $_SESSION['usuario_id'] = $usuario['id'];
                $_SESSION['usuario_nome'] = $usuario['nome'];
                $_SESSION['usuario_email'] = $usuario['email'];
                header('Location: index.php');
                exit;
            } else {
                $erro = 'E-mail ou senha incorretos.';
            }
        } else {
            $erro = 'E-mail ou senha incorretos.';
        }
        $stmt->close();
    } else {
        $erro = 'Por favor, preencha todos os campos.';
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Colégio Adventista da Liberdade</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <div class="auth-container">
        <div class="auth-box">
            <div class="auth-header">
                <img src="images/logo.jpg?height=200&width=300" alt="Logo CAL" class="logo-image">
                <h1>Colégio Adventista da Liberdade</h1>
            </div>

            <h2>Entrar</h2>
            <p class="auth-subtitle">Acesse sua conta</p>

            <?php if ($erro): ?>
                <div class="alert alert-error">
                    <i class="fas fa-exclamation-circle"></i> <?php echo $erro; ?>
                </div>
            <?php endif; ?>

            <form method="POST" class="auth-form">
                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="email" id="email" name="email" required>
                </div>

                <div class="form-group">
                    <label for="senha">Senha</label>
                    <input type="password" id="senha" name="senha" required>
                </div>

                <button type="submit" class="btn-primary btn-full">Entrar</button>
            </form>

            <p class="auth-link">
                Não tem uma conta? <a href="registro.php">Registre-se</a>
            </p>

            <p class="auth-link">
                <a href="index.php">← Voltar para o início</a>
            </p>
        </div>
    </div>
</body>
</html>
