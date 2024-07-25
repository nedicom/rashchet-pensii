<?php
	$description ='Ваш личный кабинет пенсионера';
	$title = 'Личный кабинет пенсионера';
	include 'src/meta.php';
	include 'src/header.php';

		echo '
			<div class="px-4 py-5 my-5 text-center">
			<h1 class="display-5 fw-bold">Личный кабинет</h1>
			<div class="col-lg-6 mx-auto">';
	
	if(empty($_SESSION['client_id'])){			
			echo '
			<p itemprop="description" class="lead mt-3">Для получения доступа к показателям авторизируйтесь на сайте</p>
			<div class="d-grid gap-2 d-sm-flex justify-content-sm-center"><a href="https://oauth.yandex.ru/authorize?client_id=f63f07d2b06d40dd849eb6aeb83f8a1d&amp;redirect_uri=https://rashchet-pensii.nedicom.ru/order.php&amp;response_type=code&amp;state=123" 
			class="btn btn-primary btn-lg my-3 w-100" role="button">Войти</a></div>
			';
		}
		
		else{
			/*$merchant_login = "nedicom";
			$password_1 = "MlyF3G73kgfx0xNMty2m";          
			$description = "Расчет пенсии онлайн";			
			$out_sum = "1000.00";
			$signature_value = md5("$merchant_login:$out_sum:$invid:$password_1");
			$url = "https://auth.robokassa.ru/Merchant/Index.aspx?MerchantLogin=".$merchant_login."&out_sum=".$out_sum."&InvId=".$invid."&Description=".$description."&SignatureValue=".$signature_value."";
			*/
			//$invid = 280659189;
			$invid = $_SESSION['client_id'];

			echo $invid;
			$query = "SELECT * FROM `users` WHERE client_id = $invid";
			$result   = mysqli_query($con, $query);
			print_r($result);
			$row = $result->fetch_array();
			
			print_r($row);
			//создаем массив показателей
			$arr_keys = array('sk' => 'Стажевый коэффциент', 'zp' => 'Зарплата за 5 лет (или 2 года до 2002)', 
			'szp'  => 'Средняя зарплата по стране', 'pns'  => 'Пропорция неполного стажа', 'T'  => 'Ожидаемый период выплаты',
			'kv'  => 'Коэффициент валорозации', 'pk2'  => 'Пенсионный капитал с 2002 года', 
			'spk'  => 'Стоимость пенсионного коэффициента', 'ipkn'  => 'ИПКн (пенсионный бал)', 
			'nadb'  => 'Надбавка к пенсии', 'pensFond'  => 'Рассчитанный размер пенсии' 
			);
			$new_arr = array();
			foreach ($row as $key => $value) {
				if (in_array($key, (array_keys($arr_keys)))) {
					$new_arr[$key] = $value;
				}
			}
			print_r($row);
			unset($new_arr[0]);
			
			/*if ($row['pay'] < 2){
			echo '
				<div class="mx-auto">
					<p itemprop="description" class="lead mt-3">Теперь Вам доступно приобретение расчета</p>
					<h4 itemprop="price" class="mt-3">Стоимость расчета составляет 1000,00 рублей.</h4>
					<p itemprop="description" class="lead mt-3">Возможность скачивать и редактировать данные в расчете предоставляется сроком на 1 год</p>
					  <div class="row">
						<div class="col-md-6">
							<a class="btn btn-light btn-lg my-3 w-100" href="http://rashchet-pensii.nedicom.ru/files/exampledownload/download.php" target="_blank">скачать образец расчета</a>
						</div>
						<div class="col-md-6">
							<a class="btn btn-primary btn-lg my-3 w-100" href="'.$url.'" role="button">купить полный расчет</a>
						</div>
						
						<div class="col-md-6">
							<a class="btn btn-light btn-lg my-3 w-100" href="examples/Obrazets_Zayavlenie.docx" target="_blank" role="button">образец заявления в ПФР</a>
						</div>	

						<div class="col-md-6">
							<a class="btn btn-light btn-lg my-3 w-100" href="/prostoy-raschet.php" target="_blank" role="button">рассчитать заново</a>
						</div>								
						
					  </div>
					<p itemprop="description" class="lead mt-3">Нажимая на кнопку приобретения Вы соглашаетесь с 
						<a href="oferta.php" target="_blank">офертой</a></p>
					<p>номер заказа - '.$invid.'</p></div>';
			}
				else{
			*/	
					echo '
					<div class="d-grid gap-2 col-6 mx-auto">
					<p itemprop="description" class="lead mt-3">Скачать расчет могут только наши клиенты</p>
					<a class="btn btn-primary btn-lg my-3 w-100 disabled" href="http://rashchet-pensii.nedicom.ru/files/download.php" role="button">Скачать</a>
					<p>номер заказа - '.$invid.'</p></div>
					<div class="row">
						<div class="col-md-6 ">
							<a class="btn btn-light btn-lg my-3 w-100 " href="examples/Obrazets_Zayavlenie.docx" target="_blank" role="button">образец заявления в СФР</a>
						</div>	

						<div class="col-md-6">
							<a class="btn btn-light btn-lg my-3 w-100" href="/prostoy-raschet.php" target="_blank" role="button">рассчитать 
							заново</a>
						</div>	
					</div>
					';		
					//}
					
					echo '<h3>Ваши показатели</h3>
						  <p>Чтобы изменить показатели сделайте расчет заново</p>';
					
					foreach ($new_arr as $key => $value){
						echo '<div class="list-group w-auto">
						  <a href="#" class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">						
							<div class="d-flex gap-2 w-100 justify-content-between">
							  <div>
								<h6 class="mt-1">'.$arr_keys[$key].'</h6>							
							  </div>
							  <h5 class="opacity-50 text-nowrap">'.$new_arr[$key].'</h5>
							</div>
						  </a>
						</div>';
						}
					
			}

	include 'src/footer.php';