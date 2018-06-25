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
                <?php
                    $i = 0; 
                    while($i < $item->getAvaliacao()) {
                        echo '<span class="glyphicon glyphicon-star yellow"></span>';
                        $i++;
                    }
                    while($i < 5) {
                        echo '<span class="glyphicon glyphicon-star-empty yellow"></span>';
                        $i++;
                    }
                ?>
                <a href="?acao=checkIn.comentario.<?= $item->getId(); ?>"> Mais informações</a>
            </div>
        </div>
        <?php }?>
    </div>