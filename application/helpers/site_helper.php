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
    //CSS Boostrap
    set_tema('CSSglobal', load_css(array('bootstrap', 'bootstrap-responsive')), FALSE);
    
    //set_tema('CSSglobal', load_css(array('elastislide',  'custom', 'demo')), FALSE);// Plugin: Carrocel de imagens página Produtos Itens
    set_tema('CSSglobal', load_css(array('headerEfooter','style')), FALSE); //Este arquivo tem que ficar sozinho e nesta posição
    
    set_tema('JSglobal', load_js(array('jquery')), FALSE); //Este arquivo tem que ficar sozinho e nesta posição
    set_tema('JSglobal', load_js(array('bootstrap.min', 'holder', 'funcoes', 'header', 'jquery.elastislide', 'jquerypp.custom', 'modernizr.custom.17475')), FALSE);
    set_tema('JSglobal', load_js(array('headerSlideShow-imagesLoader', 'header.sideShow')), FALSE); //Slide Show header

    
    
    
    
    

    set_tema('titulo_padrao', 'Nice Doces e Delícias');
    set_tema('template', 'inicio_view');
}
