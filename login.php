<?php include "config.php" ?>
<?php include "./includes/header.php" ?> 

<?php
   # check submit
   $L_name = isset($_POST['username']) ?? "";
   $L_password = isset($_POST['password']) ?? "";

   if(isset($_SESSION['name'])){
      header("location: home.php");
   }

   if (isset($_POST['submit'])) {
      if ($_POST['username'] == '' || $_POST['password'] == "") {
         echo "<h1>Please enter username and password</h1>";
      } else {
         $L_name = $_POST['username'];
         $L_password = $_POST['password'];
         // Further processing or validation can be done here

         $login = $conn->query("SELECT * FROM USERS WHERE USERNAME = '$L_name'");
         
         $login->execute();

         $data = $login->fetch(PDO::FETCH_ASSOC);
          
         # echo $login->rowCount();
         if($login->rowCount() > 0){
            if(password_verify($L_password, $data['MYPASSWORD'])){
               echo "<h1>Loged in <br>Welcome....$L_name</h1>";

               $_SESSION['name'] = $data["USERNAME"];
               $_SESSION['email'] = $data['EMAIL'];

               header("location: home.php");
            } else {
               echo "password is wrong";
            }
         } else {
            echo "Somthings is wrong";
         }
      }
   }
?>



<body>
   <?php include "./includes/navbar.php" ?>

   <div class="container">
      <div class="row justify-content-center">
         <div class="col-md-6">
            <h1>Login</h1>
            <form method="post" action="login.php">
               <div class="form-group my-4">
                  <label for="username">Username</label>
                  <input type="text" name="username" class="form-control" id="username" placeholder="Enter your username">
               </div>
               <div class="form-group my-4">
                  <label for="password">Password</label>
                  <input type="password" name="password" class="form-control" id="password" placeholder="Enter your password">
               </div>
               <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            </form>
         </div>
      </div>
   </div>

   <?php include "./includes/scritp.php" ?>
</body>
<?php include "./includes/footer.php" ?>