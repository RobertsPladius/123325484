

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
    
    // Проверка ограничений
    $errors = array();
    
    // Ограничение 1: Пароль должен быть не менее 8 символов
    if (strlen($password) < 8) {
        $errors[] = "Пароль должен содержать не менее 8 символов";
    }
    
    // Ограничение 2: Пароль должен содержать хотя бы одну заглавную букву
    if (!preg_match('/[A-Z]/', $password)) {
        $errors[] = "Пароль должен содержать хотя бы одну заглавную букву";
    }
    
    // Ограничение 3: Пароль должен содержать хотя бы одну строчную букву
    if (!preg_match('/[a-z]/', $password)) {
        $errors[] = "Пароль должен содержать хотя бы одну строчную букву";
    }
    
    // Ограничение 4: Пароль должен содержать хотя бы одну цифру
    if (!preg_match('/[0-9]/', $password)) {
        $errors[] = "Пароль должен содержать хотя бы одну цифру";
    }
    
    // Ограничение 5: Пароль должен содержать хотя бы один специальный символ (!@#$%^&*)
    if (!preg_match('/[!@#$%^&*]/', $password)) {
        $errors[] = "Пароль должен содержать хотя бы один специальный символ (!@#$%^&*)";
    }
    
    // Ограничение 6: Пароль не должен содержать пробелы
    if (strpos($password, ' ') !== false) {
        $errors[] = "Пароль не должен содержать пробелы";
    }
    
    // Если есть ошибки, выводим их
    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo "<p>$error</p>";
        }
    } else {
         // имя
    $username = stripcslashes($_REQUEST['username']);
    $username = mysqli_real_escape_string($con,$username);
    // фамилия
    $email = stripcslashes($_REQUEST['email']);
    $email = mysqli_real_escape_string($con,$email);

    // мобильный
    $phone = stripcslashes($_REQUEST['phone']);
    $phone = mysqli_real_escape_string($con,$phone);

    // дата
    $birthdate = stripcslashes($_REQUEST['birthdate']);
    $birthdate = mysqli_real_escape_string($con,$birthdate);
           // АДРЕС
    $address = stripcslashes($_REQUEST['address']);
    $address = mysqli_real_escape_string($con,$address);
          // ТОВАР
    $quantity = stripcslashes($_REQUEST['quantity']);
    $quantity = mysqli_real_escape_string($con,$quantity);

    // пароль
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


<form  method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
  <label for="username">Имя пользователя:</label>
  <input type="text" id="username" name="username" minlength="1" maxlength="20" pattern="[а-яА-Я]+" required>
  <br>


  <label for="password">Пароль:</label>
  <input type="password" id="password" name="password" minlength="8"  maxlength="20" required>
  <br>


  <label for="email">Email:</label>
  <input type="email" id="email" name="email" minlength="6" maxlength="100" required>
  <br>

  <label for="phone">Номер телефона:</label>
  <input type="number" id="phone" name="phone" minlength="6" maxlength="15" required>
  <br>

  <label for="address">Адрес доставки:</label>
  <input type="вфеф" id="address" name="address" minlength="6" maxlength="100" required>
  <br>

  <label for="birthdate">Дата рождения:</label>
  <input type="date" id="birthdate" name="birthdate" required>
  <br>
  <label for="quantity">Количество товара:</label>
  <input type="number" id="quantity" name="quantity" min="1" max="100" required>
  <br>
  <button type="submit">Отправить</button>
</form>


<?php
}
?>