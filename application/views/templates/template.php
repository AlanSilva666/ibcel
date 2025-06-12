<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>IBCEL - INDÚSTRIA BRASILEIRA DE CONDUTORES ELÉTRICOS</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <link rel="icon" href="<?= base_url('assets/images/logo-ibcel-favicon.png') ?>" type="image/png" title="IBCEL">
    <style>
    /* Reset básico */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    html, body { /* Garante que HTML e BODY ocupem a altura total */
        height: 100%;
        margin: 0;
    }

    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        line-height: 1.6;
        background: linear-gradient(135deg, #f4f7fa, #dbe5ef);
        color: #1c1c1c;
        /* Adicione estas 3 linhas para o sticky footer */
        display: flex; /* Habilita Flexbox */
        flex-direction: column; /* Organiza os itens em coluna */
        min-height: 100vh; /* Garante que o body tenha pelo menos a altura da viewport */
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
        overflow-y: scroll;
    }

    .container {
        max-width: 1100px;
        margin: 0 auto;
        padding: 0 20px;
    }

    /* ======= HEADER ======= */
    .navbar {
        background-color: #00264d;
        padding: 15px 0;
        box-shadow: 0 4px 10px rgba(0,0,0,0.2);
        position: sticky; /* Garante que o cabeçalho seja fixo */
        top: 0;
        z-index: 100;
        width: 100%; /* Garante que ocupe a largura total */
    }

    .header-container {
        margin: 0 auto;
        display: flex;
        align-items: center;
        flex-wrap: nowrap; /* Impede quebra de linha dos itens principais */
        padding: 0 20px; /* Adicionado padding para as bordas */
        gap: 50px; /* Espaço entre a logo e o nav-and-search */
        min-width: fit-content; /* Garante que o container tenha pelo menos o tamanho do seu conteúdo */
    }

    /* Logo */
    .logo {
        flex-shrink: 0; /* Garante que a logo não diminua de tamanho */
    }

    .logo a {
        display: inline-block;
    }

    .logo-img {
        max-height: 50px;
        width: auto;
        border-radius: 50%;
        object-fit: cover;
        transition: transform 0.3s ease, filter 0.3s ease;
        image-rendering: crisp-edges;
    }

    .logo-img:hover {
        transform: translateY(-5px);
        filter: contrast(120%) brightness(110%);
    }

    /* Container para agrupar navegação e busca */
    .nav-and-search {
        display: flex;
        align-items: center;
        gap: 60px; /* AUMENTADO: Mais espaço entre links de navegação e barra de busca */
        flex-grow: 1; /* Permite que ocupe o espaço restante */
        justify-content: center; /* Centraliza o conteúdo (links e busca) dentro deste container */
        flex-shrink: 1; /* Permite que este container encolha se necessário */
        min-width: 0; /* Importante para permitir que o flex-shrink funcione corretamente */
    }

    /* Navegação */
    .nav-links {
        display: flex;
        gap: 30px; /* AUMENTADO: Mais espaço entre os links */
        align-items: center;
        flex-wrap: nowrap; /* Impede quebra de linha nos links de navegação */
        flex-shrink: 1; /* Permite que os links encolham */
        min-width: 0; /* Importante para permitir que o flex-shrink funcione corretamente */
    }

    .nav-links a.active {
        color: #ffb900;
        text-decoration: underline;
    }

    .nav-links a {
        color: #fff;
        font-weight: 600;
        text-decoration: none;
        font-size: 1rem;
        display: flex;
        align-items: center;
        gap: 6px;
        white-space: nowrap; /* Impede quebra de linha no texto dos links */
        transition: color 0.3s ease;
    }

    .nav-links a:hover {
        color: #ffb900;
    }

    /* Barra de pesquisa */
    .search-bar {
        display: flex;
        align-items: center;
        gap: 5px;
        flex-shrink: 1; /* Permite que a barra de busca encolha */
        min-width: 0; /* Importante para permitir que o flex-shrink funcione corretamente */
    }

    .search-bar input[type="text"] {
        padding: 7px 12px;
        border: none;
        border-radius: 4px 0 0 4px;
        outline: none;
        width: 220px; /* Pode ser ajustado para um valor menor ou max-width */
        font-size: 1rem;
        transition: box-shadow 0.3s ease;
        flex-shrink: 1; /* Permite que o input encolha */
        min-width: 100px; /* Largura mínima para o input */
    }

    .search-bar input[type="text"]:focus {
        box-shadow: 0 0 5px #ffb900;
    }

    .search-bar button {
        background-color: #ffb900;
        border: none;
        color: #00264d;
        padding: 8px 12px;
        cursor: pointer;
        border-radius: 0 4px 4px 0;
        font-size: 1rem;
        transition: background-color 0.3s ease;
        flex-shrink: 0; /* Garante que o botão não encolha */
    }

    .search-bar button:hover {
        background-color: #e6a700;
    }

    .search-input-wrapper {
        position: relative;
        display: inline-block;
    }

    .search-input-wrapper input[type="text"] {
        padding-right: 30px;
    }

    .clear-search {
        position: absolute;
        right: 5px;
        top: 50%;
        transform: translateY(-50%);
        cursor: pointer;
        font-weight: bold;
        color: RED;
        display: none;
    }

    /* ======= CONTEÚDO DINÂMICO ======= */
    .main-content {
        max-width: 1100px;
        margin: 30px auto;
        padding: 0 20px;
        flex: 1;
        padding-bottom: 50px;
    }

    /* ======= FOOTER ======= */
    .footer {
        background-color: #00264d;
        color: #fff;
        padding: 30px 0 15px;
        font-size: 0.9rem;
    }

    .footer-container {
        max-width: 1150px;
        margin: 0 auto;
        padding: 0 20px;
        display: flex;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 30px;
    }

    .footer-section h4,
    .footer-section h5 {
        margin-bottom: 10px;
        font-weight: 700;
        color: #ffb900;
    }

    .footer-section p {
        margin-bottom: 6px;
        line-height: 1.4;
    }

    .social-icons a {
        color: #fff;
        font-size: 1.3rem;
        margin-right: 20px;
        transition: color 0.3s ease;
    }

    .social-icons a:hover {
        color: #ffb900;
    }

    .footer-bottom {
        text-align: center;
        margin-top: 20px;
        border-top: 1px solid rgba(255, 185, 0, 0.4);
        padding-top: 10px;
        font-size: 0.85rem;
        color: #ccc;
    }

    /* Responsividade */
    @media(max-width: 1200px) {
        .header-container {
            flex-direction: column; /* Coloca logo e nav/search em colunas */
            align-items: center; /* Centraliza os itens quando em coluna */
            gap: 15px;
        }

        .nav-and-search {
            width: 100%;
            justify-content: center;
            flex-direction: column; /* Coloca nav-links e search-bar em coluna */
            gap: 20px; /* AUMENTADO: Mais espaço aqui na responsividade */
        }

        .nav-links {
            justify-content: center;
            gap: 15px; /* AUMENTADO: Mais espaço aqui na responsividade */
            flex-wrap: wrap;
        }

        .search-bar {
            width: 100%;
            justify-content: center;
        }

        .search-bar input[type="text"] {
            width: 80%; /* Ajusta a largura para o input de busca */
            max-width: 300px; /* Limita a largura máxima */
        }
    }

    @media(max-width: 768px) {
        .nav-links {
            flex-direction: column;
            align-items: center;
        }
    }
    </style>
