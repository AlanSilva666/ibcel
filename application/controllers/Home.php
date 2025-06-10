<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    // --- Mapeamento das suas páginas para o caminho dos arquivos de view ---
    // Use o 'view_file' para indicar o nome do arquivo da view correspondente.
    // O sistema tentará ler o conteúdo desses arquivos.
    // Certifique-se de que esses caminhos correspondem aos seus arquivos .php dentro de application/views/
    private $page_map = [
        'inicio' => [
            'titulo' => 'Página Inicial',
            'url' => 'index.php/home/inicio',
            'view_file' => 'home/inicio' // Ex: application/views/home/inicio.php
        ],
        'empresa' => [
            'titulo' => 'Sobre a Empresa',
            'url' => 'index.php/home/empresa',
            'view_file' => 'home/empresa' // Ex: application/views/home/empresa.php
        ],
        'produtos' => [
            'titulo' => 'Nossos Produtos',
            'url' => 'index.php/home/produtos',
            'view_file' => 'home/produtos' // Ex: application/views/home/produtos.php
        ],
        'colaboradores' => [
            'titulo' => 'Nossos Colaboradores',
            'url' => 'index.php/home/colaboradores',
            'view_file' => 'home/colaboradores' // Ex: application/views/home/colaboradores.php
        ],
        'contato' => [
            'titulo' => 'Fale Conosco',
            'url' => 'index.php/home/contato',
            'view_file' => 'home/contato' // Ex: application/views/home/contato.php
        ],
        'localizacao' => [
            'titulo' => 'Localização e Endereço',
            'url' => 'index.php/home/localizacao',
            'view_file' => 'home/localizacao' // Ex: application/views/home/localizacao.php
        ],
        'certificados' => [
            'titulo' => 'Certificados',
            'url' => 'index.php/home/certificados',
            'view_file' => 'home/certificados' // Ex: application/views/home/certificados.php
        ],
        'politicas' => [
            'titulo' => 'Políticas',
            'url' => 'index.php/home/politicas',
            'view_file' => 'home/politicas' // Ex: application/views/home/certificados.php
        ],
    ];
    // --- FIM DO MAPEAMENTO DAS PÁGINAS ---

    public function __construct() {
        parent::__construct();
        $this->load->library('session'); // Se não estiver no autoload
        $this->load->helper('url'); // Se não estiver no autoload
        $this->load->model('Email_model'); // Se não estiver no autoload
        $this->load->library('form_validation');
        //$this->config->load('email');
    }

    // --- Suas funções de carregamento de view existentes ---
    public function inicio() {
        $data['view_name'] = 'home/inicio';
        $this->load->view('templates/template', $data);
    }

    public function empresa() {
        $data['view_name'] = 'home/empresa';
        $this->load->view('templates/template', $data);
    }

    public function produtos() {
        $data['view_name'] = 'home/produtos';
        $this->load->view('templates/template', $data);
    }

    public function colaboradores() {
        $data['view_name'] = 'home/colaboradores';
        $this->load->view('templates/template', $data);
    }

    public function contato() {
        $this->load->helper('form');
        $data['sucesso'] = $this->session->flashdata('sucesso');
        $data['erro'] = $this->session->flashdata('erro');
        $data['view_name'] = 'home/contato';
        $this->load->view('templates/template', $data);
    }

    public function localizacao() {
        $data['view_name'] = 'home/localizacao';
        $this->load->view('templates/template', $data);
    }

    public function politicas() {
        $data['view_name'] = 'home/politicas';
        $this->load->view('templates/template', $data);
    }

    public function certificados() {
        $data['view_name'] = 'home/certificados';
        $this->load->view('templates/template', $data);
    }
    // --- Fim das funções de carregamento de view existentes ---


    // Lógica de Busca Dinâmica de Conteúdo
    // Esta seção é responsável por carregar o conteúdo das suas views e realizar a busca.
    public function busca() {
        $query = $this->input->get('q');
        $query_lower = strtolower($query);
        $resultados = [];

        if (!empty($query)) {
            // Percorre o mapeamento das suas páginas para obter o conteúdo dinamicamente
            foreach ($this->page_map as $page_key => $page_info) {
                // Tenta carregar o conteúdo da view e limpar as tags HTML
                $page_content = $this->getCleanPageContent($page_info['view_file']);
                $page_content_lower = strtolower($page_content);
                $page_title_lower = strtolower($page_info['titulo']);

                // Verifica se o termo de busca está presente no CONTEÚDO LIMPO OU no TÍTULO da página
                if (strpos($page_content_lower, $query_lower) !== false || strpos($page_title_lower, $query_lower) !== false) {
                    // Se encontrou a palavra, gera o trecho (snippet)
                    $snippet = $this->generateSnippet($page_content, $query);

                    // Adiciona o resultado encontrado
                    $resultados[] = [
                        'titulo' => $page_info['titulo'],
                        'url' => base_url($page_info['url']),
                        'snippet' => $snippet,
                    ];
                }
            }

            // --- Lógica para resultados específicos (como rodapé) que não têm uma view dedicada ---
            // Mantida para termos como 'redes sociais' ou 'email' que podem apontar para o rodapé.
            $footer_url = base_url('index.php/home/index') . '#footer';

            if ((strpos($query_lower, 'redes sociais') !== false || strpos($query_lower, 'instagram') !== false || strpos($query_lower, 'facebook') !== false) && !$this->isResultAlreadyAdded($resultados, 'Redes Sociais', $footer_url)) {
                $resultados[] = ['titulo' => 'Redes Sociais', 'url' => $footer_url, 'snippet' => 'Informações sobre nossas redes sociais você encontra no rodapé do site.'];
            }

            if (strpos($query_lower, 'email') !== false && !$this->isResultAlreadyAdded($resultados, 'Informações de contato (rodapé)', $footer_url)) {
                $found_email_in_content_page = false;
                foreach ($resultados as $res) {
                    // Verifica se 'email' já foi encontrado em alguma página de conteúdo (como contato)
                    if (strpos(strtolower($res['snippet']), $query_lower) !== false && $res['url'] === base_url('index.php/home/contato')) {
                        $found_email_in_content_page = true;
                        break;
                    }
                }
                if (!$found_email_in_content_page) {
                     $resultados[] = ['titulo' => 'Informações de contato (rodapé)', 'url' => $footer_url, 'snippet' => 'Para contato via email, verifique as informações no rodapé da página inicial.'];
                }
            }
        }

        $data['resultados'] = $resultados;
        $data['busca'] = $query;
        $data['view_name'] = 'home/busca_resultado';

        $this->load->view('templates/template', $data);
    }

    // Funções Auxiliares para Busca e Snippets
    // Estas funções ajudam a carregar o conteúdo das views e a formatar os resultados da busca.
    /**
     * Tenta ler o conteúdo de um arquivo de view PHP e retorna o texto limpo.
     * Esta função renderiza a view para capturar o output e depois remove as tags HTML.
     *
     * IMPORTANTE:
     * - Se suas views dependem de variáveis passadas pelo controller (ex: $data['foo']),
     * esta função pode falhar ou gerar avisos, pois ela carrega a view sem essas variáveis.
     * Para uma busca simples, pode funcionar, mas para views complexas pode ser um problema.
     * - O método `strip_tags()` é básico. Conteúdos complexos (scripts, estilos inline) podem
     * precisar de uma limpeza mais robusta se causarem problemas.
     * - Pode haver um impacto na performance para sites com muitas views ou views grandes,
     * pois cada uma é renderizada para memória a cada busca.
     *
     * @param string $view_file O caminho da view (ex: 'home/inicio').
     * @return string O conteúdo da view sem tags HTML. Retorna uma string vazia se o arquivo não for encontrado ou houver erro.
     */
    private function getCleanPageContent($view_file) {
        $content = '';
        // Constrói o caminho completo do arquivo da view
        $full_view_path = APPPATH . 'views/' . $view_file . '.php';

        if (!file_exists($full_view_path)) {
            error_log("Arquivo de view não encontrado para busca: " . $full_view_path);
            return ''; // Retorna vazio se o arquivo não existe
        }

        // Inicia a captura de saída (tudo que a view imprimiria)
        ob_start();
        try {
            // Inclui o arquivo da view. Isso executa o PHP dentro dela.
            // Atenção: A view não terá acesso às variáveis do controller ($this->data)
            // se elas não forem explicitamente definidas antes da inclusão.
            include $full_view_path;
            $content = ob_get_contents(); // Pega o conteúdo gerado pela view
        } catch (Throwable $e) { // Usar Throwable para pegar Exceptions e Errors (PHP 7+)
            error_log("Erro ao renderizar view para busca: " . $e->getMessage() . " - View: " . $view_file);
        }
        ob_end_clean(); // Limpa o buffer de saída

        // Remove tags HTML para obter apenas o texto puro.
        // Você pode ajustar as tags permitidas se precisar (ex: strip_tags($content, '<p><a>')).
        return strip_tags($content);
    }


    /**
     * Função auxiliar para verificar se um resultado específico já foi adicionado,
     * para evitar duplicações de links como os do rodapé.
     * @param array $results O array de resultados atuais.
     * @param string $title O título do resultado a ser verificado.
     * @param string $url A URL do resultado a ser verificada.
     * @return bool Retorna TRUE se o resultado já existe no array, FALSE caso contrário.
     */
    private function isResultAlreadyAdded($results, $title, $url) {
        foreach ($results as $res) {
            if ($res['titulo'] === $title && $res['url'] === $url) {
                return true;
            }
        }
        return false;
    }

    /**
     * Gera um trecho (snippet) do conteúdo ao redor da palavra-chave encontrada.
     * A palavra-chave será destacada em negrito no snippet.
     * @param string $content O conteúdo completo (já limpo de HTML) da página onde a busca ocorreu.
     * @param string $keyword A palavra-chave que foi buscada pelo usuário.
     * @param int $context_length O número de caracteres a serem mostrados antes e depois da palavra-chave no snippet.
     * @return string O snippet gerado, com a palavra-chave destacada e elipses se o texto foi cortado.
     */
    private function generateSnippet($content, $keyword, $context_length = 70) {
        $keyword_lower = strtolower($keyword);
        $content_lower = strtolower($content);

        $pos = strpos($content_lower, $keyword_lower);

        if ($pos === false) {
            // Se a palavra não for encontrada (improvável se chegou aqui), retorna o início do conteúdo.
            return substr($content, 0, $context_length * 2) . '...';
        }

        $start = max(0, $pos - $context_length);
        $end = min(strlen($content), $pos + strlen($keyword) + $context_length);

        $snippet = substr($content, $start, $end - $start);

        if ($start > 0) {
            $snippet = '...' . $snippet;
        }
        if ($end < strlen($content)) {
            $snippet = $snippet . '...';
        }

        // Destaca a palavra-chave no snippet usando str_ireplace (ignora maiúsculas/minúsculas ao substituir)
        $snippet = str_ireplace($keyword, '<strong>' . $keyword . '</strong>', $snippet);

        return $snippet;
    }


    // FUNÇÃO ENVIAR EMAIL
    public function enviar_contato() {
        // Carrega a biblioteca de validação (se ainda não estiver carregada no construtor)
        $this->load->library('form_validation');

        // Define as regras de validação (importante para que set_value funcione corretamente em caso de erro)
        $this->form_validation->set_rules('nome', 'Nome', 'required|min_length[2]|regex_match[/^[a-zA-Z\sçÇáàãâéèêíìóòõôúùûÁÀÃÂÉÈÊÍÌÓÒÕÔÚÙÛ]+$/]',
            array(
                'required'    => 'O campo %s é obrigatório.',
                'min_length'  => 'O campo %s deve ter no mínimo {param} caracteres.',
                'regex_match' => 'O campo %s não pode conter números ou caracteres especiais.'
            )
        );
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|min_length[11]',
            array(
                'required'    => 'O campo %s é obrigatório.',
                'valid_email' => 'Por favor, insira um endereço de %s válido.',
                'min_length'  => 'O campo %s deve ter no mínimo {param} caracteres.'
            )
        );
        $this->form_validation->set_rules('telefone', 'Telefone/WhatsApp', 'required|min_length[10]');
        $this->form_validation->set_rules('cep', 'CEP', 'required|exact_length[9]'); // Se você já tem a validação de máscara no JS
        $this->form_validation->set_rules('assunto1', 'Assunto', 'required');
        $this->form_validation->set_rules('mensagem', 'Mensagem', 'required|min_length[2]');
        // Adicione validação para UF e Cidade se achar necessário no backend, embora o readonly no front já ajude.
        // $this->form_validation->set_rules('uf', 'UF', 'required');
        // $this->form_validation->set_rules('cidade', 'Cidade', 'required');


        if ($this->form_validation->run() == FALSE) {
            // Se a validação FALHAR, carregamos a view com os dados do POST
            // para que o usuário não perca o que digitou.
            $data['mensagem_tipo'] = 'error';
            $data['mensagem_texto'] = validation_errors('<li>','</li>'); // Pega os erros de validação formatados

            // NOTA: Como há erros, os campos serão preenchidos via set_value()
            // com os dados do POST, que é o comportamento desejado aqui.

        } else {
            // A validação foi um sucesso, agora tentamos enviar o e-mail
            $nome = $this->input->post('nome', true);
            $email = $this->input->post('email', true);
            $assunto_principal_email = 'CONTATO PELO SITE'; // Assunto da linha de assunto do e-mail
            $telefone = $this->input->post('telefone', true);
            $cep = $this->input->post('cep', true); // Capture CEP
            $uf = $this->input->post('uf', true);   // Capture UF
            $cidade = $this->input->post('cidade', true); // Capture Cidade
            $assunto_selecionado_do_form = $this->input->post('assunto1', true); // Assunto que aparecerá no corpo do e-mail
            $mensagem = $this->input->post('mensagem', true);

            $this->load->model('Email_model');

            $resultado = $this->Email_model->contato_cliente(
                $nome,
                $email,
                $assunto_principal_email,
                $telefone,
                $cep, // Adicione CEP
                $uf,   // Adicione UF
                $cidade, // Adicione Cidade
                $assunto_selecionado_do_form,
                $mensagem
            );

            // Inicializa as variáveis para a view (mesmo que já tenham sido definidas em caso de erro de validação)
            $data['mensagem_tipo'] = '';
            $data['mensagem_texto'] = '';

            if ($resultado === true) {
                $this->session->set_flashdata('sucesso', 'MENSAGEM ENVIADA COM SUCESSO!');
                $data['mensagem_tipo'] = 'success';
                $data['mensagem_texto'] = 'MENSAGEM ENVIADA COM SUCESSO!';

                // *** AQUI É A GRANDE MUDANÇA! ***
                // Se o e-mail foi enviado com SUCESSO,
                // removemos os dados do POST para que set_value() não os encontre.
                $_POST = array(); // Limpa a superglobal $_POST
                // Também é uma boa prática remover dados antigos da validação, se houver
                $this->form_validation->reset_validation();


            } else {
                $this->session->set_flashdata('erro', "ERRO AO ENVIAR MENSAGEM.<br>TENTE NOVAMENTE: " . $resultado);
                $data['mensagem_tipo'] = 'error';
                $data['mensagem_texto'] = "ERRO AO ENVIAR MENSAGEM.<br>TENTE NOVAMENTE: " . $resultado;

                // Em caso de erro no envio do e-mail, os dados do POST DEVEM PERMANECER
                // para que o usuário não perca o que digitou.
            }
        }

        // Finalmente, carrega a view com os dados (ou a ausência deles se for sucesso)
        $data['view_name'] = 'home/contato'; // Certifique-se que 'home/contato' é o caminho correto para sua view
        $this->load->view('templates/template', $data);
    }
}
