<?php
session_start();
include("includes/dbcon.php");

//user details
$customer_id = $_POST['id'];
$customer_name = $_POST['name'];
$deliver_address = $_POST['delivery_address'];
$delivery_date=['del_date'];

$user = "orders@gmail.com";

//item details
 $item_type=$_POST['type'];
 $item_description=$_POST['item_description'];
 $unit_price=$_POST['unit_price'];
 $item_qty=$_POST['qty'];
 $unit_days=$_POST['unit_days'];
 $duration=$_POST['duration'];
 $total_price=$_POST['total_price'];

//taxes and prices
$row_total=$_POST['total'];
 $freight=$_POST['freight'];
 $sub_total=$_POST['sub_total'];
 $tax=$_POST['tax'];
 $swach_bharat=$_POST['swach_bharat'];
 $kkc=$_POST['kkc'];
 $grand_total=$_POST['grand_total'];

$sql = "INSERT INTO `table_quotation`(`status`,`row_total`, `sub_total`, `freight`, `tax`, `swach_bharat`, `kkc`, `total`, `createdby`, `customer_id`, `customer_name`, `delivery_address`) VALUES ('Customer', $row_total,$sub_total,$freight,$tax,$swach_bharat,$kkc,$grand_total,'$user','$customer_id','$customer_name', '$deliver_address')";



$last_id = "";
    
if (mysqli_query($con, $sql)) {
    $last_id = mysqli_insert_id($con);
    echo "New record created successfully. Last inserted ID is: " . $last_id;
    echo "success";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($con);
}


 
    
 for($i=0;$i<count($item_description);$i++)
 {
  if($item_type[$i]!="" && $item_description[$i]!="" && $item_qty[$i]!="")
  { 
      $sql1 = "INSERT INTO `table_quotation_item`(`s_no`, `desc`, `unit_price`, `qty`, `units`, `duration`, `tot`) VALUES ($last_id,'$item_description[$i]',$unit_price[$i],$item_qty[$i],'$unit_days[$i]',$duration[$i],$total_price[$i])";
      echo $sql1;
      
       mysqli_query($con, $sql1);
      
      echo "items inserterd";
  }
 }

 mysqli_query($con, $insert_prices);

echo "prices inserted";

header('location: viewquotation.php?id='.$last_id);


?>