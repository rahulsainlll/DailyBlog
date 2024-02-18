<?php
     session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Document</title>

     <style>
         .container {
             display: grid;
             grid-template-columns: 1fr 2fr; 
             gap: 40px;
         }

         .title {
             grid-column: 1;
         }

         .content {
             grid-column: 2;
         }
     </style>


</head>
<body>
 <div class="container">
  
    <?php
   
        $db_server = "localhost";
        $db_user = "root";
        $db_pass = "";
        $db_name = "businessDB";
        $titlesName = "title";
        $contentName = "content";
        
       $conn = mysqli_connect("localhost", "root", "", "businessDB");
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql = "SELECT * FROM blogPost";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                  echo "<div class=$titlesName>";
                    echo "<h2>". $row["title"] ."</h2>";
                    echo "</div>";
                     echo " <div class=$contentName>";
                      echo " <p>". $row["content"] ."</p>";
                     echo"</div> ";
           }
        } else {
            echo "0 results";
        }

        mysqli_close($conn);
    
    ?>
     
   
</div>
</body>
</html>