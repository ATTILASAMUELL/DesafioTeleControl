<nav class="navbar navbar-expand-sm bg-dark navbar-dark" id="menuPrincipal"  style="display: none">
  <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="http://localhost/sistema-vendas/App/View/index.php">Loja ATTILA</a>
      </li>
      <?php if(isset($_SESSION['adm'] )): ?>
        <li class="nav-item">
          <a class="nav-link  "  role="button" href="http://localhost/sistema-vendas/App/View/paineladministrativo.php">Painel Administrativo</a>
        </li>
        <li class="nav-item">
          <a class="nav-link  "  role="button" onclick="sair()" >Sair</a>
        </li>
      <?php elseif(isset($_SESSION['email'])): ?>
        <li class="nav-item">
          <a  class="nav-link  "  role="button" data-toggle="modal" onclick="listandocarrinho()" data-target="#exampleModal3">Carrinho   <span class="badge badge-light" id="iconeCarrinho"></span></a>
        </li>
        <li class="nav-item">
          <a  class="nav-link  "  role="button" data-toggle="modal" onclick="pedidosRedi()" data-target="#exampleModal">Pedidos</a>
        </li>



        <li class="nav-item">
          <a class="nav-link  "  role="button"  onclick="sair()">Sair</a>
        </li>
      
      <?php else: ?>
        <li class="nav-item">
          <a class="nav-link  "  role="button" data-toggle="modal" data-target="#exampleModal1">Cadastrar</a>
        </li>
        <li class="nav-item">
          <a class="nav-link  "  role="button" data-toggle="modal" data-target="#exampleModal2">Login</a>
        </li>
      <?php endif; ?>


      
  </ul>
</nav>