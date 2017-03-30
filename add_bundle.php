<?php
if(isset($_POST['submit_row']))
{
     include("includes/dbcon.php");
    error_reporting(E_ALL); ini_set('display_errors', 1);
  
    $bundle_id = $_POST['bundle_id'];
    $bundle_name = $_POST['bundle_name'];
    
 $item_code=$_POST['item_code'];

 $item_quantity=$_POST['item_quantity'];

    
      $update_bundle = "INSERT INTO `table_bundle`(`bundle_id`, `bundle_name`) VALUES ('$bundle_id','$bundle_name')";
    
     if (mysqli_query($con, $update_bundle)){
         echo "updated bundle";
     }else {
        echo $update_bundle;
     }
    
 for($i=0;$i<count($item_code);$i++)
 {
     
   
 
        $update_bundle_item = "INSERT INTO `bundle_item_relation`(`bundle_id`, `item_id`, `quantity`) VALUES ('$bundle_id','$item_code[$i]',$item_quantity[$i])";
     
   
        echo "updated bundle";
        if (mysqli_query($con, $update_bundle_item)){
            echo "items inserted";
        }else {
        echo $update_bundle_item;
     }
        
    
      
 }
}
    
?>