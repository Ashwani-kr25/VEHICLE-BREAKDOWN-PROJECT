<?php
include('databse.php');
if(isset($_SESSION['email'])&&isset($_SESSION['mobile'])){
    $email=$_SESSION['email'];
    $mobile=$_SESSION['mobile'];
 $sql = "SELECT 
                `book now`.*, 
                driver.mobile AS driver_mobile
            FROM `book now`
            LEFT JOIN driver ON `book now`.assigneddriver = driver.driverid
            WHERE `book now`.EMAIL = '$email' AND `book now`.mobile = '$mobile'";
$result=mysqli_query($conn,$sql);

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>STATUS</title>
    <link rel="stylesheet" href="style.css">
    <style>

        .dashcontainer .dbox{
            margin-right:300px;
            margin-left:0px;
        height:auto;
        width: 100px;
        background:linear-gradient(rgba(220, 111, 47, 0.8), rgba(255, 255, 255, 0.8));

        }
        .dashcontainer .dbox li{
            list-style: none;
            font-size:23px;
            margin:15px;
            text-align:left;

        }
        
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
<div class="infodash">
  <div class="dashbox1">
       <h3><?php echo "Welcome to User Dashboard  "  . $_SESSION['email']; ?></h3>
    </div>
    <div class="dashcontainer">
        <div class="dbox">
        
        <?php
 while($data=mysqli_fetch_assoc($result)){
 ?>

       
       <li>NAME--<?php echo $data['NAME'];?></li>
          <li>EMAIL--<?php echo $data['EMAIL'];?></li>
     <li>MOBILE-- <?php echo $data['mobile'];?></li>
          <li> STATUS--<?php
            if (is_null($data['response'])) {
                echo "NOT RESPONDED YET!";
            }
            else
          echo $data['response'];?></li> 


  <li>TECHNICIAN CONTACT NUMBER-- <?php echo $data['mobile'];?></li>

          
          <li>ASSIGNED TECHNICIAN--<?php
              if (is_null($data['assigneddriver'])) {
                echo "NOT ASSIGNED YET!";
            }
            else
             echo $data['assigneddriver'];?></li>
    <?php
 }
 ?>
     <button type="submit" style="background-color:rgba(31, 132, 204, 0.82);;"><a href="status.php" style="text-decoration:none;color:red;">LOGOUT</a></button>
          </div>
        </div>
       



</body>
</html>