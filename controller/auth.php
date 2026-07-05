<?php 
include '../config.php';
$admin = new Admin();

if(isset($_POST['reg'])){
$name=$_POST['name'];
$email=$_POST['email'];
$password=md5($_POST['pass']);
$address=$_POST['add'];
$number=$_POST['num'];

    $admin_table = $admin->ret("SELECT * FROM `admin` WHERE `a_email`='$email'");
    $admin_count = $admin_table->rowCount();

    $vendor_table = $admin->ret("SELECT * FROM `vendor` WHERE `v_email`='$email'");
    $vendor_count = $vendor_table->rowCount();
    
    $user_table = $admin->ret("SELECT * FROM `user` WHERE `u_email`='$email'");
    $user_count = $user_table->rowCount();
    
    if($admin_count>0 || $vendor_count>0 ||$user_count>0){
        echo "<script>
        alert('Email already exist. Try again with new email...');
        window.location.href='../login.html';
        </script>";
    } else {
        $admin->cud("INSERT INTO `vendor`(`u_name`,`u_email`,`u_password`) VALUES ('$name','$email','$password')","added admin");
        echo "<script>
        alert('successfully signed up...');
        window.location.href='../login.html';
        </script>";
}

}

if(isset($_POST['login'])){

    $email=$_POST['email'];
    $password=md5($_POST['pass']);


$user_table = $admin->ret("SELECT * FROM `user` WHERE `u_email`='$email' AND `u_password`='$password'");
$user_count = $user_table->rowCount();

$vendor_table = $admin->ret("SELECT * FROM `vendor` WHERE `v_email`='$email' AND `v_password`='$password'");
$vendor_count = $vendor_table->rowCount();

$admin_table = $admin->ret("SELECT * FROM `admin` WHERE `a_email`='$email' AND `a_password`='$password'");
$admin_count = $admin_table->rowCount();



if($user_count>0){
    $user_row=$user_table->fetch(PDO::FETCH_ASSOC);
    $_SESSION['u_id']=$user_row['u_id'];
    echo "<script>
    window.location.href='../index.php';
    </script>";
} 


else if($admin_count>0){
    $admin_row=$admin_table->fetch(PDO::FETCH_ASSOC);
    $_SESSION['a_id']=$admin_row['a_id'];
    echo "<script>
    window.location.href='../admin/index.php';
    </script>";
} 

else if($vendor_count>0){
    $vendor_row=$vendor_table->fetch(PDO::FETCH_ASSOC);
    $_SESSION['v_id']=$vendor_row['v_id'];
    echo "<script>
    window.location.href='../vendor/index.php';
    </script>";
}
else {
    echo "<script>
    alert('Invalid email and password');
    window.location.href='../login.html';
    </script>";
}
   
  
 }

if(isset($_GET['logout']))
{
    unset($_SESSION['u_id']);
    echo "<script>
    window.location.href='../index.php';
    </script>";
}

