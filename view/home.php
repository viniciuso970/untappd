    <div class="container col-md-11">
        <h1 class="col-md-12 pb-4 border-bottom"> <?= $conta->getNome(); ?></h1>
        <h3 class="col-md-12"> <?= $conta->getUsuario(); ?> </h3>
        <h4 class="col-md-3 p-3 border text-center"> <?= $conta->getTotal(); ?> Total </h4>
        <h4 class="col-md-3 p-3 border text-center"> <?= $conta->getUnico(); ?> Único</h4>
        <h4 class="col-md-3 p-3 border text-center"> <?= $amigos; ?> Amigos</h4>
        <h4 class="col-md-3 p-3 border text-center"> XXX Badges </h4>
    </div>
</body>

</html>