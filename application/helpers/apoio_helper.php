<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

/* * ************************************************************
 *                	FUNÇÕES DE APOIO                	* 																*
 * ************************************************************* */

//Carrega um ou varios arquivos js de uma pasta ou servidor remoto

function load_js($arquivo = NULL, $pasta = 'js', $remoto = FALSE) {
    if ($arquivo != NULL) {
        $CI = &get_instance();
        $CI->load->helper('url');
        $retorno = '';
        if (is_array($arquivo)) {
            foreach ($arquivo as $js) {
                if ($remoto) {
                    $retorno .= '<script type="text/javascript" src="' . $js . '"></script>' . "\n";
                } else {
                    $retorno .= '<script type="text/javascript" src="' . base_url("$pasta/$js.js") . '"></script>' . "\n";
                }
            }
        } else {
            if ($remoto) {
                $retorno .= '<script type="text/javascript" src="' . $arquivo . '"></script>' . "\n";
            } else {
                $retorno .= '<script type="text/javascript" src="' . base_url("$pasta/$arquivo.js") . '"></script>' . "\n";
            }
        }
    }
    return $retorno;
}

//Carrega um ou varios arquivos css de uma pasta ou servidor remoto
function load_css($arquivo = NULL, $pasta = 'css', $media = 'all') {
    if ($arquivo != NULL) {
        $CI = &get_instance();
        $CI->load->helper('url');
        $retorno = '';
        if (is_array($arquivo)) {
            foreach ($arquivo as $css) {
                $retorno .= '<link rel="stylesheet" type="text/css" href="' . base_url("$pasta/$css.css") . '" media="' . $media . '" />' . "\n";
            }
        } else {
            $retorno .= '<link rel="stylesheet" type="text/css" href="' . base_url("$pasta/$arquivo.css") . '" media="' . $media . '"/>' . "\n";
        }
    }
    return $retorno;
}

//Carrega template

function load_template() {
    $CI = &get_instance();
    $CI->load->library('sistema');
    $CI->parser->parse($CI->sistema->tema['template'], get_tema());
}

function erros_validacao() {
    if (validation_errors()) {
        echo '<div class="alert-box alert">' . validation_errors('<p>', '</p>') . '</div>';
    }
}

function erros_de_validacao() {
    if (validation_errors()) {
        echo '<div class="alert alert-danger">' . validation_errors('<p>', '</p>') . '</div>';
    }
}

function set_mensagem($id = 'msgerro', $msg = NULL, $tipo = 'erro') {
    $CI = &get_instance();
    switch ($tipo) {
        case 'erro' :
            $CI->session->set_flashdata($id, '<div class="alert alert-danger"><p>' . $msg . '<a href="" class="close">&times;</a></p></div>');
            break;

        case 'sucesso' :
            $CI->session->set_flashdata($id, '<div class="alert alert-success"><p>' . $msg . '<a href="" class="close">&times;</a></p></div>');
            break;

        default :
            $CI->session->set_flashdata($id, '<div class="alert alert-info"><p>' . $msg . '<a href="" class="close">&times;</a></p></div>');
            break;
    }
}

function set_msg($id = 'msgerro', $msg = NULL, $tipo = 'erro') {
    $CI = &get_instance();
    switch ($tipo) {
        case 'erro' :
            $CI->session->set_flashdata($id, '<div class="alert-box alert"><p>' . $msg . '<a href="" class="close">&times;</a></p></div>');
            break;

        case 'sucesso' :
            $CI->session->set_flashdata($id, '<div class="alert-box success"><p>' . $msg . '<a href="" class="close">&times;</a></p></div>');
            break;

        default :
            $CI->session->set_flashdata($id, '<div class="alert-box"><p>' . $msg . '<a href="" class="close">&times;</a></p></div>');
            break;
    }
}

// Verifica se existe uma msg para ser exibida na ela atual

function get_msg($nomeMensagem, $mostrar = TRUE) {
    $CI = &get_instance();
    if ($CI->session->flashdata($nomeMensagem)) {
        if ($mostrar) {
            echo $CI->session->flashdata($nomeMensagem);
            return TRUE;
        } else {
            return $CI->session->flashdata($nomeMensagem);
        }
    }
    return FALSE;
}

