<?php
session_start();
require_once 'conexao.php';
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Currículo - Colégio Adventista da Liberdade</title>
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
                    <li><a href="curriculo.php" class="active">Currículo</a></li>
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
            <h1>Nosso Currículo</h1>
            <p>Conheça os cursos e programas oferecidos</p>
        </div>
    </section>

    <section class="curriculum-content">
        <div class="container">
            <div class="curriculum-grid">
           

                <div class="curriculum-card">
                    <i class="fas fa-book-reader"></i>
                    <h3>Ensino Primario</h3>
                    <p>Formação básica do aluno através do desenvolvimento da capacidade de aprender, tendo como meios básicos o pleno domínio da leitura, escrita e cálculo.</p>
                    <ul>
                        <li>1º ao 5º ano</li>
                        <li>Alfabetização</li>
                        <li>Base curricular completa</li>
                    </ul>
                </div>

                <div class="curriculum-card">
                    <i class="fas fa-user-graduate"></i>
                    <h3>Ensino Secundario</h3>
                    <p>Consolidação dos conhecimentos adquiridos no primeiro, preparando o aluno para o Ensino Médio com foco no desenvolvimento do pensamento crítico.</p>
                    <ul>
                        <li>6º ao 9º ano</li>
                        <li>Disciplinas especializadas</li>
                        <li>Preparação para o futuro</li>
                    </ul>
                </div>

                <div class="curriculum-card">
                    <i class="fas fa-graduation-cap"></i>
                    <h3>Ensino Médio</h3>
                    <p>Preparação para o ensino superior e para o mercado de trabalho, com foco em vestibulares, desenvolvendo competências e habilidades.</p>
                    <ul>
                      <!--  <li>1ª à 3ª série</li>
                        <li>Preparação para ENEM</li>
                        <li>Orientação profissional</li>   -->
                    </ul>
                </div>
            </div>

            <div class="curriculum-extras">
                <h2>Actividades Extracurriculares</h2>
                <div class="extras-grid">
                    <div class="extra-card">
                        <i class="fas fa-music"></i>
                        <h4>Música</h4>
                    </div>
                    <div class="extra-card">
                        <i class="fas fa-futbol"></i>
                        <h4>Esportes</h4>
                    </div>
                    <div class="extra-card">
                   <i class="fas fa-swimmer" aria-hidden="true"></i>
                        <h4>Natação</h4>
                    </div>
                  <!--  <div class="extra-card">
                        <i class="fas fa-robot"></i>
                        <h4>Robótica</h4>
                    </div>  -->
                    <div class="extra-card">
                        <i class="fas fa-language"></i>
                        <h4>Idiomas</h4>
                    </div>
                    <div class="extra-card">
                    <i class="fas fa-chess" aria-hidden="true"></i>
                        <h4>Xadrez</h4>
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
