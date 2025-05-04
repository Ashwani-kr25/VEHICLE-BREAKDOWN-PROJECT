<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css?v=<? time();?>">
   <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
<script>
// Disable back button navigation after logout
window.history.forward();
function noBack() {
    window.history.forward();
}
</script>
<body onload="noBack();" onpageshow="if (event.persisted) noBack();">

 <div class="dashbord">

<div class="leftdash">
    <img src="menpic.jpeg" alt="">
    <div class="user">
    <li>Username : <?php  echo $_SESSION['user'];?></li></div>
    <li><i class="fa-solid fa-house"></i><a href="admin.php">DASHBOARD</a></li>
    <li><i class="fa-solid fa-paper-plane"></i><a href="request.php">REQUESTS</a></li>
    <li><i class="fa-solid fa-book"></i><a href="assign.php">ASSIGN REQUEST</a></li>
    <li><i class="fa-solid fa-user"></i><a href="tech.php">ADD TECHNICIAN</a></li>
    <li><i class="fa-solid fa-lock"></i><a href="mngtech.php">MANAGE TECHNICIAN</a></li>
      <li><i class="fa-solid fa-house"></i><a href="logout.php">LOGOUT</a></li>

</div>
</body>
</html>