<!DOCTYPE HTML>
<html lang="pt-BR">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="description" content="Anthony Hall, livro Anthony Hall, livro E.X.T., livro EXT, E.X.T., EXT,  recife +55 81 8658 7238" />
        <meta name="abstract" content="ANTHONY HAL" />
        <meta name="keywords" content="ANTHONY HAL, recife, pernambuco, livro, EXT - Um dia a EvoluÃ§Ã£o nÃ£o precisarÃ¡ mais de nÃ³s" />
        <meta name="reply-to" content="http://www.movimentoweb.com.br" />
        <meta name="creator" content="Movimento Web | ANTHONY HAL- Recife - PE"/>
        <meta name="author" content="ANTHONY HAL | +55 81 8623-7504" />
        <meta name="title" content="ANTHONY HAL" />
        <meta name="creator.adress" content="reginaldo@movimentoweb.com.br" />
        <meta name="robots" content="INDEX, FOLLOW" />
        <meta name="language" content="Portuguese" />
        <meta name="doc-class" content="Completed" />
        <meta name="revisit-after" content="1 Day" />
        <meta name="classification" content="business" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!--Favicon-->
        <link rel="shortcut icon" href="<?php echo base_url('img/favicon.ico'); ?>" />        
        <link rel="stylesheet" href="<?php echo base_url('css/icomoon.css'); ?>" />        

        <!--CSS e JS Global e da página-->
        {CSSglobal}
        {CSSpagina}

        <title><?php if (isset($titulo)) { ?> {titulo} | <?php } ?> {titulo_padrao} </title>
    </head>
    <body>

        <div class="paginas">
            {header} 

            {paginas} 
            {footer}
        </div>
        {JSglobal}
        {JSpagina}
    </body>
</html>

