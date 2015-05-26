<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

/* * ******************************************************
 *                                                      *
 *        FUNÇÕES DO PAINEL DE ADMINSTRAÇÃO             *
 *                                                      *
 * ***************************************************** */

//Inicializa o painel adm carregando os recursos necessários
function init_painel() {
    $CI = &get_instance();
    $CI->load->library(array('sistema', 'session', 'form_validation'));
    $CI->load->helper(array('form', 'url', 'array', 'text'));
    $CI->load->model('usuarios_model', 'usuarios');

    set_tema('titulo_padrao', 'Painel ADM');
    set_tema('titulo', 'Pinel Administrativo');
    set_tema('conteudo', '<p class="alert-box">Bem vido ao Painel administrativo do site</p>');
    set_tema('rodape', '<p>&copy; 2013 | Todos os direitos reservados para <strong><a href="http://www.movimentoweb.com.br" alt="Conheça a Movimento Web">Movimento Web</a></strong>');
    set_tema('template', 'painel_view');
    set_tema('headerinc', load_css(array('foundation.min', 'app')), FALSE);
    set_tema('headerinc', load_js(array('foundation.min', 'app')), FALSE);
}
