<?php
session_start();

function finance_credit_approve(){
    
    include("includes/dbcon.php");
    $oNo = $_POST['orderNo'];
    $oid = $_POST['orderId'];

    $sql = "UPDATE orders SET job_order = '$oNo' , status = 1 WHERE id = $oid ";
    mysqli_query($con, $sql);

}


function finance_credit_deny(){
    
    include("includes/dbcon.php");
    $reason = $_POST['reason'];
    $oid = $_POST['orderId2'];

    $sql = "UPDATE orders SET reason = '$reason' , status = -1 WHERE id = $oid ";
    mysqli_query($con, $sql);

}

function sendmail(){
    require 'PHPMailer/PHPMailerAutoload.php';

$mail = new PHPMailer;

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'vikasgenius.vikas@gmail.com';                 // SMTP username
$mail->Password = '9650043051';                           // SMTP password
$mail->Port = 25;                                    // TCP port to connect to

$mail->setFrom('vikasgenius.vikas@gmail.com', 'Youngman');
$mail->addAddress('vikasmahato0@gmail.com', 'Sales User');     // Add a recipient

$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Order Cancelled';
$mail->Body    = 'The order with job order no '.$_POST['orderId2'].' has been cancelled due to the following reason :'. $_POST['reason'];
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
   finance_credit_deny();
     header('location: dashboard_finance_crd.php');
}
}
if(isset($_POST['financecrd_deny']))
{
   
    sendmail();
   
    
}
if(isset($_POST['financecrd_app']))
{
   finance_credit_approve();
    
    header('location: dashboard_finance_crd.php');
    
}
?>