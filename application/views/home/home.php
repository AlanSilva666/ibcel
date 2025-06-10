<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<section class="pagina-conteudo">
    <h2>Bem-vindo à IBCEL</h2>
    <p>A IBCEL é a Indústria Brasileira de Condutores Elétricos, especializada na fabricação de fios e cabos de alta qualidade para diversas aplicações elétricas.</p>

    <div class="home-cards">
        <div class="card">
            <img src="https://source.unsplash.com/300x200/?industry" alt="Fábrica">
            <h3>Sobre a Empresa</h3>
            <p>Conheça nossa história e como nossa experiência reflete em cada produto que fabricamos.</p>
            <a href="<?= base_url('index.php/home/colaboradores') ?>" class="btn">Saiba Mais</a>
        </div>
        <div class="card">
            <img src="https://source.unsplash.com/300x200/?technology" alt="Tecnologia">
            <h3>Inovação Tecnológica</h3>
            <p>Acompanhe as últimas inovações que utilizamos em nossa linha de produção.</p>
            <a href="<?= base_url('index.php/home/produtos') ?>" class="btn">Ver Produtos</a>
        </div>
    </div>
</section>
