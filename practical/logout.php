<?php

session_start();

if(isset($_POST['logout'])){

session_unset();
session_destroy();
echo "<script>alert('logout successfully')</script>";

echo "<script>window.location.href = 'index.php';</script>"; 



}


?>