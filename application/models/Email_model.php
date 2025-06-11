<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Email_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->library('email');
        $this->config->load('email');
    }

    public function contato_cliente($nome, $email_cliente,
    $assunto_principal_email, $telefone_cliente, $cep_cliente, $uf_cliente, $cidade_cliente, $assunto_do_form, $mensagem_cliente) { // Novo parâmetro: $assunto_do_form
        // Carregar configurações SMTP do arquivo config/email.php
        //$nome,
        //$email,
        //$assunto_principal_email,
      //  $telefone,
        //$cep, // Adicione CEP
      //  $uf,   // Adicione UF
      //  $cidade, // Adicione Cidade
      //  $assunto_selecionado_do_form,
      //  $mensagem
        $config = array(
            'protocol'    => $this->config->item('protocol'),
            'smtp_host'   => $this->config->item('smtp_host'),
            'smtp_user'   => $this->config->item('smtp_user'),
            'smtp_pass'   => $this->config->item('smtp_pass'),
            'smtp_port'   => $this->config->item('smtp_port'),
            'smtp_crypto' => $this->config->item('smtp_crypto'),
            'mailtype'    => $this->config->item('mailtype'),
            'charset'     => $this->config->item('charset'),
            'wordwrap'    => $this->config->item('wordwrap'),
            'newline'     => $this->config->item('newline'),
        );

        $this->email->initialize($config);

        // Remetente e destinatários
        $smtp_user = $this->config->item('smtp_user');
        $this->email->from($smtp_user, 'IBCEL');
        $this->email->to('vendas@ibcel.com.br');
        $this->email->cc('celina_ibcel@yahoo.com.br');
        $this->email->bcc('alanmartins176@gmail.com');
        $this->email->reply_to($email_cliente, $nome);
        $this->email->subject($assunto_principal_email); // O assunto do e-mail permanece fixo

        // Corpo HTML do e-mail
        $corpo = '
        <!DOCTYPE html>
        <html>
        <head>
          <meta charset="utf-8">
          <title>' . htmlspecialchars($assunto_principal_email) . '</title>
        </head>
        <body style="margin:0; padding:0; font-family: Arial, sans-serif; background:#f4f6f8;">
          <table width="100%" cellpadding="0" cellspacing="0" style="background:#f4f6f8; padding:40px 0;">
            <tr>
              <td align="center">
                <table width="600" cellpadding="0" cellspacing="0" style="background:#ffffff; border-radius:8px; overflow:hidden; box-shadow:0 4px 12px rgba(0,0,0,0.1);">
                  <tr>
                    <td style="background:#003366; padding:20px; text-align:center;">
                      <h1 style="color:#ffd700; margin:0; font-size:24px;">IBCEL - CONTATO PELO SITE</h1>
                    </td>
                  </tr>
                  <tr>
                    <td style="padding:30px; color:#333333; font-size:16px; line-height:1.5;">
                      <p><strong>NOME:</strong> ' . htmlspecialchars($nome) . '</p>
                      <p><strong>E-MAIL DO CLIENTE:</strong> ' . htmlspecialchars($email_cliente) . '</p>
                      <p><strong>TELEFONE/WHATSAPP DO CLIENTE:</strong> ' . htmlspecialchars($telefone_cliente) . '</p>
                      <p><strong>CEP DO CLIENTE:</strong> ' . htmlspecialchars($cep_cliente) . '</p>
                      <p><strong>UF DO CLIENTE:</strong> ' . htmlspecialchars($uf_cliente) . '</p>
                      <p><strong>CIDADE DO CLIENTE:</strong> ' . htmlspecialchars($cidade_cliente) . '</p>
                      <p><strong>ASSUNTO:</strong> ' . htmlspecialchars($assunto_do_form) . '</p>
                      <p><strong>MENSAGEM:</strong></p>
                      <div style="padding:15px; background:#f0f4fa; border-left:4px solid #003366; margin:15px 0;">
                        ' . nl2br(htmlspecialchars($mensagem_cliente)) . '
                      </div>
                      <br>
                      <p>RESPONDER RAPIDAMENTE PARA GARANTIR UM EXCELENTE ATENDIMENTO!</p>
                     </td>
                  </tr>
                  <tr>
                    <td style="background:#e6eaf0; padding:20px; text-align:center;">
                      <a href="https://ibcel.com.br" style="display:inline-block; padding:12px 24px; background:#003366; color:#ffffff; text-decoration:none; border-radius:4px; font-weight:bold;">
                        VISITE NOSSO SITE
                      </a>
                    </td>
                  </tr>
                </table>
              </td>
            </tr>
          </table>
        </body>
        </html>';

        $this->email->message($corpo);

        // Enviar e-mail e retornar status
        if ($this->email->send()) {
            return true;
        } else {
            // Para depuração, retorna os erros (pode exibir na tela ou logar)
            return $this->email->print_debugger(['headers']);
        }
    }
}
