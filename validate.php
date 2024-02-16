<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="validate.php" method="post">
      <label>Username: </label><br>
      <input type="text" name="username"/> <br>
      <label>Age: </label> <br>
      <input type="text" name="age"/><br>
      <label>Email: </label> <br>
      <input type="text" name="email"/><br>
      <input type="submit" name="login"/>
    </form>
</body>
</html>

<?php
   if(isset($_POST['login'])){
    
    $username = filter_input(INPUT_POST, "username",FILTER_SANITIZE_SPECIAL_CHARS );
    $age = filter_input(INPUT_POST, "age",FILTER_SANITIZE_NUMBER_INT );
    $email = filter_input(INPUT_POST, "email",FILTER_SANITIZE_EMAIL );
    echo "{$username} <br>";
    echo "{$age} <br>";
    echo "{$email} <br>";
   }
?>