<?php
session_destroy();
session_reset();
header('location:login.php');
?>