function is_admin($set_msg = FALSE) {
    $CI = &get_instance();
    $user_admin = $CI->session->userdata('user_admin');
    if (!isset($user_admin) || $user_admin != TRUE) {
        if ($set_msg) {
            set_msg('msgerro', 'Seu usuario não tem permissão para executar esta operação', 'erro');
            return FALSE;
        }
    } else {
        return TRUE;
    }
}

function breadcrumb() {
    $CI = &get_instance();
    $CI->load->helper('url');
    $classe = ucfirst($CI->router->class);
    if ($classe == 'Painel') {
        $classe = anchor($CI->router->class, 'Início');
    } else {
        $classe = anchor($CI->router->class, $classe);
    }
    $metodo = ucwords(str_replace('_', ' ', $CI->router->method));
    if ($metodo && $metodo != 'Index') {
        $metodo = " </li><li> " . anchor($CI->router->class . "/" . $CI->router->method, $metodo);
    } else {
        $metodo = '';
    }
    return '<ul class="breadcrumbs"><li>' . anchor('painel', 'Painel') . '</li><li>' . $classe . $metodo . '</li></ul>';
}

function auditoria($operacao, $obs = '', $query = true) {
    $CI = &get_instance();
    $CI->load->library('session');
    $CI->load->model('auditoria_model', 'auditoria');
    if ($query) {
        $last_query = $CI->db->last_query();
    } else {
        $last_query = NULL;
    }
    if (esta_logado(FALSE)) {
        $user_id = $CI->session->userdata('user_id');
        $user_login = $CI->usuarios->get_byid($user_id)->row()->login;
    } else {
        $user_login = 'Desconhecido';
    }
    $dados = array('usuario' => $user_login, 'operacao' => $operacao, 'query' => $last_query, 'observacao' => $obs);
    $CI->auditoria->do_insert($dados);
}

//Gera uma miniatura de uma imagem caso ela ainda não exita
function thumb($imagem = NULL, $largura = 100, $altura = 75, $classLink = null, $classImg = null, $linkHREF = NULL, $geratag = TRUE) {
    $CI = &get_instance();
    $CI->load->helper('file');
    $thumb = $largura . 'x' . $altura . '_' . $imagem;
    $thumbinfo = get_file_info('./uploads/thumbs/' . $thumb);
    if ($thumbinfo != FALSE) {
        $retorno = base_url('uploads/thumbs/' . $thumb);
    } else {
        $CI->load->library('image_lib');
        $config['image_libbrary'] = 'gd2';
        $config['source_image'] = './uploads/' . $imagem;
        $config['new_image'] = './uploads/thumbs/' . $thumb;
        $config['maintain_ratio'] = TRUE;
        $config['width'] = $largura;
        $config['height'] = $altura;
        $CI->image_lib->initialize($config);
        if ($CI->image_lib->resize()) {
            $CI->image_lib->clear();
            $retorno = base_url('uploads/thumbs/' . $thumb);
        } else {
            $retorno = FALSE;
        }
    }
    if ($geratag && $retorno != FALSE) {
        $retorno = '<a class="' . $classLink . ' th radius" href="' . $linkHREF . '"><img ' . $classImg . ' src="' . $retorno . '" alt="" /></a>';
        return $retorno;
    }
}

//Gera um slug baseado no título
function slug($string = NULL) {
    $string = remove_acentos($string);

    //removendo acentos
    return url_title($string, '-', TRUE);
}

//Remove acentos e caracteres especias de uma string
function remove_acentos($string = NULL) {
    $procurar = array('À', 'Á', 'Ã', 'É', 'È', 'Ê', 'Í', 'Ì', 'Ó', 'Ò', 'Õ', 'Ô', 'Ú', 'Ù', 'Ç', 'à', 'á', 'ã', 'é', 'è', 'ê', 'í', 'ì', 'ó', 'ò', 'õ', 'ô', 'ú', 'ù', 'ç');
    $substituir = array('A', 'A', 'A', 'E', 'E', 'E', 'I', 'I', 'O', 'O', 'O', 'O', 'U', 'U', 'Ç', 'a', 'a', 'a', 'e', 'e', 'e', 'i', 'i', 'o', 'o', 'o', 'o', 'u', 'u', 'c');
    return str_replace($procurar, $substituir, $string);
}

