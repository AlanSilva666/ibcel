<style>
    /* --- Estilos para a Página de Conteúdo e RESULTADOS DA BUSCA --- */

    .pagina-conteudo {
        padding: 2rem; /* ESPAÇAMENTO INTERNO PARA O CONTEÚDO */
        max-width: 900px; /* LIMITA A LARGURA PARA MELHOR LEITURA */
        margin: 3rem auto; /* CENTRALIZA A DIV NA PÁGINA COM MARGEM SUPERIOR/INFERIOR */
        background-color: #ffffff; /* FUNDO BRANCO PARA O BLOCO */
        border-radius: 8px; /* CANTOS ARREDONDADOS */
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1); /* SOMBRA SUAVE */
    }

    .pagina-conteudo h2 {
        font-size: 2.2rem; /* TAMANHO DO TÍTULO DA BUSCA */
        color: #333; /* COR DO TÍTULO */
        margin-bottom: 1.5rem; /* ESPAÇAMENTO ABAIXO DO TÍTULO */
        text-align: center; /* CENTRALIZA O TEXTO */
        font-weight: 600; /* NEGRITO MÉDIO */
    }

    /* ESTILO PARA QUANDO NÃO HÁ RESULTADOS */
    .pagina-conteudo p {
        font-size: 1.1rem;
        color: #666;
        text-align: center;
        margin-top: 1.5rem;
    }

    /* --- ESTILOS PARA A LISTA DE RESULTADOS --- */
    .lista-resultados {
        list-style: none; /* REMOVE OS MARCADORES PADRÃO DA LISTA */
        padding: 0; /* REMOVE O PADDING PADRÃO */
        margin-top: 2rem; /* ESPAÇAMENTO ACIMA DA LISTA */
    }

    .lista-resultados li {
        background-color: #f9f9f9; /* FUNDO LEVEMENTE CINZA PARA CADA ITEM */
        border: 1px solid #eee; /* BORDA SUAVE */
        border-radius: 6px; /* CANTOS ARREDONDADOS PARA OS ITENS */
        margin-bottom: 1.2rem; /* ESPAÇAMENTO ENTRE OS ITENS DA LISTA */
        padding: 1.5rem 2rem; /* ESPAÇAMENTO INTERNO */
        transition: all 0.3s ease; /* TRANSIÇÃO SUAVE PARA HOVER */
    }

    .lista-resultados li:hover {
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08); /* SOMBRA AO PASSAR O MOUSE */
        transform: translateY(-3px); /* EFEITO DE "LEVANTAR" AO PASSAR O MOUSE */
        background-color: #f0f0f0; /* ALTERA A COR DE FUNDO NO HOVER */
    }

    /* --- ESTILO PARA O TÍTULO DO RESULTADO (O LINK) --- */
    .lista-resultados li a {
        font-size: 1.4rem; /* TAMANHO DO TÍTULO DO RESULTADO */
        color: #0056b3; /* COR DO LINK (AZUL MAIS ESCURO) */
        text-decoration: none; /* REMOVE O SUBLINHADO PADRÃO */
        font-weight: 500; /* NEGRITO LEVE */
        display: block; /* GARANTE QUE O LINK OCUPE TODA A LARGURA */
        margin-bottom: 0.5rem; /* ESPAÇAMENTO ABAIXO DO TÍTULO DO LINK */
    }

    .lista-resultados li a:hover {
        text-decoration: underline; /* ADICIONA SUBLINHADO AO PASSAR O MOUSE */
        color: #004085; /* COR MAIS ESCURA NO HOVER */
    }

    /* --- ESTILO PARA O SNIPPET (TRECHO DO TEXTO) --- */
    .lista-resultados li p small {
        font-size: 0.95rem; /* TAMANHO DA FONTE PARA O SNIPPET */
        color: #555; /* COR DO TEXTO DO SNIPPET */
        line-height: 1.5; /* ESPAÇAMENTO ENTRE LINHAS */
    }

    /* ESTILO PARA A PALAVRA-CHAVE DESTACADA (<strong>) */
    .lista-resultados li p small strong {
        color: #c00; /* COR VERMELHA PARA DESTACAR A PALAVRA */
        font-weight: bold; /* GARANTE QUE SEJA NEGRITO */
    }

    /* --- NOVO ESTILO: FORÇA TODO O TEXTO DA PÁGINA DE RESULTADOS PARA MAIÚSCULAS --- */
    .pagina-conteudo {
        text-transform: uppercase;
    }
    /* SE VOCÊ QUISER QUE APENAS PARTES ESPECÍFICAS FIQUEM EM MAIÚSCULAS, REMOVA O CÓDIGO ACIMA
       E APLIQUE 'text-transform: uppercase;' EM CLASSES/ELEMENTOS ESPECÍFICOS, COMO POR EXEMPLO:
       .pagina-conteudo h2,
       .lista-resultados li a {
           text-transform: uppercase;
       }
    */
</style>

<div class="pagina-conteudo">
    <h2>RESULTADOS DA BUSCA POR: "<?= html_escape($busca) ?>"</h2>

    <?php if (empty($resultados)): ?>
        <p>NENHUM RESULTADO ENCONTRADO.</p>
    <?php else: ?>
        <ul class="lista-resultados">
            <?php foreach ($resultados as $resultado): ?>
                <li>
                    <a href="<?= $resultado['url'] ?>">
                        <?= $resultado['titulo'] ?>
                    </a>
                    <?php if (!empty($resultado['snippet'])): ?>
                        <p><small><?= $resultado['snippet'] ?></small></p>
                    <?php endif; ?>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</div>
