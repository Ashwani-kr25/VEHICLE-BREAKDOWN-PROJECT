<?php
include('databse.php');
if(isset($_SESSION['did'])){
  $did_new=$_SESSION['did'];
$sql1="DELETE FROM `driver` WHERE driverid='$did_new'";
$result1=mysqli_query($conn,$sql1);

if($result1){
    header('location:mngdriver.php');
  
}
}
?>