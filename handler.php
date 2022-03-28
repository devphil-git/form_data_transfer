<?php
session_start();
include 'inc.php';


// Массив для хранения всех данных
$arrFields = [
   'name' => [
      'field_name' => 'Имя',
      'required' => 0,
   ],
   'phone' => [
      'field_phone' => 'Телефон',
      'required' => 0,
   ],
   'email' => [
      'field_mail' => 'Email',
      'required' => 0,
   ],
   'file' => [
      'field_mail' => 'File',
      'required' => 0,
   ],
   'date' => [
      'field_mail' => 'Дата',
      'required' => false,
   ],
];

$arrFields = load($arrFields);   // добавление введённых данных
debug($arrFields);


// Валидация имени
// Буквы, пробелы и дефисы
$regex_name = "/^[a-zа-яё' -]{3,80}$/i";
if (preg_match($regex_name, $arrFields['name']['value'])) {
   $valNameResult = "Валидация имени пройдена";
   $_SESSION['name'] = $arrFields['name']['value'];
   $_SESSION['name-error'] = false;                   // Тестовый элементы для валидации 
} else {
   $valNameResult = "Имя некорректно";
   $_SESSION['name-error'] = true;                   // Тестовый элементы для валидации 
}

// Валидация телефона
// Убирает всё кроме цифр
$userPhoneMod = preg_replace('/[^\d]/', '', $arrFields['phone']['value']);
if (strlen($userPhoneMod) == 11) {
   $userPhoneResult = "Валидация телефона пройдена";
   $_SESSION['phone'] = $arrFields['phone']['value'];
   $_SESSION['phone-error'] = false;
} else {
   $userPhoneResult = "Телефон некорректный";
   $_SESSION['phone-error'] = true;
}

// Валидация email (встроенный фильтр php)
if (filter_var($arrFields['email']['value'], FILTER_VALIDATE_EMAIL)) {
   $filterMailResult = "Валидация email пройдена (Filter)";
} else {
   $filterMailResult = "Email некорректный  (Filter)";
}

// Валидация email (регулярное выражение)                                              
// 'Всё кроме пробелов' @ 'минимут две буквы, цифры или дефис' . 'минимум 2 буквы'
$regex_mail = "/^[a-z0-9]{1,}\S?[a-z0-9]+@[a-z0-9\-]{2,}+\.[a-z]{2,}/i";

if (preg_match($regex_mail, $arrFields['email']['value'])) {
   $valMailResult = "Валидация email пройдена (RegEx)";
   $_SESSION['email'] = $arrFields['email']['value'];
   $_SESSION['email-error'] = false;
} else {
   $valMailResult = "Email некорректный (RegEx)";
   $_SESSION['email-error'] = true;
}

//Валидация файлов
//Массив исполняемых файлов
$arrExecutableFiles = ['.apk', '.bat', '.bin', '.cgi', '.cmd', '.com', '.cpp', '.js', '.jse', '.exe', '.gadget', '.gtp', '.hta', '.jar', '.msi', '.msu', '.paf', '.pif', '.ps1', '.pwz', '.scr', '.thm', '.vb', '.vbe', '.vbs', '.wsf'];

// Разделение даты
$userDateMod = preg_replace('/[^\d]/', '', $arrFields['date']['value']);
$userDateYear = substr($userDateMod, 0, 4);
$userDateMonth = substr($userDateMod, 4, 2);
$userDateDay = substr($userDateMod, 6, 2);

?>


<hr>

<?php 
//Для тестов
$userName = $_POST['name'];
$userPhone = $_POST['phone'];
$userMail = $_POST['email'];
$userFile = $_POST['file'];
$userDate = $_POST['date'];

echo <<<DATA
Имя: $userName  -  $valNameResult <br>
Телефон: $userPhone  -  $userPhoneResult<br>
Почта: $userMail  -  $filterMailResult <br>
Почта: $userMail  -  $valMailResult <br>
Файл:  <br> 
Дата: $userDate  - день:$userDateDay  месяц: $userDateMonth год: $userDateYear <br>
DATA;
?>

<hr>


<?php
// debug($_POST);
header('Refresh: 5; URL=index.php');
?>