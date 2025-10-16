<?php
session_start();
require_once 'conexao.php';

$mensagem = '';
$erro = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $assunto = filter_input(INPUT_POST, 'assunto', FILTER_SANITIZE_STRING);
    $mensagem_texto = filter_input(INPUT_POST, 'mensagem', FILTER_SANITIZE_STRING);

    if ($nome && $email && $assunto && $mensagem_texto) {
        $stmt = $conn->prepare("INSERT INTO contatos (nome, email, assunto, mensagem, data_envio) VALUES (?, ?, ?, ?, NOW())");
        $stmt->bind_param("ssss", $nome, $email, $assunto, $mensagem_texto);
        
        if ($stmt->execute()) {
            $mensagem = 'Mensagem enviada com sucesso! Entraremos em contato em breve.';
        } else {
            $erro = 'Erro ao enviar mensagem. Tente novamente.';
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
    <title>Ajuda - Colégio Adventista da Liberdade</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
      
    <header class="header">
        <nav class="navbar">
            <div class="container">
                <div class="logo">
                    <img src="images/logo.jpg?height=200&width=300" alt="Logo CAL" class="logo-image">
                    <span>Colégio Adventista da Liberdade</span>
                </div>
                <ul class="nav-menu">
                    <li><a href="index.php">Início</a></li>
                    <li><a href="sobre.php">Sobre nós</a></li>
                    <li><a href="curriculo.php">Currículo</a></li>
                    <li><a href="ajuda.php" class="active">Ajuda</a></li>
                    <?php if(isset($_SESSION['usuario_id'])): ?>
                        <li><a href="logout.php">Sair</a></li>
                    <?php else: ?>
                        <li><a href="login.php" class="btn-login">Entrar</a></li>
                    <?php endif; ?>
                </ul>
                <div class="hamburger">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
        </nav>
    </header>
 
    <section class="page-header">
        <div class="container">
            <h1>Central de Ajuda</h1>
            <p>Estamos aqui para ajudar você</p>
        </div>
    </section>

    <section class="help-content">
        <div class="container">
            <div class="help-grid">
                <div class="faq-section">
                    <h2>Perguntas Frequentes</h2>
                    
                    <div class="faq-item">
                        <h3><i class="fas fa-question-circle"></i> Como faço para matricular meu filho?</h3>
                        <p>O processo de matrícula é simples: faça o pré-cadastro online, aguarde nosso contacto e finalize com o pagamento da matrícula.</p>
                    </div>

                    <div class="faq-item">
                        <h3><i class="fas fa-question-circle"></i> Quais são os horários de funcionamento?</h3>
                        <p>O colégio funciona de segunda a sexta-feira, das 7h às 18h. As aulas ocorrem em dois turnos: manhã (7h30-12h) e tarde (13h-17h30).</p>
                    </div>

                    <div class="faq-item">
                        <h3><i class="fas fa-question-circle"></i> Vocês oferecem transporte escolar?</h3>
                        <p>Sim, temos parceria com empresas de transporte escolar. Entre em contacto conosco para mais informações sobre rotas e valores.</p>
                    </div>

                    <div class="faq-item">
                        <h3><i class="fas fa-question-circle"></i> Como funciona o sistema de avaliação?</h3>
                        <p>Utilizamos avaliações contínuas, provas semestrais e trabalhos em grupo. Os pais têm acesso às notas através do portal do aluno.</p>
                    </div>

                    <div class="faq-item">
                        <h3><i class="fas fa-question-circle"></i> Há actividades extracurriculares?</h3>
                        <p>Sim! Oferecemos música, natação, esportes, xadrez, idiomas e teatro como actividades complementares.</p>
                    </div>
                </div>

                <div class="contact-section">
                    <h2>Entre em Contato</h2>
                    
                    <?php if ($mensagem): ?>
                        <div class="alert alert-success">
                            <i class="fas fa-check-circle"></i> <?php echo $mensagem; ?>
                        </div>
                    <?php endif; ?>

                    <?php if ($erro): ?>
                        <div class="alert alert-error">
                            <i class="fas fa-exclamation-circle"></i> <?php echo $erro; ?>
                        </div>
                    <?php endif; ?>

                    <form method="POST" class="contact-form">
                        <div class="form-group">
                            <label for="nome">Nome Completo</label>
                            <input type="text" id="nome" name="nome" required>
                        </div>

                        <div class="form-group">
                            <label for="email">E-mail</label>
                            <input type="email" id="email" name="email" required>
                        </div>

                        <div class="form-group">
                            <label for="assunto">Assunto</label>
                            <select id="assunto" name="assunto" required>
                                <option value="">Selecione um assunto</option>
                                <option value="Matrícula">Matrícula</option>
                                <option value="Financeiro">Financeiro</option>
                                <option value="Pedagógico">Pedagógico</option>
                                <option value="Infraestrutura">Infraestrutura</option>
                                <option value="Outro">Outro</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="mensagem">Mensagem</label>
                            <textarea id="mensagem" name="mensagem" rows="5" required></textarea>
                        </div>

                        <button type="submit" class="btn-primary">Enviar Mensagem</button>
                    </form>

                    <div class="contact-info">
                        <h3>Outras formas de contato</h3>
                        <p><i class="fas fa-phone"></i> (+258)867490510 / (+258)21749051</p>
                        <p><i class="fas fa-envelope"></i> info@cical.adventist.org</p>
                        <p><i class="fas fa-map-marker-alt"></i>Liberdade, Rua Chokwé, Nº 814</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

      
    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-links">
                    <a href="sobre.php">Sobre nós</a>
                    <a href="ajuda.php">Ajuda</a>
                    <a href="politica.php">Política de Privacidade</a>
                </div>
                <p>&copy; 2025 Todos os direitos reservados</p>
            </div>
        </div>
    </footer>

    <script src="js/script.js"></script>
</body>
</html>
