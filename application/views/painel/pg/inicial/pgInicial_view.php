<div class="container">
    <div class="row-fluid">
        <div class="span3">
            <ul class="nav nav-tabs nav-stacked">
                <li class="alert alert-danger"><strong>Configurações Página inicial</strong></li>
                <li><a  href="<?php echo base_url("inicio/slidePrincipal"); ?>">Slide Primcipal</a></li>
                <li><a  href="#">Posts</a></li>
                <li><a href="#">Notícias </a></li>

            </ul>
        </div>    
        <div class="span9">
            <?php
            switch ($tela) {
                case 'lista':
                    include_once 'pg/novoSlide.php';
                    break;

                case 'item':
                    include_once 'pg/item.php';
                    break;

                case 'gerenciar':
                    ?>
                    Página em contrução
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