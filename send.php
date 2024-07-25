    <?php
/* Здесь проверяется существование переменных */
if (isset($_POST['myphone'])) {$myphone = $_POST['myphone'];}

 
/* Сюда впишите свою эл. почту */
$myaddres  = "m6132@yandex .ru"; // кому отправляем
 
/* А здесь прописывается текст сообщения, \n - перенос строки */
$mes = "Тема: Заказ звонка по пенсионному расчету \nТелефон: $myphone";
 
/* А эта функция как раз занимается отправкой письма на указанный вами email */
$sub='Заявка'; //сабж
$email='mail@nedicom.ru'; // от кого
//$send = mail ($myaddres,$sub,$mes,"Content-type:text/plain; charset = utf-8\r\nFrom:$email");

    $params = [
        'to' => $myaddres,
        's' => $sub,
        'b' => $mes,
    ];
    $url = 'https://crm.nedicom.ru/mail/?' . http_build_query($params);
    echo '<pre>';

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_HEADER, false);
    $html = curl_exec($ch);
    curl_close($ch);
 
ini_set('short_open_tag', 'On');
header('Refresh: 3; URL=index.html');
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta http-equiv="refresh" content="3; url=index.html">
<title>Спасибо! Телефон отправлен специалисту! Скоро мы свяжемся с вами! </title>
<meta name="generator">
<script type="text/javascript">
setTimeout('location.replace("http://rashchet-pensii.nedicom.ru/")', 3000);
/*Изменить текущий адрес страницы через 3 секунды (3000 миллисекунд)*/
</script> 
</head>
<body>
<h1>Спасибо! Мы свяжемся с вами!</h1>
</body>
</html>