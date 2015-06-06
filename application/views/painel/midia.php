<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
switch ($tela) {

    case 'cadastrar':
        echo '<div class="twelve columns">';
        echo breadcrumb();
        erros_validacao();
        get_msg('imgok');
        get_msg('imgerro');
        echo form_open_multipart('midia/cadastrar', array('class' => 'custom'));
        echo form_fieldset('Upload de mídia');
        echo form_label('Nome para exibição do arquivo');
        echo form_input(array('name' => 'nome', 'class' => 'six'), set_value('nome'), 'autofocus');
        echo form_label('Descrição');
        echo form_input(array('name' => 'descricao', 'class' => 'six'), set_value('descricao'));
        echo form_label('Arquivo');
        echo form_upload(array('name' => 'arquivo', 'class' => 'twelve'), set_value('arquivo'));
        echo anchor('midia/gerenciar', 'Cancelar', array('class' => 'button radius alert espaco'));
        echo form_submit(array('name' => 'cadastrar', 'class' => 'button radius'), 'Salvar dados');
        echo form_fieldset_close();
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
                $('input').click(function() {
                    (this).select();
                });

            });
        </script>

        <div class="twelve columns">
            <?php
            echo breadcrumb();
            get_msg('msgerro');
            get_msg('msgok');
            ?>

            <table class="twelve data-table">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Link</th>
                        <th>Miniatura</th>
                        <th class="text-center">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = $this->midia->get_all()->result();
                    foreach ($query as $linha) {
                        echo '<tr>';
                        printf('<td>%s</td>', $linha->nome);
                        printf('<td><input type="text" value="%s" /></td>', base_url("uploads/$linha->arquivo"));
                        printf('<td>%s</td>', thumb($linha->arquivo));
                        printf('<td class="text-center"> %s %s %s </td>', anchor("uploads/$linha->arquivo", ' ', array('class' => 'table-actions table-view', 'title' => 'Visualizar', 'target' => '_blank')), anchor("midia/editar/$linha->id", ' ', array('class' => 'table-actions table-edit', 'title' => 'Editar')), anchor("midia/excluir/$linha->id", ' ', array('class' => 'table-actions table-delete deletareg', 'title' => 'Excluir')));
                        echo '</tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <?php
        break;

    case 'editar' :
        $idmidia = $this->uri->segment(3);
        if ($idmidia == NULL) {
            set_msg('msgerro', 'Escolha uma mídia para continuar', 'erro');
            redirect('midia/gerenciar');
        }
        ?>
        <div class="twelve columns">
            <?php
            echo breadcrumb();
            if (is_admin() || $iduser == $this->session->userdata('user_id')) {
                $query = $this->midia->get_byid($idmidia)->row();
                erros_validacao();
                get_msg('msgok');
                get_msg('msgerro');
                echo form_open(current_url(), array('class' => 'custom'));
                echo form_fieldset('Alteração de Mídia');
                echo '<div class="row" >';
                echo '<div class="six columns">';
                echo form_label('Nome para exibição da imagem');
                echo form_input(array('name' => 'nome', 'class' => 'twelve'), set_value('nome', $query->nome), 'autofocus');
                echo form_label('Descrição');
                echo form_input(array('name' => 'descricao', 'class' => 'twelve'), set_value('descricao', $query->descricao));
                echo '</div>';
                echo '<div class="five columns">';
                echo thumb($query->arquivo, 200, 150);
                echo '</div>';
                echo '</div>';
                echo anchor('midia/gerenciar', 'Cancelar', array('class' => 'button radius alert espaco'));
                echo form_submit(array('name' => 'editar', 'class' => 'button radius'), 'Salvar dados');
                echo form_hidden('idmidia', $query->id);
                echo form_fieldset_close();
                echo form_close();
            } else {
                set_msg('msgerro', 'Seu usuario não tem permissão para executar esta operação', 'erro');
                redirect('midia/gerenciar');
            }
            ?>
        </div>
        <?php
        break;

    default :
        echo '<div class="alert-box alert"><p>A tela solicitada não existe!</p></div>';
        break;
}
