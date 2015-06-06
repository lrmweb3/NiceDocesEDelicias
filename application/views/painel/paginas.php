<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
?>
<div class="row">
    <div class="three columns">
        <ul class="nav-bar vertical">
            <li class="active"><a href="#"><strong>BARRA DE MENUS</strong></a></li>
            <li class="has-flyout">
                <a href="#">Página inicial</a>                        
                <a href="#" class="flyout-toggle"><span></span></a>
                <ul class="flyout">                       
                    <li><a href="<?php echo base_url('paginas/inicial_gerenciarHealding'); ?>">Gerenciar Healding</a></li>
                    <li><a href="<?php echo base_url('paginas/inicial_gerenciarFeaturette'); ?>">Gerenciar Featurette</a></li>                                                                     
                </ul>
            </li>
            <li class=""><a href="<?php echo base_url('paginas/empresa') ?>">Página empresa</a></li>            
            <li class="has-flyout">
                <a href="<?php echo base_url('paginas/portfolio_gerenciar') ?>">Portfólio</a>                        
                <a href="#" class="flyout-toggle"><span></span></a>
                <ul class="flyout">
                    <li><a href="<?php echo base_url('paginas/portfolio_cadastrar') ?>">Cadastrar</a></li>
                    <li><a href="<?php echo base_url('paginas/portfolio_gerenciar') ?>">Gerenciar</a></li>                           
                </ul>
            </li>
            <li>
                <a href="<?php echo base_url('paginas/contato') ?>">Contato</a>                        
            </li>
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

            case 'gerenciar' :      //GERENCIAR PÁGINAS
                get_msg('msgerro');
                get_msg('msgok');
                ?>          
                <div class="panel callout">
                    <h3>Edição de páginas</h3>
                    <p> &laquo; Escolha um menu ao lado para continuar.</p>
                </div>
                <?php
                break;  //GERENCIAR PÁGINAS

            case 'dados_da_empresa':
                echo '<div class="twelve columns">';
                echo breadcrumb();
                erros_validacao();
                get_msg('msgok');
                get_msg('msgerro');
                echo form_open('settings/gerenciar', array('class' => 'custom'));
                echo form_fieldset('Configuração do sistema');
                echo form_label('Nome do site');
                echo form_input(array('name' => 'nome_site'), set_value('nome_site', get_setting('nome_site')), 'autofocus');
                echo form_label('URL da logomarca');
                echo form_input(array('name' => 'url_logomarca'), set_value('url_logomarca', get_setting('url_logomarca')));
                echo form_label('Email do administrador');
                echo form_input(array('name' => 'email_adm'), set_value('email_adm', get_setting('email_adm')));
                echo form_submit(array('name' => 'salvardados', 'class' => 'button radius'), 'Salvar configurações');
                echo form_fieldset_close();
                echo form_close();
                echo '</div>';
                break;

            case 'empresa':
                echo '<div class="twelve columns">';
                $query = $this->crud->get_all('empresa')->row();
                echo form_open_multipart(current_url(), array('class' => 'custom'));
                echo breadcrumb();
                erros_validacao();
                get_msg('msgok');
                get_msg('msgerro');
                echo form_fieldset('Editar página empresa');
                echo form_textarea(array('name' => 'conteudo', 'class' => 'twelve htmleditor', 'rows' => 20), set_value('conteudo', to_html($query->conteudo)));
                echo anchor('paginas/gerenciar', 'Voltar', array('class' => 'button radius alert espaco'));
                echo form_hidden('id', $query->id);
                echo form_submit(array('name' => 'editar', 'class' => 'button radius'), 'Salvar dados');
                echo form_fieldset_close();
                echo form_close();
                echo '</div>';
                break;

            case 'portfolio_cadastrar' :
                echo '<div class="twelve columns">';
                echo breadcrumb();
                erros_validacao();
                get_msg('msgok');
                get_msg('msgerro');
                echo form_open_multipart('paginas/portfolio_cadastrar', array('class' => 'custom')) . "\n";
                echo form_fieldset('Cadastrar portfólio') . "\n";
                echo form_label('Nome Cliente') . "\n";
                echo form_input(array('name' => 'nomeCliente'), set_value('nomeCliente'), 'autofocus') . "\n";
                echo form_label('Título do site') . "\n";
                echo form_input(array('name' => 'tituloSite'), set_value('tituloSite')) . "\n";
                echo form_label('Detalhes do ramo atividade do site') . "\n";
                echo form_input(array('name' => 'detalhes'), set_value('detalhes')) . "\n";
                echo form_label('WWW do web site') . "\n";
                echo form_input(array('name' => 'site'), set_value('site')) . "\n";
                echo form_label('Categoria') . "\n";
                echo form_input(array('name' => 'cat'), set_value('cat')) . "\n";
                echo form_label('Serviços efetuados no projeto');
                echo form_input(array('name' => 'servicos'), set_value('servicos')) . "\n";
                echo form_label('Tecnologias envolvidas') . "\n";
                echo form_input(array('name' => 'tec'), set_value('tec')) . "\n";
                echo form_label('Enviar magem do site') . "\n";
                echo form_upload(array('name' => 'imgSite'), set_value('imgSite')) . "\n";
                echo anchor('portfolio/gerenciar', 'Cancelar', array('class' => 'button radius alert espaco')) . "\n";
                echo form_submit(array('name' => 'cadastrar', 'class' => 'button radius'), 'Criar portfólio') . "\n";
                echo form_fieldset_close() . "\n";
                echo form_close() . "\n";
                echo '</div>' . "\n";
                break;

            case 'portfolio_gerenciar' :

                echo '<div class="twelve columns">';
                get_msg('msgerro');
                get_msg('msgok');
                echo breadcrumb();
                echo '<table class="twelve data-table"><thead><tr>' . "\n";
                echo '<th class="text-center">Img</th>' . "\n";
                echo '<th class="text-center">Cliente</th>' . "\n";
                echo '<th class="text-center">Site</th>' . "\n";
                echo '<th class="text-center">Detalhes</th>' . "\n";
                echo '<th class="text-center">Ações</th>' . "\n";
                echo '</tr>' . "\n" . '</thead>' . "\n" . '<tbody>' . "\n";
                $query = $this->crud->get_all('portfolio')->result();
                foreach ($query as $linha) {
                    echo '<tr>';
                    printf('<td>%s</td>' . "\n", thumb($linha->imgSite));
                    printf('<td>%s</td>' . "\n", $linha->nomeCliente);
                    printf('<td>%s</td>' . "\n", $linha->tituloSite);
                    printf('<td>%s</td>' . "\n", resumo_post($linha->detalhes, 10));
                    printf('<td class="text-center">%s%s</td>' . "\n", anchor("paginas/portfolio_editar/$linha->id", ' ', array('class' => 'table-actions table-edit button radius tiny paddingbtn', 'title' => 'Editar')), anchor("paginas/portfolio_excluir/$linha->id", ' ', array('class' => 'table-actions table-delete deletareg button radius tiny paddingbtn', 'title' => 'Excluir'))
                    );
                    echo '</tr>';
                }
                echo '</tbody></table></div>';
                break;

            case 'portfolio_editar' :

                $idRegistro = $this->uri->segment(3);
                if ($idRegistro == NULL) {
                    set_msg('msgerro', 'Escolha uma página para continuar', 'erro');
                    redirect('paginas/gerenciar');
                }
                echo '<div class="twelve columns">';
                $query = $this->crud->get_byid($idRegistro, 'portfolio')->row();
                echo breadcrumb();
                erros_validacao();
                get_msg('msgok');
                get_msg('msgerro');
                echo form_open_multipart(current_url(), array('class' => 'custom')) . "\n";
                echo form_fieldset('Editar portfólio') . "\n";
                echo '<div class="twelve columns">';
                echo '<div class="five columns">' . thumb($query->imgSite, 250, 150) . '<br /></div> ';
                echo '<div class="seven columns" style="margin-top: 40px;">';
                echo form_label('<strong>Selecione uma nova imagem para o post</strong>', 'imgSite', array('class' => 'col-lg-2 control-label'));
                echo form_upload(array('name' => 'imgSite'), set_value('imgSite', $query->imgSite)) . "\n";
                echo '</div></div>';
                echo form_label('Nome Cliente') . "\n";
                echo form_input(array('name' => 'nomeCliente'), set_value('nomeCliente', $query->nomeCliente), 'autofocus') . "\n";
                echo form_label('Título do site') . "\n";
                echo form_input(array('name' => 'tituloSite'), set_value('tituloSite', $query->tituloSite)) . "\n";
                echo form_label('Detalhes do ramo atividade do site') . "\n";
                echo form_textarea(array('name' => 'detalhes'), set_value('detalhes', $query->detalhes)) . "\n";
                echo form_label('Web site') . "\n";
                echo form_input(array('name' => 'site'), set_value('site', $query->site)) . "\n";
                echo form_label('Categoria') . "\n";
                echo form_input(array('name' => 'cat'), set_value('cat', $query->cat)) . "\n";
                echo form_label('Serviços efetuados no projeto');
                echo form_input(array('name' => 'servicos'), set_value('servicos', $query->servicos)) . "\n";
                echo form_label('Tecnologias envolvidas') . "\n";
                echo form_input(array('name' => 'tec'), set_value('tec', $query->tec)) . "\n";
                echo form_hidden('idRegistro', $query->id);
                echo form_submit(array('name' => 'cadastrar', 'class' => 'button radius'), 'Atualizar portfólio') . "\n";
                echo form_fieldset_close() . "\n";
                echo form_close() . "\n";
                echo '</div>';

                break;

            case 'contato':

                echo '<div class="twelve columns">';
                $query = $this->crud->get_all('contato')->row();
                echo form_open_multipart(current_url(), array('class' => 'custom'));
                echo breadcrumb();
                erros_validacao();
                get_msg('msgok');
                get_msg('msgerro');
                echo form_fieldset('Editar página contato');
                echo form_label('Título página contato');
                echo form_input(array('name' => 'titulo', 'class' => 'twelve'), set_value('titulo', $query->titulo), 'autofocus');
                echo form_textarea(array('name' => 'conteudo', 'class' => 'twelve htmleditor', 'rows' => 20), set_value('conteudo', to_html($query->conteudo)));
                echo anchor('paginas/gerenciar', 'Voltar', array('class' => 'button radius alert espaco'));
                echo form_hidden('id', $query->id);
                echo form_submit(array('name' => 'editar', 'class' => 'button radius'), 'Salvar dados');
                echo form_fieldset_close();
                echo form_close();
                echo '</div>';

                break;

            default :
                echo '<div class="alert-box alert"><p>A tela solicitada não existe! <a href="" class="close">&times;</a></p></div>';
                break;
        }
        ?>
    </div>  <!--nine columns-->
</div> <!--row páginas-->

