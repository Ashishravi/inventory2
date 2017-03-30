<?php
session_start();
include("includes/dbcon.php");

$current_date = date("Y-m-d"); $current_time = date("H:i:s");
$target_dir = "uploads/";
$uploadOk = 1;
$new1='';$new2='';$new3='';$new4='';
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    
for($i=0; $i<count($_FILES["fileToUpload"]["name"]); $i++)
{
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"][$i]);
    $extension = end(explode(".", $_FILES["fileToUpload"]["name"][$i]));
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    $path=md5($current_date.$current_time).'.'.$extension;
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"][$i]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"][$i] > 50000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} elseif($uploadOk == 1 && $i==0){
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"][$i], "uploads/1_".$path)) {
        /*echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";*/
    } else {
       /* echo "Sorry, there was an error uploading your file.";*/
    }
    $new1 = "uploads/1_".$path;
}
    elseif($uploadOk == 1 && $i==1){
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"][$i], "uploads/2_".$path)) {
        /*echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";*/
    } else {
       /* echo "Sorry, there was an error uploading your file.";*/
    }
    $new2 = "uploads/2_".$path;
}
    elseif($uploadOk == 1 && $i==2){
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"][$i], "uploads/3_".$path)) {
        /*echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";*/
    } else {
       /* echo "Sorry, there was an error uploading your file.";*/
    }
    $new3 = "uploads/3_".$path;
}
    elseif($uploadOk == 1 && $i==3){
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"][$i], "uploads/4_".$path)) {
        /*echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";*/
    } else {
       /* echo "Sorry, there was an error uploading your file.";*/
    }
    $new4 = "uploads/4_".$path;
}
}
}
    $sql = "INSERT INTO orders (work_order_image,security_letter_image,rental_payment_image,security_neg_image,status,description,billing_add,mailing_add,delivery_add,phone,name,email,date) VALUES ('".$new1."','".$new2."','".$new3."','".$new4."',0,'".$_POST['description']."','".$_POST['billing_address']."','".$_POST['mailing_address']."','".$_POST['delivery_address']."','".$_POST['phone']."','".$_POST['name']."','".$_POST['email']."','".$_POST['del_date']."')";
//echo $sql; 
mysqli_query($con, $sql);
header('location: dashboard_sales.php');

?>