</head>
<body>

<header class="navbar">
    <div class="  header-container">
        <div class="logo">
            <a href="<?= base_url('home/index') ?>">
                <img src="<?= base_url('assets/images/logo-ibcel.png') ?>" title="IBCEL" alt="IBCEL" class="logo-img">
            </a>
        </div>

        <div class="nav-and-search">
            <?php
                $segment = $this->uri->segment(2); // home/index -> pega "index"
            ?>

            <nav class="nav-links">
                <a href="<?= base_url('home/index') ?>" class="<?= $segment == 'inicio' || $segment == '' ? 'active' : '' ?>"><i class="fa fa-home"></i> ÍNICIO </a>
                <a href="<?= base_url('home/empresa') ?>" class="<?= $segment == 'empresa' ? 'active' : '' ?>"><i class="fa fa-building"></i> EMPRESA</a>
                <a href="<?= base_url('home/produtos') ?>" class="<?= $segment == 'produtos' ? 'active' : '' ?>"><i class="fa fa-box-open"></i> PRODUTOS</a>
                <a href="<?= base_url('home/localizacao') ?>" class="<?= $segment == 'localizacao' ? 'active' : '' ?>"><i class="fa fa-map-marker-alt"></i> LOCALIZAÇÃO</a>
                <a href="<?= base_url('home/certificados') ?>" class="<?= $segment == 'certificados' ? 'active' : '' ?>"><i class="fa fa-certificate"></i> CERTIFICADOS</a>
                <a href="<?= base_url('home/politicas') ?>" class="<?= $segment == 'politica_qualidade' ? 'active' : '' ?>"><i class="fa fa-certificate"></i> POLÍTICAS </a>
                <a href="<?= base_url('home/contato') ?>" class="<?= $segment == 'contato' ? 'active' : '' ?>"><i class="fa fa-envelope"></i> CONTATO</a>
            </nav>

            <form class="search-bar" action="<?= base_url('index.php/home/busca') ?>" method="get">
                <div class="search-input-wrapper">
                    <input type="text" name="q" placeholder="BUSCAR NA IBCEL" required>
                    <span class="clear-search" title='LIMPAR BUSCA'>X</span>
                </div>
                <button type="submit"><i class="fa fa-search"></i></button>
            </form>
        </div>
    </div>
