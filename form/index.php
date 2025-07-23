<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>

    <!-- Meta tags -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="description" content="">
    <meta name="author" content="">
    <title>โอ้โฮปริ้น ดีไซน์</title>

    <!-- Stylesheets -->
    <link type="text/css" rel="stylesheet" href="assets/css/plugins/bootstrap.min.css" />
    <link type="text/css" rel="stylesheet" href="assets/css/plugins/slick.css" />
    <link type="text/css" rel="stylesheet" href="assets/css/plugins/slick-theme.css" />
    <link type="text/css" rel="stylesheet" href="assets/css/plugins/aos.css" />
    <link type="text/css" rel="stylesheet" href="assets/css/plugins/bootstrap-datepicker.css" />
    <link type="text/css" rel="stylesheet" href="assets/css/plugins/bootstrap-datetimepicker.css" />
    <link type="text/css" rel="stylesheet" href="assets/css/plugins/touch-sideswipe.css" />
    <link type="text/css" rel="stylesheet" href="assets/css/plugins/jquery.fancybox.min.css" />
    <link type="text/css" rel="stylesheet" href="assets/css/style.css" />
    <link rel="stylesheet" href="css/style.css">

    <!-- Icon Fonts -->
    <link type="text/css" rel="stylesheet" href="assets/fonts/fontawesome/css/all.min.css">

    <!-- Favicon -->
    <!-- <link rel="apple-touch-icon" sizes="180x180" href="assets/img/favicon/apple-touch-icon.png" />
    <link rel="icon" type="image/png" sizes="256x256"  href="assets/img/favicon/android-chrome-256x256.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="assets/img/favicon/android-chrome-192x192.png">    
    <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicon/favicon-32x32.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicon/favicon-16x16.png" />
    <link rel="icon" type="image/png" href="assets/img/favicon/favicon.ico" />
    <link rel="manifest" href="assets/img/site.webmanifest" />
    <link rel="mask-icon" href="assets/img/favicon/safari-pinned-tab.svg" color="#5bbad5" />
    <meta name="msapplication-TileColor" content="#990100" />
    <meta name="theme-color" content="#ffffff" />     -->


</head>

<body data-spy="scroll" data-target=".navbar" data-offset="50">

<!-- Loading Overlay Start -->
<div class="loading-overlay">
    <div class="spinner">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
    </div>
</div>
<!-- Loading Overlay End -->



<!-- Header Start -->
<header id="header">
    <nav class="navbar affix-top">
        <div id="navbar_content">
            <div class="navbar-header">
                <a class="navbar-brand custom-primary" href="#"><img src="assets/img/logo.jpg" alt="logo" />OHO PRINT</a>
                <a href="#cd-nav" class="cd-nav-trigger burger-menu-icon">
                    <span><i class="fa fa-bars" aria-hidden="true"></i></span>
                </a>
            </div>
            <div class="collapse navbar-collapse" id="navbar">
                <div class="navbar-right">
                    <div class="call-delivery">
                        <img src="assets/img/iconcall.png" alt="" class="call-delivery-icon" />
                        <span class="call-delivery-number custom-primary">Call Now
                                <a href="" target="_blank">087-559-8282</a>
                            </span>
                    </div>
                    <ul class="nav navbar-nav">
                        <li><a href="../index.php">Home</a></li>
                        
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</header>
<!-- Header End -->


