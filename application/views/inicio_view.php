<!DOCTYPE HTML>
<html lang="pt-BR">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="description" content="" />
        <meta name="abstract" content="" />
        <meta name="keywords" content="" />
        <meta name="reply-to" content="" />
        <meta name="creator" content=""/>
        <meta name="author" content="" />
        <meta name="title" content="" />
        <meta name="" content="" />
        <meta name="robots" content="INDEX, FOLLOW" />
        <meta name="language" content="Portuguese" />
        <meta name="doc-class" content="Completed" />
        <meta name="revisit-after" content="10 Day" />
        <meta name="classification" content="business" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

        <!--Favicon-->
        <link rel="shortcut icon" href="<?php echo base_url('img/favicon.ico'); ?>" />        
        <link rel="stylesheet" href="<?php echo base_url('css/icomoon.css'); ?>" />        
        
        <!--CSS e JS Global e da página-->
        {CSSglobal}
        {CSSpagina}

        <title><?php if (isset($titulo)) { ?> {titulo} | <?php } ?> {titulo_padrao} </title>
    </head>
    <body>
     
         {header} 
         {paginas} 
         {footer}
   
        {JSglobal}
        {JSpagina}
    </body>
</html>

