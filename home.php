<?php 
   // $name = isset();

?>   


<?php include "./includes/header.php" ?>   
<body>
   <?php include "./includes/navbar.php" ?>

   <div class="home-container font-10">
      <h1>Hello 
         <?php 
            if(!isset($_SESSION['name'])){
               echo "";
            } else {
               echo $_SESSION['name'] ;
            }
         ?>
         <br>   
         Welcome.....
      </h1>
      <h2>To our website</h2>
   </div>

   <?php include "./includes/scritp.php" ?>
</body>
<?php include "./includes/footer.php" ?>
