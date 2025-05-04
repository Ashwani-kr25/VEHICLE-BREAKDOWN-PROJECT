
<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REQUEST STATUS</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <style>
      body{
   background-image: linear-gradient(rgba(0, 0, 0, 0.538), rgba(0, 0, 0, 0.496)
   ),url("back.jpg");
    background-repeat:no-repeat; 
   background-size:cover;
   height: 100vh;
     }
    </style>
</head>
<body>
    <form  method="POST">
    <div class="logincontainer1">
        <h3>Vehicle Breakdown Assistant System</h3>
        <div class="logbox">
        <p>Enter Credentials to Check  Request Status </p>
        <input type="email" name="email" id="" placeholder="Enter your email adress" required>
        <input type="tel" name="mobile" id="" placeholder="Enter your mobile number" required>
       <div class="login">
       <input type="submit" value="LOGIN" name="submit"> </div>
      <div class="backhome"> <a href="home.php">back to home?</a></div>
        </div>
    </div></form>
</body>
</html>
<?php
include"databse.php";

if($_SERVER["REQUEST_METHOD"]=="POST"&&isset($_POST["submit"]))
{
  $email=$_POST['email'];
 $mobile=$_POST['mobile'];
    $sql="SELECT * FROM `book now` WHERE EMAIL='$email' and mobile='$mobile' ";
    $result=mysqli_query($conn,$sql);
    $num = mysqli_num_rows($result);
    if($num==1){
    $_SESSION['email']=$email;
    $_SESSION['mobile']=$mobile;
    header('Location: statusdash.php');
    }
   else{
    ?>
    <script>
    swal({
      title: "LOGIN FAILED",
      text: "ENTER CORRECT EMAIL AND MOBILE NUMBER!",
      icon: "error",
    });
    </script>
    <?php
  }
    }

?>
