<?php
    session_start();

    function validateEmail($email) {
        // Email validation logic here
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    function filterPassword($password) {
        // Password filtering logic here
        return filter_var($password, FILTER_SANITIZE_SPECIAL_CHARS);
    }

    if(isset($_POST['signup'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

        if(!empty($username) && !empty($password)){
            $filteredUsername = validateEmail($username);
            $filteredPassword = filterPassword($password);

            if($filteredUsername && $filteredPassword) {
                $_SESSION['username'] = $filteredUsername;
                $_SESSION['password'] = $filteredPassword;

                header("Location: main.php");
            } 
        } 
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }

        h3 {
            text-align: center;
        }

        form {
            width: 300px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            margin-bottom: 10px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        .error-message {
            color: red;
            text-align: center;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <h3>Sign up</h3>
    <form action="signup.php" method="post">
        <label>Email:</label> 
        <input type="text" name="username"/> <br> <br>
        <label>Password:</label> 
        <input type="password" name="password"/> <br> <br>
        <input type="submit" name="signup"/>
        <?php if(isset($_POST['signup']) && (!$filteredUsername || !$filteredPassword)) { ?>
            <div class="error-message">Invalid email or password</div>
        <?php } elseif(isset($_POST['signup']) && (empty($username) || empty($password))) { ?>
            <div class="error-message">Username/password are missing</div>
        <?php } ?>
    </form>
</body>
</html>
