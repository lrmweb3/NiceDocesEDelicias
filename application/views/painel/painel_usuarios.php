<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
?>
<div class="row">
    <div class="three columns">
        <ul class="nav-bar vertical">
            <li class="active"><a href="#"><strong>MENU USUÁRIOS</strong></a></li>
            <li><a href="<?php echo base_url('usuarios/cadastrar'); ?>">Novo usuário</a></li>
            <li><a href="<?php echo base_url('usuarios/gerenciar'); ?>">Gerenciar usuário</a></li>
            <li><?php echo anchor('usuarios/alterar_senha/' . $this->session->userdata('user_id'), 'Alterar senha'); ?></li>
        </ul>       
    </div>  <!--MENUS PÁGINA-->

    <script type="text/javascript">
        $(function() {
            $('.deletareg').click(function() {
                if (confirm("deseja realmente excluir este registro?\nEsta operação não poderá ser desfeita!"))
                    return true;
                else
                    return false;
            });
        });
    </script>  <!--SCRIPT-->

    <div class="nine columns">
        <?php
        switch ($tela) {

            case 'usuarios' :      //GERENCIAR PÁGINAS
                get_msg('msgerro');
                get_msg('msgok');
                ?>          
                <div class="panel callout">
                    <h3>Página de configuração de usuários</h3>
                    <p> &laquo; Escolha um menu ao lado para continuar.</p>
                </div>
                <?php
                break;  //GERENCIAR PÁGINAS

            case 'cadastrar' :
                echo '<div class="twelve columns">';
                echo breadcrumb();
                erros_validacao();
                get_msg('msgok');
                echo form_open('usuarios/cadastrar', array('class' => 'custom'));
                echo form_fieldset('Cadastrar Usuário') . "\n";
                echo form_label('Nome completo') . "\n";
                echo form_input(array('name' => 'nome', 'class' => 'twelve'), set_value('nome'), 'autofocus') . "\n";
                echo form_label('E-mail') . "\n";
                echo form_input(array('name' => 'email', 'class' => 'twelve'), set_value('email')) . "\n";
                echo form_label('Login') . "\n";
                echo form_input(array('name' => 'login', 'class' => 'twelve'), set_value('login')) . "\n";
                echo form_label('Senha') . "\n";
                echo form_password(array('name' => 'senha', 'class' => 'six'), set_value('senha')) . "\n";
                echo form_label('Repita a senha') . "\n";
                echo form_password(array('name' => 'senha2', 'class' => 'six'), set_value('senha2')) . "\n";
                echo form_checkbox(array('name' => 'adm'), 1) . ' Administrador <br /><br />';
                echo anchor('usuarios/gernciar_usuarios', 'Cancelar', array('class' => 'button radius alert espaco')) . "\n";
                echo form_submit(array('name' => 'cadastrar', 'class' => 'button radius'), 'Salvar dados') . "\n";
                echo form_fieldset_close() . "\n";
                echo form_close();
                echo '</div>';
                break;

            case 'gerenciar' :
                ?>
                <script type="text/javascript">
                    $(function() {
                        $('.deletareg').click(function() {
                            if (confirm("deseja realmente excluir este registro?\nEsta operação não poderá ser desfeita!"))
                                return true;
                            else
                                return false;
                        });
                    });
                </script>

                <div class="twelve columns">
                    <?php
                    get_msg('msgerro');
                    get_msg('msgok');
                    echo breadcrumb();
                    ?>
                    <table class="twelve data-table">		
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Login</th>
                                <th>E-mail</th>
                                <th class="text-center">Ativo / ADM</th>
                                <th class="text-center">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = $this->usuarios->get_all()->result();
                            foreach ($query as $linha) {
                                echo '<tr>';
                                printf('<td>%s</td>', $linha->nome);
                                printf('<td>%s</td>', $linha->login);
                                printf('<td>%s</td>', $linha->email);
                                printf('<td>%s / %s</td>', ($linha->ativo == 0) ? 'Não' : 'Sim', ($linha->adm == 0) ? 'Não' : 'Sim');
                                printf('<td class="text-center">%s%s%s</td>', anchor("usuarios/editar/$linha->id", ' ', array('class' => 'table-actions table-edit button radius tiny paddingbtn', 'title' => 'Editar')), anchor("usuarios/alterar_senha/$linha->id", ' ', array('class' => 'table-actions table-pass button radius tiny paddingbtn', 'title' => 'Senha')), anchor("usuarios/excluir/$linha->id", ' ', array('class' => 'table-actions table-delete deletareg button radius tiny paddingbtn', 'title' => 'Excluir')));
                                echo '</tr>';
                            }
                            ?>
                        </tbody>
                    </table>
                </div>

                <?php
                break;

            case 'editar' :
                $iduser = $this->uri->segment(3);
                if ($iduser == NULL) {
                    set_msg('msgerro', 'Escolha um usuario para continuar', 'erro');
                    redirect('usuarios/gerenciar');
                }
                ?>
                <div class="twelve columns">
                    <?php
                    echo breadcrumb();
                    if (is_admin() || $iduser == $this->session->userdata('user_id')) {
                        $query = $this->usuarios->get_byid($iduser)->row();
                        erros_validacao();
                        get_msg('msgerro');
                        get_msg('msgok');
                        echo form_open(current_url(), array('class' => 'custom'));
                        echo form_fieldset('Alterar dados do usuário');
                        echo form_label('Nome Completo');
                        echo form_input(array('name' => 'nome', 'class' => 'five'), set_value('nome', $query->nome), 'autofocus');
                        echo form_label('Email');
                        echo form_input(array('name' => 'email', 'class' => 'five', 'disabled' => 'disabled'), set_value('email', $query->email));
                        echo form_label('Login');
                        echo form_input(array('name' => 'login', 'class' => 'three', 'disabled' => 'disabled'), set_value('login', $query->login));
                        echo form_checkbox(array('name' => 'ativo'), '1', ($query->ativo == 1) ? TRUE : FALSE) . ' Tornar-se Ativo<br /><br />';
                        echo form_checkbox(array('name' => 'adm'), '1', ($query->adm == 1) ? TRUE : FALSE) . ' Tornar-se Administrador<br /><br />';
                        echo anchor('usuarios/gerenciar', 'Cancelar', array('class' => 'button radius alert espaco'));
                        echo form_submit(array('name' => 'editar', 'class' => 'button radius'), 'Atualizar dados');
                        echo form_hidden('idusuario', $iduser);
                        echo form_fieldset_close();
                        echo form_close();
                    } else {
                        set_msg('msgerro', 'Seu usuario não tem permissão para executar esta operação. <p>Por favor contate a administração do site para obter os privilégios necessários</p>', 'erro');
                        redirect(current_url());
                    }
                    ?>
                </div>
                <?php
                break;

            case 'alterar_senha' :
                $iduser = $this->uri->segment(3);
                if ($iduser == NULL) {
                    set_msg('msgerro', 'Escolha um usuario para continuar', 'erro');
                    redirect('usuarios/gerenciar');
                }
                ?>
                <div class="twelve columns">
                    <?php
                    echo breadcrumb();
                    if (is_admin() || $iduser == $this->session->userdata('user_id')) {
                        $query = $this->usuarios->get_byid($iduser)->row();
                        erros_validacao();
                        get_msg('msgok');
                        echo form_open(current_url(), array('class' => 'custom'));
                        echo form_fieldset('Alterar senha');
                        echo form_label('Nome Completo');
                        echo form_input(array('name' => 'nome', 'class' => 'five', 'disabled' => 'disabled'), set_value('nome', $query->nome));
                        echo form_label('Email');
                        echo form_input(array('name' => 'email', 'class' => 'five', 'disabled' => 'disabled'), set_value('email', $query->email));
                        echo form_label('Login');
                        echo form_input(array('name' => 'login', 'class' => 'three', 'disabled' => 'disabled'), set_value('login', $query->login));
                        echo form_label('Nova senha');
                        echo form_password(array('name' => 'senha', 'class' => 'five'), set_value('senha'), 'autofocus');
                        echo form_label('Repita a senha');
                        echo form_password(array('name' => 'senha2', 'class' => 'five'), set_value('senha'));
                        echo anchor('usuarios/gerenciar_usuarios', 'Cancelar', array('class' => 'button radius alert espaco'));
                        echo form_submit(array('name' => 'alterarsenha', 'class' => 'button radius'), 'Salvar dados');
                        echo form_hidden('idusuario', $iduser);
                        echo form_fieldset_close();
                        echo form_close();
                    } else {
                        set_msg('msgerro', 'Seu usuario não tem permissão para executar esta operação. <p>Por favor contate a administração do site para obter os privilégios necessários</p>', 'erro');
                        redirect('usuarios/alterar_senha');
                    }
                    ?>
                </div>
                <?php
                break;

            default :
                echo '<div class="alert-box alert"><p>A tela solicitada não existe</p></div>';
                break;
        }
        ?>
    </div>  <!--nine columns-->
</div> <!--row páginas-->

