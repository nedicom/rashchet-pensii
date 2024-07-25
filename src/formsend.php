<?php
$name = $_POST['name'];
$phone = $_POST['phone'];
$chat_name = "@MarkAndNastya";
$token = "7471342210:AAEDkhuLXZootfnjOjDWpbKoeNLSuxzJhUw";
$message = "Привет. \nУ нас заявочка с сайта расчет пенсии.\nИмя клиента - $name\n телефон - $phone\n Всем хорошего дня!";
 
$text = urlencode($message);
$url = "https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_name}&text={$text}";

//https://api.telegram.org/bot7471342210:AAEDkhuLXZootfnjOjDWpbKoeNLSuxzJhUw/sendMessage?chat_id=markandNastya&text=test

$ch = curl_init();
$optArray = array(
    CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => true
);
curl_setopt_array($ch, $optArray);
$result = curl_exec($ch);
curl_close($ch);
header('Location: /src/welldonepage.php');
exit;