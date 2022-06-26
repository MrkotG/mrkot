<!DOCTYPE html><!-- Сообщаем браузеру, как стоит обрабатывать страницу -->
<html lang="ru"><!-- Указываем язык -->
<head><!-- Заголовок страницы, контейнер для других важных данны (не отоборажается) -->
	<link rel="stylesheet" href="style_авторизация.css">
	<link rel="stylesheet" href="stylemedia.css">
	<link rel="shortcut icon" type="image/x-icon" href="jmg/favicon.ico"><!-- Иконка на вкладке -->
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"><!-- Указываем кодировку страницы -->
	<title>Авторизация</title><!-- Заголовок страницы в браузере -->
</head>
<body>
	<div class="flex">
		<form action="" method="GET">
	      	<div class="ram">
				<p>Введите логин: </p>
				<input type="text" name="login">
				<p> Введите пароль: </p>
				<input type="password" name="pass">
				<br><br>
				<input class="avtor" type="submit" name="sub" value="Войти">
				<br><br>
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
$flag = false;

if(isset($_REQUEST['sub'])){
	$query = "SELECT * FROM user";
	$result = mysqli_query($link, $query);
	$flag = false;
	$login = $_GET['login'];
	$password = $_GET['pass'];

  while ($myrow = mysqli_fetch_assoc($result)) {
    foreach ($myrow as $key) {
      if ($login == $myrow['login'] && $password == $myrow['password'] ) {
        $flag = true;
        ?><div class="avtoriz"><?echo "Вы авторизовались!"?></div><?;
        
        $famQuery = "SELECT fam FROM user WHERE login = '$login'";
        $famExecution = mysqli_query($link, $famQuery) or die(mysqli_error($link));
        $famFetch = mysqli_fetch_assoc($famExecution);
        foreach($famFetch as $famArray){
        	$fam = $famArray;
        }

        $nameQuery = "SELECT name FROM user WHERE login = '$login'";
        $nameExecution = mysqli_query($link, $nameQuery) or die(mysqli_error($link));
        $nameFetch = mysqli_fetch_assoc($nameExecution);
        foreach($nameFetch as $nameArray){
        	$name = $nameArray;
        }

        $emailQuery = "SELECT email FROM user WHERE login = '$login'";
        $emailExecution = mysqli_query($link, $emailQuery) or die(mysqli_error($link));
        $emailFetch = mysqli_fetch_assoc($emailExecution);
        foreach($emailFetch as $emailArray){
        	$email = $emailArray;
        }

				$_SESSION['islogin'] = true;
				$_SESSION['fam'] = $fam;
				$_SESSION['name'] = $name;
				$_SESSION['email'] = $email;
				header('Location:http://localhost/Хонда%20—%20копия1.3/');
				echo '123qwe';
        break;
      }
    }
  }
}
  if ($flag == false) {
   	?><div class="avtoriz"><?echo "Повторите попытку";?></div><?
  }
?>