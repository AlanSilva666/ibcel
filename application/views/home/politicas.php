<div class="container" style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; color: #333; background-color: #f8fbfd; padding: 20px; border-radius: 10px; box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);">

    <div class="card" style="background-color: #ffffff; border: 1px solid #0056b3; border-radius: 10px; padding: 25px; margin-bottom: 40px; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08); transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;">
        <h3 style="text-align: center; color: #0056b3; font-size: 2.2em; margin-bottom: 20px; text-transform: uppercase; letter-spacing: 1.5px; border-bottom: 2px solid #0056b3; padding-bottom: 10px;">Política da Qualidade</h3>
        <p style="text-align: justify; line-height: 1.8; font-size: 1.1em; padding: 0 15px; color: #555;">
            <div style="text-align: center; margin-bottom: 20px;"> <img src="../assets/images/compromisso_politica1.jpg" alt="Imagem de Compromisso" style="max-width: 55%; height: auto; border-radius: 8px; box-shadow: 0 2px 8px rgba(0, 0, 0, 0.15);">
            </div>
            <p style="font-weight: bold">COMPROMISSO:</p>
            A IBCEL tem como objetivo primordial atender às necessidades dos Clientes, buscando incessantemente superar suas expectativas. Isso é alcançado através da melhoria contínua dos nossos processos internos, do desenvolvimento profissional constante dos nossos Colaboradores e da qualificação plena dos nossos Fornecedores. Nosso propósito é criar valor sustentável para Clientes, Fornecedores e Colaboradores.
        </p>
    </div>

    <div class="mvv-section" style="display: flex; justify-content: space-around; flex-wrap: wrap; gap: 30px; align-items: stretch;">
        <div class="card" style="flex: 1; min-width: 290px; max-width: 32%; background-color: #ffffff; border: 1px solid #007bff; border-radius: 10px; padding: 30px; box-shadow: 0 6px 15px rgba(0,0,0,0.1); text-align: center; transition: transform 0.3s ease-in-out; display: flex; flex-direction: column; justify-content: flex-start;">
            <h4 style="color: #007bff; font-size: 1.8em; margin-bottom: 15px; text-transform: uppercase;">Missão</h4>
            <br>
            <div style="height: 120px; display: flex; align-items: center; justify-content: center; margin-bottom: 15px;">
                <img src="../assets/images/cabo_flat_politica1.jpg" alt="Ícone Missão" style="width: 150px; height: 150px; object-fit: contain;">
                </div>
            <br>
            <p style="line-height: 1.7; font-size: 1em; flex-grow: 1; display: flex; align-items: flex-start;">
                A IBCEL tem por Missão a fabricação e comercialização de condutores elétricos, atuando de forma rentável neste mercado, promovendo a satisfação plena dos clientes, colaboradores, fornecedores e sociedade no todo.
            </p>
        </div>

        <div class="card" style="flex: 1; min-width: 290px; max-width: 32%; background-color: #ffffff; border: 1px solid #007bff; border-radius: 10px; padding: 30px; box-shadow: 0 6px 15px rgba(0,0,0,0.1); text-align: center; transition: transform 0.3s ease-in-out; display: flex; flex-direction: column; justify-content: flex-start;">
            <h4 style="color: #007bff; font-size: 1.8em; margin-bottom: 15px; text-transform: uppercase;">Visão</h4>
            <br>
            <div style="height: 120px; display: flex; align-items: center; justify-content: center; margin-bottom: 15px;">
                <img src="../assets/images/cabo_termometria_politica1.jpg" alt="Ícone Visão" style="width: 150px; height: 150px; object-fit: contain;">
                </div>
            <br>
            <p style="line-height: 1.7; font-size: 1em; flex-grow: 1; display: flex; align-items: flex-start;">
                Ser uma empresa competitiva e de crescimento contínuo no mercado do segmento de condutores elétricos especiais, aliando tecnologia, pontualidade e qualidade para a satisfação plena dos clientes e dos colaboradores.
            </p>
        </div>

        <div class="card" style="flex: 1; min-width: 290px; max-width: 32%; background-color: #ffffff; border: 1px solid #007bff; border-radius: 10px; padding: 30px; box-shadow: 0 6px 15px rgba(0,0,0,0.1); text-align: center; transition: transform 0.3s ease-in-out; display: flex; flex-direction: column; justify-content: flex-start;">
            <h4 style="color: #007bff; font-size: 1.8em; margin-bottom: 15px; text-transform: uppercase;">Valores</h4>
            <br>
            <div style="height: 120px; display: flex; align-items: center; justify-content: center; margin-bottom: 15px;">
                <img src="../assets/images/cabo_rca_politica1.jpg" alt="Ícone Valores" style="width: 150px; height: 150px; object-fit: contain;">
                </div>
            <br>
            <p style="line-height: 1.7; font-size: 1em; flex-grow: 1; display: flex; align-items: flex-start;">
                Cremos:
                <br>
                Na Geração de lucro como forma de perpetuação do negócio.
                <br>
                No trabalho como única forma de desenvolvimento.
                <br>
                Na disciplina e no respeito mútuo.
                <br>
                Na honestidade e na ética.
            </p>
        </div>

    </div>

    <script>
        function linkinforma(url) {
            window.open(url, "informa", "height=600,width=800,left=110,top=80,scrollbars=yes,resizable=no");
        }

        // Add hover effect to cards
        const cards = document.querySelectorAll('.card');
        cards.forEach(card => {
            card.addEventListener('mouseenter', () => {
                card.style.transform = 'scale(1.03)';
                card.style.boxShadow = '0 8px 20px rgba(0,0,0,0.2)';
            });
            card.addEventListener('mouseleave', () => {
                card.style.transform = 'scale(1)';
                // Verifica qual card é para aplicar a sombra original correta
                if (card.querySelector('h3')) { // É o card da Política da Qualidade
                    card.style.boxShadow = '0 4px 12px rgba(0, 0, 0, 0.08)';
                } else { // São os cards de MVV
                    card.style.boxShadow = '0 6px 15px rgba(0,0,0,0.1)';
                }
            });
        });
    </script>
</div>
