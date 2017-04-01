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
    $sql = "INSERT INTO orders (work_order_image,security_letter_image,rental_payment_image,security_neg_image,status,description,billing_add,mailing_add,delivery_add,name,date,customer_id) VALUES ('".$new1."','".$new2."','".$new3."','".$new4."',0,'".$_POST['description']."','".$_POST['billing_address']."','".$_POST['mailing_address']."','".$_POST['delivery_address']."','".$_POST['name']."','".$_POST['del_date']."','".$_POST['id']"')";

//echo $sql; 
//mysqli_query($con, $sql)

$last_id = "";
    
if (mysqli_query($con, $sql)) {
    $last_id = mysqli_insert_id($con);
    echo "New record created successfully. Last inserted ID is: " . $last_id;
    echo "success";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($con);
}

 $item_type=$_POST['type'];
 $item_description=$_POST['item_description'];
 $unit_price=$_POST['unit_price'];
 $item_qty=$_POST['qty'];
 $unit_days=$_POST['unit_days'];
 $duration=$_POST['duration'];
 $total_price=$_POST['total_price'];
 $total=$_POST['total'];
 $freight=$_POST['freight'];
 $sub_total=$_POST['sub_total'];
 $tax=$_POST['tax'];
 $swach_bharat=$_POST['swach_bharat'];
 $kkc=$_POST['kkc'];
 $grand_total=$_POST['grand_total'];
    
 for($i=0;$i<count($item_description);$i++)
 {
  if($item_type[$i]!="" && $item_description[$i]!="" && $item_qty[$i]!="")
  { 
      $sql1 = "INSERT INTO `table_quotation`(`s_no`, `desc`, `unit_price`, `qty`, `units`, `duration`, `tot`) VALUES ($last_id,'$item_description[$i]',$unit_price[$i],$item_qty[$i],'$unit_days[$i]',$duration[$i],$total_price[$i])";
      echo $sql1;
      
       mysqli_query($con, $sql1);
      
      echo "items inserterd";
  }
 }

$insert_prices = "INSERT INTO `table_quot_price`(`s_no`, `sub_total`, `freight`, `tax`, `swach_bharat`, `kkc`, `total`) VALUES ( $last_id,$total,$freight,$tax,$swach_bharat,$kkc,$grand_total)";

 mysqli_query($con, $insert_prices);

echo "prices inserted";

//header('location: dashboard_sales.php');


?>