<?php 
include '../../config.php';
$admin = new Admin();

if(isset($_GET['c_id']))
{
    $c_id=$_GET['c_id'];
    $admin->cud("DELETE FROM `category` WHERE `c_id`='$c_id'","deleted");
    echo "<script>
    window.location.href='../category.php';
    </script>";
    
}