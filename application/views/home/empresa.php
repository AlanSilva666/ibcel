<!-- CSS Lightbox -->
<link rel="stylesheet" href="/ibcel/assets/engine/css/lightbox.css" type="text/css" media="screen" />
<!-- JS Lightbox -->
<script src="/ibcel/assets/engine/js/prototype.js" type="text/javascript"></script>
<script src="/ibcel/assets/engine/js/scriptaculous.js?load=effects,builder" type="text/javascript"></script>
<script src="/ibcel/assets/engine/js/lightbox.js" type="text/javascript"></script>
<style>
    body {
        margin: 0;
        padding: 0;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .menu-lateral {
        position: absolute;
        top: 120px;
        left: 20px;
        z-index: 999;
        display: flex;
        flex-direction: column;
        gap: 13px;
    }

    .menu-lateral button {
        background-color: #fff;
        color: #4b0082;
        border: 2px solid #4b0082;
        padding: 8px 8px;
        border-radius: 20px;
        font-weight: bold;
        cursor: pointer;
        transition: 0.3s;
        width: 100px;
        text-align: center;
    }

    .menu-lateral button:hover {
        background-color: #4b0082;
        color: #fff;
    }

    .galeria-container {
        display: none;
        padding: 20px;
        background-color: #f4f4f4;
        margin-top: 20px;
    }

    .gallery {
        width: 795px;
        margin: auto;
    }

    .gallery a {
        display: block;
        float: left;
        margin: 5px;
        opacity: 0.87;
        transition: opacity 0.3s;
    }

    .gallery a:hover {
        opacity: 1;
    }

    .gallery a img {
        border: none;
        display: block;
    }

    .banner-clean {
        background: linear-gradient(to right, #4b0082, #8a2be2);
        color: #e6e6fa;
        text-align: center;
        padding: 100px 20px;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        letter-spacing: 0.03em;
        line-height: 1.6;
    }

    .banner-clean p {
        font-size: 1.25rem;
        max-width: 900px;
        margin: 0 auto 20px auto;
    }

    .banner-clean strong {
        color: #fffacd;
    }

    .btn-primary {
        background-color: #ffda44;
        color: #4b0082;
        padding: 12px 30px;
        border: none;
        border-radius: 30px;
        font-weight: 700;
        text-decoration: none;
        transition: background-color 0.3s ease, color 0.3s ease;
        cursor: pointer;
        display: inline-block;
        margin-top: 30px;
    }

    .btn-primary:hover {
        background-color: #ffec8b;
        color: #551a8b;
    }

    .clearfix::after {
        content: "";
        display: table;
        clear: both;
    }
</style>
<!-- BOTÕES LATERAIS -->
<div class="menu-lateral">
    <button onclick="voltarEmpresa()">EMPRESA</button>
    <button onclick="abrirGaleria()">GALERIA DE FOTOS</button>
</div>

<!-- GALERIA -->
<div id="galeriaContainer" class="galeria-container">
    <div align="center">
        <td colspan="3" width="778" align='center'>
          <p style="margin-top: 0; margin-bottom: 0">
          <img border="0" src="/ibcel/assets/images/empresa_foto_galeria_titulo.png" width="195" height="36"></p>
          <p style="margin-top: 0; margin-bottom: 0">
          <img border="0" src="/ibcel/assets/images/empresa_foto_topo.JPG" width="765" height="106"></p>
        </td>
        <p style="line-height:150%; margin: 3px 0;" align="center">
            <font face="Verdana" style="font-size: 9pt" color="#808080">
                Conheça a IBCEL - Indústria Brasileira de Condutores Elétricos Ltda.
            </font>
        </p>
        <p style="line-height:150%; margin: 3px 0;" align="center">
            <font face="Verdana" style="font-size: 9pt; font-weight:700; font-style:italic" color="#000080">
                Clique em uma das imagens para iniciar o slide.
            </font>
        </p>

        <div class="gallery clearfix">
            <?php
            $imagens = [
                "S5036243", "S5036065", "S5036066", "S5036067",
                "S5036070", "S5036072", "S5036079", "S5036082",
                "S5036085", "S5036086", "S5036087", "S5036089",
                "S5036094", "S5036095", "S5036096", "S5036097",
                "S5036101", "S5036108", "S5036109", "S5036110",
                "S5036111", "S5036113", "S5036115", "S5036117",
                "S5036122", "S5036136", "S5036144", "S5036170",
                "S5036182", "S5036190", "S5036208", "S5036217",
                "S5036219", "S5036238", "S5036239", "S5036242"
            ];

            foreach ($imagens as $img) {
                echo '<a href="/ibcel/assets/data/images/' . $img . '.jpg" rel="lightbox[sample]">';
                echo '<img src="/ibcel/assets/data/thumbnails/' . $img . '.png" /></a>';
            }
            ?>
        </div>

    </div>
</div>
<!-- BANNER -->
<div id="bannerEmpresa" class="banner-clean">
    <p>
        A <strong>IBCEL - Indústria Brasileira de Condutores Elétricos Ltda</strong> é uma empresa que atua desde <strong>1986</strong> na fabricação e comercialização de fios e cabos elétricos especiais em cobre e suas ligas, isolados em PVC, Polietileno, Polipropileno, Nylon, Santoprene, XLPE, Poliuretano e Têxteis.
    </p>
    <p>
        Com seu sistema de qualidade certificado pela ISO 9001, versão 2015, desenvolve e nacionaliza com alto padrão de qualidade de acordo com especificações, parâmetros elétricos e/ou amostras, para atender plenamente as necessidades de seus clientes.
    </p>
    <p>
        Detentora de uma marca patenteada já consolidada no mercado, adota como extrema relevância o trinômio <strong>TECNOLOGIA, QUALIDADE</strong> e <strong>PONTUALIDADE</strong>.
    </p>
    <p>
        Os produtos IBCEL são destaques no Brasil e América Latina graças ao profissionalismo de sua equipe associativa de experiência internacional. Licenciada pelo COPAM, a IBCEL soube aliar tecnologia ao respeito ambiental; um grau de consciência que é refletido em seus diversos produtos.
    </p>
    <p>
        Sua equipe de profissionais se dedica cada vez mais para oferecer sempre produtos com um excelente nível de qualidade e confiabilidade.
    </p>
    <a href="produtos" class="btn-primary">CONHEÇA NOSSOS PRODUTOS</a>
</div>
  <!-- JS -->
<script>
    function abrirGaleria() {
        const galeria = document.getElementById('galeriaContainer');
        const banner = document.getElementById('bannerEmpresa');

        galeria.style.display = galeria.style.display === 'none' || galeria.style.display === '' ? 'block' : 'none';
        banner.style.display = galeria.style.display === 'block' ? 'none' : 'block';
    }

    function voltarEmpresa() {
        window.location.href = "empresa"; // ajuste conforme a sua rota real
    }
</script>
