<!DOCTYPE html>
<html lang="ru">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>form data transfer</title>
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   <div class="container">
      <form class="form" action="action.php" method="post">
         <h1 class="form__title">Введите данные</h1>
         <input class="form__input" type="text" name="name" placeholder="Имя">
         <input class="form__input form__input--phone" type="tel" name="phone" placeholder="Телефон" pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}">
         <input class="form__input" type="email" name="email" placeholder="Электронная почта">
         <input class="form__input form__input--date" type="date" name="date" value="2018-07-22">
         <input class="form__input button" type="submit" value="Отправить">
      </form>
   </div>

</body>
</html>