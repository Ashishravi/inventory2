<?php
session_start();
include("includes/dbcon.php");

//user details
$customer_id = $_POST['id'];
$customer_name = $_POST['name'];
$delivery_address = $_POST['delivery_address'];
$delivery_date=['del_date'];

$user = "orders@gmail.com";

//item details
 $item_type=$_POST['type'];
$item_no = $_POST['itemNo'];
 $item_description=$_POST['itemName'];
 $unit_price=$_POST['price'];
 $item_qty=$_POST['quantity'];
$line_price = $_POST['total'];

//taxes and prices
$row_total=$_POST['subTotal'];
 $freight=$_POST['freight'];
 $sub_total=$_POST['sub_total_freight'];
 $tax=$_POST['tax'];
 $swach_bharat=$_POST['swach_bharat'];
 $kkc=$_POST['kkc'];
 $grand_total=$_POST['totalAftertax'];
$quot_type=$_POST['quot_type'];

$sql1 = "INSERT INTO `table_quotation`(`status`, `row_total`, `sub_total`, `freight`, `tax`, `swach_bharat`, `kkc`, `total`, `createdby`, `customer_id`, `customer_name`, `delivery_address`, `delivery_date`, `type`) VALUES ('quot',$row_total, $sub_total,$freight,$tax, $swach_bharat, $kkc,$grand_total,'$user','$customer_id','$customer_name','$delivery_address','$delivery_date', '$quot_type')";


$last_id = "";
    
if (mysqli_query($con, $sql1)) {
    $last_id = mysqli_insert_id($con);
    echo "New record created successfully. Last inserted ID is: " . $last_id;
    echo "success";
} else {
    echo "Error: " . $sql1 . "<br>" . mysqli_error($con);
}


 
    
 for($i=0;$i<count($item_description);$i++)
 {
  if($item_type[$i]!="" && $item_description[$i]!="" && $item_qty[$i]!="")
  { 
      $sql1 = "INSERT INTO `table_quotation_item`(`s_no`,`type`, `desc`, `unit_price`, `qty`, `tot`) VALUES ($last_id,'$item_type[$i]','$item_description[$i]',$unit_price[$i],$item_qty[$i],$line_price[$i])";
      echo $sql1;
      
      if(! mysqli_query($con, $sql1) ){
      echo mysqli_error($con);    
      }
      
      echo "items inserterd";
  }
 }

// mysqli_query($con, $insert_prices);

//echo "prices inserted";

 header('location: view_sales_quotation.php?id='.$last_id);

?>