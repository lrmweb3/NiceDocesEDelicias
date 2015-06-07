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
        set_tema('JSpagina', '');

        set_tema('header', load_modulo('header', '', 'painel/includes'));
        set_tema('paginas', load_modulo('home_view', '', 'painel/pg/home'));
        set_tema('footer', load_modulo('footer', '', 'painel/includes'));

        load_template('template', 'painel_view');
    }

}
