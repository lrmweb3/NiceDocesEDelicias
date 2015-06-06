<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
switch ($tela) {

    case 'login' :
        echo '<div class="row paineladm">';
        echo '<div class="four columns centered">';
        echo form_open('usuarios/login', array('class' => 'custom loginform'));
        echo form_fieldset('Acesso ao Painel de Administração');
        get_msg('logoffok');
        get_msg('erroLogin');
        erros_validacao();
        echo form_label('Usuários');
        echo form_input(array('name' => 'usuario'), set_value('usuario'), 'autofocus');
        echo form_label('Senha');
        echo form_password(array('name' => 'senha'), set_value('senha'));
        echo form_hidden('redirect', $this->session->userdata('redir_para'));
        echo form_submit(array('name' => 'logar', 'class' => 'button radius right'), 'Login');
        echo '<p>' . anchor('usuarios/nova_senha', 'Esqueci minha senha') . '</p>';
        echo form_fieldset_close();
        echo form_close();
        echo '</div>';
        echo '</div>';
        break;

    case 'nova_senha' :
        echo '<div class="four columns centered">';
        echo form_open('usuarios/nova_senha', array('class' => 'custom loginform'));
        echo form_fieldset('Movimento Web | Recuperação de senha');
        get_msg('msgok');
        get_msg('msgerro');
        erros_validacao();
        echo form_label('E-mail');
        echo form_input(array('name' => 'email'), set_value('email'), 'autofocus');
        echo form_hidden('redirect', $this->session->userdata('redir_para'));
        echo form_submit(array('name' => 'novasenha', 'class' => 'button radius right'), 'Enviar nova senha');
        echo '<p>' . anchor('usuarios/login', 'Fazer login') . '</p>';
        echo form_fieldset_close();
        echo form_close();
        echo '</div>';
        break;


    default :
        echo '<div class="alert-box alert"><p>A tela solicitada não existe! <a href="" class="close">&times;</a> </p></div>';
        break;
}
