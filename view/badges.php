<div class="container col-md-11">
	<h1 class="col-md-12 pb-4 border-bottom"> Badges</h1>
	<div class="col-md-12 border-bottom">
		<h4 class="col-md-8 pt-4"> 1) Badge “Bem vindo – primeiro check in" </h4>
		<h4 class="col-md-3 text-right"><img src="assets/img/badges/badge1.jpg" width="50px" height="50px" style="<?= CtrUtils::isBadge($isBadge[0]) ?>"></h4>
		<h4 class="col-md-1"><?= CtrUtils::isBadge($isBadge[0]) === "" ? "<span class='badge ml-5'>$isBadge[0]</span>" : "";?></h4>
	</div>
	<div class="col-md-12 border-bottom">
		<h4 class="col-md-8 pt-4"> 2) Badge “Bebendo no happy our”</h4>
		<h4 class="col-md-3 text-right"><img src="assets/img/badges/badge2.jpg" width="50px" height="50px" style="<?= CtrUtils::isBadge($isBadge[1]) ?>"></h4>
		<h4 class="col-md-1"><?= CtrUtils::isBadge($isBadge[1]) === "" ? "<span class='badge ml-5'>$isBadge[1]</span>" : "";?></h4>
	</div>
	<div class="col-md-12 border-bottom">
		<h4 class="col-md-8 pt-4"> 3) Badge “Ufa, hoje é sexta-feira” </h4>
		<h4 class="col-md-3 text-right"><img src="assets/img/badges/badge3.jpg" width="50px" height="50px" style="<?= CtrUtils::isBadge($isBadge[2]) ?>"></h4>
		<h4 class="col-md-1"><?= CtrUtils::isBadge($isBadge[2]) === "" ? "<span class='badge ml-5'>$isBadge[2]</span>" : "";?></h4>
	</div>
	<div class="col-md-12 border-bottom">
		<h4 class="col-md-8 pt-4"> 4) Badge 25 cervejas </h4>
		<h4 class="col-md-3 text-right"><img src="assets/img/badges/badge4.jpg" width="50px" height="50px" style="<?= CtrUtils::isBadge($isBadge[3]) ?>"></h4>
		<h4 class="col-md-1"><?= CtrUtils::isBadge($isBadge[3]) === "" ? "<span class='badge ml-5'>$isBadge[3]</span>" : "";?></h4>
	</div>
	<div class="col-md-12 border-bottom">
		<h4 class="col-md-8 pt-4"> 5) Badge 50 cervejas </h4>
		<h4 class="col-md-3 text-right"><img src="assets/img/badges/badge5.jpg" width="50px" height="50px" style="<?= CtrUtils::isBadge($isBadge[4]) ?>"></h4>
		<h4 class="col-md-1"><?= CtrUtils::isBadge($isBadge[4]) === "" ? "<span class='badge ml-5'>$isBadge[4]</span>" : "";?></h4>
	</div>
	<div class="col-md-12 border-bottom">
		<h4 class="col-md-8 pt-4"> 6) Badge 100 cervejas </h4>
		<h4 class="col-md-3 text-right"><img src="assets/img/badges/badge6.jpg" width="50px" height="50px" style="<?= CtrUtils::isBadge($isBadge[5]) ?>"></h4>
		<h4 class="col-md-1"><?= CtrUtils::isBadge($isBadge[5]) === "" ? "<span class='badge ml-5'>$isBadge[5]</span>" : "";?></h4>
	</div>
	<div class="col-md-12 border-bottom">
		<h4 class="col-md-8 pt-4"> 7) Badge “Expandindo horizontes” – toda vez que se experimentar um novo tipo de cerveja </h4>
		<h4 class="col-md-3 text-right"><img src="assets/img/badges/badge7.jpg" width="50px" height="50px" style="<?= CtrUtils::isBadge($isBadge[6]) ?>"></h4>
		<h4 class="col-md-1"><?= CtrUtils::isBadge($isBadge[6]) === "" ? "<span class='badge ml-5'>$isBadge[6]</span>" : "";?></h4>
	</div>
	<div class="col-md-12 border-bottom">
		<h4 class="col-md-8 pt-4"> 8) Badge “Bom de copo” – para quem beber mais de 3 cervejas em menos de 1 hora</h4>
		<h4 class="col-md-3 text-right"><img src="assets/img/badges/badge8.jpg" width="50px" height="50px" style="<?= CtrUtils::isBadge($isBadge[7]) ?>"></h4>
		<h4 class="col-md-1"><?= CtrUtils::isBadge($isBadge[7]) === "" ? "<span class='badge ml-5'>$isBadge[7]</span>" : "";?></h4>
	</div>
	<div class="col-md-12 border-bottom">
		<h4 class="col-md-8 pt-4"> 9) Badge “Cliente fiel” – para quem repetir 3 vezes a mesma cerveja</h4>
		<h4 class="col-md-3 text-right"><img src="assets/img/badges/badge9.jpg" width="50px" height="50px" style="<?= CtrUtils::isBadge($isBadge[8]) ?>"></h4>
		<h4 class="col-md-1"><?= CtrUtils::isBadge($isBadge[8]) === "" ? "<span class='badge ml-5'>$isBadge[8]</span>" : "";?></h4>
	</div>
	<div class="col-md-12 border-bottom">
		<h4 class="col-md-8 pt-4"> 10) Badge “Tem amigo” – para quem tiver pelo menos 1 check in comentado</h4>
		<h4 class="col-md-3 text-right"><img src="assets/img/badges/badge10.jpg" width="50px" height="50px" style="<?= CtrUtils::isBadge($isBadge[9]) ?>"></h4>
		<h4 class="col-md-1"><?= CtrUtils::isBadge($isBadge[9]) === "" ? "<span class='badge ml-5'>$isBadge[9]</span>" : "";?></h4>
	</div>
</div>

<div class="p-5 m-5">
	<h3 class="text-danger"> <?php echo(CtrUtils::printMsg()); ?></h3>
</div>