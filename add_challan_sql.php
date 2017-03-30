<?php
if(isset($_POST['submit_row']))
{
     include("includes/dbcon.php");

 $item_code=$_POST['item_code'];
 $item_description=$_POST['item_description'];
 $item_quantity=$_POST['item_quantity'];
 $app_price=$_POST['app_price'];
 $total_price=$_POST['total_price'];
 $challan_id=time();
    
 for($i=0;$i<count($item_code);$i++)
 {
  if($item_code[$i]!="" && $item_description[$i]!="" && $item_quantity[$i]!="")
  { 
      $sql = "insert into challan_items (challan_id,item_code,item_description,item_quantity,app_price,total_price) values('$challan_id','$item_code[$i]','$item_description[$i]','$item_quantity[$i]','$app_price[$i]','$total_price[$i]')";
       mysqli_query($con, $sql);
  }
 }
}
?>