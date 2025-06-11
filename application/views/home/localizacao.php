<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Mapa com Zoom Interativo</title>
<style>
  /* O SEU MENU DE CIDADES/LOCALIZAÇÃO NO TOPO DA PÁGINA */
  /* Este é o menu que contém "Alfenas | São Paulo | Belo Horizonte | Rio de Janeiro" */
  /* No seu layout geral, esta parte deve estar no início do <body> */
  .main-location-menu {
    width: 100%;
    text-align: center;
    padding: 10px 0; /* Espaçamento interno */
    background-color: #e0e0e0; /* Apenas para visualização, se precisar de um fundo */
    /* Remova a cor de fundo se o seu menu já tiver estilo */
    margin-bottom: 0; /* Garante que não há espaço abaixo dele */
  }
  .main-location-menu ul {
    list-style: none;
    padding: 0;
    margin: 0;
    display: inline-flex; /* Para alinhar os itens lado a lado */
    gap: 20px; /* Espaço entre os links */
  }
  .main-location-menu li a {
    text-decoration: none;
    color: #333;
    font-weight: bold;
    padding: 5px 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    transition: background-color 0.2s;
  }
  .main-location-menu li a:hover {
    background-color: #d0d0d0;
  }


  /* Menu de seleção de mapas (localiza_mnu.png) */
  #menu {
    text-align: center;
    /* Reduzido para aproximar ao máximo do mapa */
    margin-top: 5px; /* Pequena margem acima da imagem do menu */
    margin-bottom: -15px; /* **CRÍTICO:** Margem negativa para o mapa subir */
    position: relative; /* Para garantir que z-index funcione se precisar */
    z-index: 2; /* Para que a sombra do mapa não o cubra */
  }

  #menu img {
    display: block;
    margin: 0 auto;
    width: 600px;
    height: 30px;
    /* Removido box-shadow para não competir com a borda do mapa */
    /* box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); */
    border-radius: 5px;
  }

  /* Cursor de mãozinha para os links do mapa */
  #menu map area {
    cursor: pointer;
  }

  /* Área do mapa com zoom */
  #map-wrapper {
    position: relative;
    width: 100%;
    max-width: 1240px; /* Ajustado para um tamanho mais comum para mapas (o seu da imagem parece ter uns 1200px de largura) */
    height: 680px; /* Ajustado proporcionalmente à largura */
    margin: 0 auto;
    /* Ajuste da margem superior para subir ainda mais, compensando a margem negativa do menu */
    margin-top: 0px; /* Essencial para eliminar espaço */
    overflow: hidden;
    /* Removida a box-shadow daqui, pois a imagem do mapa já parece ter uma moldura */
    /* box-shadow: 0 5px 15px rgba(0,0,0,0.2); */
    border-radius: 0px; /* Removido border-radius se a imagem já tem moldura */
    background-color: transparent; /* Mantido transparente para o fundo da página */
  }

  #zoomImg {
    width: 100%;
    height: 100%;
    /* Alterado de contain para fill ou cover se quiser que o mapa ocupe todo o espaço sem bordas */
    /* Cuidado: 'fill' pode distorcer, 'cover' pode cortar partes do mapa.
       'contain' é o que você tinha e garante que o mapa inteiro seja visível,
       mas mostra o "fundo branco" da imagem se ela tiver.
       Se o fundo branco da imagem for o problema, você precisará de uma imagem sem ele. */
    object-fit: contain; /* Se o problema é a borda branca da imagem, mantenha ou troque por 'fill' para ver a diferença */
    cursor: grab;
    user-select: none;
    transition: transform 0.3s ease-out;
    display: block;
  }

  /* Botões de zoom - lado direito, centralizado verticalmente */
  .zoom-buttons {
    position: absolute;
    top: 50%;
    right: 30px;
    transform: translateY(-50%);
    display: flex;
    flex-direction: column;
    gap: 20px;
    z-index: 10;
  }

  .zoom-btn {
    background: #007bff;
    border: none;
    color: white;
    font-size: 32px;
    width: 65px;
    height: 65px;
    border-radius: 50%;
    cursor: pointer;
    box-shadow: 0 4px 10px rgba(0,123,255,0.4);
    display: flex;
    justify-content: center;
    align-items: center;
    user-select: none;
    transition: background 0.2s ease, transform 0.2s ease, box-shadow 0.2s ease;
  }

  .zoom-btn:hover {
    background: #0056b3;
    transform: scale(1.08);
    box-shadow: 0 6px 15px rgba(0,123,255,0.6);
  }

  .zoom-btn:active {
    transform: scale(0.95);
    box-shadow: 0 2px 5px rgba(0,123,255,0.2);
  }

  #resetBtn {
    background: #28a745;
    font-size: 24px;
  }

  #resetBtn:hover {
    background: #218838;
  }
