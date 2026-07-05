<?php 
include '../../config.php';
$admin = new Admin();

if(isset($_POST['reg'])){
$name=$_POST['name'];
$email=$_POST['email'];
$password=md5($_POST['pass']);
$address=$_POST['add'];
$number=$_POST['num'];

$qr = "upload/" . basename($_FILES['qr']['name']);
move_uploaded_file($_FILES['qr']['tmp_name'],$qr);

$admin_table = $admin->ret("SELECT * FROM `admin` WHERE `a_email`='$email'");
    $admin_count = $admin_table->rowCount();

    $vendor_table = $admin->ret("SELECT * FROM `vendor` WHERE `v_email`='$email'");
    $vendor_count = $vendor_table->rowCount();
    
    $user_table = $admin->ret("SELECT * FROM `user` WHERE `u_email`='$email'");
    $user_count = $user_table->rowCount();
    
    if($admin_count>0 || $vendor_count>0 ||$user_count>0){
        echo "<script>
        alert('Email already exist. Try again with new email...');
        window.location.href='../vendor/login.html';
        </script>";
    } else {
        $admin->cud("INSERT INTO `vendor`(`v_name`,`v_email`,`v_password`,`v_number`,`v_address`,`v_photo`) VALUES ('$name','$email','$password','$number','$address','$qr')","added admin");
        echo "<script>
        alert('successfully signed up...');
        window.location.href='../../login.html';
        </script>";
}

}

if(isset($_POST['login'])){

    $email=$_POST['email'];
    $password=md5($_POST['pass']);


$vendor_table = $admin->ret("SELECT * FROM `vendor` WHERE `v_email`='$email' AND `v_password`='$password'");
$vendor_count = $vendor_table->rowCount();
$vendor_row=$vendor_table->fetch(PDO::FETCH_ASSOC);
if($vendor_row['v_status']=='new'){
    echo "<script>
    alert('Admin approval is pending. try again later');
    window.location.href='../../login.html';
    </script>";
} else if ($vendor_row['v_status']=='rejected'){
    echo "<script>
    alert('Admin hav rejected your profile');
    window.location.href='../../login.html';
    </script>";
}else if($vendor_count>0){
    $_SESSION['v_id']=$vendor_row['v_id'];
    echo "<script>
    window.location.href='../index.php';
    </script>";
} else {
    echo "<script>
    alert('Invalid email and password');
    window.location.href='../../login.html';
    </script>";
}
   
  
 }

if(isset($_GET['logout']))
{
    unset($_SESSION['v_id']);
    echo "<script>
    window.location.href='../../index.php';
    </script>";
}

