<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
switch ($tela) {
	
	case 'instalar' :
		echo '<div class="twelve columns">';
		echo breadcrumb();
		erros_validacao();
		get_msg('msgok');
		echo form_open('usuarios/cadastrar_usuarios', array('class' => 'custom'));
		echo form_fieldset('Cadastrar Usuário');
		echo form_label('Nome completo');
		echo form_input(array('name' => 'nome', 'class' => 'five'), set_value('nome'), 'autofocus');
		echo form_label('E-mail');
		echo form_input(array('name' => 'email', 'class' => 'five'), set_value('email'));
		echo form_label('Login');
		echo form_input(array('name' => 'login', 'class' => 'five'), set_value('login'));
		echo form_label('Senha');
		echo form_password(array('name' => 'senha', 'class' => 'three'), set_value('senha'));
		echo form_label('Repita a senha');
		echo form_password(array('name' => 'senha2', 'class' => 'three'), set_value('senha2'));
		echo form_checkbox(array('name' => 'adm'), 1) . ' Administrador <br /><br />';
		echo anchor('usuarios/gernciar_usuarios', 'Cancelar', array('class' => 'button radius alert espaco'));
		echo form_submit(array('name' => 'cadastrar', 'class' => 'button radius'), 'Salvar dados');
		echo form_fieldset_close();
		echo form_close(); 
		echo '</div>';
		break;

	case 'sucesso' :
?>
<div class="twelve columns">
	<p class="panel">
		Conclusão da instalação
	</p>

</div>

<?php
break;

default :
echo '<div class="alert-box alert"><p>A tela solicitada não existe</p>/div>';
break;
}
