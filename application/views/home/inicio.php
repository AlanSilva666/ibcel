<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IBCEL - Conectando o Brasil com Qualidade desde 1986</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlalDLuL/s2h4Uq/uB406S/c80F/l1933A9t24N/E5z21o6V9tD3F6w6z52b3C3T3G8/6l2g+6E24H6g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600;700;800&display=swap" rel="stylesheet">

    <style>
        /* Global Styles & Resets */
        :root {
            --primary-blue: #0d47a1; /* Azul Escuro IBCEL */
            --secondary-blue: #1976d2; /* Azul Médio IBCEL */
            --accent-yellow: #ffca28; /* Amarelo Vibrante para CTAs */
            --light-blue-bg: #e3f2fd; /* Azul Claríssimo para fundos de seção */
            --white: #ffffff;
            --text-dark: #333333; /* Texto principal escuro */
            --text-light: #f0f0f0; /* Texto claro em fundos escuros */
            --quality-blue-start: #1e88e5; /* Tom de azul para o início do gradiente de qualidade */
            --quality-blue-end: #42a5f5; /* Tom de azul para o final do gradiente de qualidade */
        }

        a {
            text-decoration: none;
        }

        /* Keyframe Animations */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes slideInLeft {
            from { opacity: 0; transform: translateX(-50px); }
            to { opacity: 1; transform: translateX(0); }
        }

        @keyframes slideInRight {
            from { opacity: 0; transform: translateX(50px); }
            to { opacity: 1; transform: translateX(0); }
        }

        /* Header/Banner Section */
        .banner-hero {
            position: relative;
            background: linear-gradient(to right, var(--primary-blue), var(--secondary-blue));
            color: var(--white);
            text-align: center;
            padding: 150px 20px 100px; /* Padding ajustado */
            overflow: hidden;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 75vh; /* Altura generosa para o banner */
            box-shadow: 0 5px 20px rgba(0,0,0,0.2); /* Sombra sutil para destaque */
        }

        .banner-hero .content-wrapper {
            max-width: 950px; /* Largura um pouco maior para o conteúdo */
            margin: 0 auto;
        }

        .banner-hero .content-wrapper h1 {
            font-size: 3.8rem; /* Título maior e mais impactante */
            font-weight: 800; /* Extra bold */
            margin-bottom: 30px;
            line-height: 1.1;
            text-shadow: 3px 3px 6px rgba(0,0,0,0.4); /* Sombra de texto para destaque */
            animation: slideInLeft 1.5s ease-out;
        }

        .banner-hero .content-wrapper p {
            font-size: 1.35rem; /* Parágrafo mais legível */
            margin-bottom: 50px;
            line-height: 1.7;
            color: var(--text-light);
            animation: slideInRight 1.5s ease-out;
        }

        /* Buttons */
        .btn-main {
            background-color: var(--accent-yellow);
            color: var(--primary-blue);
            padding: 18px 45px; /* Botão maior e mais chamativo */
            border: none;
            border-radius: 35px; /* Borda mais arredondada */
            font-weight: bold;
            font-size: 1.25rem;
            text-decoration: none;
            transition: background-color 0.3s ease, transform 0.2s ease, box-shadow 0.3s ease;
            box-shadow: 0 6px 15px rgba(0,0,0,0.3);
            display: inline-block; /* Para centralizar e dar espaço */
            margin-top: 20px;
        }

        .btn-main:hover {
            background-color: #ffc107; /* Amarelo um pouco mais claro no hover */
            transform: translateY(-5px); /* Efeito de "pular" */
            box-shadow: 0 10px 20px rgba(0,0,0,0.4);
        }

        .btn-contact { /* Novo nome para os botões de contato para diferenciá-los */
            background-color: var(--accent-yellow); /* Botões brancos em fundo azul */
            color: var(--primary-blue);
            padding: 15px 35px;
            border-radius: 30px;
            text-decoration: none;
            font-weight: 700; /* Mais bold */
            font-size: 1.05rem;
            transition: background-color 0.3s ease, transform 0.2s ease, color 0.3s ease;
            display: inline-flex; /* Para alinhar ícone com texto */
            align-items: center;
            gap: 10px; /* Espaço entre ícone e texto */
            box-shadow: 0 4px 10px rgba(0,0,0,0.15);
        }

        .btn-contact:hover {
            background-color: var(--accent-yellow); /* Amarelo no hover */
            color: var(--primary-blue);
            transform: translateY(-3px);
        }

        .whatsapp-link {
            background-color: #1ebe5d; /* Verde WhatsApp */
            color: white;
            padding: 15px 35px;
            border-radius: 30px;
            font-weight: bold;
            font-size: 1.05rem;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
            transition: background-color 0.3s ease, transform 0.2s ease;
            display: inline-flex;
            align-items: center;
            gap: 10px;
        }

        .whatsapp-link img {
            width: 24px;
            height: 24px;
        }

        .whatsapp-link:hover {
            background-color: #1ebe5d;
            transform: translateY(-3px);
        }

        /* Sections General */
        section {
            padding: 80px 20px; /* Padding generoso para todas as seções */
            max-width: 1200px;
            margin: auto;
            text-align: center;
        }

        section h2 {
            font-size: 3rem; /* Títulos de seção maiores */
            margin-bottom: 40px;
            color: var(--primary-blue);
            font-weight: 700;
            text-shadow: 1px 1px 0 var(--white);
            position: relative; /* Para o underline */
            display: inline-block; /* Para o underline pegar só o texto */
        }

        section h2::after { /* Underline animado para títulos */
            content: '';
            position: absolute;
            width: 60%;
            height: 4px;
            background-color: var(--accent-yellow);
            left: 20%;
            bottom: -10px;
            border-radius: 2px;
            transform: scaleX(0);
            transition: transform 0.4s ease-out;
        }

        section h2:hover::after {
            transform: scaleX(1);
        }

        section p {
            font-size: 1.15rem;
            color: var(--text-dark);
            max-width: 900px;
            margin: 0 auto 30px auto; /* Centraliza e adiciona margem inferior */
        }

        /* PRODUTOS Section */
        section#produtos {
            background: linear-gradient(to bottom, var(--light-blue-bg), var(--white));
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            margin-top: -60px; /* Levanta a seção para sobrepor um pouco o banner */
            position: relative;
            z-index: 1; /* Garante que fique por cima */
            padding-top: 100px; /* Mais padding para compensar a sobreposição */
        }

        .cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); /* Cards um pouco maiores */
            gap: 35px; /* Espaçamento maior entre cards */
            justify-items: center;
            align-items: stretch;
        }

        .card {
            background: linear-gradient(145deg, var(--white), #f8fcff); /* Gradiente mais suave */
            border: 1px solid var(--secondary-blue); /* Borda mais fina */
            border-radius: 25px; /* Borda mais arredondada */
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15); /* Sombra mais suave */
            overflow: hidden;
            transition: transform 0.4s ease, box-shadow 0.4s ease;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            padding-bottom: 25px; /* Espaço na parte inferior do card */
        }

        .card:hover {
            transform: translateY(-12px) scale(1.02); /* Efeito mais pronunciado no hover */
            box-shadow: 0 18px 35px rgba(0, 0, 0, 0.2);
        }

        .card img {
            width: 100%;
            height: 280px; /* Altura ajustada para mais impacto */
            object-fit: contain;
            background-color: var(--light-blue-bg);
            padding: 15px;
            border-bottom: 1px solid rgba(0,0,0,0.05); /* Separador sutil */
            margin-bottom: 20px;
            transition: transform 0.3s ease;
        }

        .card:hover img {
            transform: scale(1.1); /* Zoom sutil na imagem ao passar o mouse */
        }

        .card h3 {
            margin: 0 15px 10px; /* Espaço entre imagem/título e entre título/parágrafo */
            font-size: 1.5rem; /* Título do card maior */
            color: var(--primary-blue);
            font-weight: 700;
            line-height: 1.3;
        }

        .card p {
            color: #555;
            font-size: 1.05rem;
            padding: 0 20px;
            margin-bottom: 0; /* Remove margem padrão */
        }

        /* Seção "Qualidade Garantida" (NOVA ESTILIZAÇÃO COM FUNDO AZUL) */
        section#qualidade-garantida {
            background: linear-gradient(to bottom, var(--quality-blue-start), var(--quality-blue-end)); /* Gradiente de azul */
            color: var(--white); /* Texto branco para contraste */
            padding: 100px 20px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.15); /* Sombra para destacar a seção */
            border-radius: 20px;
            margin-top: 60px;
        }

        section#qualidade-garantida h2 {
            color: var(--white);
            margin-bottom: 20px;
            font-size: 2.8rem; /* Tamanho do título para impacto */
            font-weight: 800;
            text-shadow: 2px 2px 5px rgba(0,0,0,0.3); /* Sombra para o título */
        }

        section#qualidade-garantida h2::after { /* Underline amarelo para contraste */
            background-color: var(--accent-yellow);
        }

        .quality-content {
            display: flex;
            flex-direction: column;
            align-items: center;
            max-width: 800px;
            margin: 0 auto;
        }

        .quality-icon {
            font-size: 5rem; /* Tamanho grande para o ícone */
            color: var(--accent-yellow); /* Cor amarela para destaque */
            margin-bottom: 30px;
            animation: fadeIn 1s ease-out; /* Animação no ícone */
            text-shadow: 2px 2px 5px rgba(0,0,0,0.2); /* Sombra para o ícone */
        }

        section#qualidade-garantida p {
            font-size: 1.25rem; /* Texto maior e mais legível */
            line-height: 1.8;
            margin-bottom: 0;
            text-shadow: 1px 1px 2px rgba(0,0,0,0.2); /* Sombra para o texto */
        }


        /* Seção "Fale Conosco" */
        section#fale-conosco { /* ID renomeado para maior clareza */
            background: linear-gradient(to bottom, var(--primary-blue), #0b3a88); /* Gradiente de azul escuro */
            color: var(--white);
            padding: 100px 20px;
            margin-top: 60px;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.3);
        }

        section#fale-conosco h2 {
            color: var(--white); /* Título branco */
            text-shadow: 2px 2px 5px rgba(0,0,0,0.3);
            margin-bottom: 20px;
        }

        section#fale-conosco h2::after { /* Underline também branco/amarelo */
            background-color: var(--accent-yellow);
        }

        section#fale-conosco p {
            color: var(--text-light); /* Texto um pouco mais claro */
            margin-bottom: 40px;
        }

        .contact-buttons-wrapper { /* Novo container para os botões de contato */
            display: flex;
            flex-wrap: wrap; /* Permite quebrar linha em telas menores */
            justify-content: center;
            gap: 30px; /* Espaçamento maior entre os botões de contato */
            margin-top: 30px;
        }

        /* Responsive Adjustments */
        @media (max-width: 1024px) {
            .banner-hero .content-wrapper h1 {
                font-size: 3.2rem;
            }
            .banner-hero .content-wrapper p {
                font-size: 1.2rem;
            }
            .btn-main {
                padding: 16px 40px;
                font-size: 1.2rem;
            }
            section h2 {
                font-size: 2.5rem;
            }
            .card img {
                height: 250px;
            }
            section#qualidade-garantida h2 {
                font-size: 2.5rem;
            }
            section#qualidade-garantida p {
                font-size: 1.1rem;
            }
        }

        @media (max-width: 768px) {
            .banner-hero {
                width: 90%; /* Em telas menores, pode ocupar quase toda a largura */
                margin-bottom: 30px;
            }
            .banner-hero .content-wrapper h1 {
                font-size: 2.6rem;
                margin-bottom: 20px;
            }
            .banner-hero .content-wrapper p {
                font-size: 1.1rem;
                margin-bottom: 30px;
            }
            .btn-main {
                padding: 14px 30px;
                font-size: 1.1rem;
            }
            section {
                padding: 60px 15px;
            }
            section h2 {
                font-size: 2.2rem;
                margin-bottom: 30px;
            }
            .cards {
                grid-template-columns: 1fr; /* Uma coluna em telas menores */
                gap: 25px;
            }
            .card img {
                height: 220px;
            }
            .card h3 {
                font-size: 1.3rem;
            }
            .contact-buttons-wrapper {
                flex-direction: column; /* Botões de contato empilhados */
                gap: 15px;
            }
            .btn-contact, .whatsapp-link {
                width: 90%; /* Ocupa quase toda a largura */
                margin: 0 auto;
                justify-content: center;
            }
            section#qualidade-garantida {
                padding: 70px 15px;
                margin-top: 40px;
            }
            .quality-icon {
                font-size: 4rem;
                margin-bottom: 20px;
            }
            section#qualidade-garantida h2 {
                font-size: 2rem;
            }
            section#qualidade-garantida p {
                font-size: 0.95rem;
            }
        }

        @media (max-width: 480px) {
            .banner-hero .content-wrapper h1 {
                font-size: 2rem;
            }
            .banner-hero .content-wrapper p {
                font-size: 1rem;
            }
            section h2 {
                font-size: 1.8rem;
            }
            .card img {
                height: 180px;
            }
            .btn-contact, .whatsapp-link {
                font-size: 0.95rem;
                padding: 12px 20px;
            }
            section#qualidade-garantida h2 {
                font-size: 1.8rem;
            }
            section#qualidade-garantida p {
                font-size: 0.95rem;
            }
        }
    </style>
