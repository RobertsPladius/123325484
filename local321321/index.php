<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="cont.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>7PRACTIKA</title>
</head>
<header class="header">
<div class="otstup">
  <div class="logo-headar">
    <img href="index.php" src="рисунок.svg"   id="logo-headar" >
  </div>
  <div class="menu">
	   <a href="#" class="underline-one weg">Домой</a>
  </div>
<div class="menu">
      <a href="dddd.php" class="underline-one weg">Зарегистрироваться</a>
  </div>
</header><br><br><br><br><br><br><br>
<body>
<?php
$host= 'localhost';
$user = 'root';
$password = '';
$db_name = '7pract';
$con = mysqli_connect($host, $user, $password, $db_name);

if(mysqli_connect_errno()){
   echo "failed".mysqli_connect_errno();
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $password = $_POST["password"];
    $errors = array();
    if (strlen($password) < 8) {
        $errors[] = "Пароль должен содержать 8 символов";
    }
    if (!preg_match('/[A-Z]/', $password)) {
        $errors[] = "Пароль должен содержать заглавную букву";
    }
    if (!preg_match('/[a-z]/', $password)) {
        $errors[] = "Пароль должен содержать строчную букву";
    }
    if (!preg_match('/[0-9]/', $password)) {
        $errors[] = "Пароль должен содержать одну цифру";
    }
    if (!preg_match('/[!@#$%^&*]/', $password)) {
        $errors[] = "Пароль должен содержать один специальный символ (!@#$%^&*)";
    }
    if (strpos($password, ' ') !== false) {
        $errors[] = "Пароль не должен содержать пробелы";
    }
    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo "<p>$error</p>";
        }
    } else {
    $username = stripcslashes($_REQUEST['username']);
    $username = mysqli_real_escape_string($con,$username);
    $email = stripcslashes($_REQUEST['email']);
    $email = mysqli_real_escape_string($con,$email);
    $phone = stripcslashes($_REQUEST['phone']);
    $phone = mysqli_real_escape_string($con,$phone);
    $birthdate = stripcslashes($_REQUEST['birthdate']);
    $birthdate = mysqli_real_escape_string($con,$birthdate);
    $address = stripcslashes($_REQUEST['address']);
    $address = mysqli_real_escape_string($con,$address);
    $quantity = stripcslashes($_REQUEST['quantity']);
    $quantity = mysqli_real_escape_string($con,$quantity);
    $password = stripcslashes($_REQUEST['password']);
    $password = mysqli_real_escape_string($con,$password);
    $birthdate= date( 'Y-m-d');
    $query = "INSERT into `users` (name, password, email, phone,adress,data, tovar)
     VALUES ('$username', '$password', '$email', '$phone', '$address', '$birthdate', '$quantity')";
    $ult = mysqli_query($con, $query)  or die(mysqli_error($con));
    if($ult){
        echo "
        <h3>Регистрация прошла</h3><br/>
        ";
    }else{
        echo "      
        <h3>Вы заполнил не все поля .</h3><br/>
        ";
         }    
}
        echo "Пароль принят!";
    }
else{
?>

<div class="cont">
<form novalidate method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
<div class="text-field__message">Укажите Имя пользователя.</div>
<label  for="username"></label>
  <input class="text-field__input text-field__input_invalid" type="text" id="username" name="username" minlength="1" maxlength="20" pattern="[а-яА-Я]+" required>
  <br>
  <div class="text-field__message">Укажите пароль.</div>
  <label for="password"></label>
  <input class="text-field__input text-field__input_invalid" type="password" id="password" name="password" minlength="8"  maxlength="20" required>
  <br>
  <div class="text-field__message">Укажите почту.</div>
  <label for="email"></label>
  <input class="text-field__input text-field__input_invalid" type="email" id="email" name="email" minlength="6" maxlength="100" required>
  <br>
  <div class="text-field__message">Укажите номер телефона.</div>
  <label for="phone"></label>
  <input class="text-field__input text-field__input_invalid" type="number" id="phone" name="phone" minlength="6" maxlength="15" required>
  <br>
  <div class="text-field__message">Укажите Адрес.</div>
  <label for="address"></label>
  <input class="text-field__input text-field__input_invalid" type="вфеф" id="address" name="address" minlength="6" maxlength="100" required>
  <br>
  <div class="text-field__message">Укажите дату рождения.</div>
  <label for="birthdate"></label>
  <input class="text-field__input text-field__input_invalid" type="date" id="birthdate" name="birthdate" required>
  <br>
  <div class="text-field__message">Укажите кол-во товара.</div>
  <label for="quantity"></label>
  <input class="text-field__input text-field__input_invalid" type="number" id="quantity" name="quantity" min="1" max="100" required>
  <br>
  <button type="submit">Отправить</button>
</form>

<?php
}
?>
<script>// input - переменная, содержащая элемент <input>
if (input.checkValidity()) {
  input.classList.add('text-field__input_valid');
  input.nextElementSibling.textContent = 'Отлично!';
} else {
  input.classList.add('text-field__input_invalid');
  input.nextElementSibling.textContent = input.validationMessage;
}</script>
</div>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>


<footer class="footer">
    <div class="waves">
      <div class="wave" id="wave1"></div>
      <div class="wave" id="wave2"></div>
      <div class="wave" id="wave3"></div>
      <div class="wave" id="wave4"></div>
    </div>
    <ul class="social-icon">
      <li class="social-icon__item"><a class="social-icon__link" href="#">
          <ion-icon name="logo-facebook"></ion-icon>
        </a></li>
      <li class="social-icon__item"><a class="social-icon__link" href="#">
          <ion-icon name="logo-twitter"></ion-icon>
        </a></li>
      <li class="social-icon__item"><a class="social-icon__link" href="#">
          <ion-icon name="logo-linkedin"></ion-icon>
        </a></li>
      <li class="social-icon__item"><a class="social-icon__link" href="#">
          <ion-icon name="logo-instagram"></ion-icon>
        </a></li>
    </ul>
    <ul class="menu">
    <li class="menu__item"><a class="menu__link" href="#">Главная</a></li>
      <li class="menu__item"><a class="menu__link" href="#">Регистрация</a></li>


    </ul>
    <p>&copy;7PRACTIKA | All Rights Reserved</p>
  </footer>
</body>
</html>