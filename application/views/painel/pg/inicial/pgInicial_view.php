<div class="container">
    <div class="row-fluid">
        <div class="span3">
            <ul class="nav nav-tabs nav-stacked">
                <li class="alert alert-success"><strong>Configurações Página inicial</strong></li>
                <li><a  href="<?php echo base_url("inicio/painel_pagina_inicial"); ?>">Slide principal</a></li>
                <li><a href="<?php echo base_url("noticias"); ?>">Notícias</a></li>
            </ul>
            <ul class="nav nav-tabs nav-stacked">
                <li class="alert alert-danger"><strong>Outros links</strong></li>
                <li><a href="<?php echo base_url("noticias"); ?>">Notícias</a></li>
            </ul>
        </div>    
        <div class="span9">
            <?php
            switch ($tela) {
                case 'novoSlide':
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