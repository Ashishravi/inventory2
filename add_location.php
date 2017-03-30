<?php

include("includes/dbcon.php");
error_reporting(E_ALL); ini_set('display_errors', 1);
$location_name = $_POST['location_name'];
$location_id = $_POST['location_id'];
$location_category = $_POST['location_category'];
$location_address = $_POST['location_address'];
$name = $_POST['name'];
$mobile = $_POST['mobile'];
$email = $_POST['email'];


$create_location ="INSERT INTO `table_location`(`location_id`, `location_name`, `address`, `name`, `mobile`, `email`) VALUES ('$location_id','$location_name','$location_address','$name','$mobile','$email')";



$create_relation ="INSERT INTO `location_category_relation`(`location_id`, `location_category_id`) VALUES ('$location_id','$location_category')";

if(mysqli_query($con, $create_location)){
    echo "sucess";
    if(mysqli_query($con, $create_relation)){
        echo "--sucess";
    }else{echo $create_relation;}
}else {
   echo $create_item; 
}




?>