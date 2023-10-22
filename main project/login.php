<?php include('config/constants.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN FORM</title>
    <link rel="stylesheet" type="text/css" href="css/login.css">
</head>
<body>
    <div class="center">
      <h1>Login to cheesy</h1>
      <form method="post" action="">
        <div class="txt_field">
          <input type="text" name="username" required>
          <span></span>
          <label>Username</label>
        </div>
        <div class="txt_field">
          <input type="password" name="password" required>
          <span></span>
          <label>Password</label>
        </div>
       
        <input type="submit" value="Login" name="submit" >
        <div class="signup_link">
          Not a member?
           <a href="register.php">Signup</a>
        </div>
      </form>
    </div>

  </body>
</html>
  
</body>
</html>
<?php 

    //CHeck whether the Submit Button is Clicked or NOt
    if(isset($_POST['submit']))
    {
        //Process for Login
        //1. Get the Data from Login form
        // $username = $_POST['username'];
        // $password = md5($_POST['password']);
        $username = mysqli_real_escape_string($con, $_POST['username']);
        
        $raw_password = md5($_POST['password']);
        $password = mysqli_real_escape_string($con, $raw_password);

        //2. SQL to check whether the user with username and password exists or not
        $sql = "SELECT * FROM tbl_user WHERE username='$username' AND password='$password'";

        //3. Execute the Query
        $res = mysqli_query($con, $sql);

        //4. COunt rows to check whether the user exists or not
        $count = mysqli_num_rows($res);

        if($count==1)
        {
            //User AVailable and Login Success
            $_SESSION['user'] = $username; //TO check whether the user is logged in or not and logout will unset it
           ?>
             <script>
         alert("LOGIN SUCCESFULL!");
         window.location.href="http://localhost/main%20project/index.php";
         </script>
           <?php
         

            //REdirect to HOme Page/Dashboard
           
        }
        else
        {
          ?>
          <script>
          alert("LOGIN FAILED!");
          window.location.href="http://localhost/main%20project/login.php";
          </script>
          <?php
        }


    }

?>