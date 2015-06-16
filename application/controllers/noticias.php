<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Noticias extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('sistema');
    }

    public function index() {
        $this->load->helper('painel');
        init_painel();
        set_tema('JSpagina', '');
        set_tema('CSSpagina', '');

        set_tema('titulo', 'Noticias');

        set_tema('header', load_modulo('header', '', 'painel/includes'));
        set_tema('paginas', load_modulo('pgNoticias_view', 'cadastrar', 'painel/pg/noticias'));
        set_tema('footer', load_modulo('footer', '', 'painel/includes'));

        load_template();
    }

    public function cadastrar() {
        $this->load->helper('painel');
        init_painel();
        set_tema('JSpagina', '');
        set_tema('CSSpagina', '');

        set_tema('titulo', 'Noticias');

        set_tema('header', load_modulo('header', '', 'painel/includes'));
        set_tema('paginas', load_modulo('pgNoticias_view', 'cadastrar', 'painel/pg/noticias'));
        set_tema('footer', load_modulo('footer', '', 'painel/includes'));

        load_template();
    }

    public function gerenciar() {
        $this->load->helper('painel');
        init_painel();
        set_tema('JSpagina', '');
        set_tema('CSSpagina', '');

        set_tema('titulo', 'Noticias');

        set_tema('header', load_modulo('header', '', 'painel/includes'));
        set_tema('paginas', load_modulo('pgNoticias_view', 'gerenciar', 'painel/pg/noticias'));
        set_tema('footer', load_modulo('footer', '', 'painel/includes'));

        load_template();
    }

}
