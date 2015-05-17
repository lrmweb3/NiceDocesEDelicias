<div id="container">
    <div id="paginas">
        <?php
        switch ($tela) {

            case 'home':
               include_once 'pg/home_view.php';
                break;

            case 'oLivro':
                include_once 'pg/o_livro.php';
                break;

            case 'oAutor':
                include_once 'pg/o_autor.php';
                break;

            case 'curiosidades':
                include_once 'pg/curiosidades.php';
                break;

            case'comprar':
                include_once 'pg/comprar.php';
                break;

            case'leituraRecomendada':
                include_once 'pg/leitura_recomedada.php';
                break;

            case 'contato':
                include_once 'pg/contato.php';
                break;

            default:
                include_once 'pg/home.php';
                break;
        }
        ?>

    </div> 


</div>

