<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<style>
    /* Estilos específicos para a página de produtos para evitar conflitos e garantir o layout */

    /* Container principal para centralizar o conteúdo, mas dentro do main-content do template */
    .products-page-container {
        display: flex;
        justify-content: center;
        width: 100%; /* Ocupa a largura total do main-content */
        padding: 20px 0; /* Adiciona um pouco de padding vertical */
        box-sizing: border-box; /* Garante que o padding não aumente a largura total */
    }

    /* Layout da tabela principal */
    .content-table {
        background-color: #FFFFFF; /* Fundo branco para a tabela de conteúdo */
        width: 950px; /* Largura fixa para o conteúdo principal, ajustada para caber no template */
        max-width: 100%; /* Garante que não exceda o container pai */
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Sombra suave para destacar o conteúdo */
        display: flex;
        flex-direction: row; /* Coloca o menu lateral e o conteúdo em linha */
        min-height: 600px; /* Altura mínima para o container principal */
        border-radius: 8px; /* Borda arredondada para o container de produtos */
        overflow: hidden; /* Garante que a sombra e bordas sejam aplicadas corretamente */
    }

    /* Menu de navegação lateral */
    .sidebar-menu {
        width: 380px; /* Largura para acomodar 4 colunas de 80px + margens */
        padding: 20px; /* Espaço interno */
        flex-shrink: 0; /* Impede que ele encolha */
        display: flex;
        flex-wrap: wrap;
        justify-content: flex-start;
        align-content: flex-start;
        gap: 10px; /* Espaçamento entre os botões */
        background-color: #f8f8f8; /* Fundo levemente diferente para a sidebar */
        border-right: 1px solid #eee; /* Separador */
    }

    .sidebar-menu a {
        display: block;
        width: 80px; /* Largura fixa para os botões */
        height: 80px; /* Altura fixa para os botões */
        overflow: hidden;
        flex-shrink: 0;
        border: 1px solid #ddd;
        border-radius: 5px;
        transition: transform 0.2s ease, border-color 0.2s ease;
    }

    .sidebar-menu a img {
        display: block;
        width: 100%;
        height: 100%;
        object-fit: contain; /* Redimensiona a imagem para caber sem cortar */
    }

    .sidebar-menu a:hover {
        transform: translateY(-3px); /* Efeito de elevação suave */
        border-color: #007bff; /* Borda colorida no hover */
    }

    /* Área de conteúdo principal dentro do content-table */
    .product-display-area { /* Renomeado para evitar conflito com .main-content do template */
        flex-grow: 1; /* Permite que o conteúdo principal ocupe o espaço restante */
        padding: 20px; /* Padding interno para o conteúdo */
        background-color: #FFFFFF; /* Fundo branco */
        display: flex;
        align-items: flex-start; /* Alinha o conteúdo ao topo */
        justify-content: center; /* Centraliza horizontalmente o conteúdo */
        position: relative; /* Necessário para posicionar a mensagem de boas-vindas */
        flex-direction: column; /* Para empilhar elementos se necessário */
    }

    /* Estilos do iframe */
    #mostra_prod {
        width: 100%;
        height: 600px; /* Altura padrão inicial para o iframe */
        border: none; /* Remove a borda padrão do iframe */
        display: none; /* Oculto por padrão, só aparece após o clique */
        flex-grow: 1; /* Permite que o iframe ocupe o espaço disponível */
    }

    /* Estilos da mensagem de boas-vindas */
    #welcomeMessage {
        position: absolute; /* Posição absoluta para cobrir o espaço do iframe */
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        display: flex; /* Exibido por padrão como flex para centralizar */
        flex-direction: column;
        justify-content: center; /* Centraliza verticalmente */
        align-items: center; /* Centraliza horizontalmente */
        background-color: #f0f0f0; /* Fundo claro para a mensagem */
        color: #333;
        font-size: 1.1em; /* Tamanho de fonte ajustado */
        text-align: center;
        padding: 30px;
        z-index: 10; /* Garante que a mensagem fique por cima do iframe */
        border-radius: 8px; /* Borda arredondada para a mensagem */
    }

    .welcome-message h2 {
        color: #00264d; /* Cor do cabeçalho principal do template */
        margin-bottom: 15px;
        font-size: 2em; /* Ajuste para ser proporcional ao template */
        font-weight: 700;
    }

    .welcome-message p {
        line-height: 1.6;
        max-width: 90%; /* Limita a largura do texto */
        font-size: 1.1em;
        color: #555;
    }

    .welcome-message .arrow-pointer {
        font-size: 3.5em; /* Seta maior */
        color: #ffb900; /* Cor da seta do template */
        margin-top: 25px;
        animation: bounce 1s infinite alternate; /* Animação suave */
    }

    @keyframes bounce {
        from { transform: translateY(0); }
        to { transform: translateY(-10px); }
    }

    /* Responsividade específica para a página de produtos */
    @media (max-width: 992px) {
        .content-table {
            flex-direction: column; /* Pilha a sidebar e o conteúdo em telas menores */
            width: 95%; /* Ocupa mais largura em telas menores */
        }
        .sidebar-menu {
            width: 100%; /* Sidebar ocupa toda a largura */
            justify-content: center; /* Centraliza os botões */
            border-right: none;
            border-bottom: 1px solid #eee;
        }
        .sidebar-menu a {
            width: 60px; /* Botões menores em telas menores */
            height: 60px;
        }
        .product-display-area {
            padding: 15px;
        }
    }

    @media (max-width: 600px) {
        .sidebar-menu a {
            width: 50px;
            height: 50px;
        }
        .welcome-message h2 {
            font-size: 1.6em;
        }
        .welcome-message p {
            font-size: 1em;
        }
        .welcome-message .arrow-pointer {
            font-size: 3em;
        }
    }
