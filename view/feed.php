    <div class="container col-md-7 mr-5 border-right">
        <div class="col-md-12 pl-5 pt-2">
            <div class="pl-5 pt-2">
                <h3>
                    <a class="text-info" href="?acao=usuario.view&nome=<?= $checkIn->getNomeUsuario(); ?>"> 
                        <?= $checkIn->getNomeUsuario(); ?> 
                    </a>
                    está bebendo uma
                    <a class="text-info" href="?acao=cerveja.view&nome=<?= $checkIn->getNomeCerveja(); ?>"> 
                        <?= $checkIn->getNomeCerveja(); ?> 
                    </a>
                    da
                    <a class="text-info" href="?acao=cervejaria.view&nome=<?= $checkIn->getNomeCervejaria(); ?>"> 
                        <?= $checkIn->getNomeCervejaria(); ?> 
                    </a>
                </h3>
                <div class="col-md-12 pl-0 pt-2 pb-5">
                    <div class="rateYo"></div>
                </div>
                <input name="avaliacao" class="avaliacao" type="hidden" value="<?= $checkIn->getAvaliacao(); ?>">
                
            