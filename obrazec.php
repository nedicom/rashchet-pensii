<?php
	$description ='Здесь Вы можете скачать образец расчета пенсии и образец сопроводительной в суд или ПФР';
	$title = 'Образец расчета пенсии';
	include 'src/meta.php';
	include 'src/header.php';
	
	
    

echo '
<div class="px-4 py-5 my-5 text-center">
<div class="d-flex justify-content-center">
<a class="btn btn-outline-primary btn-lg mt-1 d-block  mb-3" href="zakazat-rashchet.php"><i class="fa fa-download"></i> Заказать расчет</a>
</div>
<a class="btn btn-primary btn-lg mb-3" href="http://rashchet-pensii.nedicom.ru/examples/rasschet-pensii-obrazec.pdf" target="_blank"  role="button"><i class="fa fa-eye"></i> Образец расчета</a>
<a class="btn btn-primary btn-lg mb-3" href="http://rashchet-pensii.nedicom.ru/examples/soprovoditelnaya.pdf" target="_blank" role="button"><i class="fa fa-eye"></i> Образец заявления</a>
<p class="lead mb-4 mt-3">Внимание, образцы защищены авторским правом. Допускается использование исключительно в личных целях.</p>
</div>
';


	include 'src/footer.php';
	
  	?>