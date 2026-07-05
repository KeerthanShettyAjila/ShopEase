<?php
include '../config.php';
$admin = new Admin();

$u_id = $_SESSION['u_id'];

if (isset($_GET['p_id'])) {
    $p_id = $_GET['p_id'];
    $cart_table = $admin->ret("SELECT * FROM `cart` WHERE `p_id`='$p_id' AND `u_id`='$u_id'");
    $cart_product_count = $cart_table->rowCount();
    if ($cart_product_count < 1) {
        $admin->cud("INSERT INTO `cart`(`p_id`,`u_id`) VALUES ('$p_id','$u_id')", "Added to Cart");
        echo "<script>
        window.location.href='../cart.php';
        </script>";
    } else {
        echo "<script>
        window.location.href='../cart.php';
        </script>";
    }
}



if (isset($_POST['add_checkout'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $number = $_POST['mnum'];
    $add1 = $_POST['add1'];
    $add2 = $_POST['add2'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $zip = $_POST['zip'];
    $transaction= $_POST['transaction'];
    $payment =$_POST['payment'];

if($payment =='Online'){
    $cart_table = $admin->ret("SELECT * FROM `cart` WHERE `u_id` = '$u_id'");
    while ($cart_row = $cart_table->fetch(PDO::FETCH_ASSOC)) {
        $p_id = $cart_row['p_id'];
        $p_quantity = $cart_row['ca_quantity'];
        $admin->cud("INSERT INTO `ordered_products`(`p_id`,`p_quantity`,`f_name`,`l_name`,`email`,`num`,`add1`,`add2`,`city`,`state`,`zip`,`transaction`,`payment`,`u_id`) VALUES ('$p_id','$p_quantity','$fname','$lname','$email','$number','$add1','$add2','$city','$state','$zip','$transaction','$payment','$u_id')", "Ordered Products");
    }
    $admin->cud("DELETE FROM `cart` WHERE `u_id`='$u_id'", "cart deleted");
    echo "<script>
    window.location.href='../orders.php';
    </script>";
} else if($payment =='COD'){
    $cart_table = $admin->ret("SELECT * FROM `cart` WHERE `u_id` = '$u_id'");
    while ($cart_row = $cart_table->fetch(PDO::FETCH_ASSOC)) {
        $p_id = $cart_row['p_id'];
        $p_quantity = $cart_row['ca_quantity'];
        $admin->cud("INSERT INTO `ordered_products`(`p_id`,`p_quantity`,`f_name`,`l_name`,`email`,`num`,`add1`,`add2`,`city`,`state`,`zip`,`payment`,`u_id`) VALUES ('$p_id','$p_quantity','$fname','$lname','$email','$number','$add1','$add2','$city','$state','$zip','$payment','$u_id')", "Ordered Products");
    }
    $admin->cud("DELETE FROM `cart` WHERE `u_id`='$u_id'", "cart deleted");
    echo "<script>
    window.location.href='../orders.php';
    </script>";

}
}





if (isset($_POST['feedback'])) {
    $feedback = $_POST['feedback_text'];
    $rating = $_POST['rating'];
    $o_id = $_POST['o_id'];
    $p_id = $_POST['p_id'];
    $admin->cud("INSERT INTO `feedback`(`f_feedback`,`rating`,`u_id`,`op_id`,`p_id`) VALUES ('$feedback','$rating','$u_id','$o_id','$p_id')", "Feedback added");

    echo "<script>
    window.location.href='../feedback.php';
    </script>";
}

if (isset($_POST['contact'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    $admin->cud("INSERT INTO `contact`(`co_name`, `co_email`, `co_subject`, `co_message`) VALUES ('$name','$email','$subject','$message')", "Message sent successfully");
    echo "<script>
    window.location.href='../contact.php';
    </script>";
}

if (isset($_POST['newsletter'])) {
    $n_name = $_POST['n_name'];
    $n_email = $_POST['n_email'];
    $admin->cud("INSERT INTO `newsletter`(`n_name`, `n_email`) VALUES ('$n_name','$n_email')", "Newsletter subscribed");
    echo "<script>
    window.location.href='../index.php';
    </script>";
}