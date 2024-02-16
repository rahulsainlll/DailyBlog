<?php
   $password = "rahul123";

   $hash = password_hash($password, PASSWORD_DEFAULT);
    
   if(password_verify("rahul12", $hash)){
     echo "Verify";
   } else{
     echo "Imposter";
   }
   
?>