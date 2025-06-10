<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fale Conosco - IBCEL</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
    integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body {
            background: linear-gradient(135deg, #e0f7fa, #e3f2fd);
            font-family: 'Segoe UI', sans-serif;
            padding-top: 0px;
        }

        /* NOVO ESTILO: Para a mensagem de flash fixa no topo */
        .alert-fixed-top {
            position: fixed;
            top: 60px;
            left: 0;
            width: 100%;
            z-index: 9999;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            border-radius: 0;
            padding: 15px;
            box-sizing: border-box;
            text-align: center;
            opacity: 1;
            transition: opacity 0.5s ease, top 0.5s ease;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .alert-fixed-top .icon-check {
            width: 24px;
            height: 24px;
            margin-right: 10px;
            fill: currentColor;
        }

        .form-container {
            max-width: 800px;
            margin: 3rem auto;
            background: #ffffff;
            border-radius: 16px;
            border: 2px solid #1e88e5;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.15);
            padding: 2rem 3rem;
            font-family: 'Segoe UI', sans-serif;
            position: relative;
            z-index: 1;
        }

        .form-container h2 {
            text-align: center;
            color: #0d47a1;
            margin-bottom: 1rem;
            font-size: 2.5rem;
        }

        .form-container p {
            text-align: center;
            color: #555;
            margin-bottom: 2.5rem;
            font-size: 1.1rem;
        }

        .form-group {
            margin-bottom: 2rem;
            position: relative; /* Adicionado para posicionamento da mensagem de erro */
        }

        .form-group label {
            display: block;
            margin-bottom: 0.6rem;
            color: #0d47a1;
            font-weight: 600;
            font-size: 1rem;
        }

        .form-group input:focus,
        .form-group textarea:focus,
        .form-group select:focus {
            border-color: #1565c0;
            background-color: #ffffff;
            box-shadow: 0 0 0 3px rgba(21, 101, 192, 0.1);
            outline: none;
        }

        .form-group input,
        .form-group textarea,
        .form-group select {
            width: 100%;
            padding: 12px 16px;
            border-radius: 10px;
            border: 2px solid #1e88e5;
            background-color: #f9f9f9;
            font-size: 16px;
            box-sizing: border-box;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05);
            transition: 0.3s border, 0.3s box-shadow, 0.3s background-color;
        }

        /* NEW: Styles for disabled/readonly fields */
        .form-group input[readonly],
        .form-group select[readonly] {
            background-color: #e0e0e0; /* Light gray background */
            cursor: not-allowed; /* Prohibited symbol */
        }

        .form-group input[readonly]:hover,
        .form-group select[readonly]:hover {
            cursor: not-allowed; /* Ensure the symbol persists on hover */
        }

        /* NOVO ESTILO: Para a mensagem de erro individual do campo */
        .error-message {
            color: #d32f2f; /* Um vermelho mais vibrante */
            font-size: 0.85rem;
            margin-top: 0.5rem;
            display: block; /* Garante que fique em uma nova linha */
            font-weight: 500;
        }

        /* NOVO ESTILO: Borda vermelha para campos inválidos */
        .form-group input.invalid,
        .form-group textarea.invalid,
        .form-group select.invalid {
            border-color: #d32f2f !important; /* Vermelho forte para o erro */
            box-shadow: 0 0 0 3px rgba(211, 47, 47, 0.1); /* Sombra avermelhada */
        }

        .btn-submit {
            display: block;
            width: 100%;
            padding: 16px;
            background: linear-gradient(to right, #42a5f5, #1e88e5);
            color: #fff;
            border: none;
            border-radius: 12px;
            font-size: 18px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s;
        }

        .btn-submit:hover {
            background: linear-gradient(to right, #1e88e5, #1565c0);
        }

        /* NEW: Style for disabled submit button */
        .btn-submit:disabled {
            background: #8e8e8e; /* Um cinza mais escuro */
            cursor: not-allowed;
            opacity: 0.8; /* Mantemos um pouco de opacidade para indicar desabilitado */
            box-shadow: none; /* Remove a sombra quando desabilitado, se houver */
        }

        /* Opcional: Para garantir que o hover não mude a cor se estiver desabilitado */
        .btn-submit:disabled:hover {
            background: #8e8e8e; /* Mantém a mesma cor no hover quando desabilitado */
            cursor: not-allowed;
        }

        .contato-info {
            margin-top: 2.5rem;
            padding: 2rem 2.5rem;
            background: #ffffff;
            border: 2px solid #1e88e5;
            border-radius: 16px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.06);
            text-align: center;
            font-family: 'Segoe UI', sans-serif;
        }

        .contato-info h3 {
            color: #1e3a5f;
            font-size: 1.6rem;
            margin-bottom: 1rem;
        }

        .contato-info p {
            color: #555;
            font-size: 16px;
            margin: 0.5rem 0;
        }

        .contato-info strong {
            color: #1e3a5f;
        }

        .whatsapp-link {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            margin-top: 2rem;
            text-decoration: none;
            background-color: #25D366;
            color: white;
            padding: 12px 24px;
            border-radius: 50px;
            font-weight: bold;
            font-size: 16px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
            transition: 0.3s;
        }

        .whatsapp-link img {
            width: 24px;
            height: 24px;
            margin-right: 10px;
        }

        .whatsapp-link:hover {
            background-color: #1ebe5d;
        }

        .alert {
            padding: 16px;
            margin-bottom: 0;
            border-radius: 8px;
            font-weight: bold;
            font-size: 1rem;
        }

        .alert-success {
            background-color: #4CAF50;
            color: white;
        }

        .alert-error {
            background-color: #F44336;
            color: white;
        }

        .info-box {
            background-color: #e8f7ff;
            padding: 20px 25px;
            border-left: 6px solid #007bff;
            border-radius: 8px;
            font-size: 1.05em;
            line-height: 1.6;
            color: #333;
            display: flex;
            align-items: center;
            gap: 15px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 25px;
        }

        .info-box .info-icon {
            color: #007bff;
            font-size: 1.8em;
            flex-shrink: 0;
        }

        .info-box p {
            margin: 0;
            color: #444;
        }
    </style>
</head>
<body>

<?php
// Lógica para determinar qual mensagem exibir
$mensagemExibida = '';
$tipoMensagem = '';
$limparFormulario = false;

if (isset($mensagem_tipo) && isset($mensagem_texto) && !empty($mensagem_texto)) {
    $tipoMensagem = $mensagem_tipo;
    $mensagemExibida = $mensagem_texto;
    if ($tipoMensagem == 'success') {
        $limparFormulario = true;
    }
} else if ($this->session->flashdata('sucesso')) {
    $tipoMensagem = 'success';
    $mensagemExibida = $this->session->flashdata('sucesso');
    $limparFormulario = true;
} else if ($this->session->flashdata('erro')) {
    $tipoMensagem = 'error';
    $mensagemExibida = $this->session->flashdata('erro');
}

if (!empty($mensagemExibida)):
?>
    <div class="alert-fixed-top alert <?= $tipoMensagem == 'success' ? 'alert-success' : 'alert-error' ?>" id="flash-message">
        <?php if ($tipoMensagem == 'success'): ?>
            <svg class="icon-check" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41L9 16.17z"/>
            </svg>
        <?php endif; ?>
        <?= $mensagemExibida ?>
    </div>
<?php endif; ?>

<section class="form-container">
    <h2>FALE CONOSCO</h2>
    <p>PREENCHA O FORMULÁRIO ABAIXO E RETORNAREMOS O MAIS BREVE POSSÍVEL.</p>

    <form id="formContato" action="<?= base_url('index.php/home/enviar_contato') ?>" method="POST">
      <div class="form-group">
          <label for="nome">NOME:</label>
          <input type="text" id="nome" name="nome" value="<?= set_value('nome') ?>"
          required placeholder="SEU NOME" minlength="3"
          pattern="[a-zA-Z\s]*" title="Apenas letras e espaços são permitidos"
          oninput="this.value = this.value.replace(/[^a-zA-Z\sçÇáàãâéèêíìóòõôúùûÁÀÃÂÉÈÊÍÌÓÒÕÔÚÙÛ\s]/g, '');"
          aria-required="true" aria-describedby="nome-error">
          <span id="nome-error" class="error-message" aria-live="polite"></span>
      </div>
        <div class="form-group">
            <label for="email">EMAIL:</label>
            <input type="email" id="email" name="email" value="<?= set_value('email') ?>"
            required placeholder="SEU EMAIL" minlength="11"
            aria-required="true" aria-describedby="email-error">
            <span id="email-error" class="error-message" aria-live="polite"></span>
        </div>
        <div class="form-group">
            <label for="telefone">TELEFONE/WHATSAPP:</label>
            <input type="text" id="telefone" name="telefone" value="<?= set_value('telefone') ?>"
            required placeholder="SEU TELEFONE/WHATSAPP"
            aria-required="true" aria-describedby="telefone-error">
            <span id="telefone-error" class="error-message" aria-live="polite"></span>
        </div>
        <div class="form-group">
            <label for="cep">CEP:</label>
            <input type="text" id="cep" name="cep" value="<?= set_value('cep') ?>"
            required placeholder="SEU CEP"
            aria-required="true" aria-describedby="cep-error">
            <span id="cep-error" class="error-message" aria-live="polite"></span>
        </div>
        <div class="form-group">
            <label for="uf">UF:</label>
            <input type="text" id="uf" name="uf" value="<?= set_value('uf') ?>"
            readonly placeholder="ESTADO" title="ESTE CAMPO É PREENCHIDO AUTOMATICAMENTE PELO CEP"
            aria-readonly="true" aria-describedby="uf-error">
            <span id="uf-error" class="error-message" aria-live="polite"></span>
        </div>
        <div class="form-group">
            <label for="cidade">CIDADE:</label>
            <input type="text" id="cidade" name="cidade" value="<?= set_value('cidade') ?>"
            readonly placeholder="CIDADE" title="ESTE CAMPO É PREENCHIDO AUTOMATICAMENTE PELO CEP"
            aria-readonly="true" aria-describedby="cidade-error">
            <span id="cidade-error" class="error-message" aria-live="polite"></span>
        </div>
        <div class="form-group">
            <label for="assunto1">ASSUNTO:</label>
            <select id="assunto1" name="assunto1" required
            aria-required="true" aria-describedby="assunto-error">
                <option value="" disabled selected>SELECIONE O ASSUNTO</option>
                <option value="DÚVIDAS GERAIS">DÚVIDAS GERAIS</option>
                <option value="SOLICITAÇÃO DE ORÇAMENTO">SOLICITAÇÃO DE ORÇAMENTO</option>
                <option value="SUPORTE TÉCNICO">SUPORTE TÉCNICO</option>
                <option value="PROPOSTA DE PARCERIA">PROPOSTA DE PARCERIA</option>
                <option value="OUTROS">OUTROS</option>
            </select>
            <span id="assunto-error" class="error-message" aria-live="polite"></span>
        </div>
        <div class="form-group">
            <label for="mensagem">MENSAGEM:</label>
            <textarea id="mensagem" name="mensagem" rows="5" required placeholder="DIGITE SUA MENSAGEM AQUI..."
            aria-required="true" aria-describedby="mensagem-error"><?= set_value('mensagem') ?></textarea>
            <span id="mensagem-error" class="error-message" aria-live="polite"></span>
        </div>
        <button type="submit" class="btn-submit" id="btnSubmit" disabled>
            <i class="fa-solid fa-envelope" style="margin-right: 8px;"></i> ENVIAR MENSAGEM
        </button><BR>
        <div class="info-box">
            <i class="fas fa-info-circle info-icon"></i> <p>
              SUA MENSAGEM SERÁ ENVIADA DIRETAMENTE PARA NOSSA EQUIPE TÉCNICA E COMERCIAL.<BR>
              FIQUE TRANQUILO, RESPONDEREMOS O MAIS BREVE POSSÍVEL!
            </p>
        </div>
    </form>

    <div class="contato-info">
        <h3>INFORMAÇÕES DE CONTATO</h3>
        <p><strong>ENDEREÇO:</strong> AV. ALBERTO VIEIRA ROLMÃO, 245 - ALFENAS/MG</p>
        <p><strong>TELEFONE/WHATSAPP:</strong> (35) 98416-0634 | (35) 98416-5387</p>
        <p><strong>EMAILS:</strong> vendas@ibcel.com.br | celina_ibcel@yahoo.com.br</p>

        <a href="https://wa.me/5535984160634" target="_blank" class="whatsapp-link">
            <img src="https://cdn-icons-png.flaticon.com/512/733/733585.png" alt="WhatsApp">
            FALE CONOSCO NO WHATSAPP
        </a>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('formContato');
    const btnSubmit = document.getElementById('btnSubmit');
    const nomeInput = document.getElementById('nome');
    const emailInput = document.getElementById('email');
    const telefoneInput = document.getElementById('telefone');
    const cepInput = document.getElementById('cep');
    const ufInput = document.getElementById('uf');
    const cidadeInput = document.getElementById('cidade');
    const assuntoSelect = document.getElementById('assunto1');
    const mensagemTextarea = document.getElementById('mensagem');

    // Adicionar máscaras
    $('#telefone').mask('(00) 00000-0000');
    $('#cep').mask('00000-000');

    const limparFormulario = <?= json_encode($limparFormulario); ?>;

    // Objeto para rastrear se um campo já foi 'tocado' ou teve seu 'blur' acionado
    const touchedFields = {};

    /**
     * Exibe ou remove uma mensagem de erro para um campo.
     * @param {HTMLElement} inputElement O elemento de input (ou select, textarea).
     * @param {string} message A mensagem de erro a ser exibida. Vazia para remover o erro.
     */
    function showValidationError(inputElement, message) {
        const errorElementId = inputElement.id + '-error';
        let errorElement = document.getElementById(errorElementId);

        if (!errorElement) {
            errorElement = document.createElement('span');
            errorElement.id = errorElementId;
            errorElement.classList.add('error-message');
            errorElement.setAttribute('aria-live', 'polite');
            inputElement.parentNode.appendChild(errorElement);
        }

        errorElement.textContent = message;
        if (message) {
            inputElement.classList.add('invalid');
            inputElement.setAttribute('aria-invalid', 'true');
        } else {
            inputElement.classList.remove('invalid');
            inputElement.setAttribute('aria-invalid', 'false');
        }
    }

    /**
     * Valida um campo individualmente e retorna a mensagem de erro, se houver.
     * Não exibe o erro diretamente, apenas o retorna.
     * @param {HTMLElement} inputElement O elemento de input a ser validado.
     * @returns {string} A mensagem de erro, ou uma string vazia se válido.
     */
    function getValidationErrorMessage(inputElement) {
        const value = inputElement.value.trim();
        let errorMessage = '';

        // Campos UF e Cidade são readonly e não devem ser validados como os outros
        if (inputElement.id === 'uf' || inputElement.id === 'cidade') {
            return ''; // Sempre válido para fins desta função, seu valor é preenchido via API
        }

        switch (inputElement.id) {
            case 'nome':
                if (value.length < 2) {
                    errorMessage = 'O CAMPO NOME DEVE TER NO MÍNIMO 2 CARACTERES.';
                } else if (!/^[a-zA-Z\sçÇáàãâéèêíìóòõôúùûÁÀÃÂÉÈÊÍÌÓÒÕÔÚÙÛ]+$/.test(value)) {
                    errorMessage = 'O CAMPO NOME NÃO PODE CONTER NÚMEROS OU CARACTERES ESPECIAIS.';
                }
                break;
            case 'email':
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (!emailRegex.test(value)) {
                    errorMessage = 'POR FAVOR, INSIRA UM ENDEREÇO DE EMAIL VÁLIDO.';
                } else if (value.length < 11) {
                    errorMessage = 'O CAMPO EMAIL DEVE TER NO MÍNIMO 11 CARACTERES.';
                }
                break;
            case 'telefone':
                if (value.replace(/\D/g, '').length < 10) {
                    errorMessage = 'POR FAVOR, INSIRA UM TELEFONE VÁLIDO (DDD + NÚMERO).';
                }
                break;
            case 'cep':
                // A validação completa do CEP (com API) acontece no blur.
                // Aqui, apenas a validação de formato e comprimento.
                if (value.replace(/\D/g, '').length !== 8) {
                    errorMessage = 'POR FAVOR, INSIRA UM CEP VÁLIDO COM 8 DÍGITOS.';
                }
                // IMPORTANTE: A mensagem específica de "CEP não encontrado" ou "Erro ao buscar"
                // é definida exclusivamente no listener 'blur' do CEP.
                break;
            case 'assunto1':
                if (value === "") {
                    errorMessage = 'POR FAVOR, SELECIONE UM ASSUNTO.';
                }
                break;
            case 'mensagem':
                if (value.length < 2) {
                    errorMessage = 'O CAMPO MENSAGEM DEVE TER NO MÍNIMO 2 CARACTERES.';
                }
                break;
        }
        return errorMessage;
    }

    /**
     * Valida um campo e exibe a mensagem de erro se o campo já foi tocado.
     * Usado por listeners de 'input' e 'blur'.
     * @param {HTMLElement} inputElement
     */
    function validateAndShowError(inputElement) {
        const errorMessage = getValidationErrorMessage(inputElement);
        // Exibe o erro SOMENTE se o campo já foi "tocado" ou se há uma mensagem
        // Ou se o campo não é o CEP (CEP tem tratamento especial no blur)
        if (touchedFields[inputElement.id] || errorMessage || inputElement.id === 'cep') {
             showValidationError(inputElement, errorMessage);
        }
    }


    /**
     * Valida todos os campos do formulário para determinar o estado do botão de submit.
     * Não deve exibir mensagens de erro, apenas retornar a validade geral.
     * @returns {boolean} True se todos os campos são válidos, false caso contrário.
     */
    function validateAllFieldsForSubmit() {
        let allValid = true;
        const fields = [
            nomeInput, emailInput, telefoneInput, cepInput, assuntoSelect, mensagemTextarea
        ];

        fields.forEach(field => {
            const errorMessage = getValidationErrorMessage(field);
            if (errorMessage) {
                allValid = false;
            }
        });

        // Validação específica para CEP, UF e Cidade
        const cepValue = cepInput.value.replace(/\D/g, '');
        if (cepValue.length !== 8 || !ufInput.value.trim() || !cidadeInput.value.trim()) {
            allValid = false;
        }

        return allValid;
    }

    /**
     * Atualiza o estado do botão de submit (habilitado/desabilitado).
     */
    function updateSubmitButtonState() {
        btnSubmit.disabled = !validateAllFieldsForSubmit();
    }

    // --- Adicionar listeners de eventos para validação em tempo real ---

    // Listener para campos de texto e select
    const textAndSelectFields = [
        nomeInput, emailInput, telefoneInput, assuntoSelect, mensagemTextarea
    ];

    textAndSelectFields.forEach(field => {
        field.addEventListener('input', () => {
            // Limpa o erro se o usuário está digitando e o campo se torna válido
            if (field.id === 'nome') {
                field.value = field.value.replace(/[^a-zA-Z\sçÇáàãâéèêíìóòõôúùûÁÀÃÂÉÈÊÍÌÓÒÕÔÚÙÛ]/g, '');
            }
            if (touchedFields[field.id]) { // Só mostra erro se já foi tocado
                validateAndShowError(field);
            } else {
                 showValidationError(field, ''); // Garante que o erro esteja limpo antes de tocar
            }
            updateSubmitButtonState();
        });

        field.addEventListener('blur', () => {
            touchedFields[field.id] = true; // Marca o campo como "tocado"
            validateAndShowError(field); // Valida e mostra erro ao sair
            updateSubmitButtonState();
        });
    });

    // Listener para o campo CEP - TEM LÓGICA PRÓPRIA POR CAUSA DA API
    cepInput.addEventListener('input', () => {
        // Limpa erros e campos de endereço enquanto o CEP é modificado
        showValidationError(cepInput, ''); // Limpa imediatamente o erro do CEP
        ufInput.value = '';
        cidadeInput.value = '';
        touchedFields['cep'] = false; // Reset touched state for CEP during input
        updateSubmitButtonState();
    });

    cepInput.addEventListener('blur', function() {
        touchedFields['cep'] = true; // Marca o CEP como "tocado" ao sair
        const cep = cepInput.value.replace(/\D/g, ''); // Remove non-digits

        if (cep.length === 8) {
            fetch(`https://viacep.com.br/ws/${cep}/json/`)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Erro de rede ou servidor da API.');
                    }
                    return response.json();
                })
                .then(data => {
                    if (!data.erro) {
                        ufInput.value = data.uf;
                        cidadeInput.value = data.localidade;
                        showValidationError(cepInput, ''); // Limpa a mensagem de erro do CEP
                    } else {
                        ufInput.value = '';
                        cidadeInput.value = '';
                        showValidationError(cepInput, 'CEP NÃO ENCONTRADO. POR FAVOR, VERIFIQUE O CEP DIGITADO.');
                    }
                })
                .catch(error => {
                    console.error('Erro ao buscar CEP:', error);
                    ufInput.value = '';
                    cidadeInput.value = '';
                    showValidationError(cepInput, 'ERRO AO BUSCAR O CEP. VERIFIQUE SUA CONEXÃO OU TENTE NOVAMENTE MAIS TARDE.');
                })
                .finally(() => {
                    updateSubmitButtonState();
                });
        } else if (cep.length > 0 && cep.length < 8) {
            showValidationError(cepInput, 'O CEP DEVE CONTER 8 DÍGITOS.');
            ufInput.value = '';
            cidadeInput.value = '';
            updateSubmitButtonState();
        } else {
            // Campo vazio, limpa o erro e os campos de endereço
            showValidationError(cepInput, '');
            ufInput.value = '';
            cidadeInput.value = '';
            updateSubmitButtonState();
        }
    });

    // Limpeza do formulário se for sucesso (vindo do PHP)
    if (limparFormulario) {
        form.reset();
        // Limpa todas as mensagens de erro visíveis e o estado 'touched'
        setTimeout(() => {
            const allInputs = form.querySelectorAll('input, select, textarea');
            allInputs.forEach(input => {
                showValidationError(input, '');
                touchedFields[input.id] = false; // Reseta o estado 'tocado'
            });
            ufInput.value = '';
            cidadeInput.value = '';
            updateSubmitButtonState();
        }, 50);
    }

    // Script para desaparecer a mensagem de flash (alerta geral do PHP)
    setTimeout(function () {
        var flashMessage = document.getElementById('flash-message');
        if (flashMessage) {
            flashMessage.style.transition = "opacity 0.5s ease, top 0.5s ease";
            flashMessage.style.opacity = 0;
            flashMessage.style.top = '-60px';
            setTimeout(function () {
                flashMessage.remove();
            }, 500);
        }
    }, 10000); // 10 segundos

    // Inicializa o estado do botão de submit ao carregar a página
    // Não valida os campos visualmente aqui, apenas o botão
    updateSubmitButtonState();

    // Adicionar listener de submit (agora que a validação é feita antes)
    form.addEventListener('submit', function (e) {
        // Ao tentar submeter, marque TODOS os campos como "tocados" e os valide
        const allFormFields = [
            nomeInput, emailInput, telefoneInput, cepInput, assuntoSelect, mensagemTextarea
        ];
        allFormFields.forEach(field => {
            touchedFields[field.id] = true;
            validateAndShowError(field);
        });

        // E também forçar a validação do CEP no submit, caso o blur não tenha sido ativado
        const cepValue = cepInput.value.replace(/\D/g, '');
        if (cepValue.length === 8 && (!ufInput.value.trim() || !cidadeInput.value.trim())) {
            // Se o CEP está completo mas UF/Cidade não foram preenchidos (indica API falhou ou CEP inexistente)
            // Simula o blur para reativar a busca/erro do CEP
            cepInput.dispatchEvent(new Event('blur'));
        }


        if (!validateAllFieldsForSubmit()) {
            e.preventDefault(); // Impede o envio se houver erros
            const firstInvalidField = document.querySelector('.invalid');
            if (firstInvalidField) {
                firstInvalidField.scrollIntoView({ behavior: 'smooth', block: 'center' });
                firstInvalidField.focus();
            }
        }
    });
});
</script>
</body>
</html>
