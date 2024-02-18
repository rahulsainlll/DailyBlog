<?php
   session_start();
   include("./components/header.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Daily Blog</title>

   <style>
      body{
         height: 100vh;
         /* width: 100vw; */
         background-color: #f2f2f2;
         font-family: Arial, sans-serif;
         overflow-x: hidden; 
          padding: 20px;
      }

      #container {
         max-width: 1400px;
         margin: 0 auto;
         padding: 20px;
         background-color: #fff;
      }

      .page-title {
         font-size: 24px;
         font-weight: bold;
         margin-bottom: 20px;
      }
      .footer {
         margin-top: 40px;
         text-align: center;
         color: #888;
      }
   </style>


</head>
<body>
 <div id="container">
   <!-- <h1 class="page-title">This is the Home Page</h1> -->
    <?php
      include("./components/render.blog.php");
      ?>

   <div class="footer">
      <?php
      include("./components/footer.php");
      ?>
   </div>
 </div>
   
</body>
</html>

<?php
   if(isset($_POST["logout"])){
      session_destroy();
      header("Location: login.php"); 
   }
?>


