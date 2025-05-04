<?php
include('databse.php');
include('leftdash.php');
?>

    <style>
    .logbox input{
           margin-bottom:5px;
        }
    
    

        </style>
          <title>TECHNICIAN</title>
          <div class="infodash">
          <div class="dashbox1">
       <h3><?php echo "ADD TECHNICIAN"?></h3>
    </div></div>
<form action ="tech.php" method="POST" >
    <div class="logincontainer1">

        <div class="logbox">
        <p>ADD TECHNICIAN</p>
        <input type="text" name="id" id="" value=""  placeholder="Enter Technician Id" >
       <input type="text" name="name" id="" value=""  placeholder=" Enter Technician Name">
        <input type="number" name="mobile" id=""value="" placeholder="Enter Mobile number">
        <input type="email" name="email" id="" value="" placeholder=" Enter Email">
       
        <input type="text" name="address" id="" value="" placeholder="Enter Address">
        <input type="password" name="password" id="" value="" placeholder="Enter Password">
        <div class="login">
        <input type="submit" value="ADD TECHNICIAN" name="add"> </div>
        </div>
    </div>
</form>   

<?php



if($_SERVER["REQUEST_METHOD"]=="POST"&&isset($_POST["add"])){
    $id=$_POST['id'];
    $name=$_POST['name'];
    $email=$_POST['email'];
    $mobile=$_POST['mobile'];
    $address=$_POST['address'];
    $password = $_POST['password'];
    $sql="INSERT INTO `driver` (`driverid`, `name`, `mobile`, `email`, `address`, `password`) VALUES ('$id','$name','$mobile', '$email', '$address', '$password');";
 $result=mysqli_query($conn,$sql);
if($result){
  ?>
  <script>
  swal({
    title: "success",
    text: "DRIVER ADDED SUCCESSFULLY",
    icon: "success",
  });
  </script>
  <?php
}
else{
  ?>
  <script>
  swal({
    title: "failed",
    text: "DRIVER ADDING FAILED",
    icon: "error",
  });
  </script>
  <?php
} 
}

?>
