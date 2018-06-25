<div class="container col-md-7 mr-5 border-right">
        <?php foreach ($feed as $item) {?>
        <div class="col-md-12 pl-5 pb-4 pt-2">
            <div class="pl-5 pb-4 pt-2 border-bottom">
                <h3>
                    <a class="text-info" href="?acao=homepage"> <?= $item->getNomeUsuario(); ?> </a>
                    está bebendo uma
                    <a class="text-info" href="?acao=homepage"> <?= $item->getNomeCerveja(); ?> </a>
                    da
                    <a class="text-info" href="?acao=homepage"> <?= $item->getNomeCervejaria(); ?> </a>
                </h3>
                <div class="rateYo"></div>
                <input name="avaliacao" class="avaliacao" type="text" value="<?= $item->getAvaliacao(); ?>">
                <script>
                    $(function () {
                        var $avaliacao = $(".avaliacao").val();
                        $(".rateYo").rateYo({
                            spacing: "10px"
                        });
                        $rateYo = $(".rateYo").rateYo("option", "readOnly", true);
                        $(".rateYo").rateYo("rating", $avaliacao);
                    });
                </script>
                <a class="col-md-5" href="?acao=checkIn.comentario.<?= $item->getId(); ?>"> Mais informações</a>
            </div>
        </div>
        <?php }?>
    </div>