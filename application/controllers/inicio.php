<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Inicio extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('sistema');
        init_site();
    }

    public function index() {


        set_tema('CSSpagina', load_css(array('jcarousel.responsive')), FALSE); //Carrocel de imagens página home
        set_tema('JSpagina', load_js(array('jquery.jcarousel.min', 'jcarousel.responsive')), FALSE); //Carrocel de imagens página home

        set_tema('header', load_modulo('header', '', 'site/includes'));
        set_tema('paginas', load_modulo('home_view', '', 'site/pg/home'));
        set_tema('footer', load_modulo('footer', '', 'site/includes'));

        load_template();
    }

    public function pesquisar() {
        set_tema('CSSpagina', '', FALSE);
        set_tema('JSpagina', '', FALSE);

        set_tema('titulo', 'Pesquisar');

        set_tema('header', load_modulo('header', '', 'site/includes'));
        set_tema('barraPesquisar', load_modulo('barraPesquisa', '', 'site/pg/pesquisar'), TRUE);
        //set_tema($propriedade, load_modulo($pagina, $itemDoSwitchCase, $localDoArquivo), $replace);
        set_tema('paginas', load_modulo('site/pg/pesquisar_view', 'pesquisar'));
        set_tema('footer', load_modulo('footer', '', 'site/includes'));

        load_template();
    }

}
