

<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="style.css?v=<? time(); ?>">
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
        <p>Login to your account</p>
        <input type="text" name="username" id="" placeholder="Enter username" required>
        <input type="password" name="password" id="" placeholder="Enter password" required>
      <div class="checkbox"> <input type="checkbox" name="checkbox" id="">Remember me</div>
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
  $username=$_POST['username'];
 $pass=$_POST['password'];
    $sql="SELECT * FROM `admin login info` WHERE username='$username' ";
    $result=mysqli_query($conn,$sql);
    $num = mysqli_num_rows($result);
    if($num==1){
        while(  $data=mysqli_fetch_assoc($result)){
 
   if($data['username']==$username && $data['passwordd']==$pass){
    $_SESSION['user']=$username;
    header('Location: admin.php');
    }
   else{
    ?>
    <script>
    swal({
      title: "LOGIN FAILED",
      text: "ENTER CORRECT USERNAME AND PASSWORD!",
      icon: "error",
    });
    </script>
    <?php
  }
    }
       
   }   else{
    ?>
    <script>
    swal({
      title: "FAILED",
      text: "ENTER CORRECT USERNAME AND PASSWORD!",
      icon: "error",
    });
    </script>
    <?php
  }
 
}
?>
