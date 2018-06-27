    <div class="container col-md-11">
        <div class="col-md-6">
            <h1 class="col-md-12"> <?= $cerveja->getNome(); ?> </h1>
            <h3 class="col-md-12">
                <a class=" text-black-50" href="?acao=cervejaria.view&nome=<?= $cervejaria->getNome(); ?>">
                    <?= $cervejaria->getNome(); ?>
                </a>
            </h3>
            <h4 class="col-md-12"> Teor alcoólico: <?= $cerveja->getTeor(); ?> </h4>
            <h4 class="col-md-12 pb-4 border-bottom"> Tipo: <?= $cerveja->getTipo(); ?> </h4>
        </div>
        <div class="container col-md-5">
            <div class="col-md-12">
                <div class="col-md-12 text-center">
                    <h1 class="rating-num"> <?= $cerveja->getAvaliacao(); ?> </h1>
                    <h4>Médias das avaliações</h4>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <h4 class="col-md-2 text-center"> <?= $unicoTotal[0]; ?> Único</h4>
            <h4 class="col-md-2 text-center"> <?= $unicoTotal[1]; ?> Total</h4>
        </div>
    </div>