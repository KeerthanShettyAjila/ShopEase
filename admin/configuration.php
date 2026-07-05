<?php 
include '../config.php';
$admin = new Admin(); 

if(!$_SESSION['a_id'])
{
    echo "<script>
    window.location.href='login.html';
    </script>";
}

$v_id=$_SESSION['a_id'];