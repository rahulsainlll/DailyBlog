<?php
   session_start();
   include("./components/header.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
</head>
<body>
   <?php
   if(!empty($_SESSION["username"])){
     echo "Welcome {$_SESSION["username"]} <br>"; 
   }
   ?>
    <form action="<?php $_SERVER["PHP_SELF"] ?>" method="post">
        <input type="submit" name="logout" value="logout"/>
    </form>

   This is the Home Page <br>
   All the blog will show here... !!

</body>
</html>

<?php
   if(isset($_POST["logout"])){
      session_destroy();
      header("Location: login.php"); 
   }
?>
<?php
   include("./components/footer.php");
?>