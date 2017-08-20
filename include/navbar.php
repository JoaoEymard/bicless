<nav class="row navbar navbar-findcond navbar-top">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"><span class="glyphicon glyphicon-menu-hamburger"></span></button>
    </div>
    <div class="collapse navbar-collapse">
        <ul class="nav navbar-nav navbar-right" style="margin-right: 15px;">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">User <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="./crud_servicos.php">Serviços</a></li>
                    <li><a href="include/logout.php">Sair</a></li>
                </ul>
            </li>
        </ul>
        <form class="navbar-form navbar-left search-form" role="search" action="listar_cliente.php" method="get">
            <div class="input-group">
                <div class="input-group-btn">
                    <button class="btn" type="submit"><span class="glyphicon glyphicon-search"></span></button>
                </div>
                <input type="text" name="c" id="input-navbar-pesquisa-cliente" class="form-control" placeholder="Procurar Cliente" autocomplete="off" onkeyup="myFunction()" />
            </div>
        </form>
    </div>
</nav>
<div class="list_navbar_cliente hidden-xs">
    <div id="ul-list-navbar-cliente" class="list-group"></div>
</div>

