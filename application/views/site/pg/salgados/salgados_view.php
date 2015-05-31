<div class="gradiente_pesquisa"></div>
<div class="container doces">

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