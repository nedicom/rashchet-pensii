<?php
    $con = mysqli_connect("178.208.94.106","pfr","pfr","pfr");
    // Check connection
	$con->query("SET NAMES 'utf8'");	  
			  if ($con->connect_error) {
				die($connectbutton="Соединение не удалось: " . $con->connect_error);
				}
				$connectbutton="Соединение успешно";
?>