</style>
</head>
<body>
    <div id="menu">
      <map name="FPMap0">
        <area class="map-link" coords="6,3,118,24" shape="rect" data-map="mapa_1.JPG" alt="Localiza 1" />
        <area class="map-link" coords="127,5,242,23" shape="rect" data-map="mapa_2.JPG" alt="Localiza 2" />
        <area class="map-link" coords="251,4,391,23" shape="rect" data-map="mapa_3.JPG" alt="Localiza 3" />
        <area class="map-link" coords="403,4,543,22" shape="rect" data-map="mapa_4.JPG" alt="Localiza 4" />
      </map>
      <img
        src="../assets/images/localiza_mnu.png"
        width="600"
        height="30"
        usemap="#FPMap0"
        alt="Menu de localização" />
    </div>

    <div id="map-wrapper">
      <img
        id="zoomImg"
        src="../assets/images/mapa_1.JPG"
        alt="Mapa com zoom"
        draggable="false" />

      <div class="zoom-buttons">
        <button class="zoom-btn" id="zoomInBtn" aria-label="Aumentar zoom" title="AUMENTAR">+</button>
        <button class="zoom-btn" id="zoomOutBtn" aria-label="Diminuir zoom" title="DIMINUIR">−</button>
        <button class="zoom-btn" id="resetBtn" aria-label="Redefinir zoom" title="VOLTAR">&#x21BA;</button>
      </div>
    </div>

<script>
  const img = document.getElementById('zoomImg');
  const zoomInBtn = document.getElementById('zoomInBtn');
  const zoomOutBtn = document.getElementById('zoomOutBtn');
  const resetBtn = document.getElementById('resetBtn');
  const mapLinks = document.querySelectorAll('.map-link');

  let scale = 1;
  let posX = 0;
  let posY = 0;
  let isDragging = false;
  let startX, startY;

  function updateTransform() {
    img.style.transform = `translate(${posX}px, ${posY}px) scale(${scale})`;
  }

  function resetMap() {
    scale = 1;
    posX = 0;
    posY = 0;
    updateTransform();
    img.style.cursor = 'grab';
  }

  zoomInBtn.addEventListener('click', () => {
    scale += 0.2;
    updateTransform();
  });

  zoomOutBtn.addEventListener('click', () => {
    scale -= 0.2;
    if (scale < 0.1) scale = 0.1;
    updateTransform();
  });

  resetBtn.addEventListener('click', resetMap);

  img.addEventListener('mousedown', e => {
    if (scale <= 1) return;
    isDragging = true;
    startX = e.clientX - posX;
    startY = e.clientY - posY;
    img.style.cursor = 'grabbing';
  });

  window.addEventListener('mouseup', () => {
    isDragging = false;
    if (scale > 1) {
      img.style.cursor = 'grab';
    } else {
      img.style.cursor = 'default';
    }
  });

  window.addEventListener('mousemove', e => {
    if (!isDragging) return;
    posX = e.clientX - startX;
    posY = e.clientY - startY;
    updateTransform();
  });

  img.addEventListener('dragstart', e => e.preventDefault());

  if (scale <= 1) {
    img.style.cursor = 'default';
  }

  mapLinks.forEach(link => {
    link.addEventListener('click', (e) => {
      e.preventDefault();

      const mapFileName = link.dataset.map;
      img.src = `../assets/images/${mapFileName}`;
      resetMap();
    });
  });
</script>
</body>
</html>