</style>

<div class="products-page-container">
    <div class="content-table">
        <div class="sidebar-menu">
            <a href="<?= base_url('assets/html/produto_audio_video.html') ?>" data-target-iframe="mostra_prod">
                <img src="<?= base_url('assets/images/Button1.gif') ?>" alt="Áudio Vídeo">
            </a>
            <a href="<?= base_url('assets/html/produto_audio_frequencia.html') ?>" data-target-iframe="mostra_prod">
                <img src="<?= base_url('assets/images/Button2.gif') ?>" alt="Áudio Frequência">
            </a>
            <a href="<?= base_url('assets/html/produto_cabo_automotivo.html') ?>" data-target-iframe="mostra_prod">
                <img src="<?= base_url('assets/images/Button3.gif') ?>" alt="Automóveis">
            </a>
            <a href="<?= base_url('assets/html/produto_balancas.html') ?>" data-target-iframe="mostra_prod">
                <img src="<?= base_url('assets/images/Button4.gif') ?>" alt="Balanças">
            </a>
            <a href="<?= base_url('assets/html/produto_cabo_coaxial.html') ?>" data-target-iframe="mostra_prod">
                <img src="<?= base_url('assets/images/Button5.gif') ?>" alt="Coaxiais">
            </a>
            <a href="<?= base_url('assets/html/produto_cabocontrole.html') ?>" data-target-iframe="mostra_prod">
                <img src="<?= base_url('assets/images/Button6.gif') ?>" alt="Controle">
            </a>
            <a href="<?= base_url('assets/html/produto_cordoalhas.html') ?>" data-target-iframe="mostra_prod">
                <img src="<?= base_url('assets/images/Button7.gif') ?>" alt="Cordoalhas">
            </a>
            <a href="<?= base_url('assets/html/produto_eletronica.html') ?>" data-target-iframe="mostra_prod">
                <img src="<?= base_url('assets/images/Button8.gif') ?>" alt="Eletrônica">
            </a>
            <a href="<?= base_url('assets/html/produto_elevador.html') ?>" data-target-iframe="mostra_prod">
                <img src="<?= base_url('assets/images/Button9.gif') ?>" alt="Elevador">
            </a>
            <a href="<?= base_url('assets/html/produto_cabo_hospitalar.html') ?>" data-target-iframe="mostra_prod">
                <img src="<?= base_url('assets/images/Button10.gif') ?>" alt="Hospitalares">
            </a>
            <a href="<?= base_url('assets/html/produto_informatica.html') ?>" data-target-iframe="mostra_prod">
                <img src="<?= base_url('assets/images/Button11.gif') ?>" alt="Informática">
            </a>
            <a href="<?= base_url('assets/html/produto_instrumentacao.html') ?>" data-target-iframe="mostra_prod">
                <img src="<?= base_url('assets/images/Button12.gif') ?>" alt="Instrumentação">
            </a>
            <a href="<?= base_url('assets/html/produto_manufaturados.html') ?>" data-target-iframe="mostra_prod">
                <img src="<?= base_url('assets/images/Button13.gif') ?>" alt="Manufaturados">
            </a>
            <a href="<?= base_url('assets/html/produto_cabo_multicoaxial.html') ?>" data-target-iframe="mostra_prod">
                <img src="<?= base_url('assets/images/Button14.gif') ?>" alt="Multicoaxiais">
            </a>
            <a href="<?= base_url('assets/html/produto_cabo_flexivel.html') ?>" data-target-iframe="mostra_prod">
                <img src="<?= base_url('assets/images/Button15.gif') ?>" alt="Ligações Internas">
            </a>
            <a href="<?= base_url('assets/html/produto_sensores.html') ?>" data-target-iframe="mostra_prod">
                <img src="<?= base_url('assets/images/Button16.gif') ?>" alt="Sensores">
            </a>
            <a href="<?= base_url('assets/html/produto_sondagem.html') ?>" data-target-iframe="mostra_prod">
                <img src="<?= base_url('assets/images/Button17.gif') ?>" alt="Sondagem">
            </a>
            <a href="<?= base_url('assets/html/produto_sonorizacao.html') ?>" data-target-iframe="mostra_prod">
                <img src="<?= base_url('assets/images/Button18.gif') ?>" alt="Sonorização">
            </a>
            <a href="<?= base_url('assets/html/produto_telecomunicacao.html') ?>" data-target-iframe="mostra_prod">
                <img src="<?= base_url('assets/images/Button19.gif') ?>" alt="Telecomunicações">
            </a>
            <a href="<?= base_url('assets/html/produto_ternometria.html') ?>" data-target-iframe="mostra_prod">
                <img src="<?= base_url('assets/images/Button20.gif') ?>" alt="Termometria">
            </a>
        </div>
        <div class="product-display-area">
            <div id="welcomeMessage" class="welcome-message">
                <h2>BEM-VINDO AOS PRODUTOS!</h2>
                <p>
                    CLIQUE EM ALGUM DOS BOTÕES AO LADO,
                    PARA VISUALIZAR OS DETALHES DE CADA CATEGORIA.
                </p>
                <span class="arrow-pointer">&#8592;</span>
            </div>

            <iframe id="mostra_prod" name="mostra_prod" title="Conteúdo do Produto"></iframe>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const iframe = document.getElementById("mostra_prod");
        const welcomeMessage = document.getElementById("welcomeMessage");
        const DEFAULT_IFRAME_HEIGHT = "600px";

        iframe.addEventListener("load", function () {
            try {
                // Verifique se o iframe realmente carregou um conteúdo (não está vazio)
                if (iframe.contentDocument && iframe.contentDocument.body && iframe.src && iframe.src !== "about:blank") {
                    const iframeDocument = iframe.contentDocument || iframe.contentWindow.document;
                    // Calcula a altura do conteúdo do iframe
                    const contentHeight = Math.max(
                        iframeDocument.body.scrollHeight,
                        iframeDocument.body.offsetHeight,
                        iframeDocument.documentElement.clientHeight,
                        iframeDocument.documentElement.scrollHeight,
                        iframeDocument.documentElement.offsetHeight
                    );
                    iframe.style.height = (contentHeight + 30) + "px"; // Adiciona um padding extra
                    console.log(`Iframe carregado. Altura ajustada para: ${iframe.style.height}.`);
                } else {
                    console.warn("Conteúdo do iframe não acessível ou body ausente ao carregar. Altura padrão será usada.");
                    iframe.style.height = DEFAULT_IFRAME_HEIGHT;
                }
                welcomeMessage.style.display = "none";
                iframe.style.display = "block";
            } catch (e) {
                console.error("Erro ao carregar ou ajustar iframe (provável Same-Origin Policy):", e);
                welcomeMessage.style.display = "none";
                iframe.style.display = "block";
                iframe.style.height = DEFAULT_IFRAME_HEIGHT;
                console.log("Verifique se os arquivos dentro do iframe estão no mesmo domínio/protocolo/porta da página principal.");
            }
        });

        document.querySelectorAll('.sidebar-menu a').forEach(link => {
            const img = link.querySelector('img');
            if (img) {
                const originalSrc = img.src;
                // Assegure que o caminho para as imagens de hover esteja correto
                const hoverSrc = originalSrc.replace('.gif', 'MouseOver.gif');
                new Image().src = hoverSrc; // Pré-carrega a imagem de hover

                link.addEventListener('mouseenter', () => {
                    img.src = hoverSrc;
                });

                link.addEventListener('mouseleave', () => {
                    img.src = originalSrc;
                });

                link.addEventListener('click', function(event) {
                    event.preventDefault();
                    const url = this.getAttribute('href');

                    welcomeMessage.style.display = "none";
                    iframe.style.display = "block";
                    iframe.src = url;
                });
            }
        });
    });
</script>
