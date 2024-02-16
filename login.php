<?php
    session_start()
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h3>LOGIN</h3>
    <form action="login.php" method="post">
        <Label>Username:</Label> 
        <input type="text" name="username"/> <br> <br>
        <Label>Password:</Label> 
        <input type="password" name="password"/> <br> <br>
        <input type="submit" name="login"/>
    </form>
</body>
</html>

<?php
    if(isset($_POST['login'])){

        if((!empty($_POST['username']) && (!empty($_POST['password'])) )){
            $_SESSION['username'] = $_POST['username'];
            $_SESSION['password'] = $_POST['password'];

            header("Location: main.php");
        } else{
            echo "Username/password are missing";
        }
    }
?>