</head>
<body>

    <div class="banner-hero">
        <img src="<?= base_url('assets/images/logo-ibcel.png') ?>" alt="IBCEL" class="logo-img-transparent" width="350px"/>
        <br>
       <div class="content-wrapper">
            <h1>DESDE 1986 CONECTANDO O <br> BRASIL COM QUALIDADE</h1>
            <p>
                A IBCEL - Indústria Brasileira de Condutores Elétricos Ltda, localizada estrategicamente no eixo Minas/São Paulo/Rio, em Alfenas-MG, conta com uma moderna instalação de 13.200 m², sendo 4.200 m² de área construída.
                <br><br>
                Detentora de uma marca patenteada e consolidada no mercado, a IBCEL preza pelo trinômio TECNOLOGIA, QUALIDADE e PONTUALIDADE, graças ao profissionalismo de sua equipe com experiência internacional.
                <br><br>
                Desde 1986, a IBCEL atua na fabricação e comercialização de fios e cabos elétricos especiais em cobre e suas ligas, isolados em PVC, Polietileno, Polipropileno, Nylon, Santoprene, XLPE, Poliuretano e Têxteis.
            </p>
        </div>
    </div>

    <hr>

    <section id="produtos">
        <h2>PRINCIPAIS PRODUTOS</h2>
        <div class="cards">
            <div class="card">
                <img src="/ibcel/assets/images/CABO_RCA.png" alt="CABOS DE RCA" loading="lazy" />
                <h3>CABOS DE RCA</h3>
                <p>Utilizado para conectar áudio e vídeo em eletrônicos como TVs e sistemas de som.</p>
            </div>
            <div class="card">
                <img src="/ibcel/assets/images/CABO_PP.png" alt="CABO PP" loading="lazy" />
                <h3>CABOS PP</h3>
                <p>Versatilidade e segurança para instalações domésticas e industriais.</p>
            </div>
            <div class="card">
                <img src="/ibcel/assets/images/CABO_FLAT.png" alt="CABO FLAT" loading="lazy" />
                <h3>CABOS FLAT</h3>
                <p>Soluções compactas e eficientes para eletrônicos e maquinários.</p>
            </div>
            <div class="card">
                <img src="/ibcel/assets/images/CABO_REDE.png" alt="CABO DE REDE" loading="lazy" />
                <h3>CABOS DE REDE</h3>
                <p>Conectividade de alta performance para suas necessidades de comunicação.</p>
            </div>
            <div class="card">
                <img src="/ibcel/assets/images/ISO.png" alt="Certificação ISO 9001:2015" loading="lazy" />
                <h3>CERTIFICAÇÃO ISO 9001:2015</h3>
                <p>Nosso compromisso com a excelência e processos de qualidade.</p>
            </div>
            <div class="card">
                <img src="/ibcel/assets/images/CABO_TERMOMETRIA.png" alt="CABO DE TERMOMETRIA" loading="lazy" />
                <h3>CABOS DE TERMOMETRIA</h3>
                <p>Precisão e confiabilidade para medição de temperatura.</p>
            </div>
        </div>
        <div style="text-align: center; margin-top: 50px;">
            <a href="produtos" class="btn-main">VEJA TODOS OS NOSSOS PRODUTOS</a>
        </div>
    </section>

    <hr>

    <section id="qualidade-garantida">
        <div class="quality-content">
            <i class="fas fa-award quality-icon"></i> <h2>QUALIDADE GARANTIDA</h2>
            <p>
                Na IBCEL, nosso compromisso com a qualidade é inabalável.
                Contamos com a certificação ISO 9001 e uma equipe de especialistas dedicados a garantir
                que cada produto atinja os mais altos padrões de desempenho e segurança,
                e sustentabilidade. Sua confiança é a nossa prioridade.
            </p>
        </div>
    </section>

    <hr>

    <section id="fale-conosco">
        <h2>FALE CONOSCO</h2>
        <p>
            Quer saber mais sobre nossos produtos, soluções personalizadas ou ter uma conversa direta com nossa equipe técnica ou comercial? Estamos prontos para atender você!
        </p>
        <div class="contact-buttons-wrapper">
            <a href="mailto:vendas@ibcel.com.br" title="Enviar e-mail para Vendas IBCEL" class="btn-contact">
                <img src="https://cdn-icons-png.flaticon.com/512/542/542638.png" alt="Ícone de E-mail" style="width: 20px; height: 20px; filter: brightness(0) invert(1);">
                VENDAS@IBCEL.COM.BR
            </a>
            <a href="https://wa.me/5535984160634" title="Fale com a IBCEL no WhatsApp" target="_blank" class="whatsapp-link">
                <img src="https://cdn-icons-png.flaticon.com/512/733/733585.png" alt="Ícone do WhatsApp">
                FALE CONOSCO NO WHATSAPP
            </a>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const logo = document.querySelector('.banner-hero .logo-img');
            if (logo) {
                logo.addEventListener('mouseover', function() {
                    this.style.transform = 'scale(1.05)';
                    this.style.transition = 'transform 0.3s ease-in-out';
                });
                logo.addEventListener('mouseout', function() {
                    this.style.transform = 'scale(1)';
                });
            }
        });
    </script>
</body>
</html>
