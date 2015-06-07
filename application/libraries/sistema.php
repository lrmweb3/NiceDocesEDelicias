<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class RE_Sistema {

    protected $CI;
    public $tema = array();

    public function __construct() {
        $this->CI = &get_instance();
        $this->CI->load->helper('site', 'apoio','painel');
    }

    public function enviar_email($para, $assunto, $mensagem, $formato = 'html') {
        $this->CI->load->library('email');
        $config['mailtype'] = $formato;
        $this->CI->email->initialize($config);
        $this->CI->email->from('adm@site.com', 'Administração do site');
        $this->CI->email->to($para);
        $this->CI->email->subject($assunto);
        $this->CI->email->message($mensagem);
        if ($this->CI->email->send()) {
            return TRUE;
        } else {
            return $this->CI->email->print_debugger();
        }
    }

}

/* End of file Sistema.php */
/* Location: ./application/libraries/Sistema.php */
