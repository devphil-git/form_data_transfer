<?php

// Функция отображения массива
function debug($data) {
   echo '<pre>';
   print_r($data);
   echo '</pre>';
}

// Обработка массива входящих данных
function load($data) {
   foreach ($_POST as $key => $value) {
      if (array_key_exists($key, $data)) {
         $data[$key]['value'] = trim($value);
      } 
   }
   return $data;
}



// Подгружаемый текст
$MESS["HEADER"] = "Введите данные";
$MESS["BUTTON"] = "Отправить";
$MESS['NAME_VALIDATION_RESULT'] = "Имя введено неверно. Доступны только буквы, пробелы и дефисы";
$MESS['PHONE_VALIDATION_RESULT'] = "Проверьте номер телефона";
$MESS['EMAIL_VALIDATION_RESULT'] = "Некорректный адрес электронной почты" ;


?>