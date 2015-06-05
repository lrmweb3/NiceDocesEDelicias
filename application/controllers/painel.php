<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Painel extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('sistema');
        $this->load->helper('painel');
        init_painel();
    }

    public function index() {


        set_tema('CSSpagina', load_css(array('jcarousel.responsive')), FALSE); //Carrocel de imagens página home
        set_tema('JSpagina', load_js(array('jquery.jcarousel.min', 'jcarousel.responsive')), FALSE); //Carrocel de imagens página home
        set_tema('JSpagina', load_js(array('funcoes_slideShowHorizontal'), 'js/funcoes-PG-Inicial'), FALSE); //Carrocel de imagens horizotal

        set_tema('header', load_modulo('header', '', 'painel/includes'));
        set_tema('paginas', load_modulo('home_view', '', 'painel/pg/home'));
        set_tema('footer', load_modulo('footer', '', 'painel/includes'));

        load_template();
    }

}
