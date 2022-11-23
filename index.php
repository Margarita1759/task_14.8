<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css" media="all">
    <title>Document</title>
</head>
<body>


<?php
		// Возвращаем массив всех пользователей
		function getUsersList()
		{
			return include __DIR__ . '/data.php';
		};

        $log = $_POST['user'];
        $pas = $_POST['password'];
        //Проверка существования пользователя

        function existsUser($login){
            $users = getUsersList();
            foreach ($users as $user) {
                if ($user['login'] === $login) {
                    return true;
                }
            }
            return false;
        }

// Проверка пользователя

function checkPassword ($login, $password) {
    if (true === existsUser($login)) {
        $users = getUsersList();
        foreach ($users as $user) {
            if ($user['login'] === $login) {
                if (password_verify($password, $user['password'])) {
                    return true;
                }
            }
        }
    }
    // echo ("<p>Неверный логин или пароль!</p> ");
			return false;
}

    assert(true === checkPassword('Margarita', '1234'));
	assert(true === checkPassword('Regina', '4321'));
	assert(false === checkPassword('Vasya1', '123'));
	assert(false === checkPassword('Vasya', '12345'));
	assert(false === checkPassword('Vasya1', '12345'));


// Получаем имя текущего пользователя
function getCurrentUser() {
    if (isset ($_SESSION['user']) && !empty ($_SESSION['user'])) {
        return $_SESSION['user'];
    } else {
        return null;
    }
}

if (isset($log) && isset($pas)) {
    if (checkPassword($log, $pas)) {
        $_SESSION['user'] = $log;
        header ('Location: ../index.php');
    } else {
        $_SESSION['message']= 'Не верный логин или пароль';
        header ('Location: ../login.php');
    }
}
if (null !== getCurrentUser()) {
} else {
    header('Location: ../login.php');
}

// выводим приветствие по имени пользователя и дату рождения
if (null !== getCurrentUser()) { ?>
    <h1>Здравствуйте, <?php
                            echo (getCurrentUser());
                        } ?></h1>








<?php
// Разместите на главной странице индивидуальную акцию
 

$datetime1 = new DateTime(date("H:i:s"));//Получаем текущее время
$datetime2 = new DateTime('23:59:59');//Время, до которого действует акция


$interval = $datetime1->diff($datetime2); // Считаем разницу для времени

 

?>
<div id="personal">
	<div id="sale">Акция только для вас </div>
    <div> Массаж стоп со скидкой 43% </div>
    <h1>Осталось до конца акции: <?php
                            echo $interval->format(' %h ч. %i мин. %s сек.');
                        ?></h1>
	
</div>


<?php
 // При следующем входе на сайт напишите, сколько дней осталось до его дня рождения. Если сегодня день рождения пользователя — поздравьте его! 
 //Отобразите персональную скидку 5% на все услуги салона.

 $birthday = new DateTime(date($_POST['date']));
 $datetime = new DateTime(date("Y-m-d")); //Получаем текущую дату



 $interval2 = $datetime->diff($birthday);// Считаем разницу для года, месяца и дня


 ?>



<div id="birth">

    <h1>Осталось до дня рождения: <?php
                            echo $interval2->format('%m мес. %d д.');
                        ?></h1>
	
</div> 

<div class="logout">
    <a href="logout.php">Выйти</a>
</div>


</body>
</html>