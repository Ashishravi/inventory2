<?php

include("includes/dbcon.php");
error_reporting(E_ALL); ini_set('display_errors', 1);
$item_desc = $_POST['item_desc'];
$item_code = $_POST['item_code'];
$item_category = $_POST['item_category'];
$length = $_POST['length'];
$breadth = $_POST['breadth'];
$height = $_POST['height'];
$weight = $_POST['weight'];
$hsn = $_POST['hsn'];
$value = $_POST['value'];
$selling_value = $_POST['selling_value'];


$create_item = "INSERT INTO `table_item`(`description`, `item_code`, `category`, `length`, `breadth`, `height`, `weight`, `HSN`, `value`,  `selling_value`) VALUES ('$item_desc','$item_code','$item_category','$length', '$breadth','$height','$weight',$hsn,'$value','$selling_value' )";


if(mysqli_query($con, $create_item)){
    echo "sucess";
   
}else {
   echo $create_item; 
}
/*if(mysqli_query($con, $create_item)){
    if(mysqli_query($con, $create_relation)){
        echo "sucess";
    }
}else {
    echo "An error occured. Please check that the item code is unique";
}*/



?>