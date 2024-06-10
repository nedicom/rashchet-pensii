<?php

    //namespace UserData; //прицеливаемся на будущее
    //use function UserData\load_users_data; //это можно было бы сделать если код переезжает в ООП
    
    function load_users_data($user_ids) {//функция генерирует url со ссылками на пользователей, наверное, без шаблонизатора
        
        $user_ids = explode(',', $user_ids);//вместе с GET может прийти что угодно, поэтому не повредит добавить примитивную проверку того что мы получаем
        
        $new_user_ids = []; //объявим массив
        $k = 0; //и будущий ключ
            
            foreach ($user_ids as $num) { //переберем массив который мы получили их GET 
                if (ctype_digit($num)) { //проверим не пришло ли к нам что-нибудь кроме цифр 
                    $new_user_ids[$k] = $num; //и все что подходит под цифры запишем в новый массив
                    $k++; //проверку мы сделали до обращения в базу, чтобы лишний раз не грузить ее
                }
            }

            $mysqli = new mysqli("localhost","p518662_pfr","Bonaqua12345#$","p518662_pfr"); //надеюсь мы работаем с версией php, где используем mysqli
                if ($mysqli -> connect_errno) {
                    echo "Что-то пошло не так" . $mysqli -> connect_error;
                    exit();
                }
            $query = "SELECT id, display_name FROM users"; // SELECT выводим в переменную заменяем все запросы на ОО стиль и запрос к базе делаем один раз
            $result = $mysqli->query($query); // $query и $result для наглядности, но можно и объединить
            $mysqli -> close();
                
            $data =[];
                
            while ($obj = $result->fetch_object()) { //собираем объекты
                foreach ($new_user_ids as $user_id) { 
                    if($obj->id == $user_id){ //проверяем есть ли объекты с нужным нам user_id
                        $data[$obj->id] = $obj->display_name; //создаем массив где ключ нужный user_id а значение нужное имя
                    }
                }
            }
            
        return $data;
    }
    
    $string = '143,137,140,баав,142';
    //$getdata = load_users_data($_GET['user_ids']); // одинаковое название переменной
    $getdata = load_users_data($string);
    
    foreach ($getdata as $key=>$value) {// второй раз $user_id и $name
         echo "<a href=\"/show_user.php?id=$key\">$value</a></br>"; //возможно стоило использовать конкатенацию и вместо экранирования поставить одинарные кавычки, но как есть работает не плохо
    }