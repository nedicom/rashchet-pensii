<?php

	//$state = $_GET['state'];
	
	if (!empty($_GET['code'])) {
		// Отправляем код для получения токена (POST-запрос).
		$params = array(
			'grant_type'    => 'authorization_code',
			'code'          => $_GET['code'],
			'client_id'     => 'f63f07d2b06d40dd849eb6aeb83f8a1d',
			'client_secret' => '23a5b9c4375041b7a564f8a5f5c6d216',
		);
		
		$ch = curl_init('https://oauth.yandex.ru/token');
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $params); 
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_HEADER, false);
		$data = curl_exec($ch);
		curl_close($ch);	
				 
		$data = json_decode($data, true);
		
		if (!empty($data['access_token'])) {
			// Токен получили, получаем данные пользователя.
			$ch = curl_init('https://login.yandex.ru/info');
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, array('format' => 'json')); 
			curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: OAuth ' . $data['access_token']));
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($ch, CURLOPT_HEADER, false);
			$info = curl_exec($ch);
			curl_close($ch);
	 
			$info = json_decode($info, true);
						
			$display_name = $info['display_name'];
			$login = $info['login'];
			$default_email = $info['default_email']; 
			$birthday = $info['birthday'];
			$default_avatar_id = $info['default_avatar_id'];
			$client_id = $info['id'];
			$create_datetime = date('Y-m-d H:i:s');	
			
			//echo $client_id;
			
			$_SESSION['client_id'] = $client_id;
			$_SESSION['display_name'] = $display_name;
			$_SESSION['default_avatar_id'] = $default_avatar_id;
			
									$sk = $_SESSION['sk']; 
									$zp = $_SESSION['zp'];
									$punkt = $_SESSION['punkt'];
									$szp = $_SESSION['szp'];
									$T = $_SESSION['T'];
									$kv = $_SESSION['kv'];
									$pk2 = $_SESSION['pk2'];
									$spk = $_SESSION['spk'];
									$ipkn = $_SESSION['ipkn'];
									$gender = $_SESSION['gender'];
									$nadb = $_SESSION['nadb'];
									$pns = $_SESSION['pns'];
									$pensFond = $_SESSION['pensFond'];
									$nowpens = $_SESSION['nowpens'];
								
			
			$sql = $con->query("SELECT * FROM users WHERE client_id = '".$client_id."'");
			$rows = $sql->num_rows;
			
			if( $rows > 0 ) {
				//echo 'пользователь существует';
				} 
			else {
						//echo 'пользователь новый';
						
						$userquery    = "INSERT into `users` (id, display_name, login, default_email, birthday, 
						default_avatar_id, client_id, create_datetime,
						sk, zp, szp, pns, T, kv, pk2, spk, ipkn, nadb, pensFond, gender, nowpens)
									 VALUES ('', '$display_name', '$login', '$default_email', '$birthday', 
									 '$default_avatar_id', '$client_id', '$create_datetime',
									 $sk, $zp, $szp, $pns, $T, $kv, $pk2, $spk, $ipkn, $nadb, $pensFond, '$gender', '$nowpens'
									 )";
						$result   = mysqli_query($con, $userquery);						
				}
		}
	}
	
  	?>