<?php
session_start();
include('config.php');
?>
<?php
if(isset($_POST['login'])){
  $Name = $_POST['userName'];
  $Password = $_POST['userpassword'];

  $login = "SELECT * FROM `users` WHERE userName='$Name' and userpassword='$Password'";

  $query = mysqli_query($conn, $login);
  
  if(mysqli_num_rows($query) === 1){
    $row = mysqli_fetch_assoc($query);
    $_SESSION['userName'] = $row['userName'];
    if(!empty($_POST["RememberMe"])) {
      setcookie ("userName",$_POST["userName"],time()+ 3600);
      setcookie ("userpassword",$_POST["userpassword"],time()+ 3600);
      echo "Cookies Set Successfuly";
    } else {
      setcookie("userName","");
      setcookie("userpassword","");
      echo "Cookies Not Set";
    }
    echo"<script>alert('You Have Successfully Login!')</script>";
    echo "<script>window.location.href='tms.php';</script>";
  }else{
    echo"<script>alert('Login Failed Please Try Again..!')</script>";
    echo "<script>window.location.href='index.php';</script>";
  }
}



?>
<!Doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./form.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script type="application/x-javascript">
    addEventListener("load", function() {
      setTimeout(hideURLbar, 0);
    }, false);

    function hideURLbar() {
      window.scrollTo(0, 1);
    }
  </script>
  <!-- Custom Theme files -->
  <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
  <!-- //Custom Theme files -->
  <!-- web font -->
  <link href="//fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,700,700i" rel="stylesheet">
  <!-- //web font -->
 </head>

 <body>
  <!-- main -->
  <div class="main-w3layouts wrapper">
    
    <div class="main-agileinfo">
      <div class="agileits-top">
      <h1>Sign In Form</h1>
        <form action="index.php" method="post">
          <input class="text email" type="text" name="userName" placeholder="User Name" required="" 
          value="<?php if(isset($_COOKIE["userName"])) { echo $_COOKIE["userName"]; } ?>" >
          <input class="text" type="password" name="userpassword" placeholder="Password" required="" 
          value="<?php if(isset($_COOKIE["userpassword"])) { echo $_COOKIE["userpassword"]; } ?>">
          <div class="wthree-text"><br>
            <label class="anim">
              <input type="checkbox" name="RememberMe" class="checkbox" required="">
              <span>Remember Me</span>
            </label>
            <div class="clear"> </div>
          </div>
          <input type="submit" name="login" value="Sign In">
        </form>
        <!-- <p>Don't have an Account? <a href="SignUp.php"> Sigup Now!</a></p> -->
      </div>
    </div>
    <ul class="colorlib-bubbles">
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
    </ul>
  </div>
  <!-- //main -->


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </body>
</html>