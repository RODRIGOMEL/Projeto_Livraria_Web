<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Open Book</title>
    <link rel="stylesheet" href="../assets/scss/main.css">
    <script src="../js/bootstrap/bootstrap.bundle.min.js"></script>
</head>

<!-- Remover e colocar em um arquivo .js depois -->
<script>
    function verificarCampos(form) {
        if (form.senha.value == form.confsenha.value) {
            return true;
        } else {
            return false;
        }
    }
</script>

<body class="align-items-center object-fit-contain background-image-signup">
    <?php require_once '../components/header.php'; ?>
    <div class="row text-center w-100 row-cols-auto mx-auto">
        <div class="col mx-auto my-auto text-center order-2 order-lg-1">
            <img src="../assets/icons/logo.svg" class="signup-logo">
        </div>
        <div class="col border-warning bg-dark text-white my-3 mx-auto p-4 rounded-4 order-1 order-lg-2">
            <form method="POST" action="../controllers/clienteController.php?acao=inserir" class="text-start" onsubmit="return verificarCampos(this);">
                <h2 class="text-warning text-center">Seja bem-vindo à Open Book!</h2>
                <p class="text-white text-center">Preencha os dados solicitados para criar sua conta.</p>
                <p class="text-white text-center mt-2">Já possui uma conta? <a href="" class="link-warning">Entre agora.</a></p>

                <div class="form-floating mb-3">
                    <input type="text" class="form-control text-white background-dark-light border-bottom border-top-0 border-start-0 border-end-0 border-3 rounded-bottom-0 border-warning me-2" id="nome" name="nome" placeholder="Nome" required>
                    <label for="nome" class="text-warning">Nome</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control text-white background-dark-light border-bottom border-top-0 border-start-0 border-end-0 border-3 rounded-bottom-0 border-warning me-2" id="cpf" name="cpf" placeholder="CPF" required>
                    <label for="cpf" class="text-warning">CPF</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="date" class="form-control text-white background-dark-light border-bottom border-top-0 border-start-0 border-end-0 border-3 rounded-bottom-0 border-warning me-2" id="datanasc" name="datanasc" placeholder="Data de Nascimento" required>
                    <label for="datanasc" class="text-warning">Data de Nascimento</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="email" class="form-control text-white background-dark-light border-bottom border-top-0 border-start-0 border-end-0 border-3 rounded-bottom-0 border-warning me-2" id="email" name="email" placeholder="Email" required>
                    <label for="email" class="text-warning">Email</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control text-white background-dark-light border-bottom border-top-0 border-start-0 border-end-0 border-3 rounded-bottom-0 border-warning me-2" id="telefone" name="telefone" placeholder="Telefone" required>
                    <label for="text" class="text-warning">Telefone</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control text-white background-dark-light border-bottom border-top-0 border-start-0 border-end-0 border-3 rounded-bottom-0 border-warning me-2" id="endereco" name="endereco" placeholder="Endereço" required>
                    <label for="text" class="text-warning">Endereço</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="password" class="form-control text-white background-dark-light border-bottom border-top-0 border-start-0 border-end-0 border-3 rounded-bottom-0 border-warning me-2" id="senha" name="senha" placeholder="Senha" required>
                    <label for="senha" class="text-warning">Senha</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="password" class="form-control text-white background-dark-light border-bottom border-top-0 border-start-0 border-end-0 border-3 rounded-bottom-0 border-warning me-2" id="confsenha" name="confsenha" placeholder="Confirmar Senha" required>
                    <label for="confsenha" class="text-warning">Confirmar Senha</label>
                </div>
                <div class="w-100 text-center">
                    <button type="submit" class="btn btn-warning btn-lg text-white text-center m-3 px-5">Cadastrar</button>
                </div>
            </form>
        </div>
    </div>

    <?php require_once '../components/footer.php'; ?>
</body>
</html>