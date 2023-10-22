<?php include('config/constants.php'); ?>
<!DOCTYPE html>
<!-- Coding by CodingLab | www.codinglabweb.com-->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--<title> Registration or Sign Up form in HTML CSS | CodingLab </title>-->
   <style>
       @import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins', sans-serif;
}
body{
  min-height: 100vh;
  display: flex;
  align-items: center;
  justify-content: center;
 background-image: url('http://localhost/main%20project/images1/mafe-estudio-LV2p9Utbkbw-unsplash.jpg');
 background-size: cover;
    background-repeat: no-repeat;
}
.wrapper{
  position: relative;
  max-width: 430px;
  width: 100%;
  background: #fff;
  padding: 34px;
  border-radius: 6px;
  box-shadow: 0 5px 10px rgba(0,0,0,0.2);
  background-color: rgba(0,0,0,0.5);
}
.wrapper h2{
  position: relative;
  font-size: 22px;
  font-weight: 600;
  color: #E8F728;
}
.wrapper h2::before{
  content: '';
  position: absolute;
  left: 0;
  bottom: 0;
  height: 3px;
  width: 28px;
  border-radius: 12px;
  background: #4070f4;
}
.wrapper form{
  margin-top: 30px;
}
.wrapper form .input-box{
  height: 52px;
  margin: 18px 0;
}
form .input-box input{
  height: 100%;
  width: 100%;
  outline: none;
  padding: 0 15px;
  font-size: 17px;
  font-weight: 400;
  color: #333;
  border: 1.5px solid #C7BEBE;
  border-bottom-width: 2.5px;
  border-radius: 6px;
  transition: all 0.3s ease;
}
.input-box input:focus,
.input-box input:valid{
  border-color: #F3E83F ;
}
form .policy{
  display: flex;
  align-items: center;
}
form .policy h3{
    color: #EEEDE8 ;
}
form h3{
    color: #EEEDE8 ;
  font-size: 14px;
  font-weight: 500;
  margin-left: 10px;
}
.input-box.button input{
  color: #fff;
  letter-spacing: 1px;
  border: none;
  background:  #E2F222;
  cursor: pointer;
}
.input-box.button input:hover{
  background: #E9BE11 ;
}
form .text h3{
 color:  #EEEDE8;
 width: 100%;
 text-align: center;
}
form .text h3 a{
  color: #4070f4;
  text-decoration: none;
}
form .text h3 a:hover{
  text-decoration: underline;
}

   </style>
   </head>
<body>
  <div class="wrapper">
    <h2>Registration</h2>
    <form action="" method="POST">
      <div class="input-box">
        <input type="text" name="username" placeholder="Enter a username" required>
      </div>
      <div class="input-box">
        <input type="text" placeholder="Enter your email" name="email" required>
      </div>
      <div class="input-box">
        <input type="password" placeholder="Create password" name="password" required>
      </div>
      <div class="input-box">
        <input type="password" placeholder="Confirm password" required>
      </div>
      <div class="input-box">
        <input type="number" placeholder="mobile number" name="mobile" required>
      </div>
      <div class="policy">
        <input type="checkbox">
        <h3>I accept all terms & condition</h3>
      </div>
      <div class="input-box button">
        <input type="Submit" name="submit" value="Register Now">
      </div>
      <div class="text">
        <h3>Already have an account? <a href="login.php">Login now</a></h3>
      </div>
    </form>
  </div>
</body>
</html>

<?php 
    //Process the Value from Form and Save it in Database

    //Check whether the submit button is clicked or not

    if(isset($_POST['submit']))
    {
        // Button Clicked
        //echo "Button Clicked";

        //1. Get the Data from form
        
        $username = $_POST['username'];
        $password = md5($_POST['password']); //Password Encryption with MD5
        $email=$_POST['email'];
        $mobile=$_POST['mobile'];

        //2. SQL Query to Save the data into database
        $sql = "INSERT INTO tbl_user SET 
            username='$username',
            password='$password',
            email='$email',
            mobile=$mobile
        ";
 
        //3. Executing Query and Saving Data into Datbase
        $res = mysqli_query($con, $sql) or die('data not inserted');

        //4. Check whether the (Query is Executed) data is inserted or not and display appropriate message
        if($res==TRUE)
        {
            ?>
         <script>
         alert("user added succesfully! redirecting to login page");
         window.location.href="http://localhost/main%20project/login.php";
         </script>
         <?php
        }
        else
        {
           ?>
            <script>
         alert("user added succesfully! redirecting to login page");
         window.location.href="http://localhost/main%20project/register.php";
         </script>
           
           <?php
        }

    }
    
?>
