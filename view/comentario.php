            <?php foreach($comentario as $item) {
                $comentou = CtrConta::getConta($item->getIdConta());    
            ?>
            <div class="comentario">
                <h4>
                    <a class="text-info" href="?acao=perfil&usuario=<?= $comentou->getUsuario();?>"> <?= $comentou->getNome(); ?> </a> comentou no seu check-in:
                </h4>
                <h4 class="text-dark text-justify pl-5 pb-4 pt-2 border-bottom">
                    <?= $item->getTexto(); ?>
                </h4>
            </div>
            <?php }
            if($_GET['acao'] !== 'checkIn.comentario') {
            ?>
            <form action="?acao=checkIn.comentario" method="post">
                <input type="hidden" name="idConta" value="<?= $checkIn->getIdConta(); ?>">
                <input type="hidden" name="idCheckIn" value="<?= $checkIn->getId(); ?>">
                <button class="btn btn-primary text-white col-md-5"> Mais informações </button>
            </form>
            <?php } ?>