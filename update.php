
<?php
include"databse.php";
?>
<?php
if(isset($_SESSION['id'])){
    $id_new=$_SESSION['id'];

$sql="SELECT * FROM `book now` where id='$id_new' ";
$result=mysqli_query($conn,$sql);
$num = mysqli_num_rows($result);
$data=mysqli_fetch_assoc($result);}
?>
<?php

if($_SERVER["REQUEST_METHOD"]=="POST"&&isset($_POST["update"])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $mobile=$_POST['mobile'];
    $location=$_POST['location'];
    $type=$_POST['type'];
    $date=$_POST['date'];
    $sql=" UPDATE `book now` SET `NAME`='$name',`EMAIL`='$email',`mobile`='$mobile',`LOCATION`='$location',`VEHICLE TYPE`='$type',`date`='$date' WHERE  id='$id_new'";

$result=mysqli_query($conn,$sql);

    if($result){
        header('location:request.php');
        }
else{
    ?>
    <script>
    swal({
      title: "failed",
      text: "BOOKING FAILED",
      icon: "error",
    });
    </script>
    <?php
  
}

}
?> 

<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update</title>
    <link rel="stylesheet" href="styles.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <style>
        .logbox input{
           margin-bottom:5px;
        }

    </style>
</head>
<body>
    <form action ="update.php" method="POST" >
    <div class="logincontainer1">
        <h3>EDIT THE REQUEST</h3>
        <div class="logbox">
        <input type="text" name="name" id="" value="<?php echo $data['NAME']?>" >
        <input type="email" name="email" id="" value="<?php echo $data['EMAIL']?>">
        <input type="number" name="mobile" id=""value="<?php echo $data['mobile']?>">
        <input type="text" name="location" id="" value="<?php echo $data['LOCATION']?>">
        <input type="text" name="type" id="" value="<?php echo $data['VEHICLE TYPE']?>">
        <input type="date" name="date" id=""value="<?php echo $data['date']?>">
        <div class="login">
        <input type="submit" value="update" name="update"> </div>
         <div class="backhome"> <a href="request.php">GO BACK?</a>
        </div>
    </div>
        </div>
    </div></form>
</body>
</html>

