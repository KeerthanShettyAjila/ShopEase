<?php 
include '../../config.php';
$admin = new Admin();

if(isset($_GET['p_id']))
{
    $p_id=$_GET['p_id'];
    $admin->cud("DELETE FROM `product` WHERE `p_id`='$p_id'","deleted");
    echo "<script>
    window.location.href='../product.php';
    </script>";
    
}