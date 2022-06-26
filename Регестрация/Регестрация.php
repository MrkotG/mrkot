<!DOCTYPE html><!-- Сообщаем браузеру, как стоит обрабатывать страницу -->
<html lang="ru"><!-- Указываем язык -->
<head><!-- Заголовок страницы, контейнер для других важных данны (не отоборажается) -->
	<link rel="stylesheet" href="style_регистрация.css">
	<link rel="stylesheet" href="stylemedia.css">
	<link rel="shortcut icon" type="image/x-icon" href="jmg/favicon.ico"><!-- Иконка на вкладке -->
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"><!-- Указываем кодировку страницы -->
	<title>Регестрация</title><!-- Заголовок страницы в браузере -->
</head>
<body>
	
	<div class="flex">
		<form action="" method="GET">
			<div class="ram">
				<p>Введите Фамилию:</p> 

				<input placeholder="Фамилия" type="text" name="fam">
				<p>Введите Имя:</p> 
				<input placeholder="Имя" type="text" name="name">

				<p>Введите логин: </p>
				<input placeholder="Логин" type="text" name="login">

				<p>Введите пароль:</p>
				<input placeholder="Пароль" type="password" name="password">

				<p>Повторите пароль:</p>
				 <input placeholder="Повторите пароль" type="password" name="repeatpassword">

				<p>Введите почту:</p>
				 <input placeholder="Почта" type="text" name="email"> 
				<p class="pers">Согласие на обработку персональных данных</p>
				Принимаю <input type="checkbox" name="checkboxx"> <br> <br>

				<input class="zareg" type="submit" name="sub" value="Зарегистрироваться">
				<br> <br>
				<a href="../index.php" class="glavstr">Главная страница</a>
			</div>
		</form>
	</div>


</body>
</html>
<?
session_start();
$host='localhost';
$user='root';
$pass='';
$name='honda';

$link = mysqli_connect($host, $user, $pass, $name);

$fam = $_GET['fam'];
$name = $_GET['name'];
$login = $_GET['login'];
$password = $_GET['password'];
$repeatpassword = $_GET['repeatpassword'];
$email = $_GET['email'];


if (isset($_GET['sub'])) {
	if (!empty($_GET['login']) and !empty($_GET['password']) and !empty($_GET['repeatpassword']) and !empty($_GET['email'])) {
		if ($password == $repeatpassword ) {
			if (isset($_GET['checkboxx'])) {
							
			$query = "INSERT INTO `user` (`id`, `fam`,`name`,`login`, `password`, `email`) VALUES (NULL,'$fam','$name','$login', '$password', '$email')";
			$result = mysqli_query($link, $query);		
			?><div class="reg"><?echo "Вы зарегистрировались"?></div><?;

			$_SESSION['islogin'] = true;
			$_SESSION['fam'] = $fam;
			$_SESSION['name'] = $name;
			$_SESSION['email'] = $email;
			header('Location:http://localhost/Хонда%20—%20копия1.3/');

		} else {
			?><div class="reg"><?echo "Регистрация без согласия невозможна"?></div><?;
		}
		}
		else{
		?><div class="reg"><?echo 'Пароли не совпадают'?></div><?;
		}
	}
	else {
			?><div class="reg"><?echo 'Заполните пустые поля'?></div><?;
	}
	
}
?>