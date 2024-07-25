<?php
	$description ='Результат расчета после заполнения формы';
	$title = 'Результат расчета';
	include 'src/meta.php';
	include 'src/header.php';
    
		function pensFond($gender, $sk, $zp, $punkt, $szp, $T, $kv, $pk2, $spk, $ipkn) {
						
			if($gender=='male' && $sk > 25){
				$gsk = 0.55 + (($sk/100) - 0.25);
				$pns=1;
			}
			else if ($gender=='female' && $sk > 20){
				$gsk = 0.55 + (($sk/100) - 0.2);
				$pns=1;
			}
			else if ($gender=='female'){
				$pns=$sk/20;
				$gsk = 0.55;
			}
			else if ($gender=='male'){
				$pns=$sk/25;
				$gsk = 0.55;
			}
			else{
				$gsk = 0.55;
			}
			
			if($spk < 81.50){
				$nadb = 4982.9;
			}
			else if ($spk == 87.24){
				$nadb = 5334.19;
			}
			else if ($spk == 93.00){
				$nadb = 5686.25;
			}
			else if ($spk == 98.86){
				$nadb = 6044.48;
			}
			else{
				$nadb = 6401.10;
			}
			
			
				
				$propzp = $zp/ $szp;
					if ($propzp<1.2){						
						$pk1 = (($gsk * $propzp * '1671.00') - '450.00') * $pns * $T;		
					}
					else {
						$pk1 = (($gsk * '1.2' * '1671.00') - '450.00') * $pns * $T;
					};
			

			$sv = $pk1/'100'*('10' + $kv);
			$pk = ($pk1 + $sv)*'5.61481656' + $pk2;
			$p = $pk/$T;
			$ipks = $p/'64.1';
			$ipk = $ipks + $ipkn;
			$pensiya = ($ipk*$spk) + $nadb;
			$pensiya = round($pensiya, 2);
		return $pensiya;		
		};
		
	$pensFond = pensFond($_POST['gender'], $_POST['sk'], $_POST['zp'], $_POST['punkt'], $_POST['szp'], $_POST['T'],
	$_POST['kv'], $_POST['pk2'], $_POST['spk'], $_POST['ipkn']);	
		
	echo'	<div class="col-md-8 p-lg-5 mx-auto mt-5">
				<h1 class="display-4 fw-normal">Ваша пенсия<small class="text-muted"> составляет</small></h1>
				<h1 class="display-4 fw-normal">'.$pensFond.' <small class="text-muted"> рублей</small></h1>
				<div class="text-center px-4">
					<a class="btn mt-2 btn-outline-secondary btn-lg text-center" href="zakazat-rashchet.php" target="_blank"><i class="fa fa-download"></i> нажмите, если нужно скачать расчет</a>
				</div>
			</div>
		';
	
	include 'src/example.php';	
	
	echo'	<div class="px-4 py-2 my-2 text-center">
				<a class="btn btn-primary  mt-1" href="http://rashchet-pensii.nedicom.ru/examples/rasschet-pensii-obrazec.pdf" target="_blank" role="button"><i class="fa fa-eye" download></i> Смотреть образец расчета</a>
				<a class="btn btn-primary  mt-1" href="http://rashchet-pensii.nedicom.ru/examples/soprovoditelnaya.pdf" target="_blank" role="button"><i class="fa fa-eye" download></i> Смотреть образец заявления</a>
				<p class="lead mb-4 mt-3">Внимание, образцы защищены авторским правом. Допускается использование исключительно в личных целях.</p>
			</div>
		';
	




	include 'src/footer.php';
	
  	?>