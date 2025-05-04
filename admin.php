<?php
include('databse.php');
 include('leftdash.php');
$sql="SELECT * FROM `book now`";
$result=mysqli_query($conn,$sql);
$num = mysqli_num_rows($result);

$sql2="SELECT * FROM `driver` ";
$result2=mysqli_query($conn,$sql2);
$drivernum=mysqli_num_rows($result2);
?>
          <title>DASHBOARD</title>
<div class="infodash">
  <div class="dashbox1">
       <h3><?php echo "Welcome to Dashboard  " . $_SESSION['user']; ?></h3>
    </div>
    <div class="dashcontainer">
        <div class="dbox">NEW REQUESTS 
         
         <div class="php1"> <?php echo" $num"?></div>  
        </div>
        <div class="dbox">REJECTED REQUESTS
        <div class="php1">

        <?php
        if(isset($_SESSION['deleted'])){
         echo $_SESSION['deleted'];
        //  unset($_SESSION['deleted']);
        }
         ?>
          </div>
        </div>
        <div class="dbox">TECHNICIAN ON THE WAY
        <div class="php1">
          <?php
         $sql2="SELECT * FROM `book now` WHERE response='ON THE WAY'";
         $result2=mysqli_query($conn,$sql2);
           $inprogress=mysqli_num_rows($result2);
         echo $inprogress;    
          ?>
          </div>
        </div>
        <div class="dbox">COMPLETED REQUESTS
        <div class="php1">
          <?php
          $sql3="SELECT * FROM `book now` WHERE  response='COMPLETED'";
          $result3=mysqli_query($conn,$sql3);
       $completed=mysqli_num_rows($result3);
          echo $completed;      
       
          ?>
          </div>
        </div>
        <div class="dbox">TOTAL TECHNICIAN
        <div class="php1">

<?php

 echo $drivernum;

 ?>
  </div>
          </div>
      
       
    </div>
 
</div>
