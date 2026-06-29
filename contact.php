<?php 
include 'configuration.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <?php
   include 'head.php'
   ?>
   <style>
       /* Custom Styles */
       body {
           font-family: 'Poppins', sans-serif;
           background: linear-gradient(to right, #f8f9fa, #e9ecef);
       }

       .contact-form {
           background: #ffffff;
           border-radius: 10px;
           box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
           padding: 30px;
       }

       .contact-form input, .contact-form textarea {
           border-radius: 5px;
           border: 1px solid #ddd;
           padding: 10px;
           margin-bottom: 15px;
           transition: all 0.3s ease;
       }

       .contact-form input:focus, .contact-form textarea:focus {
           border-color: #007bff;
           box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
       }

       .contact-form button {
           background: #D19C97;
           color: #fff;
           border: none;
           border-radius: 5px;
           padding: 10px 20px;
           transition: all 0.3s ease;
       }

       .contact-form button:hover {
           background: #0056b3;
           box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
       }

       .get-in-touch {
           background: #f8f9fa;
           border-radius: 10px;
           padding: 30px;
           box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
       }

       .get-in-touch h5 {
           color: #D19C97;
       }

       .get-in-touch p {
           line-height: 1.8;
       }

       .get-in-touch i {
           color: #D19C97;
       }

       .section-title {
           font-size: 2rem;
           font-weight: bold;
           color: #D19C97;
           text-transform: uppercase;
           margin-bottom: 20px;
       }

       @media (max-width: 768px) {
           .contact-form, .get-in-touch {
               margin-bottom: 20px;
           }
       }
   </style>
</head>

<body>
    
    <!-- Navbar Start -->
    <?php
    include 'navbar.php'
    ?>
    <!-- Navbar End -->


    <!-- Contact Start -->
    <div class="container-fluid pt-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">Contact For Any Queries</span></h2>
        </div>
        <div class="row px-xl-5">
            <div class="col-lg-7 mb-5">
                <div class="contact-form">
                    <div id="success"></div>
                    <form method="POST" action="controller/add.php">
                        <div class="control-group">
                            <input type="text" class="form-control" name="name" placeholder="Your Name"
                                required="required" />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <input type="email" class="form-control" name="email" placeholder="Your Email"
                                required="required" />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <input type="text" class="form-control" name="subject" placeholder="Subject"
                                required="required" />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <textarea class="form-control" rows="6" name="message" placeholder="Message"
                                required="required"></textarea>
                            <p class="help-block text-danger"></p>
                        </div>
                        <div>
                            <button class="btn btn-primary py-2 px-4" type="submit" name="contact">Send
                                Message</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-5 mb-5">
                <div class="get-in-touch">
                    <h5 class="font-weight-semi-bold mb-3">Get In Touch</h5>
                    <p>"Have questions, feedback, or need assistance? We're here to help! Reach out to us anytime, and our friendly support team will get back to you as soon as possible. Whether it's about your order, product inquiries, or anything else, we're just a message away. Contact us now and let's make your shopping experience even better!"</p>
                    <div class="d-flex flex-column mb-3">
                        <h5 class="font-weight-semi-bold mb-3">Store</h5>
                        <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i>Talapady, Mangalore, Karnataka, India</p>
                        <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i>shopease07@gmail.com</p>
                        <p class="mb-2"><i class="fa fa-phone-alt text-primary mr-3"></i>6282422584</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->


    <!-- Footer Start -->
    <?php
    include 'footer.php'
    ?>
    <!-- Footer End -->


    <!-- Back to Top -->
    <?php
    include 'script.php'
    ?>
</body>

</html>