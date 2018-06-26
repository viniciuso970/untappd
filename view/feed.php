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
				<div class="col-md-12">
					<h4 class="col-md-1 p-3 text-center"><img src="assets/img/badges/badge1.jpg" width="50px" height="50px" style="<?= CtrUtils::isBadge($isBadge[0]) ?>"></h4>
					<h4 class="col-md-1 p-3 text-center"><img src="assets/img/badges/badge2.jpg" width="50px" height="50px" style="<?= CtrUtils::isBadge($isBadge[1]) ?>"></h4>
					<h4 class="col-md-1 p-3 text-center"><img src="assets/img/badges/badge3.jpg" width="50px" height="50px" style="<?= CtrUtils::isBadge($isBadge[2]) ?>"></h4>
					<h4 class="col-md-1 p-3 text-center"><img src="assets/img/badges/badge4.jpg" width="50px" height="50px" style="<?= CtrUtils::isBadge($isBadge[3]) ?>"></h4>
					<h4 class="col-md-1 p-3 text-center"><img src="assets/img/badges/badge5.jpg" width="50px" height="50px" style="<?= CtrUtils::isBadge($isBadge[4]) ?>"></h4>
					<h4 class="col-md-1 p-3 text-center"><img src="assets/img/badges/badge6.jpg" width="50px" height="50px" style="<?= CtrUtils::isBadge($isBadge[5]) ?>"></h4>
					<h4 class="col-md-1 p-3 text-center"><img src="assets/img/badges/badge7.jpg" width="50px" height="50px" style="<?= CtrUtils::isBadge($isBadge[6]) ?>"></h4>
					<h4 class="col-md-1 p-3 text-center"><img src="assets/img/badges/badge8.jpg" width="50px" height="50px" style="<?= CtrUtils::isBadge($isBadge[7]) ?>"></h4>
					<h4 class="col-md-1 p-3 text-center"><img src="assets/img/badges/badge9.jpg" width="50px" height="50px" style="<?= CtrUtils::isBadge($isBadge[8]) ?>"></h4>
					<h4 class="col-md-1 p-3 text-center"><img src="assets/img/badges/badge10.jpg" width="50px" height="50px" style="<?= CtrUtils::isBadge($isBadge[9]) ?>"></h4>
				</div>
                <div class="col-md-12 pl-0 pt-2 pb-5">
                    <div class="rateYo"></div>
                </div>
                <input name="avaliacao" class="avaliacao" type="hidden" value="<?= $checkIn->getAvaliacao(); ?>">
                
            