<?php

$userName = $_POST['name'];
$userPhone = $_POST['phone'];
$userMail = $_POST['email'];
$userDate = $_POST['date'];

$str = <<<DATA
Имя пользователя: $userName <br>
Телефон: $userPhone <br>
Почта: $userMail <br>
Дата: $userDate
DATA;

echo $str;
?>


<hr>
<div>
var_dump ($_POST):
   <pre>
      <? var_dump ($_POST); ?>
   </pre>
</div>
