<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'phpMailer/Exception.php';
    require 'phpMailer/PHPMailer.php';
    require 'phpMailer/SMTP.php';

    $fromMailAddress = "fromMail@gmail.com";
    $fromMailPass = 'fromPAss';
    $fromMailSubject = 'Hello from PHP';
    
    $to = 'toMail@gmail.com';
    
    $userFName = $_POST['firstName'];
    $userLName = $_POST['lastName'];
    $userMail = $_POST['email'];
    $userPhone = $_POST['phone'];
    $notes = $_POST['notes'];

    $mailBody = $userFName . "<br>". $userLName . "<br>" . $userMail . "<br>" . $notes . "<br>" . $userPhone . "<br>";

    $mail = new PHPMailer;
    $mail->CharSet = 'UTF-8';

        $mail->isSMTP(); 
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 587;
        $mail->SMTPSecure = 'tls';
        $mail->SMTPAuth     = true;
        $mail->Username     = $fromMailAddress;
        $mail->Password     = $fromMailPass;
    
        $mail->From         = $fromMailAddress;
        $mail->FromName     = $fromMailSubject;
        $mail->isHTML(true);
    
        
        $mail->addAddress($to, 'Андрей???');
        $mail->Subject      = 'Hello from PHP';
        $mail->Body         = $mailBody;
        $mail->AltBody      = '';
    
    if($mail->send()) echo 'Okay';
    else echo $mail->ErrorInfo;  
?>