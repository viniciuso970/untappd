    <div class="container col-md-11">
        <div class="col-md-6">
            <h1 class="col-md-12"> <?= $cervejaria->getNome(); ?> </h1>
            <h4 class="col-md-12"> <?= $cervejaria->getCidade(); ?> </h4>
            <h4 class="col-md-12"> <?= $cervejaria->getEstado(); ?> </h4>
            <h4 class="col-md-12"> <?= $cervejaria->getPais(); ?> </h4>
            <h4 class="col-md-12 pb-4 border-bottom"> Tipo: <?= $cervejaria->getTipo(); ?> </h4>
        </div>
        <div class="container col-md-5">
            <div class="col-md-12">
                <div class="col-md-12 text-center">
                    <h1 class="rating-num"> <?= $cervejaria->getAvaliacao(); ?> </h1>
                    <h4>Médias das avaliações</h4>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <h4 class="col-md-2 text-center"> <?= $unicoTotal[0]; ?> Único</h4>
            <h4 class="col-md-2 text-center"> <?= $unicoTotal[1]; ?> Total</h4>
        </div>
    </div>    
    <div class="container col-md-6 mb-5">
        <h2 class="col-md-12 mt-5 pb-4 border-bottom"> Cervejas</h2>
        <?php foreach($cervejas as $item) {?>
        <h4 class="col-md-12 pb-2 pt-2">
            <a class="text-info" href="?acao=cerveja.view&nome=<?= $item->getNome(); ?>"> <?= $item->getNome(); ?> </a>
        </h4>
        <?php }?>
    </div>

</body>

</html>