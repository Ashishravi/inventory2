<?php
session_start();

ob_start();
include("includes/dbcon.php");
$user_id=$_POST['user_id']; 
$pass=$_POST['pass']; 

$sql="SELECT * FROM user WHERE username='$user_id' AND password='$pass'";
$result=mysqli_query($con, $sql);
$user_details = mysqli_fetch_array($result);
$count=mysqli_num_rows($result);

// If result matched $email and $pass, table row must be 1 row
if($count==1){
   
    $_SESSION['user_id']=$user_id;
    $_SESSION['name'] = $user_details['name'];
    
    if($_SESSION['name']=='sales' || $_SESSION['name']=='sales_head'){
         header("Location: dashboard_sales.php");
    }elseif($_SESSION['name']=='ops_planning'){
         header("Location: dashboard_planning.php");
    }elseif($_SESSION['name']=='ops_movement'){
         header("Location: dashboard_movement.php");
    }
    
   
}
else {
 header("Location: index.php?msg=error");
}
ob_end_flush();
?>