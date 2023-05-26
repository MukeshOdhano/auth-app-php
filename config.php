<?php
   # host ----- database Name ----- user(root) ----- password("") -----
   $host = 'localhost';
   $user = "root";
   $password = "";
   $db = 'AUTH';

   # connection with data pass
   $conn = new PDO("mysql:host=$host;dbname=$db;", $user, $password);

   # check if database is connected or not 
   // if($conn){
   //    echo "<h1>DATABASE (' $db ') is connected .....:)</h1>";
   // } else {
      
   //    echo "<h1>try again to connect......<br>with your database!---:(</h1>";
   // }
?>