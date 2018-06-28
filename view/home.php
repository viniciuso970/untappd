    <div class="container col-md-11">
        <h1 class="col-md-6 pb-4 border-bottom"> <?= $conta->getNome(); ?></h1>
        <div class="col-md-6 pt-4">
            <?php
                if( $_SESSION['user_name'] !==  $conta->getUsuario()){
                    // fazer os botões chamarem as funções
                    if(CtrConta::isAmigo($_SESSION['user_id'], $conta->getId())) { ?>
                        <form action="?acao=amizade.desfazer" method="post">
                            <input type="hidden" name="idUsuario" value="<?= $conta->getId(); ?>">
                            <button class="btn btn-yellow col-md-4 mt-2 mb-2 p-3" type="submit"> Desfazer amizade </button>
                        </form>
                    <?php } else { ?>
                        <form action="?acao=amizade.fazer" method="post">
                            <input type="hidden" name="idUsuario" value="<?= $conta->getId(); ?>">
                            <button class="btn btn-yellow col-md-4 mt-2 mb-2 p-3" type="submit"> Adicionar Amigo </button>
                        </form>
                    <?php } 
                } ?>
        </div>
        <h3 class="col-md-12"> <?= $conta->getUsuario(); ?> </h3>
        <h4 class="col-md-3 p-3 border text-center"> <?= $conta->getTotal(); ?> Total </h4>
        <h4 class="col-md-3 p-3 border text-center"> <?= $conta->getUnico(); ?> Único</h4>
        <h4 class="col-md-3 p-3 border text-center"> <?= $amigos; ?> Amigos</h4>
        <h4 class="col-md-3 p-3 border text-center"> <?= $badges; ?> Badges </h4>
    </div>

    <div class="col-md-12 pl-5">
        <h3 class="text-danger"> <?php echo(CtrUtils::printMsg()); ?></h3>
    </div>