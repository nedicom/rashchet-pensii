<?php
	include 'login_ya.php';
	$paramsurl = array(
		'client_id'     => 'f63f07d2b06d40dd849eb6aeb83f8a1d',
		'redirect_uri'  => 'https://rashchet-pensii.nedicom.ru/order.php',
		'response_type' => 'code',
		'state'         => '123'
	);

	$defaultAvatarId = array_key_exists('default_avatar_id', $_SESSION) ? true : false;

	//If(($_SESSION['default_avatar_id'])){
	If($defaultAvatarId){		
		$avatar = $_SESSION["default_avatar_id"];
		$urlmenu = 'logout.php';
		$voiti = 'выйти';
		$avatarlink = 'order.php';
		$display_name = $_SESSION['display_name'];

	}
	else{
		
			$avatar = 'default_avatar_id';
			$urlmenu = 'https://oauth.yandex.ru/authorize?' . urldecode(http_build_query($paramsurl));
			$voiti = 'войти';
			$avatarlink = 'https://oauth.yandex.ru/authorize?' . urldecode(http_build_query($paramsurl));
			$display_name = '';
			// $display_name = $_SESSION['display_name'];
	}

	
	echo '
	<body>
	
		<nav class="navbar navbar-expand-lg bg-light">
		  <div class="container-fluid">
			<a class="navbar-brand px-3" href="/"><img src="img/favicon.svg"  width="32px"></a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			  <i class="fa-solid fa-bars"></i>
			</button>
			<div class="collapse navbar-collapse" id="navbarNav">
			
			  <ul class="navbar-nav mr-auto col-md-9" itemscope itemtype="http://schema.org/SiteNavigationElement">				
				<li class="nav-item">
				  <a itemprop="url" class="nav-link link-secondary" href="order.php">личный кабинет</a> 
				</li>
				<li class="nav-item">
				  <a itemprop="url" class="nav-link link-secondary" href="orderuslugi.php">на консультацию</a> 
				</li>
				</ul>	
				
						<ul class="navbar-nav d-flex justify-content-end col-md-3 text-center" itemscope itemtype="http://schema.org/SiteNavigationElement">
							<li class="nav-item row align-items-center mx-1">
								<a itemprop="url" class="nav-link link-secondary" href="order.php">'.$display_name.'</a>
							</li>
							<li class="nav-item row align-items-center mx-1">
								<a itemprop="url" class="nav-link link-secondary" href="' . $urlmenu . '">'.$voiti.'</a>
							</li>
							<li class="nav-item">
								<a itemprop="url" class="nav-link link-secondary" href="'.$avatarlink.'"><img class="img-fluid rounded" src="https://avatars.yandex.net/get-yapic/'.$avatar.'/islands-34"></a>
							</li>
						
						</ul>							  
				

				
			</div>
		  </div>
		</nav>	';
?>
	
