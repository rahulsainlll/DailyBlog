<?php

   $db_server = "localhost";
   $db_user = "root";
   $db_pass = "";
   $db_name = "businessDB";
   $conn = ""; 


  try{
   $conn = mysqli_connect($db_server, $db_user,$db_pass, $db_name);
  } catch(mysqli_sql_exception){
     echo "You are disconnected to database";
  }

   if($conn){
    echo "You are connected to database";
   } 

?>

