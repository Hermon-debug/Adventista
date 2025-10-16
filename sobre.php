<?php
session_start();
require_once 'conexao.php';
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sobre Nós - Colégio Adventista da Liberdade</title>
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
                    <li><a href="sobre.php" class="active">Sobre nós</a></li>
                    <li><a href="curriculo.php">Currículo</a></li>
                    <li><a href="ajuda.php">Ajuda</a></li>
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
            <h1>Sobre Nós</h1>
            <p>Conheça a história e missão do Colégio Adventista da Liberdade</p>
        </div>
    </section>

    
    <section class="about-content">
        <div class="container">
            <div class="about-grid">
                <div class="about-text">
                    <h2>Nossa História</h2>
                    <p>O Colégio Adventista da Liberdade foi fundado com o objectivo de proporcionar educação de qualidade baseada em valores cristãos. Com mais de 10 anos de experiência, nos dedicamos a formar cidadãos íntegros e preparados para os desafios do futuro.</p>
                    <p>Nossa instituição se destaca pela excelência acadêmica, infraestrutura moderna e corpo docente altamente qualificado. Acreditamos que a educação vai além da sala de aula, por isso oferecemos diversas atividades extracurriculares que contribuem para o desenvolvimento integral dos nossos alunos.</p>
                </div>
                <div class="about-image">
                    <img src="images/sobre-nos.jpg?height=400&width=500" alt="Colégio Adventista">
                </div>
            </div>

            <div class="mission-vision">
                <div class="mission-card">
                    <i class="fas fa-bullseye"></i>
                    <h3>Missão</h3>
                    <p>Prover e promover a holística Educação, de Excelência Académica, centrada em Cristo e no aluno rumo a eternidade.</p>
                </div>
                <div class="mission-card">
                    <i class="fas fa-eye"></i>
                    <h3>Visão</h3>
                    <p>Ser referência em educação adventista, reconhecida pela qualidade de ensino e formação integral dos estudantes.</p>
                </div>
                <div class="mission-card">
                    <i class="fas fa-heart"></i>
                    <h3>Valores</h3>
                    <p>Respeito, integridade, excelência, responsabilidade social e compromisso com o desenvolvimento humano.</p>
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
                    <a href="politica.php   ">Política de Privacidade</a>
                </div>
                <p>&copy; 2025 Todos os direitos reservados</p>
            </div>
        </div>
    </footer>

    <script src="js/script.js"></script>
</body>
</html>
