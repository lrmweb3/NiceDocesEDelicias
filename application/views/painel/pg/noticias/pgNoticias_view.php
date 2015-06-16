<div class="container">
    <div class="row-fluid">
        <div class="span3">
            <ul class="nav nav-tabs nav-stacked">
                <li class="alert alert-danger"><strong>Configurações Página inicial</strong></li>
                <li><a  href="<?php echo base_url("noticias/cadastrar"); ?>">Cadastrar notícias</a></li>
                <li><a  href="<?php echo base_url("noticias/gerenciar"); ?>">Gerenciar</a></li>
            </ul>
        </div>    
        <div class="span9">
            <?php
            switch ($tela) {
                case 'cadastrar':
                    include_once 'pg/noticiaCadastrar.php';
                    break;

                case 'item':
                    include_once 'pg/item.php';
                    break;

                case 'gerenciar':
                    ?>
                    <strong class="label">Página Gerenciar em contrução</strong> 
                    <?php
                    break;

                default:
                    echo 'Página não encontrada';
                    break;
            }
            ?>
        </div>
    </div>
</div>