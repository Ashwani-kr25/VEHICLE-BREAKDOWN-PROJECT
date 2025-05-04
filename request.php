<?php

include('databse.php');
include('leftdash.php');

$sql="SELECT * FROM `book now`";
$result=mysqli_query($conn,$sql);
$num = mysqli_num_rows($result);
?>

    <style>
      
        .infodash table th{
            padding:3px;}
            .infodash table td{
                padding:7px;}
        </style>
          <title>REQUEST</title>
<div class="infodash">
    <div class="dashbox1">
       <h3>REQUESTS</h3></div>
       <table  style="border-collapse: collapse;">
        <tr>
            <th>ID</th>
            <th>NAME</th>
            <th>EMAIL</th>
            <th>MOBILE</th>
            <th>LOCATION</th>
            <th>VEHICLE TYPE</th>
            <th>DATE</th>
            <th>EDIT</th>
            <th>DELETE</th>
            <th>ASSIGNED TO</th>
            <th>STATUS</th>
            
        </tr>
        <?php
        while($data=mysqli_fetch_assoc($result)){
 ?>

       <tr>
       <td><?php echo $data['id'];?></td>
          <td><?php echo $data['NAME'];?></td> 
     
        
          <td><?php echo $data['EMAIL'];?></td> 
          <td><?php echo $data['mobile'];?></td> 
          <td><?php echo $data['LOCATION'];?></td> 
          <td><?php echo $data['VEHICLE TYPE'];?></td> 
          <td><?php echo $data['date'];?></td> 
          <?php
          $_SESSION['id']=$data['id'];
          ?>
        <td><a href="update.php" class="editbtn">EDIT</a></td>
          <td><a href="delete.php" class="deletebtn">DELETE</a></td>
          <?php

     if (is_null($data['assigneddriver'])) {
         echo "<td>NOT ASSIGNED YET!</td>";
     } else {
         echo "<td>" . $data['assigneddriver'] . "</td>";
     }
     ?>
         <?php

if (is_null($data['response'])) {
    echo "<td>NOT RESPONSED YET!</td>";
} else {
    echo "<td>" . $data['response'] . "</td>";
}
?>
        </tr>
            <?php    
        }
        ?>
       
    </table>
 
 
</div>

