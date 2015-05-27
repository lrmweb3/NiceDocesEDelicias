<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Salgados extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('sistema');
        init_site();
    }

    public function lista() {

        set_tema('CSSpagina', '', FALSE);
        set_tema('JSpagina', '', FALSE);

        set_tema('titulo', 'Salgados');

        set_tema('header', load_modulo('header', '', 'site/includes'));
        set_tema('paginas', load_modulo('salgados_view', 'lista', 'site/pg/salgados'));
        set_tema('footer', load_modulo('footer', '', 'site/includes'));

        load_template();
    }

    public function item() {

        set_tema('CSSpagina', '', FALSE);
        set_tema('JSpagina', '', FALSE);

        set_tema('titulo', 'Salgados');

        set_tema('header', load_modulo('header', '', 'site/includes'));
        set_tema('paginas', load_modulo('salgados_view', 'item', 'site/pg/salgados'));
        set_tema('footer', load_modulo('footer', '', 'site/includes'));

        load_template();
    }

}
