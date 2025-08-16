<?php
session_start();
require "connection.php";
require "SMTP.php";
require "Exception.php";
require "PHPMailer.php";

use PHPMailer\PHPMailer\PHPMailer;


if(isset($_GET["e"])){
    $email = $_GET["e"];

    if(empty($email)){
        echo "Please Enter an Valid Email";
    }else{
        
        $rs = Database::search("SELECT * FROM `user` WHERE `email`='".$email."'");

        if($rs->num_rows==1){

            $code = uniqid();
            Database::iud("UPDATE `user` SET `verification_code`='".$code."' WHERE `email`='".$email."'");
                    $mail = new PHPMailer;
                    $mail->IsSMTP();
                    $mail->Host = 'smtp.gmail.com';
                    $mail->SMTPAuth = true;
                    $mail->Username = 'ashenlalantha453@gmail.com'; 
                    $mail->Password = 'goquvdrdcdmqwkge'; 
                    $mail->SMTPSecure = 'ssl';
                    $mail->Port = 465;
                    $mail->setFrom('ashenlalantha453@gmail.com', 'sounds'); 
                    $mail->addReplyTo('ashenlalantha453@gmail.com', 'sounds'); 
                    $mail->addAddress($email); 
                    $mail->isHTML(true);
                    $mail->Subject = 'SoundS Verification Code.'; 
                    $bodyContent = '<h1 style="color:green;" >Your verification Code Is :'.$code.'</h1>'; 
                    $mail->Body    = $bodyContent;

            if (!$mail->send()) {
                echo 'Verification code sending failed';
            } else {
                echo "Success";
            }

        }else{
            echo "Email Address Not Found";
        }
    }
}else{
    echo "Please enter your Email address";
}


?>