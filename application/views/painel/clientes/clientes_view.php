<div class="container-fluid well">
    <legend>Página Clientes</legend>
    <div class="row-fluid">
        <div class="span3">
            <ul class="nav nav-tabs nav-stacked">
                <li class="active"><a href="#">Gernciamento de clientes</a></li>
                <li><a href="<?php echo base_url("painel/cliente"); ?>"> <span class="i-user"></span> Novo cliente</a></li>
                <li><a href="<?php echo base_url("cliente/novo_acesso"); ?>"> <span class="i-user"></span> Liberar novo acesso para Cliente</a></li>
                <li><a href="<?php echo base_url("painel"); ?>"> <span class="i-user"></span> Gerenciar clientes</a></li>
                <li><a href="<?php echo base_url("painel"); ?>"> <span class="i-user"></span> Resetar senha do cliente</a></li>
                <li><a href="<?php echo base_url("painel"); ?>"> <span class="i-user"></span> Enviar aviso</a></li>
            </ul>
        </div>
        <div class="span9 well">
            <?php
            switch ($tela) {
                case 'novo_acesso':
                    ?>
                    <legend>Novo Cliente</legend>
                    <div class="row-fluid">
                        <div class="pull-right">
                            <spna class="icon-home"></spna>
                            <spna class="icon-home"></spna>
                            <spna class="icon-home"></spna>
                            <spna class="icon-home"></spna>
                        </div>
                    </div>
                    <div class="row-fluid">
                        <form action="" method="post">
                            <label for="">Nome
                                <input name="nome" autofocus="" required="" type="text" class="input-block-level"/>
                            </label>
                            <label for="">Empresa
                                <input name="empersa" type="text" class="input-block-level"/>
                            </label>
                            <label for="">E-mail
                                <input name="email" autofocus="" required="" type="text" class="input-block-level"/>
                            </label>
                            <hr />
                            <div class="btn-toolbar pull-right">
                                <input type="reset" value="Limpar" class="btn"/>
                                <input type="submit" class="btn btn-success" value="Cadastrar"/>
                            </div>
                        </form>
                    </div>
                    <?php
                    break;

                case 'outrapagina':
                    ?>
                    {pgEmpresa}
                    <?php
                    break;

                case 'portfolio':
                    ?>
                    {pgPortfolio}
                    <?php
                    break;

                case 'contato':
                    ?>
                    {pgContato}
                    <?php
                    break;

                case 'orcamento':
                    ?>
                    {pgOrcamento}
                    <?php
                    break;

                case 'novoCliente':
                    ?>
                    {pgClientes}
                    <?php
                    break;


                default:
                    ?> 
                    <div class="container" style="margin-top: 60px;">
                        <div class="row-fluid">
                            <div class="span6 offset3 well"> 
                                <p>Página não encontrada por favor escolha um item a partir do menu a cima</p>
                            </div>
                        </div>
                    </div>

                    <?php
                    break;
            }
            ?>
        </div>
    </div>
</div>