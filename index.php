<?php
session_start();
require 'inc.php';
?>

<!DOCTYPE html>
<html lang="ru">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>form data transfer</title>
   <link rel="stylesheet" href="css/style.css">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
   <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
   <script src="js/jquery.inputmask.js"></script> -->
   <script src="js/script.js"></script>
</head>
<body>

   <div class="container">

   <?php debug($_SESSION); ?>

      <form class="form" action="handler.php" method="post">
         <h1 class="form__title"><?= $MESS["HEADER"] ?></h1>
         <input class="form__input form__input--name" type="text" name="name" placeholder="Имя">
         <? if ($_SESSION['name-error']) : ?>
            <div class="form__input--error"> <?= $MESS['NAME_VALIDATION_RESULT'] ?></div>
         <? endif; ?>
         <input class="form__input form__input--phone" type="tel" name="phone" id="phone" placeholder="Телефон">
         <? if ($_SESSION['phone-error']) : ?>
            <div class="form__input--error"> <?= $MESS['PHONE_VALIDATION_RESULT'] ?></div>
         <? endif; ?>
         <input class="form__input form__input--email" type="text" name="email" placeholder="Email">
         <? if ($_SESSION['email-error']) : ?>
            <div class="form__input--error"> <?= $MESS['EMAIL_VALIDATION_RESULT'] ?></div>
         <? endif; ?>
         <div class="file-wrapper" id="file-container">
            <label class="form__input" for="file">Загрузить файл</label>
            <input class="form__input form__input--file" type="file" id="file" name="file">
         </div>
         <input class="form__input form__input--date" type="date" name="date" value="">
         <button class="form__input button" type="submit"><?= $MESS["BUTTON"] ?></button>
         <div class="session_destroy">
            <a href="logout.php">Сбросить сессию</a>
         </div>
      </form>
   </div>



</body>
</html>