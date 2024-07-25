<?php
	session_start();
$con = mysqli_connect("localhost","pfr","pfr","pfr");
    // Check connection
	$con->query("SET NAMES 'utf8'");	  
			  if ($con->connect_error) {
				die($connectbutton="Соединение не удалось: " . $con->connect_error);
				}
				$connectbutton="Соединение успешно";
				


		$client_id = $_SESSION['client_id'];
		
		//присвоить переменные
			$Rekvizitydogovora = array(
				'$sk', '$zp', '$punkt', '$szp', '$pns', '$T', '$kv', '$pk2', '$spk', '$ipkn', '$nadb', '$pensiya', 
				'$create_datetime', '$propzp', '$pk1', '$rp', '$sv', '$pk', '$p', '$ipks', '$spst', '$ipk'
			);
			
			$create_datetime = date('Y-m-d H:i:s');	
			
				$queryselect = "SELECT * FROM `users` where client_id = $client_id";
				$resultselect   = mysqli_query($con, $queryselect);
				//print_r ($resultselect);
				$rowselect = mysqli_fetch_array($resultselect, MYSQLI_ASSOC);
				$Rekvizitydogovoravar = array(
				$rowselect['sk'], $rowselect['zp'], $rowselect['punkt'],
				$rowselect['szp'], $rowselect['pns'], $rowselect['T'], 
				$rowselect['kv'], $rowselect['pk2'], $rowselect['spk'],
				$rowselect['ipkn'], $rowselect['nadb'], $rowselect['pensFond'], $create_datetime,
				$rowselect['propzp'], $rowselect['pk1'], $rowselect['rp'], $rowselect['sv'],
				$rowselect['pk'], $rowselect['p'], $rowselect['ipks'], $rowselect['spst'], $rowselect['ipk']
			);
			
			$psthxml = "document.xml";
					
			$zip = new ZipArchive;  //Запись в файл
			//phpinfo(INFO_MODULES);
				if($zip->open('raschet.docx') === TRUE) {
					//echo $rowselect['pensFond'];
					/*открываем наш шаблон для чтения (он находится вне документа)
					и помещаем его содержимое в переменную $content*/
					$handle = fopen($psthxml, "r");
					$content = fread($handle, filesize($psthxml));
					fclose($handle);
					//print_r($content);
					//echo 'ok';
					/*Далее заменяем все что нам нужно например так (используем массивы)*/
					$content = str_replace($Rekvizitydogovora, $Rekvizitydogovoravar, $content);
					/*Удаляем имеющийся в архиве document.xml*/
					$zip->deleteName('word/document.xml');
					/*Пакуем созданный нами ранее и закрываем*/
					$zip->addFromString('word/document.xml',$content);
					$zip->close();
				}
	
	
			//редактируем адрес и название файла
		$file = ("https://rashchet-pensii.nedicom.ru/files/exampledownload/raschet.docx");
		header ("Content-Type: application/octet-stream");
		header ("Accept-Ranges: bytes");
		header ("Content-Length: ".filesize($file));
		header ("Content-Disposition: attachment; filename=расчет_пенсии_образец.docx");
		flush();		
		readfile($file);
?>