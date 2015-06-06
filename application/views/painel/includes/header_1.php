<header id="layout-header">
    <div class="clearfix container-fluid">
        <div class="row-fluid">
            <div class="span4">
                <a href="<?php echo base_url() ?>" id="logo">
                    <img src="<?php echo base_url("img/header.png") ?>" alt="Movimento web"> 
                </a>
            </div>
        </div>
    </div>
    <div class="navbar navbar-inverse">
        <div class="navbar-inner">
            <div class="container">
                <!-- .btn-navbar é usado como alternador para conteúdo de barra de navegação colapsável -->
                <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>

                <div class="nav-collapse">
                    <a href="<?php echo base_url("painel"); ?>" class="brand" ><span class="icon-home icon-white"></span></a>
                    <ul class="nav"> 
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Páginas <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                    <li><a href="<?php echo base_url("painel/inicial"); ?>"> <span class="i-user"></span> Inicial</a></li>

                                <li class="divider"></li>
                                <li><a href="#">Fazer uma pergunta ao administrador</a></li>
                            </ul>
                        </li>
                        <li><a href="<?php echo base_url("painel/cliente"); ?>">Clientes</a></li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Recursos <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="<?php echo base_url("painel"); ?>"> <span class="i-user"></span> Slide show</a></li>
                                <li><a href="<?php echo base_url("painel"); ?>"> <span class="i-user"></span> Formularios</a></li>
                                <li><a href="<?php echo base_url("painel"); ?>"> <span class="i-user"></span> Acesso Restrito</a></li>
                                <li><a href="<?php echo base_url("painel"); ?>"> <span class="i-user"></span> Sidebar</a></li>
                                <li><a href="<?php echo base_url("painel"); ?>"> <span class="i-user"></span> Produtos</a></li>
                                <li class="divider"></li>
                                <li><a href="<?php echo base_url("painel"); ?>"> <span class="i-user"></span> Todos os recursos</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Orçamentos <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="<?php echo base_url("painel"); ?>"> <span class="i-user"></span> Criar orçamento</a></li>
                                <li><a href="<?php echo base_url("painel"); ?>"> <span class="i-user"></span> Gerenciar orçamento</a></li>
                                <li class="divider"></li>
                                <li><a href="<?php echo base_url("painel"); ?>"> <span class="i-user"></span> Enviar link para o Questionário de Briefing</a></li>
                                <li><a href="<?php echo base_url("painel/orcamento"); ?>"> <span class="i-user"></span> Preencher Questionário de Briefing</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Manutenção <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="<?php echo base_url("painel/novoCliente"); ?>"> <span class="i-user"></span> Criar cliente</a></li>
                                <li><a href="<?php echo base_url("painel"); ?>"> <span class="i-user"></span> Gerar orçamento</a></li>
                                <li><a href="<?php echo base_url("painel"); ?>"> Verificar Telefone</a></li>
                                <li class="divider"></li>
                                <li><a href="<?php echo base_url("painel"); ?>"> Gerenciar orçamentos</a></li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="nav pull-right">
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="icon-check icon-white"></i> Área do cliente <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a tabindex="-1" href="#"><i class="icon-user"></i> Cadastrar-se</a></li>
                                <li><a tabindex="-1" href="<?php echo base_url("acessoRestito/login"); ?>"> <span class="i-user"></span> Entrar com minha conta</a></li>
                                <li><a tabindex="-1" href="#">Esqueci minha senha</a></li>
                                <li class="divider"></li>
                                <li><a tabindex="-1" href="#">Fazer uma pergunta ao administrador</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>  
        </div>
    </div>
</header>