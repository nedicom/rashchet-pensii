<?php
  
echo '
		<div class="text-center mb-3" id="choise">
			<a href="/raschetpage.php#choise" class="d-inline-flex m-1 btn btn-primary btn-lg  d-flex disabled" aria-disabled="true">простой режим</a>
			<a href="/prostoy-raschet.php#choise" class="d-inline-flex m-1 btn btn-primary btn-lg d-flex" role="button" >экспертный режим</a>
			<a href="/orderuslugi.php" class="d-inline-flex m-1 btn btn-secondary btn-lg d-flex" role="button" >консультация</a>
		</div>
		
	<div class="container mt-5 col-10">
		<div class="row">
			<form class="row g-3 needs-validation" action="/rasschet.php" method="post">	
			
				<div class="col-md-12 form-check form-switch visually-hidden" id="start">
					<div class="d-flex justify-content-center">
					   <input class="col-xs-6 form-check-input mx-3" onclick="checkFunction()" type="checkbox" id="spravka" name="punkt" value="on" checked>
					   <label class="col-xs-6 form-check-label" for="spravka" id="spravkatext">Есть справка о зарплате?</label>
					</div>
				</div>
				
				<div class="row my-3 zptwoblock visually-hidden">
					
					<label for="zp" class="col-sm-6 d-flex justify-content-md-end col-form-label col-form-label-lg">Размер зарплаты<i class="fa-solid fa-circle-question px-1 pt-1" data-bs-toggle="tooltip" title="
					Берем из справки от работодателя/архива, складываем все месяцы и делим на количество месяцев. Можно не делить, тогда в следущем поле - средняя зарпалата - тоже делить не нужно"></i></label>		
										
					<div class="col-sm-4">
						<div class="input-group">
							<input type="number" id ="zp" name="zp" class="w-50 form-control form-control-lg"
							min="1" max="20000" step="1" value="120.00" required>
							<span class="input-group-text">рублей</span>
						</div>
					</div>	
					Ваша средняя зарплата на основании среднемесячного заработка за 5 лет до 2000 года или за 2 года до 2002. Берем из справки от работодателя					
				</div>
				 

				<div class="row my-3 zptwoblock visually-hidden">
					
					<label for="szp" class="col-sm-6 d-flex justify-content-md-end col-form-label col-form-label-lg">
					Средняя зарплата<i class="fa-solid fa-circle-question px-1 pt-1" data-bs-toggle="tooltip" 
					title="Берем из данных по ссылке подробнее"></i>					
					</label>		
										
					<div class="col-sm-4">
						<div class="input-group">
							<input type="number" id = "szp" name="szp" class="w-50 form-control form-control-lg"
							min="1" max="20000" step="1" value="100.00" required>
							<span class="input-group-text">рублей</span>
						</div>
						</div>	
					Средняя зарплата по стране за 5 лет Вашей работы до 2000 года (или 2 года до 2002)
					<a href="https://nedicom.ru/uslugi/pensionnyy-yurist/razmer-sredney-zarplaty-po-rf" target="_blank">подробнее</a>							 
										
				</div>				
				
				
				
				
				<div class="row my-3">	
				<label for="male" class="col-sm-6 d-flex justify-content-md-end col-form-label col-form-label-lg">
					Ваш пол					
					</label>	
				
					<div class="col-sm-4">
						<div class="form-check">
						  <input class="form-check-input" type="radio" name="gender" value="male" id="male">
						  <label class="form-check-label" for="male">
							Мужчина
						  </label>
						</div>
						<div class="form-check">
						  <input class="form-check-input" type="radio" name="gender" value="female" id="female" checked>
						  <label class="form-check-label" for="female">
							Женщина
						  </label>
						</div>
					</div>
				</div>

				
				<div class="row my-3">					
					<label for="sk" class="col-sm-6 d-flex justify-content-md-end col-form-label col-form-label-lg">
					Стаж до 2002 года<i class="fa-solid fa-circle-question px-1 pt-1" data-bs-toggle="tooltip" 
					title="Укажите количество полных лет стажа до 2002 года"></i>					
					</label>		
										
					<div class="col-sm-4">
						<div class="input-group">
							<input type="number" id = "sk" name="sk" class="w-50 form-control form-control-lg" 
							min="0" max="70" step="1" value="20" required="required">
						</div>						
					</div>
					<div class="text-center">	
					Укажите количество полных лет стажа до 2002 года
					</div>
				</div>
				

				<div class="row my-3">					
					<label for="kv" class="col-sm-6 d-flex justify-content-md-end col-form-label col-form-label-lg">
					Стаж до 1991 года<i class="fa-solid fa-circle-question px-1 pt-1" data-bs-toggle="tooltip" 
					title="Этот показатель влияет на валоризацию"></i>					
					</label>		
										
					<div class="col-sm-4 ">
						<div class="input-group">
							<input type="number" id = "kv" name="kv" class="w-50 form-control form-control-lg" 
							min="0" max="50" step="1" value="10" required>
						</div>
					</div>
					<div class="text-center">	
					Укажите количество полных лет стажа до 1991 года
					</div>
					</div>
				
				
				<div class="row my-3 visually-hidden">					
					<label for="opv" class="col-sm-6 d-flex justify-content-md-end col-form-label col-form-label-lg">
					Ожидаемый период выплаты<i class="fa-solid fa-circle-question px-1 pt-1" data-bs-toggle="tooltip" 
					title="Обычно составляет 228 месяцев"></i>					
					</label>		
										
					<div class="col-sm-4">
						<div class="input-group">
							<input type="number" id = "opv" name="T" class="w-50 form-control form-control-lg" 
							min="144" max="256" step="1" value="228" required>
						</div>
					</div>
					Если не знаете что это, оставьте 228					
				</div>

				
				<div class="row my-3">					
					<label for="pk2" class="col-sm-6 d-flex justify-content-md-end col-form-label col-form-label-lg">
					Размер отчислений с 2002 года<i class="fa-solid fa-circle-question px-1 pt-1" data-bs-toggle="tooltip" 
					title="Сумма страховых взносов в ПФР, начиная с 1 января 2002 года."></i>					
					</label>		
										
					<div class="col-sm-4">
						<div class="input-group">
							<input type="number" id = "pk2" name="pk2" class="w-50 form-control form-control-lg" 
							min="0" max="2000000" step="1" value="600000" required>
							<span class="input-group-text">рублей</span>
						</div>
					 </div>
					<div class="text-center">
				Сумма страховых взносов в ПФР, начиная с 1 января 2002 года. Можно 
				<a href="https://www.gosuslugi.ru/10042/1/info" target="_blank">запросить на Госуслугах	</a>									
				</div>
				</div>	
				

				<div class="row my-3">					
					<label for="spk" class="col-sm-6 d-flex justify-content-md-end col-form-label col-form-label-lg">
					Год на который считаем пенсию<i class="fa-solid fa-circle-question px-1 pt-1" data-bs-toggle="tooltip" 
					title="Необходим для определения пенсионного коэффициента и фиксированной надбавки"></i>					
					</label>		
										
					<div class="col-sm-4">
						<select class="form-select" name = "spk">
							<option value="133.05" selected>С 01.01.2024</option>
							<option value="123.77">С 01.01.2023</option>
							<option value="118.09">С 01.06.2022</option>
							<option value="107.36">С 01.01.2022</option>
							<option value="98.86">С 01.01.2021</option>
							<option value="93.00">С 01.01.2020</option>
							<option value="87.24">С 01.01.2019</option>
							<option value="81.49">С 01.01.2018</option>
							<option value="78.58">С 01.04.2017</option>
							<option value="78.28">С 01.02.2017</option>
							<option value="74.27">С 01.02.2016</option>
							<option value="71.41">С 01.02.2015</option>
							<option value="64.10">До 01.02.2015</option>
						</select>
						<a href="http://www.consultant.ru/document/cons_doc_LAW_43487/93ec715c37e828e4ed3ef6466122001b10ebd725/" target="_blank">подробнее</a>
					
					</div>
					<div class="text-center">	
					Необходим для определения стоимости пенсионного коэффициента и размера фиксированной надбавки
					</div></div>	
											
				<div class="row my-3">					
					<label for="ipkn" class="col-sm-6 d-flex justify-content-md-end col-form-label col-form-label-lg">
					ИПКн<i class="fa-solid fa-circle-question px-1 pt-1" data-bs-toggle="tooltip" 
					title="Реформа не прошла бесследно"></i>					
					</label>		
										
					<div class="col-sm-4">
						<div class="input-group">
							<input type="number" id = "ipkn" name="ipkn" class="w-50 form-control form-control-lg" 
							min="0" max="400" step=".01" value="20" required>
						</div>
						<a href="https://www.gosuslugi.ru/10042/1/info" target="_blank">Заказать выписку
						<img alt="пенсионный калькулятор РФ" class="mx-1" data-align="center" width="24px" data-entity-type="file" src="img/gu.png"></a>					
				
					</div>
					
					<div class="text-center">
						Он же пенсионный бал с 2015 года. Смотрите размер в выписке из ИЛС
						
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
					Укажите размер пенсии, который Вы получаете. Если у нас получиться больше, мы расчитаем	разницу.	
				</div>				
								
							
				<div class="col-12 mb-5">
					<div class="d-flex justify-content-center">					
						<button type="submit" class="w-50 btn btn-primary btn-lg my-3">Расчитать</button>
					</div>	
				</div>	
			</form>	
		</div>	
	</div>

	

	<script>	
		const tooltipTriggerList = document.querySelectorAll(\'[data-bs-toggle="tooltip"]\')
		const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
	</script>
	
';
  	?>