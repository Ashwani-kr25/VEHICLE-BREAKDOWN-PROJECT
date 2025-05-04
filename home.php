
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home</title>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>
        <header>
      <div class="container1">
      <div class="box1"> <h2>VAAHAN SAHAYAK</h2></div>
      <div class="car"><i class="fa-solid fa-truck"></i></div>
       <h4> <i class="fa-solid fa-circle-info"></i>OPEN- TIME: <p>MON-SUN:24hrs</p></h4>
       <h4> <i class="fa-solid fa-phone"></i>EMERGENCY CALL:     <P>011-229339</P></h4>
        <div class="map"><a href="https://maps.app.goo.gl/2svDsD3BxwPPXbfv5"> <i class="fa-solid fa-location-dot"></i>123 Street Patna</a></div>
      
        <div class="social">
        <i class="fa-brands fa-facebook-f"></i>
        <i class="fa-brands fa-twitter"></i>
        <i class="fa-brands fa-linkedin-in"></i>
        <i class="fa-brands fa-instagram"></i>


        </div>

        </div>
</header>
  <?php
  include("navbar.php");
  ?>
    <div class="img"> 
      <h2>VEHICLE ROADSIDE ASSISTANCE</h2>
    </div></div>
</navbar> 
<main>
  
<div class="container3">
         
        <p>BOOk For A Breakdown Assistance</p>
       <form method="POST">
       <input type="text" name="name" placeholder="Enter your name" required>
       <input type="email" name="email" placeholder="Enter your Email" required><br>
      <input type="number" name="mobile" id=""placeholder="Enter your Mobile Number"  required>
       <input type="text" name="location" placeholder="Enter location" required><br>
       <input type="text" name="type" placeholder="Enter vehicle type" required>
  <input type="date" name="date" id="" placeholder="Pickup Date" required>
       <button type="submit" name="book" >Book Now</button>
    
       </form>
</div>
</main>
<footer>
   <p>ONROAD VEHICLE BREAKDOWN HELP ASSISTANT</p>
</footer>

</body>
</html>

<?php
include"databse.php";
if($_SERVER["REQUEST_METHOD"]=="POST"&&isset($_POST["book"])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $mobile=$_POST['mobile'];
    $location=$_POST['location'];
    $type=$_POST['type'];
    $date=$_POST['date'];
    $sql="INSERT INTO `book now` (`NAME`, `EMAIL`, `mobile`, `LOCATION`, `VEHICLE TYPE`, `date`) VALUES ('$name', '$email', '$mobile', '$location', '$type', '
    $date')";

$result=mysqli_query($conn,$sql);
if($result){
  ?>
  <script>
  swal({
    title: "success",
    text: "THANKS FOR YOUR BOOKING",
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
    text: "BOOKING FAILED",
    icon: "error",
  });
  </script>
  <?php
} 
}

?>
<script>
const reveals = document.querySelectorAll('.container3');

const observer = new IntersectionObserver((entries) => {
  entries.forEach(entry => {
    if (entry.intersectionRatio >= 0.6) {
      entry.target.classList.add('active');

    }
  });
}, {
  threshold: 0.6
});

reveals.forEach(container3 => {
  observer.observe(container3);
});


</script>