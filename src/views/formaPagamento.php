<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . "/Projeto_Livraria_Web/src/controllers/livroController.php";

    function imagefind($imgId) {
        $caminho = "../assets/imgs/static/bookcovers/";
        if (file_exists( $caminho . $imgId . ".png")) {
            return $caminho . $imgId . ".png";
        }
        else {
            return $caminho . "livroplaceholder.png";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Open Book</title>
    <link rel="stylesheet" href="../assets/scss/main.css">
    <link rel="stylesheet" href="../assets/scss/mensagemErro.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <script src="../js/bootstrap/bootstrap.bundle.min.js"></script>
    <script src="../js/validacaoJS/validacaoCartao.js"></script>
</head>

<body class="background-dark-light">
    <?php require_once "../components/header.php"; ?>
    <div class="container w-100 mx-auto mt-4">
        <h5><a href="javascript:history.back()" class="link-warning">
                < Voltar</a>
        </h5>
        <h2 class="text-warning mt-sm-5">Informações do Livro</h2>
        <div class="shadow p-3 mb-5 mt-sm-5 bg-dark rounded text-light">
                    <?php
                        $livroController = new LivroController();
                        $livro = $livroController->buscarLivroParaCompra($_GET['codLivro']);
                    ?>
                    <div class="row">
                        <div class="col book-buy-image-bg bg-white rounded-4 text-center m-2">
                            <img src="<?php echo imagefind($livro['livro_id']); ?>" alt="Imagem do Livro" class="mx-auto book-buy-image">
                        </div>
                        <div class="col">
                            <ul class="navbar-nav">
                                <li class="text-warning fs-4 mb-sm-2"><?php echo $livro['nome_livro'] ?></li>
                                <li class="my-sm-2 fs-5">Autor: <?php echo $livro['autor'] ?></li>
                                <li class="my-sm-2 fs-5">Editora: <?php echo $livro['editora'] ?></li>
                                <li class="my-sm-2 fs-5">Gênero: <?php echo $livro['genero'] ?></li>
                                <li class="text-warning fs-4">R$ <?php echo $livro['preco_livro'] ?></li>
                            </ul>
                            <p class="text-break mt-sm-3">Descrição: <?php echo $livro['descricao_livro'] ?></p>
                        </div>
                    </div>
                </div>
        <div class="border-warning bg-dark text-white mx-auto p-4 rounded-4 order-1 order-lg-2 mt-4">
            <form id="cartaoForm" method="POST" action="" class="row row-cols-1 row-cols-md-2 text-start mx-md-3">
                <h2 class="text-warning ms-md-3 mb-4 w-100">Dados do Cartão</h2>
                <div class="col-md-12 form-floating col mb-3">
                    <input type="text" class="form-control text-white background-dark-light border-bottom border-top-0 border-start-0 border-end-0 border-3 rounded-bottom-0 border-warning me-2" id="nomecartao" name="nomecartao" placeholder="Nome do titular do cartão" maxlength="60" required>
                    <label for="nomecartao" class="text-warning ms-3">Nome do Titular do Cartão</label>
                    <span id="erroNome" class="erro"></span>
                </div>
                <div class="col-md-6 form-floating col mb-3">
                    <input type="text" class="form-control text-white background-dark-light border-bottom border-top-0 border-start-0 border-end-0 border-3 rounded-bottom-0 border-warning me-2" id="numerocartao" name="numerocartao" placeholder="Número do Cartão" maxlength="16" required>
                    <label for="numerocartao" class="text-warning ms-3">Número do Cartão</label>
                    <span id="erroNumero" class="erro"></span>
                </div>
                <div class="form-floating col-md-3 col mb-4">
                    <input type="text" class="form-control text-white background-dark-light border-bottom border-top-0 border-start-0 border-end-0 border-3 rounded-bottom-0 border-warning me-2" id="cvv" name="cvv" placeholder="CVV" maxlength="3" required>
                    <label for="cvv" class="text-warning ms-3">CVV</label>
                    <span id="erroCvv" class="erro"></span>
                </div>
                <div class="form-floating col-md-3 col mb-4">
                    <input type="text" class="form-control text-white background-dark-light border-bottom border-top-0 border-start-0 border-end-0 border-3 rounded-bottom-0 border-warning me-2" id="validadecartao" name="validadecartao" placeholder="Validade do Cartão" maxlength="5" required>
                    <label for="validadecartao" class="text-warning ms-3">Validade do Cartão</label>
                    <span id="erroValidade" class="erro"></span>
                </div>
                <div class="w-100 text-center text-md-start">
                    <button onclick="redireciona()" type="submit" class="btn btn-warning btn-lg text-white text-center px-5">Pagar</button>
                </div>
            </form>
        </div>
    </div>
    <div class="w-100 mt-5 pt-5">
        <?php require_once "../components/footer.php"; ?>
    </div>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
</body>

</html>