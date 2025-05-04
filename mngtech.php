<?php

include('databse.php');
include('leftdash.php');

$sql="SELECT * FROM `driver`";
$result=mysqli_query($conn,$sql);
$num = mysqli_num_rows($result);
?>

          <title>MANAGE TECH</title>
<div class="infodash">
    <div class="dashbox1">
       <h3>MANAGE TECHNICIAN</h3></div>
       <table  style="border-collapse: collapse;">
        <tr>
            <th>TECHNICIAN ID</th>
            <th>NAME</th>
            <th>EMAIL</th>
            <th>MOBILE</th>
            <th>ADDRESS</th>
            <th>PASSWORD</th>
            <th>DELETE</th>
           
            
        </tr>
        <?php
        while($data=mysqli_fetch_assoc($result)){
 ?>

       <tr>
       <td><?php echo $data['driverid'];?></td>
          <td><?php echo $data['name'];?></td> 
     
          <?php
         $_SESSION['did']=$data['driverid']; 
         ?>
          <td><?php echo $data['email'];?></td> 
          <td><?php echo $data['mobile'];?></td> 
          <td><?php echo $data['address'];?></td>
          <td><?php echo $data['password'];?></td>
       
          <td><a href="techdelete.php" class="deletebtn">DELETE</a>

        </td>
        </tr>
            <?php    
        }
        ?>
       
    </table>
 
 
</div>

