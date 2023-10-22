<?php 
// inclusing the constants.php
 
//start session
session_start();
define('SITEURL','http://localhost/main%20project/');
$con=mysqli_connect('localhost','root','') or die("failed");
     $db_select=mysqli_select_db($con,'hotel') or die("failed");
     ?>
<style>
    *{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: "Poppins", sans-serif;
  }
  body{
    margin: 0;
    padding: 0;
    background-image: url('http://localhost/main%20project/admin/images/pexels-mati-mango-6330644.jpg');
    background-size: cover;
    background-repeat: no-repeat;
    height: 100vh;
    overflow: hidden;
  }
  .center{
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 400px;
    background: white;
    background-color: rgba(0,0,0,0.5);
    border-radius: 10px;
    box-shadow: 10px 10px 15px rgba(0,0,0,0.05);
  }
  .center h1{
    text-align: center;
    padding: 20px 0;
    border-bottom: 1px solid silver;
    color: #081774  ;
  }
  .center form{
    padding: 0 40px;
    box-sizing: border-box;
  }
  form .txt_field{
    position: relative;
    border-bottom: 2px solid #adadad;
    margin: 30px 0;
  }
  .txt_field input{
    width: 100%;
    padding: 0 5px;
    height: 40px;
    font-size: 16px;
    border: none;
    background: none;
    outline: none;
  }
  .txt_field label{
    position: absolute;
    top: 50%;
    left: 5px;
    color: #adadad;
    transform: translateY(-50%);
    font-size: 16px;
    pointer-events: none;
    transition: .5s;
  }
  .txt_field span::before{
    content: '';
    position: absolute;
    top: 40px;
    left: 0;
    width: 0%;
    height: 2px;
  
    transition: .5s;
  }
  .txt_field input:focus ~ label,
  .txt_field input:valid ~ label{
    top: -5px;
    color:  #0DE90C  ;
  }
  .txt_field input:focus ~ span::before,
  .txt_field input:valid ~ span::before{
    width: 100%;
  }
  .pass{
    margin: -5px 0 20px 5px;
    color:  #0DE90C ;
    cursor: pointer;
  }
  .pass:hover{
    text-decoration: underline;
  }
  input[type="submit"]{
    width: 100%;
    height: 50px;
    border: 1px solid;
    background: #04970F  ;
    border-radius: 25px;
    font-size: 18px;
    color: #e9f4fb;
    font-weight: 700;
    cursor: pointer;
    outline: none;
  }
  input[type="submit"]:hover{
    border-color: #048831  ;
    transition: .5s;
  }
</style>
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
      <h1>Login to ADMIN PANEL</h1>
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
       
      </form>
    </div>

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
        $sql = "SELECT * FROM tbl_admin WHERE username='$username' AND password='$password'";

        //3. Execute the Query
        $res = mysqli_query($con, $sql);

        //4. COunt rows to check whether the user exists or not
        $count = mysqli_num_rows($res);

        if($count==1)
        {
            //User AVailable and Login Success
            $_SESSION['user1'] = $username; //TO check whether the user is logged in or not and logout will unset it
           ?>
             <script>
         alert("LOGIN SUCCESFULL!");
         window.location.href="http://localhost/main%20project/admin/index.php";
         </script>
           <?php
         

            //REdirect to HOme Page/Dashboard
           
        }
        else
        {
          ?>
          <script>
          alert("LOGIN FAILED!");
          window.location.href="http://localhost/main%20project/admin/login.php";
          </script>
          <?php
        }


    }

?>