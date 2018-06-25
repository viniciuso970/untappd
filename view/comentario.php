            <?php foreach($comentario as $item) {
                $comentou = CtrConta::getConta($item->getIdConta());    
            ?>
            <div class="comentario">
                <h4>
                    <a class="text-info" href="?acao=homepage"> <?= $comentou->getNome(); ?> </a> comentou no seu check-in:
                </h4>
                <h4 class="text-dark text-justify pl-5 pb-4 pt-2 border-bottom">
                    <?= $item->getTexto(); ?>
                </h4>
            </div>
            <?php }?>
            <form class="col-md-12" action="?acao=checkIn.comentario">
                <input type="hidden" name="idConta" value="<?= $checkIn->getIdConta(); ?>">
                <input type="hidden" name="idCheckIn" value="<?= $checkIn->getId(); ?>">
                <button class="btn btn-primary text-white col-md-5"> Mais informações </button>
            </form>
            <form class="col-md-12 mt-4" action="/action_page.php">
                <div class="form-group">
                    <label for="comentario">Digite seu comentário:</label>
                    <textarea name="comentario" class="form-control" rows="3" id="comentario"></textarea>
                </div>
                <button type="submit" class="btn btn-default col-md-12">Submit</button>
            </form>
        </div>
    </div>
</div>