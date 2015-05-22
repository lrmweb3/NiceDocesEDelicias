<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

/* * ************************************************************
 *                      FUNÇÕES DO SITE			      *
 * ************************************************************ */

//INICIALIZA O SITE CARREGANDO OS RECURSOS NECESSÁRIOS
function init_site() {
    $CI = &get_instance();
    $CI->load->library(array('sistema'));

    //CSS e JS Global
    set_tema('CSSglobal', load_css(array('bootstrap', 'bootstrap-responsive', 'style', 'elastislide', 'custom', 'demo')), FALSE);
    set_tema('JSglobal', load_js(array('jquery', 'bootstrap.min', 'holder', 'funcoes', 'jquery.elastislide', 'jquerypp.custom', 'modernizr.custom.17475')), FALSE);

    set_tema('titulo_padrao', 'Nice Doces e Delícias');
    set_tema('template', 'inicio_view');
}
