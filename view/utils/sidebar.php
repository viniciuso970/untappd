    <div class="container col-md-4">
        <h1 class="col-md-12 pb-4 border-bottom"> <?= $conta->getNome(); ?></h1>
        <h3 class="col-md-12"> 
            <a class=" text-info" href="?acao=homepage"> <?= $conta->getUsuario(); ?> </a>
        </h3>
        <a class="text-info" href="?acao=homepage">
            <h4 class="col-md-6 m-0 p-3 border text-center"> <?= $conta->getTotal(); ?> Total </h4>
        </a>
        <a class="text-info" href="?acao=homepage">
            <h4 class="col-md-6 m-0 p-3 border text-center"> <?= $conta->getUnico(); ?> Único </h4>
        </a>
        <a class="text-info" href="?acao=amigos">
            <h4 class="col-md-6 m-0 p-3 border text-center"> <?= $amigos; ?> Amigos </h4>
        </a>
        <a class="text-info" href="?acao=badges">
            <h4 class="col-md-6 m-0 p-3 border text-center"> <?= $badges; ?> Badges </h4>
        </a>
    </div>