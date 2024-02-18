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
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            padding: 20px;
        }
        
        h3 {
            color: #333;
        }
        
        form {
            margin-top: 10px;
        }
        
        label {
            font-weight: bold;
        }
        
        input[type="text"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
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
    </style>
</head>
<body>
   <h3>Share Your Thoughts</h3>
   <form action="<?php $_SERVER["PHP_SELF"] ?>" method="post">
   <label>Title:</label> <br>
   <input type="text" name="title" placeholder="Enter title"/> <br>
   <label>Content:</label> <br>
   <textarea rows="15" name="content"></textarea>
   <br>
   <br>
   <input type="submit" name="submit" value="Post"/>
   </form>
</body>
</html>


<?php

 $title = $_POST['title'];
 $content = $_POST['content'];
 $username = $_SESSION['username'];

if(isset($_POST['submit'])) {

    if(!empty($title) && !empty($content)) {
        $sql = "INSERT INTO blogPost (title, content, author) VALUES (?, ?, ?)";

        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, 'sss', $title, $content, $username);
        mysqli_stmt_execute($stmt);

        header("Location: main.php");
        exit;
    }
}

?>

<?php
   mysqli_close($conn);
?>

