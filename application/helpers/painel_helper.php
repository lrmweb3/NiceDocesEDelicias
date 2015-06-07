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
    $CI->load->library(array('sistema', 'form_validation'));
    $CI->load->helper(array('form', 'url', 'array', 'text'));

    //CSS e JS Global
    set_tema('CSSglobal', load_css(array('bootstrap.min', 'bootstrap-responsive.min'), 'css/painel'), FALSE);
    set_tema('CSSglobal', load_css(array('style'), 'css/painel'), FALSE); //Este arquivo não deve sair desta posição

    set_tema('JSglobal', load_js(array('jquery'), 'js/painel'), FALSE); //Este arquivo não deve sair desta posição
    set_tema('JSglobal', load_js(array('bootstrap.min', 'modernizr.custom.17475'), 'js/painel'), FALSE); //Este arquivo não deve sair desta posição


    set_tema('titulo_padrao', 'Painel ADM');
    set_tema('titulo', 'Pinel Administrativo');



    set_tema('template', 'painel_view');
}
