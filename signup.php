<?php include "config.php"; ?>

<?php
   // $S_name = "";
   // $S_email = "";
   // $S_password = "";

   if(isset($_SESSION['name'])){
      header("location: home.php");
   }


   if(isset($_POST['submit'])){
      if(($_POST['username'] or $_POST['email'] or $_POST['password']) == ""){
         echo "
            <h1>
               Inputs are empty
            </h1>
         ";

         # checking if password does match or not
      } else if($_POST['password'] != $_POST['co_password']){
         echo "
         <h1>
            password is not matched
         </h1>
         ";
      } else {
         $S_name = $_POST['username'];
         $S_email = $_POST['email'];
         $S_password = $_POST['password'];

         # inserting data in database using insert querey
         $insert = $conn->prepare(
            "INSERT INTO USERS (EMAIL, USERNAME, MYPASSWORD)
            VALUES (:email, :username, :mypassword)"
         );
         $insert->execute([
            ":email" => $S_email,
            ":username" => $S_name,
            ":mypassword" => password_hash($S_password, PASSWORD_DEFAULT)
         ]);
      }
   } 
?>

<?php include "./includes/header.php" ?>   
<body>
   <?php include "./includes/navbar.php" ?>

   <div class="container">
      <div class="row justify-content-center">
         <div class="col-md-6">
            <h1>Sign Up</h1>
            <form method="post" accept="signup.php">
               <div class="form-group my-4">
                  <label for="username">Username</label>
                  <input type="text" name="username" class="form-control" id="username" placeholder="Enter your username">
               </div>
               <div class="form-group mb-4">
                  <label for="email">Email</label>
                  <input type="email" name="email" class="form-control" id="email" placeholder="Enter your email">
               </div>
               <div class="form-group mb-4">
                  <label for="password">Password</label>
                  <input type="password" name="password" class="form-control" id="password" placeholder="Enter your password">
               </div>
               <div class="form-group mb-4">
                  <label for="confirm-password">Confirm Password</label>
                  <input type="password" name="co_password" class="form-control" id="confirm-password" placeholder="Confirm your password">
               </div>
               <button type="submit" name="submit" class="btn btn-primary">Sign Up</button>
               <div class="text-center mt-3">
                  <p>If already registered, <a href="login.php">go to Login</a>.</p>
               </div>
            </form>
         </div>
      </div>
  </div>

   <?php include "./includes/scritp.php" ?>
</body>
<?php include "./includes/footer.php" ?>