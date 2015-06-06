<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Contato extends CI_Controller {

    public function __construct() {
        parent::__construct();

        init_site();
    }

    public function index() {

        //Validação do formulário de contato
        $this->form_validation->set_rules('nome', 'Nome:', 'trim|required|min_length[4]|strtolower');
        $this->form_validation->set_rules('email', 'Email:', 'trim|required|min_length[4]|strtolower');
        $this->form_validation->set_rules('tel', 'Telefone:', 'trim|required|min_length[8]');
        $this->form_validation->set_rules('empresa', 'Empresa:', 'trim|required|min_length[3]');
        $this->form_validation->set_rules('mensagem', 'Mensagem:', 'trim|required|min_length[4]');
        if ($this->form_validation->run() == TRUE) {
            $nome = $this->input->post('nome', TRUE);
            $email = $this->input->post('email', TRUE);
            $tel = $this->input->post('tel', TRUE);
            $empresa = $this->input->post('empresa', TRUE);
            $mensagem = $this->input->post('mensagem', TRUE);

            //$redirect = $this->input->post('redirect', TRUE);
            //if ($this->usuarios->do_login($usuario, $senha) == TRUE) {
//                $query = $this->usuarios->get_bylogin($usuario)->row();
//                $dados = array(
//                    'user_id' => $query->id,
//                    'user_nome' => $query->nome,
//                    'user_admin' => $query->adm,
//                    'user_logado' => TRUE,
//                );
//                $this->session->set_userdata($dados);
//                auditoria('Login no sistema', 'UsuÃ¡rio "' . $usuario . '" fez login no sistema');
//                if ($redirect != ''):
//                    redirect($redirect);
//                else:
//                    redirect('painel');
//                endif;
//            }else {
//                $query = $this->usuarios->get_bylogin($usuario)->row();
//                if (empty($query)):
//                    auditoria('Erro de login', 'UsuÃ¡rio inexistente "' . $usuario . '"');
//                    set_msg('errologin', 'UsuÃ¡rio inexistente', 'erro');
//                elseif ($query->senha != $senha):
//                    auditoria('Erro de login', 'Senha incorreta para o usuÃ¡rio "' . $usuario . '"');
//                    set_msg('errologin', 'Senha incorreta', 'erro');
//                elseif ($query->ativo == 0):
//                    auditoria('Erro de login', 'UsuÃ¡rio inativo "' . $usuario . '"');
//                    set_msg('errologin', 'Este usuÃ¡rio estÃ¡ inativo', 'erro');
//                else:
//                    auditoria('Erro de login', 'Erro desconhecido para o usuÃ¡rio "' . $usuario . '"');
//                    set_msg('errologin', 'Erro desconhecido, contate o desenvolvedor', 'erro');
//                endif;
//                redirect('usuarios/login');
            //       }
        }


        set_tema('CSSpagina', '', FALSE);
        set_tema('JSpagina', '', FALSE);

        set_tema('header', load_modulo('header', '', 'site/includes'));
        set_tema('paginas', load_modulo('contato_view', '', 'site/pg/contato'));
        set_tema('footer', load_modulo('footer', '', 'site/includes'));

        load_template();
    }

    /*     * *****************************************************
     *  PAINEL ADMINISTRATIVO  ***********************************
     * ********************************************************** */
    
    
    
    
    
    
}
