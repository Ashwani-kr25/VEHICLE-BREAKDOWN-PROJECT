<?php
include('databse.php');
 include('techleftdash.php');
 if(isset($_SESSION['user'])){
 $driver=$_SESSION['user'];
$sql="SELECT * FROM `book now`WHERE assigneddriver='$driver'";
$result=mysqli_query($conn,$sql);
$num = mysqli_num_rows($result);
 }
?>
          <title> TECH'S DASHBOARD</title>
<div class="infodash">
  <div class="dashbox1">
       <h3><?php echo "Welcome to Technician Dashboard " . $_SESSION['user']; ?></h3>
    </div>
    <div class="dashcontainer">
        <div class="dbox">TOTAL REQUESTS 
         
         <div class="php1"> <?php echo" $num"?></div>  
        </div>
       

        <div class="dbox">COMPLETED REQUESTS
        <div class="php1">
        <?php
          $sql3="SELECT * FROM `book now` WHERE assigneddriver='$driver' AND response='COMPLETED'";
          $result3=mysqli_query($conn,$sql3);
       $completed=mysqli_num_rows($result3);
          echo $completed;      
       
          ?>
          </div>
        </div>
        <div class="dbox">INPROGRESS REQUESTS
        <div class="php1">
          <?php
          $sql2="SELECT * FROM `book now` WHERE assigneddriver='$driver' AND response='ON THE WAY'";
          $result2=mysqli_query($conn,$sql2);
            $inprogress=mysqli_num_rows($result2);
          echo $inprogress;        
          ?>
      
          
          </div>
        </div>
       
    </div>
 
</div>