//Gera um resumo de uma string

function resumo_post($string, $quantidadeDePalavras = 50, $decodifica_html = TRUE, $remove_tags = TRUE) {
    if ($string != NULL) {
        if ($decodifica_html) {
            $string = to_html($string);
        }
        if ($remove_tags) {
            $string = strip_tags($string);
        }
        $retorno = word_limiter($string, $quantidadeDePalavras);
    } else {
        $retorno = FALSE;
    }
    return $retorno;
}

//Converter dados do bd para html válido
function to_html($string = NULL) {
    return html_entity_decode($string);
}

//Salva ou atualiza uma config no bd
function set_setting($nome, $valor = '') {
    $CI = &get_instance();
    $CI->load->model('settings_model', 'settings');
    if ($CI->settings->get_bynome($nome)->num_rows() == 1) {
        //atualiza no bd
        if (trim($valor) == '') {
            //excluir do bd
            $CI->settings->do_delete(array('nome_config' => $nome), FALSE);
        } else {
            //insere ou bd
            $dados = array('nome_config' => $nome, 'valor_config' => $valor);
            $CI->settings->do_update($dados, array('nome_config' => $nome), FALSE);
        }
    } else {
        //insere no bd
        $dados = array('nome_config' => $nome, 'valor_config' => $valor);
        $CI->settings->do_insert($dados, FALSE);
    }
}

//retorna uma config do bd
function get_setting($nome) {
    $CI = &get_instance();
    $CI->load->model('settings_model', 'settings');
    $setting = $CI->settings->get_bynome($nome);
    if ($setting->num_rows() == 1) {
        $setting = $setting->row();
        return $setting->valor_config;
    } else {
        return null;
    }
    return $setting->valor_config;
}

function ativarCliente($id = null) {
    $CI = &get_instance();
    $CI->load->model('clientes_model', 'clientes');
    if ($id != NULL) {
        $CI->clientes->get_byid($id);
    } else {
        set_msg('msgerro', 'Cliente não selecionado', 'erro');
        redirect('clientes/gerenciar');
    }
}

function init_htmleditor() {
    set_tema('headerinc', load_js(base_url('htmleditor/tiny_mce.js'), null, TRUE), FALSE);
    set_tema('headerinc', load_js(base_url('htmleditor/init_tiny_mce.js'), null, TRUE), FALSE);
}

function incluir_arquivo($view, $pasta = 'includes', $echo = TRUE) {
    $CI = &get_instance();
    if ($echo == TRUE) {
        echo $CI->load->view("$pasta/$view", '', TRUE);
        return TRUE;
    }
    return $CI->load->view("$pasta/$view", '', TRUE);
}

//Carrega um módulo do sistema devolvendo a tela solicitada

function load_modulo($pagina = NULL, $itemDoSwitchCase = NULL, $localDoArquivo = NULL) {
    $CI = &get_instance();
    if ($pagina != null) {
        return $CI->load->view("$localDoArquivo/$pagina", array('tela' => $itemDoSwitchCase), TRUE);
    } else {
        return FALSE;
    }
}

function set_tema($propriedade, $valor, $sobrescrever = TRUE) {
    $CI = &get_instance();
    $CI->load->library('sistema');
    if ($sobrescrever) {
        $CI->sistema->tema[$propriedade] = $valor;
    } else {
        if (!isset($CI->sistema->tema[$propriedade])) {
            $CI->sistema->tema[$propriedade] = '';
        }
        $CI->sistema->tema[$propriedade] .= $valor;
    }
}

//Retorna os valores do array $tema da clasase sistema
function get_tema() {
    $CI = &get_instance();
    $CI->load->library('sistema');
    return $CI->sistema->tema;
}
