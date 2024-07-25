<?php		
			if(isset($_SESSION['client_id'])){
				$invid = ($_SESSION['client_id']);
				$query = "SELECT * FROM `users` WHERE client_id = $invid";
				$result   = mysqli_query($con, $query);
				$row = $result->fetch_array();
				$sk = $row['sk'];
				$zp  = $row['zp'];
				$szp = $row['szp'];
				$pns = $row['pns'];
				$T = $row['T'];
				$kv = $row['kv'];
				$pk2 = $row['pk2'];
				$spk = $row['spk'];
				$ipkn = $row['ipkn'];
				$nadb = $row['nadb'];
			}
			else{	
				$sk = 0.55;
				$zp  = 200.00;
				$szp = 215.00;
				$pns = 0.8;
				$T = 228;
				$kv = 10;
				$pk2 = 600000;				
				$ipkn = 20;
				$spk = 133.05;
				$nadb = 8134.90 ;
			}

			
echo '

		<div class="text-center mb-3" id="choise">
			<a href="/raschetpage.php/#choise" class="d-inline-flex m-1 btn btn-primary btn-lg  d-flex" >простой режим</a>
			<a href="/prostoy-raschet.php/#choise" class="d-inline-flex m-1 btn btn-primary btn-lg d-flex disabled" role="button" aria-disabled="true">экспертный режим</a>
			<a href="orderuslugi.php" class="d-inline-flex m-1 btn btn-secondary btn-lg d-flex" role="button" >платная консультация</a>
		</div>

	<div class="container mt-5 col-10">
	<div class="row">
		
			<form class="row g-3 needs-validation" action="/rasschet.php" method="post">
			
			
				<div class="col-md-12 form-check form-switch" id="start">
					<div class="d-flex justify-content-center">
					   <input class="col-xs-6 form-check-input mx-3" onclick="checkFunction()" type="checkbox" id="spravka" name="punkt" checked>
					   <label class="col-xs-6 form-check-label" for="spravka" id="spravkatext">Есть справка о зарплате?</label>
					</div>
				</div>
				
				<div class="row my-3 zptwoblock">
					
					<label for="zp" class="col-sm-6 d-flex justify-content-md-end col-form-label col-form-label-lg">Размер зарплаты<i class="fa-solid fa-circle-question px-1 pt-1" data-bs-toggle="tooltip" title="
					Берем из справки от работодателя/архива, складываем все месяцы и делим на количество месяцев. Можно не делить, тогда в следущем поле - средняя зарпалата - тоже делить не нужно"></i></label>		
										
					<div class="col-sm-4">
						<div class="input-group">
							<input type="number" id ="zp" name="zp" class="w-50 form-control form-control-lg"
							min="1" max="20000" step="1" value="'.$zp.'" required>
							<span class="input-group-text">рублей</span>
						</div>
					</div>	
					<div class="text-center text-muted">
						<p><small> 
							Ваша средняя зарплата на основании среднемесячного заработка за 5 лет до 2000 года или за 2 года до 2002. Берем из справки от работодателя					
						</small></p>
					</div>

				</div>
				 

				<div class="row my-3 zptwoblock">
					
					<label for="szp" class="col-sm-6 d-flex justify-content-md-end col-form-label col-form-label-lg">
					Средняя зарплата<i class="fa-solid fa-circle-question px-1 pt-1" data-bs-toggle="tooltip" 
					title="Берем из данных по ссылке подробнее"></i>					
					</label>		
										
					<div class="col-sm-4">
						<div class="input-group">
							<input type="number" id = "szp" name="szp" class="w-50 form-control form-control-lg"
							min="1" max="20000" step="1" value="'.$szp.'" required>
							<span class="input-group-text">рублей</span>
						</div>
						</div>
					<div class="text-center text-muted">
						<p><small> 
					Средняя зарплата по стране за 5 лет Вашей работы до 2000 года (или 2 года до 2002).	
					<a href="https://nedicom.ru/uslugi/pensionnyy-yurist/razmer-sredney-zarplaty-po-rf" target="_blank">Подробнее</a>							 
									
						</small></p>
					</div>
				</div>				
				
				
				<div class="row my-3">					
					<label for="sk" class="col-sm-6 d-flex justify-content-md-end col-form-label col-form-label-lg">
					Стажевый коэффициент<i class="fa-solid fa-circle-question px-1 pt-1" data-bs-toggle="tooltip" 
					title="Просто добавляйте 0.01 за каждый год стажа больше 20/25 лет"></i>					
					</label>		
										
					<div class="col-sm-4">
						<div class="input-group">
							<input type="number" id = "sk" name="sk" class="w-50 form-control form-control-lg" 
							min="0.55" max="0.75" step=".01" value="'.$sk.'" required>
						</div>						
					</div>
					
						<div class="text-center text-muted">
							<p><small> 
								За каждый год до 2002 года, если стажа больше 20 лет (женщины) или 25 лет (мужчины) базовый СК (0,55) увеличивается на 0,01. Максимальный - 0.75					
							</small></p>
						</div>
					</div>
				
		
				<div class="row my-3">					
					<label for="pns" class="col-sm-6 d-flex justify-content-md-end col-form-label col-form-label-lg">
					Пропорция неполного стажа<i class="fa-solid fa-circle-question px-1 pt-1" data-bs-toggle="tooltip" 
					title="Поделите Ваш стаж до 2002 года на 20/25 лет. Если получилось больше 1 оставьте 1"></i>					
					</label>		
										
					<div class="col-sm-4">
						<div class="input-group">
							<input type="number" id = "pns" name="pns" class="w-50 form-control form-control-lg" 
							min="0.1" max="1" step=".01" value="0.8" required>
						</div>
					</div>	

					
						<div class="text-center text-muted">
							<p><small> 
								Это показатель, который равен 1, если стаж полный (20 лет для женщий или 25 лет для мужчин)
								<a href="https://nedicom.ru/uslugi/pensionnyy-yurist-simferopol/schitaem-pensiyu-4-proporciya-nepolnogo-stazha#toc--" target="_blank">подробнее</a>

							</small></p>
						</div>

						</div>

				<div class="row my-3">					
					<label for="kv" class="col-sm-6 d-flex justify-content-md-end col-form-label col-form-label-lg">
					Стаж до 1991 года (валоризация)<i class="fa-solid fa-circle-question px-1 pt-1" data-bs-toggle="tooltip" 
					title="Если Вы до 1991 года работали 5 лет, ставьте 5"></i>					
					</label>		
										
					<div class="col-sm-4">
						<div class="input-group">
							<input type="number" id = "kv" name="kv" class="w-50 form-control form-control-lg" 
							min="1" max="50" step="1" value="'.$kv.'" required>
						</div>
					</div>
					
					<div class="text-center text-muted">
						<p><small> 
							Просто укажите количество полных лет стажа до 1991 года. Если не работали ставьте 1					
						</small></p>
					</div>
					</div>
				
				
				<div class="row my-3">					
					<label for="opv" class="col-sm-6 d-flex justify-content-md-end col-form-label col-form-label-lg">
					Ожидаемый период выплаты<i class="fa-solid fa-circle-question px-1 pt-1" data-bs-toggle="tooltip" 
					title="Обычно составляет 228 месяцев. Меняется для тех кто ушел на пенсию до 2014 года"></i>					
					</label>		
										
					<div class="col-sm-4">
						<div class="input-group">
							<input type="number" id = "opv" name="T" class="w-50 form-control form-control-lg" 
							min="144" max="256" step="1" value="'.$T.'" required>
						</div>
					</div>


					<div class="text-center text-muted">
						<p><small> 
							Если не знаете что это, оставьте 228	
						</small></p>
					</div>
				
				</div>

				
				<div class="row my-3">					
					<label for="pk2" class="col-sm-6 d-flex justify-content-md-end col-form-label col-form-label-lg">
					Размер отчислений<i class="fa-solid fa-circle-question px-1 pt-1" data-bs-toggle="tooltip" 
					title="Сумма страховых взносов в ПФР, начиная с 1 января 2002 года."></i>					
					</label>		
										
					<div class="col-sm-4">
						<div class="input-group">
							<input type="number" id = "pk2" name="pk2" class="w-50 form-control form-control-lg" 
							min="0" max="2000000" step="1" value="'.$pk2.'" required>
							<span class="input-group-text">рублей</span>
						</div>
						</div>

					<div class="text-center text-muted">
						<p><small> 
							Сумма страховых взносов в ПФР, начиная с 1 января 2002 года. Можно 
							<a href="https://www.gosuslugi.ru/10042/1/info" target="_blank">запросить на Госуслугах	</a>						
						</small></p>
					</div>

				</div>				
				

				<div class="row my-3">					
					<label for="spk" class="col-sm-6 d-flex justify-content-md-end col-form-label col-form-label-lg">
					Стоимость ПК<i class="fa-solid fa-circle-question px-1 pt-1" data-bs-toggle="tooltip" 
					title="Стоимость определяется Правительтсвом. Детали по ссылке подробнее"></i>					
					</label>		
										
					<div class="col-sm-4">
						<div class="input-group">
							<input type="number" id = "spk" name="spk" class="w-50 form-control form-control-lg" 
							min="71.41" max="200.00" step=".01" value="'.$spk.'" required>
							<span class="input-group-text">рублей</span>
						</div>
					</div>

					<div class="text-center text-muted">
						<p><small> 
							Стоимость определяется Правительтсвом. Смотрите по ссылке  <a href="http://www.consultant.ru/document/cons_doc_LAW_43487/93ec715c37e828e4ed3ef6466122001b10ebd725/" target="_blank">подробнее</a>						
						</small></p>
					</div>

				</div>	
											
				<div class="row my-3">					
					<label for="ipkn" class="col-sm-6 d-flex justify-content-md-end col-form-label col-form-label-lg">
					ИПКн<i class="fa-solid fa-circle-question px-1 pt-1" data-bs-toggle="tooltip" 
					title="Реформа не прошла бесследно"></i>					
					</label>		
										
					<div class="col-sm-4">
						<div class="input-group">
							<input type="number" id = "ipkn" name="ipkn" class="w-50 form-control form-control-lg" 
							min="0" max="400" step=".01" value="'.$ipkn.'" required>
							<div class="valid-feedback">
								  Looks good!
								</div>
						</div>
					</div>

					<div class="text-center text-muted">
						<p><small> 
							Он же пенсионный бал с 2015 года. Смотрите размер в выписке из ИЛС	
						</small></p>
					</div>

								
				</div>				
				
				<div class="row my-3">					
					<label for="nadb" class="col-sm-6 d-flex justify-content-md-end col-form-label col-form-label-lg">
					Фиксированная надбавка<i class="fa-solid fa-circle-question px-1 pt-1" data-bs-toggle="tooltip" 
					title="Это обязательная надбавка к пенсии, которая добавляется с 2015 года"></i>					
					</label>		
										
					<div class="col-sm-4">
						<div class="input-group">
							<input type="number" id = "nadb" name="nadb" class="w-50 form-control form-control-lg" 
							min="3000.00" max="20000.00" step=".01" value="'.$nadb.'" required>
							<span class="input-group-text">рублей</span>
							<div class="valid-feedback">
								  Looks good!
								</div>
						</div>						
					</div>

					<div class="text-center text-muted">
						<p><small> 
							Это обязательная надбавка к пенсии, введена с 2015 года. <a href="http://www.consultant.ru/document/cons_doc_LAW_43487/8faa1c749b4c72a8902b50fb3c24c91c0d035b0e/" target="_blank">подробнее</a>					
						</small></p>
					</div>

						</div>


				<div class="row my-3">					
					<label for="nowpens" class="col-sm-6 d-flex justify-content-md-end col-form-label col-form-label-lg">
					Размер текущей пенсии<i class="fa-solid fa-circle-question px-1 pt-1" data-bs-toggle="tooltip" 
					title="Посчитаем сколько Вы недополучаете"></i>					
					</label>		
										
					<div class="col-sm-4">
						<div class="input-group">
							<input type="number" id = "nowpens" name="nowpens" class="w-50 form-control form-control-lg" 
							min="3000.00" max="200000.00" step="0.01" value="14000.00" required>
							<span class="input-group-text">рублей</span>
							<div class="valid-feedback">
								  Looks good!
								</div>
						</div>
						
					</div>

					<div class="text-center text-muted">
						<p><small> 
							Укажите размер пенсии, который Вы получаете. Мы сравним его с тем, что посчитали.
						</small></p>
					</div>


						
				</div>				
				
							
				<div class="col-12 mb-5">
					<div class="d-flex justify-content-center">					
						<button type="submit" class="w-50 btn btn-primary btn-lg">Расчитать</button>
					</div>	
				</div>					
				

			
			</form>			

			
	
	</div>
</div>

	<script>

		
		$( "#spravka" ).click(function() {
			$( ".zptwoblock" ).toggle( "slow" );
		});

	</script>

	<script>	
		const tooltipTriggerList = document.querySelectorAll(\'[data-bs-toggle="tooltip"]\')
		const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
	</script>
	
';
  	?>