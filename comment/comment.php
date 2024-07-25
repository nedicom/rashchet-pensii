<?php

session_start();

    //$con = mysqli_connect("a140468.mysql.mchost.ru","a140468_pfr","re0pR8jss0","a140468_pfr");
    $con = mysqli_connect("localhost","pfr","pfr","pfr");
    // Check connection
	$con->query("SET NAMES 'utf8'");	  
			  if ($con->connect_error) {
				die($connectbutton="Соединение не удалось: " . $con->connect_error);
				}
				$connectbutton="Соединение успешно";
				
	/* Принимаем данные из формы */
		$textcomment = $_POST["textcomment"];

		$textcomment = htmlspecialchars($textcomment);// Преобразуем спецсимволы в HTML-сущности
						//echo $textcomment;
						$client_comment_id = $_SESSION['client_id'];
						$display_comment_avatar = $_SESSION["default_avatar_id"];
						$display_comment_name = $_SESSION['display_name'];						
						$create_comment_datetime = date('Y-m-d H:i:s');	

		  
		$querycomment    = "INSERT into `comments` (`id`, `text_comment`, `display_name`, `client_id`, `create_datetime`, `default_avatar_id`)
									 VALUES ('', '$textcomment', '$display_comment_name', '$client_comment_id', '$create_comment_datetime', '$display_comment_avatar')";
		$resultcomment   = mysqli_query($con, $querycomment);		
			
		header("Location: ".$_SERVER["HTTP_REFERER"]);// Делаем реридект обратно

?>