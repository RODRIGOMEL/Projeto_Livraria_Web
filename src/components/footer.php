<script>
    function footerBottom() {
        const body = document.body;
        const footer = document.getElementById("footer");

        if ($(window).height > body.offsetHeight) {
            footer.classList.add("fixed-bottom");
        }
    }
</script>

<footer class="bg-dark p-5 mt-5 w-100" onload="footerBottom()">
    <div class="container text-light">
        <div class="row">
            <div class="col align-self-center">
                <div class="row align-items-center">
                    <div class="col-2">
                        <a class="navbar-brand fs-4 text-warning" href="../views/index.php?acao=semacao">
                            <img src="../assets/icons/logo.svg" alt="Logo" height="80" class="d-inline-block align-text-top">
                            Open Book
                        </a>
                    </div>
                </div>
            </div>
            <div class="col align-self-start">
                <ul class="navbar-nav justify-content-start flex-grow-1 pe-3 ms-5">
                    <li>
                        <p class="lexend-title-semibold">Configurações</p>
                    </li>
                    <li class="">
                        <a class="nav-link active" href="../views/configuracoes.php">Preferências</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Pagamentos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Entregas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Suporte</a>
                    </li>
                </ul>
            </div>
            <div class="col align-items-start">
                <p class="lexend-title-semibold ms-2">Formas de Pagamento</p>
                <div class="row">
                    <div class="col-3">
                        <img src="../assets/icons/formasPagamento/metodoApplePay.svg" alt="">
                        <img src="../assets/icons/formasPagamento/metodoDinnersClube.svg" alt="">
                    </div>
                    <div class="col-3">
                        <img src="../assets/icons/formasPagamento/metodoMasterCard.svg" alt="">
                        <img src="../assets/icons/formasPagamento/metodoPayPal.svg" alt="">
                    </div>
                    <div class="col-3">
                        <img src="../assets/icons/formasPagamento/metodoGooglePay.svg" alt="">
                        <img src="../assets/icons/formasPagamento/metodoApplePay.svg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>