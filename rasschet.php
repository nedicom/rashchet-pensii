<?php
	$description ='Результат расчета после заполнения формы';
	$title = 'Результат расчета';
	include 'src/meta.php';
	include 'src/header.php';
    	
		if (!empty($_POST['gender'])) {
					
					
				function pensFond($gender, $sk, $zp, $punkt, $szp, $T, $kv, $pk2, $spk, $ipkn) {
				global $nadb;
				global $gsk;
				global $pns;
				global $propzp;
				global $rp;
				global $pk1;
				global $sv;
				global $pk;
				global $p;
				global $ipks;
				global $spst;
				global $ipk;

					if($gender=='male' && $sk > 25){
						$gsk = 0.55 + (($sk/100) - 0.25);
						$pns=1;
					}
					else if ($gender=='female' && $sk > 20){
						$gsk = 0.55 + (($sk/100) - 0.2);
						$pns=1;
					}
					else if ($gender == 'female'){
						$pns=$sk/20;
						$gsk = 0.55;
					}
					else if ($gender == 'male'){
						$pns=$sk/25;
						$gsk = 0.55;
					}
					else{
						$gsk = 0.1;
					}
								
					if($spk < 82.5){
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
					else if ($spk == 118.1){
						$nadb = 7220.74;
					}
					else{
						$nadb = 6401.10;
					}
						
					$propzp = $zp/ $szp;
						if ($propzp<1.2){						
							$pk1 = (($gsk * $propzp * '1671.00') - '450.00') * $pns * $T *'5.61481656';
							$rp	= $gsk * $propzp * '1671.00';						
						}
						else {
							$pk1 = (($gsk * '1.2' * '1671.00') - '450.00') * $pns * $T *'5.61481656';
							$rp	= $gsk * '1.2' * '1671.00';
						};
				
					$sv = $pk1/'100'*('10' + $kv);
					$pk = $pk1 + $sv + $pk2;
					$p = $pk/$T;
					$ipks = $p/'64.1';
					$ipk = $ipks + $ipkn;
					$spst = $ipk*$spk;
					$pensiya = ($ipk*$spk) + $nadb;
					$pensiya = round($pensiya, 2);
				return $pensiya;			
				}
			
			$pensFond = pensFond($_POST['gender'], $_POST['sk'], $_POST['zp'], $_POST['punkt'], $_POST['szp'], $_POST['T'],
			$_POST['kv'], $_POST['pk2'], $_POST['spk'], $_POST['ipkn']);
		} 
		
		else {			
			function pensFond($sk, $zp, $punkt, $szp, $pns, $T, $kv, $pk2, $spk, $ipkn, $nadb) {
				
				global $rp;
				global $pk1;
				global $propzp;
				global $sv;
				global $pk;
				global $p;
				global $ipks;
				global $spst;
				global $ipk;
				
				if($punkt=='on'){
					
					$propzp = $zp/ $szp;
						if ($propzp<1.2){						
							$pk1 = (($sk * $propzp * '1671.00') - '450.00') * $pns * $T *'5.61481656';
							$rp = $sk * $propzp * '1671.00';
						}
						else {
							$pk1 = (($sk * '1.2' * '1671.00') - '450.00') * $pns * $T *'5.61481656';
							$rp = $sk * '1.2' * '1671.00';
						};
				}
					
				else{
					$pk1 = (($sk * $zp/'60')-'450.00') * $pns * $T *'5.61481656';		
					}
					
				$sv = $pk1/'100'*('10' + $kv);
				$pk = $pk1 + $sv + $pk2;
				$p = $pk/$T;
				$ipks = $p/'64.1';
				$ipk = $ipks + $ipkn;
				$spst = $ipk*$spk;
				$pensiya = ($ipk*$spk) + $nadb;
				$pensiya = round($pensiya, 2);	
				
				return $pensiya;				
			}
			
				$pensFond = pensFond($_POST['sk'], $_POST['zp'], $_POST['punkt'], $_POST['szp'], $_POST['pns'], $_POST['T'],
				$_POST['kv'], $_POST['pk2'], $_POST['spk'], $_POST['ipkn'], $_POST['nadb']);
				
			global $nadb;	//
			$nadb = $_POST['nadb'];
			global $pns;	//
			$pns = $_POST['pns'];		
		}
		
		//перменная текущей пенсии для записи в базу
		$nowpens = $_POST['nowpens'];
						
						$client_id = $_SESSION['client_id'];
						if (!empty($_POST['gender'])){
								$sk = $gsk;
								$gender = $_POST['gender'];
						}
						else{
								$gender = 'unknown';
								$sk = $_POST['sk'];
						}
								$zp = $_POST['zp'];
								$punkt = $_POST['punkt'];
								$szp = $_POST['szp'];
								$T = $_POST['T'];
								$kv = $_POST['kv'];
								$pk2 = $_POST['pk2'];
								$spk = $_POST['spk'];
								$ipkn = $_POST['ipkn'];

								
		
		echo'	<div class="col-md-8 p-3 mx-auto mt-5">
				<h1 class="display-4 fw-normal">Ваша пенсия<small class="text-muted"> составляет</small></h1>
				<h1 class="display-4 fw-normal">'.$pensFond.' <small class="text-muted"> рублей</small></h1>
				</div>	
			';
			
		//текст сравнения пенсии	
		if($pensFond>$_POST['nowpens']){
			$raznica = $pensFond - $_POST['nowpens'];
			$tenyears = $raznica * 120;
				echo'	<div class="col-md-8 p-3 mx-auto">
						<h3 class="fw-normal">Разница между пенсией<small class="text-muted"> которую мы посчитали</small></h3>
						<h3 class="fw-normal">и пенсией, которую Вы получаете, <small class="text-muted"> составила</small></h3>
						<h3 class="fw-normal">'.$raznica.' <small class="text-muted"> рублей</small></h3>
						</div>
						<div class="col-md-8 p-3 mx-auto">
						<h2 class="fw-normal">За 10 лет Вы потеряете<small class="text-muted"> '.$raznica.' * 10 лет * 12 месяцев = </small></h2>
						<h1 class="display-4 fw-normal"> = '.$tenyears.' <small class="text-muted"> рублей</small></h1>
						</div>';							
		}
		else{
			$raznica = $_POST['nowpens'] - $pensFond;
			echo'	<div class="col-md-8 p-3 mx-auto">
						<h3 class="fw-normal">Разница между пенсией<small class="text-muted"> которую мы посчитали</small></h3>
						<h3 class="fw-normal">и пенсией, которую Вы получаете, <small class="text-muted"> составила</small></h3>
						<h3 class="fw-normal">'.$raznica.' <small class="text-muted"> рублей в пользу ПФР.</small></h3>
						<h3 class="fw-normal">Возможно Вы ошиблись в заполнении формы. </h3>
						</div>
						';
			
		}
		//текст сравнения пенсии

				
		//пользователь не авторизован
							if(empty($_SESSION['client_id'])){
									$_SESSION['sk'] = $sk;
									$_SESSION['zp'] = $zp;
									$_SESSION['punkt'] = $punkt;
									$_SESSION['szp'] = $szp;
									$_SESSION['T'] = $T;
									$_SESSION['kv'] = $kv;
									$_SESSION['pk2'] = $pk2;
									$_SESSION['spk'] = $spk;
									$_SESSION['ipkn'] = $ipkn;
									$_SESSION['gender'] = $gender;
									$_SESSION['nadb'] = $nadb;
									$_SESSION['nowpens'] = $nowpens;
									$_SESSION['pns'] = $pns;
									$_SESSION['pensFond'] = $pensFond;
									
								echo'		
									<div class="col-md-8 mb-5 pb-5 container text-center p-3 mx-auto">
										<h1 class="mb-3 display-4 fw-normal">Что делать?</h1>									
										<h4 class="mb-3 fw-normal">Подайте заявление в ПФР и предоставьте наш расчет. Чтобы это сделать 
										войдите на сайт. </h4>									
										<a class="d-inline-flex m-1 my-5 btn btn-secondary btn-lg d-flex disabled" href="zakazat-rashchet.php" target="_blank"><i class="fa fa-download mx-2"> </i> скачать расчет</a>
										<a href="' . $urlmenu . '" class="my-5 d-inline-flex m-1 btn btn-primary btn-lg d-flex" role="button">Войти</a>	
									</div>
									';
								
							}
							//пользователь авторизован
							else{ 
									$query = "UPDATE `users` SET sk = $sk, zp = $zp, szp = $szp, pns = $pns, T = $T,
																kv = $kv, pk2 = $pk2, spk = $spk, ipkn = $ipkn, 
																nadb = '$nadb', pensFond = $pensFond, gender = '$gender',
																propzp = $propzp, pk1 = $pk1, rp = $rp, sv = $sv,
																pk = $pk, p = $p, ipks = $ipks, spst = $spst, ipk = $ipk, nowpens = $nowpens
															where client_id = $client_id";
									$result   = mysqli_query($con, $query);
									echo '
										<div class="mb-3 container text-center">																				
											<a class="d-inline-flex m-1 btn btn-primary btn-lg d-flex" href="order.php" target="_blank"><i class="fa fa-download mx-2"> </i> в личный кабинет</a>
										</div>
									';
								
									
	//testing variable						}
	//$test = array($sk,$zp,$szp,$pns,$T,$kv,$pk2,$spk,$ipkn,$nadb,$pensFond,$gender,$propzp,$pk1,$rp,$sv,$pk,$p,$ipks,$spst,$ipk,$client_id);
	//foreach ($test as $key => $value){
	//	echo "$key - $value <br>";
	
	}
	
	include 'src/footer.php';
?>