<?php

session_start();

?>
<!DOCTYPE html>
<html lang="ru">


<head>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>14.8</title>
 <link rel="stylesheet" type="text/css" href="style.css" >
</head>

<body>

 <div>

 <div class="container" id="container">
	<div class="form-container sign-in-container">
    <form method="post" action="index.php" class="form">
    <h1 class="title">Спа чАлон</h1>
         <label>Логин</label>
         <input type="text" name="user" placeholder="Введите свой логин">
         <label>Пароль</label>
         <input type="password" name="password" placeholder="Введите пароль">
         <label>Дата рождения</label>
         <input type="date" value="2022-06-01" name="date" id="date" placeholder="Введите дату рождения">
         <button type="submit">Войти</button>
         <?php
            if ($_SESSION['message']) {
                echo "<p style = color:red;> " . $_SESSION['message'] . " </p>";
            }
            unset($_SESSION['message']);
            ?>
     </form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-right">
            <h1>Наши услуги и акции:</h1>
				<p>Антицеллюлитный массаж бедер и ягодиц (20 мин.) — 600₽</p>
                <p>Массаж спины (30 мин.) — 800₽ </p>
                <p>Скрабирование/пилинг (20-30 мин.) — 1000₽ </p>
				<img src="img/Unknown.png" alt="">
			</div>
		</div>
	</div>
</div>
 </div>

 