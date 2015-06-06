<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
?>
<div class="row">
    <div class="three columns">
        <ul class="nav-bar vertical">
            <li class="active"><a href="#"><strong>MENUS</strong></a></li>
            <li class=""><a href="<?php echo base_url('posts/cadastrar') ?>">Novo post</a></li>   
            <li class=""><a href="<?php echo base_url('posts/gerenciar') ?>">Gerenciar posts</a></li>   
            <li class=""><a href="<?php echo base_url('posts/estatisticas') ?>">Estatísticas de acesso</a></li>                                                        
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

            case 'cadastrar' :
                breadcrumb();
                ?>
                <form enctype="multipart/form-data" accept-charset="utf-8" class="custom" action="<?php echo base_url('posts/cadastrar') ?>" method="post">
                    <fieldset id="" class="form-control" style="margin-top: 0;"><legend>Criar post</legend>
                        <?php
                        erros_validacao();
                        get_msg('msgok');
                        get_msg('msgerro');
                        ?>
                        <div class="form-group panel">
                            <label for="imgPost" class="col-lg-2 control-label"><strong>Selecione uma imagem</strong></label>                                        
                            <input type="file" name="imgPost" class="form-control" id="imgPost" placeholder="" value="" />        
                            <label for="titulo" class="col-lg-2 control-label">Selecione a categoria do post</label>     
                            <select class="selector" name="categoria" value="">
                                <option></option>
                                <option>Informativo</option>
                                <option>Notícias</option>
                            </select>
                        </div>                   
                        <div class="form-group">
                            <label for="titulo" class="col-lg-2 control-label">Título do post:</label>                   
                            <input type="text" name="titulo" class="form-control" id="titulo" placeholder="" autofocus=""/>                   
                        </div>
                        <div class="form-group">
                            <label for="compTitulo" class="col-lg-2 control-label">Complemento do título:</label>                  
                            <input type="text" name="compTitulo" class="form-control" id="compTitulo" placeholder="" />                      
                        </div>
                        <div class="form-group">
                            <label for="detalhes" class="col-lg-2 control-label">Detalhes:</label>                                                                  
                            <textarea name="detalhes" rows="5" class="form-control" id="detalhes" value="" placeholder="detalhes..."></textarea>              
                        </div>                                           
                        <input type="hidden" name="slug" />
                        <div class="form-group">
                            <div class="col-lg-offset-2 col-lg-10">
                                <input type="submit" class="button success radius right" name="cadastrar-posts" value="Cadastrar post &raquo;">
                            </div>
                        </div>
                    </fieldset>
                </form> 
                <?php
                break;

            case 'gerenciar' :

                echo '<div class = "twelve columns">';
                get_msg('msgerro');
                get_msg('msgok');
                echo breadcrumb();
                echo '<table class="twelve data-table">';
                echo '<thead><tr>';
                echo '<th>Imagem</th>';
                echo '<th class="text-center">Título</th>';
                echo '<th class="text-center">Status</th>';
                echo '<th class="text-center">Ações</th>';
                echo '</tr></thead>';
                echo '<tbody>';
                $query = $this->posts->get_all()->result();
                foreach ($query as $linha) {
                    echo '<tr>';
                    printf('<td class="text-center">%s</td>' . "\n", thumb($linha->imgPost, 100, 70));
                    printf('<td><strong>%s</strong> - %s <br /> %s</td>' . "\n", $linha->titulo, $linha->compTitulo, resumo_post($linha->detalhes, 7));
                    printf('<td class="text-center">%s</td>' . "\n", ($linha->ativo == 0) ? '<a href="' . base_url('posts/ativar/' . $linha->id) . '" class="button radius tiny alert">Inativo</a>' : '<a href="' . base_url('posts/desativar/' . $linha->id) . '" class="button radius tiny success">Ativo</a>');
                    printf('<td class="text-center">%s%s</td>' . "\n", anchor("posts/editar/$linha->id", ' ', array('class' => 'table-actions table-edit button radius tiny paddingbtn', 'title' => 'Editar')), anchor("posts/excluir/$linha->id", ' ', array('class' => 'table-actions table-delete deletareg button radius tiny paddingbtn', 'title' => 'Excluir')));
                    echo '</tr>';
                }
                echo '</tbody></table></div>';
                break;

            case 'editar' :
                $idRegistro = $this->uri->segment(3);
                if ($idRegistro == NULL) {
                    set_msg('msgerro', 'Escolha um usuario para continuar', 'erro');
                    redirect('posts/gerenciar');
                }
                echo breadcrumb() . "\n";
                if (is_admin() || $idRegistro == $this->session->userdata('user_id')) {
                    $query = $this->posts->get_byid($idRegistro)->row();
                    erros_validacao();
                    get_msg('msgerro') . "\n";
                    get_msg('msgok') . "\n";
                    ;
                    echo form_open_multipart(current_url(), array('class' => 'custom'));
                    echo form_fieldset('Editar posts', array('class' => 'form-control'));
                    ?>

                    <div class="form-group panel">
                        <div class="twelve columns">
                            <div class="five columns">
            <?php echo thumb($query->imgPost, 250, 150) ?>
                                <br />                                       
                            </div> 
                            <div class="seven columns" style="margin-top: 40px;">
                                <label for="imgPost" class="col-lg-2 control-label"><strong>Selecione uma nova imagem para o post</strong></label>                                        
                                <input type="file" name="imgPost" class="form-control" id="imgPost" placeholder="" value="<?php echo $query->imgPost ?>" />   
                            </div>
                        </div>
                        <hr />
                        <br />
                        <div class="row">
                            <div class="four columns">
                                <label for="categoria" class="col-lg-2 control-label">Selecione a categoria do post</label>    
                                <?php
                                echo form_dropdown('categoria', array('informativo' => 'Informativo', 'noticia' => 'Notícia'), set_value('categoria', $query->categoria));
                                ?>                                                                            
                            </div>
                        </div>
                    </div>                         
                    <div class="form-group">
                        <label for="titulo" class="col-lg-2 control-label">Título do post:</label>                   
                        <input type="text" name="titulo" class="form-control" id="titulo" placeholder="" value="<?php echo $query->titulo ?>" autofocus=""/>                   
                    </div>
                    <div class="form-group">
                        <label for="compTitulo" class="col-lg-2 control-label">Complemento do título:</label>                  
                        <input type="text" name="compTitulo" class="form-control" id="compTitulo" placeholder="" value="<?php echo $query->compTitulo ?>"/>                      
                    </div>
                    <div class="form-group">                                                             
                        <?php
                        echo form_label('Detalhes') . "\n";
                        echo form_textarea(array('name' => 'detalhes'), set_value('detalhes', $query->detalhes)) . "\n";
                        ?>
                    </div>
                    <input type="hidden" name="idregistro" value="<?php echo $query->id ?>"/>
                    <input type="hidden" name="slug" />
                    <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-10">
                            <input type="submit" class="button success radius right" name="cadastrar-posts" value="Atualizar post &raquo;">
                        </div>
                    </div>

                    </fieldset>
                    </form> 
                    <?php
                }
                break;

            case 'ativar_desativar':

                echo '<div class = "twelve columns">';
                echo '<table class="twelve data-table">';
                echo '<thead>';
                echo '<tr>';
                echo '<th>Imagem</th>';
                echo '<th class="text-center">Título</th>';
                echo '<th class="text-center">Ativo</th>';
                echo '</tr>';
                echo '</thead>';
                echo '<tbody>';
                $query = $this->posts->get_all()->result();
                foreach ($query as $linha) {
                    echo '<tr>';
                    printf('<td class="text-center">%s</td>' . "\n", thumb($linha->imgPost, 100, 70));
                    printf('<td><strong>%s</strong> - %s <br /> %s</td>' . "\n", $linha->titulo, $linha->compTitulo, resumo_post($linha->detalhes, 20));
                    printf('<td class="text-center">%s</td>' . "\n", ($linha->ativo == 0) ? '<a href="' . base_url('posts/ativar/' . $linha->id) . '" class="button radius tiny alert">Inativo</a>' : '<a href="' . base_url('posts/desativar/' . $linha->id) . '" class="button radius tiny success">Ativo</span>');
                    //printf('<td class="text-center">%s%s</td>' . "\n", anchor("posts/editar/$linha->id", ' ', array('class' => 'table-actions table-edit button radius tiny paddingbtn', 'title' => 'Editar')), anchor("posts/excluir/$linha->id", ' ', array('class' => 'table-actions table-delete deletareg button radius tiny paddingbtn', 'title' => 'Excluir')));
                    echo '</tr>';
                }
                echo '</tbody>';
                echo '</table>';
                echo '</div>';

                break;

            case 'estatisticas':

                echo '<div class = "twelve columns">';
                get_msg('msgerro');
                get_msg('msgok');
                echo breadcrumb();

                echo '<table class="twelve data-table">';
                echo '<thead><tr>';
                echo '<th>Acessos</th>';
                echo '<th class="text-center">Imagem</th>';
                echo '<th class="text-center">Título</th>';
                echo '</tr>';
                echo '</thead><tbody>';
                $query = $this->posts->get_all('ativo', 'ativo', 'posts')->result();
                foreach ($query as $linha) {
                    echo '<tr>';
                    printf('<td>%s</td>' . "\n", $linha->acessos);
                    printf('<td class="text-center">%s</td>' . "\n", thumb($linha->imgPost, 100, 70));
                    printf('<td><strong>%s</strong> - %s <br /> %s</td>' . "\n", $linha->titulo, $linha->compTitulo, resumo_post($linha->detalhes, 20));
                    echo '</tr>';
                }
                echo '</tbody></table>';
                echo '</div>';
                break;

            default :
                echo '<div class="alert-box alert"><p>A tela solicitada não existe! <a href="" class="close">&times;</a></p></div>';
                break;
        }
        ?>
    </div>