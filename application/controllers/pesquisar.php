<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Pesquisar extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('sistema');
        init_site();
    }

    public function index() {

        set_tema('CSSpagina', '', FALSE);
        set_tema('JSpagina', '', FALSE);

        set_tema('header', load_modulo('header', '', 'site/includes'));
        set_tema('pesquisar', load_modulo('barraPesquisa', '', 'site/pg/pesquisar'));
        set_tema('paginas', load_modulo('pesquisar_view', '', 'site/pg/pesquisar'));
        set_tema('footer', load_modulo('footer', '', 'site/includes'));

        load_template();
    }

}