<!-- form start -->
<?php

    require('db.php');
    // if form submitted, insert values into the database'

    if(isset($_REQUEST['firstname'])) {
        //removes backslashes
        $firstname = stripslashes($_REQUEST['firstname']);
        //escape special character in a string
        $firstname = mysqli_real_escape_string($con, $firstname);
         //removes backslashesOHO PRINT php/form/index.phpC:/xampp/htdocs/OHO PRINT php/form/db.php
         $lastname = stripslashes($_REQUEST['lastname']);
         //escape special character in a string
         $lastname = mysqli_real_escape_string($con, $lastname);
        
        $email = stripslashes($_REQUEST['email']);
        $email = mysqli_real_escape_string($con, $email);
        $phonenumber = stripslashes($_REQUEST['phonenumber']);
        $phonenumber = mysqli_real_escape_string($con, $phonenumber);
        $other = stripslashes($_REQUEST['other']);
        $other = mysqli_real_escape_string($con, $other);
     
        
        
        $query = "INSERT INTO users (firstname, lastname, phonenumber, email, other)
                VALUES ('$firstname','$lastname','$phonenumber', '$email','$other')";
                $result = mysqli_query($con , $query);

                //KJoKyLa9YHoReZWxukRqYMTNcav2Cjt5Eg8BS2X6aJD 
$sToken = "BSG4tTIwrEMGtcMOn2UkGV0SxTgeFr3f4JdbNWuxa6F";
$sMessage = "แจ้งเตือนการกรอกแบบฟอร์ม!\r\n";
$sMessage .= $firstname . " " . $lastname . " ได้ทำการกรอกแบบฟอร์ม!\r\n";
$sMessage .= "ชื่อ-สกุล: " . $firstname . " " . $lastname . " \r\n";
$sMessage .= "อีเมล: " . $email . " \r\n";
$sMessage .= "เบอร์โทรศัพท์: " . $phonenumber . " \r\n";
$sMessage .= "รายละเอียด: " . $other . " \r\n";



$chOne = curl_init(); 
curl_setopt( $chOne, CURLOPT_URL, "https://notify-api.line.me/api/notify"); 
curl_setopt( $chOne, CURLOPT_SSL_VERIFYHOST, 0); 
curl_setopt( $chOne, CURLOPT_SSL_VERIFYPEER, 0); 
curl_setopt( $chOne, CURLOPT_POST, 1); 
curl_setopt( $chOne, CURLOPT_POSTFIELDS, "message=".$sMessage); 
$headers = array( 'Content-type: application/x-www-form-urlencoded', 'Authorization: Bearer '.$sToken.'', );
curl_setopt($chOne, CURLOPT_HTTPHEADER, $headers); 
curl_setopt( $chOne, CURLOPT_RETURNTRANSFER, 1); 
$result = curl_exec( $chOne ); 

//Result error 
if(curl_error($chOne)) 
{ 
    echo 'error:' . curl_error($chOne); 
} 
else { 
    $result_ = json_decode($result, true); 
    echo "status : ".$result_['status']; echo "message : ". $result_['message'];
} 
curl_close( $chOne );  
                if($result) {
                    echo "<br><br><br><br><br><div class='form'>
                    <h3>You are registered successfully</h3>
                    <br> Click Here to <a href='../index.php'>Home</a>
                    </div>";
                }

            } else{
    
?>
    <div class="form">
        <br><br><br><br><br><br><div class="white"><h1>แจ้งรายละเอียดเสื้อ</h1></div>
        <form name="registration" action="" method="POST" enctype="multipart/form-data">
            <input type="text" name="firstname" placeHolder="firstname" require>
            <input type="text" name="lastname" placeHolder="lastname" require>
            <input type="text" name="phonenumber" placeHolder="phonenumber" require>
            <input type="email" name="email" placeHolder="email" require>
            <div class="div1"><input type="text" name="other" placeHolder="other" require></div>            
            <input type="submit" name="submit" valuse="Register" >
</form>
<br><br>
</div>

 <?php } ?>
            





<!-- form end -->

