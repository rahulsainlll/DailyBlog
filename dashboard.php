<?php
   session_start();
   include('./database.db.php');
   include('./components/header.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   <h3>Dashboard:</h3>
   <form action="<?php $_SERVER["PHP_SELF"] ?>" method="post">
   <label>Title:</label> <br>
   <input type="text" name="title" placeholder="Enter title"/> <br>
   <label>Content:</label> <br>
   <textarea name="content"></textarea>
   <br>
   <br>
   <input type="submit" name="submit" value="Post"/>
   </form>
</body>
</html>


<?php

   $title = $_POST['title'];
$content = $_POST['content'];

if(isset($_POST['submit'])) {
    if(!empty($title) && !empty($content)) {
        $sql = "INSERT INTO blogPost (title, content, author) VALUES (?, ?, 'Rahul')";

        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, 'ss', $title, $content);
        mysqli_stmt_execute($stmt);

        header("Location: main.php");
        exit;
    }
}
   
  
?>

<?php
   mysqli_close($conn);
?>