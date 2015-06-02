<div class="gradiente_pesquisa"></div>   

<div class="container">
    <div class="row-fluid">
        <div class="span3">
            <ul class="nav nav-tabs nav-stacked">
                <li class="alert alert-danger"><h4>Eventos por categorias</h4></li>
                <li><a href="#">Todos os eventos</a></li>
                <li><a href="#">Festa de Casamento</a></li>
                <li><a href="#">Aniversários de 15 anos</a></li>
                <li><a href="#">Aniversários de meninas</a></li>
                <li><a href="#">Aniversários de meninos</a></li>
                <li><a href="#">Aniversários de casamento</a></li>
                <li><a href="#">Festa de namorados</a></li>
                
            </ul>
        </div>    
        <?php
        switch ($tela) {
            case 'lista':
                include_once 'pg/lista.php';
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