<!-- Footer Start -->
<footer id="contact">
    <div class="footer-top">
        <div class="footer-logo">
            <img src="assets/img/logo.jpg" alt="" />
            <span>OHO PRINT</span>
        </div>
    </div>
    <div class="footer-middle">
        <p class="footer-desc"> ลูกค้าสามารถส่งแบบมาให้ทางร้านสกรีนหรือส่งข้อความที่ต้องการสกรีนมาให้ทางร้านออกแบบได้ฟรี หรือ สามารถดูตัวอย่างจากแบบและแก้ไขข้อความได้สามารถคลิ้กที่รูปภาพเพื่อดูแบบเพิ่มเติมได้ การันตีผลงานจากลูกค้ามากกว่า 10,000+ ท่านที่ใช้บริการจากทางร้านและกับมาซื้อซ้ำด้วยคุณภาพของเสื้อและงานสกรีนที่ตั้งใจทำให้กับลูกค้า ขอขอบคุณลูกค้าทุกท่านที่มาใช่บริการจากทางร้านOHOPRINT. </p>
        <div class="footer-contact">
            <div class="footer-contact-item">
                <img src="assets/img/icons/location.svg" alt="" class="footer-contact-icon" />
                <a class="footer-contact-text"  href="https://goo.gl/maps/4NHpntDPzhmaWJpo8">62/190, M.4, Bangkha, Chachoengsao</a>
            </div>
            <div class="footer-contact-item">
                <img src="assets/img/icons/email.svg" alt="" class="footer-contact-icon" />
                <a href="mailto:sales.ohoprint@gmail.com" class="footer-contact-text">sales.ohoprint@gmail.com</a>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <p class="footer-copyright">© OHOPRINT 2022. All rights reserved.</p>
        <div class="footer-social">
           
            <a href="" class="facebook"><i class="fab fa-facebook-f"></i></a>

        </div>
    </div>
</footer>
<!-- Footer End -->

<!-- Scroll Up Start -->
<div class="scroll-up">
    <div class="scroll-up__icon"><i class="fa fa-arrow-up"></i></div>
</div>
<!-- Scroll Up End -->

<!-- Yandex Map Start -->
<div class="popup popup--sign" id="map-popup" style="display: none;">
    <div class="popup-header">
        <h2 class="popup-title upper">Büyükdere Cad., 22A, Istanbul, Turkey</h2>
    </div>
    <div class="popup-main">
        <div id="map"></div>
    </div>
</div>
<!-- Yandex Map End -->

<!-- Mobile Menu Start -->
<nav class="cd-nav-container burger-menu" id="cd-nav">
    <div class="rmenu_header">
        <div class="rmenu_header-left">
            <a href="/" class="rmenu_logo" title="">
                <img src="assets/img/logo.jpg" alt="logo" />
            </a>
        </div>
        <div class="rmenu_header-right">
            <div class="call-delivery custom-primary">
                <span class="call-delivery-label">Call Now</span>
                <a href=""
                   class="call-delivery-number" target="_blank">087-559-8282</a>
            </div>
            <div class="cd-close-nav">
                <img src="assets/img/icons/close.svg" alt="close" />
            </div>
        </div>
    </div>
    <ul class="rmenu_list">
                       <li><a href="../index.php">Home</a></li>
                        
    </ul>
</nav>

<div class="cd-overlay"></div><!-- /.cd-overlay -->
<!-- Mobile Menu End -->


<!-- JavaScripts -->
<script src="assets/js/plugins/jquery-2.1.1.min.js"></script>
<script src="assets/js/plugins/bootstrap.min.js"></script>
<script src="assets/js/plugins/slick.min.js"></script>
<script src="assets/js/plugins/jquery.mousewheel.min.js"></script>
<script src="assets/js/plugins/jquery.easing.min.js"></script>
<script src="assets/js/plugins/aos.js"></script>
<script src="assets/js/plugins/jquery.touchSwipe.min.js"></script>
<script src="assets/js/plugins/moment.js"></script>
<script src="assets/js/plugins/bootstrap-datepicker.js"></script>
<script src="assets/js/plugins/bootstrap-datetimepicker.js"></script>
<script src="assets/js/plugins/jquery.fancybox.min.js"></script>
<script src="https://api-maps.yandex.ru/2.1/?apikey=pdct.1.1.20181030T175834Z.133bc6bb41576943.2897484581a2a12fea17740a34279c270c29ac48&lang=en_US"></script>
<script src="assets/js/main.js"></script>

</body>

</html>     