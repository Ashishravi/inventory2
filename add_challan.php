<?php
if(isset($_POST['submit_row']))
{
     include("includes/dbcon.php");
    error_reporting(E_ALL); ini_set('display_errors', 1);
    $location_from = $_POST['from'];
    $location_to = $_POST['to'];
    $job_order = $_POST['job_order'];
    $type = $_POST['type'];
    
 $item_code=$_POST['item_code'];
 $item_description=$_POST['item_description'];
 $item_quantity=$_POST['item_quantity'];
 $app_price=$_POST['app_price'];
 $total_price=$_POST['total_price'];

    $flag = "true";
    
    for($i=0;$i<count($item_code);$i++){
        $qty_reduced = "SELECT quantity FROM location_item_relation WHERE location_id =  '$location_from' AND item_id = '$item_code[$i]'";
        
    $qty_at_pickup =  mysqli_fetch_array(mysqli_query($con, $qty_reduced));
        
        echo "qty at source".$qty_at_pickup['quantity'];
        
        echo "qty required".$item_quantity[$i];
        
        if($qty_at_pickup['quantity'] < $item_quantity[$i]){
            echo "not enough quantity at source";
            $flag="false"; break;
        }else{
             $sql = "SELECT * FROM `location_item_relation` WHERE `location_id`='$location_to' AND `item_id`='$item_code[$i]' ";
      
                $sql1 = mysqli_query($con,  $sql); 
            if(mysqli_num_rows($sql1)==0){
                //row does not exist so create
                $update_to = "INSERT INTO `location_item_relation`(`location_id`, `item_id`, `quantity`) VALUES ('$location_to',$item_code[$i],0)";
                if(mysqli_query($con, $update_to)){
                echo "created empty set at dest";}else{echo "failed to create empty set"; $flag="false"; break; }
            }else{
                
                echo "item row exists at dest";
                
            }
        }
        
        
    }
    
    
    if($flag=="true"){
        
         $update_challan = "INSERT INTO `table_challan`( `pickup_loc_id`, `delivery_loc_id`) VALUES ('$location_from','$location_to')";
      
            $challan_id="";
        
        if (mysqli_query($con, $update_challan)) {
    $challan_id = mysqli_insert_id($con);
    echo "New Challan ID is: " .  $challan_id;
} else {
    echo "Error: " . $update_challan . "<br>" . mysqli_error($conn);
}
        
        
        
        for($i=0;$i<count($item_code);$i++){
            
            
              $update_to = "UPDATE `location_item_relation` SET  `quantity`=quantity+ $item_quantity[$i] WHERE `location_id`='$location_to' AND `item_id`='$item_code[$i]' ";
             $update_from = "UPDATE `location_item_relation` SET  `quantity`=quantity- $item_quantity[$i] WHERE `location_id`='$location_from' AND `item_id`='$item_code[$i]'";
      
      $update_challan_relation = "INSERT INTO `challan_item_relation`(`challan_id`, `item_id`, `quantity`, `job_order`) VALUES ('$challan_id','$item_code[$i]', $item_quantity[$i], '$job_order')";
            
    if(mysqli_query($con, $update_to)){
         echo "updated ".$update_to ;
        if(mysqli_query($con, $update_from)){
             echo "updated ".$update_from ;
          if(mysqli_query($con, $update_challan_relation)){
              echo "sucess";
          }else{
              echo  $update_challan_relation;
              mysqli_query($con, $update_challan_relation);
              
          }
          }
     }
            
        }
        
    }
    
}
    

?>