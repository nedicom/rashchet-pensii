<?

// регистрационная информация (пароль #1)
// registration info (password #1)
$mrh_pass1 = "MlyF3G73kgfx0xNMty2m";

// чтение параметров
// read parameters
$out_summ = $_REQUEST["OutSum"];
$inv_id = $_REQUEST["InvId"];
$crc = $_REQUEST["SignatureValue"];

$crc = strtoupper($crc);

$my_crc = strtoupper(md5("$out_summ:$inv_id:$mrh_pass1"));

// проверка корректности подписи
// check signature
if ($my_crc != $crc)
{
  echo "bad sign\n";
  exit();
}

$con = mysqli_connect("localhost","pfr","pfr","pfr");
    // Check connection
	$con->query("SET NAMES 'utf8'");	  
			  if ($con->connect_error) {
				die($connectbutton="Соединение не удалось: " . $con->connect_error);
				}
				$connectbutton="Соединение успешно";
	$querypay    = "UPDATE `users` SET pay='1000' WHERE client_id=$inv_id";			
	$resultpay    = mysqli_query($con, $querypay);	
			

// проверка наличия номера счета в истории операций
$f=@fopen("order.txt","r+") or die("error");

while(!feof($f))
{
  $str=fgets($f);

  $str_exp = explode(";", $str);
  if ($str_exp[0]=="order_num :$inv_id")
  { 
	echo "Операция прошла успешно\n";
	header('Location: https://rashchet-pensii.nedicom.ru/order.php');
  }
}
fclose($f);
?>


