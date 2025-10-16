<?php
session_start();
require_once 'conexao.php';

$mensagem = '';
$erro = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $senha = $_POST['senha'];
    $confirmar_senha = $_POST['confirmar_senha'];

    if ($nome && $email && $senha && $confirmar_senha) {
        if ($senha === $confirmar_senha) {
            // Verificar se o e-mail já existe
            $stmt = $conn->prepare("SELECT id FROM usuarios WHERE email = ?");
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $resultado = $stmt->get_result();

            if ($resultado->num_rows === 0) {
                // Hash da senha
                $senha_hash = password_hash($senha, PASSWORD_DEFAULT);
                
                // Inserir novo usuário
                $stmt = $conn->prepare("INSERT INTO usuarios (nome, email, senha, data_cadastro) VALUES (?, ?, ?, NOW())");
                $stmt->bind_param("sss", $nome, $email, $senha_hash);
                
                if ($stmt->execute()) {
                    $mensagem = 'Conta criada com sucesso! Você pode fazer login agora.';
                } else {
                    $erro = 'Erro ao criar conta. Tente novamente.';
                }
            } else {
                $erro = 'Este e-mail já está cadastrado.';
            }
            $stmt->close();
        } else {
            $erro = 'As senhas não coincidem.';
        }
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
    <title>Registro - Colégio Adventista da Liberdade</title>
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

            <h2>Criar Conta</h2>
            <p class="auth-subtitle">Registre-se para acessar o sistema</p>

            <?php if ($mensagem): ?>
                <div class="alert alert-success">
                    <i class="fas fa-check-circle"></i> <?php echo $mensagem; ?>
                    <a href="login.php">Fazer login</a>
                </div>
            <?php endif; ?>

            <?php if ($erro): ?>
                <div class="alert alert-error">
                    <i class="fas fa-exclamation-circle"></i> <?php echo $erro; ?>
                </div>
            <?php endif; ?>

            <form method="POST" class="auth-form">
                <div class="form-group">
                    <label for="nome">Nome Completo</label>
                    <input type="text" id="nome" name="nome" required>
                </div>

                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="email" id="email" name="email" required>
                </div>

                <div class="form-group">
                    <label for="senha">Senha</label>
                    <input type="password" id="senha" name="senha" required minlength="6">
                </div>

                <div class="form-group">
                    <label for="confirmar_senha">Confirmar Senha</label>
                    <input type="password" id="confirmar_senha" name="confirmar_senha" required minlength="6">
                </div>

                <button type="submit" class="btn-primary btn-full">Criar Conta</button>
            </form>

            <p class="auth-link">
                Já tem uma conta? <a href="login.php">Faça login</a>
            </p>

            <p class="auth-link">
                <a href="index.php">← Voltar para o início</a>
            </p>
        </div>
    </div>
</body>
</html>
