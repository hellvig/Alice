<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atividades PHP - Hellvig</title>
    <link rel="stylesheet" href="/resources/css/index.css">
</head>
<body>

    <header>
        <nav class="navbar">
            <h2 class="logo">Pão de Queijo</h2>

            <ul class="menu">
                <li><a href="#inicio">Início</a></li>
                <li><a href="#atividades">Atividades</a></li>
                <li><a href="#sobre">Sobre</a></li>
            </ul>
        </nav>
    </header>

    <section class="inicio" id="inicio">
        <div class="inicio-conteudo">
            <p class="saudacao">DESENVOLVIMENTO WEB</p>
            <h1>Meu Portfólio PHP</h1>

            <p class="descricao">
                Atividades desenvolvidas durante as aulas
                de programação e desenvolvimento web.
            </p>

            <div class="foto-com-asas">
                <div class="asa asa-esquerda">
                    <div class="pena pena1"></div>
                    <div class="pena pena2"></div>
                    <div class="pena pena3"></div>
                    <div class="pena pena4"></div>
                    <div class="pena pena5"></div>
                    <div class="pena pena6"></div>
                    <div class="pena pena7"></div>
                    <div class="pena pena8"></div>
                </div>

                <div class="foto">
                    <span>PHP</span>
                </div>

                <div class="asa asa-direita">
                    <div class="pena pena1"></div>
                    <div class="pena pena2"></div>
                    <div class="pena pena3"></div>
                    <div class="pena pena4"></div>
                    <div class="pena pena5"></div>
                    <div class="pena pena6"></div>
                    <div class="pena pena7"></div>
                    <div class="pena pena8"></div>
                </div>
            </div>

            <a href="#atividades" class="botao">Explorar atividades</a>
        </div>
    </section>

    <section class="secao" id="atividades">
        <p class="detalhe-secao">MEUS PROJETOS</p>
        <h2 class="titulo-secao">Minhas Atividades</h2>

        <p class="subtitulo-secao">
            Selecione uma atividade para acessar.
        </p>

        <div class="projetos-container">

            <div class="projeto-card">
                <div class="projeto-numero">01</div>
                <h3>Verificador de Idade</h3>
                <p>
                    Sistema para receber nome e idade
                    e verificar a situação do usuário.
                </p>
                <a href="/resources/views/projetos/idade.php" class="link-projeto">
                    Abrir atividade →
                </a>
            </div>

            <div class="projeto-card">
                <div class="projeto-numero">02</div>
                <h3>Verificador de Notas</h3>
                <p>
                    Sistema para calcular a média
                    e verificar a situação do aluno.
                </p>
                <a href="/resources/views/projetos/notas.php" class="link-projeto">
                    Abrir atividade →
                </a>
            </div>

            <div class="projeto-card">
                <div class="projeto-numero">03</div>
                <h3>Desafio de Notas</h3>
                <p>
                    Calculadora de média utilizando
                    cinco notas com pesos diferentes.
                </p>
                <a href="/resources/views/projetos/notas-desafio.php" class="link-projeto">
                    Abrir atividade →
                </a>
            </div>

            <div class="projeto-card">
                <div class="projeto-numero">04</div>
                <h3>Login Básico</h3>
                <p>
                    Formulário de autenticação
                    desenvolvido com HTML e PHP.
                </p>
                <a href="/resources/views/projetos/login-basico.php" class="link-projeto">
                    Abrir atividade →
                </a>
            </div>

            <div class="projeto-card">
                <div class="projeto-numero">05</div>
                <h3>Cadastro de Jogos</h3>
                <p>
                    Cadastro de jogos utilizando
                    PHP e banco de dados.
                </p>
                <a href="/resources/views/projetos/jogos.php" class="link-projeto">
                    Abrir atividade →
                </a>
            </div>

            <div class="projeto-card">
                <div class="projeto-numero">06</div>
                <h3>Controle de Produção</h3>
                <p>
                    Sistema de máquinas industriais utilizando
                    classes, herança e encapsulamento.
                </p>
                <a href="/resources/views/projetos/poo2.php" class="link-projeto">
                    Abrir atividade →
                </a>
            </div>

        </div>
    </section>

    <section class="secao secao-destaque" id="sobre">
        <p class="detalhe-secao">CONHECIMENTO</p>
        <h2 class="titulo-secao">Sobre o Projeto</h2>

        <div class="sobre-conteudo">
            <h3>Desenvolvimento Web</h3>

            <p>
                Este portfólio reúne as atividades
                desenvolvidas durante as aulas de PHP.
            </p>

            <p>
                Os exercícios utilizam HTML, CSS e PHP
                para praticar formulários, cálculos,
                condições, login e banco de dados.
            </p>
        </div>
    </section>

    <footer>
        <p>Atividades PHP - Desenvolvimento Web</p>
        <small>Hellvig - Portfólio de Projetos</small>
    </footer>

</body>
</html>