</header>


<div class="main-content">
    <?php $this->load->view($view_name); ?>
</div>

<footer class="footer">
    <div class="footer-container">
        <div class="footer-section">
            <h4>IBCEL</h4>
            <p>INDÚSTRIA BRASILEIRA DE CONDUTORES ELÉTRICOS</p>
            <p>DESDE 1986 FABRICANDO QUALIDADE EM FIOS E CABOS.</p>
        </div>

        <div class="footer-section">
            <h5>CONTATO</h5>
            <p><i class="fas fa-map-marker-alt icon-spacing"></i> AV. ALBERTO VIEIRA ROMÃO, 285 - ALFENAS/MG</p>
            <p><i class="fas fa-envelope icon-spacing"></i> EMAILS: <a style="color: white; text-decoration: underline;"
            href="mailto:vendas@ibcel.com.br" title="CLIQUE PARA ENVIAR UM EMAIL">vendas@ibcel.com.br</a> |
            <a style="color: white; text-decoration: underline;" 
            href="mailto:celina_ibcel@yahoo.com.br" title="CLIQUE PARA ENVIAR UM EMAIL">celina_ibcel@yahoo.com.br
            </a></p>
            <p><i class="fab fa-whatsapp icon-spacing"></i> TELEFONE/WHATSAPP: (35) 98416-0634 | (35) 98416-5387</p>
        </div>

        <div class="footer-section">
            <h5>REDES SOCIAIS</h5>
            <div class="social-icons">
                <a href="https://www.instagram.com/ibcelcondutoreseletricos/" target="_blank" title="INSTAGRAM"><i class="fa-brands fa-instagram"></i></a>
            </div>
            </div>
    </div>

    <div class="footer-bottom" id="footer">
        <p>&copy; <?= date('Y') ?> IBCEL - TODOS OS DIREITOS RESERVADOS</p>
        <p class="developed-by">DESENVOLVIDO PELA EQUIPE TÉCNICA DE TI - IBCEL</p>
    </div>
</footer>

</body>
</html>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.querySelector('.search-bar input[name="q"]');
    const clearSearch = document.querySelector('.clear-search');

    // Mostra/oculta o 'X' ao digitar
    searchInput.addEventListener('input', function() {
        if (this.value.length > 0) {
            clearSearch.style.display = 'block';
        } else {
            clearSearch.style.display = 'none';
        }
    });

    // Limpa o campo ao clicar no 'X'
    clearSearch.addEventListener('click', function() {
        searchInput.value = '';
        clearSearch.style.display = 'none'; // Oculta o 'X' novamente
        searchInput.focus(); // Retorna o foco para o input
    });
});
</script>
