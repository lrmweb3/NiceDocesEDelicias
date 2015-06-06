<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
?>
<div class="row">
    <div class="three columns">
        <ul class="nav-bar vertical">
            <li class="active"><a href="#"><strong>MENUS</strong></a></li>
            <li class=""><a href="<?php echo base_url('clientes/cadastrar') ?>">Novo cliente</a></li>   
            <li class=""><a href="<?php echo base_url('clientes/enviar_nova_senha') ?>">Enviar nova senha</a></li>   
            <li class=""><a href="<?php echo base_url('clientes/gerenciar') ?>">Gerenciar clientes</a></li>   
            <li class=""><a href="<?php echo base_url('clientes/estatisticas') ?>">Estatísticas de acesso</a></li>                                                        
        </ul>       
    </div>  <!--MENUS PÁGINA-->

    <script type="text/javascript">
        $(function() {
            $('.deletareg').click(function() {
                if (confirm("deseja realmente excluir este registro? \n Esta operação não poderá ser desfeita!"))
                    return true;
                else
                    return false;
            });
        });
    </script>  <!--SCRIPT-->

    <div class="nine columns">

        <?php
        switch ($tela) {

            case 'nova_senha' :
                echo '<div class="four columns centered">';
                echo breadcrumb();
                echo form_open('usuarios/nova_senha', array('class' => 'custom loginform'));
                echo form_fieldset('Recuperação de senha');
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

            case 'cadastrar' :
                echo '<div class="twelve columns">';
                echo breadcrumb();
                erros_validacao();
                get_msg('msgok');
                get_msg('msgerro');
                echo form_open_multipart('clientes/cadastrar', array('class' => 'custom twelve')) . "\n";
                echo form_fieldset('Cadastro de Cliente') . "\n";
                echo form_label('Nome do responsável *') . "\n";
                echo form_input(array('name' => 'nome', 'class' => 'twelve'), set_value('nome'), 'autofocus') . "\n";
                echo form_label('Empresa') . "\n";
                echo form_input(array('name' => 'empresa', 'class' => 'twelve'), set_value('empresa')) . "\n";
                echo form_label('Telefone') . "\n";
                echo form_input(array('name' => 'telefone', 'class' => 'twelve'), set_value('telefone')) . "\n";
                echo '<div class="panel">';
                echo form_label('Login*') . "\n";
                echo form_input(array('name' => 'login', 'class' => 'twelve'), set_value('login')) . "\n";
                echo form_label('Nova senha');
                echo form_password(array('name' => 'senha', 'class' => 'twelve'), set_value('senha'));
                echo form_label('Repita a senha');
                echo form_password(array('name' => 'senha2', 'class' => 'twelve'), set_value('senha'));
                echo form_label('E-mail *') . "\n";
                echo form_input(array('name' => 'email', 'class' => 'twelve'), set_value('email')) . "\n";
                echo '</div>';
                echo form_label('Endereço') . "\n";
                echo form_input(array('name' => 'endereco', 'class' => 'twelve'), set_value('endereco')) . "\n";
                echo form_label('Cidade') . "\n";
                echo form_input(array('name' => 'cidade', 'class' => 'twelve'), set_value('cidade')) . "\n";
                echo form_label('Estado') . "\n";
                echo form_input(array('name' => 'uf', 'class' => 'twelve'), set_value('uf')) . "\n";
                echo form_label('CEP') . "\n";
                echo form_input(array('name' => 'cep', 'class' => 'twelve'), set_value('cep')) . "\n";
                echo form_label('Ramo de atividade') . "\n";
                echo form_input(array('name' => 'ramoatividade', 'class' => 'twelve'), set_value('ramoatividade')) . "\n";
                echo form_label('Observações') . "\n";
                echo form_textarea(array('name' => 'obs', 'class' => 'twelve'), set_value('obs')) . "\n";
                echo form_label('Enviar logomaraca da empresa') . "\n";
                echo form_upload(array('name' => 'logomarca', 'class' => 'twelve'), set_value('logomarca')) . "\n";
                echo anchor('clientes/gerenciar', 'Cancelar', array('class' => 'button radius alert espaco')) . "\n";
                echo form_submit(array('name' => 'cadastrar', 'class' => 'button radius'), 'Salvar dados') . "\n";
                echo form_fieldset_close() . "\n";
                echo form_close() . "\n";
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
                                <th>Empresa</th>
                                <th>Nome do dono</th>
                                <th class="text-center">Telefone</th>
                                <th class="text-center">Ativo</th>
                                <th class="text-center">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = $this->clientes->get_all()->result();
                            foreach ($query as $linha) {
                                echo '<tr>';
                                printf('<td>%s</td>', $linha->empresa);
                                printf('<td>%s</td>', $linha->nome);
                                printf('<td class="text-center">%s</td>', $linha->telefone);
                                printf('<td class="text-center">%s</td>' . "\n", ($linha->ativo == 0) ? '<a href="' . base_url('clientes/ativar/' . $linha->id) . '" class="button radius tiny alert">Inativo</a>' : '<a href="' . base_url('clientes/desativar/' . $linha->id) . '" class="button radius tiny success">Ativo</a>');
                                printf('<td class="text-center">%s%s</td>', anchor("clientes/editar/$linha->id", ' ', array('class' => 'table-actions table-edit button radius tiny paddingbtn', 'title' => 'Editar')), anchor("clientes/alterar_senha/$linha->id", ' ', array('class' => 'table-actions table-pass button radius tiny paddingbtn', 'title' => 'Senha')));
                                echo '</tr>';
                            }
                            ?>
                        </tbody>
                    </table>
                </div>

                <?php
                break;

            case 'alterar_senha' :
                $iduser = $this->uri->segment(3);
                if ($iduser == NULL) {
                    set_msg('msgerro', 'Escolha um cliente para continuar', 'erro');
                    redirect('cliente/gerenciar');
                }
                ?>
                <div class="twelve columns">
                    <?php
                    echo breadcrumb();
                    if (is_admin() || $iduser == $this->session->userdata('user_id')) {
                        $query = $this->clientes->get_byid($iduser)->row();
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
                        echo anchor('clientes/gerenciar', 'Cancelar', array('class' => 'button radius alert espaco'));
                        echo form_submit(array('name' => 'alterarsenha', 'class' => 'button radius'), 'Salvar dados');
                        echo form_hidden('idregistro', $query->id);
                        echo form_fieldset_close();
                        echo form_close();
                    } else {
                        set_msg('msgerro', 'Seu usuario não tem permissão para executar esta operação. <p>Por favor contate a administração do site para obter os privilégios necessários</p>', 'erro');
                        redirect('usuarios/gerenciar_usuarios');
                    }
                    ?>
                </div>
                <?php
                break;

            case 'editar' :
                $iduser = $this->uri->segment(3);
                if ($iduser == NULL) {
                    set_msg('msgerro', 'Escolha um usuario para continuar', 'erro');
                    redirect('clientes/gerenciar');
                }
                ?>
                <div class="twelve columns">
                    <?php
                    echo breadcrumb();
                    if (is_admin() || $iduser == $this->session->userdata('user_id')) {
                        $query = $this->clientes->get_byid($iduser)->row();
                        erros_validacao();
                        get_msg('msgerro');
                        get_msg('msgok');
                        echo form_open_multipart(current_url(), array('class' => 'custom twelve'));
                        echo form_fieldset('Cadastro de Cliente');
                        echo form_label('Nome do responsável *');
                        echo form_input(array('name' => 'nome', 'class' => 'twelve'), set_value('nome', $query->nome), 'autofocus');
                        echo form_label('Empresa');
                        echo form_input(array('name' => 'empresa', 'class' => 'twelve'), set_value('empresa', $query->empresa)) . "\n";
                        echo form_label('Telefone') . "\n";
                        echo form_input(array('name' => 'telefone', 'class' => 'twelve'), set_value('telefone', $query->telefone)) . "\n";
                        echo '<div class="panel">';
                        echo form_label('Login*') . "\n";
                        echo form_input(array('name' => 'login', 'class' => 'twelve'), set_value('login', $query->login)) . "\n";
                        echo form_label('Nova senha');
                        echo form_password(array('name' => 'senha', 'class' => 'twelve'), set_value('senha'));
                        echo form_label('Repita a senha');
                        echo form_password(array('name' => 'senha2', 'class' => 'twelve'), set_value('senha'));
                        echo form_label('E-mail *') . "\n";
                        echo form_input(array('name' => 'email', 'class' => 'twelve'), set_value('email', $query->email)) . "\n";
                        echo '</div>';
                        echo form_label('Endereço') . "\n";
                        echo form_input(array('name' => 'endereco', 'class' => 'twelve'), set_value('endereco', $query->endereco)) . "\n";
                        echo form_label('Cidade') . "\n";
                        echo form_input(array('name' => 'cidade', 'class' => 'twelve'), set_value('cidade', $query->cidade)) . "\n";
                        echo form_label('Estado') . "\n";
                        echo form_input(array('name' => 'uf', 'class' => 'twelve'), set_value('uf', $query->uf)) . "\n";
                        echo form_label('CEP') . "\n";
                        echo form_input(array('name' => 'cep', 'class' => 'twelve'), set_value('cep', $query->cep)) . "\n";
                        echo form_label('Ramo de atividade') . "\n";
                        echo form_input(array('name' => 'ramoatividade', 'class' => 'twelve'), set_value('ramoAtividade', $query->ramoAtividade)) . "\n";
                        echo form_label('Observações') . "\n";
                        echo form_textarea(array('name' => 'obs', 'class' => 'twelve'), set_value('obs', $query->obs)) . "\n";
                        echo form_label('Enviar logomaraca da empresa') . "\n";
                        echo form_upload(array('name' => 'logomarca', 'class' => 'twelve'), set_value('logomarca', $query->logomarca)) . "\n";
                        echo anchor('clientes/gerenciar', 'Cancelar', array('class' => 'button radius alert espaco'));
                        echo form_hidden('idcliente', $iduser) . "\n";
                        echo form_submit(array('name' => 'cadastrar', 'class' => 'button radius'), 'Salvar dados') . "\n";
                        echo form_fieldset_close() . "\n";
                        echo form_close() . "\n";
                    } else {
                        set_msg('msgerro', 'Seu usuario não tem permissão para executar esta operação. <p>Por favor contate a administração do site para obter os privilégios necessários para esta ação.</p>', 'erro');
                        redirect(current_url());
                    }
                    ?>
                </div>
                <?php
                break;

            default :
                echo '<div class="alert-box alert"><p>A tela solicitada não existe! <a href="" class="close">&times;</a></p></div>';
                break;
        }
        ?>
    </div>
