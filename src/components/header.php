<?php
  session_start();
  @$_SESSION["usuario"];
  $redirect;

  if (empty($_SESSION["usuario"])) {
    $redirect = "../views/login.php";
  } else {
    $redirect = "../views/configuracoes.php?acao=semacao";
  }
  
?>

<nav class="navbar navbar-expand-lg border-bottom border-warning border-4 navbar-dark bg-dark w-100">
  <div class="container-fluid mx-5">
    <!-- Logo -->
    <a class="navbar-brand fs-4 text-warning col-4 col-md-auto" href="../views/index.php?acao=semacao">
      <img src="../assets/icons/logo.svg" alt="Logo" width="50" height="40" class="d-inline-block align-text-top">
      Open Book
    </a>
    <!-- Toggle -->
    <button class="navbar-toggler shadow-none border-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions">
      <span class="navbar-toggler-icon"></span>
    </button>
    <!-- SideBar -->
    <div class="offcanvas offcanvas-start navbar-dark bg-dark" tabindex="-1" id="offcanvasWithBothOptions" data-bs-scroll="true" aria-labelledby="offcanvasWithBothOptionsLabel">
      <div class="offcanvas-header">
        <!-- Logo -->
        <a class="navbar-brand fs-4 text-warning" href="../views/index.php?acao=semacao">
          <img src="../assets/icons/logo.svg" alt="Logo" width="50" height="40" class="d-inline-block align-text-top">
          Open Book
        </a>
        <button type="button" class="btn-close btn-close-white shadow-none" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3 me-5">
          <li class="nav-item mx-2">
            <a class="nav-link" aria-current="page" href="../views/index.php?acao=semacao">Home</a>
          </li>
          <li class="nav-item mx-2">
            <a class="nav-link" href="../views/livrosCompra.php?acao=semacao">Livros</a>
          </li>
          <li class="nav-item mx-2">
            <a class="nav-link mb-3 mb-md-0" href="../views/verAutores.php?acao=semacao">Autores</a>
          </li>
        </ul>
        <form class="d-flex mb-3 mb-md-0" role="search">
          <img class="ms-lg-5 me-2" src="../assets/icons/search.svg" alt="Ícone de busca" width="45" height="45">
          <input class="form-control background-dark-light text-warning border-dark me-2" type="search" placeholder="Pesquisar" aria-label="Search">
        </form>
        <a href="../views/carrinhoCompras.php?acao=semacao" class="me-md-0 me-3">
          <img class="ms-lg-5" src="../assets/icons/cartBuy.svg" alt="Ícone de carrinho de compras" width="45" height="45">
        </a>
        <a href="<?php echo $redirect; ?>">
          <img class="ms-lg-5" src="../assets/icons/personCircle.svg" alt="Ícone de usuário" width="45" height="45">
        </a>
      </div>
    </div>
  </div>
</nav>