<?php
if(isset($_POST['submit']))
{
     include("includes/dbcon.php");
    error_reporting(E_ALL); ini_set('display_errors', 1);
    
    
/*    
if (!empty($_FILES["myFile"])) {
    $current_date = date("Y-m-d"); $current_time = date("H:i:s");
*/
    if(!empty($_FILES["fileToUpload"])){
    $target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" && $imageFileType != "pdf"   ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
    }
    
    $location_from = $_POST['from'];
    $location_to = $_POST['to'];
    $job_order = $_POST['job_order'];
    

$type = $_POST['type'];
 $item_code=$_POST['itemNo'];
 $item_description=$_POST['itemName'];
 $item_quantity=$_POST['quantity'];
 $app_price=$_POST['price'];
 $total_price=$_POST['total'];


//echo  $location_from." ".$location_to." ". $job_order;
    $flag = "true";
    
    for($i=0;$i<count($item_code);$i++){
        $qty_reduced = "SELECT quantity FROM location_item_relation WHERE location_id =  '$location_from' AND item_id = '$item_code[$i]'";
        
    $qty_at_pickup =  mysqli_fetch_array(mysqli_query($con, $qty_reduced));
        
      //  echo  $qty_reduced;
        
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
        
         $update_challan = "INSERT INTO `table_challan`( `pickup_loc_id`, `delivery_loc_id`,`type`) VALUES ('$location_from','$location_to', '$type')";
      
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
      
      $update_challan_relation = "INSERT INTO `challan_item_relation`(`challan_id`, `item_id`, `item_description`, `job_order`, `quantity`, `unit_price`, `total_price`) VALUES ('$challan_id','$item_code[$i]', '$item_description[$i]','$job_order',  $item_quantity[$i],
      $app_price[$i], $total_price[$i])";
            
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