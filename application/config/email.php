<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$config['protocol']    = 'smtp';
$config['smtp_host']   = 'smtps.uhserver.com';
$config['smtp_user']   = 'vendas@ibcel.com.br';
$config['smtp_pass']   = 'Sib142vd2025@'; // Lembre-se de colocar a senha de aplicativo real
$config['smtp_port']   = 465;
$config['smtp_crypto'] = 'ssl'; // ALTERADO: Para a porta 465, use 'ssl'
$config['mailtype']    = 'html';
$config['charset']     = 'utf-8';
$config['wordwrap']    = TRUE;
$config['newline']     = "\r\n";
