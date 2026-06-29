<?php 
include 'config.php';
$admin = new Admin();

if(!$_SESSION['u_id'])
{
    echo "<script>
    window.location.href='login.html';
    </script>";
}

$u_id=$_SESSION['u_id'];
$user_table = $admin->ret("SELECT * FROM `user` WHERE `u_id`='$u_id'");
$user_row = $user_table->fetch(PDO::FETCH_ASSOC);
$user_name = $user_row['u_name'];

