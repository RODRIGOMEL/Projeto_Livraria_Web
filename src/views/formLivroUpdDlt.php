<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . '/Projeto_Livraria_Web/src/controllers/livroController.php';

    switch ($_GET['acao']) {
        case "upd":
            $act = "atualizarLivro";
            break;
        case "dlt":
            $act = "excluirLivro";
            break;
        default:
            $act = "atualizarLivro";
            break;
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
    <script src="../js/bootstrap/bootstrap.bundle.min.js"></script>
    <script src="../js/validacaoJS/validacaoLivro.js"></script>
</head>

<body class="background-dark-light">
    <?php require_once '../components/header.php'; ?>
    <div class="container w-100 mx-auto mt-4">
        <h5><a href="javascript:history.back()" class="link-warning">
                < Voltar</a>
        </h5>
        <div class="border-warning bg-dark text-white mx-auto p-4 rounded-4 order-1 order-lg-2 mt-4">
            <?php
            $livroController = new LivroController();
            $livro = $livroController->buscarPorId($_GET['codLivro']);
            ?>
            <form id="livroForm" method="POST" action="../controllers/livroController.php?acao=<?php echo $act; ?>" class="row row-cols-1 row-cols-md-2 text-start mx-md-3">
                <h2 class="text-warning ms-md-3 mb-4 w-100">Dados do Livro</h2>

                <div class="col-md-2 form-floating col mb-3">
                    <input type="number" class="form-control text-white background-dark-light border-bottom border-top-0 border-start-0 border-end-0 border-3 rounded-bottom-0 border-warning me-2" id="codigo" name="codigo" placeholder="Código do Livro" value="<?php echo $livro['cod_livro']; ?>" readonly>
                    <label for="codlivro" class="text-warning ms-3">Código</label>
                </div>
                <div class="col-md-10 form-floating col mb-3">
                    <input type="text" class="form-control text-white background-dark-light border-bottom border-top-0 border-start-0 border-end-0 border-3 rounded-bottom-0 border-warning me-2" id="nome" name="nome" placeholder="Nome do Livro" value="<?php echo $livro['nome_livro']; ?>" required>
                    <label for="nome" class="text-warning ms-3">Nome do Livro</label>
                    <span id="erroNome" class="erro"></span>
                </div>
                <div class="col-md-4 form-floating col mb-3">
                    <input type="text" class="form-control text-white background-dark-light border-bottom border-top-0 border-start-0 border-end-0 border-3 rounded-bottom-0 border-warning me-2" id="isbn" name="isbn" placeholder="ISBN" value="<?php echo $livro['isbn_livro']; ?>" required>
                    <label for="isbn" class="text-warning ms-3">ISBN</label>
                    <span id="erroIsbn" class="erro"></span>
                </div>
                <div class=" col-md-4 form-floating col mb-3">
                    <input type="date" class="form-control text-white background-dark-light border-bottom border-top-0 border-start-0 border-end-0 border-3 rounded-bottom-0 border-warning me-2" id="data" name="data" placeholder="Data de Lançamento" value="<?php echo $livro['data_lancamento']; ?>" required>
                    <label for="data" class="text-warning ms-3">Data de Lançamento</label>
                    <span id="erroDataNascimento" class="erro"></span>
                </div>
                <div class="col-md-4 form-floating col mb-3">
                    <input type="text" class="form-control text-white background-dark-light border-bottom border-top-0 border-start-0 border-end-0 border-3 rounded-bottom-0 border-warning me-2" id="preco" name="preco" placeholder="Preço" value="<?php echo $livro['preco_livro']; ?>" required>
                    <label for="preco" class="text-warning ms-3">Preço</label>
                    <span id="erroPreco" class="erro"></span>
                </div>
                <div class="col-md-12 col mb-3">
                    <div class="form-floating">
                        <select class="form-select text-white background-dark-light border-bottom border-top-0 border-start-0 border-end-0 border-3 rounded-bottom-0 border-warning me-2" id="floatingSelectAutor" name="autor[]" multiple>
                        <?php
                        $livroController = new LivroController();
                        $autoresDisponiveis = $livroController->buscarNomeAutor(); // Todos os autores disponíveis
                        $autoresSelecionados = $livroController->buscarAutoresPorLivro($livro['cod_livro']); // Autores selecionados no formulárioAutoresLivro($livro['cod_livro']); // Autores do livro // Associações existentes
            
                        foreach ($autoresDisponiveis as $autor): ?>
                            <option value="<?= $autor['cod_autor'] ?>" 
                                <?= in_array($autor['cod_autor'], $autoresSelecionados) ? 'selected' : '' ?>>
                                <?= $autor['nome_autor'] ?>
                            </option>
                        <?php endforeach; ?>
                        </select>
                        <label for="floatingSelectAutor" class="text-warning">Selecione um Autor</label>
                    </div>
                </div>
                <div class="col-md-2 form-floating col mb-3">
                    <input type="number" class="form-control text-white background-dark-light border-bottom border-top-0 border-start-0 border-end-0 border-3 rounded-bottom-0 border-warning me-2" id="codeditora" name="codeditora" placeholder="Código da Editora" value="<?php echo $livro['cod_editora']; ?>" readonly>
                    <label for="codeditora" class="text-warning ms-3">Código</label>
                </div>
                <div class="col-md-10 col mb-3">
                    <div class="form-floating">
                        <select class="form-select text-white background-dark-light border-bottom border-top-0 border-start-0 border-end-0 border-3 rounded-bottom-0 border-warning me-2" id="floatingSelectEditora" name="editora">
                        <?php
                        $livroController = new LivroController();
                        $editoras = $livroController->buscarNomeEditora();
                        foreach ($editoras as $editora): ?>
                            <option value="<?php echo $editora['cod_editora'] ?>" <?php echo $livro['cod_editora'] == $editora['cod_editora'] ? 'selected' : '' ?>>
                                <?php echo $editora['nome_editora'] ?>
                            </option>
                        <?php endforeach; ?>
                        </select>
                        <label for="floatingSelectEditora" class="text-warning">Selecione uma Editora</label>
                    </div>
                </div>
                <div class="col-md-2 form-floating col mb-3">
                    <input type="number" class="form-control text-white background-dark-light border-bottom border-top-0 border-start-0 border-end-0 border-3 rounded-bottom-0 border-warning me-2" id="codgenero" name="codgenero" placeholder="Código do Gênero" value="<?php echo $livro['cod_genero']; ?>" readonly>
                    <label for="codgenero" class="text-warning ms-3">Código</label>
                </div>
                <div class="col-md-10 col mb-3">
                    <div class="form-floating">
                        <select class="form-select text-white background-dark-light border-bottom border-top-0 border-start-0 border-end-0 border-3 rounded-bottom-0 border-warning me-2" id="floatingSelectGenero" name="genero">
                            <?php
                            $livroController = new LivroController();
                            $generos = $livroController->buscarNomeGenero();
                            foreach ($generos as $genero): ?>
                                <option value="<?php echo $genero['cod_genero'] ?>" <?php echo $livro['cod_genero'] == $genero['cod_genero'] ? 'selected' : '' ?>>
                                    <?php echo $genero['nome_genero'] ?>
                                </option>
                            <?php endforeach; ?>
                            ?>
                        </select>
                        <label for="floatingSelectGenero" class="text-warning">Selecione um Gênero</label>
                    </div>
                </div>
                <div class="col-md-12 form-floating col mb-4">
                    <textarea class="form-control text-white background-dark-light border-bottom border-top-0 border-start-0 border-end-0 border-3 rounded-bottom-0 border-warning me-2" id="descricao" name="descricao" placeholder="Descrição" rows="12" style="height: 18em; resize: none;" required><?php echo $livro['descricao_livro']; ?></textarea>
                    <label for="descricao" class="text-warning ms-3">Descrição</label>
                    <span id="erroDescricao" class="erro"></span>
                </div>
                <div class="w-100 text-center text-md-start">
                <button type="submit" class="btn btn-warning btn-lg text-white text-center px-5"
                        <?php
                        if ($_GET['acao'] == "crt" || $_GET['acao'] == "dlt") {
                            echo "hidden";
                        }
                        ?>>Atualizar</button>

                    <button type="submit" class="btn btn-danger btn-lg text-white text-center px-5"
                        <?php
                        if ($_GET['acao'] == "upd" || $_GET['acao'] == "crt") {
                            echo "hidden";
                        }
                        ?>>Excluir</button>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content bg-dark">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Erro de cadastro</h1>
                                <button type="button" class="btn-close btn-close-white shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <h5>Preencha novamente os campos</h5>
                            </div>
                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-warning btn-lg text-light" data-bs-dismiss="modal">Ok</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="w-100 mt-1 pt-4">
        <?php require_once '../components/footer.php'; ?>
    </div>
</body>

</html>