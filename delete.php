<?php
include('databse.php');
if(isset($_SESSION['id'])){
  $id_new=$_SESSION['id'];
$sql="DELETE FROM `book now` WHERE id='$id_new'";
$result=mysqli_query($conn,$sql);

if($result){
  $delnum=$delnum = mysqli_affected_rows($conn);
  $_SESSION['deleted']+=$delnum;
    header('location:request.php');
  }
}
?>